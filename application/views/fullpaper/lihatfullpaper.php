<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Submit Fullpper</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardP'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Submit Fullpper</li>
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
                } else if ($this->session->flashdata('gagalsave') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagalsave');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('suksessave') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('suksessave');
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
                                Event
                            </th>
                            <th>
                                Judul
                            </th>
                            <th>
                                Topik
                            </th>
                            <th hidden="true">
                                RB
                            </th>
                            <th>
                                Status Distribusi
                            </th>
                            <th>
                                Status Karya
                            </th>
                            <th hidden="true">
                                MB
                            </th>
                            <th hidden="true">
                                dl
                            </th>
                            <th hidden="true">
                                eve
                            </th>
                            <th hidden="true">
                                key
                            </th>
                            <th hidden="true">
                                ppt
                            </th>
                            <th hidden="true">
                                pdf
                            </th>
                            <th hidden="true">
                                link
                            </th>
                            <th hidden="true">
                                isi
                            </th>
                            <th hidden="true">
                                idfpp
                            </th>
                            <th hidden="true">
                                RB
                            </th>
                            <th hidden="true">
                                ketfpp
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php foreach ($abstrak as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="eve<?php echo $dis->IdAbstrak ?>"><?php echo $dis->nameEvent ?></label>
                                </td>
                                <td>
                                    <label id="judul<?php echo $dis->IdAbstrak ?>"><?php echo $dis->title ?></label>
                                </td>
                                <td>
                                    <label id="topic<?php echo $dis->IdAbstrak ?>"><?php echo $dis->topic ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="reviewedBy<?php echo $dis->IdAbstrak ?>"><?php echo $dis->reviewedbyFpp ?></label>
                                </td>
                                <td>
                                    <label id="statusD<?php echo $dis->IdAbstrak ?>"><?php echo $dis->statusDistribusiFpp ?></label>
                                </td>
                                <td>
                                    <label id="statusK<?php echo $dis->IdAbstrak ?>"><?php
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
                                    <label id="modifD<?php echo $dis->IdAbstrak ?>"><?php echo $dis->modifieddateFpp ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="deadlineR<?php echo $dis->IdAbstrak ?>"><?php echo $dis->deadlineRevisiFpp ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="event<?php echo $dis->IdAbstrak ?>"><?php echo $dis->IdEvent ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="keyw<?php echo $dis->IdAbstrak ?>"><?php echo $dis->KataKunci ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="presentasi<?php echo $dis->IdAbstrak ?>"><?php echo $dis->PresentationFile ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="fullpaper<?php echo $dis->IdAbstrak ?>"><?php echo $dis->FullpaperFile ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="linksvid<?php echo $dis->IdAbstrak ?>"><?php echo $dis->VideoLink ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $dis->IdAbstrak ?>"><?php echo $dis->abstract ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="idfpp<?php echo $dis->IdAbstrak ?>"><?php echo $dis->IdFullpaper ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="rb<?php echo $dis->IdAbstrak ?>"><?php echo $dis->reviewedby ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="ketfpp<?php echo $dis->IdAbstrak ?>"><?php echo $dis->keteranganFpp ?></label>
                                </td>
                                <td>
                                    <?php if ($dis->statusKarya == "Diterima" && $dis->statusDistribusiFpp == "Belum mengumpulkan") { ?>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddataabs(this.value)" class="btn icon icon-left btn-danger" data-bs-toggle="modal" data-bs-target="#tambahData" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unggah Fullpaper"><i class="bi bi-file-earmark-arrow-up"></i></button>
                                    <?php } else  if ($dis->statusDistribusiFpp == "Selesai Review" && $dis->statusKaryaFpp == "Diterima") { ?>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddatafpp(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakFpp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        <!-- <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddataabs(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#tambahData"><i class="bi bi-list-ul"></i></i>
                                            Upload
                                        </button> -->
                                    <?php } else  if ($dis->statusDistribusiFpp == "Proses Review" && $dis->statusKaryaFpp != "Diterima") { ?>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddatafpp(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakFpp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else  if ($dis->statusDistribusiFpp == "Selesai Review" && $dis->statusKaryaFpp != "Diterima") { ?>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddatafpp(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakFpp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="sendalasan(this.value)" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#detailAlasan" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Catatan Revisi"><i class="bi bi-stickies-fill"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="ubahdata(this.value)" class="btn icon icon-left btn-warning" data-bs-toggle="modal" data-bs-target="#ubahFpp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Revisi Fullpaper"><i style="color:black;" class="bi bi-pencil-square"></i></button>
                                    <?php } else if ($dis->deadlineRevisiFpp < date('Y-m-d')) { ?>
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="senddatafpp(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakFpp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis->IdAbstrak ?>" onclick="sendalasan(this.value)" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#detailAlasan" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Catatan Revisi"><i class="bi bi-stickies-fill"></i></button>
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
<div class="modal fade text-left" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah Fullpaper</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('abstrak/saveFullpaper'); ?>
                <input type="text" hidden="true" class="form-control" id="idabs" name="idabs" readonly>
                <input type="text" hidden="true" class="form-control" id="idrvw" name="idrvw" readonly>
                <div class='form-group mandatory'>
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="titles" name="title" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topics" name="topic" readonly>
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="fileFpp">File Fullpaper</label>
                    <input type="file" id="fileFpp" class="form-control" accept=".pdf" name="fileFpp" required />
                </div>

                <div class="form-group mandatory">
                    <label class="form-label" for="filePpt">File Presentasi</label>
                    <input type="file" id="filePpt" class="form-control" accept=".ppt, .pptx" name="filePpt" required />
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

    </div>

</div>

<div class="modal fade text-left w-100" id="detailAlasan" tabindex="-1" role="dialog" aria-labelledby="detailAlasan" aria-hidden="true">
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
                    <textarea class="readonlyeditor" name="editor" id="catatan" cols="30" rows="10"></textarea>
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
                <div class='form-group mandatory'>
                    <label class="form-label">Event</label>
                    <select name="IdEvent" id="IdEvent" class="form-select" disabled="false">

                        <?php
                        foreach ($getDataEvent as $row) {
                            echo '<option value="' . $row->IdEvent . '">' . $row->nameEvent  . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topic" name="topic" readonly>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Abstrak</label>
                    <textarea class="readonlyeditor" name="editor" id="default" cols="30" rows="10"></textarea>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Kata Kunci</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" readonly>
                </div>

                <input hidden="true" id="IdAbstraks" name="IdAbstraks" readonly>
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

<div class="modal fade text-left w-100" id="detailAbstrakFpp" tabindex="-1" role="dialog" aria-labelledby="detailAbstrakFpp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Detail Data</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class='form-group mandatory'>
                    <label class="form-label">Event</label>
                    <select name="IdEvent" id="IdEventfpp" class="form-select" disabled="false">

                        <?php
                        foreach ($getDataEvent as $row) {
                            echo '<option value="' . $row->IdEvent . '">' . $row->nameEvent  . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="titlefpp" name="title" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topicfpp" name="topic" readonly>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Abstrak</label>
                    <textarea class="readonlyeditor" name="editor" id="defaults" cols="30" rows="10"></textarea>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Kata Kunci</label>
                    <input type="text" class="form-control" id="keywordfpp" name="keyword" readonly>
                </div>

                <input hidden="true" id="IdAbstraksfpp" name="IdAbstraks" readonly>

                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th>Fullpaper</th>
                            <th>:</th>
                            <th><label style="color:blue" id="viewlinkE" class="downloadsf"></labe>
                            </th>
                        </tr>
                        <tr>
                            <th>File Presentasi</th>
                            <th>:</th>
                            <th> <label style="color:blue" id="viewlinkpptE" class="downloads"></label>
                            </th>
                        </tr>
                        <tr>
                            <th>Link Video</th>
                            <th>:</th>
                            <th> <label style="color:blue" id="linkvidsE" class="youtube"></label>
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

<div class="modal fade text-left w-100" id="ubahFpp" tabindex="-1" role="dialog" aria-labelledby="ubahFpp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Ubah Fullpaper</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <?php echo form_open_multipart('fullpaper/editFullpaperPeserta'); ?>
                <input hidden="true" type="text" id="idfppU" name="idfppU" readonly>
                <input hidden="true" type="text" id="reasonU" name="reasonU" readonly>
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th>Fullpaper</th>
                            <th>:</th>
                            <th><label style="color:blue" id="viewlinkU" class="downloadsf"></labe>
                            </th>
                        </tr>
                        <tr>
                            <th>File Presentasi</th>
                            <th>:</th>
                            <th> <label style="color:blue" class="downloads" id="viewlinkpptU"></label>
                            </th>
                        </tr>
                        <tr>
                            <th>Link Video</th>
                            <th>:</th>
                            <th> <label style="color:blue" id="linkvidsU" class="youtube"></label>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group mandatory">
                    <label class="form-label" for="fileFpp">File Fullpaper</label>
                    <input type="file" id="fileFpp" accept=".pdf" class="form-control" name="fileFpp" required />
                </div>

                <div class="form-group mandatory">
                    <label class="form-label" for="filePpt">File Presentasi</label>
                    <input type="file" id="filePpt" accept=".ppt, .pptx" class="form-control" name="filePpt" required />
                </div>
                <div class="form-group">
                    <label for="topic">Link Video</label>
                    <input type="text" class="form-control" id="links" placeholder="Enter Topik Prosiding" name="links" />
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
                <button id="submit" name="submit" value="upload" class="btn btn-primary shadow-sm">Ubah</button>
            </div>
            <?php echo form_close() ?>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function senddata(value) {
        console.log(value)

        var idevent = document.getElementById('event' + value);
        var editidevent = document.getElementById('IdEvent');
        editidevent.value = idevent.innerHTML;

        var idjudul = document.getElementById('judul' + value);
        var editjudul = document.getElementById('title');
        editjudul.value = idjudul.innerHTML;

        var idtopic = document.getElementById('topic' + value);
        var edittopic = document.getElementById('topic');
        edittopic.value = idtopic.innerHTML;

        var idword = document.getElementById('keyw' + value);
        var editword = document.getElementById('keyword');
        editword.value = idword.innerHTML;

        var editidabstrak = document.getElementById('IdAbstraks');
        editidabstrak.value = value;

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('default').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("readonly");


    }


    function senddataabs(value) {
        console.log(value)

        var idjudul = document.getElementById('judul' + value);
        var editjudul = document.getElementById('titles');
        editjudul.value = idjudul.innerHTML;

        var idtopic = document.getElementById('topic' + value);
        var edittopic = document.getElementById('topics');
        edittopic.value = idtopic.innerHTML;

        var editidabstrak = document.getElementById('idabs');
        editidabstrak.value = value;

        var rb = document.getElementById('rb' + value);
        var editidrev = document.getElementById('idrvw');
        editidrev.value = rb.innerHTML;

    }

    function ubahdata(value) {
        var sa = document.getElementById('fullpaper' + value);
        var sas = document.getElementById('viewlinkU');
        sas.innerHTML = sa.innerHTML;


        var si = document.getElementById('presentasi' + value);
        var sis = document.getElementById('viewlinkpptU');
        sis.innerHTML = si.innerHTML;

        var sa = document.getElementById('linksvid' + value);
        var sas = document.getElementById('linkvidsU');
        sas.innerHTML = sa.innerHTML;

        var catatan = document.getElementById('ketfpp' + value);
        var editcatatan = document.getElementById('reasonU');
        editcatatan.value = catatan.innerHTML;

        var idevent = document.getElementById('idfpp' + value);
        var editidevent = document.getElementById('idfppU');
        editidevent.value = idevent.innerHTML;
    }

    function senddatafpp(value) {
        console.log(value)

        var idevent = document.getElementById('event' + value);
        var editidevent = document.getElementById('IdEventfpp');
        editidevent.value = idevent.innerHTML;

        var idjudul = document.getElementById('judul' + value);
        var editjudul = document.getElementById('titlefpp');
        editjudul.value = idjudul.innerHTML;

        var idtopic = document.getElementById('topic' + value);
        var edittopic = document.getElementById('topicfpp');
        edittopic.value = idtopic.innerHTML;

        var idword = document.getElementById('keyw' + value);
        var editword = document.getElementById('keywordfpp');
        editword.value = idword.innerHTML;

        var editidabstrak = document.getElementById('IdAbstraksfpp');
        editidabstrak.value = value;

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('defaults').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("readonly");

        var idword = document.getElementById('keyw' + value);
        var editword = document.getElementById('keyword');
        editword.value = idword.innerHTML;

        var sa = document.getElementById('fullpaper' + value);
        var sas = document.getElementById('viewlinkE');
        sas.innerHTML = sa.innerHTML;


        var si = document.getElementById('presentasi' + value);
        var sis = document.getElementById('viewlinkpptE');
        sis.innerHTML = si.innerHTML;

        var sa = document.getElementById('linksvid' + value);
        var sas = document.getElementById('linkvidsE');
        sas.innerHTML = sa.innerHTML;


    }

    function sendalasan(value) {
        console.log(value)

        var catatans = document.getElementById('ketfpp' + value);
        tinyMCE.get('catatan').setContent(catatans.innerHTML);
        tinymce.activeEditor.mode.set("readonly");

    }

    function showuserdetail(IdAbstrak) {
        $.ajax({
            type: "post",
            url: "<?= site_url('DistribusiKarya/srvLoad_usergetbyid'); ?>",
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

            document.location.href = "<?php echo base_url() . 'Fullpaper/download/'  ?>" + txt;

        })
        $('.downloadsf').on('click', function(e) {
            var txts = $(this).text();
            console.log(txts);

            document.location.href = "<?php echo base_url() . 'Fullpaper/downloadpdf/'  ?>" + txts;
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
            readonly: false,
            theme: 'silver',
            plugins: [
                'advlist  lists ',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
            toolbar2: 'print preview | forecolor backcolor emoticons ',
            image_advtab: true,
        });

    })
</script>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>