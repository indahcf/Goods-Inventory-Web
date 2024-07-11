<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/head.php') ?>
</head>

<body id="page-top">

    <div class="container pt-5">
        <div class="text-center mb-3">
            <h1>Laporan Barang Masuk</h1>
            <div>Tanggal <?= tanggal($this->input->get('start_date')) ?> s/d <?= tanggal($this->input->get('end_date'))?></div>
        </div>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php $this->load->view('components/scripts') ?>

    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>

</body>

</html>