-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/12/2024 às 19:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tiozinho`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` text NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `endereco`, `data_nascimento`, `data_atualizacao`) VALUES
(1, 'Ana Siveira', 'ana.silvinhaa@email.com', '(11) 98737-4321', 'Rua dos bobos', '1575-05-15', '2024-12-12 16:49:57'),
(2, 'Carlos Souza', 'carlos.souza@email.com', '(21) 99876-5432', 'Avenida Central, 456, Rio de Janeiro, RJ', '1985-08-22', '2024-12-11 19:17:49'),
(3, 'Mariana Lima', 'mariana.lima@email.com', '(31) 91234-5678', 'Rua Bela Vista, 789, Belo Horizonte, MG', '1992-03-10', '2024-12-11 19:17:49'),
(4, 'Fernando Oliveira', 'fernando.oliveira@email.com', '(41) 93456-7890', 'Praça da Liberdade, 321, Curitiba, PR', '1988-12-05', '2024-12-11 19:17:49'),
(5, 'Beatriz Costa', 'beatriz.costa@email.com', '(51) 97654-3210', 'Rua Alegre, 654, Porto Alegre, RS', '1995-07-18', '2024-12-11 19:17:49'),
(6, 'João Santos', 'joao.santos@email.com', '(61) 99888-1122', 'Quadra 10, Lote 20, Brasília, DF', '1980-11-25', '2024-12-11 19:17:49'),
(7, 'Patrícia Almeida', 'patricia.almeida@email.com', '(71) 94567-1234', 'Rua do Sol, 98, Salvador, BA', '1993-04-02', '2024-12-11 19:17:49'),
(8, 'Roberto Ferreira', 'roberto.ferreira@email.com', '(81) 91234-0987', 'Avenida Beira Mar, 1234, Recife, PE', '1982-09-14', '2024-12-11 19:17:49'),
(9, 'Luciana Mendes', 'luciana.mendes@email.com', '(91) 98765-4321', 'Travessa das Palmeiras, 567, Belém, PA', '1991-06-30', '2024-12-11 19:17:49'),
(10, 'Ricardo Barbosa', 'ricardo.barbosa@email.com', '(31) 94321-0987', 'Rua dos Pioneiros, 333, Belo Horizonte, MG', '1987-01-19', '2024-12-11 19:17:49'),
(11, 'Carla Figueiredo', 'carla.figueiredo@email.com', '(85) 98765-2222', 'Rua do Farol, 444, Fortaleza, CE', '1994-02-11', '2024-12-11 19:17:49'),
(12, 'Paulo Henrique', 'paulo.henrique@email.com', '(31) 91234-5678', 'Avenida Paulista, 1000, São Paulo, SP', '1990-10-05', '2024-12-11 19:17:49'),
(13, 'Gabriela Azevedo', 'gabriela.azevedo@email.com', '(41) 90011-2233', 'Rua Vitória, 555, Curitiba, PR', '1996-05-17', '2024-12-11 19:17:49'),
(14, 'Vinícius Ramos', 'vinicius.ramos@email.com', '(21) 93222-3344', 'Rua das Amendoeiras, 666, Rio de Janeiro, RJ', '1992-03-28', '2024-12-11 19:17:49'),
(15, 'Fernanda Castro', 'fernanda.castro@email.com', '(11) 90123-4455', 'Rua da Paz, 777, São Paulo, SP', '1995-08-09', '2024-12-11 19:17:49'),
(16, 'Eduardo Pereira', 'eduardo.pereira@email.com', '(51) 98777-8899', 'Avenida dos Andradas, 888, Porto Alegre, RS', '1989-07-23', '2024-12-11 19:17:49'),
(17, 'Juliana Rocha', 'juliana.rocha@email.com', '(71) 94567-6677', 'Praça do Comércio, 999, Salvador, BA', '1994-12-01', '2024-12-11 19:17:49'),
(18, 'Leandro Carvalho', 'leandro.carvalho@email.com', '(61) 95555-6789', 'Setor Comercial Sul, Bloco A, Brasília, DF', '1986-09-18', '2024-12-11 19:17:49'),
(19, 'Isabela Nogua', 'isabela.nogue@email.com', '(91) 911231-223', 'Alameda dos Anjos, 111, Belém, PA', '1991-02-26', '2024-12-12 17:17:52'),
(23, 'Bruno Lindotti', 'brunãogatão@gmail.com', '(87) 54402-2322', 'Avenina Receba da Silva', '2001-09-11', '2024-12-12 18:08:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `senha`, `data`) VALUES
(4, 'Telku Myadora', 'bocadeveludo@gmail.com', '62361711c02eaa44409b79ebee049268', '2024-12-11 14:42:58'),
(9, 'Tiozinhodomine', 'tiozinhodomine97@gmail.com', 'e58f839bdfd4974e0ecf5a982b686fca', '2024-12-12 14:51:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `tamanho` enum('PP','P','M','G','GG','XG') NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `tamanho`, `categoria`, `marca`, `cor`, `preco`, `imagem`, `data`) VALUES
(84, 'Camiseta Básica', 'Camiseta de algodão confortável', 'M', 'Camisetas', 'Marca X', 'Azul', 348.9, '', '2024-12-11 18:32:45'),
(85, 'Calça Jeans', 'Calça jeans skinny', 'G', 'Calças', 'Marca Y', 'Preto', 122, '', '2024-12-11 18:32:45'),
(86, 'Vestido Floral', 'Vestido estampado floral', 'P', 'Vestidos', 'Marca Z', 'Vermelho', 450, '', '2024-12-11 18:32:45'),
(88, 'Boné Estiloso', 'Boné de algodão com ajuste', 'PP', 'Acessórios', 'Marca V', 'Preto', 289, '', '2024-12-11 18:32:45'),
(89, 'Jaqueta Jeans', 'Jaqueta jeans com forro interno', 'GG', 'Casacos', 'Marca A', 'Azul Claro', 399, '', '2024-12-11 18:32:45'),
(90, 'Saia Midi', 'Saia midi em tecido leve', 'M', 'Saias', 'Marca B', 'Rosa', 145, '', '2024-12-11 18:32:45'),
(91, 'Camisa Social', 'Camisa social manga longa', 'G', 'Camisas', 'Marca C', 'Branca', 9990, '', '2024-12-11 18:32:45'),
(92, 'Sandália de Couro', 'Sandália de couro com salto médio', 'PP', 'Sapatos', 'Marca D', 'Marrom', 329, '', '2024-12-11 18:32:45'),
(97, 'Troféu fodástico', 'super troféu', 'G', 'troféu', 'Brazzino', 'dourado', 19, '', '2024-12-12 18:07:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
