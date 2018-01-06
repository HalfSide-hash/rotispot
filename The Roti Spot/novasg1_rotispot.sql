-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2017 at 05:03 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novasg1_rotispot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_Email` varchar(255) NOT NULL,
  `admin_FName` varchar(60) NOT NULL,
  `admin_LName` varchar(60) NOT NULL,
  `admin_Username` varchar(60) NOT NULL,
  `admin_Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_Email`, `admin_FName`, `admin_LName`, `admin_Username`, `admin_Password`) VALUES
(1, 'superbossmon@goo.com', 'Super Boss', 'Mon', 'superbossmon', '$2y$10$xnzb1krpnpf2Pi7D08iKVO6heRRHK0PLFv3aSqNQMUM7Nm1rakHiq');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `pro_Category` int(11) NOT NULL,
  `category_Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`pro_Category`, `category_Name`) VALUES
(1, 'Roti'),
(2, 'Patties'),
(3, 'Main Dishes'),
(4, 'Sides'),
(5, 'Flags');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_ID` int(12) NOT NULL,
  `cust_FName` varchar(60) NOT NULL,
  `cust_LName` varchar(60) NOT NULL,
  `cust_Email` varchar(255) NOT NULL,
  `cust_UserName` varchar(60) NOT NULL,
  `cust_Password` varchar(255) NOT NULL,
  `cust_Phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_ID`, `cust_FName`, `cust_LName`, `cust_Email`, `cust_UserName`, `cust_Password`, `cust_Phone`) VALUES
(1, 'Taiga', 'Kagami', 'thenewace@goo.com', 'thenewace', '$2y$10$d4OEkIKY4aoGhN2Cmloq1OPuFItg.p53uc5DBc4eXg9PJI1To18DG', '987-654-3210'),
(2, 'Tetsuya', 'Kuroko', 'theshadow@goo.com', 'thesixthman', '$2y$10$.3HTNufFEpEnpUUyj.aoHuTW3Fe2Sxm7jq2ElBYmV6P9udE0i0RIe', '989-655-3209');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_ID` int(12) NOT NULL,
  `emp_FName` varchar(60) NOT NULL,
  `emp_LName` varchar(60) NOT NULL,
  `emp_Email` varchar(255) NOT NULL,
  `emp_Password` varchar(255) NOT NULL,
  `emp_Phone` varchar(12) NOT NULL,
  `emp_UserName` varchar(60) NOT NULL,
  `emp_DOB` date NOT NULL,
  `emp_SSN` varchar(11) NOT NULL,
  `emp_Address` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_ID`, `emp_FName`, `emp_LName`, `emp_Email`, `emp_Password`, `emp_Phone`, `emp_UserName`, `emp_DOB`, `emp_SSN`, `emp_Address`) VALUES
(3, 'Daiki', 'Aomine', 'thebest@goo.com', '$2y$10$Ii5EMaNAmSSFYlL46uU57uMkL/ENMQmGWq7nxk5HPWeJYRCnYHTFa', '201-596-4959', 'thebest', '1995-08-31', '453-34-5968', 'The Pinnacle'),
(8, 'Hanamichi', 'Sakuragi', 'thegenius@goo.com', '$2y$10$3p1wLtW65SnWrL4xt7ZfvOxNGoPtp8AbQ5K/Agnd2uKeTYmtmv9tK', '340-423-4244', 'thetensai', '1995-04-01', '192-49-4959', '3984 TryHard Ave');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_ID` int(12) NOT NULL,
  `manager_FName` varchar(60) NOT NULL,
  `manager_LName` varchar(60) NOT NULL,
  `manager_Email` varchar(255) NOT NULL,
  `manager_Password` varchar(60) NOT NULL,
  `manager_Username` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_ID`, `manager_FName`, `manager_LName`, `manager_Email`, `manager_Password`, `manager_Username`) VALUES
(7, 'Seijuro', 'Akashi', 'theleader@goo.com', '$2y$10$tKvNBajg8rgJJxSGJ8WoleRYGEtBpHIUdX8LR2DQlKcKe3QVMgZpm', 'thecaptain');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `item_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `pro_ID` int(11) NOT NULL,
  `item_TotalPrice` decimal(10,2) NOT NULL,
  `item_Quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(12) NOT NULL,
  `cust_ID` int(12) NOT NULL,
  `order_Date` datetime NOT NULL,
  `order_Quantity` int(12) NOT NULL,
  `order_TotalPrice` decimal(10,2) NOT NULL,
  `order_Status` varchar(255) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_ID` int(11) NOT NULL,
  `pro_Category` int(11) NOT NULL,
  `pro_Price` decimal(10,2) NOT NULL,
  `pro_Name` varchar(255) NOT NULL,
  `linkName` varchar(60) DEFAULT NULL,
  `pro_Quantity` int(11) NOT NULL,
  `pro_Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_ID`, `pro_Category`, `pro_Price`, `pro_Name`, `linkName`, `pro_Quantity`, `pro_Description`) VALUES
