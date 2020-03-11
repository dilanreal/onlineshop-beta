	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>	
				<li><a href="checkout.php">Checkout</a></li>
				<li><a href="riwayat.php">Riwayat Belanja</a></li>
				<!---Jika sudah login(ada session pelanggan)-->
				<?php if(isset($_SESSION['pelanggan'])): ?>
					<li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin Logout?')">Logout</a></li>
				<!---Jika belum login(tidak ada session pelanggan)-->	
				<?php else : ?>		
				<li><a href="daftar.php">Daftar</a></li>
				<li><a href="login.php">Login</a></li>
			<?php endif ?>
			</ul>
			<form action="search.php" method="get" class="navbar-form navbar-right" >
				<input type="text" class="form-control" name="keyword">
				<button class="btn btn-primary">Search</button>
			</form>			
		</div>
	</nav>	