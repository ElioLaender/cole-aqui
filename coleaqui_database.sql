-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 14/02/2017 às 11:37
-- Versão do servidor: 5.6.30
-- Versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `coleaqui_database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Awards`
--

CREATE TABLE IF NOT EXISTS `Awards` (
  `awards_id` int(11) NOT NULL AUTO_INCREMENT,
  `awards_title` varchar(80) NOT NULL,
  `awards_points` decimal(6,2) NOT NULL,
  `awards_trade_ref` int(11) NOT NULL,
  `awards_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `awards_rescue_amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`awards_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Fazendo dump de dados para tabela `Awards`
--

INSERT INTO `Awards` (`awards_id`, `awards_title`, `awards_points`, `awards_trade_ref`, `awards_create`, `awards_rescue_amount`) VALUES
(3, 'Corte de cabelo', '30.00', 1, '2016-08-16 03:26:17', 0),
(4, 'Limpeza de pele', '25.00', 1, '2016-08-16 03:26:17', 0),
(5, 'Banho de sauna', '40.00', 1, '2016-08-16 17:22:32', 0),
(6, 'Sorvete Prêmio', '15.00', 1, '2016-08-16 17:40:32', 0),
(10, 'Chocolate', '12.00', 1, '2016-08-30 22:57:10', 0),
(12, 'Pizza de calabresa', '20.00', 3, '2016-09-02 23:40:46', 0),
(15, 'Coca cola 2lts', '7.00', 3, '2016-09-02 23:43:08', 0),
(16, 'Sorvete', '5.00', 3, '2016-09-05 23:25:46', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Awards_rescued`
--

CREATE TABLE IF NOT EXISTS `Awards_rescued` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `ar_trade_ref` int(11) NOT NULL,
  `ar_awards_ref` int(11) NOT NULL,
  `ar_client_ref` int(11) NOT NULL,
  `ar_data_rescue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Fazendo dump de dados para tabela `Awards_rescued`
--

INSERT INTO `Awards_rescued` (`ar_id`, `ar_trade_ref`, `ar_awards_ref`, `ar_client_ref`, `ar_data_rescue`) VALUES
(16, 1, 7, 4, '2016-08-24 16:54:56'),
(17, 1, 4, 4, '2016-08-24 16:55:36'),
(18, 1, 9, 1, '2016-08-30 00:45:57'),
(19, 1, 7, 1, '2016-08-30 00:49:48'),
(20, 1, 9, 1, '2016-08-30 00:54:05'),
(21, 1, 6, 4, '2016-08-30 22:54:44'),
(22, 1, 10, 4, '2016-08-31 13:40:50'),
(23, 1, 10, 1, '2016-09-03 18:44:45'),
(24, 1, 11, 6, '2016-09-05 18:18:23'),
(25, 1, 10, 6, '2016-09-05 18:18:34'),
(26, 1, 6, 1, '2016-09-05 18:38:58'),
(27, 1, 10, 1, '2016-09-05 18:50:01'),
(28, 1, 5, 1, '2016-09-05 18:50:09'),
(29, 1, 5, 1, '2016-09-05 18:50:41'),
(30, 1, 5, 1, '2016-09-05 18:50:48'),
(31, 3, 12, 7, '2016-09-05 23:12:09'),
(32, 3, 15, 7, '2016-09-05 23:12:15'),
(33, 3, 15, 7, '2016-09-05 23:12:27'),
(34, 3, 15, 7, '2016-09-05 23:12:41'),
(35, 3, 12, 7, '2016-09-05 23:22:10'),
(36, 3, 16, 7, '2016-09-05 23:26:04'),
(37, 1, 3, 1, '2016-09-12 19:32:48'),
(38, 1, 10, 1, '2016-09-12 19:32:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(60) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_sex` varchar(1) NOT NULL,
  `client_cpf` varchar(15) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `client_trade_ref` int(11) NOT NULL,
  `client_points` decimal(6,2) NOT NULL,
  `client_accession` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `Client`
--

INSERT INTO `Client` (`client_id`, `client_name`, `client_phone`, `client_sex`, `client_cpf`, `client_email`, `client_trade_ref`, `client_points`, `client_accession`) VALUES
(1, 'Élio Laender ', '(37) 99119-1491', 'M', '091.289.356-75', 'laenderquadros@gmail.com', 1, '92.73', '2016-09-12 19:48:42'),
(4, 'Pedro Henrique Altivo Gontijo', '3791191491', 'M', '086.153.796-37', 'pgontijo88@gmail.com', 1, '12.13', '2016-09-13 22:44:25'),
(6, 'Lívia Gomes', '(37) 91191-4911', 'F', '091.289.356-77', 'liviapsique@gmail.com', 1, '4.57', '2016-09-05 18:29:42'),
(7, 'Élio José Laender Quadros', '(37) 99119-1491', 'M', '091.289.356-75', 'laenderquadros@gmail.com', 3, '50.00', '2016-09-05 23:26:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Client_app`
--

CREATE TABLE IF NOT EXISTS `Client_app` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_name` varchar(80) NOT NULL,
  `ca_email` varchar(80) NOT NULL,
  `ca_date_birth` varchar(15) NOT NULL,
  `ca_sex` varchar(15) NOT NULL,
  `ca_pass` varchar(60) NOT NULL,
  `ca_cpf` varchar(15) NOT NULL,
  PRIMARY KEY (`ca_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Fazendo dump de dados para tabela `Client_app`
--

INSERT INTO `Client_app` (`ca_id`, `ca_name`, `ca_email`, `ca_date_birth`, `ca_sex`, `ca_pass`, `ca_cpf`) VALUES
(14, 'Élio Laender Quadros', 'laenderquadros@gmail.com', '14/06/1990', 'Masculino', 'd155c2f519e9e32e2714803ffc894ec0', '091.289.356-75'),
(34, 'Pedro', 'pgontijo88@gmail.com', '14/07/1988', 'Masculino', 'd155c2f519e9e32e2714803ffc894ec0', '086.153.796-37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Client_for_trading`
--

CREATE TABLE IF NOT EXISTS `Client_for_trading` (
  `cft_id` int(11) NOT NULL AUTO_INCREMENT,
  `cft_cli_ref` int(11) NOT NULL,
  `cft_trade_ref` int(11) NOT NULL,
  `cft_date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cft_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Notifications`
--

CREATE TABLE IF NOT EXISTS `Notifications` (
  `notifications_id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications_title` varchar(70) NOT NULL,
  `notifications_description` varchar(100) NOT NULL,
  `notifications_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notifications_trade_ref` int(11) NOT NULL,
  `notifications_view` varchar(15) NOT NULL DEFAULT 'Nova',
  `notifications_url` varchar(300) NOT NULL,
  PRIMARY KEY (`notifications_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Fazendo dump de dados para tabela `Notifications`
--

INSERT INTO `Notifications` (`notifications_id`, `notifications_title`, `notifications_description`, `notifications_data`, `notifications_trade_ref`, `notifications_view`, `notifications_url`) VALUES
(22, 'Pedro Herrique já pode resgatar!', 'Atingiu 42.86 Pontos', '2016-08-24 16:54:15', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(23, 'Élio Laender  já pode resgatar!', 'Atingiu 37.25 Pontos', '2016-08-30 00:45:40', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(24, 'Élio Laender  já pode resgatar!', 'Atingiu 12.25 Pontos', '2016-08-30 23:00:02', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(25, 'Pedro Herrique já pode resgatar!', 'Atingiu 17.15 Pontos', '2016-08-30 22:54:06', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(26, 'Pedro Herrique já pode resgatar!', 'Atingiu 24.99 Pontos', '2016-08-30 22:55:11', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(27, 'Pedro Herrique já pode resgatar!', 'Atingiu 29.85 Pontos', '2016-08-30 22:55:05', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(28, 'Pedro Henrique já pode resgatar!', 'Atingiu 14.85 Pontos', '2016-08-31 13:33:42', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(29, 'Pedro Henrique já pode resgatar!', 'Atingiu 16.56 Pontos', '2016-08-31 13:40:36', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=4'),
(30, 'Élio José Laender Quadros já pode resgatar!', 'Atingiu 1.71 Pontos', '2016-09-02 23:41:08', 3, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=7'),
(31, 'Élio Laender  já pode resgatar!', 'Atingiu 24.54 Pontos', '2016-09-13 17:13:04', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(32, 'Élio Laender  já pode resgatar!', 'Atingiu 159.48 Pontos', '2016-09-13 17:13:10', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(33, 'Élio José Laender Quadros já pode resgatar!', 'Atingiu 44.57 Pontos', '2016-09-05 23:11:10', 3, 'Nova', '?controller=Dashboard&action=viewCostumerPage&client=7'),
(34, 'Élio José Laender Quadros já pode resgatar!', 'Atingiu 75.00 Pontos', '2016-09-05 23:21:54', 3, 'Nova', '?controller=Dashboard&action=viewCostumerPage&client=7'),
(35, 'Élio Laender  já pode resgatar!', 'Atingiu 49.02 Pontos', '2016-09-13 17:13:22', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(36, 'Élio Laender  já pode resgatar!', 'Atingiu 92.73 Pontos', '2016-09-13 17:13:16', 1, 'Visualizada', '?controller=Dashboard&action=viewCostumerPage&client=1'),
(37, 'Pedro Henrique Altivo Gontijo já pode resgatar!', 'Atingiu 12.13 Pontos', '2016-09-13 22:44:25', 1, 'Nova', '?controller=Dashboard&action=viewCostumerPage&client=4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Releases`
--

CREATE TABLE IF NOT EXISTS `Releases` (
  `releases_id` int(11) NOT NULL AUTO_INCREMENT,
  `releases_value` decimal(10,2) NOT NULL,
  `releases_description` varchar(500) NOT NULL,
  `releases_accession` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `releases_trade_ref` int(11) NOT NULL,
  `releases_trade_client_ref` int(11) NOT NULL,
  `releases_confirm` varchar(3) NOT NULL,
  `releases_value_points` decimal(10,2) NOT NULL COMMENT 'Valo do ponto no período do lançamento',
  PRIMARY KEY (`releases_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Fazendo dump de dados para tabela `Releases`
--

INSERT INTO `Releases` (`releases_id`, `releases_value`, `releases_description`, `releases_accession`, `releases_trade_ref`, `releases_trade_client_ref`, `releases_confirm`, `releases_value_points`) VALUES
(37, '300.00', 'Perfume paragua', '2016-08-24 13:53:58', 1, 4, 'Sim', '7.00'),
(38, '150.00', 'Bolsa', '2016-08-24 13:57:28', 1, 6, 'Não', '7.00'),
(39, '180.00', 'perfume', '2016-08-24 14:17:58', 1, 1, 'Sim', '35.00'),
(40, '124.00', 'liket', '2016-08-24 16:47:59', 1, 1, 'Sim', '35.00'),
(41, '1000.00', 'camisa', '2016-08-29 21:28:50', 1, 1, 'Sim', '35.00'),
(42, '350.00', 'celular', '2016-08-30 16:49:22', 1, 1, 'Sim', '35.00'),
(43, '500.00', 'camisa', '2016-08-30 16:56:00', 1, 4, 'Sim', '35.00'),
(44, '350.00', 'churros ', '2016-08-30 17:09:36', 1, 4, 'Sim', '35.00'),
(45, '170.00', 'test', '2016-08-30 17:15:31', 1, 4, 'Sim', '35.00'),
(46, '0.00', '', '2016-08-31 10:25:00', 1, 4, 'Sim', '35.00'),
(47, '35.00', 'picolé ', '2016-08-31 10:32:02', 1, 4, 'Sim', '35.00'),
(48, '25.00', 'chocolate ', '2016-08-31 10:32:02', 1, 4, 'Sim', '35.00'),
(49, '250.00', 'picolé ', '2016-08-31 14:02:23', 1, 4, 'Sim', '35.00'),
(50, '12.00', 'Teste', '2016-09-02 20:39:59', 3, 7, 'Sim', '7.00'),
(51, '350.00', 'Compra de cesta completa', '2016-09-05 15:37:24', 1, 1, 'Sim', '35.00'),
(52, '500.00', 'Compra de teste ', '2016-09-05 15:37:24', 1, 1, 'Sim', '35.00'),
(53, '5248.00', 'mais um teste', '2016-09-05 15:49:27', 1, 1, 'Sim', '35.00'),
(54, '300.00', 'Lançamento de teste da pizzaria', '2016-09-05 20:11:10', 3, 7, 'Sim', '7.00'),
(55, '500.00', 'Outro lançamento', '2016-09-05 20:21:54', 3, 7, 'Sim', '7.00'),
(56, '500.00', 'teste', '2016-09-12 15:53:23', 1, 1, 'Sim', '35.00'),
(57, '254.00', 'teste2', '2016-09-12 15:53:23', 1, 1, 'Sim', '35.00'),
(58, '3000.00', 'teste gg', '2016-09-12 16:48:42', 1, 1, 'Sim', '35.00'),
(59, '15.00', 'Sorvete ', '2016-09-13 19:44:25', 1, 4, 'Sim', '35.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Trade`
--

CREATE TABLE IF NOT EXISTS `Trade` (
  `trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_name` varchar(65) NOT NULL,
  `trade_accession` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trade_image` varchar(300) NOT NULL,
  `trade_cnpj` varchar(20) NOT NULL,
  `trade_boxes` int(11) NOT NULL,
  `trade_phone` int(11) NOT NULL,
  `trade_address` varchar(150) NOT NULL,
  `trade_complement` varchar(50) NOT NULL,
  `trade_district` varchar(50) NOT NULL,
  `trade_city` varchar(50) NOT NULL,
  `trade_state` varchar(50) NOT NULL,
  PRIMARY KEY (`trade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `Trade`
--

INSERT INTO `Trade` (`trade_id`, `trade_name`, `trade_accession`, `trade_image`, `trade_cnpj`, `trade_boxes`, `trade_phone`, `trade_address`, `trade_complement`, `trade_district`, `trade_city`, `trade_state`) VALUES
(1, 'Mais Chocolates', '2016-08-31 13:41:37', 'uploads/trade-profiles/4186635c5bb065cb3756f867e3dc5039', '09128935675', 3, 91191491, 'Av. Primeiro de Junho 251', 'Ap 801', 'Centro', 'Divinópolis', 'Minas Gerais'),
(3, 'Pizzaria do Bacana', '2016-09-02 19:54:52', 'uploads/trade-profiles/e12841e5526d125fabf06f5fbefd3e6d', '58.768.167/0001-87', 3, 32145402, 'Rua Falcão 251', 'Galpão', 'Serra verde', 'Divinopolis', 'Minas Gerais');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Trade_users`
--

CREATE TABLE IF NOT EXISTS `Trade_users` (
  `tu_id` int(11) NOT NULL AUTO_INCREMENT,
  `tu_name` varchar(80) NOT NULL,
  `tu_email` varchar(80) NOT NULL,
  `tu_trade_ref` int(11) NOT NULL,
  `tu_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`tu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `Trade_users`
--

INSERT INTO `Trade_users` (`tu_id`, `tu_name`, `tu_email`, `tu_trade_ref`, `tu_pass`) VALUES
(1, 'Laender', 'laenderquadros@gmail.com', 1, 'd155c2f519e9e32e2714803ffc894ec0'),
(2, 'Pedro', 'pgontijo88@gmail.com', 3, 'd155c2f519e9e32e2714803ffc894ec0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Value_trade_points`
--

CREATE TABLE IF NOT EXISTS `Value_trade_points` (
  `vtp_id` int(11) NOT NULL AUTO_INCREMENT,
  `vtp_value_points` decimal(6,2) NOT NULL,
  `vtp_trade_id` int(11) NOT NULL,
  PRIMARY KEY (`vtp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `Value_trade_points`
--

INSERT INTO `Value_trade_points` (`vtp_id`, `vtp_value_points`, `vtp_trade_id`) VALUES
(3, '35.00', 1),
(4, '7.00', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
