<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PF Monitoring</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/cl.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            .error_page.error_2 {
        display: flex;
        align-items: stretch;
        min-height: 100vh;
        background: #fff; }
    .error_page.error_2 .inner-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center; }
    .error_page.error_2 .inner-wrapper .error-heading {
        font-size: 40px;
        font-weight: 600;
        line-height: 1; }
    @media (min-width: 768px) and (max-width: 991px) {
          .error_page.error_2 .inner-wrapper .error-heading {
          font-size: calc(40px + 19 * ((100vw - 768px) / 223)); } }
    @media (min-width: 991px) and (max-width: 1200px) {
          .error_page.error_2 .inner-wrapper .error-heading {
          font-size: calc(59px + 110 * ((100vw - 991px) / 209)); } }
    @media (min-width: 1200px) {
         .error_page.error_2 .inner-wrapper .error-heading {
          font-size: 169px; } }
    .error_page.error_2 .inner-wrapper .error-code {
        margin-top: 10px;
        font-weight: 600; }
    .error_page.error_2 .inner-wrapper .error-message {
      max-width: 500px;
      margin-top: 5px;
      text-align: center; }
    .error_page.error_2 .inner-wrapper .btn {
      margin: 30px auto 0 auto; }
        </style>
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}
        {{-- <script src="/js/app.js"></script> --}}
       
        <div class="error_page error_2">
            <div class="container inner-wrapper">
              <h1 class="display-1 error-heading">Hello!</h1>
              {{-- <h2 class="error-code">You must login first</h2> --}}
              <h2 class="error-code" style="text-align: center">Kamu harus login dahulu</h2>
              <a href="{{ route('login') }}" class="btn btn-outline-primary" style="width: 150px;">Login</a>
            </div>
          </div>

    </body>
</html>
