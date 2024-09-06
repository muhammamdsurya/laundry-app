<div class="l-navbar" id="nav-bar">
   <nav class="nav">
      <div>
         <a href="#" class="nav_logo">
            <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
         </a>
         <div class="nav_list">
            <a href="<?= base_url('admin/dasboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
            <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
            <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
            <a href="<?= base_url('admin/paket') ?>" class="nav_link active">
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
         <p>Ubah Paket</p>
      </div>
      <form action="<?= base_url('admin/paket/edit') ?>" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?= $ubah->id_paket ?>">

         <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" value="<?= $ubah->nama_paket ?>" class="form-control" id="nmpaket" name="nmpaket" placeholder="Masukan Nama Paket" required>
         </div>
         <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" value="<?= $ubah->harga ?>" class="form-control" id="harga" name="Harga" placeholder="Harga" required>
         </div>
         <img src="<?= base_url('assets/gambar/' . $ubah->gambar) ?>" width="100px">
         <div class="input-group mb-3">
            <input type="file" class="form-control" name="gambar" id="gambar" value="<?= $ubah->gambar ?>">
            <input type="hidden" id="old_image" name="old_image" size="20" style="display: none;" value="<?= $ubah->gambar ?>">
         </div>
         <div class="mb-3 d-flex justify-content-between">
            <a href="<?= base_url('admin/paket') ?>" class="btn btn-back">Kembali</a>
            <button class="btn btn-edit" data-bs-dismiss="modal">Simpan</button>
         </div>
      </form>
   </div>
</div>
<!-- Modal Edit End -->