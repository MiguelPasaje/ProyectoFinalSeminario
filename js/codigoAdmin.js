var datosUsuario = new Object();
var datosArticulos = new Object();
var datosQuienes = new Object();
var datosEventosIns = new Object();

//---------------------------------------------------
crearEscuchadores();
pedirDatos();
function mostrarForm(form){
    switch (form){
        case "eventos":
            document.getElementById('eventsTableForm').style.display="block";
            document.getElementById('btnAgregarEvent').style.display="none";
        break;
        case "usuarios":
            document.getElementById('newUserForm').style.display="block";
            document.getElementById('btnAgregarUsuario').style.display="none";
        break;
    }
}
$(document).ready( function () {

    var table = $('#eventsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: "getData.php",
            method: "POST",
            data: {"collection" : "eventos"}
        },
        columns:[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'fecha'},
            {data: 'lugar'},
            {data: 'hora'},
            {data: 'participantes'}
            /*{defaultContent: `<div class="btn-group" role="group" aria-label="acciones">
            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>`}*/
        ],
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        responsive: "true",
        dom: 'Brtp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="far fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
            }
		]
    });
    $('#eventsTable').on('draw.dt', function(){
        $('#eventsTable').Tabledit({
            url:'action.php',
            dataType:'json',
            columns:{
                identifier : [0, 'id'],
                editable:[[1, 'nombre'],[2, 'fecha'], [3, 'lugar'],[4, 'hora'],[5, 'participantes']]
            },
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-info',
                    html: '<i class="fa fa-edit"></i>',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<i class="fa fa-trash"></i>',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Guardar'
                },
                confirm: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Confirmar'
                }
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                     $('#' + data.id).remove();
                     $('#eventsTable').DataTable().ajax.reload();
                }
            }
        });
    });
    $('#usersTable').DataTable({
        ajax:{
            url: "getData.php",
            method: "POST",
            data: {"collection" : "usuarios"}
        },
        columns:[
            {data: 'nombres'},
            {data: 'apellidos'},
            {data: 'usuario'},
            {data: 'contrasenia'},
            {data: 'email'},
            {data: 'cc'},
            {data: 'tel'}
        ],
        responsive: "true",
        dom: 'Brtp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="far fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
            }
        ]
    });
    $('#usersTable').on('draw.dt', function(){
        $('#usersTable').Tabledit({
            url:'actionUsers.php',
            dataType:'json',
            columns:{
                identifier : [2, 'usuario'],
                editable:[[0, 'nombres'],[1, 'apellidos'], [2, 'usuario'],[3, 'contrasenia'],[4, 'email'],[5, 'cc'],[6, 'tel']]
            },
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-info',
                    html: '<i class="fa fa-edit"></i>',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<i class="fa fa-trash"></i>',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Guardar'
                },
                confirm: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Confirmar'
                }
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                     $('#' + data.id).remove();
                     $('#usersTable').DataTable().ajax.reload();
                }
            }
        });
    });
    $('#usersTempTable').DataTable({
        ajax:{
            url: "getData.php",
            method: "POST",
            data: {"collection" : "usuariosTemporales"}
        },
        columns:[
            {data: 'nombres'},
            {data: 'apellidos'},
            {data: 'nombreUsuario'},
            {data: 'contrasenia'},
            {data: 'email'},
            {data: 'cc'},
            {data: 'tel'},
            {defaultContent: `<div class="btn-group" role="group" aria-label="acciones">
            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>`}
        ]
    });
    $('#contentInitTable').DataTable({
        ajax:{
            url: "getData.php",
            method: "POST",
            data: {"collection" : "articulos"}
        },
        columns:[
            {data: 'titulo'},
            {data: 'contenido'},
            {defaultContent: `<div class="btn-group" role="group" aria-label="acciones">
            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>`}
        ]
    });
    $('#contentWhoTable').DataTable({
        ajax:{
            url: "getData.php",
            method: "POST",
            data: {"collection" : "datosTexto"}
        },
        columns:[
            {data: 'titulo'},
            {data: 'contenido'},
            {defaultContent: `<div class="btn-group" role="group" aria-label="acciones">
            <button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>`}
        ]
    });
} );

