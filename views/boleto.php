
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>API 3.0 da Cielo e PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URL?>/assets/css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo BASE_URL?>/assets/images/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Projeto Cielo Boleto</h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Carrinho</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Nome do Produto</h6>
                        <small class="text-muted">Descrição do Produto</small>
                    </div>
                    <span class="text-muted">R$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Segundo Produto</h6>
                        <small class="text-muted">Descrição do Produto</small>
                    </div>
                    <span class="text-muted">R$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Terceiro Produto</h6>
                        <small class="text-muted">Descrição do Produto</small>
                    </div>
                    <span class="text-muted">R$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Codigo de Promoção</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-R$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (R$)</span>
                    <strong>R$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Codigo Promocional">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Informações do Cliente</h4>
            <form class="needs-validation" novalidate action="<?php echo BASE_URL; ?>/boleto/index" method="POST">
                <input type="hidden" name="total" id="total" value="20">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Primeiro Nome</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Segundo Nome</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ident">Identidade </span></label>
                        <input type="ident" class="form-control" name="ident" id="ident" placeholder="Identidade" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cpf">CPF </span></label>
                        <input type="cpf" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
                <br>


                <h4 class="mb-3">Endereço</h4>
                <hr class="mb-4">

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="address">Rua</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Rua" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="bairro">Bairro </span></label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Cidade">
                        <div class="invalid-feedback">
                            Please select a valid city.
                        </div>
                    </div>
                </div>


                <div class="row">


                    <div class="col-md-4 mb-3">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" placeholder="Estado">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="country">Pais</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="Pais">

                        <div class="invalid-feedback">
                            Please select a valid city.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>



                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Comprar pelo Boleto</button>
            </form>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>