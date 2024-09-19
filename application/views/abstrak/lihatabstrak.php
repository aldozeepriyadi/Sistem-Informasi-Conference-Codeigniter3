<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Abstrak <?php echo $this->session->userdata('nameEvent'); ?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardP'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Abstrak</li>
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

                <button class="btn icon icon-left btn-primary tambahData"><a href="<?php echo site_url('abstrak/UploadAbstrak') ?>" class="text-white"><i class="bi bi-plus-circle"></i> Unggah Abstrak</a></button>
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
                } else if ($this->session->flashdata('gagalupdate') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagalupdate');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('suksesupdate') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('suksesupdate');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } ?>
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Title
                            </th>
                            <th hidden="true">
                                Nama Event
                            </th>
                            <th>
                                Topic
                            </th>
                            <th>
                                Kata Kunci
                            </th>
                            <th>
                                Status Karya
                            </th>
                            <th>
                                Status Distribusi
                            </th>
                            <th hidden="true">
                                Abstrak
                            </th>
                            <th hidden="true">
                                RB
                            </th>
                            <th hidden="true">
                                AuthorA
                            </th>
                            <th hidden="true">
                                Komentar
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($abstrak as $ev) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="titleA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->title ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="eventA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->nameEvent ?></label>
                                </td>
                                <td>
                                    <label id="topikA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->topic ?></label>
                                </td>
                                <td>
                                    <label id="katakunciA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->KataKunci ?></label>
                                </td>
                                <td>
                                    <label id="statusA<?php echo $ev->IdAbstrak ?>"><?php
                                                                                    if ($ev->statusKarya == "Diterima") {
                                                                                        echo '<div class="badge bg-success">';
                                                                                        echo $ev->statusKarya;
                                                                                    } else if ($ev->statusKarya == "Ditolak") {
                                                                                        echo '<div class="badge bg-danger">';
                                                                                        echo $ev->statusKarya;
                                                                                    } else if ($ev->statusKarya == null) {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo '<div class="badge bg-info">';
                                                                                        echo $ev->statusKarya;
                                                                                    }
                                                                                    ?></label>
                                </td>
                                <td>
                                    <label id="statusA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->statusDistribusi ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $ev->IdAbstrak ?>"><?php echo $ev->abstract ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="rb<?php echo $ev->IdAbstrak ?>"><?php echo $ev->reviewedbyID ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="authorA"></label>
                                </td>
                                <td hidden="true">
                                    <label id="komentar<?php echo $ev->IdAbstrak ?>"><?php echo $ev->keterangan ?></label>
                                </td>
                                <td>
                                    <?php if ($ev->statusDistribusi == "Berhasil Dikumpulkan") { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($ev->deadlineRevisi < date('Y-m-d') && $ev->statusKarya == "Selesai Review") { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        <!-- PERLU MODAL LAGI BUAT NAMPILIN ABSTRAK DAN KOEMNTARNYA BUTTON NYA DI BWH INI -->
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Catatan Revisi"><i class="bi bi-stickies-fill"></i></button>

                                    <?php } else if ($ev->statusKarya != "Diterima" && $ev->statusDistribusi == 'Proses Review') { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($ev->statusKarya == "Ditolak" && $ev->statusDistribusi == 'Selesai Review') { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Revisi Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#komentarAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Catatan Revisi"><i class="bi bi-stickies-fill"></i></button>
                                    <?php } else if ($ev->statusKarya != "Diterima" && $ev->statusDistribusi == 'Selesai Review') { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#revisiAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Revisi Abstrak"><i style="color:black;" class="bi bi-pencil-square"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#komentarAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Catatan Revisi"><i class="bi bi-stickies-fill"></i></button>
                                    <?php } else if ($ev->statusKarya == "Diterima" && $ev->statusDistribusi == "Berhasil submit fullpaper") { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($ev->statusKarya == "Diterima" && $ev->statusDistribusi != "Berhasil submit fullpaper" && $ev->statusPayment == 'Diterima') { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($ev->statusKarya == "Diterima" && $ev->statusDistribusi != "Berhasil submit fullpaper" && $ev->statusPayment == NULL) { ?>
                                        <button type="button" value="<?php echo  $ev->IdAbstrak ?>" onclick="showuserdetail(<?php echo $ev->IdAbstrak ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                <a type="button" href="<?php echo site_url('abstrak/cardEvent/'); ?>" class="btn btn-danger">
                    Kembali
                </a>
            </div>
        </div>

    </section>
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
<div class="modal fade text-left w-100" id="revisiAbstrak" tabindex="-1" role="dialog" aria-labelledby="revisiAbstrak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <form class="form" action="<?php echo base_url('abstrak/editAbstrakPeserta') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Abstrak</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class='form-group mandatory'>
                        <label class="form-label">Event</label>
                        <input hidden="true" type="text" class="form-control" id="IdEvent" value="<?php echo $this->session->userdata('IdEventC'); ?>" name="IdEvent">
                        <input type="text" class="form-control" id="IdEventD" name="IdEventD" readonly>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Topik</label>
                        <input type="text" class="form-control" id="topic" name="topic" readonly>
                    </div>

                    <div class='form-group mandatory'>
                        <label class="form-label">Abstrak</label>
                        <textarea class="readonlyeditor" id="default" name="content" cols="30" rows="10"></textarea>
                    </div>

                    <div class='form-group mandatory'>
                        <label class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="contoh: teknologi, adaptasi, pembaruan">
                    </div>
                    <input hidden="true" id="IdAbstraks" name="IdAbstraks" readonly>
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

<div class="modal fade text-left w-100" id="detailsAbstrak" tabindex="-1" role="dialog" aria-labelledby="detailsAbstrak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Isi Abstrak</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class='form-group mandatory'>
                    <textarea class="readonlyeditor" id="defaultE" cols="30" rows="10"></textarea>
                </div>

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

<div class="modal fade text-left w-100" id="komentarAbstrak" tabindex="-1" role="dialog" aria-labelledby="komentarAbstrak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Catatan Revisi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class='form-group mandatory'>
                    <textarea class="readonlyeditor" id="defaults" cols="30" rows="10"></textarea>
                </div>

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
<div class="modal fade text-left" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Prosiding</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('abstrak/saveFullpaper'); ?>
                <input type="text" class="form-control" id="idabs" name="idabs" readonly>
                <input type="text" class="form-control" id="idrvw" name="idrvw" readonly>
                <div class='form-group mandatory'>
                    <label class="form-label">Event </label>
                    <input type="text" class="form-control" id="IdEventss" value="<?php echo $this->session->userdata('IdEventC'); ?>" name="IdEventss">
                    <input type="text" class="form-control" id="IdEventD" value="<?php echo $this->session->userdata('nameEvent'); ?>" name="IdEventD" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="titles" name="title" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topics" name="topic" readonly>
                </div>
                <div class="form-group mandatory">
                    <label for="fileFpp">File Fullpaper</label>
                    <input type="file" id="fileFpp" class="form-control" name="fileFpp" required />
                </div>

                <div class="form-group mandatory">
                    <label for="filePpt">File Presentasi</label>
                    <input type="file" id="filePpt" class="form-control" name="filePpt" required />
                </div>
                <div class="form-group">
                    <label for="topic">Link Video</label>
                    <input type="text" class="form-control" id="links" placeholder="Masukkan link video" name="links" />
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
                <button id="submit" name="submit" type="submit" class="btn btn-primary shadow-sm">Tambah</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.tambahData Modal -->

<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/ckeditor.js') ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


<script>
    function showuserdetail(IdAbstrak) {
        $.ajax({
            type: "post",
            url: "<?= site_url('abstrak/srvLoad_usergetbyid'); ?>",
            data: "IdAbstrak=" + IdAbstrak,
            dataType: "html",
            success: function(response) {
                $('#bodymodal_userDetail').empty();
                $('#bodymodal_userDetail').append(response);
            }
        });
    }

    function senddataabs(value) {
        console.log(value)

        var idjudul = document.getElementById('titleA' + value);
        var editjudul = document.getElementById('titles');
        editjudul.value = idjudul.innerHTML;

        var idtopic = document.getElementById('topikA' + value);
        var edittopic = document.getElementById('topics');
        edittopic.value = idtopic.innerHTML;

        var editidabstrak = document.getElementById('idabs');
        editidabstrak.value = value;

        var rb = document.getElementById('rb' + value);
        var editidrev = document.getElementById('idrvw');
        editidrev.value = rb.innerHTML;

    }

    function senddata(value) {
        console.log(value)

        var idevent = document.getElementById('eventA' + value);
        var editidevent = document.getElementById('IdEventD');
        editidevent.value = idevent.innerHTML;
        console.log(idevent.innerHTML);

        var idjudul = document.getElementById('titleA' + value);
        var editjudul = document.getElementById('title');
        editjudul.value = idjudul.innerHTML;
        console.log(idjudul.innerHTML);

        var idtopic = document.getElementById('topikA' + value);
        var edittopic = document.getElementById('topic');
        edittopic.value = idtopic.innerHTML;
        console.log(idtopic.innerHTML);

        var idword = document.getElementById('katakunciA' + value);
        var editword = document.getElementById('keyword');
        editword.value = idword.innerHTML;
        console.log(idword.innerHTML);

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('default').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("design");
        console.log(isiabstrak.innerHTML);

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('defaultE').setContent(isiabstrak.innerHTML);
        //tinymce.activeEditor.mode.set("readonly");
        console.log(isiabstrak.innerHTML);

        var idk = document.getElementById('komentar' + value);
        tinyMCE.get('defaults').setContent(idk.innerHTML);
        tinymce.activeEditor.mode.set("readonly");
        console.log(idk.innerHTML);

        var editidabstrak = document.getElementById('IdAbstraks');
        editidabstrak.value = value;



    }

    $(document).ready(function() {
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
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

        tinymce.init({
            selector: '.readonlyeditor',
            height: 400,
            readonly: true,
            theme: 'silver',
            plugins: [
                'advlist  lists ',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
            toolbar2: 'print preview | forecolor backcolor emoticons ',
            image_advtab: true,
        });

        $('#example').DataTable({
            scrollY: 230,
            scrollX: true,
        });


    })
</script>