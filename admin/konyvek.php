<table style='max-width:100%;overflow:auto;'>
	<tr>
		<th>Név</th>
		<th>ISBN</th>
		<th>Nyelv</th>
		<th>Író</th>
		<th>Kiadó</th>
		<th>Státusz</th>
		<th>Darab</th>
		<th></th>
	</tr>
<?php
$res=mysql_query('SELECT k.*,ki.nev as kiadonev, ir.nev as ironev  FROM konyv as k
	LEFT JOIN kiado as ki on(ki.id=kiado_id)
	LEFT JOIN iro as ir on(ir.id=iro_idiro)');
while($row=mysql_fetch_assoc($res)){
	echo '<tr>';
		?>
			<td><?php echo $row['nev']; ?></td>
			<td><?php echo $row['isbn']; ?></td>
			<td><?php echo $row['nyelv']; ?></td>
			<td><?php echo $row['ironev']; ?></td>
			<td><?php echo $row['kiadonev']; ?></td>
			<td>
			<?php 
			if($row['statusz']==1){
				echo 'Elérhető';
			}else{
				echo 'Nem elérhető';
			}
			?>
			
			
			
			</td>
			<td><?php echo $row['darab']; ?></td>
			<td><a href='../bookstore2/?oldal=adminfelulet&&sub=ujkonyv&&konyvid=<?php echo $row['id']; ?>'>Szerkesztés</a><br /><a href='../bookstore2/admin/delet.php?sub=torles&&konyvid=<?php echo $row['id']; ?>' onClick='return confirm("Biztos törli?");' >Törlés</a></td>
		<?php
	echo '</tr>';
}
?>
</table>
<p><a href='../bookstore2/?oldal=adminfelulet&&sub=ujkonyv'>Új könyv hozzáadása</a></p>
