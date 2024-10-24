-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 04:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userID`) VALUES
(2, 9),
(3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `cartItemID` bigint(20) NOT NULL,
  `productID` bigint(20) DEFAULT NULL,
  `cartID` bigint(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` smallint(6) DEFAULT NULL,
  `message_c` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` bigint(20) NOT NULL,
  `p_cat_name` varchar(30) NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `p_cat_name`, `p_cat_desc`) VALUES
(1, 'cake', 'cakes with layer(s), frosting and top coat'),
(2, 'cupcake', 'small cake baked in cupcake or muffin cups'),
(3, 'cakepop', 'cake shaped as lollipops'),
(4, 'cookie', 'baked circular or differently shaped biscuits'),
(5, 'macaron', 'sandwiched cookies and cream'),
(6, 'brownie', 'chocolate fudge cakes'),
(7, 'pastry', 'cakes that don\'t fall in any other categories');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) DEFAULT NULL,
  `replies` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hello', 'Yes?'),
(2, 'How can I place an order for your cakes and pastries?', 'You can place an order by visiting our bakery in person or by contacting us via phone or email. We also offer online ordering through our website.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_message`
--

CREATE TABLE `contact_us_message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ordernumber` varchar(255) DEFAULT NULL,
  `client_message` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us_message`
--

INSERT INTO `contact_us_message` (`id`, `name`, `email`, `phone`, `ordernumber`, `client_message`, `status`, `date`) VALUES
(1, 'PHILIP PRADO', 'philipmoriz32@gmail.com', '2432432', '322332432', 'ok lang', 'CLOSED', '2023-06-14'),
(2, 'PHILIP PRADO', 'philipmoriz32@gmail.com', '2432432', '325345435', 'ok ba cake niyo?', 'SOLVED', '2023-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderItemID` bigint(20) NOT NULL,
  `randidx` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` bigint(20) NOT NULL,
  `orderID` bigint(20) NOT NULL,
  `paymentMethod` text NOT NULL,
  `price` float NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `statusx` varchar(20) DEFAULT NULL,
  `datepickup` date DEFAULT NULL,
  `timepickup` time DEFAULT NULL,
  `cake_message` varchar(255) DEFAULT NULL,
  `tranID` int(11) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderItemID`, `randidx`, `userID`, `productID`, `orderID`, `paymentMethod`, `price`, `quantity`, `status`, `statusx`, `datepickup`, `timepickup`, `cake_message`, `tranID`, `createDate`)
