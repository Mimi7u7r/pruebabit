<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
</head>
<body>
 
<div class="p-3 mb-2 bg-primary text-white">Certificados BIT


<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "certibit";
 $tbl_name = "usaurio2";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE user = '$_POST[user]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 $row = mysqli_fetch_assoc($result);

 if ($count == 1) {
    
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $row['user'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
        
        echo "<div class='alert alert-success mt-4' role='alert'><strong>Aqui puedes descargar tus certificados !</strong> $row[nombre]			
        <p><a href='descarga.php'>Certificado Desarrollo Web</a></p>	
        <p><a href='descarga.php'>Certificado Videojuegos</a></p></div>";	
    
    
 }else
 {
   
    echo "<br />". "No se ha encontrado el usuario." . "<br />";

 echo "<a href='index.html'>Vuela a intentarlo</a>";
 }

?>
</div>

<script src="js/script2.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>