<?php
    include_once('header.php');
?>
    <div class="menu-centered">
        <ul class="menu">
            <li class="esconder"><a href="javascript:void(0);" onclick="modificar();">Modificar</a></li>
            <li class="active esconder"><a href="../Controller/cerrarSesion.php">Cerrar Sesion</a></li>
            <li class="active mostrar" style="display:none;"><a href="javascript:void(0);" onclick="cancelar();">Cancelar</a></li>
        </ul>
    </div>
<?php
    require_once '../Model/Usuario.php';
    session_start();

    $perfil = new Usuario($_SESSION['id'],null,null, null, null,null);
    $datos = $perfil-> getUsuariobyID();
    foreach($datos as $key => $user){
    ?>
        <form action="../Controller/modificarUsuario.php" method="post" >
            <div class="row">
                <div class="small-4 small-centered medium-3 medium-centered colums">
                    <img src="<?= $user['img']  ?>" class="thumbnail" alt="foto perfil" id="img" />
                </div>
                <div class="small-4 small-centered medium-3 medium-centered colums">
                    <input type="text" name="txtImg" id="url" placeholder="URL de imagen: gif, png, jpg" value="<?= $user['img'] ?>" class="caja" disabled required>
                </div>
            </div>
            <div class="row">
                <div class="small-8 small-centered medium-6 medium-centered colums">
                    <input type="text" class= "caja" disabled name="txtNombre" value="<?= $user['nombre']  ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="small-8 small-centered medium-6 medium-centered colums">
                    <input type="text" class= "caja" disabled name="txtApellido" value="<?= $user['apellido']  ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="small-8 small-centered medium-6 medium-centered colums">
                    <input type="text" class= "caja1" disabled value="<?= $user['email']  ?>" required>
                </div>
            </div>
        </form>
        <?php
      }

      include_once('footer.php');
    ?>
