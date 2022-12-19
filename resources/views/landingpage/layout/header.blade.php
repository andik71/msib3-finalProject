<!DOCTYPE html>
<html lang="en">

<head>
    <title>Computerpedia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="{{ url('/public/assets/img/apple-icon.png') }} ">
    <link rel="shortcut icon" type="image/x-icon" href=" {{ url('/public/assets/img/logo4.png') }} ">


    <link rel="stylesheet" href="{{ asset('/public/assets/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/templatemo.css')}} ">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/custom.css')}} ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/fontawesome.min.css') }} ">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--

        
    !-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!--

        <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/css/slick.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/assets/css/slick-theme.css') }} ">

    <script src="https://kit.fontawesome.com/e6dc8b3cc7.js" crossorigin="anonymous"></script>
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-e3GPzIFDhcCfgG53">
    </script>
</head>

<body>