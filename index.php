<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    if($user->getRol()==md5('administrador')){
        include_once 'vistas/admin.php';
    }else{
        include_once 'vistas/home.php';
    }
}else if(isset($_POST['nombre']) && isset($_POST['contrasenia'])){
    
    $userForm = $_POST['nombre'];
    $passForm = $_POST['contrasenia'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        if($user->getRol()==md5('administrador')){
            include_once 'vistas/admin.php';
        }else{
            include_once 'vistas/home.php';
        }
    }else{
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        //include_once 'vistas/login.php';
        header('Location: vistas/login.php');
    }
}else{
    //echo "login";
    include_once 'vistas/default.php';
}

?>