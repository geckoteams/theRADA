<?php
    /*
     * Contains import for Braintree's php library and Sample Merchant Credentials for Braintree Sandbox
     * */
    require_once 'braintree-php-3.20.0/lib/Braintree.php';
    Braintree_Configuration::environment('sandbox');
	Braintree_Configuration::merchantId('8tt62j7gmnr2crpj');
	Braintree_Configuration::publicKey('y563z42z9ky5vvnv');
	Braintree_Configuration::privateKey('2072191664dd2699e0e584aa9902ad72');
	/*Braintree_Configuration::environment('sandbox');
    Braintree_Configuration::merchantId('p227vr7wbrp3dmhs');
    Braintree_Configuration::publicKey('y2dy552pqw6gkb9k');
    Braintree_Configuration::privateKey('d58c60d82d4474d463c7372deef9c9ce');*/
?>