-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Set-2021 às 15:04
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ei32`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `cod` int(3) NOT NULL,
  `nome` text NOT NULL,
  `endereco` text NOT NULL,
  `email` text NOT NULL,
  `fone` text NOT NULL,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL,
  `cep` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  `cpf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`cod`, `nome`, `endereco`, `email`, `fone`, `dia`, `mes`, `ano`, `cep`, `cidade`, `estado`, `cpf`) VALUES
(13, 'ezequiel ', 'Rua Travessa Pau Brasil', 'ezequielwinchester16@gmail.com', '(73)98182-5585', 21, 6, 1995, '4444', 'Amapá', 'AM', '321..12.3.9-87'),
(14, 'evelin', 'Rua Ecó Park', 'evelinMatos@gmail.com', '(73)98187-5854', 20, 6, 2000, '741147', 'Goiás', 'MA', '321..12.3.9-87'),
(15, 'Levi Arkcman', 'Muralha de maria, ', 'leviarkcman@gmail.com', '(74)65454-1223', 22, 6, 1988, '789452', 'Amazonas', 'AC', '065..03.9.3-95'),
(16, 'Aqua', 'Reino de Konosuba', 'aqua.grifinoria@gmail.com', '(47)58585-6565', 19, 10, 2004, '74123', 'Porto Seguro', 'CE', '789.321.456-52'),
(18, 'Albedo', 'Tumba de Nazarik', 'Albedoamaainzgons@gmail.com', '(45)63636-8989', 22, 5, 2002, '7865', 'Amapá', 'BA', '789.456.321-45'),
(19, 'Emiya Shirou', 'Mundo de Fate Stay', 'emiya_trace_on@gmail.com', '(74)1441-5885', 24, 6, 1987, '741147', 'Porto Seguro', 'AP', '789.147.258-87');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cod` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
