<?php
?>
<style>
#adminnav > ul > li{
	display:inline;
	padding-right:10px;
}
a{
	text-decoration:none;
}
#adminnav{
	background-color:rgba(125,179,224,0.3)
}
</style>
<div id="main" style='padding-top:20px;'>
	<div class="inner">
		<div id='adminnav'>
			<ul style='list-style-type:none;margin:0;padding:0;'>
				<li><a href='../bookstore2/?oldal=adminfelulet&&sub=rendelesek'>Rendelések</a></li>
				<li><a href='../bookstore2/?oldal=adminfelulet&&sub=felhasznalok'>Felhasználók kezelése</a></li>
				<li><a href='../bookstore2/?oldal=adminfelulet&&sub=konyvek'>Könyvek kezelése</a></li>
			</ul>
		</div>
		<?php
		if(isset($_GET['sub'])){
			if($_GET['sub']=='rendelesek'){
				include('admin/rendelesek.php');
			}else if($_GET['sub']=='felhasznalok'){
				include('admin/felhasznalok.php');
			}else if($_GET['sub']=='konyvek'){
				include('admin/konyvek.php');
			}else if($_GET['sub']=='ujkonyv' || $_GET['sub']=='szerkesztes'){
				include('admin/ujkonyv.php');
			}
		}
		?>
		
	
	
	</div>
</div>