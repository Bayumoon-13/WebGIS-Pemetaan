<?php
$mysqli = new mysqli("dci14.dewaweb.com","peruma11_rancaekek","Perumahan12345_","peruma11_rck");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Error";
  exit();
}
else {
  echo "Konek";
  exit();
}
?>