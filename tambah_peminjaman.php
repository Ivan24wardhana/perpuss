<?php
include 'header.php';
include 'navbar.php';
?>
<div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="proses_simpan_peminjaman.php">
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
                                <label>Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggalpeminjaman">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tanggalpengembalian">
                            </div>
                            <div class="form-group">
                                <label>Status Peminjaman</label>
                                <select class="form-control" name="statuspeminjaman">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Di Pinjam">Di Pinjam</option>
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