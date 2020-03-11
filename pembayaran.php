<?php 
session_start();

//koneksi database
include 'koneksi.php';

// jika tidak ada session pelanggan (belum login)
if(!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian ='$idpem'");
$detpem = $ambil->fetch_assoc();



//Mendapatkan id_pembelian yang beli
$id_pelanggan_beli = $detpem['id_pelanggan'];

//mendapatkan id+pelanggan dari login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !== $id_pelanggan_beli) 
{
	echo "<script>alert('Jangan Nakal!');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pembayaran | Barqi-Electronic</title>
 	 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">

 </head>
 <body>

<?php include 'menu.php'; ?>

<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Kirim Bukti Pembayaran Di sini</p>
	<div class="alert alert-info">Total Pembayaran Anda <strong>Rp.<?php echo number_format($detpem['total_pembelian']) ?></strong></div>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Penyetor</label>
			<input type="text" class="form-control" name="nama">
		</div>

		<div class="form-group">
			<label>Bank</label>
			<input type="text" class="form-control" name="bank">
		</div>

		<div class="form-group">
			<label>Jumlah</label>
			<input type="number" class="form-control" name="jumlah">
		</div>

		<div class="form-group">
			<label>Foto Bukti</label>
			<input type="file" class="form-control" name="bukti">
			<p class="text-danger">Foto Bukti Maksimal 2MB</p>
		</div>
		<button class="btn btn-primary" name="kirim">Kirim</button>
	</form>
</div>
 
 <?php 

// jika tombol kirim ditekan
 if (isset($_POST['kirim'])) 
 {
 	 //upload foto bukti
 	$namabukti = $_FILES['bukti']['name'];
 	$lokasibukti = $_FILES['bukti']['tmp_name'];
 	$namafix = date("YmdHis").$namabukti;
 	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

 	$nama = $_POST['nama'];
 	$bank = $_POST['bank'];
 	$jumlah = $_POST['jumlah'];
 	$tanggal = date ("Y-m-d");

 	//simpan pembayaran
 	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
 		VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");

 	//update data pembayaran
 	$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Kirim Pembayaran' 
 		WHERE id_pembelian=	'$idpem'");
 	echo "<script>alert('Terimakasih Sudah Melakukan Pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
 }

  ?>

 </body>
 </html>
