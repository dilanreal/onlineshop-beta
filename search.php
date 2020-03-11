<?php include 'koneksi.php'; ?>
<?php 
$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
	OR deskripsi_produk LIKE '%$keyword%'");
 while ($pecah = $ambil->fetch_assoc()) 
 	{
 		$semuadata[]=$pecah;
 	}	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>

<div class="container">
	<h3>Hasil Pencarian : <?php echo $keyword ?></h3>
	
	<div class="row">
	<?php foreach ($semuadata as $key => $value): ?>

	<?php if (empty($semuadata)): ?>
	maaf huruf www hhhh oooo	<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
	<?php endif ?>
	
		<div class="col-md-3">
			<div class="thumbnail">
			<img src="foto_produk/<?php echo $value["foto_produk"] ?>" alt="" class="img-responsive">
			<div class="caption text-center">
				<h3><?php echo $value["nama_produk"] ?></h3>
				<h5>Rp. <?php echo number_format($value['harga_produk']) ?></h5>
				<a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Beli</a>main berbies
				<a href="detail.php=<?php echo $value["id_produk"]; ?>" class="btn btn-default">Detail</a>main 
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>

</body>
</html>