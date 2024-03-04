<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahunterbit = $_POST['tahunterbit'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into buku values('','$judul','$penulis','$penerbit','$tahunterbit')");
 
// mengalihkan halaman kembali ke index.php
header("location:buku.php?pesan=simpan");
 
?>