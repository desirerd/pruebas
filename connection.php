<?php

    //datos de conexion a la BD
    $host_name = 'db5011284936.hosting-data.io';
    $database = 'dbs9527340';
    $user_name = 'dbu1062539';
    $password = '@Kumar2023';

    //Creamos la conexión
    
    $connectiondb = mysqli_connect($host_name,$user_name,$password,$database,);

    //Comprobamos la conexion
    if (mysqli_connect_errno()){

        echo "Error de Conexión: " . mysqli_connect_error();
    }
    
    /*
    try{
        $connectiondb = mysqli_connect($host_name,$user_name,$password,$database,);

    }catch (Exception $e){
        die('No se ha podido conetar con la base de datos: '.$e->getMessage());
    }
    */
  
?>
