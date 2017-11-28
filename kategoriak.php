<div id="main" style='overflow:auto'>
	<div class="inner">
	<div id='katmenu'>
<?php
$reskat=mysql_query('SELECT * FROM kategoriak');
if(!$reskat){
		echo mysql_error();
}
while($row=mysql_fetch_assoc($reskat)){
?>
			<div class='katnev' > <a href='/bookstore2/?oldal=kategoriak&&katid=<?php echo $row['id']; ?>'><?php echo $row['nev']; ?></a></div>
<?php
};
?>
	</div>
<?php
if(isset($_GET['katid'])){
?>
	<div id='kikat'>
<?php
	
	
	$res= mysql_query('SELECT * FROM konyv WHERE id IN(SELECT konyv_id FROM kategoriak_has_konyv WHERE kategoriak_id='.$_GET['katid'].')');
	if(!$res){
			echo mysql_error();
	};
	if(mysql_num_rows($res)!=0){
		$r = mysql_num_rows($res)<6?mysql_num_rows($res):6;
		for($i=0;$i<$r;){
			$row=mysql_fetch_assoc($res);
			
			$tartalom='<span class="image" >
			<a href="?oldal=konyv&&konyvid='.$row["id"].'" class="konyvlink" >
				<img src="konyv/'.$row["id"].'.jpg" alt="" />';
			?>
								<section class="tiles">
			<?php
			if($row['darab']>0){
				echo 				'<article class="style7">'.$tartalom;
			}else{
				echo 				'<article class="style7-none">'.$tartalom;
			};
			?>
										</a>
										</span>
									</article>
								</section>
			
			<?php $i++;
		};
	}else{
		echo '<h2>Nincs ilyen kategóriájú könyv.</h2>';
	};
	echo '</div>';
};
?>
	</div>
</div>