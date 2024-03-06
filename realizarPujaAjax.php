<?php
    require_once "./Base.php";

        //Obtenemos el precio actual por el que va la puja
        $precioActualEnSubasta = Base::verPrecioActualSubasta($_POST["tituloSubasta"]);
        $id_subasta = Base::verIdSubasta($_POST["tituloSubasta"]);
        //Ahora comprobamos si el dinero que ha introducido el usuario es mayor al precio actual de la subasta
        if ($_POST["montoPuja"] > $precioActualEnSubasta) {
            //Ahora si es mayor la cantidad introducida por el usuario realizaremos la puja
            $fechaPujaUsuario = date("Y-m-d");
            $id_usuario = Base::obtenerIDUsuario($_POST["nombreUsuarioPuja"]);
            $mensaje = Base::realizarPuja($fechaPujaUsuario,$_POST["montoPuja"],$id_usuario,$id_subasta);
            //echo $mensaje;
            //Actualizamos el precio actual del objeto en la tabla subastas para que los usuarios lo puedan ver
            $mensaje = Base::actualizarPrecioEnSubasta($id_subasta,$_POST["montoPuja"]);
            echo json_encode($mensaje);
        }
?>