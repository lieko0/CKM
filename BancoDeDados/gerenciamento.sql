-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2022 às 06:54
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`Id`, `Nome`, `Email`, `Cpf`) VALUES
(35, 'Pão', 'dwadwa@fw.daw', '31233123123'),
(36, 'Carlos', 'fe@fs.cds', '12345675342');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`Id`, `Nome`, `Email`, `Cpf`) VALUES
(1, 'Caio', 'ca@fa.da', '12345678901'),
(2, 'Joao', 'ca@dfa.ada', '15345678901');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Membro` int(11) NOT NULL,
  `Abertura` date NOT NULL,
  `Fechamento` date NOT NULL,
  `Observacoes` varchar(100) DEFAULT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`Id`, `Titulo`, `Cliente`, `Membro`, `Abertura`, `Fechamento`, `Observacoes`, `Status`) VALUES
(3, 'dwadwa', 35, 2, '2022-04-06', '2022-03-31', 'dawd', 'dwada');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Cpf` (`Cpf`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Cpf` (`Cpf`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ClienteId` (`Cliente`),
  ADD KEY `MembroId` (`Membro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `ClienteId` FOREIGN KEY (`Cliente`) REFERENCES `clientes` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `MembroId` FOREIGN KEY (`Membro`) REFERENCES `membros` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
