<?php
//---------------------------------------------------------------
if (extension_loaded("mongodb")){
    try{
        $manager = new MongoDB\Driver\Manager("mongodb+srv://Andres:catacumba69@cluster0-jlyfz.mongodb.net/hospital?retryWrites=true&w=majority");
        $query = new MongoDB\Driver\Query([]);
        $cursor = $manager->executeQuery('hospital.articulos', $query);

        $contador = 0;
        $datosArticulos = '{"articulos":[';
        foreach($cursor as $document){
            $document = json_decode(json_encode($document),true);
            $contador++;
            $datosArticulos.='{"titulo":"'.$document["titulo"]
                .'","contenido":"'.$document["contenido"].'"},';
        }

        $datosArticulos = substr($datosArticulos, 0, -1); 
        $datosArticulos .= ']}';
        $items = json_decode($datosArticulos, true);

        $query2 = new MongoDB\Driver\Query([]);
        $cursor2 = $manager->executeQuery('hospital.datosTexto', $query2);

        $contador2 = 0;
        $datosQuienes = '{"secciones":[';
        foreach($cursor2 as $document2){
            $document2 = json_decode(json_encode($document2),true);
            $contador2++;
            $datosQuienes.='{"titulo":"'.$document2["titulo"]
                .'","contenido":"'.$document2["contenido"].'"},';
        }

        $datosQuienes = substr($datosQuienes, 0, -1); 
        $datosQuienes .= ']}';
        $items2 = json_decode($datosQuienes, true);

        $query3 = new MongoDB\Driver\Query([]);
        $cursor3 = $manager->executeQuery('hospital.eventos', $query3);

        $contador3 = 0;
        $eventos = '{"eventos":[';
        foreach($cursor3 as $document3){
            $document3 = json_decode(json_encode($document3),true);
            $contador3++;
            $eventos.='{"nombre":"'.$document3["nombre"]
                .'","fecha":"'.$document3["fecha"]
                .'","lugar":"'.$document3["lugar"]
                .'","hora":"'.$document3["hora"]
                .'","participantes":"'.$document3["participantes"]
                .'"},';
        }

        $eventos = substr($eventos, 0, -1); 
        $eventos .= ']}';
        $items3 = json_decode($eventos, true);

        $datosExportados = array(
            "contadorArticulos" => $contador,
            "articulos" => $items,
            "contadorSecciones" => $contador2,
            "secciones" => $items2,
            "contadorEventos" => $contador3,
            "eventos" => $items3
        );
        echo json_encode($datosExportados);

    }catch(MongoConnectionException $e){
        var_dump($e);
    }
}
//---------------------------------------------------------------
?>
