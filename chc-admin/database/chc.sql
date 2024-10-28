-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 12:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(200) NOT NULL,
  `about_intro` varchar(200) NOT NULL,
  `about_title` varchar(200) NOT NULL,
  `about_desc` varchar(1000) NOT NULL,
  `about_img` varchar(200) NOT NULL,
  `about_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_intro`, `about_title`, `about_desc`, `about_img`, `about_link`) VALUES
(26, 'Culture affects everyone. There is no un-enculturated person anywhere in the world. ', 'Like any organization, every church is a distinct culture,', 'formed and nurtured and perpetuated by the ongoing interaction of leaders and congregants. In addition, every church culture has a life of its own. However a church is organized—with a senior pastor, lead pastor, teaching pastor, along with associates, elders, deacons, directors', 'images/about-img/8235618d35f76fd84a5b6ab4f52c177dchurch-2.PNG', 'www.youtube.com/@CityHarvestGhy'),
(27, '.City of Life is a family growing in the love of Jesus; a community of creativity, purpose, and passion; a culture of generosity towards others; a city where hope lives.', 'A culture of generosity towards others; a city where hope lives', 'Culture plays a critical role in the formation and ongoing development of every church. It is the shared values, beliefs and assumptions that influence how decisions are made; the language, traditions and practices that either draw people close or push them away. In a church context, culture provides a missiological environment for how we “live” our theology and engage the world around us through our displayed convictions. Simultaneously, as a body of believers, culture is our system of shared experiences collectively held and celebrated as we pursue a modeled practice of Christ-formed transformation.', 'images/about-img/0dc61762f8fcad20421524277754158fchurch-event-4.PNG', 'https://www.youtube.com/watch?v=1d8jDEc_9eY');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(200) NOT NULL,
  `banner_img` varchar(500) NOT NULL,
  `banner_desc` varchar(500) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `banner_title` varchar(200) NOT NULL,
  `added_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_img`, `banner_desc`, `added_date`, `banner_title`, `added_time`) VALUES
(41, 'images/banners/8772075cf4473f70edbd929bd61a1202churchSlider.jpeg', 'Though it is true that leaders lead and thus have a decisive and sometimes overriding voice in the formation of culture, it’s more accurate to say that leaders and congregations form the church’s culture together.', '2024-04-17 00:00:00', 'EVERY CHURCH IS A CULTURE (WHAT IS YOURS?)', '16:05:26'),
(43, 'images/banners/5b898b44147896e4c91f70087a5f94b5church-4.PNG', 'Like any organization, every church is a distinct culture, formed and nurtured and perpetuated by the ongoing interaction of leaders and congregants. In addition, every church culture has a life of its own. However a church is organized—with a senior pastor, lead pastor, teaching pastor,', '2024-04-17 00:00:00', ' A non-denominational, Word teaching, Spirit-filled church in Guwahati.', '16:06:54'),
(45, 'images/banners/d68bbea0978433d7e26470227e76cff9church-event-3.PNG', 'Think of it this way: Pastors and other leaders exercise a preliminary voice in forming and telling the church’s narrative, acting out the Christian life for others to see, teaching the Christian faith and how it is lived, and articulating policies.', '2024-04-17 00:00:00', 'City Harvest Church, Guwahati ( সিটি হারভেস্ট চার্চ, গুয়াহাটি)', '16:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(30) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_desc` varchar(1000) NOT NULL,
  `blog_date` date NOT NULL DEFAULT current_timestamp(),
  `blog_img` varchar(100) NOT NULL,
  `blog_category` varchar(30) NOT NULL,
  `blog_posted_uid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_desc`, `blog_date`, `blog_img`, `blog_category`, `blog_posted_uid`) VALUES
