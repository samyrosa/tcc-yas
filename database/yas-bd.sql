drop database bd_yas;

create database bd_yas default character set utf8 collate utf8_general_ci;

use bd_yas;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2021 às 13:48
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_yas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_proj`
--

CREATE TABLE `img_proj` (
  `img_id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `proj_img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `img_proj`
--

INSERT INTO `img_proj` (`img_id`, `proj_id`, `proj_img`) VALUES
(25, 1, 'yas-0-1-210927.png'),
(26, 1, 'yas-1-1-210927.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `proj_name` varchar(100) NOT NULL,
  `proj_desc` mediumtext NOT NULL,
  `proj_back_img` varchar(60) NOT NULL,
  `proj_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`proj_id`, `user_id`, `tag_id`, `proj_name`, `proj_desc`, `proj_back_img`, `proj_data`) VALUES
(1, 1, 9, ' test 1', 'Lobortis nisi elementum mauris auctor metus leo scelerisque maecenas, venenatis aptent dictumst senectus tincidunt a placerat, volutpat quam fermentum torquent mattis eu non.', 'YAS-2021.09.27-13.38.18.png', '2021-09-27 01:09:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salvo_proj`
--

CREATE TABLE `salvo_proj` (
  `salvos_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tag_proj`
--

CREATE TABLE `tag_proj` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(45) NOT NULL,
  `tag_img` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tag_proj`
--

INSERT INTO `tag_proj` (`tag_id`, `tag_name`, `tag_img`) VALUES
(1, 'Arte em 3D', NULL),
(2, 'Artesanato', NULL),
(3, 'Arte digital', NULL),
(4, 'Animação GIF', NULL),
(5, 'Animação', NULL),
(6, 'Arte urbana', NULL),
(7, 'Arte conceitual', NULL),
(8, 'Colagem', NULL),
(9, 'Colorir', NULL),
(10, 'Design de aplicativos', NULL),
(11, 'Design automotivo', NULL),
(12, 'Design de personagens', NULL),
(13, 'Desenho', NULL),
(14, 'Design editorial', NULL),
(15, 'Design de moda', NULL),
(16, 'Design de móveis', NULL),
(17, 'Design de jogos', NULL),
(18, 'Design gráfico', NULL),
(19, 'Design de ícones', NULL),
(20, 'Design de interações', NULL),
(21, 'Design de interiores', NULL),
(22, 'Design de joias', NULL),
(23, 'Design de paisagens', NULL),
(24, 'Design de logotipo', NULL),
(25, 'Design de pôster', NULL),
(26, 'Design de produtos', NULL),
(27, 'Design de adereços', NULL),
(28, 'Design de camisetas', NULL),
(29, 'Design de tecidos', NULL),
(30, 'Design de brinquedos', NULL),
(31, 'Design de fontes', NULL),
(32, 'Embalagens', NULL),
(33, 'Escultura', NULL),
(34, 'Esboços', NULL),
(35, 'Fotografia de publicidade', NULL),
(36, 'Fotografia de arquitetura', NULL),
(37, 'Fotografia de beleza', NULL),
(38, 'Fotografia de moda', NULL),
(39, 'Fotografia de comida', NULL),
(40, 'Fotografia', NULL),
(41, 'Fotojornalismo', NULL),
(42, 'Fotografia de produto', NULL),
(43, 'Grafite', NULL),
(44, 'Histórias em quadrinhos', NULL),
(45, 'Ilustração', NULL),
(46, 'Interface e UX', NULL),
(47, 'Moda', NULL),
(48, 'Maquiagem', NULL),
(49, 'Modelagem', NULL),
(50, 'Publicidade', NULL),
(51, 'Pintura digital', NULL),
(52, 'Pintura', NULL),
(53, 'Storyboarding', NULL),
(54, 'Trabalho em madeira', NULL),
(55, 'Web design', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_insp`
--

CREATE TABLE `user_insp` (
  `insp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_save_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_yas`
--

CREATE TABLE `user_yas` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(400) NOT NULL,
  `user_senha` varchar(70) NOT NULL,
  `user_carreira` varchar(20) DEFAULT NULL,
  `user_whatsapp_cont` bigint(15) DEFAULT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_email_cont` varchar(400) DEFAULT NULL,
  `user_telefone_cont` bigint(15) DEFAULT NULL,
  `user_desc` mediumtext DEFAULT NULL,
  `social_url` mediumtext DEFAULT NULL,
  `social_insta` varchar(20) DEFAULT NULL,
  `social_twitter` varchar(20) DEFAULT NULL,
  `user_foto` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_yas`
--

INSERT INTO `user_yas` (`user_id`, `user_email`, `user_senha`, `user_carreira`, `user_whatsapp_cont`, `user_first_name`, `user_last_name`, `user_email_cont`, `user_telefone_cont`, `user_desc`, `social_url`, `social_insta`, `social_twitter`, `user_foto`) VALUES
(1, 'adm@local.com', '$2y$10$fs8SLOTwfx5XCZALUhPnW.E96j4r/Hv4j.UJNY6VM7FZBxzSLPD0y', NULL, NULL, 'adm', 'local', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `img_proj`
--
ALTER TABLE `img_proj`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`proj_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Índices para tabela `salvo_proj`
--
ALTER TABLE `salvo_proj`
  ADD PRIMARY KEY (`salvos_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Índices para tabela `tag_proj`
--
ALTER TABLE `tag_proj`
  ADD PRIMARY KEY (`tag_id`);

--
-- Índices para tabela `user_insp`
--
ALTER TABLE `user_insp`
  ADD PRIMARY KEY (`insp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `user_yas`
--
ALTER TABLE `user_yas`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `img_proj`
--
ALTER TABLE `img_proj`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;

--
-- AUTO_INCREMENT de tabela `salvo_proj`
--
ALTER TABLE `salvo_proj`
  MODIFY `salvos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tag_proj`
--
ALTER TABLE `tag_proj`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `user_insp`
--
ALTER TABLE `user_insp`
  MODIFY `insp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user_yas`
--
ALTER TABLE `user_yas`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `img_proj`
--
ALTER TABLE `img_proj`
  ADD CONSTRAINT `img_proj_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projeto` (`proj_id`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_yas` (`user_id`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag_proj` (`tag_id`);

--
-- Limitadores para a tabela `salvo_proj`
--
ALTER TABLE `salvo_proj`
  ADD CONSTRAINT `salvo_proj_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_yas` (`user_id`),
  ADD CONSTRAINT `salvo_proj_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `projeto` (`proj_id`);

--
-- Limitadores para a tabela `user_insp`
--
ALTER TABLE `user_insp`
  ADD CONSTRAINT `user_insp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_yas` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