VALUES 
(1, '000001', 12, 4, 1,'COD', 70, 1, 1, 'RELEASING', '2023-06-06', '02:39:47', NULL, 18, '2023-06-06 02:39:47'),
(2, '000002', 12, 6, 1,'COD', 1600, 1, 1, 'RELEASING', '2023-06-06', '02:40:47', NULL, 19, '2023-06-06 02:40:47'),
(3, '000003', 12, 5, 1,'COD', 60, 1, 0, 'UNPAID', '2023-06-06', '02:41:47', NULL, 20, '2023-06-06 02:41:47'),
(4, '000004', 12, 3, 1,'COD', 70, 1, 2, 'PAID', '2023-06-06', '02:42:47', NULL, 21, '2023-06-06 02:42:47'),
(5, '000005', 12, 4, 1,'COD', 70, 1, 0, 'UNPAID', '2023-06-06', '02:43:47', NULL, 22, '2023-06-06 02:43:47'),
(6, '000006', 12, 16, 1,'COD', 29, 2, 0, 'UNPAID', '2023-06-06', '02:44:47', NULL, 23, '2023-06-06 02:44:47'),
(7, '000007', 12, 3, 1,'COD', 70, 1, 0, 'UNPAID', '2023-06-06', '02:46:47', NULL, 24, '2023-06-06 02:46:47'),
(8, '000008', 12, 5, 1,'COD', 60, 4, 0, 'UNPAID', '0000-00-00', '00:00:00', 'OK BA?', 25, '2023-06-06 02:48:47'),
(9, '000009', 12, 38, 1,'COD', 2200, 1, 2, 'PAID', '0000-00-00', '00:00:00', 'OK BA?', 26, '2023-06-06 02:49:47');


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `p_name` varchar(100) NOT NULL,
  `p_desc` text NOT NULL,
  `p_img` text NOT NULL,
  `p_price` float NOT NULL,
  `p_orig` int(11) DEFAULT NULL,
  `p_cat` varchar(255) DEFAULT NULL,
  `p_stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `status`, `p_name`, `p_desc`, `p_img`, `p_price`, `p_orig`, `p_cat`, `p_stat`) VALUES
(2, 0, 'Red Velvet Cupcake', 'red velvet cupcake with cream cheese frosting', 'Assets\\images\\products\\red_velvet_cupcake_pic.png', 60, 50.00, '2', 0),
(3, 1, 'Choc chip cookie', 'cookie with chocolate chips', 'Assets\\images\\products\\cookies_pic.png', 70, 50.00, '4', 1),
(4, 1, 'Croissant', 'light and airy pastry', 'Assets\\images\\products\\croissants_pic.jpg', 70, 40.00, '7', 1),
(5, 1, 'Donut', 'sweet fried rind dough with colourful frosting', 'Assets\\images\\products\\donut_on_plate_pic.jpg', 60, 30.00, '1', 1),
(6, 1, 'Macaron_box_20', 'box of 20 macarons of different flavours', 'Assets\\images\\products\\macaron_box_pic.jpg', 1600, 1200.00, '1', 1),
(7, 1, 'Birthday cupcakes', 'Cupcakes specially designed for birthdays', 'Assets\\images\\products\\Cake_1.jpg', 350, 200.00, '2', 1),
(8, 1, 'Fruity Cheesecake', 'A cool, exotic cheesecake, perfect for hot days! With its Graham biscuit base and smooth texture, this cheesecake offers a plethora of textures at once!', 'Assets\\images\\products\\Cake_2.jpg', 400, 300.00, '1', 1),
(9, 1, 'Chocolate Mousse', 'The best chocolate mousse that feels like eating clouds! It has a fudgy chocolate base and a very delicate chocolate mousse as its body with a tasty strawberry on the top. All with 70% cacao.', 'Assets\\images\\products\\Cake_3.jpg', 400, 200.00, '1', 2),
(10, 1, 'Chocolate Cake pops', 'Lollipops but as a cake coated with a cracking chocolate!', 'Assets\\images\\products\\Cake_4.jpg', 350, 300.00, '1', 1),
(11, 1, 'Expresso Cupcake', 'Expresso cupcake with a chocolate base and a hint of coffee! It\'s accompanied with a very creamy frosting with a coffee flavor.', 'Assets\\images\\products\\Cake_5.jpg', 150, 100.00, NULL, NULL),
(12, 1, 'Rainbow Cupcake', 'Vanilla flavoured cupcake with a confetti bomb at its heart! The topping is a meringue based frosting.', 'Assets\\images\\products\\cupcake_bg.jpg', 120, 100.00, NULL, NULL),
(13, 1, 'Cinnamon brownie', 'Squared chocolaty and fudgy brownie, flavored faintly with cinnamon!', 'Assets\\images\\products\\Brownie\\Brownie_1.png', 130, 100.00, NULL, NULL),
(14, 1, 'choc-chip brownie', 'Amazingly mouth melting brownie with a fudgy consistency. It contains melted chocolate in every bite !', 'Assets\\images\\products\\Brownie\\Brownie_2.png', 210, 150.00, NULL, NULL),
(15, 1, 'choc-mint brownie', 'This brownie is refreshing and very delicious, with a hint of mint and a swirl of chocolate.', 'Assets\\images\\products\\Brownie\\Brownie_3.png', 20, 10.00, NULL, NULL),
(16, 1, 'Pecan brownie', 'This brownie contains pecan nuts and offers a wider range of textures. A pure chef-d\'oeuvre!', 'Assets\\images\\products\\Brownie\\Brownie_4.png', 29, 20.00, NULL, NULL),
(17, 1, 'Raspberry  brownie', 'Delicate raspberry brownie that brings the perfect balance between fruitiness and chocolate ! Raspberry is one of the best fruits that compliments the cacao flavor.', 'Assets\\images\\products\\Brownie\\Brownie_5.png', 29, 20.00, NULL, NULL),
(18, 1, 'Walnut brownie', 'This brownie contains roasted walnuts that accentuates the cacao in the brownie. The nutty flavor and particular texture of the roasted walnut compliments the delicateness and fudgy texture of the original brownie.', 'Assets\\images\\products\\Brownie\\Brownie_6.png', 29, 20.00, NULL, NULL),
(19, 1, 'White-choc brownie', 'White chocolate provides for the adequate moisture that makes up the perfect brownie!', 'Assets\\images\\products\\Brownie\\Brownie_7.png', 40, 30.00, NULL, NULL),
(20, 1, 'Choc-chip blondie', 'Blondie is another word for a longer brownie but not necessarily dominated by chocolate! This choc chip blondie offers the warmth and purity of vanilla and the fudgy texture of the chocolate chips.', 'Assets\\images\\products\\Brownie\\Brownie_8.png', 40, 30.00, NULL, NULL),
(21, 1, 'Raspberry swirl blondie', 'A fruity flavor that perfectly fits the moistness of a good blondie.', 'Assets\\images\\products\\Brownie\\Brownie_9.png', 40, 25.00, NULL, NULL),
(22, 1, 'Lemon blondie', 'Lemon flavored blondie provides for the perfect balance between the sourness of the lemon and the sweetness of the blondie.', 'Assets\\images\\products\\Brownie\\Brownie_10.png', 59, 35.00, NULL, NULL),
(23, 1, 'Christmas box x 24', 'Brownie box with 4 pieces of 6 unique flavors:<br><br>1. Walnut Brownie,<br>2. Cream cheese Brownie,<br>3. Original Brownie,<br>4. Choc-chip Brownie,<br>5. Raspberry swirl Brownie,<br>6. Double choc Brownie.<br>', 'Assets\\images\\products\\Brownie\\Brownie_11.png', 700, 600.00, '2', 1),
(24, 1, 'Christmas brownie bars x 8', 'The box contains 8 brownie bars, topped with white chocolate with a hint of candy cane. A limited edition by MALAKO!', 'Assets\\images\\products\\Brownie\\Brownie_12.png', 320, 250.00, NULL, NULL),
(37, 1, 'Rainbow cake', 'Beautiful multi flavored cake with interior and exterior rainbow colors! 4 layers of different cakes in 1!', 'Assets\\images\\products\\Cakes\\Cake_1.png', 1300, 1200.00, NULL, NULL),
(38, 1, 'Elegant floral wedding cake', 'Multi layered wedding cake decorated with fondant and sugar flowers. It\'s layers and sandwiched with several frostings: <br>\r\n\r\n> White chocolate ganache<br>\r\n> Vanilla frosting <br>\r\n> Chocolate and raspberry frosting<br>\r\n\r\n', 'Assets\\images\\products\\Cakes\\Cake_2.png', 2200, 2100.00, NULL, NULL),
(39, 1, 'Minimal elegant floral cake', 'Multi-layered cake with a minimalistic design for a modern look. The floral design gives an elegant touch to it. It\'s flavor is vanilla with chocolate frosting.', 'Assets\\images\\products\\Cakes\\Cake_3.png', 1800, 1200.00, NULL, NULL),
(40, 1, 'Golden drip floral cake', 'Long multi-layered cake with golden white chocolate drips. One of our trendiest and candid looking cake ! It\'s delicious with a combination of our best compatible flavors.', 'Assets\\images\\products\\Cakes\\Cake_4.png', 1500, 1100.00, NULL, NULL),
(41, 1, 'Fruity cake with chocolate', 'Simple chocolate cake with vanilla buttercream and refreshing red berries: cherries and strawberries.', 'Assets\\images\\products\\Cakes\\Cake_5.png', 500, 400.00, NULL, NULL),
(42, 1, 'Fruity cake with alomonds', 'Vanilla and almond flavored cake with simple buttercream frosting and fresh fruits.', 'Assets\\images\\products\\Cakes\\Cake_6.png', 600, 300.00, NULL, NULL),
(43, 1, 'White floral fondant cake', 'Red velvet cake covered with fondant and sugar flowers for a vintage look.', 'Assets\\images\\products\\Cakes\\Cake_7.png', 1000, 900.00, NULL, NULL),
(44, 1, 'Choc-drip coffee cake', 'Amazing coffee cake with coffee beans flavored buttercream and a dripping chocolate ganache.', 'Assets\\images\\products\\Cakes\\Cake_8.png', 1000, 700.00, NULL, NULL),
(45, 1, 'Original vanilla cookie', 'Plain vanilla cookie', 'Assets\\images\\products\\Cookie\\Cookie_1.png', 15, 10.00, NULL, NULL),
(46, 1, 'M&M cookie', 'Soft cookie with M&Ms .', 'Assets\\images\\products\\Cookie\\Cookie_4.png', 15, 12.00, NULL, NULL),
(47, 1, 'Choc-chunks cookie', 'Cookie filled with chocolate chips', 'Assets\\images\\products\\Cookie\\Cookie_5.png', 15, 12.00, NULL, NULL),
(48, 1, 'M&M and Choc-chip cookie', 'Cookie with M&M and Chocolate chips.', 'Assets\\images\\products\\Cookie\\Cookie_6.png', 15, 12.00, NULL, NULL),
(49, 1, 'Chocolate sandwich cookie', '2 chocolate cookies filled with whipped cream too satisfy any sugar cravings!', 'Assets\\images\\products\\Cookie\\Cookie_7.png', 30, 25.00, NULL, NULL),
(50, 1, 'Choc-chip and M&M sandwich cookie', 'M&M and Choc-chip cookies with whipped cream', 'Assets\\images\\products\\Cookie\\Cookie_8.png', 30, 25.00, NULL, NULL),
(51, 1, 'Oats cookies', 'Cookies with oats for a healthier option.', 'Assets\\images\\products\\Cookie\\Cookie_9.png', 15, 10.00, NULL, NULL),
(52, 1, 'Dark-choc and mint cookie', 'Dark chocolate cookie with a hint of mint', 'Assets\\images\\products\\Cookie\\Cookie_10.png', 15, 10.00, NULL, NULL),
(53, 1, 'Product name', 'my desc', '', 300, 250.00, NULL, NULL),
(54, 1, 'Cake Php', 'My cake php', '', 250, 100.00, NULL, NULL),
(55, 1, 'dsada', 'dsadad', '', 240, 200.00, NULL, NULL),
(56, 1, 'dsada', 'dsadad', '', 240, 200.00, NULL, NULL),
(57, 1, 'dsadad', 'dsadsad', '', 200, 100.00, NULL, NULL),
(58, 1, 'dsada', 'My cake php', '', 240, 100.00, NULL, NULL),
(59, 1, 'dsdsad', 'My cake php', 'img20230422045225.jpg', 250, 100.00, NULL, NULL),
(60, 1, 'dsdsad', 'My cake php', 'img20230422045454.png', 250, 100.00, NULL, NULL),
(61, 1, 'My name Cakes', 'My cake php', 'img20230422083329.jpg', 200, 130.00, NULL, NULL),
(62, 1, 'My Product Name', 'My Product Desc', 'img20230422141512.jpg', 500, 230.00, NULL, NULL),
(63, 1, 'AKE ME', 'dsadad', 'Assets\\images\\products\\img20230422150622.png', 500, 400.00, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_test`
--

