<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prosiding extends CI_Controller
{

    public $pdf;
    public $foto;
    public $add_filename_jpg;
    public $add_filename;
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
    public function TambahProsiding()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $data['getDataEvent'] = $this->allmodel->getDataEventAbstrak();
            $data["getProsiding"] = $this->allmodel->getprosiding();
            $data['jumlahprosiding'] = $this->allmodel->countProsiding();
            $this->template->load('masterpage/templateA', 'prosiding/uploadprosiding', $data);
            $this->session->set_flashdata('success', '');
            $this->session->set_flashdata('error', '');
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('allmodel');
    }


    public function saveProsiding()
    {

        $foto = $_FILES['fotoCover']['name'];
        $config['upload_path'] = './images/prosiding/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $add_filename_jpg = "Cover" . "-" . time() . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('fotoCover')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $fotof = $add_filename_jpg;
        }

        unset($this->upload);


        $pdf = $_FILES['fileProsiding']['name'];
        $config1['upload_path'] = './file/';
        $config1['allowed_types'] = 'pdf';
        $add_filename = "Prosiding" . "-" . time() . "-" . str_replace(' ', '-', $pdf);
        $config1['file_name'] = $add_filename;
        $this->load->library('upload', $config1);
        if ($this->upload->do_upload('fileProsiding')) {
            $add_filename = $this->upload->data('file_name');
            $pdff = $add_filename;
        }

        $data = array(
            'IdEvent' => $this->input->post('eventName'),
            'year' => $this->input->post('year'),
            'title' => $this->input->post('title'),
            'ProsidingImg' => $fotof,
            'ProsidingFile' => $pdff,
            'IdUser' => $this->session->userdata('IdUser')
        );

        $insert = $this->allmodel->saveProsiding($data);

        if ($insert > 0) $this->sukses();
        else $this->gagal();
    }

    function sukses()
    {
        $this->session->set_flashdata('success', 'Data berhasil disimpan.');
        redirect(site_url('prosiding/TambahProsiding'));
    }

    function gagal()
    {
        $this->session->set_flashdata('error', validation_errors());
        redirect(site_url('prosiding/TambahProsiding'));
    }
}
