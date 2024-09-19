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
    <?php foreach ($results as $val) : ?>
        <iframe style="width: 100%" height="700" type="application/pdf" src="<?= base_url(); ?>file/<?= $val['ProsidingFile'] ?>" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; ">
        </iframe>
    <?php endforeach; ?>

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

    <script src="<?php echo base_url('asset/contactform/contactform.js') ?>"></script>

    <script type="text/javascript">
        function required() {
            var empt = document.forms["form1"]["name"].value;
            var empt2 = document.forms["form1"]["email"].value;
            var empt3 = document.forms["form1"]["message"].value;
            if (empt == "" || empt2 == "" || empt3 == "") {
                alert("Lengkapi Data Terlebih Dahulu");
                return false;
            } else {
                alert('Pesan telah terkirim. Terima Kasih.');
                setTimeout("location.reload(true);");
            }
        }
    </script>


    <script src="<?php echo base_url('asset/js/main.js') ?>"></script>
    <script data skrip - cfasync="false" type="text/javascript" src="https://cdn.rawgit.com/dwyl/html-form-send-email-via-google-script-without-server/master/form-smission-handler.jss"> </script>

</body>

</html>