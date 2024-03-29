-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 02:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`transaction_id`, `date`, `cmonth`, `cyear`, `name`, `invoice`, `amount`, `remarks`, `balance`) VALUES
(12, '09/17/2018', 'September', '2018', 'RS-03932336', 'IN-32723234', '2100', 'PAID', 0),
(13, '09/17/2019', 'September', '2019', 'RS-30092732', 'IN-93002202', '3150', 'PAID', 0),
(14, '10/04/2019', 'October', '2019', 'RS-2302523', 'IN-33700233', '235', 'paid', 0),
(15, '10/07/2019', 'October', '2019', 'RS-0304593', 'IN-033302', '1050', 'Paid!', 0),
(16, '10/07/2019', 'October', '2019', 'RS-0832', 'IN-5702222', '100', 'Partial', 135),
(17, '10/08/2019', 'October', '2019', 'RS-0832', 'IN-0302323', '135', 'Paid na', 0),
(18, '10/08/2019', 'October', '2019', 'RS-0304592', 'IN-030330', '50', 'Partial', 1000),
(19, '10/08/2019', 'October', '2019', 'RS-0304592', 'IN-335736', '500', '10/08/2019', 500),
(20, '10/09/2019', 'October', '2019', 'RS-333006', 'IN-8000', '21000', 'Paid', 0),
(21, '10/23/2019', 'October', '2019', 'RS-32230320', 'IN-2203733', '5250', 'PAID', 0),
(22, '12/11/2019', 'December', '2019', 'RS-0344', 'IN-22043236', '14000', 'Balance 700', 700),
(23, '12/11/2019', 'December', '2019', 'RS-42250223', 'IN-32333354', '1000', 'Balance 50', 50),
(24, '12/11/2019', 'December', '2019', 'RS-33332333', 'IN-4263032', '235', 'paid', 0),
(25, '12/22/2019', 'December', '2019', 'RS-0283522', 'IN-423220', '1170', 'paid', 0),
(26, '12/22/2019', 'December', '2019', 'RS-330902', 'IN-373232', '39200', 'PAID', 0),
(27, '12/23/2019', 'December', '2019', 'RS-0220235', 'IN-39322333', '21000', 'PAID', 0),
(28, '12/23/2019', 'December', '2019', 'RS-3225720', 'IN-222023', '5250', 'PAID', 0),
(29, '12/26/2019', 'December', '2019', 'RS-233237', 'IN-20933362', '2000', 'Paid', -825),
(30, '12/27/2019', 'December', '2019', 'RS-0344', 'IN-303724', '700', 'paid', 0),
(31, '12/28/2019', 'December', '2019', 'RS-333052', 'IN-0532282', '6550', 'PAID', 0),
(32, '01/03/2020', 'January', '2020', 'RS-222233', 'IN-3022233', '1000', 'Paid', 0),
(33, '01/03/2020', 'January', '2020', 'RS-392362', 'IN-2020229', '234', 'Balance', 1),
(34, '01/03/2020', 'January', '2020', 'RS-392362', 'IN-33233', '1', 'Paid', 0),
(35, '01/04/2020', 'January', '2020', 'RS-0833223', 'IN-2023033', '11550', 'PAID', 0),
(36, '01/04/2020', 'January', '2020', 'RS-42250223', 'IN-03347202', '50', 'PAID', 0),
(37, '01/31/2020', 'January', '2020', 'RS-00323033', 'IN-32223533', '235', '23', 0);

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `first_name`, `middle_name`, `last_name`, `month`, `year`, `date`, `amount`) VALUES
(3, 'Project Rangas', 'Rangas, Guinlajon, Sorsogon City', '09129078855', '00001', 'Project Rangas', '', '', '', '', '', ''),
(4, 'Project Gabao  ', 'Bacon Sorsogon', '09109890043', '00002', 'Project Gabao', '', '', '', '', '', ''),
(9, 'Project Pamurayan  ', 'Pamurayan Sorsogon City', '09123827472', '00003', 'Project Pamurayan', '', '', '', '', '', ''),
(10, 'Project Elementary School  ', 'Guinlajon Sorsogon City', '', '00004', 'Project Elementary School', '', '', '', '', '', ''),
(11, 'Barangay Hall Guinlajon', 'Guinlajon', '09568678865', '00005', '', '', '', '', '', '', ''),
(12, 'Pamurayan River Control', 'Pamurayan Sorsogon City', '0910767528445', '004', 'Pamurayan River Control', '', '', '', '', '', '');

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

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`salary_id`, `month`, `year`, `dayNumber`, `date`, `fdate`, `amount`, `employeeName`, `cashier`) VALUES
(4, 'December', '2019', '', '2019-12-23', '', '25555', 'Project Rangas', 'Mark Jason Lagco'),
(5, 'December', '2018', '', '2018-12-24', '', '300000', 'Project Gabao  ', 'Mark Jason Lagco'),
(6, 'December', '2017', '', '2017-12-24', '', '50000', 'Project Rangas', 'Mark Jason Lagco'),
(7, 'April', '2019', '', '2019-04-19', '', '20000', 'Project Gabao  ', 'Mark Jason Lagco'),
(8, 'April', '2018', '', '2018-04-19', '', '300000', 'Project Rangas', 'Mark Jason Lagco'),
(9, 'December', '2019', '', '2019-12-24', '', '450000', 'Project Rangas', 'Mark Jason Lagco'),
(10, 'December', '2019', '-24', '2019-12-24', '', '255', 'Project Gabao  ', 'Cashier'),
(11, 'December', '2019', '26', '2019-12-26', '', '2555', 'Project Gabao  ', 'Cashier'),
(12, 'December', '2019', '24', '2019-12-24', '12/24/2019', '255212', 'Project Gabao  ', 'Cashier'),
(13, 'December', '2019', '23', '2019-12-23', '12/23/2019', '900', 'Project Pamurayan  ', 'Cashier'),
(14, 'December', '2019', '23', '2019-12-23', '12/23/2019', '268000', 'Project Elementary School', 'Mark Jason Lagco'),
(15, 'December', '2019', '26', '2019-12-26', '12/26/2019', '150000', 'Project Pamurayan  ', 'Mark Jason Lagco'),
(16, 'December', '2019', '27', '2019-12-27', '12/27/2019', '260000', 'Project Gabao  ', 'Mark Jason Lagco'),
(17, 'November', '2019', '21', '2019-11-21', '11/21/2019', '450000', 'Project Gabao  ', 'Mark Jason Lagco'),
(18, 'October', '2019', '15', '2019-10-15', '10/15/2019', '600000', 'Project Gabao  ', 'Mark Jason Lagco'),
(19, 'September', '2019', '21', '2019-09-21', '09/21/2019', '300000', 'Project Gabao  ', 'Mark Jason Lagco'),
(20, 'August', '2019', '17', '2019-08-17', '08/17/2019', '250000', 'Project Gabao  ', 'Mark Jason Lagco'),
(21, 'July', '2019', '13', '2019-07-13', '07/13/2019', '800000', 'Project Gabao  ', 'Mark Jason Lagco'),
(22, 'June', '2019', '15', '2019-06-15', '06/15/2019', '300000', 'Project Gabao  ', 'Mark Jason Lagco'),
(23, 'May', '2019', '18', '2019-05-18', '05/18/2019', '700000', 'Project Gabao  ', 'Mark Jason Lagco'),
(24, 'March', '2019', '17', '2019-03-17', '03/17/2019', '350000', 'Project Gabao  ', 'Mark Jason Lagco'),
(25, 'January', '2019', '19', '2019-01-19', '01/19/2019', '342000', 'Project Gabao  ', 'Mark Jason Lagco'),
(26, 'February', '2019', '16', '2019-02-16', '02/16/2019', '332678', 'Project Gabao  ', 'Mark Jason Lagco'),
(27, 'December', '2019', '28', '2019-12-28', '12/28/2019', '600000', 'Project Gabao  ', 'Mark Jason Lagco'),
(28, 'December', '2019', '28', '2019-12-28', '12/28/2019', '4000', 'Project Rangas', 'Cashier'),
(29, 'December', '2019', '27', '2019-12-27', '12/27/2019', '450000', 'Project Pamurayan  ', 'Cashier'),
(30, 'January', '2020', '02', '2020-01-02', '01/02/2020', '450000', 'Project Gabao  ', 'Cashier');

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

