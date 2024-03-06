<?php
require_once "./Base.php";
$datos = Base::comprobarUsername($_REQUEST["usuario"]);
echo json_encode($datos)
?>