<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karya extends CI_Controller
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
     * @see https://codeigniter.com/userguide3/general/urls.html
     */


    public function distribusi()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $data['getReviewer'] = $this->allmodel->getReviewer();
            $data['jumlahkarya'] = $this->allmodel->countKarya();
            $data['jumlahkodepaper'] = $this->allmodel->countKode();
            $this->template->load('masterpage/templateA', 'karya/distribusi', $data);

            $this->session->set_flashdata('successSend', '');
            $this->session->set_flashdata('errorSend', '');
            $this->session->set_flashdata('sukseskode', '');
            $this->session->set_flashdata('gagalkode', '');
        }
    }

    public function kirimKode()
    {


        $cd = date("Y-m-d h:i:sa");
        $sb = $this->input->post('submitby');
        $rb = $this->input->post('reviewedBys');
        $idabs = $this->input->post('idfp');
        $kode = $this->input->post('kodeE');
        $eve = $this->input->post('ideve');
        $results = $this->db->query("insert into fullpaper (statusDistribusiFpp, submittedby, reviewedbyFpp, IdAbstract, createddate,kodepaper) 
        values (
            'Belum mengumpulkan',
            '$sb',
            '$rb',
            '$idabs',
            '$cd',
            '$kode'
        )");

        $data = array(
            'statusDistribusi' => 'Selesai Review',
        );

        $this->db->where('IdAbstrak', $idabs);
        $result = $this->db->update('abstrak', $data);


        $eventtt = $this->db->query("SELECT * from event where IdEvent = '$eve'");
        foreach ($eventtt->result() as $ppq) {
            $namaevent = $ppq->nameEvent;
        }

        $userA = $this->db->get_where('user', ['IdUser' => $sb])->row_array();
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
                $mail->Subject = "$namaevent Hasil Review Abstrak Diterima";
                $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                <p>Kami ucapkan selamat karena Abstrak Paper Bapak/Ibu dinyatakan diterima dan dilanjutkan untuk presentasi pada Seminar ' . $namaEvent . '.</p>
                
                <p>Kode Paper Anda: ' . $kode . '</p>
                
                <p>Adapun Dokumen yang diperlukan yaitu:<br>
                1. Full Paper (Format: KodePaper_FullPaper.docx)<br>
                2. File Presentasi (Format: KodePaper_FilePresentasi.pptx)<br>
                3. File Anti Plagiarisme (Format: KodePaper_AntiPlagiarisme.pdf)<br>
                4. Video (optional bagi pemakalah yang berhalangan hadir)<br>
                Demikian informasi yang dapat kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</p>
                
                <p>
                Terima kasih.</p>
                
                <p>Salam,</p>
                
                <p>AstraTech Conference<br>
                </p>';
                $resultss = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }
        if ($results > 0) $this->sukseskode();
        else $this->gagalkode();
    }
    function sukseskode()
    {
        $this->session->set_flashdata('sukseskode', 'Kode paper berhasil diatur.');
        redirect('karya/distribusi');
    }

    function gagalkode()
    {
        $this->session->set_flashdata('gagalkode', validation_errors());
    }
    function suksesfpp()
    {
        $this->session->set_flashdata('suksesfpp', 'Kode paper berhasil diatur.');
        redirect('karya/fullpaper');
    }

    function gagalfpp()
    {
        $this->session->set_flashdata('gagalfpp', validation_errors());
    }
    public function fullpaper()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {

            $this->template->load('masterpage/templateA', 'karya/distribusifullpaper');
            $this->session->set_flashdata('successSend', '');
            $this->session->set_flashdata('errorSend', '');
            $this->session->set_flashdata('suksesfpp', '');
            $this->session->set_flashdata('gagalfpp', '');
        }
    }

    public function LihatAuthor()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $this->template->load('template/templateA', 'Abstrak/Author_Lihat');
        }
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model("allmodel");
    }

    public function setReviewer()
    {
        $data = array(
            'reviewedby' => $this->input->post('reviewedBy'),
        );

        $this->db->where('IdAbstrak', $this->input->post('IdAbstraks'));
        $result = $this->db->update('abstrak', $data);
    }

    function suksess()
    {
        $this->session->set_flashdata('successs', 'Reviewer berhasil dipilih.');
        redirect('karya/distribusi');
    }

    function gagals()
    {
        $this->session->set_flashdata('errors', validation_errors());
    }


    public function kirimNotif()
    {


        if ($this->input->post('rbR') == "Reviewer" && $this->input->post('rbS') != "Submission") {
            $rbE = $this->input->post('rbE');
            $result = $this->allmodel->saveNotifA();
        } else if ($this->input->post('rbS') == "Submission" && $this->input->post('rbR') != "Reviewer") {
            $sbE = $this->input->post('sbE');
            $result = $this->allmodel->saveNotifE();
        } else if ($this->input->post('rbS') == "Submission" && $this->input->post('rbR') == "Reviewer") {
            $sbE = $this->input->post('sbE');
            $rbE = $this->input->post('rbE');
            $result = $this->allmodel->saveNotifE();
            $result = $this->allmodel->saveNotifA();
        }

        $user = $this->db->get_where('user', ['IdUser' => $sbE])->row_array();
        if (isset($user['email'])) {

            $mail = $this->phpmailer->load();
            try {
                $receiver = $user['email'];
                $namaSubmission = $user['namaUser'];
                $isi = $this->input->post('pesanA');
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
                $mail->Subject = $this->input->post('pesanE');
                $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>' . $isi . '</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                $results = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }

        $userA = $this->db->get_where('user', ['IdUser' => $rbE])->row_array();
        if (isset($userA['email'])) {

            $mail = $this->phpmailer->load();
            try {
                $receiver = $userA['email'];
                $namaSubmission = $userA['namaUser'];
                $isi = $this->input->post('pesanA');

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
                $mail->Subject = $this->input->post('pesanE');
                $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>' . $isi . '</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                $results = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }

        if ($result > 0 && $results > 0) $this->sukses();
        else $this->gagal();
    }


    public function kirimNotifFPP()
    {

        if ($this->input->post('rbR') == "Reviewer" && $this->input->post('rbS') != "Submission") {
            $rbE = $this->input->post('rbE');
            $result = $this->allmodel->saveNotifA();
        } else if ($this->input->post('rbS') == "Submission" && $this->input->post('rbR') != "Reviewer") {
            $sbE = $this->input->post('sbE');
            $result = $this->allmodel->saveNotifE();
        } else if ($this->input->post('rbS') == "Submission" && $this->input->post('rbR') == "Reviewer") {
            $sbE = $this->input->post('sbE');
            $rbE = $this->input->post('rbE');
            $result = $this->allmodel->saveNotifE();
            $result = $this->allmodel->saveNotifA();
        }

        $user = $this->db->get_where('user', ['IdUser' => $sbE])->row_array();
        if (isset($user['email'])) {

            $mail = $this->phpmailer->load();
            try {
                $receiver = $user['email'];
                $namaSubmission = $user['namaUser'];
                $isi = $this->input->post('pesanA');
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
                $mail->Subject = $this->input->post('pesanE');
                $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>' . $isi . '</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                $results = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }

        $userA = $this->db->get_where('user', ['IdUser' => $rbE])->row_array();
        if (isset($userA['email'])) {

            $mail = $this->phpmailer->load();
            try {
                $receiver = $userA['email'];
                $namaSubmission = $userA['namaUser'];
                $isi = $this->input->post('pesanA');
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
                $mail->Subject = $this->input->post('pesanE');
                $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                    <p>' . $isi . '</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                $results = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }
        }

        if ($result > 0 && $results > 0) $this->suksesFPPs();
        else $this->gagalFPPs();
    }
    function suksesFPPs()
    {
        $this->session->set_flashdata('successSend', 'Data berhasil dikirimkan.');
        redirect(site_url('karya/fullpaper'));
    }

    function gagalFPPs()
    {
        $this->session->set_flashdata('errorSend', validation_errors());
    }

    public function kirim()
    {
        $mail = $this->phpmailer->load();
        $this->setReviewer();
        $id = $this->input->post('IdAbstraks');
        $data = array(
            'statusDistribusi' => 'Proses Review'
        );

        $where = array(
            'IdAbstrak' => $id,
        );

        $this->db->where($where);
        $result = $this->db->update('abstrak', $data);

        $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$id'");
        foreach ($abstr->result() as $q) {
            $title = $q->title;
            $reviewer = $q->reviewedby;
            $idev = $q->IdEvent;
        }

        $userA = $this->db->get_where('user', ['IdUser' => $reviewer])->row_array();
        $event = $this->db->get_where('event', ['IdEvent' => $idev])->row_array();
        $NewDate = Date('d F Y', strtotime('+2 days'));
        if (isset($userA['email'])) {
            $name = $userA['namaUser'];
            $namaEvent = $event['nameEvent'];
            try {
                $receiver = $userA['email'];
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
                $mail->Subject = "$namaEvent Review Abstrak";
                $mail->Body = '<p>Dear Bapak/Ibu ' . $name . ',</p>

                    <p>Mohon kesediaannya untuk melakukan review pada ' . $namaEvent . ' terhadap abstrak paper, dengan judul:</p>
                    
                    <p>&ldquo;' . $title . '&rdquo;</p>
                    
                    <p>Deadline: ' . $NewDate . ', Pukul 12.00 WIB.</p>
                    
                    <p>Terima kasih.</p>
                    
                    <p>Salam,</p>
                    
                    <p>AstraTech Conference<br />
                    </p>';
                $results = $mail->send();
            } catch (Exception $e) {
                return "error" . $mail->ErrorInfo;
            }

            $notif = [
                'message' => "Terdapat abstrak baru yang harus Anda review, dengan judul " . $title,
                'status' => "Aktif",
                'IdUser' => $reviewer,

            ];
            $this->db->insert('notifikasi', $notif);
            $jml = $this->allmodel->edituser();
        }

        if ($result > 0 && $results > 0 && $jml > 0) $this->sukses();
        else $this->gagal();
    }

    function sukses()
    {
        $this->session->set_flashdata('successSend', 'Data berhasil dikirimkan.');
        redirect(site_url('karya/distribusi'));
    }

    function gagal()
    {
        $this->session->set_flashdata('errorSend', validation_errors());
    }

    function srvLoad_usergetbyid()
    {
        $user = $this->allmodel->userGetById(array($this->input->post('IdAbstrak')));

        if ($user) {
?><table class="table table-striped" id="table1">

                <tbody><?php
                        foreach ($user as  $value) {
                        ?>

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
                            <tr>
                                <th colspan="2"></th>
                            </tr>
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
                            <tr>
                                <th colspan="2"></th>
                            </tr>
                        <?php } ?>

                    <?php
                        } ?>
                </tbody>
            </table>
<?php
        } else {
            $this->load->view('index');
        }
    }
}
