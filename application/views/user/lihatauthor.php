<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lihat Author</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardSA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lihat Author</li>
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


    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Author
            </div>

            <div class="card-body">
                <?php echo $this->session->flashdata('pesan'); ?>

                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Judul Abstrak
                            </th>
                            <th>
                                Jenis Author
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Instansi
                            </th>
                            <th>
                                Phone
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($author as $u) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $u->title ?>
                                </td>
                                <td>
                                    <?php echo $u->jenisAuthor ?>
                                </td>
                                <?php if ($u->namaUser != null) { ?>
                                    <td>
                                        <?php echo $u->namaUser ?>
                                    </td>
                                    <td>
                                        <?php echo $u->email ?>
                                    </td>
                                    <td>
                                        <?php echo $u->instance ?>
                                    </td>
                                    <td>
                                        <?php echo $u->phone ?>
                                    </td>
                                <?php } ?>
                                <?php if ($u->detailnama != null) { ?>
                                    <td>
                                        <?php echo $u->detailnama ?>
                                    </td>
                                    <td>
                                        <?php echo $u->detailemail ?>
                                    </td>
                                    <td>
                                        <?php echo $u->detailinstance ?>
                                    </td>
                                    <td>
                                        <?php echo $u->detailphone ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>

    </section>
</div>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollY: 350,
            scrollX: true,
        });
    });
</script>