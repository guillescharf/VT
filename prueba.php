<?php
require_once("./config/config.php");
require_once("./clases/_perfil_usuario.php");
require_once("./clases/_usuarios.php");

$perfil = new perfil_usuario();

$perfil->id = 7;

$datos = $perfil->search();

echo "esta es la desc del objeto: $perfil->description ...<br>";

//var_dump($datos);
$user = new usuario();

$user->update();

?>