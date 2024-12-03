<?php 

require_once __DIR__ . '/classe_cliente.php';

$cliente = new Cliente("127.0.0.1","3306","libertysport","root","");
    
    // if (isset($_POST['btn_submit'])) {
    //   print_r($_POST); // Exibe os dados recebidos
    session_start();
    $id = $_SESSION['id'];
    //print_r($id);   
//}
?>

<?php 
 if (!empty($id)) {
    $delete = $cliente->excluirConta($id);
    if ($delete == true){
        echo "Conta excluída com sucesso!";
        header('Location: inicio.php');
        $_SESSION = [];
        session_destroy();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, 
                $params["path"], $params["domain"], 
                $params["secure"], $params["httponly"]);
        }
    } else {
        echo "Erro ao excluir a conta.";
    }
} else {
    echo "ID do cliente não foi fornecido.";
}


?>

