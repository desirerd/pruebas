<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Register</title>
</head>
<body>
    <?php
      require 'header.php'
    ?>
    <div id="container">
        <h1>Registrar nuevo usuario</h1>
        <span>or <a href="login.php">Login</a></span>
        <div class="alert"> 
            <?php echo isset($alert)? $alert: '';?>
        </div>
        <form action="database.php" method="post" enctype="multipart/form-data">
             <!--Foto-->
            <label for="photo">Photo:</label><br>
            <input type="file" id="idfoto" name="photo" size="40"><br><br>

            <!-- Username -->
            <label for="name">Username:</label>
            <input type="text" id="idname" name="name" value="" required><br>

            <label for="nick">Nick:</label>
            <input type="text" id="idnick" name="nick" value="" required><br>
        
            <label for="email">Email:</label>
            <input type="text" id="idemail" name="email" value="" required><br>

            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" id="idpassword" name="password" value="" required><br>

            <a href="login.html"><input type="submit" value="Register"></a>
        
           
        </form>       
    </div>
    
</body>
</html>