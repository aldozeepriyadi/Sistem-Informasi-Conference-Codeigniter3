<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landingpage extends CI_Controller
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
        $this->load->model('landingmodel');
    }

    public function index()
    {

        $data['archives']    = $this->landingmodel->getallprosiding();
        $data['current']    = $this->landingmodel->getprosiding();
        $data['paymentKategori'] = $this->landingmodel->getPaymentKategori();
        $data['event'] = $this->landingmodel->getEventAktif();
        $this->load->view('landingpage', $data);
    }



    public function readmore($id)
    {
        $data['results']     = $this->landingmodel->getdata($id);
        $this->load->view('readmore_current', $data);
    }

    public function morearsip()
    {
        $data['archives']    = $this->landingmodel->getallprosiding();
        $this->load->view('morearsip', $data);
    }
}
