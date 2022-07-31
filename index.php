<?php
declare(strict_types=1);

use controller\VotacaoController;
use dao\VotacaoDAO;

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/main/$class.php";
});

set_error_handler("controller\ErrorHandler");
set_exception_handler("controller\ErrorHandler");

header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "votacao") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$database = new Database("us-cdbr-east-06.cleardb.net", "heroku_d93ba097fb66e79", "b0c8908c00dc37", "3602e713");

$votacaoDAO = new VotacaoDAO($database);

$controller = new VotacaoController($votacaoDAO);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);