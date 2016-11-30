-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2016 at 12:05 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trocaJogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `urlFoto` text NOT NULL,
  `pontuacaoNovo` int(11) NOT NULL,
  `pontuacaoUsado` int(11) NOT NULL,
  `visivel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=419 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_usuario`
--

CREATE TABLE IF NOT EXISTS `item_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `isNovo` int(11) NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_usuario_user` (`usuario_id`),
  KEY `fx_item_usuario_item` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remetente_id` int(11) NOT NULL,
  `troca_id` int(11) NOT NULL,
  `corpo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fx_mensagem_usuario` (`remetente_id`),
  KEY `fx_mensagem_troca` (`troca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `troca`
--

CREATE TABLE IF NOT EXISTS `troca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioSolicitante_id` int(11) NOT NULL,
  `usuarioQueDecide_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `valorParaUsuarioSolicitante` int(11) NOT NULL,
  `valorParaUsuarioQueDecide` int(11) NOT NULL,
  `avaliacaoSolicitante` int(11) DEFAULT NULL,
  `avaliacaoQueDecide` int(11) DEFAULT NULL,
  `msgAvaliacaoSolicitante` text,
  `msgAvaliacaoQueDecide` text,
  PRIMARY KEY (`id`),
  KEY `fk_troca_solicitante` (`usuarioSolicitante_id`),
  KEY `fk_troca_quedecide` (`usuarioQueDecide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `troca_itemOferecido`
--

CREATE TABLE IF NOT EXISTS `troca_itemOferecido` (
  `troca_id` int(11) NOT NULL,
  `itemParaTroca_id` int(11) NOT NULL,
  PRIMARY KEY (`troca_id`,`itemParaTroca_id`),
  KEY `fK_troca_itemOferecido_ipt` (`itemParaTroca_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `troca_itemSolicitado`
--

CREATE TABLE IF NOT EXISTS `troca_itemSolicitado` (
  `troca_id` int(11) NOT NULL,
  `itemParaTroca_id` int(11) NOT NULL,
  PRIMARY KEY (`troca_id`,`itemParaTroca_id`),
  KEY `fK_troca_itemSolicitado_ipt` (`itemParaTroca_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `qtdTrocaRealizadas` int(11) NOT NULL DEFAULT '0',
  `somaAvaliacoes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fx_mensagem_troca` FOREIGN KEY (`troca_id`) REFERENCES `troca` (`id`),
  ADD CONSTRAINT `fx_mensagem_usuario` FOREIGN KEY (`remetente_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `troca`
--
ALTER TABLE `troca`
  ADD CONSTRAINT `fk_troca_quedecide` FOREIGN KEY (`usuarioQueDecide_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_troca_solicitante` FOREIGN KEY (`usuarioSolicitante_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `troca_itemOferecido`
--
ALTER TABLE `troca_itemOferecido`
  ADD CONSTRAINT `fK_troca_itemOferecido_troca` FOREIGN KEY (`troca_id`) REFERENCES `troca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `troca_itemSolicitado`
--
ALTER TABLE `troca_itemSolicitado`
  ADD CONSTRAINT `fK_troca_itemSolicitado_troca` FOREIGN KEY (`troca_id`) REFERENCES `troca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
