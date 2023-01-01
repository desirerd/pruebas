<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Login</title>
</head>
<body>
    <?php
      require 'header.php'
    ?>
    <div id="container">
        <h1>Login</h1>
        <span>or <a href="registro.php">Registrar</a></span>
        <form action="database.php" method="post">
            <!-- Username -->
            <label for="uemail">Email:</label>
            <input type="text" id="iduemail" name="uemail" value=""><br>
            <!-- Password -->
            <label for="upassword">Password:</label>
            <input type="password" id="idupassword" name="upassword" value=""><br>
            <p><a href="#">Forgot your password?</a></p><br>
            <div id="lower">
                <!--check box to kee logged-->
               <input type="checkbox" id="idcheckbox" name="checkbox"><label class="check" for="checkbox">Keep me logged</label><br>
                <!-- Submit Button -->
                <input type="submit" value="Login">
            </div>
        </form>   
    </div>
    
</body>
</html>