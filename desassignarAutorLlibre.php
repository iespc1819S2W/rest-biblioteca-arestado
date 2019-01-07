<?php

// get autor
$base = __DIR__;
require_once("$base/model/llibres.class.php");
$llibre=new llibre();

if (isset($_POST["id_aut"]) && isset($_POST["id_llib"])) {
    $id_aut = $_POST["id_aut"];
    $id_llib = $_POST["id_llib"];
    
    $res=$llibre->unassignAutor($id_llib, $id_aut);
    header('Content-type: application/json');
    echo json_encode($res);

} else {
    header('Content-Type: application/json');
    echo json_encode("id_llib i id_aut són obligatòris.");
}


?>