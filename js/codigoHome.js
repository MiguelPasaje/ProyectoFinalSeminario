var datosUsuario = new Object();
//---------------------------------------------------
crearEscuchadores();
function crearEscuchadores(){
    var elemento1 = document.getElementById('detalles');
    elemento1.addEventListener('click',escuchador3);
    var elemento3 = document.getElementById('btnCancelar');
    elemento3.addEventListener('click',escuchador3);
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
        case "detalles":
            document.getElementById("datosPagina").style.display="none";
            document.getElementById("registry").style.display="block"; 
            document.getElementById("btnGuardar").style.display="block";
            document.getElementById("btnCancelar").style.display="block";
            document.querySelector('#nombres').value=datosUsuario.name;
            document.querySelector('#apellidos').value=datosUsuario.lastName;
            document.querySelector('#usuario').value=datosUsuario.userName;
            document.querySelector('#contraseniaReg').value=datosUsuario.pass;
            document.querySelector('#email').value=datosUsuario.email;
            document.querySelector('#cc').value=datosUsuario.cc;
            document.querySelector('#tel2').value=datosUsuario.tel;
            break;
        case "btnCancelar":
            document.getElementById("registry").style.display="none";
            document.getElementById("datosPagina").style.display="block"; 
            break;
    }
}
//-----------------------------------------------------------