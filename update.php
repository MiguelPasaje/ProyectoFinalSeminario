<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["usuario"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            ['userName' => $_POST["usuario"]],[
                'userName' => $_POST["usuario"] ,
                'pass' => $_POST["contraseniaReg"] ,
                'email' => $_POST["email"] ,
                'name' => $_POST["nombres"] ,
                'lastName' => $_POST["apellidos"] ,
                'cc' => $_POST["cc"],
                'tel' => $_POST["tel"] ]
        );
        $manager->executeBulkWrite('parking.users', $bulk);
        $mensaje =array("mensaje" => "Datos Guardados correctamente");
        echo json_encode($mensaje);
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>