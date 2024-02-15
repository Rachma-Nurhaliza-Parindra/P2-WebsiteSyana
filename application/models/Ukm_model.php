<?php

class Ukm_model extends CI_Model
{
	private $_table = 'anggota';

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

	public function find($id_anggota)
	{
		if (!$id_anggota) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('id_anggota' => $id_anggota));
		return $query->row();
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->like('title', $keyword);
		$this->db->or_like('divisi', $keyword);
		$this->db->or_like('jabatan', $keyword);
		$this->db->or_like('prodi', $keyword);
		$this->db->or_like('no_hp', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function insert($anggota)
	{
		return $this->db->insert($this->_table, $anggota);
	}

	public function update($anggota)
	{
		if (!isset($anggota['id_anggota'])) {
			return;
		}

		return $this->db->update($this->_table, $anggota, ['id_anggota' => $anggota['id_anggota']]);
	}

	public function delete($id_anggota)
	{
		if (!$id_anggota) {
			return;
		}

		return $this->db->delete($this->_table, ['id_anggota' => $id_anggota]);
	}

	public function count()
	{
		return $this->db->count_all($this->_table);
	}

	public function rules()
	{
		return [
			[
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required|max_length[255]'
			],
			[
				'field' => 'divisi',
				'label' => 'Divisi',
				'rules' => 'required|max_length[50]'
			],
			[
				'field' => 'jabatan',
				'label' => 'Jabatan',
				'rules' => 'required|max_length[50]' 
			],
			[
				'field' => 'no_hp',
				'label' => 'No Hp',
				'rules' => 'required|max_length[20]' 
			],
		];
	}
}