CREATE TABLE `products_test` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_desc` text NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `p_type_id` int(11) NOT NULL,
  `p_img` text NOT NULL,
  `p_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_test`
--

INSERT INTO `products_test` (`p_id`, `p_name`, `p_desc`, `p_cat_id`, `p_type_id`, `p_img`, `p_price`) VALUES
(1, 'Vanilla Cupcake', 'vanilla cupcake with vanilla frosting', 2, 2, 'Assets\\images\\products\\cupcake_pic.png', 25),
(2, 'Red Velvet Cupcake', 'red velvet cupcake with cream cheese frosting', 2, 2, 'Assets\\images\\products\\red_velvet_cupcake_pic.png', 25),
(3, 'Choc chip cookie', 'cookie with chocolate chips ', 4, 2, 'Assets\\images\\products\\cookies_pic.png', 15),
(4, 'Croissant', 'light and airy pastry', 7, 2, 'Assets\\images\\products\\croissants_pic.jpg', 20),
(5, 'Donut', 'sweet fried rind dough with colourful frosting', 7, 2, 'Assets\\images\\products\\donut_on_plate_pic.jpg', 60),
(6, 'Macaron box x 20 pieces', 'box of 20 macarons of different flavours', 5, 2, 'Assets\\images\\products\\macaron_box_pic.jpg', 650),
(7, 'Birthday cupcakes', 'Cupcakes specially designed for birthdays', 2, 1, 'Assets\\images\\products\\Cake_1.jpg', 350),
(8, 'Fruity Cheesecake', 'A cool, exotic cheesecake, perfect for hot days! With its Graham biscuit base and smooth texture, this cheesecake offers a plethora of textures at once! ', 7, 1, 'Assets\\images\\products\\Cake_2.jpg', 400),
(9, 'Chocolate Mousse', 'The best chocolate mousse that feels like eating clouds! It has a fudgy chocolate base and a very delicate chocolate mousse as its body with a tasty strawberry on the top. All with 70% cacao.', 7, 1, 'Assets\\images\\products\\Cake_3.jpg', 400),
(10, 'Chocolate Cake pops', 'Lollipops but as a cake coated with a cracking chocolate!', 3, 1, 'Assets\\images\\products\\Cake_4.jpg', 350),
(11, 'Expresso Cupcake', 'Expresso cupcake with a chocolate base and a hint of coffee! It\'s accompanied with a very creamy frosting with a coffee flavor.', 2, 1, 'Assets\\images\\products\\Cake_5.jpg', 30),
(12, 'Rainbow Cupcake', 'Vanilla flavoured cupcake with a confetti bomb at its heart! The topping is a meringue based frosting. ', 2, 1, 'Assets\\images\\products\\cupcake_bg.jpg', 40),
(13, 'Cinnamon brownie', 'Squared chocolaty and fudgy brownie, flavored faintly with cinnamon!', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_1.png', 20),
(14, 'choc-chip brownie', 'Amazingly mouth melting brownie with a fudgy consistency. It contains melted chocolate in every bite !', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_2.png', 20),
(15, 'choc-mint brownie', 'This brownie is refreshing and very delicious, with a hint of mint and a swirl of chocolate.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_3.png', 20),
(16, 'Pecan brownie', 'This brownie contains pecan nuts and offers a wider range of textures. A pure chef-d\'oeuvre!', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_4.png', 29),
(17, 'Raspberry  brownie', 'Delicate raspberry brownie that brings the perfect balance between fruitiness and chocolate ! Raspberry is one of the best fruits that compliments the cacao flavor.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_5.png', 29),
(18, 'Walnut brownie', 'This brownie contains roasted walnuts that accentuates the cacao in the brownie. The nutty flavor and particular texture of the roasted walnut compliments the delicateness and fudgy texture of the original brownie.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_6.png', 29),
(19, 'White-choc brownie', 'White chocolate provides for the adequate moisture that makes up the perfect brownie!', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_7.png', 29),
(20, 'Choc-chip blondie', 'Blondie is another word for a longer brownie but not necessarily dominated by chocolate! This choc chip blondie offers the warmth and purity of vanilla and the fudgy texture of the chocolate chips.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_8.png', 40),
(21, 'Raspberry swirl blondie', 'A fruity flavor that perfectly fits the moistness of a good blondie.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_9.png', 40),
(22, 'Lemon blondie', 'Lemon flavored blondie provides for the perfect balance between the sourness of the lemon and the sweetness of the blondie.', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_10.png', 40),
(23, 'Christmas box x 24', 'Brownie box with 4 pieces of 6 unique flavors:<br><br>\r\n1. Walnut Brownie,<br>\r\n2. Cream cheese Brownie,<br>\r\n3. Original Brownie,<br>\r\n4. Choc-chip Brownie,<br>\r\n5. Raspberry swirl Brownie,<br>\r\n6. Double choc Brownie.<br>', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_11.png', 700),
(24, 'Christmas brownie bars x 8', 'The box contains 8 brownie bars, topped with white chocolate with a hint of candy cane. A limited edition by MALAKO!', 6, 2, 'Assets\\images\\products\\Brownie\\Brownie_12.png', 320),
(37, 'Rainbow cake', 'Beautiful multi flavored cake with interior and exterior rainbow colors! 4 layers of different cakes in 1!', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_1.png', 650),
(38, 'Elegant floral wedding cake', 'Multi layered wedding cake decorated with fondant and sugar flowers. It\'s layers and sandwiched with several frostings: <br>\r\n\r\n> White chocolate ganache<br>\r\n> Vanilla frosting <br>\r\n> Chocolate and raspberry frosting<br>\r\n\r\n', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_2.png', 2200),
(39, 'Minimal elegant floral cake', 'Multi-layered cake with a minimalistic design for a modern look. The floral design gives an elegant touch to it. It\'s flavor is vanilla with chocolate frosting.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_3.png', 1800),
(40, 'Golden drip floral cake', 'Long multi-layered cake with golden white chocolate drips. One of our trendiest and candid looking cake ! It\'s delicious with a combination of our best compatible flavors.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_4.png', 1500),
(41, 'Fruity cake with chocolate', 'Simple chocolate cake with vanilla buttercream and refreshing red berries: cherries and strawberries.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_5.png', 350),
(42, 'Fruity cake with alomonds', 'Vanilla and almond flavored cake with simple buttercream frosting and fresh fruits.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_6.png', 350),
(43, 'White floral fondant cake', 'Red velvet cake covered with fondant and sugar flowers for a vintage look.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_7.png', 1000),
(44, 'Choc-drip coffee cake', 'Amazing coffee cake with coffee beans flavored buttercream and a dripping chocolate ganache.', 1, 2, 'Assets\\images\\products\\Cakes\\Cake_8.png', 1000),
(45, 'Original vanilla cookie', 'Plain vanilla cookie', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_1.png', 15),
(46, 'M&M cookie', 'Soft cookie with M&Ms .', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_4.png', 15),
(47, 'Choc-chunks cookie', 'Cookie filled with chocolate chips', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_5.png', 15),
(48, 'M&M and Choc-chip cookie', 'Cookie with M&M and Chocolate chips.', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_6.png', 15),
(49, 'Chocolate sandwich cookie', '2 chocolate cookies filled with whipped cream too satisfy any sugar cravings!', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_7.png', 30),
(50, 'Choc-chip and M&M sandwich cookie', 'M&M and Choc-chip cookies with whipped cream', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_8.png', 30),
(51, 'Oats cookies', 'Cookies with oats for a healthier option.', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_9.png', 15),
(52, 'Dark-choc and mint cookie', 'Dark chocolate cookie with a hint of mint', 4, 2, 'Assets\\images\\products\\Cookie\\Cookie_10.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `productID` bigint(20) NOT NULL,
  `categoryID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`productID`, `categoryID`) VALUES
