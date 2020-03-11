<?php  
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Barrald-Shop | Login</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">

</head>
<body>

<?php include 'menu.php'; ?>

 <div class="container">
 	<div class="row" style="margin-top: 100px">
 		<div class="col-md-4 col-md-offset-4">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					<div class="panel-title text-center">
 						<label>Baralld-Shop | Login</label>
 						
 				</div>
 				<div class="panel-body">
 					<form method="POST">
 						<div class="form-group">
 							<label>Email</label>
 							<input type="email" class="form-control" name="email">
 						</div>

 						<div class="form-group">
 							<label>Password</label>
 							<input type="password" class="form-control" name="password">
 						</div>
 						<button class="btn btn-primary btn-lg btn-block" name="login">Login</button> <br>
 						<p> Daftar Sebagai Pelanggan ? <a href="daftar.php" style="text-decoration: none;">Daftar</a></p>
 				</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 	<?php //jk ada tombol save 
 	if (isset($_POST["login"]))  
 	{
 		$email = $_POST["email"];
 		$password = $_POST["password"];
 	 	$ambil = $koneksi->query("SELECT * FROM pelanggan 
 	 		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

 	 	//ngitung akun yang terambil
 	 	$akunyangcocok = $ambil-> num_rows;

 	 	//jika 1 akun yg cocok, boleh login

 	 	if ($akunyangcocok==1) 
 	 	{
 	 		//anda sudah login 
 	 		$akun=$ambil->fetch_assoc();

 	 		$_SESSION["pelanggan"] = $akun; 
 	 	 	echo "<script>alert('Anda Berhasil Login'); </script>";
 	 	 	
 	 	 	//jika sudah belanja
 	 	 	if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
 	 	 	{
 	 			echo "<script>location='checkout.php'; </script>";
 	 	 	}
 	 	 	else 
 	 	 	{
 	 			echo "<script>location='riwayat.php'; </script>";
 	 	 	}
 	 	}
 	 	else
 	 	{
 	 		//anda ggagl login
 	 		echo "<script>alert('Anda Gagal Login, Periksa Kembali Akun Anda'); </script>";
 	 		echo "<script>location='login.php'; </script>";
 	 	}
 	 } 
 	 ?>
</body>
</html>















