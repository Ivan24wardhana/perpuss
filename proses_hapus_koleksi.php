<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$kategoribukuID = $_GET['kategoribukuID'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from kategoribuku_relasi where kategoribukuID='$kategoribukuID'");
 
// mengalihkan halaman kembali ke index.php
header("location:koleksi.php?pesan=hapus");;
 
?>