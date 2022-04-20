<?php

class Projeto
{
    private $titulo;
    private $cliente;
    private $membro;
    private $abertura;
    private $fechamento;
    private $observacao;
    private $status;


    function __construct(
        $vtitulo,
        $vcliente,
        $vmembro,
        $vabertura,
        $vfechamento,
        $vobservacao,
        $vstatus
    ) {
        $this->titulo = $vtitulo;
        $this->cliente = $vcliente;
        $this->membro = $vmembro;
        if (empty($vabertura)) {
            $this->abertura = date('Y-m-d', time());
        } else {
            $this->abertura = $vabertura;
        }
        $this->fechamento = $vfechamento;
        $this->observacao = $vobservacao;
        $this->status = $vstatus;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function getCliente()
    {
        return $this->cliente;
    }

    function getMembro()
    {
        return $this->membro;
    }

    function getAbertura()
    {
        return $this->abertura;
    }

    function getFechamento()
    {
        return $this->fechamento;
    }

    function getObservacao()
    {
        return $this->observacao;
    }

    function getStatus()
    {
        return $this->status;
    }
}
