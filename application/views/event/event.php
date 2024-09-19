<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kelola Event</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardSA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Event</li>
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
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0);"><button class="btn icon icon-left btn-primary  tambahData"><a href="#" class="text-white"><i class="bi bi-plus-circle"></i> Tambah Data</a></button>
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('errors') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errors');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successs') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successs');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successHapus') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successHapus');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('errrorHapus') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errrorHapus');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Tema
                            </th>
                            <th>
                                Topik
                            </th>
                            <th>
                                Tanggal Awal
                            </th>
                            <th hidden="true">
                                Tanggal Awal
                            </th>
                            <th>
                                Tanggal Akhir
                            </th>
                            <th hidden="true">
                                Tanggal Akhir
                            </th>
                            <th hidden="true">
                                Biaya
                            </th>
                            <th hidden="true">
                                Kategori
                            </th>
                            <th hidden="true">
                                Poster
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>



                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($event as $ev) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="namaevent<?php echo $ev->IdEvent ?>"><?php echo $ev->nameEvent ?></label>
                                </td>
                                <td>
                                    <label id="temaevent<?php echo $ev->IdEvent ?>"><?php echo $ev->theme ?></label>
                                </td>
                                <td>
                                    <label id="topicevent<?php echo $ev->IdEvent ?>"><?php echo $ev->topic ?></label>
                                </td>
                                <td>
                                    <?php $date = date_create($ev->tanggalAwal);
                                    echo date_format($date, "d M Y"); ?>
                                </td>
                                <td hidden="true">
                                    <label id="tglawal<?php echo $ev->IdEvent ?>"><?php echo $ev->tanggalAwal; ?></label>
                                </td>
                                <td>
                                    <?php $date = date_create($ev->tanggalAkhir);
                                    echo date_format($date, "d M Y");  ?>
                                </td>
                                <td hidden="true">
                                    <label id="tglakhir<?php echo $ev->IdEvent ?>"><?php echo $ev->tanggalAkhir; ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="biaya<?php echo $ev->IdEvent ?>"><?php echo $ev->biaya ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="kategori<?php echo $ev->IdEvent ?>"><?php echo $ev->kategori ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="poster<?php echo $ev->IdEvent ?>"><?php echo $ev->poster ?></label>
                                </td>
                                <td>
                                    <?php echo $ev->statusEvent ?>
                                </td>
                                <td>
                                    <?php if ($ev->statusEvent == 'Aktif') { ?>
                                        <button type="button" value="<?php echo $ev->IdEvent ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#editData" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah"><i class="bi bi-pencil-square"></i></button>
                                        &nbsp;
                                        <a href="<?php echo site_url('event/fungsiDelete/' . $ev->IdEvent) ?>" class="btn btn-danger  tombolnon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Non Aktif">
                                            <i class="bi bi-x-circle"></i></a>
                                    <?php } else  if ($ev->statusEvent == "Tidak Aktif") { ?>
                                        <button type="button" value="<?php echo  $ev->IdEvent ?>" onclick="senddatadetail(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailEvent" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Event"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<!-- tambahData Modal -->
<div class="modal fade text-left" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Event</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <section id="multiple-column-form">
                    <form action="<?php echo base_url('event/tambah') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validTambah() ">
                        <div id="err">

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" class="form-control" id="nameEvent" placeholder="Masukan Nama" name="nameEvent" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="theme">Tema</label>
                                    <textarea type="text" class="form-control" id="theme" placeholder="Masukan Tema" name="theme" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="theme">Topik</label>
                                    <textarea type="text" class="form-control" id="topic" name="topic" width="100px" height="100px" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label" for="fotoCover">Poster Acara</label>
                                    <input type="file" id="poster" accept=".png, .jpg, .jpeg" class="form-control" name="poster" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="theme">Tanggal Awal Event</label>
                                    <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="theme">Tanggal Akhir Event</label>
                                    <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="name">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" placeholder="Contoh: Dosen, Mahasiswa" name="kategori" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="name">Biaya</label>
                                    <input type="text" class="form-control" id="biaya" placeholder="Contoh: 150.000, 250.000" name="biaya" required>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Kembali</span>
                                </button>
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
    </div>

</div>

<div class="modal fade text-left" id="editData" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <section id="multiple-column-form">
            <form id="eventForm" class="form" action="<?php echo base_url('event/editEvents') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validEdit() ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Event</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>


                    <div class="modal-body">
                        <div id="errE">

                        </div>
                        <center>
                            <img id="posterIframe" name="posterIframe" style="height: 200px; width: 150px">
                        </center>

                        <div class="row">
                            <input type="hidden" id="IdEventE" name="IdEventE" readonly>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label">Nama</label>

                                    <input type="text" class="form-control" id="nameEventE" placeholder="Masukan Nama" name="nameEventE" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label">Topik</label>
                                    <textarea type="text" class="form-control" id="topicE" name="topicE" width="100px" height="100px" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label">Tema</label>

                                    <textarea type="text" class="form-control" id="themeE" placeholder="Masukan Tema" name="themeE" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label" for="fotoCover">Poster Acara</label>
                                    <input type="file" id="poster" accept=".png, .jpg, .jpeg" class="form-control" name="poster" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label">Tanggal Awal Event</label>
                                    <input type="date" class="form-control tanggalAwalE" id="tanggalAwalE" name="tanggalAwalE" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label">Tanggal Akhir Event</label>
                                    <input type="date" class="form-control tanggalAkhirE" id="tanggalAkhirE" name="tanggalAkhirE" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="name">Kategori</label>
                                    <input type="text" class="form-control" id="kategoriE" placeholder="Contoh: Dosen, Mahasiswa" name="kategoriE" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class='form-group mandatory'>
                                    <label class="form-label" for="name">Biaya</label>
                                    <input type="text" class="form-control" id="biayaE" placeholder="Contoh: 150.000, 250.000" name="biayaE" required>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
                        <button id="submit" type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
            </form>
        </section>
    </div>
</div>

<div class="modal fade text-left" id="detailEvent" tabindex="-1" role="dialog" aria-labelledby="detailEvent" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <section id="multiple-column-form">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Event</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>


                <div class="modal-body">
                    <center>
                        <img id="posterIframeD" name="posterIframeD" style="height: 200px; width: 150px">
                    </center>

                    <div class="row">
                        <input type="hidden" id="IdEventED" name="IdEventED" readonly>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label">Nama</label>

                                <input type="text" class="form-control" id="nameEventED" placeholder="Masukan Nama" name="nameEventED" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label">Topik</label>
                                <textarea type="text" class="form-control" id="topicED" name="topicED" width="100px" height="100px" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label">Tema</label>

                                <textarea type="text" class="form-control" id="themeED" placeholder="Masukan Tema" name="themeED" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label">Tanggal Awal Event</label>
                                <input type="date" class="form-control tanggalAwalE" id="tanggalAwalED" name="tanggalAwalED" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label">Tanggal Akhir Event</label>
                                <input type="date" class="form-control tanggalAkhirE" id="tanggalAkhirED" name="tanggalAkhirED" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label" for="name">Kategori</label>
                                <input type="text" class="form-control" id="kategoriED" placeholder="Contoh: Dosen, Mahasiswa" name="kategoriED" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class='form-group mandatory'>
                                <label class="form-label" for="name">Biaya</label>
                                <input type="text" class="form-control" id="biayaED" placeholder="Contoh: 150.000, 250.000" name="biayaED" readonly>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                </div>
            </div>

        </section>
    </div>
    <!-- /.modal-content -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function validTambah() {
        var hariIni = new Date();
        hariIni.setHours(0, 0, 0, 0);
        var tglAwal = new Date(document.getElementById('tanggalAwal').value);
        var tglAkhir = new Date(document.getElementById('tanggalAkhir').value);
        var message = "";
        if (tglAwal < hariIni) {
            message += 'Tanggal awal tidak boleh kurang dari hari ini<br>';
        }
        if (tglAkhir < hariIni) {
            message += 'Tanggal akhir tidak boleh kurang dari hari ini<br>';
        }
        if (tglAwal > tglAkhir) {
            message += 'Tanggal akhir tidak boleh kurang dari tanggal awal<br>';
        }
        if (message != "") {
            document.getElementById('err').innerHTML = '<div class="alert alert-danger" role="alert">' + message + '</div>';
            return false;
        }
        return true;
    }

    function validEdit() {
        var hariIni = new Date();
        hariIni.setHours(0, 0, 0, 0);
        var tglAwal = new Date(document.getElementById('tanggalAwalE').value);
        var tglAkhir = new Date(document.getElementById('tanggalAkhirE').value);
        var message = "";
        if (tglAwal < hariIni) {
            message += 'Tanggal awal tidak boleh kurang dari hari ini<br>';
        }
        if (tglAkhir < hariIni) {
            message += 'Tanggal akhir tidak boleh kurang dari hari ini<br>';
        }
        if (tglAwal > tglAkhir) {
            message += 'Tanggal akhir tidak boleh kurang dari tanggal awal<br>';
        }
        if (message != "") {
            document.getElementById('errE').innerHTML = '<div class="alert alert-danger" role="alert">' + message + '</div>';
            return false;
        }
        return true;
    }

    function senddata(value) {
        console.log(value)
        var nama = document.getElementById('namaevent' + value);
        var editnama = document.getElementById('nameEventE');
        editnama.value = nama.innerHTML;
        console.log(nama.innerHTML);
        var tema = document.getElementById('temaevent' + value);
        var edittema = document.getElementById('themeE');
        edittema.value = tema.innerHTML;


        var topik = document.getElementById('topicevent' + value);
        var edittopik = document.getElementById('topicE');
        edittopik.value = topik.innerHTML;

        var conference = document.getElementById('tglawal' + value);
        var editconference = document.getElementById('tanggalAwalE');
        editconference.value = conference.innerHTML;

        var abstrak = document.getElementById('tglakhir' + value);
        var editabstrak = document.getElementById('tanggalAkhirE');
        editabstrak.value = abstrak.innerHTML;

        var b = document.getElementById('biaya' + value);
        var editb = document.getElementById('biayaE');
        editb.value = b.innerHTML;

        var k = document.getElementById('kategori' + value);
        var editk = document.getElementById('kategoriE');
        editk.value = k.innerHTML;

        var editidevent = document.getElementById('IdEventE');
        editidevent.value = value;

        var bb = document.getElementById('poster' + value);
        var site = bb.innerHTML;
        console.log(site.innerHTML);
        document.getElementById('posterIframe').src = "<?= base_url(); ?>file/poster/" + site;
    }


    function senddatadetail(value) {
        console.log(value)
        var nama = document.getElementById('namaevent' + value);
        var editnama = document.getElementById('nameEventED');
        editnama.value = nama.innerHTML;

        var tema = document.getElementById('temaevent' + value);
        var edittema = document.getElementById('themeED');
        edittema.value = tema.innerHTML;


        var topik = document.getElementById('topicevent' + value);
        var edittopik = document.getElementById('topicED');
        edittopik.value = topik.innerHTML;

        var conference = document.getElementById('tglawal' + value);
        var editconference = document.getElementById('tanggalAwalED');
        editconference.value = conference.innerHTML;

        var abstrak = document.getElementById('tglakhir' + value);
        var editabstrak = document.getElementById('tanggalAkhirED');
        editabstrak.value = abstrak.innerHTML;

        var b = document.getElementById('biaya' + value);
        var editb = document.getElementById('biayaED');
        editb.value = b.innerHTML;

        var k = document.getElementById('kategori' + value);
        var editk = document.getElementById('kategoriED');
        editk.value = k.innerHTML;

        var editidevent = document.getElementById('IdEventED');
        editidevent.value = value;

        var bb = document.getElementById('poster' + value);
        var site = bb.innerHTML;
        console.log(site.innerHTML);
        document.getElementById('posterIframeD').src = "<?= base_url(); ?>file/poster/" + site;
    }

    $(document).ready(function() {

        $('.tambahData').on('click', function() {
            $('#tambahData').modal('show');
        });
        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });

        $('.tombolnon').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin',

                text: "data event akan dinonaktifkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin!',
                confirmButtonColor: "#FF0000",
                cancelButtonText: 'Batal!',
                cancelButtonColor: "#008000",
                reverseButtons: true


            }).then((result) => {
                if (result.isConfirmed) {

                    if (result.value) {
                        document.location.href = href;
                    }

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Data event batal dinonaktifkan.',
                        'error'
                    )
                }

            })
        })
    });
</script>