--
-- Dumping data for table `lose`
--

INSERT INTO `lose` (`p_id`, `product_code`, `product_name`, `description_name`, `amount_lose`, `qty`, `cost`, `date`, `category`, `exdate`, `lmonth`, `lyear`) VALUES
(5, 'P-22520330', 'Republic Cement', 'Republic', '470', '2', '235', '09-18-2018', 'Cement', '0', 'September', '2018'),
(6, 'P-22520330', 'Republic Cement', 'Republic', '5875', '5', '1175', '08-20-2019', 'Cement', '0', 'August', '2019'),
(7, 'P-0303532', 'Gravel', 'G1', '1050', '1', '1050', '09-20-2019', 'Gravel', '', 'September', '2019'),
(8, 'P-0322223', 'Black Sand', 'Black Sand', '3500', '5', '700', '10-09-2019', 'Black Sand', '', 'October', '2019');

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

--
-- Dumping data for table `other_ex`
--

INSERT INTO `other_ex` (`transaction_number`, `type`, `Date`, `description`, `amount`, `omonth`, `oyear`) VALUES
(1, 'Owner Drawing', '01/28/2020', 'House Tiles', '20453.70', 'January', '2020'),
(2, 'Maintenance', '01/28/2019', 'Howo Tire', '4532.50', 'January', '2019'),
(3, 'Snacks / Foods', '01/28/2020', 'Afternoon Snacks', '230', 'January', '2020');

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
(14, 'P-0303532', 'Gravel', 'G1', 'Per m3', '500', 530500, '1000', 'Legazpi', 1026, 'Gravel', '2019-09-16', ''),
(16, 'P-22520330', 'Republic Cement', 'Republic', 'Per Pieces', '225', 413550, '235', 'SORCOM', 1831, 'Cement', '2019-09-17', '2020-01-04'),
(17, 'P-0322223', 'Black Sand', 'Black Sand', 'Per m3', '300', 0, '700', 'Legazpi', 69, 'Black Sand', '2019-10-09', ''),
(23, 'P-233203', 'Portland Premium', 'APO', 'Per Pieces', '215', 0, '230', 'SORCOM', 453, 'Cement', '2019-12-27', ''),
(24, 'P-84022', 'Legazpi Sand', 'Filtered Sand', 'Per m3', '300', 67500, '700', 'Legazpi', 176, 'Black Sand', '2020-01-03', ''),
(25, 'P-26232309', 'Concrete Hallow Blocks', 'CHB 4', 'Per Pieces', '7', 87500, '10', 'Hollow Blocks', 12394, 'Gravel', '', '2020-01-04');

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

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date_order`, `suplier`, `date_deliver`, `p_name`, `qty`, `cost`, `status`, `remark`, `rmonth`, `ryear`, `fdate`) VALUES
(10, 'PO-32036', '2019-09-16', 'Legazpi', '2019-09-16', 'P-0303532', '100', '105000', 'Received', ' ', '', '', ''),
(12, 'PO-230227', '2019-10-09', 'Legazpi', '2019-10-09', 'P-0322223', '20', '14000', 'Received', ' Received', '', '', ''),
(18, 'PO-42230', '2019-10-09', 'Legazpi', '2019-10-09', 'P-0322223', '10', '3000', 'Received', ' Received', '', '', ''),
(24, 'PO-33722723', '2019-10-09', 'Legazpi', '2019-10-09', 'P-0322223', '1', '300', 'Returned', ' ', '', '', ''),
(25, 'PO-23033522', '2019-10-09', 'Legazpi', '', 'P-0322223', '1', '300', 'Returned', ' ', '', '', ''),
(26, 'PO-23392', '2019-10-09', 'Legazpi', '2019-10-09', 'P-0303532', '1', '500', 'Received', ' ', '', '', ''),
(27, 'PO-380220', '2019-10-09', 'Legazpi', '2019-10-09', 'P-0303532', '1', '500', 'Returned', ' ', '', '', ''),
(28, 'PO-20222006', '2019-10-09', 'SORCOM', '', 'P-22520330', '1', '225', 'Returned', ' Defective', '', '', ''),
(29, 'PO-73934833', '2019-10-09', 'SORCOM', '2019-10-09', 'P-22520330', '100', '22500', 'Received', ' All Good', '', '', ''),
(30, 'PO-320003', '2019-10-09', 'Hollow Blocks', '2019-10-09', 'P-53320', '500', '2500', 'Received', ' ', '', '', ''),
(31, 'PO-003230', '2019-10-10', 'Hollow Blocks', '2019-10-10', 'P-53320', '500', '2500', 'Cancelled', ' ', '', '', ''),
(32, 'PO-3083', '2019-10-10', 'Hollow Blocks', '2019-10-10', 'P-53320', '500', '2500', 'Cancelled', ' ', '', '', ''),
(34, 'PO-325322', '2019-10-16', 'Hollow Blocks', '2019-10-16', 'P-53320', '1000', '5000', 'Returned', ' ', '', '', ''),
(35, 'PO-243220', '2019-10-21', 'Legazpi', '', 'P-0303532', '50', '25000', 'Returned', ' ', '', '', ''),
(36, 'PO-2203322', '2019-10-21', 'SORCOM', '', 'P-22520330', '15', '3375', 'Returned', ' ', '', '', ''),
(37, 'PO-30220720', '2019-10-21', 'Legazpi', '', 'P-0303532', '15', '7500', 'Returned', ' ', '', '', ''),
(38, 'PO-33200343', '2019-10-21', 'Legazpi', '', 'P-0303532', '5', '2500', 'Returned', ' ', '', '', ''),
(39, 'PO-33243', '2019-10-21', 'Legazpi', '', 'P-0303532', '15', '7500', 'Returned', ' ', '', '', ''),
(40, 'PO-3032800', '2019-10-21', 'Legazpi', '', 'P-0303532', '5', '2500', 'Returned', ' ', '', '', ''),
(41, 'PO-0030832', '2019-10-21', 'Legazpi', '', 'P-0303532', '15', '7500', 'Returned', ' ', 'October', '2019', '10-21-2019'),
(42, 'PO-66220', '2019-10-21', 'Legazpi', '', 'P-0303532', '2', '1000', 'Returned', ' ', 'October', '2019', '10-21-2019'),
(43, 'PO-0692242', '2019-10-21', 'Legazpi', '', 'P-0303532', '1', '500', 'Returned', ' ', 'October', '2019', '10/21/2019'),
(44, 'PO-8362333', '2019-10-21', 'Legazpi', '', 'P-0303532', '1', '500', 'Returned', ' ', 'October', '2019', '10/21/2019'),
(45, 'PO-26342778', '2019-12-23', 'Legazpi', '2019-12-23', 'P-0322223', '50', '15000', 'Received', ' No Issue', 'December', '2019', '12/23/2019'),
(46, 'PO-0303022', '2019-12-27', 'SORCOM', '2019-12-27', 'P-22520330', '2', '450', 'Cancelled', ' ', 'December', '2019', '12/27/2019'),
(47, 'PO-2222027', '2019-12-28', 'SORCOM', '2019-12-31', 'P-22520330', '1000', '225000', 'Received', ' 3 sack defective ', 'December', '2019', '12/28/2019'),
(48, 'PO-3200032', '2020-01-03', 'Legazpi', '2020-01-03', 'P-84022', '100', '30000', 'Received', ' ', 'January', '2020', '01/03/2020'),
(49, 'PO-032232', '2020-01-03', 'Legazpi', '', 'P-84022', '25', '7500', 'Received', ' ', 'January', '2020', '01/03/2020'),
(50, 'PO-33343', '2020-01-04', 'Hollow Blocks', '2020-01-04', 'P-26232309', '500', '3500', 'Received', ' ', 'January', '2020', '01/04/2020'),
(51, 'PO-3473035', '2020-01-04', 'SORCOM', '2020-01-04', 'P-22520330', '500', '112500', 'Received', '', 'January', '2020', '01/04/2020'),
(52, 'PO-2036303', '2020-01-04', 'Hollow Blocks', '2020-01-04', 'P-26232309', '5000', '35000', 'Received', 'PAID', 'January', '2020', '01/04/2020'),
(53, 'PO-2322', '2020-01-04', 'Hollow Blocks', '2020-01-04', 'P-26232309', '2000', '14000', 'Received', '', 'January', '2020', '01/04/2020'),
(54, 'PO-36032334', '2020-01-04', 'SORCOM', '2020-01-04', 'P-22520330', '300', '67500', 'Received', 'PAID', 'January', '2020', '01/04/2020'),
(55, 'PO-0924230', '2020-01-06', 'Legazpi', '', 'P-0303532', '200', '100000', 'Received', 'PAID', 'January', '2020', '01/06/2020');

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

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`, `status`, `date`) VALUES
(10, 'P-0303532', 100, '105000', 'PO-32036', 'Received', '2019-09-16'),
(11, 'P-0303532', 0, '0', 'PO-223342', 'pending', '2019-10-08'),
(12, 'P-0322223', 20, '14000', 'PO-230227', 'Received', '2019-10-09'),
(13, 'P-0303532', 0, '0', 'PO-7222390', 'pending', '2019-10-09'),
(14, 'P-0303532', 1, '1050', 'PO-7222390', 'pending', '2019-10-09'),
(15, 'P-0322223', 10, '7000', 'PO-23032282', 'pending', '2019-10-09'),
(16, 'P-0303532', 10, '10500', 'PO-30720339', 'pending', '2019-10-09'),
(17, 'P-0322223', 10, '7000', 'PO-30720339', 'pending', '2019-10-09'),
(18, 'P-0322223', 10, '3000', 'PO-42230', 'Select', '2019-10-09'),
(19, 'P-0303532', 1, '500', 'PO-42230', 'pending', '2019-10-09'),
(20, 'P-0322223', 1, '300', 'PO-333253', 'pending', '2019-10-09'),
(21, 'P-0303532', 1, '500', 'PO-333253', 'pending', '2019-10-09'),
(22, 'P-0303532', 1, '500', 'PO-3028206', 'Returned', '2019-10-09'),
(23, 'P-0322223', 1, '300', 'PO-322209', 'Returned', '2019-10-09'),
(24, 'P-0322223', 1, '300', 'PO-33722723', 'Returned', '2019-10-09'),
(25, 'P-0322223', 1, '300', 'PO-23033522', 'Returned', '2019-10-09'),
(26, 'P-0303532', 1, '500', 'PO-23392', 'Received', '2019-10-09'),
(27, 'P-0303532', 1, '500', 'PO-380220', 'Returned', '2019-10-09'),
(28, 'P-22520330', 1, '225', 'PO-20222006', 'Returned', '2019-10-09'),
(29, 'P-22520330', 100, '22500', 'PO-73934833', 'Received', '2019-10-09'),
(30, 'P-53320', 500, '2500', 'PO-320003', 'Received', '2019-10-09'),
(31, 'P-53320', 500, '2500', 'PO-003230', 'Cancelled', '2019-10-10'),
(32, 'P-53320', 500, '2500', 'PO-3083', 'Cancelled', '2019-10-10'),
(33, 'P-53320', 1000, '5000', 'PO-03003', 'pending', '2019-10-16'),
(34, 'P-53320', 1000, '5000', 'PO-325322', 'Returned', '2019-10-16'),
(35, 'P-0303532', 50, '25000', 'PO-243220', 'Returned', '2019-10-21'),
(36, 'P-22520330', 15, '3375', 'PO-2203322', 'Returned', '2019-10-21'),
(37, 'P-0303532', 15, '7500', 'PO-30220720', 'Returned', '2019-10-21'),
(38, 'P-0303532', 5, '2500', 'PO-33200343', 'Returned', '2019-10-21'),
(39, 'P-0303532', 15, '7500', 'PO-33243', 'Returned', '2019-10-21'),
(40, 'P-0303532', 5, '2500', 'PO-3032800', 'Returned', '2019-10-21'),
(41, 'P-0303532', 15, '7500', 'PO-0030832', 'Returned', '2019-10-21'),
(42, 'P-0303532', 2, '1000', 'PO-66220', 'Returned', '2019-10-21'),
(43, 'P-0303532', 1, '500', 'PO-0692242', 'Returned', '2019-10-21'),
(44, 'P-0303532', 1, '500', 'PO-8362333', 'Returned', '2019-10-21'),
(45, 'P-0322223', 50, '15000', 'PO-26342778', 'Received', '2019-12-23'),
(46, 'P-22520330', 2, '450', 'PO-0303022', 'Cancelled', '2019-12-27'),
(47, 'P-22520330', 1000, '225000', 'PO-2222027', 'Received', '2019-12-28'),
(48, 'P-84022', 100, '30000', 'PO-3200032', 'Received', '2020-01-03'),
(49, 'P-84022', 25, '7500', 'PO-032232', 'Received', '2020-01-03'),
(50, 'P-26232309', 500, '3500', 'PO-33343', 'Received', '2020-01-04'),
(51, 'P-22520330', 500, '112500', 'PO-3473035', 'Received', '2020-01-04'),
(52, 'P-26232309', 5000, '35000', 'PO-2036303', 'Received', '2020-01-04'),
(53, 'P-26232309', 2000, '14000', 'PO-2322', 'Received', '2020-01-04'),
(54, 'P-22520330', 300, '67500', 'PO-36032334', 'Received', '2020-01-04'),
(55, 'P-0303532', 200, '100000', 'PO-0924230', 'Received', '2020-01-06');

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `due_date`, `name`, `balance`, `total_amount`, `cash`, `month`, `year`, `p_amount`, `vat`, `address`, `contact_number`, `profit`) VALUES
(59, 'RS-072302', 'Cashier', '08/16/2018', 'cash', '1050', '', '', '', '', '1050', 'August', '2018', '1050', '126', 'asd', '09609289998', 0),
(60, 'RS-3403238', 'Cashier', '09/17/2017', 'credit', '1050', 'PAID', 'Mark Jason Lagco', '', '', '1050', 'September', '2017', '1050', '126', 'Guinlajon, Sorsogon City', '09509269930', 0),
(61, 'RS-223602', 'Cashier', '09/17/2019', 'credit', '2350', 'PAID', 'Kenneth Solomon', '', '', '2400', 'September', '2019', '2350', '282', 'Seabreeze Homes, Sorsogon City', '09509896634', 0),
(62, 'RS-03932336', 'Cashier', '09/17/2017', 'credit', '2100', 'PAID', 'Project Rangas  ', '0', '2100', '', 'September', '2017', '2100', '252', 'Rangas, Guinlajon Sorsogon City', '09129078855', 0),
(63, 'RS-30092732', 'Cashier', '09/17/2016', 'credit', '3150', 'PAID', 'Project Rangas  ', '0', '3150', '', 'September', '2016', '3150', '378', 'Guinlajon', '09129078855', 0),
(65, 'RS-222063', 'Cashier', '02/18/2019', 'cash', '235', '', 'Feb', '', '', '500', 'February', '2019', '235', '28.2', 'Sorsogon City', '09509897764', 0),
(66, 'RS-23333033', 'Cashier', '03/18/2019', 'cash', '1050', '', 'Mar', '', '', '2000', 'March', '2019', '1050', '126', 'Sorsogon City', '09107895623', 0),
(67, 'RS-060222', 'Cashier', '04/18/2019', 'cash', '1050', '', 'April', '', '', '2000', 'April', '2019', '1050', '126', 'Sorsogon City', '09998786741', 0),
(68, 'RS-52372043', 'Cashier', '05/18/2019', 'cash', '1050', '', 'May', '', '', '1100', 'May', '2019', '1050', '126', 'Sorsogon City', '09108975502', 0),
(69, 'RS-9486230', 'Cashier', '06/18/2019', 'cash', '1050', '', 'Jun', '', '', '1100', 'June', '2019', '1050', '126', 'Sorsogon City', '09109875593', 0),
(70, 'RS-6283492', 'Cashier', '07/18/2019', 'cash', '1050', '', 'July', '', '', '1100', 'July', '2019', '1050', '126', 'Sorsogon City', '09199086273', 0),
(71, 'RS-2322097', 'Cashier', '10/18/2019', 'cash', '1285', '', 'Oct', '', '', '1300', 'October', '2019', '235', '28.2', 'Sorsogon City', '09109897742', 0),
(72, 'RS-322203', 'Cashier', '11/18/2019', 'cash', '1285', '', 'Nov', '', '', '1300', 'November', '2019', '235', '28.2', 'Sorsogon City', '09109897734', 0),
(73, 'RS-0533203', 'Cashier', '12/18/2019', 'cash', '2225', '', 'Dec', '', '', '2300', 'December', '2019', '1175', '141', 'Sorsogon City', '09209894475', 0),
(74, 'RS-022303', 'Cashier', '01/18/2019', 'cash', '10500', '', 'Jan', '', '', '11000', 'January', '2019', '10500', '1260', 'Sorsogon City', '09108931098', 0),
(75, 'RS-0229293', 'Cashier', '09/18/2019', 'cash', '1285', '', 'Mark Jason Lagco', '', '', '1290', 'September', '2019', '235', '28.2', 'Guinlajon, Sorsogon City', '09509269930', 0),
(76, 'RS-04263', 'Cashier', '09/18/2019', 'cash', '1175', '', 'Alvin Joseph Lagco', '', '', '1200', 'September', '2019', '1175', '141', 'Guinlajon,  Sorsogon City', '09206934456', 0),
(78, 'RS-272500', 'Cashier', '09/20/2019', 'cash', '5250', '', 'Project Rangas  ', '', '', '5300', 'September', '2019', '5250', '630', 'Guinlajon, Sorsogon City', '09509898847', 0),
(79, 'RS-320973', 'Cashier', '09/20/2019', 'cash', '', '', 'Project Rangas  ', '3150', '3150', '', 'September', '2019', '3150', '378', 'Guinlajon, Sorsogon City', '09109879932', 0),
(80, 'RS-3037330', 'Cashier', '09/21/2019', 'cash', '21000', '', 'Mark Jason Lagco', '', '', '21000', 'September', '2019', '21000', '2520', 'Guinlajon, Sorsogon City', '09109879334', 0),
(81, 'RS-433392', 'Cashier', '09/21/2019', 'cash', '2100', '', 'Project Rangas  ', '', '', '2100', 'September', '2019', '2100', '252', 'Guinlajon, Sorsogon City', '09508983324', 0),
(82, 'RS-0304592', 'Cashier', '10/08/2019', 'credit', '550', '10/08/2019', 'Kenneth Solomon', '500', '1050', '', 'October', '2019', '1050', '126', 'Seabreeze', '09302918293', 0),
(83, 'RS-0832', 'Cashier', '10/08/2019', 'credit', '235', 'paid', 'Kenneth Lagco', '0', '235', '', 'October', '2018', '235', '28.2', 'Yeah', '09203920192', 0),
(84, 'RS-2302523', 'Cashier', '10/04/2019', 'credit', '235', 'paid', 'Lagco Solomon', '0', '235', '', 'October', '2019', '235', '28.2', 'Macabog', '09293929293', 0),
(86, 'RS-0304593', 'Cashier', '10/07/2019', 'credit', '1050', 'paid', 'Kenneth Pogi', '0', '1050', '', 'October', '2019', '1050', '126', 'Seabreeze', '09302918293', 0),
(87, 'RS-3350', 'Cashier', '10/08/2019', 'cash', '5250', '', '', '', '', '5300', 'October', '2019', '5250', '630', 'Guinlajon, Sorsogon City', '09509269930', 0),
(88, 'RS-72522242', 'Cashier', '10/08/2019', 'cash', '6300', '', '', '', '', '7000', 'October', '2019', '6300', '756', 'Guinlajon, Sorsogon City', '09509269930', 0),
(89, 'RS-237900', 'Cashier', '10/09/2019', 'cash', '1175', '', 'Mark Jason Lagco', '', '', '1200', 'October', '2019', '1175', '141', 'Guinlajon, Sorsogon City', '09509269930', 0),
(91, 'RS-333006', 'Cashier', '10/09/2019', 'credit', '21000', 'Paid', 'Project Rangas', '0', '21000', '', 'October', '2019', '21000', '2520', 'Guinlajon, Sorsogon City', '09509269930', 0),
(92, 'RS-38323623', 'Cashier', '10/09/2019', 'cash', '1050', '', 'Mark Jason Lagco', '', '', '1050', 'October', '2019', '1050', '126', 'Guinlajon, Sorsogon City', '09509269930', 0),
(93, 'RS-33253', 'Cashier', '10/09/2019', 'cash', '3500', '', 'Kenneth Solomon', '', '', '3500', 'October', '2019', '3500', '420', 'Seabreeze, Sorsogon City', '09109894403', 0),
(94, 'RS-3230902', 'Cashier', '10/09/2019', 'cash', '5150', '', 'Mark Jason Lagco', '', '', '5200', 'October', '2019', '2350', '282', 'Guinlajon, Sorsogon City', '09509269930', 0),
(95, 'RS-2023627', 'Cashier', '10/23/2019', 'cash', '21000', '', 'Mark Jason Lagco', '', '', '21000', 'October', '2019', '21000', '2520', 'Guinlajon, Sorsogon City', '09509269930', 0),
(96, 'RS-32230320', 'Cashier', '10/23/2019', 'credit', '5250', 'PAID', 'Mark Jason Lagco', '0', '5250', '', 'October', '2019', '5250', '630', 'Guinlajon, Sorsogon City', '09509269930', 0),
(97, 'RS-7383400', 'Cashier', '10/26/2019', 'cash', '9000', '', 'Mark Jason Lagco', '', '', '9000', 'October', '2019', '3500', '420', 'Guinlajon, Sorsogon City', '09509269930', 0),
(98, 'RS-3379803', 'Cashier', '10/26/2019', 'credit', '', '2019-10-28', 'Mark Jason Lagco', '8300', '8300', '', 'October', '2019', '2800', '336', 'Guinlajon, Sorsogon City', '09509269930', 0),
(99, 'RS-0344', 'Cashier', '12/27/2019', 'credit', '14700', 'paid', 'Project Rangas', '0', '14700', '', 'December', '2019', '14700', '1764', 'Guinlajon Sorsogon City', '09509269930', 0),
(100, 'RS-42250223', 'Cashier', '01/04/2020', 'credit', '1050', 'PAID', 'Project Rangas', '0', '1050', '', 'December', '2019', '1050', '126', '', '', 0),
(101, 'RS-00323033', 'Cashier', '01/31/2020', 'credit', '235', '23', 'Project Rangas', '0', '235', '', 'December', '2019', '235', '28.2', '', '', 0),
(102, 'RS-230032', 'Cashier', '12/11/2019', 'cash', '1050', '', 'Project Gabao', '', '', '2500', 'December', '2019', '1050', '126', '', '', 0),
(103, 'RS-33332333', 'Cashier', '12/11/2019', 'credit', '235', 'paid', 'Project Gabao', '0', '235', '', 'December', '2019', '235', '28.2', '', '', 0),
(104, 'RS-0283522', 'Cashier', '12/22/2019', 'credit', '1170', 'paid', 'Mark Jason Lagco', '0', '1170', '', 'December', '2019', '235', '28.2', 'Guinlajon Sorsogon City', '09509269930', 0),
(105, 'RS-2335532', 'Cashier', '12/22/2019', 'cash', '1050', '', 'Project Gabao', '', '', '1050', 'December', '2019', '1050', '126', 'Guinlajon Sorsogon City', '09509269930', 0),
(106, 'RS-330902', 'Cashier', '12/22/2019', 'credit', '39200', 'PAID', 'Project Gabao', '0', '39200', '', 'December', '2019', '39200', '4704', 'Guinlajon Sorsogon City', '09509269930', 0),
(107, 'RS-0220235', 'Cashier', '12/23/2019', 'credit', '21000', 'PAID', 'Project Gabao', '0', '21000', '', 'December', '2019', '21000', '2520', 'Bacon Sorsogon City', '09509269930', 0),
(108, 'RS-02302020', 'Cashier', '12/22/2019', 'cash', '1050', '', 'Mark Jason Lagco', '', '', '1200', 'December', '2019', '1050', '126', 'Guinlajon, Sorsogon City', '09509269930', 0),
(109, 'RS-3225720', 'Cashier', '12/23/2019', 'credit', '5250', 'PAID', 'Project Gabao', '0', '5250', '', 'December', '2019', '5250', '630', 'Bacon Sorsogon', '09409098832', 0),
(110, 'RS-0833223', 'Cashier', '01/04/2020', 'credit', '11550', 'PAID', 'Project Gabao', '0', '11550', '', 'December', '2019', '11550', '1386', 'Bacon Sorsogon', '09409093376', 0),
(111, 'RS-2323333', 'Mark Jason Lagco', '12/23/2019', 'cash', '10500', '', 'Project Gabao', '', '', '10500', 'December', '2019', '10500', '1260', 'Bacon Sorsogon', '09205369985', 0),
(112, 'RS-336330', 'Mark Jason Lagco', '12/23/2019', 'cash', '5720', '', 'Miguel Lagco', '', '', '6000', 'December', '2019', '470', '56.4', 'Gunlajon Sorsogon city', '09738394743', 0),
(113, 'RS-2333793', 'Mark Jason Lagco', '12/26/2019', 'cash', '11450', '', 'Jorge Michael Lagco', '', '', '12000', 'December', '2019', '4900', '588', 'Cabuyao City, Laguna', '09609098731', 0),
(114, 'RS-233237', 'Mark Jason Lagco', '12/26/2019', 'credit', '2000', 'Paid', 'Jorge Michael Lagco', '-825', '1175', '', 'December', '2019', '1175', '141', 'Pangpang , Sorsogon city', '09106932256', 0),
(115, 'RS-3736495', 'Mark Jason Lagco', '12/27/2019', 'cash', '4200', '', 'Frederick Lagco', '', '', '4200', 'December', '2019', '4200', '504', 'Guinlajon, Sorsogon City', '09109890045', 0),
(116, 'RS-360932', 'Cashier', '01/27/2020', 'cash', '2300', '', 'Mark Jason Lagco', '', '', '2500', 'January', '2020', '2300', '276', 'Pruok 3, Guinlajon Sorsogon City', '09509269930', 0),
(117, 'RS-233232', 'Cashier', '01/27/2020', 'cash', '470', '', 'Mark Jason Lagco', '', '', '500', 'January', '2020', '470', '56.4', 'Pruok 3, Guinlajon Sorsogon City', '09509269930', 0),
(118, 'RS-333052', 'Cashier', '12/28/2019', 'credit', '6550', 'PAID', 'Barangay Hall Guinlajon', '0', '6550', '', 'December', '2019', '2350', '282', 'Guinlajon, Sorsogon City', '09101066635', 0),
(119, 'RS-3936273', 'Cashier', '12/28/2019', 'credit', '', '2020-01-01', 'Mark Jason Lagco', '1175', '1175', '', 'December', '2019', '1175', '141', 'Guinlajon, Sorsogon City', '0957876654', 0),
(120, 'RS-225365', 'Mark Jason Lagco', '12/28/2019', 'cash', '10500', '', 'Mark Jason Lagco', '', '', '10500', 'December', '2019', '3450', '414', 'Pruok 3, Guinlajon Sorsogon City', '09509269930', 0),
(121, 'RS-33000', 'Cashier', '01/03/2020', 'cash', '1000', '', 'Kenneth', '', '', '3000', 'January', '2020', '1000', '120', 'Seabreeze', '12345', 0),
(122, 'RS-443033', 'Cashier', '01/03/2020', 'cash', '1000', '', 'Kenneth', '', '', '3000', 'January', '2020', '1000', '120', 'Seabreeze', '1234', 0),
(123, 'RS-222233', 'Cashier', '01/03/2020', 'credit', '1000', 'Paid', 'Kenneth', '0', '1000', '', 'January', '2020', '1000', '120', 'Seabreeze', '123123213', 0),
(124, 'RS-392362', 'Cashier', '01/03/2020', 'credit', '235', 'Paid', 'Kenneth', '0', '235', '', 'January', '2020', '235', '28.2', 'Seabreeze', '123123', 0),
(125, 'RS-43332003', 'Cashier', '01/03/2020', 'cash', '3500', '', 'Solomon', '', '', '4000', 'January', '2020', '300', '36', 'Seabreeze', '123123', 0),
(126, 'RS-052347', 'Cashier', '01/03/2020', 'cash', '3500', '', 'Kenneth', '', '', '3500', 'January', '2020', '300', '36', 'Seabreeze', '123', 0),
(127, 'RS-098307', 'Cashier', '01/03/2020', 'cash', '3500', '', 'Kenneth', '', '', '3500', 'January', '2020', '300', '36', 'Seabreeze', '123123', 0),
(128, 'RS-2302082', 'Cashier', '01/03/2020', 'cash', '3735', '', 'Solomon', '', '', '4000', 'January', '2020', '<br /><b>Notice</b>:  Undefine', '0', 'Seabreeze', '1231231', 2010),
(129, 'RS-2033322', 'Cashier', '01/03/2020', 'cash', '4675', '', 'Lim', '', '', '5000', 'January', '2020', '225', '27', 'Seabreeze', '12312312', 2050),
(130, 'RS-04200003', 'Cashier', '01/03/2020', 'cash', '4200', '', 'Lim2', '', '', '4500', 'January', '2020', '300', '36', 'Seabreeze', '123123', 2400),
(131, 'RS-3622203', 'Cashier', '01/04/2020', 'cash', '14000', '', 'Frederick Lagco', '', '', '14000', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '09509289984', 8000),
(132, 'RS-223002', 'Cashier', '01/04/2020', 'cash', '7400', '', 'Mark Jason Lagco', '', '', '7400', 'January', '2020', '500', '60', 'Pruok 3, Guinlajon Sorsogon City', '09509269930', 2850),
(133, 'RS-2206223', 'Cashier', '01/04/2020', 'cash', '1000', '', 'Mark Jason Lagco', '', '', '1000', 'January', '2020', '500', '60', 'Guinlajon, Sorsogon City', '09509269930', 500),
(134, 'RS-223234', 'Cashier', '01/04/2020', 'cash', '1000', '', 'Mark Jason Lagco', '', '', '1000', 'January', '2020', '7', '0.84', 'Guinlajon, Sorsogon City', '09509269930', 300),
(135, 'RS-3320333', 'Cashier', '01/04/2020', 'cash', '3500', '', 'Mark Jason Lagco', '', '', '4000', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '09509269930', 2000),
(136, 'RS-33832930', 'Cashier', '01/06/2020', 'cash', '50', '', 'Kenneth', '', '', '100', 'January', '2020', '7', '0.84', 'Seabreeze', '12312321', 15),
(137, 'RS-27007382', 'Cashier', '01/22/2020', 'cash', '235', '', 'Mark Jason Lagco', '', '', '500', 'January', '2020', '225', '27', 'Guinlajon, Sorsogon City', '09509269930', 10),
(138, 'RS-2203004', 'Cashier', '01/22/2020', 'cash', '1000', '', 'Kenneth', '', '', '2000', 'January', '2020', '500', '60', 'Seabreeze', '123', 500),
(139, 'RS-8364022', 'Cashier', '01/22/2020', 'cash', '1000', '', 'Kenneth', '', '', '3000', 'January', '2020', '500', '60', 'Seabreeze', '213', 500),
(140, 'RS-29325032', 'Cashier', '01/24/2020', 'cash', '235', '', 'Mark Jason Lagco', '', '', '500', 'January', '2020', '225', '27', 'Guinlajon, Sorsogon City', '324523', 10),
(141, 'RS-29325032', 'Cashier', '01/24/2020', 'cash', '700', '', 'Mark Jason Lagco', '', '', '1000', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '3423423', 400),
(142, 'RS-3337', 'Cashier', '01/26/2020', 'credit', '', '2020-01-09', 'Mark Jason Lagco', '1000', '1000', '', 'January', '2020', '500', '60', 'Guinlajon, Sorsogon City', '45674567456', 500),
(143, 'RS-2222324', 'Cashier', '01/26/2020', 'cash', '700', '', 'Mark Jason Lagco', '', '', '1000', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '24534534', 400),
(144, 'RS-6033223', 'Cashier', '01/28/2020', 'cash', '235', '', 'Mark Jason Lagco', '', '', '500', 'January', '2020', '225', '27', 'Pruok 3, Guinlajon Sorsogon City', '09509269930', 10),
(145, 'RS-0323000', 'Cashier', '01/28/2020', 'cash', '235', '', 'Mark Jason Lagco', '', '', '500', 'January', '2020', '225', '27', 'Guinlajon, Sorsogon City', '09509269930', 10),
(146, 'RS-66320', 'Cashier', '01/28/2020', 'cash', '710', '', 'Aldrin Ray Huenda', '', '', '1000', 'January', '2020', '7', '0.84', 'Pangpang, Sorsogon City', '09509090043', 403),
(147, 'RS-30220327', 'Cashier', '01/28/2020', 'cash', '7450', '', 'Frederick Lagco', '', '', '8000', 'January', '2020', '215', '25.8', 'Guinlajon, Sorsogon City', '09109073342', 3650),
(148, 'RS-233820', 'Cashier', '01/28/2020', 'credit', '', '2020-01-21', 'Mark Jason Lagco', '235', '235', '', 'January', '2020', '225', '27', 'Guinlajon, Sorsogon City', '09509269930', 10),
(149, 'RS-230352', 'Cashier', '01/28/2020', 'cash', '700', '', 'Mark Jason Lagco', '', '', '1000', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '09509269930', 400),
(150, 'RS-2302433', 'Cashier', '01/28/2020', 'cash', '725', '', 'Domingo Lagco', '', '', '800', 'January', '2020', '300', '36', 'Guinlajon, Sorsogon City', '09509269930', 415),
(157, 'RS-3302854', 'Cashier', '01/29/2020', 'cash', '1000', '', 'Kenneth', '', '', '2000', 'January', '2020', '500', '60', 'Seabreeze', '123', 0),
(158, 'RS-34220333', 'Cashier', '01/30/2020', 'cash', '500', '', 'Kenneth', '', '', '1000', 'January', '2020', '500', '60', 'Seabreeze', '123123', 0),
(159, 'RS-26073220', 'Cashier', '01/30/2020', 'cash', '600', '', 'Kenneth', '', '', '1000', 'January', '2020', '500', '60', 'Seabreeze', '2131', 100),
(160, 'RS-230253', 'Cashier', '01/31/2020', 'project_receivable', '', '', 'Project Rangas', '2000', '2000', '', 'January', '2020', '500', '60', '123', '123', 1000),
(161, 'RS-4022223', 'Cashier', '01/31/2020', 'project_receivable', '', '', 'Project Rangas', '1000', '1000', '', 'January', '2020', '500', '60', '123', '123', 500),
(162, 'RS-3325272', 'Cashier', '01/31/2020', 'project_receivable', '', '', 'Project Gabao  ', '1000', '1000', '', 'January', '2020', '500', '60', 'Seabreeze', '123', 500),
(163, 'RS-3248830', 'Cashier', '01/31/2020', 'project_receivable', '', '', 'Project Rangas', '0', '235', '', 'January', '2020', '225', '27', 'Seabreeze', '123', 10),
(164, 'RS-3322723', 'Cashier', '02/06/2020', 'project_receivable', '', '', '', '600', '600', '', 'February', '2020', '500', '60', 'Seabreeze', '2342342342', 100),
(165, 'RS-0352320', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Project Rangas', '1000', '1000', '', 'February', '2020', '500', '60', 'Seabreeze', '123123', 500),
(166, 'RS-3527033', 'Cashier', '02/06/2020', 'project_receivable', '', '', '', '1000', '1000', '', 'February', '2020', '500', '60', 'qwe', '123', 500),
(167, 'RS-3332350', 'Cashier', '02/06/2020', 'project_receivable', '', '', '', '235', '235', '', 'February', '2020', '225', '27', 'asd', '213', 10),
(168, 'RS-3244232', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Barangay Hall Guinlajon', '235', '235', '', 'February', '2020', '225', '27', 'Seabreeze', '123', 10),
(169, 'RS-62523632', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Barangay Hall Guinlajon', '1000', '1000', '', 'February', '2020', '500', '60', 'Seabreeze', '2', 500),
(170, 'RS-202390', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Project Rangas', '1000', '1000', '', 'February', '2020', '500', '60', 'qwe', '123', 500),
(171, 'RS-70838425', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Barangay Hall Guinlajon', '1700', '1700', '', 'February', '2020', '300', '36', 'qwe', '123', 900),
(172, 'RS-0323053', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Barangay Hall Guinlajon', '465', '465', '', 'February', '2020', '215', '25.8', 'qwe', '213', 25),
(173, 'RS-740334', 'Cashier', '02/06/2020', 'credit', '', '2020-02-14', 'Kenneth', '235', '235', '', 'February', '2020', '225', '27', '123', '123', 10),
(174, 'RS-232835', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Project Pamurayan  ', '935', '935', '', 'February', '2020', '300', '36', 'qwe', '213', 410),
(175, 'RS-203852', 'Cashier', '02/06/2020', 'credit', '', '2020-02-12', 'Kenneth', '235', '235', '', 'February', '2020', '225', '27', 'weq', '123', 10),
(176, 'RS-6942523', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Project Pamurayan  ', '1700', '1700', '', 'February', '2020', '300', '36', 'qwe', '123123', 900),
(177, 'RS-36330300', 'Cashier', '02/06/2020', 'project_receivable', '', '', 'Project Elementary School  ', '1400', '1400', '', 'February', '2020', '300', '36', 'asd', '123', 800),
(178, 'RS-3307322', 'Cashier', '02/07/2020', 'cash', '1000', '', 'Kenneth Solomon', '', '', '1000', 'February', '2020', '500', '60', 'Seabreeze Cabid-an', '0912312', 500);

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

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`, `category`, `date`, `omonth`, `oyear`, `qtyleft`, `dname`, `vat`, `total_amount`, `profit`, `status`) VALUES
(433, 'RS-34220333', 'P-0303532', '1', '500', 'Gravel', '500', '0', 'Gravel', '01/30/2020', 'January', '2020', '1042', 'G1', '0', '500', 0, ''),
(434, 'RS-26073220', 'P-0303532', '1', '500', 'Gravel', '600', '0', 'Gravel', '01/30/2020', 'January', '2020', '1041', 'G1', '0', '600', 100, ''),
(435, 'RS-8333332', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1040', 'G1', '0', '1000', 500, ''),
(436, 'RS-8333332', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1039', 'G1', '0', '1000', 500, ''),
(437, 'RS-230253', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1038', 'G1', '0', '1000', 500, ''),
(438, 'RS-230253', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1037', 'G1', '0', '1000', 500, ''),
(439, 'RS-4022223', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1036', 'G1', '0', '1000', 500, ''),
(440, 'RS-3325272', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '01/31/2020', 'January', '2020', '1035', 'G1', '0', '1000', 500, ''),
(441, 'RS-3248830', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '01/31/2020', 'January', '2020', '1837', 'Republic', '0', '235', 10, ''),
(442, 'RS-3322723', 'P-0303532', '1', '500', 'Gravel', '600', '0', 'Gravel', '02/06/2020', 'February', '2020', '1034', 'G1', '0', '600', 100, ''),
(443, 'RS-0352320', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1033', 'G1', '0', '1000', 500, ''),
(444, 'RS-3527033', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1032', 'G1', '0', '1000', 500, ''),
(445, 'RS-3332350', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1836', 'Republic', '0', '235', 10, ''),
(446, 'RS-3244232', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1835', 'Republic', '0', '235', 10, ''),
(447, 'RS-70838425', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1031', 'G1', '0', '1000', 500, ''),
(448, 'RS-62523632', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1030', 'G1', '0', '1000', 500, ''),
(449, 'RS-202390', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1029', 'G1', '0', '1000', 500, ''),
(450, 'RS-70838425', 'P-84022', '1', '300', 'Legazpi Sand', '700', '0', 'Black Sand', '02/06/2020', 'February', '2020', '178', 'Filtered Sand', '0', '700', 400, ''),
(451, 'RS-0323053', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1834', 'Republic', '0', '235', 10, ''),
(452, 'RS-0323053', 'P-233203', '1', '215', 'Portland Premium', '230', '0', 'Cement', '02/06/2020', 'February', '2020', '453', 'APO', '0', '230', 15, ''),
(453, 'RS-740334', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1833', 'Republic', '0', '235', 10, ''),
(454, 'RS-232835', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1832', 'Republic', '0', '235', 10, ''),
(455, 'RS-232835', 'P-84022', '1', '300', 'Legazpi Sand', '700', '0', 'Black Sand', '02/06/2020', 'February', '2020', '177', 'Filtered Sand', '0', '700', 400, ''),
(456, 'RS-203852', 'P-22520330', '1', '225', 'Republic Cement', '235', '0', 'Cement', '02/06/2020', 'February', '2020', '1831', 'Republic', '0', '235', 10, ''),
(457, 'RS-6942523', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/06/2020', 'February', '2020', '1028', 'G1', '0', '1000', 500, ''),
(458, 'RS-6942523', 'P-0322223', '1', '300', 'Black Sand', '700', '0', 'Black Sand', '02/06/2020', 'February', '2020', '71', 'Black Sand', '0', '700', 400, ''),
(459, 'RS-36330300', 'P-0322223', '1', '300', 'Black Sand', '700', '0', 'Black Sand', '02/06/2020', 'February', '2020', '70', 'Black Sand', '0', '700', 400, ''),
(460, 'RS-36330300', 'P-84022', '1', '300', 'Legazpi Sand', '700', '0', 'Black Sand', '02/06/2020', 'February', '2020', '176', 'Filtered Sand', '0', '700', 400, ''),
(462, 'RS-2253064', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/07/2020', 'February', '2020', '1027', 'G1', '0', '1000', 500, 'pending_project'),
(463, 'RS-32005333', 'P-0322223', '1', '300', 'Black Sand', '700', '0', 'Black Sand', '02/07/2020', 'February', '2020', '69', 'Black Sand', '0', '700', 400, 'pending_credit'),
(464, 'RS-3307322', 'P-0303532', '1', '500', 'Gravel', '1000', '0', 'Gravel', '02/07/2020', 'February', '2020', '1026', 'G1', '0', '1000', 500, '');

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
(1, 'admin', 'admin123', 'Admin', 'Admin'),
(2, 'test2', 'test2', 'projectM', 'Admin Staff'),
(3, 'test', 'test', 'Test Manager', 'Stock Administrator'),
(4, 'admin2', 'admin2', 'Admin 2', 'Admin Staff'),
(5, 'stockadmin', 'stockadmin', 'stockadmin', 'Stock Administrator');

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
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
