
crearEscuchadores();
function crearEscuchadores(){
    var elemento4 = document.getElementById('btnCancelarReg');
    elemento4.addEventListener('click',escuchador3);
} 
//-----------------------------------------------------------
document.getElementById('loginImg').style.backgroundImage='url("../img/login.png")';
document.getElementById('loginImg').style.backgroundSize='contain';
document.getElementById('loginImg').style.height=document.getElementById('loginImg').clientWidth+'px';
document.getElementById('loginImg').style.backgroundRepeat='no-repeat';
//-----------------------------------------------------------
function mostrarFormReg(){
    document.getElementById("login").style.display="none";
    document.getElementById("registry").style.display="block"; 
    document.getElementById("btnRegistrar").style.display="block";
    document.getElementById("btnCancelarReg").style.display="block";  
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
                    document.getElementById("login").style.display="block"; 
                }else{
                    alert(datos.mensaje);
                };
                enviar =false;
            });
    }           
}
//-----------------------------------------------------------
function escuchador3(evento){
    document.getElementById("registry").style.display="none";
    document.getElementById("login").style.display="block";
}
//-----------------------------------------------------------