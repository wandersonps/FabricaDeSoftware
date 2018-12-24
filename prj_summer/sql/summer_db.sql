-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2016 às 18:07
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `summer_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` varchar(255) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dataCadastro` datetime NOT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `telFixo` varchar(255) DEFAULT NULL,
  `telCelular` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `endereco_id`, `nome`, `email`, `dataCadastro`, `rg`, `telFixo`, `telCelular`) VALUES
('03904053108', 3, 'Lucas de Albuquerque SIlva', 'lks.albq@gmail.com', '2016-10-10 00:00:00', '56565656', '3333333', '1111'),
('11111111111', 17, 'Lucas de Albuquerque SIlva', 'lks.albq@gmail.com', '2016-11-08 00:00:00', '56565656', '3333333', '1111'),
('teste', 16, 'teste', 'teste', '2016-11-16 00:00:00', 'teste', 'teste', 'etste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `uf` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `logradouro`, `numero`, `bairro`, `uf`, `cidade`, `cep`) VALUES
(3, 'sasas', '2323232', 'Guara', 'DF', 'Brasilia', '71050181'),
(16, 'teste', 'teste', 'teste', 'DF', 'teste', 'teste'),
(17, 'teste', 'fdsf', 'fdfd', 'DF', 'fsdfsd', '3123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `dataEmissao` datetime DEFAULT NULL,
  `dataPrevEntrega` datetime DEFAULT NULL,
  `longEixoOd` decimal(10,3) DEFAULT NULL,
  `longEsfOd` decimal(10,3) DEFAULT NULL,
  `longEixoOe` decimal(10,3) DEFAULT NULL,
  `longAlturaOe` decimal(10,3) DEFAULT NULL,
  `longDnpOe` decimal(10,3) DEFAULT NULL,
  `longCilOe` decimal(10,3) DEFAULT NULL,
  `longCilOd` decimal(10,3) DEFAULT NULL,
  `longAlturaOd` decimal(10,3) DEFAULT NULL,
  `longEsfOe` decimal(10,3) DEFAULT NULL,
  `perCilOe` decimal(10,3) DEFAULT NULL,
  `perEixoOd` decimal(10,3) DEFAULT NULL,
  `perEsfOe` decimal(10,3) DEFAULT NULL,
  `perCilOd` decimal(10,3) DEFAULT NULL,
  `perEixoOe` decimal(10,3) DEFAULT NULL,
  `perDnpOd` decimal(10,3) DEFAULT NULL,
  `perDnpOe` decimal(10,3) DEFAULT NULL,
  `lentes` varchar(255) DEFAULT NULL,
  `valor` decimal(10,3) DEFAULT NULL,
  `medico` varchar(255) DEFAULT NULL,
  `adicao` decimal(10,3) DEFAULT NULL,
  `perAlturaOe` decimal(10,3) DEFAULT NULL,
  `perAlturaOd` decimal(10,3) DEFAULT NULL,
  `receita` varchar(255) DEFAULT NULL,
  `dataVencLentes` datetime DEFAULT NULL,
  `perEsfOd` decimal(10,3) DEFAULT NULL,
  `armacao` varchar(255) DEFAULT NULL,
  `observacao` text,
  `longDnpOd` decimal(10,3) DEFAULT NULL,
  `statusPg` tinyint(1) DEFAULT NULL,
  `formaPg` int(11) DEFAULT NULL,
  `dataPg` datetime DEFAULT NULL,
  `nParcelas` int(11) DEFAULT NULL,
  `clientes_cpf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `dataEmissao`, `dataPrevEntrega`, `longEixoOd`, `longEsfOd`, `longEixoOe`, `longAlturaOe`, `longDnpOe`, `longCilOe`, `longCilOd`, `longAlturaOd`, `longEsfOe`, `perCilOe`, `perEixoOd`, `perEsfOe`, `perCilOd`, `perEixoOe`, `perDnpOd`, `perDnpOe`, `lentes`, `valor`, `medico`, `adicao`, `perAlturaOe`, `perAlturaOd`, `receita`, `dataVencLentes`, `perEsfOd`, `armacao`, `observacao`, `longDnpOd`, `statusPg`, `formaPg`, `dataPg`, `nParcelas`, `clientes_cpf`) VALUES
(15, '2016-11-17 00:00:00', '2016-11-15 00:00:00', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0', '0.000', '0', '0.000', '0.000', '0.000', '0', '1970-01-01 00:00:00', '0.000', '0', '0', '0.000', 1, 1, '2016-11-30 00:00:00', 2, '03904053108'),
(16, '2016-11-16 00:00:00', '2016-11-21 00:00:00', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', '0', '0.000', '0', '0.000', '0.000', '0.000', '0', '2016-11-10 00:00:00', '0.000', '0', '0', '0.000', 1, 1, '2016-11-24 00:00:00', 1, '03904053108');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_usuarios`
--

CREATE TABLE `os_usuarios` (
  `id` int(11) NOT NULL,
  `os_idos` int(11) DEFAULT NULL,
  `usuarios_idUsuarios` int(11) DEFAULT NULL,
  `statusAndamentoOs` int(11) DEFAULT NULL,
  `dataStatusAndamentoOs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os_usuarios`
--

INSERT INTO `os_usuarios` (`id`, `os_idos`, `usuarios_idUsuarios`, `statusAndamentoOs`, `dataStatusAndamentoOs`) VALUES
(7, 15, 1, 0, '2016-11-17 00:00:00'),
(8, 16, 1, 0, '2016-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` int(11) DEFAULT NULL,
  `statusAtividade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nome`, `login`, `senha`, `perfil`, `statusAtividade`) VALUES
(1, 'sfabrica', 'sfabrica', '698dc19d489c4e4db73e28a713eab07b', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_clientes_endereco1_idx` (`endereco_id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_os_clientes1_idx` (`clientes_cpf`);

--
-- Indexes for table `os_usuarios`
--
ALTER TABLE `os_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_os_has_usuarios_usuarios1_idx` (`usuarios_idUsuarios`),
  ADD KEY `fk_os_has_usuarios_os1_idx` (`os_idos`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `os_usuarios`
--
ALTER TABLE `os_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `fk_os_clientes1` FOREIGN KEY (`clientes_cpf`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `os_usuarios`
--
ALTER TABLE `os_usuarios`
  ADD CONSTRAINT `fk_os_has_usuarios_os1` FOREIGN KEY (`os_idos`) REFERENCES `os` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_os_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
