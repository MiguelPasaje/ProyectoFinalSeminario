<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociedad De Pediatría / Regional Nariño</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item p-2">
                        <a class="text-white" id="registryLink" href="#"  class="nav-link">Registrarse </a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="text-white" id="initSesion" href="vistas/login.php"  class="nav-link"> Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="registry" style="display: none;">
        <div class="container" style="padding-top: 5vh;">
            <div class="col"><h1 id="tituloForm" style="text-align: center; padding-bottom: 5vmin;">Formulario de Registro</h1></div>
            <form id="formularioReg" action="registry.php" method="GET" style="text-align: center;">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Noombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" class="form-control" id="contraseniaReg" name="contrasenia" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="cc">CC</label>
                    <input type="text" class="form-control" id="cc" name="cc" required>
                </div>
                <div class="form-group">
                    <label for="tel">Teléfono</label>
                    <input type="text" class="form-control" id="tel2" name="tel" required>
                </div>
                <div class="row">
                    <button id="btnRegistrar" type="button" class="col btn btn-success" onclick="registrarUsuario()">Registrar</button>
                    <button id="btnCancelarReg" type="button" class="col btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>
    </section>
    <section id="datosPagina">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div id="datosInicio" style='margin-top:5%'></div>
            <div id="datosQuienesSomos" style="display:none"></div>
            <div id="datosEventos" style="display:none"><h1>DATOS EVENTOS</h1>No hay nada aqui Aún</div>
            <div id="datosContacto" style="display:none">
                <h1>DATOS CONTACTO</h1>
                <form action="enviar.php" method="post">
                    <h2>CONTACTO</h2>
                    <input type="text" name="name" placeholder="Nombre" required>
                    <input type="text" name="email" placeholder="E-Mail" required>
                    <input type="text" name="asunto" placeholder="Asunto" required>
                    <textarea name="message" placeholder="Escriba aqui el texto a enviar" required></textarea>
                    <input type="submit" value="Enviar" id="boton">
                </form>
                <div class="social" style="display: none">
                    <ul>
                        <li><a href="http://www.facebook.com/falconmasters" target="_blank" class="icon-facebook"></a></li>
                        <li><a href="http://www.twitter.com/falconmasters" target="_blank" class="icon-twitter"></a></li>
                        <li><a href="http://www.googleplus.com/falconmasters" target="_blank" class="icon-googleplus"></a></li>
                        <li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
                    <li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
                    </ul>
                </div>
                <div id="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3988.90944115024!2d-77.28235588590792!3d1.222988562312202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1558104377137!5m2!1ses!2sco" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <?php
            include_once 'footer.php';
        ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
    <script src="./js/codigoDefault.js"></script>
</body>
</html>

