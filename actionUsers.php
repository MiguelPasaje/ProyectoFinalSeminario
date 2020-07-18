<?php
    //action.php
if (extension_loaded("mongodb")){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        if($_POST['action'] == 'edit'){
            $bulk = new MongoDB\Driver\BulkWrite;
            if($_POST["usuario"]=="JorgeO"){
                $rol=md5("administrador");
            }else{
                $rol=md5("medico");
            }
            $bulk->update(
                ['usuario' => $_POST["usuario"]],[
                    'nombres' => $_POST["nombres"] ,
                    'apellidos' => $_POST["apellidos"] ,
                    'usuario' => $_POST["usuario"] ,
                    'contrasenia' => $_POST["contrasenia"] ,
                    'email' => $_POST["email"],
                    'cc' => $_POST["cc"],
                    'tel' => $_POST["tel"],
                    'rol' => $rol
                ]
            );
            $manager->executeBulkWrite('hospital.usuarios', $bulk);
            echo json_encode($_POST);
        }
        if($_POST['action'] == 'delete'){
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['usuario' => $_POST["usuario"]]);
            $result = $manager->executeBulkWrite('hospital.usuarios', $bulk);
            echo json_encode($_POST);
        }
    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
?>