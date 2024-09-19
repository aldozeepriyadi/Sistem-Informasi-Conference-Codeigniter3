<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Prosiding</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Prosiding</li>
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
                <?php if ($jumlahprosiding < 1) { ?>
                    <a href="javascript:void(0);"><button class="btn btn-primary btn-md float-right tambahData"><a href="#" class="text-white">Tambah Data</a></button>
                    <?php } ?>
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('error') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('error');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('success') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('success');
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
                                Tahun Publikasi
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
                            <th>
                                File
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($getProsiding as $val) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?= $val['year'] ?>
                                </td>
                                <td>
                                    <?= $val['nameEvent'] ?>
                                </td>
                                <td>
                                    <label id="judul<?php echo  $val['idProsiding'] ?>"><?= $val['title'] ?></label>
                                </td>
                                <td>
                                    <?= $val['topic'] ?>
                                </td>
                                <td>
                                    <label id="filep<?php echo  $val['idProsiding'] ?>"><?= $val['ProsidingFile'] ?></label>

                                </td>
                                <td>
                                    <button type="button" value="<?= $val['idProsiding'] ?>" onclick="senddata(this.value)" class="btn icon icon-left btn-info" data-bs-toggle="modal" data-bs-target="#lihatData" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Prosiding"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<!--manage form Modal -->

<div class="modal fade text-left w-100" id="lihatData" tabindex="-1" role="dialog" aria-labelledby="lihatData" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Prosiding</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="IdUser" name="IdUser" readonly>
                <center>
                    <label id="judulpros"></label>
                </center>
                <br />

                <iframe style="width: 100%" height="700" type="application/pdf" id="iframepros" name="iframepros" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; ">
                </iframe>
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

<!-- tambahData Modal -->
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
                <?php echo form_open_multipart('prosiding/saveProsiding'); ?>

                <div class="form-group mandatory">
                    <label class="form-label">Event : </label>
                    <fieldset class="form-group">
                        <select name="eventName" id="eventName" class="form-select" required>
                            <option value="" selected>-- Pilih Event --</option>
                            <?php
                            foreach ($getDataEvent as $row) {
                                echo '<option value="' . $row->IdEvent . '">' . $row->nameEvent . '</option>';
                            }
                            ?>
                        </select>
                    </fieldset>
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="year">Tahun Publikasi</label>
                    <input type="number" class="form-control" id="year" placeholder="Enter Tahun Publikasi" name="year" required />
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="title">Judul</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter Judul Prosiding" name="title" required />
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="fotoCover">Foto Cover</label>
                    <input type="file" id="fotoCover" accept=".png, .jpg, .jpeg" class="form-control" name="fotoCover" required />
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="fileProsiding">File Prosiding</label>
                    <input type="file" id="fileProsiding" accept=".pdf" class="form-control" name="fileProsiding" required />
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <button id="submit" name="submit" value="upload" class="btn btn-primary shadow-sm">Tambah</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.tambahData Modal -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    function senddata(value) {
        console.log(value);

        var judul = document.getElementById('judul' + value);
        var lihatjudul = document.getElementById('judulpros');
        lihatjudul.innerHTML = judul.innerHTML;

        var filepros = document.getElementById('filep' + value);
        var site = filepros.innerHTML;
        document.getElementById('iframepros').src = "<?= base_url(); ?>file/" + site;
    }
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editData').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#IdUser').val(data[6]);
            $('#IdEvent').val(parseInt(data[5]));

        });
        $('#example').DataTable({
            scrollY: 350,
            scrollX: true,
        });
        $('.tambahData').on('click', function() {
            $('#tambahData').modal('show');
        });
    });
</script>