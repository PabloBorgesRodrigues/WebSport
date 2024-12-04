<?php 
     require_once __DIR__ . '/classe_cliente.php';

    $cliente = new Cliente("127.0.0.1","3306","libertysport","root","");
    session_start();
     $logado = $_SESSION['logado'];
     $id = $_SESSION['id'];
     $nome = $_SESSION['nome'];
     $sobrenome = $_SESSION['sobrenome'];
     $cpf = $_SESSION['cpf'];
     $email = $_SESSION['cli_email'];
     $password = $_SESSION['cli_password'];
     $fone = $_SESSION['fone'];
     $dtnasc = $_SESSION['dtnasc'];
     $sexo = $_SESSION['sexo'];

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
  </head>
  <body>
          <?php if (isset($_SESSION['sucesso'])): ?>
            <div id="alertSucesso" class="alert alert-success" style="display: none;">
                <?= $_SESSION['sucesso']; ?>
            </div>
            <?php unset($_SESSION['sucesso']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['erro'])): ?>
            <div id="alertErro" class="alert alert-danger" style="display: none;">
                <?= $_SESSION['erro']; ?>
            </div>
            <?php unset($_SESSION['erro']); ?>
        <?php endif; ?>

        <?php 
                if (isset($_POST['btn_submit'])) {
                  $nome = addslashes($_POST['nome']);
                  $sobrenome = addslashes($_POST['sobrenome']);
                  $cpf = addslashes($_POST['cpf']);
                  $email = addslashes($_POST['email']);
                  $password = addslashes($_POST['password']);
                  $fone = addslashes($_POST['fone']);
                  $dtnasc = addslashes($_POST['dtnasc']);
                  $sexo = addslashes($_POST['sexo']);
                  $id = addslashes($_POST['cli_id']);

                  $_SESSION['nome'] = $nome;
                  $_SESSION['sobrenome'] = $sobrenome;
                  $_SESSION['cpf'] = $cpf;
                  $_SESSION['cli_email'] = $email;
                  $_SESSION['cli_password'] = $password;
                  $_SESSION['fone'] = $fone;
                  $_SESSION['dtnasc'] = $dtnasc;
                  $_SESSION['sexo'] = $sexo;
              
                  echo "<script>console.log('Dados recebidos: Nome - $nome, Email - $email');</script>";
                  header("Location: atualizarDados.php");
                   if(!empty($_POST['cli_id'])){ 
                     $id = addslashes($_POST['cli_id']);
                     if ($cliente ->atualizarDados($id,$nome,$sobrenome,$cpf,$email,$password,$fone,$dtnasc,$sexo)){
                         echo "<script>exibirAlertaSucesso();</script>";
                         
                  }
                  else{
                        echo "<script>exibirAlertaErro();</script>";
                  }
                  }
                     else{ 
                      
                  }
                  }
              
         ?>
         
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="assets/images/logo.jpeg" class="img-thumbnail" id="logo"> Liberty Sports</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Comprar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Camisetas</a></li>
                  <li><a class="dropdown-item" href="#">Regatas</a></li>
                  <li><a class="dropdown-item" href="#">Blusas</a></li>
                  <li><a class="dropdown-item" href="#">Corta vento</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Calças Esportivas</a></li>
                  <li><a class="dropdown-item" href="#">Shorts Esportivos</a></li>
                  <li><a class="dropdown-item" href="#">Legging</a></li>
                  <li><a class="dropdown-item" href="#">Blusas</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Bicicletas</a></li>
                  <li><a class="dropdown-item" href="#">Bola de Futebol</a></li>
                  <li><hr class="dropdown-divider"></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre-nós</a>
              </li>
              <li class="nav-item">
              <?php if(!isset($_SESSION['logado'])): ?>
              <a class="nav-link text-primary" href="projeto.php">Cadastrar</a>
              <?php endif;?>
            </li>
            <div class="d-flex">
              <?php if(!isset($_SESSION['logado'])): ?>
              <a href="login.php" class="btn btn-primary">Login</a>
                <?php endif;?>
            </div>
            <div class="d-flex">
              <?php if(isset($_SESSION['logado'])):  ?>
              <a href="atualizarDados.php" class="btn btn-success">Atualizar Dados</a>
              <?php endif; ?>
            </div>             
           <div class="position-absolute top-50 end-0 translate-middle-y">
           <?php if(isset($_SESSION['logado'])):  ?>
            <a href="sair.php" class="btn btn-danger">Sair</a>
            <?php endif; ?>
            </div>
            </ul>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main> 
      <div class="container-sm p-5 top-50 position-absolute start-50 translate-middle" id="form-container">
            <form method="POST"> 
              
              <input type="hidden" name="cli_id" value= "<?php echo $id;?>" /> 
              <div class="px-4 mb-sm-4">
                  <div class="row">
                       <label for="nome" class="form-label">Nome Completo</label>
                    <div class="col-sm g-3">
                       <input type="text" class="form-control" placeholder="Nome" aria-label="First name" id="nome" name="nome" value="<?php echo $nome?>" required>
                    </div>
                    <div class="col-sm g-3" id="div-sobre">
                        <input type="text" class="form-control" placeholder="Sobrenome" aria-label="Last name" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome?>" required>
                    </div>
                  </div>
                </div>
                <div class="px-4 mb-sm-4">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="cpf" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF no formato: 000.000.000-00" value="<?php echo $cpf?>" required>
                </div> 
                <div class="px-4 mb-sm-4">
                    <label for="email" class="form-label">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@gmail.com" value="<?php echo $email?>" required>
                </div> 
                <div class="px-4 mb-sm-4">
                  <div class="col-auto">
                    <label for="inputPassword" class="col-form-label">Senha</label>
                    <input type="password" id="password" name="password" value="<?php echo $password?>" class="form-control" aria-describedby="passwordHelpInline" min="8" max="16" placeholder="Digite uma senha entre 8 e 16 caracteres." required>
                  </div>
                 </div>
                <div class="px-4 mb-sm-4">
                    <label for="fone" class="form-label">Celular com DDD</label>
                    <input type="tel" class="form-control" id="fone" name="fone" value="<?php echo $fone?>" required pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="11 99999-9999">
                </div>
                <div class="px-4 mb-sm-4">
                    <label for="dtnasc" class="form-label">Data de Nascimento</label>
                       <div class="col-sm-5">
                         <input type="date" name="dtnasc" id="dtnasc" name="dtnasc" value="<?php echo $dtnasc?>" required>
                       </div>
                </div>
                <div class="px-4 mb-sm-4">
                  <label for="sexo" class="form-label">Sexo</label>
                  <div class="col-md-5 g-3">
                  <select class="form-select" aria-label="Default select example" id="sexo" name="sexo" required>
                        <option value="" <?php echo !isset($sexo) || $sexo == '' ? 'selected' : ''; ?>>Selecionar</option>
                        <option value="Masculino" <?php echo (isset($sexo) && $sexo == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="Feminino" <?php echo (isset($sexo) && $sexo == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                        <option value="Outro" <?php echo (isset($sexo) && $sexo == 'Outro') ? 'selected' : ''; ?>>Outro</option>
                  </select> 
                  </div>
                </div> 
                <div class="col-auto p-2">
                  <button class="btn btn-primary me-md-2 col-12" type="submit" name="btn_submit" 
                  value="<?php if(isset($res)){echo "Enviar";}?>" id="btn_sub" class="btn btn-success btn-lg">Enviar</button>
                  </div>
                </div>
             </form>
      </div> 
    </main> 
   <footer class="bg-light text-dark pt-5 pb-4">
      <div class="container text-center text-md-left">
          <div class="row text-center text-md-left" id="footer_content">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3" id="footer_contacts">
               <h1 class="text-uppercase mb-4 font-weight-bold text-warning">Liberty Sports</h1>
               <p >break the sound barrier with one step.</p>  
               <div id="footer_social_media"> 
                 <a href="" id="instagram">
                     <i class="fa-brands fa-instagram"></i>
                 </a>
                 <div id="footer_social_media"> 
                     <a href="" id="facebook">
                     <i class="fa-brands fa-facebook-f"></i>
                    </a>
                 </div>
               </div>
            </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <ul class="footer-list">
              <h3 class="text-primary">Contato</h3>
            </ul>
            <li>
              <i class="fas fa-home mr-3 p-2"></i> São Paulo, Jardim Europa 133,BR
            </li>
            <li>
              <i class="fas fa-envelope mr-3 p-2"></i> LibertySports@Liberty.com
            </li>
            <li>
              <i class="fas fa-phone mr-3 p-2"></i> 55+ 11 9123-4567
            </li>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <ul class="footer-list">
              <h3 class="text-primary">Produtos</h3>
            </ul>
            <li>
              <a href="" class="footer-link text-dark">App</a>
            </li>
            <li>
              <a href="" class="footer-link text-dark">Desktop</a>
            </li>
            <li>
              <a href="" class="footer-link text-dark">Cloud</a>
            </li>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <div id="footer-subscribe">
               <h3 class="text-primary">Subscribe</h3>
            <p>  
                Entre com seu email para receber noticias de novos produtos.
            </p>
            <div id="input_group">
              <input type="email" id="emailContato">
              <button>
                <i class="fa-regular fa-envelope"></i>
              </button>
            </div>
          </div>
        </div>
          <div class="row align-items-center">
             <div class="col-md-7 col-lg-8">
              <p>
                &#169
                2024 all rights reserved by: <a href="#"><strong class="text-warning" id="direitos-reservados">Liberty Sports</strong></a>
              </p>
             </div>        
          </div>
        </div>
      </div> 
    </div> 
   </footer>

            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                <script src="funcoes.js"></script>

                <script> 
                
            function exibirAlertaSucesso() {
                $('#alertSucesso').css('display', 'block');
                setTimeout(function() {
                    $('#alertSucesso').css('display', 'none');
                }, 3000);
            }

            function exibirAlertaErro() {
                $('#alertErro').css('display', 'block');
                setTimeout(function() {
                    $('#alertErro').css('display', 'none');
                }, 3000);
            }

            $(document).ready(function() {
                console.log("jQuery carregado");
            });
        </script>
   
</body>
</html>