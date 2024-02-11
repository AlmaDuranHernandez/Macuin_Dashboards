<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php



include '../Conector.php';


$usuario = $_POST['usuario'];
$rootKey = $_POST['Password'];

$Validar_Login = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre='$usuario'
and pass='$Password'");

if(mysqli_num_rows($Validar_Login) > 0){
    $_SESSION['usuario'] = $usuario;
    header("location: ../index.html");
    exit();
}else{
    echo
    "<script>
    swal('Error','Los datos ingresados son incorrectos','error').then(function() {
        window.location = '../Vista/Login.php';
    });
  </script>"; 
}

?>