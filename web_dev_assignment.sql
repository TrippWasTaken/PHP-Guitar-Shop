-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 03:54 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web dev assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`) VALUES
(2, 1, 29),
(3, 1, 32),
(4, 1, 32),
(5, 1, 33),
(6, 1, 29),
(7, 1, 29),
(8, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(6) NOT NULL,
  `p_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `p_img` varchar(100) COLLATE utf8_bin NOT NULL,
  `p_about` varchar(5000) COLLATE utf8_bin NOT NULL,
  `p_price` int(6) NOT NULL,
  `p_avalibility` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_img`, `p_about`, `p_price`, `p_avalibility`) VALUES
(29, 'TELECASTER STYLE', 'product1.jpg', '            <p id=\'Product-desc\'>\r\n               Light in weight, but not sound, the Deluxe Telecaster Thinline is crafted with timelessly elegant style and authentic Fender tone. \r\n			   Crisp and articulate, with a versatile voice that cuts through a busy mix, this stage-tested design is the ideal combination of modern features and traditional aesthetics.\r\n			    With a little bit of extra \'magic\' up its sleeve, this instrument is as flexible as it is distinctly stylish.\r\n            </p>\r\n\r\n            <h4 id=\'product-features\'>Features</h4>\r\n            <ul class=\'list-group\'>\r\n                <ul>\r\n                    <li>Single cutaway semi-hollowbody electric guitar</li>\r\n                    <li>Two Vintage Noiseless Tele pickups (neck and bridge)</li>\r\n                    <li>Four-way switching includes series wiring</li>\r\n                    <li>Six-saddle string-through-body Tele bridge with block saddles</li>\r\n					<li>12 inch-radius fingerboard; contoured neck heel; locking tuning machines</li>\r\n					<li>Includes deluxe gig bag</li>\r\n                </ul>\r\n            </ul>', 1400, 'Available'),
(30, '2018 LIMITED EDITION METEORA', 'product4.jpg', '            <p id=\'Product-desc\'>\r\n				Motion meets balance with a touch of elegance with The Meteora, a sleek new limited-edition body shape that carries on our tradition of arresting aesthetic design. \r\n				The sound is as propulsive as its visually stimulating lines, it wants to roar on stage, thanks to the two biting Custom Shop Tele pickups. \r\n				With its brand-new offset body shape, The Meteora has guts and grace and is distinctively Fender.\r\n            </p>\r\n\r\n            <h4 id=\'product-features\'>Features</h4>\r\n            <ul class=\'list-group\'>\r\n                <ul>\r\n                    <li>Ash body with lacquer finish</li>\r\n                    <li>Two Vintage Noiseless Tele pickups (neck and bridge)</li>\r\n                    <li>Custom Shop vintage-style Tele bridge pickup and Custom Shop Twisted Tele neck pickup</li>\r\n                    <li>American Professional Tele bridge with compensated brass saddles; Limited Edition micro-tilt neck plate</li>\r\n					<li>Includes hardshell case and Certificate of Authenticity</li>\r\n                </ul>\r\n            </ul>', 2000, 'Very Limited'),
(31, 'STRATOCASTER STYLE', 'product3.jpg', '            <p id=\'Product-desc\'>\r\n				Nail Buddy Guys stinging tone and vibe on the dot with the Buddy Guy Standard Stratocaster. \r\n				With a bold polka-dot finish as flamboyant as Guy himself, its likely one of the most distinctive Strat models you\'ll ever lay eyes (and hands) on. \r\n				And with pure tone and vintage-style features, it\'s a superbly spot-on performer worthy of one of the greatest names in electric blues.\r\n            </p>\r\n\r\n            <h4 id=\'product-features\'>Features</h4>\r\n            <ul class=\'list-group\'>\r\n                <ul>\r\n                    <li>Polka-dot finish</li>\r\n                    <li>Soft \'V\'-shaped neck profile</li>\r\n                    <li>9.5 inch-radius maple fingerboard with 21 medium jumbo frets</li>\r\n                    <li>Standard single-coil Stratocaster pickups with five-way switchinge</li>\r\n					<li>Vintage-style synchronized tremolo bridge</li>\r\n                </ul>\r\n            </ul>', 900, 'Available'),
(32, 'JAZZMASTER STYLE', 'product2.jpg', '            <p id=\'Product-desc\'>\r\n					Sixty years ago, in 1958, Leo Fender introduced the Fender Jazzmaster as the top-of-the-line electric guitar. \r\n					In 1966 we updated the instrument with a bound neck, block inlays, and as a special aesthetic touch, a slick-looking matching painted headstock. \r\n					These stylish visual cues-as well as the rich, multi-dimensional sound—made this one of the most sought-after Jazzmaster models. \r\n					We reproduced these sterling features in the 60th Anniversary Classic Jazzmaster, adding a few modern enhancements to update this glorious instrument for the adventurous players of today.\r\n            </p>\r\n\r\n            <h4 id=\'product-features\'>Features</h4>\r\n            <ul class=\'list-group\'>\r\n                <ul>\r\n                    <li>Alder body with lacquer finish</li>\r\n                    <li>Two Pure Vintage \'65 single-coil Jazzmaster pickups</li>\r\n                    <li>9.5 inch-radius maple fingerboard with 21 medium jumbo frets</li>\r\n                    <li>Floating tremolo bridge with lock button and push-in arm; vintage-style hardware</li>\r\n					<li>Includes vintage-style hardshell case</li>\r\n                </ul>\r\n            </ul>', 2000, 'Available'),
(33, 'TELEMASTER OFFSET TELECASTER', 'product5.jpg', '            <p id=\'Product-desc\'>\r\n				The Offset Telecaster originally debuted in the Fender Custom Shop and has since become a fan favorite. \r\n				The combination of a Jazzmaster body with Telecaster neck and hardware is a match made in heaven for many players. \r\n				This new Japanese-made Offset Tele features an all-mahogany body, mahogany neck with rosewood fingerboard, vintage-style Tele bridge pickup and a soapbar rhythm pickup.\r\n            </p>\r\n\r\n            <h4 id=\'product-features\'>Features</h4>\r\n            <ul class=\'list-group\'>\r\n                <ul>\r\n                    <li>Alder body with lacquer finish</li>\r\n                    <li>Two Pure Vintage \'65 single-coil Jazzmaster pickups</li>\r\n                    <li>9.5 inch-radius maple fingerboard with 21 medium jumbo frets</li>\r\n                    <li>Floating tremolo bridge with lock button and push-in arm; vintage-style hardware</li>\r\n					<li>Includes vintage-style hardshell case</li>\r\n                </ul>\r\n            </ul>', 1500, 'Limited');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(1024) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `profile_img` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'defaultpic.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`uid`, `fullname`, `username`, `email`, `pwd`, `address`, `profile_img`) VALUES
(1, 'Konrad Knecht', 'jeff', 'konrad.knecht@gmail.com', '$2y$10$rTzSXaGeKLZ9fdxf.M/hOO6TvdNtb2RShEhc.X1jH1W1zxZh7DX2K', 'ffff', 'profile-jeff.jpg'),
(2, 'tom', 'tom', 'lol@email.com', '$2y$10$oWSHSqVB56/e3sF6IQlPiuHIFKMSm62JVjeskTLFcOCnUU3LB8YEC', NULL, 'defaultpic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`uid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
