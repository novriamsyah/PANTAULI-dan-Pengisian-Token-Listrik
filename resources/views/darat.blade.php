<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pantau Energi</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link  href="{{ asset('css/pertama.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><span>Pantau</span> Energi</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#features">Fitur</a>
        <a href="#about">Tentang</a>
        <a href="{{ route('login') }}" class="btn" style="color: #fff">Login</a>
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home" style="background:url('{{ asset('darat/images/bg-wit.png') }}'); background-repeat: no-repeat;">

    <div class="content">
        <!--<h3>real-time monitoring <span>your energy</span></h3> -->
        <h3>Pemantauan nilai faktor daya <span>dan</span> energi listrik</h3>
        <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus suscipit porro nam libero natus error consequatur sed repudiandae eos quo?</p> -->
        <p>solusi untuk anda dalam memantau  nilai faktor daya dan konsumsi energi listrik sebagai upaya optimasi penggunaan daya listrik yang tidak terkontrol </p>
        <a href="#features" class="btn">Selengkapnya</a>
    </div>

    <div class="image">
        <img src="{{ asset('darat/images/en2.jpg') }}" alt="" >
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> Fitur Aplikasi </h1>

    <div class="box-container">

        <div class="box">
            <img src="{{ asset('darat/images/gg1.png') }}" alt="">
            <h3>Pemantauan Data Secara Realtime</h3>
            <p>website secara realtime menampilkan nilai faktor daya dan penggunaan energi listrik yang dengan interval waktu update selama 15 detik  </p>
           
        </div>

        <div class="box">
            <img src="{{ asset('darat/images/gg2.png') }}" alt="">
            <h3>aplikasi berbasis internet of things</h3>
            <p>aplikasi ini menerapkan konsep IoT, dimana alat ukur dihubungkan ke internet untuk mengirimkan hasil pembacaan ke dalam website. </p>
          <!--  <a href="#" class="btn">Fitur 2</a> -->
        </div>

        <div class="box">
            <img src="{{ asset('darat/images/gg3.png') }}" alt="">
            <h3>penyimpanan Data dan Laporan Energi</h3>
            <p>Data nilai faktor daya dan penggunaan energi listrik disimpan ke dalam database dan dapat juga diunduh pada halaman website.</p>
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- about section starts  -->

<section class="about" id="about" style="background:url('{{ asset('darat/images/bg-wit.png') }}'); background-repeat: no-repeat;">

    <h1 class="heading"> Tentang Aplikasi </h1>

    <div class="column">

        <div class="image">
            <img src="{{asset('darat/images/ab1.jpg')}}" alt="">
        </div>

        <div class="content">
            <h3>Easy And Perfect Solution For Your Monitoring Your Energy</h3>
            <p>Aplikasi website pemantauan nilai faktor daya dan penggunaan energi listrik dibuat untuk memudahkan pengguna dalam pemantauan pengguaan listrik.</p>
            <p>memantau nilai perbaikan faktor daya merupakan upaya untuk memaksimalkan penyerapan daya aktif pada beban beban listrik yang digunakan, sedangkan memantau penggunaan energi listri juga sangat penting agar pemakaian listrik tidak over atau berlebihan menyebabkan biaya listrik menjadi besar.  .</p>
            <div class="buttons">
                <a href="#features" class="btn"> <i class="fab fa-google-play"></i> Fitur aplikasi </a>
                <a href="{{ route('login') }}" class="btn"> <i class="fab fa-google-play"></i> Login</a>
            </div>
        </div>

    </div>

</section>

<!-- about section ends -->


<!-- footer section starts  -->

<div class="footer" style="background:url('{{ asset('darat/images/footer-bg.png') }}'); background-repeat: no-repeat;">

    <div class="box-container">

        <div class="box">
            <h3>Tentang Aplikasi</h3>
            <p>Easy And Perfect Solution For Your Monitoring Your Energy. Aplikasi website pemantauan nilai faktor daya dan penggunaan energi listrik dibuat untuk memudahkan pengguna dalam pemantauan pengguaan listrik</p>
        </div>

        <div class="box">
            <h3>Terhubung Langsung</h3>
            <a href="#">home</a>
            <a href="#">features</a>
            <a href="#">about</a>
        </div>

        <div class="box">
            <h3>Ikuti Kami</h3>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Github</a>
            <a href="#">Gmail</a>
        </div>

        <div class="box">
            <h3>Info Kontak</h3>
            <div class="info">
                <i class="fas fa-phone"></i>
                <p> +6282282920710 </p>
            </div>
            <div class="info">
                <i class="fas fa-envelope"></i>
                <p> novriamsyahh@gmail.com </p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p> balunijuk 33255 </p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright @ 2021 by pantau </h1>

</div>

<!-- footer section ends -->

</body>
</html>