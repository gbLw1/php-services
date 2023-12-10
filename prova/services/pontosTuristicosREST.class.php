<?php

require_once "../models/conexao.class.php";
require_once "../models/pontosTuristicosDAO.class.php";
require_once "../models/avaliacao.class.php";
require_once "../models/avaliacaoDAO.class.php";

class PontosTuristicosREST
{
    public function buscarPontosTuristicos()
    {
        $ptDAO = new PontosTuristicosDAO();
        $retorno = $ptDAO->buscar_pontos_turisticos();
        return json_encode($retorno);
    }

    public function avaliarPontoTuristico($idpontos_turisticos, $estrelas)
    {
        $avaliacao = new Avaliacao(
            idpontos_turisticos: $idpontos_turisticos,
            estrelas: $estrelas,
        );
        $avaliacaoDAO = new AvaliacaoDAO();
        $retorno = $avaliacaoDAO->avaliar_ponto_turistico($avaliacao);
        return json_encode($retorno);
    }
}

$obj = new PontosTuristicosREST();

if ($_GET) {
    if (isset($_GET["oper"])) {
        $metodo = $_GET["oper"];
    }

    if ($metodo == "buscarPontosTuristicos") {
        $ret = $obj->$metodo();
    }
}

if ($_POST) {
    if (isset($_POST["oper"])) {
        $metodo = $_POST["oper"];
    }

    if ($metodo == "avaliarPontoTuristico") {
        $ret = $obj->$metodo(
            $_POST["idpontos_turisticos"],
            $_POST["estrelas"],
        );
    }
}

exit($ret);

