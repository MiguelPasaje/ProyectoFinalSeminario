<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb") && isset($_POST["placa"])){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");

        $bulk = new MongoDB\Driver\BulkWrite;

        $archivoNombre= $_FILES['imgFile']['name'];
        $imagen ="";
        date_default_timezone_set('America/Bogota');
        $fecha = date('d/m/y');
        $hora = date('h:i');  

        if($archivoNombre==""){$imagen="vacio.jpg";}
        else{
            $archivoTemLoc= $_FILES['imgFile']['tmp_name'];
            $archivoDir= "imgCars/".$_POST["lugar"].$archivoNombre;
            move_uploaded_file($archivoTemLoc,$archivoDir);
            $imagen=$_POST["lugar"].$archivoNombre;
        } 

        $document = [
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
            'imagen' => $imagen 
        ];

        $bulk->insert($document);

        $manager->executeBulkWrite('parking.cars', $bulk); 
        
        echo "Ha sido Agregado un nuevo Vehiculo";

    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}else{ echo "No se añadió nada";}
//---------------------------------------------------------------
?>