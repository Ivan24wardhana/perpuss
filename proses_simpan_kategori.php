<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$namakategori = $_POST['namakategori'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into kategoribuku values('','$namakategori')");
 
// mengalihkan halaman kembali ke index.php
header("location:kategori.php?pesan=simpan");
 
?>