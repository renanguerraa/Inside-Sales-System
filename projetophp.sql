-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2020 às 15:43
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Cozinha'),
(2, 'Sala'),
(3, 'Quarto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cnpj_cli` varchar(18) NOT NULL,
  `nome_cli` varchar(50) DEFAULT NULL,
  `numero_cli` varchar(10) DEFAULT NULL,
  `bairro_cli` varchar(10) DEFAULT NULL,
  `cidade_cli` varchar(20) DEFAULT NULL,
  `cep_cli` varchar(10) DEFAULT NULL,
  `estado_cli` varchar(2) DEFAULT NULL,
  `endereco_cli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf_cnpj_cli`, `nome_cli`, `numero_cli`, `bairro_cli`, `cidade_cli`, `cep_cli`, `estado_cli`, `endereco_cli`) VALUES
('123.456.789-32', 'Renan', '950221914', 'Morumbi', 'Atibaia', '12.345-678', 'SP', 'Rua Principal, 13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `numero_compra` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor_comissao` decimal(10,2) DEFAULT NULL,
  `valor_transporte` decimal(10,2) DEFAULT NULL,
  `cpf_cnpj_vend` varchar(18) DEFAULT NULL,
  `cpf_cnpj_transp` varchar(18) DEFAULT NULL,
  `cpf_cnpj_cli` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`numero_compra`, `data`, `valor_comissao`, `valor_transporte`, `cpf_cnpj_vend`, `cpf_cnpj_transp`, `cpf_cnpj_cli`) VALUES
(1, '2020-07-01', '123.00', '123.00', '845.986.159-52', '456.789.369-23', '123.456.789-32'),
(2, '2020-07-01', '150.00', '120.00', '845.986.159-52', '456.789.369-23', '123.456.789-32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `codigo_img` int(11) NOT NULL,
  `codigo_prod` varchar(10) NOT NULL,
  `nome_arquivo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`codigo_img`, `codigo_prod`, `nome_arquivo`) VALUES
(1, '123', 'sofa1.jpg'),
(2, '123', 'sofa2.jpg'),
(3, '456', 'geladeira1.jpg'),
(4, '456', 'geladeira2.jpg'),
(5, '789', 'cama.jpg'),
(7, '242', 'fogao1.jpg'),
(8, '242', 'fogao2.jpg'),
(9, '242', 'fogao3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui`
--

CREATE TABLE `possui` (
  `numero_compra` int(11) NOT NULL,
  `codigo_prod` varchar(10) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `possui`
--

INSERT INTO `possui` (`numero_compra`, `codigo_prod`, `valor`, `quantidade`) VALUES
(1, '456', '28788.00', '12.00'),
(1, '789', '3588.00', '12.00'),
(2, '242', '1260.00', '2.00'),
(2, '456', '4798.00', '2.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` varchar(10) NOT NULL,
  `nome_pro` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `quantidade` int(5) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `dimensoes` varchar(15) DEFAULT NULL,
  `unidade_Venda` varchar(3) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `nome_pro`, `descricao`, `valor_unitario`, `quantidade`, `peso`, `dimensoes`, `unidade_Venda`, `id`) VALUES
('123', 'Sofá', 'Sofá 3 Lugares Retrátil Lubeck Suede Bege 180 cm - Mobly.', '579.99', 10, '44', '10', 'U', 2),
('242', 'Fogão ', 'Fogão 6 Bocas Esmaltec Branco 6Q - Acendimento Manual Bali\r\n', '630.00', 8, '26', '26', 'U', 1),
('456', 'Geladeira', 'Geladeira/Refrigerador Brastemp Frost Free Duplex - Branca 375L BRM44 HBANA', '2399.00', -8, '50', '50', 'U', 1),
('789', 'Cama Box Casal', 'Cama Box casal ortopédica 138x188x43 Brasil camas ', '299.00', -7, '50', '50', 'U', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `cpf_cnpj_transp` varchar(18) NOT NULL,
  `nome_tras` varchar(50) DEFAULT NULL,
  `endereco_trans` varchar(50) DEFAULT NULL,
  `numero_trans` varchar(10) DEFAULT NULL,
  `bairro_trans` varchar(50) DEFAULT NULL,
  `cidade_trans` varchar(50) DEFAULT NULL,
  `estado_trans` varchar(2) DEFAULT NULL,
  `cep_trans` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transportadora`
--

INSERT INTO `transportadora` (`cpf_cnpj_transp`, `nome_tras`, `endereco_trans`, `numero_trans`, `bairro_trans`, `cidade_trans`, `estado_trans`, `cep_trans`) VALUES
('456.789.369-23', 'Sedex', 'Rua 3, 40', '912354879', 'Casa Verde', 'São Paulo', 'SP', '23.459-789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cpf_cnpj_vend` varchar(18) NOT NULL,
  `nome_vend` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`cpf_cnpj_vend`, `nome_vend`) VALUES
('845.986.159-52', 'Raphael');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf_cnpj_cli`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `cpf_cnpj_vend` (`cpf_cnpj_vend`),
  ADD KEY `cpf_cnpj_cli` (`cpf_cnpj_cli`),
  ADD KEY `cpf_cnpj_transp` (`cpf_cnpj_transp`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`codigo_img`,`codigo_prod`) USING BTREE,
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices para tabela `possui`
--
ALTER TABLE `possui`
  ADD KEY `numero_compra` (`numero_compra`),
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_prod`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`cpf_cnpj_transp`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cpf_cnpj_vend`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `numero_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `codigo_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cpf_cnpj_vend`) REFERENCES `vendedor` (`cpf_cnpj_vend`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`cpf_cnpj_cli`) REFERENCES `cliente` (`cpf_cnpj_cli`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`cpf_cnpj_transp`) REFERENCES `transportadora` (`cpf_cnpj_transp`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Limitadores para a tabela `possui`
--
ALTER TABLE `possui`
  ADD CONSTRAINT `possui_ibfk_1` FOREIGN KEY (`numero_compra`) REFERENCES `compra` (`numero_compra`),
  ADD CONSTRAINT `possui_ibfk_2` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
