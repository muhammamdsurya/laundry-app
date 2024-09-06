<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Pembayaran ' + flashData + 'Dilakukan',
            text: 'Pemesanan anda akan diproses setelah pemerikasaan admin kami',
            showConfirmButton: false,
            timer: 2000
        });
        <?php unset($_SESSION['flash']); ?>
    }
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
    function menu() {
        const menuToggle = document.querySelector('.menu');
        const profileToggle = document.querySelector('.profile');
        menuToggle.classList.toggle('active');
        profileToggle.classList.toggle('active');
    }
</script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>