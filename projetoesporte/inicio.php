<?php 
session_start();
  if(!empty($_SESSION['logado'])){
    $logado = $_SESSION['logado'];
    $nome = $_SESSION['nome'];
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
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
            <div class="position-absolute top-50 end-0 translate-middle-y">
              <?php if(!isset($_SESSION['logado'])): ?>
              <a href="login.php" class="btn btn-primary">Login</a>
                <?php endif;?>
            </div>
            <div class="d-flex">
              <?php if(isset($_SESSION['logado'])):  ?>
              <a href="atualizarDados.php" class="btn btn-success">Atualizar Dados</a>
              <?php endif; ?>
            </div>             
           <div class="d-flex">
           <?php if(isset($_SESSION['logado'])):  ?>
            <a href="sair.php" class="btn btn-danger">Sair</a>
            <?php endif; ?>
          </div>
          <div class="position-absolute top-20 end-0 translate-middle-y welcome-message">
        <?php if(!empty($logado)){echo "Bem-vindo $nome ";}?>
        </div>
          </ul>
          </form>
        </div>
      </div>
    </nav>
      <main>
        <ul class="produtos">
          <h2>Camisas</h2>
              <li>
                <h3>Corinthians</h3> <br>
                <img src="/sistemaweb/assets/images/corinthians.png" class="img-shop">
                <p class="produto-descricao">Camisa Corinthians I 24/25</p>
                <p class="produto-preco">R$ 349,99</p>                     
              </li>
              <li>
                <h3>Palmeiras</h3> <br>                
                <img src="/sistemaweb/assets/images/palmeiras.png" class="img-shop">
                <p class="produto-descricao">Camisa Palmeiras I 24/25</p>
                <p class="produto-preco">R$ 369,90</p>        
              </li>
              <li>
                <h3>São Paulo</h3> <br>            
                <img src="/sistemaweb/assets/images/saopaulo.png" class="img-shop">
                <p class="produto-descricao">Camisa São Paulo I 24/25</p>
                <p class="produto-preco">R$ 349,99</p>          
              </li>
              <li>
                <h3>Santos</h3> <br>           
                <img src="assets/images/santos.png" class="img-shop">
                <p class="produto-descricao">Camisa Santos I 24/25</p>
                <p class="produto-preco">R$ 349,99</p>
              </li>
              <h2>Calçados</h2>
              <li>
                <h3>Nike</h3> <br>
                <img src="/sistemaweb/assets/images/nike.png" class="img-sap">
                <p class="produto-descricao">Tênis Nike Corrida Winflo 10</p>
                <p class="produto-preco">R$ 559,99</p>                       
              </li>
              <li>
                <h3>Adidas</h3> <br>                       
                <img src="/sistemaweb/assets/images/adidas.png" class="img-sap">
                <p class="produto-descricao">Tênis Adidas Corrida Runfalcon 5</p>
                <p class="produto-preco">R$ 399,99</p>          
              </li>
              <li>
                <h3>Pulma</h3> <br>
                <img src="/sistemaweb/assets/images/pulma.png" class="img-sap">
                <p class="produto-descricao">Tênis Pulma Corrida Flyer Flex BDP</p>
                <p class="produto-preco">R$ 329,90</p>           
              </li>
              <li>
                <h3>Olympikus</h3> <br>           
                <img src="/sistemaweb/assets/images/olympikus.png" class="img-sap">
                <p class="produto-descricao">Tênis Olympikus Corrida Veloz 2 157</p>
                <p class="produto-preco">R$ 169,99</p>
              </li>
            </ul>
      </main>    
      <main>  
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
                   <input type="email" id="email">
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
       </main> 
  </body>
  <style>
 
</style>
</html>