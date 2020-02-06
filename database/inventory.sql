-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 02:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_name`, `position`, `username`, `password`) VALUES
(1, 'Cashier', 'cashier', 'cashier', '12345'),
(2, 'Mark Jason Lagco', 'Cashier', 'jason', '324165');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `cmonth` varchar(25) NOT NULL,
  `cyear` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `month` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `amount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `salary_id` int(11) NOT NULL,
  `month` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `dayNumber` varchar(12) NOT NULL,
  `date` varchar(25) NOT NULL,
  `fdate` varchar(255) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `employeeName` varchar(25) NOT NULL,
  `cashier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lose`
--

CREATE TABLE `lose` (
  `p_id` int(10) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description_name` varchar(30) NOT NULL,
  `amount_lose` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `exdate` varchar(30) NOT NULL,
  `lmonth` varchar(25) NOT NULL,
  `lyear` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_ex`
--

CREATE TABLE `other_ex` (
  `transaction_number` int(20) NOT NULL,
  `type` varchar(40) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `description` varchar(60) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `omonth` varchar(30) NOT NULL,
  `oyear` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description_name` varchar(50) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `total_cost` int(25) NOT NULL,
  `price` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty_left` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_delivered` varchar(20) NOT NULL,
  `expiration_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `description_name`, `unit`, `cost`, `total_cost`, `price`, `supplier`, `qty_left`, `category`, `date_delivered`, `expiration_date`) VALUES
(14, 'P-0303532', 'Gravel', 'G1', 'Per m3', '500', 530500, '1000', 'Legazpi', 0, 'Gravel', '2019-09-16', ''),
(16, 'P-22520330', 'Republic Cement', 'Republic', 'Per Pieces', '225', 413550, '235', 'SORCOM', 0, 'Cement', '2019-09-17', '2020-01-04'),
(17, 'P-0322223', 'Black Sand', 'Black Sand', 'Per m3', '300', 0, '700', 'Legazpi', 0, 'Black Sand', '2019-10-09', ''),
(23, 'P-233203', 'Portland Premium', 'APO', 'Per Pieces', '215', 0, '230', 'SORCOM', 0, 'Cement', '2019-12-27', ''),
(24, 'P-84022', 'Legazpi Sand', 'Filtered Sand', 'Per m3', '300', 67500, '700', 'Legazpi', 0, 'Black Sand', '2020-01-03', ''),
(25, 'P-26232309', 'Concrete Hallow Blocks', 'CHB 4', 'Per Pieces', '7', 87500, '10', 'Hollow Blocks', 0, 'Gravel', '', '2020-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `date_deliver` varchar(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `rmonth` varchar(25) NOT NULL,
  `ryear` varchar(25) NOT NULL,
  `fdate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `p_amount` varchar(30) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `profit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `omonth` varchar(25) NOT NULL,
  `oyear` varchar(25) NOT NULL,
  `qtyleft` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `profit` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`) VALUES
(3, 'Legazpi', 'Legazpi City', '+639609287730', 'Ricardo'),
(4, 'SORCOM', 'Sorsogon City', '+639875987782', 'Charles Celemente'),
(5, 'Lumber Supply', 'Legazpi City', '+639098789462', 'Richard Yap'),
(6, 'Hollow Blocks', 'Guinlajon Sorsogon City', '09107876566', 'RLCS CHB MAKER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin123', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `lose`
--
ALTER TABLE `lose`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `other_ex`
--
ALTER TABLE `other_ex`
  ADD PRIMARY KEY (`transaction_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `other_ex`
--
ALTER TABLE `other_ex`
  MODIFY `transaction_number` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
