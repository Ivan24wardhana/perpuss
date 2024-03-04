<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$peminjamanID = $_GET['peminjamanID'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from peminjaman where peminjamanID='$peminjamanID'");
 
// mengalihkan halaman kembali ke index.php
header("location:peminjaman.php?pesan=hapus");;
 
?>