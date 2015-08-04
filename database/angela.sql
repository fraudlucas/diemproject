-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 05:16 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angelamark`
--
CREATE DATABASE IF NOT EXISTS `angelamark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `angelamark`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) unsigned NOT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `appointmentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customerID` int(10) unsigned NOT NULL,
  `consultantID` int(10) unsigned NOT NULL,
  `wishlistID` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bodymeasures`
--

CREATE TABLE IF NOT EXISTS `bodymeasures` (
  `id` int(10) unsigned NOT NULL,
  `size` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `typeId` int(4) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothing`
--

INSERT INTO `clothing` (`id`, `code`, `picture`, `price`, `customized`, `typeId`) VALUES
(2, 'ref1', 'web/assets/img/clothes/1.png', 12, 0, 1);

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
-- Table structure for table `clothingmeasures`
--

CREATE TABLE IF NOT EXISTS `clothingmeasures` (
  `id` int(10) unsigned NOT NULL,
  `size` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clothingtagged`
--

CREATE TABLE IF NOT EXISTS `clothingtagged` (
  `tagID` int(10) unsigned NOT NULL,
  `clothingID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '#99CCFF');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `postID` int(10) unsigned NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  `content` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `messageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fromUserID`, `toUserID`, `topic`, `content`, `messageDate`, `read`) VALUES
