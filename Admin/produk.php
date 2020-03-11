<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th> No </th>
			<th> Nama </th>
			<th> Harga </th>
			<th> Berat </th>
			<th> Foto </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomer=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomer; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['berat_produk']; ?>(Gr.)</td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" 
					class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" 
					class="btn btn-primary">Ubah</a>


			</td>
		</tr>
<?php $nomer++; ?>		
<?php } ?>
	</tbody>
</table>
	 			<a href="index.php?halaman=tambahproduk" class= "btn btn-primary"> Tambah Produk </a>
 