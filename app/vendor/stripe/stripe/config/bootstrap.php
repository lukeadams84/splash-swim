<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

namespace Stripe;

require_once("../vendor/stripe/stripe-php/init.php");

$stripe = array(
  "secret_key"      => "sk_test_6dnaLV4sdSU2OLxtizBpXXDO",
  "publishable_key" => "pk_test_ARgAJVgJV0Qd8Dau7ROW6Tth"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

?>
