<!DOCTYPE html>
<html>
<head>
	<title>redirect</title>
</head>
<meta http-equiv="refresh" content="3;url=./manager/">
<body>
<style>
    body {
        width: 50em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h2>Wait, Redirect...</h2>
<hr>

	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>

	<br/>
	<br/>

	
</body>
</html>