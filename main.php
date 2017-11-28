				<div id="main" style='overflow:auto;'>
					<div class="inner">
						<h2>Válassz könyveink közül!</h2>
							<div id='homepagebooks'>
<?php
$select='SELECT * FROM konyv';
$res=mysql_query($select);
for($i=0;$i<6;){
	$row = mysql_fetch_assoc ($res);
	if($row['darab']>0){
	?>
							<section class="tiles">
								<article class="style7">
									<span class="image" >
									<a href="?oldal=konyv&&konyvid=<?php echo $row["id"] ?>" class='konyvlink' >
										<img src="konyv/<?php echo $row["id"] ?>.jpg" alt="" />
									</a>
									</span>
								</article>
							</section>
	<?php $i++;
	};
}; ?>
							</div>
					</div>
				</div>
