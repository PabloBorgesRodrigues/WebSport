<?php 

    session_start();
    print_r($_SESSION);
    
    if((isset($_SESSION['cli_email']) == true) and (isset($_SESSION['cli_password']) == true)){

        $_SESSION['logado'] = $_SESSION['cli_email'];
        sleep(1.5);
        header("Location: inicio.php");  
    }

   else {
    $error = "Usuário ou senha inválida!";
    unset($_SESSION['cli_email']);
    unset($_SESSION['cli_password']);
    header("Location: login.php");
   }
   $logado = $_SESSION['cli_email'];
?>
