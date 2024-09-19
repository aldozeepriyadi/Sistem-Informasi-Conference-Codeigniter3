<div class="page-heading">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Pembayaran</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/dashboardSA'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Pembayaran</li>
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
        <center>
            <div class="card col-12 col-md-6">
                <div class="card-body d-flex ">
                    <canvas id="bar">

                    </canvas>

                </div>
            </div>
        </center>
    </section>
</div>

<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const baseUrl = "<?php echo base_url(); ?>"

    const myChart = (chartType) => {
        $.ajax({
            url: baseUrl + 'report/grafikpayment',
            dataType: 'json',
            method: 'get',
            success: data => {
                console.log(data)
                let chartX = ['Total Karya', 'Sudah Dibayar', 'Belum Dibayar']
                let chartY = []
                data.map(data => {

                    chartY.push(data.JmlPeserta, data.SdhByr, data.BlmByr)
                })


                const ctx = document.getElementById(chartType).getContext('2d')


                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartX,
                        datasets: [{
                                data: chartY,
                                backgroundColor: [
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(153, 102, 255, 0.2)",
                                    "rgba(54, 162, 235, 0.2)"
                                ],
                                borderColor: [
                                    "rgb(54, 162, 235)",
                                    "rgb(153, 102, 255)",
                                    "rgb(54, 162, 235)"
                                ],
                                borderWidth: 1,
                            },

                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
                        }
                    }
                })
            }
        })
    }
    myChart('bar')
</script>