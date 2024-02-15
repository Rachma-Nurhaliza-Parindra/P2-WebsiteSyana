<?php

class Kas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kas_model');
		$this->load->model('Auth_model');
		$this->load->model('Dokumentasi_model');
		if (!$this->Auth_model->current_user()) {
			redirect('auth/login');
		}
		$this->load->model('Kas_model');
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		$data['current_user'] = $this->Auth_model->current_user();
		$data['ukmm'] = $this->Kas_model->get();
		$data['keyword'] = $this->input->get('keyword');

		if (!empty($data['keyword'])) {
			$data['ukmm'] = $this->Kas_model->search($data['keyword']);
		}

		if (empty($data['ukmm']) && empty($data['keyword'])) {
			$this->load->view('admin/kas_empty.php', $data);
		} else {
			$this->load->view('admin/kas_list.php', $data);
		}
	}

	public function new()
	{
		$data = [
			'dokumentasi' => $this->Kas_model->get_kegiatan(),
		];

		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('id_dokumentasi', 'Pilih Dokumentasi', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Kas', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/kas_new_form', $data);
		} else {
			$kas = [
				'id_dokumentasi' => $this->input->post('id_dokumentasi'),
				'status' => $this->input->post('status'),
				'tanggal' => $this->input->post('tanggal'),
				'deskripsi' => $this->input->post('deskripsi'),
				'jumlah' => $this->input->post('jumlah')
			];
			$saved = $this->Kas_model->insert($kas);

			if ($saved) {
				$this->session->set_flashdata('message', 'Data was created');
				return redirect('admin/kas');
			}
		}
	}

	public function edit($id_kas = null)
	{
		$data = [
			'kas' => $this->Kas_model->find($id_kas),
			'dokumentasi' => $this->Kas_model->get_kegiatan()
		];
		if (!$data['kas'] || !$id_kas) {
			show_404();
		}

		//Rules
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('id_dokumentasi', 'List Dokumentasi', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Uang', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/kas_edit_form', $data);
		} else {
			$kas = [
				'id_kas' => $id_kas,
				'id_dokumentasi' => $this->input->post('id_dokumentasi'),
				'status' => $this->input->post('status'),
				'tanggal' => $this->input->post('tanggal'),
				'deskripsi' => $this->input->post('deskripsi'),
				'jumlah' => $this->input->post('jumlah')
			];

			$updated = $this->Kas_model->update($kas);

			if ($updated) {
				$this->session->set_flashdata('message', 'Data berhasil diperbarui');
				redirect('admin/kas');
			}
		}
	}

	public function delete($id_kas = null)
	{
		if (!$id_kas) {
			show_404();
		}

		$deleted = $this->Kas_model->delete($id_kas);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Data was deleted');
			redirect('admin/kas');
		}
	}

	public function getTotalUang()
	{
		$total_uang = $this->Kas_model->get_total_uang();
		return $total_uang;
	}

	public function showTotalUang()
	{
		$total_uang = $this->getTotalUang();
		echo "Total Uang: " . $total_uang;
	}
}
