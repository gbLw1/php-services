<?php

class FarmaciaController {
    public function listar_farmacias_por_remedio() {
        if ($_POST) {
            $client = new soapClient("http://localhost/exerciciosprova/farmacia/services/farmaciaSoap.class.php?wsdl");

            $aut_parm = new stdClass();
            $aut_parm->username = "adm";
            $aut_parm->password = "123";

            $header_parm = new soapVar($aut_parm, SOAP_ENC_OBJECT);

            $header = new soapHeader("farmacia", "security", $header_parm, false);

            $client->__setSoapHeaders(array($header));

            $retorno = $client->buscar_farmacias_por_remedio($_POST["remedio"]);
            $retorno = json_decode($retorno);
            require_once "views/listar_farmacias_remedio.php";
        }

        $retorno = file_get_contents("http://localhost/exerciciosprova/farmacia/services/farmaciaREST.class.php?oper=listar_remedios");
        $retorno = json_decode($retorno);
        require "views/listar_remedios.php";
    }
    
    public function cadastrar_farmacia() {
        if ($_POST) {
            $dados = array(
                "oper" => "cadastrar_farmacia", 
                "nome" => $_POST["nome"],
                "telefone" => $_POST["telefone"],
                "latitude" => $_POST["latitude"],
                "longitude" => $_POST["longitude"],
            );

            $curl = curl_init("http://localhost/exerciciosprova/farmacia/services/farmaciaREST.class.php");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $retorno = curl_exec($curl);

            curl_close($curl);

            $retorno = json_decode($retorno);

            echo $retorno;
        }

        require "views/cadastrar_farmacia.php";
    }
}

