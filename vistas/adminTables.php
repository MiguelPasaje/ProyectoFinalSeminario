<div id="adminEventos" style="display: none;" >
    <div class="container">
        <h1 class='p-3 text-white bg-info' style='text-align:center;'>DATOS DE EVENTOS</h1>
        <div class="row"><button id="btnAgregarEvent" class="col btn btn-success p-3 m-5" onclick="mostrarForm('eventos')">Agregar Nuevo Evento</button></div>
        <form id="formularioEventos" action="" method="POST" style="text-align: center;"></form>
        <table id="eventsTableForm" class="table table-striped table-bordered table-success" style="width:100%;display:none;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Hora</th>
                    <th>Participantes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="eventsTableBodyForm">
                <tr class="">
                        <td class="">
                            <input form="formularioEventos" class="form-control" id="nombre" type="text" name="nombre" required>
                        </td>
                        <td class="">
                            <input form="formularioEventos" class="form-control" id="fecha" type="text" name="fecha" required>
                        </td>
                        <td class="">
                            <input form="formularioEventos" class="form-control" id="lugar" type="text" name="lugar" required>
                        </td>
                        <td class="">
                            <input form="formularioEventos" class="form-control" id="hora" type="text" name="hora" required>
                        </td>
                        <td class="">
                            <input form="formularioEventos" class="form-control" id="participantes" type="text" name="participantes" required>
                        </td>
                        <td class="">
                            <button form="formularioEventos" id="btnInsertar" type="button" class="btn btn-sm btn-success" onclick="agregarRegistro('eventos')">Insertar</button>
                            <button form="formularioEventos" id="btnCancelarREventos" type="button" class="btn btn-sm btn-danger" onclick="agregarRegistro('cancelarREventos')">Cancelar</button>
                        </td>
                    </tr>
            </tbody>
        </table>
        <table id="eventsTable" class="table table-hover table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Hora</th>
                    <th>Participantes</th>
                </tr>
            </thead>
            <tbody id="eventsTableBody">
            </tbody>
        </table>

    </div>
</div>
<div id="adminUsuarios" style="display: none;" >
    <div class="container">
        <h1 class='p-3 text-white bg-success' style='text-align:center;'>USUARIOS REGISTRADOS</h1>
        <div class="row"><button id="btnAgregarUsuario" class="col btn btn-success p-3 m-5" onclick="mostrarForm('usuarios')">Agregar Nuevo Usuario</button></div>
        <form id="formularioUsuarios" action="" method="POST" style="text-align: center;"></form>
        <div id="newUserForm" style="display:none;">
            <div class="row bg-info text-white">
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Nombres</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="nombres" type="text" name="nombres" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Apellidos</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="apellidos" type="text" name="apellidos" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Nombre de usuario</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="usuario" type="text" name="usuario" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Contrasenia</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="contrasenia" type="text" name="contrasenia" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Email</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="email" type="text" name="email" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Cc</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="cc" type="text" name="cc" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Teléfono</div>
                    <div class="row"><input form="formularioUsuarios" class="form-control" id="tel" type="text" name="tel" required></div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg">
                    <div class="row">Acciones</div>
                    <div class="row">
                        <button form="formularioEventos" id="btnInsertarUsuario" type="button" class="col btn btn-sm btn-success" onclick="agregarRegistro('usuarios')">Insertar</button>
                        <button form="formularioEventos" id="btnCancelarRUsuario" type="button" class="col btn btn-sm btn-danger" onclick="agregarRegistro('cancelarRUsuario')">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <table id="usersTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>usuario</th>
                    <th>contrasenia</th>
                    <th>email</th>
                    <th>cc</th>
                    <th>tel</th>
                </tr>
            </thead>
            <tbody id="usersTable2">
            </tbody>
        </table>
    </div>
    <div class="container">
        <h1 class='p-3 text-white bg-danger' style='text-align:center;'>USUARIOS PENDIENTES DE APROBACIÓN</h1>
        <table id="usersTempTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>usuario</th>
                    <th>contrasenia</th>
                    <th>email</th>
                    <th>cc</th>
                    <th>tel</th>
                </tr>
            </thead>
            <tbody id="usersTempTable2">
            </tbody>
        </table>
    </div>
</div>
<div id="adminContenido" style="display: none;" >
    <div class="container">
        <h1 class='p-3 text-white bg-info' style='text-align:center;'>CONTENIDO EN INICIO</h1>
        <table id="contentInitTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contentInitTable2">
            </tbody>
        </table>
    </div>
    <div class="container">
        <h1 class='p-3 text-white bg-info' style='text-align:center;'>CONTENIDO EN QUIENES SOMOS</h1>
        <table id="contentWhoTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contentWhoTable2">
            </tbody>
        </table>
    </div>
</div>