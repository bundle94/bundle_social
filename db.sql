-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 06:08 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `file`
--

-- --------------------------------------------------------

--
-- Table structure for table `chibu`
--

CREATE TABLE IF NOT EXISTS `chibu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chibu`
--

INSERT INTO `chibu` (`id`, `document`, `type`, `name`, `description`) VALUES
(3, 'jQueryNotes.pdf', 'cover letter', 'Akobundu Natario ', 'JQUERY NOTES');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `post_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `post_id`, `date_time`) VALUES
(2, 'natario', 'guy watsup u nah...how your life dey go??', '5', '2015-12-18 23:08:57'),
(4, 'amybaby', 'Hey michael and glad the comment is working....cheers', '5', '2015-12-31 03:30:43'),
(8, 'amybaby', 'seriously lets try this once again', '5', '2015-12-31 08:20:46'),
(9, 'amybaby', 'Now lemme check for this one', '1', '2015-12-31 08:22:25'),
(10, 'amybaby', 'lets try this again', '1', '2015-12-31 08:27:00'),
(11, 'amybaby', 'Ok lemme check this one too', '4', '2015-12-31 08:28:55'),
(12, 'amybaby', 'Oya work again make i see', '4', '2015-12-31 08:29:33'),
(13, 'amybaby', 'pls na what is all this', '1', '2015-12-31 08:30:18'),
(14, 'amybaby', 'lol....this is treaky', '1', '2015-12-31 08:38:23'),
(15, 'amybaby', 'booo....naruto', '1', '2015-12-31 09:14:24'),
(16, 'bundle', 'i love this tutorial is off the chainz', '2', '2016-01-03 02:49:35'),
(18, 'bundle', 'hmmm...CBT..hope you will be for the best', '6', '2016-01-03 04:23:54'),
(19, 'amybaby', 'My dear it is going to work that is what we are praying for over here....anyway wia u at now??', '6', '2016-01-04 00:59:46'),
(20, 'bundle', 'To seek a career development with a challenging result-oriented, company for the benefit of the company, society and humanity, and also put in my best into any job I have to do and gain managerial, technical and professional expertise.', '7', '2016-01-13 18:09:07'),
(26, 'bundle', 'Entrants into universities in Nigeria are selected through a nation-wide paper-and-pencil Unified Tertiary Matriculation Examination administered by government-established body called Joint Admission and Matriculation Board (JAMB). In 2013, JAMB introduced computer-based testing (CBT) version of this selection examination, with the plan of making the CBT version the only one in the next few years.', '6', '2016-02-22 03:14:17'),
(27, 'bundle', 'My dear it is going to work that is what we are praying for over here....anyway wia u at now??', '2', '2016-02-22 19:19:43'),
(28, 'bundle', 'i can make you love me...but is a matter of time and the next thing that will come up', '8', '2016-02-23 20:12:57'),
(33, 'bundle', 'The main aim of the project is to develop an online CBT software and network systems so as to share the software among other systems thereby setting up a CBT test centre.', '7', '2016-02-26 09:26:20'),
(34, 'bundle', 'in order to overcome challenges which will enable me to contribute meaningfully towards planning and aiding sustainable economic development of any organization I serve.', '5', '2016-02-26 10:01:11'),
(41, 'bundle', 'somebody shoot this guy', '5', '2016-02-26 10:28:33'),
(47, 'bundle', 'ibeku eh', '8', '2016-03-01 16:09:23'),
(58, 'bundle', 'lets see as my first comment on this page will look like...cos am just trying to keep my code nice and clean,,yuppy', '9', '2016-03-04 13:27:26'),
(59, 'bundle', 'To seek a career development with a challenging result-oriented, company for the benefit of the company, society and humanity, and also put in my best into any job I have to do and gain skills', '10', '2016-03-04 14:41:57'),
(65, 'bundle', 'bundle is killing this web app', '1', '2016-03-07 14:59:17'),
(67, 'bundle', 'please am trying to test my work,i''ll be happy if it works', '10', '2016-03-07 16:13:59'),
(68, 'bundle', 'bundle you''re a bad ass programmer', '13', '2016-03-08 17:29:37'),
(69, 'natario', 'lemme test this program with this guy kwa...it is called balance of power', '8', '2016-03-09 02:28:53'),
(70, 'natario', 'Programming is what i love doing...i just pray God gives the the grace to flow in it.', '2', '2016-03-09 02:31:01'),
(71, 'natario', 'can i comment??', '14', '2016-03-09 03:01:50'),
(72, 'bundle', 'gdhdhgfgffsgdzfa sgftrztaaqws', '13', '2016-04-06 14:03:19'),
(78, 'bundle', 'Wow, this is a very nice write up', '16', '2016-05-23 21:51:36'),
(84, 'natario', 'lol,he goat keh dats very bad to call someone', '21', '2016-05-29 18:18:42'),
(85, 'bundle', 'This the upper level', '19', '2016-08-07 01:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci,
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic_caption` text COLLATE utf8_unicode_ci,
  `short_clip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clip_caption` text COLLATE utf8_unicode_ci,
  `date_time` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enviroment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_date` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_modified` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `what_modified` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shared` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `username`, `post`, `pic`, `pic_caption`, `short_clip`, `clip_caption`, `date_time`, `enviroment`, `author`, `origin_date`, `user_modified`, `what_modified`, `shared`) VALUES
(1, 'bundle', NULL, 'gaara-naruto-29548-1366x768.jpg', 'I so much love naruto', NULL, NULL, '2016-03-06 23:08:57', NULL, NULL, '2015-12-02 17:08:57', 'bundle', 'comment', NULL),
(2, 'amybaby', NULL, NULL, NULL, 'Student Exam Result System in PHP & MYSQL With Source Codes.mp4', 'Check out this result checking system', '2016-03-09 02:31:01', NULL, NULL, '2015-12-04 16:08:57', 'natario', 'comment', NULL),
(4, 'bundle', NULL, 'gaara-naruto-29982-1366x768.jpg', 'naruto', NULL, NULL, '2015-12-04 21:08:57', NULL, NULL, '2015-12-04 21:08:57', NULL, NULL, NULL),
(5, 'bundle', NULL, 'IMG_20151202_141202.jpg', 'cool...looking nice', NULL, NULL, '2016-05-28 15:54:24', NULL, NULL, '2015-12-04 23:08:57', 'bundle', 'comment', NULL),
(6, 'amybaby', ' Entrants into universities in Nigeria are selected through a nation-wide paper-and-pencil Unified Tertiary Matriculation Examination administered by government-established body called Joint Admission and Matriculation Board (JAMB). In 2013, JAMB introduced computer-based testing (CBT) version of this selection examination, with the plan of making the CBT version the only one in the next few years. In order to achieve this, there is need for the eruption of jamb test centres. This paper presents an overview of the application of Information and Communication Technology in the conduct of JAMB examination. It provides a brief historical background of the Pen-and-Paper Testing up to the present practice, using the Computer-Based Testing method. The paper underscored the challenges associated with the former practice, thus justifying the introduction of the latter. The main aim of the project is to develop an online CBT software and network systems so as to share the software among other systems thereby setting up a CBT test centre. ', NULL, NULL, NULL, NULL, '2016-01-02 23:08:57', NULL, NULL, '2016-01-02 23:08:57', NULL, NULL, NULL),
(7, 'bundle', ' Entrants into universities in Nigeria are selected through a nation-wide paper-and-pencil Unified Tertiary Matriculation Examination administered by government-established body called Joint Admission and Matriculation Board (JAMB). In 2013, JAMB introduced computer-based testing (CBT) version of this selection examination, with the plan of making the CBT version the only one in the next few years. In order to achieve this, there is need for the eruption of jamb test centres. This paper presents an overview of the application of Information and Communication Technology in the conduct of JAMB examination. It provides a brief historical background of the Pen-and-Paper Testing up to the present practice, using the Computer-Based Testing method. The paper underscored the challenges associated with the former practice, thus justifying the introduction of the latter. The main aim of the project is to develop an online CBT software and network systems so as to share the software among other systems thereby setting up a CBT test centre. ', NULL, NULL, NULL, NULL, '2016-01-04 23:08:57', NULL, NULL, '2016-01-04 23:08:57', NULL, NULL, NULL),
(8, 'natario', 'Phishing, a criminal act of collecting personal, bank and credit card information by sending out forged e-mails with fake websites, has become the most popular practice among the criminals of the web. Phishing attacks are becoming more and more sophisticated and are constantly on the rise. The impact of phishing is quite drastic since it involves the threat of identity theft and financial losses.\n	We perform a root-cause analysis of the method used in phishing, the motivation for phishing and in the process come up with a fish bone diagram outlining the causes and methodologies used in phishing. This analysis is aimed at helping developers to design and develop better anti phishing solutions.\n', NULL, NULL, NULL, NULL, '2016-03-09 08:29:27', NULL, NULL, '2015-12-10 16:08:57', 'bundle', 'like', NULL),
(9, 'Ndi ABIA', 'Cloud Computing is a broad term that describes a broad range of services. As with other significant developments in technology, many vendors have seized the term Cloud and are using it for products that sit outside of the common definition.In order to truly understand how the Cloud can be of value to an organization, it is first important to understand what the Cloud really is and its different components. Since the Cloud is a broad collection of services, organizations can choose where, when, and how they use Cloud Computing.\nIn this report we will explain the different types of Cloud Computing services commonly referred to as Software as a Service (SaaS), Platform as a Service (PaaS) and Infrastructure as a Service (IaaS) and give some examples and case studies to illustrate how they all work. We will also provide some guidance on situations where particular flavors of Cloud Computing are not the best option for an organization (Ben Kepes, 2011).\n', NULL, NULL, NULL, NULL, '2016-03-03 23:08:57', 'channel', 'bundle', '2016-03-03 23:08:57', NULL, NULL, NULL),
(10, 'Ndi ABIA', NULL, NULL, NULL, 'Page Loading Screen Document Preloader Tutorial JavaScript CSS HTML.mp4', 'This is one of the best videos you can set your eyes on,watch it to improve your skills', '2016-05-19 19:52:49', 'channel', 'bundle', '2016-03-04 10:08:57', 'bundle', 'comment', NULL),
(13, 'bundle', 'Entrants into universities in Nigeria are selected through a nation-wide paper-and-pencil Unified Tertiary Matriculation Examination administered by government-established body called Joint Admission and Matriculation Board (JAMB). In 2013, JAMB introduced computer-based testing (CBT) version of this selection examination, with the plan of making the CBT version the only one in the next few years. In order to achieve this, there is need for the eruption of jamb test centres. This paper presents an overview of the application of Information and Communication Technology in the conduct of JAMB examination. It provides a brief historical background of the Pen-and-Paper Testing up to the present practice, using the Computer-Based Testing method. The paper underscored the challenges associated with the former practice, thus justifying the introduction of the latter. The main aim of the project is to develop an online CBT software and network systems so as to share the software among other systems thereby setting up a CBT test centre.', NULL, NULL, NULL, NULL, '2016-04-20 17:33:22', 'share', NULL, '2016-03-08 17:28:48', 'bundle', 'comment', 'amybaby'),
(14, 'natario', ' Entrants into universities in Nigeria are selected through a nation-wide paper-and-pencil Unified Tertiary Matriculation Examination administered by government-established body called Joint Admission and Matriculation Board (JAMB). In 2013, JAMB introduced computer-based testing (CBT) version of this selection examination, with the plan of making the CBT version the only one in the next few years. In order to achieve this, there is need for the eruption of jamb test centres. This paper presents an overview of the application of Information and Communication Technology in the conduct of JAMB examination. It provides a brief historical background of the Pen-and-Paper Testing up to the present practice, using the Computer-Based Testing method. The paper underscored the challenges associated with the former practice, thus justifying the introduction of the latter. The main aim of the project is to develop an online CBT software and network systems so as to share the software among other systems thereby setting up a CBT test centre. ', NULL, NULL, NULL, NULL, '2016-03-09 03:01:50', 'share', NULL, '2016-03-09 02:46:37', 'natario', 'comment', 'amybaby'),
(16, 'bundle', 'Cloud Computing is a broad term that describes a broad range of services. As with other significant developments in technology, many vendors have seized the term â€œCloudâ€ and are using it for products that sit outside of the common definition.\nIn order to truly understand how the Cloud can be of value to an organization, it is first important to understand what the Cloud really is and its different components. Since the Cloud is a broad collection of services, organizations can choose where, when, and how they use Cloud Computing.', NULL, NULL, NULL, NULL, '2016-05-23 21:51:36', NULL, NULL, '2016-05-23 21:49:41', 'bundle', 'comment', NULL),
(19, 'bundle', 'Goodbye papa...please don''t cry,am gonna find my destiny', NULL, NULL, NULL, NULL, '2016-08-07 01:50:08', NULL, NULL, '2016-05-28 03:28:49', 'bundle', 'comment', NULL),
(21, 'natario', 'Stubborn he goat', NULL, NULL, NULL, NULL, '2016-08-25 10:18:11', NULL, NULL, '2016-05-29 18:17:05', 'bundle', 'comment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `following` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `follower` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `following`, `follower`, `status`, `time1`) VALUES
(1, 'bundle', 'amybaby', '1', '2015-12-010 16:08:57'),
(10, 'natario', 'amybaby', '1', '2015-12-31 14:34:59'),
(12, 'bundle', 'natario', '1', '2015-12-010 17:08:57'),
(15, 'amybaby', 'natario', '1', '2015-12-010 19:08:57'),
(16, 'bundle', 'Ndi ABIA', '1', '2016-03-04 07:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`, `date_time`) VALUES
(2, 'natario', '5', '2015-12-18 23:08:57'),
(36, 'bundle', '5', '2016-02-22 11:08:24'),
(42, 'bundle', '8', '2016-03-09 08:29:27'),
(45, 'bundle', '22', '2016-05-31 13:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cover_photo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `high_school` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `college` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `day` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `email`, `photo`, `password`, `cover_photo`, `phone_number`, `high_school`, `college`, `location1`, `about`, `day`, `month`, `year`, `creator`, `role`) VALUES
(1, 'Akobundu Michael', 'bundle', 'akobundumichael94@gmail.com', 'bun_2.jpg', 'bundle', 'gaara-naruto-29592-1366x768.jpg', '07060815446', 'Government College Umuahia', 'Michael Okpara University of Agriculture,Umudike', 'Umuahia', 'To seek a career development with a challenging result-oriented, company for the benefit of the company, society and humanity, and also put in my best into any job I have to do and gain managerial, technical and professional expertise in order to overcome challenges which will enable me to contribute meaningfully towards planning and aiding sustainable economic development of any organization I serve.', '04', '07', NULL, NULL, NULL),
(2, 'Amarachi Igwegbe', 'amybaby', 'amybaby@yahoo.com', 'IMG_20150610_103016.jpg', 'amybaby', 'profile_cover.png', '08062132032', 'Haraway Sec.School,Lagos ', 'Michael Okpara University of Agriculture,Umudike', 'Lagos', NULL, '22', '02', '1994', NULL, NULL),
(9, 'Akobundu Udochukwu', 'natario', 'udaice@yahoo.com', 'avatar.png', 'natario', 'profile_cover.png', NULL, NULL, NULL, NULL, NULL, '22', '02', NULL, NULL, NULL),
(10, 'Ndi ABIA', 'Ndi ABIA', 'ndiabiachannel@gmail.com', 'about.jpg', 'abia', 'AbiaMapLarge.jpg', '07060815446', NULL, NULL, NULL, NULL, '26', '02', '2016', 'bundle', 'channel');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `time1` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=118 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `time1`, `status`) VALUES
(75, 'amybaby', 'bundle', 'fine boy kedu ka imere', '2015-11-06 13:23:45', 0),
(76, 'xtremrules', 'morris', 'am good and you??...wia u at now??', '2015-11-09 04:57:51', 1),
(78, 'amybaby', 'bundle', 'is amara dat you''re chatting with', '2016-01-07 12:35:58', 0),
(79, 'amybaby', 'natario', 'udo...how u doing??..wia u at now??', '2016-01-07 12:40:06', 1),
(90, 'bundle', 'amybaby', 'Hi sweety....how is it going??', '2016-01-07 21:06:50', 0),
(91, 'natario', 'bundle', 'enyia...wia u dey now??', '2016-01-07 23:06:50', 0),
(97, 'amybaby', 'bundle', 'hi sorry i replied late', '2016-01-09 11:01:44', 0),
(98, 'bundle', 'amybaby', 'dats ok', '2016-01-09 11:02:22', 0),
(99, 'amybaby', 'bundle', 'howdy', '2016-01-09 11:03:06', 0),
(117, 'bundle', 'amybaby', 'sup dear', '2016-02-19 15:47:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_person` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caused_person` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `main_person`, `caused_person`, `message`, `date_time`) VALUES
(1, 'bundle', 'amybaby', 'amybaby started following you', '2015-12-17 23:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `online_friends`
--

CREATE TABLE IF NOT EXISTS `online_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `online_friends`
--

INSERT INTO `online_friends` (`id`, `name`, `time`, `status`, `username`) VALUES
(101, 'Akobundu Michael', '2016-10-05 09:48:44', 'ON', 'bundle'),
(102, 'Akobundu Udochukwu', '2016-05-31 13:11:59', 'OFF', 'natario'),
(103, 'Amarachi Igwegbe', '2016-05-28 15:50:03', 'OFF', 'amybaby');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `pic_name`, `cat`, `username`, `date_time`) VALUES
(1, 'akatsuki 01 [www.vikitech.com] .jpg', 'up', 'bundle', NULL),
(2, 'case-closed-30319-1366x768.jpg', 'up', 'bundle', NULL),
(3, 'gaara-naruto-29548-1366x768.jpg', 'up', 'bundle', NULL),
(4, 'gaara-naruto-29982-1366x768.jpg', 'up', 'bundle', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `who_about` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rep_about` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brief_about` text COLLATE utf8_unicode_ci,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `post_id`, `who_about`, `rep_about`, `brief_about`, `username`) VALUES
(1, '7', 'about friend', 'Abuse', 'they are calling my friend names', NULL),
(2, '7', 'about me', 'Abuse', 'they,re calling me names', NULL),
(4, '7', 'about me', 'Abuse', 'they''re calling me names$', 'bundle'),
(5, '', '', '', '', 'bundle');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_owner` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shared_user` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_clip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` text COLLATE utf8_unicode_ci,
  `comment` text COLLATE utf8_unicode_ci,
  `date_time` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
