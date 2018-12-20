<?php 
$base = __DIR__;
 require_once("$base/model/llibres.class.php");
 $llibre=new llibre();
 $id=$_GET['id_llib'];
 $res = $llibre->getOne($id);
  header('Content-type: application/json');
 echo json_encode($res);
 ?>