<?php
require_once "./Base.php";
$mensaje = Base::denegarPeticion($_POST["idPeticion"]);
echo json_encode($mensaje);
?>