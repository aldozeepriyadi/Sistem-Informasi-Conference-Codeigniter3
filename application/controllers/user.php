<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
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
    public function author()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["author"] = $this->allmodel->getAllAuthor();
            $this->template->load('masterpage/templateSA', 'user/lihatauthor', $data);
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model("allmodel");
    }

    public function user()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["user"] = $this->allmodel->getAll();
            $data['getDataEvent'] = $this->allmodel->getDataEvent();
            $this->template->load('masterpage/templateSA', 'user/kelolauser', $data);
            $this->session->set_flashdata('successUser', '');
            $this->session->set_flashdata('errorUser', '');
        }
    }

    public function edituser()
    {
        $mail = $this->phpmailer->load();
        $idevent = $this->input->post('IdEvent');
        $iduser = $this->input->post('IdUser');
        $event = $this->db->get_where('event', ['IdEvent' => $idevent])->row_array();
        if ($event) {
            $notif = [
                'message' => "Anda terpilih menjadi admin pada event " . $event['name'],
                'status' => "Aktif",
                'IdUser' => $iduser,

            ];
            $this->db->insert('notifikasi', $notif);
            $result = $this->allmodel->edituser();


            $userA = $this->db->get_where('user', ['IdUser' => $iduser])->row_array();
            if (isset($userA['email'])) {
                $name = $userA['namaUser'];
                $namaEvent = $event['nameEvent'];
                try {
                    $receiver = $userA['email'];
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
                    $mail->Subject = "$namaEvent Informasi Admin Conference";
                    $mail->Body = '<p>Dear Bapak/Ibu ' . $name . ',</p>

                    <p>Mohon kesediannya, bahwa Bapak/Ibu kami jadikan Admin pada kegiatan ' . $namaEvent . '</p>
                    
                    <p>Terima kasih.</p>
                    
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
        } else if ($this->input->post('IdEvent') == '0') {
            $notif = [
                'message' => "Anda terpilih menjadi reviewer",
                'status' => "Aktif",
                'IdUser' => $iduser,

            ];
            $this->db->insert('notifikasi', $notif);
            $result = $this->allmodel->edituser();

            $userA = $this->db->get_where('user', ['IdUser' => $iduser])->row_array();
            if (isset($userA['email'])) {
                $name = $userA['namaUser'];
                $namaEvent = $event['nameEvent'];
                try {
                    $receiver = $userA['email'];
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
                    $mail->Subject = "Informasi Reviewer Conference";
                    $mail->Body = '<p>Dear Bapak/Ibu ' . $name . ',</p>

                    <p>Mohon kesediannya, bahwa Bapak/Ibu kami jadikan Reviewer pada seluruh kegiatan SNEEMO Politeknik Astra</p>
                    
                    <p>Terima kasih.</p>
                    
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
        } else {
            $result = $this->allmodel->edituser();
            if ($result > 0) $this->sukses();
            else $this->gagal();
        }
    }

    function sukses()
    {
        $this->session->set_flashdata('successUser', 'Data berhasil disimpan.');
        redirect('user/user');
    }

    function gagal()
    {
        $this->session->set_flashdata('errorUser', validation_errors());
        redirect('user/user');
    }
}
