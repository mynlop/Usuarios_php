<?php

    require_once '../Model/Usuario.php';
    session_start();
    if(isset($_SESSION['id'])){
        if($_POST['txtPass'] === ""){
            $_SESSION['vacioP'] = "SI";
            header("Location: ../View/home.php");
        }else{
            $editar = new Usuario($_SESSION['id'], null, null, null, $_POST['txtPass'],null);
            $editar-> modificarPass();
            header("Location: ../View/home.php");
        }
    }else{
        header("Location: ../");
    }

?>
