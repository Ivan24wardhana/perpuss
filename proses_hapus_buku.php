<?php
include '../koneksi.php';

// menangkap data id yang dikirim dari URL
$bukuID = $_GET['bukuID'];

// hapus ulasan terlebih dahulu
$queryDeleteUlasan = "DELETE FROM ulasan WHERE bukuID = '$bukuID'";
$resultDeleteUlasan = mysqli_query($koneksi, $queryDeleteUlasan);

if (!$resultDeleteUlasan) {
    echo "Error deleting reviews: " . mysqli_error($koneksi);
    // Berhenti jika terjadi kesalahan saat menghapus ulasan
    exit;
}

// kemudian hapus buku setelah ulasan dihapus
$queryDeleteBuku = "DELETE FROM buku WHERE bukuID = '$bukuID'";
$resultDeleteBuku = mysqli_query($koneksi, $queryDeleteBuku);

// periksa hasil penghapusan buku
if ($resultDeleteBuku) {
    echo "Buku berhasil dihapus.";
} else {
    echo "Error deleting book: " . mysqli_error($koneksi);
}

// alihkan halaman kembali ke index.php
header("location: buku.php");
?>
