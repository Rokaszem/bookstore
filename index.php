<?php
include('database_connection.php');
error_reporting(E_ALL ^ E_NOTICE);
/*setcookie('name','ertek',time()-3600);
setcookie('name2','e2rtek',time()-3600);
var_dump($_COOKIE);*/
include('function.php');
/*

SELECT k.*, ko.nev as kiadonev from konyv as k
	left join kiado as ko on (ko.id=kiado_id);

	
SELECT k.*, ko.nev as kiadonev, ir.nev as ironev from konyv as k
	left join kiado as ko on (ko.id=kiado_id)
	left join iro as ir on (ir.id=iro_idiro)




SELECT k.* (select nev from kiado as ko where ko.id=k.kiado_id) FROM konyvek;






SELECT ko.nev, ka.nev FROM `kategoriak_has_konyv`
	LEFT JOIN kategoriak as ka on(ka.id=`kategoriak_id`)
    RIGHT JOIN konyv as ko on(ko.id=`konyv_id`)

	SELECT ko.nev, ka.nev FROM `kategoriak_has_konyv`
	LEFT JOIN kategoriak as ka on(ka.id=`kategoriak_id`)
    RIGHT JOIN konyv as ko on(ko.id=`konyv_id`)
    WHERE ko.id=7
807

*/
?>
<html>
	<head>
		<title>Book Story</title>
		<link rel="icon" type="image/png" href="title_icon.png">
		<meta charset="utf-8" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/homepage.css" />
		
		  <link rel="stylesheet" href="choosen/chosen.css">

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="/bookstore2/" class="logo">
									<span class="symbol"><img src="images/ka.png" alt="" /></span><span>Book Story</span>
								</a>
								<br />
								<a href='/bookstore2/?oldal=kosar' class='logo'><span class='symbol'><i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<?php 
								$i=0;
								if(isset($_SESSION['kosar'])){
									foreach($_SESSION['kosar'] as $key => $value){
											$i+=$value;
									};
								};
								echo $i;
								?>
								</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
				<?php include('menu.php'); ?>

				<!-- Main -->
<?php 
	if(!isset($_GET['oldal'])){
		include('main.php');
	}else if($_GET['oldal']=='bejelentkezes'){
		include('login/login.php');
	}else if($_GET['oldal']=='fiokom'){
		include('fiokom/fiokom.php');
	}else if($_GET['oldal']=='kategoriak'){
		include('kategoriak.php');
	}else if($_GET['oldal']=='adminfelulet'){
		include('admin/adminfelulet.php');
	}else if($_GET['oldal']=='kosar'){
		include('kosar.php');
	}else if($_GET['oldal']=='kereses'){
		include('kereses.php');
	}else if($_GET['oldal']=='konyv'){
		if(isset($_GET['konyvid'])){
			$selectkonyid='SELECT * FROM konyv WHERE id='.$_GET['konyvid'];
			$res=mysql_query($selectkonyid);
			if(mysql_num_rows($res)){
				include('konyv/konyv.php');
			}else{
				echo $pagenotfound;
			}
		}
	}
?>
				<!-- Footer -->
				<?php include('footer.php'); ?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="choosen/chosen.jquery.js" type="text/javascript"></script>
			<script src="choosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
			<script src="choosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
			
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		  <script>
		  $( function() {
			var availableTags = [
<?php 
$select='SELECT nev FROM kiado';
$res=mysql_query($select); 
while($row=mysql_fetch_assoc($res)){
?>
		"<?php echo $row['nev']; ?>",
<?php }; ?>
			];
			$( "#tags" ).autocomplete({
			  source: availableTags
			});
			var availableTags2 = [
<?php 
$select='SELECT nev FROM iro';
$res=mysql_query($select); 
while($row=mysql_fetch_assoc($res)){
	//lauday.andras@iecinfo.hu -> gyakornoki program
?>
		"<?php echo $row['nev']; ?>",
<?php }; ?>
			];
			$( "#tags2" ).autocomplete({
			  source: availableTags2
			});
			$(".chosen").chosen({
				display_disabled_options: true
			})
		  } );
		  </script>
		  
		  
	</body>
</html>