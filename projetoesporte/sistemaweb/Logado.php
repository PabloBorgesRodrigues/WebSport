<?php 


    session_start();
    print_r($_SESSION);
    
    if((isset($_SESSION['cli_email']) == true) and (isset($_SESSION['cli_password']) == true)){

        $_SESSION['logado'] = $_SESSION['cli_email']; //talvez trocar somente pelo primeiro nome
        
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
    <h1>Acessou o sistema</h1>
</body>
</html>