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

    if(isset($_SESSION['vacio']) && $_SESSION['vacio'] == 'SI'){
    ?>
        <div class="row">
            <div class="callout notificacion" data-closable style="background-color:rgba(255,0,0,0.5);">
                <p>No intentes enviar campos vacios.</p>
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    <?php
    }

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
            <p id="mensaje" style="display: none;">Esto no es una imagen</p>
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
            <div class="row">
                <div class="small-10 small-centered medium-6 medium-centere colums">
                    <button type="submit" class="mostrar expanded success button" style="display:none;">Guardar Cambios</button>
                </div>
            </div>
        </form>
        <!-- botonera  -->
        <div class="row">
            <div class="small-10 small-centered medium-6 medium-centere colums">
                <p><a class="mostrar expanded button" onclick="openDialog();" style="display:none;">Cambiar contraseña</a></p>
            </div>
        </div>
        <div class="row">
            <div class="small-10 small-centered medium-6 medium-centere colums">
                <button onclick="eliminar('../Controller/borrarUsuario.php');" style="display:none;" class="mostrar expanded alert button">Eliminar cuenta</button>
            </div>
        </div>
        <?php
      }
    ?>
    <link rel="stylesheet" href="../Resources/avgrund.css">
    <script src="../Resources/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../Resources/sweetalert.css">
    <script>
        // mostrar botones de edicion y poder editar informacion
        function modificar(){
            $('.caja').removeAttr("disabled");
            $('.esconder').hide();
            $('.mostrar').toggle();
        }
        // cancelar modificar 
        function cancelar(){
            location.reload();
        }

        // cargar la imagen
        $('#url').change(function(){
            valor = $('#url').val();
            var ext = valor.split('.').pop();
            if(ext == 'svg' || ext == 'png' || ext == 'jpg' || ext == 'gif'){
                $('#img').attr('src', valor);
                $('#mensaje').hide();
            }else{
                $('#img').attr('src', ' ');
                $('#mensaje').show();
            }
        });

        // antes de eliminar
        function eliminar(url){
            swal({
                title: "¿Esta seguro de eliminar su cuenta?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminarlo",
                cancelButtonText: "No, cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url;
                }else{}
            });
        }
    </script>
    
    <?php
      include_once('footer.php');
    ?>
