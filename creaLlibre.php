<?php

// get autor
$base = __DIR__;
require_once("$base/model/llibres.class.php");
$llibre=new llibre();
$dades = array(
    // "TITOL" => "LLIBRE  EN CHUP",
    // "LLOCEDICIO" => "INCA",
    // "FK_DEPARTAMENT" => "Català",
);
if (isset($_POST["TITOL"])) {
    $dades["TITOL"] = $_POST["TITOL"];
}
if (isset($_POST["NUMEDICIO"])) {
    $dades["NUMEDICIO"] = $_POST["NUMEDICIO"];
}
if (isset($_POST["LLOCEDICIO"])) {
    $dades["LLOCEDICIO"] = $_POST["LLOCEDICIO"];
}
if (isset($_POST["ANYEDICIO"])) {
    $dades["ANYEDICIO"] = $_POST["ANYEDICIO"];
}
if (isset($_POST["DESCRIP_LLIB"])) {
    $dades["DESCRIP_LLIB"] = $_POST["DESCRIP_LLIB"];
}
if (isset($_POST["ISBN"])) {
    $dades["ISBN"] = $_POST["ISBN"];
}
if (isset($_POST["DEPLEGAL"])) {
    $dades["DEPLEGAL"] = $_POST["DEPLEGAL"];
}
if (isset($_POST["SIGNTOP"])) {
    $dades["SIGNTOP"] = $_POST["SIGNTOP"];
}
if (isset($_POST["DATBAIXA_LLIB"])) {
    $dades["DATBAIXA_LLIB"] = $_POST["DATBAIXA_LLIB"];
}
if (isset($_POST["MOTIUBAIXA"])) {
    $dades["MOTIUBAIXA"] = $_POST["MOTIUBAIXA"];
}
if (isset($_POST["FK_COLLECCIO"])) {
    $dades["FK_COLLECCIO"] = $_POST["FK_COLLECCIO"];
}
if (isset($_POST["FK_DEPARTAMENT"])) {
    $dades["FK_DEPARTAMENT"] = $_POST["FK_DEPARTAMENT"];
}
if (isset($_POST["FK_IDEDIT"])) {
    $dades["FK_IDEDIT"] = $_POST["FK_IDEDIT"];
}
if (isset($_POST["FK_LLENGUA"])) {
    $dades["FK_LLENGUA"] = $_POST["FK_LLENGUA"];
}
if (isset($_POST["IMG_LLIB"])) {
    $dades["IMG_LLIB"] = $_POST["IMG_LLIB"];
}





$res=$llibre->create($dades);
header('Content-type: application/json');
echo json_encode($res);

?>