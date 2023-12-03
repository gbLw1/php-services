<?php
require_once "../models/conexao.class.php";
require_once "../models/consoleDAO.class.php";

$server = new soapServer("games.wsdl");

class GamesSOAP
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

	public function buscar_consoles()
	{
		if ($this->autenticado) {
			$consoleDAO = new ConsoleDAO();
			$retorno = $consoleDAO->buscar_todos_consoles();
			return json_encode($retorno);
		} else {
			return json_encode("Problema de autenticacao");
		}
	}
}

$server->setObject(new GamesSOAP());
$server->handle();
