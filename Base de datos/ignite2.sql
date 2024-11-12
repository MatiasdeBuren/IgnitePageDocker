-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 12:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ignite2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 'Ayrton Ferreira', '1164890321', 'ayrtonkevin01@hotmail.com', 'cash on delivery', 'baez', '356', 'CAPITAL FEDERAL', 'Buenos Aires', 'Argentina', 1426, 'Asus Tuf B450 (1) ', '2'),
(2, 'Ayrton', '1164890321', 'ayrtonkevin01@hotmail.com', 'Efectivo', 'baez', '356', 'Palermo', 'CABA', 'Argentina', 1425, 'Gygabyte B450 (1) ', '3'),
(3, 'Ayrton', '1164890321', 'ayrtonkevin01@hotmail.com', 'Efectivo', 'baez', '356', 'Palermo', 'CABA', 'Argentina', 1425, 'Gygabyte B450 (1) ', '3'),
(4, 'Ayrton', '1164890321', 'ayrtonkevin01@hotmail.com', 'Efectivo', 'baez', '356 baez', 'CAPITAL FEDERAL', 'Buenos Aires', 'Argentina', 1425, 'Asus Tuf B450 (1) ', '2'),
(5, 'Ayrton Ferreira', '47765765', 'ayrtonkevin01@hotmail.com', 'Efectivo', 'baez', '356', 'CAPITAL FEDERAL', 'Buenos Aires', 'Argentina', 1425, 'Asus Tuf B450 (1) , Ryzen_5 (1) , CoolerMaster (1) , Kingston DDR4 4gb (1) , ASUS Tuf B560M (1) ', '29'),
(6, 'wagner', '3543543', 'wagnerfm00@hotmail.com', 'Efectivo', 'baez', '356', 'CAPITAL FEDERAL', 'Buenos Aires', 'Argentina', 1426, 'Asus Tuf B450 (3) , Ryzen_5 (2) , CoolerMaster (1) , Kingston DDR4 4gb (1) , ASUS Tuf B560M (1) , Ryzen_7 (1) , AeroCool (1) , Asrock RX 570 (1) , HDD Seagate 2TB (1) , AeroCool CX650F (1) , Monitor Gamer LG 27 (1) , Teclado Hyper X (1) ', '224');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` int(120) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_category` varchar(20) NOT NULL,
  `product_type` varchar(10) NOT NULL,
  `producto_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_type`, `producto_stock`) VALUES
