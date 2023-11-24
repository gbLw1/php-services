<?php

class Farmacia {
    public function __construct(
        private int $idfarmacia = 0,
        private string $nome = "",
        private string $telefone = "",
        private string $latitude = "",
        private string $longitude = "")
    { }

    public function getIdfarmacia(): int
    {
        return $this->idfarmacia;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setIdfarmacia(int $idfarmacia): void
    {
        $this->idfarmacia = $idfarmacia;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }
}

