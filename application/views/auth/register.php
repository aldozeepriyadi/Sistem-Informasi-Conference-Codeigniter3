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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-right">
                    <img src="<?php echo base_url('images/background.jpg') ?>" style=" height:990.13px ;">
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div class="card" style="border-radius:0;">
                    <div id="auth-left-register">
                        <div class="card-body">
                            <div class="auth-logo">
                                <a href="index.html"><img src="<?php echo base_url('aset/images/logo/ATL.png') ?>" alt="Logo"></a>
                            </div>
                            <h3 class="auth-title">Pendaftaran</h3>
                            <section id="multiple-column-form">
                                <form class="form" method="post" action="<?php echo base_url(); ?>auth/proses">
                                    <?php
                                    if ($this->session->flashdata('error') != '') {
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo $this->session->flashdata('error');
                                        echo '</div>';
                                    } else if ($this->session->flashdata('success_register') != '') {
                                        echo '<div class="alert alert-success" role="alert">';
                                        echo $this->session->flashdata('success_register');
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class=" row">
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>

                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('namaUser'); ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>

                                                <label class="form-label">Password</label>
                                                <div class="form-group position-relative has-icon-right">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label"> Instansi</label>
                                                <input type="text" name="instance" id="instance" class="form-control" placeholder="Instansi" value="<?php echo set_value('instance'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Nomor Telepon</label>
                                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" value="<?php echo set_value('phone'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <fieldset data-type="horizontal" data-role="controlgroup">
                                                    <label class="form-label">
                                                        Jenis Kelamin
                                                    </label>
                                                    <br />

                                                    <input class="form-check-input" type="radio" name="JenisKelamin" id="rbJenisKelamin" value="<?php echo set_value('Laki-Laki'); ?>">
                                                    <label class=" form-check-label form-label" for="status">
                                                        Laki-laki
                                                    </label>
                                                    &nbsp;
                                                    <input class="form-check-input" type="radio" name="JenisKelamin" id="rbJenisKelamin" value="<?php echo set_value('Perempuan'); ?>">
                                                    <label class="form-check-label form-label" for="status">
                                                        Perempuan
                                                    </label>
                                                    <!-- </div> -->
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">
                                                    Kategori
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-select" name="kategori" id="kategori" required>
                                                        <option value="" selected>-- Pilih Kategori --</option>
                                                        <option value="Dosen" <?php echo set_select('kategori', 'Dosen'); ?>>Dosen</option>
                                                        <option value="Mahasiswa" <?php echo set_select('kategori', 'Mahasiswa'); ?>>Mahasiswa</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">
                                                    Pendidikan Terakhir
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-select" name="lasteducation" id="lasteducation" required>
                                                        <option value="" selected>-- Pilih Pendidikan Terakhir --</option>
                                                        <option value="SD" <?php echo set_select('lasteducation', 'SD'); ?>>SD</option>
                                                        <option value="SMP" <?php echo set_select('lasteducation', 'SMP'); ?>>SMP</option>
                                                        <option value="SMA" <?php echo set_select('lasteducation', 'SMA'); ?>>SMA</option>
                                                        <option value="D1" <?php echo set_select('lasteducation', 'D1'); ?>>D1</option>
                                                        <option value="D2" <?php echo set_select('lasteducation', 'D2'); ?>>D2</option>
                                                        <option value="D3" <?php echo set_select('lasteducation', 'D3'); ?>>D3</option>
                                                        <option value="D4" <?php echo set_select('lasteducation', 'D4'); ?>>D4</option>
                                                        <option value="S1" <?php echo set_select('lasteducation', 'S1'); ?>>S1</option>
                                                        <option value="S2" <?php echo set_select('lasteducation', 'S2'); ?>>S2</option>
                                                        <option value="S3" <?php echo set_select('lasteducation', 'S3'); ?>>S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Alamat</label>
                                                <textarea type="text" name="address" id="address" class="form-control" placeholder="Alamat" required><?php echo set_value('address'); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left ">
                                            <input type="hidden" name="role" id="role" class="form-control form-control-xl" value="Peserta">

                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg ">Daftar</button>
                                        </div>
                                    </div>
                                </form>

                            </section>
                        </div>
                        <div class="text-center text-lg fs-4">
                            <p class='text-gray-600'>Sudah punya akun? <a href="<?php echo site_url('auth/login'); ?>" class="font-bold">Masuk</a>.</p>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>
</body>
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

</html>