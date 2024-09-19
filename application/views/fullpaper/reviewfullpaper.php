<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Review Fullpaper</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardR'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Review Fullpaper</li>
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
                if ($this->session->flashdata('gagals') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagals');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('suksess') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('suksess');
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
                                Status Karya
                            </th>
                            <th>
                                Status Distribusi
                            </th>
                            <th hidden="true">
                                KEYWORD
                            </th>
                            <th hidden="true">
                                Aabstrak
                            </th>
                            <th hidden="true">
                                PPT
                            </th>
                            <th hidden="true">
                                PDF
                            </th>
                            <th hidden="true">
                                Link
                            </th>
                            <th hidden="true">
                                Keterangan
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php $distribusi = $this->allmodel->getFullpaper(); ?>
                        <?php foreach ($distribusi as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="event<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['nameEvent'] ?></label>
                                </td>
                                <td>
                                    <label id="judul<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['title'] ?></label>
                                </td>
                                <td>
                                    <label id="topic<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['topic'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="reviewedBy<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['reviewedby'] ?></label>
                                </td>
                                <td>
                                    <?php
                                    if ($dis['statusKaryaFpp'] == "Diterima") {
                                        echo '<div class="badge bg-success">';
                                        echo $dis['statusKaryaFpp'];
                                    } else if ($dis['statusKaryaFpp'] == "Ditolak") {
                                        echo '<div class="badge bg-danger">';
                                        echo $dis['statusKaryaFpp'];
                                    } else if ($dis['statusKaryaFpp'] == null) {
                                        echo '';
                                    } else {
                                        echo '<div class="badge bg-info">';
                                        echo $dis['statusKaryaFpp'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $dis['statusDistribusiFpp'] ?>
                                </td>
                                <td hidden="true">
                                    <label id="keyw<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['KataKunci'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['abstract'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="presentasi<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['PresentationFile'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="fullpaper<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['FullpaperFile'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="linksvid<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['VideoLink'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="k<?php echo $dis['IdFullpaper'] ?>"><?php echo $dis['keteranganFpp'] ?></label>
                                </td>
                                <td>
                                    <?php if ($dis['statusDistribusiFpp'] == "Proses Review") { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdFullpaper'] ?>" onclick="senddatanilai(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakNilai" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($dis['statusDistribusiFpp'] != "Proses Review") { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdFullpaper'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Fullpaper"><i style="color:black;" class="bi bi-list-ul"></i></button>
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
                            echo '<option value="' . $row->nameEvent . '">' . $row->nameEvent  . '</option>';
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

<div class="modal fade text-left w-100" id="detailAbstrakNilai" tabindex="-1" role="dialog" aria-labelledby="detailAbstrakNilai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Data Karya</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class='form-group mandatory'>
                    <label class="form-label">Event</label>
                    <select name="IdEvent" id="IdEventE" class="form-select" disabled="false">

                        <?php
                        foreach ($getDataEvent as $row) {
                            echo '<option value="' . $row->nameEvent . '">' . $row->nameEvent  . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="date" id="tanggalAkhirEvent" value="<?= $getDataEvent[0]->tanggalAkhir ?>" style="display: none;">
                <div class='form-group mandatory'>
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="titleE" name="title" readonly>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topicE" name="topic" readonly>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Abstrak</label>
                    <textarea class="readonlyeditor" name="editor" id="defaultNilai" cols="30" rows="10"></textarea>
                </div>

                <div class='form-group mandatory'>
                    <label class="form-label">Kata Kunci</label>
                    <input type="text" class="form-control" id="keywordE" name="keyword" readonly>
                </div>

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

                <input hidden="true" id="IdAbstraksE" name="IdAbstraks" readonly>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
                <button data-bs-target="#secondpopup" data-bs-toggle="modal" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Nilai</span>
                </button>
            </div>
        </div>

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

<div class="modal fade text-left w-100" id="secondpopup" tabindex="-1" role="dialog" aria-labelledby="secondpopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <form class="form" action="<?php echo base_url('fullpaper/editFullpaper') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validNilai()">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Review Fullpaper</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="err"></div>
                    <div class='form-group mandatory'>
                        <fieldset>
                            <label class="form-label">
                                Status Karya
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusR" data-parsley-required="true" value="Revisi">
                                <label class="form-check-label form-label" for="status">
                                    Revisi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusD" value="Diterima">
                                <label class="form-check-label form-label" for="status">
                                    Diterima
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <div hidden="true" id="hlo" class='form-group mandatory'>
                        <label class="form-label">Batas Revisi</label>
                        <input type="datetime-local" class="form-control" id="deadlineRevisi" name="deadlineRevisi">
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Komentar</label>

                        <textarea class="readonlyeditor" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>

                    </div>

                    <input hidden="true" type="text" class="form-control" id="ppt" name="ppt">
                    <input hidden="true" type="text" class="form-control" id="fpp" name="fpp">
                    <input hidden="true" `type="text" class="form-control" id="link" name="link">
                    <input hidden="true" id="idfpp" name="idfpp" readonly>
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="btn" type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>

            </div>
    </div>
    </form>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function validNilai() {
        var hariIni = new Date();
        var deadlineRevisi = document.getElementById('deadlineRevisi').value;
        if (deadlineRevisi == "") {
            return true;
        }
        var tglAkhirEvent = new Date(document.getElementById('tanggalAkhirEvent').value);
        var tglDeadlineRevisi = new Date(deadlineRevisi);
        var message = "";

        if (tglDeadlineRevisi < hariIni) {
            message += 'Tanggal deadline revisi tidak boleh kurang dari hari ini<br>';
        }
        if (tglDeadlineRevisi > tglAkhirEvent) {
            message += 'Tanggal deadline revisi tidak boleh lebih dari tanggal akhir event<br>';
        }

        if (message != "") {
            document.getElementById('err').innerHTML = '<div class="alert alert-danger" role="alert">' + message + '</div>';
            return false;
        }
        return true;
    }

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

        var sa = document.getElementById('fullpaper' + value);
        var sas = document.getElementById('viewlink');
        sas.innerHTML = sa.innerHTML;


        var si = document.getElementById('presentasi' + value);
        var sis = document.getElementById('viewlinkppt');
        sis.innerHTML = si.innerHTML;

        var sa = document.getElementById('linksvid' + value);
        var sas = document.getElementById('linkvids');
        sas.innerHTML = sa.innerHTML;



        var editidabstrak = document.getElementById('IdAbstraks');
        editidabstrak.value = value;

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('default').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("readonly");

        var id = document.getElementsByName('IdAbstraks');
        console.log(id[0].value);
        var idinput = document.getElementById('IdAbstrak');
        idinput.value = id[0].value;


    }

    function senddatanilai(value) {
        console.log(value)

        var idevent = document.getElementById('event' + value);
        var editidevent = document.getElementById('IdEventE');
        editidevent.value = idevent.innerHTML;

        var idjudul = document.getElementById('judul' + value);
        var editjudul = document.getElementById('titleE');
        editjudul.value = idjudul.innerHTML;


        var idtopic = document.getElementById('topic' + value);
        var edittopic = document.getElementById('topicE');
        edittopic.value = idtopic.innerHTML;

        var idword = document.getElementById('keyw' + value);
        var editword = document.getElementById('keywordE');
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



        var editidabstrak = document.getElementById('idfpp');
        editidabstrak.value = value;

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('defaultNilai').setContent(isiabstrak.innerHTML);
        tinymce.activeEditor.mode.set("readonly");

        tinyMCE.get('keterangan');
        tinymce.activeEditor.mode.set("design");

        var sa = document.getElementById('fullpaper' + value);
        var sas = document.getElementById('fpp');
        sas.value = sa.innerHTML;


        var si = document.getElementById('presentasi' + value);
        var sis = document.getElementById('ppt');
        sis.value = si.innerHTML;

        var sa = document.getElementById('linksvid' + value);
        var sas = document.getElementById('link');
        sas.value = sa.innerHTML;


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

        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
        });

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
        $('#statusR').on('click', function(e) {
            if (document.getElementById("statusR").checked = true) {
                document.getElementById("hlo").hidden = false;
            }

        });
        $('#statusD').on('click', function(e) {
            if (document.getElementById("statusD").checked = true) {
                document.getElementById("hlo").hidden = true;
            }

        });
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


    })
</script>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>