<?php
include 'Logado.php';
// session_start();
// unset($_SESSION ['cli_email']);
// unset($_SESSION ['cli_password']);
// unset($logado);
// header("Location: login.php");

session_start(); // Inicia a sessão para apagá-la

// Esvazia todas as variáveis da sessão
$_SESSION = [];

// Destroi a sessão completamente
session_destroy();

// Opcional: Remove o cookie da sessão do navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Redireciona para a página de login
header("Location: login.php");
exit(); // Garante que o script pare aqui
?>



    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    
?>
</body>
</html>