(46, ' Business contents Church is a type of Events that can protect', '$(\"#subscribed\").css(\"display\", \"none\");\r\n$(\"#validIcon\").html(\'\');\r\n$(\".d-flex\").css(\"outline\", \"none\");\r\n\r\nsetTimeout(function() {\r\n    // Your code to be executed after 5000 milliseconds (5 seconds)\r\n}, 5000); // 5000 milliseconds delay\r\n', '2024-04-17', 'images/blog/7c8a681cd0f163f8e6d19e74dedfe159church-children-gallery2.PNG', 'self power', 71);

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `broadcast_id` int(20) NOT NULL,
  `broadcast_title` varchar(100) NOT NULL,
  `broadcast_description` text NOT NULL,
  `broadcast_link` varchar(100) NOT NULL,
  `broadcast_banner` varchar(100) NOT NULL,
  `broadcast_by` varchar(100) NOT NULL,
  `broadcast_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`broadcast_id`, `broadcast_title`, `broadcast_description`, `broadcast_link`, `broadcast_banner`, `broadcast_by`, `broadcast_date`) VALUES
(40, 'xfvb dxfv', 'dbfggf', 'https://www.youtube.com/watch?v=bD9oQZlDlJU', 'images/broadcast-banners/18e612cbfd3db33352ec3f9ce56fb524church-event1.PNG', '1', '2024-04-24'),
(41, 'Have you thought about the values of the culture your church promotes?', 'What people experience in contact with your church—its services, its leaders, its people, its programs—defines your church’s culture. If you look at the behaviors of the most industrious workers in a church, you will see the culture of your church. Those dutiful servants embody the life of the church. Thus, a church’s culture is not incidental. Your church is its culture, and that culture is your church.', 'https://www.youtube.com/watch?v=bD9oQZlDlJU', 'images/broadcast-banners/9884cc201544cd0031d452203b86736cCHC-user.PNG', '71', '2024-04-20'),
(42, 'A Church Called Tov by Scott McKnight and Laura Barringer', 'Laura Barringer\r\nWhat is the way forward for the church?\r\nTragically, in recent years, Christians have gotten used to revelations of abuses of many kinds in our most respected churches—from Willow Creek to Harvest, from Southern Baptist pastors to Sovereign Grace churches. Respected author and theologian Scot McKnight and former Willow Creek member Laura Barringer wrote this book to paint a pathway forward for the church.\r\n\r\nWe need a better way. The sad truth is that churches of all shapes and sizes are susceptible to abuses of power, sexual abuse, and spiritual abuse. Abuses occur most frequently w', 'https://www.youtube.com/watch?v=6xv-ZlL8fms', 'images/broadcast-banners/d8d13e94cf8dee0eeb7f859c17eeae40CHC-user.PNG', '71', '2024-05-01'),
(43, 'Never underestimate the transformative power of culture.', 'We need a better way. The sad truth is that churches of all shapes and sizes are susceptible to abuses of power, sexual abuse, and spiritual abuse. Abuses occur most frequently when Christians neglect to create a culture that resists abuse and promotes healing, safety, and spiritual growth.\r\n\r\nHow do we keep these devastating events from repeating themselves? We need a map to get us from where we are today to where we ought to be as the body of Christ. That map is in a mysterious and beautiful little Hebrew word in Scripture that we translate “good,” the word tov.\r\n\r\nIn this book, McKnight and Barringer explore the concept of tov—unpacking its richness and how it can help Christians and churches rise up to fulfill their true calling as imitators of Jesus.\r\n\r\nOrder your copy here! >>>', 'https://www.youtube.com/watch?v=ODX3pB1C6Wo', 'images/broadcast-banners/5f185e95070ae29eac6225678ff9b0c3church-event-4.PNG', '71', '2024-04-21'),
(44, 'Instrumental Acoustic Worship and Hymns | Fingerstyle Guitar Collection', 'Excerpted from A Church Called Tov by Scott McKnight and Laura Barringer\r\n\r\nCulture is profoundly important. The culture in which we live teaches us how to behave and how to think. We learn what is good and bad by living in a culture. We learn our moral intuitions, beliefs, and convictions in community. For Christians, this is true in our churches as well as in society at large.\r\n\r\nThink about what you believed was normal and good when you were a child. Now think of what you believed was normal and good after you became a Christian. Where did you learn your instincts? From the culture at home and from the culture within the church. For example, in the culture of the church where I grew up, I learned it was wrong to go to movies.\r\n\r\nCulture affects everyone. There is no un-enculturated person anywhere in the world. No one is unrelated or un-embedded. We’re all shaped by our interactions with others, and that shaping becomes the culture in which we relate to each other.', 'https://www.youtube.com/watch?v=pemyVJJ_Uu0', 'images/broadcast-banners/55203928393afbd7212efe8d209f46bbchurch-song-11.PNG', '71', '2024-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `children_gallery`
--

CREATE TABLE `children_gallery` (
  `ch_g_id` int(20) NOT NULL,
  `ch_g_img` varchar(150) NOT NULL,
  `ch_g_desc` varchar(500) NOT NULL,
  `ch_g_date` date NOT NULL,
  `ch_g_title` varchar(100) NOT NULL,
  `ch_g_keyword` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(50) NOT NULL,
  `events_title` varchar(200) NOT NULL,
  `events_desc` text NOT NULL,
  `events_date` date NOT NULL,
  `event_start_time` varchar(10) NOT NULL,
  `event_end_time` varchar(10) NOT NULL,
  `event_location` varchar(150) NOT NULL,
  `event_img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `events_title`, `events_desc`, `events_date`, `event_start_time`, `event_end_time`, `event_location`, `event_img`) VALUES
