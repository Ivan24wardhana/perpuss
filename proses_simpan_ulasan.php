<?php
include '../koneksi.php';

// Cek apakah metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $bukuID = isset($_POST['bukuID']) ? intval($_POST['bukuID']) : 0;
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0;

    // Pastikan bahwa bukuID dan userID memiliki nilai yang valid
    if ($bukuID <= 0 || $userID <= 0) {
        die('Invalid bukuID or userID');
    }

    // Ambil data yang dikirimkan melalui form
    $ulasan = isset($_POST['ulasan']) ? htmlspecialchars($_POST['ulasan']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

    // Validasi ulasan dan rating
    if (empty($ulasan) || $rating < 1 || $rating > 5) {
        die('Invalid ulasan or rating');
    }

    // Tanggal post diambil secara otomatis
    $tgl_post = date('Y-m-d');

    // Cek apakah ulasan sudah ada untuk bukuID dan userID tertentu
    $queryCheck = "SELECT * FROM ulasanbuku WHERE bukuID = ? AND userID = ?";
    $stmtCheck = $koneksi->prepare($queryCheck);

    if (!$stmtCheck) {
        die('Error preparing the query: ' . $koneksi->error);
    }

    $stmtCheck->bind_param("ii", $bukuID, $userID);
    $stmtCheck->execute();

    if ($stmtCheck->error) {
        die('Error executing the statement: ' . $stmtCheck->error);
    }

    $resultCheck = $stmtCheck->get_result();

    // Jika ulasan sudah ada, lakukan update
    if ($resultCheck->num_rows > 0) {
        $queryUpdate = "UPDATE ulasanbuku SET ulasan = ?, rating = ?, tgl_post = ? WHERE bukuID = ? AND userID = ?";
        $stmtUpdate = $koneksi->prepare($queryUpdate);

        if (!$stmtUpdate) {
            die('Error preparing the update query: ' . $koneksi->error);
        }

        $stmtUpdate->bind_param("ssiis", $ulasan, $rating, $tgl_post, $bukuID, $userID);
        $stmtUpdate->execute();

        if ($stmtUpdate->error) {
            die('Error executing the update statement: ' . $stmtUpdate->error);
        }

        // Redirect kembali ke halaman ulasan.php dengan pesan update
        header("Location: ulasan.php?bukuID=$bukuID&pesan=update");
        exit();
    } else {       
        // Query untuk menyimpan ulasan ke dalam database
        $query = "INSERT INTO ulasanbuku (bukuID, userID, ulasan, rating, tgl_post) VALUES (?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);

        if (!$stmt) {
            die('Error preparing the query: ' . $koneksi->error);
        }

        $stmt->bind_param("iiss", $bukuID, $userID, $ulasan, $rating, $tgl_post);
        $stmt->execute();

        if ($stmt->error) {
            die('Error executing the statement: ' . $stmt->error);
        }

        // Redirect kembali ke halaman ulasan.php dengan pesan sukses
        header("Location: ulasan.php?bukuID=$bukuID&pesan=simpan");
        exit();
    }
}

// Jika bukan metode POST, redirect atau tampilkan pesan kesalahan
header("Location: tambah_ulasan.php");
exit();
?>
`