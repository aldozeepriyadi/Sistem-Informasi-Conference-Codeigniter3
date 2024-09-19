<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Unggah Abstrak</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardP'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Unggah Abstrak</li>
                </ol>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="text">
                                            <h6 class="user-dropdown-name font"><?php echo $this->session->userdata('namaUser'); ?></h6>
                                            <p class="user-dropdown-status text-sm text-muted"><?php echo $this->session->userdata('role'); ?></p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                        <li><a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <div>

    </div>
    <div class="table-responsive">
        <section class="section">
            <form class="event" method="post" action="<?php echo base_url('Abstrak/tambahAbstrak'); ?>">
                <!-- <div class="control-group "> -->
                <div class="card after-add-more">
                    <div class="card-header">
                        Data Author Utama
                    </div>
                    <div class="card-body">
                        <section id="multiple-column-form " class="abc">

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
                            <div class="row">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control autoc" name="title[]" id="title" placeholder="Cari berdasarkan nama" aria-label="Cari berdasarkan nama" aria-describedby="button-addon2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>

                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name[]" id="name" class="form-control nama" placeholder="Nama Lengkap">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email[]" id="email" class="form-control email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label">Alamat</label>
                                        <textarea type="text" name="address[]" id="address" class="form-control alamat" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label">
                                            Kategori
                                        </label>
                                        <div class="input-group">
                                            <select class="form-select kategori" name="kategori[]" id="kategori">
                                                <option value="" selected>-- Pilih Kategori --</option>
                                                <option value="Dosen">Dosen</option>
                                                <option value="Mahasiswa">Mahasiswa</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label"> Instansi</label>
                                        <input type="text" name="instance[]" id="instance" class="form-control instansi" placeholder="Instansi">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="number" name="phone[]" id="phone" class="form-control nohp" placeholder="Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label class="form-label">
                                            Jenis Kelamin
                                        </label>
                                        <div class="input-group">
                                            <select class="form-select jk" name="gender[]" id="gender">
                                                <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>

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
                                            <select class="form-select pendtrakhir" name="lasteducation[]" id="lasteducation">
                                                <option value="" selected>-- Pilih Pendidikan Terakhir --</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" hidden="true" value="0" name="IdUser[]" id="IdUser" class="form-control id">
                            </div>
                        </section>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success add-more" type="button">
                            Tambah
                        </button>
                    </div>
                </div>
                <!-- Copy file -->
                <div hidden class="copy">
                    <div class="control-group">
                        <div class="card">
                            <hr>
                            <div class="card-header">
                                Data Author
                            </div>
                            <div class="card-body">
                                <section id="multiple-column-form" class="abc">

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
                                    <div class="row">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control autoc" name="title[]" id="title" placeholder="Cari berdasarkan nama" aria-label="Cari berdasarkan nama" aria-describedby="button-addon2">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>

                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name[]" id="name" class="form-control namas" placeholder="Nama Lengkap">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Email</label>
                                                <input type="text" name="email[]" id="email" class="form-control emails" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Alamat</label>
                                                <textarea type="text" name="address[]" id="address" class="form-control alamats" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label"> Instansi</label>
                                                <input type="text" name="instance[]" id="instance" class="form-control instansis" placeholder="Instansi">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">Nomor Telepon</label>
                                                <input type="number" name="phone[]" id="phone" class="form-control nohps" placeholder="Nomor Telepon">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">
                                                    Jenis Kelamin
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-select jks" name="gender[]" id="gender">
                                                        <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class='form-group mandatory'>
                                                <label class="form-label">
                                                    Kategori
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-select kategoris" name="kategori[]" id="kategori">
                                                        <option value="" selected>-- Pilih Kategori --</option>
                                                        <option value="Dosen">Dosen</option>
                                                        <option value="Mahasiswa">Mahasiswa</option>

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
                                                    <select class="form-select pendtrakhirs" name="lasteducation[]" id="lasteducation">
                                                        <option value="" selected>-- Pilih Pendidikan Terakhir --</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" value="0" hidden="true" name="IdUser[]" id="IdUser" class="form-control ids">
                                    </div>
                                </section>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-danger remove" type="button"><i></i> Hapus</button>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Presenter
                    </div>
                    <div class="card-body">

                        <div class='form-group mandatory'>
                            <label class="form-label">Nama Presenter</label>
                            <input type="text" class="form-control" id="presenter" placeholder="Masukan Nama" name="presenter[]" required>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Abstrak
                    </div>
                    <div class="card-body">

                        <div class='form-group mandatory'>
                            <label class="form-label">Event</label>
                            <input type="text" class="form-control" hidden="true" id="IdEvent" value="<?php echo $this->session->userdata('IdEventC'); ?>" name="IdEvent[]">
                            <input type="text" class="form-control" id="IdEventD" value="<?php echo $this->session->userdata('nameEvent'); ?>" name="IdEventD" readonly>
                        </div>
                        <div class='form-group mandatory'>
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul[]" required>
                        </div>
                        <div class='form-group mandatory'>
                            <label class="form-label">Topik</label>
                            <input type="text" class="form-control" id="IdEvent[]" value="<?php echo $this->session->userdata('topic'); ?>" name="Topic[]">
                        </div>
                        <div class='form-group mandatory'>
                            <label class="form-label">Abstrak</label>
                            <textarea class="readonlyeditor" id="abstract" name="abstract" cols="30" rows="10"></textarea>
                        </div>
                        <div class='form-group mandatory'>
                            <label class="form-label">Kata Kunci</label>
                            <input type="text" class="form-control" id="kataKunci" name="kataKunci[]" placeholder="contoh: teknologi; web; aplikasi" required>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-footer">
                        <button class="btn btn-danger"><a href="<?php echo site_url('abstrak/abstrak/' . $this->session->userdata('IdEventC')) ?>" class="text-white">Kembali</a></button>
                        <button id="submit" type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>


