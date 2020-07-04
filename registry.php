<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["usuario"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");
        
        $filter = [
            'userName' => $_POST["usuario"]
        ];
        $bulk = new MongoDB\Driver\BulkWrite;
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $manager->executeQuery('parking.users', $query);
        $contador=0;
        foreach($cursor as $document){
            $document = json_decode(json_encode($document),true);
            $contador++;
        }

        $mensaje = "";

        if($contador==1){
            $mensaje = 'Error, el nombre de ususario ya existe';
        }else{
            $document2 = [
                'userName' => $_POST["usuario"] ,
                'pass' => $_POST["contraseniaReg"] ,
                'email' => $_POST["email"] ,
                'name' => $_POST["nombres"] ,
                'lastName' => $_POST["apellidos"] ,
                'cc' => $_POST["cc"],
                'tel' => $_POST["tel"] 
            ];
            $bulk->insert($document2);
            $manager->executeBulkWrite('parking.users', $bulk); 
            $mensaje = "Registro Exitoso!";
        }
        $datosExportados = array(
            "mensaje" => $mensaje,
            "contador" => $contador
        );
        echo json_encode($datosExportados);
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>