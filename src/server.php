<?php
use Workerman\Worker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;

require_once "./vendor/autoload.php";


$register = new Register('text://0.0.0.0:1236');


$gateway = new Gateway("websocket://0.0.0.0:8282");

$gateway->name = 'WebSocketGateway';

$gateway->count = 1;

$gateway->lanIp = '127.0.0.1';

$gateway->startPort = 2300;

$gateway->registerAddress = '127.0.0.1:1236';


$gateway->onConnect = function($client_id) {

    \GatewayWorker\Lib\Gateway::sendToClient($client_id, "Bienvenido al servidor WebSocket!\n");


    \GatewayWorker\Lib\Gateway::sendToClient($client_id, "Este es tu segundo mensaje!\n");
};


Worker::runAll();
