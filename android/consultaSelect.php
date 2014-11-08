<?php
    //Incluimos el archivo de conexión
    include_once ("conexion.php");
    function consultaSelect($idUsuario){
        try{
            $conexion = crearConexion();
            $sql = "SELECT nombre FROM prueba WHERE idUsuario = ?";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bind_param("i",$idUsuario);
            $sentencia->execute();
            /* A diferencia de lo anterior ahora con el método bind_result(),
             * es necesario declarar tantas varibles como datos que se piden
             * para este ejemplo es solo uno, obtenemos el dato que nos retorna
             * la consulta, si viene más de uno será necesario recorrer la
             * $sentencia en un ciclo hasta que el método feth() retorne false.
             */
            $sentencia->bind_result($nombre);
            //Preguntamos si retorno algo, método feth()
            if($sentencia->fetch()){
                $conexion->close();
                $sentencia->close();
                //Retornamos ese algo, referenciando la variable de bind_result()
                return $nombre;
            }else{
                $conexion->close();
                $sentencia->close();
                return "No encontrado";
            }
        }catch(Exception $e){
            echo $e;
            $conexion->close();
            $sentencia->close();
            return false;
        }
    }
?>