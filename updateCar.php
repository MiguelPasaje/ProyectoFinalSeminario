<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")&& isset($_POST["lugar"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");
        $bulk = new MongoDB\Driver\BulkWrite;
        date_default_timezone_set('America/Bogota');
        $fecha = date('d/m/y');
        $hora = date('h:i');
        $bulk->update(
            ['lugar' => $_POST["lugar"]],[
                'marca' => $_POST["marca"] ,
                'placa' => $_POST["placa"] ,
                'modelo' => $_POST["modelo"] ,
                'color' => $_POST["color"] ,
                'anio' => $_POST["anio"] ,
                'fecha' => $fecha ,
                'lugar' => $_POST["lugar"] ,
                'hora' => $hora ,
                'propietario' => $_POST["propietario"] ,
                'tel' => $_POST["tel"] ,
                'imagen' => $imagen ]
        );
        $manager->executeBulkWrite('parking.cars', $bulk);
        $mensaje =array("mensaje" => "Datos Guardados correctamente");
        echo json_encode($mensaje);
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>