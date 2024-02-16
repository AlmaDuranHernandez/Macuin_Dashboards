
<!doctype html>

<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="../GLOBAL/CSS/login.css">
  </head>
  <body>

      <main>

        <div class="contenedor_todo">

              <div class="caja_trasera">
                  <div class="caja_trasera_login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para acceder</p>
                    <button id="btn_iniciar_sesion">Iniciar sesion</button>
                  </div>
                  <div class="caja_trasera_registro">
                    <h3>¿Olvidaste tu contraseña?</h3>
                    <p>Contacta con tu administrador </p>
                    <button id="btn_registro">Contactar</button> 
                  </div>
              </div>
        

              <div class="contenedor_login_registro">

                <form action="../../../Proyecto/Macuin_Dashboards/CONTROLADOR/Loginform.php" method="POST" class="formulario_login">
                  <h2>Iniciar Sesión</h2>
                  <input type="text" placeholder="Correo" name = "Correo">
                  <input type="password" placeholder="Contraseña" name = "Password">
                  <button>Ingresar</button>
                </form>
                <form action="" method="" class="formulario_registro">
                  <h2>Recuperar contraseña</h2>
                  <input type="text" placeholder="Usuario" >
                  <input type="text" placeholder="Correo Electronico" >
                 
                  
                  <button>Enviar</button>
                </form>
              </div>
         </div>
      </main>
      <script src="../GLOBAL/JS/login.js"></script>
  </body>
</html>