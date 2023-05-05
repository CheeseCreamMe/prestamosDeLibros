<?php
session_start();
//este script guarda los datos del tema elegido por el usuario
if (isset($_POST['theme'])) {
    if (!isset($_SESSION['theme']) || $_SESSION['theme'] == 'light') {
        $_SESSION['theme'] = 'dark';
    } else {
        $_SESSION['theme'] = 'light';
    }
}

if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light'; // modo claro por defecto
}

$theme = $_SESSION['theme'];
//print_r($theme);
?>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <i class="bi bi-code-square"></i>
                CesarDev
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Contenido</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="home"><i
                                    class="bi bi-house-door-fill"></i>Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Registro
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Escuelas">Escuelas</a></li>
                                <li><a class="dropdown-item" href="Carreras">Carreras</a></li>
                                <li><a class="dropdown-item" href="Alumnos">Alumnos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Biblioteca
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Libros">Libros</a></li>
                                <li><a class="dropdown-item" href="Prestamos">Prestamos</a></li>
                                <li><a class="dropdown-item" href="#">Historial</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form method="POST">
                                <button class="btn" type="submit" name="theme">
                                    <a class="nav-link active" id="theme" style="cursor:pointer;">
                                        <i class="bi bi-brightness-high"></i> change mode
                                    </a>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
    require_once(__DIR__ . '/core/autoload.php');
    ?>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    const themeBtn = document.getElementById("theme");
    const htmlTag = document.querySelector("html");
    const sect1 = document.getElementById("sect1");

    // Obtener el valor del tema de la sesión de PHP
    const theme = "<?php echo $theme; ?>";

    // Establecer el valor del atributo data-bs-theme de acuerdo al valor del tema de la sesión
    if (theme === "dark") {
        htmlTag.setAttribute("data-bs-theme", "dark");
        themeBtn.innerHTML = '<i class="bi bi-brightness-high"></i>change mode';

        // Crear la etiqueta img con la imagen de fondo correspondiente
        const img = document.createElement("img");
        img.className = "background";
        img.src = "https://wallpapercave.com/wp/wp1809893.jpg";
        img.alt = "";

        // Agregar la etiqueta img a la sección con id "sect1"
        sect1.appendChild(img);
    } else {
        themeBtn.innerHTML = '<i class="bi bi-brightness-high-fill"></i>change mode';

        // Eliminar el atributo data-bs-theme
        htmlTag.removeAttribute("data-bs-theme");

        // Crear la etiqueta img con la imagen de fondo correspondiente
        const img = document.createElement("img");
        img.className = "background";
        img.src = "https://wallpapercave.com/wp/wp2405248.jpg";
        img.alt = "";

        // Agregar la etiqueta img a la sección con id "sect1"
        sect1.appendChild(img);
    }


    // Ahora puedes usar la variable theme en tu código JavaScript
    console.log(theme);
</script>
