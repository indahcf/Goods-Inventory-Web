<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/head.php') ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('components/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('components/navbar.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-gray-800 mb-0"><i class="fas fa-download"></i> Data Barang Masuk</h3>
                        <a href="<?= base_url('incoming/create') ?>" class="btn btn-success"> <i class="fas fa-plus mr-2"></i> Tambah Data</a>
                        <!-- <div class="btn btn-success" data-toggle="modal" data-target="#createModal"> <i class="fas fa-plus mr-2"></i> Tambah Data</div> -->
                    </div>

                    <?php $this->load->view('components/alert.php') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">List Data Barang Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Transaksi</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kuantitas</th>
                                            <th>Supplier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($incomings as $incoming) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= tanggal($incoming->created_at) ?></td>
                                                <td><?= kode($incoming->id, 'TRM') ?></td>
                                                <td><?= kode($incoming->item_id, 'BRG') ?></td>
                                                <td><?= $incoming->item_name ?></td>
                                                <td><?= $incoming->qty ?></td>
                                                <td><?= $incoming->supplier_name ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- <a href="<?= base_url('incoming/edit/'.$incoming->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a> -->
                                                        <a href="<?= base_url('incoming/delete/'.$incoming->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('components/footer.php') ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <?php $this->load->view('components/logout_modal.php') ?>

    <?php $this->load->view('components/scripts') ?>

    <script>
        $('table').dataTable();
    </script>
</body>

</html>