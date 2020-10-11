<?php 
require('C:\laragon\www\admin\conf.php');
$koneksi = mysqli_connect($db_mysqli_server,$db_mysqli_username,$db_mysqli_password,$db_mysqli_database);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>