<?php
    //Incluimos el archivo de conexión
    include_once ("conexion.php");
    function consultaInsert($idUsuario,$nombre){
        //Comenzamos con un ‘try’, por si algo falla(BD, conexión, etc)
        try{
            //Abrimos una conexión con el servidor
            $conexion = crearConexion();
            //Declaramos nuestra consulta
            $sql = "INSERT INTO prueba VALUES (?,?)";
            //Preparamos la consulta
            $stmt = $conexion->prepare($sql);
            /* Le damos los parámetros (símbolos ‘?’),
             * pueden ser de tipo ‘i’ = integer
             *                    ‘d’ = double
             *                    ‘s’ = string
             *                    ‘b’ = BLOB
             */
            mysqli_stmt_bind_param($stmt,'is',$idUsuario,$nombre);
            //Ejecutamos la consulta, si resulta exitosa el método execute()
            //retornará true
            if($stmt->execute()){
                //Cerramos la conexión y la stmt
                $conexion->close();
                $stmt->close();
                //Retornamos true, consulta satisfactoria
                return true;
            }
            //Sino surgió algún error y retornamos una cadena de error.
            else{
                $conexion->close();
                $stmt->close();
                return "Error en la insercion.";
            }
            //Si surge alguna excepción la capturamos e imprimimos,
            //retornamos false
        }catch(Exception $e){
            echo $e;
            $conexion->close();
            $stmt->close();
            return false;
        }
    }
?>