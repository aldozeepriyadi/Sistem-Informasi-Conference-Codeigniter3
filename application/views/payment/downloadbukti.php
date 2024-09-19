<div class="page-heading">
    <?php if ($results['statusPayment'] != 'Diterima') { ?>
        <div class="form-group row center">
        </div>
    <?php } else { ?>
        <section class="section">
            <div class="control-group after-add-more">
                <div class="card">
                    <div class="card-header">
                        Bukti Pembayaran
                    </div>
                    <div class="card-body">
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label>Nama Sender : </label>
                                        <?= $results['nameSender'] ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label>Account Number : </label>
                                        <?= $results['accountNumber'] ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label>Total Payment : </label>
                                        <?= $results['TotalPayment'] ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class='form-group mandatory'>
                                        <label>Judul : </label>
                                        <?= $results['judul_abstrak'] ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<script>
    window.print();
</script>