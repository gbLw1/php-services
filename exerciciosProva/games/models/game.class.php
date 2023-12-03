<?php

class Game {
    public function __construct(
        private int $idgame = 0,
        private int $console_idconsole = 0,
        private string $nome = "")
    { }

    public function getId(): int
    {
        return $this->idgame;
    }

    public function getConsoleId(): int
    {
        return $this->console_idconsole;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

