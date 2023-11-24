-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2021 às 15:03
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `idfarmacia` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `farmacia`
--

INSERT INTO `farmacia` (`idfarmacia`, `nome`, `telefone`, `latitude`, `longitude`) VALUES
(2, 'Drogaria São Paulo', '(14)99999999', '-22.3256620656', '-49.0582177912'),
(3, 'Drogaria Categral', '(14)999988888', '-22.3267536842', '-49.0579965258'),
(4, 'Farmácia BS Medicamentos', '(14)32231111', '-22.32648078036', '-49.0609467311');

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia_remedio`
--

CREATE TABLE `farmacia_remedio` (
  `idfarmacia_remedio` int(10) UNSIGNED NOT NULL,
  `remedio_idremedio` int(10) UNSIGNED NOT NULL,
  `farmacia_idfarmacia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `farmacia_remedio`
--

INSERT INTO `farmacia_remedio` (`idfarmacia_remedio`, `remedio_idremedio`, `farmacia_idfarmacia`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 2, 2),
(4, 4, 2),
(5, 1, 3),
(6, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedio`
--

CREATE TABLE `remedio` (
  `idremedio` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `remedio`
--

INSERT INTO `remedio` (`idremedio`, `nome`) VALUES
(1, 'Dipirona'),
(2, 'Presmin'),
(3, 'Magnopyrol'),
(4, 'Tylenol'),
(5, 'Feldene');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`idfarmacia`);

--
-- Índices para tabela `farmacia_remedio`
--
ALTER TABLE `farmacia_remedio`
  ADD PRIMARY KEY (`idfarmacia_remedio`),
  ADD KEY `farmacia_remedio_FKIndex1` (`farmacia_idfarmacia`),
  ADD KEY `farmacia_remedio_FKIndex2` (`remedio_idremedio`);

--
-- Índices para tabela `remedio`
--
ALTER TABLE `remedio`
  ADD PRIMARY KEY (`idremedio`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `idfarmacia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `farmacia_remedio`
--
ALTER TABLE `farmacia_remedio`
  MODIFY `idfarmacia_remedio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `remedio`
--
ALTER TABLE `remedio`
  MODIFY `idremedio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `farmacia_remedio`
--
ALTER TABLE `farmacia_remedio`
  ADD CONSTRAINT `farmacia_remedio_ibfk_1` FOREIGN KEY (`farmacia_idfarmacia`) REFERENCES `farmacia` (`idfarmacia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `farmacia_remedio_ibfk_2` FOREIGN KEY (`remedio_idremedio`) REFERENCES `remedio` (`idremedio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
