<?php
$has='SELECT rendeles_id FROM rendeles_has_konyv GROUP BY rendeles_id';
$adatok='SELECT h.rendeles_id,re.* , e.nev FROM rendeles_has_konyv as h left join rendeles as re on (re.id=rendeles_id) left join emberek as e on(e.id=emberek_id) GROUP BY rendeles_id';

//$adatok='SELECT h.*,re.* , k.nev as konyvnev, e.nev FROM rendeles_has_konyv as h left join rendeles as re on (re.id=rendeles_id) left join konyv as k on(k.id=konyv_id) left join emberek as e on(e.id=emberek_id)';

/*$konyv='SELECT h.konyv_id, k.nev FROM rendeles_has_konyv as h 
	left join konyv as k on (k.id=konyv_id)';
/*$rendeles='SELECT r.*, em.nev as rendelonev from rendeles as r
    left join emberek as em on (em.id=emberek_id)';
$rendeles='SELECT h.*, re.emberek_id as megrendelo_id from rendeles_has_konyv as h 
left join rendeles as re on (re.id=rendeles_id)';*/
if(mysql_query('SELECT rendeles_id FROM rendeles_has_konyv GROUP BY rendeles_id')!=0){
if(isset($_POST['mentes'])){
	$update='UPDATE rendeles SET rendelsstatusz="'.$_POST['statusz'].'", idopont=idopont WHERE rendeles.id='.$_POST['mentes'];
	$res=mysql_query($update);
}
if(isset($_GET['rendelesid'])){
	mysql_query('DELETE FROM rendeles_has_konyv WHERE rendeles_id='.$_GET['rendelesid']);
	mysql_query('DELETE FROM rendeles WHERE id='.$_GET['rendelesid']);
	
}
$reshas=mysql_query($has);
?>
<table>
	<tr>
		<th>Rendelés azonosító</th>
		<th>Időpont</th>
		<th>Státusz</th>
		<th>Megrendelő</th>
		<th>Megrendelt könyvek</th>
		<th></th>
		<th></th>
	</tr>
	<?php
	while($rowhas=mysql_fetch_assoc($reshas)){
	?>
	<tr>
	<form method='post'>
		<td><?php echo $rowhas['rendeles_id']; ?></td>
		<?php
		$resadatok=mysql_query($adatok);
		while($rowadatok=mysql_fetch_assoc($resadatok)){
			if($rowhas['rendeles_id']==$rowadatok['rendeles_id']){
				echo '<td>'.$rowadatok['idopont'].'</td>';
				echo '<td>';
				?>
				<select name='statusz'>
				<?php
				echo '<option';
					if($rowadatok['rendelsstatusz']=='felvetel'){
						 echo ' selected ';
					}
					echo 'value="felvetel">Felvéve</option><option';
					if($rowadatok['rendelsstatusz']=='kikuldve'){
						 echo ' selected ';
					}
					echo ' value="kikuldve">Kiküldve</option>';
				?>
				</select>
				<?php
				echo '</td>';
				echo '<td>'.$rowadatok['nev'].'</td>';
				$konyvhas='SELECT h.*,k.nev FROM rendeles_has_konyv as h 
					left join konyv as k on(k.id=konyv_id)';
				$reskonyvhas=mysql_query($konyvhas);
				echo '<td><ul>';
				while($rowkonyvhas=mysql_fetch_assoc($reskonyvhas)){
					if($rowhas['rendeles_id']==$rowkonyvhas['rendeles_id']){
						echo '<li style="display:list-item">'.$rowkonyvhas['nev'].'</li>';
					}
				}
				echo '</ul></td>';
				?>
				<td>
					<button type='submit' name='mentes' value='<?php echo $rowadatok['rendeles_id']; ?>' />Mentés</button>
				</td>
				<td><a href='../bookstore2/?oldal=adminfelulet&&sub=rendelesek&&rendelesid=<?php echo $rowadatok['rendeles_id']; ?>' onClick='return confirm("Biztos törli?");'>Törlés</a></td>
				<?php
			}
		}
		
		
			?>
	</form>
	</tr>
	<?php
	}
	?>
</table>
<?php
}else{
	echo '<h2>Nincs rendelés.</h2>';
}
?>


