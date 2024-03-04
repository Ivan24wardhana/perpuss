<?php
include 'header.php';
include 'navbar.php';
?>
<?php 
include '../koneksi.php';
$kategoriID = $_GET['kategoriID'];
$data = mysqli_query($koneksi,"SELECT * FROM kategoribuku WHERE kategoriID='$kategoriID'");
while($d = mysqli_fetch_array($data)){
?>
<div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="proses_update_kategori.php">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="hidden" name="kategoriID" value="<?php echo $d['kategoriID']; ?>">
                                <input type="text" class="form-control" value="<?php echo $d['namakategori']; ?>" name="namakategori">
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