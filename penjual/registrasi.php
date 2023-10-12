<?php include_once '../koneksi.php'; ?>
<?php if (empty($_SESSION['user_penjual'])): ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrasi Penjual</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                        <form action="../Koneksi.php?insert_penjual" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama Depan</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Nama Depan" name="nama_depan" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Nama Belakang</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Nama Belakang" name="nama_belakang" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Email" name="email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNoPonsel">Nomor Ponsel</label>
                                                <input class="form-control py-4" id="inputNoPonsel" type="number" placeholder="08xxxxxxx" name="no_ponsel" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNoIndentitas">KTP/SIM/PASPOR</label>
                                                <input class="form-control py-4" id="inputNoIndentitas" type="text" placeholder="No. Identitas" name="no_identitas" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAlamat">Alamat</label>
                                                <textarea class="form-control" id="inputAlamat" rows="3" name="alamat"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFoto">Upload Foto Profil</label>
                                                <input type="file" class="form-control-file" id="inputFoto" name="foto">
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" id="inputUsername" type="text" placeholder="Username" name="username" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Kata Sandi" name="password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Konfirmasi Kata Sandi</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Konfirmasi Kata Sandi" name="konfirmasi" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" name="submit">Buat Akun</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Sudah punya akun? pergi ke login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Peternakan 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php else: ?>
    <?php header('location: dashboard.php'); ?>
<?php endif ?>