function agregarRegistro(colleccion){
    switch (colleccion){
        case "eventos":
            var enviar = false;
            var nombre = document.querySelector('#nombre').value;
            var fecha = document.querySelector('#fecha').value;
            var lugar = document.querySelector('#lugar').value;
            var hora = document.querySelector('#hora').value;
            var participantes = document.querySelector('#participantes').value;

            if (nombre!="" && fecha!="" && lugar!="" && hora!="" && participantes!=""){enviar=true;}else{alert("Faltan campos por rellenar");}
            
            if(enviar){
                document.querySelector('#nombre').value=nombre.trim();
                document.querySelector('#fecha').value=fecha.trim();
                document.querySelector('#lugar').value=lugar.trim();
                document.querySelector('#hora').value=hora.trim();
                document.querySelector('#participantes').value=participantes.trim();

                var formData = new FormData(document.getElementById("formularioEventos"));
                $.ajax({
                    url: "insertarEvento.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    contentType: false,
                    processData: false
                }).done(function(res){
                    alert(res);
                    document.querySelector('#nombre').value="";
                    document.querySelector('#fecha').value="";
                    document.querySelector('#lugar').value="";
                    document.querySelector('#hora').value="";
                    document.querySelector('#participantes').value="";
                    document.getElementById('eventsTableForm').style.display="none";
                    document.getElementById('btnAgregarEvent').style.display="block";
                    $('#eventsTable').DataTable().ajax.reload();
                    enviar =false;
                });
            }
            break;

        case "cancelarREventos":
            document.querySelector('#nombre').value="";
            document.querySelector('#fecha').value="";
            document.querySelector('#lugar').value="";
            document.querySelector('#hora').value="";
            document.querySelector('#participantes').value="";
            document.getElementById('eventsTableForm').style.display="none";
            document.getElementById('btnAgregarEvent').style.display="block";
            break;
        
        case "usuarios":
            var enviar = false;
            const nombres = document.querySelector('#nombres').value;
            const apellidos = document.querySelector('#apellidos').value;
            const usuario = document.querySelector('#usuario').value;
            const contrasenia = document.querySelector('#contrasenia').value;
            const email = document.querySelector('#email').value;
            const cc = document.querySelector('#cc').value;
            const tel = document.querySelector('#tel').value;
                
            //validar

            if (nombres!="" && apellidos!="" && usuario!="" && email!="" && cc!="" && tel!="" && contrasenia!=""){enviar=true;}else{alert("Faltan campos por rellenar");}
            
            if(enviar){
                document.querySelector('#nombres').value=nombres.trim();
                document.querySelector('#apellidos').value=apellidos.trim();
                document.querySelector('#usuario').value=usuario.trim();
                document.querySelector('#contrasenia').value=contrasenia.trim();
                document.querySelector('#email').value=email.trim();
                document.querySelector('#cc').value=cc.trim();
                document.querySelector('#tel').value=tel.trim();

                var formData = new FormData(document.getElementById("formularioUsuarios"));
                formData.append('coleccion','usuarios');
                $.ajax({
                    url: "registry.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(res){
                    var datos = JSON.parse(res);
                    if(datos.contador==0){
                        alert("Nuevo Usuario Agregado!");
                        document.querySelector('#nombres').value="";
                        document.querySelector('#apellidos').value="";
                        document.querySelector('#usuario').value="";
                        document.querySelector('#contrasenia').value="";
                        document.querySelector('#email').value="";
                        document.querySelector('#cc').value="";
                        document.querySelector('#tel').value="";
                        document.getElementById("newUserForm").style.display="none";
                        document.getElementById("btnAgregarUsuario").style.display="block"; 
                        $('#usersTable').DataTable().ajax.reload();
                        enviar =false; 
                    }else{
                        alert(datos.mensaje);
                        enviar =false;
                    }
                    
                });
            }
            break;

        case "cancelarRUsuario":
            document.querySelector('#nombres').value="";
            document.querySelector('#apellidos').value="";
            document.querySelector('#usuario').value="";
            document.querySelector('#contrasenia').value="";
            document.querySelector('#email').value="";
            document.querySelector('#cc').value="";
            document.querySelector('#tel').value="";
            document.getElementById("newUserForm").style.display="none";
            document.getElementById("btnAgregarUsuario").style.display="block"; 
            break; 
    }
}

