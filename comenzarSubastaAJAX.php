<?php
require_once "./Base.php";
$datos = Base::realizarPeticion($_POST["nombreObj"],$_POST["descripcion"],$_POST["historia"],$_POST["username"],$_POST["categoria"],$_POST["precioIni"]);
echo $datos;
?>