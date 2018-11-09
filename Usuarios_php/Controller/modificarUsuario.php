<?php
require_once '../Model/Usuario.php';
session_start();
    if($_POST['txtNombre'] === "" || $_POST['txtApellido'] === "" || $_POST['txtImg'] === ""){
        $_SESSION['vacio'] = "SI";
        header("Location: ../View/home.php");
    }else{
        $modificar = new Usuario($_SESSION['id'],$_POST['txtNombre'],$_POST['txtApellido'], null ,null,$_POST['txtImg']);
        $modificar-> modificar();
        $_SESSION['vacio'] = "NO";
        header("Location: ../View/home.php");
    }

?>