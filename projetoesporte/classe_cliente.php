<?php 

$host = 'localhost';
$port = '3306';
$dbname = 'libertysport';
$user = 'root';
$senha = '';

$cliente = new Cliente($host, $port, $dbname, $user, $senha);

if ($cliente) {
    //echo "Conexão com sucesso!";
} else {
    echo "Falha na conexão!";
}
    class Cliente{
        private $pdo;
        public function  __construct($host,$port,$dbname,$user,$senha){

            try{
                $this ->pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';', $user, $senha);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Conexao feita com sucesso!";
               
            }
            catch(PDOException $e)
            {
                echo "Erro com banco de dados: ".$e->getMessage();
            }
            catch(Exception $e){
                echo "Erro genérico: ".$e->getMessage();
            }
            }
        public function CadastrarDados($nome, $sobrenome, $cpf, $email, $password, $fone, $dtnasc, $sexo){
            try {
                $cmd = $this->pdo->prepare("SELECT * FROM cliente WHERE cli_cpf = :c OR cli_email = :e");
                $cmd->bindValue(":c", $cpf);
                $cmd->bindValue(":e", $email);
                $cmd->execute();

                if ($cmd->rowCount() > 0){
                        return false;
                }
               else{
                    $cmd = $this->pdo->prepare("INSERT INTO cliente (cli_nome, cli_sobrenome, cli_cpf, cli_email, cli_password, cli_fone, cli_dtnasc, cli_sexo) 
                                            VALUES (:n, :s, :c, :e, :p, :f, :d, :se)");
                    $cmd->bindValue(":n", $nome);
                    $cmd->bindValue(":s", $sobrenome);
                    $cmd->bindValue(":c", $cpf);
                    $cmd->bindValue(":e", $email);
                    $cmd->bindValue(":p", $password);
                    $cmd->bindValue(":f", $fone);
                    $cmd->bindValue(":d", $dtnasc);
                    $cmd->bindValue(":se", $sexo);
                    return $cmd->execute();
                }
                } 
            catch (PDOException $e) {
                    echo "Erro ao cadastrar dados: " . $e->getMessage();
                    return false;
                }
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
        
                    $cmd = $this->pdo->prepare("SELECT * FROM cliente WHERE cli_email = :e");
                    $cmd->bindValue(":e", $email);
                    $cmd->execute();
                    $res = $cmd->fetch(PDO::FETCH_ASSOC);

        
                if ($res) {
           
                    if ($password === $res['cli_password']) {
                
                        return $res; 
            } 
                    else{
                        return "Senha incorreta!";
            }
            } 
                else{
                    return "E-mail não encontrado!";
            }
            } 
        catch (PDOException $e) {
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
            }
            }
?>