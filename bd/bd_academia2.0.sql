-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 23:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro`
--

CREATE TABLE `tbl_cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `nascimento` varchar(50) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `telefone_ad` varchar(45) DEFAULT NULL,
  `perm_acesso` varchar(45) DEFAULT NULL,
  `valores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id_cadastro`, `usuario`, `senha`, `cpf`, `nome`, `email`, `sexo`, `nascimento`, `telefone`, `telefone_ad`, `perm_acesso`, `valores`) VALUES
(4, NULL, 'asdasd', '123', 'teste', 'entrarhabbo123@hotmail.com', 'Nenhum', '2023-05-24', '4700000000', '', '1', NULL),
(7, NULL, 'andre31', '1252533', 'André Manoel de Santana', 'andremanoel.santana31@gmail.com', 'Masculino', '2023-05-31', '47999974589', '', '1', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_planos`
--

CREATE TABLE `tbl_planos` (
  `idl_planos` int(11) NOT NULL,
  `nome_plano` varchar(45) DEFAULT NULL,
  `valor_plano` varchar(45) DEFAULT NULL,
  `opcao_plano` varchar(45) DEFAULT NULL,
  `desc_plano` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_planos`
--

INSERT INTO `tbl_planos` (`idl_planos`, `nome_plano`, `valor_plano`, `opcao_plano`, `desc_plano`) VALUES
(1, 'Frango', '109,99', 'Mensal', 'Confira taxas de matrícula e manutenção na unidade de interesse\r\nSem multas ou taxas de cancelamento\r\nAcesso a todas as aulas coletivas\r\nAcesso total a estrutura da academia\r\nSem restrição de horários\r\nLeve 2 amigos para treinar'),
(2, 'Rato de Academia', '299,99', 'Trimensal', 'Sem taxas de matrícula ou manutenção\r\n10% de desconto na mensalidade\r\nAcesso a todas as aulas coletivas\r\nAcesso total a estrutura da academia\r\nSem restrição de horários\r\nLeve 5 amigos para treinar');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices para tabela `tbl_planos`
--
ALTER TABLE `tbl_planos`
  ADD PRIMARY KEY (`idl_planos`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_planos`
--
ALTER TABLE `tbl_planos`
  MODIFY `idl_planos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
