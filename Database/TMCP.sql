-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2024 at 02:26 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u412656477_tmcp`
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
(9, 17),
(10, 16),
(11, 18),
(12, 19),
(13, 20);

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

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`cartItemID`, `productID`, `cartID`, `price`, `quantity`, `message_c`, `createDate`) VALUES
(35, 45, 10, 100, 1, NULL, '2024-02-03 14:00:02');

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
(3, 'cakepop', 'cake shaped as lollipops'),
(4, 'cookie', 'baked circular or differently shaped biscuits'),
(6, 'brownie', 'chocolate fudge cakes'),
(7, 'pastry', 'cakes that don\'t fall in any other categories'),
(9, 'bread ', 'soft and fluffy');

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
(2, 'How can I place an order for your cakes and pastries?', 'You can place an order by visiting our bakery in person or by contacting us via phone or email. We also offer online ordering through our website.'),
(3, 'What is the lead time for placing an order?', 'We generally require at least 24-48 hours\' notice for standard cake and pastry orders. However, custom or specialty orders may require additional time. It\'s best to check with us in advance to ensure availability.'),
(4, 'Do you offer delivery services?', 'No, we only offer store pick up.'),
(5, 'Can I request a custom cake design?', 'Absolutely! We love creating unique and personalized cakes for our customers. Please provide us with your design ideas, theme, and any specific requirements, and we\'ll work with you to bring your vision to life.'),
(6, 'Do you accommodate dietary restrictions or allergies?', 'We strive to cater to different dietary needs. Please inform us of any specific dietary restrictions or allergies you have, and we will let you know if we can accommodate them. However, please note that while we take precautions, cross-contamination may occur in our bakery.'),
(7, 'What are your payment options?', 'We accept cash payments as well as gcash. But now we only accept cash payments'),
(8, 'Can I cancel or modify my order?', 'Modification of orders may be possible, depending on the status of the order and the lead time. Please contact us as soon as possible to discuss any changes. Cancellations of orders are not allowed.'),
(9, 'What is your policy on refunds and returns?', 'We dont allow refunds or return. We always ensure our products are fresh and newly made.'),
(10, 'Are your products nut-free or gluten-free?', 'While we offer some nut-free and gluten-free options, please note that our products are prepared in a kitchen that handles nuts, gluten, and other allergens. We cannot guarantee a completely nut-free or gluten-free environment.'),
(11, 'Do you offer wedding cake services?', 'Yes, we specialize in creating beautiful and delicious wedding cakes. We provide consultations to discuss your preferences, design ideas, and budget. Contact us to schedule a consultation appointment.'),
(12, 'Can I order a cake for a same-day pickup?', 'Same-day orders may be possible depending on our availability and the type of cake or pastry you require. We recommend contacting us directly to check if we can accommodate your request.'),
(13, 'How far in advance should I place my cake order?', 'We recommend placing your cake order at least 48 hours in advance to ensure availability. For custom or larger cakes, it\'s best to order at least one week in advance to allow for proper preparation and design.'),
(14, 'Can I cancel or reschedule my order?', 'Cancellation or rescheduling requests should be made as soon as possible. Depending on the status of the order and our production schedule, we will do our best to accommodate your request. Please note that last-minute cancellations may incur a cancellation fee.'),
(15, 'Can I request a specific frosting or icing for my cake?', 'Yes, we offer a variety of frostings and icings to suit different preferences. From buttercream to cream cheese frosting, you can discuss your preferences with us when placing your order.'),
(16, 'Can I visit your bakery to see the available cake designs and options?', 'Absolutely! You are welcome to visit our bakery to see our available cake designs and discuss your preferences with our staff. We recommend scheduling an appointment for personalized assistance.'),
(17, 'How long can I store the cakes and pastries?', 'Our cakes and pastries are best enjoyed fresh. Cakes can typically be stored in the refrigerator for 2-3 days, while pastries are best consumed within 1-2 days. We provide storage instructions with each order to ensure the best taste and quality.'),
(18, 'Can I request a sample of your cakes before placing an order?', 'We do not offer individual cake samples, but we can provide references and photos of our previous work to help you make an informed decision. We also offer cake tasting sessions for weddings and larger events.'),
(19, 'Can I request specific decorations or themes for my cake?', 'Absolutely! We are happy to accommodate specific decorations and themes for your cake. Discuss your preferences and any special requests with us during the order placement process.'),
(20, 'Can I request a specific flavor combination that is not listed on your menu?', 'Absolutely! We are open to custom flavor combinations. If you have a specific flavor in mind that is not listed on our menu, please let us know, and we will do our best to create it for you.'),
(21, 'Can I provide my own design or image for a custom cake?', 'Yes, you can provide your own design or image for a custom cake. Please share the design or image with us during the order placement process, and we will work with you to bring your vision to life.'),
(22, 'Are your ingredients sourced locally or organic?', 'We strive to source our ingredients locally whenever possible to support local producers. While not all ingredients may be organic, we prioritize quality and freshness in our ingredient selection.'),
(23, 'Can I order a cake for a wedding or event that is several months away?', 'Yes, you can place an order for a cake for a future wedding or event. We recommend reaching out to us well in advance to secure your date and discuss the details of your order.'),
(24, 'Do you offer cake decorating classes or workshops?', 'Currently, we do not offer cake decorating classes or workshops. However, we may host special events or collaborations in the future. Stay updated on our website or social media channels for any announcements.'),
(25, 'Can I request a rush order if I need a cake on short notice?', 'Depending on our availability, we may be able to accommodate rush orders on short notice. Please contact us directly to discuss your requirements, and we will do our best to assist you.'),
(26, 'How do I provide feedback or review your products and services?', 'We appreciate your feedback! You can provide feedback or review our products and services through our website, social media platforms, or by contacting us directly. Your input helps us improve and serve you better.'),
(27, 'Are your cakes and pastries made fresh to order?', 'Yes, we take pride in creating fresh and delicious cakes and pastries. We bake our products to order to ensure their freshness and quality. We do not keep pre-made cakes or pastries in stock.'),
(28, 'Are your products suitable for children\'s birthday parties?', 'Yes, our cakes and pastries are suitable for children\'s birthday parties. We offer a range of flavors and designs that are loved by kids. Let us know the theme or preferences, and we will create something special for the celebration.'),
(29, 'Can I request a custom cake design that incorporates a specific theme or character?', 'Yes, we love creating custom cake designs! If you have a specific theme or character in mind, please provide us with the details when placing your order. We will work with you to bring your vision to life.'),
(30, 'Can I request a specific design or message to be added to the cake?', 'Absolutely! We can add custom designs, messages, or even edible images to your cake. Let us know your preferences when placing your order, and we will incorporate them into the design.Call us or visit our store!'),
(31, 'Can I request a refund or exchange if I am not satisfied with my order?', 'No'),
(33, 'love you', 'love you too'),
(36, 'Customize cake', 'call us or go to our physical store'),
(37, 'Mobile number ', 'here is our mobile number: 09350680370'),
(38, 'ano number nyo', 'here is our mobile number: 09350680370'),
(39, 'How much is your downpayment for personalize or customize cakes?', '50% of the total price'),
(40, 'Any cake available ', 'You can check our website or visit our store to know all the available cakes.'),
(41, 'Customize cake pls', 'call us or go to our physical store	'),
(42, 'hello can i order? ', 'Yes, You can check our website or visit our store to know all the available cakes.	'),
(43, 'any available cake', 'You can check our website or visit our store to know all the available cakes.	'),
(44, 'Any available cake ASAP', 'You can check our website or visit our store to know all the available cakes'),
(45, 'Any available cake ASAP?', 'You can check our website or visit our store to know all the available cakes.	'),
(46, 'rush cake pls', 'You can check our website or visit our store to know all the available cakes.	'),
(47, 'sample design ', 'You can look to our facebook page for more samples'),
(48, 'Hm for cake?', 'You can check our website or visit our store to know all the available cakes.'),
(49, 'Shop Location?', 'We are located at Balisi Street near Pancho\'s pizza Aparri Cagayan.'),
(50, 'where to pick up orders', 'We are located at Balisi Street near Pancho\'s pizza Aparri Cagayan.'),
(51, 'where to pick up orders?', 'We are located at Balisi Street near Pancho\'s pizza Aparri Cagayan.');

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
(3, 'Jansen Gola', 'jevicjansen@gmail.com', '09948413968', '1234', 'Hello', 'SOLVED', '2024-01-08'),
(4, 'Nishant Sharma', 'nishant.developer22@gmail.com', '1234567890', '1234567890', 'Hello team,   \r\n \r\nWe are a Website Design and Development firm with over 8 years of experience in the field of Web Designing and Development. \r\n \r\nWe offer following services at competitive prices:\r\n \r\n•         Web Designing – (Responsive, Re-Designing)', 'PENDING', '2024-01-16'),
(5, 'Raymondjum', 'no.reply.SebastianBonnet@gmail.com', '87941584799', '3547', 'Hi-ya! tmcp.online \r\n \r\nDid you know that it is possible to send business offer completely legitimately? We present a new method of sending requests through feedback forms. These kinds of forms can be found on many websites. \r\nWhen such proposals are subm', 'PENDING', '2024-01-22'),
(6, 'Seymour Pumpkin', 'pumpkin.seymour56@gmail.com', '', '', 'I’ve been working with freelancers for over nine years now. \r\n\r\nOne of the biggest things I want businesses to know about working with freelancers is how much time and money they can save by hiring freelancers for projects. \r\n\r\nWhether you’re a multi-leve', 'PENDING', '2024-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datetime_field` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

