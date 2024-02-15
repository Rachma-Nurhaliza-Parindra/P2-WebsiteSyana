<?php

class Kas_model extends CI_Model
{
	private $_table = 'kas';

	public function get()
	{
		$this->db->select('kas.*, dokumentasi.nama_kegiatan');
		$this->db->from('kas');
		$this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = kas.id_dokumentasi', 'left');
		$query = $this->db->get();
		return $query->result();

		// $query = $this->db->get($this->_table);
		// return $query->result();

		// $this->db->select('kas.id_kas, kas.status, kas.jumlah, kas.tanggal, kas.deskripsi, kas.total_uang, dokumentasi.nama_kegiatan');
		// $this->db->from('kas');
		// $this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = kas.id_dokumentasi', 'left');
		// $query = $this->db->get();
		// return $query->result();
	}

	public function get_kegiatan()
	{
		// $query = $this->db->get('dokumentasi');
		// $this->db->select('id_dokumentasi, nama_kegiatan');
		// $query = $this->db->get('dokumentasi');
		return $this->db->get('dokumentasi')->result_array();
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

	public function find($id_kas)
	{

		// if (!$id_kas) {
		// 	return;
		// }

		// $query = $this->db->get_where($this->_table, array('id_kas' => $id_kas));
		// return $query->row();

		// if (!$id_kas) {
		//     return;
		// }

		// $this->db->select('kas.*, dokumentasi.nama_kegiatan');
		// $this->db->from($this->_table . ' kas');
		// $this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = kas.id_dokumentasi', 'inner');
		// $this->db->where('kas.id_kas', $id_kas);
		// $query = $this->db->get();
		// return $query->row();

		// $query = $this->db->get_where($this->_table, array('id_kas' => $id_kas));
		// return $query->row();

		if (!$id_kas) {
			return null;
		}

		$this->db->select('*');
		$this->db->from('kas');
		$this->db->where('id_kas', $id_kas);

		$query = $this->db->get();
		return $query->row();
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->like('status', $keyword);
		$this->db->or_like('jumlah', $keyword);
		$this->db->or_like('tanggal', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		$this->db->or_like('total_uang', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
		// if (!$keyword) {
		//     return null;
		// }

		// if (!$keyword) {
		//     return null;
		// }

		// $this->db->select('kas.id_kas, kas.status, kas.jumlah, kas.tanggal, kas.deskripsi, kas.total_uang, dokumentasi.id_dokumentasi, dokumentasi.nama_kegiatan, dokumentasi.tanggal, dokumentasi.content');
		// $this->db->from('kas');
		// $this->db->join('dokumentasi', 'dokumentasi.id_dokumentasi = kas.id_dokumentasi', 'inner');
		// $this->db->group_start();
		// $this->db->like('kas.status', $keyword);
		// $this->db->or_like('kas.jumlah', $keyword);
		// $this->db->or_like('kas.tanggal', $keyword);
		// $this->db->or_like('kas.deskripsi', $keyword);
		// $this->db->group_end();

		// $query = $this->db->get();
		// return $query->result();
	}

	public function insert($kas)
	{
		return $this->db->insert($this->_table, $kas);
	}

	public function update($kas)
	{
		if (!isset($kas['id_kas'])) {
			return;
		}

		return $this->db->update($this->_table, $kas, ['id_kas' => $kas['id_kas']]);
	}

	public function delete($id_kas)
	{
		if (!$id_kas) {
			return;
		}

		return $this->db->delete($this->_table, ['id_kas' => $id_kas]);
	}

	public function count()
	{
		return $this->db->count_all($this->_table);
	}

	public function rules()
	{
		return [
			[
				'field' => 'status',
				'label' => 'Status',
				'rules' => 'required|in_list[masuk,keluar]'
			],
			[
				'field' => 'tanggal',
				'label' => 'Tanggal',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah',
				'label' => 'Jumlah',
				'rules' => 'required'
			],
			[
				'field' => 'id_dokumentasi',
				'label' => 'Id Dokumentasi',
				'rules' => 'required'
			],
			[
				'field' => 'nama_kegiatan',
				'label' => 'Nama Kegiatan',
				'rules' => 'required'
			],
		];
	}

	public function get_total_uang()
	{
		$query = $this->db
			->select('SUM(CASE WHEN status = "masuk" THEN jumlah ELSE 0 END) - SUM(CASE WHEN status = "keluar" THEN jumlah ELSE 0 END) AS total', false)
			->from($this->_table)
			->get();

		return $query->row()->total;
	}
}
