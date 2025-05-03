-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/05/2025 às 03:40
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_frog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produto_id` int DEFAULT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `data_compra` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`id`, `produto_id`, `nome_produto`, `preco`, `quantidade`, `data_compra`, `user_id`) VALUES
(12, 1, '[value-2]', 500.00, 1, '2025-04-29 14:14:41', 18),
(11, 1, '[value-2]', 500.00, 1, '2025-04-29 14:11:54', 18),
(10, 1, '[value-2]', 500.00, 1, '2025-04-29 14:11:02', 18),
(9, 1, '[value-2]', 500.00, 20, '2025-04-29 14:10:47', 18),
(13, 1, '[value-2]', 500.00, 1, '2025-04-29 14:15:08', 18),
(14, 1, '[value-2]', 500.00, 1, '2025-04-29 14:18:29', 18),
(15, 1, '[value-2]', 500.00, 10, '2025-04-29 14:19:04', 18),
(16, 1, '[value-2]', 500.00, 10, '2025-05-03 01:24:10', 31),
(17, 1, '[value-2]', 500.00, 10, '2025-05-03 01:24:44', 31),
(18, 1, '[value-2]', 500.00, 10, '2025-05-03 01:26:15', 31),
(19, 1, '[value-2]', 500.00, 10, '2025-05-03 01:37:20', 31),
(20, 1, '[value-2]', 500.00, 70, '2025-05-03 01:55:49', 31),
(21, 1, '[value-2]', 500.00, 30, '2025-05-03 02:38:02', 31),
(22, 1, '[value-2]', 500.00, 10, '2025-05-03 03:27:41', 31);

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`, `descricao`) VALUES
(1, 'Analista de Dados', 'Analisa os dados');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `cpf` varchar(14) NOT NULL,
  `departamento_id` int DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_departamento` (`departamento_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `idade`, `salario`, `cep`, `cidade`, `rua`, `telefone`, `estado`, `numero`, `role_id`, `cpf`, `departamento_id`, `senha`) VALUES
(1, '[value-2]', '[value-3]', 0, 0.00, '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', 2, '56565735833', 1, ''),
(2, 'João da Silva', 'joao@email.com', 30, 4500.00, '12345-678', 'São Paulo', 'Rua das Flores', '11999998888', 'SP', '123', 2, '12345678901', 1, 'Teste@123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text,
  `quantidade` int NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `quantidade`, `imagem`) VALUES
(1, '[value-2]', 500.00, '[value-4]', 490, '[value-6]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `token_recuperacao` varchar(255) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '3',
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `cpf`, `telefone`, `token_recuperacao`, `token_expira`, `role_id`, `cep`, `rua`, `bairro`, `cidade`, `estado`) VALUES
(32, 'Teste77@gmail.com', '$2y$10$G3HEmJ80emW/1HkUVbJCIuaLoH0GX6RRwF2BhQHCvrXXk0vRM3HDe', '15799945045', '12345678912', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL),
(31, 'Teste777@gmail.com', '$2y$10$h0gG7mz/IhFSsqSAHVpwjOjXQCQzk3ZKyKiTjdBK3Zr8PoweHCDcG', '15799945041', '12345678911', NULL, NULL, 3, '01020-040', 'Rua Lousada', 'Sé', 'São Paulo', 'SP');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
