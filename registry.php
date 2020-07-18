<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["usuario"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        
        $filter = [
            'usuario' => $_POST["usuario"]
        ];
        $bulk = new MongoDB\Driver\BulkWrite;
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $manager->executeQuery('hospital.usuarios', $query);
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
                'nombres' => $_POST["nombres"] ,
                'apellidos' => $_POST["apellidos"] ,
                'usuario' => $_POST["usuario"] ,
                'contrasenia' => md5($_POST["contrasenia"]) ,
                'email' => $_POST["email"] ,
                'cc' => $_POST["cc"],
                'tel' => $_POST["tel"],
                'rol' => md5("medico") 
            ];
            $bulk->insert($document2);
            $manager->executeBulkWrite("hospital.".$_POST["coleccion"], $bulk); 
            $mensaje = "Registro Exitoso!, su cuenta estará en espera de confirmación";
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