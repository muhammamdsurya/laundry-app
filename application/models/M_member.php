<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_member extends CI_Model
{
    public function SimpanData($data = null)
    {
        $this->db->insert('tb_member', $data);
    }
    public function cekLogin($data)
    {
        return $this->db->get_where('tb_member', $data);
    }
    public function getDatalayanan()
    {
        return $this->db->get('tb_paket');
    }
    public function getData()
    {
        return $this->db->get('tb_transaksi');
    }
    public function find($id)
    {
        $result = $this->db->where('id_paket', $id)->limit(1)->get('tb_paket');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function pembayaran()
    {
        $data = array(
            'kode_invoice' => $this->input->post('invoice', true),
            'id_member' => $this->session->userdata('id'),
            'tgl' => $this->input->post('tgl', true),
            'status' => 'baru',
            'pengiriman' => $this->input->post('pengiriman', true),
            'dibayar' => 'belum_dibayar',
            'komentar' => $this->input->post('komentar', true),
        );
        $this->db->insert('tb_transaksi', $data);
        $id_invoice = $this->input->post('invoice', true);
        foreach ($this->cart->contents() as $items) {
            $dataDetails = array(
                'kode_invoice' => $id_invoice,
                'id_paket' => $items['id'],
                'qty' => $items['qty'],
                'subtotal' => $items['subtotal']
            );
            $this->db->insert('tb_detail_transaksi', $dataDetails);
        }
        return TRUE;
    }
    public function tampilDataInvoice()
    {
        $result = $this->db->get('tb_transaksi');
        if ($result->num_rows() > 0) {
            return $result->result;
        } else {
            return FALSE;
        }
    }
    public function bukti($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tb_transaksi', $data);
    }
    public function countAllPesanan($id)
    {
        $this->db->where('id_member', $id);
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function getDataPesanan($limit, $start, $id)
    {
        $this->db->where('id_member', $id);
        return $this->db->get('tb_transaksi', $limit, $start)->result_array();
    }
	public function getDataDetails($id)
	{
		$data = array(
			'tb_transaksi.kode_invoice' => $id
		);
		$this->db->select('tb_transaksi.kode_invoice, tb_transaksi.pengiriman, tb_detail_transaksi.*, tb_paket.*, tb_paket.harga AS HARGA, SUM(tb_detail_transaksi.subtotal) AS TOTAL');
		$this->db->from('tb_transaksi');
		$this->db->where($data);
		$this->db->join('tb_detail_transaksi', 'tb_transaksi.kode_invoice = tb_detail_transaksi.kode_invoice');
		$this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket');
		$this->db->group_by('tb_transaksi.kode_invoice, tb_transaksi.pengiriman, tb_detail_transaksi.qty, tb_detail_transaksi.subtotal, tb_paket.id_paket'); // Add columns to group by
		return $this->db->get();
	}
	
    public function getDataPembayaran($id)
    {
        $data = array(
            'tb_transaksi.kode_invoice' => $id
        );
        $this->db->select('tb_transaksi.kode_invoice, tb_transaksi.pengiriman, SUM(tb_detail_transaksi.subtotal) AS TOTAL');
        $this->db->from('tb_transaksi');
        $this->db->where($data);
        $this->db->join('tb_detail_transaksi', 'tb_transaksi.kode_invoice = tb_detail_transaksi.kode_invoice');
        return $this->db->get();
    }
    public function getDataProfile($id)
    {
        $this->db->where('id_member', $id);
        return $this->db->get('tb_member')->row();
    }
    public function updatePassword($pass, $id){
        $this->db->set('password', $pass);
        $this->db->where('id_member', $id);
        $this->db->update('tb_member');
    }
    public function updateProfile($data, $id){
        $this->db->where('id_member', $id);
        $this->db->update('tb_member', $data);
    }
}
