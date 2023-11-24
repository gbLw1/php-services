<?php

class Remedio {
    public function __construct(
        private int $idremedio = 0,
        private string $nome = "")
    { }

    public function getId(): int
    {
        return $this->idremedio;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

