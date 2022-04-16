<?php

class Cliente {
    private $nome;
    private $cpf;
    private $email;

    function __construct($vnome, $vcpf, $vemail)
    {
        $this->cpf = $vcpf;
        $this->nome = $vnome;
        $this->email = $vemail;
    }

    function getNome() {
        return $this->nome;
    }

    
    function getCpf() {
        return $this->cpf;
    }
    
    function getEmail() {
        return $this->email;
    }
}

?>