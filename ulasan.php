<?php
include 'header.php';
include 'navbar.php';

?>

<div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){
                    echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
                } elseif($_GET['pesan']=="hapus"){
                    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
                }
            }
            ?>

            <a href="tambah_ulasan.php" class="btn btn-primary btn-sm mt-2">Tambah Ulasan</a>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>username</th>
                        <th>Judul</th>
                        <th>tanggal Posting</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;

                    // Periksa level pengguna untuk mendapatkan userID
                    if ($_SESSION['level'] == "1") { // Admin
                        $userID = $_SESSION['userID'];
                    } elseif ($_SESSION['level'] == "2") { // Pegawai
                        $userID = $_SESSION['userID'];
                    } elseif ($_SESSION['level'] == "3") { // Pengurus
                        $userID = $_SESSION['userID'];
                    }

                    // Periksa kesalahan SQL
                    $data = mysqli_query($koneksi, "SELECT * FROM ulasan");
                    if (!$data) {
                        printf("Error: %s\n", mysqli_error($koneksi));
                        exit();
                    }

                    while($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['judul']; ?></td>
                            <td><?php echo $d['tgl_post']; ?></td>
                            <td><?php echo $d['ulasan']; ?></td>                       
                            <td><?php echo $d['rating']; ?></td>                       
                            <td>
                                <?php
                                // Periksa apakah userID cocok dengan userID pengguna yang sedang login
                                if ($d['userID'] == $userID) {
                                    echo "<a href='proses_hapus_ulasan.php?bukuID={$d['ulasanID']}' class='btn btn-danger btn-sm mb-3'>Hapus</a>";
                                } else {
                                    echo "Tidak Ada Aksi";
                                }
                                ?>
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
