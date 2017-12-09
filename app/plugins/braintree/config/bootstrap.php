<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

namespace Braintree;

require_once("../vendor/braintree/braintree_php/lib/Braintree.php");

if(file_exists("app.env")) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
    $dotenv->load();
}

Configuration::environment('sandbox');
Configuration::merchantId('kf9572k9337fv9w7');
Configuration::publicKey('fkjb2y3sq3sn4vym');
Configuration::privateKey('1dcc2994d5b24f0931ed9bc2f79ae1e0');

?>
