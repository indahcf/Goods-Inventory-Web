<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/head.php') ?>
</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12 col-lg-6 my-4">
                <div class="text-white text-center">
                    <i class="fas fa-boxes fa-5x mb-3"></i>
                    <h2>Sistem Informasi Inventaris Barang</h2>
                </div>

                <div class="card o-hidden border-0 shadow-lg mt-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                            </div>

                            <?php $this->load->view('components/alert.php') ?>

                            <form class="user" action="<?= base_url('auth/login') ?>" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?= form_error('status') ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= set_value('email'); ?>" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user <?= form_error('status') ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>

                                </div>
                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                                </button>
                            </form>
                            <!-- <hr> -->
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php $this->load->view('components/scripts') ?>

</body>

</html>