(1, 2),
(2, 2),
(3, 4),
(4, 7),
(5, 7),
(6, 5),
(7, 2),
(8, 7),
(9, 7),
(10, 3),
(11, 2),
(12, 2),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 0),
(54, 0),
(55, 0),
(56, 2),
(57, 8),
(58, 2),
(59, 2),
(60, 1),
(61, 1),
(62, 2),
(63, 1),
(64, 1),
(65, 0),
(66, 1),
(67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `productID` bigint(20) NOT NULL,
  `typeID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`productID`, `typeID`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(64, 1),
(65, 1),
(66, 2),
(67, 1),
(68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rc_number`
--

CREATE TABLE `rc_number` (
  `id` int(11) NOT NULL,
  `rc_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rc_number`
--

INSERT INTO `rc_number` (`id`, `rc_number`, `user_id`, `date_created`) VALUES
(1, '123', NULL, '2023-06-22'),
(26, '00001', 9, '2023-06-28'),
(69, '000001', 12, '2023-07-13'),
(70, '000002', 12, '2023-07-13'),
(71, '000003', 12, '2023-07-13'),
(72, '000004', 12, '2023-07-13'),
(73, '000005', 12, '2023-07-13'),
(74, '000006', 12, '2023-07-13'),
(75, '000007', 12, '2023-07-13'),
(76, '000008', 12, '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `stat_admin`
--

CREATE TABLE `stat_admin` (
  `id` int(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stat_admin`
--

INSERT INTO `stat_admin` (`id`, `from`, `to`, `user`) VALUES
(1, '2021-10-25', '2021-10-26', 'admin'),
(2, '2021-10-25', '2021-10-26', NULL),
(42, '2021-10-01', '2022-01-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_cart_info`
--

CREATE TABLE `table_cart_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `rc_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_cart_info`
--

INSERT INTO `table_cart_info` (`id`, `user_id`, `t_name`, `rc_number`, `status`, `date_create`) VALUES
(1, 12, NULL, '000001', 'TO PREPARE', '2023-07-13 21:38:51'),
(2, 12, NULL, '000002', 'TO PREPARE', '2023-07-13 22:28:53'),
(3, 12, NULL, '000003', 'ORDER COMPLETED', '2023-07-13 22:29:07'),
(4, 12, NULL, '000004', 'TO PREPARE', '2023-07-13 22:34:22'),
(5, 12, NULL, '000005', 'TO RELEASE', '2023-07-13 22:34:32'),
(6, 12, NULL, '000006', 'ORDER COMPLETED', '2023-07-13 22:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fldUsername` varchar(255) DEFAULT NULL,
  `fldPassword` varchar(255) DEFAULT NULL,
  `fldFirstName` varchar(255) DEFAULT NULL,
  `fldMiddleName` varchar(255) DEFAULT NULL,
  `fldLastName` varchar(255) DEFAULT NULL,
  `fldAddress` varchar(255) DEFAULT NULL,
  `fldContact` varchar(255) DEFAULT NULL,
  `fldEperson` varchar(255) DEFAULT NULL,
  `fldProf` varchar(255) DEFAULT NULL,
  `fldAdmin` varchar(255) DEFAULT NULL,
  `level` varchar(11) DEFAULT NULL,
  `fldActive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `image`, `fldUsername`, `fldPassword`, `fldFirstName`, `fldMiddleName`, `fldLastName`, `fldAddress`, `fldContact`, `fldEperson`, `fldProf`, `fldAdmin`, `level`, `fldActive`) VALUES
(1, 'img20230326135548.png', 'ADMIN', 'ADMIN', 'JUANssss1', 'DELAsss1', 'CRUZ', 'POBLACION STREET BATANGAS CITY', '09072345235', 'FF', 'FF', '0', 'ADMIN', '1'),
(2, NULL, 'JUAN', 'JUAN', 'JUAN', 'DELA', 'CRUZ', 'BINMALEY', '09075532243', NULL, NULL, '0', 'TEACHER', '0'),
(3, 'img20220120012049.jpg', 'JOHN', 'JOHN', 'JOHN', 'JOHN', 'JOHN', 'DSADSA', '090755322414', NULL, NULL, NULL, 'STUDENT', '0'),
(4, NULL, 'GRACIA', 'GRACIA', 'Mary Grace', 'Garcia', 'Valdez', 'DSADSA', '090755322414', NULL, NULL, NULL, 'STUDENT', '0'),
(5, NULL, 'MAYA', 'MAYA', 'MAYA', 'MAYA', 'MAYA', 'DSADSA', '09075532241', NULL, NULL, NULL, 'TEACHER', '0'),
(6, 'img20220210071646.png', 'KASO', 'KASO', 'KASO', 'KASO', 'KASO', 'KASO', '09075532241', NULL, NULL, NULL, 'STUDENT', '0'),
(7, NULL, 'CRUZ', 'CRUZ', 'CRUZ', 'CRUZ', 'CRUZ', 'CRUZ', '09091234567', NULL, NULL, '', 'TEACHER', '1'),
(8, NULL, 'CRUZ', 'CRUZ', 'CRUZ', 'CRUZ', 'CRUZ', 'DSADSA', '09087878954', NULL, NULL, '0', 'TEACHER', '2'),
(9, NULL, 'student', 'student', 'srudent', 'srudent', 'srudent', 'srudent', '09091234567', NULL, NULL, NULL, 'TEACHER', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tranID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `orderID` bigint(20) NOT NULL,
  `randidx` varchar(255) DEFAULT NULL,
  `paymentMethod` text NOT NULL,
  `datepickup` date DEFAULT NULL,
  `timepickup` time DEFAULT NULL,
  `status` text NOT NULL,
  `statusx` int(11) NOT NULL,
  `cake_message` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tranID`, `userID`, `orderID`, `randidx`, `paymentMethod`, `datepickup`, `timepickup`, `status`, `statusx`, `cake_message`, `createDate`) VALUES
(1, 12, 1, '000001', 'COD', '0000-00-00', '00:00:00', 'Approved', 1, 'Happy birthday', '2023-07-13 13:38:51'),
(2, 12, 1, '000002', 'COD', '0000-00-00', '00:00:00', 'successful', 0, 'Happy birthday', '2023-07-13 14:28:13'),
(3, 12, 1, '000003', 'COD', '0000-00-00', '00:00:00', 'Approved', 2, 'Happy birthday', '2023-07-13 14:29:07'),
(4, 12, 1, '000004', 'COD', '0000-00-00', '00:00:00', 'successful', 0, 'Happy birthday', '2023-07-13 14:29:32'),
(5, 12, 1, '000005', 'COD', '0000-00-00', '00:00:00', 'successful', 0, 'Happy birthday', '2023-07-13 14:30:31'),
(6, 12, 1, '000006', 'COD', '0000-00-00', '00:00:00', 'successful', 0, 'Happy birthday', '2023-07-13 14:31:16'),
(7, 12, 1, '000007', 'COD', '0000-00-00', '00:00:00', 'successful', 0, 'Happy birthday', '2023-07-13 14:33:14'),
(8, 12, 1, '000008', 'COD', '0000-00-00', '00:00:00', 'Approved', 2, 'Happy birthday', '2023-07-13 14:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeID` bigint(20) NOT NULL,
  `p_type_name` varchar(30) NOT NULL,
  `p_type_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `p_type_name`, `p_type_desc`) VALUES
(1, 'new', 'new products are tagged as new'),
(2, 'featured', 'products which have to get attention are tagged as featured'),
(3, 'hot', 'products on sale are tagged as hot'),
(4, 'best', 'best- seller products are tagged as best');

-- --------------------------------------------------------

--
-- Table structure for table `unanswered`
--

CREATE TABLE `unanswered` (
  `id` int(30) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `no_asks` int(30) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unanswered`
--

INSERT INTO `unanswered` (`id`, `question`, `no_asks`) VALUES
(1, 'dsadsa', 0),
(2, 'hahaha', 0),
(3, 'cake', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` bigint(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `vkey` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `isSubscribed` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `uname`, `pass`, `fname`, `lname`, `email`, `address`, `phone`, `description`, `vkey`, `verified`, `isSubscribed`, `isAdmin`, `createDate`) VALUES
(6, 'PIOLO', '$2y$10$om.QP2imRAFfjx9N.yW8ju/InbjsGULAePAa/MNrzSrDWxDZkmfgy', 'PIOLO', 'PASCUAL', 'PIOLO@GMAIL.COM', '', '', '', 'e58cd18c9a837a8e5f5cdf220795674f', 1, 0, 0, '2023-03-30 04:14:34'),
(9, 'JONJON', '$2y$10$Mc77RhDUNU1QeDn6iyZQ4unX2qVJQmPex4FIS0XVQZXz0/7IUi.m2', 'JONJON', 'JONJONS', 'JONJON@gmail.com', '123 STA BARBARA', '09075532241', '', 'bab48b7127be36548b6ee144e322c7bf', 1, 0, 0, '2023-06-20 08:37:58'),
(10, 'ALMON', '$2y$10$UNSrJV9nXAsPhyMPVqHsEOPHC/hmwGZiNsNXnCIPHF8CzEc92Pfwe', 'ALMON', 'DEVERA', 'ALMON@gmail.com', 'STA BARBARA', '09075532', '', '376a0ac0fc2880e94bb4e6ed1a6d2c71', 1, 0, 0, '2023-06-05 13:55:07'),
(11, 'admin', '$2y$10$h824kvbpjTY0QE6aBqMOMeuUDYCmKU0zmEvTI0wZRzyuzYOs0sdP6', 'KOLKOL', 'KOLKOL', 'KOLKOL@gmail.com', '', '', '', '4d61a63a38940e64013b1778b811cfb4', 1, 0, 0, '2023-06-13 12:55:19'),
(12, 'USERNAME', '$2y$10$QfnaWg.exskto0LKy9U4.OUzGsy7qciNF/eQ.UFBZzgNAe3pVneGu', 'USERNAME', 'USERNAME', 'philipmoriz32@gmail.com', 'STA BARBARA', '09075532241', '', 'c5fffcd32d5a456c5144f09f50be32e6', 1, 0, 0, '2023-07-11 13:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `orderID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `rc_num` varchar(255) DEFAULT NULL,
  `total` float NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `status` text NOT NULL,
  `orderstatus` varchar(255) DEFAULT 'for approval',
  `createDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`orderID`, `userID`, `rc_num`, `total`, `address`, `phone`, `status`, `orderstatus`, `createDate`) VALUES
(1, 12, '000001', 1670, '09075532241', '', 'successful', 'TO PREPARE', '2023-07-13'),
(2, 12, '000002', 60, '09075532241', '', 'successful', 'for approval', '2023-07-13'),
(3, 12, '000003', 140, '09075532241', '', 'successful', 'TO PREPARE', '2023-07-13'),
(4, 12, '000004', 210, '09075532241', '', 'successful', 'for approval', '2023-07-13'),
(5, 12, '000005', 58, '09075532241', '', 'successful', 'for approval', '2023-07-13'),
(6, 12, '000006', 210, '09075532241', '', 'successful', 'for approval', '2023-07-13'),
(7, 12, '000007', 240, '09075532241', '', 'successful', 'for approval', '2023-07-13'),
(8, 12, '000008', 2200, '09075532241', '', 'successful', 'TO PREPARE', '2023-07-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`cartItemID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_message`
--
ALTER TABLE `contact_us_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderItemID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `products_test`
--
ALTER TABLE `products_test`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `rc_number`
--
ALTER TABLE `rc_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_cart_info`
--
ALTER TABLE `table_cart_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tranID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `unanswered`
--
ALTER TABLE `unanswered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `cartItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us_message`
--
ALTER TABLE `contact_us_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `products_test`
--
ALTER TABLE `products_test`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rc_number`
--
ALTER TABLE `rc_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `table_cart_info`
--
ALTER TABLE `table_cart_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tranID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unanswered`
--
ALTER TABLE `unanswered`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
