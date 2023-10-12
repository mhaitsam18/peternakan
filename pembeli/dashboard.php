<?php include_once '../Koneksi.php'; ?>
<?php if (!empty($_SESSION['user_pembeli'])): ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Penjual</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once 'sidebar.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard Pembeli</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Pembeli</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Hewan Ternak</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Pakan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Olahan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Alat/Perabotan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['pesanan'])) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Produk</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            $no=1;
                            $total_harga=0;
                            foreach ($_SESSION['pesanan'] as $kode_produk => $jml) {
                                $result   = $koneksi->select_produk_kode_produk($kode_produk);
                                $row      = $result->fetch_assoc();
                                $jmlharga = $row['harga_produk']*$jml;
                                 ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?>.</th>
                                        <td><?php echo $row['kode_produk']?></td>
                                        <td><?php echo $row['nama_produk']?></td>
                                        <td><?php echo "Rp.".number_format($row['harga_produk']).",00";?></td>
                                        <td><?php echo $jml;?></td>
                                        <td><?php echo "Rp.".number_format($jmlharga).",00";?></td>
                                        <td><a href="../koneksi.php?hapus_pesanan=<?=$row['kode_produk']?>" class="btn btn-danger">Kurang</a> 
                                        <a href="../koneksi.php?tambah_pesanan=<?=$row['kode_produk']?>" class="btn btn-primary">Tambah</a></td>
                                    </tr>
                                <?php
                                $no++;
                                $total_harga+=$jmlharga;
                                $_SESSION['total_harga']=$total_harga;
                            } ?>
                                    <tr>
                                        <td colspan="6" align="right">Total</td>
                                        <td colspan="2" align="left"><?php echo "Rp.".number_format($total_harga).",00"; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" align="right">
                                            <a href="../Koneksi.php?pesan" class="btn btn-info">Pesan</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        } ?>
                        <div class="row mb-3 ml-1">
                            <?php $produk = $koneksi->select_produk(); 
                            $no=1; ?>                
                            <?php foreach ($produk as $key): ?>
                                <div class="card mb-4 mr-3" style="width: 18rem;">
                                    <img src="../<?= $key['gambar_produk'] ?>" height="200" class="card-img-top" alt="../img/image-not-found.jpg">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $key['kategori_produk'] ?></h5>
                                        <p class="card-text"><?= $key['deskripsi_produk'] ?></p>
                                        <h6 class="card-text">Stok : <?=$key['stok_produk'] ?></h6>
                                        <a href="../koneksi.php?tambah_pesanan=<?= $key['kode_produk'] ?>" class="btn btn-primary">Beli</a> 
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </main>

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
        <script src="../js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php else: ?>
    <?php header('location: login.php'); ?>
<?php endif ?>
