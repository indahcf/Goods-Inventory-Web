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
                        <h3 class="text-gray-800 mb-0"><i class="fas fa-box"></i> Data Barang</h3>
                        <a href="<?= base_url('item') ?>" class="btn btn-secondary"> <i class="fas fa-arrow-left mr-2"></i> Kembali</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Ubah Data Barang</h6>
                        </div>
                        <form action="<?= base_url('item/edit/'.$item->id) ?>" method="POST" novalidate>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value('name', $item->name); ?>" required>
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="category">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 <?= form_error('category_id') ? 'is-invalid' : ''; ?>" name="category_id" id="category" required>
                                            <option value="">--Pilih Kategori--</option>
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?= $category->id ?>" <?= set_value('category_id', $item->category_id) == $category->id ? 'selected' : '' ?>><?= $category->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('category_id', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="unit">Satuan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 <?= form_error('unit_id') ? 'is-invalid' : ''; ?>" name="unit_id" id="unit" required>
                                            <option value="">--Pilih Satuan--</option>
                                            <?php foreach ($units as $unit) : ?>
                                                <option value="<?= $unit->id ?>" <?= set_value('unit_id', $item->unit_id) == $unit->id ? 'selected' : '' ?>><?= $unit->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('unit_id', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="description">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" class="form-control <?= form_error('description') ? 'is-invalid' : ''; ?>" cols="30" rows="5" required><?= set_value('description', $item->description); ?></textarea>
                                        <?= form_error('description', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="price">Harga</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="price" id="price" class="form-control <?= form_error('price') ? 'is-invalid' : ''; ?>" value="<?= set_value('price', $item->price); ?>" required>
                                        </div>
                                        <?= form_error('price', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>

                                <div class=" form-group row">
                                    <label class="col-sm-2 col-form-label" for="stock">Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="stock" id="stock" class="form-control <?= form_error('stock') ? 'is-invalid' : ''; ?>" value="<?= set_value('stock', $item->stock); ?>" required>
                                        <?= form_error('stock', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control <?= form_error('status') ? 'is-invalid' : ''; ?>" name="status" id="status" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="active" <?= set_value('status', $item->status) == 'active' ? 'selected' : '' ?>>Active</option>
                                            <option value="inactive" <?= set_value('status', $item->status) == 'inactive' ? 'selected' : '' ?>>Inactive</option>
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