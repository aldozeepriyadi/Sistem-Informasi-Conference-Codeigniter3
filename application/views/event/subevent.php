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
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardA'); ?>">Dashboard</a></li>
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
                <a href="javascript:void(0);"><button class="btn icon icon-left btn-primary tambahData"><a href="#" class="text-white"><i class="bi bi-plus-circle"></i>Tambah Data</a></button>
                    <button type="button" value="<?php echo $this->session->userdata('IdEvent') ?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#lihatData">
                        <i class="bi bi-eye"></i>
                        Lihat Event
                    </button>
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('errorTgl') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errorTgl');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successTgl') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successTgl');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successHapussub') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successHapussub');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('errorHapussub') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errorHapussub');
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
                                Status
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($subevent as $ev) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="kategori<?php echo $ev['IdSubEvent'] ?>"><?php echo $ev['ketegori'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="tglAwal<?php echo $ev['IdSubEvent'] ?>"><?php echo $ev['tanggalAwal'] ?></label>
                                </td>
                                <td>
                                    <?php $date = date_create($ev['tanggalAwal']);
                                    echo date_format($date, "d M Y"); ?>
                                </td>
                                <td hidden="true">
                                    <label id="tglAkhir<?php echo $ev['IdSubEvent'] ?>"><?php echo $ev['tanggalAkhir'] ?></label>
                                </td>
                                <td>
                                    <?php $date = date_create($ev['tanggalAkhir']);
                                    echo date_format($date, "d M Y");   ?>
                                </td>
                                <td hidden="true">
                                    <label id="status<?php echo $ev['IdSubEvent'] ?>"><?php echo $ev['status'] ?></label>
                                </td>
                                <td>
                                    <button type="button" value="<?php echo $ev['IdSubEvent'] ?>" onclick="senddata(this.value)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah">
                                        <i class="bi bi-pencil-square"></i></button>
                                    &nbsp;
                                    <a href="<?php echo site_url('event/delete/' . $ev['IdSubEvent']) ?>" class="btn btn-danger tombol-hapus" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
                                        <i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade text-left" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Tanggal Sub Event</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?php echo base_url('event/tambahsub') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validTambah() ">
                <div class="modal-body">
                    <div id="err">

                    </div>
                    <input type="hidden" value="<?php echo $this->session->userdata('IdEvent') ?>" id="IdEvent" name="IdEvent">
                    <div class='form-group mandatory'>
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="ketegori" placeholder="Masukan Nama" name="ketegori" required>
                        <input type="checkbox" id="status" name="status" alt="Checkbox" value="1"> Inti Acara (Conference)
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" required>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" required>
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

        </div>

    </div>


</div>

<div class="modal fade text-left" id="lihatData" tabindex="-1" role="dialog" aria-labelledby="lihatData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lihat Data Tanggal Event</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($event as $e) { ?>
                    <input type="hidden" value="<?php echo $e['IdEvent'] ?>" id="IdEvent" name="IdEvent">
                    <div class='form-group mandatory'>
                        <label class="form-label">Nama </label>
                        <input type="text" class="form-control" value="<?php echo $e['nameEvent'] ?>" readonly>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Topik</label>
                        <textarea type="text" class="form-control" readonly><?php echo $e['topic'] ?></textarea>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tema</label>
                        <textarea type="text" class="form-control" readonly><?php echo $e['theme'] ?></textarea>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" id="tanggalAwalEvent" class="form-control" value="<?php echo $e['tanggalAwal'] ?>" readonly>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" id="tanggalAkhirEvent" class="form-control" value="<?php echo $e['tanggalAkhir'] ?>" readonly>
                    </div>
                <?php } ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
            </div>

        </div>

    </div>


</div>


<div class="modal fade text-left" id="editData" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('event/editTanggalEvents') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validEdit() ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Sub Event</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="errE">

                    </div>
                    <input type="hidden" value="<?php echo $this->session->userdata('IdEvent') ?>" id="IdEvent" name="IdEvent">
                    <div class='form-group mandatory'>
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="ketegoriE" placeholder="Masukan Nama" name="ketegoriE" required>
                        <input type="checkbox" id="statusE" name="statusE" alt="Checkbox" value="1"> Inti Acara (Conference)
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggalAwalE" name="tanggalAwalE" required>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalAkhirE" name="tanggalAkhirE" required>
                    </div>
                    <input type="hidden" id="IdSubE" name="IdSubE">
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
    </div>

</div>

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
        var tglAwalEvent = new Date(document.getElementById('tanggalAwalEvent').value);
        var tglAkhirEvent = new Date(document.getElementById('tanggalAkhirEvent').value);
        var message = "";
        if (tglAwal < hariIni) {
            message += 'Tanggal awal tidak boleh kurang dari hari ini<br>';
        }
        if (tglAkhir < hariIni) {
            message += 'Tanggal akhir tidak boleh kurang dari hari ini<br>';
        }
        if (tglAwal < tglAwalEvent) {
            message += 'Tanggal awal tidak boleh kurang dari tanggal awal event<br>';
        }
        if (tglAkhir > tglAkhirEvent) {
            message += 'Tanggal akhir tidak boleh lebih dari tanggal akhir event<br>';
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
        var tglAwalEvent = new Date(document.getElementById('tanggalAwalEvent').value);
        var tglAkhirEvent = new Date(document.getElementById('tanggalAkhirEvent').value);
        var message = "";
        if (tglAwal < hariIni) {
            message += 'Tanggal awal tidak boleh kurang dari hari ini<br>';
        }
        if (tglAkhir < hariIni) {
            message += 'Tanggal akhir tidak boleh kurang dari hari ini<br>';
        }
        if (tglAwal < tglAwalEvent) {
            message += 'Tanggal awal tidak boleh kurang dari tanggal awal event<br>';
        }
        if (tglAkhir > tglAkhirEvent) {
            message += 'Tanggal akhir tidak boleh lebih dari tanggal akhir event<br>';
        }
        if (message != "") {
            document.getElementById('errE').innerHTML = '<div class="alert alert-danger" role="alert">' + message + '</div>';
            return false;
        }
        return true;
    }

    function senddata(value) {
        console.log(value)
        var kategoris = document.getElementById('kategori' + value);
        var editkategori = document.getElementById('ketegoriE');
        editkategori.value = kategoris.innerHTML;

        var tglAwal = document.getElementById('tglAwal' + value);
        var edittglAwal = document.getElementById('tanggalAwalE');
        edittglAwal.value = tglAwal.innerHTML;

        var tglAkhir = document.getElementById('tglAkhir' + value);
        var edittglAkhir = document.getElementById('tanggalAkhirE');
        edittglAkhir.value = tglAkhir.innerHTML;

        var sttev = document.getElementById('status' + value);
        if (sttev.innerHTML == "1") {
            $('#statusE').attr('checked', true);
        }

        var editidsub = document.getElementById('IdSubE');
        editidsub.value = value;

    }

    $(document).ready(function() {
        $('.tambahData').on('click', function() {
            $('#tambahData').modal('show');
        });
        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });
        $('.tombol-hapus').on('click', function(e) {
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

                text: "data sub event akan dihapus!",
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
                        'Data sub event batal dihapus.',
                        'error'
                    )
                }

            })
        })
    });
</script>