<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>

<script type="text/javascript">
    function cekdata() {
        var gender = document.getElementsByName("kategori[]");
        for (var i = 0; i < gender.length; i++) {


            var gender = document.getElementsByName("kategori[]")[i];
            console.log(gender.value)
        }
    }
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
            jQuery('.autoc').autocomplete({
                source: "<?php echo site_url('abstrak/get_autocomplete/?') ?>",

                select: function(event, ui) {

                    var names = document.getElementsByName("name[]");
                    for (var i = 0; i < names.length; i++) {

                        if (names[i].value == '') {
                            var names = document.getElementsByName("name[]")[i];
                            names.value = ui.item.label;
                            document.getElementsByName("name[]")[i].readOnly = true;
                        }
                    }

                    var email = document.getElementsByName("email[]");
                    for (var i = 0; i < email.length; i++) {

                        if (email[i].value == '') {
                            var email = document.getElementsByName("email[]")[i];
                            email.value = ui.item.email;
                            document.getElementsByName("email[]")[i].readOnly = true;
                        }
                    }
                    var address = document.getElementsByName("address[]");
                    for (var i = 0; i < address.length; i++) {

                        if (address[i].value == '') {
                            var address = document.getElementsByName("address[]")[i];
                            address.value = ui.item.address;
                            document.getElementsByName("address[]")[i].readOnly = true;
                        }
                    }
                    var instance = document.getElementsByName("instance[]");
                    for (var i = 0; i < instance.length; i++) {

                        if (instance[i].value == '') {
                            var instance = document.getElementsByName("instance[]")[i];
                            instance.value = ui.item.instance;
                            document.getElementsByName("instance[]")[i].readOnly = true;
                        }
                    }
                    var phone = document.getElementsByName("phone[]");
                    for (var i = 0; i < phone.length; i++) {

                        if (phone[i].value == '') {
                            var phone = document.getElementsByName("phone[]")[i];
                            phone.value = ui.item.phone;
                            document.getElementsByName("phone[]")[i].readOnly = true;
                        }
                    }
                    var gender = document.getElementsByName("gender[]");
                    for (var i = 0; i < gender.length; i++) {

                        if (gender[i].value == '') {
                            var gender = document.getElementsByName("gender[]")[i];
                            gender.value = ui.item.gender;
                            document.getElementsByName("gender[]")[i].disabled = false;
                        }
                    }
                    var kategori = document.getElementsByName("kategori[]");
                    for (var i = 0; i < kategori.length; i++) {

                        if (kategori[i].value == '') {
                            var kategori = document.getElementsByName("kategori[]")[i];
                            kategori.value = ui.item.kategori;
                            console.log(kategori.value);
                            console.log(i);
                            document.getElementsByName("kategori[]")[i].disabled = false;
                        }
                    }
                    var lasteducation = document.getElementsByName("lasteducation[]");
                    for (var i = 0; i < lasteducation.length; i++) {

                        if (lasteducation[i].value == '') {
                            var lasteducation = document.getElementsByName("lasteducation[]")[i];
                            lasteducation.value = ui.item.lasteducation;
                            console.log(lasteducation.value);
                            console.log(i);
                            document.getElementsByName("lasteducation[]")[i].disabled = false;
                        }
                    }

                    var IdUser = document.getElementsByName("IdUser[]");
                    for (var i = 0; i < IdUser.length; i++) {

                        if (IdUser[i].value == '') {
                            var IdUser = document.getElementsByName("IdUser[]")[i];
                            IdUser.value = ui.item.IdUser;
                            console.log(i);
                            console.log(IdUser.value)
                            document.getElementsByName("IdUser[]")[i].readOnly = true;
                        }
                    }
                }
            });;
        });


        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });

        $(".autoc").autocomplete({
            source: "<?php echo site_url('abstrak/get_autocomplete/?') ?>",

            select: function(event, ui) {

                $('.pendtrakhir').val(ui.item.lasteducation);
                // $('.pendtrakhir').prop("disabled", true);
                $('.pendtrakhir').css('pointer-events', 'none');

                $('.nama').val(ui.item.label);
                $('.nama').prop("readonly", true);

                $('.email').val(ui.item.email);
                $('.email').prop("readonly", true);

                $('.alamat').val(ui.item.address);
                $('.alamat').prop("readonly", true);

                $('.kategori').val(ui.item.kategori);
                $('.kategori').css('pointer-events', 'none');

                $('.instansi').val(ui.item.instance);
                $('.instansi').prop("readonly", true);

                $('.nohp').val(ui.item.phone);
                $('.nohp').prop("readonly", true);

                $('.jk').val(ui.item.gender);
                $('.jk').css('pointer-events', 'none');





                $('.id').val(ui.item.IdUser);
            }
        });

        tinymce.init({
            selector: '.readonlyeditor',
            height: 400,
            readonly: false,
            theme: 'silver',
            plugins: [
                'advlist  lists ',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
            toolbar2: 'print preview | forecolor backcolor emoticons ',
            image_advtab: true,
        });

    });
</script>