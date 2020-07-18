<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["usuario"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            ['nombreUsuario' => $_POST["usuario"]],[
                'nombres' => $_POST["nombres"] ,
                'apellidos' => $_POST["apellidos"] ,
                'nombreUsuario' => $_POST["usuario"] ,
                'contrasenia' => md5($_POST["contraseniaReg"]) ,
                'email' => $_POST["email"] ,
                'cc' => $_POST["cc"],
                'tel' => $_POST["tel"],
                'rol' => md5("medico")  ]
        );
        $manager->executeBulkWrite('hospital.usuarios', $bulk);
        $mensaje =array("mensaje" => "Datos Guardados correctamente");
        echo json_encode($mensaje);
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>