(43, 'sdvsdgv', 'fdvsdfvffdvbfb', '2024-05-02', '3:19 PM', '3:19 PM', 'St. Paul’s Cathedral – Kolkata', 'images/event/94252c5ae0b624cbbe8273a35f721528Capture.PNG'),
(44, 'When our power of choice is untram.', 'a  $(\".d-flex\").css(\"outline\", \"2px solid red\");  $(\".d-flex\").css(\"outline\", \"2px solid red\");  $(\".d-flex\").css(\"outline\", \"2px solid red\");  $(\".d-flex\").css(\"outline\", \"2px solid red\");', '2024-05-03', '6:19 AM', '6:19 PM', 'cgvbdc ', 'images/event/5edbdaf4b411865b65a0f6762c730b61church-5.PNG'),
(45, 'cf bcfg b', 'cb fcgb ', '2024-05-02', '3:20 PM', '6:20 AM', 'cv bcv b', 'images/event/cea567dbe87946221b7f0f717386cbd6church-children-gallery2.PNG'),
(46, 'event title1', 'Event Descprition1', '2024-05-03', '3:21 PM', '3:21 PM', 'City Harvest Church Ghuwahati ', 'images/event/562eec3eea3c17e54faae04fe5d6552dcity-harvest-ghuwahati2.PNG'),
(47, 'dzvcsdfv', 'fvdfsvb dfx vb', '2024-04-26', '6:22 PM', '2:22 PM', 'fvdxf vxf', 'images/event/19b0c35b5ea50ddf1441366834538915church-blog1.PNG'),
(48, 'dbn', 'fnfgfgc', '2024-04-30', '3:22 PM', '3:22 PM', ' 56 Thatcher Avenue River Forest', 'images/event/01ff02ee1eaf670642890caa491f2edcchurch-event-4.PNG'),
(49, 'xfbgjhg', 'jkjyuhkmfuh', '2024-05-11', '4:23 AM', '5:23 AM', 'City Harvest Church Ghuwahati ', 'images/event/b28525fef85644fca5299f8697796e32church-events-9.PNG'),
(50, 'sfvdfvdf', 'fgbnfgbfgb nfbn fnfn f', '2024-04-22', '3:23 PM', '3:23 PM', 'City Harvest Church Ghuwahati ', 'images/event/0d0903306a6d0ad9e0d0ad506ea68d78church-event-2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `event_spekers`
--

CREATE TABLE `event_spekers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` varchar(500) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(200) NOT NULL,
  `gallery_img` varchar(300) NOT NULL,
  `img_desc` varchar(1000) NOT NULL,
  `img_title` varchar(200) NOT NULL,
  `img_posted_user_id` int(200) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `added_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_img`, `img_desc`, `img_title`, `img_posted_user_id`, `added_date`, `added_time`) VALUES