(1, 2, 4, 'test', 'maybe it works', '2015-08-04 17:57:30', 0),
(2, 2, 4, 'testing', 'testing', '2015-08-04 18:16:51', 0),
(3, 5, 2, 'testing modal ', 'maybe it works on adminClient', '2015-08-04 19:03:36', 0),
(4, 2, 4, 'testing 2', 'maybe', '2015-08-04 19:00:33', 0),
(5, 4, 2, 'asdas', 'dasdasd', '2015-08-04 19:03:05', 0);

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
(5, 2, 'content', '<h3 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-top: 4px; margin-bottom: 10px; color: rgb(71, 81, 104); text-align: justify;"><b>Angela Mark: A Canadian Fashion Designer</b></h3><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">Angela Mark Fashion Designs is a Canadian Company established in 1987, specializing in high quality clothing for busy professional women.</h4><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">A Canadian fashion designer, originally from Montreal, Angelaâ€™s love for fashion was inspired from a very young age. Being tall posed fitting challenges for Angela, and when her clothing didnâ€™t fit well, she knew she didnâ€™t look her best and also felt awkward and uncomfortable. Angela found it frustrating and difficult to find simple, well cut clothes that fit properly.</h4><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">Her desire to dress well, and ultimately, to look and feel great, evolved into a passion for beautiful fabrics, classic yet current styling, and a keen eye for quality, workmanship and details.</h4><h4 style="font-family: Lato, sans-serif; font-weight: 500; line-height: 1.1; margin-bottom: 10px; color: rgb(121, 121, 121); text-align: justify;">The realization that many women faced the same fitting challenges and desires for beautiful, quality clothing resulted in Angelaâ€™s decision to pursue a career in helping women feel great through clothing and styleâ€¦. Angela attended Ryerson Polytechnical Institute in Toronto, and in 1987, at 22 years of age, launched her own label.</h4>'),
(6, 3, 'content', '\r\n						\r\n						Testimonials a test'),
(7, 4, 'content', '\r\n						Testing made to measure. changing'),
(8, 5, 'content', 'test ready to wear'),
(9, 6, 'content', 'Testing our team');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagephotos`
--

INSERT INTO `pagephotos` (`id`, `path`, `pageId`, `date`, `active`, `subtitle`, `description`) VALUES
(1, 'web/assets/img/slides/1.jpg', 1, '2015-07-29 06:12:40', 1, '', NULL),
(2, 'web/assets/img/slides/2.jpg', 1, '2015-07-29 06:12:44', 1, '', NULL),
(3, 'web/assets/img/slides/3.jpg', 1, '2015-07-29 06:12:51', 1, '', NULL),
(6, 'web/assets/img/slides/11708039_849061338511264_1481902462559700104_o.jpg', 1, '2015-07-29 07:48:22', 0, '', NULL),
(8, 'web/assets/img/aboutUs/Angela2.png', 2, '2015-07-31 08:49:43', 1, 'tsasd', NULL),
(9, 'web/assets/img/testimonials/1.jpg', 3, '2015-07-31 09:10:33', 1, 'Empower', 'photo test');

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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext,
  `imagePath` varchar(100) DEFAULT NULL,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `imagePath`, `postDate`, `userID`) VALUES
(1, 'Title test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor tincidunt efficitur. Sed vel magna ac tellus finibus malesuada condimentum vitae augue. Suspendisse varius, lorem eget consectetur ultrices, dui arcu pellentesque augue, tempor dignissim odio diam venenatis odio. Fusce eros augue, rutrum sit amet ligula in, sagittis volutpat mauris. Aenean non hendrerit urna, eu dictum eros. Proin aliquam maximus quam quis rutrum. Aliquam laoreet sem ligula, quis dignissim justo luctus ut. Cras venenatis felis nulla, at rutrum lorem cursus eu. Etiam nec elit fermentum, dictum nibh vel, finibus mi. In hac habitasse platea dictumst. Quisque sollicitudin felis nulla. Nulla fermentum semper nunc, ac consectetur tortor tempor quis. Vestibulum augue urna, condimentum nec blandit eu, tempus condimentum massa. Sed elementum consectetur magna, eget molestie urna sollicitudin eget.Quisque at urna posuere, placerat libero ac, suscipit mauris. Donec blandit sem non mauris commodo, ac maximus quam elementum. Nunc nec nisi felis. Integer non hendrerit velit. Aenean aliquet nisi erat, eu commodo nibh pharetra et. Maecenas fringilla, odio vitae consequat eleifend, orci lacus suscipit nibh, eget scelerisque mi orci sed enim. Morbi interdum mi id magna efficitur ullamcorper. Morbi mollis tincidunt ipsum, pharetra vehicula justo vulputate ac. Maecenas sit amet ipsum mauris. Integer iaculis massa quis ligula viverra, sed faucibus lacus molestie. Quisque tincidunt, turpis malesuada efficitur suscipit, nibh nisl lacinia eros, eget commodo metus felis sed lorem.Nullam hendrerit turpis tellus. Curabitur quis vehicula libero. Fusce egestas vestibulum metus quis rhoncus. Suspendisse et mauris imperdiet, maximus neque vitae, mattis libero. Praesent et pulvinar urna. In hac habitasse platea dictumst. Duis at odio tortor. Etiam consectetur id turpis vitae euismod. Nunc ac aliquet libero, sed pharetra magna. Nulla facilisi.Curabitur vel quam sodales, pulvinar ligula ut, imperdiet tortor. Nam enim turpis, euismod et leo feugiat, vestibulum laoreet erat. Integer id urna molestie, facilisis nibh sit amet, lobortis metus. Etiam maximus convallis nibh nec ornare. Integer sed nunc ipsum. Duis a fringilla libero. Phasellus nec fringilla augue. Aenean pulvinar nunc id tortor gravida, et lacinia ante commodo. Sed aliquam imperdiet orci a dictum.Vivamus faucibus metus id eros gravida, non lacinia justo iaculis. Nunc eget placerat orci. Ut a sem ac risus feugiat elementum non non lectus. Aliquam id ex facilisis, fringilla magna nec, consectetur turpis. Aenean vel ligula id dui venenatis posuere sed et odio. Aenean in lacus quis sem luctus imperdiet ut vel nisi. Praesent pellentesque sed nunc molestie ornare. Nullam et feugiat mauris, at elementum nulla. Aenean ut mauris risus.Quisque semper augue eget placerat sollicitudin. Nullam malesuada volutpat elit suscipit varius. Praesent vel diam cursus, lacinia erat vel, pretium enim. Curabitur at est nec tellus interdum malesuada. Maecenas porttitor tortor quis dolor vestibulum luctus. Donec posuere lorem turpis, non imperdiet ex pellentesque non. Suspendisse laoreet, leo quis pellentesque elementum, sapien nibh auctor tortor, nec semper diam ante et velit. Nam vel odio interdum massa pharetra luctus. Integer consectetur lectus arcu, sit amet semper elit commodo at.Suspendisse vitae consequat purus.', NULL, '2015-06-18 15:08:42', 1),
(2, 'Title test 2 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor tincidunt efficitur. Sed vel magna ac tellus finibus malesuada condimentum vitae augue. Suspendisse varius, lorem eget consectetur ultrices, dui arcu pellentesque augue, tempor dignissim odio diam venenatis odio. Fusce eros augue, rutrum sit amet ligula in, sagittis volutpat mauris. Aenean non hendrerit urna, eu dictum eros. Proin aliquam maximus quam quis rutrum. Aliquam laoreet sem ligula, quis dignissim justo luctus ut. Cras venenatis felis nulla, at rutrum lorem cursus eu. Etiam nec elit fermentum, dictum nibh vel, finibus mi. In hac habitasse platea dictumst. Quisque sollicitudin felis nulla. Nulla fermentum semper nunc, ac consectetur tortor tempor quis. Vestibulum augue urna, condimentum nec blandit eu, tempus condimentum massa. Sed elementum consectetur magna, eget molestie urna sollicitudin eget.Quisque at urna posuere, placerat libero ac, suscipit mauris. Donec blandit sem non mauris commodo, ac maximus quam elementum. Nunc nec nisi felis. Integer non hendrerit velit. Aenean aliquet nisi erat, eu commodo nibh pharetra et. Maecenas fringilla, odio vitae consequat eleifend, orci lacus suscipit nibh, eget scelerisque mi orci sed enim. Morbi interdum mi id magna efficitur ullamcorper. Morbi mollis tincidunt ipsum, pharetra vehicula justo vulputate ac. Maecenas sit amet ipsum mauris. Integer iaculis massa quis ligula viverra, sed faucibus lacus molestie. Quisque tincidunt, turpis malesuada efficitur suscipit, nibh nisl lacinia eros, eget commodo metus felis sed lorem.Nullam hendrerit turpis tellus. Curabitur quis vehicula libero. Fusce egestas vestibulum metus quis rhoncus. Suspendisse et mauris imperdiet, maximus neque vitae, mattis libero. Praesent et pulvinar urna. In hac habitasse platea dictumst. Duis at odio tortor. Etiam consectetur id turpis vitae euismod. Nunc ac aliquet libero, sed pharetra magna. Nulla facilisi.Curabitur vel quam sodales, pulvinar ligula ut, imperdiet tortor. Nam enim turpis, euismod et leo feugiat, vestibulum laoreet erat. Integer id urna molestie, facilisis nibh sit amet, lobortis metus. Etiam maximus convallis nibh nec ornare. Integer sed nunc ipsum. Duis a fringilla libero. Phasellus nec fringilla augue. Aenean pulvinar nunc id tortor gravida, et lacinia ante commodo. Sed aliquam imperdiet orci a dictum.Vivamus faucibus metus id eros gravida, non lacinia justo iaculis. Nunc eget placerat orci. Ut a sem ac risus feugiat elementum non non lectus. Aliquam id ex facilisis, fringilla magna nec, consectetur turpis. Aenean vel ligula id dui venenatis posuere sed et odio. Aenean in lacus quis sem luctus imperdiet ut vel nisi. Praesent pellentesque sed nunc molestie ornare. Nullam et feugiat mauris, at elementum nulla. Aenean ut mauris risus.Quisque semper augue eget placerat sollicitudin. Nullam malesuada volutpat elit suscipit varius. Praesent vel diam cursus, lacinia erat vel, pretium enim. Curabitur at est nec tellus interdum malesuada. Maecenas porttitor tortor quis dolor vestibulum luctus. Donec posuere lorem turpis, non imperdiet ex pellentesque non. Suspendisse laoreet, leo quis pellentesque elementum, sapien nibh auctor tortor, nec semper diam ante et velit. Nam vel odio interdum massa pharetra luctus. Integer consectetur lectus arcu, sit amet semper elit commodo at.Suspendisse vitae consequat purus. Pellentesque blandit magna sit amet eleifend varius. Aenean libero purus, lobortis nec euismod ac, aliquam vel nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hac habitasse platea dictumst. Maecenas ac interdum ex. Duis orci orci, euismod ac quam vitae, tincidunt vestibulum nibh. Duis sit amet elit non eros suscipit consectetur.Duis orci est, venenatis ut lacus eget, lacinia luctus lectus. Mauris feugiat, ex id pulvinar suscipit, ex dui faucibus nulla, sit amet vehicula leo tortor nec mauris. Nullam vitae sem eget enim auctor molestie. Nunc turpis est, efficitur quis elementum at, venenatis nec sem. Duis non enim in augue tincidunt tincidunt sit amet sit amet eros. Praesent egestas auctor ligula id mollis. Nulla vitae aliquam nunc. Maecenas venenatis nulla turpis, quis malesuada ex posuere quis. Nulla finibus velit nulla, id vulputate purus pharetra vel. Ut in porta ipsum.Praesent sit amet odio eget lorem sodales dignissim. Morbi pharetra tortor quis rutrum malesuada. Suspendisse pulvinar sodales pretium. Cras lacinia pretium tellus, a porttitor eros molestie id. Donec ultricies gravida erat et finibus. Curabitur magna turpis, finibus commodo sem et, tempor malesuada nulla. Aliquam erat volutpat. Vestibulum vestibulum porta imperdiet. Mauris gravida magna ac tincidunt sagittis.Vestibulum scelerisque, purus vel porta sollicitudin, purus lorem consequat urna, sit amet iaculis enim massa ac est. Phasellus molestie urna malesuada, molestie magna quis, eleifend magna. Ut vel iaculis purus, sed pulvinar nunc. Donec eu imperdiet lorem. Quisque dapibus, risus rutrum interdum egestas, leo lorem aliquam leo, vitae convallis libero quam nec velit. Nam mollis et leo et semper. Mauris eget placerat est. Duis purus mauris, finibus a ante sit amet, mollis gravida sapien. Proin sit amet molestie tortor, quis faucibus dui. Donec eu tortor quis odio sodales ornare at ut dolor. Fusce ut libero lectus. In lacinia facilisis nisl a tincidunt. Sed malesuada mi velit, eu feugiat arcu sagittis sit amet. Fusce viverra mauris et lobortis imperdiet. Sed faucibus ante at purus finibus lacinia.', NULL, '2015-06-18 14:48:40', 1);

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
(2, 'User'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(4) DEFAULT '3'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `firstName`, `lastName`, `address`, `postalCode`, `city`, `province`, `administratorID`, `status`) VALUES
(2, NULL, '$2y$07$VA1ZwZA5fZJGOFcELSZhBeuii0NdCP24Npg7QQS.XPDNG2ylUfA8C', 'T\rYÁ9}’F8W-&aùR¢Ÿ', 'thiago.evangelista@test.com', 'Thiago ', 'Thiago ', '836 Talwood Drive', 'K9J7G8', 'Peterborough', 'ON', 2, 2),
(3, NULL, '$2y$07$VA1ZwZA5fZJGOFcELSZhBeuii0NdCP24Npg7QQS.XPD...', 'T\r\nYÁ9}’F8W-&aùR¢Ÿ\r\nt', 'admin@admin.com', 'Thi', 'Evan', NULL, NULL, NULL, NULL, 1, 3),
(4, NULL, '$2y$07$2e4HSZdMZKLYt41TPPEjHOO0Ys1CAnbL5HU7YWBEFKd.soQgBCs6O', 'ÙîI—Ld¢Ø·S<ñ#–Š=†', 'admin2@admin.com', 'Thiago  ', 'Thiago ', '', '', '', '', 1, 2),
(5, NULL, '$2y$07$BcfLaap4VH2oXupTJmeb7.Eplx80YY6fHmLsPdA3Dr1RkOS0cEREG', 'ÇËiªxT}¨^êS&g›ìä3Ý…¢', 'ricardo.vcr2@gmail.com', 'ricardo', 'ricardo', NULL, NULL, NULL, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wardrobe`
--

