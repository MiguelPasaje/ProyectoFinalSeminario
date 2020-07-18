<?php
    //action.php
if (extension_loaded("mongodb")){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        if($_POST['action'] == 'edit'){
            $bulk = new MongoDB\Driver\BulkWrite;

            $document = [
                'nombres' => $_POST["nombres"] ,
                'apellidos' => $_POST["apellidos"] ,
                'usuario' => $_POST["usuario"] ,
                'contrasenia' => $_POST["contrasenia"] ,
                'email' => $_POST["email"] ,
                'cc' => $_POST["cc"],
                'tel' => $_POST["tel"],
                'rol' => md5("medico") 
            ];
            $bulk->insert($document);
            $manager->executeBulkWrite('hospital.usuarios', $bulk);

            $bulk2 = new MongoDB\Driver\BulkWrite;
            $bulk2->delete(['usuario' => $_POST["usuario"]]);
            $result = $manager->executeBulkWrite('hospital.usuariosTemporales', $bulk2);

            echo json_encode($_POST);
        }
        if($_POST['action'] == 'delete'){
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['usuario' => $_POST["usuario"]]);
            $result = $manager->executeBulkWrite('hospital.usuariosTemporales', $bulk);
            echo json_encode($_POST);
        }
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
?>