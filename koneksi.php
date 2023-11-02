<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "tutorialweb";

$koneksi =mysql_connect($host, $user, $pass) or die("Koneksi ke data base gagal!");
mysql_select_db($name, $koneksi) or die("Tidak ada data base yang dipilih!");
?>