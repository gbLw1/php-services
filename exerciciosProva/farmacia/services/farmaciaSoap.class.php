<?php
require_once "../models/conexao.class.php";
require_once "../models/remedio.class.php";
require_once "../models/remedioDAO.class.php";
require_once "../models/farmacia.class.php";
require_once "../models/farmaciaDAO.class.php";

$server = new soapServer("farmacia.wsdl");

class FarmaciaSoap
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

	public function buscar_farmacias_por_remedio($remedio)
	{
		if ($this->autenticado) {
			$remedio = new Remedio($remedio);
			$farmaciaDAO = new FarmaciaDAO();
			$retorno = $farmaciaDAO->buscar_farmacias($remedio->getId());
			return json_encode($retorno);
		} else {
			return json_encode("Problema de autenticacao");
		}
	}
}

$server->setObject(new FarmaciaSoap());
$server->handle();

