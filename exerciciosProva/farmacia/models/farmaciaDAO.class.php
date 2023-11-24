<?php

class FarmaciaDAO extends conexao {
	public function __construct()
	{
		parent::__construct();
	}

	public function cadastrar_farmacia($farmacia)
	{
		$sql = "INSERT INTO farmacia (nome, telefone, latitude, longitude) VALUES (:nome, :telefone, :latitude, :longitude)";
		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":nome", $farmacia->getNome());
			$stm->bindValue(":telefone", $farmacia->getTelefone());
			$stm->bindValue(":latitude", $farmacia->getLatitude());
			$stm->bindValue(":longitude", $farmacia->getLongitude());
			$stm->execute();
			return "Farmacia cadastrada com sucesso";
		} catch (PDOException $e) {
			return "Problema ao cadastrar farmacia";
		} finally {
			$this->db = null;
		}
	}

	public function buscar_farmacias($remedioId)
	{
		$sql = "SELECT f.nome, f.telefone, f.latitude, f.longitude, r.nome as remedio
		   	FROM farmacia f 
			INNER JOIN farmacia_remedio fr ON f.idfarmacia = fr.farmacia_idfarmacia 
			INNER JOIN remedio r ON r.idremedio = fr.remedio_idremedio 
			WHERE r.idremedio = :idremedio";

		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":idremedio", $remedioId);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return "Problema ao buscar farmacias";
		} finally {
			$this->db = null;
		}
	}
}

