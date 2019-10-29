<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URL?>/assets/css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo BASE_URL?>/assets/images/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Pagamento Online</h2>
        <p class="lead">Aprenda a criar uma página no seu ecommerce para receber pagamentos online utilizando a API Cielo 3.0 com Bootstrap e PHP.
Um exemplo rápido e simples, que abre as portas para aplicações mais complexas.</p>
      </div>

      <div class="row">
        
        <div class="col-md-12">
<?php
//                            echo $info->getStatus();
//                            echo "-";
//                            echo $info->getReturnCode();
//                            echo "<pre>";
//                            print_r($viewData);
//                            print_r($cod['cod']);
//
//
//                           die();

//            print_r($viewData->getReturnCode());
//            exit;
//            print_r($erro);
//            exit;
			if(isset($cod)){
			if($cod == "0"){ ?>
			<div class="alert alert-success" role="alert">
			  Pagamento realizado com sucesso! <?php echo "TID " . $info->getTid(); ?>
			</div>
			<?php }else if($cod == "1"){ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Status: " . $info->getStatus() . " | Erro: " . $erro; ?>
			</div>
			<?php }else{ ?>
			<div class="alert alert-danger" role="alert">
			  Falha ao realizar o pagamento! <?php echo "Erro Integração : " . $erro; ?>
			</div>				
			<?php }}?>
			
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo BASE_URL?>/assets/js/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo BASE_URL?>/assets/js/popper.min.js"></script>
    <script src="<?php echo BASE_URL?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL?>/assets/js/holder.min.js"></script>
    
  </body>
</html>
