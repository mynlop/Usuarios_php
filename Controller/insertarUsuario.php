<?php

    require_once '../Model/Usuario.php';

    if($_POST['txtNombre'] == "" || $_POST['txtApellido'] == "" || $_POST['txtCorreo'] == "" || $_POST['txtPass'] == "" || !isset($_POST['txtNombre'])){
        session_start();
        $_SESSION['vacio'] = 'SI';
        header("Location: ../View/nuevoUsuario.php");
    }else{
        $insertar = new Usuario("", $_POST['txtNombre'], $_POST['txtApellido'], $_POST['txtCorreo'], $_POST['txtPass'], "https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2000px-User_icon_2.svg.png");
        $verificar = $insertar-> comprobarEmail();
        if($verificar[0] == 1){
            echo "Este correo ya esta en uso";
            session_start();
            $_SESSION['mail'] = 'NO';
            header('Location: ../View/nuevoUsuario.php');
        }else{
            session_start();
            $_SESSION['mail'] = 'SI';
            $insertar-> insertar();
            header("Location: ../" );
        }
    }

?>