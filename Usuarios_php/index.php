<?php
    include_once('View/header.php');
?>
    
    <section id='caja'>
        <form action="Controller/sesionUsuario.php" method="post">
          <div class="row">
            <div class="small-11 small-centered medium-10 medium-centered columns">
              <label for="correo">Correo
              <input type="email" name="txtCorreo" placeholder="ejemplo@mail.com" id= "correo" required>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="small-11 small-centered medium-10 medium-centered columns">
              <label for="pass">Contraseña
                <input type="password" name="txtPass" placeholder="*****" id= "pass" required>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="medium-12 botones">
              <button type="submit" class="button large-down-expanded" >Iniciar Sesion</button>
              <a class="hollow button warning large-down-expanded" href="View/nuevoUsuario.php" >Registrarme</a>
            </div>
          </div>
        </form>
      </section>

<?php
    include_once('View/footer.php');
?>
