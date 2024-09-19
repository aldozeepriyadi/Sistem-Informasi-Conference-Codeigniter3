<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMC</title>
    <link rel="stylesheet" href="<?php echo base_url('aset/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('aset/css/pages/auth.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('aset/images/logo/AT.png') ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="<?php echo base_url('images/background.jpg') ?>" style=" height:868.13px ;">
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="card" style="border-radius:0;">
                    <div id="auth-left">
                        <div class="card-body">
                            <div class="auth-logo">
                                <a href="index.html"><img src="<?php echo base_url('aset/images/logo/ATL.png') ?>" alt="Logo"></a>
                            </div>
                            <h1 class="auth-title">Reset Kata Sandi</h1>
                            <p class="auth-subtitle ">Ganti kata sandi akun <?= $this->session->userdata('reset_email'); ?> </p>

                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('auth/changepassword'); ?>">
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" class="form-control form-control-xl" placeholder="Masukkan kata sandi baru" id="password1" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" class="form-control form-control-xl" placeholder="Ulangi kata sandi" id="password2" name="password2">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg ">Ubah Kata Sandi</button>
                            </form>
                            <div class="text-center  text-lg fs-4">
                                <p class='text-gray-600'>Sudah punya akun? <a href="<?php echo site_url('auth/login'); ?>" class="font-bold">Masuk</a>.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>