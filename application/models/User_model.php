<?php

class User_model extends CI_Model
{
    private $_table = 'user';

	public function get()
	{
		$this->db->select('user.id_user, user.name, user.email, user.username, user.password, user.last_login, user.id_dokumentasi, dokumentasi.nama_kegiatan as dokumentasi_nama_kegiatan');
		$this->db->from('user');
		$this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = user.id_dokumentasi', 'inner');
		
		$query = $this->db->get();
		return $query->result();
	}

	public function getDokumentasiList()
    {
        $this->db->select('id_dokumentasi, nama_kegiatan');
        $query = $this->db->get('dokumentasi'); 

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

	public function find($id_user)
	{
		if (!$id_user) {
            return;
        }

        $this->db->select('user.id_user, user.name, user.email, user.username, user.password, user.last_login, dokumentasi.id_dokumentasi, dokumentasi.nama_kegiatan, dokumentasi.tanggal, dokumentasi.gambar, dokumentasi.content');
        $this->db->from($this->_table);
        $this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = user.id_dokumentasi', 'inner');
        $this->db->where('user.id_user', $id_user);

        $query = $this->db->get();
        return $query->row();
	}

	public function search($keyword)
	{
		if (!$keyword) {
            return null;
        }

        $this->db->select('user.id_user, user.name, user.email, user.username, user.password, user.last_login, dokumentasi.id_dokumentasi, dokumentasi.nama_kegiatan, dokumentasi.tanggal, dokumentasi.gambar, dokumentasi.content');
        $this->db->from($this->_table);
        $this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = user.id_dokumentasi', 'inner');
        $this->db->like('user.name', $keyword);
        $this->db->or_like('user.email', $keyword);
        $this->db->or_like('user.username', $keyword);
        $this->db->or_like('user.password', $keyword);
        $this->db->or_like('user.last_login', $keyword);

        $query = $this->db->get();
        return $query->result();
	}

	public function insert($user)
	{
		return $this->db->insert($this->_table, $user);
	}


	public function update($user)
	{
		if (!isset($user['id_user'])) {
			return;
		}

		return $this->db->update($this->_table, $user, ['id_user' => $user['id_user']]);
	}

	public function delete($id_user)
	{
		if (!$id_user) {
			return;
		}

		return $this->db->delete($this->_table, ['id_user' => $id_user]);
	}

	public function count(){
		return $this->db->count_all($this->_table);
	}

	public function rules()
{
    return [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[32]' // Sesuaikan dengan tipe data varchar(32) pada kolom name
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[64]' // Sesuaikan dengan tipe data varchar(64) pada kolom email
        ],
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|max_length[64]' // Sesuaikan dengan tipe data varchar(64) pada kolom username
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|max_length[255]' // Sesuaikan dengan tipe data varchar(255) pada kolom password
        ],
        [
            'field' => 'last_login',
            'label' => 'Last Login',
            'rules' => '' // Tidak perlu validasi untuk last_login jika nilainya diset secara otomatis (seperti timestamp)
        ],
        [
            'field' => 'id_dokumentasi',
            'label' => 'Id Dokumentasi',
            'rules' => 'required|integer'
        ],
    ];
    }

    public function update_last_login($id_user)
    {
        $this->db->set('last_login', 'NOW()', false);
        $this->db->where('id_user', $id_user);
        $this->db->update($this->_table);
        return $this->db->affected_rows() > 0;
    }

    public function validate_user($username_email, $password)
    {
        $this->db->where("(username = '$username_email' OR email = '$username_email')");
        $this->db->where('password', $password);
        $query = $this->db->get($this->_table);
        return $query->row();
    }

    public function count_last_login($id_user)
    {
        $this->db->select('last_login');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get($this->_table);
        return $query->row()->last_login;
    }

    public function update_password($id_user, $new_password)
    {
        $this->db->set('password', $new_password);
        $this->db->where('id_user', $id_user);
        $this->db->update($this->_table);
        return $this->db->affected_rows() > 0;
    }
}