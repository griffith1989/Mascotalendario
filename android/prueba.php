<?php
    //Incluimos el archivo de conexión
    include_once('consultaInsert.php');
 	include_once('consultaSelect.php');

    if(consultaInsert(4,"Marcos")){
    	echo "usuario registrado<br>";
    }

    $resultado=consultaSelect(2);
    echo $resultado;

    ?>