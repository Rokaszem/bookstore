<?php
include('../database_connection.php');
if($_GET['sub']=='torles' && isset($_GET['konyvid'])){
	mysql_query('DELETE FROM kategoriak_has_konyv WHERE konyv_id='.$_GET['konyvid']);
	$delete='DELETE FROM konyv WHERE id='.$_GET['konyvid'];
	$res=mysql_query($delete);
	if(!$res){
		echo mysql_error();
	}
	header('Location:../?oldal=adminfelulet&&sub=konyvek');
}
if($_GET['sub']=='torles' && isset($_GET['felhasznaloid'])){
	$delete='DELETE FROM emberek WHERE id='.$_GET['felhasznaloid'];
	$res=mysql_query($delete);
	if(!$res){
		echo mysql_error();
	}
	header('Location: ../?oldal=adminfelulet&&sub=felhasznalok');
}