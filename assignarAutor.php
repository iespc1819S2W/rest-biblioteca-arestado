<?php

$base = __DIR__;
require_once("$base/model/llibres.class.php");
$llibre = new llibre();

if ((isset($_POST['ID_LLIB'])) && (isset($_POST['ID_AUT']))) {
    $idLlibre = $_POST['ID_LLIB'];
    $idAutor = $_POST['ID_AUT'];
    $res = $llibre->assignAutor($idLlibre, $idAutor);
} else {
    $res = new Resposta();
    $res->SetCorrecta(false, "Error als id.");
}

header('Content-type: application/json');
echo json_encode($res);

?>
