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
                            <h3 class="auth-title mb-5">Login</h3>
                            <form class="user" method="post" action="<?php echo site_url('auth/login'); ?>">
                                <?php if ($this->session->flashdata('error') != '') {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo $this->session->flashdata('error');
                                    echo '</div>';
                                } else if ($this->session->flashdata('success_register') != '') {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo $this->session->flashdata('success_register');
                                    echo '</div>';
                                } ?>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" class="form-control form-control-user" placeholder="Email" id="email" name="email" required>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" class="form-control form-control-user" placeholder="Password" id="password" name="password" required>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    <div class="form-control-icon">
                                        <!-- <i class="bi bi-shield-lock"></i> -->
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                            </form>
                            <div class="text-center mt-5 text-lg fs-4">
                                <?php $this->session->set_flashdata('error', ''); ?>
                                <p class="text-gray-600">Tidak punya akun? <a href="<?php echo site_url('auth/register'); ?>" class="font-bold">Daftar</a></p>
                                <p class="text-gray-600">Lupa kata sandi? <a href="<?php echo site_url('auth/forgot'); ?>" class="font-bold">Klik disini</a></p>
                                <p><a class="font-bold" href="<?php echo site_url('landingpage'); ?>">Kembali ke halaman utama</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
</body>

</html>