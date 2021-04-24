<?php
$filename = $_GET["name"];
$check = strstr($filename, '.php');
if($check == ".php")
  {
  echo "Please Enter a Valid File";
  }else
  {
ob_end_clean();
header("Content-Type: application/octet-stream;");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ". filesize($filename).";");
header("Content-disposition: attachment; filename=" . $filename);
readfile($filename);
die();
  }
?>