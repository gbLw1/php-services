-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2023 às 07:19
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `games`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `console`
--

CREATE TABLE `console` (
  `idconsole` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `console`
--

INSERT INTO `console` (`idconsole`, `descricao`) VALUES
(1, 'PC'),
(2, 'PS1'),
(3, 'PS2'),
(4, 'PS3'),
(5, 'PS4'),
(7, 'XBOX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `game`
--

CREATE TABLE `game` (
  `idgame` int(10) UNSIGNED NOT NULL,
  `console_idconsole` int(10) UNSIGNED NOT NULL,
  `nome` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `game`
--

INSERT INTO `game` (`idgame`, `console_idconsole`, `nome`) VALUES
(1, 1, 'Team Fortress 2'),
(2, 1, 'Brawlhalla'),
(3, 2, 'Crash'),
(4, 3, 'Midnight Club 3: DUB Edition'),
(6, 7, 'Halo Infinite'),
(7, 1, 'Dota 2'),
(8, 1, 'Counter-Strike: Global Offensive'),
(9, 5, 'Fortnite'),
(10, 4, 'Call of Duty: Black Ops II');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`idconsole`);

--
-- Índices para tabela `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idgame`),
  ADD KEY `game_FKIndex1` (`console_idconsole`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `console`
--
ALTER TABLE `console`
  MODIFY `idconsole` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`console_idconsole`) REFERENCES `console` (`idconsole`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
