<?php
require_once('GCC188-CKM\src\Model\Cliente.php');

    class TestCliente extends PHPUnit\Framework\TestCase{

        public function testGetNome() {
            $cliente = new Cliente('Joao', '12345678901', 'abc@qwert.com');

            $this->assertEquals('Joao', $cliente->getNome(),"Erro no nome");
            $this->assertEquals('12345678901', $cliente->getCpf(), "Erro no cpf");
            $this->assertEquals('abc@qwert.com', $cliente->getEmail(), "Erro no email");
        }
    }

    /*  Rodar o teste:
    phpunit GCC188-CKM\src\Test\TestCliente.php 
    */

?>

