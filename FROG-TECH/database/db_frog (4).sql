-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12/05/2025 às 16:55
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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`id`, `produto_id`, `nome_produto`, `preco`, `quantidade`, `data_compra`, `user_id`) VALUES
(68, 18, 'Daniel Alves', 222.00, 1, '2025-05-08 23:49:40', 2),
(67, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 23:41:59', 2),
(66, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:26:30', 1),
(65, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:26:06', 1),
(64, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:15:47', 1),
(63, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:14:55', 1),
(62, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:13:56', 1),
(61, 18, 'Daniel Alves', 222.00, 10, '2025-05-08 19:13:02', 1),
(60, 18, 'Daniel Alves', 222.00, 15, '2025-05-08 19:12:31', 1),
(59, 19, 'Daniel Alves', 250.00, 10, '2025-05-08 19:00:17', 1),
(69, 20, 'Teste', 250.00, 1, '2025-05-12 16:07:35', 16),
(70, 20, 'Teste', 250.00, 1, '2025-05-12 16:18:45', 16),
(71, 21, 'Cláudio Sebastião Figueiredo', 250.00, 10, '2025-05-12 16:48:11', 16),
(72, 21, 'Cláudio Sebastião Figueiredo', 250.00, 240, '2025-05-12 16:52:59', 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `qntd_func` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`, `descricao`, `data_criacao`, `qntd_func`) VALUES
(1, 'Vendas', 'Responsável por realizar as vendas dos produtos, tanto online quanto presenciais.', '2024-11-13 18:57:46', 0),
(2, 'Marketing', 'Responsável por criar campanhas publicitárias, estratégias de marketing digital e branding.', '2024-11-13 18:57:46', 0),
(3, 'Suporte ao Cliente', 'Responsável por oferecer suporte aos clientes, respondendo dúvidas e solucionando problemas relacionados aos produtos.', '2024-11-13 18:57:46', 0),
(4, 'Logística', 'Cuida do estoque, envio e recebimento de produtos, além da organização da distribuição.', '2024-11-13 18:57:46', 0),
(5, 'Compras', 'Responsável por adquirir novos produtos e negociar com fornecedores.', '2024-11-13 18:57:46', 0),
(6, 'Financeiro', 'Cuida da gestão financeira da empresa, incluindo contas a pagar e a receber, orçamentos e investimentos.', '2024-11-13 18:57:46', 0),
(7, 'Recursos Humanos (RH)', 'Responsável pelo recrutamento, treinamento, desenvolvimento e gestão de pessoal.', '2024-11-13 18:57:46', 0),
(18, 'TI (Tecnologia da Informação)', 'Responsável pela infraestrutura tecnológica da empresa, incluindo sistemas, servidores e manutenção de redes.', '2024-11-13 18:57:46', 0),
(9, 'Desenvolvimento de Produto', 'Equipe dedicada à pesquisa e desenvolvimento de novos produtos ou melhorias nos produtos existentes.', '2024-11-13 18:57:46', 0),
(10, 'Gestão de Qualidade', 'Responsável por garantir que os produtos atendam aos padrões de qualidade e sejam compatíveis com os requisitos de segurança.', '2024-11-13 18:57:46', 0),
(11, 'Jurídico', 'Cuida dos assuntos legais da empresa, contratos, direitos autorais e compliance.', '2024-11-13 18:57:46', 0),
(12, 'Atendimento ao Cliente (Call Center)', 'Focado em resolver problemas de clientes e realizar atendimento telefônico.', '2024-11-13 18:57:46', 0),
(13, 'Design e UX (Experiência do Usuário)', 'Equipe de design responsável pela experiência do cliente no site, embalagens e interação com os produtos.', '2024-11-13 18:57:46', 1),
(14, 'Pesquisa de Mercado', 'Responsável por coletar e analisar dados de mercado, tendências de consumo e comportamento do cliente.', '2024-11-13 18:57:46', 0),
(15, 'Administração', 'Responsável pelas atividades administrativas gerais, como gestão de agenda, organização de documentos e suporte à alta direção da empresa.', '2024-11-13 18:57:46', 0);

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
  `senha` varchar(255) NOT NULL,
  `departamento_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_funcionarios_departamentos` (`departamento_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `idade`, `salario`, `cep`, `cidade`, `rua`, `telefone`, `estado`, `numero`, `role_id`, `cpf`, `senha`, `departamento_id`) VALUES
(9, 'Felipe Amaro', 'teste20@mailna.co', 80, 10000.00, '74969-436', 'Aparecida de Goiânia', 'Rua das Hosanas', '11932920444', 'GO', '10', 2, '12345678911', '$2y$10$IpdzIhLuMF37b5b5eZGL..xT/eZbZvpJCHzKgro8v9PtJtZRkxPfy', 13);

--
-- Acionadores `funcionarios`
--
DROP TRIGGER IF EXISTS `atualiza_qntd_func_apos_excluir`;
DELIMITER $$
CREATE TRIGGER `atualiza_qntd_func_apos_excluir` AFTER DELETE ON `funcionarios` FOR EACH ROW BEGIN
  UPDATE departamentos 
  SET qntd_func = (SELECT COUNT(*) FROM funcionarios WHERE departamento_id = OLD.departamento_id) 
  WHERE id = OLD.departamento_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `atualiza_qntd_func_apos_inserir`;
DELIMITER $$
CREATE TRIGGER `atualiza_qntd_func_apos_inserir` AFTER INSERT ON `funcionarios` FOR EACH ROW BEGIN
  UPDATE departamentos 
  SET qntd_func = (SELECT COUNT(*) FROM funcionarios WHERE departamento_id = NEW.departamento_id) 
  WHERE id = NEW.departamento_id;
END
$$
DELIMITER ;

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `quantidade`, `imagem`) VALUES
(21, 'Cláudio Sebastião Figueiredo', 250.00, '250', 0, '682226113b438.webp'),
(20, 'Teste', 250.00, 'teste 20', 498, '681d4898d679b.png'),
(18, 'Daniel Alves', 222.00, '2220', 1052, '681cc4898802f.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `role_id` int DEFAULT '3',
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `cpf`, `telefone`, `token_recuperacao`, `token_expira`, `role_id`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `foto`) VALUES
(16, '1205@mailna.co', '$2y$10$pRTshis0XDFJCdRAjsLrh.VgkkPT7Q2jlUy7fSiWpyPSgVMbs9dcW', '15799945041', '12345678911', 'afe45f8e8503bf2b5d07707025e8bcadd10518f7fbb3ec242638b4692879c18d', '2025-05-12 15:56:45', 3, '74969-436', 'Rua das Hosanas', 'Jardim Monte Líbano', 'Aparecida de Goiânia', 'GO', '682213f22623a.webp'),
(17, 'teste2@mailna.co', '$2y$10$qIiMZYPOSLXQiOD02yBub.xPFYpjuTlvBiZpPGPYYd44TToSsZbh2', '12345678911', '11932920444', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