INSERT INTO `orderitem` (`orderItemID`, `randidx`, `userID`, `productID`, `orderID`, `paymentMethod`, `price`, `quantity`, `status`, `statusx`, `datepickup`, `timepickup`, `cake_message`, `tranID`, `createDate`) VALUES
(31, '0000', 17, 45, 93, '0', 100, 1, 2, 'PAID', '2024-01-29', '08:57:00', NULL, NULL, '2024-01-28 08:58:07'),
(32, '000093', 17, 47, 94, '0', 10, 1, 2, 'PAID', '2024-01-30', '16:58:00', NULL, NULL, '2024-01-28 09:01:01'),
(33, '000093', 17, 6, 94, '0', 20, 2, 2, 'PAID', '2024-01-30', '16:58:00', NULL, NULL, '2024-01-28 09:01:01'),
(34, '000094', 16, 15, 95, '0', 46, 1, 2, 'PAID', '2024-02-12', '14:24:00', NULL, NULL, '2024-02-03 14:06:39'),
(35, '000095', 20, 4, 96, '0', 5, 1, 2, 'PAID', '2024-02-12', '10:01:00', NULL, NULL, '2024-02-03 14:06:43');

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
(2, 1, 'Pandesal', 'Pandesal are soft, slightly sweet yeast rolls. ', 'Assets/images/products/img20240110111458.jpg', 3, 100, '9', 2),
(3, 1, 'Putok', 'A lean type of bread with six cuts on the surface forming a flower-like appearance and topped with refined sugar.', 'Assets/images/products/img20240110112601.png', 6, 20, '9', 2),
(4, 1, 'Crinkles', 'Soft and moist, fudge-like chocolate cookie coated in confectioner\'s sugar.', 'Assets/images/products/img20240110112813.png', 5, 40, '9', 2),
(5, 1, 'Donut', 'Wheel shaped fried bread dredged in sugar.', 'Assets/images/products/img20240110113201.png', 10, 5, '9', 1),
(6, 1, 'Butter cheese mamon', 'Butter cheese mamon', 'Assets/images/products/img20240110114455.jpg', 20, 5, '7', 1),
(7, 1, 'New year cake', 'This delightful cake is the perfect way to ring in the New Year. It\'s decorated with a festive Happy New Year sticker and sits atop a pile of gold coins, symbolizing prosperity and fortune in the coming year. The cake itself is a delicious moist flavor, and is sure to please everyone at your New Year\'s Eve party. Product details: Delicious moist flavor Festive Happy New Year sticker Sits on a pile of gold coins Perfect for New Year\'s Eve celebrations', 'Assets/images/products/img20240110124422.jpg', 500, 10, '1', 1),
(8, 1, 'chocolate cake', 'The best chocolate ', 'Assets/images/products/img20240110125401.jpg', 400, 10, '1', 1),
(9, 1, 'Personalized cake', 'Personalized cake', 'Assets/images/products/img20240110125842.jpg', 800, 1, '1', 2),
(10, 1, 'Personalized cake', 'Personalized cake', 'Assets/images/products/img20240110125954.jpg', 800, 1, '1', 1),
(11, 1, 'Personalized cake', 'Personalized cake', 'Assets/images/products/img20240110130053.jpg', 800, 1, '1', 1),
(12, 1, 'Personalized cake', 'Personalized cake', 'Assets/images/products/img20240110130131.jpg', 800, 1, '1', 1),
(13, 1, 'Hopia', 'The favorite flaky pastry treats with distinct onion flavor.', 'Assets/images/products/img20240110115642.png', 5, 10, '7', 2),
(14, 1, 'Buns', 'A soft creamy bread and perfect pairing for a cup of coffee.', 'Assets/images/products/img20240110115916.png', 25, 15, '7', 2),
(15, 1, 'Regular Sliced Bread', 'An all-time favorite bread that is soft and has a fine crumb. It has a moderately sweet taste that truly compliments any spread or dressing and can be consumed even without them.', 'Assets/images/products/img20240110120640.jpg', 46, 10, '7', 2),
(16, 0, 'Pecan brownie', 'This brownie contains pecan nuts and offers a wider range of textures. A pure chef-d\'oeuvre!', 'Assets\\images\\products\\Brownie\\Brownie_4.png', 29, 20, '', 0),
(17, 0, 'Raspberry  brownie', 'Delicate raspberry brownie that brings the perfect balance between fruitiness and chocolate ! Raspberry is one of the best fruits that compliments the cacao flavor.', 'Assets\\images\\products\\Brownie\\Brownie_5.png', 29, 20, '', 0),
(18, 0, 'Walnut brownie', 'This brownie contains roasted walnuts that accentuates the cacao in the brownie. The nutty flavor and particular texture of the roasted walnut compliments the delicateness and fudgy texture of the original brownie.', 'Assets\\images\\products\\Brownie\\Brownie_6.png', 29, 20, '', 0),
(19, 0, 'White-choc brownie', 'White chocolate provides for the adequate moisture that makes up the perfect brownie!', 'Assets\\images\\products\\Brownie\\Brownie_7.png', 40, 30, '', 0),
(20, 0, 'Choc-chip blondie', 'Blondie is another word for a longer brownie but not necessarily dominated by chocolate! This choc chip blondie offers the warmth and purity of vanilla and the fudgy texture of the chocolate chips.', 'Assets\\images\\products\\Brownie\\Brownie_8.png', 40, 30, '', 0),
(21, 0, 'Raspberry swirl blondie', 'A fruity flavor that perfectly fits the moistness of a good blondie.', 'Assets\\images\\products\\Brownie\\Brownie_9.png', 40, 25, '', 0),
(22, 0, 'Lemon blondie', 'Lemon flavored blondie provides for the perfect balance between the sourness of the lemon and the sweetness of the blondie.', 'Assets\\images\\products\\Brownie\\Brownie_10.png', 59, 35, '', 0),
(23, 0, 'Christmas box x 24', 'Brownie box with 4 pieces of 6 unique flavors:<br><br>1. Walnut Brownie,<br>2. Cream cheese Brownie,<br>3. Original Brownie,<br>4. Choc-chip Brownie,<br>5. Raspberry swirl Brownie,<br>6. Double choc Brownie.<br>', 'Assets\\images\\products\\Brownie\\Brownie_11.png', 700, 600, '2', 0),
(24, 0, 'Christmas brownie bars x 8', 'The box contains 8 brownie bars, topped with white chocolate with a hint of candy cane. A limited edition by MALAKO!', 'Assets\\images\\products\\Brownie\\Brownie_12.png', 320, 250, '', 0),
(37, 1, 'Round cake', 'Beautiful multi flavored cake with interior and exterior rainbow colors! 4 layers of different cakes in 1!', 'Assets\\images\\products\\Cakes\\Cake_1.png', 380, 12, '1', 2),
(38, 0, 'Elegant floral wedding cake', 'Multi layered wedding cake decorated with fondant and sugar flowers. It\'s layers and sandwiched with several frostings: <br>> White chocolate ganache<br>> Vanilla frosting <br>> Chocolate and raspberry frosting<br>', 'Assets\\images\\products\\Cakes\\Cake_2.png', 2200, 2100, '', 0),
(39, 1, 'CHOCOLATE WHOLE ROLL', 'Choco sponge cake filled and iced with chocolate frosting. Decorated with wavy design.', 'Assets/images/products/img20240110121707.png', 350, 8, '1', 3),
(40, 1, 'CHOCOLATE HALF ROLL', 'Long multi-layered cake with golden white chocolate drips. One of our trendiest and candid looking cake ! It\'s delicious with a combination of our best compatible flavors.', 'Assets/images/products/img20240110121837.png', 180, 8, '1', 3),
(41, 1, 'Yema cake whole roll', 'Yema cake whole roll', 'Assets/images/products/img20240110122512.jpg', 380, 3, '1', 2),
(42, 1, 'Yema cake half roll', 'Yema cake half roll', 'Assets/images/products/img20240110122548.jpg', 180, 3, '1', 3),
(43, 0, 'Dedication cake', 'Dedication cake	', 'Assets/images/products/img20240110125001.jpg', 500, 3, '1', 0),
(44, 0, 'Choc-drip coffee cake', 'Amazing coffee cake with coffee beans flavored buttercream and a dripping chocolate ganache.', 'Assets\\images\\products\\Cakes\\Cake_8.png', 1000, 700, '', 0),
(45, 1, 'Leche flan', 'A rich custard dessert made with eggs, milk and sugar baked to the right tenderness and smoothness.', 'Assets/images/products/img20240110123155.jpg', 100, 10, '7', 3),
(46, 1, 'FLUFFY MAMON', 'Rich and buttery cake with light texture baked individually in crown shaped baking tins and brushed with butter', 'Assets/images/products/img20240110123425.png', 5, 12, '7', 3),
(47, 1, 'Cheesy Ensaimada	', 'Soft, moist bread topped with butter, sugar and cheesy deliciousness.	', 'Assets/images/products/img20240110124223.png', 10, 12, '7', 2),
(48, 0, 'M&M and Choc-chip cookie', 'Cookie with M&M and Chocolate chips.', 'Assets\\images\\products\\Cookie\\Cookie_6.png', 15, 12, '', 0),
(49, 0, 'Chocolate sandwich cookie', '2 chocolate cookies filled with whipped cream too satisfy any sugar cravings!', 'Assets\\images\\products\\Cookie\\Cookie_7.png', 30, 25, '', 0),
(50, 0, 'Choc-chip and M&M sandwich cookie', 'M&M and Choc-chip cookies with whipped cream', 'Assets\\images\\products\\Cookie\\Cookie_8.png', 30, 25, '', 0),
(51, 0, 'Oats cookies', 'Cookies with oats for a healthier option.', 'Assets\\images\\products\\Cookie\\Cookie_9.png', 15, 10, '', 0),
(52, 0, 'Dark-choc and mint cookie', 'Dark chocolate cookie with a hint of mint', 'Assets\\images\\products\\Cookie\\Cookie_10.png', 15, 10, '', 0);

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
(67, 1),
(68, 1),
(69, 1),
(70, 6);

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
(68, 1),
(69, 2),
(70, 2),
(71, 2);

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
(93, '0000', 17, '2024-01-28'),
(94, '000093', 17, '2024-01-28'),
(95, '000094', 16, '2024-01-30'),
(96, '000095', 20, '2024-02-03');

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
(37, 17, NULL, '0', 'TO PREPARE', '2024-01-28 08:57:58'),
(38, 17, NULL, '0000', 'ORDER COMPLETED', '2024-01-28 08:58:07'),
(39, 17, NULL, '93', 'TO PREPARE', '2024-01-28 09:00:40'),
(40, 17, NULL, '000093', 'ORDER COMPLETED', '2024-01-28 09:01:01'),
(41, 16, NULL, '94', 'TO PREPARE', '2024-01-30 06:33:16'),
(42, 20, NULL, '95', 'TO PREPARE', '2024-02-03 14:06:34'),
(43, 16, NULL, '000094', 'ORDER COMPLETED', '2024-02-03 14:06:39'),
(44, 20, NULL, '000095', 'ORDER COMPLETED', '2024-02-03 14:06:43');

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
(1, 'img20240118125931.png', 'ADMIN', 'ADMIN', 'TM', 'C', 'CP', 'Centro 12 Balisi Street. Aparri Cagayan, Philippines', '09072345235', 'FF', 'FF', '0', 'ADMIN', '1'),
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
-- Table structure for table `testimonials_table`
--

