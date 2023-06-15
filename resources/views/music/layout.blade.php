<!DOCTYPE html>

<html>

<head>

    <title>Manage music</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .images-detail {
            margin-top: 5%;
            margin-left: 10%;
            align-items: center;
            border-radius: 100%;
            margin-bottom: 50px;
        }

        .images-detail:hover {
            animation: app-logo-spin infinite 20s linear;


        }

        @keyframes app-logo-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
