<?php

$base = __DIR__;
require_once("$base/model/llibres.class.php");
$llibre = new llibre();

if (isset($_POST['id_llib'])) {
    $id = $_POST['id_llib'];
    $res = $llibre->delete($id);
} else {
    $res = new Resposta();
    $res->SetCorrecta(false, "id requerit");
}

header('Content-type: application/json');
echo json_encode($res);
?>
