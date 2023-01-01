<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Lista de users mimi</title>
</head>
<body>
    <?php
        //mostrar los datos de la tabla 
        include("connection.php");

        //definimos nuestra consulta
        $consulta = "SELECT * FROM user";

        //creamos la conexion
        $datos = mysqli_query ($connectiondb, $consulta);
          
    ?>
        <table>
        <!--cabecera de la tabala-->
        <?php
        require 'header.php'
       
        ?>
        <a href="index.php">Desconectar</a><br>
        <a href="dashboard.php">Perfil</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>NICK</th>
                <th>EMAIL</th>
                <th>PHOTO</th>
            </tr>
        </thead>
        <tbody>

        <?php

        while($fila=mysqli_fetch_array($datos)){

            //los datos por cada fila de la base de datos lo alamacenamos en nuevas variables
            $id=$fila['id'];
            $name=$fila['name'];
            $nick=$fila['nick'];
            $email=$fila['email'];
            $photo=$fila['photo'];
            ?>
            <!--Mostramos los datos-->
            <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $nick; ?></td>
                    <td><?php echo $email; ?></td>
                    <td>
                        <img src="storephotos/<?php echo $photo;?>" width="150px"/>
                    </td>
                    <td>
                        <input type="submit" value="Validar" id="miBoton"/>
                        <button type="submit" id="boton" onclick="Fboton()"> validar </button>
                    </td>
                    <!--
                    <td>
                        <a class="edit" href="#"><button>Edit</button></a>
                        <a class="edit" href="#"><button>Delete</button></a>
                        <a class="edit" href="#"><button>See</button></a>
                    </td>
                    -->
                </tr>
            <?
        }
       
        ?>
      
</body>
<script>

function Fboton() {
	var miboton = document.getElementById('boton');
  if (miboton.textContent == 'validar') 
  miboton.textContent = 'validado';
  else miboton.textContent = 'validar'; 
}

</script>
</html>