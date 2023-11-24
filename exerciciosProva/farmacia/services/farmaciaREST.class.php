<?php

require_once "../models/conexao.class.php";
require_once "../models/remedioDAO.class.php";
require_once "../models/farmacia.class.php";
require_once "../models/farmaciaDAO.class.php";

class FarmaciaREST
{
    public function listar_remedios()
    {
        $remedioDAO = new RemedioDAO();
        $retorno = $remedioDAO->buscar_todos_remedios();
        return json_encode($retorno);
    }

    public function cadastrar_farmacia($nome, $telefone, $latitude, $longitude)
    {
        $farmacia = new Farmacia(
            nome: $nome,
            telefone: $telefone,
            latitude: $latitude,
            longitude: $longitude
        );
        $farmaciaDAO = new FarmaciaDAO();
        $retorno = $farmaciaDAO->cadastrar_farmacia($farmacia);
        return json_encode($retorno);
    }
}

$obj = new FarmaciaREST();

if ($_GET) {
    if (isset($_GET["oper"])) {
        $metodo = $_GET["oper"];
    }

    if ($metodo == "listar_remedios") {
        $ret = $obj->$metodo();
    }
}

if ($_POST) {
    if (isset($_POST["oper"])) {
        $metodo = $_POST["oper"];
    }

    if ($metodo == "cadastrar_farmacia") {
        $ret = $obj->$metodo(
            $_POST["nome"],
            $_POST["telefone"],
            $_POST["latitude"],
            $_POST["longitude"]
        );
    }
}

exit($ret);
