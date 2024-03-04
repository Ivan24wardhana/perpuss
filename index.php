<?php
include 'header.php';
include 'navbar.php';
?>
        
        <div class="content mt-3">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body bg-warning text-center">
                            <h3>Data Buku</h3>
                            <h2>3</h2>
                            <a href="#" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body bg-danger text-center">
                            <h3>Kategori Buku</h3>
                            <h2>3</h2>
                            <a href="#" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body bg-info text-center">
                            <h3>Users</h3>
                            <h2>3</h2>
                            <a href="#" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body bg-primary text-center">
                            <h3>Peminjaman</h3>
                            <h2>3</h2>
                            <a href="#" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
                </div>
            </div>
        </div>
<?php
include 'footer.php';
?>