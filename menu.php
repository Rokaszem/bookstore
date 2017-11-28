<nav id="menu">
	<h2>Menű</h2>
	<ul>
		<li><a href="/bookstore2/">Kezdőlap</a></li>
<?php
if(!isset($_SESSION['user'])){
	?>
		<li><a href="/bookstore2/?oldal=bejelentkezes">Bejelentkezés</a></li>
	<?php
}else{
?>
		<li><a href="/bookstore2/?oldal=fiokom" style='display:inline-block !important;'>Fiókom</a>
		<a href='/bookstore2/login/logout.php' style='display:inline-block !important;padding-left:3px;' id='kijelentkezes'--><i class="fa fa-power-off" aria-hidden="true" ></i></a></li>
		
<?php
};
?>
		<li><a href="/bookstore2/?oldal=kategoriak">Kategóriák</a></li>
<?php
if(isset($_SESSION['user'])){
	if($_SESSION['user']['jog']=='admin'){
?>
		<li><a href="/bookstore2/?oldal=adminfelulet">Adminfelület</a></li>
<?php
	}
}
?>
	</ul>
</nav>