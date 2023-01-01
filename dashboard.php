<?php
include("connection.php");
//manenemos la sesión iniciada
session_start();

//recibimos el email correcto de database y volemos a realizar la consulat de ese usuario y lo mostramos en la tabla
$u_email = $_SESSION['email'];

$sql3 = "SELECT * FROM user WHERE email='$u_email'";
$datos_usuario = mysqli_query($connectiondb, $sql3);
$mi_fila = mysqli_fetch_array($datos_usuario);


?>
<a href="index.php">Desconectar</a><br>
<a href="userList.php">Listar usuarios</a>

<h1>Bienvenido a tu cuenta de usuario</h1>

 <table>
        <!--cabecera de la tabala-->
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
        //los datos por cada fila de la base de datos lo alamacenamos en nuevas variables
        $id=$mi_fila['id'];
        $name=$mi_fila['name'];
        $nick=$mi_fila['nick'];
        $email=$mi_fila['email'];
        $photo=$mi_fila['photo'];
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
            </tr>
        <?
?>
