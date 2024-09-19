<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Distribusi Fullpaper</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Distribusi Fullpaper</li>
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
                                        <!-- <li><a class="dropdown-item" href="#">My Account</a></li> -->
                                        <!-- <li>
                                                <hr class="dropdown-divider">
                                            </li> -->
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
            <div class="card-body">
                <?php
                if ($this->session->flashdata('errorSend') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errorSend');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successSend') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successSend');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('gagalfpp') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagalfpp');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('suksesfpp') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('suksesfpp');
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
                                Judul
                            </th>
                            <th hidden="true">
                                Topik
                            </th>
                            <th>
                                Reviewer
                            </th>
                            <th>
                                Batas Revisi
                            </th>
                            <th>
                                Status Distribusi
                            </th>
                            <th>
                                Tanggal modifikasi
                            </th>
                            <th>
                                Kode Paper
                            </th>
                            <th>
                                Status Karya
                            </th>
                            <th hidden="true">
                                Rev By
                            </th>
                            <th hidden="true">
                                Ket
                            </th>
                            <th hidden="true">
                                SB
                            </th>
                            <th hidden="true">
                                Abstrak
                            </th>
                            <th hidden="true">
                                ppt
                            </th>
                            <th hidden="true">
                                pdf
                            </th>
                            <th hidden="true">
                                video
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php $distribusi = $this->allmodel->getAllFullpaper(); ?>
                        <?php foreach ($distribusi as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="assessmentCriteria<?php echo $dis->IdFullpaper ?>"><?php echo $dis->title ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="value<?php echo $dis->IdAbstrak ?>"><?php echo $dis->topic ?></label>
                                </td>
                                <td>
                                    <?php echo $dis->reviewedbyFpp ?>
                                </td>
                                <td>
                                    <label id="sk<?php echo $dis->IdFullpaper ?>"><?php if ($dis->deadlineRevisiFpp  == null) {
                                                                                        echo $dis->deadlineRevisiFpp;
                                                                                    } else if ($dis->deadlineRevisiFpp < date('Y-m-d ')) {
                                                                                        $date = date_create($dis->deadlineRevisiFpp);
                                                                                        $tglbaru = date_format($date, "d F Y H:i:s");
                                                                                        echo "<div class='badge bg-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' title='{$tglbaru}'>";
                                                                                        echo 'Melewati Batas';
                                                                                    } else {
                                                                                        $date = date_create($dis->deadlineRevisiFpp);
                                                                                        echo date_format($date, "d F Y H:i:s");
                                                                                    }
                                                                                    ?></label>
                                </td>
                                <td>
                                    <label id="sd<?php echo $dis->IdFullpaper ?>"><?php echo $dis->statusDistribusiFpp ?></label>
                                </td>
                                <td>
                                    <label id="md<?php echo $dis->IdFullpaper ?>"><?php echo $dis->modifieddateFpp ?></label>
                                </td>
                                <td>
                                    <label id="md<?php echo $dis->IdFullpaper ?>"><?php echo $dis->kodepaper ?></label>
                                </td>
                                <td>
                                    <label id="dr<?php echo $dis->IdFullpaper ?>"><?php
                                                                                    if ($dis->statusKaryaFpp == "Diterima") {
                                                                                        echo '<div class="badge bg-success">';
                                                                                        echo $dis->statusKaryaFpp;
                                                                                    } else if ($dis->statusKaryaFpp == "Ditolak") {
                                                                                        echo '<div class="badge bg-danger">';
                                                                                        echo $dis->statusKaryaFpp;
                                                                                    } else if ($dis->statusKaryaFpp == null) {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo '<div class="badge bg-info">';
                                                                                        echo $dis->statusKaryaFpp;
                                                                                    }
                                                                                    ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="reviewedBy<?php echo $dis->IdFullpaper ?>"><?php echo $dis->reviewedbyFppID ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="ket<?php echo $dis->IdFullpaper ?>"><?php echo $dis->keteranganFpp ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="sb<?php echo $dis->IdFullpaper ?>"><?php echo $dis->submittedbyID ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $dis->IdFullpaper ?>"><?php echo $dis->abstract ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="ppt<?php echo $dis->IdFullpaper ?>"><?php echo $dis->PresentationFile ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="pdf<?php echo $dis->IdFullpaper ?>"><?php echo $dis->FullpaperFile ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="video<?php echo $dis->IdFullpaper ?>"><?php echo $dis->VideoLink ?></label>
                                </td>
                                <td>



                                    <?php if ($dis->statusDistribusiFpp == 'Berhasil Dikumpulkan' && $dis->kodepaper != null) { ?>
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="showuserdetail(<?php echo $dis->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-pencil-square"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="sendnotif(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kirimNotif" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ingatkan"><i style="color:black;" class="bi bi-bell"></i></button>
                                    <?php } else if ($dis->statusDistribusiFpp == 'Proses Review' && $dis->kodepaper != null) { ?>
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="showuserdetail(<?php echo $dis->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Karya"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="sendnotif(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kirimNotif" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ingatkan"><i style="color:black;" class="bi bi-bell"></i></button>
                                    <?php } else if ($dis->statusDistribusiFpp == 'Selesai Review' && $dis->deadlineRevisiFpp < date('Y-m-d')) { ?>
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="showuserdetail(<?php echo $dis->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Karya"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="sendnotif(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kirimNotif" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ingatkan"><i style="color:black;" class="bi bi-bell"></i> </button>
                                    <?php } else if ($dis->statusDistribusiFpp == 'Selesai Review' && strpos($dis->deadlineRevisiFpp, 'Revisi') === FALSE) { ?>
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="showuserdetail(<?php echo $dis->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Karya"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="sendnotif(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kirimNotif" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ingatkan"><i style="color:black;" class="bi bi-bell"></i> </button>
                                    <?php } else if ($dis->statusDistribusiFpp == 'Selesai Review' && $dis->statusKaryaFpp == 'Diterima') { ?>
                                        <button type="button" value="<?php echo $dis->IdFullpaper ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Karya"><i style="color:black;" class="bi bi-list-ul"></i></button>
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

<!-- /.modal-dialog -->
<!--Extra Large Modal -->
<div class="modal fade text-left w-100" id="detailAbstrak" tabindex="-1" role="dialog" aria-labelledby="detailAbstrak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Data Karya</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">

                <textarea name="editor" id="default" cols="30" rows="10"></textarea>

                <br />
                <br />
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th>Fullpaper</th>
                            <th>:</th>
                            <th><label style="color:blue" id="viewlink" class="downloadsf"></labe>
                            </th>
                        </tr>
                        <tr>
                            <th>File Presentasi</th>
                            <th>:</th>
                            <th> <label style="color:blue" id="viewlinkppt" class="downloads"></label>
                            </th>
                        </tr>
                        <tr>
                            <th>Link Video</th>
                            <th>:</th>
                            <th> <label style="color:blue" id="linkvids" class="youtube"></label>
                            </th>
                        </tr>
                    </tbody>
                </table>
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

<div class="modal fade text-left" id="kirimNotif" tabindex="-1" role="dialog" aria-labelledby="kirimNotif" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('karya/kirimNotifFPP') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Buat Notifikasi</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden="true" id="sbE" name="sbE" readonly>
                    <input hidden="true" id="rbE" name="rbE">

                    <div class='form-group mandatory'>
                        <label class="form-label">Penerima Notifikasi</label>
                    </div>
                    <div class='form-group mandatory'>

                        <li class="d-inline-block me-2 mb-1">
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="rbR" value="Reviewer" name="rbR" class="form-check-input">
                                    <label for="checkbox1">Reviewer</label>

                                </div>
                            </div>
                        </li>
                        <li class="d-inline-block me-2 mb-1">
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="rbS" name="rbS" value="Submission" class="form-check-input">
                                    <label for="checkbox1">Submission</label>

                                </div>
                            </div>
                        </li>

                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Subjek Email</label>
                        <textarea type="text" class="form-control" id="pesanE" placeholder="Masukan Subjek Email" name="pesanE" required></textarea>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Body Email</label>
                        <textarea type="text" class="form-control" id="pesanA" placeholder="Masukan Body Email" name="pesanA" required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="submit" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade text-left" id="kode" tabindex="-1" role="dialog" aria-labelledby="kode" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('karya/kirimKode') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Buat Notifikasi</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="idfp" name="idfp" readonly>


                    <div class='form-group'>
                        <label class="form-label">Kode Paper</label>

                        <input type="text" class="form-control" id="kodeE" placeholder="Masukan Pesan" name="kodeE" required />
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="submit" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="modal fade text-left" id="modal_userDetail">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Author</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!--manage form Modal -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function senddata(value) {
        console.log(value)
        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('default').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("readonly");

        var ppt = document.getElementById('ppt' + value);
        var editppt = document.getElementById('viewlinkppt');
        editppt.innerHTML = ppt.innerHTML;

        var pdf = document.getElementById('pdf' + value);
        var editpdf = document.getElementById('viewlink');
        editpdf.innerHTML = pdf.innerHTML;

        var vid = document.getElementById('video' + value);
        var editvid = document.getElementById('linkvids');
        editvid.innerHTML = vid.innerHTML;

        var editidabstrak = document.getElementById('IdAbstrak');
        editidabstrak.value = value;
    }

    function sendid(value) {
        console.log(value)


        var sb = document.getElementById('idfp');
        // var editsb = document.getElementById('sbE');
        sb.value = value;
    }

    function senddatareviewer(value) {
        console.log(value)
        var idevent = document.getElementById('reviewedBy' + value);
        var editidevent = document.getElementById('reviewedBy');
        editidevent.value = idevent.innerHTML;

        var editidabstrak = document.getElementById('IdAbstraks');
        editidabstrak.value = value;
    }

    function sendnotif(value) {
        console.log(value)
        var sb = document.getElementById('sb' + value);
        var editsb = document.getElementById('sbE');
        editsb.value = sb.innerHTML;

        var rb = document.getElementById('reviewedBy' + value);
        var editrb = document.getElementById('rbE');
        editrb.value = rb.innerHTML;

    }

    function showuserdetail(IdAbstrak) {
        $.ajax({
            type: "post",
            url: "<?= site_url('karya/srvLoad_usergetbyid'); ?>",
            data: "IdAbstrak=" + IdAbstrak,
            dataType: "html",
            success: function(response) {
                $('#bodymodal_userDetail').empty();
                $('#bodymodal_userDetail').append(response);
            }
        });
    }

    $(document).ready(function() {
        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });

        $('.downloads').on('click', function(e) {
            var txt = $(this).text();
            console.log(txt);

            document.location.href = "<?php echo base_url() . 'fullpaper/download/'  ?>" + txt;

        })
        $('.downloadsf').on('click', function(e) {
            var txts = $(this).text();
            console.log(txts);

            document.location.href = "<?php echo base_url() . 'fullpaper/downloadpdf/'  ?>" + txts;
        })
        $('.youtube').on('click', function(e) {
            var link = $(this).text();
            window.open(link, "_blank");
        })
        $('.tombol-kirim').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin',

                text: "data abstrak akan dikirimkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal!',
                reverseButtons: true


            }).then((result) => {
                if (result.isConfirmed) {
                    // swalWithBootstrapButtons.fire(
                    //     'Terkirim!',
                    //     'Abstrak berhasil dikirim ke reviewer.',
                    //     'success',

                    // )
                    if (result.value) {
                        document.location.href = href;
                    }

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'Abstrak batal dikirim',
                        'error'
                    )
                }

            })
        })
    })
</script>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>