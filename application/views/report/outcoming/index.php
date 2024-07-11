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
                        <h3 class="text-gray-800 mb-0"><i class="fas fa-print"></i> Laporan Barang Keluar</h3>
                    </div>

                    <?php $this->load->view('components/alert.php') ?>

                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Pilih Tanggal</h6>
                        </div>
                        <form action="<?= base_url('report/outcoming') ?>" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="startDate" class="form-label">Tanggal Awal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="start_date" id="startDate" value="<?= $this->input->get('start_date') ?>" class="form-control" required>
                                            <?= form_error('start_date', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="endDate" class="form-label">Tanggal Akhir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="end_date" id="endDate" value="<?= $this->input->get('end_date') ?>" class="form-control" required>
                                        </div>
                                        <?= form_error('end_date', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Set Tanggal</button>
                            </div>
                        </form>
                    </div>

                    <!-- DataTales Example -->
                    <?php if(count($outcomings) > 0): ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Laporan Barang Keluar <?= tanggal($this->input->get('start_date')) ?> s/d <?= tanggal($this->input->get('end_date')) ?> </h6>
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
                                            <th>Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($outcomings as $outcoming) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= tanggal($outcoming->created_at) ?></td>
                                                <td><?= kode($outcoming->id, 'TRK') ?></td>
                                                <td><?= kode($outcoming->item_id, 'BRG') ?></td>
                                                <td><?= $outcoming->item_name ?></td>
                                                <td><?= $outcoming->qty ?></td>
                                                <td><?= $outcoming->customer_name ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url('report/print_outcoming?start_date='.$this->input->get('start_date').'&end_date='.$this->input->get('end_date')) ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Cetak Laporan</a>
                        </div>
                    </div>
                    <?php endif; ?>

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