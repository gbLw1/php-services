<?php

class RemedioDAO extends conexao {
    public function __construct()
    {
	parent::__construct();
    }

    public function buscar_todos_remedios()
    {
	$sql = "SELECT * FROM remedio";
	try {
	    $stm = $this->db->prepare($sql);
	    $stm->execute();
	    return $stm->fetchAll(PDO::FETCH_OBJ);
	} catch (PDOException $e) {
	    return "Problema ao buscar catalogo de livros";
	} finally {
	    $this->db = null;
	}
    }
}

