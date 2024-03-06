<?php
require_once "./Base.php";
$datos = Base::comprobarUser($_REQUEST["usuario"],$_REQUEST["password"]);
echo json_encode($datos)
?>