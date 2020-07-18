<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociedad De Pediatría / Regional Nariño</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <header id="menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <a id="inicio" class="navbar-brand" href="#">
            <img src="./img/icono.png" width="50" height="50" class="d-inline-block align-top" alt="">
                Sociedad de Pediatría Regional Nariño
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SERVICIOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://webinar.scp.com.co/" target="_blank">WEBINAR</a>
                            <a class="dropdown-item" href="https://www.precepscp.com/login_precep.asp" target="_blank">PRECEP</a>
                            <a class="dropdown-item" href="https://crianzaysalud.com.co/" target="_blank">CRIANZA Y SALUD</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a id="eventos" href="#"  class="nav-link">EVENTOS</a>
                    </li>
                    <li class="nav-item">
                        <a id="quienes" href="#"  class="nav-link">¿QUIENES SOMOS?</a>
                    </li>
                    <li class="nav-item">
                        <a id="contacto" href="#"  class="nav-link">CONTACTANOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ADMINISTRAR PÁGINA
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a id="administrarEventos" class="dropdown-item" href="#">EVENTOS</a>
                            <a id="administrarUsuarios" class="dropdown-item" href="#">USUARIOS</a>
                            <a id="administrarContenido" class="dropdown-item" href="#">CONTENIDO DE LA PÁGINA</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $user->getNombre();  ?> (Administrador)
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a id="cerrar" class="dropdown-item" href="includes/logout.php">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="datosPagina">
        <div class="container">
            <div id="carrousel"><?php include_once 'carrousel.php';?></div>
            <div class="container">
                <div id="datosInicio" style='margin-top:5%'></div>
                <div id="datosQuienesSomos" style="display:none"></div>
                <div id="datosEventos" style="display:none"><h1>DATOS EVENTOS</h1></div>
                <div id="datosContacto" style="display:none"><?php include_once 'contacto.php';?></div>
            </div>
        </div>
        <?php include_once 'adminTables.php';?>
    </section>
    <footer><?php include_once 'footer.php';?></footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>
    <script src="https://kit.fontawesome.com/033a92cf04.js" crossorigin="anonymous"></script>
    <script src="./js/jquery.tabledit.js"></script>
    <script src="./js/codigoAdmin.js"></script>
</body>
</html>

