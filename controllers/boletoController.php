<?php

require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;

class boletoController extends controller{

    public function __construct() {
        parent::__construct();
    }

    public function index() {

//        print_r($_POST);
//        exit;

        if(!empty($_POST['firstName'])){
            $name = addslashes($_POST['firstName']);
            $segundo_name = addslashes($_POST['lastName']);
            $ident = addslashes($_POST['ident']);
            $cpf = addslashes($_POST['cpf']);
            $address = addslashes($_POST['address']);
            $numero = addslashes($_POST['numero']);
            $bairro = addslashes($_POST['bairro']);
            $state = addslashes($_POST['state']);
            $city = addslashes($_POST['city']);
            $zip = addslashes($_POST['zip']);
            $country = addslashes($_POST['country']);
            $total = addslashes($_POST['total']);

            // Configure o ambiente
            $environment = $environment = Environment::sandbox();

            // Configure seu merchant
            $merchant = new Merchant('b5d2e598-b1ed-4fc2-a8f0-d847ac0a8d71', 'AZBTMVIQYVXSPZRJUHFVXBUIKARHLAPTAXHKQHNH');

            // Crie uma instância de Sale informando o ID do pedido na loja

            $id_interno = 123;
            $sale = new Sale($id_interno);

            // Crie uma instância de Customer informando o nome do cliente
            $customer = $sale->customer($name . ' ' . $segundo_name)
                ->setIdentity($ident)
                ->setIdentityType($cpf)
                ->address()->setZipCode($zip)
                ->setCountry($country)
                ->setState($state)
                ->setCity($city)
                ->setDistrict($bairro)
                ->setStreet($address)
                ->setNumber($numero);


            // Crie uma instância de Payment informando o valor do pagamento
            $payment = $sale->payment((int) ($total . '00'));

            $payment->setCapture(1);

            $payment->setReturnUrl('http://localhost/projetocielo/statusBoleto?id='.$id_interno);

            $payment->setType(Payment::PAYMENTTYPE_BOLETO)
                ->setAddress('Rua de Teste')
                ->setBoletoNumber('1234')
                ->setAssignor('Empresa de Teste')
                ->setDemonstrative('Desmonstrative Teste')
                ->setExpirationDate(date('d/m/Y', strtotime('+1 month')))
                ->setIdentification('11884926754')
                ->setInstructions('Esse é um boleto de exemplo');



            // Crie o pagamento na Cielo
            try {
                // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
                $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

                $paymentId = $sale->getPayment()->getPaymentId();
//                $fp = fopen("boleto.txt", "w");
//                $escreve = fwrite($fp, $paymentId);
//                fclose($fp);

                /*echo $sale->getPayment()->getStatus();
                echo "-";
                echo $sale->getPayment()->getReturnCode();
                echo "<pre>";
                print_r($sale->getPayment());
                die();*/


                Header("Location: " . $sale->getPayment()->getUrl());

            } catch (CieloRequestException $e) {

                Header("Location: retorno.php?cod=2&erro=" . $e->getCieloError()->getCode());
            }
        }
    }

}