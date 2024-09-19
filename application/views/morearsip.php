<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SNEEMO 2021</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="<?php echo base_url('aset/images/logo/AT.png') ?>" rel="icon">
    <link href="<?php echo base_url('asset/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <link href="<?php echo base_url('asset/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('asset/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/lib/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('asset/css/style.css') ?>" rel="stylesheet">

</head>

<body id="body">

    <header id="header">
        <div class="container-fluid d-flex justify-content-between">

            <div id="logo">

                <h1>
                    <a href="#body" class="scrollto">

                        <img src="<?php echo base_url('asset/img/IMG_Logo.png') ?>" alt="ASTRATech LOGO" loading="lazy" style="width: 60%; height: auto; padding-left: 20px; margin-top: -20px;">
                    </a>
                </h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="<?php echo site_url('landingpage/#about'); ?>">Beranda</a></li>
                    <li><a href="<?php echo site_url('landingpage/#prosiding'); ?>">Buku Prosiding</a></li>
                    <li><a href="<?php echo site_url('landingpage/#arsip'); ?>">Arsip</a></li>
                    <li><a href="<?php echo site_url('landingpage/#jadwal'); ?>">Jadwal</a></li>
                    <li><a href="<?php echo site_url('landingpage/#payment'); ?>">Registrasi</a></li>
                    <li><a href="<?= base_url('auth/login') ?>">Login</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="text-center">
                <h2 style="text-align: center; color: #FFF; font-weight: bold;">Astra Tech Conference</h2>
            </div>
        </div>
    </section>

    <main id="main">

        <section id="arsip">
            <div class="container">
                <div class="section-header">
                    <h2>Arsip</h2>
                </div>
                <?php
                $numOfCols = 3;
                $rowCount = 3;
                $bootstrapColWidth = 12 / $numOfCols;
                foreach ($archives as $ars) {
                    if ($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php }
                                                                        $rowCount++;
                                                                            ?>

                        <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="wow fadeInLeft ">
                                <div class="card">
                                    <center>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <img src="<?php echo base_url(); ?>images/prosiding/<?= $ars['ProsidingImg'] ?>" style="height: 200px; width: 150px">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-info mybutton" style="justify-content: right;" target=" _blank" rel="noopener" onclick='window.open("<?= base_url(); ?>landingpage/readmore/<?= $ars['idProsiding'] ?>");return false;' href="#">
                                                Baca Selengkapnya</a>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($rowCount % $numOfCols == 0) { ?>
                        </div> <?php }
                        } ?>

            </div>

            <div class="row justify-content-center">
                <center>
                    <a class="btn btn-info " style="justify-content: right;" target=" _blank" rel="noopener" href="<?php echo site_url('landingpage/morearsip'); ?>">
                        Arsip Lainnya</a>
                </center>
            </div>

        </section>

    </main>


    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="<?php echo base_url('asset/lib/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/jquery/jquery-migrate.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/easing/easing.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/superfish/hoverIntent.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/superfish/superfish.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/wow/wow.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/magnific-popup/magnific-popup.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/lib/sticky/sticky.js') ?>"></script>

    <script src="<?php echo base_url('asset/js/main.js') ?>"></script>
    <script data skrip - cfasync="false" type="text/javascript" src="https://cdn.rawgit.com/dwyl/html-form-send-email-via-google-script-without-server/master/form-smission-handler.jss"> </script>

</body>

</html>