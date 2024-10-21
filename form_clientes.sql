-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2024 às 22:17
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `form_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `password` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cpf`, `telefone`, `data_nasc`, `password`, `status`) VALUES
(24, 'Ariel Costa', 'costaariel789@gmail.com', '09845553583', '15151515166', '1212-02-21', '$2y$10$aUEgpilfZWAbc9A35MqagOT/meUsVDFab1Ezg4HEF4Zbkoa4YZt5O', '1'),
(26, 'Ricardinho', 'ricardo.reksystem@gmail.com', '77812130177', '12112312313', '0154-06-17', '$2y$10$K5d3mW6VcOS2l8zvRBAJu.bB.gIVuzt52wEsHhxp2l0juakSZIHb2', '1'),
(29, 'Marco Tulio', 'kawasamaf@gmail.com', '11615475761', '21202020222', '2121-12-21', '$2y$10$SsZZINgIb95OUjfOPdt5EetDux9bOLK8.BIikSQ3Alb9Nvle/8IQm', '0'),
(35, 'Carlos Eduardo', 'carloseduardopr.dev@gmail.com', '02160852686', '32323232322', '2003-06-17', '$2y$10$3O3HIVwARzh8iCvdJEpSlOOvYfq4pHMIjH9B6W1Gton3JpfD6HJN.', '1'),
(37, 'jhonatan Morais da Silva', 'jhonatan.morais@upassistencial.com.br', '12532812621', '32984663669', '1997-10-10', '$2y$10$2kDDl26cpfUCWlCWPMGvROsgErZQO0PVhxye8tSXJWLUSGARX7rwm', '1'),
(38, 'joao pedro batista', 'jp.princisval@gmail.com', '13567688650', '32998214961', '2004-04-04', '$2y$10$vqk8YkK0EcTFhNXtzTXyf.eLbgK8YXNQNTFNztbGbCUL8nh5dd4re', '0'),
(39, 'Carlos Eduardo', 'carlosProriz17@outlook.com', '12107181209', '32991346919', '1972-12-12', '$2y$10$aWGTAt2PnUqlNsqPEDhVoOaf8qWeCp7BYRQrX0AvLVN2e3mDwQZpK', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
