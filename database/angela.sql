-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 05:43 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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
(3, 'Dress');

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
(1, '#B4C2BE');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'no-reply@nodomain.com'),
(2, 'receivecontact@nodomain.com'),
(3, 'receivecareer@nodomain.com');

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
-- Table structure for table `looks`
--

CREATE TABLE IF NOT EXISTS `looks` (
  `id` int(10) unsigned NOT NULL,
  `clothing1id` int(10) unsigned NOT NULL,
  `clothing2id` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `id` int(10) unsigned NOT NULL,
  `pageID` int(11) NOT NULL,
  `variable` varchar(30) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`id`, `pageID`, `variable`, `content`) VALUES
(2, 1, 'content', '<div style="text-align: center;"><span style="color: inherit;">sdadsda</span></div>'),
(5, 2, 'content', '<div><h4 class="text-center">About us:</h4><div class="title" style="line-height: 22.3999996185303px;"><hr /></div><h5 style="text-align: justify;"><span style="color: #656565;"><span style="font-weight: 300; line-height: 22.3999996185303px;">Angela Mark Fashion Designs is a Canadian Companyt established in 1987, specializing in high quality clothing for busy professional women.</span></span></h5><h5 style="text-align: justify;"><span style="color: #656565;"><span style="font-weight: 300; line-height: 22.3999996185303px;">A Canadian fashion designer, originally from Montreal, Angelaâ€™s love for fashion was inspired from a very young age. Being tall posed fitting challenges for Angela, and when her clothing didnâ€™t fit well, she knew she didnâ€™t look her best and also felt awkward and uncomfortable. Angela found it frustrating and difficult to find simple, well cut clothes that fit properly.</span></span></h5><h5 style="text-align: justify;"><span style="line-height: 22.3999996185303px; color: rgb(101, 101, 101); font-weight: 300;">Her desire to dress well, and ultimately, to look and feel great, evolved into a passion for beautiful fabrics, classic yet current styling, and a keen eye for quality, workmanship and details</span></h5><h5 style="text-align: justify;"><span style="color: rgb(101, 101, 101); font-weight: 300; line-height: 1.6em;">The realization that many women faced the same fitting challenges and desires for beautiful, quality clothing resulted in Angelaâ€™s decision to pursue a career in helping women feel great through clothing and styleâ€¦. Angela attended Ryerson Polytechnical Institute in Toronto, and in 1987, at 22 years of age, launched her own label.</span></h5></div>'),
(6, 3, 'content', '\r\n						\r\n						Testimonials a test a testandoa'),
(7, 4, 'content', '<div class="title" style="line-height: 22.3999996185303px;"><h4 class="text-center">Made to Measure:</h4><hr /></div><div class="pf-detail" style="line-height: 22.3999996185303px;"><p style="text-align: justify;">The valuable experience of working directly with her loyal and repeat clientele for many years as a personal stylist and designer of made to measure clothing, Angela has continually evolved, modified and improved her patterns and styling each season.</p><p style="text-align: justify;">Angela purchases beautiful fabrics and interprets her designs as reflections of her clienteleâ€™s beauty, personalities and expectations for that feeling that they get when they wear her designs.&nbsp;<br /><br />To meet with an Angela Mark Stylist or learn more about our Made to Measure services, please book an appointment.</p></div>'),
(8, 5, 'content', '<h4 class="text-center" style="box-sizing: border-box; font-family: ''Open Sans'', Arial, sans-serif; font-weight: 700; line-height: 1.1em; color: rgb(51, 51, 51); margin-top: 10px; margin-bottom: 20px; font-size: 18px; text-align: center;">Ready To Wear:</h4><div class="title" style="line-height: 22.3999996185303px;"><hr /></div><div class="pf-detail" style="line-height: 22.3999996185303px;"><p style="text-align: justify;">The Ready to Wear Collections that Angela now designs and manufacturers reflects the attention to detail and the fit that has become distinctive of her label. The result is beautiful clothing that can be purchased off the rack and looks and feels like it has been custom made!</p></div>'),
(9, 6, 'content', '<h4 class="text-center"><br /></h4><h4 class="text-center">Our Team:</h4><div class="title" style="line-height: 22.3999996185303px;"><hr /></div><h5 style="text-align: justify;"><span style="line-height: 1.1em;">FAVOURITE QUOTE:</span></h5><p style="line-height: 22.3999996185303px; text-align: justify;">â€œLorem ipsum dolor sit amet, consectetur adipiscing elit.â€ - Jane Doe</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">THREE CHARACTERISTICS YOUâ€™RE BOUND TO LEARN QUICKLY:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">MY STORY:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p><br style="line-height: 22.3999996185303px;" /><h5 style="text-align: justify;">I LOVE:</h5><p style="line-height: 22.3999996185303px; text-align: justify;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>'),
(10, 7, 'content', '<div class="container" style="line-height: 22.3999996185303px; text-align: justify;"><div class="row"><div class="col-md-12 text-justify" style="width: 1160px;"><h4 class="text-center">Privacy Policy:</h4><div class="title" style="line-height: 22.3999996185303px; text-align: start;"><hr /></div><p style="text-align: justify;">Angela Mark Fashion Designs collects the following personal information from you when you use the feedback form on our web site:</p><span style="font-weight: 700;">-Your name;</span><br /><span style="font-weight: 700;">-Your email address;</span><br /><span style="font-weight: 700;">-And/or your telephone number.</span><p></p><br /><p style="text-align: justify;">We require this information in order to respond to your inquiry or comment. By completing our feedback form, you are giving your consent for Angela Mark Fashion Designs to use this information only for the purpose of contacting you.We will not use your personal information for any other purpose. We will not sell your personal information or share it with a third party unless required to do so by law.</p><p style="text-align: justify;">If you choose to be added to our mailing list, we will retain your email address on file so that we can send you periodic announcements of interest. You can request to be removed from our mailing list at any time. We respect and value your privacy. If you have any questions or concerns about our privacy policy or the way we use your personal information, please contact:</p></div></div></div><p style="line-height: 22.3999996185303px; text-align: justify;">&nbsp;</p><h5 style="text-align: center;">Privacy Officer</h5><h5 style="text-align: center;">Angela Mark Fashion Designs&nbsp;<br />Peterborough Office&nbsp;<br />231 King Street&nbsp;<br />Peterborough, ON K9J 2R8&nbsp;<br />Tel (705) 742-7315&nbsp;<br />Email: privacy@angelamark.com</h5>'),
(11, 8, 'content2', '<div class="title" style="line-height: 22.3999996185303px;"><h4 class="text-center">How it works:</h4><hr /></div><ul class="lead list-unstyled pf-list"><li><span class="fa fa-arrow-circle-right pr-5"></span>&nbsp;<span style="font-weight: 700;">Consultation</span></li><li><span class="fa fa-arrow-circle-right pr-10"></span>&nbsp;<span style="font-weight: 700;">Selection of Fabric and Details</span></li><li><span class="fa fa-arrow-circle-right pr-10"></span>&nbsp;<span style="font-weight: 700;">Measurement</span></li><li><span class="fa fa-arrow-circle-right pr-10"></span>&nbsp;<span style="font-weight: 700;">Fitting</span></li></ul>'),
(12, 9, 'content', '<h4>TELEPHONE</h4><p style="margin-bottom: 5px; padding: 0px;"><i class="icon-phone"></i>+1 705.742.7315</p><h4>Email</h4><p style="margin-bottom: 5px; padding: 0px;"><i class=""></i>showroom@angelamark.com</p><h4 class="title custom-font text-black">BUSINESS HOURS</h4><p style="margin-bottom: 5px; padding: 0px;">Monday - Saturday 9am to 4pm&nbsp;<br />Sunday- Closed&nbsp;</p>'),
(13, 10, 'content', '<h4 class="title custom-font text-black">ADDRESS</h4><address>231 King Street,&nbsp;<br />Peterborough, CA&nbsp;<br />ON K9J 2R8</address><h4 class="title custom-font text-black">BUSINESS HOURS</h4><p style="margin-bottom: 5px; padding: 0px;">Monday - Friday 8am to 4pm&nbsp;<br />Saturday - 7am to 6pm&nbsp;<br />Sunday- Closed&nbsp;<br /></p><h4>TELEPHONE</h4><p style="margin-bottom: 5px; padding: 0px;"><i class="icon-phone"></i>+1 705-742-7315</p>'),
(14, 11, 'link', 'http://projectblog.byethost12.com/wp/'),
(15, 12, 'link', '<script type="text/javascript" src="//diem.simplybook.me/iframe/pm_loader_v2.php?width=800&url=//diem.simplybook.me&theme=clean_slide_pink&layout=cleanside&timeline=modern_week&mobile_redirect=1"></script>');

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
(11, 'web/assets/img/ourTeam/2.jpg', 6, '2015-08-10 01:09:28', 1, 'Angela Mark Fashion Designs', NULL),
(21, 'web/assets/img/readyToWear/business.jpg', 5, '2015-08-11 18:37:30', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sempi convalli.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convallis massa vel bibendum. Mauris semper id nisl eu convallis. Pellentesque habitant morbi tristique senectus et netus et mal'),
(33, 'web/assets/img/madeToMeasure/2.jpg', 4, '2015-08-11 22:27:55', 1, 'asdass a', 'as das as dsa das das d'),
(34, 'web/assets/img/index/business.jpg', 1, '2015-08-12 14:28:52', 1, 'Donec ullamcorper nulla ', 'Donec ullamcorper nulla non metus auctor fringilla..'),
(35, 'web/assets/img/testimonials/business.jpg', 3, '2015-08-12 15:21:29', 1, 'Empower 2 Maybe it was him', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus co'),
(38, 'web/assets/img/readyToWear/logo2.png', 5, '2015-08-12 16:30:54', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convalli', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer semper convallis massa vel bibendum. Mauris semper id nisl eu convallis. Pellentesque habitant morbi tristique senectus et netus et mal'),
(39, 'web/assets/img/index/1.jpg', 1, '2015-08-12 18:08:34', 1, 'Vestibulum id ligula porta. ', 'Vestibulum id ligula porta felis euismod semper.');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(4) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(1, 'index'),
(2, 'aboutUS'),
(3, 'testimonials'),
(4, 'mateToMeasure'),
(5, 'readyToWear'),
(6, 'ourTeam'),
(7, 'privacy-policy'),
(8, 'madeToMeasureHow'),
(9, 'contactInfo'),
(10, 'career'),
(11, 'blog'),
(12, 'booking');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `firstName`, `lastName`, `address`, `postalCode`, `city`, `province`, `administratorID`, `status`, `picture`, `timeCreated`) VALUES
(1, NULL, '$2y$07$2e4HSZdMZKLYt41TPPEjHOO0Ys1CAnbL5HU7YWBEFKd.soQgBCs6O', 'ÙîI—Ld¢Ø·S<ñ#–Š=†', 'admin@admin.com', 'Admin     ', 'Testing     ', 'Testing Street', 'T1TT1T', 'Testing', 'ON', 1, 2, 'web/assets/images/profilepicture.jpg', '2015-08-10 11:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `wardrobe`
--

CREATE TABLE IF NOT EXISTS `wardrobe` (
  `id` int(4) unsigned NOT NULL,
  `userId` int(4) unsigned NOT NULL,
  `clothesId` int(4) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `looks`
--
ALTER TABLE `looks`
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
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pagephotos`
--
ALTER TABLE `pagephotos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `wardrobe`
--
ALTER TABLE `wardrobe`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
