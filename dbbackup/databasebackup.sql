-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 07:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb1`
--

CREATE TABLE `tb1` (
  `Id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `history` varchar(3000) NOT NULL,
  `vision` varchar(3000) NOT NULL,
  `mission` varchar(3000) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_history`
--

CREATE TABLE `tbl_about_history` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_history`
--

INSERT INTO `tbl_about_history` (`id`, `name`, `description`) VALUES
(4, 'firstp', 'Cofftea Zone Cafe Restaurant started in year 2012. Cofftea was the product of Ms. Posponesâ€™ thesis as a Bachelor of Business Management student during college.'),
(5, 'secondp', 'Cofftea Zone Cafe Restaurant is determined to become a daily necessity for local coffee addicts, and place to dream of as you try to escape the daily stresses of life and just a comfortable place to meet your friends or to read book all in one.'),
(6, 'thirdp', 'Cofftea Zone offers its customerâ€™s best prepared beverages, such as coffee, tea, hot iced, and blended drinks, in the area that will be complemented with pastries, moderately priced good quality meals as well as the KTV and Martinas Events Party.'),
(7, 'fourthp', 'Patrons can enjoy their visit. It will serves as the client for the development of the website.'),
(8, '@ddkdkdk', '@@@@DDD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_image`
--

CREATE TABLE `tbl_about_image` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_image`
--

INSERT INTO `tbl_about_image` (`id`, `name`, `path`) VALUES
(4, 'cofftea place', 'img/aboutus/28783011_1764688490256314_8326589947851046912_n.jpg'),
(5, 'Inside cofftea', 'img/aboutus/qwerty.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_mission`
--

CREATE TABLE `tbl_about_mission` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_mission`
--

INSERT INTO `tbl_about_mission` (`id`, `description`) VALUES
(2, 'Cofftea Zone will make the best effort to create a unique place where can socialize with each other in a comportable and relaxing environment while enjoying the best brewed coffee or espresso and pastries in town.'),
(3, 'We will be in the the bussiness of helping our customers to relieve stress by providing piece of mind through great ambience, convinient location, friendly customer services, and products of consistently high quality.'),
(4, 'Cofftea increase the employee satisfaction while providing stable return to the company and its employee.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_vision`
--

CREATE TABLE `tbl_about_vision` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_vision`
--

INSERT INTO `tbl_about_vision` (`id`, `description`) VALUES
(1, 'Cofftea Zone sees itself as one of the leading and unique cafe restaurants by 2020.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pet` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `username`, `password`, `pet`, `year`, `color`) VALUES
(45, 'admin', '$2a$07$usesomassodosrkeoaol1eL94b9b5ZnPQ4cP2G7qMGGMIsFhxeehq', 'eevee', '2018', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_disable`
--

CREATE TABLE `tbl_admin_disable` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bestseller`
--

CREATE TABLE `tbl_bestseller` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bestseller`
--

INSERT INTO `tbl_bestseller` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(8, 'Pork Sisig', 'Pork Sisig.jpg', '', 150.00, 'img/home/bestsellerimages/Pork Sisig.jpg'),
(9, 'MidnightCheesyBurger', 'MidnightCheesyBurger.jpg', '', 120.00, 'img/home/bestsellerimages/MidnightCheesyBurger.jpg'),
(20, 'Cappuccino', 'cappuccino.jpg', 'Delisyoso', 80.00, 'img/home/bestsellerimages/cappuccino.jpg'),
(21, 'sdsdsd', '20353931_1542038389187993_2029707262_o.jpg', 'sdsddsffs', 909900.00, 'img/home/bestsellerimages/20353931_1542038389187993_2029707262_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_details`
--

CREATE TABLE `tbl_contact_details` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mobileone` varchar(15) NOT NULL,
  `mobiletwo` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `operatingtime` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_details`
--

INSERT INTO `tbl_contact_details` (`id`, `address`, `telephone`, `mobileone`, `mobiletwo`, `email`, `operatingtime`) VALUES
(1, '851 Manila Cavite Road, Dalahican Cavite City,\r\nPhilippines', '(046) 402-0166', '9177049807', '9175697513', 'coffteazonecc2018@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedbackID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `dateandtime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedbackID`, `name`, `email`, `phone`, `message`, `dateandtime`) VALUES
(26, 'as;lkas;lka;lska;lksa;lksa;slkjfa;lja;', 'david@gmail.com', '0903901491094', 'askajslakjslakjsalksjalkjsalksj', '2018-04-26 02:02:56am'),
(27, 'dsdsdlskds;ldks;ldks;dlk', 'david@gmail.com', '0913093019309', 'dakjdalkdjalksjalksalkdhalksjalkdhalksjalksja', '2018-04-26 02:03:16am'),
(28, 'davidWithmore', 'davidwww@gmail.com', '0939393949959', 'a;lskas;lkas;lada;lska;lska;ldja;lska;slka', '2018-04-26 02:04:01am'),
(29, 'sasafasfawfasfasfasfasfas', 'davasv@gmail.com', '0939394959', 'daviasl;kas;lkas;lkas;lask', '2018-04-26 02:04:28am'),
(30, 'asasfasfasfasfa', 'asfasfasfasfasf@gmail.com', '09345585858', 'dada;lskas;lkas;laksa;lska;lska;sk', '2018-04-26 02:05:02am'),
(31, 'davidwithmore', 'daldka@gmail.com', '09354040404040', 'a;lska;slka;lska;lska;jwsd;lkf;sdkljvms;ldjf,msdf,j', '2018-04-26 02:05:20am'),
(32, 'davidwithmore', 'david@gmail.com', '0930930904940', 'as;lkas;ljs;lasjdapls;dksalkd', '2018-04-26 02:05:47am'),
(33, 'davidwithmore', 'da@gmail.com', '902490492049', 'ds;ldks;ldks;ldg;sld;sldks;kdsd', '2018-04-26 02:06:05am'),
(34, 'shshshshsshsh', 'davidwithmore@gmail.com', '0909090930390943', 'asadasfasfasf', '2018-04-26 02:07:11am'),
(38, 'salskalskalksalskalsk', 'david@gmail.com', '093540757575757', 'sakjsalkjsalkjsalksj', '2018-05-06 08:44:34pm'),
(39, 'sasaslkjas;jaskjaslkjaskljaslkajslkajs', 'david@gmail.com', '193819481938198', 'Davisasaskjas\r\n', '2018-05-06 08:44:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter`
--

CREATE TABLE `tbl_filter` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `timecreated` varchar(25) DEFAULT NULL,
  `platform` varchar(20) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `isp` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_album_`
--

CREATE TABLE `tbl_gallery_album_` (
  `id` int(11) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_album_productimages`
--

CREATE TABLE `tbl_gallery_album_productimages` (
  `id` int(11) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery_album_productimages`
--

INSERT INTO `tbl_gallery_album_productimages` (`id`, `path`) VALUES
(1, 'img/gallery/ProductImages/774_834955713282815_4515823112622435904_n.jpg'),
(2, 'img/gallery/ProductImages/5154_997169543639285_501069557979810609_n.jpg'),
(3, 'img/gallery/ProductImages/10346457_676286882420385_5399998765292661940_n.jpg'),
(4, 'img/gallery/ProductImages/11940328_880709015311503_8523214356921369773_n.jpg'),
(5, 'img/gallery/ProductImages/11947409_880731555309249_7135236388631803726_n.jpg'),
(6, 'img/gallery/ProductImages/12814817_1057373247671957_5290596557959642655_n.jpg'),
(8, 'img/gallery/ProductImages/20171108_170445.jpg'),
(9, 'img/gallery/ProductImages/20171114_123345.jpg'),
(10, 'img/gallery/ProductImages/20171114_152855.jpg'),
(11, 'img/gallery/ProductImages/Kamekaze.jpg'),
(12, 'img/gallery/ProductImages/fruit tea.jpg'),
(13, 'img/gallery/ProductImages/honeydewtea.jpg'),
(14, 'img/gallery/ProductImages/lycheepeachtea.jpg'),
(15, 'img/gallery/ProductImages/lycheetea.jpg'),
(16, 'img/gallery/ProductImages/peachtea.jpg'),
(17, 'img/gallery/ProductImages/strawberrytea.jpg'),
(18, 'img/gallery/ProductImages/wintermelontea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_album_title`
--

CREATE TABLE `tbl_gallery_album_title` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery_album_title`
--

INSERT INTO `tbl_gallery_album_title` (`id`, `title`) VALUES
(5, 'ProductImages');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_titles`
--

CREATE TABLE `tbl_gallery_titles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktvdescription`
--

CREATE TABLE `tbl_ktvdescription` (
  `id` int(11) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `reservation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktvfaq`
--

CREATE TABLE `tbl_ktvfaq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ktvfaq`
--

INSERT INTO `tbl_ktvfaq` (`id`, `question`, `answer`) VALUES
(8, 'aASs', 'aASs'),
(9, 'ASAAD', 'ASAAD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktvrooms`
--

CREATE TABLE `tbl_ktvrooms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ktvrooms`
--

INSERT INTO `tbl_ktvrooms` (`id`, `title`, `image`) VALUES
(1, 'Room 1', 'img/services/ktvrooms/ktv1.jpg'),
(2, 'Room 2', 'img/services/ktvrooms/ktv2.jpg'),
(3, 'Room 3', 'img/services/ktvrooms/ktv3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailing`
--

CREATE TABLE `tbl_mailing` (
  `mailID` int(11) NOT NULL,
  `emailadd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mailing`
--

INSERT INTO `tbl_mailing` (`mailID`, `emailadd`) VALUES
(1, 'peteniojc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_martinas`
--

CREATE TABLE `tbl_martinas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_martinas`
--

INSERT INTO `tbl_martinas` (`id`, `title`, `image`) VALUES
(1, 'Martinas image 1', 'img/services/martinas/martinas1.JPG'),
(2, 'Martinas image 2', 'img/services/martinas/martinas2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_martinasdescription`
--

CREATE TABLE `tbl_martinasdescription` (
  `id` int(11) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `reservation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_martinasfaq`
--

CREATE TABLE `tbl_martinasfaq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_burgerandsandwiches`
--

CREATE TABLE `tbl_menu_burgerandsandwiches` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) DEFAULT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_burgerandsandwiches`
--

INSERT INTO `tbl_menu_burgerandsandwiches` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(9, 'Angus beef hotdog', '7.jpg', 'Distinct texture matched with the rich beef flavor and tenderness.', 80.00, 'img/menu/foods/burgersandsandwiches/7.jpg'),
(10, 'Bacon wrapped cheeseburger', '6.jpg', 'Burger patties on prepared grilled, top with cheese slices at the end of grill time.', 120.00, 'img/menu/foods/burgersandsandwiches/6.jpg'),
(11, 'Cheese burger', '5.jpg', 'A hamburger topped with cheese.', 100.00, 'img/menu/foods/burgersandsandwiches/5.jpg'),
(12, 'Chickensandwich', '4.jpg', 'Chicken topped with crunchy veggies, served in a white bread.', 70.00, 'img/menu/foods/burgersandsandwiches/4.jpg'),
(13, 'German franks hotdog', '3.jpg', 'Garnish include mustard, ketchup, onions, mayonnaise, relish, coleslaw cheese.', 80.00, 'img/menu/foods/burgersandsandwiches/3.jpg'),
(14, 'Ham and egg sandwich', '2.jpg', 'Layered swiss cheese, ham, scramled egg and American cheese.', 70.00, 'img/menu/foods/burgersandsandwiches/2.jpg'),
(15, 'Midnight cheesy burger', '1.jpg', 'Serves up a simple, affordable menu of burgers.', 120.00, 'img/menu/foods/burgersandsandwiches/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_cakes`
--

CREATE TABLE `tbl_menu_cakes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_cakes`
--

INSERT INTO `tbl_menu_cakes` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(1, 'Blueberry cheesecake', 'blueberry.jpg', 'A wonderful dessert food, is made from cream cheese, cottage cheese, sugar, egg, flour, lemon juice.', 80.00, 'img/menu/dessert/cakes/blueberry.jpg'),
(2, 'Chocolate overload', 'chocolateoverlate.jpg', 'A wonderful desert food, made from cream cheese, cottage cheese, sugar, egg, flour, lemon juice.', 100.00, 'img/menu/dessert/cakes/chocolateoverlate.jpg'),
(3, 'Dark chocolate', 'darkchocolatecake.jpg', 'Cake of my DREAMS! Tender, moist homemade chocolate cake with the best smooth, rich, dark chocolate frosting.', 80.00, 'img/menu/dessert/cakes/darkchocolatecake.jpg'),
(4, 'Nuttela cheesecake', 'nutellacheesecake.jpg', 'Loaded with nutella and hazelnut. Creamy, rich, the best nutella cheesecake recipe ever top with kisses.', 80.00, 'img/menu/dessert/cakes/nutellacheesecake.jpg'),
(5, 'Oreo cheesecake', 'oreocheesecake.jpg', 'Packed with Oreo cookies and an Oreo cookies crust!', 80.00, 'img/menu/dessert/cakes/oreocheesecake.jpg'),
(6, 'Red velvet cake', 'redvelvet.jpg', 'Try our delicious red velvet cake.', 100.00, 'img/menu/dessert/cakes/redvelvet.jpg'),
(7, 'Strawberry cheesecake', 'strawberrycheesecake.jpg', 'Fresh strawberry, the sauce adds a freshness to this dessert, leaving you and your loved ones completely satisfied.', 80.00, 'img/menu/dessert/cakes/strawberrycheesecake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_cocktails`
--

CREATE TABLE `tbl_menu_cocktails` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_cocktails`
--

INSERT INTO `tbl_menu_cocktails` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Espresso de bola', 'espresso debla.jpg', 'Flavored cocktail made with vodka, espresso coffee, coffee liqueur, and sugar syrup.', 'img/menu/drinks/cocktails/espresso debla.jpg', 150.00, 0.00, 0.00),
(2, 'Kamekaze', 'Kamekaze.jpg', 'Kamikaze cocktail, vodka based alcoholic mixed drink.', 'img/menu/drinks/cocktails/Kamekaze.jpg', 150.00, 0.00, 0.00),
(3, 'Long island', 'longisland.jpg', 'Alcoholic mixed drink. A deceptive cocktails.', 'img/menu/drinks/cocktails/longisland.jpg', 150.00, 0.00, 0.00),
(4, 'Maitai', 'maitai.jpg', 'Cocktail based on rum, curacao liqueur, orgeat syrup, and lime juice, associated with Polynesian-style setting.', 'img/menu/drinks/cocktails/maitai.jpg', 150.00, 0.00, 0.00),
(5, 'Margarita', 'Margarita.jpg', 'Alcoholic mixed drink.', 'img/menu/drinks/cocktails/Margarita.jpg', 150.00, 0.00, 0.00),
(6, 'Mojito', 'mojito.jpg', 'Add simple syrup, lime juice and rum, and fill with ice.', 'img/menu/drinks/cocktails/mojito.jpg', 150.00, 0.00, 0.00),
(7, 'Rum', 'rum.jpg', 'White rum, garnish with apple and mint leaves, lemon lime soda.', 'img/menu/drinks/cocktails/rum.jpg', 150.00, 0.00, 0.00),
(8, 'Sweet kiss', 'Sweetkiss.jpg', 'Whipped cream vodka, berry-pucker schnapps, pineapple juice, cranberry juice, vanilla ice cream.', 'img/menu/drinks/cocktails/Sweetkiss.jpg', 150.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_dessert`
--

CREATE TABLE `tbl_menu_dessert` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_frapuccino`
--

CREATE TABLE `tbl_menu_frapuccino` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_frapuccino`
--

INSERT INTO `tbl_menu_frapuccino` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Mocha', 'mocha (2).jpg', 'Mocha sauce, Frappuccino roast coffee, milk and ice all come together for a mocha flavor thatâ€™ll leave you wanting more.', 'img/menu/drinks/frapuccino/mocha (2).jpg', 110.00, 120.00, 0.00),
(2, 'White Mocha', 'white mocha.jpg', 'White chocolate Frappuccino roast coffee, milk and ice whipped cream on top.', 'img/menu/drinks/frapuccino/white mocha.jpg', 110.00, 120.00, 0.00),
(3, 'Caramel', 'caramel.jpg', 'Buttery caramel syrup meets coffee, milk and ice for a rendezvous in the blender. Then whipped cream and caramel sauce layer the love on top.', 'img/menu/drinks/frapuccino/caramel.jpg', 110.00, 120.00, 0.00),
(4, 'Tiramisu', 'tiramisu.jpg', 'Tiramisu Frappuccino is one of the best testing frappes on the hidden list of frozen drinks.', 'img/menu/drinks/frapuccino/tiramisu.jpg', 110.00, 120.00, 0.00),
(5, 'French Mocha', 'french mocha.jpg', 'Coffee, milk, sweetened condensed milk, vanilla, and chocolate syrup blended.', 'img/menu/drinks/frapuccino/french mocha.jpg', 110.00, 120.00, 0.00),
(6, 'Salted Caramel', 'salted caramel.jpg', 'Blend mocha sauce and toffee nut syrup with coffee, milk and ice, then finish it off with sweetened whipped cream, caramel sauce.', 'img/menu/drinks/frapuccino/salted caramel.jpg', 120.00, 130.00, 0.00),
(7, 'Coffee Jelly', 'coffee jelly.jpg', 'A delicious layers-innovative coffee jelly, creamy caramel Frappuccino blended with milk, coffee and iced finished with fluffy cloud whipped cream.', 'img/menu/drinks/frapuccino/coffee jelly.jpg', 130.00, 140.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_fruittea`
--

CREATE TABLE `tbl_menu_fruittea` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_fruittea`
--

INSERT INTO `tbl_menu_fruittea` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Green apple', 'fruit tea green apple.jpg', 'Coolness of mint, the sweetness of apple, the fresh taste of green tea.', 'img/menu/drinks/fruittea/fruit tea green apple.jpg', 50.00, 0.00, 60.00),
(2, 'Honey dew', 'honeydewtea.jpg', 'Sweet and refreshing melon taste that will make your taste buds dance.', 'img/menu/drinks/fruittea/honeydewtea.jpg', 50.00, 0.00, 60.00),
(3, 'Lychee peach', 'lycheepeachtea.jpg', 'Mix flavor of Peach and lychee Tea, perfectly flavored ice tea. Refreshing drink to serve.', 'img/menu/drinks/fruittea/lycheepeachtea.jpg', 50.00, 0.00, 60.00),
(4, 'Lychee', 'lycheetea.jpg', 'Sweet flavor and floral fragrant.', 'img/menu/drinks/fruittea/lycheetea.jpg', 50.00, 0.00, 60.00),
(5, 'Peach', 'peachtea.jpg', 'Peach Ice Tea, perfectly flavored ice tea. Refreshing drink to serve.', 'img/menu/drinks/fruittea/peachtea.jpg', 50.00, 0.00, 60.00),
(6, 'Strawberry', 'strawberrytea.jpg', 'Peach Ice Tea, perfectly flavored ice tea. Refreshing drink to serve.', 'img/menu/drinks/fruittea/strawberrytea.jpg', 50.00, 0.00, 60.00),
(7, 'Wintermelon', 'wintermelontea.jpg', 'Sweetened fruit drink with a very distinctive taste.', 'img/menu/drinks/fruittea/wintermelontea.jpg', 50.00, 0.00, 60.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_groupmeals`
--

CREATE TABLE `tbl_menu_groupmeals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_hotdrinks`
--

CREATE TABLE `tbl_menu_hotdrinks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_hotdrinks`
--

INSERT INTO `tbl_menu_hotdrinks` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Brewed Coffee', 'brewedcoffee.jpg', 'The rich aroma of freshly ground, brewed coffee', 'img/menu/drinks/hotdrinks/brewedcoffee.jpg', 55.00, 0.00, 0.00),
(2, 'Cafe Americano', 'cafeamericano.jpg', 'European approach to American style coffee: full bodied espresso combined with steaming hot water.', 'img/menu/drinks/hotdrinks/cafeamericano.jpg', 70.00, 0.00, 0.00),
(3, 'Cafe Latte', 'cafelate.jpg', 'Rich, full bodied espresso soothed by a generous pour of steamed milk &amp; topped with a whisper of foamed milk.', 'img/menu/drinks/hotdrinks/cafelate.jpg', 80.00, 0.00, 0.00),
(4, 'Cappuccino', 'cappuccino.jpg', 'Espresso blended with a swirl of gently steamed milk, capped with a cloud of foam.', 'img/menu/drinks/hotdrinks/cappuccino.jpg', 80.00, 0.00, 0.00),
(5, 'Cafe White Mocha', 'cafe white mocha.jpg', 'White CafÃ© Mocha, made with chocolate.', 'img/menu/drinks/hotdrinks/cafe white mocha.jpg', 90.00, 0.00, 0.00),
(6, 'Cafe Macchiato', 'cafemachiatto.jpg', 'Combine our rich, full-bodied espresso with vanilla-flavored syrup, milk, then top it off with caramel drizzle for an oh-sweet finish', 'img/menu/drinks/hotdrinks/cafemachiatto.jpg', 90.00, 0.00, 0.00),
(7, 'Tiramisu Latte', 'tiramisu latte.jpg', 'Meets a latte, a recipe from seduction in the kitchen', 'img/menu/drinks/hotdrinks/tiramisu latte.jpg', 100.00, 0.00, 0.00),
(8, 'Salted Caramel Latte', 'salted caramel latte.jpg', 'Indulgent drink for those days when you need a little extra comfort or feel like being pampered.', 'img/menu/drinks/hotdrinks/salted caramel latte.jpg', 100.00, 0.00, 0.00),
(9, 'Hot Chocolate', 'hot chocolate.jpg', 'Chocolate powder melted in a small amount of water and mixed fresh milk.', 'img/menu/drinks/hotdrinks/hot chocolate.jpg', 100.00, 0.00, 0.00),
(10, 'Hot Fresh Milk', 'hot fresh milk.jpg', 'Great source of B-12, intake is very important for feeling energized.', 'img/menu/drinks/hotdrinks/hot fresh milk.jpg', 60.00, 0.00, 0.00),
(11, 'Hot Tea', 'hot tea.jpg', 'Hot water and choice of tea.', 'img/menu/drinks/hotdrinks/hot tea.jpg', 50.00, 0.00, 0.00),
(12, 'Espresso Shot', 'espresso shot.jpg', 'A concentrated coffee beverage.', 'img/menu/drinks/hotdrinks/espresso shot.jpg', 30.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_icedcoffee`
--

CREATE TABLE `tbl_menu_icedcoffee` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_icedcoffee`
--

INSERT INTO `tbl_menu_icedcoffee` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Iced Americano', 'iced americano.jpg', 'Espresso and chilled water', 'img/menu/drinks/icedcoffee/iced americano.jpg', 60.00, 70.00, 0.00),
(2, 'Iced Latte', 'iced latte.jpg', 'Espresso chilled milk, vanilla syrup', 'img/menu/drinks/icedcoffee/iced latte.jpg', 70.00, 80.00, 0.00),
(3, 'Iced Mocha', 'iced mocha.jpg', 'An espresso based drink with chocolate syrup, chilled milk, crushed ice', 'img/menu/drinks/icedcoffee/iced mocha.jpg', 80.00, 90.00, 0.00),
(4, 'Iced White Mocha', 'iced white mocha.jpg', 'Espresso chilled milk, white chocolate', 'img/menu/drinks/icedcoffee/iced white mocha.jpg', 80.00, 90.00, 0.00),
(5, 'Iced Caramel', 'iced caramel.jpg', 'Espresso chilled milk, caramel', 'img/menu/drinks/icedcoffee/iced caramel.jpg', 80.00, 90.00, 0.00),
(6, 'Iced Salted Caramel', 'iced salted caramel.jpg', 'Espresso chilled milk, himalayan salt, caramel', 'img/menu/drinks/icedcoffee/iced salted caramel.jpg', 90.00, 100.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_italliansoda`
--

CREATE TABLE `tbl_menu_italliansoda` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_italliansoda`
--

INSERT INTO `tbl_menu_italliansoda` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Strawberry', 'strawberrysoda.jpg', 'Refreshing strawberry fruit flavored.', 'img/menu/drinks/italiansoda/strawberrysoda.jpg', 60.00, 0.00, 0.00),
(2, 'Apple soda', 'apple soda.jpg', 'Made from apple fruit and spices and malt extract.', 'img/menu/drinks/italiansoda/apple soda.jpg', 60.00, 0.00, 0.00),
(3, 'Blue raspberry', 'Blue raspberry.jpg', 'Cool Blue, a syrupy blue blend skating on cruched ice! Zap away that summer heat and enjoy a tall glass of pure shock.', 'img/menu/drinks/italiansoda/Blue raspberry.jpg', 60.00, 0.00, 0.00),
(4, 'Green apple soda', 'green apple soda.jpg', 'Cold down with this thirst quenching mix of the freshness of green apples with the fizz soda.', 'img/menu/drinks/italiansoda/green apple soda.jpg', 60.00, 0.00, 0.00),
(5, 'Kiwi soda', 'Kiwi soda.jpg', 'Extra sweet, very fizzy flavored drinks.', 'img/menu/drinks/italiansoda/Kiwi soda.jpg', 60.00, 0.00, 0.00),
(6, 'Lemon soda', 'lemon soda.jpg', 'Get refresh! Introducing lemonade with touch of mint that make for the perfect sip, when you are chilling.', 'img/menu/drinks/italiansoda/lemon soda.jpg', 60.00, 0.00, 0.00),
(7, 'Lime soda', 'lime soda.jpg', 'This beverage will hit the spot on a summer day.', 'img/menu/drinks/italiansoda/lime soda.jpg', 60.00, 0.00, 0.00),
(8, 'Mango soda', 'mango soda.jpg', 'Makes a refreshing tropical thirst quencher to go along with your favorite Asian food.', 'img/menu/drinks/italiansoda/mango soda.jpg', 60.00, 0.00, 0.00),
(9, 'Passion fruit soda', 'passion fruit soda.jpg', 'Sweet, yet tart flavor perfect taste.', 'img/menu/drinks/italiansoda/passion fruit soda.jpg', 60.00, 0.00, 0.00),
(10, 'Watermelon italian soda', 'watermelon soda.jpg', 'Mixed watermelon syrup with club soda, desired strength for a yummy flavored soft drinks.', 'img/menu/drinks/italiansoda/watermelon soda.jpg', 60.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_maincourse`
--

CREATE TABLE `tbl_menu_maincourse` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_maincourse`
--

INSERT INTO `tbl_menu_maincourse` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(2, 'Tapsilog', 'Tapsilog.jpg', 'Cured pork, served with garlic fried rice and fried egg.', 80.00, 'img/menu/foods/maincourse/Tapsilog.jpg'),
(3, 'Tocilog', 'tocilog.jpg', 'Cured pork, served with garlic fried rice and fried egg.', 80.00, 'img/menu/foods/maincourse/tocilog.jpg'),
(4, 'Noksilog', 'Noksilog.jpg', 'Fried chicken, served with garlic fried rice and fried egg.', 99.00, 'img/menu/foods/maincourse/Noksilog.jpg'),
(5, 'Chicken Barbeque', 'chicken bbq.jpg', 'Grilled chicken with rice.', 88.00, 'img/menu/foods/maincourse/chicken bbq.jpg'),
(6, 'Buttered Garlic Chicken', 'buttered garlic chicken.jpg', 'Chicken breast with salt and pepper, arrange chicken in a sigle layer in prepared baking dish and set aside.', 120.00, 'img/menu/foods/maincourse/buttered garlic chicken.jpg'),
(7, 'Oyster Chicken', 'oyster chicken.jpg', 'Oyster-shaped pieces of dark meat that lie on either side of whole chickens backbone.', 120.00, 'img/menu/foods/maincourse/oyster chicken.jpg'),
(8, 'Pork BBQ', 'Pork Barbecue.jpg', 'Composed of thinly sliced pork pieces that are marinated in a special mixture of seasonings and spices.', 80.00, 'img/menu/foods/maincourse/Pork Barbecue.jpg'),
(9, 'Pork Teriyaki', 'pork teriyaki.jpg', 'Chop recipe is delicious and easy to prepare.', 100.00, 'img/menu/foods/maincourse/pork teriyaki.jpg'),
(10, 'letchong kawali', 'lechon kawali (2).jpg', 'Is a popular dish made with pork belly simmered until tender and then deep-fried until golden and crisp.', 80.00, 'img/menu/foods/maincourse/lechon kawali (2).jpg'),
(11, 'Lechon Paksiw', 'lechon paksiw.jpg', 'Sweet and tangy pork stew made with chopped lechon, vinegar, sugar, and liver sauce.', 100.00, 'img/menu/foods/maincourse/lechon paksiw.jpg'),
(12, 'Burger Steak', 'burger steak.jpg', 'Made with beef patties smothered in a rich mushroom gravy.', 80.00, 'img/menu/foods/maincourse/burger steak.jpg'),
(13, 'Beef with Garlic Mashroom', 'Beef with garlic mashroom.jpg', 'Enjoy these hearty beef tenderloin steaks, creamy portabella mushroom cooking sauce-perfect for dinner.', 100.00, 'img/menu/foods/maincourse/Beef with garlic mashroom.jpg'),
(14, 'Ribeye Steak', 'Ribeye Steak.jpg', 'Longissimus dorsi muscle but also contain the complexus and spinalis muscles.', 200.00, 'img/menu/foods/maincourse/Ribeye Steak.jpg'),
(15, 'T-bone', 'T-Bone Steak.jpg', 'T-bone  and porterhouse are steaks of beef cut from the short lion.', 250.00, 'img/menu/foods/maincourse/T-Bone Steak.jpg'),
(16, 'Boneless Bangus', 'boneless bangus (2).jpg', 'for breakfast with rice and fresh tomatoes.', 88.00, 'img/menu/foods/maincourse/boneless bangus (2).jpg'),
(17, 'Buttered lemon Tanigue', 'buttered lemon tanigue.jpg', 'Season both sides of tanigue with lemon juice, salt, pepper, garlic, and olive oil.', 120.00, 'img/menu/foods/maincourse/buttered lemon tanigue.jpg'),
(18, 'Fish Fillet', 'fish fille.jpg', 'Flesh of fish which has been cut away from the bone by cutting lengthwise along side of the fish parallel to the backbone.', 100.00, 'img/menu/foods/maincourse/fish fille.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_milktea`
--

CREATE TABLE `tbl_menu_milktea` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_milktea`
--

INSERT INTO `tbl_menu_milktea` (`id`, `title`, `image`, `caption`, `price`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Caramel milk tea', 'caramel milk tea.jpg', 'Sweetened fruit drink with a very distinctive taste.', 0.00, 'img/menu/drinks/milktea/caramel milk tea.jpg', 0.00, 70.00, 80.00),
(2, 'Chocolate milk tea', 'chocolate milk tea.jpg', 'Mix chocolate chip. Top with whipped cream.', 0.00, 'img/menu/drinks/milktea/chocolate milk tea.jpg', 0.00, 70.00, 80.00),
(3, 'Dark chocolate milk tea', 'dark chocolate milk tea.jpg', 'Chocolate powder, creamer and sugar mix, water and ice blend.', 0.00, 'img/menu/drinks/milktea/dark chocolate milk tea.jpg', 0.00, 70.00, 80.00),
(4, 'Hokkaido milk tea', 'hokkaido milk tra.jpg', 'Smooth and creamy because of strong milky flavor.', 0.00, 'img/menu/drinks/milktea/hokkaido milk tra.jpg', 0.00, 70.00, 80.00),
(5, 'Honeydew milk tea', 'honeydew milk tea.jpg', 'Sweet and refreshing and lightly fruity taste.', 0.00, 'img/menu/drinks/milktea/honeydew milk tea.jpg', 0.00, 70.00, 80.00),
(6, 'Strawberry milk tea', 'strawberry milk tea.jpg', 'Fruity drink made from fresh or frozen strawberries.', 0.00, 'img/menu/drinks/milktea/strawberry milk tea.jpg', 0.00, 70.00, 80.00),
(7, 'Wintermelon milk tea', 'wintermelon milk tea.jpg', 'This drink is light and refreshing. Take it to go.', 0.00, 'img/menu/drinks/milktea/wintermelon milk tea.jpg', 0.00, 70.00, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_muffins`
--

CREATE TABLE `tbl_menu_muffins` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_muffins`
--

INSERT INTO `tbl_menu_muffins` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(1, 'Muffin', 'Muffin.jpg', 'Small domed cake made from batter or dough.', 60.00, 'img/menu/dessert/muffins/Muffin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_pasta`
--

CREATE TABLE `tbl_menu_pasta` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_pasta`
--

INSERT INTO `tbl_menu_pasta` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(1, 'Meaty Spaghetti', 'meaty spaghetti (2).jpg', 'Served over pasta sauce recipe is made with lean ground beef, oregano, basil, onion, and tomato paste.', 80.00, 'img/menu/foods/pasta/meaty spaghetti (2).jpg'),
(2, 'Creamy Carbonara', 'creamy carbonara (2).jpg', 'Dish look festive, taste delicious, and pleasing to the Filipino palate. Saucy and creamier.', 80.00, 'img/menu/foods/pasta/creamy carbonara (2).jpg'),
(3, 'Creamy Pesto', 'creamy pesto.jpg', 'This combines a rich, velvety pesto sauce with shrimp, mushrooms and tomatoes. Itâ€™s sinfully delicious.', 80.00, 'img/menu/foods/pasta/creamy pesto.jpg'),
(4, 'Tuna Mushroom Pasta', 'tuna mushroom pasta.jpg', 'Filled with bright Italian flavors, whole wheat Tuna tomato Pasta with Mushrooms, Capers, and Olives which is healthy.', 80.00, 'img/menu/foods/pasta/tuna mushroom pasta.jpg'),
(5, 'Seafood Pasta', 'seafood pasta.jpg', 'Creamy, rich seafood pasta featuring shrimp, prawns, salmon, or scallops of regular pasta into special.', 110.00, 'img/menu/foods/pasta/seafood pasta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_pizza`
--

CREATE TABLE `tbl_menu_pizza` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_pizza`
--

INSERT INTO `tbl_menu_pizza` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(2, 'Hawaiian pizza', 'hawaiian pizza (2).jpg', 'Pizza topped with tomato sauce, cheese, pineapple, and Canadian bacon or ham.', 280.00, 'img/menu/foods/pizza/hawaiian pizza (2).jpg'),
(3, 'Pepperoni Pizza', 'peperoni pizza.jpg', 'Pepperoni pizza', 250.00, 'img/menu/foods/pizza/peperoni pizza.jpg'),
(4, 'Margherita pizza', 'margarita piza.jpg', 'Typical Neapolitan pizza, made with san marzano tomatoes, mozzarella for di latte, fresh basil, salt, and extra-virgin olive oil.', 250.00, 'img/menu/foods/pizza/margarita piza.jpg'),
(5, 'Three cheese pizza', 'three cheese (2).jpg', 'Crust topped with fresh spinach, a blend of three cheeses and seasoned tomatoes for a quick meal.', 280.00, 'img/menu/foods/pizza/three cheese (2).jpg'),
(6, 'All meat loversâ€™ pizza', 'all meat lovers.jpg', 'Thin crust pizza, topped off with two cheese, bacon, ham, pepperoni, and sausage. A must make for meat loverâ€™s.', 280.00, 'img/menu/foods/pizza/all meat lovers.jpg'),
(7, 'Sisig pizza', 'sisig pizza.jpg', 'Something that will be appreciated not just by sisig lovers but by everyone for awhole new twist to the much beloved pizza.', 300.00, 'img/menu/foods/pizza/sisig pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_platter`
--

CREATE TABLE `tbl_menu_platter` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_platter`
--

INSERT INTO `tbl_menu_platter` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(2, 'Pancit Guisado', 'pacit guisado.jpg', 'Pancit bihon or pancit Guisado is a Filipino noodle dish and is a staple second to rice.', 150.00, 'img/menu/foods/platter/pacit guisado.jpg'),
(3, 'Pancit Canton', 'pancit canton.jpg', 'Is a Filipino noodle stir-fry popular for everyday meals as well for occasions.', 150.00, 'img/menu/foods/platter/pancit canton.jpg'),
(4, 'Sizzling Tofu', 'sizzling tofu.jpg', 'Dish is slightly spicy, which adds to its already succulent taste. This dish is every little bit health conscious because of the use of fresh tofu.', 120.00, 'img/menu/foods/platter/sizzling tofu.jpg'),
(5, 'Pork Sisig', 'Pork Sisig.jpg', 'Get this easy sisig recipe from grilled pork belly. Crunchy and spicy just the way it should be.', 150.00, 'img/menu/foods/platter/Pork Sisig.jpg'),
(6, 'Chopsuey', 'chop suey.jpg', 'A colorful blend of vegetables in a starch-thickened sauce.', 150.00, 'img/menu/foods/platter/chop suey.jpg'),
(7, 'Beef with Brocolli', 'beef with brocolli.jpg', 'Whisk together the oyster sauce, sesame oil, sherry, soy sauce, sugar, and cornstarch in a bowl, and stir until the sugar has dissolved.', 200.00, 'img/menu/foods/platter/beef with brocolli.jpg'),
(8, 'Beef Kaldereta', 'beef caldereta.jpg', 'Filipino beef stew. It is prepared with a tomato-based sauce along with some vegetables.', 200.00, 'img/menu/foods/platter/beef caldereta.jpg'),
(9, 'Garden Salad', 'garden salad (2).jpg', 'Fresh veggies and an equality simple, tasty salad dressing.', 150.00, 'img/menu/foods/platter/garden salad (2).jpg'),
(10, 'Mexicano Sisig', 'mexicano sisig.jpg', 'The best tasting sisig, crispy chicken and squid in the city. Perfect combination of bagnet and vegetable.', 150.00, 'img/menu/foods/platter/mexicano sisig.jpg'),
(11, 'Fried Chicken', 'fried  chicken.jpg', 'Pieces of chicken, breading adds a crisp coating or crush to the exterior of the chicken.', 180.00, 'img/menu/foods/platter/fried  chicken.jpg'),
(12, 'Buttered Garlic Chicken', 'buttered garlic chicken.jpg', 'Filipino garlic buttered chicken is filled with flavor of garlic and buttered.', 200.00, 'img/menu/foods/platter/buttered garlic chicken.jpg'),
(13, 'Oyster Sauce Chicken', 'oyster chicken.jpg', 'Flavored chicken dish that is super easy to prepare and perfect for lunch or dinner. Combination of fried chicken pieces and oyster sauce.', 200.00, 'img/menu/foods/platter/oyster chicken.jpg'),
(14, 'Bagnet', 'bagnet.jpg', 'Is a deep fried crispy pork belly dish that is similar to lechon kawali, the pork belly is first boiled until tender then deep fried twice.', 150.00, 'img/menu/foods/platter/bagnet.jpg'),
(15, 'Crispy Pata', 'crispy pata.jpg', 'Filipino dish consisting of deep fried pig trotters or knuckles served as party fare or an everyday dish.', 320.00, 'img/menu/foods/platter/crispy pata.jpg'),
(16, 'Patatim', 'Patatim.jpg', 'A whole pork leg cooked low and slow in a sweet and salty sauce.', 350.00, 'img/menu/foods/platter/Patatim.jpg'),
(17, 'Chicharon bulaklak', 'chicharon bulaklak.jpg', 'Deep-fried ruffled fat is a popular appetizer. It is often consumed with alcoholic drinks and is best eaten when dipped in spicy vinegar.', 150.00, 'img/menu/foods/platter/chicharon bulaklak.jpg'),
(18, 'Dynamite', 'dynamite.jpg', 'Chili cheese and ham stick, chili cheese sticks or dynamite spring rolls, is one of my favorite finger foods now.', 150.00, 'img/menu/foods/platter/dynamite.jpg'),
(19, 'Calamares', 'calamares.jpg', 'Squid is eaten in many cuisines; in English, the culinary name calamari is often used for squid dishes from the Mediterranean, notable fried squid.', 150.00, 'img/menu/foods/platter/calamares.jpg'),
(20, 'Sizzling Curry', 'sizzling curry pusit.jpg', 'A classical portugues dish brought to and popularized by japan, consisting of seafood or vegetables that have been battered and deep fried.', 250.00, 'img/menu/foods/platter/sizzling curry pusit.jpg'),
(21, 'Ebi Tempura', 'ebi tempura.jpg', 'A classical portugues dish brought to and popularized by japan, consisting of seafood or vegetables that have been battered and deep fried.', 200.00, 'img/menu/foods/platter/ebi tempura.jpg'),
(22, 'Buttered Lemon Tanigue', 'buttered lemon taniue.jpg', 'Dish topped with a scoop of semi solidified buttered garlic and tanigue steak to serve.', 200.00, 'img/menu/foods/platter/buttered lemon taniue.jpg'),
(23, 'Fish fillet', 'Fish Fillet.jpg', 'Flesh of fish which has been cut away from the bone by cutting lengthwise along side of the fish parallel to the backbone.', 250.00, 'img/menu/foods/platter/Fish Fillet.jpg'),
(24, 'Salmon Sashimi', 'salmon sashimi (3).jpg', 'Salmon and Kingfish are most commonly cut in this style. It is extremely thin, diagonally cut slice.', 200.00, 'img/menu/foods/platter/salmon sashimi (3).jpg'),
(25, 'Kilawin Tanigue', 'Kilawin Tanigue.jpg', 'Fish ceviche wherein Wahoo fish fillet is cut into cubes and cured in a mixed of calamansi juice, fresh ginger, onion, chili, and seasoning.', 200.00, 'img/menu/foods/platter/Kilawin Tanigue.jpg'),
(26, 'Kilawin Hipon', 'kilawin hipon.jpg', 'Shrimp Kinilaw is a popular dish in Iloilo City especially as an appetizer or pulutan.', 200.00, 'img/menu/foods/platter/kilawin hipon.jpg'),
(27, 'Sizzling Gambas', 'sizzling gambas.jpg', 'Combine lemon juice and shrimp and marinated, with onions and red bell pepper.', 200.00, 'img/menu/foods/platter/sizzling gambas.jpg'),
(28, 'Tuna Sisig', 'tuna sisig.jpg', 'Melted butter, marinated tuna cubes, chopped long green pepper and Thai chili. Scoop of mayonnaise with garlic powder.', 150.00, 'img/menu/foods/platter/tuna sisig.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_signaturedrinks`
--

CREATE TABLE `tbl_menu_signaturedrinks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_signaturedrinks`
--

INSERT INTO `tbl_menu_signaturedrinks` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(10, 'Cookies and Cream', 'cookies and cream.jpg', 'Cream on top and a generous sprinkle of cookies.', 'img/menu/drinks/signaturdrinks/cookies and cream.jpg', 110.00, 120.00, 150.00),
(11, 'Java Chip', 'java chip.jpg', 'Milk and ice, then top with whipped cream and mocha drizzle to bring you endless java joy.', 'img/menu/drinks/signaturdrinks/java chip.jpg', 110.00, 120.00, 0.00),
(12, 'Madasgascar Vanilla', 'madagascar vanilla.jpg', 'Cream whipped cream chocolate sauce for drizzle, garnish with whipped cream, drizzle with chocolate.', 'img/menu/drinks/signaturdrinks/madagascar vanilla.jpg', 130.00, 140.00, 0.00),
(13, 'Matcha Green Tea', 'matcha green tea.jpg', 'An antioxidant rich tea with polyphenols that promote heart and healthy weight', 'img/menu/drinks/signaturdrinks/matcha green tea.jpg', 130.00, 140.00, 0.00),
(14, 'Dark Chocolate', 'dark chocolate.jpg', 'Iced dark chocolate, cocoa and espresso whisked together, combine with whole milk and serve over ice.', 'img/menu/drinks/signaturdrinks/dark chocolate.jpg', 130.00, 140.00, 0.00),
(15, 'Oreo  Mint', 'oreo with mint.jpg', 'Mint Oreo filling, whipped cream, crushed Oreos and chocolate syrup.', 'img/menu/drinks/signaturdrinks/oreo with mint.jpg', 130.00, 140.00, 0.00),
(16, 'Black Forest', 'black forest.jpg', 'Deliciously nutty chocolate stout flavor, ice blended.', 'img/menu/drinks/signaturdrinks/black forest.jpg', 0.00, 150.00, 0.00),
(17, 'Crunch', 'crunch.jpg', 'Sweet delicious drinks with crunch in it.', 'img/menu/drinks/signaturdrinks/crunch.jpg', 0.00, 150.00, 0.00),
(18, 'Toblerone', 'toblerone.jpg', 'Milk, Toblerone and whipped cream.', 'img/menu/drinks/signaturdrinks/toblerone.jpg', 0.00, 150.00, 0.00),
(19, 'Hersheys', 'hersheys.jpg', 'Uses simple ingredients to create the HERSHEYâ€S milk chocolate you love.', 'img/menu/drinks/signaturdrinks/hersheys.jpg', 0.00, 150.00, 0.00),
(20, 'Kit Kat', 'kitkat.jpg', 'Chocolate wafer bars take inspiration from the deep blue sea.', 'img/menu/drinks/signaturdrinks/kitkat.jpg', 0.00, 150.00, 0.00),
(21, 'Nutella', 'nutella.jpg', 'Provides a unique and different flavor to the basic chocolate coffee drink.', 'img/menu/drinks/signaturdrinks/nutella.jpg', 0.00, 160.00, 0.00),
(22, 'Ferrero Rocher', 'ferrero rocher.jpg', 'Chocholately, creamy and delicious without being too heavy on the stomach.', 'img/menu/drinks/signaturdrinks/ferrero rocher.jpg', 0.00, 160.00, 0.00),
(23, 'Strawberry Cheesecake', 'strawberry cheesecake.jpg', 'Creamy and indulgent cocktails are inspired by one of our most loved classic dessert (cheesecake) but with a creative adult twist', 'img/menu/drinks/signaturdrinks/strawberry cheesecake.jpg', 0.00, 150.00, 0.00),
(24, 'Red Velvet', 'red velvet.jpg', 'A bit of Red velvet cake mix gives this drink such a beautiful taste.', 'img/menu/drinks/signaturdrinks/red velvet.jpg', 0.00, 150.00, 0.00),
(25, 'Rocky Road', 'rocky road.jpg', 'A delicious indulgence of rocky road, chocolately drink form.', 'img/menu/drinks/signaturdrinks/rocky road.jpg', 0.00, 150.00, 0.00),
(26, 'Sansrival', 'sansrival.jpg', 'A bit of Sansrival cake mix gives this drink such a beautiful taste.', 'img/menu/drinks/signaturdrinks/sansrival.jpg', 0.00, 150.00, 0.00),
(27, 'Ube Keso', 'ube keso.jpg', 'A bit of Ube Keso mix gives this drink such a beautiful taste.', 'img/menu/drinks/signaturdrinks/ube keso.jpg', 0.00, 150.00, 0.00),
(28, 'Cotton Candy', 'cotton candy.jpg', 'Comes out much fluffier than the packaged once you can make so many different flavors and colors.', 'img/menu/drinks/signaturdrinks/cotton candy.jpg', 0.00, 150.00, 0.00),
(29, 'skdkjfdkfjdkfjk', '3e71a39fd899f1adb5ce26120a7f498b.jpg', 'skjdskdskdjskjd', 'img/menu/drinks/signaturdrinks/3e71a39fd899f1adb5ce26120a7f498b.jpg', 32.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_smoothies`
--

CREATE TABLE `tbl_menu_smoothies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_smoothies`
--

INSERT INTO `tbl_menu_smoothies` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Banana smoothie', 'banana smoothie.jpg', '', 'img/menu/drinks/smoothies/banana smoothie.jpg', 0.00, 150.00, 0.00),
(2, 'Green apple smoothie', 'green apple smoothe.jpg', '', 'img/menu/drinks/smoothies/green apple smoothe.jpg', 0.00, 150.00, 0.00),
(3, 'Mango', 'mango smoothie.jpg', '', 'img/menu/drinks/smoothies/mango smoothie.jpg', 0.00, 150.00, 0.00),
(4, 'Mixed berry', 'mixed berry.jpg', '', 'img/menu/drinks/smoothies/mixed berry.jpg', 0.00, 150.00, 0.00),
(5, 'Peach smoothie', 'peach smoothie.jpg', '', 'img/menu/drinks/smoothies/peach smoothie.jpg', 0.00, 150.00, 0.00),
(6, 'Raspberry smoothie', 'raspberry smoothie.jpg', '', 'img/menu/drinks/smoothies/raspberry smoothie.jpg', 0.00, 150.00, 0.00),
(7, 'Strawberry banana smoothie', 'strawberry banana smooothie.jpg', '', 'img/menu/drinks/smoothies/strawberry banana smooothie.jpg', 0.00, 150.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_soup`
--

CREATE TABLE `tbl_menu_soup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_soup`
--

INSERT INTO `tbl_menu_soup` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(1, 'Crab and corn soup', 'crab and corn soup.jpg', 'Cream of corn soup with egg white and crab meat.', 150.00, 'img/menu/foods/soup/crab and corn soup.jpg'),
(2, 'Lomi', 'lomi.jpg', 'Chewy noodles and assorted seafoodâ€™s filling to boast of, its simply world class.', 150.00, 'img/menu/foods/soup/lomi.jpg'),
(3, 'Mushroom soup', 'mushroom soup.jpg', 'Cream of mushroom soup, is a simple type of soup where a basic roux is thinned with cream and then mushroom added.', 150.00, 'img/menu/foods/soup/mushroom soup.jpg'),
(4, 'Nido soup', 'nido soup.jpg', 'Is the Filipino version of the Chinese Birdâ€™s Net Soup.', 150.00, 'img/menu/foods/soup/nido soup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_starter`
--

CREATE TABLE `tbl_menu_starter` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_starter`
--

INSERT INTO `tbl_menu_starter` (`id`, `title`, `image`, `caption`, `price`, `path`) VALUES
(5, 'Hash Brown (2 Pcs.)', 'hash brown.jpg', 'Great for snack or side dish. Crispy deep-fried prawn fries.', 50.00, 'img/menu/foods/starter/hash brown.jpg'),
(6, 'Chicharap', 'chicharap.jpg', 'Great for snack or side dish. Crispy deep-fried prawn fries.', 50.00, 'img/menu/foods/starter/chicharap.jpg'),
(7, 'Kimchi', 'kimchi.jpg', 'Made with cut cabbage, radish and scallions and seasons paste of red.', 50.00, 'img/menu/foods/starter/kimchi.jpg'),
(8, 'Fries', 'Fries.jpg', 'French-fried potatoes.', 60.00, 'img/menu/foods/starter/Fries.jpg'),
(9, 'Lumpiang Shanghai', 'lumpiang shanghai.jpg', 'Spring rolls is a dish made up of ground pork, minced onion, carrots, and spices with the mixture held together by beaten egg.', 100.00, 'img/menu/foods/starter/lumpiang shanghai.jpg'),
(10, 'Mojos', 'mojos.jpg', 'Spring rolls is a dish made up of ground pork, minced onion, carrots, and spices with the mixture held together by beaten egg.', 100.00, 'img/menu/foods/starter/mojos.jpg'),
(11, 'Potato Wedge', 'potato wedges.jpg', 'Wedges of potatoes, often large and unpeeled, that are either baked or fried.', 100.00, 'img/menu/foods/starter/potato wedges.jpg'),
(12, 'Street Foods', 'streetfoods.jpg', 'Prepared (Squid Balls, Kikiam, Chicken Balls, Fish Balls).', 100.00, 'img/menu/foods/starter/streetfoods.jpg'),
(13, 'Nachos', 'nachos.jpg', 'Pour cheese sauce evenly over the massive spread of chips and top every beef and beans and pico de gallo.', 120.00, 'img/menu/foods/starter/nachos.jpg'),
(14, 'Cheesy Bacon Fries', 'cheesy bacon fries.jpg', 'Top fried potatoes with bacon, cheddar and green onions', 120.00, 'img/menu/foods/starter/cheesy bacon fries.jpg'),
(15, 'Buffalo Wings', 'buffalo wings (2).jpg', 'Unbreaded chicken wing, deep-fried then coated in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', 120.00, 'img/menu/foods/starter/buffalo wings (2).jpg'),
(16, 'Fish and Fries', 'fish and fries.jpg', 'Fried battered fish and hot potato fries.', 120.00, 'img/menu/foods/starter/fish and fries.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_yakultdrinks`
--

CREATE TABLE `tbl_menu_yakultdrinks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `oz12price` float(50,2) NOT NULL,
  `oz16price` float(50,2) NOT NULL,
  `oz22price` float(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_yakultdrinks`
--

INSERT INTO `tbl_menu_yakultdrinks` (`id`, `title`, `image`, `caption`, `path`, `oz12price`, `oz16price`, `oz22price`) VALUES
(1, 'Lychee', 'lychee.jpg', 'The delicious mix taste of the Lychee and the Yakult in the drink.', 'img/menu/drinks/yakultdrinks/lychee.jpg', 0.00, 80.00, 90.00),
(2, 'Lychee Peach', 'lychee peach.jpg', 'The delicious mix taste of the Lychee, peach and the Yakult in the drink.', 'img/menu/drinks/yakultdrinks/lychee peach.jpg', 0.00, 80.00, 90.00),
(3, 'Strawberry', 'strawberry.jpg', 'Strawberry tea mixed with yakult.', 'img/menu/drinks/yakultdrinks/strawberry.jpg', 0.00, 80.00, 90.00),
(4, 'Peach', 'peach.jpg', 'Peach tea mixed with yakult.', 'img/menu/drinks/yakultdrinks/peach.jpg', 0.00, 80.00, 90.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newproduct`
--

CREATE TABLE `tbl_newproduct` (
  `newproductid` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_product`
--

CREATE TABLE `tbl_new_product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_new_product`
--

INSERT INTO `tbl_new_product` (`id`, `title`, `description`, `path`) VALUES
(4, 'frap', 'deliicious', 'img/home/featuredandnewimages/12654204_949749315074139_5716230324295337800_n.jpg'),
(6, 'freak', 'shake', 'img/home/featuredandnewimages/18221861_1295805437135190_6565092753299870062_n.jpg'),
(7, 'cake', 'red', 'img/home/featuredandnewimages/11073576_810440495671689_4547346972468687187_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_promos`
--

CREATE TABLE `tbl_new_promos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packageonetc`
--

CREATE TABLE `tbl_packageonetc` (
  `id` int(11) NOT NULL,
  `terms_and_conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packageonetc`
--

INSERT INTO `tbl_packageonetc` (`id`, `terms_and_conditions`) VALUES
(2, 'sdsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagetwotc`
--

CREATE TABLE `tbl_packagetwotc` (
  `id` int(11) NOT NULL,
  `terms_and_conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packagetwotc`
--

INSERT INTO `tbl_packagetwotc` (`id`, `terms_and_conditions`) VALUES
(2, 'dfdfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promos`
--

CREATE TABLE `tbl_promos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promos`
--

INSERT INTO `tbl_promos` (`id`, `title`, `description`, `path`) VALUES
(15, 'Family meal', 'Masarap to', 'img/home/promos/24312429_1497288833653515_7616508967362649003_n.jpg'),
(16, 'asdfasfd', 'dasfasdf', 'img/home/promos/24312429_1497288833653515_7616508967362649003_n.jpg'),
(17, 'qwerty', 'qwerty', 'img/home/promos/24775247_1497288843653514_3336845891978514374_n.jpg'),
(19, 'fsiufua', 'nasunaos', 'img/home/featuredandnewimages/11949304_881610861887985_7720345147454524889_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomonetc`
--

CREATE TABLE `tbl_roomonetc` (
  `id` int(11) NOT NULL,
  `terms_and_conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomonetc`
--

INSERT INTO `tbl_roomonetc` (`id`, `terms_and_conditions`) VALUES
(1, 'sadadad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomthreetc`
--

CREATE TABLE `tbl_roomthreetc` (
  `id` int(11) NOT NULL,
  `terms_and_conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomthreetc`
--

INSERT INTO `tbl_roomthreetc` (`id`, `terms_and_conditions`) VALUES
(1, 'sdsdsssd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomtwotc`
--

CREATE TABLE `tbl_roomtwotc` (
  `id` int(11) NOT NULL,
  `terms_and_conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomtwotc`
--

INSERT INTO `tbl_roomtwotc` (`id`, `terms_and_conditions`) VALUES
(1, 'csdsdsds');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_ktv_room1`
--

CREATE TABLE `tbl_services_ktv_room1` (
  `id` int(11) NOT NULL,
  `path` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_ktv_room2`
--

CREATE TABLE `tbl_services_ktv_room2` (
  `id` int(11) NOT NULL,
  `path` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_ktv_room3`
--

CREATE TABLE `tbl_services_ktv_room3` (
  `id` int(11) NOT NULL,
  `path` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_martinas_package1`
--

CREATE TABLE `tbl_services_martinas_package1` (
  `id` int(11) NOT NULL,
  `path` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_martinas_package2`
--

CREATE TABLE `tbl_services_martinas_package2` (
  `id` int(11) NOT NULL,
  `path` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services_martinas_package2`
--

INSERT INTO `tbl_services_martinas_package2` (`id`, `path`) VALUES
(1, 'img/services/overlayimages/packageone/3e71a39fd899f1adb5ce26120a7f498b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `img`, `description`, `path`) VALUES
(6, 'slide2.jpg', '', 'img/home/homepageslider/slide2.jpg'),
(7, '20171030_173945.jpg', '', 'img/home/homepageslider/20171030_173945.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slidercounter`
--

CREATE TABLE `tbl_slidercounter` (
  `counter` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb1`
--
ALTER TABLE `tb1`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about_history`
--
ALTER TABLE `tbl_about_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about_image`
--
ALTER TABLE `tbl_about_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about_mission`
--
ALTER TABLE `tbl_about_mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about_vision`
--
ALTER TABLE `tbl_about_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_bestseller`
--
ALTER TABLE `tbl_bestseller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_details`
--
ALTER TABLE `tbl_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `tbl_filter`
--
ALTER TABLE `tbl_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_album_`
--
ALTER TABLE `tbl_gallery_album_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_album_productimages`
--
ALTER TABLE `tbl_gallery_album_productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_album_title`
--
ALTER TABLE `tbl_gallery_album_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ktvdescription`
--
ALTER TABLE `tbl_ktvdescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ktvfaq`
--
ALTER TABLE `tbl_ktvfaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ktvrooms`
--
ALTER TABLE `tbl_ktvrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mailing`
--
ALTER TABLE `tbl_mailing`
  ADD PRIMARY KEY (`mailID`);

--
-- Indexes for table `tbl_martinas`
--
ALTER TABLE `tbl_martinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_martinasdescription`
--
ALTER TABLE `tbl_martinasdescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_martinasfaq`
--
ALTER TABLE `tbl_martinasfaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_burgerandsandwiches`
--
ALTER TABLE `tbl_menu_burgerandsandwiches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_cakes`
--
ALTER TABLE `tbl_menu_cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_cocktails`
--
ALTER TABLE `tbl_menu_cocktails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_dessert`
--
ALTER TABLE `tbl_menu_dessert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_frapuccino`
--
ALTER TABLE `tbl_menu_frapuccino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_fruittea`
--
ALTER TABLE `tbl_menu_fruittea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_groupmeals`
--
ALTER TABLE `tbl_menu_groupmeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_hotdrinks`
--
ALTER TABLE `tbl_menu_hotdrinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_icedcoffee`
--
ALTER TABLE `tbl_menu_icedcoffee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_italliansoda`
--
ALTER TABLE `tbl_menu_italliansoda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_maincourse`
--
ALTER TABLE `tbl_menu_maincourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_milktea`
--
ALTER TABLE `tbl_menu_milktea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_muffins`
--
ALTER TABLE `tbl_menu_muffins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_pasta`
--
ALTER TABLE `tbl_menu_pasta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_pizza`
--
ALTER TABLE `tbl_menu_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_platter`
--
ALTER TABLE `tbl_menu_platter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_signaturedrinks`
--
ALTER TABLE `tbl_menu_signaturedrinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_smoothies`
--
ALTER TABLE `tbl_menu_smoothies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_soup`
--
ALTER TABLE `tbl_menu_soup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_starter`
--
ALTER TABLE `tbl_menu_starter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_yakultdrinks`
--
ALTER TABLE `tbl_menu_yakultdrinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newproduct`
--
ALTER TABLE `tbl_newproduct`
  ADD PRIMARY KEY (`newproductid`);

--
-- Indexes for table `tbl_new_product`
--
ALTER TABLE `tbl_new_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_new_promos`
--
ALTER TABLE `tbl_new_promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packageonetc`
--
ALTER TABLE `tbl_packageonetc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packagetwotc`
--
ALTER TABLE `tbl_packagetwotc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promos`
--
ALTER TABLE `tbl_promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomonetc`
--
ALTER TABLE `tbl_roomonetc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomthreetc`
--
ALTER TABLE `tbl_roomthreetc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomtwotc`
--
ALTER TABLE `tbl_roomtwotc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_ktv_room1`
--
ALTER TABLE `tbl_services_ktv_room1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_ktv_room2`
--
ALTER TABLE `tbl_services_ktv_room2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_ktv_room3`
--
ALTER TABLE `tbl_services_ktv_room3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_martinas_package1`
--
ALTER TABLE `tbl_services_martinas_package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_martinas_package2`
--
ALTER TABLE `tbl_services_martinas_package2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb1`
--
ALTER TABLE `tb1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_about_history`
--
ALTER TABLE `tbl_about_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_about_image`
--
ALTER TABLE `tbl_about_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_about_mission`
--
ALTER TABLE `tbl_about_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_about_vision`
--
ALTER TABLE `tbl_about_vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_bestseller`
--
ALTER TABLE `tbl_bestseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_contact_details`
--
ALTER TABLE `tbl_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_filter`
--
ALTER TABLE `tbl_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery_album_`
--
ALTER TABLE `tbl_gallery_album_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery_album_productimages`
--
ALTER TABLE `tbl_gallery_album_productimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_gallery_album_title`
--
ALTER TABLE `tbl_gallery_album_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ktvdescription`
--
ALTER TABLE `tbl_ktvdescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ktvfaq`
--
ALTER TABLE `tbl_ktvfaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ktvrooms`
--
ALTER TABLE `tbl_ktvrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mailing`
--
ALTER TABLE `tbl_mailing`
  MODIFY `mailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_martinas`
--
ALTER TABLE `tbl_martinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_martinasdescription`
--
ALTER TABLE `tbl_martinasdescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_martinasfaq`
--
ALTER TABLE `tbl_martinasfaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu_burgerandsandwiches`
--
ALTER TABLE `tbl_menu_burgerandsandwiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_menu_cakes`
--
ALTER TABLE `tbl_menu_cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_cocktails`
--
ALTER TABLE `tbl_menu_cocktails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu_dessert`
--
ALTER TABLE `tbl_menu_dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu_frapuccino`
--
ALTER TABLE `tbl_menu_frapuccino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_fruittea`
--
ALTER TABLE `tbl_menu_fruittea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_groupmeals`
--
ALTER TABLE `tbl_menu_groupmeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu_hotdrinks`
--
ALTER TABLE `tbl_menu_hotdrinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menu_icedcoffee`
--
ALTER TABLE `tbl_menu_icedcoffee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menu_italliansoda`
--
ALTER TABLE `tbl_menu_italliansoda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_menu_maincourse`
--
ALTER TABLE `tbl_menu_maincourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_menu_milktea`
--
ALTER TABLE `tbl_menu_milktea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_muffins`
--
ALTER TABLE `tbl_menu_muffins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu_pasta`
--
ALTER TABLE `tbl_menu_pasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu_pizza`
--
ALTER TABLE `tbl_menu_pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_platter`
--
ALTER TABLE `tbl_menu_platter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_menu_signaturedrinks`
--
ALTER TABLE `tbl_menu_signaturedrinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_menu_smoothies`
--
ALTER TABLE `tbl_menu_smoothies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu_soup`
--
ALTER TABLE `tbl_menu_soup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menu_starter`
--
ALTER TABLE `tbl_menu_starter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_menu_yakultdrinks`
--
ALTER TABLE `tbl_menu_yakultdrinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_newproduct`
--
ALTER TABLE `tbl_newproduct`
  MODIFY `newproductid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_new_product`
--
ALTER TABLE `tbl_new_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_new_promos`
--
ALTER TABLE `tbl_new_promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_packageonetc`
--
ALTER TABLE `tbl_packageonetc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_packagetwotc`
--
ALTER TABLE `tbl_packagetwotc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_promos`
--
ALTER TABLE `tbl_promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_roomonetc`
--
ALTER TABLE `tbl_roomonetc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_roomthreetc`
--
ALTER TABLE `tbl_roomthreetc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_roomtwotc`
--
ALTER TABLE `tbl_roomtwotc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_services_ktv_room1`
--
ALTER TABLE `tbl_services_ktv_room1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services_ktv_room2`
--
ALTER TABLE `tbl_services_ktv_room2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services_ktv_room3`
--
ALTER TABLE `tbl_services_ktv_room3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services_martinas_package1`
--
ALTER TABLE `tbl_services_martinas_package1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services_martinas_package2`
--
ALTER TABLE `tbl_services_martinas_package2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb1`
--
ALTER TABLE `tb1`
  ADD CONSTRAINT `tb1_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `tbl_admin` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
