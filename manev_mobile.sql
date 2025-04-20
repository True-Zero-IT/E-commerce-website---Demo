-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 05:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manev_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `cat_nm` varchar(100) NOT NULL,
  `cat_dics` text NOT NULL,
  `cat_img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_nm`, `cat_dics`, `cat_img`) VALUES
(1, 'mobile', 'sbdhstwhsd', '1728132106_Accessories.jpg'),
(2, 'Reparing', 'Repair all mobiles', '1728132106_Accessories.jpg'),
(11, 'Accessories', 'jsadbdjhwh', '1728132106_Accessories.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dm_cart`
--

CREATE TABLE `dm_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_cart`
--

INSERT INTO `dm_cart` (`cart_id`, `cart_user_id`, `cart_product_id`, `cart_qty`, `cart_created_at`) VALUES
(20, 1, 2, 1, '2024-10-05 11:56:31'),
(21, 1, 1, 1, '2024-10-05 11:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `dm_contact`
--

CREATE TABLE `dm_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_fname` varchar(255) NOT NULL,
  `contact_lname` varchar(255) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_contact`
--

INSERT INTO `dm_contact` (`contact_id`, `contact_fname`, `contact_lname`, `contact_email`, `contact_subject`, `contact_message`, `contact_created_at`) VALUES
(3, 'yooo', 'yaaaa', 'sdabh@gamil.com', 'sajd', 'asdijkwahsu8idkhweauisjk', '2024-10-05 15:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `dm_orders`
--

CREATE TABLE `dm_orders` (
  `ord_id` int(11) NOT NULL,
  `ord_user_id` int(11) NOT NULL,
  `ord_transition_id` varchar(255) NOT NULL,
  `ord_firstname` varchar(200) NOT NULL,
  `ord_lastname` varchar(200) NOT NULL,
  `ord_address` varchar(255) NOT NULL,
  `ord_email` varchar(200) NOT NULL,
  `ord_mobile` varchar(10) NOT NULL,
  `ord_pincode` int(6) NOT NULL,
  `ord_city` varchar(100) NOT NULL,
  `ord_payment_type` varchar(100) NOT NULL,
  `ord_total_price` float NOT NULL,
  `ord_payment_status` varchar(100) NOT NULL,
  `ord_status` varchar(100) NOT NULL,
  `ord_created_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_orders`
--

INSERT INTO `dm_orders` (`ord_id`, `ord_user_id`, `ord_transition_id`, `ord_firstname`, `ord_lastname`, `ord_address`, `ord_email`, `ord_mobile`, `ord_pincode`, `ord_city`, `ord_payment_type`, `ord_total_price`, `ord_payment_status`, `ord_status`, `ord_created_id`) VALUES
(1, 1, '17281421709974096467015b5a93c0e', 'Dev', 'Bhatt', 'rajkot', 'devbhatt12@gmail.com', '4554865312', 360005, 'rajkot', 'cod', 177776, 'Success', 'Dipatches', '2024-10-05 15:29:30'),
(2, 1, '172814230567967954567015be1e1f47', 'Dev', 'Bhatt', 'rajkot', 'devbhatt12@gmail.com', '4554865312', 360005, 'rajkot', 'cod', 177776, 'Success', 'Dipatches', '2024-10-05 15:31:45'),
(3, 5, '1728142784182105912267015dc0acfa8', 'Dev', 'Bhatt', 'gujrat', 'devbhatt12@gmail.com', '4554865312', 360005, 'rajkot', 'cod', 25000, 'Success', 'Dipatches', '2024-10-05 15:39:44'),
(4, 5, '1728142848189993999167015e00a23df', 'Dev', 'Bhatt', 'gujrat', 'devbhatt12@gmail.com', '4554865312', 360005, 'rajkot', 'cod', 25000, 'Success', 'Dipatches', '2024-10-05 15:40:48'),
(5, 5, '1728142941178213913367015e5dc5b2f', 'Dev', 'Bhatt', 'gujrat', 'devbhatt12@gmail.com', '4554865312', 360005, 'rajkot', 'cod', 25000, 'Success', 'Dipatches', '2024-10-05 15:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `dm_order_items`
--

CREATE TABLE `dm_order_items` (
  `oi_id` int(11) NOT NULL,
  `oi_order_id` int(11) NOT NULL,
  `oi_p_id` int(5) NOT NULL,
  `oi_qty` int(11) NOT NULL,
  `oi_price` float NOT NULL,
  `oi_status` tinyint(1) NOT NULL,
  `oi_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_order_items`
--

INSERT INTO `dm_order_items` (`oi_id`, `oi_order_id`, `oi_p_id`, `oi_qty`, `oi_price`, `oi_status`, `oi_created_at`) VALUES
(1, 2, 1, 1, 88888, 0, '2024-10-05 15:31:45'),
(2, 2, 1, 1, 88888, 0, '2024-10-05 15:31:45'),
(3, 4, 1, 1, 25000, 0, '2024-10-05 15:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `dm_users`
--

CREATE TABLE `dm_users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(50) NOT NULL,
  `users_lname` varchar(50) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_contect` int(10) NOT NULL,
  `users_city` varchar(50) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_users`
--

INSERT INTO `dm_users` (`users_id`, `users_fname`, `users_lname`, `users_email`, `users_contect`, `users_city`, `users_password`, `users_status`, `created_time`, `user_image`) VALUES
(5, 'Dev', 'Bhatt', 'devbhatt921@gmail.com', 2147483647, 'rajkot', '1137', 1, '2024-07-01 13:04:32', 'd2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `catid` int(5) NOT NULL,
  `subcatid` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catid`, `subcatid`, `product_name`, `product_description`, `product_price`, `image`) VALUES
(1, 1, 2, 't3x', 'hsfdghfetyuhssekdaiaws', 25000, '1724220955_vivo_t3x.jpg'),
(2, 2, 3, 'vivo Y20  display', 'duplicate but work as original', 2000, '1728033397_r3.png'),
(3, 11, 5, 'I phone 11 cover', 'Female cover', 100, '1729072195_c1.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `button_link` varchar(100) NOT NULL,
  `alignment` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `button_link`, `alignment`, `image`) VALUES
(10, 'Dev e-mobile shop', 'Your Dream is our responsibility', 'http://localhost/D.M%20Enterprice/category_products.php?cat_id=1', 'text-left', '1728140434_b3.png'),
(11, 'Dev e-mobile shop', 'Your Dream is our responsibility', 'http://localhost/D.M%20Enterprice/category_products.php?cat_id=2', 'text-left', '1728140466_b4.png'),
(13, 'Dev e-mobile shop', 'Your Dream is our responsibility', 'http://localhost/D.M%20Enterprice/index.php', 'text-left', '1728140543_b6.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(5) NOT NULL,
  `catid` int(5) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `subcat_description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `cat_nm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `catid`, `subcategory_name`, `subcat_description`, `image`, `cat_nm`) VALUES
(2, 1, 'vivo', 'shabhjsgy', '1723616324_vivo_t3x.jpg', 'Mobile'),
(3, 2, 'combo', 'best combos for mobile.', '1728033211_r2.png', 'Reparing'),
(5, 11, 'Cover', 'Best covers', '1729072064_d1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `email`, `contact_no`, `pass`, `address`, `b_name`) VALUES
(1, 'dev', 'devbhatt12@gmail.com', 966494700, '0192023a7bbd73250516f069df18b500', 'jumnam city,gajiyabad', 'roti te bhindi'),
(2, 'shyam', 'shyam123@gmail.com', 966494722, '0192023a7bbd73250516f069df18b500', 'fgsfhsdayjdguwjdwgftydryd', 'hwgdy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_cart`
--
ALTER TABLE `dm_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id` (`cart_user_id`),
  ADD KEY `cart_product_id` (`cart_product_id`);

--
-- Indexes for table `dm_contact`
--
ALTER TABLE `dm_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `dm_orders`
--
ALTER TABLE `dm_orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `dm_order_items`
--
ALTER TABLE `dm_order_items`
  ADD PRIMARY KEY (`oi_id`);

--
-- Indexes for table `dm_users`
--
ALTER TABLE `dm_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dm_cart`
--
ALTER TABLE `dm_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dm_contact`
--
ALTER TABLE `dm_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_orders`
--
ALTER TABLE `dm_orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dm_order_items`
--
ALTER TABLE `dm_order_items`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dm_users`
--
ALTER TABLE `dm_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
