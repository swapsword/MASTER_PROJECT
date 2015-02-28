<?php

define('CONSUTMER_KEY','nx1OQG3VgETh4nQSpFLBoKzeL');
define('CONSUTMER_SECRET','CYNaFJj6fkZk89OyqrCcB02aBLWmmDhtmE6Q7afMm4SluBpaYg');

require_once './lib/codebird/codebird.php';
require_once 'funcs.php';

global $config;

$config = get_config();

// create twitter api object
// set consumer key/secret
\Codebird\Codebird::setConsumerKey(CONSUTMER_KEY, CONSUTMER_SECRET);
// get instance
$cb = \Codebird\Codebird::getInstance();
// if App-Only bearer token doesn't exist
if (empty($config->bearer_token)){
  // get bearer token
  $reply = $cb->oauth2_token();
  if (empty($reply->errors)){
    $bearer_token = $reply->access_token;
    // save bearer token in config.json file
    add_config_value('bearer_token', $bearer_token);
  }
}


