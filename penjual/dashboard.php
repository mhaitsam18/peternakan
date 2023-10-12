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
                        <h1 class="mt-4">Dashboard Penjual</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Penjual</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Produk</div>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#formModal">
                                    Tambah data Produk
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Gambar</th>
                                                <th width="80">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <?php $produk = $koneksi->select_produk(); 
                                        $no=1; ?>
                                        <tbody>
                                            <?php foreach ($produk as $key): ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $key['kode_produk'] ?></td>
                                                    <td><?= $key['nama_produk'] ?></td>
                                                    <td><?= $key['deskripsi_produk'] ?></td>
                                                    <td><?= $key['kategori_produk'] ?></td>
                                                    <td><?= $key['harga_produk'] ?></td>
                                                    <td><?= $key['stok_produk'] ?></td>
                                                    <td><img width="300" src="../<?= $key['gambar_produk'] ?>"></td>
                                                    <td>
                                                        <a href="../Koneksi.php?update_produk" data-toggle="modal" data-target="#formModal" class="badge badge-success float-right ml-1 tampilModalUbah" data-id="<?=$key['kode_produk']?>">Ubah</a>
                                                        <a href="../Koneksi.php?delete_produk=<?=$key['kode_produk'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Anda yakin?');">Hapus</a>
                                                    </td>
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
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Ubah data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../Koneksi.php?insert_produk" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="penjual" value="<?= $_SESSION['user_penjual'] ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="text" class="form-control" id="kode_produk" name="kode_produk">
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_produk">Deskripsi Produk</label>
                                <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk">
                                    
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori_produk">Kategori Produk</label>
                                <select class="form-control" id="kategori_produk" name="kategori_produk" >
                                    <option disabled selected>--Pilih Kategori--</option>
                                    <option value="Sapi">Sapi</option>
                                    <option value="Kambing">Kambing</option>
                                    <option value="Ayam">Ayam</option>
                                    <option value="Pakan">Pakan</option>
                                    <option value="Olahan">Olahan</option>
                                    <option value="Alat Peternakan">Alat Peternakan</option>
                                    <option value="Kandang">Kandang</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga_produk">Harga Produk</label>
                                <input type="number" class="form-control" id="harga_produk" name="harga_produk">
                            </div>
                            <div class="form-group">
                                <label for="stok_produk">Stok Produk</label>
                                <input type="number" class="form-control" id="stok_produk" name="stok_produk">
                            </div>
                            <div class="form-group">
                                <label for="gambar_produk">Gambar Produk</label>
                                <input type="file" class="form-control-file" id="gambar_produk" name="gambar_produk">
                            </div>              
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
                        </div>
                    </form>
                </div>
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
        <script type="text/javascript">
            $(function() {
                $('.tombolTambahData').on('click', function(){
                    $('#judulModal').html('Tambah Data Produk');
                    $('.modal-footer button[type=submit]').html('Tambah Data');
                    $('.modal-content form')[0].reset();
                });

                $('.tampilModalUbah').on('click', function() {
                    $('#judulModal').html('Ubah Data Mahasiswa');
                    $('.modal-footer button[type=submit]').html('Ubah Data');
                    $('.modal-content form').attr('action', '../Koneksi.php?update_produk');
                    $('#kode_produk').attr('readonly','');
                    const id = $(this).data('id');
                    jQuery.ajax({
                        url: '../Koneksi.php?getUpdate_Produk',
                        data: {id : id},
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#kode_produk').val(data.kode_produk);
                            $('#nama_produk').val(data.nama_produk);
                            $('#deskripsi_produk').val(data.deskripsi_produk);
                            $('#kategori_produk').val(data.kategori_produk);
                            $('#harga_produk').val(data.harga_produk);
                            $('#stok_produk').val(data.stok_produk);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
<?php else: ?>
    <?php header('location: login.php'); ?>
<?php endif ?>
