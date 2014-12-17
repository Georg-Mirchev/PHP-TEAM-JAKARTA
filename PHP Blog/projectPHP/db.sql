-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2014 at 04:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `nameOfComm` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dateOfComm` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `article_id`, `nameOfComm`, `comment`, `dateOfComm`) VALUES
(1, 2, 'asdasd', '0', '2014-12-17 14:28:38'),
(2, 2, 'asdasdasdasda', '0', '2014-12-17 15:03:01'),
(3, 2, 'asdasdasd', '0', '2014-12-17 15:04:14'),
(4, 2, 'asd', '0', '2014-12-17 15:05:55'),
(5, 2, 'sadhladgsjgdh;sgahgalhgaslhgas', 'sdgahdsgahhjgadsjdsgakgdsa', '2014-12-17 15:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE IF NOT EXISTS `blog_members` (
`memberID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Pe6o601', '$2y$10$q.KLm/8dzAihA24qQ4CNSee3FOxOljM.YGfcvM4LF1DmKhGBXIVfy', 'petermarinov22@abv.bg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
`postID` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(1, 'asd', '<p>asdasdasd</p>', '<p>asdasdasdasd</p>', '2014-12-14 13:41:15'),
(2, 'asd', '<p>&lt;script&gt;alert(''Hello'');&lt;/script&gt;</p>\r\n<p>\r\n<script>// <![CDATA[\r\ndocument.getElementsByTagName(''body'') = ''''";\r\n// ]]></script>\r\n<script type="mce-no/type">// <![CDATA[\r\ndocument.getElementsByTagName(''body'') = ''''\r\n// ]]></script>\r\n</p>', '<p>asdasdasdasd</p>', '2014-12-17 13:09:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
 ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
 ADD PRIMARY KEY (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
