<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokumentasi_model');
        $this->load->library('upload');
    }

    public function upload() {
        $this->load->library('form_validation');
        $upload_path = $this->Dokumentasi_model->dokumentasi_upload_path();

        if ($this->input->method() === 'post') {
            $rules = $this->Dokumentasi_model->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === FALSE) {
                // Handle error saat validasi gagal
                $this->load->view('upload_form');
            }
        $config['upload_path'] = FCPATH . '/uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5120;
        $config['max_width'] = 10000;
        $config['max_height'] = 8000;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $gambar_data = array(
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $_FILES['userfile'], // Gunakan $_FILES untuk mengakses gambar yang diunggah
            );
    
            $id_dokumentasi = $this->Dokumentasi_model->insert_with_image($gambar_data);

                if ($id_dokumentasi) {
                    // Handle sukses upload gambar
                    $success_data = array('success' => 'Gambar berhasil diunggah dan disimpan dengan ID: ' . $id_dokumentasi);
                    $this->load->view('upload_success', $success_data);
                } else {
                    // Handle gagal menyimpan data ke database
                    $error = array('error' => 'Gagal menyimpan data ke database');
                    $this->load->view('upload_form', $error);
                }
            }
        }
    }

    public function tampil($id) {
        $gambar_data = $this->Dokumentasi_model->get_image($id);

        if ($gambar_data) {
            header('Content-Type: image/jpeg');
            header('Content-Type: image/jpg');
            header('Content-Type: image/png');
            header('Content-Type: image/gift'); // Set tipe konten sesuai tipe gambar yang disimpan
            echo $gambar_data; // Tampilkan konten gambar
        } else {
            echo 'Gambar tidak ditemukan';
        }
    }
}
