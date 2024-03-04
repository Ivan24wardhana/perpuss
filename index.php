<!DOCTYPE html>
<html>
<head>
    <title>Form Login Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card mt-5 md-5">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <img src="assets/img/login.png" width="500">
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h5>Silahkan Masukan Username dan Password</h5>
                            <?php 
                                if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="gagal"){
                                echo "<div class='alert alert-danger'>Username dan Password tidak sesuai !</div>";
                                }
                            }
                                if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_login"){
                                echo "<div class='alert alert-danger'>Maaf anda belum login !!!</div>";
                                }
                            }
                                if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_logout"){
                                echo "<div class='alert alert-primary'>Anda berhasil logout !!!</div>";
                                }
                            }
                                if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_daftar"){
                                echo "<div class='alert alert-primary'>Anda berhasil daftar akun !!!</div>";
                                }
                            }
                            ?>
                            <form method="post" action="cek_login.php">
                            <form>
                                <div class="form-group mt-5">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Belum punya akun? klik tombol berikut :</label>
                                    <a href="daftar.php" class="btn btn-warning btn-sm">Daftar Akun</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>