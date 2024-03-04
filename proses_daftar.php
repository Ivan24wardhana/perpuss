<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into user values('','$username','$password','$email','$namalengkap','$alamat','3')");
//level 3 untuk peminjam buku
 
// mengalihkan halaman kembali ke index.php
header("location:index.php?pesan=info_daftar");
 
?>