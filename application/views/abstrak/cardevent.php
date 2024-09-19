<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Event</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardP'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Event</li>
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
    <section id="content-types">
        <?php
        $numOfCols = 3;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        foreach ($event as $val) {
            if ($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php }
                                                                $rowCount++;
                                                                    ?>

                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header">
                                <h4 class="card-title"><?= $val['nameEvent'] ?></h4>
                            </div>
                            <div class="card-body">

                                <center>
                                    <img src="<?php echo base_url(); ?>file/poster/<?= $val['poster'] ?>" style="height: 300px; width: 250px">
                                </center>

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="<?php echo site_url('abstrak/abstrak/' . $val['IdEvent']) ?>" class="btn btn-primary">Pilih Event</a>

                        </div>
                    </div>
                </div>

                <?php
                if ($rowCount % $numOfCols == 0) { ?>
                </div> <?php }
                } ?>
    </section>