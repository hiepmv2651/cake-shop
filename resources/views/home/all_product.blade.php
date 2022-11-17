<!DOCTYPE html>
<html>

<head>
    @include('home.css2')
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
      
        <!-- end header section -->

        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->

        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- jQery -->
    @include('home.js2');

</body>
</html>