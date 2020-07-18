var datosUsuario = new Object();
var datosArticulos = new Object();
var datosQuienes = new Object();
var datosEventosIns = new Object();

//---------------------------------------------------
crearEscuchadores();
pedirDatos();
function crearEscuchadores(){
    var elemento1 = document.getElementById('registryLink');
    elemento1.addEventListener('click',escuchador3);
    var elemento2 = document.getElementById('btnCancelarReg');
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
function registrarUsuario(){
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
        formData.append('coleccion','usuariosTemporales');
        $.ajax({
            url: "registry.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
                const datos = JSON.parse(res);
                if(datos.contador==0){
                    alert(datos.mensaje);
                    document.getElementById("registry").style.display="none";
                    document.getElementById("datosPagina").style.display="block";
                }else{
                    alert(datos.mensaje);
                };
                enviar =false;
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
            document.getElementById("datosInicio").style.display="block";
            break;
        case "eventos":
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="block";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("datosInicio").style.display="none";

            break;
        case "quienes":
            document.getElementById("datosQuienesSomos").style.display="block";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="none";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("datosInicio").style.display="none";

            break;
        case "contacto":
            document.getElementById("datosQuienesSomos").style.display="none";
            document.getElementById("datosEventos").style.display="none";
            document.getElementById("datosContacto").style.display="block";
            document.getElementById("registry").style.display="none"; 
            document.getElementById("datosInicio").style.display="none";

            break;
        case "registryLink":
            document.getElementById("datosPagina").style.display="none";
            document.getElementById("registry").style.display="block"; 
            document.getElementById("btnRegistrar").style.display="block";
            document.getElementById("btnCancelarReg").style.display="block";  
            break;
        case "btnCancelarReg":
            document.getElementById("registry").style.display="none";
            document.getElementById("datosPagina").style.display="block"; 
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
//-----------------------------------------------------

//---------------------------------------------------
function insertarDatos(){
    var datosArt = document.getElementById("datosInicio");
    var articulos = "";
    for(let num in datosArticulos){
        var numero1 = generarNum(11,21);
        var cadena = "./img/"+numero1+".jpg";
        articulos+="<div class='card text-white bg-success mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header' style='background-image: url("+cadena+"); height:300px; background-size:cover;'></div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosArticulos[num]["titulo"]+"</h5>"
            +"<p>"+datosArticulos[num]["contenido"]+"</p></div></div>";
    }
    datosArt.innerHTML=articulos;

    var datosSecciones = document.getElementById("datosQuienesSomos");
    var secciones = "";
    var cadena3 = "./img/fondo.jpg";
    for(let num2 in datosQuienes){
        secciones+="<div class='card text-white bg-info mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header' style='background-image: url("+cadena3+");height:50px;'></div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosQuienes[num2]["titulo"]+"</h5>"
            +"<p>"+datosQuienes[num2]["contenido"]+"</p></div></div>";
    }
    datosSecciones.innerHTML=secciones;

    var datosEventos = document.getElementById("datosEventos");
    var eventos = "";
    for(let num3 in datosEventosIns){
        var numero2 = generarNum(21,31);
        var cadena2 = "./img/"+numero2+".jpg";
        eventos+="<div class='card text-white bg-info mb-3' style='min-width: 25%; display:flex; float:left;'>"
        +"<div class='card-header' style='background-image: url("+cadena2+"); height:200px; background-size:cover;'></div>"
        +"<div class='card-body'>"
            +"<h5 class='card-title'>"+datosEventosIns[num3]["nombre"]+"</h5>"+
            "Fecha : "+"<p>"+datosEventosIns[num3]["fecha"]+"</p>"+
            "Lugar : "+"<p>"+datosEventosIns[num3]["lugar"]+"</p>"+
            "Hora : "+"<p>"+datosEventosIns[num3]["hora"]+"</p>"+
            "Participantes : "+"<p>"+datosEventosIns[num3]["participantes"]+"</p>"+"</div></div>";
    }
    datosEventos.innerHTML="<h1 class='p-3' style='text-align:center;'>EVENTOS</h1>"+eventos;
}

function generarNum(min,max){
    return Math.floor(Math.random() * (max - min)) + min;
}