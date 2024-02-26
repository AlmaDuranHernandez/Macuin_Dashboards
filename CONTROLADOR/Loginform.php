<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php

session_start();

include '../MODELO/Conexion.php';



$email = $_POST['Correo'];
$Password = $_POST['Password'];


$Validar_Login = mysqli_query($conn, "SELECT * FROM usuario WHERE email='$email'
and pass='$Password'");

if(mysqli_num_rows($Validar_Login) > 0){
    $_SESSION['usuario'] = $email;
    $_SESSION['nombre'] = $nombre;
    header("location: ../index.php");
    exit();
    
}else{
    echo
    "<script>
    swal('Error','Los datos ingresados son incorrectos','error').then(function() {
        window.location =  '../VISTAS/Login.php';
    });
  </script>"; 
}

?>