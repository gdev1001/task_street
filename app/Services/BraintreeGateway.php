<?php

namespace App\Services;

use Config;
use Braintree_ClientToken;
use Braintree_Configuration;
use Braintree_Transaction;
use Braintree_PaymentMethod;
use Braintree_Customer;

class BraintreeGateway{

    public function __construct()
    {
        Braintree_Configuration::environment(Config::get('braintree.environment'));
        Braintree_Configuration::merchantId(Config::get('braintree.merchantid'));
        Braintree_Configuration::publicKey(Config::get('braintree.public_key'));
        Braintree_Configuration::privateKey(Config::get('braintree.private_key'));
    }  

    public function getClientToken()
    {
        return $clientToken = Braintree_ClientToken::generate();
    }

    public function checkout($params)
    {
        return Braintree_Transaction::sale([
            'amount' => $params['amount'],
            'paymentMethodNonce' => $params['payment_method_nonce'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);        
    }

    public function checkoutByPaymentMethod($params)
    {
        return Braintree_Transaction::sale([
            'amount' => $params['amount'],
            'paymentMethodToken' => $params['payment_method_token']
        ]);        
    }

    public function createCustomer($params){
        return $result = Braintree_Customer::create([
            'firstName' => $params['name'],
            'email' => $params['email']
        ]);
    }

    public function createPaymentMethod($params){
        return Braintree_PaymentMethod::create([
            'customerId' => $params['customer_id'],
            'paymentMethodNonce' => $params['payment_nonce']
        ]);
    }

    public function getTokenKey()
    {
        return Config::get('braintree.token_key');
    }   
}