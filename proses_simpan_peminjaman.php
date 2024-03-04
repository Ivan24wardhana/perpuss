<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$bukuID = $_POST['bukuID'];
$tanggalpeminjaman = $_POST['tanggalpeminjaman'];
$tanggalpengembalian = $_POST['tanggalpengembalian'];
$statuspeminjaman = $_POST['statuspeminjaman'];

// menggunakan prepared statement untuk menghindari SQL injection
$stmt = $koneksi->prepare("INSERT INTO peminjaman VALUES (NULL, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisss", $userID, $bukuID, $tanggalpeminjaman, $tanggalpengembalian, $statuspeminjaman);

// eksekusi pernyataan SQL
if ($stmt->execute()) {
    // mengalihkan halaman kembali ke peminjaman.php dengan pesan sukses
    header("location:peminjaman.php?pesan=simpan");
} else {
    // mengalihkan halaman kembali dengan pesan error jika terjadi masalah
    header("location:peminjaman.php?pesan=error");
}

// tutup prepared statement
$stmt->close();
// tutup koneksi database
$koneksi->close();
?>
