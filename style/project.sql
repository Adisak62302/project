-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 01:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_expenses`
--

CREATE TABLE `category_expenses` (
  `id_category_expenses` int(11) NOT NULL,
  `Name_category_expenses` varchar(99) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_expenses`
--

INSERT INTO `category_expenses` (`id_category_expenses`, `Name_category_expenses`, `id_user`) VALUES
(1, 'ค่าแรงงาน', 8),
(3, 'ค่าปุ๋ย', 20),
(7, 'ยาฆ่าเเมลง', 20);

-- --------------------------------------------------------

--
-- Table structure for table `category_income`
--

CREATE TABLE `category_income` (
  `id_category_income` int(11) NOT NULL,
  `Name_category_income` varchar(99) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_income`
--

INSERT INTO `category_income` (`id_category_income`, `Name_category_income`, `id_user`) VALUES
(7, 'ขายผักหน้าไร่', 20),
(10, 'ขายผักตลาด', 20),
(11, 'ฝากขาย', 20),
(12, 'ขายผักออนไลน์', 20);

-- --------------------------------------------------------

--
-- Table structure for table `edit_admin_index`
--

CREATE TABLE `edit_admin_index` (
  `edit_admin_index_id` int(11) NOT NULL,
  `logoleaf` varchar(99) NOT NULL,
  `logohead` varchar(99) NOT NULL,
  `logofruit` varchar(99) NOT NULL,
  `logopod` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edit_admin_index`
--

INSERT INTO `edit_admin_index` (`edit_admin_index_id`, `logoleaf`, `logohead`, `logofruit`, `logopod`) VALUES
(1, './img/one.jpg', './img/two.jpg', './img/tree.jpg', './img/fout.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id_expenses` int(11) NOT NULL,
  `name_expenses` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id_expenses`, `name_expenses`, `price`, `id_date`) VALUES
(1, 'ค่าปุ๋ย', 200, '2022-08-22'),
(2, 'ยาฆ่าเเมลง', 5000, '2022-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_item`
--

CREATE TABLE `expenses_item` (
  `id_Expenses` int(11) NOT NULL,
  `Total_expenses` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_report`
--

CREATE TABLE `expenses_report` (
  `id_expenses` int(11) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id_income` int(11) NOT NULL,
  `name_income` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id_income`, `name_income`, `price`, `id_date`) VALUES
(2, 'ขายผัก', 3, '2022-08-19'),
(3, 'ขายผักหน้าไร่', 1000, '2022-08-19'),
(4, 'ฝากขาย', 3000, '2022-08-23'),
(5, 'ขายผักออนไลน์', 2000, '2022-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `income_item`
--

CREATE TABLE `income_item` (
  `id_Income_Item` int(11) NOT NULL,
  `product_amount` int(99) NOT NULL,
  `Tatl_sell` varchar(99) NOT NULL,
  `price_unit_item` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income_report`
--

CREATE TABLE `income_report` (
  `id_Income` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `income_amount` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE `plot` (
  `id_Plot` int(11) NOT NULL,
  `wide` int(99) NOT NULL,
  `long` int(99) NOT NULL,
  `planing_start_date` date NOT NULL,
  `planing_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_Product` int(11) NOT NULL,
  `Product_Name` varchar(99) NOT NULL,
  `price_unit_product` int(99) NOT NULL,
  `unit` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `Tel` int(10) NOT NULL,
  `IDline` varchar(99) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `Tel`, `IDline`, `type_id`) VALUES
(7, 'adisak03', 'adisak_kk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 927799270, 'adisak00', 1),
(8, 'adisak00', 'adisakk3333@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 927799270, 'adisak00', 2),
(15, 'siriprapa', 'siriprapatd@kkumail.com', '81dc9bdb52d04dc20036dbd8313ed055', 945233436, 'siritd7743', 1),
(18, 'adisak_ph', 'adisak_kk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 927799270, 'adisak123', 2),
(19, 'adisak04', 'adisak_ph@kkumail.com', '81dc9bdb52d04dc20036dbd8313ed055', 927799270, 'adisak123', 2),
(20, 'adisak01', 'adisak_ph@kkumail.com', '81dc9bdb52d04dc20036dbd8313ed055', 927799270, 'adisak00', 2),
(21, 'adisak33', 'adisakk3333@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 927799270, 'adisak123', 1),
(22, 'prik', 'sahatthaya.t@gmail.com', 'e99246d0435963f025fcf84e60b84de7', 2147483647, '1220202', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE `vegetable` (
  `id_Vegetable` int(11) NOT NULL,
  `Name` varchar(99) NOT NULL,
  `distance` int(99) NOT NULL,
  `sow_seeds` int(99) NOT NULL,
  `Planing_period` int(99) NOT NULL,
  `Fertilize` int(99) NOT NULL,
  `soil` int(99) NOT NULL,
  `old` int(3) NOT NULL,
  `img` varchar(999) NOT NULL,
  `Veg_Type_ID` int(11) NOT NULL,
  `id_user` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`id_Vegetable`, `Name`, `distance`, `sow_seeds`, `Planing_period`, `Fertilize`, `soil`, `old`, `img`, `Veg_Type_ID`, `id_user`) VALUES
(1, 'ผักคะน้า', 15, 20, 2, 2, 2, 20, 'img/one.jpg', 1, 7),
(3, 'ผักเคล', 20, 60, 3, 3, 1, 60, 'img/Kale.jpg', 1, 7),
(36, 'ฟักทอง', 60, 15, 70, 70, 1, 15, 'img/f1.jpg', 3, 8),
(39, 'หัวไซเท้า', 20, 25, 70, 1, 1, 90, 'img/daikon.jpg', 2, 8),
(41, 'ผักชี', 15, 15, 30, 30, 2, 15, 'img/original-1634632690275.jpg', 1, 20),
(43, 'ฟักทอง', 15, 0, 15, 15, 15, 12, 'img/4146c3fc99149101f44762f04d754a82.jpg', 3, 21),
(44, 'ฟักทอง', 15, 0, 15, 15, 15, 15, 'img/4146c3fc99149101f44762f04d754a82.jpg', 3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `veg_crop`
--

CREATE TABLE `veg_crop` (
  `id_Veg_crop` int(11) NOT NULL,
  `sow_seeds` date NOT NULL,
  `soil` date NOT NULL,
  `Fertilize` date NOT NULL,
  `crop_name` varchar(45) NOT NULL,
  `Veg_Type_ID` int(11) NOT NULL,
  `veg` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `veg_crop_plot`
--

CREATE TABLE `veg_crop_plot` (
  `Veg_crop_Plot_id` int(11) NOT NULL,
  `wide` int(11) NOT NULL,
  `long` int(11) NOT NULL,
  `id_Veg_crop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `veg_crop_plot`
--

INSERT INTO `veg_crop_plot` (`Veg_crop_Plot_id`, `wide`, `long`, `id_Veg_crop`) VALUES
(106, 2, 32, 48808),
(107, 2, 32, 48808),
(108, 2, 32, 48808),
(109, 2, 3, 48808),
(110, 2, 3, 48808),
(111, 23, 21, 48809),
(112, 23, 21, 48809),
(113, 23, 21, 48809),
(114, 2, 23, 48809),
(115, 23, 13, 48809),
(116, 100, 200, 48810),
(117, 100, 200, 48810),
(118, 100, 200, 48810),
(119, 100, 200, 48810),
(120, 100, 200, 48810),
(121, 120, 200, 48810),
(122, 150, 150, 48810),
(123, 150, 200, 48810),
(125, 150, 200, 48811),
(126, 150, 200, 48811),
(127, 150, 200, 48811),
(128, 120, 200, 48811),
(129, 200, 150, 48811),
(130, 100, 120, 48812),
(131, 100, 120, 48812),
(132, 100, 120, 48812),
(133, 100, 120, 48812),
(134, 100, 120, 48812),
(135, 100, 120, 48812),
(136, 100, 120, 48812),
(137, 100, 120, 48812),
(138, 100, 120, 48812),
(139, 100, 120, 48812),
(140, 130, 200, 48812),
(141, 100, 100, 48812),
(142, 120, 120, 48812),
(143, 130, 150, 48812),
(144, 150, 150, 48812);

-- --------------------------------------------------------

--
-- Table structure for table `veg_type`
--

CREATE TABLE `veg_type` (
  `Veg_Type_ID` int(11) NOT NULL,
  `Name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `veg_type`
--

INSERT INTO `veg_type` (`Veg_Type_ID`, `Name`) VALUES
(1, 'ผักกินใบ'),
(2, 'ผักกินหัว'),
(3, 'ผักกินผล'),
(4, 'ผักกินฝัก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_expenses`
--
ALTER TABLE `category_expenses`
  ADD PRIMARY KEY (`id_category_expenses`);

--
-- Indexes for table `category_income`
--
ALTER TABLE `category_income`
  ADD PRIMARY KEY (`id_category_income`);

--
-- Indexes for table `edit_admin_index`
--
ALTER TABLE `edit_admin_index`
  ADD PRIMARY KEY (`edit_admin_index_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id_expenses`);

--
-- Indexes for table `expenses_item`
--
ALTER TABLE `expenses_item`
  ADD PRIMARY KEY (`id_Expenses`);

--
-- Indexes for table `expenses_report`
--
ALTER TABLE `expenses_report`
  ADD PRIMARY KEY (`id_expenses`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id_income`);

--
-- Indexes for table `income_item`
--
ALTER TABLE `income_item`
  ADD PRIMARY KEY (`id_Income_Item`);

--
-- Indexes for table `income_report`
--
ALTER TABLE `income_report`
  ADD PRIMARY KEY (`id_Income`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`id_Plot`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`id_Vegetable`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `veg_crop`
--
ALTER TABLE `veg_crop`
  ADD PRIMARY KEY (`id_Veg_crop`);

--
-- Indexes for table `veg_crop_plot`
--
ALTER TABLE `veg_crop_plot`
  ADD PRIMARY KEY (`Veg_crop_Plot_id`);

--
-- Indexes for table `veg_type`
--
ALTER TABLE `veg_type`
  ADD PRIMARY KEY (`Veg_Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_expenses`
--
ALTER TABLE `category_expenses`
  MODIFY `id_category_expenses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_income`
--
ALTER TABLE `category_income`
  MODIFY `id_category_income` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `edit_admin_index`
--
ALTER TABLE `edit_admin_index`
  MODIFY `edit_admin_index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id_expenses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses_item`
--
ALTER TABLE `expenses_item`
  MODIFY `id_Expenses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_report`
--
ALTER TABLE `expenses_report`
  MODIFY `id_expenses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id_income` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income_item`
--
ALTER TABLE `income_item`
  MODIFY `id_Income_Item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_report`
--
ALTER TABLE `income_report`
  MODIFY `id_Income` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `id_Plot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `id_Vegetable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `veg_crop`
--
ALTER TABLE `veg_crop`
  MODIFY `id_Veg_crop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48813;

--
-- AUTO_INCREMENT for table `veg_crop_plot`
--
ALTER TABLE `veg_crop_plot`
  MODIFY `Veg_crop_Plot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `veg_type`
--
ALTER TABLE `veg_type`
  MODIFY `Veg_Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`type_id`);

--
-- Constraints for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
