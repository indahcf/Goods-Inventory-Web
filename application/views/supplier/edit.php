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
                        <h3 class="text-gray-800 mb-0"><i class="fas fa-store"></i> Data Supplier</h3>
                        <a href="<?= base_url('supplier') ?>" class="btn btn-secondary"> <i class="fas fa-arrow-left mr-2"></i> Kembali</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Ubah Data Supplier</h6>
                        </div>
                        <form action="<?= base_url('supplier/edit', $supplier->id) ?>" method="POST" novalidate>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value('name', $supplier->name); ?>" required>
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="phone">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" id="phone" class="form-control <?= form_error('phone') ? 'is-invalid' : ''; ?>" value="<?= set_value('phone', $supplier->phone); ?>" required>
                                        <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="address">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" id="address" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>" cols="30" rows="5" required><?= set_value('address', $supplier->address); ?></textarea>
                                        <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control <?= form_error('status') ? 'is-invalid' : ''; ?>" name="status" id="status" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="active" <?= set_value('status', $supplier->status) == 'active' ? 'selected' : '' ?>>Active</option>
                                            <option value="inactive" <?= set_value('status', $supplier->status) == 'inactive'  ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
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

</body>

</html>