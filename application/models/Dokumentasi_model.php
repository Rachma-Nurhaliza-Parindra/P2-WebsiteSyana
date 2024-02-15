<?php

class Dokumentasi_model extends CI_Model
{
    private $_table = 'dokumentasi';

	public function get()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

    public function get_published()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_specific_data()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

	public function find($id_dokumentasi)
	{
		if (!$id_dokumentasi) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('id_dokumentasi' => $id_dokumentasi));
		return $query->row();
	}

	public function search($keyword)
	{
		if(!$keyword){
			return null;
		}
		$this->db->like('nama_kegiatan', $keyword);
		$this->db->or_like('tanggal', $keyword);
		$this->db->or_like('content', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function insert($dokumentasi)
	{
		return $this->db->insert($this->_table, $dokumentasi);
	}


	public function update($dokumentasi)
	{
		if (!isset($dokumentasi['id_dokumentasi'])) {
			return;
		}

		return $this->db->update($this->_table, $dokumentasi, ['id_dokumentasi' => $dokumentasi['id_dokumentasi']]);
	}

	public function delete($id_dokumentasi)
	{
		if (!$id_dokumentasi) {
			return;
		}

		return $this->db->delete($this->_table, ['id_dokumentasi' => $id_dokumentasi]);
	}

	public function count(){
		return $this->db->count_all($this->_table);
	}

	public function rules()
	{
    return [
        [
            'field' => 'nama_kegiatan',
            'label' => 'Nama Kegiatan',
            'rules' => 'required|max_length[255]'
        ],
        [
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required' 
        ],
        [
            'field' => 'content',
            'label' => 'Content',
            'rules' => '' 
		],
    ];
}
}


// class Dokumentasi_model extends CI_Model
// {
//     private $_table = 'dokumentasi';
//     private $upload_path = './uploads/';

//     public function get()
//     {
//         $query = $this->db->get($this->_table);
//         return $query->result();
//     }

//     public function insert($data)
//     {
//         $this->db->insert($this->_table, $data);
//         $id_dokumentasi = $this->db->insert_id();
//         return $id_dokumentasi;
//     }

//     public function update($id_dokumentasi, $data)
//     {
//         $this->db->where('id_dokumentasi', $id_dokumentasi);
//         return $this->db->update($this->_table, $data);
//     }

//     public function find($id_dokumentasi)
//     {
//         $query = $this->db->get_where($this->_table, array('id_dokumentasi' => $id_dokumentasi));
//         return $query->row();
//     }

//     public function delete($id_dokumentasi)
//     {
//         $this->db->where('id_dokumentasi', $id_dokumentasi);
//         $this->db->delete($this->_table);
//     }

//     public function count()
//     {
//         return $this->db->count_all($this->_table);
//     }

//     public function search($keyword)
//     {
//         $this->db->like('nama_kegiatan', $keyword);
//         $this->db->or_like('tanggal', $keyword);
//         $this->db->or_like('content', $keyword);
//         $query = $this->db->get($this->_table);
//         return $query->result();
//     }

//     public function validate_image($str, $file_name)
//     {
//         $config['upload_path'] = FCPATH . '/uploads/';
//         $config['allowed_types'] = 'gif|jpg|jpeg|png';
//         $config['file_name'] = $file_name;
//         $config['max_size'] = 5120;
//         $config['max_width'] = 10000;
//         $config['max_height'] = 8000;

//         $this->load->library('upload', $config);

//         if (!$this->upload->do_upload('gambar')) {
//             $error = $this->upload->display_errors('', '');
//             $this->form_validation->set_message('validate_image', $error);
//             return false;
//         } else {
//             $upload_data = $this->upload->data();
//             return true;
//         }
//     }

//     public function insert_with_image($data)
//     {
//         $this->db->insert($this->_table, $data);
//         $id_dokumentasi = $this->db->insert_id();

//         // Ambil nama file gambar dari data yang diunggah
//         $file_name = $data['gambar'];

//         // Baca file gambar dari lokasi yang diunggah
//         $image_path = FCPATH . '/uploads/' . $file_name;
//         $image_data = file_get_contents($image_path);

//         // Simpan data gambar ke dalam database sebagai medium blob
//         $this->db->set('gambar_blob', $image_data);
//         $this->db->where('id_dokumentasi', $id_dokumentasi);
//         $this->db->update($this->_table);

//         return $id_dokumentasi;
//     }

//     public function get_image($id_dokumentasi)
//     {
//     $query = $this->db->get_where($this->_table, array('id_dokumentasi' => $id_dokumentasi));
//     $result = $query->row();

//     if ($result) {
//         $image_binary = $result->gambar;
//         $image_base64 = base64_encode($image_binary);

//     // Ambil data gambar dalam bentuk blob dari database
//     $image_binary = $result->gambar;

//     // Konversi data blob ke dalam format gambar yang bisa ditampilkan di web
//     $image_base64 = base64_encode($image_binary);

//     return 'data:image/jpg;base64,' . $image_base64;
//     return 'data:image/jpeg;base64,' . $image_base64;
//     return 'data:image/png;base64,' . $image_base64;
//     return 'data:image/gift;base64,' . $image_base64; // Sesuaikan jenis gambar yang diambil dari database
//     } 
// }


//     public function rules()
//     {
//         return [
//             [
//                 'field' => 'nama_kegiatan',
//                 'label' => 'Nama Kegiatan',
//                 'rules' => 'required|max_length[255]'
//             ],
//             [
//                 'field' => 'tanggal',
//                 'label' => 'Tanggal',
//                 'rules' => 'required'
//             ],
//             [
//                 'field' => 'gambar',
//                 'label' => 'Gambar',
//                 'rules' => 'callback_validate_image['.$this->upload_path.']'
//             ],
//             [
//                 'field' => 'deskripsi',
//                 'label' => 'Deskripsi',
//                 'rules' => ''
//             ]
//         ];
//     }

//     public function get_upload_path()
//     {
//         return $this->upload_path;
//     }

//     public function dokumentasi_upload_path()
//     {
//         return $this->upload_path;
//     }
// }
