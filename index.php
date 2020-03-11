<?php  
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Barqi Store</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<center><h2><img src="foto_produk/barqistore2.jpg" height="120px" width="450px"></h2></center>

<?php include'menu.php'; ?>

<!-- konten -->
<section class="konten">
	<div class="container"> 
		<h1>Barqi Store Produk</h1>
		<br>

		<div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()) { ?>
			
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
					<div class="caption text-center">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
						<h6>Stok Produk :<?php echo $perproduk['stok_produk']; ?></h6>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success"> Beli</a>
							<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default"> Detail</a>
					</div>
				</div>
		</div>
<?php } ?>
		</div>
	</div>
</section>

</body>
</html>