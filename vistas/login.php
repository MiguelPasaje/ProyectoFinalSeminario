<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parqueadero</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <section id="login">
        <div class="container" style="padding-top: 20vmin;">
            <div class="row">
                <div class="col-md-4"></div>
                <div id="loginImg" class="col-md-4"></div>
            </div>
            <form id="formularioLogin" action="../index.php" method="POST" style="text-align: center;">
                <div class="form-group">
                    <label for="nombre">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombre" placeholder="email@example.com" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" placeholder="Password" name="contrasenia" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    <button type="button" class="btn btn-info" onclick="mostrarFormReg()">Registrarse</button>
                </div>
            </form>
        </div>
    </section>
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
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" class="form-control" id="contraseniaReg" name="contrasenia" required>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
    <script src="../js/codigoLogin.js"></script>
</body>
</html>