CREATE TABLE IF NOT EXISTS `wardrobe` (
  `id` int(4) unsigned NOT NULL,
  `userId` int(4) unsigned NOT NULL,
  `clothesId` int(4) unsigned NOT NULL,
  `date` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wardrobe`
--

INSERT INTO `wardrobe` (`id`, `userId`, `clothesId`, `date`) VALUES
(0, 2, 1, '0000-00-00 00:00:00.0000');

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_appointments_customers` (`customerID`), ADD KEY `fk_appointments_consultants` (`consultantID`), ADD KEY `fk_appointments_wishlists` (`wishlistID`);

--
-- Indexes for table `bodymeasures`
--
ALTER TABLE `bodymeasures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_clothing` (`code`), ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `clothinglookpieces`
--
ALTER TABLE `clothinglookpieces`
  ADD PRIMARY KEY (`clothingLookID`,`clothingID`), ADD KEY `fk_clothingLookPieces_clothing` (`clothingID`);

--
-- Indexes for table `clothinglooks`
--
ALTER TABLE `clothinglooks`
  ADD PRIMARY KEY (`id`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `clothingmeasures`
--
ALTER TABLE `clothingmeasures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothingtagged`
--
ALTER TABLE `clothingtagged`
  ADD PRIMARY KEY (`tagID`,`clothingID`), ADD KEY `fk_clothingTagged_clothing` (`clothingID`);

--
-- Indexes for table `clothingtype`
--
ALTER TABLE `clothingtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_comments_posts` (`postID`), ADD KEY `fk_comments_users` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_messages_fromUsers` (`fromUserID`), ADD KEY `fk_messages_toUsers` (`toUserID`);

--
-- Indexes for table `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_pagecontent_pages` (`pageID`);

--
-- Indexes for table `pagephotos`
--
ALTER TABLE `pagephotos`
  ADD PRIMARY KEY (`id`), ADD KEY `pageId` (`pageId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_posts_clerks` (`userID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_tags` (`name`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_userRoles_users` (`userID`), ADD KEY `fk_userRoles_roles` (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users` (`username`,`email`), ADD KEY `fk_administrators_users` (`administratorID`);

--
-- Indexes for table `wardrobe`
--
ALTER TABLE `wardrobe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_wishlist_costumers` (`costumerID`), ADD KEY `fk_wishlist_clothingLooks` (`clothingLookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bodymeasures`
--
ALTER TABLE `bodymeasures`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clothing`
--
ALTER TABLE `clothing`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clothinglooks`
--
ALTER TABLE `clothinglooks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clothingmeasures`
--
ALTER TABLE `clothingmeasures`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clothingtype`
--
ALTER TABLE `clothingtype`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pagephotos`
--
ALTER TABLE `pagephotos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
ADD CONSTRAINT `fk_appointments_wishlists` FOREIGN KEY (`wishlistID`) REFERENCES `wishlists` (`id`);

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
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_comments_posts` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`);

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
