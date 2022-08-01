<?php

class VotacaoController {

    public function __construct(private readonly VotacaoDAO $votacaoDAO) {
    }

    public function processRouter(string $method, string $action, string $param): void {
        if ($method == "GET" && $action == "votacao") {
            echo json_encode($this->votacaoDAO->getAll());
            return;
        }
        if ($method == "POST" && $action == "votacao" && !empty($param)) {
            echo json_encode($this->votacaoDAO->updateVotosByNumero($param));
            return;
        }
        if ($method == "GET" && $action == "resultado") {
            echo json_encode($this->votacaoDAO->getAllResultsDesc());
            return;
        }
        http_response_code(405);
        header("Allow: GET, POST");
    }
}