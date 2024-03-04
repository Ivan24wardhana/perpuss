<?php
include 'header.php';
include 'navbar.php';

if(isset($_GET['peminjamanID'])){
    $peminjamanID = $_GET['peminjamanID'];

    // Fetch the data for the specified peminjamanID and use it for editing
    include '../koneksi.php';
    $query = "SELECT * FROM peminjaman WHERE peminjamanID = $peminjamanID";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the data in the database
            $peminjamanID = mysqli_real_escape_string($koneksi, $_POST['peminjamanID']);
            $tanggalpeminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggalpeminjaman']);
            $tanggalpengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggalpengembalian']);
            $statuspeminjaman = mysqli_real_escape_string($koneksi, $_POST['statuspeminjaman']);

            $updateQuery = "UPDATE peminjaman SET tanggalpeminjaman='$tanggalpeminjaman', tanggalpengembalian='$tanggalpengembalian', statuspeminjaman='$statuspeminjaman' WHERE peminjamanID='$peminjamanID'";

            if(mysqli_query($koneksi, $updateQuery)){
                echo "<div class='alert alert-success'>Data berhasil diupdate</div>";
            } else {
                echo "Error updating record: " . mysqli_error($koneksi);
            }
        }

        // Rest of your editing form code goes here
        ?>
        <div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="">
                            <input type="hidden" name="peminjamanID" value="<?php echo $row['peminjamanID']; ?>">
                            <div class="form-group">
                                <label for="tanggalpeminjaman">Tanggal Peminjaman</label>
                                <input type="text" class="form-control" value="<?php echo $row['tanggalpeminjaman']; ?>" name="tanggalpeminjaman">
                            </div>
                            
                            <div class="form-group">
                                <label for="tanggalpengembalian">Tanggal Pengembalian</label>
                                <input type="text" class="form-control" value="<?php echo $row['tanggalpengembalian']; ?>" name="tanggalpengembalian">
                            </div>
                            
                            <div class="form-group">
                                <label>Status Peminjaman</label>
                                <select class="form-control" name="statuspeminjaman">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Di Pinjam">Di Pinjam</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary btn-sm mt-3">Update</button>
                                <a href="peminjaman.php" class="form-control btn btn-danger btn-sm mt-3">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Data peminjaman tidak ditemukan.";
    }
} else {
    echo "Peminjaman ID tidak ditemukan dalam URL.";
}

include 'footer.php';
?>
