<?php
    include_once('header.php');
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