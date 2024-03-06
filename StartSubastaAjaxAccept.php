<?php
require_once "./Base.php";
        //AQUI FALTA PREGUNTAR SI EL NOMBRE DE USUARIO EXISTE
        //1.- ACEPTAMOS LA PETICION
        Base::aceptarPeticion($_POST["idPeticion"]);
        //2.- Obtenemos el ID del usuario 
        //echo $mensaje;
        $id_usuario = Base::obtenerIDUsuario($_POST["nombre_usuario"]);
        //echo $id_usuario;
        //3.- añadimos el objeto a la BBDD para iniciar la subasta 
        $mensaje = Base::registrarObjeto($_POST["nombre"],$_POST["descripcion"],$_POST["historia"],$id_usuario,$_POST["tipo_objeto"],$_POST["precio_inicial"]);
        //echo $mensaje;
        //4.- obtenemos el id del objeto para añadirlo a unas BBDD a la tabla de subastas y poder iniciar el proceso
        $idObjeto = Base::obtenerIDObjeto($_POST["nombre"]);
        // 5.- registramos la subasta para iniciar el proceso
        $fechaInicial = date("Y-m-d"); // Fecha inicial
        $diasASumar = 2; // Número de días a sumar

        $fechaFinal = date("Y-m-d", strtotime($fechaInicial . " + " . $diasASumar . " days"));
        //echo $fechaFinal;
        Base::inicioSubasta($_POST["nombre"],$_POST["descripcion"],$fechaInicial,$fechaFinal,$_POST["precio_inicial"],$_POST["precio_inicial"],"activa",$id_usuario,$idObjeto);
        // En este momento ya hemos inciado el proceso de subasta y pueden participar los usuarios
        //echo $mensaje;
        $mensaje = "Subasta iniciada con existo!";
        echo json_encode($mensaje);
?>