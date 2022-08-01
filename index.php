<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

header('Access-Control-Allow-Origin: *');

$parts = explode("/", $_SERVER["REQUEST_URI"]);

$action = $parts[2];

$param = $parts[3] ?? "";

$database = new DataBase("us-cdbr-east-06.cleardb.net", "heroku_d93ba097fb66e79", "b0c8908c00dc37", "3602e713");

$votacaoDAO = new VotacaoDAO($database);

$controller = new VotacaoController($votacaoDAO);

$controller->processRouter($_SERVER["REQUEST_METHOD"], $action, $param);