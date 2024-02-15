<?php

class Ukm extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ukm_model');
    }

    public function index()
    {
        $data['ukmm'] = $this->Ukm_model->get_published();

        if (count($data['ukmm']) > 0) {
            $this->load->view('ukmm/list_ukm.php', $data);
        } else {
            $this->load->view('ukmm/empty_ukm.php');
        }
    }

    public function show()
    {
        $data['anggota'] = $this->Ukm_model->get_specific_data();

        if (!$data['anggota']) {
            show_404();
        }

        $this->load->view('ukmm/show_ukm.php', $data);
    }
}
