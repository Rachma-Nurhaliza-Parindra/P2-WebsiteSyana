<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$this->load->model('Ukm_model');
		$this->load->model('feedback_model');
		$this->load->model('Kas_model');
		$this->load->model('Dokumentasi_model');
		
		$data = [
			"ukm_count" => $this->Ukm_model->count(),
			"feedback_count" => $this->feedback_model->count(),
			"kas_count" => $this->Kas_model->count(),
			"Dokumnetasi_count" => $this->Kas_model->count()
		];

		$this->load->view('admin/dashboard.php', $data);

	}
}