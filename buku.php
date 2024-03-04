<?php
include 'header.php';
include 'navbar.php';

// Fungsi untuk mendapatkan rata-rata rating
function getAverageRating($koneksi, $bukuID) {
    $query = "SELECT AVG(rating) AS averageRating FROM ulasanbuku WHERE bukuID = ?";
    $stmt = $koneksi->prepare($query);

    if (!$stmt) {
        die('Error preparing the query: ' . $koneksi->error);
    }

    $stmt->bind_param("i", $bukuID);
    $stmt->execute();

    if ($stmt->error) {
        die('Error executing the statement: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    $averageRating = $result->fetch_assoc()['averageRating'];
    $stmt->close();

    return $averageRating;
}

?>
<div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){
                    echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
                } elseif($_GET['pesan']=="update"){
                    echo "<div class='alert alert-success'>Data berhasil diupdate</div>";
                } elseif($_GET['pesan']=="hapus"){
                    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
                }
            }
            ?>
            <a href="tambah_buku.php" class="btn btn-primary btn-sm mt-2">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Koleksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM buku");
                    while($d = mysqli_fetch_array($data)){
                        $bukuID = $d['bukuID'];
                        $koleksiStatus = ''; // Variabel untuk menyimpan status koleksi (ada/tidak)
                        
                        // Query untuk mengecek apakah buku ada dalam koleksi
                        $queryKoleksi = "SELECT * FROM koleksipribadi WHERE bukuID = $bukuID";
                        $resultKoleksi = mysqli_query($koneksi, $queryKoleksi);

                        if ($resultKoleksi && mysqli_num_rows($resultKoleksi) > 0) {
                            $koleksiStatus = 'ada';
                        }
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['judul']; ?></td>
                        <td><?php echo $d['penulis']; ?></td>
                        <td><?php echo $d['penerbit']; ?></td>
                        <td><?php echo $d['tahunterbit']; ?></td>                       
                        <td>
                            <a href="edit_buku.php?bukuID=<?php echo $d['bukuID']; ?>" class="btn btn-warning btn-sm mb-3">Edit</a>
                            <a href="proses_hapus_buku.php?bukuID=<?php echo $d['bukuID']; ?>" class="btn btn-danger btn-sm mb-3">Hapus</a>
                        </td>
                        <td>                        
                            <a href='ulasan.php?bukuID=<?php echo $d['bukuID']; ?>' class='btn btn-warning'>Ulasan</a>
                        </td>
                        <td>
                            <?php
                            $averageRating = getAverageRating($koneksi, (int)$d['bukuID']);
                            echo ($averageRating !== null) ? number_format($averageRating, 1) . "/5.0" : 'Belum Ada Ulasan';
                            ?>
                        </td>
                        <td>
                            <!-- Tambahkan tombol/ikon koleksi di sini -->
                            <?php if ($koleksiStatus == 'ada') : ?>
                                <a href='koleksipribadi.php?action=hapus&bukuID=<?php echo $bukuID; ?>' class='btn btn-success'><i class='fas fa-minus'></i></a>
                            <?php else : ?>
                                <a href='koleksipribadi.php?action=tambah&bukuID=<?php echo $bukuID; ?>' class='btn btn-secondary'><i class='fas fa-plus'></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<?php
include 'footer.php';
?>
