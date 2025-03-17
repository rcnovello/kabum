<?php

class Cliente {
    private ?int $cd_cliente;
    private string $nm_cliente;
    private string $dt_nasc;
    private string $nr_cpf;
    private string $nr_rg;
    private string $nr_telefone;

    public function __construct(
        string $nm_cliente,
        string $dt_nasc,
        string $nr_cpf,
        string $nr_rg,
        string $nr_telefone,
        ?int $cd_cliente = null
    ) {
        $this->cd_cliente = $cd_cliente;
        $this->nm_cliente = $nm_cliente;
        $this->dt_nasc = $dt_nasc;
        $this->nr_cpf = $nr_cpf;
        $this->nr_rg = $nr_rg;
        $this->nr_telefone = $nr_telefone;
    }

    public function getCdCliente(): ?int {
        return $this->cd_cliente;
    }

    public function getNmCliente(): string {
        return $this->nm_cliente;
    }

    public function getDtNasc(): string {
        return $this->dt_nasc;
    }

    public function getNrCpf(): string {
        return $this->nr_cpf;
    }

    public function getNrRg(): string {
        return $this->nr_rg;
    }

    public function getNrTelefone(): string {
        return $this->nr_telefone;
    }

    public function setNmCliente(string $nm_cliente) {
        $this->nm_cliente = $nm_cliente;
    }

    public function setDtNasc(string $dt_nasc) {
        $this->dt_nasc = $dt_nasc;
    }

    public function setNrCpf(string $nr_cpf) {
        $this->nr_cpf = $nr_cpf;
    }

    public function setNrRg(string $nr_rg) {
        $this->nr_rg = $nr_rg;
    }

    public function setNrTelefone(string $nr_telefone) {
        $this->nr_telefone = $nr_telefone;
    }
}
