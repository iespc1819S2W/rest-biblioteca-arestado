<?php
// get autor
 $base = __DIR__;
 require_once("$base/model/llibres.class.php");
 $llibre=new llibre();
 $res=$llibre->getAll();
 header('Content-type: application/json');
 echo json_encode($res);
 
 ?>