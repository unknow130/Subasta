<?php
    require_once "./Base.php";
    if (isset($_POST["idPeticion"]) && isset($_POST["aceptarPeticion"])) {
        echo $_POST["idPeticion"];
        //Explicacion del flujo:
        //AQUI FALTA PREGUNTAR SI EL NOMBRE DE USUARIO EXISTE
        //1.- ACEPTAMOS LA PETICION
        $mensaje = Base::aceptarPeticion($_POST["idPeticion"]);
        //2.- Obtenemos el ID del usuario 
        //echo $mensaje;
        $id_usuario = Base::obtenerIDUsuario($_POST["nombre_usuario"]);
        echo $id_usuario;
        //3.- añadimos el objeto a la BBDD para iniciar la subasta 
        $mensaje = Base::registrarObjeto($_POST["nombre"],$_POST["descripcion"],$_POST["historia"],$id_usuario,$_POST["tipo_objeto"],$_POST["precio_inicial"]);
        //echo $mensaje;
        //4.- obtenemos el id del objeto para añadirlo a unas BBDD a la tabla de subastas y poder iniciar el proceso
        $idObjeto = Base::obtenerIDObjeto($_POST["nombre"]);
        // 5.- registramos la subasta para iniciar el proceso
        $fechaInicial = date("Y-m-d"); // Fecha inicial
        $diasASumar = 2; // Número de días a sumar

        $fechaFinal = date("Y-m-d", strtotime($fechaInicial . " + " . $diasASumar . " days"));
        echo $fechaFinal;
                $mensaje = Base::inicioSubasta($_POST["nombre"],$_POST["descripcion"],$fechaInicial,$fechaFinal,$_POST["precio_inicial"],$_POST["precio_inicial"],"activa",$id_usuario,$idObjeto);
        // En este momento ya hemos inciado el proceso de subasta y pueden participar los usuarios
        echo $mensaje;
    };

    if (isset($_POST["idPeticion"]) && isset($_POST["denegarPeticion"])) {
        $mensaje = Base::denegarPeticion($_POST["idPeticion"]);
        echo $mensaje;
    }

    if (isset($_POST["startPuja"])) {
        //Obtenemos el precio actual por el que va la puja
        $precioActualEnSubasta = Base::verPrecioActualSubasta($_POST["tituloSubasta"]);
        $id_subasta = Base::verIdSubasta($_POST["tituloSubasta"]);
        //Ahora comprobamos si el dinero que ha introducido el usuario es mayor al precio actual de la subasta
        if ($_POST["montoPuja"] > $precioActualEnSubasta) {
            //Ahora si es mayor la cantidad introducida por el usuario realizaremos la puja
            $fechaPujaUsuario = date("Y-m-d");
            $id_usuario = Base::obtenerIDUsuario($_POST["nombreUsuarioPuja"]);
            $mensaje = Base::realizarPuja($fechaPujaUsuario,$_POST["montoPuja"],$id_usuario,$id_subasta);
            echo $mensaje;
            //Actualizamos el precio actual del objeto en la tabla subastas para que los usuarios lo puedan ver
            $mensaje = Base::actualizarPrecioEnSubasta($id_subasta,$_POST["montoPuja"]);
            echo $mensaje;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mensajes de Consultas de la Base de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        #container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .success {
            background-color: #b3ffb3;
            color: #008000;
        }

        .error {
            background-color: #ffcccc;
            color: #ff0000;
        }

        .warning {
            background-color: #ffe066;
            color: #ff9900;
        }
    </style>
</head>

<body>
    <?php
    // Aquí va el código para obtener y mostrar los mensajes de las consultas de la base de datos
    ?>

    <div id="container">
        <h1>Mensajes de Consultas de la Base de Datos</h1>
        <table>
            <tr>
                <th>Consulta</th>
                <th>Resultado</th>
            </tr>
            <tr class="success">
                <td>SELECT * FROM usuarios;</td>
                <td>Consulta exitosa. Se obtuvieron todos los usuarios.</td>
            </tr>
            <tr class="error">
                <td>INSERT INTO productos (nombre, precio) VALUES ('iPhone', 999);</td>
                <td>Error al ejecutar la consulta. El producto ya existe en la base de datos.</td>
            </tr>
            <tr class="warning">
                <td>UPDATE usuarios SET nombre='Juan' WHERE id=1;</td>
                <td>Advertencia: La consulta afectó a múltiples registros.</td>
            </tr>
            <!-- Agrega más filas con mensajes de consultas aquí -->
        </table>
    </div>
</body>

</html>
