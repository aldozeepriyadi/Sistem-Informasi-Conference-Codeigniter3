<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Konfirmasi Pembayaran</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardF'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
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
                if ($this->session->flashdata('gagalkonfir') != '') {
                    echo '<div class="alert alert-danger alert-dismissible show fade">';
                    echo $this->session->flashdata('gagalkonfir');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else if ($this->session->flashdata('sukseskonfir') != '') {
                    echo '<div class="alert alert-success alert-dismissible show fade">';
                    echo $this->session->flashdata('sukseskonfir');
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
                                Title
                            </th>
                            <th>
                                Event
                            </th>
                            <th hidden="true">
                                Topic
                            </th>
                            <th hidden="true">
                                Kata Kunci
                            </th>
                            <th hidden="true">
                                Status Karya
                            </th>
                            <th hidden="true">
                                Status Distribusi
                            </th>
                            <th>
                                Status Pembayaran
                            </th>
                            <th hidden="true">
                                Isi Abstrak
                            </th>
                            <th hidden="true">
                                total
                            <th hidden="true">
                                bukti
                            </th>
                            <th hidden="true">
                                nama pengirim
                            </th>
                            <th hidden="true">
                                rekening
                            </th>
                            <th hidden="true">
                                alasan
                            </th>
                            <th hidden="true">
                                id
                            </th>
                            <th hidden="true">
                                sb
                            </th>
                            <th hidden="true">
                                author
                            </th>
                            <th hidden="true">
                                alasan
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($abstrak as $ev) { ?>
                            <tr>
                                <td>
                                    <?php $i++ ?>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <label id="titleA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->title ?></label>
                                </td>
                                <td>
                                    <label id="eventA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->nameEvent ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="topikA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->topic ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="katakunciA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->KataKunci ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="statusA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->statusKarya ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="statusA<?php echo $ev->IdAbstrak ?>"><?php echo $ev->statusDistribusi ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="isiabstrak<?php echo $ev->IdAbstrak ?>"><?php echo $ev->abstract ?></label>
                                </td>
                                <td>
                                    <label id="statusbayar<?php echo $ev->IdAbstrak ?>">
                                        <?php
                                        if ($ev->statusPayment == "Diterima") {
                                            echo '<div class="badge bg-success">';
                                            echo $ev->statusPayment;
                                        } else if ($ev->statusPayment == "Ditolak") {
                                            echo '<div class="badge bg-danger">';
                                            echo $ev->statusPayment;
                                        } else if ($ev->statusPayment == null) {
                                            echo '';
                                        } else {
                                            echo '<div class="badge bg-info">';
                                            echo $ev->statusPayment;
                                        }
                                        ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="totalbayar<?php echo $ev->IdAbstrak ?>"><?php echo $ev->TotalPayment ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="buktibayar<?php echo $ev->IdAbstrak ?>"><?php echo $ev->proofOfPayment ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="namapengirim<?php echo $ev->IdAbstrak ?>"><?php echo $ev->nameSender ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="rekening<?php echo $ev->IdAbstrak ?>"><?php echo $ev->accountNumber ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="alasan<?php echo $ev->IdAbstrak ?>"><?php echo $ev->reason ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="idbayar<?php echo $ev->IdAbstrak ?>"><?php echo $ev->IdPayment ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="sb<?php echo $ev->IdAbstrak ?>"><?php echo $ev->submittedby ?></label>
                                </td>
                                <td hidden="true">
                                    <label id="authorA"></label>
                                </td>
                                <td hidden="true">
                                    <label id="komentar<?php echo $ev->IdAbstrak ?>"><?php echo $ev->keterangan ?></label>
                                </td>
                                <td>

                                    <?php if ($ev->statusPayment == "Menunggu Konfirmasi") { ?>

                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddatareupload(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailpayment" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Pembayaran"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddatatolak(this.value)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#detailconfirmation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Konfirmasi Pembayaran"><i class="bi bi-check-square"></i></button>

                                    <?php } else if ($ev->statusPayment == "Diterima") { ?>
                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddata(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailpayment" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Pembayaran"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                        &nbsp;

                                        <a class="btn btn-danger" target=" _blank" rel="noopener" onclick='window.open("<?= base_url(); ?>payment/DownloadKwitansi/<?= $ev->IdAbstrak ?>");return false;' href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Unduh Kwitansi">
                                            <i class="bi bi-file-earmark-arrow-down"></i></a>

                                    <?php } else if ($ev->statusPayment == "Ditolak") { ?>

                                        <button type="button" value="<?php echo $ev->IdAbstrak ?>" onclick="senddatareason(this.value)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailtolakreason" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Pembayaran"><i style="color:black;" class="bi bi-list-ul"></i></button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade text-left" id="detailconfirmation" tabindex="-1" role="dialog" aria-labelledby="detailconfirmation" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <form class="form" action="<?php echo base_url('payment/confirmation') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Konfirmasi Pembayaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class='form-group mandatory'>
                        <fieldset>
                            <label class="form-label">
                                Status Pembayaran
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusT" value="Ditolak">
                                <label class="form-check-label form-label" for="status">
                                    Ditolak
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusD" value="Diterima">
                                <label class="form-check-label form-label" for="status">
                                    Diterima
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <input hidden="true" type="text" class="form-control" id="idsb" name="idsb" />
                    <input hidden="true" type="text" class="form-control" id="idpt" name="idpt" />

                    <div hidden="true" id="rea" class='form-group mandatory'>
                        <div class='form-group mandatory'>
                            <label class="form-label">Komentar</label>
                            <textarea type="text" class="form-control" id="reason" placeholder="Masukkan keterangan penolakan" name="reason"></textarea>
                        </div>
                    </div>

                    <div hidden="true" id="kwi" class="form-group mandatory">
                        <label class="form-label" for="fotoCover">Kwitansi Pembayaran</label>
                        <input type="file" accept=".pdf" id="kwitansi" class="form-control" name="kwitansi" />
                    </div>
                    <input type="hidden" id="IdAbstrak" name="IdAbstraks" readonly>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="btn" type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade text-left w-100" id="detailpayment" tabindex="-1" role="dialog" aria-labelledby="detailpayment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Detail Pembayaran</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group mandatory">
                            <label class="form-label">Bukti Pembayaran</label>
                        </div>
                        <img id="proofOfPaymentIframe" name="proofOfPaymentIframe" style="height: 400px; width: auto">
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group mandatory">
                            <label class="form-label" for="title">Nama Pengirim</label>
                            <input type="text" class="form-control" id="nameSenderE" placeholder="Masukkan nama pengirim" name="nameSenderE" readonly />
                        </div>

                        <div class="form-group mandatory">

                            <label class="form-label" for="year">Nomor Rekening</label>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <select class="choices form-select" name="koderefE" id="koderefE" style="display: inline-block;" required>
                                            <option value="" selected>-- Pilih Bank --</option>
                                            <option value="028">OCBC NISP</option>
                                            <option value="014">BCA</option>
                                            <option value="536">BCA Syariah</option>
                                            <option value="009">BNI</option>
                                            <option value="427">BNI Syariah</option>
                                            <option value="002">BRI</option>
                                            <option value="422">BRI Syariah</option>
                                            <option value="008">Mandiri</option>
                                            <option value="451">BSM</option>
                                            <option value="022">CIMB Niaga</option>

                                            <option value="022">CIMB Niaga Syariah</option>
                                            <option value="147">Muamalat</option>
                                            <option value="213">BTPN</option>
                                            <option value="547">BTPN Syariah</option>
                                            <option value="422">Jenius</option>
                                            <option value="200">BTN</option>
                                            <option value="013">Permata</option>
                                            <option value="011">Danamon</option>
                                            <option value="016">Maybank</option>
                                            <option value="426">Bank Mega</option>

                                            <option value="153">Sinarmas</option>
                                            <option value="950">Commonwealth</option>
                                            <option value="441">Bukopin</option>
                                            <option value="521">Bukopin Syariah</option>
                                            <option value="026">Lippo</option>
                                            <option value="031">Citibank</option>
                                            <option value="003">Bank Ekspor Indonesia</option>
                                            <option value="019">Panin</option>
                                            <option value="517">Panin Dubai Syariah</option>
                                            <option value="020">Arta Niaga Kencana</option>

                                            <option value="023">UOB Indonesia</option>
                                            <option value="037">Artha Graha Internasional</option>
                                            <option value="041">HSBC</option>
                                            <option value="045">Bank Sumitomo Mitsui Indonesia</option>
                                            <option value="046">Digibank (DBS Indonesia)</option>
                                            <option value="047">Resona Perdania</option>
                                            <option value="050">Standard Chartered Bank</option>
                                            <option value="054">Bank Capital Indonesia</option>
                                            <option value="061">Bank Anz Indonesia</option>
                                            <option value="076">Bumi Arta</option>

                                            <option value="097">Mayapada</option>
                                            <option value="145">Nusantara Parahyangan</option>
                                            <option value="485">MNC Internasional (Bank Bumiputera)</option>
                                            <option value="520">Prima Master Bank</option>
                                            <option value="521">Bank Persyarikatan Indonesia</option>
                                            <option value="542">Bank Artos Indonesia</option>
                                            <option value="553">Bank Mayora Indonesia</option>
                                            <option value="116">BPD Aceh</option>
                                            <option value="117">Bank Sumut</option>
                                            <option value="118">Bank Nagari (Bank Sumbar)</option>

                                            <option value="119">Bank Riau Kepri</option>
                                            <option value="120">Bank Sumsel Babel</option>
                                            <option value="115">BPD Jambi</option>
                                            <option value="133">Bank Bengkulu</option>
                                            <option value="121">Bank Lampung</option>
                                            <option value="137">Bank BPD Banten</option>
                                            <option value="110">BJB</option>
                                            <option value="425">BJB Syariah</option>
                                            <option value="111">Bank DKI Jakarta</option>
                                            <option value="112">BPD DIY</option>

                                            <option value="113">Bank Jateng</option>
                                            <option value="114">Bank Jatim</option>
                                            <option value="564">Mandiri Taspen Pos (Sinar Harapan Bali)</option>
                                            <option value="129">Bank BPD Bali</option>
                                            <option value="128">Bank NTB</option>
                                            <option value="130">Bank NTT</option>
                                            <option value="122">Bank Kalsel</option>
                                            <option value="123">Bank Kalbar</option>
                                            <option value="124">Bank Kaltimtara</option>
                                            <option value="125">Bank Kalteng</option>

                                            <option value="126">Bank Sulselbar</option>
                                            <option value="127">Bank Sulutgo</option>
                                            <option value="134">Bank Sulteng</option>
                                            <option value="135">Bank Sultra</option>
                                            <option value="131">Bank Maluku Malut</option>
                                            <option value="132">Bank Papua</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="number" class="form-control" id="accountNumberE" placeholder="Masukkan nomor rekening" name="accountNumberE" style="display: inline-block;" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mandatory">
                            <label class="form-label" for="year">Total Pembayaran</label>
                            <input type="text" class="form-control" id="TotalPaymentE" placeholder="Masukkan total pembayaran" name="TotalPaymentE" readonly />
                        </div>
                        <input hidden="true" type="text" class="form-control" id="idabsr" name="idabsr" />
                        <input hidden="true" type="text" class="form-control" id="idp" name="idp" />
                    </div>
                </div>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
            </div>

        </div>

    </div>

</div>

<div class="modal fade text-left w-100" id="detailtolak" tabindex="-1" role="dialog" aria-labelledby="detailtolak" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-xl" role="document">
        <form id="eventForm" class="form" action="<?php echo base_url('payment/edittolak') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Pembayaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label" for="title">Alasan penolakan</label>
                        <textarea type="text" class="form-control" id="reason" placeholder="Masukkan keterangan penolakan" name="reason"></textarea>
                    </div>

                    <input hidden="true" type="text" class="form-control" id="idsb" name="idsb" />
                    <input hidden="true" type="text" class="form-control" id="idpt" name="idpt" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button id="btn" type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>

<div class="modal fade text-left w-100" id="detailtolakreason" tabindex="-1" role="dialog" aria-labelledby="detailtolakreason" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Detail Pembayaran</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group mandatory">
                    <label class="form-label" for="title">Nama Pengirim</label>
                    <input type="text" class="form-control" id="nameSenderEr" placeholder="Masukkan nama pengirim" name="nameSenderE" />
                </div>
                <div class="form-group mandatory">

                    <label class="form-label" for="year">Nomor Rekening</label>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <select class="choices form-select" name="koderefEr" id="koderefEr" style="display: inline-block;" required>
                                    <option value="" selected>-- Pilih Bank --</option>
                                    <option value="028">OCBC NISP</option>
                                    <option value="014">BCA</option>
                                    <option value="536">BCA Syariah</option>
                                    <option value="009">BNI</option>
                                    <option value="427">BNI Syariah</option>
                                    <option value="002">BRI</option>
                                    <option value="422">BRI Syariah</option>
                                    <option value="008">Mandiri</option>
                                    <option value="451">BSM</option>
                                    <option value="022">CIMB Niaga</option>

                                    <option value="022">CIMB Niaga Syariah</option>
                                    <option value="147">Muamalat</option>
                                    <option value="213">BTPN</option>
                                    <option value="547">BTPN Syariah</option>
                                    <option value="422">Jenius</option>
                                    <option value="200">BTN</option>
                                    <option value="013">Permata</option>
                                    <option value="011">Danamon</option>
                                    <option value="016">Maybank</option>
                                    <option value="426">Bank Mega</option>

                                    <option value="153">Sinarmas</option>
                                    <option value="950">Commonwealth</option>
                                    <option value="441">Bukopin</option>
                                    <option value="521">Bukopin Syariah</option>
                                    <option value="026">Lippo</option>
                                    <option value="031">Citibank</option>
                                    <option value="003">Bank Ekspor Indonesia</option>
                                    <option value="019">Panin</option>
                                    <option value="517">Panin Dubai Syariah</option>
                                    <option value="020">Arta Niaga Kencana</option>

                                    <option value="023">UOB Indonesia</option>
                                    <option value="037">Artha Graha Internasional</option>
                                    <option value="041">HSBC</option>
                                    <option value="045">Bank Sumitomo Mitsui Indonesia</option>
                                    <option value="046">Digibank (DBS Indonesia)</option>
                                    <option value="047">Resona Perdania</option>
                                    <option value="050">Standard Chartered Bank</option>
                                    <option value="054">Bank Capital Indonesia</option>
                                    <option value="061">Bank Anz Indonesia</option>
                                    <option value="076">Bumi Arta</option>

                                    <option value="097">Mayapada</option>
                                    <option value="145">Nusantara Parahyangan</option>
                                    <option value="485">MNC Internasional (Bank Bumiputera)</option>
                                    <option value="520">Prima Master Bank</option>
                                    <option value="521">Bank Persyarikatan Indonesia</option>
                                    <option value="542">Bank Artos Indonesia</option>
                                    <option value="553">Bank Mayora Indonesia</option>
                                    <option value="116">BPD Aceh</option>
                                    <option value="117">Bank Sumut</option>
                                    <option value="118">Bank Nagari (Bank Sumbar)</option>

                                    <option value="119">Bank Riau Kepri</option>
                                    <option value="120">Bank Sumsel Babel</option>
                                    <option value="115">BPD Jambi</option>
                                    <option value="133">Bank Bengkulu</option>
                                    <option value="121">Bank Lampung</option>
                                    <option value="137">Bank BPD Banten</option>
                                    <option value="110">BJB</option>
                                    <option value="425">BJB Syariah</option>
                                    <option value="111">Bank DKI Jakarta</option>
                                    <option value="112">BPD DIY</option>

                                    <option value="113">Bank Jateng</option>
                                    <option value="114">Bank Jatim</option>
                                    <option value="564">Mandiri Taspen Pos (Sinar Harapan Bali)</option>
                                    <option value="129">Bank BPD Bali</option>
                                    <option value="128">Bank NTB</option>
                                    <option value="130">Bank NTT</option>
                                    <option value="122">Bank Kalsel</option>
                                    <option value="123">Bank Kalbar</option>
                                    <option value="124">Bank Kaltimtara</option>
                                    <option value="125">Bank Kalteng</option>

                                    <option value="126">Bank Sulselbar</option>
                                    <option value="127">Bank Sulutgo</option>
                                    <option value="134">Bank Sulteng</option>
                                    <option value="135">Bank Sultra</option>
                                    <option value="131">Bank Maluku Malut</option>
                                    <option value="132">Bank Papua</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <input type="number" class="form-control" id="accountNumberEr" placeholder="Masukkan nomor rekening" name="accountNumberEr" style="display: inline-block;" required />
                        </div>
                    </div>
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="year">Total Pembayaran</label>
                    <input type="text" class="form-control" id="TotalPaymentEr" placeholder="Masukkan total pembayaran" name="TotalPaymentE" />
                </div>
                <div class="form-group mandatory">
                    <label class="form-label" for="title">Alasan ditolak</label>
                    <input type="text" class="form-control" id="reasonr" placeholder="Masukkan nama pengirim" />
                </div>
                <div class="form-group mandatory">
                    <label class="form-label">Bukti Pembayaran</label>
                </div>
                <div class="form-group mandatory">

                    <img id="proofOfPaymentIframer" name="proofOfPaymentIframe" style="height: 200px; width: 150px">
                </div>

                <input hidden="true" type="text" class="form-control" id="idabsrr" name="idabsr" />
                <input hidden="true" type="text" class="form-control" id="idpr" name="idp" />

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>
            </div>

        </div>

    </div>

</div>
<script src="<?php echo base_url('aset/extensions/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('aset/js/pages/tinymce.js') ?>"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


<script>
    const formatNumber = (number) => {
        let numberString = number.toString().replace('.', '');
        console.log('numstring', numberString);
        if (numberString.length > 3) {
            const parts = [];
            const length = numberString.length;
            let count = 0;
            let part = '';
            for (let i = length - 1; i >= 0; i--) {
                if (count < 3 && i >= 0) {
                    part += numberString[i]
                    count++;
                } else {
                    parts.push(part);
                    part = numberString[i];
                    count = 1;
                }
            }
            if (part.length > 0) parts.push(part);
            console.log('parts', parts)
            const reversed = parts.join('.');
            let normal = '';
            for (let i = reversed.length - 1; i >= 0; i--) {
                normal += reversed[i];
            }
            console.log('normal', normal)
            return normal;
        } else {
            return numberString;
        }
    }
    const localeNumber = (number) => {
        return number.toLocaleString('id-ID');
    }
    const input = document.getElementById('TotalPaymentE');
    const inputEr = document.getElementById('TotalPaymentEr');
    input.addEventListener('keyup', (event) => {
        const currentValue = (event.target.value).replace(/\./g, '');
        const newValue = Number.parseInt(currentValue).toLocaleString('id-ID');
        console.log(newValue);
        event.target.value = newValue;
    });

    function showuserdetail(IdAbstrak) {
        $.ajax({
            type: "post",
            url: "<?= site_url('payment/srvLoad_usergetbyid'); ?>",
            data: "IdAbstrak=" + IdAbstrak,
            dataType: "html",
            success: function(response) {
                $('#bodymodal_userDetail').empty();
                $('#bodymodal_userDetail').append(response);
            }
        });
    }


    function senddatareupload(value) {
        console.log(value)
        var idabsr = document.getElementById('idabsr');
        idabsr.value = value;

        var tb = document.getElementById('totalbayar' + value);
        var edittb = document.getElementById('TotalPaymentE');
        edittb.value = tb.innerHTML;

        var bb = document.getElementById('buktibayar' + value);
        var site = bb.innerHTML;
        document.getElementById('proofOfPaymentIframe').src = "<?= base_url(); ?>images/payment/" + site;

        var ns = document.getElementById('namapengirim' + value);
        var editns = document.getElementById('nameSenderE');
        editns.value = ns.innerHTML;

        var rek = document.getElementById('rekening' + value);

        $myarray_1 = rek.innerHTML.split("-");

        var editrek = document.getElementById('accountNumberE');
        editrek.value = $myarray_1[1];
        console.log($myarray_1[1]);
        var editkode = document.getElementById('koderefE');
        editkode.value = $myarray_1[0];
        console.log($myarray_1[0]);


        var pay = document.getElementById('idbayar' + value);
        var editpay = document.getElementById('idp');
        editpay.value = pay.innerHTML;
        const currentValue = (input.value).replace(/\./g, '');
        const newValue = Number.parseInt(currentValue).toLocaleString('id-ID');
        input.value = newValue;
    }

    function senddatatolak(value) {
        console.log(value);
        var pay = document.getElementById('idbayar' + value);
        var editpay = document.getElementById('idpt');
        editpay.value = pay.innerHTML;

        var sb = document.getElementById('sb' + value);
        var editsb = document.getElementById('idsb');
        editsb.value = sb.innerHTML;
        console.log(editsb.value);
    }

    function senddatareason(value) {
        var idabsr = document.getElementById('idabsrr');
        idabsr.value = value;
        console.log(idabsr.value)
        var tb = document.getElementById('totalbayar' + value);
        var edittb = document.getElementById('TotalPaymentEr');
        edittb.value = tb.innerHTML;
        console.log(tb.innerHTML)
        var bb = document.getElementById('buktibayar' + value);
        var site = bb.innerHTML;
        document.getElementById('proofOfPaymentIframer').src = "<?= base_url(); ?>images/payment/" + site;
        console.log(value)
        var ns = document.getElementById('namapengirim' + value);
        var editns = document.getElementById('nameSenderEr');
        editns.value = ns.innerHTML;
        console.log(ns.innerHTML)
        var rek = document.getElementById('rekening' + value);


        $myarray_1 = rek.innerHTML.split("-");

        var editrek = document.getElementById('accountNumberEr');
        editrek.value = $myarray_1[1];

        var editkode = document.getElementById('koderefEr');
        editkode.value = $myarray_1[0];


        var reas = document.getElementById('alasan' + value);
        var editreas = document.getElementById('reasonr');
        editreas.value = reas.innerHTML;
        console.log(value)
        var pay = document.getElementById('idbayar' + value);
        var editpay = document.getElementById('idpr');
        editpay.value = pay.innerHTML;
        const currentValue = (inputEr.value).replace(/\./g, '');
        const newValue = Number.parseInt(currentValue).toLocaleString('id-ID');
        inputEr.value = newValue;
    }

    function senddata(value) {
        console.log(value)

        var idabsr = document.getElementById('idabsr');
        idabsr.value = value;

        var tb = document.getElementById('totalbayar' + value);
        var edittb = document.getElementById('TotalPaymentE');
        edittb.value = tb.innerHTML;

        var bb = document.getElementById('buktibayar' + value);
        var site = bb.innerHTML;
        document.getElementById('proofOfPaymentIframe').src = "<?= base_url(); ?>images/payment/" + site;

        var ns = document.getElementById('namapengirim' + value);
        var editns = document.getElementById('nameSenderE');
        editns.value = ns.innerHTML;

        var rek = document.getElementById('rekening' + value);

        $myarray_1 = rek.innerHTML.split("-");

        var editrek = document.getElementById('accountNumberE');
        editrek.value = $myarray_1[1];
        console.log($myarray_1[1]);
        var editkode = document.getElementById('koderefE');
        editkode.value = $myarray_1[0];
        console.log($myarray_1[0]);

        var pay = document.getElementById('idbayar' + value);
        var editpay = document.getElementById('idp');
        editpay.value = pay.innerHTML;
        const currentValue = (input.value).replace(/\./g, '');
        const newValue = Number.parseInt(currentValue).toLocaleString('id-ID');
        input.value = newValue;

    }
    $(document).ready(function() {
        $('#statusT').on('click', function(e) {
            if (document.getElementById("statusT").checked = true) {

                document.getElementById("rea").hidden = false;
                document.getElementById("kwi").hidden = true;
            }
        });
        $('#statusD').on('click', function(e) {
            if (document.getElementById("statusD").checked = true) {
                document.getElementById("kwi").hidden = false;

                document.getElementById("rea").hidden = true;
            }

        });
        $('#example').DataTable({
            scrollY: 280,
            scrollX: true,
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

                text: "data pembayaran akan diterima!",
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
                        'Data pembayaran batal diterima.',
                        'error'
                    )
                }

            })
        })

        tinymce.init({
            selector: '.readonlyeditor',
            height: 400,
            readonly: false,
            theme: 'silver',
            plugins: [
                'advlist  lists ',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
            toolbar2: 'print preview | forecolor backcolor emoticons ',
            image_advtab: true,
        });

    })
</script>