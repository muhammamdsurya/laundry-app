<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Admin
$route['default_controller'] = 'member';

    // Login
$route['prosesLogin'] = 'Admin/prosesLogin';
$route['login'] = 'Admin/keHalamanLogin';
$route['logout'] = 'admin/logout';

// Dashboard
$route['admin/dasboard'] = 'admin/keHalamanDasboard';
$route['admin/profile'] = 'admin/keHalamanUbahProfile';
$route['admin/ubahProfile/ubah'] = 'admin/ubahProfile';
$route['admin/ubahProfile/ubahPassword'] = 'admin/ubahPassword';

// Member
$route['admin/member'] = 'admin/keHalamanMember';
$route['admin/member/tambah'] = 'admin/tambahMember';
$route['admin/member/ubah/(:any)'] = 'admin/editMember/$1';
$route['admin/member/edit'] = 'admin/ubahMember';
$route['admin/member/hapusMember/(:any)'] = 'admin/hapus_member/$1';

// User
$route['admin/user'] = 'admin/keHalamanAdmin';
$route['admin/user/tambah'] = 'admin/tambahAdmin';
$route['admin/user/ubah/(:any)'] = 'admin/editAdmin/$1';
$route['admin/user/edit'] = 'admin/ubahAdmin';
$route['admin/user/hapusUser/(:any)'] = 'admin/hapus_Admin/$1';

// Paket
$route['admin/paket'] = 'admin/keHalamanPaket';
$route['admin/paket/tambah'] = 'admin/tambahPaket';
$route['admin/paket/ubah/(:any)'] = 'admin/editPaket/$1';
$route['admin/paket/edit'] = 'admin/ubahPaket';
$route['admin/paket/hapusPaket/(:any)'] = 'admin/hapus_paket/$1';

// transaksi
$route['admin/transaksi'] = 'admin/keHalamanTransaksi';
$route['admin/transaksi/detail/(:any)'] = 'admin/keHalamanDetailTransaksi/$1';
$route['admin/transaksi/updateStatus'] = 'admin/updateStatus';
$route['admin/transaksi/bayar'] = 'admin/updateBayar';
$route['admin/verifikasi/setuju/(:any)'] = 'admin/verifikasiSetuju/$1';
$route['admin/verifikasi/tolak/(:any)'] = 'admin/verifikasiTolak/$1';

// Laporan
$route['admin/laporan'] = 'admin/laporan';
$route['admin/laporan/export'] = 'admin/export';
$route['admin/laporan/exportExcel'] = 'admin/exportExcel';

// Halaman Member
$route['member/login'] = 'member/keHalamanLogin';
$route['member/ubahProfile'] = 'member/keHalamanProfile';
$route['member/ubahProfile/ubah'] = 'member/ubahProfile';
$route['member/ubahProfile/ubahPassword'] = 'member/ubahPassword';
$route['member/prosesLogin'] = 'member/prosesLogin';
$route['register'] = 'member/registrasi';
$route['member/dashboard'] = 'member/keHalamanDashboard';
$route['member/logout'] = 'member/logout';
$route['member/layanan'] = 'member/keHalamanLayanan';
$route['member/pesanan'] = 'member/keHalamanPesanan';
$route['member/layanan/tambahKeranjang/(:any)'] = 'member/tambahKeranjang/$1';
$route['member/layanan/hapusKeranjang'] = 'member/hapusKeranjang';
$route['member/layanan/checkout'] = 'member/keHalamanCheckout';
$route['member/layanan/invoice'] = 'member/keHalamanInvoice';
$route['member/layanan/invoice/proses-pembayaran'] = 'member/prosesBukti';
$route['member/layanan/proses-pembayaran'] = 'member/prosesPembayaran';
$route['member/pesanan/detail/(:any)'] = 'member/keHalamandetailPesanan/$1';
$route['member/pesanan/pembayaran/(:any)'] = 'member/keHalamandetailPembayaran/$1';
$route['member/pesanan/prosesPembayaran'] = 'member/prosesBuktiPemesanan';

//eror
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
