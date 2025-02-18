<?php
if(isset($_SESSION['Uid']) && $debug=0){

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$data = date('Y/m/d');

$hora = date("h:i a");;

$user = $_SESSION['Uid'];



$query = "INSERT INTO logs (idadmin, url, data, hora) VALUES ('$user', '$url', '$data', '$hora');";



$res = my_query($query);

}
?>