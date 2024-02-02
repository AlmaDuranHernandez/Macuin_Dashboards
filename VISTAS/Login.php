
<!doctype html>

<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="../Publico/CSS/estilos.css">
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
                    <h3>¿Aún no tienes  cuenta?</h3>
                    <p>Crea una cuenta para acceder</p>
                    <button id="btn_registro">Crear cuenta</button> 
                  </div>
              </div>
        

              <div class="contenedor_login_registro">

                <form action="../Controlador/Login_Usuarios.php" method="POST" class="formulario_login">
                  <h2>Iniciar Sesión</h2>
                  <input type="text" placeholder="Usuario" name = "usuario">
                  <input type="password" placeholder="Contraseña" name = "Password">
                  <button>Ingresar</button>
                </form>
                <form action="../Controlador/Registor_Usuarios.php" method="POST" class="formulario_registro">
                  <h2>Registrate</h2>
                  <input type="text" placeholder="Usuario" name = "usuario">
                  <input type="text" placeholder="Correo Electronico" name = "correo">
                 
                  
                  <button>Enviar</button>
                </form>
              </div>
         </div>
      </main>
      <script src="../Publico/JS/scrip.js"></script>
  </body>
</html>