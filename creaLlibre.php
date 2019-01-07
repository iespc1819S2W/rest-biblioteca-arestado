<?php

// get autor
$base = __DIR__;
require_once("$base/model/llibres.class.php");
$llibre=new llibre();

$dades = array(
    "TITOL" => "LLIBRE  EN CHUP",
    "LLOCEDICIO" => "INCA",
    "FK_DEPARTAMENT" => "Català",
);



$res=$llibre->create($dades);
header('Content-type: application/json');
echo json_encode($res);

?>