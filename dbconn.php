<?php
require_once('function.php');
$conn = mysqli_connect('localhost','root',"",'phpweb');

if (!$conn) {
  die("Connection failed:". mysqli_connect_error());
}

?>
