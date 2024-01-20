<?php


require 'vendor/autoload.php';
use ZEGO\ZegoServerAssistant;
use ZEGO\ZegoErrorCodes;
$appId = 320244689;
$userId = 'main';
$secret = '2e9da9e8b5c7b124a4dab1cb817abab1';
$payload = '';
$token = ZegoServerAssistant::generateToken04($appId,$userId,$secret,3600,$payload);
if( $token->code == ZegoErrorCodes::success ){
   print_r(json_encode($token));
}




