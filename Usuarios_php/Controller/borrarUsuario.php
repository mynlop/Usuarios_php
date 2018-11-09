<?php
    require_once '../Model/Usuario.php';
    session_start();
    
    if(isset($_SESSION['id'])){
        $eliminar = new Usuario($_SESSION['id'], null, null, null, null,null);
        $eliminar-> eliminar();
        session_destroy();
        header("Location: ../");
    }else{
        header("Location: ../");
    }

?>