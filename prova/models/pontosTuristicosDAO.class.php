<?php

class PontosTuristicosDAO extends conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function buscar_pontos_turisticos()
	{
		$sql = "SELECT * FROM pontos_turisticos";

		try {
			$stm = $this->db->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			return "Problema ao buscar os pontos turisticos";
		} finally {
			$this->db = null;
		}
	}

	public function buscar_pontos_turisticos_por_pais($paisId)
	{
		$sql = "SELECT pt.*, p.nome as pais
				FROM pontos_turisticos pt
				INNER JOIN pais p ON pt.idpais = p.idpais
				WHERE pt.idpais = :idpais";

		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":idpais", $paisId);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			return "Problema ao buscar os pontos turisticos pelo pais";
		} finally {
			$this->db = null;
		}
	}
}
