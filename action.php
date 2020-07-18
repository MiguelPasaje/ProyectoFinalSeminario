<?php
    //action.php
if (extension_loaded("mongodb")){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        if($_POST['action'] == 'edit'){
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(
                ['id' => $_POST["id"]],[
                    'id' => $_POST["id"] ,
                    'nombre' => $_POST["nombre"] ,
                    'fecha' => $_POST["fecha"] ,
                    'lugar' => $_POST["lugar"] ,
                    'hora' => $_POST["hora"],
                    'participantes' => $_POST["participantes"] 
                ]
            );
            $manager->executeBulkWrite('hospital.eventos', $bulk);
            echo json_encode($_POST);
        }
        if($_POST['action'] == 'delete'){
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['id' => $_POST["id"]]);
            $result = $manager->executeBulkWrite('hospital.eventos', $bulk);
            echo json_encode($_POST);
        }
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
?>