function crearEscuchadores(){
    var elemento3 = document.getElementById('inicio');
    elemento3.addEventListener('click',escuchador3);
    var elemento4 = document.getElementById('quienes');
    elemento4.addEventListener('click',escuchador3);
    var elemento5 = document.getElementById('eventos');
    elemento5.addEventListener('click',escuchador3);
    var elemento6 = document.getElementById('contacto');
    elemento6.addEventListener('click',escuchador3);
    var elemento7 = document.getElementById('administrarEventos');
    elemento7.addEventListener('click',escuchador3);
    var elemento8 = document.getElementById('administrarUsuarios');
    elemento8.addEventListener('click',escuchador3);
    var elemento9 = document.getElementById('administrarContenido');
    elemento9.addEventListener('click',escuchador3);
}  

//-----------------------------------------------------------
function escuchador3(evento){
    switch (evento.target.id){
        case "inicio":
            document.getElementById("carrousel").style.display="block";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="block";
            break;
        case "eventos":
            document.getElementById("carrousel").style.display="block";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="block";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "quienes":
            document.getElementById("carrousel").style.display="block";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="block";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "contacto":
            document.getElementById("carrousel").style.display="block";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="block";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "administrarEventos":
            document.getElementById("carrousel").style.display="none";
            document.getElementById("adminEventos").style.display="block";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="none";
            break;
        case "administrarUsuarios":
            document.getElementById("carrousel").style.display="none";
            document.getElementById("adminUsuarios").style.display="block";
            document.getElementById("adminContenido").style.display="none";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="none";
            break;
        case "administrarContenido":
            document.getElementById("carrousel").style.display="none";
            document.getElementById("adminContenido").style.display="block";
            document.getElementById("adminUsuarios").style.display="none";
            document.getElementById("adminEventos").style.display="none";
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("datosInicio").style.display="none";
            break;
    }
}
//-----------------------------------------------------------
function pedirDatos() {
    $.ajax({
    url: 'crearItems.php',
    type: 'GET',
    success: function(response) {
        const datos = JSON.parse(response);
        datosArticulos = datos.articulos["articulos"];
        datosQuienes = datos.secciones["secciones"];
        datosEventosIns = datos.eventos["eventos"];
        insertarDatos();
    }
    });
}
//---------------------------------------------------
function insertarDatos(){
    var datosArt = document.getElementById("datosInicio");
    var articulos = "";
    for(let num in datosArticulos){
        articulos+="<div class='card text-white bg-success mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header'>Articulo</div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosArticulos[num]["titulo"]+"</h5>"
            +"<p>"+datosArticulos[num]["contenido"]+"</p></div></div>";
    }
    datosArt.innerHTML=articulos;

    var datosSecciones = document.getElementById("datosQuienesSomos");
    var secciones = "";
    for(let num2 in datosQuienes){
        secciones+="<div class='card text-white bg-info mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header'>Articulo</div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosQuienes[num2]["titulo"]+"</h5>"
            +"<p>"+datosQuienes[num2]["contenido"]+"</p></div></div>";
    }
    datosSecciones.innerHTML=secciones;

    var datosEventos = document.getElementById("datosEventos");
    var eventos = "";
    for(let num3 in datosEventosIns){
        eventos+="<div class='card text-white bg-info mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header'>Evento</div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosEventosIns[num3]["nombre"]+"</h5>"+
            "Fecha : "+"<p>"+datosEventosIns[num3]["fecha"]+"</p>"+
            "Lugar : "+"<p>"+datosEventosIns[num3]["lugar"]+"</p>"+
            "Hora : "+"<p>"+datosEventosIns[num3]["hora"]+"</p>"+
            "Participantes : "+"<p>"+datosEventosIns[num3]["participantes"]+"</p>"+"</div></div>";
    }
    datosEventos.innerHTML="<h1 class='p-3' style='text-align:center;'>EVENTOS</h1>"+eventos;
}