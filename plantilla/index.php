<html lang="en" data-bs-theme="dark">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

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
                        <li class="nav-item"><a class="nav-link active" id=theme style="cursor:pointer;"><i
                                    class="bi bi-brightness-high"></i>change mode</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class=container>
        <?php

        if (!file_exists(__DIR__ . '/core/autoload.php')) {
            http_response_code(404);
            include(__DIR__ . '/core/pagina404.php');
        } else {
            require_once(__DIR__ . '/core/autoload.php');
        }

        ?>
    </div>
</body>

</html>

<script>

    const themeBtn = document.getElementById("theme");

    themeBtn.addEventListener("click", function () {
        const htmlTag = document.querySelector("html");
        if (htmlTag.getAttribute("data-bs-theme") === "dark") {
            htmlTag.removeAttribute("data-bs-theme");
            themeBtn.innerHTML = '<i class="bi bi-brightness-high-fill"></i>change mode';
        } else {
            htmlTag.setAttribute("data-bs-theme", "dark");
            themeBtn.innerHTML = '<i class="bi bi-brightness-high"></i>change mode';
        }
    });


</script>
