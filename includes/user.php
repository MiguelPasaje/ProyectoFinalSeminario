<?php

class User{
    private $nombre;
    private $username;
    private $url;

    public function __construct(){
        $this->url     = "mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority";
    }

    public function userExists($user, $pass){
        try{

            $manager = new MongoDB\Driver\Manager($this->url);
            $md5pass = md5($pass);
        
            $filter = [
                'nombreUsuario' => $user,
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
                'nombreUsuario' => $user
            ];
            $query = new MongoDB\Driver\Query($filter);
            $cursor = $manager->executeQuery('hospital.usuarios', $query);

            foreach($cursor as $document){
                $document = json_decode(json_encode($document),true);
                $this->nombre = $document['nombre'];
                $this->usename = $document['nombreUsuario'];
            }
        }catch(MongoConnectionException $e){
            var_dump($e);
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}


//---------------------------------------------------------------
?>