(123, 'images/gallery/1dce5d46d3a9a9a37e3ed2864c0f9644animate-photos.jpg', 'xcvxdfvdfv', 'xcv xc', 1, '2024-04-17', '15:33:54'),
(124, 'images/gallery/church-1.PNG', 'Pictures Descprition', 'gallery title new', 1, '2024-04-17', '15:34:38'),
(125, 'images/gallery/church-2.PNG', 'Pictures Descprition', 'gallery title new', 1, '2024-04-17', '15:34:38'),
(126, 'images/gallery/church-3.PNG', 'Pictures Descprition', 'gallery title new', 1, '2024-04-17', '15:34:38'),
(128, 'images/gallery/church-5.PNG', 'Pictures Descpritions$(\"#subscribed\").css(\"display\", \"none\") hides the element with the ID subscribed.\r\n$(\"#validIcon\").html(\'\') clears the HTML content of the element with the ID validIcon.\r\n$(\".d-flex\").css(\"outline\", \"none\") removes the outline from all elements with the class d-flex.\r\nsetTimeout(function() {...}, 5000) delays the execution of the code inside the function by 5000 milliseconds (5 seconds).\r\nMake sure to place this code inside a $(document).ready() function or within an appropriate event handler to ensure that it runs after the DOM is fully loaded.\r\n', 'gallery titles new', 1, '2024-04-17', '15:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `harvest_songs`
--

CREATE TABLE `harvest_songs` (
  `song_id` int(20) NOT NULL,
  `song_name` varchar(50) NOT NULL,
  `song_desc` varchar(1500) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `song_link` varchar(150) NOT NULL,
  `song_img` varchar(500) NOT NULL,
  `date_uploaded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harvest_worship_members`
--

CREATE TABLE `harvest_worship_members` (
  `member_id` int(20) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_phone` varchar(15) NOT NULL,
  `member_role` varchar(30) NOT NULL,
  `member_photo` varchar(100) NOT NULL,
  `member_about` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hw_details`
--

CREATE TABLE `hw_details` (
  `hw_details_id` int(20) NOT NULL,
  `hw_details_title` varchar(100) NOT NULL,
  `hw_details_desc` varchar(300) NOT NULL,
  `hw_details_intro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `os` varchar(200) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `login_time` time DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `os`, `browser`, `ip`, `login_date`, `login_time`, `status`) VALUES
(1, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-06', '20:18:09', 1),
(2, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-07', '20:07:08', 1),
(3, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-08', '22:59:29', 1),
(4, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-09', '22:54:26', 1),
(5, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-10', '21:47:08', 1),
(6, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2021-09-12', '23:42:20', 1),
(7, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-13', '11:52:13', 1),
(8, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-13', '18:04:24', 1),
(9, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-14', '16:03:17', 1),
(10, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-14', '16:04:42', 1),
(11, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-14', '17:00:05', 1),
(12, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-14', '17:03:14', 1),
(13, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:16:32', 1),
(14, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:23:16', 1),
(15, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:24:05', 1),
(16, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:24:38', 1),
(17, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:37:09', 1),
(18, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-15', '11:39:11', 1),
(19, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-21', '12:45:07', 1),
(20, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-22', '11:36:39', 1),
(21, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-23', '11:37:48', 1),
(22, 1, 'Windows 10', 'Chrome', '::1', '2023-09-25', '17:05:20', 1),
(23, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-26', '12:39:57', 1),
(24, 1, 'Windows 10', 'Chrome', '::1', '2023-09-26', '14:42:23', 1),
(25, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-09-28', '13:00:19', 1),
(26, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-10-05', '11:36:22', 1),
(27, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-10-25', '10:51:06', 1),
(28, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-03', '13:34:38', 1),
(29, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-04', '10:21:43', 1),
(30, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-11', '16:32:16', 1),
(31, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-15', '12:44:35', 1),
(32, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-30', '13:09:28', 1),
(33, 18, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-30', '13:17:36', 1),
(34, 18, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-30', '13:18:06', 1),
(35, 18, 'Windows 7', 'Firefox', '127.0.0.1', '2023-11-30', '13:39:58', 1),
(36, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-11', '14:07:31', 1),
(37, 18, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-11', '14:08:22', 1),
(38, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-11', '14:09:02', 1),
(39, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-12', '13:41:14', 1),
(40, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-12', '13:42:46', 1),
(41, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2023-12-28', '12:19:51', 1),
(42, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2024-01-11', '14:03:53', 1),
(43, 1, 'Windows 7', 'Firefox', '127.0.0.1', '2024-01-19', '16:36:17', 1),
(44, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '11:28:27', 1),
(45, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '11:35:09', 1),
(46, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:23:55', 1),
(47, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:42:28', 1),
(48, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:53:11', 1),
(49, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:53:48', 1),
(50, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:58:23', 1),
(51, 27, 'Windows 10', 'Chrome', '::1', '2024-01-23', '12:59:10', 1),
(52, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:14:57', 1),
(53, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:35:52', 1),
(54, 31, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:37:07', 1),
(55, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:40:23', 1),
(56, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:46:15', 1),
(57, 33, 'Windows 10', 'Chrome', '::1', '2024-01-23', '13:47:56', 1),
(58, 39, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:19:48', 1),
(59, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:32:50', 1),
(60, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:46:35', 1),
(61, 40, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:47:44', 1),
(62, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:48:19', 1),
(63, 40, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:48:45', 1),
(64, 1, 'Windows 10', 'Chrome', '::1', '2024-01-23', '15:53:39', 1),
(65, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '11:06:33', 1),
(66, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '11:22:40', 1),
(67, 42, 'Windows 10', 'Chrome', '::1', '2024-01-24', '11:23:10', 1),
(68, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '12:17:05', 1),
(69, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '12:53:10', 1),
(70, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '13:05:05', 1),
(71, 1, 'Windows 10', 'Firefox', '127.0.0.1', '2024-01-24', '13:12:46', 1),
(72, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:03:36', 1),
(73, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:04:24', 1),
(74, 56, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:04:57', 1),
(75, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:05:37', 1),
(76, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:53:37', 1),
(77, 57, 'Windows 10', 'Chrome', '::1', '2024-01-24', '15:54:36', 1),
(78, 1, 'Windows 10', 'Chrome', '::1', '2024-01-24', '16:03:25', 1),
(79, 1, 'Windows 10', 'Chrome', '::1', '2024-01-25', '10:52:56', 1),
(80, 60, 'Windows 10', 'Chrome', '::1', '2024-01-25', '10:59:42', 1),
(81, 1, 'Windows 10', 'Chrome', '::1', '2024-01-25', '11:21:49', 1),
(82, 60, 'Windows 10', 'Chrome', '::1', '2024-01-25', '11:38:08', 1),
(83, 1, 'Windows 10', 'Chrome', '::1', '2024-01-25', '13:25:00', 1),
(84, 60, 'Windows 10', 'Chrome', '::1', '2024-01-25', '13:26:34', 1),
(85, 1, 'Windows 10', 'Chrome', '::1', '2024-01-25', '15:20:58', 1),
(86, 60, 'Windows 10', 'Chrome', '::1', '2024-01-25', '16:42:02', 1),
(87, 1, 'Windows 10', 'Chrome', '::1', '2024-01-25', '16:43:59', 1),
(88, 1, 'Windows 10', 'Chrome', '::1', '2024-01-27', '10:52:40', 1),
(89, 1, 'Windows 10', 'Chrome', '::1', '2024-01-29', '11:54:03', 1),
(90, 1, 'Windows 10', 'Chrome', '::1', '2024-01-30', '10:53:10', 1),
(91, 1, 'Windows 10', 'Chrome', '::1', '2024-01-31', '11:00:28', 1),
(92, 1, 'Windows 10', 'Chrome', '::1', '2024-02-01', '10:59:10', 1),
(93, 60, 'Windows 10', 'Chrome', '::1', '2024-02-01', '13:24:00', 1),
(94, 60, 'Windows 10', 'Chrome', '::1', '2024-02-01', '13:32:11', 1),
(95, 1, 'Windows 10', 'Chrome', '::1', '2024-02-01', '13:32:52', 1),
(96, 1, 'Windows 10', 'Chrome', '::1', '2024-02-02', '11:19:06', 1),
(97, 60, 'Windows 10', 'Chrome', '::1', '2024-02-02', '11:43:02', 1),
(98, 1, 'Windows 10', 'Chrome', '::1', '2024-02-05', '11:10:58', 1),
(99, 1, 'Windows 10', 'Chrome', '::1', '2024-02-06', '10:55:54', 1),
(100, 1, 'Windows 10', 'Chrome', '::1', '2024-02-07', '11:12:58', 1),
(101, 1, 'Windows 10', 'Chrome', '::1', '2024-02-07', '14:03:05', 1),
(102, 1, 'Windows 10', 'Chrome', '::1', '2024-02-07', '16:42:40', 1),
(103, 1, 'Windows 10', 'Chrome', '::1', '2024-02-08', '11:17:02', 1),
(104, 1, 'Windows 10', 'Chrome', '::1', '2024-02-09', '11:03:12', 1),
(105, 1, 'Windows 10', 'Chrome', '::1', '2024-02-10', '11:10:18', 1),
(106, 69, 'Windows 10', 'Chrome', '::1', '2024-02-10', '15:04:36', 1),
(107, 1, 'Windows 10', 'Chrome', '::1', '2024-02-12', '10:54:35', 1),
(108, 69, 'Windows 10', 'Chrome', '::1', '2024-02-12', '11:22:09', 1),
(109, 1, 'Windows 10', 'Chrome', '::1', '2024-02-13', '11:04:31', 1),
(110, 69, 'Windows 10', 'Chrome', '::1', '2024-02-15', '11:13:52', 1),
(111, 69, 'Windows 10', 'Chrome', '::1', '2024-02-16', '11:39:36', 1),
(112, 1, 'Windows 10', 'Chrome', '::1', '2024-02-16', '11:40:23', 1),
(113, 69, 'Windows 10', 'Chrome', '::1', '2024-02-17', '13:33:35', 1),
(114, 1, 'Windows 10', 'Chrome', '::1', '2024-02-19', '12:50:14', 1),
(115, 69, 'Windows 10', 'Chrome', '::1', '2024-02-20', '12:15:04', 1),
(116, 1, 'Windows 10', 'Firefox', '127.0.0.1', '2024-02-20', '12:15:22', 1),
(117, 1, 'Windows 10', 'Chrome', '::1', '2024-02-22', '13:31:41', 1),
(118, 1, 'Windows 10', 'Chrome', '::1', '2024-03-20', '10:47:21', 1),
(119, 1, 'Windows 10', 'Chrome', '::1', '2024-03-27', '11:31:56', 1),
(120, 1, 'Windows 10', 'Chrome', '::1', '2024-03-27', '15:15:28', 1),
(121, 1, 'Windows 10', 'Chrome', '::1', '2024-03-28', '11:27:39', 1),
(122, 1, 'Windows 10', 'Chrome', '::1', '2024-03-28', '13:12:59', 1),
(123, 1, 'Windows 10', 'Chrome', '::1', '2024-03-28', '16:04:18', 1),
(124, 1, 'Windows 10', 'Chrome', '::1', '2024-03-29', '11:00:55', 1),
(125, 1, 'Windows 10', 'Chrome', '::1', '2024-03-30', '11:02:55', 1),
(126, 1, 'Windows 10', 'Chrome', '::1', '2024-03-30', '15:55:03', 1),
(127, 1, 'Windows 10', 'Chrome', '::1', '2024-04-01', '12:15:50', 1),
(128, 1, 'Windows 10', 'Chrome', '::1', '2024-04-02', '11:00:17', 1),
(129, 1, 'Windows 10', 'Chrome', '::1', '2024-04-02', '11:01:56', 1),
(130, 1, 'Windows 10', 'Chrome', '::1', '2024-04-04', '11:35:17', 1),
(131, 1, 'Windows 10', 'Chrome', '::1', '2024-04-05', '10:49:46', 1),
(132, 1, 'Windows 10', 'Chrome', '::1', '2024-04-06', '10:51:31', 1),
(133, 1, 'Windows 10', 'Chrome', '::1', '2024-04-08', '10:51:13', 1),
(134, 1, 'Windows 10', 'Chrome', '::1', '2024-04-09', '11:09:35', 1),
(135, 1, 'Windows 10', 'Chrome', '::1', '2024-04-09', '11:10:09', 1),
(136, 1, 'Windows 10', 'Chrome', '::1', '2024-04-09', '16:31:52', 1),
(137, 1, 'Windows 10', 'Chrome', '::1', '2024-04-10', '10:44:10', 1),
(138, 1, 'Windows 10', 'Chrome', '::1', '2024-04-11', '12:21:29', 1),
(139, 1, 'Android', 'Handheld Browser', '::1', '2024-04-11', '14:00:36', 1),
(140, 1, 'Windows 10', 'Chrome', '::1', '2024-04-11', '14:04:08', 1),
(141, 71, 'Windows 10', 'Chrome', '::1', '2024-04-11', '14:10:58', 1),
(142, 1, 'Windows 10', 'Chrome', '::1', '2024-04-11', '16:01:23', 1),
(143, 71, 'Windows 10', 'Chrome', '::1', '2024-04-11', '16:01:59', 1),
(144, 1, 'Windows 10', 'Chrome', '::1', '2024-04-12', '10:52:30', 1),
(145, 71, 'Windows 10', 'Chrome', '::1', '2024-04-12', '10:52:55', 1),
(146, 71, 'Windows 10', 'Chrome', '::1', '2024-04-16', '10:46:26', 1),
(147, 1, 'Windows 10', 'Chrome', '::1', '2024-04-17', '11:43:58', 1),
(148, 71, 'Windows 10', 'Chrome', '::1', '2024-04-17', '15:56:00', 1),
(149, 1, 'Windows 10', 'Chrome', '::1', '2024-04-18', '10:44:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ministry_details`
--

CREATE TABLE `ministry_details` (
  `ministry_id` int(200) NOT NULL,
  `ministry_desc` varchar(1000) NOT NULL DEFAULT current_timestamp(),
  `ministry_date` date NOT NULL DEFAULT current_timestamp(),
  `ministry_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sermon`
--

CREATE TABLE `sermon` (
  `sermon_id` int(200) NOT NULL,
  `sermon_name` varchar(223) NOT NULL,
  `sermon_description` varchar(1000) NOT NULL,
  `sermonLink` varchar(200) NOT NULL,
  `ser_img` varchar(200) NOT NULL,
  `sermon_sender_id` int(255) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `added_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sermon`
--

INSERT INTO `sermon` (`sermon_id`, `sermon_name`, `sermon_description`, `sermonLink`, `ser_img`, `sermon_sender_id`, `added_date`, `added_time`) VALUES
(47, 'sermon name', 'Sermon Descprition', 'https://youtu.com/FOvOxeb2TCg?si=NjI1EZA810DpPGMP', 'images/sermons/78bc37b0ea959ce66ae3122fc7285edfchurch-event-4.PNG', 1, '2024-04-17', '11:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `sports_club_details`
--

CREATE TABLE `sports_club_details` (
  `sports_club_id` int(20) NOT NULL,
  `sports_club_intro` varchar(100) NOT NULL,
  `sports_club_title` varchar(100) NOT NULL,
  `sports_club_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sports_club_gallery`
--

CREATE TABLE `sports_club_gallery` (
  `club_gallery_id` int(20) NOT NULL,
  `club_gallery_title` varchar(200) NOT NULL,
  `club_gallery_about` varchar(1000) NOT NULL,
  `club_gallery_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports_club_gallery`
--

INSERT INTO `sports_club_gallery` (`club_gallery_id`, `club_gallery_title`, `club_gallery_about`, `club_gallery_img`) VALUES
(18, 'sdvfsd', 'vdgvdf\r\nThe code you provided is close, but there are a couple of issues with it. To retrieve a data attribute value using JavaScript, you should use the getAttribute method or directly access the dataset property. Also, the syntax you used is more jQuery-like, but you seem to be aiming for vanilla JavaScript.', 'images/sportsClubGallery/f1a85740797791433524f77c594d2258church-event1.PNG'),
(19, 'Free Empty User Photos', 'In this example, the DOMContentLoaded event is used to ensure that the JavaScript code runs after the HTML document has been completely loaded. You can replace the setTimeout function with your actual loading logic. Once the loading is complete, the hideLoadingScreen() function is called to hide the loading screen and display the main content.\r\n\r\nThat\'s it! Now you have a basic loading screen that appears when the website is loading and disappears once the content is fully loaded. You can customize the loading screen and loader styles, as well as the loading logic, according to your website\'s design and requirements.', 'images/sportsClubGallery/4b05cf7e3ab8dba67b7f39d5fa132636church-song-10.PNG'),
(20, 'dscsdvcsdfv', 'In this example, the DOMC if(strlen($description) >= 100){', 'images/sportsClubGallery/717b4153dd0424d8ab180322257a9f63church-event-3.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(23, 'ag@gmail.com'),
(24, 'user@gmail.com'),
(25, 'xvszdv@gmail.com'),
(26, 'acd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `user_type` varchar(200) DEFAULT 'USER',
  `added_date` date DEFAULT NULL,
  `added_time` time DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0 inactive, 1 active, 2 banned, 3 left'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `surname`, `phone`, `user_image`, `user_type`, `added_date`, `added_time`, `status`) VALUES
(1, 'admin', 'founder@smartbtr.com', 'bda313b4b93429d66ae54bca49f47822f4cffc7f16c461a40893d9b9a60b382679c1079f1746b9522c7b6e74829967fb6af854ce4436b22f7da1c6bdb398404f', 'SmartBTR', 'Private Limited', '9785475845', 'images/users/will.jpg', 'ADMIN', '2021-09-06', '06:00:00', 1),
(12, 'pranjal', 'pranjal12roy@gmail.com', 'bda313b4b93429d66ae54bca49f47822f4cffc7f16c461a40893d9b9a60b382679c1079f1746b9522c7b6e74829967fb6af854ce4436b22f7da1c6bdb398404fpranjal12roy@gmail.com', 'Pranjal', 'Brahma Ray', '7845858695', 'images/users/23d2a193fdb4325138aac065606216aea.jpg', 'STAFF', '2023-09-26', '14:46:17', 3),
(18, 'willson', 'willsonmarandi@gmail.com', 'bda313b4b93429d66ae54bca49f47822f4cffc7f16c461a40893d9b9a60b382679c1079f1746b9522c7b6e74829967fb6af854ce4436b22f7da1c6bdb398404f', 'Willson ', 'Marandi', '8472868183', 'images/users/75b6ac15e7ea1f350b27299f35367c7cLogo.png', 'ADMIN', '2023-11-30', '13:16:38', 2),
(52, 'kk@gmail.com', 'kk@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'user1', 'hhh', '9586213457', 'images/users/a5b7370fa867efd3fae594570c1464fb01.jpg', 'STAFF', '2024-01-24', '13:34:52', 1),
(53, 'rr@gmail.com', 'rr@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'sda', 'sdcfzd', '9586213457', 'images/users/73db9f388048314cfc352bc8e1d3bd05capsArgo.jpg', 'STAFF', '2024-01-24', '13:36:24', 1),
(60, 'User@gmail.com', 'User@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'sdfcs', 'sdf', '9586213457', 'images/users/679d2c3a17f8ebe558aaaaf0f4106c81emptyimg.jpg', 'STAFF', '2024-01-25', '10:57:46', 1),
(62, 'rd@gmail.com', 'dfg@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'trgb', 'dfg', '9586213457', 'images/users/8762605ffd0e194449657e3d08606264emptyimg.jpg', 'STAFF', '2024-01-29', '15:22:50', 0),
(63, 'w@gmail.com', 'w@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'hello', 'abcd', '9586213457', 'images/users/ec0ce07be63022b7bff025a93ab959eecm.jpg', 'STAFF', '2024-02-01', '13:47:09', 0),
(64, 'd@gmail.com', 'd@gmail.com', '8518d04a7c810abe936747addd85db19d8ea3b1ea20b35a9b6a384cd0e38af3b44b72d3d94facbd18d94f78379a4201ec3bf232e984b560bac561b4852fb19c1', 'sadcf', 'asdfcsd', '9586213457', 'images/users/706babb270ad73f5fe93870b3c6ab718gt.jpg', 'STAFF', '2024-02-01', '13:48:34', 1),
(66, 'kjfsd@gmail.com', 'kjfsd@gmail.com', '6a939910cf41931770526a74c5c078482557efcdc2595af66b8ab50f5e5dc8e80eefc6b107dd33c7fa6aefb97f5bdcea7eeddecdcad68deffbbebc478b81cc38', 'rakj', 'jkl', '9586213457', 'images/users/24d25fd47413e66c107ddfa5ce92bc8dsn.jpg', 'STAFF', '2024-02-01', '13:52:28', 0),
(67, 'fd@gmail.com', 'fd@gmail.com', '79474ba8132de5222aebb7d4145f28e929154e757a81282a2edfcce3b22093a7b699e318e96574115ff35d82f6a4e7a67055969f91a1ad35a6713956bdf9dbbe', 'dsafv', 'ghjngh', '9586213457', 'images/users/fecd18c441d056b36ce2eb144ee088a7gt.jpg', 'STAFF', '2024-02-01', '13:53:12', 0),
(68, 'jR@gmail.com', 'jR@gmail.com', '51490cd975cadd650e4dc7f477421b36c6658cf460fe8b2c54c783c16c0613b8059997ba543b72850409e27f00b2272962564c8c6d8a87a20ee47e7a72a80497', 'ngfv', 'ghjn', '9586213457', 'images/users/37b69109a29f549a58309d7394d9a032cm.jpg', 'STAFF', '2024-02-01', '13:54:23', 1),
(69, 'client@gmail.com', 'client@gmail.com', '79474ba8132de5222aebb7d4145f28e929154e757a81282a2edfcce3b22093a7b699e318e96574115ff35d82f6a4e7a67055969f91a1ad35a6713956bdf9dbbe', 'sd', 'hhh', '8942017568', 'images/users/105c02452dac7c41a2eb292ecfa3ee72jowai.jpg', 'STAFF', '2024-02-10', '15:01:40', 2),
(70, 'Rahul@gmail.com', 'Rahul@gmail.comm', 'bda313b4b93429d66ae54bca49f47822f4cffc7f16c461a40893d9b9a60b382679c1079f1746b9522c7b6e74829967fb6af854ce4436b22f7da1c6bdb398404f', '€Risul', 'Royy', '9562875622', 'images/users/9e1b507bad9ab868b5ddcdb1fc2b62b9CHC-user.PNG', 'STAFF', '2024-03-27', '15:20:55', 1),
(71, 'kishad', 'kisab@gmail.com', 'bda313b4b93429d66ae54bca49f47822f4cffc7f16c461a40893d9b9a60b382679c1079f1746b9522c7b6e74829967fb6af854ce4436b22f7da1c6bdb398404f', 'Kishab', 'Tribedi', '9562875624', 'images/users/2a15f24dbfb7e53847ff7d59a6656206church-blog1.PNG', 'STAFF', '2024-04-11', '14:02:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usher_details`
--

CREATE TABLE `usher_details` (
  `usher_id` int(20) NOT NULL,
  `usher_name` varchar(100) NOT NULL,
  `usher_email` varchar(100) NOT NULL,
  `usher_photo` varchar(200) NOT NULL,
  `usher_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`broadcast_id`);

--
-- Indexes for table `children_gallery`
--
ALTER TABLE `children_gallery`
  ADD PRIMARY KEY (`ch_g_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `event_spekers`
--
ALTER TABLE `event_spekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `harvest_songs`
--
ALTER TABLE `harvest_songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `harvest_worship_members`
--
ALTER TABLE `harvest_worship_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `hw_details`
--
ALTER TABLE `hw_details`
  ADD PRIMARY KEY (`hw_details_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministry_details`
--
ALTER TABLE `ministry_details`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `sermon`
--
ALTER TABLE `sermon`
  ADD PRIMARY KEY (`sermon_id`);

--
-- Indexes for table `sports_club_details`
--
ALTER TABLE `sports_club_details`
  ADD PRIMARY KEY (`sports_club_id`);

--
-- Indexes for table `sports_club_gallery`
--
ALTER TABLE `sports_club_gallery`
  ADD PRIMARY KEY (`club_gallery_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usher_details`
--
ALTER TABLE `usher_details`
  ADD PRIMARY KEY (`usher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `broadcast_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `children_gallery`
--
ALTER TABLE `children_gallery`
  MODIFY `ch_g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `event_spekers`
--
ALTER TABLE `event_spekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `harvest_songs`
--
ALTER TABLE `harvest_songs`
  MODIFY `song_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `harvest_worship_members`
--
ALTER TABLE `harvest_worship_members`
  MODIFY `member_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hw_details`
--
ALTER TABLE `hw_details`
  MODIFY `hw_details_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `ministry_details`
--
ALTER TABLE `ministry_details`
  MODIFY `ministry_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sermon`
--
ALTER TABLE `sermon`
  MODIFY `sermon_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sports_club_details`
--
ALTER TABLE `sports_club_details`
  MODIFY `sports_club_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sports_club_gallery`
--
ALTER TABLE `sports_club_gallery`
  MODIFY `club_gallery_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usher_details`
--
ALTER TABLE `usher_details`
  MODIFY `usher_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
