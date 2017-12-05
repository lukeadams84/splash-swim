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

Configuration::environment('production');
Configuration::merchantId('gh4r4mx6pnfmhxwh');
Configuration::publicKey('nkmwnmrnm7hqt5w4');
Configuration::privateKey('26f7f6dfb8ff61e35eaa279bd2d00b12');

?>
