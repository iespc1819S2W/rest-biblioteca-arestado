<?php
// UPDATE LLIBRES
 $base = __DIR__;
 require_once("$base/model/llibres.class.php");
 $llibre=new llibre();
 $dades = array(
    array(
      
      "TITOL" => "Prova Update",
      "NUMEDICIO" => "9999",
      "ISBN" => 66666666
    )
);

 $res=$llibre->update($dades);
 header('Content-type: application/json');
 echo json_encode($res);
 
 ?>