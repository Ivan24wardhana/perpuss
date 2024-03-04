<?php
include 'header.php';
include 'navbar.php';
?>
<div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="proses_simpan_buku.php">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul">
                            </div>
                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" class="form-control" name="penulis">
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit">
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahunterbit">
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