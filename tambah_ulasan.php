<?php
include 'header.php';
include 'navbar.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['userID'])) {
    // Jika belum login, alihkan ke halaman login atau tindakan lainnya
    header("Location: login.php");
    exit();
}

// Ambil userID dari sesi
$userID = $_SESSION['userID'];

// Anda mungkin perlu mengganti ini dengan metode yang sesuai untuk mendapatkan bukuID
$bukuID = $_GET['bukuID'] ?? 0;

// Ambil judul buku dari tabel buku dan ulasan menggunakan INNER JOIN
include '../koneksi.php'; // Pastikan ini sesuai dengan file koneksi Anda

$query = "SELECT ulasan.bukuID, buku.judul
          FROM ulasan
          JOIN buku ON ulasan.bukuID = buku.bukuID
          WHERE ulasan.bukuID = $bukuID";

$result = mysqli_query($koneksi, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $judulBuku = $row['judul'];
    } else {
        $judulBuku = "Judul Tidak Ditemukan"; // Atur pesan default atau tindakan lainnya
    }
} else {
    // Tampilkan pesan kesalahan jika query gagal
    echo "Error: " . mysqli_error($koneksi);
}

?>

<div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <form method="post" action="proses_simpan_ulasan.php">
                    <div class="form-group">
                        <label>Username</label>
                        <!-- Tampilkan username pengguna yang sedang login -->
                        <input type="text" class="form-control" name="username" value="<?php echo $userID; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <!-- Tampilkan judul buku berdasarkan bukuID -->
                        <input type="text" class="form-control" name="judul" value="<?php echo $judulBuku; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Posting</label>
                        <input type="text" class="form-control" name="tgl_post" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ulasan</label>
                        <input type="text" class="form-control" name="ulasan">
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" class="form-control" name="rating">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary btn-sm mt-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
