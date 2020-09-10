-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Set-2020 às 01:28
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cardapio-menu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(120) DEFAULT NULL,
  `category_description` varchar(120) DEFAULT NULL,
  `category_status` int(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Pratos Quentes', NULL, 1, '2020-07-30 01:20:00', NULL),
(2, 'Pratos Frios', NULL, 1, '2020-07-30 01:20:00', NULL),
(3, 'Bolos & Tortas', NULL, 1, '2020-07-30 01:20:00', NULL),
(4, 'Bebidas', NULL, 1, '2020-07-30 01:20:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-30 01:24:00', NULL),
(1, 2, '2020-07-30 01:24:00', NULL),
(1, 3, '2020-07-30 01:24:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `factory`
--

CREATE TABLE `factory` (
  `factory_id` int(10) UNSIGNED NOT NULL,
  `factory_name` varchar(120) DEFAULT NULL,
  `factory_status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `page`
--

CREATE TABLE `page` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(120) DEFAULT NULL,
  `page_html` longtext DEFAULT NULL,
  `page_tag` varchar(45) DEFAULT NULL,
  `page_status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `page`
--

INSERT INTO `page` (`page_id`, `page_name`, `page_html`, `page_tag`, `page_status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '<div style=\"background-color: #f45c34;margin:0 auto;width:100%\" class=\"text-center p-3\">\n<img src=\"/assets/media/logo/logo-400x366.png\" alt=\"\">\n</div>\n<div class=\"container mt-5\">\n    <div class=\"row\"><div class=\"col-12 text-center font-italic\"><cite class=\"h1\" title=\"Conheça um pouco sobre a nova opção, para você que esta iniciando no delivery e/ou take-away\">Conheça um pouco sobre a nova opção, para você que esta iniciando no delivery e/ou take-away.</cite></div>\n<div class=\"mt-3 col-12 text-justify\" style=\"font-size:18px\">Desenvolvemos um micro-serviço aonde você disponibiliza seu cardápio de forma interativa para seu cliente, e o mesmo possa já fazer o pedido para seu estabelecimento, de forma direta, objetiva e transparente para ambas as partes.\n</div><div class=\"mt-3 col-12 text-justify\" style=\"font-size:18px\">Venha fazer um orçamento e conhecer o aplicativo que irá ajuda-lo a alavancar seu negocio.</div>    </div>\n</div>', 'home', 1, '2020-07-25 18:47:00', '2020-07-26 01:48:00'),
(2, 'Restaurant', NULL, 'restaurant', 1, '2020-07-29 16:29:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_status` int(1) DEFAULT 1,
  `product_slug` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_status`, `product_slug`, `created_at`, `updated_at`) VALUES
(1, 'Comercial (600g)', 'Bife a cavalo, Banana Frita, Espaguete alho e óleo, Fafora de Bacon, Arroz & Feijão, Salada', 'bife-a-cavalo-1000x500.jpg', 13, 1, 'comercial-600', '2020-07-30 01:23:00', '2020-07-30 13:47:00'),
(2, 'Comercial (800g)', 'Bife a cavalo, Banana Frita, Espaguete alho e óleo, Fafora de Bacon, Arroz & Feijão, Salada', 'bife-a-cavalo-1000x500.jpg', 15, 1, 'comercial-800', '2020-07-30 01:23:00', '2020-07-30 13:47:00'),
(3, 'Executiva (700g)', 'Bife a cavalo, Banana Frita, Espaguete alho e óleo, Fafora de Bacon, Arroz & Feijão, Salada', 'bife-a-cavalo-1000x500.jpg', 17, 1, 'executiva-700', '2020-07-30 01:23:00', '2020-07-30 13:47:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_restaurant`
--

CREATE TABLE `product_restaurant` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_restaurant`
--

INSERT INTO `product_restaurant` (`product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-08-16 14:32:55', NULL),
(2, 2, '2020-08-16 14:33:04', NULL),
(3, 2, '2020-08-16 14:33:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `request`
--

CREATE TABLE `request` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `request_date` timestamp NULL DEFAULT NULL,
  `request_status` int(1) DEFAULT NULL,
  `request_total` double DEFAULT NULL,
  `request_payment` int(1) DEFAULT NULL,
  `request_change_payment` double DEFAULT NULL,
  `request_restaurant_id` int(11) DEFAULT NULL,
  `request_delivery` int(1) DEFAULT NULL,
  `request_situation` int(1) DEFAULT NULL,
  `request_read` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `request`
--

INSERT INTO `request` (`request_id`, `request_date`, `request_status`, `request_total`, `request_payment`, `request_change_payment`, `request_restaurant_id`, `request_delivery`, `request_situation`, `request_read`, `created_at`, `updated_at`) VALUES
(1, '2020-08-17 04:26:09', 1, 79, 2, 0, 2, 1, 1, 0, '2020-08-17 04:26:09', '2020-08-17 04:26:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `request_product_client`
--

CREATE TABLE `request_product_client` (
  `request_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `request_product_client`
--

INSERT INTO `request_product_client` (`request_id`, `product_id`, `client_id`, `quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 13, '2020-08-17 04:26:09', '2020-08-17 04:26:09'),
(1, 2, 1, 1, 15, '2020-08-17 04:26:09', '2020-08-17 04:26:09'),
(1, 3, 1, 3, 17, '2020-08-17 04:26:09', '2020-08-17 04:26:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_mail` varchar(120) DEFAULT NULL,
  `user_password` varchar(120) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_neighborhood` varchar(255) DEFAULT NULL,
  `user_zipcode` varchar(20) DEFAULT NULL,
  `user_number` varchar(30) DEFAULT NULL,
  `user_state` varchar(120) DEFAULT NULL,
  `user_city` varchar(120) DEFAULT NULL,
  `user_phone` varchar(18) DEFAULT NULL,
  `user_cellphone` varchar(18) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_newsletter` int(1) DEFAULT NULL,
  `user_level` int(1) DEFAULT NULL,
  `user_status` int(1) DEFAULT 1,
  `user_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_complement` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_mail`, `user_password`, `user_address`, `user_neighborhood`, `user_zipcode`, `user_number`, `user_state`, `user_city`, `user_phone`, `user_cellphone`, `user_image`, `user_newsletter`, `user_level`, `user_status`, `user_slug`, `created_at`, `updated_at`, `user_complement`) VALUES
(1, 'Flavio Hayashida', 'fmmh18@gmail.com', '$2a$08$Cf1f11ePArKlBJomM0F6a.kx3/m1BWk7KKpKIZHD3nulOmh5IdpQK', 'Rua D5', 'Parque Cuiaba', '78095-337', '14', 'MT', 'Cuiabá', '', '(65) 99947-8142', 'perfil.jpg', NULL, 1, 1, NULL, '2020-07-04 23:12:00', '2020-08-17 06:32:28', 'QD 64'),
(2, 'Moinho refeições delivery', 'admin@moinhodelivery.com.br', '$2a$08$Cf1f11ePArKlBJomM0F6a..xHEJI8m1uz8A.V9btrHbR1RSFWLenC', 'Avenida Anita Garibaldi', 'Jardim Universitário', '78075-190', '495', 'MT', 'Cuiabá', '', '(65) 9659-1886', 'logo-120.png', NULL, 2, 1, 'moinho-refeicoes-delivery', '2020-08-16 17:44:18', '2020-08-16 17:44:18', NULL),
(3, 'Sushi do sushi', 'contato@sushidosushi.com.br', '$2a$08$Cf1f11ePArKlBJomM0F6a..xHEJI8m1uz8A.V9btrHbR1RSFWLenC', '', '', '', '', '', '', '', '(65) 9301-2230', 'baixados.jpg', NULL, 2, 1, 'sushi-do-sushi', '2020-08-16 20:28:29', '2020-08-16 20:28:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_category_restaurant_enabled`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_category_restaurant_enabled` (
`category_name` varchar(120)
,`user_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_product_category_restaurant`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_product_category_restaurant` (
`product_id` int(11) unsigned
,`product_name` varchar(255)
,`product_description` longtext
,`product_price` double
,`product_image` varchar(255)
,`product_slug` varchar(45)
,`category_name` varchar(120)
,`user_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_category_restaurant_enabled`
--
DROP TABLE IF EXISTS `vw_category_restaurant_enabled`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_category_restaurant_enabled`  AS  select distinct `category`.`category_name` AS `category_name`,`user`.`user_id` AS `user_id` from ((((`product` join `category_product` on(`category_product`.`product_id` = `product`.`product_id`)) join `category` on(`category`.`category_id` = `category_product`.`category_id`)) join `product_restaurant` on(`product_restaurant`.`product_id` = `product`.`product_id`)) join `user` on(`user`.`user_id` = `product_restaurant`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_product_category_restaurant`
--
DROP TABLE IF EXISTS `vw_product_category_restaurant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_product_category_restaurant`  AS  select `product`.`product_id` AS `product_id`,`product`.`product_name` AS `product_name`,`product`.`product_description` AS `product_description`,`product`.`product_price` AS `product_price`,`product`.`product_image` AS `product_image`,`product`.`product_slug` AS `product_slug`,`category`.`category_name` AS `category_name`,`user`.`user_id` AS `user_id` from ((((`product` join `category_product` on(`category_product`.`product_id` = `product`.`product_id`)) join `category` on(`category`.`category_id` = `category_product`.`category_id`)) join `product_restaurant` on(`product_restaurant`.`product_id` = `product`.`product_id`)) join `user` on(`user`.`user_id` = `product_restaurant`.`user_id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`factory_id`);

--
-- Índices para tabela `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Índices para tabela `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `factory`
--
ALTER TABLE `factory`
  MODIFY `factory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
