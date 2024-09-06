<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	// Login
	public function keHalamanLogin()
	{
		if ($this->session->username == TRUE) {
			redirect(base_url('admin/dasboard'));
		} else {
			$this->load->view('admin/login');
		}
	}
	public function prosesLogin()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$user = $this->M_admin->cekLogin(['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id_user' => $user['id_user'],
					'username' => $user['username'],
					'nama' => $user['nama'],
					'password' => $user['password'],
				];
				$this->session->set_userdata($data);
				redirect('admin/dasboard');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Username Tidak Ditemukan !</div>');
			redirect(base_url('login'));
		}
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url('login'));
	}


	// Dashboard
	public function keHalamanDasboard()
	{
		if ($this->session->username == TRUE) {
			$data['member'] = $this->M_admin->countAllMember();
			$data['admin'] = $this->M_admin->countAllAdmin();
			$data['order'] = $this->M_admin->countAllOrders();
			$data['paket'] = $this->M_admin->countAllPaket();
			$data['total'] = $this->M_admin->sumTotal()->row();
			$data['dayTotal'] = $this->M_admin->sumDayTotal()->row();
			$data['nama'] = $this->M_admin->cekLogin(['nama' => $this->session->userdata('nama')])->row_array();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/dasboard', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function keHalamanUbahProfile()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id_user');
			$data['profile'] = $this->M_admin->getDataProfile($id);
			
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahProfile', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function ubahProfile()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|trim', [
			'required' => "Nama Lengkap Harus diisi!",
			'min_length' => 'Nama Terlalu Pendek'
		]);
		$this->form_validation->set_rules('telp', 'No Telp', 'required|min_length[3]|trim', [
			'required' => "No Telepon Harus Diisi!",
			'min_length' => 'No Telepon Terlalu Pendek'
		]);
		if ($this->form_validation->run() == false) {
			$id = $this->session->userdata('id_user');
			$data['profile'] = $this->M_admin->getDataProfile($id);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahProfile', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'notelp' => $this->input->post('telp')
			);
			$this->M_admin->updateProfile($data, $this->session->userdata('id'));
			$this->session->set_flashdata('berhasil', 'Profile');
			redirect('admin/dasboard');
		}
	}
	public function ubahPassword()
	{
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim', [
			'required' => "Password Harus Diisi!",
			'min_length' => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password', 'Password Baru', 'required|trim|min_length[3]|matches[password2]', [
			'required' => "Password Baru Harus Diisi!",
			'min_length' => 'Password Terlalu Pendek',
			'matches' => 'Password Tidak Sama'
		]);
		$this->form_validation->set_rules('password2', 'Ulangi Pasword', 'required|trim|min_length[3]|matches[password]', [
			'required' => "password Harus Diisi"
		]);

		if ($this->form_validation->run() == false) {
			$id = $this->session->userdata('id_user');
			$data['profile'] = $this->M_admin->getDataProfile($id);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahProfile', $data);
			$this->load->view('admin/template/footer');
		} else {
			$passwordlama = $this->input->post('passwordlama');
			$password = $this->input->post('password');
			if (!password_verify($passwordlama, $this->session->userdata('password'))) {
				$this->session->set_flashdata('message', 'Password Lama Tidak Sesuai');
				redirect('admin/profile');
			} else {
				if ($passwordlama == $password) {
					$this->session->set_flashdata('message', 'Password Baru Tidak Boleh Sama dengan Password Lama');
					redirect('admin/profile');
				} else {
					// Password OKE
					$password_hash = password_hash($password, PASSWORD_DEFAULT);
					$this->M_admin->updatePassword($password_hash, $this->session->userdata('id'));
					$this->session->set_flashdata('berhasil', 'Password');
					redirect('admin/dasboard');
				}
			}
		}
	}

	// Menu Member
	public function keHalamanMember()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id');
			// load library
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/Laundry-app/admin/keHalamanMember/';
			$config['total_rows'] = $this->M_admin->countAllMember($id);
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 8;

			// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['member'] = $this->M_admin->getDataMember($config['per_page'], $data['start']);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/member', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function tambahMember()
	{
		$data = array(
			'nama' => $this->input->post('nama', true),
			'username' => $this->input->post('username', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'alamat' => $this->input->post('alamat', true),
			'email' => $this->input->post('email', true),
			'telp' => $this->input->post('telp', true)
		);
		$this->M_admin->tambahMem($data);
		$this->session->set_flashdata(
			'flash',
			'Ditambahkan'
		);
		redirect('admin/member');
	}
	public function editMember($id)
	{
		if ($this->session->username == TRUE) {
			$data['ubah'] = $this->M_admin->getDataUbah($id)->row();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahMember', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function ubahMember()
	{
		$password = $this->input->post('password', true);
		if ($password === $this->input->post('passwordlama', true)) {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => $this->input->post('passwordlama', true),
				'alamat' => $this->input->post('alamat', true),
				'email' => $this->input->post('email', true),
				'telp' => $this->input->post('telp', true)
			);
			$this->M_admin->updateMember($data, ['id_member' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url('admin/member'));
		} else {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'alamat' => $this->input->post('alamat', true),
				'email' => $this->input->post('email', true),
				'telp' => $this->input->post('telp', true)
			);
			$this->M_admin->updateMember($data, ['id_member' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url('admin/member'));
		}
	}
	public function hapus_member($id)
	{
		$this->M_admin->hapusMember($id);
		$this->session->set_flashdata(
			'flash',
			'Dihapus'
		);
		redirect(base_url('admin/member'));
	}

	// Menu Admin
	public function keHalamanAdmin()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id');

			// load library
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/Laundry-app/admin/keHalamanAdmin/';
			$config['total_rows'] = $this->M_admin->countAllAdmin($id);
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 8;

			// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['user'] = $this->M_admin->getDataAdmin($config['per_page'], $data['start']);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/admin', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function tambahAdmin()
	{
		$data = array(
			'nama' => $this->input->post('nama', true),
			'username' => $this->input->post('username', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'email' => $this->input->post('email', true),
			'notelp' => $this->input->post('telp', true)
		);
		$this->M_admin->tambahAdmin($data);
		$this->session->set_flashdata(
			'flash',
			'Ditambahkan'
		);
		redirect(base_url('admin/user'));
	}
	public function editAdmin($id)
	{
		if ($this->session->username == TRUE) {
			$data['ubah'] = $this->M_admin->getDataUbahAdmin($id)->row();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahAdmin', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function ubahAdmin()
	{
		$password = $this->input->post('password', true);
		if ($password === $this->input->post('passwordlama', true)) {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => $this->input->post('passwordlama', true),
				'email' => $this->input->post('email', true),
				'notelp' => $this->input->post('telp', true)
			);
			$this->M_admin->updateAdmin($data, ['id_user' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url('admin/user'));
		} else {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'email' => $this->input->post('email', true),
				'notelp' => $this->input->post('telp', true)
			);
			$this->M_admin->updateAdmin($data, ['id_user' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url('admin/user'));
		}
	}
	public function hapus_Admin($id)
	{
		$this->M_admin->hapusAdmin($id);
		$this->session->set_flashdata(
			'flash',
			'Dihapus'
		);
		redirect(base_url('admin/user'));
	}

	// Paket
	public function keHalamanPaket()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id');

			// load library
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/Laundry-app/admin/keHalamanPaket/';
			$config['total_rows'] = $this->M_admin->countAllPaket($id);
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 3;

			// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['paket'] = $this->M_admin->getDataPaket($config['per_page'], $data['start']);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/paket', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
		$this->form_validation->set_rules('namapaket', 'Nama Paket', 'required', [
			'required' => 'Nama paket belum diisi'
		]);
	}
	public function tambahPaket()
	{
		$config['upload_path']          = './assets/gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = '3000';
		$config['max_width']            = '3000';
		$config['max_height']           = '3000';
		$config['file_name']            = 'paket' . time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
			$data = [
				'nama_paket' => $this->input->post('nmpaket', true),
				'harga' => $this->input->post('Harga', true),
				'gambar' => $gambar
			];
			$this->M_admin->tambahpaket($data);
			$this->session->set_flashdata(
				'flash',
				'Ditambahkan'
			);
			redirect('admin/paket');
		} else {
			echo 'eror';
		}
	}
	public function editPaket($id)
	{
		if ($this->session->username == TRUE) {
			$data['ubah'] = $this->M_admin->getDataUbahPaket($id)->row();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/ubahPaket', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function ubahPaket()
	{
		$config['upload_path']          = './assets/gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = '3000';
		$config['max_width']            = '3000';
		$config['max_height']           = '3000';
		$config['file_name']            = 'paket' . time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			$image = $this->upload->data();
			unlink('./assets/gambar/' . $this->input->post('old_image', true));
			$gambar = $image['file_name'];
			$data = [
				'nama_paket' => $this->input->post('nmpaket', true),
				'harga' => $this->input->post('Harga', true),
				'gambar' => $gambar
			];
			$this->M_admin->updatePaket($data, ['id_paket' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'diubah');
			redirect(base_url('admin/paket'));
		} else {
			$data = [
				'nama_paket' => $this->input->post('nmpaket', true),
				'harga' => $this->input->post('Harga', true),
				'gambar' => $this->input->post('old_image', true)
			];
			$this->M_admin->updatePaket($data, ['id_paket' => $this->input->post('id')]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url('admin/paket'));
		}
	}
	public function hapus_paket($id)
	{
		$_id = $this->db->get_where('tb_paket', ['id_paket' => $id])->row();
		unlink('./assets/gambar/' . $_id->gambar);
		$this->M_admin->hapusPaket($id);
		$this->session->set_flashdata(
			'flash',
			'Dihapus'
		);
		redirect(base_url('admin/paket'));
	}


	// Menu Transaksi
	public function keHalamanTransaksi()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id');

			// load library
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/Laundry-app/admin/keHalamanTransaksi/';
			$config['total_rows'] = $this->M_admin->countAllOrders($id);
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 6;

			// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['transaksi'] = $this->M_admin->getDataTransaksi($config['per_page'], $data['start']);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/transaksi', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function keHalamanDetailTransaksi($id)
	{
		if ($this->session->username == TRUE) {
			$data['transaksi'] = $this->M_admin->getDataDetailTransaksi($id)->row();
			$data['detail'] = $this->M_admin->getDataDetails($id)->result();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/detailTransaksi', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function updateStatus()
	{
		$data = array(
			'status' => $this->input->post('status', true)
		);

		$this->M_admin->updateStat($data, ['kode_invoice' => $this->input->post('id')]);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect(base_url('admin/transaksi'));
	}
	public function updateBayar()
	{
		$data = array(
			'dibayar' => $this->input->post('bayar', true)
		);
		$total = $this->input->post('total', true);
		$cash = $this->input->post('cash', true);
		$hasil = $cash - $total;
		$this->M_admin->updateByr($data, ['kode_invoice' => $this->input->post('id')]);
		$this->session->set_flashdata('kembalian', $hasil);
		redirect(base_url('admin/transaksi'));
	}
	public function verifikasiSetuju($id)
	{
		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'verifikasi_pembayaran' => $this->input->post('setuju', true)
		);
		$this->M_admin->updateVerifikasi($data, ['kode_invoice' => $id]);
		$this->session->set_flashdata('flash', 'Disetujui');
		redirect(base_url('admin/transaksi'));
	}
	public function verifikasiTolak($id)
	{
		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'verifikasi_pembayaran' => $this->input->post('tolak', true)
		);
		$this->M_admin->updateVerifikasi($data, ['kode_invoice' => $this->input->post('id')]);
		$this->session->set_flashdata('flash', 'Ditolak');
		redirect(base_url('admin/transaksi'));
	}


	// Laporan
	public function laporan()
	{
		if ($this->session->username == TRUE) {
			$id = $this->session->userdata('id');

			// load library
			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/Laundry-app/admin/laporan/';
			$config['total_rows'] = $this->M_admin->countAllOrders($id);
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = 8;

			// initialize
			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['transaksi'] = $this->M_admin->getDataTransaksi($config['per_page'], $data['start']);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/topbar');
			$this->load->view('admin/laporan', $data);
			$this->load->view('admin/template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
	public function export()
	{
		$data['transaksi'] = $this->M_admin->getLaporanExport();
		$this->load->view('admin/export', $data);
	}
	public function exportExcel()
	{
		$data['transaksi'] = $this->M_admin->getLaporanExport();
		$this->load->view('admin/exportExcel', $data);
	}
}
