<?php

class User{
    private $nombre;
    private $nombres;
    private $apellidos;
    private $nombreUsuario;
    private $contrasenia;
    private $email;
    private $cc;
    private $tel;
    private $rol;
    private $url;

    public function __construct(){
        $this->url     = "mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority";
    }

    public function userExists($user, $pass){
        try{

            $manager = new MongoDB\Driver\Manager($this->url);
            $md5pass = md5($pass);
        
            $filter = [
                'usuario' => $user,
                'contrasenia' => $md5pass
            ];
            $query = new MongoDB\Driver\Query($filter);
            $cursor = $manager->executeQuery('hospital.usuarios', $query);

            $contador = 0;

            foreach($cursor as $document){
                $contador++;
            }
            
            if($contador){
                return true;
            }else{
                return false;
            }
        }catch(MongoConnectionException $e){
            var_dump($e);
        }
    }

    public function setUser($user){
        try{
            $manager = new MongoDB\Driver\Manager($this->url);
            $filter = [
                'usuario' => $user
            ];
            $query = new MongoDB\Driver\Query($filter);
            $cursor = $manager->executeQuery('hospital.usuarios', $query);

            foreach($cursor as $document){
                $document = json_decode(json_encode($document),true);
                $this->nombre = $document['nombres']." ". $document['apellidos'];
                $this->nombres = $document['nombres'];
                $this->apellidos = $document['apellidos'];
                $this->nombreUsuario = $document['usuario'];
                $this->contrasenia = $document['contrasenia'];
                $this->email = $document['email'];
                $this->cc = $document['cc'];
                $this->tel = $document['tel'];
                $this->rol = $document['rol'];
            }
        }catch(MongoConnectionException $e){
            var_dump($e);
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function getContrasenia(){
        return $this->contrasenia;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCc(){
        return $this->cc;
    }
    public function getTel(){
        return $this->tel;
    }
    public function getRol(){
        return $this->rol;
    }
}


//---------------------------------------------------------------
?>