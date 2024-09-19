<?php if ($results['kwitansi'] != null) { ?>
    <iframe type="application/pdf" style="width: 100%" height="700" src="<?= base_url(); ?>file/kwitansi/<?= $results['kwitansi'] ?>" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; ">
    </iframe>
<?php } ?>