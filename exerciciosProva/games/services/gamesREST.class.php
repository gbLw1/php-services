<?php

require_once "../models/conexao.class.php";
require_once "../models/gameDAO.class.php";
require_once "../models/game.class.php";

class GamesREST {
    public function cadastrar_game($console_idconsole, $nome) {
        $game = new Game(
            console_idconsole: $console_idconsole,
            nome: $nome
        );
        $gameDAO = new GameDAO();
        $retorno = $gameDAO->cadastrar_game($game);
        return json_encode($retorno);
    }

    public function buscar_games($consoleId) {
        $gameDAO = new GameDAO();
        $retorno = $gameDAO->buscar_games($consoleId);
        return json_encode($retorno);
    }

}

$obj = new GamesREST();

if ($_GET) {
    if (isset($_GET["oper"])) {
        $metodo = $_GET["oper"];
    }

    if ($metodo == "cadastrar_game") {
        $ret = $obj->$metodo(
            $_GET["console_idconsole"],
            $_GET["nome"]
        );
    }
}

if ($_POST) {
    if (isset($_POST["oper"])) {
        $metodo = $_POST["oper"];
    }

    if ($metodo == "buscar_games") {
        $ret = $obj->$metodo(
            $_POST["console"],
        );
    }
}

exit($ret);
