<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["nombre"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");
        
        $filter = [
            'userName' => $_POST["nombre"],
            'pass' => $_POST["contrasenia"]
        ];
        
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $manager->executeQuery('parking.users', $query);
    
        $contador = 0;
        $userName = "";
        $pass = "";
        $email = "";
        $name = "";
        $lastName = "";
        $cc = "";
        $tel = "";
        
        foreach($cursor as $document){
            $document = json_decode(json_encode($document),true);
            $contador++;
            $userName = $document["userName"];
            $pass = $document["pass"];
            $email = $document["email"];
            $name = $document["name"];
            $lastName = $document["lastName"];
            $cc = $document["cc"];
            $tel = $document["tel"];
        }
        $datosExportados = array(
            "userName" => $userName,
            "pass" => $pass,
            "email" => $email,
            "name" => $name,
            "lastName" => $lastName,
            "cc" => $cc,
            "tel" => $tel,
            "contador" => $contador
        );
        echo json_encode($datosExportados);
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>