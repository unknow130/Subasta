<?php
require_once "./Base.php";
$mensaje = Base::cerrarSubasta($_POST["tituloSubasta"]);
echo json_encode($mensaje);
?>