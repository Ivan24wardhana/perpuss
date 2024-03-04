<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$kategoribukuID = $_POST['kategoribukuID'];
$bukuID = $_POST['bukuID'];
$kategoriID = $_POST['kategoriID'];
 
// menginput data ke database
mysqli_query($koneksi,"update kategoribuku_relasi set bukuID='$bukuID', kategoriID='$kategoriID' where kategoribukuID='$kategoribukuID'");
 
// mengalihkan halaman kembali ke index.php
header("location:koleksi.php?pesan=update");
 
?>