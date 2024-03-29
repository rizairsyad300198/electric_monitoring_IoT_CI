<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_config extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('config');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM config WHERE config_id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$this->db->insert('config', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kota', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$this->db->where('config_id', $data['config_id']);
        $this->db->update('config', $data);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kota WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kota');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('config');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */