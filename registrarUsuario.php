<?php
require_once "./Base.php";
$datos = Base::registrarUsuario($_REQUEST["usuario"],$_REQUEST["password"],$_REQUEST["apellidos"],$_REQUEST["email"],$_REQUEST["direccion"],$_REQUEST["tlf"]);
echo json_encode($datos)
?>