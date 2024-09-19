<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
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

    public function dashboardSA()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data['jumlahnotif'] = $this->allmodel->getJumlahNotif();
            $data["notif"] = $this->allmodel->getNotif();
            $data['jumlahadmin'] = $this->allmodel->countAdmin();
            $data['jumlahauthor'] = $this->allmodel->countAuthor();
            $data['jumlahreviewer'] = $this->allmodel->countReviewer();
            $data['jumlahevent'] = $this->allmodel->countEventAktif();
            $this->template->load('masterpage/templateSA', 'dashboard/dashboardSA', $data);
        }
    }

    public function UbahStatusNotifA($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $this->allmodel->UbahStatusNotif($id);
            redirect(site_url('dashboard/dashboardA'));
        }
    }

    public function UbahStatusNotifF($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Finance') {
            redirect('auth/login');
        } else {
            $this->allmodel->UbahStatusNotif($id);
            redirect(site_url('dashboard/dashboardF'));
        }
    }

    public function UbahStatusNotifP($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $this->allmodel->UbahStatusNotif($id);
            redirect(site_url('dashboard/dashboardP'));
        }
    }

    public function UbahStatusNotifR($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $this->allmodel->UbahStatusNotif($id);
            redirect(site_url('dashboard/dashboardR'));
        }
    }

    public function UbahStatusNotifSA($id)
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $this->allmodel->UbahStatusNotif($id);
            redirect(site_url('dashboard/dashboardSA'));
        }
    }

    public function dashboardA()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $data['jumlahnotif'] = $this->allmodel->getJumlahNotif();
            $data["notif"] = $this->allmodel->getNotif();
            $data['jumlahauthor'] = $this->allmodel->countAuthorAdmin();
            $data['jumlahreviewer'] = $this->allmodel->countReviewer();
            $data['jumlahabstrak'] = $this->allmodel->countAbstrak();
            $data['jumlahpaper'] = $this->allmodel->countFullpaper();
            $this->template->load('masterpage/templateA', 'dashboard/dashboardA', $data);
        }
    }
    public function dashboardP()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Peserta') {
            redirect('auth/login');
        } else {
            $data['jumlahnotif'] = $this->allmodel->getJumlahNotif();
            $data["notif"] = $this->allmodel->getNotif();

            $data['jmlabstrakditerima'] = $this->allmodel->countAbstrakOK();
            $data['jmlfppditerima'] = $this->allmodel->countfppOK();
            $data['jmlabstrakrevisi'] = $this->allmodel->countAbstrakR();
            $data['jmlfpprevisi'] = $this->allmodel->countFppR();
            $this->template->load('masterpage/templateP', 'dashboard/dashboardP', $data);
        }
    }
    public function dashboardR()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Reviewer') {
            redirect('auth/login');
        } else {
            $data['jumlahnotif'] = $this->allmodel->getJumlahNotif();
            $data["notif"] = $this->allmodel->getNotif();

            $data['jmlabstrakreviewer'] = $this->allmodel->countAbstrakReview();
            $data['jumlahpaperreviewer'] = $this->allmodel->countFullpaperReview();
            $this->template->load('masterpage/templateR', 'dashboard/dashboardR', $data);
        }
    }
    public function dashboardF()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Finance') {
            redirect('auth/login');
        } else {
            $data['jumlahnotif'] = $this->allmodel->getJumlahNotif();
            $data["notif"] = $this->allmodel->getNotif();

            $data['jmluang'] = $this->allmodel->countJmlUang();
            $data['jmltrans'] = $this->allmodel->countJmlTrs();
            $this->template->load('masterpage/templateF', 'dashboard/dashboardF', $data);
        }
    }
    public function dashboardSSO()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $this->template->load('masterpage/templateSSO', 'dashboard/dashboardSSO');
        }
    }
}
