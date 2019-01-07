<?php 
$base = __DIR__;
 require_once("$base/model/llibres.class.php");
 $llibre=new llibre();
 $where=$_GET['where'];
 $orderby=$_GET['orderby'];
 $res = $llibre->filter($where,$orderby);
  header('Content-type: application/json');
 echo json_encode($res);
 ?>