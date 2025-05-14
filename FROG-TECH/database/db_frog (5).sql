-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14/05/2025 às 18:55
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
-- Estrutura para tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `total_produtos` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `total_produtos`) VALUES
(6, 'Software', 0),
(5, 'Hardware', 0),
(4, 'Periféricos', 0),
(7, 'Smartphones', 0),
(8, 'Notebooks', 0),
(9, 'Tablets', 0),
(10, 'Acessórios para PC', 0),
(11, 'Monitores', 0),
(12, 'Impressoras', 0),
(13, 'Armazenamento', 0),
(14, 'Redes e Conectividade', 0),
(15, 'Segurança Digital', 0),
(16, 'Jogos e Consoles', 0),
(17, 'Componentes Internos', 0),
(18, 'Áudio e Fones de Ouvido', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(72, 21, 'Cláudio Sebastião Figueiredo', 250.00, 240, '2025-05-12 16:52:59', 16),
(73, 24, 'Carregador Portátil Carregamento Rápido Turbo 20000mAh', 47.99, 1, '2025-05-13 03:36:08', 16),
(74, 24, 'Carregador Portátil Carregamento Rápido Turbo 20000mAh', 47.99, 1, '2025-05-13 16:08:50', 16);

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
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_produto` (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `quantidade`, `imagem`, `categoria_id`) VALUES
(23, 'Caixa De Som Jbl Go 4 Bluetooth Portátil À Prova D\'água', 299.20, 'JBL GO 4 ORIGINAL - Som ultra portátil JBL GO 4 com graves mais potentes', 1000, '68229714eb9f2.png', 18),
(22, 'Cabo HDMI 2.0 4K de 20 metros', 169.90, 'Trazendo mais qualidade de som e imagem para seus equipamentos favoritos', 1000, '682296c9615f2.png', 14),
(24, 'Carregador Portátil Carregamento Rápido Turbo 20000mAh', 47.99, 'Um dispositivo compacto e potente, ideal para manter seus dispositivos sempre carregados.', 998, '682297a6e398a.png', 10),
(25, 'Switch hub de mesa 8 portas 10/100 TP-Link TL-SF1008D', 69.37, 'Switch de mesa de 8 portas 10/100Mbps\r\n8 portas RJ45 de auto-negociação 10/100Mbps, suporta auto MDI/MDIX', 1000, '68229812dcffe.png', 10),
(26, 'Estabilizador TS Shara Powerest 300VA, 115V, 4 Tomadas, Preto - 9100', 89.90, 'O Estabilizador PowerEst é a proteção ideal para os equipamentos eletrodomésticos em geral', 1000, '68229859545fc.png', 17),
(27, 'Repetidor Wifi Mi Range Extender Pro Xiaomi Preto', 108.00, 'Um dispositivo que amplia o alcance e a cobertura do Wi-Fi em residências ou escritórios, proporcionando estabilidade nas conexões', 1000, '68229894e9b39.png', 14),
(28, 'JBL, Fone de Ouvido On ear, Tune 720BT - Preto', 305.00, 'JBL PURE BASS. O JBL Tune 720BT apresenta o renomado som JBL Pure Bass, o mesmo que toca nos locais mais famosos em todo o mundo.', 1000, '682298c4bcd69.png', 18),
(29, 'Hd Seagate Expansion Usb 3.0 1tb', 360.00, 'O Armazenamento Que Você Precisa Para Suas Fotos, Vídeos E Arquivos Cor Preto', 1000, '682298f3e94af.png', 13),
(30, 'Canon Impressora sem fio PIXMA TR4720 All-in-One', 576.00, 'para uso doméstico, com alimentador automático de documentos, impressão móvel e fax integrado, branca', 1000, '6822992845489.png', 12),
(31, 'Monitor PC Gamer LG 24MS500 24” IPS 100Hz Full HD HDMI 2x', 574.82, 'é uma tela de 24\" com resolução Full HD, painel IPS, taxa de atualização de 100Hz e duas entradas HDMI.', 1000, '68229982769ef.png', 4),
(32, 'Attack Shark X11 Conexão Tri-Mode 2,4 GHz', 128.83, 'com fio e tambem conexões Bluetooth PAW3311 22K000DPI 400IPS RGB Mouse para jogos para PC', 1000, '682299efdacf9.png', 14),
(33, 'Notebook Dell Inspiron 15', 3334.24, 'Processador Intel Core i5\r\n8GB de RAM\r\nSSD de 512GB\r\nTela de 15,6\"\r\nSistema operacional Windows 11', 1000, '68229a4079d98.png', 8),
(34, 'RTX 3060 Ti Nvidia', 3442.00, 'Performance e baixo consumo, ideal para o seu PC', 1000, '68229ab0cfce2.png', 5),
(35, 'Headset Gamer Redragon Zeus X RGB, Surround 7.1', 289.99, 'USB, Microfone com Redução de Ruído, Branco com Vermelho - H510RGB-RED', 1000, '68229ae589c7e.png', 18),
(36, 'SSD Kingston A400, 480GB, SATA III', 244.99, '2.5\", Leitura: 500MB/s, Gravação: 450MB/s, Preto - SA400S37/480G', 1000, '68229b21aff71.png', 13),
(37, 'Suporte para Notebooks', 149.90, 'Ótimo para suporte e Perfeito para desenvolvedores', 1000, '68229b69debe6.png', 8),
(38, 'Hub Hdmi Switch 4k', 60.58, '1x2 2x1 Para Tv Computador Ps5 Xbox 360', 1000, '68229ba1cb102.png', 10),
(39, 'Teclado Com Fio Compacto', 21.99, 'Conexão USB Cabo de 120cm Resistente Água Preto - TC193', 1000, '68229bdd9dfd7.png', 4),
(40, 'Teclado Mecânico Gamer', 119.99, 'Switch Blue, RGB, Layout Português, USB', 1000, '68229c09ccb48.png', 4),
(41, 'Webcam USB Full HD 1080P', 169.90, 'Microfone estéreo com cancelamento de ruído integrado.', 1000, '68229c49ab1ec.png', 10);

--
-- Acionadores `produtos`
--
DROP TRIGGER IF EXISTS `atualizar_total_produtos_apos_atualizar`;
DELIMITER $$
CREATE TRIGGER `atualizar_total_produtos_apos_atualizar` AFTER UPDATE ON `produtos` FOR EACH ROW BEGIN
    -- Reduz o contador na categoria antiga
    IF OLD.categoria_id <> NEW.categoria_id THEN
        UPDATE categorias 
        SET total_produtos = total_produtos - 1 
        WHERE id = OLD.categoria_id;

        -- Aumenta o contador na nova categoria
        UPDATE categorias 
        SET total_produtos = total_produtos + 1 
        WHERE id = NEW.categoria_id;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `atualizar_total_produtos_apos_excluir`;
DELIMITER $$
CREATE TRIGGER `atualizar_total_produtos_apos_excluir` AFTER DELETE ON `produtos` FOR EACH ROW BEGIN
    UPDATE categorias 
    SET total_produtos = total_produtos - 1 
    WHERE id = OLD.categoria_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `atualizar_total_produtos_apos_inserir`;
DELIMITER $$
CREATE TRIGGER `atualizar_total_produtos_apos_inserir` AFTER INSERT ON `produtos` FOR EACH ROW BEGIN
    UPDATE categorias 
    SET total_produtos = total_produtos + 1 
    WHERE id = NEW.categoria_id;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `cpf`, `telefone`, `token_recuperacao`, `token_expira`, `role_id`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `foto`) VALUES
(17, 'teste2@mailna.co', '$2y$10$qIiMZYPOSLXQiOD02yBub.xPFYpjuTlvBiZpPGPYYd44TToSsZbh2', '12345678911', '11932920444', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'teste@mailna.co', '$2y$10$0RVWRANQceQrzovbMzegHeyNDBy3t0VvpFuThZYz.yQbdy0LkkTNi', '15799945041', '12345678911', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '682374a1db1b6.png');

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
