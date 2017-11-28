<div id="main">
	<div class="inner">
<?php
error_reporting(E_ALL ^ E_NOTICE);
	if(empty($_SESSION['kosar'])){
		echo '<h2>Üres a kosár</h2>';
	}else{
		$selectkonyv='SELECT * FROM konyv WHERE id IN (';
		foreach($_SESSION['kosar'] as $key => $value){
			//if($value)
			$selectkonyv.=$key.', ';
		}
		$selectkonyv=substr($selectkonyv,0,-2);
		$selectkonyv.=')';
		$reskonyv=mysql_query($selectkonyv);
		if(isset($_GET['kosarid'])){
			unset($_SESSION['kosar'][$_GET['kosarid']]);
			header('Location: ../bookstore2/?oldal=kosar');
		}
		if(isset($_POST['megrendeles'])){
			//maga a rendelés
			$insertrendeles='INSERT INTO rendeles (idopont,rendelsstatusz,emberek_id) VALUES (';
			$timestamp=date('Y-m-d H:m:s',time());
			$insertrendeles.='"'.$timestamp.'","felvetel",'.$_SESSION['user']['id'].');';
			mysql_query($insertrendeles);
			//rendeléshez a könyvek
			$resrendeles=mysql_query('SELECT * FROM rendeles WHERE idopont="'.$timestamp.'"');
			$rowrendeles=mysql_fetch_assoc($resrendeles);
			$insertrendeleskonyv='INSERT INTO rendeles_has_konyv (rendeles_id,konyv_id) VALUES ';
			foreach($_SESSION['kosar'] as $key => $value){
				$insertrendeleskonyv.='('.$rowrendeles['id'].','.$key.'), ';
			}
			$insertrendeleskonyv=substr($insertrendeleskonyv,0,-2);
			mysql_query($insertrendeleskonyv);
			//konyv darab csökkentese
			while($rowkonyv=mysql_fetch_assoc($reskonyv)){
				$ujdarab=$rowkonyv['darab']-$_SESSION['kosar'][$rowkonyv['id']];
				$konyvdarab='UPDATE konyv SET darab='.$ujdarab.' WHERE id='.$rowkonyv['id'];
				mysql_query($konyvdarab);
			}
			echo '<script type="text/javascript">
				alert("Sikeres megrendeles");
			</script>';
			unset($_SESSION['kosar']);
			header('refresh:0');
		}
	}
			if($reskonyv!=null){
	?>
			<table>
			<?php
			
				while($rowkonyv=mysql_fetch_assoc($reskonyv)){
			?>
				<tr>
					<td><?php echo $rowkonyv['nev'] ?></td>
					<td><?php 
						echo $_SESSION['kosar'][$rowkonyv['id']].' darab';
					?></td>
					<td><?php echo $rowkonyv['ar']*$_SESSION['kosar'][$rowkonyv['id']].' Ft'; ?></td>
					<td><a href='../bookstore2/?oldal=kosar&&kosarid=<?php echo $rowkonyv['id']; ?>' >Törlés</a></td></td>
				</tr>
			<?php
				};
			?>
			</table>
			<?php
				if($_SESSION['user']!=null){
			?>
			<div>
				<form method='post'>
					<input type='submit' name='megrendeles' value='Megrendelés' />
				</form>
			</div>
		<?php
				}else{
					echo '<h2>A vásárláshoz kérem jelentkezzen be!</h2>';
				}
}
	/*
	mysql_query('DELETE FROM rendeles_has_konyv WHERE rendeles_id='.$_GET['rendelesid']);
	4130
if(isset($_GET['rendelesid'])){
	mysql_query('DELETE FROM rendeles WHERE id='.$_GET['rendelesid']);
}
	
	*/
	?>
			
	</div>
</div>