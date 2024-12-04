<?php 

require_once __DIR__ . '/../controller/classe_cliente.php';

$cliente = new Cliente("127.0.0.1","3306","libertysport","root","");
    
    session_start();
    $id = $_SESSION['id'];
?>

<?php 
 if (!empty($id)) {
    $delete = $cliente->excluirConta($id);
    if ($delete == true){
        echo "Conta excluída com sucesso!";
        header('Location: ../view/inicio.php');
        $_SESSION = [];
        session_destroy();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, 
                $params["path"], $params["domain"], 
                $params["secure"], $params["httponly"]);
    }
    } 
    else{
        echo "Erro ao excluir a conta.";
    }
    }
    else{
    echo "ID do cliente não foi fornecido.";
}

?>

