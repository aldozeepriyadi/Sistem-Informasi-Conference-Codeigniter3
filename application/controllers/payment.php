<?php
defined('BASEPATH') or exit('No direct script access allowed');

class payment extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model("allmodel");
        $this->load->model("landingmodel");
    }

    public function DownloadBukti($id)
    {
        $data['results'] = $this->allmodel->getDataAllKwitansi($id);
        $this->load->view('payment/downloadbukti', $data);
    }

    public function DownloadKwitansi($id)
    {
        $data['results'] = $this->allmodel->getDataBuktiKwitansi($id);
        $this->load->view('payment/downloadkwitansi', $data);
    }

    public function index()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["abstrak"] = $this->allmodel->getDataAbstrakDiterima();
            $data['paymentKategori'] = $this->landingmodel->getPaymentKategori();
            $this->template->load('masterpage/templateP', 'payment/lihatpayment', $data);
            $this->session->set_flashdata('sukses', '');
            $this->session->set_flashdata('gagal', '');
        }
    }

    function srvLoad_usergetbyid()
    {
        $user = $this->allmodel->userGetById(array($this->input->post('IdAbstrak')));

        if ($user) {
            foreach ($user as  $value) {
?>
                <table class="table table-striped" id="table1">

                    <tbody>
                        <?php if ($value['detailnama'] != null) { ?>
                            <tr>
                                <th colspan="2"><?= $value['jenisAuthor']  ?></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $value['detailnama']  ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $value['detailemail'] ?></td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td><?= $value['detailinstance'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $value['detailphone'] ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?= $value['detailkategori'] ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan Terakhir</th>
                                <td><?= $value['detailedu'] ?></td>
                            </tr>
                            <br />
                        <?php } else { ?>
                            <tr>
                                <th colspan="2"><?= $value['jenisAuthor']  ?></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $value['namaUser']  ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $value['email'] ?></td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td><?= $value['instance'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $value['phone'] ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?= $value['kategori'] ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan Terakhir</th>
                                <td><?= $value['lasteducation'] ?></td>
                            </tr>
                            <br />

                        <?php } ?>
                    </tbody>
                </table>
<?php
            }
        } else {
            $this->load->view('index');
        }
    }


    public function savePayment()
    {

        $id = $this->input->post('idabs');
        $foto = $_FILES['proofOfPayment']['name'];
        $config['upload_path'] = './images/payment/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['max_size'] = 1024 * 2;
        $add_filename_jpg = "Payment" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('proofOfPayment')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $pay = $add_filename_jpg;
        }

        $id = $this->input->post('idabs');
        $total = $this->input->post('TotalPayment');

        $mystring1 = $total;
        $myarray_2 = explode(".", $mystring1);
        $angkaawal = $myarray_2[0];
        $angkaakhir = $myarray_2[1];
        $totl = $angkaawal . $angkaakhir;

        $bukti = $pay;
        $nama = $this->input->post('nameSender');
        $kode = $this->input->post('koderef');
        $akun = $this->input->post('accountNumber');
        $id = $this->input->post('idabs');
        $namaevent = $this->input->post('IdEventEA');
        $bankasal = $kode . '-' . $akun;
        $results = $this->db->query("insert into payment (TotalPayment, proofOfPayment,  nameSender,  accountNumber, IdAbstract, statusPayment) values(
            '$totl',
            '$bukti',
            '$nama',
            '$bankasal',
            '$id',
            'Menunggu Konfirmasi'
            )
        ");


        $userA = $this->db->get_where('user', ['role' => 'Finance'])->row_array();
        if (isset($userA['email'])) {

            $mail = $this->phpmailer->load();
            try {
                $receiver = $userA['email'];
                $namaSubmission = $userA['namaUser'];
                // $mail = new PHPMailer();
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'sneemo.polman@gmail.com';
                $mail->Password = 'akgjonujrbzgtnpl';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('sneemo.polman@gmail.com', 'SNEEMO POLITEKNIK ASTRA');
                $mail->addAddress($receiver);

                $mail->isHTML(true);
                $mail->Subject = "$namaevent Informasi Pembayaran Masuk";

                $mail->Body = '<p>Dear Bapak/Ibu' . $userA['namaUser'] . ',</p>

                <p>Telah masuk pembayaran untuk kegiatan ' . $namaevent . '.</p>

                <p>Mohon dilakukan verifikasi untuk pembayaran tersebut dengan login pada link berikut:</p>

                <p><a href="' . base_url() . 'auth/login">Login</a></p>

                <p>Terima kasih.</p>

                <p>Salam,</p>

                <p>AstraTech Conference<br>
                </p>';
                $resultss = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }
        if ($resultss > 0)  $this->sukses();
        else $this->gagal();
    }

    function sukses()
    {
        $this->session->set_flashdata('sukses', 'Pembayaran berhasil dikonfirmasi.');
        redirect(site_url('payment'));
    }

    function gagal()
    {
        $this->session->set_flashdata('gagal', validation_errors());
    }

    public function editPayment()
    {
        $result = $this->allmodel->editPayment();

        redirect(base_url('./payment/'));
    }

    public function konfirmasi()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Finance') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["abstrak"] = $this->allmodel->getDataAbstrakDibayar();
            $this->template->load('masterpage/templateF', 'payment/konfirmasi', $data);
            $this->session->set_flashdata('sukseskonfir', '');
            $this->session->set_flashdata('gagalkonfir', '');
        }
    }

    public function terima()
    {
        $idpayment = $this->input->post('idpt');
        $result = $this->allmodel->terimaData($idpayment);

        $abstr = $this->db->query("SELECT * from payment join abstrak on payment.IdAbstract = abstrak.IdAbstrak where payment.IdPayment = '$idpayment'");
        foreach ($abstr->result() as $q) {
            $idabs = $q->IdAbstract;
            $submittedby = $q->submittedby;
            $ideve = $q->IdEvent;
            $idsub = $q->submittedby;
        }

        $userA = $this->db->get_where('user', ['IdUser' => $idsub])->row_array();
        if (isset($userA['email'])) {

            $eventtt = $this->db->query("SELECT * from event where IdEvent = '$ideve'");
            foreach ($eventtt->result() as $ppq) {
                $namaevent = $ppq->nameEvent;
            }


            $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
            if (isset($userA['email'])) {


                $mail = $this->phpmailer->load();
                try {
                    $receiver = $userA['email'];
                    $namaSubmission = $userA['namaUser'];
                    // $mail = new PHPMailer();
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sneemo.polman@gmail.com';
                    $mail->Password = 'akgjonujrbzgtnpl';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('sneemo.polman@gmail.com', 'SNEEMO POLITEKNIK ASTRA');
                    $mail->addAddress($receiver);

                    $mail->isHTML(true);
                    $mail->Subject = "$namaevent Informasi Verifikasi Pembayaran Diterima";

                    $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>Kami ucapkan terimakasih atas partisipasinya pada ' . $namaevent . '.</p>
                    
                    <p>Saat ini pembayaran Anda telah kami terima dan dapat melanjutkan proses berikutnya pada ' . $namaevent . '.</p>
                    
                    <p>Terima kasih.</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                    $resultss = $mail->send();
                } catch (Exception $e) {
                    return "error" . $mail->ErrorInfo;
                }
            }
        }
        if ($result > 0)  $this->sukseskonfir();
        else $this->gagalkonfir();
    }

    public function confirmation()
    {

        if ($this->input->post('status') == "Ditolak") {
            $this->edittolak();
        } else if ($this->input->post('status') == "Diterima") {
            $this->terima();
        }
    }

    function sukseskonfir()
    {
        $this->session->set_flashdata('sukseskonfir', 'Pembayaran berhasil dikonfirmasi.');
        redirect(base_url('./payment/konfirmasi'));
    }

    function gagalkonfir()
    {
        $this->session->set_flashdata('gagalkonfir', validation_errors());
    }
    public function edittolak()
    {
        $result = $this->allmodel->edittolak();

        $idr = $this->input->post('idsb');
        $idpayment = $this->input->post('idpt');

        $abstr = $this->db->query("SELECT * from payment join abstrak on payment.IdAbstract = abstrak.IdAbstrak where payment.IdPayment = '$idpayment'");
        foreach ($abstr->result() as $q) {
            $title = $q->title;
            $idabs = $q->IdAbstract;
            $submittedby = $q->submittedby;
        }

        $userA = $this->db->get_where('user', ['IdUser' => $idr])->row_array();
        if (isset($userA['email'])) {

            $absss = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idabs'");
            foreach ($absss->result() as $pq) {
                $ideve = $q->IdEvent;
                $title = $q->title;
            }

            $eventtt = $this->db->query("SELECT * from event where IdEvent = '$ideve'");
            foreach ($eventtt->result() as $ppq) {
                $namaevent = $ppq->nameEvent;
            }

            $NewDate = Date('d F Y', strtotime('+2 days'));
            $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
            if (isset($userA['email'])) {


                $mail = $this->phpmailer->load();
                try {
                    $receiver = $userA['email'];
                    $namaSubmission = $userA['namaUser'];

                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sneemo.polman@gmail.com';
                    $mail->Password = 'akgjonujrbzgtnpl';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('sneemo.polman@gmail.com', 'SNEEMO POLITEKNIK ASTRA');
                    $mail->addAddress($receiver);

                    $mail->isHTML(true);
                    $mail->Subject = "$namaevent Informasi Verifikasi Pembayaran Ditolak";

                    $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>Mohon maaf, pembayaran Anda kami tolak.</p>
                    
                    <p>Mohon kesediaannya untuk memperhatikan catatan berikut:</p>
                    
                    <p>' . $this->input->post('reason') . '</p>
                    
                    <p>Terima kasih.</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                    $resultss = $mail->send();
                } catch (Exception $e) {
                    return "error" . $mail->ErrorInfo;
                }
            }

            $notif = [
                'message' => "Maaf, pembayaran untuk abstrak Anda yang berjudul  $title  ditolak. Silakan lakukan pembayaran ulang segera.",
                'status' => "Aktif",
                'IdUser' => $idr,

            ];
            $this->db->insert('notifikasi', $notif);
            $jml = $this->allmodel->edituser();
        }
        if ($result > 0 && $jml > 0)  $this->sukseskonfir();
        else $this->gagalkonfir();
    }
}
