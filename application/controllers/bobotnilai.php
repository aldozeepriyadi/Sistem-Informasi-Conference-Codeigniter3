<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bobotnilai extends CI_Controller
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
    public function index()
    {
        $data["bobot"] = $this->allmodel->getAllBobotNilai();
        $this->template->load('masterpage/templateA', 'bobotnilai/kelolabobotnilai', $data);
        $this->session->set_flashdata('successBobot', '');
        $this->session->set_flashdata('errorBobot', '');
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model("allmodel");
    }

    public function edit()
    {
        $result = $this->allmodel->editBobotNilai();
        if ($result > 0) $this->sukses();
        else $this->gagal();
    }
    public function fungsiDelete($idEvent)
    {
        $result = $this->allmodel->deleteDataBobotNilai($idEvent);
        if ($result > 0)  $this->session->set_flashdata('successBobot', 'Data berhasil dihapus.');
        else $this->session->set_flashdata('errorBobot', 'Data gagal dihapus');
        redirect(base_url('bobotnilai'));
    }
    public function tambah()
    {
        $event = $this->allmodel;
        $result = $event->saveBobotNilai();
        if ($result > 0) $this->sukses();
        else $this->gagal();
    }
    function sukses()
    {
        $this->session->set_flashdata('successBobot', 'Data berhasil disimpan.');
        redirect(site_url('bobotnilai'));
    }

    function gagal()
    {
        $this->session->set_flashdata('errorBobot', validation_errors());
    }
}
