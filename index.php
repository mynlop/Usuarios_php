<?php
    include_once('View/header.php');
?>

    <?php
    session_start();
    if(isset($_SESSION['ingreso']) && $_SESSION['ingreso'] == 'NO'){
    ?>
        <div class="row">
            <div class="callout notificacion" data-closable style="background-color:rgba(255,0,0,0.5);">
                <p>Correo electrónico o contraseña incorrectos.</p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    <?php
    }
    if(isset($_SESSION['mail']) && $_SESSION['mail'] == 'SI'){
    ?>
        <div class="row">
            <div class="callout notificacion" data-closable style="background-color:rgba(0,255,0,0.4);">
                <p>Nuevo usuario agregado correctamente</p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    <?php
    }
    session_destroy();
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
