<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/head.php') ?>
</head>

<body id="page-top">

    <div class="container pt-5">
        <div class="text-center mb-3">
            <h1>Laporan Barang Keluar</h1>
            <div>Tanggal <?= tanggal($this->input->get('start_date')) ?> s/d <?= tanggal($this->input->get('end_date')) ?></div>
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

    <?php $this->load->view('components/scripts') ?>

    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>

</body>

</html>