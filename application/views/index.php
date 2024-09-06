<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkah Laundry</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style-2.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <a href="#" class="logo"><span>Berkah</span>Laundry</a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#features">melayani</a>
            <a href="#about">tentang</a>
            <a href="#review">review</a>
            <a href="#pricing">pesan</a>
            <a href="#contact">kontak</a>
            <a href="<?= base_url('member/login') ?>" class="btn-login">Login</a>
        </nav>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Berkah<span> Laundry</span></h3>
            <p>Berkah Laundry menyajikan pencucian cepat, bersih, dan tahan lama. diberkah laundry juga dapat dipesan melalui website dan akan diantarkan sesuai pemesanan</p>
            <a href="<?= base_url('member/login') ?>" class="btn">Pesan Sekarang</a>
        </div>

        <div class="image">
            <img src="<?= base_url('assets/') ?>images/home-img.svg" alt="">
        </div>

    </section>

    <!-- home section ends -->

    <!-- features section starts  -->

    <section class="features" id="features">

        <h1 class="heading"> Melayani </h1>

        <div class="box-container">

            <div class="box">
                <i class="fa fa-american-sign-language-interpreting text-center icon-service" aria-hidden="true"></i>
                <h3>cuci lipat</h3>
            </div>

            <div class="box">
                <i class="fa fa-assistive-listening-systems icon-service" aria-hidden="true"></i>
                <h3>cuci kering</h3>
            </div>

            <div class="box">
                <i class="fa fa-bolt icon-service" aria-hidden="true"></i>
                <h3>setrika/tekan</h3>
            </div>

        </div>

    </section>

    <!-- features section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> Tentang Kami </h1>

        <div class="column">

            <div class="image">
                <img src="<?= base_url('assets/') ?>images/about-img.svg" style="width: 500px !important;" alt="">
            </div>

            <div class="content">
                <h3>Fitur Kuat</h3>
                <p>Layanan kami tidak hanya cepat, bersih, efisien, tetapi juga sangat andal. Eksekutif layanan pelanggan kami dilatih secara khusus untuk memberikan panduan dan memastikan pengiriman tepat waktu.</p>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- newsletter  -->

    <div class="newsletter">

        <h3>Ikuti Untuk Mengetahui Promo</h3>
        <p>Kami mengadakan promo tiap tahun untuk memberikan kepuasan kepada pelanggan</p>
        <form action="">
            <input type="email" placeholder="Masukkan email anda">
            <input type="submit" value="Ikuti">
        </form>

    </div>

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> review pelanggan </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="<?= base_url('assets/') ?>images/pic1.png" alt="">
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="comment">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                    </div>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="<?= base_url('assets/') ?>images/pic2.png" alt="">
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="comment">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                    </div>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="<?= base_url('assets/') ?>images/pic3.png" alt="">
                    <h3>john deo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="comment">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- pricing section starts  -->

    <section class="pricing" id="pricing">

        <h1 class="heading"> Pesan Sekarang </h1>

        <div class="box-container">

            <div class="box">
                <h3 class="title">Pria</h3>
                <ul>
                    <li> <i class="fas fa-check"></i> Pengambilan Gratis </li>
                    <li> <i class="fas fa-check"></i> Proses Cepat </li>
                    <li> <i class="fas fa-check"></i> 24/7 Pelayanan </li>
                    <li> <i class="fas fa-check"></i> Pengantaran Gratis </li>
                </ul>
                <a href="<?= base_url('member/login') ?>" class="btn">Pesan Sekarang</a>
            </div>
            <div class="box">
                <h3 class="title">Wanita</h3>
                <ul>
                    <li> <i class="fas fa-check"></i> Pengambilan Gratis </li>
                    <li> <i class="fas fa-check"></i> Proses Cepat </li>
                    <li> <i class="fas fa-check"></i> 24/7 Pelayanan </li>
                    <li> <i class="fas fa-check"></i> Pengantaran Gratis </li>
                </ul>
                <a href="<?= base_url('member/login') ?>" class="btn">Pesan Sekarang</a>
            </div>
            <div class="box">
                <h3 class="title">Anak - Anak</h3>
                <ul>
                    <li> <i class="fas fa-check"></i> Pengambilan Gratis </li>
                    <li> <i class="fas fa-check"></i> Proses Cepat </li>
                    <li> <i class="fas fa-check"></i> 24/7 Pelayanan </li>
                    <li> <i class="fas fa-check"></i> Pengantaran Gratis </li>
                </ul>
                <a href="<?= base_url('member/login') ?>" class="btn">Pesan Sekarang</a>
            </div>

        </div>

    </section>

    <!-- pricing section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <div class="image">
            <img src="<?= base_url('assets/') ?>images/contact-img.png" alt="">
        </div>

        <form action="">

            <h1 class="heading">Kontak Kami</h1>

            <div class="inputBox">
                <input type="text" required>
                <label>nama</label>
            </div>

            <div class="inputBox">
                <input type="email" required>
                <label>email</label>
            </div>

            <div class="inputBox">
                <input type="number" required>
                <label>No Handphone</label>
            </div>

            <div class="inputBox">
                <textarea required name="" id="" cols="30" rows="10"></textarea>
                <label>Pesan</label>
            </div>

            <input type="submit" class="btn" value="Kirim pesan">

        </form>

    </section>

    <!-- contact section edns -->

    <!-- footer section starts  -->

    <div class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Tentang Kami</h3>
                <p>Layanan kami tidak hanya cepat, bersih, efisien, tetapi juga sangat andal. Eksekutif layanan pelanggan kami dilatih
                    secara khusus untuk memberikan panduan dan memastikan pengiriman tepat waktu.</p>
            </div>

            <div class="box">
                <h3>Menu</h3>
                <a href="#">home</a>
                <a href="#">melayani</a>
                <a href="#">tentang</a>
                <a href="#">review</a>
                <a href="#">pesan</a>
                <a href="#">kontak</a>
            </div>

            <div class="box">
                <h3>Ikuti Kami</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">pinterest</a>
                <a href="#">twitter</a>
            </div>

            <div class="box">
                <h3>Informasi Kontak</h3>
                <div class="info">
                    <i class="fas fa-phone"></i>
                    <p> +62 812-9000-4060 </p>
                </div>
                <div class="info">
                    <i class="fas fa-envelope"></i>
                    <p> berkahlaundry@gmail.com </p>
                </div>
                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p> Bekasi, Indonesia </p>
                </div>
            </div>

        </div>

        <h1 class="credit"> &copy; copyright @ 2022 Berkah Laundry </h1>

    </div>

    <!-- footer section ends -->
</body>

</html>