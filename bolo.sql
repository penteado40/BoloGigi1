-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Ago-2020 às 05:08
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bolo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `EmailAdmin` longtext NOT NULL,
  `Nome` longtext DEFAULT NULL,
  `Senha` longtext DEFAULT NULL,
  `Telefone` varchar(13) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`EmailAdmin`, `Nome`, `Senha`, `Telefone`) VALUES
('flpenteado@gmail.com', 'Felipe Penteado', 'Pente@do2019', '11966259208'),
('gigicrismedeiros@gmail.com', 'Giovanna', '20Gi23lo', '11916541654');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolos`
--

CREATE TABLE `bolos` (
  `ID_Bolo` int(11) NOT NULL,
  `SaborBolo` longtext DEFAULT NULL,
  `Obs` longtext DEFAULT NULL,
  `PrecoBolo` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bolos`
--

INSERT INTO `bolos` (`ID_Bolo`, `SaborBolo`, `Obs`, `PrecoBolo`) VALUES
(1, 'Banana', '', '25'),
(4, 'Maçã', '', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `EmailCliente` longtext NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `NomeCompleto` longtext DEFAULT NULL,
  `Telefone` varchar(13) DEFAULT '0',
  `Endereco` longtext DEFAULT NULL,
  `Ncasa` varchar(6) DEFAULT '0',
  `Cidade` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`EmailCliente`, `Senha`, `NomeCompleto`, `Telefone`, `Endereco`, `Ncasa`, `Cidade`) VALUES
('flpenteadofb@gmail.com', '', '', '', '', '', ''),
('felipe.penteado@ucb.org.br', '', 'gregory', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobertura`
--

CREATE TABLE `cobertura` (
  `ID_Cobertura` int(11) NOT NULL,
  `SaborCobertura` longtext DEFAULT NULL,
  `Obs` longtext DEFAULT NULL,
  `PrecoCobertura` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cobertura`
--

INSERT INTO `cobertura` (`ID_Cobertura`, `SaborCobertura`, `Obs`, `PrecoCobertura`) VALUES
(1, 'Chocolate', '', '5'),
(3, 'Ninho', '', '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`
--

CREATE TABLE `entrega` (
  `ID_Entrega` int(11) NOT NULL,
  `Descrição` longtext DEFAULT NULL,
  `Valor` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(11) NOT NULL,
  `EmailCliente` longtext DEFAULT NULL,
  `EmailAdmin` longtext DEFAULT NULL,
  `Valor Final` longtext DEFAULT NULL,
  `ID_Entrega` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`ID_Pedido`, `EmailCliente`, `EmailAdmin`, `Valor Final`, `ID_Entrega`) VALUES
(1, 'felipe.penteado@ucb.org.br', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidodetalhes`
--

CREATE TABLE `pedidodetalhes` (
  `ID_Pedido` int(11) NOT NULL,
  `ID_Bolo` int(11) NOT NULL DEFAULT 0,
  `Preco_unt` int(11) DEFAULT 0,
  `ID_Cobertura` int(11) DEFAULT 0,
  `Preco_untCob` int(11) NOT NULL,
  `Obs` longtext DEFAULT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidodetalhes`
--

INSERT INTO `pedidodetalhes` (`ID_Pedido`, `ID_Bolo`, `Preco_unt`, `ID_Cobertura`, `Preco_untCob`, `Obs`, `Quantidade`) VALUES
(1, 1, 0, 1, 0, NULL, 0),
(1, 4, 0, 1, 0, 'Sem leite', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EmailAdmin`(100));

--
-- Índices para tabela `bolos`
--
ALTER TABLE `bolos`
  ADD PRIMARY KEY (`ID_Bolo`),
  ADD KEY `ID_Bolo` (`ID_Bolo`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`EmailCliente`(100));

--
-- Índices para tabela `cobertura`
--
ALTER TABLE `cobertura`
  ADD PRIMARY KEY (`ID_Cobertura`),
  ADD KEY `ID_Cobertura` (`ID_Cobertura`);

--
-- Índices para tabela `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`ID_Entrega`),
  ADD KEY `ID_Entrega` (`ID_Entrega`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `ID_Entrega` (`ID_Entrega`),
  ADD KEY `ID_Pedido` (`ID_Pedido`);

--
-- Índices para tabela `pedidodetalhes`
--
ALTER TABLE `pedidodetalhes`
  ADD PRIMARY KEY (`ID_Pedido`,`ID_Bolo`),
  ADD KEY `ID_Pedido` (`ID_Pedido`),
  ADD KEY `ID_Bolo` (`ID_Bolo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bolos`
--
ALTER TABLE `bolos`
  MODIFY `ID_Bolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cobertura`
--
ALTER TABLE `cobertura`
  MODIFY `ID_Cobertura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `entrega`
--
ALTER TABLE `entrega`
  MODIFY `ID_Entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidodetalhes`
--
ALTER TABLE `pedidodetalhes`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
