<?php if ($message = $this->session->flashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
        <?= $message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif ($message = $this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show text-sm" role="alert">
        <?= $message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif ($message = $this->session->flashdata('warning')) : ?>
    <div class="alert alert-warning alert-dismissible fade show text-sm" role="alert">
        <?= $message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>