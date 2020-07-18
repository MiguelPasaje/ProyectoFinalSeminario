var datosUsuario = new Object();
var datosArticulos = new Object();
var datosQuienes = new Object();
var datosEventosIns = new Object();
var numEventos=0;

//---------------------------------------------------
crearEscuchadores();
pedirDatos();
function crearEscuchadores(){
    var elemento1 = document.getElementById('detalles');
    elemento1.addEventListener('click',escuchador3);
    var elemento2 = document.getElementById('btnCancelar');
    elemento2.addEventListener('click',escuchador3);
    var elemento3 = document.getElementById('inicio');
    elemento3.addEventListener('click',escuchador3);
    var elemento4 = document.getElementById('quienes');
    elemento4.addEventListener('click',escuchador3);
    var elemento5 = document.getElementById('eventos');
    elemento5.addEventListener('click',escuchador3);
    var elemento6 = document.getElementById('contacto');
    elemento6.addEventListener('click',escuchador3);
}  
//-----------------------------------------------------------
function actualizarDatos(){
    var enviar = false;

    const nombres = document.querySelector('#nombres').value;
    const apellidos = document.querySelector('#apellidos').value;
    const usuario = document.querySelector('#usuario').value;
    const contraseniaReg = document.querySelector('#contraseniaReg').value;
    const email = document.querySelector('#email').value;
    const cc = document.querySelector('#cc').value;
    const tel2 = document.querySelector('#tel2').value;
        
    //validar

    if (nombres!="" && apellidos!="" && usuario!="" && email!="" && cc!="" && tel2!=""){enviar=true;}else{alert("Faltan campos por rellenar");}
    
    if(enviar){
        var formData = new FormData(document.getElementById("formularioReg"));
        $.ajax({
            url: "update.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
                const datos = JSON.parse(res);
                alert(datos.mensaje);
                enviar =false;
                document.getElementById("registry").style.display="none";
                document.getElementById("datosPagina").style.display="block"; 
            });
    }           
}
//-----------------------------------------------------------
function escuchador3(evento){
    switch (evento.target.id){
        case "inicio":
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("btnGuardar").style.display="none";
            document.getElementById("btnCancelar").style.display="none";
            document.getElementById("datosInicio").style.display="block";
            break;
        case "eventos":
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="block";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("btnGuardar").style.display="none";
            document.getElementById("btnCancelar").style.display="none";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "quienes":
            document.getElementById("datosQuienesSomos").style.display="block";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("btnGuardar").style.display="none";
            document.getElementById("btnCancelar").style.display="none";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "contacto":
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="block";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("btnGuardar").style.display="none";
            document.getElementById("btnCancelar").style.display="none";
            document.getElementById("datosInicio").style.display="none";

            break;
        case "detalles":
            document.getElementById("datosPagina").style.display="none";
            document.getElementById("registry").style.display="block"; 
            document.getElementById("btnGuardar").style.display="block";
            document.getElementById("btnCancelar").style.display="block";
            break;
        case "btnCancelar":
            document.getElementById("registry").style.display="none";
            document.getElementById("datosPagina").style.display="block"; 
            break;
    }
}
//-----------------------------------------------------------
function escuchador2(evento){
    alert(evento.target.id);
}
function pedirDatos() {
    $.ajax({
    url: 'crearItems.php',
    type: 'GET',
    success: function(response) {
        const datos = JSON.parse(response);
        datosArticulos = datos.articulos["articulos"];
        datosQuienes = datos.secciones["secciones"];
        datosEventosIns = datos.eventos["eventos"];
        numEventos =  datos["contadorEventos"];
        insertarDatos();
        for(var i=0;i<numEventos;i++){
            var elemento = document.getElementById("eventCard"+i);
            elemento.addEventListener('click',escuchador2);
        }
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
        eventos+="<div id='eventCard"+num3+"' class='evento card text-white bg-info mb-3' style='min-width: 25%; display:flex; float:left;'>"
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