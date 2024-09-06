<div class="l-navbar" id="nav-bar">
   <nav class="nav">
      <div>
         <a href="#" class="nav_logo">
            <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
         </a>
         <div class="nav_list">
            <a href="<?= base_url('admin/dasboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
            <a href="<?= base_url('admin/user') ?>" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
            <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
            <a href="<?= base_url('admin/paket') ?>" class="nav_link">
               <ion-icon name="briefcase-outline" class="nav_icon"></ion-icon><span class="nav_name">Paket</span>
            </a>
            <a href="<?= base_url('admin/transaksi') ?>" class="nav_link">
               <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Transaksi</span>
            </a>
            <a href="<?= base_url('admin/laporan') ?>" class="nav_link">
               <ion-icon name="reader-outline"></ion-icon> <span class="nav_name">Laporan</span>
            </a>
         </div>
      </div>
      <a href="<?= base_url('logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
   </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
   <div class="card p-3">
      <div class="table_header p-0 px-3 m-0">
         <p>Ubah Admin</p>
      </div>
      <form action="<?= base_url('admin/user/edit') ?>" method="post">
         <input type="hidden" name="id" value="<?= $ubah->id_user ?>">
         <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $ubah->nama ?>" required>
         </div>
         <div class="mb-3">
            <label for="username" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="username" name="user" placeholder="Masukkan Username" value="<?= $ubah->username ?>" disabled>
            <input type="hidden" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $ubah->username ?>">
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= $ubah->password ?>" required>
            <input type="hidden" class="form-control" id="password" name="passwordlama" placeholder="Masukkan Password" value="<?= $ubah->password ?>" required>
         </div>
         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $ubah->email ?>" required>
         </div>
         <div class="mb-3">
            <label for="telp" class="form-label">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Telp" value="<?= $ubah->notelp ?>" required>
         </div>
         <div class="mb-3 d-flex justify-content-between">
            <a href="<?= base_url('admin/user') ?>" class="btn btn-back">Kembali</a>
            <button class="btn btn-edit" data-bs-dismiss="modal">Simpan</button>
         </div>
      </form>
   </div>
</div>
<!-- Modal Edit End -->