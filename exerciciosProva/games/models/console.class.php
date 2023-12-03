<?php

class Console {
    public function __construct(
        private int $idconsole = 0,
        private string $descricao = "")
    { }

    public function getId(): int
    {
        return $this->idconsole;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
}

