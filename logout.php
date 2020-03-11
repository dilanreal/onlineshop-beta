<?php 
session_start();

//menghancurkan session
session_destroy();

echo "<script>alert('Anda Telah Logout! Silahkan Login Untuk Belanja');</script>";
echo "<script>location='index.php';</script>";


 ?>