<?php
if(isset($_POST['mentes'])){
	$update='UPDATE emberek SET ';
	unset($_POST['mentes']);
			$_SESSION['fhvalt']=$_POST;
			foreach($_SESSION['fhvalt'] as $key =>$value){
				if(!is_array($value)){
					if($value!=''){
						$update.=' '.$key.'="'.$value.'", ';
					}
				}
			}
			$update2=substr($update,0,-2);
			$update2.=' WHERE id='.$_GET['felhasznaloid'];
			mysql_query($update2);
			echo $update2;
			header('Location: ?oldal=adminfelulet&&sub=felhasznalok');
}
?>
<table>
	<tr>
		<th>Név</th>
		<th>E-mail</th>
		<th>Telefon</th>
		<th>Cím</th>
		<th>Jog</th>
		<th>Szerkesztés</th>
	</tr>
		<?php
		$res=mysql_query('SELECT * FROM emberek');
		while($row=mysql_fetch_assoc($res)){
			echo '<tr><td>'.$row['nev'].'</td>';
			echo '<td>'.$row['email'].'</td>';
			echo '<td>'.$row['tel'].'</td>';
			echo '<td>'.$row['cim'].'</td>';
			echo '<td>'.$row['jog'].'</td>';
			?>
			<td><a class='fhszerkpanel' href='?oldal=adminfelulet&&sub=felhasznalok&&felhasznaloid=<?php echo $row['id'] ?>'  ><i class="fa fa-caret-square-o-down" aria-hidden="true"   ></i></a>
			<a style='margin-left:30px;' href='../bookstore2/admin/delet.php?sub=torles&&felhasznaloid=<?php echo $row['id']; ?>' onClick='return confirm("Biztos törli?");' >Törlés</a></td></tr>
			
			
<?php 
if(!isset($_GET['felhasznaloid'])){
	echo '<tr id="fhszerk" display="none">';
}else{
	if($_GET['felhasznaloid']==$row['id']){
		echo '<tr id="fhszerk">';
		?>
		<form method='post'>
			<td><input type='text' name='nev' /></td>
			<td><input type='email' name='email' /></td>
			<td><input type='text' name='tel' /></td>
			<td><input type='text' name='cim' /></td>
			<td>
			<?php echo '<select name="jog">
			<option ';
				if($row['jog']=='admin'){
					echo ' selected ';
				};
			echo ' value="admin">admin</option>
			<option ';
				if($row['jog']=='felhasznalo'){
					echo ' selected ';
				};
			echo ' value="felhasznalo">felhasználó</option></select></td>';
			?>
			<td><input type='submit' name='mentes' value='Mentés'></td>
		</form>
	<?php
	}
}
	?>
</tr>
			<?php 
		}
		?>
</table>
<?php
/*<select name="jogok">
			<option ';
				if($row['jog']=='admin'){
					echo ' selected ';
				};
			echo ' value="admin">admin</option>
			<option ';
				if($row['jog']=='felhasznalo'){
					echo ' selected ';
				};
			echo ' value="felhasznalo">felhasználó</option></select>*/