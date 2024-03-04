<?php
include 'header.php';
include 'navbar.php';
?>
<div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="proses_simpan_koleksi.php">
                            <div class="form-group">
                                <label>Pilih Buku</label>
                                <select class="form-control mt-2" name="bukuID">
                                    <option>Silahkan Pilih</option>
                                    <?php 
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi,"select * from buku");
                                    while($d_buku = mysqli_fetch_array($data)){ ?>
                                    <option value="<?php echo $d_buku['bukuID']; ?>"><?php echo $d_buku['judul']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kategori</label>
                                <select class="form-control mt-2" name="kategoriID">
                                    <option>Silahkan Pilih</option>
                                    <?php 
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi,"select * from kategoribuku");
                                    while($d_kategoribuku = mysqli_fetch_array($data)){ ?>
                                    <option value="<?php echo $d_kategoribuku['kategoriID']; ?>"><?php echo $d_kategoribuku['namakategori']; ?></option>
                                    <?php } ?>
                                </select>
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