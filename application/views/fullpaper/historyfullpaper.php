<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Fullpaper</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardR'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Fullpaper</li>
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
                                Fullpaper
                            </th>
                            <th>
                                Power point
                            </th>
                            <th>
                                Link Video
                            </th>
                            <th>
                                Catatan Revisi
                            </th>
                            <th>
                                Tanggal diperbarui
                            </th>
                            <th>
                                Status Karya
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $i = 0; ?>
                        <?php foreach ($fullpaper as $dis) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label style="color:blue" class="downloadsf"><?php echo $dis->FullpaperFile ?></label>
                                </td>
                                <td>
                                    <label style="color:blue" class="downloads"><?php echo $dis->PresentationFile ?></label>
                                </td>
                                <td>
                                    <label style="color:blue" class="youtube"><?php echo $dis->VideoLink ?></label>
                                </td>
                                <td>
                                    <?php echo $dis->keteranganFpp ?>
                                </td>
                                <td>
                                    <?php echo $dis->modifieddateFpp ?>
                                </td>
                                <td>
                                    <?php echo $dis->statusKaryaFpp ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <tfoot>
                    <a type="button" href="<?php echo site_url('history/fullpaper/'); ?>" class="btn btn-danger">
                        Kembali
                    </a>
                </tfoot>
            </div>
        </div>

    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.downloads').on('click', function(e) {
            var txt = $(this).text();
            console.log(txt);

            document.location.href = "<?php echo base_url() . 'Fullpaper/download/'  ?>" + txt;

        })
        $('#example').DataTable({
            scrollY: 350,
            scrollX: true,
        });
        $('.downloadsf').on('click', function(e) {
            var txts = $(this).text();
            console.log(txts);

            document.location.href = "<?php echo base_url() . 'Fullpaper/downloadpdf/'  ?>" + txts;
        })
        $('.youtube').on('click', function(e) {
            var link = $(this).text();
            window.open(link, "_blank");
        })
    });
</script>