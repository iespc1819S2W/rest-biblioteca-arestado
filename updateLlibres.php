<?php
// UPDATE LLIBRES
 $base = __DIR__;
 require_once("$base/model/llibres.class.php");
 $llibre=new llibre();
 $dades = array(
      
      "ID_LLIB" => "9999" ,
      "TITOL" => "Prova Update",
      "NUMEDICIO" => "55555555555",
      "ISBN" => 8888
    
);

 $res=$llibre->update($dades);
 header('Content-type: application/json');
 echo json_encode($res);
 
 ?>