<?php include_once '../Koneksi.php'; ?>
<?php if (!empty($_SESSION['user_penjual'])): ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rekap Penjualan</title>
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
                        <h1 class="mt-4">Rekap Penjualan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Rekap Penjualan</li>
                        </ol>
                        <!-- Button trigger modal -->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Rekap Penjualan</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Username</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Jumlah Total : </th>
                                                <?php $result = $koneksi->total_pemasukan();
                                                $row = $result->fetch_assoc(); ?>
                                                <th><?php echo $row['total']; ?></th>
                                            </tr>
                                        </tfoot>
                                        <?php $pemesanan = $koneksi->select_pemesanan(); 
                                        $no=1; ?>
                                        <tbody>
                                            <?php foreach ($pemesanan as $key): ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $key['username'] ?></td>
                                                    <td><?= $key['nama_produk'] ?></td>
                                                    <td><?= $key['jumlah'] ?></td>
                                                    <td><?= $key['subharga'] ?></td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
