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
        <h3>real-time monitoring <span>your energy</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus suscipit porro nam libero natus error consequatur sed repudiandae eos quo?</p>
        <a href="#" class="btn">Selengkapnya</a>
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
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn">Baca Sekarang</a>
        </div>

        <div class="box">
            <img src="{{ asset('darat/images/gg2.png') }}" alt="">
            <h3>aplikasi berbasis internet of things</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn">Baca Sekarang</a>
        </div>

        <div class="box">
            <img src="{{ asset('darat/images/gg3.png') }}" alt="">
            <h3>penyimpanan Data dan Laporan Energi</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn">Baca Sekarang</a>
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
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla placeat deserunt saepe repudiandae veniam soluta minima dolor hic aperiam iure.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, quaerat. Dolorem ratione saepe magni quo inventore porro ab voluptates eos, nam eius provident accusantium, quia similique est, repellendus et reiciendis.</p>
            <div class="buttons">
                <a href="#" class="btn"> <i class="fab fa-google-play"></i> Selengkapnya </a>
                <a href="#" class="btn"> <i class="fab fa-google-play"></i> Gabung Sekarang </a>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet pariatur rerum consectetur architecto ad tempora blanditiis quo aliquid inventore a.</p>
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