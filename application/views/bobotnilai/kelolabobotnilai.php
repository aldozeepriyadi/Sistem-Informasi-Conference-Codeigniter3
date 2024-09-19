<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kelola Bobot Nilai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardA'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelola Bobot Nilai</li>
                    </ol>
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
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('errorBobot') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('errorBobot');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('successBobot') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('successBobot');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Bobot Nilai
                            </th>
                            <th>
                                Value
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($bobot as $ev) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="assessmentCriteria<?php echo $ev->IdBobot ?>"><?php echo $ev->assessmentCriteria ?></label>
                                </td>
                                <td>
                                    <label id="value<?php echo $ev->IdBobot ?>"><?php echo $ev->value ?></label>
                                </td>
                                <td>
                                    <button type="button" value="<?php echo $ev->IdBobot ?>" onclick="senddata(this.value)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData"><i class="bi bi-pencil-square"></i>
                                        Ubah
                                    </button>
                                    <a href="<?php echo site_url('bobotnilai/fungsiDelete/' . $ev->IdBobot) ?>" class="btn btn-danger tombol-hapus">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </a>
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
                <h4 class="modal-title">Tambah Data Bobot Nilai</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('bobotnilai/tambah'); ?>
                <div class='form-group mandatory'>
                    <label class="form-label">Kriteria</label>
                    <input type="text" class="form-control" id="assessmentCriteria" placeholder="Masukan Nama" name="assessmentCriteria" required>
                </div>
                <div class='form-group mandatory'>
                    <label class="form-label">Value</label>
                    <input type="number" class="form-control" id="value" placeholder="Masukan Tema" name="value" required>
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

            <?php echo form_close() ?>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.tambahData Modal -->

</div>

<!-- editData Modal -->
<div class="modal fade text-left" id="editData" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <form action="<?php echo base_url('bobotnilai/edit') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Bobot Nilai</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="IdRatingE" name="IdRatingE" readonly>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Kriteria</label>

                        <input type="text" class="form-control" id="assessmentCriteriaE" placeholder="Masukan Nama" name="assessmentCriteriaE" required>
                    </div>
                    <div class='form-group mandatory'>
                        <label class="form-label">Value</label>

                        <input type="number" class="form-control" id="valueE" placeholder="Masukan Value" name="valueE" required>
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
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.editData Modal -->

<!--manage form Modal -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function senddata(value) {
        console.log(value)
        var assementcriteria = document.getElementById('assessmentCriteria' + value);
        var editassementcriteria = document.getElementById('assessmentCriteriaE');
        editassementcriteria.value = assementcriteria.innerHTML;

        var values = document.getElementById('value' + value);
        var editvalue = document.getElementById('valueE');
        editvalue.value = values.innerHTML;

        var editidbobot = document.getElementById('IdRatingE');
        editidbobot.value = value;
    }

    $(document).ready(function() {
        $('.tambahData').on('click', function() {
            $('#tambahData').modal('show');
        });

        $('.tombol-hapus').on('click', function(e) {
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

                text: "data tanggal akan dihapus!",
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
                        'Dibatalkan',
                        'Data batal dihapus!',
                        'error'
                    )
                }

            })
        })
    });
</script>