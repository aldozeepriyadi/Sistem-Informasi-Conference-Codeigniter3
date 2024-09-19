<?php
defined('BASEPATH') or exit('No direct script access allowed');

class history extends CI_Controller
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

    public function abstrak()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data["abstrak"] = $this->allmodel->getHistoryAbstrak();
            $this->template->load('masterpage/templateR', 'abstrak/riwayatabstrak', $data);
            $this->session->set_flashdata('successs', '');
            $this->session->set_flashdata('errors', '');
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

    public function fullpaper()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data["fullpaper"] = $this->allmodel->getHistoryFullpaper();
            $this->template->load('masterpage/templateR', 'fullpaper/riwayatfullpaper', $data);
            $this->session->set_flashdata('successs', '');
            $this->session->set_flashdata('errors', '');
        }
    }

    public function viewfullpaper($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data["fullpaper"] = $this->allmodel->viewHistoryFpp($id);
            $this->template->load('masterpage/templateR', 'fullpaper/historyfullpaper', $data);
        }
    }
}
