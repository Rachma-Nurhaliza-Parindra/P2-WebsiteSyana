<?php

class Post extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ukm_model');
		$this->load->model('auth_model');
		if (!$this->auth_model->current_user()) {
			redirect('auth/login');
		}
		$this->load->model('Ukm_model');
		$this->load->library(['form_validation']);
	}
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['ukmm'] = $this->Ukm_model->get();
		$data['keyword'] = $this->input->get('keyword');
		if (!empty($this->input->get('keyword'))) {
			$data['ukmm'] = $this->Ukm_model->search($data['keyword']);
		}
		if (count($data['ukmm']) <= 0 && !$this->input->get('keyword')) {
			$this->load->view('admin/post_empty.php', $data);
		} else {
			$this->load->view('admin/post_list.php', $data);
		}
	}

	public function new()
	{
		$this->form_validation->set_rules('title', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi Anggota', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan Anggota', 'required');
		$this->form_validation->set_rules('email', 'Email Anggota', 'required|valid_email|is_unique[anggota.email]');
		$this->form_validation->set_rules('prodi', 'Program Studi Anggota', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP Anggota', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/post_new_form');
		} else {
			$anggota = [
				'title' => $this->input->post('title'),
				'divisi' => $this->input->post('divisi'),
				'jabatan' => $this->input->post('jabatan'),
				'email' => $this->input->post('email'),
				'prodi' => $this->input->post('prodi'),
				'no_hp' => $this->input->post('no_hp'),
			];

			$saved = $this->Ukm_model->insert($anggota);

			if ($saved) {
				$this->session->set_flashdata('message', 'Data was created');
				return redirect('admin/post');
			}
		}
	}

	public function edit($id_anggota = null)
	{
		$data['anggota'] = $this->Ukm_model->find($id_anggota);

		$this->form_validation->set_rules('title', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi Anggota', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan Anggota', 'required');
		$this->form_validation->set_rules('email', 'Email Anggota', 'required|valid_email');
		$this->form_validation->set_rules('no_hp', 'Nomer Hp Anggota', 'required|numeric');

		if (!$data['anggota'] || !$id_anggota) {
			show_404();
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/post_edit_form', $data);
		} else {
			// TODO: Lakukan validasi sebelum menyimpan ke model
			$anggota = [
				'id_anggota' => $id_anggota,
				'title' => $this->input->post('title'),
				'divisi' => $this->input->post('divisi'),
				'jabatan' => $this->input->post('jabatan'),
				'email' => $this->input->post('email'),
				'prodi' => $this->input->post('prodi'),
				'no_hp' => $this->input->post('no_hp'),
			];
			$updated = $this->Ukm_model->update($anggota);
			if ($updated) {
				$this->session->set_flashdata('message', 'Data was updated');
				redirect('admin/post');
			}
		}
	}

	public function delete($id_anggota = null)
	{
		if (!$id_anggota) {
			show_404();
		}

		$deleted = $this->Ukm_model->delete($id_anggota);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Data was deleted');
			redirect('admin/post');
		}
	}
}