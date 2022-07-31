<?php

class VotacaoController {

    public function __construct(private readonly VotacaoDAO $votacaoDAO) {
    }

    public function processRequest(string $method): void {
        $this->processCollectionRequest($method);
    }

    private function processCollectionRequest(string $method): void {
        switch ($method) {
            case "GET":
                echo json_encode($this->votacaoDAO->getAll());
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }
}