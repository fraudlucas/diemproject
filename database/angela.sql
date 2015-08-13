-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2015 at 12:58 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angelamark`
--
CREATE DATABASE IF NOT EXISTS `angelamark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `angelamark`;

-- --------------------------------------------------------

--
-- Table structure for table `clothing`
--

CREATE TABLE IF NOT EXISTS `clothing` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(25) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` float DEFAULT NULL,
  `customized` tinyint(1) DEFAULT '0',
  `typeId` int(4) unsigned NOT NULL,
  `tagID` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothing`
--

INSERT INTO `clothing` (`id`, `code`, `picture`, `price`, `customized`, `typeId`, `tagID`) VALUES
(2, 'ref1', 'web/assets/img/clothes/1.png', 10, 1, 1, 2),
(3, 'pant1', 'web/assets/img/clothes/pant1.jpg', 10, 2, 2, 2),
(4, 'pant2', 'web/assets/img/clothes/pant2.jpgpant2.jpgpant2.jpgpant2.jpg', 12, 1, 2, 1),
(5, 'pant3', 'web/assets/img/clothes/pant3.jpg', 123, 2, 2, 1),
(6, 'pant4', 'web/assets/img/clothes/pant4.jpg', 23, 2, 2, 1),
(7, 'shi1', 'web/assets/img/clothes/shi1.jpg', 324, 1, 1, 1),
(8, 'shi2', 'web/assets/img/clothes/shi2.jpg', 34, 2, 1, 1),
(9, 'shi3', 'web/assets/img/clothes/shi3.jpg', 12, 1, 1, 2),
(11, 'pant5', 'web/assets/img/clothes/pant5.jpg', 12434, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clothinglookpieces`
--

CREATE TABLE IF NOT EXISTS `clothinglookpieces` (
  `clothingLookID` int(10) unsigned NOT NULL,
  `clothingID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clothinglooks`
--

CREATE TABLE IF NOT EXISTS `clothinglooks` (
  `id` int(10) unsigned NOT NULL,
  `addingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clothingtagged`
--

CREATE TABLE IF NOT EXISTS `clothingtagged` (
  `tagID` int(10) unsigned NOT NULL,
  `clothingID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothingtagged`
--

INSERT INTO `clothingtagged` (`tagID`, `clothingID`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clothingtype`
--

CREATE TABLE IF NOT EXISTS `clothingtype` (
  `id` int(4) unsigned NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothingtype`
--

INSERT INTO `clothingtype` (`id`, `typeName`) VALUES
(1, 'Top'),
(2, 'Bottom'),
(3, 'Dress'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `idColor` int(11) NOT NULL,
  `color` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`idColor`, `color`) VALUES
(1, '#ABC284');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE IF NOT EXISTS `logos` (
  `id` int(10) unsigned NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `path`) VALUES
(1, 'web/assets/img/logo/logo2.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `fromUserID` int(10) unsigned NOT NULL,
  `toUserID` int(10) unsigned NOT NULL,
  `topic` varchar(50) NOT NULL,
  `content` varchar(250) NOT NULL,
  `messageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fromUserID`, `toUserID`, `topic`, `content`, `messageDate`, `read`) VALUES
(1, 2, 4, 'test', 'maybe it works', '2015-08-06 15:09:31', 1),
(2, 5, 4, 'testing', 'testing', '2015-08-06 15:11:10', 1),
(3, 5, 2, 'testing modal ', 'maybe it works on adminClient', '2015-08-04 23:03:36', 1),
(4, 2, 4, 'testing 2', 'maybe', '2015-08-06 14:21:43', 0),
(5, 4, 2, 'asdas', 'dasdasd', '2015-08-04 23:03:05', 0),
(6, 4, 5, 'asdhaoisdh', 'asdaspj', '2015-08-06 00:59:23', 1),
(7, 2, 4, '', 'Testing sending email to an external email.', '2015-08-06 15:11:15', 1),
(8, 2, 4, '', 'testing email', '2015-08-06 14:46:08', 0),
(9, 2, 4, '', 'testing email', '2015-08-06 14:46:34', 1),
(10, 2, 4, '', 'testing email', '2015-08-06 14:47:02', 0),
(11, 4, 7, 'Sending test to Test Staff', 'Testing this message.', '2015-08-08 14:36:38', 0),
(12, 4, 6, 'Sending test to Testing Staff', 'Testing messages', '2015-08-08 14:38:56', 0),
(13, 2, 7, 'Testing User sending', 'MEssage for test staaff', '2015-08-10 11:21:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `id` int(10) unsigned NOT NULL,
  `pageID` int(11) NOT NULL,
  `variable` varchar(30) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`id`, `pageID`, `variable`, `content`) VALUES
(2, 1, 'content', '<div style="text-align: center;"><span style="color: inherit;">sdadsda</span></div>'),
(5, 2, 'content', '<h3 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 4px; margin-bottom: 10px; color: rgb(71, 81, 104); text-align: justify;"><b>Angela Mark: A Canadian Fashion Designer</b></h3><div><b><br /></b></div><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">Angela Mark Fashion Designs is a Canadian Companyt established in 1987, specializing in high quality clothing for busy professional women.</h4><div><br /></div><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">A Canadian fashion designer, originally from Montreal, Angelaâ€™s love for fashion was inspired from a very young age. Being tall posed fitting challenges for Angela, and when her clothing didnâ€™t fit well, she knew she didnâ€™t look her best and also felt awkward and uncomfortable. Angela found it frustrating and difficult to find simple, well cut clothes that fit properly.</h4><div><br /></div><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">Her desire to dress well, and ultimately, to look and feel great, evolved into a passion for beautiful fabrics, classic yet current styling, and a keen eye for quality, workmanship and details.</h4><div><br /></div><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">The realization that many women faced the same fitting challenges and desires for beautiful, quality clothing resulted in Angelaâ€™s decision to pursue a career in helping women feel great through clothing and styleâ€¦. Angela attended Ryerson Polytechnical Institute in Toronto, and in 1987, at 22 years of age, launched her own label.</h4>'),
(6, 3, 'content', '\r\n						\r\n						Testimonials a test a testandoa'),
(7, 4, 'content', '<div class="title" style="line-height: 22.3999996185303px;"><h4 class="text-center">Made to Measure:</h4><hr /></div><div class="pf-detail" style="line-height: 22.3999996185303px;"><p style="text-align: justify;">The valuable experience of working directly with her loyal and repeat clientele for many years as a personal stylist and designer of made to measure clothing, Angela has continually evolved, modified and improved her patterns and styling each season.</p><p style="text-align: justify;">Angela purchases beautiful fabrics and interprets her designs as reflections of her clienteleâ€™s beauty, personalities and expectations for that feeling that they get when they wear her designs.&nbsp;<br /><br />To meet with an Angela Mark Stylist or learn more about our Made to Measure services, please book an appointment.</p></div>'),
(8, 5, 'content', '<h4 class="text-center" style="box-sizing: border-box; font-family: ''Open Sans'', Arial, sans-serif; font-weight: 700; line-height: 1.1em; color: rgb(51, 51, 51); margin-top: 10px; margin-bottom: 20px; font-size: 18px; text-align: center;">Ready To Wear:</h4><div class="title" style="line-height: 22.3999996185303px;"><hr /></div><div class="pf-detail" style="line-height: 22.3999996185303px;"><p style="text-align: justify;">The Ready to Wear Collections that Angela now designs and manufacturers reflects the attention to detail and the fit that has become distinctive of her label. The result is beautiful clothing that can be purchased off the rack and looks and feels like it has been custom made!</p></div>'),
(9, 6, 'content', '<h5 style="text-align: justify;">FAVOURITE QUOTE:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">â€œLorem ipsum dolor sit amet, consectetur adipiscing elit.â€ - Jane Doe</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">THREE CHARACTERISTICS YOUâ€™RE BOUND TO LEARN QUICKLY:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">MY STORY:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">I LOVE:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pagephotos`
--

CREATE TABLE IF NOT EXISTS `pagephotos` (
  `id` int(4) NOT NULL,
  `path` varchar(200) NOT NULL,
  `pageId` int(4) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL,
  `subtitle` varchar(80) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagephotos`
--

INSERT INTO `pagephotos` (`id`, `path`, `pageId`, `date`, `active`, `subtitle`, `description`) VALUES
(8, 'web/assets/img/aboutUs/Angela2.png', 2, '2015-07-31 08:49:43', 1, 'tsasd', NULL),
(9, 'web/assets/img/testimonials/1.jpg', 3, '2015-07-31 09:10:33', 1, 'Empower Testing, CEO test', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus co'),
(11, 'web/assets/img/ourTeam/profilepicture.jpg', 6, '2015-08-10 01:09:28', 1, 'sdfsdf sdf sd', NULL),
(21, 'web/assets/img/readyToWear/business.jpg', 5, '2015-08-11 18:37:30', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sempi convalli.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convallis massa vel bibendum. Mauris semper id nisl eu convallis. Pellentesque habitant morbi tristique senectus et netus et mal'),
(33, 'web/assets/img/madeToMeasure/2.jpg', 4, '2015-08-11 22:27:55', 1, 'asdass a', 'as das as dsa das das d'),
(34, 'web/assets/img/index/business.jpg', 1, '2015-08-12 14:28:52', 1, 'asdasdasdasd', 'asdasd'),
(35, 'web/assets/img/testimonials/business.jpg', 3, '2015-08-12 15:21:29', 1, 'Empower 2 Maybe it was him', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus co'),
(37, 'web/assets/img/testimonials/business.jpg', 3, '2015-08-12 15:44:18', 1, 'asponapsodn apos ndpaosn pdonasp ondopasn opdan spondaopsn podansp napson dpaosn', 'pasnoanspo n ponp oansp naposn opoasn poanspo napson pasnpo napson pason poansp oans ponapson pasno apsn paosn posanp onaspon poasn poanspo naspon pasaskndapisn panspdo naspon dpaosn dpoasn pdoansp on'),
(38, 'web/assets/img/readyToWear/logo2.png', 5, '2015-08-12 16:30:54', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convalli', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convallis massa vel bibendum. Mauris semper id nisl eu convallis. Pellentesque habitant morbi tristique senectus et netus et mal'),
(39, 'web/assets/img/index/1.jpg', 1, '2015-08-12 18:08:34', 1, 'sadasdasd ', 'asdasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(4) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(1, 'index'),
(2, 'aboutUS'),
(3, 'testimonials'),
(4, 'mateToMeasure'),
(5, 'readyToWear'),
(6, 'ourTeam');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `roleTitle` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleTitle`) VALUES
(1, 'Administrator'),
(2, 'Costumer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(3, 'fall'),
(4, 'spring'),
(1, 'summer'),
(2, 'winter');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(10) unsigned NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  `roleID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `userID`, `roleID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postalCode` varchar(7) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `province` char(2) DEFAULT NULL,
  `administratorID` int(10) unsigned NOT NULL DEFAULT '2',
  `status` int(4) DEFAULT '3',
  `picture` varchar(200) NOT NULL DEFAULT 'web/assets/images/profilepicture.jpg',
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `firstName`, `lastName`, `address`, `postalCode`, `city`, `province`, `administratorID`, `status`, `picture`, `timeCreated`) VALUES
(2, NULL, '$2y$07$VA1ZwZA5fZJGOFcELSZhBeuii0NdCP24Npg7QQS.XPDNG2ylUfA8C', 'T\rYÁ9}’F8W-&aùR¢Ÿ', 'thiago.evangelista@test.com', 'Thiago Lucas', 'Evangelista ', '836 Talwood Drive', 'K9J7G8', 'Peterborough', 'ON', 2, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(3, NULL, '$2y$07$VA1ZwZA5fZJGOFcELSZhBeuii0NdCP24Npg7QQS.XPD...', 'T\r\nYÁ9}’F8W-&aùR¢Ÿ\r\nt', 'admin@admin.com', 'Thi', 'Evan', NULL, NULL, NULL, NULL, 1, 3, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(4, NULL, '$2y$07$2e4HSZdMZKLYt41TPPEjHOO0Ys1CAnbL5HU7YWBEFKd.soQgBCs6O', 'ÙîI—Ld¢Ø·S<ñ#–Š=†', 'admin2@admin.com', 'Admin     ', 'Testing     ', 'Testing Street', 'T1TT1T', 'Testing', 'ON', 1, 2, 'web/assets/img/profiles/4/perfil.jpg', '2015-08-10 11:36:49'),
(5, NULL, '$2y$07$BcfLaap4VH2oXupTJmeb7.Eplx80YY6fHmLsPdA3Dr1RkOS0cEREG', 'ÇËiªxT}¨^êS&g›ìä3Ý…¢', 'ricardo.vcr2@gmail.com', 'Ricardo', 'Remedio', NULL, NULL, NULL, NULL, 2, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(6, NULL, '$2y$07$MJnjgc/Ql.BbJW4XXJfbw.1C860KjlrOXlsC/CZIl/mM43Nu/sATO', '0™ãÏÐ—à[%n\\—ÛÃøIí‰^<', 'testing@staff.com', 'Testing Staff', 'Stylist', NULL, NULL, NULL, NULL, 3, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(7, NULL, '$2y$07$LFnIbvmbSt.91vudgFIcpu6w3LOUYfbPFcndMHaRojc/SKTjaBnPm', ',YÈnù›Jß½Öû€R§0ß¸hÛá', 'test@staff.com', 'Test ', 'Staff ', 'Testing Street', 'K9K0C9', 'Testing', 'ON', 3, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(8, NULL, '$2y$07$1Nmp/7.ek0z7fRYijsmA.elQI5tJ/KiOAM4pbWoivLuKs2s7MyQCO', 'ÔÙ©ÿ¿ž“Lû}"ŽÉ€ùþq#£ÅŸ', 'marcus_lucas12@outlook.com', 'Marcus Lucas', 'Falcao', 'Testing Street', 'T1QT2Q', 'Testing', 'ON', 2, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49'),
(9, NULL, '$2y$07$wpaX3HTE14VmwKZYOhNpF.K5xBQ96WUxwfXyiQsusWF9MxhNQA19O', 'Â–—ÜtÄ×…fÀ¦X:i©¤Xÿœ‡', 'user@test.com', 'Test   sadasd  ', 'Testing     ', 'asdasda', '1h1g1h1', 'test', 'ON', 2, 2, 'web/assets/images/profilepicture.jpg', '2015-08-12 22:15:39'),
(10, NULL, '$2y$07$DbCB8BuEbgCMfmZk0bo1H.OZ0SlmH2JcZKIEUVpJQNz4wF6i6VqiC', '\r°ð„n\0Œ~fdÑº5]Y°å1', 'notuser@test.com', 'not user ', 'n ', 'asdas ds', 'as dsa ', 'asds as das d', 'as', 2, 2, 'web/assets/images/profilepicture.jpg', '2015-08-12 22:38:25'),
(12, NULL, '$2y$07$A/sSwsPN7sznl0tH567spOsa/Oxade.dTz/6dPqAPFVXjvk1jOML6', 'ûÂÃÍîÌç—KGç®ì¥&œ ¿', 'test2@staff.com', 'asd asdnals  ', 'asjd pajso pd ', 'sd a sda s', 'as das ', 'sad asd as', 'ON', 3, 2, 'web/assets/images/profilepicture.jpg', '2015-08-12 23:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `wardrobe`
--

CREATE TABLE IF NOT EXISTS `wardrobe` (
  `id` int(4) unsigned NOT NULL,
  `userId` int(4) unsigned NOT NULL,
  `clothesId` int(4) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wardrobe`
--

INSERT INTO `wardrobe` (`id`, `userId`, `clothesId`, `date`) VALUES
(1, 2, 2, '2015-08-07 17:57:42'),
(4, 2, 3, '2015-08-13 15:24:52'),
(5, 2, 4, '2015-08-13 15:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` int(10) unsigned NOT NULL,
  `costumerID` int(10) unsigned NOT NULL,
  `clothingLookID` int(10) unsigned NOT NULL,
  `wardrobe` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_clothing` (`code`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `clothinglookpieces`
--
ALTER TABLE `clothinglookpieces`
  ADD PRIMARY KEY (`clothingLookID`,`clothingID`),
  ADD KEY `fk_clothingLookPieces_clothing` (`clothingID`);

--
-- Indexes for table `clothinglooks`
--
ALTER TABLE `clothinglooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `clothingtagged`
--
ALTER TABLE `clothingtagged`
  ADD PRIMARY KEY (`tagID`,`clothingID`),
  ADD KEY `fk_clothingTagged_clothing` (`clothingID`);

--
-- Indexes for table `clothingtype`
--
ALTER TABLE `clothingtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_fromUsers` (`fromUserID`),
  ADD KEY `fk_messages_toUsers` (`toUserID`);

--
-- Indexes for table `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagecontent_pages` (`pageID`);

--
-- Indexes for table `pagephotos`
--
ALTER TABLE `pagephotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pageId` (`pageId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_tags` (`name`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userRoles_users` (`userID`),
  ADD KEY `fk_userRoles_roles` (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users` (`username`,`email`),
  ADD KEY `fk_administrators_users` (`administratorID`);

--
-- Indexes for table `wardrobe`
--
ALTER TABLE `wardrobe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wishlist_costumers` (`costumerID`),
  ADD KEY `fk_wishlist_clothingLooks` (`clothingLookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothing`
--
ALTER TABLE `clothing`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `clothinglooks`
--
ALTER TABLE `clothinglooks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clothingtype`
--
ALTER TABLE `clothingtype`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pagephotos`
--
ALTER TABLE `pagephotos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wardrobe`
--
ALTER TABLE `wardrobe`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `clothing_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `clothingtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clothinglookpieces`
--
ALTER TABLE `clothinglookpieces`
  ADD CONSTRAINT `fk_clothingLookPieces_clothing` FOREIGN KEY (`clothingID`) REFERENCES `clothing` (`id`),
  ADD CONSTRAINT `fk_clothingLookPieces_clothingLooks` FOREIGN KEY (`clothingLookID`) REFERENCES `clothinglooks` (`id`);

--
-- Constraints for table `clothinglooks`
--
ALTER TABLE `clothinglooks`
  ADD CONSTRAINT `clothinglooks_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clothingtagged`
--
ALTER TABLE `clothingtagged`
  ADD CONSTRAINT `fk_clothingTagged_clothing` FOREIGN KEY (`clothingID`) REFERENCES `clothing` (`id`),
  ADD CONSTRAINT `fk_clothingTagged_tags` FOREIGN KEY (`tagID`) REFERENCES `tags` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_fromUsers` FOREIGN KEY (`fromUserID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_messages_toUsers` FOREIGN KEY (`toUserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD CONSTRAINT `fk_pagecontent_pages` FOREIGN KEY (`pageID`) REFERENCES `pages` (`id`);

--
-- Constraints for table `pagephotos`
--
ALTER TABLE `pagephotos`
  ADD CONSTRAINT `pagephotos_ibfk_1` FOREIGN KEY (`pageId`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`administratorID`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `fk_wishlist_clothingLooks` FOREIGN KEY (`clothingLookID`) REFERENCES `clothinglooks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
