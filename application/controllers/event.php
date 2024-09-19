<?php
defined('BASEPATH') or exit('No direct script access allowed');

class event extends CI_Controller
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
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function event()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Super Admin') {
            redirect('auth/login');
        } else {
            $data["event"] = $this->allmodel->getAll2();
            $this->template->load('masterpage/templateSA', 'event/event', $data);
            $this->session->set_flashdata('successHapus', '');
            $this->session->set_flashdata('errrorHapus', '');
            $this->session->set_flashdata('successs', '');
            $this->session->set_flashdata('errors', '');
            $this->session->set_flashdata('successTgl', '');
            $this->session->set_flashdata('errorTgl', '');
            $this->session->set_flashdata('successHapussub', '');
            $this->session->set_flashdata('errorHapussub', '');
        }
    }


    public function editEvents()
    {

        $id = $this->input->post('nameEventE');
        $foto = $_FILES['poster']['name'];
        $config['upload_path'] = './file/poster/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $add_filename_jpg = "Poster" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $poster = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $poster = $add_filename_jpg;
        }

        $result = $this->allmodel->editEvent($poster);

        if ($result > 0) $this->sukses();
        else $this->gagal();
        // }
    }
    public function fungsiDelete($idEvent)
    {
        $result = $this->allmodel->deleteData($idEvent);
        if ($result > 0)  $this->sukseshapus();
        else $this->gagalhapus();
    }



    function sukseshapus()
    {
        $this->session->set_flashdata('successHapus', 'Data berhasil dinonaktifkan.');
        redirect(base_url('event/event'));
    }

    function gagalhapus()
    {
        $this->session->set_flashdata('errrorHapus', validation_errors());
    }


    public function tambah()
    {

        $id = $this->input->post('nameEvent');
        $foto = $_FILES['poster']['name'];
        $config['upload_path'] = './file/poster/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $add_filename_jpg = "Poster" . "-" . time() . "-" . $id . "-" . str_replace(' ', '-', $foto);
        $config['file_name'] = $add_filename_jpg;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('poster')) {
            $add_filename_jpg = $this->upload->data('file_name');
            $poster = $add_filename_jpg;
        }

        $event = $this->allmodel;
        $result = $event->saveEvent($poster);
        if ($result > 0) $this->sukses();
        else $this->gagal();
    }

    function sukses()
    {
        $this->session->set_flashdata('successs', 'Data berhasil disimpan.');
        redirect('event/event');
    }

    function gagal()
    {
        $this->session->set_flashdata('errors', validation_errors());
    }


    //SUB EVENT
    public function subevent()
    {
        if ($this->session->userdata('IdUser') == NULL || $this->session->userdata('role') != 'Admin') {
            redirect('auth/login');
        } else {
            $data["event"] = $this->allmodel->getEventByAdmin();
            $data["subevent"] = $this->allmodel->getEventTanggal();
            $this->template->load('masterpage/templateA', 'event/subevent', $data);
            $this->session->set_flashdata('successHapus', '');
            $this->session->set_flashdata('errrorHapus', '');
            $this->session->set_flashdata('successs', '');
            $this->session->set_flashdata('errors', '');
            $this->session->set_flashdata('successTgl', '');
            $this->session->set_flashdata('errorTgl', '');
            $this->session->set_flashdata('successHapussub', '');
            $this->session->set_flashdata('errorHapussub', '');
        }
    }

    public function editTanggalEvents()
    {
        $result = $this->allmodel->editTanggalEvent();
        if ($result > 0) $this->suksessub();
        else $this->gagalsub();
    }

    public function tambahsub()
    {
        $event = $this->allmodel;
        $result = $event->saveTanggal();
        if ($result > 0) $this->suksessub();
        else $this->gagalsub();
    }

    function suksessub()
    {
        $this->session->set_flashdata('successTgl', 'Data berhasil disimpan.');
        redirect(site_url('event/subevent'));
    }

    function gagalsub()
    {
        $this->session->set_flashdata('errorTgl', validation_errors());
    }

    public function delete($id)
    {
        $result = $this->allmodel->delete($id);
        if ($result > 0)  $this->sukseshapussub();
        else $this->gagalhapussub();
    }

    function sukseshapussub()
    {
        $this->session->set_flashdata('successHapussub', 'Data berhasil dihapus.');
        redirect(site_url('event/subevent'));
    }

    function gagalhapussub()
    {
        $this->session->set_flashdata('errorHapussub', validation_errors());
    }
}
