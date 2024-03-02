<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website tuyển dụng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
    {{-- <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{url('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{url('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('css/slicknav.css')}}">

    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Thêm thư viện Quill từ CDN -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



</head>

<body>
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{url('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    {{-- <script src="{{url('js/bootstrap.min.js')}}"></script> --}}
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('js/ajax-form.js')}}"></script>
    <script src="{{url('js/waypoints.min.js')}}"></script>
    <script src="{{url('js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('js/scrollIt.js')}}"></script>
    <script src="{{url('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{url('js/wow.min.js')}}"></script>
    <script src="{{url('js/nice-select.min.js')}}"></script>
    <script src="{{url('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('js/plugins.js')}}"></script>
    <script src="{{url('js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{url('js/contact.js')}}"></script>
    <script src="{{url('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{url('js/jquery.form.js')}}"></script>
    <script src="{{url('js/jquery.validate.min.js')}}"></script>
    <script src="{{url('js/mail-script.js')}}"></script>
    <script src="{{url('js/quill.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script src="{{ url('js/main.js') }}"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>
