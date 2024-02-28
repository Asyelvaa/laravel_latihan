<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="../assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Students Dashboard</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Custom styles for this template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/css/styles.css" rel="stylesheet">
    </head>
    <style>
        body{
            overflow: hidden;
        }
        .sidebar{
            height: 80vw;
            justify-content: space-between;
        }
    </style>

    <body>
        @include('dashboard.header')

        <div class="container-fluid" >
            <div class="row">
                @include('dashboard.sidebar')

                <main class="col-md-9 col-lg-10 px-md-4 ">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script>
        $(document).ready(function(){
            $('.nav-link').click(function(){
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script> -->
</html>