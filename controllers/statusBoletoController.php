<?php

require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;

class statusBoletoController extends controller{

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $environment = $environment = Environment::sandbox();

        // Configure seu merchant
        $merchant = new Merchant('b5d2e598-b1ed-4fc2-a8f0-d847ac0a8d71', 'AZBTMVIQYVXSPZRJUHFVXBUIKARHLAPTAXHKQHNH');

        // buscar no banco do seu sistema o Payment ID da transação Cielo pelo ID interno do seu sistema
        $id_seu_sistema = $_GET['id'];
        $payment_id = fgets(fopen ('boleto.txt', 'r'), 1024);

        $sale = (new CieloEcommerce($merchant, $environment))->getSale($payment_id);

        //echo $sale->getPayment()->getStatus();

        if($sale->getPayment()->getStatus() == 2){
            $cod = 0;
            $dados['cod'] = $cod;
            $dados['info'] = $sale->getPayment();
            $this->loadTemplate('retorno', $dados);

        }else{
            $cod = 1;
            $dados['cod'] = $cod;
            $dados['info'] = $sale->getPayment();
            $dados['erro'] = $sale->getPayment()->getReturnCode();

        }

    }

}