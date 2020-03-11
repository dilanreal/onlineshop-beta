<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pengguna Baru</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container" style="margin-top: 100px">
	<div class="row" >
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><b> Barqi-Electronic | Daftar Pelanggan</b></h3>
				</div>

				<div class="panel-body">
					<form method="POST" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-7">
							<input type="text" class="form-control" name="nama" required>
						</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-7">
							<input type="email" class="form-control" name="email" required>
						</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-7">
							<input type="password" class="form-control" name="password" required>
						</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Konfirmasi Password</label>
							<div class="col-md-7">
							<input type="password" class="form-control" name="password2" required>
						</div>
						</div> 

						<div class="form-group">
							<label class="control-label col-md-3">Alamat</label>
							<div class="col-md-7">
							<textarea class="form-control" name="alamat" style="resize: none;" required></textarea>
						</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">No Telepon</label>
							<div class="col-md-7">
							<input type="text" class="form-control" name="telepon" required>
						</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary btn-block btn-lg" name="daftar">Daftar</button>
							</div>
						</div>
					</form>
					<?php 

					//jika tombol daftar ditekan
					if (isset($_POST['daftar'])) 
					{
					//mengambil isi nama,email,password,dll
						$nama = $_POST['nama'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						$password2 = $_POST['password2'];
						$alamat = $_POST['alamat'];
						$telepon = $_POST['telepon'];

						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
						$yangcocock = $ambil->num_rows;

						if ($yangcocock==1) {
							echo "<script> alert('Pendaftaran Gagal, Email Sudah Digunakan!')</script>";
							echo "<script> location='daftar.php';</script>";
						} elseif ($password != $password2) { 
							echo "<script> alert('Konfirmasi password tidak cocok')</script>";
							echo "<script> location='daftar.php';</script>";
						} else { 
							$koneksi->query("INSERT INTO pelanggan
								(email_pelanggan,password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email','$password','$nama','$telepon','$alamat')");

						echo "<script> alert('Pendaftaran Sukses, Silahkan Login!')</script>";
						echo "<script> location='login.php';</script>";
						}
					}

					 ?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>