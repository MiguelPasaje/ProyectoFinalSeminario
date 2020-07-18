<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        $query = new MongoDB\Driver\Query([]);
        $cursor = $manager->executeQuery('hospital.'.$_POST["collection"], $query);

        foreach($cursor as $document){
            $document = json_decode(json_encode($document),true);
            $arreglo["data"][] = $document;
        }

        echo json_encode($arreglo);

    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>