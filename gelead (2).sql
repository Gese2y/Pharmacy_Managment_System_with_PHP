-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 10:10 AM
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
-- Database: `gelead`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `Category_id` int(11) NOT NULL,
  `Catagory_name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`Category_id`, `Catagory_name`, `Quantity`, `Description`, `image`) VALUES
(4, 'cosmo', 22, 'this category is to medicate headache', 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE `category_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `category_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`id`, `category_name`, `category_description`) VALUES
(5, 'category1', ''),
(6, 'category2', ''),
(7, 'category3', ''),
(8, 'category4', ''),
(9, 'category6', ''),
(10, 'category7', ''),
(11, 'category8', ''),
(12, 'category9', ''),
(13, 'category10', ''),
(14, 'category11', ''),
(15, 'category18', ''),
(16, '', ''),
(17, 'newcategory', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_contact1` varchar(100) NOT NULL,
  `customer_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_contact1`, `customer_contact2`, `balance`) VALUES
(1, 'Customer1', 'address1', '8523544', '75254552', -7788),
(2, 'customer2', 'customer 2 address', '86789789', '9879889789', 4872);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email_address` varchar(50) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `First_name`, `Last_name`, `Gender`, `Age`, `Address`, `Contact`, `Email_address`, `Role`) VALUES
(10, 'Gessese', 'Teshome', 'Male', 22, 'Sebeta', 932265233, 'gese@gmail.com', 'store keeper'),
(11, 'dawit', 'medagna', 'male', 22, 'mebrat', 932265233, 'dav@gmail.com', 'system admin'),
(100, 'Yabsira ', 'Teferi', 'f', 14, 'sebeta', 9355426, 'yabu@gmail.com', 'system admin'),
(101, 'Yordanos', 'Teferi', 'f', 10, 'sebeta', 932265233, 'yordi@gmail.com', 'druggist'),
(133, 'dagmawit', 'Teferi', 'f', 5, 'sebeta', 932265233, 'dagi@gmail.com', 'pharma'),
(200, 'makdawit', 'Teferi', 'f', 2, 'sebeta', 932265233, 'maki2116@gmail.com', 'pharmacist'),
(300, 'Teshome', 'Dubale', 'male', 78, 'Bernasa', 932265233, 'teshome05@gmail.com', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE `employee1` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`id`, `emp_name`, `salary`, `gender`, `city`, `email`) VALUES
(1, 'Yogesh', '30000', 'male', 'Bhopal', 'yogesh@makitweb.com'),
(2, 'Vishal', '28000', 'male', 'Pune', 'vishal@makitweb.com'),
(3, 'Vijay', '35000', 'male', 'Jaipur', 'vijayec@makitweb.com'),
(4, 'Rahul', '25000', 'male', 'Kanpur', 'rahul512@makitweb.com'),
(5, 'Sonarika', '50000', 'female', 'Mumbai', 'bsonarika@makitweb.com'),
(6, 'Jitentendre', '48000', 'male', 'Bhopal', 'jiten94@makitweb.com'),
(7, 'Aditya', '36000', 'male', 'Pune', 'aditya@makitweb.com'),
(13, 'Shalu', '43000', 'female', 'Bhopal', 'gshalu521@makitweb.com');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) DEFAULT 0,
  `delete_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `delete_status`, `delete_date`) VALUES
