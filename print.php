<?php
include '../koneksi.php';

// Mulai session jika belum aktif
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the session data exists
if (isset($_SESSION['selesaiData'])) {
    $selesaiData = $_SESSION['selesaiData'];
    unset($_SESSION['selesaiData']); // Remove the session data after using it

    // Output the details
    echo "<div class='content mt-3'>";
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h2>Printed Details</h2>";
    echo "Peminjaman ID: " . $selesaiData['peminjamanID'] . "<br>";
    echo "Judul: " . $selesaiData['judul'] . "<br>";
    echo "Tanggal Peminjaman: " . $selesaiData['tanggalpeminjaman'] . "<br>";
    echo "Tanggal Pengembalian: " . $selesaiData['tanggalpengembalian'] . "<br>";
    echo "Status Peminjaman: " . $selesaiData['statuspeminjaman'] . "<br>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    // Redirect to laporan_peminjaman.php if session data is not available
    header("location: laporanpeminjaman.php");
    exit();
}

// Include the footer
include 'footer.php';
?>
