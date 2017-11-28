<?php
$pagenotfound='<h2 style="text-align:center;">404 - Az oldal nem található</h2><img style="display:block;margin:0 auto;max-width:100%;height:auto;" src="404.gif" alt="404" />';
if(!isset($_SESSION)){
	session_start();
};
$host="localhost";
$felhasznalonev="root";
$jelszo="";
$adatbazis="konyvesbolt";
$link=mysql_connect($host,$felhasznalonev,$jelszo);
if(!$link){
	die("Hiba: ".mysql_error());
}
mysql_set_charset('utf8',$link);
mysql_select_db($adatbazis,$link) or die('Hiba');