(1, 'admin', 'admin', '2017-06-06 11:23:04', 0, NULL),
(2, 'role 1', 'role 1', '2019-04-08 10:51:05', 0, NULL),
(3, 'role2', 'role2', '2019-04-08 10:52:00', 0, NULL),
(4, 'role 3', 'role 3', '2019-04-08 10:54:18', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imgupload`
--

CREATE TABLE `imgupload` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `image` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Catagory_name` varchar(255) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Item_price` varchar(50) NOT NULL,
  `sales_price` varchar(1000) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Produced_Date` date NOT NULL,
  `Expired_date` date NOT NULL,
  `Entered_date` date NOT NULL,
  `Shelf_no` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `Record_by` varchar(255) NOT NULL,
  `Status` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Item_price`, `sales_price`, `Country`, `Produced_Date`, `Expired_date`, `Entered_date`, `Shelf_no`, `supplier_name`, `Record_by`, `Status`) VALUES
('4', '5', 'g', 'box', '454', '754', '12', 'Austria', '2020-08-03', '2020-08-03', '2020-08-04', 544, '+919767424611', 'Gessese Teshome', 'Avialable'),
('category', '4', 'PENCILIN', 'vial', '454', '754', '122', 'Belarus', '2020-08-05', '2020-08-14', '2020-08-06', 544, '+919767424611', 'Gessese Teshome', 'Item Expired'),
('category', '4', 'PENCILIN', 'vial', '454', '754', '122', 'Belarus', '2020-08-05', '2020-08-14', '2020-08-06', 544, '+919767424611', 'Gessese Teshome', 'Item Expired'),
('4', '5', 'g', 'box', '12', '754', '1234', 'Azerbaijan', '2020-08-03', '2020-08-12', '2020-07-30', 544, '+919767424611', 'Gessese Teshome', 'Avialable');

-- --------------------------------------------------------

--
-- Table structure for table `itemdetail`
--

CREATE TABLE `itemdetail` (
  `Catagory_name` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `side_effect` varchar(1000) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `Shelf_no` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemdetail`
--

INSERT INTO `itemdetail` (`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Description`, `side_effect`, `image`, `Shelf_no`) VALUES
('category', '', '1', 'bottel', '454', '', 'jhmnbdsfjhfbjshhhzsdhhdfh hdjjhgabhdewahw', '$220144.png', '544'),
('category', '1', 'bbl lotion', 'bottel', '454', '', 'hngvhnbv hgnb v hgnb gvhnhnbhn', '$666566.png', '15'),
('category', '4', 'PENCILIN', 'vial', '3605', 'hngv ghbnc g ghbfnvythg', 'hjnmbjhnb b', '$977204.png', '544'),
('4', '5', 'g', 'box', '3042', 'fdghnbfgbvfg', 'fdghjkbv', '$240550.jpg', '544'),
('4', '7', 'PENCILIN', 'pk', '433', 'eretyuiouhgfcx', 'yhjnmb kjhmnb ', '$220288.png', '544'),
('4', '77', 'PENCILIN', 'pk', '454', 'hgncbvhgfnv hvvnvhgh nv hgvnb', 'thgfbvghbfvhgbfvhg', '$105534.png', '544'),
('4', '8', 'PENCILIN', 'vial', '100', 'ydtgcbv cgfhcbyfhvnjyfvngyujhbngh', 'htdgncb ntyhfmnvythgnvfyhvb jyfvnytfhvntyghv jytfhvntyfgvbhtfgv', '$671803.png', '544');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_name` varchar(15) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `name`, `short_name`, `added_date`, `delete_status`) VALUES
(1, 'Phytopathology', 'Phyto', '0000-00-00', 0),
(2, 'Injuries', 'Injuries', '0000-00-00', 0),
(3, 'Cancer', 'Cancer', '0000-00-00', 0),
(4, 'Animal diseases', 'AD', '0000-00-00', 0),
(5, 'Growth disorders', 'GD', '0000-00-00', 0),
(6, 'Rare diseases', 'RD', '0000-00-00', 0),
(7, 'Neoplasms', 'Neo', '0000-00-00', 0),
(8, 'Inflammations', 'Inflam', '0000-00-00', 0),
(9, 'Sleep disorders', 'SD', '0000-00-00', 0),
(11, 'Infectious diseases', 'ID', '2019-04-02', 0),
(12, 'sdfsdfsdf', 'sdf', '2019-04-02', 0),
(13, 'cvnvcnvncvncvn', 'cnv', '2019-04-02', 0),
(14, 'fghjgjhfgjh', 'fgh', '2019-04-02', 0),
(15, 'Category 14', 'Cat 14', '2019-04-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id` int(5) NOT NULL,
  `header` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id`, `header`, `title`, `description`) VALUES
(1, 'Modal Header Title', 'Hello, this is version 2.0 and I am still working on this.\r\n', 'Please don\'t forget to give credit to original developer because I really worked hard to develop this project and please don\'t forget to like and share it if you found it useful :) For students or anyone else who needs program or source code for thesis writing or any Professional Software Development,Website Development,Mobile Apps Development at affordable cost contact me at Email : mayuri.infospace@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mukera`
--

CREATE TABLE `mukera` (
  `id` varchar(11) NOT NULL,
  `hh` varchar(20) NOT NULL,
  `hgbv` varchar(20) NOT NULL,
  `jhngbh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mukera`
--

INSERT INTO `mukera` (`id`, `hh`, `hgbv`, `jhngbh`) VALUES
('1234', 'ijkhnu', 'yjhbh', 'hnv hg'),
('1234', 'ijkhnu', 'yjhbh', 'hnv hg');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `role_name`) VALUES
(1, 'manage_medicinals', 'Manage Medicinals', 'Manage Medicinals', NULL),
(2, 'manage_pos', 'Manage POS', 'Manage POS', NULL),
(3, 'manage_roles', 'Manage User Roles', 'Manage User Roles', NULL),
(4, 'manage_users', 'Manage Users', 'Manage Users', NULL),
(5, 'manage_sales', 'Manage Sales', 'Manage Sales', NULL),
(6, 'manage_categories', 'Manage Categories', 'Manage Categories', NULL),
(7, 'manage_suppliers', 'Manage Suppliers', 'Manage Suppliers', NULL),
(8, 'manage_customers', 'Manage Customers', 'Manage Customers', NULL),
(9, 'manage_reports', 'Manage Reports', 'Manage Reports', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(7, 5, 1),
(8, 6, 1),
(9, 7, 1),
(10, 8, 1),
(11, 9, 1),
(16, 6, 3),
(17, 7, 3),
(18, 3, 4),
(19, 4, 4),
(20, 8, 4),
(21, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `prepare_by` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sent_date` date NOT NULL,
  `content` varchar(2000) NOT NULL,
  `document` varchar(1000) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `Title`, `prepare_by`, `contact`, `email`, `sent_date`, `content`, `document`, `Status`) VALUES
(1, 'New Entered Item', 'Gessese Teshome', 254552555, 'geseseteshome21@gmail.com', '2020-08-13', 'this report is to see how much item purchased and entered in to the store. as i see the date that ensert the ittem.', '757855.pdf', ''),
(2, 'New Entered Item', 'Gessese Teshome', 254552555, 'geseseteshome21@gmail.com', '2020-08-13', 'this report is to see how much item purchased and entered in to the store. as i see the date that ensert the ittem.', '14280.pdf', ''),
(3, 'New Entered Item', 'Gessese Teshome', 254552555, 'geseseteshome21@gmail.com', '2020-08-13', 'this report is to see how much item purchased and entered in to the store. as i see the date that ensert the ittem.', '506033.pdf', ''),
(4, 'New Entered Item', 'Gessese Teshome', 254552555, 'geseseteshome21@gmail.com', '2020-08-14', 'gfhjklhgfc', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(255) NOT NULL,
  `sent_from` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `sent_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `sent_from`, `contact`, `email`, `sent_to`, `title`, `content`, `sent_date`, `status`) VALUES
(1, '122', '0254552555', 'geseseteshome21@gmail.com', 'supplier', 'New Entered Item', 'gfhjkljhgfcxghkljhgf', '2020-08-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `template_name` varchar(1000) NOT NULL,
  `template_code` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL,
  `fevicon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `login_image` varchar(100) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `currency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `fevicon`, `logo`, `title`, `login_image`, `footer`, `currency`) VALUES
(1, 'fevicon-179.png', 'logo-597.png', 'Pharmacy', 'login_image-324.png', 'Footer', 'Rs.');

-- --------------------------------------------------------

--
-- Table structure for table `sold_item`
--

CREATE TABLE `sold_item` (
  `item_id` varchar(255) NOT NULL,
  `Catagory_id` int(11) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Sales_price` varchar(11) NOT NULL,
  `Sold_by` varchar(255) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Sold_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_item`
--

INSERT INTO `sold_item` (`item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`) VALUES
('4', 4, 'PENCILIN', 'bottel', 10, 'Bahrain', '20', 'makdawit Teferi', 'Customer1', '2020-08-13'),
('4', 4, 'PENCILIN', 'bottel', 10, 'Bahrain', '20', 'makdawit Teferi', 'Customer1', '2020-08-13'),
('4', 4, 'PENCILIN', 'bottel', 10, 'Bahrain', '20', 'makdawit Teferi', 'Customer1', '2020-08-13'),
('4', 4, 'PENCILIN', 'bottel', 0, 'Bahrain', '0', 'makdawit Teferi', '', '2020-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `stock_avail`
--

CREATE TABLE `stock_avail` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_avail`
--

INSERT INTO `stock_avail` (`id`, `name`, `quantity`) VALUES
(1, 'truzo super', 0),
(2, 'alanto', 0),
(3, 'Swipe 60 GM', 14156),
(4, 'Swipe 120 GM', 100),
(5, 'newstock', 1331);

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(120) NOT NULL,
  `stock_quatity` int(11) NOT NULL,
  `supplier_id` varchar(250) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `category` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expire_date` datetime NOT NULL,
  `uom` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `stock_id`, `stock_name`, `stock_quatity`, `supplier_id`, `company_price`, `selling_price`, `category`, `date`, `expire_date`, `uom`) VALUES
(1, 'SD1', 'Swipe 60 GM', 0, 'Biotic life science', '77.00', '80.00', '', '2010-04-22 13:31:10', '0000-00-00 00:00:00', ''),
(2, 'SD2', 'newstock', 0, 'Biotic life science', '452.00', '452.00', 'category1', '2010-05-11 07:37:41', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE `stock_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(260) NOT NULL,
  `stock_supplier_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `salesid` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `mode` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `due` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `stock_id`, `stock_name`, `stock_supplier_name`, `category`, `quantity`, `company_price`, `selling_price`, `opening_stock`, `closing_stock`, `date`, `username`, `type`, `salesid`, `total`, `payment`, `balance`, `mode`, `description`, `due`, `subtotal`, `count1`, `billnumber`) VALUES
(197, 'SE1', 'Swipe 60 GM', 'Biotic life science', '', 14, '77.00', '80.00', 14189, 14203, '2010-05-11 00:00:00', 'admin', 'entry', '', '1078.00', '39498.00', '0.00', 'cash', 'sdfds', '2010-05-11 00:00:00', 39498, 1, '14452'),
(198, 'SE1', 'newstock', 'Biotic life science', '', 85, '452.00', '452.00', 1280, 1365, '2010-05-11 00:00:00', 'admin', 'entry', '', '38420.00', '39498.00', '0.00', 'cash', 'sdfds', '2010-05-11 00:00:00', 39498, 2, '14452'),
(199, 'SA5', 'newstock', '', '', 34, '0.00', '452.00', 1365, 1331, '2010-05-11 00:00:00', 'admin', 'sales', 'SA5', '15368.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 0, '876'),
(200, 'SA5', 'Swipe 60 GM', '', '', 47, '0.00', '80.00', 14203, 14156, '2010-05-11 00:00:00', 'admin', 'sales', 'SA5', '3760.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 0, '876');

-- --------------------------------------------------------

--
-- Table structure for table `stock_sales`
--

CREATE TABLE `stock_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactionid` varchar(250) NOT NULL,
  `stock_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `customer_id` varchar(120) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `mode` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_sales`
--

INSERT INTO `stock_sales` (`id`, `transactionid`, `stock_name`, `category`, `supplier_name`, `selling_price`, `quantity`, `amount`, `date`, `username`, `customer_id`, `subtotal`, `payment`, `balance`, `due`, `mode`, `description`, `count1`, `billnumber`) VALUES
(2, 'SA1', 'swipe 60 GM', '', '', '80.00', '114.00', '80.00', '2010-05-11 00:00:00', 'admin', 'customer1', '80.00', '1452.00', '7668.00', '2010-05-11 00:00:00', 'cash', 'dsfds', 1, '897897'),
(3, 'SA3', 'swipe 60 GM', '', '', '80.00', '67.00', '80.00', '2010-05-11 00:00:00', 'admin', 'customer1', '65620.00', '69544.00', '0.00', '2010-05-11 00:00:00', 'cash', '', 1, '64564'),
(4, 'SA3', 'newstock', '', '', '452.00', '145.00', '65540.00', '2010-05-11 00:00:00', 'admin', 'customer1', '65620.00', '69544.00', '0.00', '2010-05-11 00:00:00', 'cash', '', 2, '64564'),
(5, 'SA5', 'newstock', '', '', '452.00', '34.00', '15368.00', '2010-05-11 00:00:00', 'admin', 'customer2', '19128.00', '14256.00', '4872.00', '2010-05-11 00:00:00', 'cash', 'lkh', 1, '876'),
(6, 'SA5', 'Swipe 60 GM', '', '', '80.00', '47.00', '3760.00', '2010-05-11 00:00:00', 'admin', 'customer2', '19128.00', '14256.00', '4872.00', '2010-05-11 00:00:00', 'cash', 'lkh', 2, '876');

-- --------------------------------------------------------

--
-- Table structure for table `stock_user`
--

CREATE TABLE `stock_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_user`
--

INSERT INTO `stock_user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `Regiterd_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `First_Name`, `Last_name`, `username`, `Address`, `Contact`, `home_phone`, `organization_name`, `added_date`, `Regiterd_by`) VALUES
(1, 'Gessese', 'teshome', 'gese', 'Ethiopia Addis Ababa', 254552555, '01112345', 'web', '2020-08-15', ' Gessese Teshome');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `telephone`, `fax`, `info`, `added_date`, `delete_status`) VALUES
(1, 'gfdfg 11', 'dfgdf111', '+919767424611', '422208111', 'dfgdfgdfg11111', '2019-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(500) NOT NULL,
  `supplier_contact1` varchar(100) NOT NULL,
  `supplier_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `supplier_name`, `supplier_address`, `supplier_contact1`, `supplier_contact2`, `balance`) VALUES
(2, 'supplier1', 'ldsfl\r\ndsf\r\n\r\nds', '22324324', '09043590', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'FinePix Pro2 3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
(2, 'EXP Portable Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Luxury Ultra thin Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00),
(4, 'XP 1155 Intel Core Laptop', 'LPN45', 'product-images/laptop.jpg', 800.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `avator` varchar(255) DEFAULT NULL,
  `group_id` int(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `login`, `role`, `avator`, `group_id`, `delete_status`) VALUES
(1, 'admin@admin.com', '$2y$10$eqnU/hsNjq3M7h3TvFfwYOKIP/6jHmzBLEFiHyhMaKjf4X3HenLWa', 'admin', '70520.png', 1, 0),
(3, 'user@gmail.com', '$2y$10$7XeEViIuymfneVxO1U.sZeIv1eW.OJvFGvdmWoTjbigk6NeaQaZa6', 'users', NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '001', 'Invalid email or password', 'warning'),
(2, '002', 'Settings are updated', 'success'),
(3, '003', 'Record Added Successfully', 'success'),
(4, '004', 'Record Successfully Updated', 'success'),
(5, '005', 'Record Sudccessfully Deleted', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rid` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `customer`, `supplier`, `subtotal`, `payment`, `balance`, `due`, `date`, `rid`) VALUES
(1, 'entry', '', '12455', '0.00', '0.00', '0.00', '0000-00-00 00:00:00', '2010-03-11 06:31:26', 'SE123'),
(2, 'entry', '', '12455', '0.00', '100.00', '900.00', '2010-03-10 00:00:00', '2010-03-11 06:39:19', 'SE125'),
(3, 'entry', '', '12455', '0.00', '900.00', '0.00', '2010-03-10 00:00:00', '2010-03-11 06:39:28', 'SE125'),
(4, 'entry', '', '12455', '6086.00', '1000.00', '86.00', '2010-03-10 00:00:00', '2010-03-11 06:42:00', 'SE132'),
(5, 'sales', '', '', '57902.00', '50000.00', '5902.00', '2010-03-25 00:00:00', '2010-03-12 06:43:17', 'SA82'),
(6, 'sales', '', '', '57902.00', '2000.00', '3902.00', '2010-03-25 00:00:00', '2010-03-12 06:43:23', 'SA82'),
(7, 'sales', 'customer1', '', '5712.00', '2000.00', '1712.00', '2010-03-13 00:00:00', '2010-03-12 06:45:46', 'SA64'),
(8, 'entry', '', '12455', '3060.00', '100.00', '960.00', '2010-03-11 00:00:00', '2010-03-21 10:16:46', 'SE155');

-- --------------------------------------------------------

--
-- Table structure for table `uom_details`
--

CREATE TABLE `uom_details` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(120) NOT NULL,
  `spec` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uom_details`
--

INSERT INTO `uom_details` (`id`, `name`, `spec`) VALUES
(0000000006, 'UOM1', 'UOM1 Specification'),
(0000000007, 'UOM2', 'UOM2 Specification'),
(0000000008, 'UOM3', 'UOM3 Specification'),
(0000000009, 'UOM4', 'UOM4 Specification');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `registrar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `Employee_id`, `Email`, `password`, `role`, `registrar`) VALUES
('gese', 10, 'geseseteshome21@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055 ', 'store keeper', 'Yabsira  Teferi'),
('dav', 11, 'dav@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055 ', 'system admin', 'Yabsira  Teferi'),
('yabu', 100, 'yabu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055 ', 'system admin', 'dawit medagna'),
('yordi', 101, 'yordi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055 ', 'druggist', 'Yabsira  Teferi'),
('maki', 200, 'maki1621@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055 ', 'pharmacist', 'Yabsira  Teferi'),
('teshe', 300, 'teshome@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b ', 'manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_name` varchar(50) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_name`, `Employee_id`, `Email`, `Password`) VALUES
('gese', 1, 'geseseteshome@gmail.com', 'bezi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `employee1`
--
ALTER TABLE `employee1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgupload`
--
ALTER TABLE `imgupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_avail`
--
ALTER TABLE `stock_avail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_entries`
--
ALTER TABLE `stock_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_sales`
--
ALTER TABLE `stock_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_user`
--
ALTER TABLE `stock_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom_details`
--
ALTER TABLE `uom_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`Employee_id`,`User_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1556;

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `employee1`
--
ALTER TABLE `employee1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgupload`
--
ALTER TABLE `imgupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_avail`
--
ALTER TABLE `stock_avail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_entries`
--
ALTER TABLE `stock_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `stock_sales`
--
ALTER TABLE `stock_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_user`
--
ALTER TABLE `stock_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uom_details`
--
ALTER TABLE `uom_details`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
