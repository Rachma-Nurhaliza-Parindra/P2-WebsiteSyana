<?php

class User extends CI_Controller
{

    public function __construct()
	{
        parent::__construct();
		$this->load->model('User_model');
		$this->load->model('auth_model');
		if (!$this->auth_model->current_user()) {
			redirect('auth/login');
		}
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
        $data['ukmm'] = $this->User_model->get();
        $data['keyword'] = $this->input->get('keyword');
        if (!empty($data['keyword'])) {
            $data['ukmm'] = $this->User_model->search($data['keyword']);
        }
        if (empty($data['ukmm']) && !$data['keyword']) {
            $this->load->view('admin/User_empty.php', $data);
        } else {
            $this->load->view('admin/User_list.php', $data);
        }
	}

	public function new()
	{
		$this->load->library('form_validation');
		$data['list_id_dokumentasi'] = $this->User_model->getDokumentasiList();

		if ($this->input->method() === 'post') {
			$rules = $this->User_model->rules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE) {
				return $this->load->view('admin/user_new_form.php');
			}

			$user = [
				'id_dokumentasi' => $this->input->post('id_dokumentasi'), 
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'last_login' => $this->input->post('last_login')
			];

			$saved = $this->User_model->insert($user);

			if ($saved) {
				$this->session->set_flashdata('message', 'Data was created');
				return redirect('admin/user');
			}
		}

		$this->load->view('admin/user_new_form.php');
	}

	public function edit($id_user = null)
	{
		$data['user'] = $this->User_model->find($id_user);
		$data['list_id_dokumentasi'] = $this->User_model->getDokumentasiList();

		$this->load->library('form_validation');
		if (!$data['user'] || !$id_user) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// Validation rules
			$rules = [
				[
					'field' => 'username_email',
					'label' => 'Username or Email',
					'rules' => 'required'
				],
				[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				]
			];
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE) {
				return $this->load->view('admin/post_edit_form.php', $data);
			}

			$username_email = $this->input->post('username_email');
			$password = $this->input->post('password');

			// Validasi username/email dan password
			$validated_user = $this->User_model->validate_user($username_email, $password);
			if ($validated_user && $validated_user->id_user == $id_user) {
				// Data valid, lanjutkan proses update
				$user = [
					'id_dokumentasi' => $this->input->post('id_dokumentasi'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'last_login' => $this->input->post('last_login')
				];

				$updated = $this->User_model->update($user);
				if ($updated) {
					$this->session->set_flashdata('message', 'Data was updated');
					redirect('admin/user');
				}
			} else {
				// Data tidak valid, kembalikan ke form edit
				$this->session->set_flashdata('error', 'Invalid username/email or password');
				redirect("admin/user/edit/{$id_user}");
			}
		}

		$this->load->view('admin/user_edit_form.php', $data);
	}

	public function delete($id_user = null)
	{
		if (!$id_user) {
			show_404();
		}

		$deleted = $this->User_model->delete($id_user);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Data was deleted');
			redirect('admin/user');
		}
	}
}