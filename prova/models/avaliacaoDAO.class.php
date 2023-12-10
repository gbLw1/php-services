<?php

class AvaliacaoDAO extends conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function avaliar_ponto_turistico($avaliacao)
	{
		$sql = "INSERT INTO avaliacao (idpontos_turisticos, estrelas) VALUES 
				(:ponto_turistico_id, :estrelas)";
		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":ponto_turistico_id", $avaliacao->getIdPontosTuristicos());
			$stm->bindValue(":estrelas", $avaliacao->getEstrelas());
			$stm->execute();
			return "Avaliação cadastrada com sucesso";
		} catch (PDOException $e) {
			return "Problema ao cadastrar a avaliação";
		} finally {
			$this->db = null;
		}
	}
}
