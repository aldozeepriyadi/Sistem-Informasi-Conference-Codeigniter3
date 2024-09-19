<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Review Abstrak</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardR'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Review Abstrak</li>
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
                            <th>
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
                            <th>
                                Category
                            </th>
                            <th hidden="true">
                                ID EVE
                            </th>
                            <th hidden="true">
                                DL REV
                            </th>
                            <th hidden="true">
                                PPT
                            </th>
                            <th hidden="true">
                                PDF
                            </th>
                            <th hidden="true">
                                LINK
                            </th>
                            <th hidden="true">
                                KET
                            </th>
                            <th hidden="true">
                                KEYWORD
                            </th>
                            <th hidden="true">
                                ABSTRAK
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php $distribusi = $this->allmodel->getReviewKarya(); ?>
                        <?php foreach ($distribusi as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="judul<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['title'] ?></label>
                                </td>
                                <td>
                                    <label id="topic<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['topic'] ?></label>
                                </td>
                                <td>
                                    <label id="reviewedBy<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['reviewedby'] ?></label>
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
                                                                                    ?>
                                    </label>
                                </td>
                                <td>
                                    <label id="sd<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['statusDistribusi'] ?></label>
                                </td>
                                <td>
                                    <label id="md<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['modifieddate'] ?></label>
                                </td>
                                <td>
                                    <label id="event<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['nameEvent'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="event<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['IdEvent'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="dr<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['deadlineRevisi'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="presentasi<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['PresentationFile'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="fullpaper<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['FullpaperFile'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="linksvid<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['VideoLink'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="k<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['keterangan'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="keyw<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['KataKunci'] ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $dis['IdAbstrak'] ?>"><?php echo $dis['abstract'] ?></label>
                                </td>
                                <td>
                                    <?php if ($dis['statusDistribusi'] == "Proses Review") { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="showuserdetail(<?php echo $dis['IdAbstrak'] ?>)" data-bs-target="#modal_userDetail" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Daftar Author"><i class="bi bi-eye"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrak" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($dis['statusDistribusi'] != "Proses Review") { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakAja" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } else if ($dis['deadlineRevisi'] < date('Y-m-d') && $dis['statusKarya'] == "Selesai Review") { ?>
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#detailAbstrakAja" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Abstrak"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $dis['IdAbstrak'] ?>" onclick="sendtgl(this.value)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateTgl" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Tanggal"><i style="color:black;" class="bi bi-pencil-square"></i></button>
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

                <input type="date" id="tanggalAkhirEvent" value="<?= $getDataEvent[0]->tanggalAkhir ?>" style="display: none;">
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

<div class="modal fade text-left w-100" id="detailAbstrakAja" tabindex="-1" role="dialog" aria-labelledby="detailAbstrakAja" aria-hidden="true">
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
<!-- INI MODALKU -->
<div class="modal fade text-left w-100" id="updateTgl" tabindex="-1" role="dialog" aria-labelledby="updateTgl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <form class="form" action="<?php echo base_url('abstrak/editDL') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validTgl()">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Abstrak</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class='form-group mandatory'>
                        <label class="form-label">Batas Revisi</label>
                        <input type="datetime-local" class="form-control" id="deadlineRevisiT" name="deadlineRevisiT">
                    </div>


                    <input hidden="true" id="IdAbstraksT" name="IdAbstraksT" readonly>
                </div>
                <div class="modal-footer">
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

<div class="modal fade text-left" id="secondpopup" tabindex="-1" role="dialog" aria-labelledby="secondpopup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <form class="form" action="<?php echo base_url('abstrak/editAbstrak') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validNilai()">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Review Abstrak</h4>
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
                                <input class="form-check-input" type="radio" name="status" id="statusR" value="Revisi">
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusT" value="Ditolak">
                                <label class="form-check-label form-label" for="status">
                                    Ditolak
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <div hidden="true" id="hlo" class='form-group mandatory'>
                        <label class="form-label">Batas Revisi</label>
                        <input type="datetime-local" class="form-control" id="deadlineRevisi" name="deadlineRevisi">
                    </div>
                    <input hidden="true" type="text" name="temp" id="temp" value="Diterima">
                    <!-- <textarea hidden="true" class="readonlyeditor" name="editor" id="defaults" cols="30" rows="10"></textarea> -->
                    <div class='form-group mandatory'>
                        <label class="form-label">Komentar</label>

                        <textarea class="readonlyeditor" name="content" id="editor"></textarea>
                    </div>


                    <input type="hidden" id="IdAbstrak" name="IdAbstraks" readonly>
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
        </form>
    </div>
</div>


<!--manage form Modal -->
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

    function validTGL() {
        var hariIni = new Date();
        var deadlineRevisi = document.getElementById('deadlineRevisiT').value;
        if (deadlineRevisi == "") {
            return true;
        }

        if (tglDeadlineRevisi < hariIni) {
            message += 'Tanggal deadline revisi tidak boleh kurang dari hari ini<br>';
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

        var dr = document.getElementById('dr' + value);
        var dre = document.getElementById('deadlineRevisi');
        dre.value = dr.innerHTML;

        var sk = document.getElementById('sk' + value);
        if (sk.innerHTML == '') {
            document.getElementById('statusR').checked = false;
            document.getElementById('statusD').checked = false;
        } else if (sk.innerHTML == "Revisi") {
            document.getElementById('statusR').checked = true;
        } else if (sk.innerHTML == "Diterima") {
            document.getElementById('statusD').checked = true;
        }
        var editidabstrak = document.getElementById('IdAbstraks');
        editidabstrak.value = value;

        var isiabstrak = document.getElementById('isiabstrak' + value);
        tinyMCE.get('default').setContent(isiabstrak.innerHTML);
        tinymce.get('default').mode.set("readonly");

        var isiabstrak = document.getElementById('isiabstrak' + value);
        var isiabstrakdre = document.getElementById('temp');
        isiabstrakdre.value = isiabstrak.innerHTML;

        var k = document.getElementById('k' + value);
        tinyMCE.get('editor').setContent(k.innerHTML);
        tinymce.get('editor').mode.set("design");

        var id = document.getElementsByName('IdAbstraks');
        console.log(id[0].value);
        var idinput = document.getElementById('IdAbstrak');
        idinput.value = id[0].value;


    }

    function sendtgl(value) {
        console.log(value)

        var dr = document.getElementById('dr' + value);
        var dre = document.getElementById('deadlineRevisiT');
        dre.value = dr.innerHTML;

        var editidabstrak = document.getElementById('IdAbstraksT');
        editidabstrak.value = value;


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
        });
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

        $('#example').DataTable({
            scrollY: 350,
            scrollX: true,
            "searching": true
        });


    });
</script>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>