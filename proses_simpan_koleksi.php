<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$bukuID = $_POST['bukuID'];
$kategoriID = $_POST['kategoriID'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into kategoribuku_relasi values('','$bukuID','$kategoriID')");
 
// mengalihkan halaman kembali ke index.php
header("location:koleksi.php?pesan=simpan");
 
?>