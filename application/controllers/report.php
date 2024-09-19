<?php
defined('BASEPATH') or exit('No direct script access allowed');

class report extends CI_Controller
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
    public function __construct()
    {
        parent::__construct();
        $this->load->model("allmodel");
    }

    public function grafikpayment()
    {
        $data = $this->allmodel->chartdb();
        echo json_encode($data);
    }

    public function grafikpaymentindex()
    {

        $this->template->load('masterpage/templateSA', 'report/grafikpayment');
    }
    public function laporan()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["pay"] = $this->allmodel->getReportPayment();
            $data['udah'] = $this->allmodel->get_sum_sudah();
            $data['konfir'] = $this->allmodel->get_sum_belum_konfir();
            $data['belum'] = $this->allmodel->get_sum_belum_bayar();
            $data["fpp"] = $this->allmodel->getReportFullpaper();
            $data["abs"] = $this->allmodel->getReportAbstrak();
            $this->template->load('masterpage/templateSA', 'report/laporan', $data);
        }
    }
    public function payment()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["pay"] = $this->allmodel->getReportPayment();
            $data['udah'] = $this->allmodel->get_sum_sudah();
            $data['konfir'] = $this->allmodel->get_sum_belum_konfir();
            $data['belum'] = $this->allmodel->get_sum_belum_bayar();
            $this->template->load('masterpage/templateSA', 'report/payment', $data);
        }
    }

    public function fullpaper()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["fpp"] = $this->allmodel->getReportFullpaper();
            $this->template->load('masterpage/templateSA', 'report/fullpaper', $data);
        }
    }
    public function abstrak()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["abs"] = $this->allmodel->getReportAbstrak();
            $this->template->load('masterpage/templateSA', 'report/abstrak', $data);
        }
    }
}
