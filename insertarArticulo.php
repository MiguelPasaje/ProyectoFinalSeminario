<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb") && isset($_POST["titulo"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        $bulk = new MongoDB\Driver\BulkWrite;
        date_default_timezone_set('America/Bogota');
        $id = date('dmyhis');
        $document = [
            'id' => $id ,
            'titulo' => $_POST["titulo"] ,
            'contenido' => $_POST["contenido"]
        ];
        $bulk->insert($document);
        $manager->executeBulkWrite('hospital.'.$_POST["coleccion"], $bulk); 
        $mensaje = "Se ha Agregado un nuevo Artículo";
        echo ($mensaje);

    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}else{ echo "No se añadió nada";}
//---------------------------------------------------------------
?>