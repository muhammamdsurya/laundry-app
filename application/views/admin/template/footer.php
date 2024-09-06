<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    function menu() {
        const menuToggle = document.querySelector('.menu');
        const profileToggle = document.querySelector('.profile');
        menuToggle.classList.toggle('active');
        profileToggle.classList.toggle('active');
    }
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil ' + flashData,
            showConfirmButton: false,
            timer: 2000
        });
        <?php unset($_SESSION['flash']); ?>
    }
    // Button hapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
    const gagal = $('.gagal').data('gagal');
    if (gagal) {
        Swal.fire({
            icon: 'error',
            title: gagal,
            showConfirmButton: false,
            timer: 2000
        });
        <?php unset($_SESSION['message']); ?>
    }
    const berhasil = $('.berhasil').data('berhasil');
    if (berhasil) {
        Swal.fire({
            icon: 'success',
            title: berhasil + ' Berhasil Diubah',
            showConfirmButton: false,
            timer: 2000
        });
        <?php unset($_SESSION['berhasil']); ?>
    }
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<!-- Javascript End -->
</body>

</html>