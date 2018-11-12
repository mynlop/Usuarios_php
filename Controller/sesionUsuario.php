<?php

require_once '../Model/Usuario.php';

$email = $_POST['txtCorreo'];
$pass = $_POST['txtPass'];

$bien = new Usuario(null, null, null, $email, $pass,null);
$datos = $bien-> comprobarUsuario();

    if($datos[0] == 0){
        echo 'Datos incorrectos';
        session_start();
        $_SESSION['ingreso'] = 'NO';
        header("Location: ../");
    }else{
        foreach($datos as $key => $user){
            session_start();
            $_SESSION['ingreso'] = 'YES';
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id'] = $user['id'];
        }
    header("Location: ../View/home.php");
    }

?>