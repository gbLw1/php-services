<?php

class ConsoleDAO extends conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function buscar_todos_consoles()
	{
		$sql = "SELECT * FROM console";
		try {
			$stm = $this->db->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			return "Problema ao buscar consoles";
		} finally {
			$this->db = null;
		}
	}
}
