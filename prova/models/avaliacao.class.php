<?php

class Avaliacao
{
    public function __construct(
        private int $idavaliacao = 0,
        private int $idpontos_turisticos = 0,
        private int $estrelas = 0
    ) {
    }

    public function getId(): int
    {
        return $this->idavaliacao;
    }

    public function getIdPontosTuristicos(): int
    {
        return $this->idpontos_turisticos;
    }

    public function getEstrelas(): string
    {
        return $this->estrelas;
    }
}
