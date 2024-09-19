<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fullpaper extends CI_Controller
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

    public function download($files)
    {
        if (!empty($files)) {
            //load download helper
            $this->load->helper('download');

            //file path
            $file = file_get_contents('./file/PPT/' . $files);

            //download file from directory
            force_download($files, $file);
        }
    }

    public function downloadpdf($filefpp)
    {
        if (!empty($filefpp)) {
            //load download helper
            $this->load->helper('download');

            //file path
            $filefpps = file_get_contents('./file/' . $filefpp);

            //download file from directory
            force_download($filefpp, $filefpps);
        }
    }

    public function index()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["abstrak"] = $this->allmodel->getDataFullpaper();
            $this->template->load('masterpage/templateP', 'fullpaper/LihatFullpaper', $data);
            $this->session->set_flashdata('suksess', '');
            $this->session->set_flashdata('gagals', '');
            $this->session->set_flashdata('suksesupdate', '');
            $this->session->set_flashdata('gagalupdate', '');
            $this->session->set_flashdata('suksessave', '');
            $this->session->set_flashdata('gagalsave', '');
        }
    }

    public function ReviewFullpaper()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $this->template->load('masterpage/templateR', 'fullpaper/ReviewFullpaper', $data);
            $this->session->set_flashdata('suksess', '');
            $this->session->set_flashdata('gagals', '');
        }
    }

    public function editFullpaperPeserta()
    {

        $IdAbstract = $this->input->post('idfppU');
        $pdf = $_FILES['fileFpp']['name'];
        $config1['upload_path'] = './file/';
        $config1['allowed_types'] = 'pdf';
        $add_filename = "Fullpaper" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $pdf);
        $config1['file_name'] = $add_filename;
        $this->load->library('upload', $config1);
        if ($this->upload->do_upload('fileFpp')) {
            $add_filename = $this->upload->data('file_name');
            $FullpaperFile = $add_filename;
        }

        unset($this->upload);

        $IdAbstract = $this->input->post('idfppU');
        $foto = $_FILES['filePpt']['name'];
        $config['upload_path'] = './file/PPT/';
        $config['allowed_types'] = 'pptx';
        $add_filename = "Presentation" . "-" . time() . "-" . $IdAbstract . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('filePpt')) {
            $add_filename = $this->upload->data('file_name');
            $PresentationFile = $add_filename;
        }

        $uid = $this->session->userdata('IdUser');
        $data = array(
            'statusDistribusiFpp' => 'Proses Review',
            'modifiedby' => $uid,
        );

        $where = array(
            'IdFullpaper' => $this->input->post('idfppU'),
        );

        $this->db->where($where);
        $result = $this->db->update('fullpaper', $data);

        $idA = $this->input->post('idfppU');
        $ket = $this->input->post('reasonU');

        $userB = $this->db->query("SELECT * from detailfpp where IdFullpaper = '$idA' and statusKaryaFpp LIKE 'Sudah Direvisi%'");
        foreach ($userB->result() as $q) {
            $sttsqs = $q->statusKaryaFpp;
            var_dump($sttsqs);
        }

        $VidioLink = $this->input->post('links');
        $modifieddateFpp = date("Y-m-d h:i:sa");

        if (empty($sttsqs)) {

            $status = 'Sudah Direvisi (1)';
            $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$PresentationFile',
                    '$FullpaperFile',
                    '$VidioLink',
                    '$ket',
                    '$status',
                    '$modifieddateFpp'
                    )
                ");
        } else if (isset($sttsqs)) {

            $mystring = $sttsq;
            $myarray_1 = explode(" ", $mystring);
            $angka = $myarray_1[2];
            $angkakurungakhir = explode("(", $angka);
            $temp = $angkakurungakhir[1];
            $angkaaja = explode(")", $temp);
            $beneranangka = $angkaaja[0];
            $myarray_2 = (int)$beneranangka + 1;
            $status = 'Sudah Direvisi (' . (string)$myarray_2 . ')';
            $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$PresentationFile',
                    '$FullpaperFile',
                    '$VidioLink',
                    '$ket',
                    '$status',
                    '$modifieddateFpp'
                    )
                ");
        }

        if ($result > 0 && $results > 0) $this->suksesupdate();
        else $this->gagalupdate();
    }

    public function editFullpaper()
    {
        if ($this->input->post('deadlineRevisi') != NULL) {
            $data = array(
                'deadlineRevisiFpp' => $this->input->post('deadlineRevisi'),
                'statusDistribusiFpp' => 'Selesai Review',
            );

            $where = array(
                'IdFullpaper' => $this->input->post('idfpp'),
            );

            $this->db->where($where);
            $result = $this->db->update('fullpaper', $data);
        } else if ($this->input->post('deadlineRevisi') == NULL) {
            $data = array(
                'statusDistribusiFpp' => 'Selesai Review',
            );

            $where = array(
                'IdFullpaper' => $this->input->post('idfpp'),
            );

            $this->db->where($where);
            $result = $this->db->update('fullpaper', $data);
        }

        $idA = $this->input->post('idfpp');

        $userB = $this->db->query("SELECT * from detailfpp where IdFullpaper = '$idA' and statusKaryaFpp LIKE 'Revisi%'");
        foreach ($userB->result() as $q) {
            $sttsq = $q->statusKaryaFpp;
        }
        $keterangan = $this->input->post('keterangan');
        $fpp = $this->input->post('fpp');
        $ppt = $this->input->post('ppt');
        $link = $this->input->post('link');
        $modif = date("Y-m-d h:i:sa");
        $ketStatus = $this->input->post('status');
        if (empty($userB)) {
            if ($ketStatus == 'Diterima') {
                $status = 'Diterima';
                $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$ppt',
                    '$fpp',
                    '$link',
                    '$keterangan',
                    '$status',
                    '$modif'
                  
                    )
                ");

                $fppp = $this->db->query("SELECT * from fullpaper where IdFullpaper = '$idA'");
                foreach ($fppp->result() as $q) {
                    $idabs = $q->IdAbstract;
                    $submittedby = $q->submittedby;
                    $kode = $q->kodepaper;
                }

                $absss = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idabs'");
                foreach ($absss->result() as $pq) {
                    $ideve = $q->IdEvent;
                    $title = $q->title;
                }

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
                        $namaevent = $eventtt['nameEvent'];
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
                        $mail->Subject = "$namaevent Hasil Review Fullpaper Diterima";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Kami ucapkan Selamat! bahwa paper Anda dengan Kode Paper ' . $kode . ' yang berjudul <b>&ldquo;' . $title . '&rdquo;</b> sudah kami terima dan dapat dipublikasikan pada Prosiding ' . $namaevent . '.</p>
                        
                        <p>Mohon ditunggu untuk mendapatkan informasi berikutnya terkait publikasi prosiding ' . $namaevent . '.</p>
                        
                        <p>Terima kasih.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }
                }
            } else if ($ketStatus == 'Revisi') {
                $status = 'Revisi 1';
                $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$ppt',
                    '$fpp',
                    '$link',
                    '$keterangan',
                    '$status',
                    '$modif'
                    )
                ");

                $fppp = $this->db->query("SELECT * from fullpaper where IdFullpaper = '$idA'");
                foreach ($fppp->result() as $q) {
                    $idabs = $q->IdAbstract;
                    $submittedby = $q->submittedby;
                    $kode = $q->kodepaper;
                }

                $absss = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idabs'");
                foreach ($absss->result() as $pq) {
                    $ideve = $pq->IdEvent;
                    $title = $pq->title;
                }

                $eventtt = $this->db->query("SELECT * from event where IdEvent = '$ideve'");
                foreach ($eventtt->result() as $ppq) {
                    $namaevent = $pq->nameEvent;
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
                        $mail->Subject = "$namaevent Hasil Review Fullpaper Direvisi";

                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Mohon maaf, paper Anda dengan Kode Paper ' . $kode . ' yang berjudul <b>&ldquo;' . $title . '&rdquo;</b> harus direvisi terlebih dahulu sebelum dipublikasikan pada Prosiding ' . $namaevent . '.</p>
                        
                        <p><b>Deadline: ' . $this->input->post('deadlineRevisi') . ', Pukul 12.00 WIB.</b></p>
                        
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
        } else if (isset($userB)) {
            if ($ketStatus == 'Diterima') {
                $status = 'Diterima';
                $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$ppt',
                    '$fpp',
                    '$link',
                    '$keterangan',
                    '$status',
                    '$modif'
                    )
                ");


                $fppp = $this->db->query("SELECT * from fullpaper where IdFullpaper = '$idA'");
                foreach ($fppp->result() as $q) {
                    $idabs = $q->IdAbstract;
                    $submittedby = $q->submittedby;
                    $kode = $q->kodepaper;
                }

                $absss = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idabs'");
                foreach ($absss->result() as $pq) {
                    $ideve = $pq->IdEvent;
                    $title = $pq->title;
                }

                $eventtt = $this->db->query("SELECT * from event where IdEvent = '$ideve'");
                foreach ($eventtt->result() as $ppq) {
                    $namaevent = $pq->nameEvent;
                }

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
                        $mail->Subject = "$namaevent Hasil Review Fullpaper Diterima";
                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Kami ucapkan Selamat! bahwa paper Anda dengan Kode Paper ' . $kode . ' yang berjudul <b>&ldquo;' . $title . '&rdquo;</b> sudah kami terima dan dapat dipublikasikan pada Prosiding ' . $namaevent . '.</p>
                        
                        <p>Mohon ditunggu untuk mendapatkan informasi berikutnya terkait publikasi prosiding ' . $namaevent . '.</p>
                        
                        <p>Terima kasih.</p>
                        
                        <p>Salam,</p>
                        
                        <p>AstraTech Conference<br />
                        </p>';
                        $resultss = $mail->send();
                    } catch (Exception $e) {
                        return "error" . $mail->ErrorInfo;
                    }
                }
            } else if ($ketStatus == 'Revisi') {
                $mystring = $sttsq;
                $myarray_1 = explode(" ", $mystring);
                $angka = $myarray_1[1];
                $myarray_2 = (int)$angka + 1;
                $status = 'Revisi ' . (string)$myarray_2;
                $results = $this->db->query("insert into detailfpp (IdFullpaper, PresentationFile, FullpaperFile, VideoLink, keteranganFpp, statusKaryaFpp, modifieddateFpp) values(
                    '$idA',
                    '$ppt',
                    '$fpp',
                    '$link',
                    '$keterangan',
                    '$status',
                    '$modif'
                    )
                ");

                $fppp = $this->db->query("SELECT * from fullpaper where IdFullpaper = '$idA'");
                foreach ($fppp->result() as $q) {
                    $idabs = $q->IdAbstract;
                    $submittedby = $q->submittedby;
                    $kode = $q->kodepaper;
                }

                $absss = $this->db->query("SELECT * from abstrak where IdAbstrak = '$idabs'");
                foreach ($absss->result() as $pq) {
                    $ideve = $pq->IdEvent;
                    $title = $pq->title;
                }

                $eventtt = $this->db->query("SELECT * from event where IdEvent = '$ideve'");
                foreach ($eventtt->result() as $ppq) {
                    $namaevent = $pq->nameEvent;
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
                        $mail->Subject = "$namaevent Hasil Review Fullpaper Direvisi";

                        $mail->Body = '<p>Dear Bapak/Ibu ' . $namaSubmission . ',</p>

                        <p>Mohon maaf, paper Anda dengan Kode Paper ' . $kode . ' yang berjudul <b>&ldquo;' . $title . '&rdquo;</b> harus direvisi terlebih dahulu sebelum dipublikasikan pada Prosiding ' . $namaevent . '.</p>
                        
                        <p>Deadline: ' . $this->input->post('deadlineRevisi') . ', Pukul 12.00 WIB.</p>
                        
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
        }

        if ($result > 0 && $results > 0) $this->suksess();
        else $this->gagals();
    }

    function suksess()
    {
        $this->session->set_flashdata('suksess', 'Review fullpaper berhasil dikirim.');
        redirect('fullpaper/ReviewFullpaper');
    }

    function gagals()
    {
        $this->session->set_flashdata('gagals', validation_errors());
    }

    function suksesupdate()
    {
        $this->session->set_flashdata('suksesupdate', 'Fullpaper berhasil diubah.');
        redirect('fullpaper');
    }

    function gagalupdate()
    {
        $this->session->set_flashdata('gagalupdate', validation_errors());
    }
}
