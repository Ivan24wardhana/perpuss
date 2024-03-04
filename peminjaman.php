<?php
include 'header.php';
include 'navbar.php';
?>
<div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <!-- Your existing code for displaying alerts -->
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="simpan"){
                    echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
                }
            }
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="update"){
                    echo "<div class='alert alert-success'>Data berhasil diupdate</div>";
                }
            }
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="hapus"){
                    echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
                }
            }
            ?>
            <a href="tambah_peminjaman.php" class="btn btn-primary btn-sm mt-2">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                        <th>Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.bukuID=buku.bukuID");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['judul']; ?></td>
                            <td><?php echo $d['tanggalpeminjaman']; ?></td>
                            <td><?php echo $d['tanggalpengembalian']; ?></td>
                            <td><?php echo $d['statuspeminjaman']; ?></td>
                            <td>
                                <a href="edit_peminjaman.php?peminjamanID=<?php echo $d['peminjamanID']; ?>" class="btn btn-warning btn-sm mb-3">Edit</a>
                                <a href="proses_hapus_peminjaman.php?peminjamanID=<?php echo $d['peminjamanID']; ?>" class="btn btn-danger btn-sm mb-3">Hapus</a>
                            </td>
                            <td>
                            <button class="btn btn-success btn-sm mb-3" onclick="printPage()">Print</button>
                            <script>
                                function printPage() {
                                    window.print();
                                }
                            </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
