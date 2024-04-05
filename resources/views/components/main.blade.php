<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Collectorz' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    {{-- Carousel gallery css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <x-navbar />
    {{ $slot }}

    <a href="#" class="btn btn-lg btn-primary border border-white btn-lg-square back-to-top"><svg xmlns="http://www.w3.org/2000/svg"
            width="1em" height="1em" viewBox="0 0 512 512">
            <path fill="#2b3b47"
                d="M353.003 151.304L264.829 18.39c-4.375-6.595-14.06-6.595-18.435 0L158.22 151.304c-4.878 7.352.394 17.176 9.217 17.176h51.586v66.98c0 20.208 16.381 36.588 36.589 36.588c20.207 0 36.589-16.381 36.589-36.588v-66.98h51.585c8.823 0 14.095-9.823 9.217-17.176M148.865 343.095h-27.027a9.45 9.45 0 0 0-9.451 9.451v130.083a9.45 9.45 0 0 1-9.451 9.451H78.143a9.45 9.45 0 0 1-9.451-9.451V352.546a9.45 9.45 0 0 0-9.451-9.451H31.289a9.45 9.45 0 0 1-9.451-9.451v-14.527a9.45 9.45 0 0 1 9.451-9.451h119.52c5.718 0 10.126 5.038 9.367 10.705l-1.944 14.527a9.45 9.45 0 0 1-9.367 8.197m178.471 57.647c0 59.752-30.798 95.813-82.39 95.813c-51.329 0-82.125-35.009-82.125-95.813c0-59.489 30.797-95.813 82.125-95.813c51.592-.001 82.39 34.744 82.39 95.813m-118.978 0c0 46.064 12.897 63.963 36.588 63.963c24.48 0 36.852-17.899 36.852-63.963c0-45.801-12.371-63.7-36.852-63.7c-23.953 0-36.588 17.898-36.588 63.7m176.751 91.338h-25.056a9.45 9.45 0 0 1-9.451-9.451V319.117a9.45 9.45 0 0 1 9.451-9.451h50.037c47.38 0 76.335 19.478 76.335 59.488c0 42.38-30.007 62.385-72.387 62.385h-10.027a9.45 9.45 0 0 0-9.451 9.451v41.639a9.451 9.451 0 0 1-9.451 9.451m25.245-92.128c19.478 0 31.06-8.16 31.06-30.798c0-19.215-10.792-28.428-31.849-28.428h-5.553a9.45 9.45 0 0 0-9.451 9.451v40.324a9.45 9.45 0 0 0 9.451 9.451z" />
        </svg>
    </a>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    @livewireScripts
    <x-footer />
</body>

</html>
