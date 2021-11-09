<!DOCTYPE html>
<html lang="es">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="title" content="Home">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href='css/styles.css'/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body style="background: #F5F5F5;font-family: 'Roboto', sans-serif;">
<header>
    <img src="images/logo.png" class="p-2" width="250">
</header>
<section>
    @yield('content')
</section>
<footer>
    <div class="menu">
        <ul>
            <li><a href="{{route('paginaPrincipal')}}"><i class="fas fa-home"></i></a></li>
            <li><a href="#"><i class="fas fa-search"></i></a></li>
            <li><a href="#"><i class="fas fa-plus-circle"></i></a></li>
            <li><a href="{{route('perfiles')}}"><i class="fas fa-user"></i></a></li>
            <li><a href="#"><i class="fas fa-tools"></i></a></li>
        </ul>
    </div>
</footer>
</body>
</html>
