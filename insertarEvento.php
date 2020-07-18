<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb") && isset($_POST["nombre"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        $bulk = new MongoDB\Driver\BulkWrite;
        date_default_timezone_set('America/Bogota');
        $id = date('dmyhis');
        $document = [
            'id' => $id ,
            'nombre' => $_POST["nombre"] ,
            'fecha' => $_POST["fecha"] ,
            'lugar' => $_POST["lugar"] ,
            'hora' => $_POST["hora"] ,
            'participantes' => $_POST["participantes"]
        ];
        $bulk->insert($document);
        $manager->executeBulkWrite('hospital.eventos', $bulk); 
        $mensaje = "Se ha Agregado un nuevo Evento";
        echo ($mensaje);

    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}else{ echo "No se añadió nada";}
//---------------------------------------------------------------
?>