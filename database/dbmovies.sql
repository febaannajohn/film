-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2023 at 07:32 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmovies`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` int NOT NULL AUTO_INCREMENT,
  `theaterid` int NOT NULL,
  `bookingdate` date NOT NULL,
  `person` varchar(50) NOT NULL,
  `amt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `totalamt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userid` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`bookingid`),
  KEY `FK_booking_users` (`userid`),
  KEY `FK_booking` (`theaterid`)
) ENGINE=InnoDB AUTO_INCREMENT=365 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `theaterid`, `bookingdate`, `person`, `amt`, `totalamt`, `userid`, `status`) VALUES
(363, 70, '0000-00-00', '4', '200', '800', 13, 0),
(364, 71, '0000-00-00', '4', '200', '800', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Malayalam'),
(2, 'English'),
(6, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `classid` int NOT NULL AUTO_INCREMENT,
  `classname` int NOT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movieid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `releasedate` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `movie` varchar(10000) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `catid` int NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`movieid`),
  KEY `FK_movies` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieid`, `title`, `description`, `releasedate`, `image`, `trailer`, `movie`, `rating`, `catid`, `price`) VALUES
(2, 'ABC Bollywood Movie', 'abc movie desciption', '2023-07-20', 'download (1).jpeg', 'mov_bbb.mp4', 'mov_bbb.mp4', '', 2, '0'),
(31, 'King of Kotha', 'King of Kotha (also marketed as KOK) is a 2023 Indian Malayalam-language period action drama film directed by Abhilash Joshiy in his directorial debut and produced by Wayfarer Films and Zee Studios.The film was announced in July 2021. Principal photography commenced in September 2022 and wrapped up in February 2023. The film was released worldwide on 24 August 2023 during the festival of Onam, where it received mixed reviews from critics', '2023-08-28', 'koth.jpg', 'king.jpg', '', '', 1, '0'),
(33, 'Achan Oru Vazha Vechu', 'Achanoru Vazha Vachu is a Malayalam colorful entertainer movie directed by Saandeep and a first-time director. Features Niranjan Raju, AV Anoop, Athmiya Rajan, and Shanthi Krishna in Achan Oru Vaazha Vechu as the lead characters. Mukesh, Johnny Antony, Dhyan Sreenivasan, Appani Sarath, Bhagath Manuel, Sohan Seenulal, Fukru, Ashvin Mathew, Lena, Meera Nair, Deepa Joseph, Kulappulli Leela are the other prominent stars. The movie Achanoru Vazha Vachu is the 25th film produced by Dr. AV Anoop under the banner of a popular brand of popular films, AVA Productions. The story, screenplay, and dialogue are written by Manu Gopal.', '2023-09-01', 'achan.jpg', 'achan.jpg', '', '', 1, '0'),
(34, 'RDX', 'Robert Dony Xavier is a revenge drama dealing in more than two timelines. RDX was released on 25 August 2023 during Onam, where it received positive reviews from critics.[7][8] The film was a commercial success at the box office, grossing over ₹100 crore worldwide and over ₹50 crore from Kerala alone, becoming the fourth Malayalam film to achieve so after Pulimurugan, Lucifer and 2018.[9] It became the second highest-grossing Malayalam film of the year and is currently one of the highest-grossing Malayalam films', '2023-08-29', 'rdx.jpeg', 'rdx.jpeg', '', '', 1, '0'),
(35, 'Gadar 2', 'Gadar 2 brings back India`s most loved family of Tara, Sakeena and Jeete; 22 years after its predece', '2023-09-02', 'gada.jpg', 'gada.jpg', '', '', 6, '0'),
(38, 'Jawan', 'A high-octane action thriller that outlines the emotional journey of a man who is set to rectify the', '2023-09-20', 'jawan.jpeg', 'jawan.jpeg', '', '', 6, '0'),
(40, 'Oppenheimer', 'The film is based on the Pulitzer Prize-winning book American Prometheus: The Triumph and Tragedy of', '2023-09-05', 'open.jpeg', 'open.jpeg', '', '', 2, '0'),
(43, 'Equalizer 3', 'Finding himself surprisingly at home in Southern Italy, Robert McCall (Denzel Washington) discovers ', '2023-09-29', 'equ1.jpeg', 'equ1.jpeg', '', '', 2, '0'),
(45, 'Mukalparapp', 'Mukalparappu is a Malayalam movie directed by Siby Padiyara. The film features Sunil Suriya and Apana Janardhanan in the lead roles. Siby Padiyara has written the dialogues and co-written the screenplay alongside JP Thavarool.  ', '2023-09-15', 'mukal.jpeg', 'mukal.jpeg', '', '', 1, '0'),
(46, 'Jailer', 'Jailer is a 2023 Indian Malayalam-language period drama film written and directed by Sakkir Madathil.[3] The film stars Dhyan Sreenivasan in the titular role, alongside Manoj K. Jayan, Divya Pillai and Sreejith Ravi in the supporting cast.[4] Set in the 1950s, it tells the story of a prison officer who stays in a bungalow with five prisoners who were charged with different crimes and his experiments to reform them.[5][6]  Jailer was released in theatres on 18 August 2023.[7]', '2023-09-16', 'jailer.jpeg', 'jailer.jpeg', '', '', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

DROP TABLE IF EXISTS `orders_info`;
CREATE TABLE IF NOT EXISTS `orders_info` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int DEFAULT NULL,
  `total_amt` int DEFAULT NULL,
  `cvv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 12, 'Puneeth', 'puneethreddy951@gmail.com', 'Bangalore, Kumbalagodu, Karnataka', 'Bangalore', 'Karnataka', 560074, 'pokjhgfcxc', '4321 2345 6788 7654', '12/90', 3, 77000, 1234),
(0, 0, 'jisha', 'jisha@gmail.com', 'nellad', 'Ernakulam', 'Kerala', 686669, 'Canara Bank', '', '08/23', NULL, NULL, 876),
(0, 0, 'jincy shaji', 'jincy@gmail.com', 'pichamparabil, nellad, muvatupuzha', 'Ernakulam', 'Kerala', 686669, 'SBI BANK', '', '12/23', NULL, NULL, 789),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Elson Eldhose', 'elson@gmail.com', 'kacherpaddy, mannor', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Jijo Mathew', 'elson@gmail.com', 'kizhakkumparayil(h), N. Mazhuvannoor P.O', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'jincy shaji', 'viji@gmail.com', 'chothanikara , pulluvazhi', 'kollam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'jincy shaji', 'viji@gmail.com', 'chothanikara , pulluvazhi', 'kollam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'jincy shaji', 'viji@gmail.com', 'chothanikara , pulluvazhi', 'kollam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'jincy shaji', 'viji@gmail.com', 'chothanikara , pulluvazhi', 'kollam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'jincy shaji', 'viji@gmail.com', 'chothanikara , pulluvazhi', 'kollam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'elson@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, 'Feba Anna John', 'jisha@gmail.com', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'kacherpaddy, mannor', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'kizhakkumparayil(h)', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0),
(0, 0, '', '', 'nellad', 'Ernakulam', 'Kerala', 686669, '', '', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `catid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tblproduct` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `description`, `code`, `image`, `price`, `catid`) VALUES
(6, 'bhjk', 'xcfghjk dfgyhuil hjklghjk ', '', 'mukal.jpeg', 300.00, 1),
(7, 'Dog', 'Super comdey ', '', 'dog6.jpg', 200.00, 1),
(8, 'cat', 'description', '', 'cat3.jpg', 300.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `name`, `rating`, `Comments`) VALUES
(30, 'Vinu', '3', 'ആദ്യപകുതി എന്റെ പൊന്നെ ചിരിച്ചു മനുഷ്യന്റെ ഊപ്പാട് വരും. രണ്ടാം പകുതി കുറച്ചു പക്വതയുള്ള കഥാപാത്രം'),
(29, 'Jisha ', '4', 'പ്രേക്ഷകരെ ഒട്ടും ബോറടിപ്പിക്കാതെ കഥപറഞ്ഞു പോയി എന്നതാണ് സത്യം 🤝🏻'),
(31, 'jincy', '5', 'Comedy Movie. Enjoy very well'),
(32, 'Neha babu', '4', 'Amazing Variety Movie. Well Done . All of surely watched it and Enjoy Lot'),
(33, 'Jose Joseph', '5', 'കിടിലം ഒരു Thriller മൂവി കാണണം എന്നുള്ളവർ നേരെ തിയേറ്ററിൽ വിട്ടോ Mr.Hacker 💯🙌'),
(34, 'Vishnu', '5', 'Woow .. No More Words');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `theaterid` int NOT NULL AUTO_INCREMENT,
  `theater_name` varchar(100) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `prices` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `locations` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code` varchar(50) NOT NULL,
  `movieid` int DEFAULT NULL,
  PRIMARY KEY (`theaterid`),
  KEY `FK_theater` (`movieid`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`theaterid`, `theater_name`, `timing`, `days`, `date`, `prices`, `locations`, `code`, `movieid`) VALUES
(69, 'Galax Show', '11:00', 'Saterday', '2023-10-07', '200', 'Kochi', '', 33),
(70, 'Starlet theature', '03:00', 'Sunday', '2023-10-08', '200', 'kollam', '', 31),
(71, 'Warlet Theature', '04:15', 'Friday', '2023-10-06', '200', 'Thrissur', '', 34),
(72, 'Prince theature', '05:20', 'Friday', '2023-10-06', '300', 'Allapuzha', '', 40),
(73, 'Nakshathra ', '01:00', 'Thrusday', '2023-10-05', '400', 'Waynad', '', 38);

-- --------------------------------------------------------

--
-- Table structure for table `theater2`
--

DROP TABLE IF EXISTS `theater2`;
CREATE TABLE IF NOT EXISTS `theater2` (
  `theaterid` int NOT NULL AUTO_INCREMENT,
  `theater_name` varchar(100) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` int NOT NULL,
  `location` varchar(100) NOT NULL,
  `movieid` int DEFAULT NULL,
  PRIMARY KEY (`theaterid`),
  KEY `FK_theater` (`movieid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theater2`
--

INSERT INTO `theater2` (`theaterid`, `theater_name`, `timing`, `days`, `date`, `price`, `location`, `movieid`) VALUES
(1, 'gini', '3 PM', 'Saterday', '2023-09-22', 300, '', 7),
(2, 'Galax Show', '6 PM', 'Monday', '2023-10-05', 300, '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roteype` int NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `roteype`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1),
(2, 'Usman', 'usman@gmail.com', '321', 2),
(3, 'Muhammad Aqib', 'maqib1055@gmail.com', '123', 2),
(4, 'saqib', 'saqib@gmail.com', '123', 2),
(5, 'newuser', 'newuser@gmail.com', '123', 2),
(6, 'anas', 'anas@gmail.com', '123', 2),
(8, 'Feba', 'yellow@gmail.com', 'Pmcfeb123', 2),
(9, 'vinu', 'vinu@gmail.com', 'vinu', 2),
(10, 'Jisha', 'jisha@gmail.com', 'jisha', 2),
(11, 'jose', 'jose@gmail.com', 'jose', 2),
(13, 'Neha babu', 'neha@gmail.com', 'neha', 2),
(14, 'Jincy Shaji', 'jincy@gmail.com', 'jincy', 2),
(15, 'Cebin C Paul', 'cebin@gmail.com', 'cebin', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_booking` FOREIGN KEY (`theaterid`) REFERENCES `theater` (`theaterid`),
  ADD CONSTRAINT `FK_booking_users` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `FK_movies` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `FK_theater` FOREIGN KEY (`movieid`) REFERENCES `movies` (`movieid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
