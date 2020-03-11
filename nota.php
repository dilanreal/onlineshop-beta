
<?php
session_start(); 
include 'koneksi.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Baralld-Shop | Nota</title>
 		<link rel="stylesheet" href="admin/assets/css/bootstrap.css">

 </head>
 <body>
 
	<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">

<h2 class="text-center"> Nota Pembelian </h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc(); 
 ?>
 	<?php 

 	$id_pelangganygbeli = $detail['id_pelanggan'];
 	$id_pelangganlogin = $_SESSION['pelanggan']['id_pelanggan'];

 	if ($id_pelangganygbeli !== $id_pelangganlogin) {

 		echo "<script>alert('Jangan Nakal Yaa')</script>";
 		echo "<script>location = 'riwayat.php';</script>";
 		exit();
 	}

 	 ?>
<!--  <pre><?php print_r($detail); ?></pre> -->

 <div class="row">
 	<div class="col-md-4">
 		<h3> Pembelian</h3>
 		<strong>No. Pembelian &nbsp;&nbsp;&nbsp; : <?php echo $detail['id_pembelian']; ?></strong><br>
 		Tanggal &nbsp;&nbsp;&nbsp; : <?php echo $detail['tanggal_pembelian']; ?><br>
 		Total &nbsp;&nbsp;&nbsp; : Rp. <?php echo number_format($detail['total_pembelian']); ?>
 	</div>
 	<div class="col-md-4">
 		<h3> Pelanggan</h3>
 		<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong> <br>
 		 <p>
 	Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
 	Email &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['email_pelanggan']; ?>
 		</p>
</strong>
 	</div>
 	<div class="col-md-4">
 		<h3>Pengiriman</h3>
 		<strong><?php echo $detail['nama_kota']; ?></strong><br>
 		Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
 		Alamat &nbsp;&nbsp;&nbsp; : <?php echo $detail['alamat_pengiriman']; ?>
 	</div>
 </div>

 <table class="table table-bordered">
 <thead>
 	<tr>
 		<th>No.</th>
 		<th>Nama Produk</th>
 		<th>Harga</th>
 		<th>Berat(Gr)</th>
 		<th>Jumlah</th>
 		<th>Subberat(Gr)</th>
 		<th>Subtotal</th>
 	</tr>
 </thead>
 <tbody>
 	<?php $nomer=1; ?>
 	<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
 	<?php while($pecah = $ambil->fetch_assoc()) { ?>
 	<tr>
 		<td><?php echo $nomer; ?></td>
 		<td><?php echo $pecah['nama']; ?></td>
 		<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 		<td><?php echo $pecah['berat']; ?></td>
 		<td><?php echo $pecah['jumlah']; ?></td>
 		<td><?php echo $pecah['subberat']; ?></td>
 		<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
 	</tr>
 	<?php $nomer++; ?>
 <?php } ?>
  
 	</tbody>
 </table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Lakukan Pembayaran Sebesar Rp. <?php echo number_format($detail['total_pembelian']); ?> Ke <br>
				<strong>BANK BRI 123-456789 A.N Baralld-Shop</strong>
			</p>
		</div>
	</div>
</div>

</div>
</section>
</body>
</html>	