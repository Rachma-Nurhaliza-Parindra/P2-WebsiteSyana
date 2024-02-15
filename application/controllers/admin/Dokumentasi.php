<?php

class Dokumentasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumentasi_model');
		$this->load->model('auth_model');
		if (!$this->auth_model->current_user()) {
			redirect('auth/login');
		}
		$this->load->model('Dokumentasi_model');
		$this->load->library(['form_validation']);
		$this->load->helper(['form']);
	}
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['ukmm'] = $this->Dokumentasi_model->get();
		$data['keyword'] = $this->input->get('keyword');
		if (!empty($this->input->get('keyword'))) {
			$data['ukmm'] = $this->Dokumentasi_model->search($data['keyword']);
		}
		if (count($data['ukmm']) <= 0 && !$this->input->get('keyword')) {
			$this->load->view('admin/dokumentasi_empty.php', $data);
		} else {
			$this->load->view('admin/dokumentasi_list.php', $data);
		}
	}

	public function new()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');
		$this->form_validation->set_rules('content', 'Deskripsi Kegiatan', 'required');
		// $this->form_validation->set_rules('gambar', 'Gambar Dokumentasi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/dokumentasi_new');
		} else {
			$config['upload_path']   = FCPATH . 'uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']      = 4096; // Ukuran dalam KB

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$data = [
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'tanggal' => $this->input->post('tanggal'),
					'gambar' => $upload_data['file_name'],
					'content' => $this->input->post('content')
				];
				$saved = $this->db->insert('dokumentasi', $data);

				if ($saved) {
					$this->session->set_flashdata('message', 'Data was created');
					return redirect('admin/dokumentasi');
				}
			}
		}
	}
	public function edit($id_dokumentasi = null)
	{
		$data['dokumentasi'] = $this->Dokumentasi_model->find($id_dokumentasi);
		// var_dump($data['dokumentasi']->gambar);
		// die();
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'required');
		$this->form_validation->set_rules('content', 'Deskripsi Kegiatan', 'required');


		if (!$data['dokumentasi'] || !$id_dokumentasi) {
			show_404();
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/dokumentasi_edit', $data);
		} else {
			$config['upload_path']   = FCPATH . 'uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']      = 4096; // Ukuran dalam KB

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$updateData = [
					'id_dokumentasi' => $id_dokumentasi,
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'tanggal' => $this->input->post('tanggal'),
					'gambar' => $upload_data['file_name'],
					'content' => $this->input->post('content')
				];
				$current_img_path = FCPATH . 'uploads/' . $data['dokumentasi']->gambar;
				if (file_exists($current_img_path)) {
					unlink($current_img_path);
				}
			} else {
				$updateData = [
					'id_dokumentasi' => $id_dokumentasi,
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'tanggal' => $this->input->post('tanggal'),
					'content' => $this->input->post('content')
				];
			}
			// TODO: Lakukan validasi sebelum menyimpan ke model
			$updated = $this->Dokumentasi_model->update($updateData);
			if ($updated) {
				$this->session->set_flashdata('message', 'Data was updated');
				redirect('admin/dokumentasi');
			}
		}
	}
	public function delete($id_dokumentasi = null)
	{
		if (!$id_dokumentasi) {
			show_404();
		}

		$temporary = $this->Dokumentasi_model->find($id_dokumentasi);

		$image_path = FCPATH . 'uploads/' . $temporary->gambar;
		// Hapus gambar ketika data dihapus
		if (file_exists($image_path)) {
			unlink($image_path);
		}

		$deleted = $this->Dokumentasi_model->delete($id_dokumentasi);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Data was deleted');
			redirect('admin/dokumentasi');
		}
	}
}
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Dokumentasi extends CI_Controller {

//     public function __construct() {
//         parent::__construct();
//         $this->load->model('Dokumentasi_model');
//         $this->load->library('upload');
//         $this->load->model('auth_model');
//         if (!$this->auth_model->current_user()) {
//             redirect('auth/login');
//         }
//     }

//     public function index() {
//         $data['dokumenn'] = $this->Dokumentasi_model->get();
//         if (count($data['dokumenn']) <= 0) {
//             $this->load->view('admin/dokumentasi_empty.php');
//         } else {
//             foreach ($data['dokumenn'] as &$dokumen) {
//                 // $dokumen->gambar = $this->Dokumentasi_model->get_image($dokumen->id_dokumentasi);
//             }
//             $this->load->view('admin/dokumentasi_list.php', $data);
//         }
//     }
    
//     public function new() { // Mengganti nama method agar tidak bertabrakan dengan keyword 'new'
//         $this->load->library('form_validation');
//         $this->load->model('Dokumentasi_model');
//         $data = array();
    
//         if ($this->input->method() === 'post') {
//             $rules = $this->Dokumentasi_model->rules();
//             $this->form_validation->set_rules($rules);
    
//             if ($this->form_validation->run() === FALSE) {
//                 return $this->load->view('admin/dokumentasi_new.php');
//             }

//             $dokumentasi = array(
//                 'nama_kegiatan' => $this->input->post('nama_kegiatan'),
//                 'gambar' => $_FILES['gambar'],
//                 'tanggal' => $this->input->post('tanggal'),
//                 'content' => $this->input->post('deskripsi')
//             );
//             $id_dokumentasi = $this->Dokumentasi_model->insert_with_image();
//             // $id_dokumentasi = $this->Dokumentasi_model->insert_with_image($gambar_data);

//             if ($id_dokumentasi) {
//                 $this->session->set_flashdata('success', 'Data berhasil diunggah dan disimpan dengan ID: ' . $id_dokumentasi);
//                 redirect('admin/dokumentasi');
//             } else {
//                 $this->session->set_flashdata('error', 'Gagal menyimpan data ke database');
//                 redirect('admin/dokumentasi/new'); // Redirect kembali ke halaman entry dengan pesan error
//             }
//         }
    
//         $this->load->view('admin/dokumentasi_new.php', $data);
//     }
    
//     public function edit($id_dokumentasi = null) {
//         $data['dokumentasi'] = $this->Dokumentasi_model->find($id_dokumentasi);
//         $this->load->library('form_validation');
    
//         if (!$data['dokumentasi'] || !$id_dokumentasi) {
//             show_404();
//         }
    
//         if ($this->input->method() === 'post') {
//             $rules = $this->Dokumentasi_model->rules();
//             $this->form_validation->set_rules($rules);
    
//             if ($this->form_validation->run() === FALSE) {
//                 return $this->load->view('admin/dokumentasi_edit.php', $data);
//             }
    
//             // Konfigurasi upload gambar
//             $config['upload_path'] = FCPATH . '/uploads/';
//             $config['allowed_types'] = 'gif|jpg|jpeg|png';
//             $config['max_size'] = 5120; 
//             $config['file_name'] = 'dokumentasi' . $id_dokumentasi; 
    
//             $this->load->library('upload', $config);
    
//             if (!$this->upload->do_upload('gambar')) {
//                 $error = $this->upload->display_errors('', '');
//                 $this->session->set_flashdata('error', $error);
//                 redirect('admin/dokumentasi/edit/' . $id_dokumentasi); 
//             } else {
//                 $upload_data = $this->upload->data();
    
//                 $dokumentasi = array(
//                     'gambar' => $upload_data['file'],
//                     'nama_kegiatan' => $this->input->post('nama_kegiatan'),
//                     'tanggal' => $this->input->post('tanggal'),
//                     'content' => $this->input->post('deskripsi'),
//                 );
    
//                 $updated = $this->Dokumentasi_model->update($id_dokumentasi, $gambar_data);
    
//                 if ($updated) {
//                     $this->session->set_flashdata('success', 'Data berhasil diunggah dan diperbarui dengan ID: ' . $id_dokumentasi);
//                     redirect('admin/dokumentasi');
//                 } else {
//                     $this->session->set_flashdata('error', 'Gagal memperbarui data di database');
//                     redirect('admin/dokumentasi/edit/' . $id_dokumentasi); 
//                 }
//             }
//         }
    
//         $this->load->view('admin/dokumentasi_edit.php', $data);
//     }
    

//     public function delete($id_dokumentasi = null) {
//         if (!$id_dokumentasi) {
//             show_404();
//         }

//         $deleted = $this->Dokumentasi_model->delete($id_dokumentasi);
//         if ($deleted) {
//             $this->session->set_flashdata('message', 'Data berhasil dihapus');
//             redirect('admin/dokumentasi');
//         }
//     }
// }
