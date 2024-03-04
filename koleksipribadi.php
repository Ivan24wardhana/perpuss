<?php
// Sertakan file koneksi.php dan header.php
include_once "../koneksi.php";
include_once "header.php";
include_once "navbar.php";

// Cek apakah terdapat parameter 'action' dan 'bukuID' pada URL
if (isset($_GET['action'], $_GET['bukuID'])) {
    $action = $_GET['action'];
    $bukuID = $_GET['bukuID'];

    // Logika penambahan buku ke koleksi pada koleksi.php
    if ($action == 'tambah') {
        // Query untuk menambahkan buku ke koleksi
        $queryTambahKoleksi = "INSERT INTO koleksipribadi (bukuID) VALUES (?)";
        $stmtTambahKoleksi = mysqli_prepare($koneksi, $queryTambahKoleksi);

        // Periksa apakah persiapan pernyataan berhasil
        if ($stmtTambahKoleksi) {
            mysqli_stmt_bind_param($stmtTambahKoleksi, "i", $bukuID);
            
            $resultTambahKoleksi = mysqli_stmt_execute($stmtTambahKoleksi);

            if ($resultTambahKoleksi) {
                echo "<div class='alert alert-success' role='alert'>
                        <i class='fas fa-check-circle'></i> Buku berhasil ditambahkan ke koleksi.
                      </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        <i class='fas fa-times-circle'></i> Gagal menambahkan buku ke koleksi: " . mysqli_stmt_error($stmtTambahKoleksi) . ".
                      </div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    <i class='fas fa-exclamation-circle'></i> Gagal menyiapkan pernyataan SQL: " . mysqli_error($koneksi) . ".
                  </div>";
        }
    }

   // Logika penghapusan buku dari koleksi pada koleksi.php
if ($action == 'hapus') {
    // Query untuk menghapus buku dari koleksi
    $queryHapusKoleksi = "DELETE FROM koleksipribadi WHERE bukuID = ?";
    $stmtHapusKoleksi = mysqli_prepare($koneksi, $queryHapusKoleksi);
    
    // Periksa apakah persiapan pernyataan berhasil
    if ($stmtHapusKoleksi) {
        mysqli_stmt_bind_param($stmtHapusKoleksi, "i", $bukuID);

        $resultHapusKoleksi = mysqli_stmt_execute($stmtHapusKoleksi);

        if ($resultHapusKoleksi) {
            echo "<div class='alert alert-success' role='alert'>
                    <i class='fas fa-check-circle'></i> Buku berhasil dihapus dari koleksi.
                  </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    <i class='fas fa-times-circle'></i> Gagal menghapus buku dari koleksi: " . mysqli_stmt_error($stmtHapusKoleksi) . ".
                  </div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <i class='fas fa-exclamation-circle'></i> Gagal menyiapkan statement hapus koleksi.
              </div>";
    }
}

}

// Ambil data buku dalam koleksi
$queryKoleksi = "SELECT buku.* FROM buku INNER JOIN koleksipribadi ON buku.bukuID = koleksipribadi.bukuID";
$resultKoleksi = mysqli_query($koneksi, $queryKoleksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4"><i class='fas fa-book'></i> Koleksi Buku</h2>

        <!-- Tombol Kembali ke Index -->
        <a href="buku.php" class="btn btn-primary mb-3"><i class='fas fa-arrow-left'></i> Kembali</a>

        <!-- Tabel Daftar Buku dalam Koleksi -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultKoleksi) {
                    $booksInCollection = mysqli_fetch_all($resultKoleksi, MYSQLI_ASSOC);

                    $no = 1;
                    foreach ($booksInCollection as $book) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $book['judul']; ?></td>
                            <td><?php echo $book['penulis']; ?></td>
                            <td><?php echo $book['penerbit']; ?></td>
                            <td><?php echo $book['tahunterbit']; ?></td>
                        </tr>
                        <?php
                        $no++;
                    }
                } else {
                    // Gagal mendapatkan buku dalam koleksi
                    echo "Error: " . mysqli_error($koneksi);
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'footer.php';
?>
