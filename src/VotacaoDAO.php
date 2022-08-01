<?php

class VotacaoDAO {

    private mysqli $conn;

    public function __construct(Database $database) {
        $this->conn = $database->getConnection();
    }

    public function getAll(): stdClass {
        $candidatos = array();
        $qtd_etapas = 0;
        $etapas = array();
        $etapas['5'] = 0;
        $etapas['4'] = 0;
        $etapas['3'] = 0;
        $etapas['2'] = 0;

        $sql = "select * from heroku_d93ba097fb66e79.candidato c";
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $cdt = new stdClass;
            $etapas[strlen($row['numero'])]++;
            $cdt->numero = $row['numero'];
            $cdt->nome = $row['nome'] ? utf8_encode($row['nome']) : "";
            $cdt->partido = $row['partido'];
            $cdt->foto = $row['foto'];
            $cdt->nome_vice = $row['nome_vice'] ? utf8_encode($row['nome_vice']) : "";
            $cdt->partido_vice = $row['partido_vice'];
            $cdt->foto_vice = $row['foto_vice'];
            $cdt->votos = $row['votos'];
            array_push($candidatos, $cdt);
        }
        foreach ($etapas as $k => $v) {
            if ($v != 0) {
                $qtd_etapas++;
            }
        }
        $etapas = array_filter($etapas, function ($obj) {
            if ($obj == 0) {
                return false;
            }
            return true;
        });
        $i = 0;
        $resp = new stdClass;
        foreach ($etapas as $k => $v) {
            $resp->{$i} = new stdClass;
            if ($k == 2) {
                $resp->{$i}->titulo = 'prefeito';
            } else if ($k == 3) {
                $resp->{$i}->titulo = 'senador';
            } else if ($k == 4) {
                $resp->{$i}->titulo = 'deputado federal';
            } else if ($k == 5) {
                $resp->{$i}->titulo = 'vereador';
            }
            $resp->{$i}->numeros = $k;
            $resp->{$i}->candidatos = new stdClass;
            foreach ($candidatos as $a => $b) {
                $resp->{$i}->candidatos->{$b->numero} = new stdClass;
                $resp->{$i}->candidatos->{$b->numero}->nome = $b->nome;
                $resp->{$i}->candidatos->{$b->numero}->partido = $b->partido;
                $resp->{$i}->candidatos->{$b->numero}->foto = $b->foto;
            }
            $i++;
        }
        mysqli_close($this->conn);
        return $resp;
    }

    public function updateVotosByNumero($numero): string {
        $sql_quantidade_votos = "SELECT `votos` FROM `candidato` WHERE `numero`='$numero'";
        $result = mysqli_query($this->conn, $sql_quantidade_votos);
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_array($result);
            $voto = (int) $row["votos"];
            $voto++;
            if(mysqli_query($this->conn, "UPDATE `candidato` SET `votos`='$voto' WHERE `numero`='$numero'")) {
                return 'voto computado</br>';
            } else {
                return 'falhou</br>';
            }
        }
        return "";
    }

    public function getAllResultsDesc(): Array  {
        $candidatos = array();
        $sql = "select * from heroku_d93ba097fb66e79.candidato c where c.votos > 0 order by c.votos desc";
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $cdt = new stdClass;
            $cdt->numero = $row['numero'];
            $cdt->nome = $row['nome'] ? utf8_encode($row['nome']) : "";
            $cdt->partido = $row['partido'];
            $cdt->foto = $row['foto'];
            $cdt->nome_vice = $row['nome_vice'] ? utf8_encode($row['nome_vice']) : "";
            $cdt->partido_vice = $row['partido_vice'];
            $cdt->foto_vice = $row['foto_vice'];
            $cdt->votos = $row['votos'];
            $cdt->tipo_candidatura = strlen($row['numero']) == 5 ? "VEREADOR" : "PREFEITO";
            array_push($candidatos, $cdt);
        }
        return $candidatos;
    }
}