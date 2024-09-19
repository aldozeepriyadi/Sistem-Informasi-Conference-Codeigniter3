<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardF'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldWallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                        <?php foreach ($jmluang as $c) { ?>
                                            <h6 class="font-extrabold mb-0"><?php echo $c->JML ?></h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldActivity"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Pembayaran</h6>
                                        <?php foreach ($jmltrans as $b) { ?>
                                            <h6 class="font-extrabold mb-0"> <?php echo $b->JMLp ?> </h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary btn-icon icon-left">

                                    <i class="bi bi-bell-fill"></i> Notifications <?php foreach ($jumlahnotif as $j) { ?> <span class="badge bg-transparent"><?php echo $j['jumlah'] ?></span>
                                    <?php } ?>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Notikasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($notif as $n) { ?>
                                                <tr id="<?php echo $n['IdNotif']; ?>">
                                                    <td class="col-12">
                                                        <div class="d-flex align-items-center">
                                                            <p class="font-bold ms-12 mb-0"><?php echo $n['message'] ?></p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">

                                                        <a href="javascript:void(0);" onclick="deleted(<?php echo  $n['IdNotif']; ?>);"><i class="bi bi-check-square-fill"></i></a>


                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var url = "<?php echo base_url(); ?>";

        function deleted(id) {
            console.log(id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-3',
                    cancelButton: 'btn btn-danger mx-3'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Yakin Hapus Data?',
                text: "Data yang dihapus tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Berhasil!',
                        'Data berhasil dihapus',
                        'success'
                    ).then((value) => {
                        window.location = url + "dashboard/UbahStatusNotifF/" + id;

                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Gagal',
                        'Data batal dihapus',
                        'error'
                    )
                }
            })
        }

        // });
        // });
    </script>