<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Distribusi Abstrak</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Distribusi Abstrak</li>
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

    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-icon icon-left">
                    <span class="badge bg-transparent"><?php echo $jumlahkarya; ?></span> Karya Perlu Didistribusikan
                </button>
                <button type="button" class="btn btn-primary btn-icon icon-left">
                    <span class="badge bg-transparent"><?php echo $jumlahkodepaper; ?></span> Karya Perlu Kode Paper
                </button>
            </div>
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
                } else  if ($this->session->flashdata('gagalkode') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagalkode');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('sukseskode') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('sukseskode');
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
                                Status Karya
                            </th>
                            <th>
                                Status Distribusi
                            </th>
                            <th>
                                Tanggal modifikasi
                            </th>
                            <th hidden="true">
                                Reviewed By
                            </th>
                            <th>
                                Batas Revisi
                            </th>
                            <th hidden="true">
                                Submitted by
                            </th>
                            <th hidden="true">
                                Id Event
                            </th>
                            <th hidden="true">
                                Submitted by
                            </th>
                            <th hidden="true">
                                Abstrak
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php $distribusi = $this->allmodel->getAllDistribusiKarya(); ?>
                        <?php foreach ($distribusi as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="assessmentCriteria<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['title'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="value<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['topic'] ?></label>
                                </td>
                                <td>
                                    <?php echo $dis['reviewedby'] ?>
                                </td>
                                <td>
                                    <label id="sk<?php echo $dis['IdAbstrak'] ?>"><?php
                                                                                    if ($dis['statusKarya'] == "Diterima") {
                                                                                        echo '<div class="badge bg-success">';
                                                                                        echo $dis['statusKarya'];
                                                                                    } else if ($dis['statusKarya'] == "Ditolak") {
                                                                                        echo '<div class="badge bg-danger">';
                                                                                        echo $dis['statusKarya'];
                                                                                    } else if ($dis['statusKarya'] == null) {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo '<div class="badge bg-info">';
                                                                                        echo $dis['statusKarya'];
                                                                                    }
                                                                                    ?></label>
                                </td>
                                <td>
                                    <label id="sd<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['statusDistribusi'] ?></label>
                                </td>
                                <td>
                                    <label id="md<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['modifieddate'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="reviewedBy<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['reviewedbyID'] ?></label>
                                </td>
                                <td>
                                    <label id="dr<?php echo $dis['IdAbstrak'] ?>"><?php if ($dis['deadlineRevisi'] == null) {
                                                                                        echo $dis['deadlineRevisi'];
                                                                                    } else if ($dis['deadlineRevisi'] < date('Y-m-d ')) {
                                                                                        $date = date_create($dis['deadlineRevisi']);
                                                                                        $tglbaru = date_format($date, "d F Y H:i:s");
                                                                                        echo "<div class='badge bg-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' title='{$tglbaru}'>";
                                                                                        echo 'Melewati Batas';
                                                                                    } else {
                                                                                        $date = date_create($dis['deadlineRevisi']);
                                                                                        echo date_format($date, "d F Y H:i:s");
                                                                                    }
                                                                                    ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="sb<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['submittedbyID'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="eve<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['IdEvent'] ?></label>
                                </td>
                                <td hidden="true">
                                    <?php echo $dis['submittedby'] ?>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['abstract'] ?></label>
                                </td>
                                <td>
                                    <?php if ($dis['statusDistribusi'] == 'Perlu kodepaper' && $dis['statusKarya'] == 'Diterima' && $dis['statusPayment'] == 'Diterima') { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="sendid(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kode"><i style="color:black;" class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atur Kode Paper"></i>
                                        </button>
                                    <?php } else if ($dis['statusDistribusi'] == 'Perlu kodepaper' && $dis['statusKarya'] == 'Diterima' && $dis['statusPayment'] != 'Diterima') { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($dis['statusDistribusi'] == 'Selesai Review' || $dis['statusDistribusi'] == 'Berhasil submit fullpaper') { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>

                                    <?php } else if ($dis['statusDistribusi'] == 'Proses Review') { ?>

                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="sendnotif(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#kirimNotif" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kirim Notifikasi"><i style="color:black;" class="bi bi-bell"></i>
                                        </button>
                                    <?php } else if ($dis['statusDistribusi'] == 'Berhasil Dikumpulkan' && $dis['statusKarya'] == null) { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddatareviewer(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#pilihReviewer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pilih Reviewer"><i style="color:black;" class="bi bi-pencil-square"></i></button>


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
<div class="modal fade text-left" id="pilihReviewer" tabindex="-1" role="dialog" aria-labelledby="pilihReviewer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('karya/kirim') ?>" method="POST" enctype="multipart/form-data" id="myform">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Reviewer</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>


                <div class="modal-body">
                    <input hidden="true" id="IdAbstraks" name="IdAbstraks" readonly>
                    <label>Reviewer : </label>
                    <div class="form-group">
                        <fieldset class="form-group">
                            <select name="reviewedBy" id="reviewedBy" class="form-select" required>
                                <option value="" selected>-- Pilih Reviewer --</option>
                                <?php
                                foreach ($getReviewer as $row) {
                                    echo '<option value="' . $row->IdUser . '">' . $row->namaUser  . '</option>';
                                }
                                ?>
                            </select>
                        </fieldset>
                    </div>

                    <br />
                    <br />
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama Reviewer
                                </th>
                                <th>
                                    Banyak karya
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php $i = 0; ?>
                            <?php $getbobot = $this->allmodel->getBobotReviewer(); ?>
                            <?php foreach ($getbobot as $dis) { ?>
                                <tr>
                                    <td>
                                        <?php $i++ ?>
                                        <?php echo $i ?>
                                    </td>
                                    <td>
                                        <?php echo $dis['namaUser'] ?>
                                    </td>
                                    <td>
                                        <?php echo $dis['JML'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    <!-- 
                    <input type="text" id="IdAbstraks" name="IdAbstraks"> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger tombol-kirim" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>

                    <!-- <a type="submit" href="<?php echo site_url('karya/kirim/' . $dis['IdAbstrak']) ?>" class="btn btn-primary tombol-kirim">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </a> -->
                    <button type="button" id="btn-ok" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!--Extra Large Modal -->
<div class="modal fade text-left w-100" id="detailAbstrak" tabindex="-1" role="dialog" aria-labelledby="detailAbstrak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Abstrak</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input hidden="true" id="IdAbstrak" name="IdAbstrak" readonly>
                <textarea name="editor" id="default" cols="30" rows="10"></textarea>
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

<div class="modal fade text-left" id="kode" tabindex="-1" role="dialog" aria-labelledby="kode" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('karya/kirimKode') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Atur Kode Paper</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input hidden="true" id="idfp" name="idfp" readonly>
                    <input hidden="true" id="submitby" name="submitby" readonly>
                    <input hidden="true" id="reviewedBys" name="reviewedBys" readonly>
                    <input hidden="true" id="ideve" name="ideve" readonly>
                    <div class='form-group mandatory'>
                        <label class="form-label">Kode Paper</label>

                        <input type="text" class="form-control" id="kodeE" placeholder="Masukan Kode Paper" name="kodeE" required />
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
    </div>
</div>

<div class="modal fade text-left" id="kirimNotif" tabindex="-1" role="dialog" aria-labelledby="kirimNotif" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('karya/kirimNotif') ?>" method="POST" enctype="multipart/form-data">
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


                    <label class="form-label">Penerima Notifikasi</label>
                    <div class='form-group'>
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
                    <div class='form-group'>
                        <label class="form-label">Subjek Email</label>
                        <textarea type="text" class="form-control" id="pesanE" placeholder="Masukan Subjek Email" name="pesanE" required></textarea>
                    </div>
                    <div class='form-group'>
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

<!-- /.modal-content -->
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

        var editidabstrak = document.getElementById('IdAbstrak');
        editidabstrak.value = value;
    }

    function sendid(value) {
        console.log(value)

        var submit = document.getElementById('sb' + value);
        var editsubmit = document.getElementById('submitby');
        editsubmit.value = submit.innerHTML;
        console.log(editsubmit.value)
        var idrev = document.getElementById('reviewedBy' + value);
        var editidrev = document.getElementById('reviewedBys');
        editidrev.value = idrev.innerHTML;
        console.log(editidrev.value)

        var ideve = document.getElementById('eve' + value);
        var editideve = document.getElementById('ideve');
        editideve.value = ideve.innerHTML;
        console.log(editideve.value)

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

    // function submitForm(form) {
    //     swal({
    //             title: "Are you sure?",
    //             text: "This form will be submitted",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then(function(isOkay) {
    //             if (isOkay) {
    //                 form.submit();
    //             }
    //         });
    //     return false;
    // }

    $(document).ready(function() {
        // jQuery("body").on("beforeSubmit", "form#myform", function() {
        //     // You logic
        //     swal({
        //         title: "Are you sure?",
        //         type: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#DD6B55",
        //         // confirmButtonText: "Yes!",
        //         cancelButtonText: "Cancel",
        //         closeOnConfirm: true
        //     }, function(isConfirm) {
        //         if (isConfirm) {
        //             event.preventDefault();
        //             return true;
        //         } else {
        //             return false;
        //         }
        //     });
        // });
        $('form #btn-ok').click(function(e) {
            let $form = $(this).closest('form');
            // const href = $(this).attr('href')

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin',

                text: "data abstrak akan dikirimkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin!',
                confirmButtonColor: "#FF0000",
                cancelButtonText: 'Batal!',
                cancelButtonColor: "#008000",
                reverseButtons: true


            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Terkirim!',
                        'Abstrak berhasil dikirim ke reviewer.',
                        'success',
                        $('#myform').submit()
                    )
                    // if (result.value) {
                    //     document.location.href = href;
                    // }
                    $form.submit();
                    //location.reload();

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
        });

        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });

    })
</script>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>