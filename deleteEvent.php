<?php

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['lugar' => $_POST["lugar"]]);
    $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/parking?retryWrites=true&w=majority");
    $result = $manager->executeBulkWrite('parking.cars', $bulk);
    $mensaje = "Vehículo borrado con éxito";
    $datosExportados = array(
        "mensaje" => $mensaje
    );
    echo json_encode($datosExportados);

?>