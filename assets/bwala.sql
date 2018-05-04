-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 02:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accountType` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullName`, `userName`, `password`, `email`, `phone`, `address`, `image`, `accountType`, `accountID`, `created`, `modified`, `status`) VALUES
(1, 'nell dugang', 'nell', '1234', 'nell.dugang@gmail.com', '99999999', '52 E. Ragas Street Santa Ana', '', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 'admin', 'admin', '1234', 'admin@admin.com', '1234', 'Outerspace.', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 'Testicle', 'Test', '1234', 'testicle@test.com', '9999', '52 tinesticle street', '', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 'test', 'test1', '1234', 'test@test.com', '1234', 'test', '', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 'asdsd', 'asdsadasd', '1234', '', '', '', '', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(101, 1, 39998.00, '2018-03-22 12:23:18', '2018-03-22 12:23:18', '1'),
(102, 1, 19999.00, '2018-03-22 14:29:15', '2018-03-22 14:29:15', '1'),
(103, 1, 41198.00, '2018-03-22 14:30:24', '2018-03-22 14:30:24', '1'),
(104, 1, 92198.00, '2018-03-22 14:33:03', '2018-03-22 14:33:03', '1'),
(105, 5, 12000.00, '2018-03-22 14:41:23', '2018-03-22 14:41:23', '1'),
(106, 5, 1200.00, '2018-03-22 16:40:42', '2018-03-22 16:40:42', '1'),
(107, 1, 59997.00, '2018-03-23 07:01:30', '2018-03-23 07:01:30', '1'),
(108, 5, 25000.00, '2018-03-23 10:24:12', '2018-03-23 10:24:12', '1'),
(109, 5, 13000.00, '2018-03-23 13:27:41', '2018-03-23 13:27:41', '1'),
(110, 5, 15500.00, '2018-03-25 03:35:27', '2018-03-25 03:35:27', '1'),
(111, 1, 13000.00, '2018-03-25 03:37:08', '2018-03-25 03:37:08', '1'),
(112, 1, 13000.00, '2018-03-25 04:07:11', '2018-03-25 04:07:11', '1'),
(113, 7, 6000.00, '2018-03-25 04:33:16', '2018-03-25 04:33:16', '1'),
(114, 5, 39000.00, '2018-03-25 06:19:41', '2018-03-25 06:19:41', '1'),
(115, 1, 39000.00, '2018-03-25 07:35:42', '2018-03-25 07:35:42', '1'),
(116, 1, 39000.00, '2018-03-25 07:35:48', '2018-03-25 07:35:48', '1'),
(117, 1, 39000.00, '2018-03-25 07:36:27', '2018-03-25 07:36:27', '1'),
(118, 1, 46000.00, '2018-03-25 07:39:36', '2018-03-25 07:39:36', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(15, 101, 4, 2),
(16, 102, 4, 1),
(17, 103, 3, 1),
(18, 103, 4, 2),
(19, 104, 5, 5),
(20, 104, 2, 1),
(21, 104, 3, 1),
(22, 104, 4, 2),
(23, 105, 12, 1),
(24, 106, 3, 1),
(25, 107, 4, 3),
(26, 108, 16, 1),
(27, 108, 14, 1),
(28, 109, 13, 1),
(29, 109, 2, 1),
(30, 110, 34, 1),
(31, 110, 15, 1),
(32, 111, 26, 1),
(33, 111, 19, 1),
(34, 112, 15, 1),
(35, 113, 30, 1),
(36, 114, 13, 2),
(37, 114, 2, 3),
(38, 114, 14, 1),
(39, 115, 15, 3),
(40, 116, 15, 3),
(41, 117, 15, 3),
(42, 118, 35, 2),
(43, 118, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `productDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productType`, `price`, `productDesc`, `size`, `picture`, `productID`, `created`, `modified`, `status`) VALUES
(2, 'Misfortune V2', 'boardshort', 1000.00, 'The Spirit is a downhill specialists dream ride and great fit for the rider who prefers a more compact platform. The single-ply deck has just enough concave to rail turns or throw mega-slides and a comfortable micro-drop for locking in at speed. We added multiple wheel base options and aggressive ROAM grip into a deck that is waterproof, ultra lightweight and ultra durable. Our single-ply, vert-lam wood core and 60D thane rail deliver a responsive and highperformance ride. Hand-crafted in the U.S.A at The Distillery.', 'Length: 33.55', '1521869529_2417.jpg', 1, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(13, 'Joy Driver', 'boardshort', 12000.00, 'The 2018 TransWorld Snowboarding All-Mountain Good Wood Award winning Joy Driver delivers exactly what you want from your snowboard exactly when you want it. Traditional camber and setback stance combine with K2’s industry leading Bambooyah™ core to create a powerful, precise feel for sending big drops, railing high speed carves, or getting after it in any condition.', 'Length – 36″  Width – 9.75″  Wheelbase – 23.5 – 24.5″', '1521869548_9539.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(14, 'Turbo Dream Wide', 'boardshort', 12000.00, 'Built with ultra smooth edge-to-edge transitions and playful freeriding in mind, the Turbo Dream feels comfortable being a quiver in and of itself. Its all-terrain rocker works in harmony with our Tweekend™ tip and tail to deliver a smooth and predictable ride with more ride-able surface area for better float in powder and all-mountain charging.', 'Length - 34', '1521869557_1348.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(15, 'Eighty Seven', 'boardshort', 13000.00, 'Aimed at bringing surf vibes to every nook and cranny of the mountain, the Eighty Seven boasts K2’s Volume Shift™ technology to provide endless energy and maneuverability. Complete with traditional camber/all-terrain rocker profile combo and durable Bambooyah™ core, the award-winning Eighty Seven offers a premium performance on a shape that pays tribute to the past. ', '13000', '1521869564_8153.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(16, 'WWW Wide', 'boardshort', 13000.00, 'The board of choice for urban night missions or resort hot laps, easy-flexing World Wide Weapon is crafted for jibbing and rails but also handles its own on kickers and heavy urban drops. The most playful board in the men’s collection, the WWW sports a JibTip™ shape to reduce weight in the tip and tail while providing more edge-to-snow contact for maximum control. A veritable legend in the K2 line, the ultra-durable WWW is built to send with ', 'Length: 33.5', '1521869571_1374.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(17, 'K2 Standard Wide', 'boardshort', 15000.00, 'We set the performance bar high on our base model board, the Standard. Our patented Hybritech™ construction and Catch-Free Rocker Baseline™ create a responsive and easy-to-turn ride that is perfect for cruising the resort with your friends and family. Whether linking carves or hitting park, the Standard rips from the top to the bottom of the hill.', 'Length – 38″  Width – 10″  Wheelbase – 25.5 – 26.5″', '1521869579_1281.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(18, 'Super Dark Navy', 'boardshort', 5000.00, 'Superdry men’s Microfibre hooded SD-Windattacker jacket. Part of our iconic SD-Wind family collection this jacket is perfect for this season, featuring a bungee cord hood, a double layer collar with a ribbed design on the inner layer and a popper and hook and loop fastening on the hood. This jacket also features a double layer zip fastening, four external pockets and one internal pocket. The Microfibre SD-Windattacker jacket is finished with ribbed cuffs with thumbholes, a Superdry logo badge on the sleeve and embroidered Superdry logos on the other sleeve and back.', 'Model wears: Medium  Model height: 6.1 187cm  Model chest size: 37 94cm', '1521869586_4944.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(19, 'Arctic Orange', 'surfboard', 8000.00, 'Keep the cold out with this essential jacket. Featuring a fleece lined hood and body, double layer collar, ribbed cuffs with thumb holes, a drawstring hem, twin front pockets and one inside pocket. This jacket has a triple layer zip fastening and is finished off with an embroidered Superdry logo on the back and the sleeve.', 'Model wears: Medium  Model height: 61 87cm  Model chest size: 37 94cm', '1521869900_5102.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(20, 'Arctic Blue', 'boardshort', 8000.00, 'Superdry mens Pop zip hooded Arctic SDWindcheater jacket. Keep the cold out with this essential jacket. Featuring a fleece lined hood and body, double layer collar, ribbed cuffs with thumb holes, a drawstring hem, twin front pockets and embroidered shoulder logos. This jacket has a triple layer zip fastening with tricolour zip toggles', 'Model wears: Medium  Model height: 61 87cm  Model chest size: 37 94cm', '1521870069_9899.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(21, 'Arctic Army', 'boardshort', 7000.00, 'Superdry mens Microfibre hooded SDWindattacker jacket. Part of our iconic SDWind family collection this jacket is perfect for this season, featuring a bungee cord hood, a double layer collar with a ribbed design on the inner layer and a popper and hook and loop fastening on the hood. This jacket also features a double layer zip fastening, four external pockets and one internal pocket. The Microfibre SD-Windattacker jacket is finished with ribbed cuffs with thumbholes, a Superdry logo badge on the sleeve and embroidered Superdry logos on the other sleeve and back.', 'Model wears: Medium  Model height: 61 87cm  Model chest size: 37 94cm', '1521870174_2954.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(22, 'Arctic SD', 'surfboard', 7000.00, 'Superdry mens Pop zip hooded Arctic SDWindcheater jacket. Keep the cold out with this essential jacket. Featuring a fleece lined hood and body, double layer collar, ribbed cuffs with thumb holes, a drawstring hem, twin front pockets and one inside pocket. This jacket has a triple layer zip fastening and is finished off with an embroidered Superdry logo on the back and the sleeve.', 'Model wears: Medium  Model height: 61 87cm  Model chest size: 37 94cm', '1521870289_6699.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(23, 'Arctic Military', 'surfboard', 8000.00, 'Superdry mens Pop zip print hooded Arctic SDWindcheater jacket. The windcheater has taken a twist with this all over print design. Featuring a fleece lined hood and body, triple layer zip fastening and ribbed cuffs with thumb holes for extra comfort. This jacket also has a drawstring hem and hood, twin front zipped pockets and one internal pocket with popper fastening. This jacket is finished off with an embroidered Superdry logo on the shoulder, back and sleeve.', 'Model wears: Medium  Model height: 61 87cm  Model chest size: 37 94cm', '1521870441_5717.jpg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(24, 'Mesh Anon MD', 'boardshort', 3000.00, 'DETAILS Ultra-Lightweight Mesh Material Relaxed Fit Compatible With All Men’s and Youth MFI® Models Machine-Washable', 'none', '1521873502_5865.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(25, 'MFI Fleece', 'accesories', 5000.00, 'DETAILS Stretch Fleece Fabric with Adjustable Draw Cord Over the Helmet Fit Compatible With All Men’s and Youth MFI Models Machine-Washable', 'none', '1521874423_4318.gif', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(26, 'Balaclava MFI Anon', 'accesories', 5000.00, 'DETAILS Bonded Stretch Fleece Fabric with Adjustable Bungee Cord Relaxed Fit Compatible With All Men’s and Youth MFI® Models Machine-Washable', 'none', '1521874638_9020.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(27, 'Grey MFI Anon', 'accesories', 4000.00, 'Lightweight Material Laser Perforated Exhaust Relaxed Fit Compatible With All Men’s and Youth MFI® Models Machine-Washable', 'none', '1521874836_6841.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(28, 'Photon Boa Boots', 'accesories', 5000.00, 'LACINGDual Zone Boa® Coiler™ Closure System, Lockdown Tech, Powered by Burton Exclusive New England Ropes with a Lifetime Warranty', 'LINERImprint™ 3 Liner, Focus Cuff', '1521875318_1080.png', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(29, 'Danner Boots', 'accesories', 5000.00, 'Built to exude a spirit of mountain heritage, the Burton x Danner snowboard boot takes authentic hiking design and rider-driven tech to new frontiers. Traditional lacing and a leather and textile exterior inspired by the Danner Light boot pair with proven features like a Vibram® Ecostep Rubber Outsole for solid grip, and Sleeping Bag Reflective Foil to capture and radiate body heat.', 'OUTSOLEVibram® EcoStep™ Rubber Outsole [30% Recycled], Shrinkage™ Footprint Reduction Technology', '1521875470_1547.png', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(30, 'Imperial Snow Boots', 'accesories', 6000.00, 'The Burton Imperial boot channels 30 years of expertise into the most bang ever for your hard-earned buck. Its high-end SLX-inspired performance includes S4 shell panels to keep the flex consistent, lightweight Vibram® EcoStep™ soles for added grip, footprint reducing Shrinkage™, plus an EST® chassis with B3 Gel cushioning for ultimate board feel. Total Comfort delivers a broken-in feel right out of the box, while Sleeping Bag heat-reflective foil defies cold weather. With a flex that sits at the sweet spot between the Ion and Concord, this is the high-performance all-terrain boot you’ve been searching for.', 'LINERImprint™ 3 Liner, Focus Cuff', '1521875793_7988.png', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(31, 'Driver X Boots 2016 4454', 'boardshort', 6000.00, 'Sketchy climbs and exposed lines are Burton Driver X™ boot’s domain. Known as the most responsive boot in snowboarding, its burly demeanor is balanced by practical upgrades in warmth and comfort. A one-two punch of DRYRIDE Heat Cycle™ and Sleeping Bag reflective foil captures and radiates body heat while wicking away heat-robbing sweat. Total Comfort balances the power with a perfectly broken-in feel right from the start. Grippy Vibram® EcoStep™ outsoles cling to the mountain with confidence. Add it all up and you get the only choice for riders who hike, sled, guide, or patrol, as well as freestyle technicians like Terje Haakonsen.', 'nLINERImprint™ 3x Liner, Heat Cycle Lining, Tuff Cuff', '1521875914_4751.png', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(32, 'Malavita EST', 'boardshort', 3000.00, 'A pro favorite season after season, the Malavita binding has carved out a reputation for it’s ability to destroy everything that gets in its way. Features like the Heel Hammock, Supergrip Capstrap™, and Asym Hammockstrap™ wrap response around the boot for a seamless fit and ultimate comfort. Offered in two versions, choose the across-the-board compatibility of Re:Flex™ or pair the EST® model (which features the fluid mobility of The Hinge) with a board featuring The Channel® mounting system for the ultimate in flex, feel, and adjustability. Winged hi-backs on the Black / White Wing colorway make for easier tweaks and presses.', 'HI-BACK18% Short-Glass/Nylon Composite, Canted Hi-Back Design, Zero-Lean Hi-Back, Kickback Hammock, ', '1521876235_5711.png', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(33, 'Genesis EST', 'boardshort', 3000.00, 'Simply put, our goal with the Burton Genesis was to build the most comfortable binding ever, with strength and power that meets the demands of our team riders. Featuring a slightly softer flex and advanced anatomical design, it combines the plushest in cushioning with straps and hi-back that cradle and wrap your boots in ultimate comfort. Advanced composites keep it lightweight; The Hinge (available on the EST® version only) activates medial and lateral flex for less fatigue and easier ollies. Offered in two versions, choose the across-the-board compatibility of Re:Flex™ or pair the EST® model with boards featuring The Channel® mounting system for the ultimate in flex, feel, and adjustability.', 'HI-BACK18% Short-Glass/Nylon Composite, Canted Hi-Back Design, Zero-Lean Hi-Back, Kickback Hammock, ', '1521876260_3602.png', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(34, 'Genesis brown EST', 'boardshort', 2500.00, 'Simply put, our goal with the Burton Genesis was to build the most comfortable binding ever, with strength and power that meets the demands of our team riders. Featuring a slightly softer flex and advanced anatomical design, it combines the plushest in cushioning with straps and hi-back that cradle and wrap your boots in ultimate comfort. Advanced composites keep it lightweight; The Hinge (available on the EST® version only) activates medial and lateral flex for less fatigue and easier ollies. Offered in two versions, choose the across-the-board compatibility of Re:Flex™ or pair the EST® model with boards featuring The Channel® mounting system for the ultimate in flex, feel, and adjustability.', 'HI-BACK18% Short-Glass/Nylon Composite, Canted Hi-Back Design, Zero-Lean Hi-Back, Kickback Hammock, ', '1521876392_9876.png', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(35, 'Cartel EST', 'boardshort', 3500.00, 'Standing the test of time takes more than a rugged attitude – at a certain point, you just have to evolve. That’s just what the Burton Cartel binding has done, with the new Hammockstrap™ 2.0, Smooth Glide™ buckles, and years of development in each crank of the ratchet. Available in two versions, choose the across-the-board compatibility of Re:Flex™ or the ultimate flex and feel of EST® and experience a new era in pro-caliber control. The Hinge (on the EST® version only) activates medial and lateral flex for a smoother feel and easier ollies, while AutoCANT cushioning on both the EST and Re:Flex versions automatically tilts to put you in the most comfortable position possible.', 'HI-BACKSingle-Component Hi-Back Construction, Living Hinge™ Hi-Back, Zero Forward Lean HI-Back, Cant', '1521876597_8390.png', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(36, 'KR 234 SNOW set', 'boardshort', 20000.00, 'The new Maysis LTD is destined to become a legend. We’ve taken the number one selling double BOA boot in the world and upped the style and durability factor with genuine leather construction, a beefy Vibram® V4 outsole for the best traction on the market, and new Endo™ 2.0 construction for long lasting consistent flex. The Intuition® SpaceHeater with reflective technology keeps feet warm and dry on the premiere boot in the all-mountain market.', 'Length is to Height and Height is to Length', '1521992386_3765.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
