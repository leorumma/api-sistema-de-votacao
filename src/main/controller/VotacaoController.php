<?php

namespace controller;

use dao\VotacaoDAO;

class VotacaoController {

    public function __construct(private readonly VotacaoDAO $votacaoDAO) {
    }

    public function processRequest(string $method, ?string $id): void {
        if ($id) {

            $this->processResourceRequest($method, $id);

        } else {

            $this->processCollectionRequest($method);

        }
    }

    private function processResourceRequest(string $method, string $id): void {

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