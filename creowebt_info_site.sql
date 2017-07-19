-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 02:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creowebt_info_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_domain` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `f_name`, `l_name`, `address`, `profile_pic`, `phno`, `status`, `date_tyme`, `company_domain`, `company_name`, `company_email`) VALUES
(1, 'admin@creowebtech.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rajendra', 'Patil1', '1 Ashok Nagar Satpur Nashik', 'account_pic.jpg', '95951600951', 1, '2015-06-08 19:47:18', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE IF NOT EXISTS `tbl_blogs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `descriptions` text CHARACTER SET utf16 NOT NULL,
  `blog_date` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `posted_by` varchar(10) NOT NULL DEFAULT 'Admin',
  `status` int(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `title`, `image_name`, `short_description`, `descriptions`, `blog_date`, `tags`, `posted_by`, `status`, `date_tyme`) VALUES
(1, 'titlesd fsdfasdasd 1', 'spider.jpg', 'descriptionasd asdc 1', 'PHA+PHN0cm9uZz5hc2Rhc2RhIDwvc3Ryb25nPmFzZCBhc2QgJm5ic3A7MSZuYnNwOzwvcD4NCg==', '2015-08-28', 'sda da 1', 'Admin', 1, '2015-08-31 12:12:46'),
(2, 'title', 'roadblock.jpg', 'asd asd a', 'PHA+Jm5ic3A7c2Qgc2Rmc2RmPC9wPg0K', '2015-08-13', 's sdfs', 'Admin', 1, '2015-08-31 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_blog_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `blog_id` varchar(10) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_blog_comments`
--

INSERT INTO `tbl_blog_comments` (`id`, `blog_id`, `users_name`, `email`, `comments`, `status`) VALUES
(2, '1', 'Rajendra Patil', 'rajendra827@gmail.com', 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 0),
(3, '1', 'Rajendra Patil', 'rajendra827@gmail.com', 'asd******************************************************************************************************\r\n\r\nHello Sir/Madam,\r\n \r\nOur Company is currently working on Web-ERP(Enterprise Resource Planning), Web-Portals, Websites, eCommerce,Cloud Computing, ', 0),
(4, '1', 'Rajendra Patil', 'rajendra827@gmail.com', 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 0),
(5, '1', 'This is test', 'print@asdasd.asd', 'asd asd asdasd adasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appointment_date` varchar(255) NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_email` varchar(255) NOT NULL,
  `person_phone` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'sent_to_admin',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_booking_appointment`
--

INSERT INTO `tbl_booking_appointment` (`id`, `appointment_date`, `appointment_time`, `person_name`, `person_email`, `person_phone`, `status`, `date_tyme`) VALUES
(1, '2015-10-07', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'sent_to_admin', '2015-10-07 12:23:38'),
(2, '2015-10-07', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'sent_to_admin', '2015-10-07 12:25:45'),
(3, '2015-10-07', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'sent_to_admin', '2015-10-07 12:25:55'),
(4, '2015-10-07', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'confirmed', '2015-10-07 12:26:13'),
(8, '2015-10-07', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'sent_to_admin', '2015-10-08 10:43:47'),
(9, '2015-10-09', '08:00-12:00', 'rajendra patil', 'rajendra827@gmail.com', '', 'sent_to_admin', '2015-10-08 12:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_details`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `fax_no` varchar(255) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact_details`
--

INSERT INTO `tbl_contact_details` (`id`, `email_id`, `phone_no`, `fax_no`, `address`, `status`, `date_tyme`) VALUES
(1, 'rajendra@creowebtech.com1', '95951600951', '95951600951', '<p><strong>4</strong>, Shivaji Park, Ganesh Nagary, Ashok Nagar, Satpur, Nashik-&nbsp;<strong>422012</strong></p>\r\n', '1', '2015-06-12 10:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquery`
--

CREATE TABLE IF NOT EXISTS `tbl_enquery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_enquery`
--

INSERT INTO `tbl_enquery` (`id`, `name`, `email`, `message`, `status`, `date_tyme`) VALUES
(2, 'Rajendra patil', 'rajendra827@gmail.com', 'asdas dasdasdasd asdasda', '1', '2015-06-13 19:20:12'),
(4, 'rajendra patil', 'rajendra827@gmail.com', 'sdfs fsdf sdf', '1', '2015-08-27 12:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dd` varchar(255) NOT NULL,
  `mm` varchar(255) NOT NULL,
  `yyyy` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tyme` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tickets` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `dd`, `mm`, `yyyy`, `day`, `location`, `title`, `short_description`, `description`, `tyme`, `address`, `tickets`, `status`, `date_tyme`) VALUES
(1, '2', '1', '2017', 'Wednesday', 'nashikasdasd', 'titleasdadsasd', 'dszfsdfsdfasdasd asd asd ad asdazdfsdfs', '<p>sdfsdfsdfasdasd asd asd ad asdazdfsdfsasdasd asd asd ad asdazdfsdfs</p>\r\n', '18:03', 'asdasd asd asd ad asdazdfsdfs', '', '1', '2015-10-03 09:40:20'),
(3, '7', '6', '2019', 'Thirsday', 'nashik', 'This is New Headings. This is2', 'Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.', '<p>Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.Thisi si very good event.</p>\r\n', '10:57', '11, sunrich apartment, parijat nagar, nashik-422005', '', '1', '2015-10-03 13:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_page_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_home_page_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `banner_position` varchar(255) NOT NULL DEFAULT 'Top',
  `lower_title` varchar(255) NOT NULL DEFAULT 'About',
  `bottom_container_heads` varchar(255) NOT NULL,
  `bottom_container_desc` text CHARACTER SET utf16 NOT NULL,
  `menu_background_color` varchar(100) NOT NULL,
  `menu_hover_color` varchar(100) NOT NULL,
  `lowerinfo_background_color` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_home_page_settings`
--

INSERT INTO `tbl_home_page_settings` (`id`, `banner_position`, `lower_title`, `bottom_container_heads`, `bottom_container_desc`, `menu_background_color`, `menu_hover_color`, `lowerinfo_background_color`) VALUES
(1, 'Bottom', 'About1324asd1', 'This is container Heading', 'PGggID48c3Ryb25nPkNyZW8gV2VidGVjaDwvc3Ryb25nPiB3b3JrIGdpdmVzIHlvdSB0aGUgb3Bwb3J0dW5pdHkgdG8gZmluZCB3aGF0IGRyaXZlcyB5b3UuIFdlIGFyZSBwcm91ZCBvZiBob3cgd2UgaW5zcGlyZSBwZW9wbGUgLSB0byBkbyBtb3JlLCBiZSBtb3JlIGFuZCBmdXJ0aGVyIHByb2Zlc3Npb25hbCBkZXZlbG9wbWVudC4mbmJzcDs8L2gyPg0K', 'rgba(13,7,48,1)', '#98ce29', '#d64e4e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_box`
--

CREATE TABLE IF NOT EXISTS `tbl_info_box` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `headings` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_info_box`
--

INSERT INTO `tbl_info_box` (`id`, `image_name`, `headings`, `meta_keywords`, `short_description`, `status`) VALUES
(2, 'g7.jpg', 'as da da d', ' asdas das', 'asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sda', 1),
(3, 'g6.jpg', 'asd adasdas asd adasdas', 'asd adasdas', 'asd adasdas asd adasdas asd adasdas asd adasdas asd adasdasasd adasdas asd adasdas asd adasdas asd adasdas asd adasdasasd adasdas asd adasdas asd adasdas asd adasdas asd adasdas', 1),
(4, 'g7.jpg', 'btn_update_infobox', 'btn_update_infobox', 'btn_update_infobox tn_updat e_infobox btn_u pdate_i nfobox btn_update_info box btn_update_infobox tn_updat e_infobox btn_u pdate_i nfobox btn_update_info box', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lower_infobox`
--

CREATE TABLE IF NOT EXISTS `tbl_lower_infobox` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `headings` varchar(255) NOT NULL,
  `short_descriptions` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_lower_infobox`
--

INSERT INTO `tbl_lower_infobox` (`id`, `headings`, `short_descriptions`, `status`) VALUES
(2, 'This is anather test Headings', 'asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sda asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaas', '1'),
(3, 'This is test new Headings', 'asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sda asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaas', '1'),
(4, 'This is test Headings ', 'asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sda asd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaasd asdsadada sda sdaas', '1'),
(5, 'f', 'ff', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf16 NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `image_name`, `description`, `news_date`, `status`, `date_tyme`) VALUES
(1, 'ttile', 'roadblock.jpg', 'PHA+c2QgZCBmZGcgZGZnPC9wPg0K', '2015-09-15', '1', '2015-09-06 07:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE IF NOT EXISTS `tbl_newsletter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `email_id`, `status`, `date_tyme`) VALUES
(1, 'rajendra827@gmail.com', 1, '2015-06-13 07:02:52'),
(3, 'rajendra@creowebtech.com', 1, '2015-06-13 12:51:33'),
(4, 'resdf@asd.asf', 1, '2015-08-27 13:22:52'),
(5, 'asda2342@asdasd.asd', 1, '2015-08-27 13:25:26'),
(6, 'rajen34dra827@gmail.com', 1, '2015-08-27 13:26:47'),
(7, 'rajenasdasdasddra827@gmail.com', 1, '2015-08-27 13:28:16'),
(8, 'asad@asdasd.asd', 1, '2015-08-27 13:28:46'),
(9, 'ressddsfsdfdf@asd.asf', 1, '2015-09-03 12:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_design`
--

CREATE TABLE IF NOT EXISTS `tbl_newsletter_design` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nl_title` varchar(255) NOT NULL,
  `nl_subject` varchar(255) NOT NULL,
  `nl_design` text NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_newsletter_design`
--

INSERT INTO `tbl_newsletter_design` (`id`, `nl_title`, `nl_subject`, `nl_design`, `status`, `date_tyme`) VALUES
(1, 'This is title2sad asd', 'This is Subject2asdasdas das', 'PHA+VGhpcyBpcyBkZXNpZ248L3A+DQo=', '1', '2015-06-13 12:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_tax` varchar(255) NOT NULL,
  `product_shipping_charges` varchar(255) NOT NULL,
  `product_total_price` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact_no` varchar(255) NOT NULL,
  `customer_postal_code` varchar(255) NOT NULL,
  `customer_town` varchar(255) NOT NULL,
  `customer_country` varchar(255) NOT NULL,
  `customer_email_id` varchar(255) NOT NULL,
  `customer_payment_status` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `delivery_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `status` varchar(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `product_name`, `product_price`, `product_tax`, `product_shipping_charges`, `product_total_price`, `product_qty`, `customer_fname`, `customer_lname`, `customer_address`, `customer_contact_no`, `customer_postal_code`, `customer_town`, `customer_country`, `customer_email_id`, `customer_payment_status`, `order_no`, `delivery_status`, `status`, `date_tyme`) VALUES
(4, 'ASHWAGANDA', '500', '5', '10', '535', '1', 'rajendra', 'patil', 'nashik\r\nnashik', '3242', '422012', 'nashik', 'Netherland', 'rajendra827@gmail.com', 'open', '1435176588', 'Pending', '1', '2015-06-24 20:09:47'),
(5, 'ASHWAGANDA', '500', '5', '10', '5260', '10', 'rajendra', 'patil', 'nashik\r\nnashik', '3242', '422012', 'nashik', 'Netherland', 'rajendra827@gmail.com', 'open', '1435307112', 'Pending', '1', '2015-06-26 08:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_details`
--

CREATE TABLE IF NOT EXISTS `tbl_product_details` (
  `id` int(5) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `short_description` text CHARACTER SET utf8 NOT NULL,
  `price` varchar(255) NOT NULL,
  `tax` varchar(10) NOT NULL DEFAULT '0',
  `shipping_charges` varchar(10) NOT NULL DEFAULT '0',
  `available_qty` varchar(255) NOT NULL,
  `long_description` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_details`
--

INSERT INTO `tbl_product_details` (`id`, `product_name`, `short_description`, `price`, `tax`, `shipping_charges`, `available_qty`, `long_description`, `status`, `date_tyme`) VALUES
(1, 'ASHWAGANDA', '<p>Ashwaganda is een plantaardig middel, zonder chemische toevoegingen zoals gluten, gist, kleur-, geur- en smaakstoffen of conserveermiddelen. Het heeft veel toepassingen en wordt o.a. gebruikt bij stress en innerlijke onrust.</p>\r\n\r\n<p>Inhoud: 120 tabletten 700mg</p>\r\n\r\n<p>Ingredienten: withania somnifera</p>\r\n\r\n<p>Dosering: tweemaal daags 1 &aacute; 2 tabletten met water inemen</p>\r\n\r\n<p>Dit product bevat geen allergenen en hulpstoffen en is geschikt voor vegetari&euml;rs en veganisten</p>\r\n', '500', '5', '10', '37', '<p>Er zijn zo veel toepassingen voor Ashwaganda dat het bijna onmogelijk zou zijn om op te noemen. De meest gebruikte toepassingen zijn: Zorgt voor gezonde hersencellen<br />\r\nEnergie verhogend<br />\r\nWerkt libido verhogend<br />\r\nVermindert stress<br />\r\nVermindert bloedarmoede<br />\r\nVertraagt de veroudering van het lichaam<br />\r\nVermindert oververmoeidheid<br />\r\nVerbetert de nachtrust<br />\r\n<br />\r\nVerbetert de vruchtbaarheid<br />\r\nVerbetert de hormoonfunctie&nbsp;</p>\r\n', '1', '2015-06-12 13:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_gallary`
--

CREATE TABLE IF NOT EXISTS `tbl_product_gallary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_description` varchar(25) NOT NULL,
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_product_gallary`
--

INSERT INTO `tbl_product_gallary` (`id`, `image_name`, `image_description`, `date_tyme`) VALUES
(7, 'productslide-1.jpg', 'Ashwagandha1', '2015-06-13 06:14:38'),
(9, 'productslide-2.jpg', 'Ashwagandha 2', '2015-06-13 06:15:53'),
(10, 'productslide-4.jpg', 'Ashwagandha 3', '2015-06-13 06:16:09'),
(12, 'thumbnailslide-2.jpg', '', '2015-06-13 06:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `bg_colors` varchar(255) NOT NULL,
  `allday` varchar(255) NOT NULL,
  `is_available` int(3) NOT NULL DEFAULT '1',
  `status` varchar(2) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `title`, `start_date`, `end_date`, `start_time`, `end_time`, `bg_colors`, `allday`, `is_available`, `status`, `date_tyme`) VALUES
(6, 'Available In Clinic', '2015-10-09', '2015-10-09', '08:00', '12:00', '#738e0d', 'false', 1, '1', '2015-10-08 11:14:48'),
(7, 'Lunch Break', '2015-10-09', '2015-10-09', '12:00', '13:00', '#ff002d', 'false', 0, '1', '2015-10-08 11:15:35'),
(8, 'In Clinic', '2015-10-09', '2015-10-09', '13:00', '18:00', '#738e0d', 'false', 1, '1', '2015-10-08 11:17:00'),
(9, 'Full Day Clinic', '2015-10-08', '2015-10-08', '08:00', '18:00', '#51913b', 'false', 1, '1', '2015-10-08 12:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_website_pages` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_position` varchar(255) NOT NULL,
  `page_content` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_website_pages`
--

INSERT INTO `tbl_website_pages` (`id`, `menu_name`, `page_title`, `page_position`, `page_content`, `status`, `date_tyme`) VALUES
(3, 'Services', 'This is our services', '1', '<h2><strong>Product Description</strong></h2>\r\n\r\n<p>Ashwaganda is een plantaardig middel, zonder chemische toevoegingen zoals gluten, gist, kleur-, geur- en smaakstoffen of conserveermiddelen. Het heeft veel toepassingen en wordt o.a. gebruikt bij stress en innerlijke onrust.</p>\r\n\r\n<ul>\r\n <li>Inhoud: 120 tabletten 700mg</li>\r\n <li>Ingredienten: withania somnifera</li>\r\n <li>Dosering: tweemaal daags 1 &aacute; 2 tabletten met water inemen</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Product Description</strong></h2>\r\n\r\n<p>Dit product bevat geen allergenen en hulpstoffen en is geschikt voor vegetari&euml;rs en veganisten</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Er zijn zo veel toepassingen voor Ashwaganda dat het bijna onmogelijk zou zijn om op te noemen. De meest gebruikte</p>\r\n\r\n<p>toepassingen zijn: Zorgt voor gezonde hersencellen</p>\r\n\r\n<ul>\r\n <li>Energie verhogend</li>\r\n <li>Werkt libido verhogend</li>\r\n <li>Vermindert stress</li>\r\n <li>Vermindert bloedarmoede</li>\r\n <li>Vertraagt de veroudering van het lichaam</li>\r\n <li>Vermindert oververmoeidheid</li>\r\n</ul>\r\n\r\n<p>Verbetert de nachtrust</p>\r\n\r\n<ul>\r\n <li>Verbetert de vruchtbaarheid</li>\r\n <li>Verbetert de hormoonfunctie&nbsp;</li>\r\n</ul>\r\n', '1', '2015-06-12 10:04:33'),
(4, 'Customer Service', 'Customer Service', '2', '<p>test</p>\r\n', '1', '2015-06-13 08:37:43'),
(5, 'Site Map', 'Site Map', '2', '<p><a href="http://creowebtech:8080/product_site/site/#">Site Map</a>&nbsp;test</p>\r\n', '1', '2015-06-13 08:38:01'),
(6, 'FAQ', 'FAQ', '2', '<p>FAQ</p>\r\n', '0', '2015-06-13 08:38:33'),
(8, 'Events', 'These are out Upcoming events', '1', '<p>Creo Webtech is an offshore software development and web development company in nashik, India which focuses on high quality software development, cost effective and timely delivered projects. Our company has highly trained and skilled professionals to develop client&#39;s projects with highly qualitative and professionally using latest technologies like .Net, PHP, Java, Flex Silver light and more. Our Software developers have an ability to develop an application with complex functionalities and have achieved commercial success.</p>\r\n\r <p><img alt="" src="http://creowebtech.com/images/pic10.jpg"  /></p>\r\n\r\n<p>We assist our clients to develop custom software applications and help them throughout software development Life Cycle which includes Logo design, Web design, Graphing Designing, Flash Presentation, Domain Registration,Web Hosting Website development, Online Branding, Search Engine Optimization, Development (Word press, Joomla, Magneto, Drupal) software development and implementation. We are also providing technology trainings, Internship Program &amp; Academic Project guidance for students. Creo Webtech helps organizations to reduce time to market, acquire closer to customers and reach a long term, profitable growth. .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r <h3 >Mission Statement</h3>\r\n\r <p><img alt="" src="http://creowebtech.com/images/1.jpg"  /></p>\r\n\r\n<p>To Provide excellent customer service with the dual commitment of our consultants who are treated as the most valuable assets of the company resulting in optimization and successful outcomes with our clients. To successfully function in the longer term all organizations and its members have to set a common vision. we have a vision to become a pioneer in Information &amp; Technology with Innovation .</p>\r\n', '1', '2015-08-15 07:12:00'),
(9, 'Blogs', 'This is our Blogs', '2', '<p>Creo Webtech is an offshore software development and web development company in nashik, India which focuses on high quality software development, cost effective and timely delivered projects. Our company has highly trained and skilled professionals to develop client&#39;s projects with highly qualitative and professionally using latest technologies like .Net, PHP, Java, Flex Silver light and more. Our Software developers have an ability to develop an application with complex functionalities and have achieved commercial success.</p>\r\n\r\n<p><img alt="" src="http://creowebtech.com/images/pic10.jpg" /></p>\r\n\r\n<p>We assist our clients to develop custom software applications and help them throughout software development Life Cycle which includes Logo design, Web design, Graphing Designing, Flash Presentation, Domain Registration,Web Hosting Website development, Online Branding, Search Engine Optimization, Development (Word press, Joomla, Magneto, Drupal) software development and implementation. We are also providing technology trainings, Internship Program &amp; Academic Project guidance for students. Creo Webtech helps organizations to reduce time to market, acquire closer to customers and reach a long term, profitable growth. .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Mission Statement</h3>\r\n\r\n<p><img alt="" src="http://creowebtech.com/images/1.jpg" /></p>\r\n\r\n<p>To Provide excellent customer service with the dual commitment of our consultants who are treated as the most valuable assets of the company resulting in optimization and successful outcomes with our clients. To successfully function in the longer term all organizations and its members have to set a common vision. we have a vision to become a pioneer in Information &amp; Technology with Innovation .</p>\r\n', '1', '2015-08-27 12:05:07'),
(10, 'News and Announcement', 'This is our News and Announcement', '1', '<h  >JOIN WITH US</h2>\r\n\r\n<p>Creo Webtech work gives you the opportunity to find what drives you. We are proud of how we inspire people - to do more, be more and further professional development. There are countless possibilities for your career in the direction that suits your lifestyle, whether it is moving in a different department, more in a leadership role or to find your vocation on the other side the world</p>\r\n\r <h2 >&nbsp;</h2>\r\n\r\n<hr />\r\n<p>CAREER OPPORTUNITIES</p>\r\n\r\n<hr />\r\n<p>Send your updated resume to&nbsp;<a href="mailto:careers@creowebtech.com">careers@creowebtech.com</a></p>\r\n', '0', '2015-08-27 12:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_website_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website_title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `for_contact_page` varchar(255) NOT NULL,
  `for_newsletter_page` varchar(255) NOT NULL,
  `for_support` varchar(255) NOT NULL,
  `payment_api` varchar(255) NOT NULL DEFAULT 'test',
  `youtube_link` varchar(255) NOT NULL DEFAULT 'No',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `date_tyme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logo_position` varchar(255) NOT NULL,
  `display_schedule` varchar(10) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_website_settings`
--

INSERT INTO `tbl_website_settings` (`id`, `logo`, `website_title`, `keywords`, `description`, `facebook`, `twitter`, `google_plus`, `youtube`, `linkedin`, `for_contact_page`, `for_newsletter_page`, `for_support`, `payment_api`, `youtube_link`, `status`, `date_tyme`, `logo_position`, `display_schedule`) VALUES
(1, 'logo.png', 'Simple Site', 'Website development', 'This is my simple website', 'http://www.facebook.com', 'http://www.twiter.com', 'http://www.gplus.com', 'http://www.youtube.com', 'http://www.linkedin.com', 'enquiry@creowebtech.com', 'no-reply@creowebtech.com', 'support@creowebtech.com', 'test_aD8nq5GGCbXNWfsqQ6ePAdKc9ahehr', 'uNLqEl0qgbE', '1', '2015-06-12 12:08:28', 'left', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_website_slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `headings` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_website_slider`
--

INSERT INTO `tbl_website_slider` (`id`, `headings`, `descriptions`, `status`) VALUES
(1, 'This is test Headings 2', 'This is test description 2. This is test description 2 . This is test description 2. This is test description 2. This is test description 2.', '1'),
(2, 'This is test Headings 1', 'This is test description 1. This is test description 1. This is test description 1. This is test description 1. This is test description 1. ', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
