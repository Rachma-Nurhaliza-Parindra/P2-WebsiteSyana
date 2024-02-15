<?php

class Dokumen extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dokumentasi_model');
    }

    public function index()
    {
        $data['dokumenn'] = $this->Dokumentasi_model->get();

        if (count($data['dokumenn']) > 0) {
            $this->load->view('dokumenn/list_dokumentasi.php', $data);
        } else {
            $this->load->view('ukmm/empty_dokumentasi.php');
        }
    }

    public function show()
    {
        $data['dokumentasi'] = $this->Dokumentasi_model->get_specific_data();

        if (!$data['dokumentasi']) {
            show_404();
        }

        $this->load->view('ukmm/show_dokumentasi.php', $data);
    }
}
