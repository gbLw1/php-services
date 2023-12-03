<?php

class GameDAO extends conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cadastrar_game($game)
	{
		$sql = "INSERT INTO game (console_idconsole, nome) VALUES (:console_idconsole, :nome)";
		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":console_idconsole", $game->getConsoleId());
			$stm->bindValue(":nome", $game->getNome());
			$stm->execute();
			return "Game cadastrado com sucesso";
		} catch (PDOException $e) {
			return "Problema ao cadastrar game";
		} finally {
			$this->db = null;
		}
	}

	public function buscar_games($consoleId)
	{
		$sql = "SELECT g.idgame, c.descricao as plataforma, g.nome as jogo FROM game g INNER JOIN console c ON g.console_idconsole = c.idconsole WHERE console_idconsole = :console_idconsole";

		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(":console_idconsole", $consoleId);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return "Problema ao buscar games";
		} finally {
			$this->db = null;
		}
	}
}
