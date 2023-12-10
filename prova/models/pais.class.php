<?php

class Pais
{
    public function __construct(
        private int $idpais = 0,
        private string $nome = "",
    ) {
    }

    public function getId(): int
    {
        return $this->idpais;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

