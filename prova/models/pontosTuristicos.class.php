<?php

class PontosTuristicos
{
    public function __construct(
        private int $idpontos_turisticos = 0,
        private int $idpais = 0,
        private string $nome = ""
    ) {
    }

    public function getId(): int
    {
        return $this->idpontos_turisticos;
    }

    public function getIdPais(): int
    {
        return $this->idpais;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

