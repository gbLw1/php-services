<?php
require_once "../models/conexao.class.php";
require_once "../models/pontosTuristicosDAO.class.php";

$server = new soapServer("pontos_turisticos.wsdl");

class PontosTuristicosSOAP
{
	private $autenticado = false;

	public function security($header)
	{
		if (isset($header->username) && isset($header->password)) {
			if ($header->username == "adm" && ($header->password == "123")) {
				$this->autenticado = true;
			}
		}
	}

	public function buscarPorPais($paisId)
	{
		if ($this->autenticado) {
			$ptDAO = new PontosTuristicosDAO();
			$retorno = $ptDAO->buscar_pontos_turisticos_por_pais($paisId);
			return json_encode($retorno);
		} else {
			return json_encode("Problema de autenticacao");
		}
	}
}

$server->setObject(new PontosTuristicosSOAP());
$server->handle();

