<?php
defined('BASEPATH') or exit('access denied');

class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("allmodel");
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    //LUPA PASSWORD
    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot-password');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {

                $name = $user['namaUser'];

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,

                ];
                $this->db->insert('user_token', $user_token, $name);
                $this->_sendEmail($token, 'forgot', $name);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cek email Anda untuk mereset password!</div>');
                redirect(site_url('auth/forgot'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
                // redirect('auth/forgot');
                redirect(site_url('auth/forgot'));
            }
        }
    }
    private function _sendEmail($token, $type, $name)
    {

        $mail = $this->phpmailer->load();

        try {
            $receiver = $this->input->post('email');
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
            if ($type == 'forgot') {
                $mail->isHTML(true);
                $mail->Subject = "Lupa Kata Sandi";
                $mail->Body = '<p>Yth. Bapak/Ibu ' . $name . ',</p>

                <p>Terima sudah melakukan permintaan lupa kata sandi.</p>
                
                <p>Berikut ini kami lampirkan link untuk melakukan lupa kata sandi.</p>
                
                <p><a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">http://linklupakatasandi</a></p>
                
                <p>Terima kasih.</p>
                
                <p>Salam,</p>
                
                <p>AstraTech Conference<br />
                </p>';
                $mail->send();
            }
        } catch (Exception $e) {
            return "error" . $mail->ErrorInfo;
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, token salah!</div>');
                redirect('auth/forgot');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, email salah!</div>');
            redirect('auth/forgot');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/change-password');
        } else {
            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
            redirect('auth/login');
        }
    }


    //LOGIN
    public function login()
    {
        $this->session->set_flashdata('error', '');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/Login');
        } else {
            //jika validasi sukses
            $this->ceklogin();
        }
    }

    public function ceklogin()
    {
        $POST = $this->input->post();
        if (isset($POST["email"]) && isset($POST["password"])) {
            //cek user
            $user = $this->allmodel;
            $data = $user->getByUsernamePassword();

            if ($data != null) {
                $IdUser = $data->IdUser;
                $email = $data->email;
                $namaUser = $data->namaUser;
                $role = $data->role;
                $password = $data->password;
                $kategori = $data->kategori;
                $lasteducation = $data->lasteducation;
                $address = $data->address;
                $instance = $data->instance;
                $phone =  $data->phone;
                $gender = $data->gender;
                $IdEvent = $data->IdEvent;



                //adding data to session

                $newdata = array(
                    'IdUser' => $IdUser,
                    'email' => $email,
                    'namaUser' => $namaUser,
                    'role' => $role,
                    'password' => $password,
                    'kategori' => $kategori,
                    'lasteducation' => $lasteducation,
                    'address' => $address,
                    'instance' => $instance,
                    'phone' => $phone,
                    'gender' => $gender,
                    'IdEvent' => $IdEvent

                );
                $this->session->set_userdata($newdata);

                if ($role == "Admin") {

                    echo "<script>alert('Hallo Admin');</script>";
                    redirect(site_url('dashboard/dashboardSSO'));
                } else if ($role == "Reviewer") {

                    echo "<script>alert('Hallo Reviewer');</script>";
                    redirect(site_url('dashboard/dashboardR'));
                } else if ($role == "Author") {

                    echo "<script>alert('Hallo Author');</script>";
                    redirect(site_url('_dashboard_author'));
                } else if ($role == "Super Admin") {

                    echo "<script>alert('Hallo Author');</script>";
                    redirect(site_url('dashboard/dashboardSA'));
                } else if ($role == "Peserta") {
                    echo "<script>alert('Hallo Peserta');</script>";
                    redirect(site_url('dashboard/dashboardP'));
                } else if ($role == "Finance") {
                    echo "<script>alert('Hallo Finance');</script>";
                    redirect(site_url('dashboard/dashboardF'));
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau Password tidak terdaftar!');
                $this->load->view('auth/Login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email dan Password tidak boleh kosong!');
            $this->load->view('auth/Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('IdUser');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('namaUser');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('kategori');
        $this->session->unset_userdata('lasteducation');
        $this->session->unset_userdata('address');
        $this->session->unset_userdata('instance');
        $this->session->unset_userdata('phone');
        $this->session->unset_userdata('gender');
        $this->session->unset_userdata('IdEvent');
        redirect(site_url('auth/Login'));
    }

    //REGISTER
    public function register()
    {

        $this->load->view('auth/register');
        $this->session->set_flashdata('error', '');
        $this->session->set_flashdata('error', '');
        $this->session->set_flashdata('success_register', '');
    }

    public function proses()
    {
        $this->session->set_flashdata('error', '');

        $this->form_validation->set_rules('email', 'email', 'trim|min_length[1]|max_length[255]|is_unique[user.email]', array('is_unique' => 'Email telah terdaftar!'));
        $this->form_validation->set_rules('password', 'password', 'trim|min_length[1]|max_length[8]', array('max_length' => 'Kata sandi maksimal 8 karakter.'));

        $data = array(
            'email' => $this->input->post('email'),
            'namaUser' => $this->input->post('namaUser'),
            'password' => $this->input->post('password'),
            'address' => $this->input->post('address'),
            'instance' => $this->input->post('instance'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'role' => $this->input->post('role'),
            'kategori' => $this->input->post('kategori'),
            'lasteducation' => $this->input->post('lasteducation')
        );
        if ($this->form_validation->run() == true) {
            $namaUser = $this->input->post('namaUser');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $instance = $this->input->post('instance');
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            $role = $this->input->post('role');
            $kategori = $this->input->post('kategori');
            $lasteducation = $this->input->post('lasteducation');
            $this->allmodel->register($email, $password, $namaUser, $address, $instance, $phone, $gender, $role, $kategori, $lasteducation);
            $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil, Silakan Lakukan Login.');
            redirect('auth/register');
            // }
        } else if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('auth/register', $data);
        }
    }
}
