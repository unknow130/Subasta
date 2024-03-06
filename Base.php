<?php

    class Base {

        public static function realizarConexion(){   
            try {
                $conexion = new PDO("mysql:host=localhost; dbname=el_tesoro","root","");
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET utf8");
                return $conexion;
            }
            catch(Exception $e)
            {
              echo "Error al realizar la conexión: " . $e->getMessage();
            }    
        }

        public static function comprobarUser($username,$contrasenia) {
            try {
                $comprobar = "";

                $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contrasenia = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($username,$contrasenia)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                    $comprobar="Logeado correctamente";
                }
                else {
                    $comprobar="Datos incorrectos";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function registrarUsuario($nombre,$contrasenia,$apellidos,$email,$direccion,$telefono) {
            try {
                $comprobar = "";

                $sql = "INSERT INTO usuarios(nombre,contrasenia,apellidos,correo,direccion,telefono) VALUES(?,?,?,?,?,?)";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombre,$contrasenia,$apellidos,$email,$direccion,$telefono)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="Registrado correctamente";
                }
                else {
                    $comprobar="Datos incorrectos";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function comprobarUsername($nombre) {
            try {
                $respuesta = false;

                $sql = "SELECT nombre FROM usuarios WHERE nombre = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombre)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $respuesta =true;
                }
                return ($respuesta);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function realizarPeticion($nombre,$descripcion,$historia,$username,$catObj,$precioIni) {
            try {
                $comprobar = "";

                $sql = "INSERT INTO peticiones(nombre_objeto,descripcion,historia,nombre_usuario,tipo_objeto,precio_inicial) VALUES(?,?,?,?,?,?)";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombre,$descripcion,$historia,$username,$catObj,$precioIni)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="OK";
                }
                else {
                    $comprobar="FAILED";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function verPeticiones() {
            try {
                $arrayPrueba = array();
                $sql = "SELECT * FROM peticiones WHERE estado like 'en espera'";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(); //La ejecutamos
                while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $arrayPrueba[]=$fila;
                }
                return $arrayPrueba;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function aceptarPeticion($idPeticion) {
            try {
                $comprobar = "";

                $sql = "UPDATE peticiones SET estado = 'aceptada' WHERE id_peticion = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($idPeticion)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="La Peticion ha sido aceptada correctamente!";
                }
                else {
                    $comprobar="Error al aceptar la peticion";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function denegarPeticion($idPeticion) {
            try {
                $comprobar = "";

                $sql = "UPDATE peticiones SET estado = 'denegada' WHERE id_peticion = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($idPeticion)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="La Peticion ha sido denegada!";
                }
                else {
                    $comprobar="Error al denegar la peticion";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        //Al aceptar la peticion , almacenamos el objeto a subastar en la BBDD

        public static function registrarObjeto($nombre,$descripcion,$historia,$idPropietario,$tipoObjeto,$precioIni) {
            try {
                $comprobar = "";

                $sql = "INSERT INTO objetos(nombre,descripcion,historia,id_propietario,tipo_objeto,precio_inicial) values(?,?,?,?,?,?)";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombre,$descripcion,$historia,$idPropietario,$tipoObjeto,$precioIni)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="Objeto subido correctamente!";
                }
                else {
                    $comprobar="Error al subir el objeto la peticion";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function obtenerIDUsuario($username) {
            try {
                $idUser = "";
                $sql = "SELECT id FROM usuarios WHERE nombre = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($username)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $idUser=$fila["id"];
                }
                return $idUser;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }
        
        public static function obtenerIDObjeto($nombreObj) {
            try {
                $idObj = -1;
                $sql = "SELECT id_objeto FROM objetos WHERE nombre = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombreObj)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $idObj=$fila["id_objeto"];
                }
                return $idObj;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        //nombreObj --> titulo
        public static function inicioSubasta($nombreObj,$descripcion,$fechaIni,$fechaFin,$precioIni,$precioAct,$estado,$idPropietario,$idObj) {
            try {
                $comprobar = "";

                $sql = "INSERT INTO subastas(titulo,descripcion,fecha_inicio,fecha_fin,precio_inicial,precio_actual,estado,id_usuario,id_objeto) values(?,?,?,?,?,?,?,?,?)";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($nombreObj,$descripcion,$fechaIni,$fechaFin,$precioIni,$precioAct,$estado,$idPropietario,$idObj)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="Subasta Iniciada correctamente!";
                }
                else {
                    $comprobar="Error al iniciar la subasta";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function verSubastasActivas() {
            try {
                $arraySubastas = array();
                $sql = "SELECT * FROM subastas WHERE estado = 'activa'";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(); //La ejecutamos
                while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $arraySubastas[]=$fila;
                }
                return $arraySubastas;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function realizarPuja($fechaIni,$monto,$idUser,$idSubasta) {
            try {
                $comprobar = "";

                $sql = "INSERT INTO pujas(fecha,monto,id_usuario,id_subasta) values(?,?,?,?)";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($fechaIni,$monto,$idUser,$idSubasta)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="Puja Realizada correctamente!";
                }
                else {
                    $comprobar="Error al realizar la Puja";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function verPrecioActualSubasta($titulo) {
            try {
                $precioActual = 0;
                $sql = "SELECT precio_actual FROM subastas WHERE titulo = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($titulo)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $precioActual=$fila["precio_actual"];
                }
                return $precioActual;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function verIdSubasta($titulo) {
            try {
                $idSubasta = 0;
                $sql = "SELECT id_subasta FROM subastas WHERE titulo = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($titulo)); //La ejecutamos
                if ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $idSubasta=$fila["id_subasta"];
                }
                return $idSubasta;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function actualizarPrecioEnSubasta($idSubasta,$monto) {
            try {
                $comprobar = "";

                $sql = "UPDATE subastas SET precio_actual = ? WHERE id_subasta = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($monto,$idSubasta)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="El precio de la subasta ha sido actualizado con exito";
                }
                else {
                    $comprobar="El precio de la subasta no ha podido ser actualizada, lo sentimos...";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function cerrarSubasta($tituloSubasta) {
            try {
                $comprobar = "";

                $sql = "UPDATE subastas SET estado = 'finalizada' WHERE titulo = ?";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(array($tituloSubasta)); //La ejecutamos
                if ($conexion->prepare($sql)){ //Recorremos las columnas
                    $comprobar="Subasta Finalizada";
                }
                else {
                    $comprobar="Error al finalizar la subasta";
                }
                return ($comprobar);
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }

        public static function verHistoricoSubastas() {
            try {
                $arraySubastas = array();
                $sql = "SELECT * FROM subastas WHERE estado = 'finalizada'";
                $conexion=self::realizarConexion();
                $resultado=$conexion->prepare($sql); //Preparamos la consulta
                $resultado->execute(); //La ejecutamos
                while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)){ //Recorremos las columnas
                     $arraySubastas[]=$fila;
                }
                return $arraySubastas;
                $resultado->closeCursor(); //Cerramos la conexion
            } catch (PDOException $e){
                die ("Error RRRRRRR:". $e->GetMessage());
            }
        }
    }
?>