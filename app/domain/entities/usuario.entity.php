<?php

class Usuario {
    private ?int $cd_usuario;
    private string $cd_login;
    private string $ds_senha;

    public function __construct(
        string $cd_login,
        string $ds_senha,
        ?int $cd_usuario = null
    ) {
        $this->cd_usuario = $cd_usuario;
        $this->cd_login = $cd_login;
        $this->ds_senha = $ds_senha;
    }

     public function getCdUsuario(): ?int {
        return $this->cd_usuario;
    }

    public function getCdLogin(): string {
        return $this->cd_login;
    }

    public function getDsSenha(): string {
        return $this->ds_senha;
    }

    public function setCdUsuario(?int $cd_usuario): void {
        $this->cd_usuario = $cd_usuario;
    }

    public function setCdLogin(string $cd_login): void {
        $this->cd_login = $cd_login;
    }

    public function setDsSenha(string $ds_senha): void {
        $this->ds_senha = $ds_senha;
    }

}
