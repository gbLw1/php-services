<?php

class GameController {
    public function listar_games_por_console() {
        if ($_POST) {
            $dados = array(
                "oper" => "buscar_games",
                "console" => $_POST["console"],
            );

            $curl = curl_init("http://localhost/exerciciosprova/games/services/gamesREST.class.php");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $retorno = curl_exec($curl);

            curl_close($curl);

            $retorno = json_decode($retorno);

            require_once "views/listar_games_console.php";
        }

        $client = new soapClient("http://localhost/exerciciosprova/games/services/gamesSOAP.class.php?wsdl");

        $aut_parm = new stdClass();
        $aut_parm->username = "adm";
        $aut_parm->password = "123";

        $header_parm = new soapVar($aut_parm, SOAP_ENC_OBJECT);

        $header = new soapHeader("games", "security", $header_parm, false);

        $client->__setSoapHeaders(array($header));

        $retorno = $client->buscar_consoles();

        $retorno = json_decode($retorno);

        require "views/listar_consoles.php";
    }
    
    public function novo_game() {
        if ($_POST) {
            $gameNome = urlencode($_POST["nome"]);
            $gameConsole = urlencode($_POST["console"]);
            $retorno = file_get_contents("http://localhost/exerciciosprova/games/services/gamesREST.class.php?oper=cadastrar_game&console_idconsole=$gameConsole&nome=$gameNome");
            $retorno = json_decode($retorno);

            echo $retorno;
        }

        $client = new soapClient("http://localhost/exerciciosprova/games/services/gamesSOAP.class.php?wsdl");

        $aut_parm = new stdClass();
        $aut_parm->username = "adm";
        $aut_parm->password = "123";

        $header_parm = new soapVar($aut_parm, SOAP_ENC_OBJECT);

        $header = new soapHeader("games", "security", $header_parm, false);

        $client->__setSoapHeaders(array($header));

        $retorno = $client->buscar_consoles();

        $retorno = json_decode($retorno);

        require "views/cadastrar_game.php";
    }
}
