<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{
	public function cekLogin($data)
	{
		return $this->db->get_where('tb_user', $data);
	}
	public function getDataProfile($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('tb_user')->row();
	}
	public function updatePassword($pass, $id)
	{
		$this->db->set('password', $pass);
		$this->db->where('id_user', $id);
		$this->db->update('tb_user');
	}
	public function updateProfile($data, $id)
	{
		$this->db->where('id_user', $id);
		$this->db->update('tb_user', $data);
	}

	// Admin
	public function getDataAdmin($limit, $start)
	{
		return $this->db->get('tb_user', $limit, $start)->result_array();
	}
	public function tambahAdmin($data = null)
	{
		$this->db->insert('tb_user', $data);
	}
	public function getDataUbahAdmin($id)
	{
		$data = array(
			'id_user' => $id
		);
		return $this->db->get_where('tb_user', $data);
	}
	public function updateAdmin($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_user', $data);
	}
	public function hapusAdmin($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('tb_user');
	}

	// Member
	public function getDataMember($limit, $start)
	{
		return $this->db->get('tb_member', $limit, $start)->result_array();
	}
	public function countAllMember()
	{
		return $this->db->get('tb_member')->num_rows();
	}
	public function countAllAdmin()
	{
		return $this->db->get('tb_user')->num_rows();
	}
	public function countAllOrders()
	{
		return $this->db->get('tb_transaksi')->num_rows();
	}
	public function countAllPaket()
	{
		return $this->db->get('tb_paket')->num_rows();
	}
	public function sumTotal()
	{
		$this->db->select('SUM(subtotal) AS TOTAL');
		$this->db->from('tb_detail_transaksi');
		return $this->db->get();
	}
	public function sumDayTotal()
	{
		$date = date('Y-m-d');
		$this->db->select('SUM(tb_detail_transaksi.subtotal) AS TOTAL');
		$this->db->from('tb_transaksi');
		$this->db->where('tb_transaksi.tgl = ', $date);
		$this->db->join('tb_detail_transaksi', 'tb_transaksi.kode_invoice = tb_detail_transaksi.kode_invoice');
		return $this->db->get();
	}
	public function tambahMem($data = null)
	{
		$this->db->insert('tb_member', $data);
	}
	public function getDataUbah($id)
	{
		$data = array(
			'id_member' => $id
		);
		return $this->db->get_where('tb_member', $data);
	}
	public function updateMember($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_member', $data);
	}
	public function hapusMember($id)
	{
		$this->db->where('id_member', $id);
		return $this->db->delete('tb_member');
	}

	// Paket
	public function getDataPaket($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama_paket', $keyword);
		}
		return $this->db->get('tb_paket', $limit, $start)->result_array();
	}
	public function tambahPaket($data = null)
	{
		$this->db->insert('tb_paket', $data);
	}
	public function getDataUbahPaket($id)
	{
		$data = array(
			'id_paket' => $id
		);
		return $this->db->get_where('tb_paket', $data);
	}
	public function updatePaket($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_paket', $data);
	}
	public function hapusPaket($id)
	{
		$this->db->where('id_paket', $id);
		return $this->db->delete('tb_paket');
	}

	// Transaksi
	public function getDataTransaksi($limit, $start)
	{
		$this->db->order_by('tgl', 'desc');
		$this->db->select('tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_member.nama AS NAMA_MEMBER, tb_transaksi.status, tb_transaksi.pengiriman, tb_transaksi.dibayar, tb_transaksi.bukti, tb_transaksi.verifikasi_pembayaran');
		$this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
		return $this->db->get('tb_transaksi', $limit, $start)->result_array();
	}
	public function getDataDetailTransaksi($id)
	{
		$data = array(
			'tb_transaksi.kode_invoice' => $id
		);
		$this->db->select('tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_transaksi.status, tb_transaksi.dibayar, tb_transaksi.pengiriman, tb_transaksi.komentar, tb_member.nama AS NAMA_MEMBER, tb_member.alamat AS ALAMAT, tb_member.telp AS TELP, tb_detail_transaksi.*, SUM(tb_detail_transaksi.subtotal) AS TOTAL');
		$this->db->from('tb_transaksi');
		$this->db->where($data);
		$this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
		$this->db->join('tb_detail_transaksi', 'tb_transaksi.kode_invoice = tb_detail_transaksi.kode_invoice');

		// Add the GROUP BY clause to include all non-aggregated columns
		$this->db->group_by('tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_transaksi.status, tb_transaksi.dibayar, tb_transaksi.pengiriman, tb_transaksi.komentar, tb_member.nama, tb_member.alamat, tb_member.telp, tb_detail_transaksi.kode_invoice, tb_detail_transaksi.id_paket, tb_detail_transaksi.qty, tb_detail_transaksi.subtotal');

		return $this->db->get();
	}

	public function getDataDetails($id)
	{
		$data = array(
			'tb_transaksi.kode_invoice' => $id
		);
		$this->db->select('tb_transaksi.kode_invoice, tb_detail_transaksi.*, tb_paket.*');
		$this->db->from('tb_transaksi');
		$this->db->where($data);
		$this->db->join('tb_detail_transaksi', 'tb_transaksi.kode_invoice = tb_detail_transaksi.kode_invoice');
		$this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket');
		return $this->db->get();
	}
	public function updateStat($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_transaksi', $data);
	}
	public function updateByr($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_transaksi', $data);
	}
	public function updateVerifikasi($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_transaksi', $data);
	}

	// Laporan
	public function getLaporan($limit, $start)
	{
		$this->db->order_by('tgl', 'desc');
		$this->db->select('tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_member.nama AS NAMA_MEMBER, tb_transaksi.status, tb_transaksi.pengiriman, tb_transaksi.dibayar, tb_transaksi.bukti, tb_transaksi.verifikasi_pembayaran');
		$this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
		return $this->db->get('tb_transaksi', $limit, $start)->result_array();
	}
	public function getLaporanExport()
	{
		$this->db->order_by('tgl', 'desc');
		$this->db->select('tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_member.nama AS NAMA_MEMBER, tb_transaksi.status, tb_transaksi.pengiriman, tb_transaksi.dibayar, tb_transaksi.bukti, tb_transaksi.verifikasi_pembayaran');
		$this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
		return $this->db->get('tb_transaksi')->result_array();
	}
}
