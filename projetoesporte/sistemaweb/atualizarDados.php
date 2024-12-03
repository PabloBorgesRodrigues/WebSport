<?php 
     require_once __DIR__ . '/classe_cliente.php';

    $cliente = new Cliente("127.0.0.1","3306","libertysport","root","");
    session_start();
     $id = $_SESSION['id'];
     $logado = $_SESSION['logado'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
    
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Início</title>
      <link rel="stylesheet" href="assets/css/style.css" type="text/css">
      <link rel="stylesheet" href="assets/css/produtos.css" type="text/css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Celular</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Sexo</th>
                <th scope="col">...</th>
            </tr> 
        </thead>
        <tbody>
        <?php
            $dados = $cliente->buscarDadosCliente($id); // Supondo que a função retorne um array associativo com os dados do cliente
            
            if ($dados) {
                 // Verifica se $dados contém resultados
                echo "<tr>";
                foreach ($dados as $key => $value) {
                    if ($key != "cli_id") { // Ignora a exibição do campo "id"
                        echo "<td> " . htmlspecialchars($value) . "</td>"; // Exibe os dados nas células da tabela
                        
                    }
                    
                }
                echo "<td>
                <a class='btn btn-sm btn-primary' href= 'editarDados.php'> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                </svg>
                <a/>
                <a class='btn btn-sm btn-danger' href= 'delete.php'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                    </svg> 
                <a/>
                </td>";
                echo "</tr>";//no inicio em a creio que esta correto pois é somente um id utilizado.
            } else {
                echo "<tr><td colspan='10'>Nenhum dado encontrado.</td></tr>"; // Exibe mensagem caso não haja dados
            }
        ?>
                
        </tbody>
    </table>
    </div>
</body>
</html>