(1, 1, '12.50', 'Dhal Puri', 'dhalpuri', 12, 'Nice to stick to the basics, this dish is popular all throughout Trinidad.'),
(2, 1, '4.50', 'Bussup Shut Roti', 'bussupshut', 5, 'The classics, this roti is a treat with any dish.'),
(3, 1, '7.50', 'Pepper Roti', 'pepperroti', 3, 'A little spice for the morning! This roti has the caribbean flair of spiciness.'),
(4, 1, '3.00', 'Sada Roti', 'sada', 18, 'A breakfast delight, good with every dish!'),
(5, 1, '6.00', 'Aloo Roti', 'aloo', 28, 'A great roti with any dish!'),
(7, 2, '1.50', 'Beef Patty', 'beefpatty', 6, 'The jamaican delight, this classic patty is made fresh out the oven to be shown to you!'),
(8, 2, '4.00', 'Spinach Patty', 'spinachpatty', 11, 'For some quick iron in your diet.'),
(9, 2, '1.25', 'Jerk Chicken Patty', 'jerkchickenpatty', 5, 'A nice spice with a varied difference, this jerk chicken patty is great for a man on the go!'),
(10, 2, '100.00', 'Vegetable Patty', 'veggiepatty', 6, 'Don\'t order this one there are better options on the menu.'),
(13, 3, '9.95', 'Ackee and Saltfish', 'ackeeandsalfish', 7, 'A classic dish named ackee and saltfish!!!'),
(14, 3, '8.50', 'Jerk Chicken with Rice and Beans', 'jerkchickenmeal', 7, 'It couldn\'t be a meal without jerk chicken! A classic dish that is sure to impress.'),
(15, 3, '10.00', 'Tandoori Chicken', 'tandoorichicken', 3, 'This one\'s fire.'),
(16, 3, '8.00', 'Oxtail with Rice and Beans', 'oxtail', 14, 'A nice oxtail meal that goes complete with any dish.'),
(17, 3, '9.50', 'Curry Chicken and Rice', 'currychicken', 7, 'A nice dish that really taps into the west indian side, sure to be a hit.'),
(18, 3, '11.50', 'Curry Goat with Rice and Beans', 'currygoatmeal', 5, 'Curry Goat is a step above and is great to eat, a west indian treat!'),
(19, 4, '3.00', 'Rice and Beans', 'ricebeans', 12, 'A nice side order to any dish, make it complete with rice and beans!'),
(20, 4, '1.50', 'Boiled Dumpling', 'boileddumpling', 26, 'Boiled Dumpling delight! A great treat to go with some ackee and saltfish.'),
(21, 4, '2.50', 'Callaloo ', 'callaloo', 7, 'A traditional treat that is nutritious too, goes well with any dish!'),
(22, 4, '3.00', 'Festival', 'festival', 4, 'A traditional treat similar to fried dumpling, a great side to any meal!'),
(23, 4, '2.00', 'Kola Champagne', 'kolachampagne', 9, 'Can\'t go wrong with a traditional kola champagne! Have a taste of Jamaica!'),
(24, 4, '2.00', 'Ginger Beer', 'gingerbeer', 22, 'A good mix-up from the regular champagne, this traditional drink hits the spot with any meal!'),
(25, 5, '7.50', 'Jamaica', 'jamaicanflag', 4, 'Represent Jamaica with this great flag!'),
(26, 5, '7.50', 'Trinidad', 'trinidadflag', 8, 'Represent Trinidad with this great flag!'),
(27, 5, '7.50', 'Guyana', 'guyaneseflag', 18, 'Represent Guyana with this great flag!'),
(28, 5, '7.50', 'Barbados', 'barbadosflag', 11, 'Represent Barbados with this great flag!'),
(29, 5, '7.50', 'Dominican Republic', 'drflag', 30, 'Represent Dominican Republic with this great flag!'),
(30, 5, '7.50', 'Hondurian Flag', 'hondurasflag', 10, 'Represent Honduras with this great flag!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`,`admin_Username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`pro_Category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_ID`),
  ADD UNIQUE KEY `cust_UserName` (`cust_UserName`) USING BTREE;

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_ID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `pro_ID` (`pro_ID`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `cust_ID` (`cust_ID`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_ID`),
  ADD KEY `p_Category` (`pro_Category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `pro_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