CREATE TABLE `testimonials_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(25, 17, 93, '0', 'PICKUP', '2024-01-29', '08:57:00', 'Approved', 2, NULL, '2024-01-28 08:58:07'),
(26, 17, 94, '93', 'PICKUP', '2024-01-30', '16:58:00', 'Approved', 2, NULL, '2024-01-28 09:01:01'),
(27, 16, 95, '94', 'PICKUP', '2024-02-12', '14:24:00', 'Approved', 2, NULL, '2024-02-03 14:06:39'),
(28, 20, 96, '95', 'PICKUP', '2024-02-12', '10:01:00', 'Approved', 2, NULL, '2024-02-03 14:06:43');

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
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `uname`, `pass`, `fname`, `lname`, `email`, `address`, `phone`, `description`, `vkey`, `verified`, `isSubscribed`, `isAdmin`, `createDate`, `profile_photo`) VALUES
(14, 'pedro', '$2y$10$kh/JpxBwzPhwGGy4GcCFZOD8kqF/kCHTP7g8RgpoXS2scNW2YlzYC', 'Pedro', 'Goy', 'aomirae77@gmail.com', 'Macanaya', '09999999999', '', '3a9ca14798257b2d8a4dc219709937cb', 1, 0, 0, '2024-01-28 09:23:00', NULL),
(15, 'arganoza14', '$2y$10$iIgjPLKFiY0xl7UGaBfPy.GwFcehpQGZdDIvUjrHu/S2EVYADVq4i', 'alex', 'arganoza', 'alexmalupetans@gmail.com', 'Tuguegarao City', '09498191612', '', '97ae476c37e8028f5384e041e42d7841', 1, 0, 0, '2024-01-08 12:16:38', NULL),
(16, 'admin', '$2y$10$ajzQpY0qS536NgT8IIT1Q.AP/yIfWaUifcFJLU5T49vXJiSHGHdOy', 'Admin', 'TMCP', 'TMCP@gmail.com', 'Centro 12 Balisi Street. Aparri Cagayan, Philippines', '09350680370', 'EVERY BATCH FROM SCRATCH\r\n', '28ea85bcb3b8ed3c6ed155e223c2f29a', 1, 0, 1, '2024-01-28 09:20:23', 'logo.png'),
(20, 'Pizza', '$2y$10$rEBJRoaSk1qBKGxq498ji.71fSgyKnCURtOkS9ozi5h/Gas1c05P.', 'Admin', 'Cinense', 'jerzycinense2@gmail.com', '34, Purok 1', '09195431910', '', 'a7d8f7fa68cc2b029c66aa4d4578a42c', 1, 0, 0, '2024-02-03 14:01:22', NULL);

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
(25, 17, '0', 100, '34, Purok 1', '', 'successful', 'TO PREPARE', '2024-01-28'),
(26, 17, '93', 50, '34, Purok 1', '', 'successful', 'TO PREPARE', '2024-01-28'),
(27, 16, '94', 46, 'Centro 12 Balisi Street. Aparri Cagayan, Philippines', '', 'successful', 'TO PREPARE', '2024-01-30'),
(28, 20, '95', 5, '34, Purok 1', '', 'successful', 'TO PREPARE', '2024-02-03');

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
  MODIFY `cartID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `cartItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `contact_us_message`
--
ALTER TABLE `contact_us_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `rc_number`
--
ALTER TABLE `rc_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `table_cart_info`
--
ALTER TABLE `table_cart_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tranID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