(1, 'Asus Tuf B450', 2, 'Mother_ASUS_TUF_B450.jpg', 'Motherboard', 'AMD', 2),
(2, 'Gygabyte B450', 3, 'Mother_Gygabyte_B450.jpg', 'Motherboard', 'AMD', 3),
(3, 'MSI MAG X570S', 5, 'Mother_MSI_MAG_X570S_TOMAHAWK.jpg', 'Motherboard', 'AMD', 5),
(4, 'Ryzen_5', 4, 'Ryzen_5.jpg', 'Procesador', 'AMD', 1),
(5, 'Ryzen_7', 7, 'Ryzen_7.jpg', 'Procesador', 'AMD', 2),
(6, 'Ryzen 9', 9, 'Ryzen_9.jpg', 'Procesador', 'AMD', 3),
(9, 'CoolerMaster', 1, 'Cooler_FAN_Cooler_Master_MASTERFAN_MF120.jpg', 'Cooler', 'AMD', 4),
(10, 'AeroCool', 10, 'Fan_Aerocool_ASTRO_24_ARGB_240MM.jpg', 'Cooler', 'AMD', 5),
(11, 'Kingston DDR4 4gb', 20, 'Memoria_Kingston_DDR4_4GB_3200MHz.jpg', 'RAM', 'AMD', 6),
(12, 'Kingston DDR4 8gb', 30, 'Memoria_Kingston_DDR4_4GB_3200MHz.jpg', 'RAM', 'AMD', 2),
(13, 'Adata DDR4 16gb', 40, 'Memoria_Adata_DDR4_16GB.jpg', 'RAM', 'AMD', 1),
(14, 'Asrock RX 570', 30, 'Placa_de_Video_Asrock_RX_570_8GB_OC_Phantom_Gaming.jpg', 'Placa_de_video', 'AMD', 3),
(15, 'XFX RX 6600', 70, 'Placa_de_Video_XFX_Radeon_RX_6600_XT_BLACK_8GB_GDDR6.jpg', 'Placa_de_video', 'AMD', 3),
(16, 'HDD Seagate 1TB', 30, 'Disco_R__gido_Seagate_1TB_Barracuda.jpg', 'Almacenamiento', 'AMD', 3),
(17, 'HDD Seagate 2TB', 40, 'Disco_R__gido_Seagate_1TB_Barracuda.jpg', 'Almacenamiento', 'AMD', 3),
(18, 'SSD PNY 240GB', 50, 'Disco_Solido_SSD_PNY_240GB.jpg', 'Almacenamiento', 'AMD', 3),
(19, 'SSD Adata 1TB', 60, 'Disco_Solido_SSD_Kingston_480GB.jpg', 'Almacenamiento', 'AMD', 3),
(20, 'AeroCool CX650F', 30, 'Fuente_Corsair_CX650F_650W_RGB_Full_Modular_80_Plus_Bronze.jpg', 'Fuente_de_Poder', 'AMD', 3),
(21, 'Asus TUF 750W', 40, 'Fuente_ASUS_TUF_750B_80_Plus_Bronze_750W.jpg', 'Fuente_de_Poder', 'AMD', 3),
(22, 'Asus TUF GT301', 30, 'Gabinete_ASUS_TUF_GT301_ARGB_Vidrio_Templado.jpg', 'Gabinetes', 'AMD', 3),
(23, 'Cooler Master MB511', 40, 'Gabinete_ASUS_TUF_GT301_ARGB_Vidrio_Templado.jpg', 'Gabinetes', 'AMD', 3),
(24, 'Monitor Gamer LG 24', 50, 'Monitor_Gamer_LG_24__UltraGear_24GL600F_144Hz_1ms.jpg', 'Monitores', 'AMD', 3),
(25, 'Monitor Gamer LG 27', 60, 'Monitor_Gamer_LG_27__27GL650F_Full_HD_144hz.jpg', 'Monitores', 'AMD', 3),
(26, 'Logitech G502', 20, 'Mouse_Logitech_G502_Lightspeed_Wireless.jpg', 'Perifericos', 'AMD', 3),
(27, 'Teclado Hyper X', 10, 'Teclado_Mecanico_HyperX_Alloy_Origins_Core_Switch_HyperX_Blue.jpg', 'Perifericos', 'AMD', 3),
(28, 'Auriculares Hyper X', 10, 'Auriculares_HyperX_Cloud_Alpha_S_7.1_Black_Blue.jpg', 'Perifericos', 'AMD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `productos_intel`
--

CREATE TABLE `productos_intel` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_category` varchar(20) NOT NULL,
  `product_type` varchar(10) NOT NULL,
  `producto_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos_intel`
--

INSERT INTO `productos_intel` (`id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_type`, `producto_stock`) VALUES
(1, 'ASUS Tuf B560M', 2, 'Mother_ASUS_TUF_GAMING_B560M.jpg', 'Placa', 'Intel', 3),
(2, 'Gigabyte B365M', 10, 'Mother_Gigabyte_B365M.jpg', 'Motherboard', 'Intel', 3),
(3, 'MSI MAG Z590', 20, 'Mother_MSI_MAG_Z590_TOMAHAWK.jpg', 'Motherboard', 'Intel', 3),
(4, 'Intel Core I3', 30, 'INTEL-CORE-I3-8100-1.jpg', 'Procesador', 'Intel', 3),
(5, 'Intel Core I5', 40, 'Intel_Core_i5.jpg', 'Procesador', 'Intel', 3),
(6, 'Intel Core I7', 40, 'Intel_Core_i7.jpg', 'Procesador', 'Intel', 3),
(7, 'CoolerMaster', 20, 'Cooler_FAN_Cooler_Master_MASTERFAN_MF120.jpg', 'Cooler', 'Intel', 3),
(8, 'Kingston DDR4 4gb', 20, 'Memoria_Kingston_DDR4_4GB_3200MHz.jpg', 'RAM', 'Intel', 3),
(9, 'Kingston DDR4 8gb', 30, 'Memoria_Kingston_DDR4_4GB_3200MHz.jpg', 'RAM', 'Intel', 3),
(10, 'Adata DDR4 16gb', 40, 'Memoria_Adata_DDR4_16GB.jpg', 'RAM', 'Intel', 3),
(11, 'ASUS RTX 3070', 50, 'Placa_de_Video_ASUS_GeForce_RTX_3070_8GB_GDDR6.jpg', 'Placa_de_video', 'Intel', 3),
(12, 'ASUS RTX 3080', 50, 'Placa_de_Video_ASUS_GeForce_RTX_3070_8GB_GDDR6.jpg', 'Placa_de_video', 'Intel', 3),
(13, 'HDD Seagate 1TB', 30, 'Disco_R__gido_Seagate_1TB_Barracuda.jpg', 'Almacenamiento', 'Intel', 3),
(14, 'HDD Seagate 2TB', 40, 'Disco_R__gido_Seagate_1TB_Barracuda.jpg', 'Almacenamiento', 'Intel', 3),
(15, 'SSD PNY 240GB', 50, 'Disco_Solido_SSD_PNY_240GB.jpg', 'Almacenamiento', 'Intel', 3),
(16, 'SSD Adata 1TB', 60, 'Disco_Solido_SSD_Kingston_480GB.jpg', 'Almacenamiento', 'Intel', 3),
(17, 'AeroCool CX650F', 30, 'Fuente_Corsair_CX650F_650W_RGB_Full_Modular_80_Plus_Bronze.jpg', 'Fuente_de_Poder', 'Intel', 3),
(18, 'Asus TUF 750W', 40, 'Fuente_ASUS_TUF_750B_80_Plus_Bronze_750W.jpg', 'Fuente_de_Poder', 'Intel', 3),
(19, 'Asus TUF GT301', 30, 'Gabinete_ASUS_TUF_GT301_ARGB_Vidrio_Templado.jpg', 'Gabinetes', 'Intel', 3),
(20, 'Cooler Master MB511', 40, 'Gabinete_ASUS_TUF_GT301_ARGB_Vidrio_Templado.jpg', 'Gabinetes', 'Intel', 3),
(21, 'Monitor Gamer LG 24', 50, 'Monitor_Gamer_LG_24__UltraGear_24GL600F_144Hz_1ms.jpg', 'Monitores', 'Intel', 3),
(22, 'Monitor Gamer LG 27', 60, 'Monitor_Gamer_LG_27__27GL650F_Full_HD_144hz.jpg', 'Monitores', 'Intel', 3),
(23, 'Logitech G502', 20, 'Mouse_Logitech_G502_Lightspeed_Wireless.jpg', 'Perifericos', 'Intel', 3),
(24, 'Teclado Hyper X', 10, 'Teclado_Mecanico_HyperX_Alloy_Origins_Core_Switch_HyperX_Blue.jpg', 'Perifericos', 'Intel', 3),
(25, 'Auriculares Hyper X', 10, 'Auriculares_HyperX_Cloud_Alpha_S_7.1_Black_Blue.jpg', 'Perifericos', 'Intel', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Ayrton Ferreira', 'ayrtonkevin01@hotmail.com', '3c1f2234e635d771ed36c083796432f1', 'admin'),
(3, 'jorgito', 'wagnerfm00@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos_intel`
--
ALTER TABLE `productos_intel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `productos_intel`
--
ALTER TABLE `productos_intel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
