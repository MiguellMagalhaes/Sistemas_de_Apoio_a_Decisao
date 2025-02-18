-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2024 às 15:55
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id_contact` int(11) NOT NULL,
  `morada` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telemovel` int(11) NOT NULL,
  `email_cliente` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `idadmin` int(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `menu_nome` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `pai` int(2) NOT NULL,
  `ativo` tinyint(2) NOT NULL,
  `ordem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `menu_nome`, `menu_url`, `pai`, `ativo`, `ordem`) VALUES
(1, 'About Us', '#about', 0, 1, 1),
(2, 'Projetos', '#projects', 0, 1, 2),
(3, 'Contact', '#signup', 0, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `redesociais`
--

CREATE TABLE `redesociais` (
  `id` int(10) NOT NULL,
  `rede_nome` varchar(50) NOT NULL,
  `rede_url` varchar(100) NOT NULL,
  `ativo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `redesociais`
--

INSERT INTO `redesociais` (`id`, `rede_nome`, `rede_url`, `ativo`) VALUES
(1, 'facebook', 'https://www.facebook.com/', 1),
(2, 'twitter', 'https://twitter.com/', 1),
(3, 'linkedin', 'https://pt.linkedin.com/', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `foto`, `usertype`) VALUES
(1, 'alex', 'alex@gmail.com', 'alex', '', 'admin'),
(2, 'admin', 'admin@gmail.com', '123', '', 'admin'),
(3, 'alex', '123@gmail.com', '123', '', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `redesociais`
--
ALTER TABLE `redesociais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `redesociais`
--
ALTER TABLE `redesociais`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
