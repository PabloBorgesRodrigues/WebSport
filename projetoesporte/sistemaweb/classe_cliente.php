<?php 

//definindo os parametros de conexão

$host = 'localhost';
$port = '3306';
$dbname = 'libertysport';
$user = 'root';
$senha = '';

//Classe Cliente
//echo "i'm here!";

// try {
     $cliente = new Cliente($host, $port, $dbname, $user, $senha);

//     // Testar se a busca de mensagens funciona
//     $mensagens = $cliente->buscarMensagens(); // Certifique-se de implementar buscarMensagens()
//     echo "<pre>";
//     print_r($mensagens);
//     echo "</pre>";
// } catch (Exception $e) {
//     echo "Erro ao conectar ou executar: " . $e->getMessage();
// }

// Testar a conexão diretamente
if ($cliente) { // Usando o método isConnected()
    //echo "Conexão com sucesso!"; Esta efetuando
} else {
    echo "Falha na conexão!";
}




//here llast
    class Cliente{
        private $pdo;

        //conectar o banco de dados
        public function  __construct($host,$port,$dbname,$user,$senha){

            try{
                $this ->pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';', $user, $senha);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //conexao bem sucedida!
                
                //echo "Conexao feita com sucesso!";
               
            }
            catch(PDOException $e)
            {
                echo "Erro com banco de dados: ".$e->getMessage();
            }
            catch(Exception $e){
                echo "Erro genérico: ".$e->getMessage();
            }
        }//Fim do construtor
        public function CadastrarDados($nome, $sobrenome, $cpf, $email, $password, $fone, $dtnasc, $sexo){
            $cmd = $this ->pdo->prepare("INSERT INTO cliente (cli_nome, cli_sobrenome, cli_cpf, cli_email, cli_password, cli_fone, cli_dtnasc, cli_sexo)
             VALUES (:n,:s,:c,:e,:p,:f,:d,:se)");

             $cmd = $this->pdo->prepare("SELECT * FROM cliente WHERE cli_cpf = :c OR cli_email = :e");
             $cmd->bindValue(":c", $cpf);
             $cmd->bindValue(":e", $email);
             $cmd->execute();
             if($cmd->rowCount() > 0) { 
             return false;  
             } 
             else{
            $cmd->bindValue(":n",  $nome);
            $cmd->bindValue(":s",  $sobrenome);
            $cmd->bindValue(":c",  $cpf);
            $cmd->bindValue(":e",  $email);
            $cmd->bindValue(":p",  $password);
            $cmd->bindValue(":f",  $fone);
            $cmd->bindValue(":d",  $dtnasc);
            $cmd->bindValue(":se", $sexo);
             }
            return $cmd ->execute(); //test
            //confirmar ainda
        }
        public function buscarDadosCliente($id){

            $cmd = $this ->pdo->prepare("SELECT * FROM cliente WHERE cli_id = :id");
            $cmd ->bindValue(":id",$id);
            $cmd ->execute();
            $res = $cmd -> fetch(PDO::FETCH_ASSOC);
            return $res;

        }
        public function loginCliente($email, $password){
    
    try {
        // Prepara a consulta para verificar e-mail e senha
        $cmd = $this->pdo->prepare("SELECT * FROM cliente WHERE cli_email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();

        // Busca o cliente pelo e-mail
        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        // Verifica se o cliente foi encontrado
        if ($res) {
            // Confere se a senha informada corresponde à senha armazenada
            if ($password === $res['cli_password']) {
                // Autenticação bem-sucedida
                return $res; // Retorna os dados do cliente
            } else {
                return "Senha incorreta!";
            }
        } else {
            return "E-mail não encontrado!";
        }
    } catch (PDOException $e) {
        // Trata erros de conexão ou execução
        return "Erro: " . $e->getMessage();
    }
    }

        public function atualizarDados($id,$nome,$sobrenome,$cpf,$email,$password,$fone,$dtnasc,$sexo){
            $cmd = $this->pdo->prepare("UPDATE cliente SET cli_nome= :n, cli_sobrenome= :s, cli_cpf= :c, cli_email= :e,
                                        cli_password= :p, cli_fone= :f, cli_dtnasc= :d, cli_sexo= :se WHERE cli_id = :id");

            $cmd->bindValue(":n",  $nome);
            $cmd->bindValue(":s",  $sobrenome);
            $cmd->bindValue(":c",  $cpf);
            $cmd->bindValue(":e",  $email);
            $cmd->bindValue(":p",  $password);
            $cmd->bindValue(":f",  $fone);
            $cmd->bindValue(":d",  $dtnasc);
            $cmd->bindValue(":se", $sexo);
            $cmd->bindValue(":id", $id);
            $cmd ->execute();

        }
        public function excluirConta($id){
            $cmd = $this ->pdo->prepare("DELETE FROM cliente WHERE cli_id = :id");
            $cmd ->bindValue(":id",$id);
            return $cmd-> execute();
        } //este por equanto ficara de teste ainda nao tenho certeza se esta correto!
    }

?>