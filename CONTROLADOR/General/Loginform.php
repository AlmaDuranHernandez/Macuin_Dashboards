<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php

session_start();

include '../../MODELO/Conexion.php';

$email = $_POST['Correo'];
$Password = $_POST['Password'];

$Validar_Login = mysqli_query($conn, "SELECT * FROM usuario WHERE email='$email' and pass='$Password'");

if(mysqli_num_rows($Validar_Login) > 0){
    // Obtener la fila de resultados
    $row = mysqli_fetch_assoc($Validar_Login);
    // Obtener el rol del usuario de la fila recuperada
    $id_rol = $row['id_rol'];
    
    // Iniciar la sesión
    $_SESSION['usuario'] = $email;

    // Redireccionar según el rol del usuario
    if($id_rol == 1 || $id_rol == 1){
        header("location: ../../VISTAS/Jefe/IndeAdm.php ");
        exit();
    } else {
        // Manejar otros roles aquí si es necesario
    }
    
    if($id_rol == 1 || $id_rol == 2){
        header("location: ../../VISTAS/Auxiliar/IndexAux.php");
        exit();
    } else {
        // Manejar otros roles aquí si es necesario
    } 
    if($id_rol == 1 || $id_rol == 3){
        header("location: ../../VISTAS/Cliente/index.php");
        exit();
    } else {
        // Manejar otros roles aquí si es necesario
    }
} else {
    echo "<script>
        swal('Error','Los datos ingresados son incorrectos','error').then(function() {
            window.location =  '../../VISTAS/General/Login.php';
        });
    </script>"; 
}



?>

