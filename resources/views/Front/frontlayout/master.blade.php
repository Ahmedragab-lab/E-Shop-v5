<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Front.frontlayout.headcss')
    </head>
    <body class="home-page home-01 ">
        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            <div class="mercado-panels-actions-wrap">
                <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
            </div>
            <div class="mercado-panels"></div>
        </div>
        @include('Front.frontlayout.mainheader')
        @yield('content')
        @include('Front.frontlayout.footer')
        @include('Front.frontlayout.footerjs')
    </body>
</html>
