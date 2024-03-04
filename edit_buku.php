<?php
include 'header.php';
include 'navbar.php';
?>
<?php 
include '../koneksi.php';
$bukuID = $_GET['bukuID'];
$data = mysqli_query($koneksi,"SELECT * FROM buku WHERE bukuID='$bukuID'");
while($d = mysqli_fetch_array($data)){
?>
<div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="proses_update_buku.php">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="hidden" name="bukuID" value="<?php echo $d['bukuID']; ?>">
                                <input type="text" class="form-control" value="<?php echo $d['judul']; ?>" name="judul">
                            </div>
                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" class="form-control" value="<?php echo $d['penulis']; ?>" name="penulis">
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" value="<?php echo $d['penerbit']; ?>" name="penerbit">
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control" value="<?php echo $d['tahunterbit']; ?>" name="tahunterbit">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary btn-sm mt-3">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php } ?>

<?php
include 'footer.php';
?>