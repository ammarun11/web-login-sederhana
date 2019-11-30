<?php
$host = "localhost";
$user = "root";
$pass = "qwe";
$db = "pesbuk";
$table = "members";
$connect = mysql_connect($host,$user,$pass) or die("Gagal konek");
$pilih_db = mysql_select_db($db) or die("Database tidak ada");
$cookie_nama = $_COOKIE['nama'];
?>
