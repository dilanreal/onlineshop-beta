<?php 
session_start();
include 'koneksi.php';
if (empty($_SESSION['keranjang'])OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang Kosong, Silahkan Belanja Terlebih Dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Barrald-Shop | Keranjang</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1> <br>
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Produk</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Subharga</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomer=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					
                <?php 				
                   $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                   $pecah = $ambil->fetch_assoc();
                   $subharga = $pecah["harga_produk"] * $jumlah;


                ?>

          
				<tr>
					<td><?php echo $nomer; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td>Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
					<td><?php echo $jumlah ?></td>
					<td>Rp.<?php echo $subharga;  ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Apakah anda yakin ingin menghapus produk ini ?')" >Hapus</a>

					</td>
				</tr>
				<?php $nomer++; ?>
       
				<?php endforeach ?>
					
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default"> Lanjut Belanja </a>
		<a href="checkout.php" class="btn btn-success"> Checkout </a>
	</div>
</section>
</body>
</html>