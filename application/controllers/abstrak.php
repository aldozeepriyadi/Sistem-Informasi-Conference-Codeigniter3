<?php
defined('BASEPATH') or exit('No direct script access allowed');

class abstrak extends CI_Controller
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
    }

    public function cardEvent()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data["event"] = $this->allmodel->getAllcard();
            $this->template->load('masterpage/templateP', 'abstrak/cardevent', $data);
        }
    }

    public function abstrak($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["abstrak"] = $this->allmodel->getDataAbstrak();
            $datas = $this->allmodel->getEventCard($id);

            if ($datas != null) {
                $IdEventC = $datas->IdEvent;
                $nameEvent = $datas->nameEvent;
                $theme = $datas->theme;
                $topic = $datas->topic;
                $tanggalAkhir = $datas->tanggalAkhir;
                $tanggalAwal = $datas->tanggalAwal;
                $statusEvent = $datas->statusEvent;

                $newdatas = array(
                    'nameEvent' => $nameEvent,
                    'IdEventC' => $IdEventC,
                    'theme' => $theme,
                    'topic' => $topic,
                    'tanggalAkhir' => $tanggalAkhir,
                    'tanggalAwal' => $tanggalAwal,
                    'statusEvent' => $statusEvent
                );
                $this->session->set_userdata($newdatas);
                $this->template->load('masterpage/templateP', 'abstrak/lihatabstrak', $data);
                $this->session->set_flashdata('successs', '');
                $this->session->set_flashdata('errors', '');
                $this->session->set_flashdata('suksesupdate', '');
                $this->session->set_flashdata('gagalupdate', '');
                $this->session->set_flashdata('suksessave', '');
                $this->session->set_flashdata('gagalsave', '');
            }
        }
    }

    public function history()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data["abstrak"] = $this->allmodel->getHistoryAbstrak();
            $this->template->load('masterpage/templateR', 'abstrak/riwayatabstrak', $data);
        }
    }

    public function viewhistory($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data["abstrak"] = $this->allmodel->viewHistoryAbstrak($id);
            $this->template->load('masterpage/templateR', 'abstrak/historyabstrak', $data);
        }
    }

    public function editDL()
    {

        $sttsq = null;
        $idA = $this->input->post('IdAbstraksT');
        $inidlrev = $this->input->post('deadlineRevisiT');

        $data = array(
            'deadlineRevisi' => $inidlrev
        );

        $where = array(
            'IdAbstrak' => $idA,
        );

        $this->db->where($where);
        $result = $this->db->update('abstrak', $data);
    }
    public function editAbstrak()
    {

        $sttsq = null;
        $idA = $this->input->post('IdAbstraks');
        $inidlrev = $this->input->post('deadlineRevisi');
        $date = new DateTime($inidlrev);
        $resultdate = $date->format('d F Y H:i:s');
        $userB = $this->db->query("SELECT * from detailabstrak where IdAbstrak = '$idA' and statusKarya LIKE 'Revisi%'");
        foreach ($userB->result() as $q) {
            $sttsq = $q->statusKarya;
        }
        $abstract = $this->input->post('content');
        $temp = $this->input->post('temp');
        $modif = date("Y-m-d h:i:sa");
        $ketStatus = $this->input->post('status');
        if ($sttsq == NULL) {
            if ($ketStatus == 'Diterima') {
                $data = array(
                    'deadlineRevisi' => null,
                    'statusDistribusi' => 'Perlu kodepaper',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);

                $status = 'Diterima';
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");

                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();
                $NewDate = Date('d F Y', strtotime('+2 days'));
                $date = new DateTime($NewDate);
                $resultdate = $date->format('d F Y H:i:s');
                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak perlu Direvisi";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>
                
                                        <p>Abstrak Anda dengan judul</p>
                                        
                                        <p><b>&ldquo;' . $title . '&rdquo;</b></p>
                                        
                                        <p>Kami nyatakan diterima. Silakan lakukan proses pembayaran dengan batas pembayaran sebagai berikut:</p>
                                        
                                        <p>Deadline: ' . $resultdate . '.</p>
                                        
                                        <p>Terima kasih.</p>
                                        
                                        <p>Salam,</p>
                                        
                                        <p>AstraTech Conference<br />
                                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Selamat, abstrak Anda yang berjudul  $title diterima. Silakan lakukan pembayaran.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            } else if ($ketStatus == 'Revisi') {
                $data = array(
                    'deadlineRevisi' => $this->input->post('deadlineRevisi'),
                    'statusDistribusi' => 'Selesai Review',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);

                $status = 'Revisi 1';
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");

                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();

                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak perlu Direvisi";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Abstrak Anda dengan judul</p>
                        
                        <p><b>&ldquo;' . $title . '&rdquo;</b></p>
                        
                        <p>Masih diperlukan untuk direvisi, Adapun catatan revisinya yaitu sebagai berikut:</p>
                        
                        <p>' . $abstract . '</p>
                        
                        <p><b>Deadline: ' . $resultdate . '.</b></p>
                        
                        <p>Terima kasih.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Maaf, abstrak Anda yang berjudul  $title  harus  direvisi. Silakan lakukan revisi segera.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            } else if ($ketStatus == 'Ditolak') {
                $data = array(
                    'deadlineRevisi' => null,
                    'statusDistribusi' => 'Selesai Review',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);

                $status = 'Ditolak';
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");

                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();
                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak Ditolak";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Mohon maaf, abstrak Anda belum dapat dilanjutkan ke tahap berikutnya.</p>
                        
                        <p>
                        Terima kasih atas partisipasinya.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Maaf, abstrak Anda yang berjudul  $title  ditolak.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            }
        } else if ($sttsq != NULL) {
            if ($ketStatus == 'Diterima') {
                $data = array(
                    'deadlineRevisi' => null,
                    'statusDistribusi' => 'Perlu kodepaper',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);


                $status = 'Diterima';
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");


                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();
                $NewDate = Date('d F Y', strtotime('+2 days'));
                $date = new DateTime($NewDate);
                $resultdate = $date->format('d F Y H:i:s');
                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak perlu Direvisi";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>
                
                                        <p>Abstrak Anda dengan judul</p>
                                        
                                        <p><b>&ldquo;' . $title . '&rdquo;</b></p>
                                        
                                        <p>Kami nyatakan diterima. Silakan lakukan proses pembayaran dengan batas pembayaran sebagai berikut:</p>
                                        
                                        <p><b>Deadline: ' . $resultdate . '.</b></p>
                                        
                                        <p>Terima kasih.</p>
                                        
                                        <p>Salam,</p>
                                        
                                        <p>AstraTech Conference<br />
                                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Selamat, abstrak Anda yang berjudul  $title diterima. Silakan lakukan pembayaran.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            } else if ($ketStatus == 'Revisi') {
                $data = array(
                    'deadlineRevisi' => $this->input->post('deadlineRevisi'),
                    'statusDistribusi' => 'Selesai Review',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);

                $mystring = $sttsq;
                $myarray_1 = explode(" ", $mystring);
                $angka = $myarray_1[1];
                $myarray_2 = (int)$angka + 1;
                $status = 'Revisi ' . (string)$myarray_2;
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");

                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();
                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $NewDate = Date('d F Y', strtotime('+2 days'));
                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak perlu Direvisi";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Abstrak Anda dengan judul</p>
                        
                        <p><b>&ldquo;' . $title . '&rdquo;</b></p>
                        
                        <p>Masih diperlukan untuk direvisi, Adapun catatan revisinya yaitu sebagai berikut:</p>
                        
                        <p>' . $abstract . '</p>
                        
                        <p><b>Deadline: ' .  $resultdate . '.</b></p>
                        
                        <p>Terima kasih.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Maaf, abstrak Anda yang berjudul  $title  harus  direvisi. Silakan lakukan revisi segera.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            } else if ($ketStatus == 'Ditolak') {
                $data = array(
                    'deadlineRevisi' => null,
                    'statusDistribusi' => 'Selesai Review',
                );

                $where = array(
                    'IdAbstrak' => $this->input->post('IdAbstraks'),
                );

                $this->db->where($where);
                $result = $this->db->update('abstrak', $data);

                $status = 'Ditolak';
                $results = $this->db->query("insert into detailabstrak (IdAbstrak, keterangan, statusKarya, abstract, modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$temp',
                    '$modif'
                    )
                ");

                $abstr = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idA'");
                foreach ($abstr->result() as $q) {
                    $title = $q->title;
                    $submittedby = $q->submittedby;
                    $idven = $q->IdEvent;
                }
                $event = $this->db->get_where('event', ['IdEvent' => $idven])->row_array();
                $userA = $this->db->get_where('user', ['IdUser' => $submittedby])->row_array();
                if (isset($userA['email'])) {

                    $mail = $this->phpmailer->load();
                    try {
                        $receiver = $userA['email'];
                        $namaSubmission = $userA['namaUser'];
                        $namaevent = $event['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Abstrak Ditolak";
                        // $mail->Body = 'Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>';
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Mohon maaf, abstrak Anda belum dapat dilanjutkan ke tahap berikutnya.</p>
                        
                        <p>
                        Terima kasih atas partisipasinya.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }

                    $notif = [
                        'message' => "Maaf, abstrak Anda yang berjudul  $title  ditolak.",
                        'status' => "Aktif",
                        'IdUser' => $submittedby,

                    ];
                    $this->db->insert('notifikasi', $notif);
                    $jml = $this->allmodel->edituser();
                }
            }
        }


        if ($result > 0 && $results > 0  || $resultss > 0 || $jml > 0) $this->suksess();
        else $this->gagals();
    }

    public function editAbstrakPeserta()
    {
        $uid = $this->session->userdata('IdUser');
        $data = array(
            'title' => $this->input->post('title'),
            'statusDistribusi' => 'Proses Review',
            'topic' => $this->input->post('topic'),
            'KataKunci' => $this->input->post('keyword'),
            'modifiedby' => $uid,
        );

        $where = array(
            'IdAbstrak' => $this->input->post('IdAbstraks'),
        );

        $this->db->where($where);
        $result = $this->db->update('abstrak', $data);

        $idA = $this->input->post('IdAbstraks');

        $userB = $this->db->query("SELECT * from detailabstrak where IdAbstrak = '$idA' and statusKarya LIKE 'Sudah Direvisi%'");
        foreach ($userB->result() as $q) {
            $sttsq = $q->statusKarya;
        }
        $abstract = $this->input->post('content');

        $modif = date("Y-m-d h:i:sa");

        if ($sttsq == NULL) {

            $status = 'Sudah Direvisi (1)';
            $results = $this->db->query("insert into detailabstrak (IdAbstrak, abstract,  statusKarya,  modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$modif'
                    )
                ");
        } else if ($sttsq != NULL) {

            $mystring = $sttsq;
            $myarray_1 = explode(" ", $mystring);
            $angka = $myarray_1[2];
            $angkakurungakhir = explode("(", $angka);
            $temp = $angkakurungakhir[1];
            $angkaaja = explode(")", $temp);
            $beneranangka = $angkaaja[0];
            $myarray_2 = (int)$beneranangka + 1;
            $status = 'Sudah Direvisi (' . (string)$myarray_2 . ')';
            $results = $this->db->query("insert into detailabstrak (IdAbstrak, abstract, statusKarya,  modifieddate) values(
                    '$idA',
                    '$abstract',
                    '$status',
                    '$modif'
                    )
                ");
        }

        if ($result > 0 && $results > 0) $this->suksesupdate();
        else $this->gagalupdate();
    }

    public function ReviewAbstrak()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["abstrak"] = $this->allmodel->getDataAbstrak();
            //$data['getEvent'] = $this->allmodel->getDataEventAbstra();
            $this->template->load('masterpage/templateR', 'abstrak/reviewabstrak', $data);
            $this->session->set_flashdata('successs', '');
            $this->session->set_flashdata('errors', '');
        }
    }

    public function UploadAbstrak()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $this->template->load('masterpage/templateP', 'abstrak/uploadabstrak', $data);
        }
    }

    public function tambahAbstrak()
    {

        $title = $this->input->post('judul');
        $topic = $this->input->post('Topic');
        $status = "Berhasil Dikumpulkan";
        $kataKunci = $this->input->post('kataKunci');
        $submittedby =  $this->session->userdata('IdUser');
        $Presenter = $this->input->post('presenter');
        $IdEvent = $this->input->post('IdEvent');
        $create = date("Y-m-d h:i:sa");
        $total = count($Presenter);

        for ($a = 0; $a < $total; $a++) {
            $Presenter_x = $Presenter[$a];
            $IdEvent_x = $IdEvent[$a];
            $title_x = $title[$a];
            $kataKunci_x = $kataKunci[$a];
            $topic_x = $topic[$a];
            $statusDistribusi_x = $status;
            $submittedby_x = $submittedby;

            $results = $this->db->query("insert into abstrak (presenter, IdEvent, title,  KataKunci, topic, statusDistribusi, submittedby, createddate) values(
                '$Presenter_x',
                '$IdEvent_x',
                '$title_x',
                '$kataKunci_x',
                '$topic_x',
                '$statusDistribusi_x',
                '$submittedby_x',
                '$create')
                ");
        }

        $abstract = $this->input->post('abstract');
        var_dump($abstract);
        $modif = date("Y-m-d h:i:sa");
        $Abstrak = $this->db->query("SELECT * from abstrak where title = '$title_x'");
        foreach ($Abstrak->result() as $p) {
            $id = $p->IdAbstrak;
        }
        if ($Abstrak) {
            $result = $this->db->query("insert into detailabstrak (IdAbstrak, abstract, modifieddate) values(
                '$id',
                '$abstract',
                '$modif'
                )
            ");
        }

        $IdUser = $this->input->post('IdUser');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $instance = $this->input->post('instance');
        $phone = $this->input->post('phone');
        $gender = $this->input->post('gender');
        $kategori = $this->input->post('kategori');
        $lasteducation = $this->input->post('lasteducation');

        $total2 = count($name);
        $Abstraks = $this->db->query("SELECT * from abstrak where title = '$title_x'");
        foreach ($Abstraks->result() as $p) {
            $idabs = $p->IdAbstrak;
        }
        if ($Abstrak) {
            for ($a = 0; $a < $total2 - 1; $a++) {
                $IdUser_x = $IdUser[$a];
                $name_x = $name[$a];
                $email_x = $email[$a];
                $address_x = $address[$a];
                $instance_x = $instance[$a];
                $phone_x = $phone[$a];
                $gender_x = $gender[$a];
                $kategori_x = $kategori[$a];
                $lasteducation_x = $lasteducation[$a];

                $jenisAuthor_x = 'Author ' . $a + 1;

                if ($IdUser_x == 0) {
                    $result = $this->db->query("insert into detailauthor (IdAbstrak, jenisAuthor, email, namaUser, phone, gender, kategori, lasteducation, address, instance) values(
                        '$idabs',
                        '$jenisAuthor_x',                        
                        '$email_x',
                        '$name_x',
                        '$phone_x',
                        '$gender_x',
                        '$kategori_x',
                        '$lasteducation_x',
                        '$address_x',
                        '$instance_x'

                        )
                    ");
                } else if ($IdUser_x != 0) {
                    $result = $this->db->query("insert into detailauthor (IdAbstrak, IdUser, jenisAuthor) values(
                        '$idabs',
                        '$IdUser_x',
                        '$jenisAuthor_x'
                        )
                    ");
                }
            }
        }

        if ($results > 0) $this->sukses();
        else $this->gagal();
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
    function sukses()
    {
        $this->session->set_flashdata('successs', 'Data berhasil disimpan.');
        $in = $this->session->userdata('IdEventC');
        redirect('abstrak/abstrak/' . $in);
    }

    function gagal()
    {
        $this->session->set_flashdata('errors', validation_errors());
    }

    function suksess()
    {
        $this->session->set_flashdata('successs', 'Data berhasil disimpan.');
        redirect('abstrak/ReviewAbstrak');
    }

    function gagals()
    {
        $this->session->set_flashdata('errors', validation_errors());
    }

    function suksesupdate()
    {
        $this->session->set_flashdata('suksesupdate', 'Data berhasil disimpan.');
        $in = $this->session->userdata('IdEventC');
        redirect('abstrak/abstrak/' . $in);

        // redirect('abstrak/abstrak');
    }

    function gagalupdate()
    {
        $this->session->set_flashdata('gagalupdate', validation_errors());
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->allmodel->search_user($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'         => $row->namaUser,
                        'email'   => $row->email,
                        'kategori'   => $row->kategori,
                        'lasteducation'   => $row->lasteducation,
                        'address'   => $row->address,
                        'instance'   => $row->instance,
                        'phone'   => $row->phone,
                        'gender'   => $row->gender,
                        'IdUser' => $row->IdUser,

                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function filePPT()
    {
        $IdAbstract = $this->input->post('idabs');
        $foto = $_FILES['filePpt']['name'];
        $config['upload_path'] = './file/PPT/';
        $config['allowed_types'] = 'pptx';
        $add_filename = "Presentation" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('filePpt')) {
            $add_filename = $this->upload->data('file_name');
        }
    }

    public function filePdf()
    {
        $IdAbstract = $this->input->post('idabs');
        $pdf = $_FILES['fileFpp']['name'];
        $config1['upload_path'] = './file/';
        $config1['allowed_types'] = 'pdf';
        $add_filename = "Fullpaper" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $pdf);
        $config1['file_name'] = $add_filename;
        $this->load->library('upload', $config1);
        if ($this->upload->do_upload('fileFpp')) {
            $add_filename = $this->upload->data('file_name');
        }
    }

    public function saveFullpaper()
    {

        $this->filePPT();
        unset($this->upload);
        $this->filePdf();
        $IdAbstract = $this->input->post('idabs');
        $statusDistribusiFpp = 'Berhasil Dikumpulkan';
        $PresentationFile = "Presentation" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $_FILES['filePpt']['name']);
        $FullpaperFile = "Fullpaper" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $_FILES['fileFpp']['name']);
        if ($this->input->post('links') == null) {
            $VidioLink = null;
        } else if ($this->input->post('links') != null) {
            $VidioLink = $this->input->post('links');
        }
        $modifieddateFpp = date("Y-m-d h:i:sa");

        $update = $this->db->query("update fullpaper set statusDistribusiFpp='Proses Review' where IdAbstract = '$IdAbstract'");


        $fpp = $this->db->query("SELECT * from fullpaper where IdAbstract = '$IdAbstract'");
        foreach ($fpp->result() as $p) {
            $id = $p->IdFullpaper;
        }
        if ($fpp) {
            $result = $this->db->query("insert into detailfpp (PresentationFile, FullpaperFile, VideoLink, modifieddateFpp, IdFullpaper) values(
                '$PresentationFile',
                '$FullpaperFile',
                '$VidioLink',
                '$modifieddateFpp',
                '$id'
                )
            ");
        }
        $update = $this->db->query("update abstrak set statusDistribusi='Berhasil submit fullpaper' where IdAbstrak = '$IdAbstract'");

        if ($result > 0  && $update > 0) $this->suksessave();
        else $this->gagalsave();
    }

    function suksessave()
    {
        $this->session->set_flashdata('suksessave', 'Fullpaper berhasil disimpan.');
        redirect('fullpaper');
    }

    function gagalsave()
    {
        $this->session->set_flashdata('gagalsave', validation_errors());
    }
}
