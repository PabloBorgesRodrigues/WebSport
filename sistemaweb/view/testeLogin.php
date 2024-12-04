
 <?php
 session_start();
 require_once __DIR__ . '/../controller/classe_cliente.php';
 $cliente = new Cliente("127.0.0.1","3306","libertysport","root","");


 
if (isset($_POST['btn_submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $resultado = $cliente->loginCliente($email, $password);

    if (is_array($resultado)) {
        echo "Bem-vindo, " . $resultado['cli_nome'] . "!";
         $_SESSION['cli_email'] = $email;
         $_SESSION['cli_password'] = $password;
         $_SESSION['id'] = $resultado['cli_id']; 

        $_SESSION['nome'] = $resultado['cli_nome'];
        $_SESSION['sobrenome'] = $resultado['cli_sobrenome']; 
        $_SESSION['cpf'] = $resultado['cli_cpf']; 
        $_SESSION['fone'] = $resultado['cli_fone']; 
        $_SESSION['dtnasc'] = $resultado['cli_dtnasc']; 
        $_SESSION['sexo'] = $resultado['cli_sexo'];

        header("Location: /sistemaweb/models/Logado.php");
    } 
    else{
        echo "Credenciais incorretas!";
        unset($_SESSION['cli_email']);
        unset($_SESSION['cli_password']);
        header("Location: /sistemaweb/view/login.php");
    }
} 
else{
    echo "Erro: Dados não enviados ou incompletos.";
}
?>