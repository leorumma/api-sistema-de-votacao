<?php

class VotacaoController {

    public function __construct(private readonly VotacaoDAO $votacaoDAO) {
    }

    public function processRequest(string $method, string $numero): void {
        $this->processCollectionRequest($method, $numero);
    }

    private function processCollectionRequest(string $method, string $numero): void {
        if ($method == "GET") {
            echo json_encode($this->votacaoDAO->getAll());
            return;
        }
        if ($method == "POST" && !empty($numero)) {
            echo json_encode($this->votacaoDAO->votar($numero));
            return;
        }
        http_response_code(405);
        header("Allow: GET, POST");
    }
}