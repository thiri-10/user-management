<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
   
   
</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-1 bg-light">
               @include('layouts.nav')
            </nav>
           
            <main class="col-11 bg-light">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
