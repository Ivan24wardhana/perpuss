<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$kategoriID = $_GET['kategoriID'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from kategoribuku where kategoriID='$kategoriID'");
 
// mengalihkan halaman kembali ke index.php
header("location:kategori.php?pesan=hapus");;
 
?>