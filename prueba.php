<?php
require_once("./config/config.php");
require_once("./clases/_perfil_usuario.php");
require_once("./clases/_usuario.php");
require_once("./clases/_curso.php");
require_once("./clases/_categoria.php");

$curso = new curso();

$curso->descripcion = 'Curso apra adquirir las tecnicas basicas de rescate tecnico con cuerdas';
$curso->nombre = 'Rescate Técnico con cuerdas Nivel 1';
$curso->startDate = date('Ymd');
$curso->endDate = date('Ymd');
$curso->categoriaId = 2;
$curso->imagen = 'img/asdasdlasjhalksjdhasd.jpg';
$curso->archivo = 'pdf/asdsdjkfhsadfjhadsljkd.pdf';
$curso->lugar = 'Malargüe';
$curso->inscripcionAbierta = ESTADO_INACTIVO;
$curso->cupos = 35;
$curso->create();


?>