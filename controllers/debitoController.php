<?php
require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;

class debitoController extends controller{

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if(!empty($_POST['firstName'])){
            $name = addslashes($_POST['firstName']);
            $segundo_name = addslashes($_POST['lastName']);
            $email = addslashes($_POST['email']);
            $address = addslashes($_POST['address']);
            $address2 = addslashes($_POST['address2']);
            $state = addslashes($_POST['state']);
            $city = addslashes($_POST['city']);
            $zip = addslashes($_POST['zip']);
            $flag = addslashes($_POST['cc-flag']);
            $number = addslashes($_POST['cc-number']);
            $expiration = addslashes($_POST['cc-expiration']);
            $cvv = addslashes($_POST['cc-cvv']);
            $total = addslashes($_POST['total']);

            // Configure o ambiente
            $environment = $environment = Environment::sandbox();

            // Configure seu merchant
            $merchant = new Merchant('b5d2e598-b1ed-4fc2-a8f0-d847ac0a8d71', 'AZBTMVIQYVXSPZRJUHFVXBUIKARHLAPTAXHKQHNH');

            // Crie uma instância de Sale informando o ID do pedido na loja
            $id_interno = 123;
            $sale = new Sale($id_interno);

            // Crie uma instância de Customer informando o nome do cliente
            $customer = $sale->customer($name . ' ' . $segundo_name);

            // Crie uma instância de Payment informando o valor do pagamento
            $payment = $sale->payment((int) ($total . '00'));

            $payment->setCapture(1);

            $payment->setAuthenticate(1);

            //$payment->setReturnUrl( BASE_URL . "status" . $id_interno);
            $payment->setReturnUrl('http://localhost/projetocielo/status?id='.$id_interno);

            $payment->debitCard($cvv, $flag)
                ->setExpirationDate($expiration)
                ->setCardNumber($number)
                ->setHolder($name . ' ' . $segundo_name);

// Crie o pagamento na Cielo
            try {
                // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
                $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

                // Gravar no seu banco de dados o payment ID
                $paymentId = $sale->getPayment()->getPaymentId();
                $fp = fopen("transacao.txt", "w");
                $escreve = fwrite($fp, $paymentId);
                fclose($fp);

                /*echo $sale->getPayment()->getStatus();
                echo "-";
                echo $sale->getPayment()->getReturnCode();
                echo "<pre>";
                print_r($sale->getPayment());
                die()*/


                Header("Location: " . $sale->getPayment()->getAuthenticationUrl());

            } catch (CieloRequestException $e) {

                Header("Location: retorno.php?cod=2&erro=" . $e->getCieloError()->getCode());
            }

        }

    }

}