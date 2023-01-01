<?php
//incluimos el fichero de conexión el cual contiene la conexion a la base de datos
include("connection.php");
session_start();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Recibimos los datos del formulario de registro y lo almacenamos en nuevas variables
$name = $_POST["name"];
$nick = $_POST["nick"];
$email = $_POST["email"];
//la contraseña
$password = $_POST["password"];
//contraseña cifrada
$password_cifrado = password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));

//Complicación para foto de perfil:
//archivo de tipo file
//almacenamos el nombre del archivo del formulario, el tipo y el tamaño
$photo = $_FILES["photo"]["name"];
//$tipo_archivo = $_FILES["archivo"]["type"];
$size_photo = $_FILES["photo"]["size"];
//Indicamos una carpeta temporal dentro de nuestro servidor donde guardaremos los archivos o las imágenes
$store_photos = "storephotos";
//definimos el tamño máximo de la imagen permitida (5'5 megas)
$size_max = 5512000;

//Condición para comprobar los datos especificados de la imagen:
//nombre del archivo que no esté vacío
if($photo!=""){
  //tamaño de la imagen, que no supere el límite definido
  if($size_photo>$size_max){
    echo "ERROR: over max size";
    exit();
    //en caso de qeu el tamaño sea correto seguimos en el else:
  }else{
    // //comprobamos que el tipo de archivo es png o jpg
    if(!strpos($photo,".") ===false){
      $file_ext = strtolower(end(explode(".",$photo)));
      // Quitamos los espacios del nombre
      $photo= str_replace(" ","",$photo);
      //movemos los archvios de la carpeta temporal a la carpeta destino (pasandole la carpeta destino y el nombre del archvio)
      move_uploaded_file($_FILES["photo"]["tmp_name"], "$store_photos/$photo");
      //alamacenamos en una nueva variable el nombre de la imagen
      $profile_photo = $photo;
      

    }else{
      echo "The file format is not allowed";
      exit();
    }

  }
}

//Registro del usuario: si los campos email y contraseña no se encuentran vacío introducimos los registros del usuario
if(!empty($email) && !empty($password)){
  $sql = "INSERT INTO user VALUES ('','$name', '$nick', '$email', '$password_cifrado', '$profile_photo')";
  $result=mysqli_query($connectiondb, $sql);
  
 /* if($connectiondb->query($sql) === TRUE) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
    
  }else{
    echo "Error: " . $sql . "<br>" . $conecction->error;

  }

  */

									// verificamos que no haya error
									if (!$result){
									echo "La consulta SQL contiene errores.".mysqli_error();
									exit();
								}else{
                  echo "<script>window.location.href='login.php';</script>";
    exit();
    
                }
                                
                                
                   
                                
                                
             
}
?>

<?php
//include("connection.php");
//session_start();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Recibimos los datos del formulario del login:
$uemail = $_POST["uemail"];
$upassword = $_POST["upassword"];
//comporbamos que no estén vacías los datos del login
if($uemail!="" and $upassword!=""){
  //realizamos la consulta con el email recibido del formulario
  $sql2 = "SELECT * FROM user WHERE email='$uemail'";
  $datos_usuario = mysqli_query($connectiondb, $sql2);
  $mi_fila = mysqli_fetch_array($datos_usuario);

  ///
  if((password_verify($upassword, $mi_fila['password'])) && ($uemail==$mi_fila["email"])){
    //mantenemos la session inicidad del usario con el email indicado
    $_SESSION["email"] = $uemail;
    echo "<script>window.location.href='dashboard.php';</script>";
    //enviar email por parametro
    
  }else{
    echo"Usuario no registrado";
    
  }
    
}else{
    echo "Error: " . $sql2 . "<br>" . $connectiondb->error;

}
  
?>
