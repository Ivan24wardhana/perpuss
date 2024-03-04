<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$bukuID = $_POST['bukuID'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahunterbit = $_POST['tahunterbit'];
 
// menginput data ke database
mysqli_query($koneksi,"update buku set judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit' where bukuID='$bukuID'");
 
// mengalihkan halaman kembali ke index.php
header("location:buku.php?pesan=update");
 
?>