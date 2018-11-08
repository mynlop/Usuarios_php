<?php
    include_once('header.php');
?>

    <?php
    session_start();
    if(isset($_SESSION['mail']) && $_SESSION['mail'] == 'NO'){
    ?>
        <div class="row">
            <div class="callout notificacion" data-closable style="background-color:rgba(255,0,0,0.5);">
                <p>Este correo electrónico ya existe, por favor utilizar otro.</p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    <?php
    }
    if(isset($_SESSION['vacio']) && $_SESSION['vacio'] == 'SI'){
    ?>
        <div class="row">
            <div class="callout notificacion" data-closable style="background-color:rgba(255,0,0,0.5);"> 
                <p>Tienes que llenar todos los campos.</p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    <?php
    }
    session_destroy();
     ?>

    <section id="caja">
        <div class="row">
            <div class="small-8 small-centered medium-6 medium-centered colums" >
                <h2>Registrarme</h2>
            </div>
        </div>
        <form action="../Controller/insertarUsuario.php" method="post">
            <div class="row">
                <div class="small-11 small-centered medium-10 medium-centered colums">
                <input type="text" name="txtNombre" placeholder="Ingresa tu nombre" required>
                </div>
            </div>
            <div class="row">
                <div class="small-11 small-centered medium-10 medium-centered colums">
                <input type="text" name="txtApellido" placeholder="Ingresa tu apellido" required>
                </div>
            </div>
            <div class="row">
                <div class="small-11 small-centered medium-10 medium-centered colums">
                <input type="email" name="txtCorreo" placeholder="Ingresa tu correo electronico" required>
                </div>
            </div>
            <div class="row">
                <div class="small-11 small-centered medium-10 medium-centered colums">
                <input type="password" name="txtPass" placeholder="**********" required>
                </div>
            </div>
            <div class="row">
                <div class="medium-12 botones">
                    <button type="submit" class="button large-down-expanded" >Registrarme</button>
                    <a class="hollow button warning large-down-expanded" href="../index.php" >Iniciar Sesión</a>
                </div>
            </div>
        </form>
    </section>

<?php
    include_once('footer.php');
?>