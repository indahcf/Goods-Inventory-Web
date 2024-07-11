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
                        <h3 class="text-gray-800 mb-0"><i class="fas fa-weight-hanging"></i> Data Satuan</h3>
                        <button class="btn btn-success" data-toggle="modal" data-target="#createModal"> <i class="fas fa-plus mr-2"></i> Tambah Data</button>
                        <!-- <div class="btn btn-success" data-toggle="modal" data-target="#createModal"> <i class="fas fa-plus mr-2"></i> Tambah Data</div> -->
                    </div>

                    <?php $this->load->view('components/alert.php') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">List Data Satuan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Satuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($categories as $unit) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $unit->name ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal_<?= $unit->id ?>"><i class="fas fa-edit"></i></button>
                                                        <a href="<?= base_url('unit/delete/' . $unit->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editModal_<?= $unit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Satuan</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('unit/update/' . $unit->id) ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Nama Satuan</label>
                                                                    <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value('name', $unit->name); ?>" required>
                                                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="<?= base_url('unit/store') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nama Satuan</label>
                                    <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value('name'); ?>" required>
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


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