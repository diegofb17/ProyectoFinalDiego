<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="title" content="Home">
    <link rel="icon" href={{asset("images/favicon.png")}} type="image/x-icon">
    <link rel="stylesheet" href={{asset('css/styles.css')}}/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<header>
    <a href="{{route('paginaPrincipal')}}">
        <img src={{asset("images/logo.png")}} class="p-2" width="250">
    </a>
</header>
<section>
    @yield('content')
</section>
<footer>
    <div class="menu">
        <ul>
            <li><a href="{{route('paginaPrincipal')}}"><i class="fas fa-home"></i></a></li>
            <li><a href="{{route('busqueda')}}"><i class="fas fa-search"></i></a></li>
            <li><a href="{{route('anadirSticker')}}"><i class="fas fa-plus-circle"></i></a></li>
            @if(auth()->user() != null)
            <li><a href="{{route('perfiles',auth()->user()->id)}}"><i class="fas fa-user"></i></a></li>
            @else
                <li><a href="{{route('perfiles',1)}}"><i class="fas fa-user"></i></a></li>
            @endif
            <li><a href="{{route('configuracion')}}"><i class="fas fa-tools"></i></a></li>
        </ul>
    </div>
</footer>
@yield('js')
</body>
</html>
