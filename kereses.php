<div id="main" style='overflow:auto'>
	<div class="inner" >
	<strong>Eredmény a <i>"<?php echo $_GET['kereses'] ?>"</i> című könyvre:</strong>
	<div id='homepagebooks' style='padding-top:5px'>
		<?php
if($_GET['kereses']!=''){
	$konyvcim='SELECT * FROM konyv WHERE nev LIKE "%'.$_GET['kereses'].'%"';
	$reskonyvcim=mysql_query($konyvcim);
		$r = mysql_num_rows($reskonyvcim)<6?mysql_num_rows($reskonyvcim):6;
		for($i=0;$i<$r;){
			$rowkonyvcim=mysql_fetch_assoc($reskonyvcim);
				?>
				<section class="tiles">
								<article class="style7">
									<span class="image" >
									<a href="?oldal=konyv&&konyvid=<?php echo $rowkonyvcim["id"] ?>" class='konyvlink' >
										<img src="konyv/<?php echo $rowkonyvcim["id"] ?>.jpg" alt="" />
									</a>
									</span>
								</article>
							</section>
				<?php
				$i++;
			}
}else{
	echo '<h2>Nincs keresett kőnyv.</h2>';
}
		?>
		</div>
		
	</div>
</div>