<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$kategoriID = $_POST['kategoriID'];
$namakategori = $_POST['namakategori'];
 
// menginput data ke database
mysqli_query($koneksi,"update kategoribuku set namakategori='$namakategori' where kategoriID='$kategoriID'");
 
// mengalihkan halaman kembali ke index.php
header("location:kategori.php?pesan=update");
 
?>