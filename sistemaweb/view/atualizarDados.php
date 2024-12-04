<?php 
      require_once __DIR__ . '/../controller/classe_cliente.php';

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
      <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
      <link rel="stylesheet" href="../assets/css/produtos.css" type="text/css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="m-5">
    <table class="table text-white table-bg">
        <tbody>
            <?php
                $dados = $cliente->buscarDadosCliente($id);

                if ($dados) {
                    foreach ($dados as $key => $value) {
                        if ($key != "cli_id") {
                            echo "<tr>";
                            echo "<th scope='row'>" . htmlspecialchars(ucfirst(str_replace("cli_", "", $key))) . "</th>";
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "<tr>
                        <th scope='row'>Ações</th>
                        <td>
                            <a class='btn btn-sm btn-primary' href='../view/editarDados.php'>
                                Editar
                            </a>
                            <a class='btn btn-sm btn-danger' href='../models/delete.php'>
                                Deletar
                            </a>
                            <a class='btn btn-sm btn-success' href='inicio.php'>
                                Voltar
                            </a>
                        </td>
                    </tr>";
                } else {
                    echo "<tr><td colspan='2'>Nenhum dado encontrado.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>



</body>
</html>
<style>
.table-bg {
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 8px; 
}

.table th, .table td {
    padding: 8px 16px; 
    text-align: left;
    vertical-align: middle; 
    border: none;
}

.table th {
    font-weight: bold;
    color: #ffcc00;
}

.table td {
    color: #fff;
}

.table tbody tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.1);
}
</style>

