<!DOCTYPE html>
<html>
<head>
   <title>BeeFlix</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
       <div class="container">
            <a style="text-decoration: none;" href="{{ route('movies.home') }}">
                <div class="d-flex align-items-center">
                    <img src="{{asset('BeeflixLogo.png')}}" alt="BeeflixLogo" width="100px">
                    <div class="navbar-brand mb-0 fw-bold fs-2">
                        <span style="color: #000;">Bee</span><span style="color: #dc3545;">Flix</span>
                    </div>
                </div>
            </a>
       </div>
   </nav>

   @yield('content')

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
