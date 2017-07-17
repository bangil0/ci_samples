-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2016 at 08:59 AM
-- Server version: 5.5.44-37.3-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techwbzd_my_directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_type` int(25) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile_picture`, `status`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'http://mydirectory.co.in/my_admin/assets/uploads/admin/1461136033_765-default-avatar.png', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE IF NOT EXISTS `business_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_category_name` varchar(500) NOT NULL,
  `featured_category` int(11) NOT NULL DEFAULT '0',
  `image` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `created_by` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(250) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `business_category_name`, `featured_category`, `image`, `description`, `created_by`, `created_date`, `status`) VALUES
(1, 'Software Development', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/cat1.jpg', 'Techware Solution is an India based software and web development company that focuses on highly qualitative, timely delivered and cost-effective offshore development solution located at the heart of Kochi. We develop solutions that give your business', '1', '2016-04-12 06:13:46', '1'),
(2, 'Restaurant ', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460972906_edaa3-restaurant-hdpictures.jpg', ' is a business which prepares and serves food and drinks to customers in exchange for money, either paid before the meal, after the meal, or with an open account. Meals are generally served and eaten on the premises, but many restaurants also offer t', 'admin', '2016-04-12 06:22:08', '1'),
(3, 'Take the Kids', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/cat3.jpg', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', '1', '2016-04-12 06:58:52', '1'),
(4, 'Electricals', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461137471_cat4.jpg', 'BestofElectricals.com is an online electrical bijli shop where you can browse, compare and shop for 1000’s of premium & genuine electrical products like LED Bulbs, Switches, MCBs, Plug Tops, Fans, Wires - used during construction and renovation of yo', '1', '2016-04-12 07:19:12', '1'),
(5, 'Exercise Classes', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/cat5.jpg', 'Everybody wants better abs!  But more than just looks, strong abs help contribute to overall core strength.  This class has hit ‘em hard abdominal work firming up transverse, obliques, and rectus abdominus. No warm-up included so be ready to work! Fo', '1', '2016-04-12 09:50:35', '1'),
(59, 'Sun Rise', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461137757_1461135306_theme_windows_8_pour_windows_7_panoramic_bridges1_(1).jpg', '\r\nSUNRISE provides its unique concept under one umbrella as the combination of different facilities consists of beautiful blend of excellent ambiance endowed with meticulously maintained horticulture, lush green lawns amidst plenty of herbal plants, trees, shrubs, and flowers is nature’s answer to relaxation and rejuvenation with zero pollution atmosphere surrounded by three side hills gives you a new dimension of living. It is also designed as family resort where we cater to the community of all age group. Number of recreation facilities suitable for kids to old age people established as the assets of the resort.', '1', '2016-04-20 06:44:21', '1'),
(60, 'syhgery', 1, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461137048_theme_windows_8_pour_windows_7_nightfall_starlight_panoramic1_(3).jpg', 'Found this place online while looking for a Roanoke restaurant that might appeal to both my husband and I and our somewhat picky daughter. Varied menu and good reviews drew us there. We were not disappointed - one of the best meals of our vacation. E SUNRISE provides its unique concept under one umbrella as the combination of different facilities consists of beautiful blend of excellent ambiance endowed with meticulously maintained horticulture, lush green lawns amidst plenty of herbal plants, tr SUNRISE provides its unique concept under one umbrella as the combination of different facilities consists of beautiful blend of excellent ambiance endowed with meticulously maintained horticulture, lush green lawns amidst plenty of herbal plants, tr SUNRISE provides its unique concept under one umbrella as the combination of different facilities consists of beautiful blend of excellent ambiance endowed with meticulously maintained horticulture, lush green lawns amidst plenty of herbal plants, tr', '1', '2016-04-20 07:24:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `business_gallery`
--

CREATE TABLE IF NOT EXISTS `business_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `business_gallery`
--

INSERT INTO `business_gallery` (`id`, `business_id`, `image`, `user_id`, `created_date`) VALUES
(4, 173, 'http://mydirectory.co.in/assets/businessimage/1461126770.png', 43, '2016-04-20 04:32:50'),
(5, 173, 'http://mydirectory.co.in/assets/businessimage/1461126782.jpg', 43, '2016-04-20 04:33:02'),
(6, 5, 'http://mydirectory.co.in/assets/businessimage/1461135706.jpg', 34, '2016-04-20 07:01:46'),
(7, 2, 'http://mydirectory.co.in/assets/businessimage/1461136033.jpg', 4, '2016-04-20 07:07:13'),
(8, 2, 'http://mydirectory.co.in/assets/businessimage/1461136039.jpg', 4, '2016-04-20 07:07:19'),
(9, 2, 'http://mydirectory.co.in/assets/businessimage/1461136047.jpg', 4, '2016-04-20 07:07:27'),
(10, 2, 'http://mydirectory.co.in/assets/businessimage/1461136054.jpg', 4, '2016-04-20 07:07:34'),
(11, 2, 'http://mydirectory.co.in/assets/businessimage/1461136067.jpg', 4, '2016-04-20 07:07:47'),
(12, 2, 'http://mydirectory.co.in/assets/businessimage/1461136074.jpg', 4, '2016-04-20 07:07:54'),
(13, 2, 'http://mydirectory.co.in/assets/businessimage/1461136081.jpg', 4, '2016-04-20 07:08:01'),
(14, 2, 'http://mydirectory.co.in/assets/businessimage/1461136104.jpg', 4, '2016-04-20 07:08:24'),
(15, 4, 'http://mydirectory.co.in/assets/businessimage/1461136472.jpg', 4, '2016-04-20 07:14:32'),
(16, 4, 'http://mydirectory.co.in/assets/businessimage/1461137364.jpg', 4, '2016-04-20 07:29:24'),
(17, 4, 'http://mydirectory.co.in/assets/businessimage/1461137370.jpg', 4, '2016-04-20 07:29:30'),
(18, 4, 'http://mydirectory.co.in/assets/businessimage/1461137377.jpg', 4, '2016-04-20 07:29:37'),
(19, 4, 'http://mydirectory.co.in/assets/businessimage/1461137383.jpg', 4, '2016-04-20 07:29:43'),
(20, 159, 'http://mydirectory.co.in/assets/businessimage/1461137473.jpg', 34, '2016-04-20 07:31:13'),
(21, 159, 'http://mydirectory.co.in/assets/businessimage/1461137496.jpg', 34, '2016-04-20 07:31:36'),
(22, 159, 'http://mydirectory.co.in/assets/businessimage/1461137516.jpg', 34, '2016-04-20 07:31:56'),
(23, 163, 'http://mydirectory.co.in/assets/businessimage/1461137619.jpg', 4, '2016-04-20 07:33:39'),
(24, 163, 'http://mydirectory.co.in/assets/businessimage/1461137624.jpg', 4, '2016-04-20 07:33:44'),
(25, 163, 'http://mydirectory.co.in/assets/businessimage/1461137631.jpg', 4, '2016-04-20 07:33:51'),
(26, 163, 'http://mydirectory.co.in/assets/businessimage/1461137637.jpg', 4, '2016-04-20 07:33:57'),
(27, 163, 'http://mydirectory.co.in/assets/businessimage/1461137644.png', 4, '2016-04-20 07:34:04'),
(28, 159, 'http://mydirectory.co.in/assets/businessimage/1461141866.jpg', 34, '2016-04-20 08:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `business_information`
--

CREATE TABLE IF NOT EXISTS `business_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(500) NOT NULL,
  `advertisement_status` varchar(250) NOT NULL DEFAULT '0',
  `phone_number` varchar(250) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `street_address` longtext NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `image` text NOT NULL,
  `open_time` varchar(250) NOT NULL,
  `close_time` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `website` varchar(500) NOT NULL,
  `neighborhoods` varchar(250) NOT NULL,
  `brands` varchar(250) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `amenities` varchar(250) NOT NULL,
  `accreditation` varchar(250) NOT NULL,
  `associations` varchar(250) NOT NULL,
  `other_link` varchar(250) NOT NULL,
  `other_information` varchar(250) NOT NULL,
  `social_links` varchar(250) NOT NULL,
  `hours` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `general_info` varchar(250) NOT NULL,
  `extra_phones` varchar(250) NOT NULL,
  `year_established` int(11) NOT NULL,
  `latitude` varchar(500) NOT NULL,
  `longitude` varchar(500) NOT NULL,
  `created_by` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `business_information`
--

INSERT INTO `business_information` (`id`, `business_name`, `advertisement_status`, `phone_number`, `first_name`, `last_name`, `email`, `categories`, `street_address`, `city`, `state`, `zip_code`, `image`, `open_time`, `close_time`, `description`, `website`, `neighborhoods`, `brands`, `payment_method`, `location`, `amenities`, `accreditation`, `associations`, `other_link`, `other_information`, `social_links`, `hours`, `message`, `general_info`, `extra_phones`, `year_established`, `latitude`, `longitude`, `created_by`, `created_date`, `status`) VALUES
(1, 'Techware Solution', '1', '914843198381', 'nixon', 'jobi', 'info@techware.co.in', '1', 'Techware Solution, Heavenly Plaza ES&FS 7th Floor,Kakkanad, ', 'Cochin', 'kerala', 682021, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525491_Chen_Head_Short.jpg', '09:30 AM', '05:45 PM', 'Techware Solution is an India based software and web development company that focuses on highly qualitative, timely delivered and cost-effective offshore development solution located at the heart of Kochi. We develop solutions that give your business an edge over your competitors with a rich and varied experience in providing offshore web and software development and project management capabilities and stringent quality standards. We are your one-stop shop for website and web application development, e-commerce portal development, software product development, and online marketing services.', 'http://www.techware.co.in', 'yes', 'good', 'credit card', 'ernakulam', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'https://twitter.com/techwareweb', 'a formal organization of people or groups of people', 'http://www.facebook.com/TechwareIT', 'Hour', 'Techware Solution is an India based software and web development company that focuses on highly qualitative, timely delivered and cost-effective offshore development solution located at the heart of Kochi. We develop solutions that give your business', 'Techware Solution is an India based software and web development company that focuses on highly qualitative, timely delivered and cost-effective offshore development solution located at the heart of Kochi. We develop solutions that give your business', '919526038555', 2000, '10.013', '76.331', 'admin', '2016-04-12 06:18:05', '1'),
(2, 'IFAADA SOFTWARE', '1', '02228443554', 'Raju', 'Reni', 'info@ifaadasoftware.com', '1', 'Office No.2 Ground floor, Rukaiya Palace, Somwar Bazar, Malad West, ', 'Mumbai ', 'Maharashtra', 400064, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525491_Chen_Head_Short.jpg', '11:30 AM', '11:30 AM', 'IFAADA SOFTWARE provide services in software applications, extensively used in different kind of business process. Our professional helps in creating interactive Websites and Software Applications, Multimedia Presentations by latest technology. We have done over many attractive web applications, software and have invested substantially in people, processes, research and support to ensure that our customers stay ahead of the competition and lead in their domain. Our commitment to quality and service has earned us the recognition from our customers. ', 'www.test.com', 'yes', 'good', 'credit card', 'Maharashtra', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'http://www.test.com', 'a formal organization of people or groups of people', 'www.facebook.com/TechwareIT', 'Hour', 'IFAADA SOFTWARE provide services in software applications, extensively used in different kind of business process. Our professional helps in creating interactive Websites and Software Applications, Multimedia Presentations by latest technology. We ha', 'IFAADA SOFTWARE provide services in software applications, extensively used in different kind of business process. Our professional helps in creating interactive Websites and Software Applications, Multimedia Presentations by latest technology. We ha', '9323377255', 1989, '19.069', '72.872', 'admin', '2016-04-12 06:28:19', '1'),
(3, 'Inchara', '1', '08022449961', 'Roni', 'jose', 'roni@gmail.com', '2', 'No.22/1, Krishna Building, Puttenahalli Main Road, JP Nagar', 'Banglore', 'Karnataka', 560078, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525502_CMS_Creative_164657191_Kingfisher.jpg', '11:45 AM', '11:45 AM', ' This is one of the old restaurants that’s been there in Bangalore. I can recollect the time when I used to visit the place during the nearly 2000’s. It surely has stood the test of time and I am sure it will stay strong with the love of the people. Infact, the reason for quoting the early days is coz during the days there used to limited set of restaurants serving North Indian food. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Karnataka', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'http://www.test.com', 'a formal organization of people or groups of people', 'http://www.facebook.com', 'Hour', ' This is one of the old restaurants that’s been there in Bangalore. I can recollect the time when I used to visit the place during the nearly 2000’s. It surely has stood the test of time and I am sure it will stay strong with the love of the people. ', ' This is one of the old restaurants that’s been there in Bangalore. I can recollect the time when I used to visit the place during the nearly 2000’s. It surely has stood the test of time and I am sure it will stay strong with the love of the people. ', '08022449961', 1999, '12.912', '77.586', 'admin', '2016-04-12 06:37:40', '1'),
(4, 'Lucky Restaurant', '1', '02226442973', 'Jony', 'john', 'jony@gmail.com', '2', 'Junction of S.V. Road & Hill Road, Bandra', 'Mumbai', 'Maharashtra ', 400050, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525512_jriccitiello.jpg', '11:45 AM', '11:45 AM', 'Found this place online while looking for a Roanoke restaurant that might appeal to both my husband and I and our somewhat picky daughter. Varied menu and good reviews drew us there. We were not disappointed - one of the best meals of our vacation. Every dish was perfectly cooked and delicious. Drinks were unique and good. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Maharashtra', 'no', 'commissioned broker', 'a gud restaurants of Bengalore', 'http://www.test.com', 'a gud restaurants of Bengalore', 'http://www.facebook.com', 'Hour', 'Found this place online while looking for a Roanoke restaurant that might appeal to both my husband and I and our somewhat picky daughter. Varied menu and good reviews drew us there. We were not disappointed - one of the best meals of our vacation. E', 'Found this place online while looking for a Roanoke restaurant that might appeal to both my husband and I and our somewhat picky daughter. Varied menu and good reviews drew us there. We were not disappointed - one of the best meals of our vacation. E', '02226442973', 1998, '19.055', '72.827', 'admin', '2016-04-12 06:43:51', '1'),
(5, 'Wonderla Bangalore Park', '0', '8022010333', 'Raju ', 'Rajesh', 'marketing.blr@wonderla.com', '3', '28th km, Mysore Road, Bangalore 562109', 'Bangalore ', 'Maharastra', 562109, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461137571_wonderla-amusement-park.jpg', '12:15 PM', '12:15 PM', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the children that are both safe and gentle.', 'http://www.test.com', 'yes', 'gud', 'Credit Card', 'Bengalore', 'yes', 'no', 'No', 'http://twitter.com/Wonder_La', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', 'http://www.facebook.com/Wonderla', 'Hours', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', '9945557777', 1989, '12.970', '77.595', 'admin', '2016-04-12 06:46:39', '0'),
(6, 'Wonderla Kochi Park', '1', '4842684001', 'sojan', 'jose', 'marketing.cok@wonderla.com', '3', 'Wonderla Kochi, Kakkanad Pallikara Road, Pallikara, Kumarapuram Post office', 'Kochi', 'kerala', 683565, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460971015_park_1_wonderla_amusement_park_kochi_miaf0g.jpg', '12:15 PM', '12:15 PM', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the children that are both safe and gentle.', 'http://www.test.com', 'yes', 'good', 'credit card', 'ernakulam', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'https://twitter.com/Wonder_La', 'a formal organization of people or groups of people', 'https://www.facebook.com/Wonderla', 'Hour', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', 'Get all set to have a magical experience at the Wonderla Amusement park in Kochi. Here is where the fun begins for the entire family!!! There are thrillers, water based rides and land based rides to choose from. There are also special rides for the c', '9744770000', 1989, '10.015', '76.404', 'admin', '2016-04-12 07:03:12', '1'),
(7, 'NEWBRIGHT ELECTRICAL', '1', '04843129242', 'Alwin ', 'lose', 'Alwin@gmail.com', '4', 'NEW CIVIL LINE ROAD, PADAMUKAL, Kunnumpuram', 'Kochin', 'Kerala ', 682030, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460971482_first-slider.jpg', '09:30 AM', '09:30 PM', 'Bright Electricals and Home Décor provides superior quality electrical fittings and interior decorations at prices that are affordable for common man. It is our endeavor to make quality available in a price that fits everyone’s pocket.We are situated by the side of Civil Line Road, with ample parking space. We have a wide range of products to choose from, which are conveniently and expansively arranged and displayed. We deal both in wholesale and retail.', 'http://www.test.com', 'yes', 'good', 'credit card', 'ernakulam', 'no', 'commissioned broker', 'right Electricals and Home Décor provides superior quality electrical fittings and interior decorations at prices that are affordable for common man', 'http://www.test.com', 'right Electricals and Home Décor provides superior quality electrical fittings and interior decorations at prices that are affordable for common man', 'http://www.facebook.com', 'Hour', 'Bright Electricals and Home Décor provides superior quality electrical fittings and interior decorations at prices that are affordable for common man. It is our endeavor to make quality available in a price that fits everyone’s pocket.\r\n\r\nWe are situ', 'Bright Electricals and Home Décor provides superior quality electrical fittings and interior decorations at prices that are affordable for common man. It is our endeavor to make quality available in a price that fits everyone’s pocket.\r\n\r\nWe are situ', '04843129242', 1989, '10.016', '76.341', 'admin', '2016-04-12 07:24:16', '1'),
(8, 'Luv Kush Electrical', '1', '04522350000', 'Jaffer', 'Mohammed', 'support@luvkushelectrical.com', '4', '88/305-B, West Masi Street, Opp Ayyapan Kovil, Simakkal,', 'Madurai', 'Tamilnadu', 625001, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460972144_WDF_2028113.jpg', '09:30 AM', '09:30 PM', '   Luv Kush Electricals is one of the best supplier and dealer of Electrical products in Madurai. Varieties of Electrical Products are supplied including Wires & Cables, Switches & Accessories, Circuit Protection Products, Switch gears and EB meters & box.', 'http://www.test.com', 'yes', 'good', 'credit card', 'ernakulam', 'no', 'commissioned broker', '   Luv Kush Electricals is one of the best supplier and dealer of Electrical products in Madurai. Varieties of Electrical Products are supplied including Wires & Cables, Switches & Accessories, Circuit Protection Products, Switch gears and EB meters ', 'http://www.luvkushelectrical.com/About-Us-LuvKush-Electrical-Madurai', '   Luv Kush Electricals is one of the best supplier and dealer of Electrical products in Madurai. Varieties of Electrical Products are supplied including Wires & Cables, Switches & Accessories, Circuit Protection Products, Switch gears and EB meters ', 'http://www.luvkushelectrical.com/About-Us-LuvKush-Electrical-Madurai', 'Hour', '   Luv Kush Electricals is one of the best supplier and dealer of Electrical products in Madurai. Varieties of Electrical Products are supplied including Wires & Cables, Switches & Accessories, Circuit Protection Products, Switch gears and EB meters ', '   Luv Kush Electricals is one of the best supplier and dealer of Electrical products in Madurai. Varieties of Electrical Products are supplied including Wires & Cables, Switches & Accessories, Circuit Protection Products, Switch gears and EB meters ', '04522350000', 1992, '9.924', '78.120', 'admin', '2016-04-12 07:24:24', '1'),
(9, 'MindReaders Software', '1', '9698169669', 'Renju', 'john', 'support@mindreaderssoftware.com', '1', ' T(11,12), 3rd Floor,, Alsa Mall, Montieth Rd, Egmore ', 'Chennai', 'Tamil Nadu', 600008, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525558_3d92954.png', '09:00 AM', '05:45 PM', 'Mind Readers Software is a one of best Web Design and Website Development Company in Chennai with global surrender machine that houses a team of technical, creative and avocation experts who purchase best practices, proven expertise and available means to set free the best in Internet products services company. We point of convergence on all Web-based solutions from subtle and unfolding of Static, Dynamic and liquid Website to portals, to incorporated presentations. Being based in Chennai at India, the relating to traffic principal of India, we procure potent Website Design and Development.', 'http://www.test.com', 'yes', 'good', 'credit card', 'Tamilnadu', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'http://twitter.com/mindreaderssoft', 'Mind Readers Software is a one of best Web Design and Website Development Company in Chennai with global surrender machine that houses a team of technical, creative and avocation experts who purchase best practices, proven expertise and available mea', 'http://www.facebook.com/mindreaderssoftware', 'Hour', 'Mind Readers Software is a one of best Web Design and Website Development Company in Chennai with global surrender machine that houses a team of technical, creative and avocation experts who purchase best practices, proven expertise and available mea', 'Mind Readers Software is a one of best Web Design and Website Development Company in Chennai with global surrender machine that houses a team of technical, creative and avocation experts who purchase best practices, proven expertise and available mea', '07667626718', 2001, '13.082', '80.275', '1', '2016-04-12 09:46:06', '1'),
(10, 'Golds Gym', '1', '04843952998', 'anson', 'williams', 'vyttila.cochin@goldsgymindia.com', '5', ' 4th Floor, Syama Business Centre, Vyttila Junction, NH, Bypass, Opp Hindu Office, ', 'Kochi', 'Kerala ', 682019, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525581_o-MAN-EXERCISING-570.jpg', '09:30 AM', '09:30 AM', 'Gold''s Gym started in Venice California in 1965, and soon became the hotbed for the development of training techniques, equipment and nutritional concepts that formed the foundation for the modern fitness revolution. In 1975, Gold''s Gym received international attention when it was featured in the major motion picture, ‘Pumping Iron''. It was thus effectively established as the ‘Mecca of Bodybuilding''.Today, Gold''s Gym has over 700 facilities. It is the largest international gym chain in the world recognized for its passion, unique heritage, and experience as the final authority in fitness and lifestyle.', 'http://www.test.com', 'yes', 'good', 'credit card', 'Kochi', 'no', 'commissioned broker', 'We are still going head strong in promoting a great month dedicated to World Health & Safety Day at Work. Last weekend our teams at Delhi & Indirapuram had a great Posture Correction Workshop. Hope you like what you see', 'http://www.test.com', 'We are still going head strong in promoting a great month dedicated to World Health & Safety Day at Work. Last weekend our teams at Delhi & Indirapuram had a great Posture Correction Workshop. Hope you like what you see', 'http://www.facebook.com/pages/Golds-Gym-India/145224884121', 'Hour', 'Gold''s Gym started in Venice California in 1965, and soon became the hotbed for the development of training techniques, equipment and nutritional concepts that formed the foundation for the modern fitness revolution. In 1975, Gold''s Gym received inte', 'Gold''s Gym started in Venice California in 1965, and soon became the hotbed for the development of training techniques, equipment and nutritional concepts that formed the foundation for the modern fitness revolution. In 1975, Gold''s Gym received inte', '4843952997', 1988, '9.966', '76.317', 'admin', '2016-04-13 04:33:12', '1'),
(11, 'Body In Motion', '1', '9535227965', 'Mithun ', 'jose', 'info@fitternity.com', '5', 'Shop No.422, 7th Cross, Domlur ', 'Bengaluru', 'Karnataka ', 560071, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525589_3d92954.png', '05:30 AM', '10:30 PM', 'We are looking for highly driven individuals who love challenges and want to change the world. There is never a dull moment at Fitternity, we all thrive towards a common goal of making world a fitter place. We believe in fast-track career growth with accountability and high-performing team culture. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Karnataka', 'no', 'commissioned broker', 'Body In Motion is a Fitness & Dance Studio in Domlur Layout. They conduct classes in: Aerobics, Thai Kickboxing, Zumba, Salsa, Kids & Bollywood Dance', 'http://www.test.com', 'We are looking for highly driven individuals who love challenges and want to change the world. There is never a dull moment at Fitternity, we all thrive towards a common goal of making world a fitter place. We believe in fast-track career growth with', 'http://www.facebook.com/Body-In-Motion-83559242116/', 'Hour', 'We are looking for highly driven individuals who love challenges and want to change the world. There is never a dull moment at Fitternity, we all thrive towards a common goal of making world a fitter place. We believe in fast-track career growth with', 'We are looking for highly driven individuals who love challenges and want to change the world. There is never a dull moment at Fitternity, we all thrive towards a common goal of making world a fitter place. We believe in fast-track career growth with', '9535227965', 2000, '12.970', '77.594', 'admin', '2016-04-13 04:53:56', '0'),
(12, 'O2 Health Studio', '1', '9094791924', 'Ramesh', 'Raju', 'ramesh@gmail.com', '5', 'E, 18, 16th Cross St, GOCHS Colony, Besant Nagar', 'Chennai', 'Tamil Nadu', 600090, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460523639_o-MAN-EXERCISING-570.jpg', '05:30 AM', '10:30 PM', 'O2 Health Studio pioneering in Health & Fitness in Chennai, was started on August 2001. Since then, we are proud to have helped thousands of people in Chennai discover fitness. We teach them how to enjoy their workouts, while getting healthy and fit with our diversified exercise programs.You name it & we''ve got it! Our ace of course is; our state of art gymnasium and varied Group exercise classes conducted by trained & experienced instructors who will guide you every step of the way. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Tamilnadu', 'no', 'commissioned broker', 'Body In Motion is a Fitness & Dance Studio in Domlur Layout. They conduct classes in: Aerobics, Thai Kickboxing, Zumba, Salsa, Kids & Bollywood Dance', 'http://twitter.com/O2healthstudio', 'We are looking for highly driven individuals who love challenges and want to change the world. There is never a dull moment at Fitternity, we all thrive towards a common goal of making world a fitter place. We believe in fast-track career growth with', 'http://www.facebook.com/pages/O2-Health-Studio/122022747864830', 'Hour', 'O2 Health Studio pioneering in Health & Fitness in Chennai, was started on August 2001. Since then, we are proud to have helped thousands of people in Chennai discover fitness. We teach them how to enjoy their workouts, while getting healthy and fit ', 'O2 Health Studio pioneering in Health & Fitness in Chennai, was started on August 2001. Since then, we are proud to have helped thousands of people in Chennai discover fitness. We teach them how to enjoy their workouts, while getting healthy and fit ', '9094791920', 2000, '13.079', '80.266', 'admin', '2016-04-13 05:00:39', '1'),
(157, 'JG''s Fitness Centre', '1', '9324246680', 'Gorge', 'jose', 'info@gmail.com', '5', '32 Tagore Road,5th Floor, Gopal Bhuvan, Above Bhargava Nursing Home, Near Poddar School, Santa Cruz (W) ', 'Mumbai', 'Maharashtra ', 400054, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525446_o-MAN-EXERCISING-570.jpg', '05:30 AM', '10:30 PM', 'We offer the most superior fitness equipment with thorough and sound fitness knowledge to our members. With the help of dedicated and certified trainers ,nutritional counseling,and state of the art infrastructure,we aim to maximize the potential of our members towards achieving their goals..Whether your goal is to burn fat, tone or add muscle, build strength, increase flexibility or improve your cardiovascular health and in the process improve the quality of your life and wellbeing, we are there with you all the way.', 'http://www.test.com', 'yes', 'good', 'credit card', 'Maharashtra', 'no', 'commissioned broker', 'Body In Motion is a Fitness & Dance Studio in Domlur Layout. They conduct classes in: Aerobics, Thai Kickboxing, Zumba, Salsa, Kids & Bollywood Dance', 'http://www.twitter.com/', 'We offer the most superior fitness equipment with thorough and sound fitness knowledge to our members. With the help of dedicated and certified trainers ,nutritional counseling,and state of the art infrastructure,we aim to maximize the potential of o', 'http://www.facebook.com/jgsfitnesscentre', 'Hour', 'We offer the most superior fitness equipment with thorough and sound fitness knowledge to our members. With the help of dedicated and certified trainers ,nutritional counseling,and state of the art infrastructure,we aim to maximize the potential of o', 'We offer the most superior fitness equipment with thorough and sound fitness knowledge to our members. With the help of dedicated and certified trainers ,nutritional counseling,and state of the art infrastructure,we aim to maximize the potential of o', '9819496996', 2001, '19.077', '72.875', 'admin', '2016-04-13 05:30:46', '1'),
(158, 'Virgosys', '1', '8022256392', 'Sajan ', 'Sachu', 'Sajan@gmail.com', '1', '#16, 13th Cross, Millers Road Vasanth Nagar Bangalore', 'Bengaluru', ' Karnataka ', 560052, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460526292_maximocavazzani.jpg', '09:30 AM', '05:00 PM', 'Virgosys Software Pvt Ltd has its offshore development center, custom software development firm in Bangalore. It started operations in 1995 and has been serving clients globally. Our company provides creative solutions that not only cater to clients current but future needs as well. The global delivery model being its forte, Virgosys ranks amongst the best of breed solution partners. Highly talented engineers who competently understand the clients long-term requirements are the driving force behind Virgosys. Our company provides services in the field of custom software development and information technology consulting. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Karnataka', 'no', 'commissioned broker', 'a formal organization of people or groups of people', 'http://www.test.com', 'Virgosys Software Pvt Ltd has its offshore development center, custom software development firm in Bangalore. It started operations in 1995 and has been serving clients globally.', 'http://www.facebook.com', 'Hour', 'Virgosys Software Pvt Ltd has its offshore development center, custom software development firm in Bangalore. It started operations in 1995 and has been serving clients globally. Our company provides creative solutions that not only cater to clients ', 'Virgosys Software Pvt Ltd has its offshore development center, custom software development firm in Bangalore. It started operations in 1995 and has been serving clients globally. Our company provides creative solutions that not only cater to clients ', '8022256392', 1998, '12.979', '77.598', 'admin', '2016-04-13 05:44:52', '1'),
(159, 'Hong Kong Chinese ', '1', '9895224737', 'Anu', 'joseph', 'infohongkongrestaurantcochin@gmail.com', '2', 'S.K. Arcades, Opp. CSEZ & Muthoot Technopolis, CSEZ P.O, Seaport Airport Road, Kakkanad ', 'Kochi ', 'kerala', 682037, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460526603_frank.jpg', '09:00 AM', '11:00 PM', 'Hong Kong Chinese Restaurant welcomes you to savour fresh, exquisite and delicious Chinese food in our stylish, enchanting and sumptuous restaurants with warm and friendly service.\r\nIn our traditional Chinese artistic surroundings, you will find a great array of different authentic Chinese dishes that are delicately cooked by our chefs using the best suitable ingredients and traditional Chinese cooking techniques.\r\n\r\nOur aim is to offer you the remunerable, ultimate oriental dining experience with authentic Chinese food. ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Kerala', 'no', 'commissioned broker', 'a gud restaurants of Kerala', 'http://www.test.com', 'Hong Kong Chinese Restaurant welcomes you to savour fresh, exquisite and delicious Chinese food in our stylish, enchanting and sumptuous restaurants with warm and friendly service.', 'http://www.facebook.com', 'Hour', 'Hong Kong Chinese Restaurant welcomes you to savour fresh, exquisite and delicious Chinese food in our stylish, enchanting and sumptuous restaurants with warm and friendly service.\r\nIn our traditional Chinese artistic surroundings, you will find a gr', 'Hong Kong Chinese Restaurant welcomes you to savour fresh, exquisite and delicious Chinese food in our stylish, enchanting and sumptuous restaurants with warm and friendly service.\r\nIn our traditional Chinese artistic surroundings, you will find a gr', '9495261000', 2000, '9.966', '76.317', 'admin', '2016-04-13 05:50:03', '1'),
(160, 'Shri Balaajee Bhavan', '1', '04443162525', 'Balajee', 'bala', 'balajee@gmail.com', '2', '412/7, G.S.T.Road, Chromepet ', 'Chennai', 'Tamil Nadu', 600044, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460527111_Chen_Head_Short.jpg', '07:00 AM', '11:00 PM', 'Started in 1992 by M.S. Tiruvenkadam, a pioneer in the hospitality industry, Shri Balaajee Bhavan’s motto from the first has been to provide quality food with the best customer service and in the past 20 years we have strived to satisfy our customers by providing them with delicious and hygienic food at a moderate rate. To reach a wider horizon and to provide the experience of dining at Balaajee Bhavan to a wider range of customers we extended our branches to Anna Nagar, Saidapet, Ambattur, Chromepet and Mogappair in the following years. We hope to continually satisfy our customers by providing them with an experience they will cherish.', 'http://www.test.com', 'yes', 'good', 'credit card', 'Tamilnadu', 'no', 'commissioned broker', 'a gud restaurants of Tamilnadu', 'http://www.test.com', 'Started in 1992 by M.S. Tiruvenkadam, a pioneer in the hospitality industry, ', 'http://www.facebook.com', 'Hour', 'Started in 1992 by M.S. Tiruvenkadam, a pioneer in the hospitality industry, Shri Balaajee Bhavan’s motto from the first has been to provide quality food with the best customer service and in the past 20 years we have strived to satisfy our customers', 'Started in 1992 by M.S. Tiruvenkadam, a pioneer in the hospitality industry, Shri Balaajee Bhavan’s motto from the first has been to provide quality food with the best customer service and in the past 20 years we have strived to satisfy our customers', '04443162525', 1988, '13.089', '80.214', 'admin', '2016-04-13 05:58:31', '1'),
(161, 'Wonderla Hyderabad', '1', '4023490333', 'jijo', 'john', 'jijo@gmail.com', '3', 'Wonderla Holidays Ltd, ORR Exit No. 13, Survey No.274, Kongara Khurd A Village, Ravirala Post', ' Maheshwaram Mandal', 'Hyderabad ', 44501, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461137103_wonderla-amusement-park.jpg', '09:00 AM', '06:00 PM', 'India''s No. 1 Amusement Park, Wonderla is now coming to Hyderabad to unfold an all-new chapter of thrill. Brace yourself, Wonderla Amusement Park, Hyderabad will take you on a ride you have never experienced before. Our 43 world-class rides at the park will mesmerize you and will leave you asking for more. Wonderla Hyderabad offers the perfect package for all the age groups with its 25 land based rides and 18 water based attractions. Soak and splash in exhilarating water rides, feel the rush of adrenaline on high-thrill rides, and get pampered with the finest facilities in leisure for the whole family. So, go ahead Hyderabad, pack your bags for a thrill-filled experience that will leave you enthralled for days! ', 'http://www.test.com', 'yes', 'good', 'credit card', 'Hyderabad ', 'no', 'commissioned broker', 'India''s No. 1 Amusement Park, Wonderla is now coming to Hyderabad to unfold an all-new chapter of thrill. Brace yourself, Wonderla Amusement Park, Hyderabad will take you on a ride you have never experienced before.', 'http://www.test.com', 'India''s No. 1 Amusement Park, Wonderla is now coming to Hyderabad to unfold an all-new chapter of thrill. Brace yourself, Wonderla Amusement Park, Hyderabad will take you on a ride you have never experienced before.', 'http://www.facebook.com', 'Hour', 'India''s No. 1 Amusement Park, Wonderla is now coming to Hyderabad to unfold an all-new chapter of thrill. Brace yourself, Wonderla Amusement Park, Hyderabad will take you on a ride you have never experienced before. Our 43 world-class rides at the pa', 'India''s No. 1 Amusement Park, Wonderla is now coming to Hyderabad to unfold an all-new chapter of thrill. Brace yourself, Wonderla Amusement Park, Hyderabad will take you on a ride you have never experienced before. Our 43 world-class rides at the pa', '4023490333', 1998, '17.441', '78.451', 'admin', '2016-04-13 06:31:05', '1'),
(162, 'Manu Electricals', '1', '9902275699', 'Manu', 'Manju', 'info@manuelectricals.in', '4', ' 21, 2nd Cross, Near Srinidhi Public School, 3rd Main Road, Srinidhi Layout, J P Nagar 8th Phase, Konanakunte', 'Bengaluru', 'Karnataka ', 560042, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460972342_maxresdefault.jpg', '09:30 AM', '09:30 PM', 'We, Manu Electricals, are pleased to introduce ourselves as one of the leading Government of Karnataka Class – I Electrification Contracting Company based in Kanakpura Road. We offer our customers the complete Turnkey Project Electrification solutions starting from Concept to Completion, and much more.. Pioneering Leadership, Remarkable Vision, Strong Customer Focus and a Relentless Commitment to Quality and Innovation has made Manu Electricals as one of the largest and leading manufacturers in Food Industry, Chemical Industry, Cement Industry, Hotels, Power House 11 KV Substation, Complete Internal and External Electrification work. We under take Turnkey Projects as well with Complete Solution satisfied to the end. Manu Electricals has come a long way in the manufacture of Turnkey Project Electrification Work. Today it stands as one of the most trusted and reputed brand name among all the customers.', 'http://www.test.com', 'yes', 'good', 'credit card', 'Karnataka', 'no', 'commissioned broker', 'We, Manu Electricals, are pleased to introduce ourselves as one of the leading Government of Karnataka Class – I Electrification Contracting Company based in Kanakpura Road. We offer our customers the complete Turnkey Project Electrification solution', 'http://www.test.com', 'We, Manu Electricals, are pleased to introduce ourselves as one of the leading Government of Karnataka Class – I Electrification Contracting Company based in Kanakpura Road. We offer our customers the complete Turnkey Project Electrification solution', 'http://www.test.com', 'Hour', 'We, Manu Electricals, are pleased to introduce ourselves as one of the leading Government of Karnataka Class – I Electrification Contracting Company based in Kanakpura Road. We offer our customers the complete Turnkey Project Electrification solution', 'We, Manu Electricals, are pleased to introduce ourselves as one of the leading Government of Karnataka Class – I Electrification Contracting Company based in Kanakpura Road. We offer our customers the complete Turnkey Project Electrification solution', '9902275699', 2000, '12.960', '77.600', 'admin', '2016-04-13 06:39:59', '1'),
(163, 'Pravin Electricals ', '1', '02261510200', 'Praveen', 'Raj', 'business@pravinelectricals.in', '4', 'Mulund West', 'Mumbai', 'Maharashtra ', 400082, 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460972564_20110223170650125.jpg', '09:00 AM', '09:00 PM', 'Pravin Electricals Pvt. Ltd. was established in 1986 and has continued to maintain a structured growth, which is reflected by our reputation for high quality installations and standards of service.As a modern multimillion turnover company, a high proportion of our work is derived from repeat business – the best possible recommendation.Our in house expertise covers, design, cost production, valued engineering and total project management. ', 'http://www.facebook.com', 'yes', 'good', 'credit card', 'Maharashtra', 'no', 'commissioned brokers', 'Pravin Electricals Pvt. Ltd. was established in 1986 and has continued to maintain a structured growth, which is reflected by our reputation for high quality installations and standards of service. ', 'http://www.test.com', 'Pravin Electricals Pvt. Ltd. was established in 1986 and has continued to maintain a structured growth, which is reflected by our reputation for high quality installations and standards of service. ', 'http://www.facebook.com', 'Hour', 'Pravin Electricals Pvt. Ltd. was established in 1986 and has continued to maintain a structured growth, which is reflected by our reputation for high quality installations and standards of service.\r\n\r\nAs a modern multimillion turnover company, a high', 'Pravin Electricals Pvt. Ltd. was established in 1986 and has continued to maintain a structured growth, which is reflected by our reputation for high quality installations and standards of service.\r\n\r\nAs a modern multimillion turnover company, a high', '02261510200', 2001, '19.146', '72.903', 'admin', '2016-04-13 06:46:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `business_users`
--

CREATE TABLE IF NOT EXISTS `business_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `business_name` varchar(500) NOT NULL,
  `website_name` varchar(500) NOT NULL,
  `categories` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1',
  `created_by` varchar(250) NOT NULL,
  `user_type` int(250) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `first_name`, `last_name`, `phone_number`, `email`, `city`, `country`, `profile_picture`, `status`, `created_by`, `user_type`) VALUES
(1, 'sam', '332532dcfaa1cbf61e2a266bd723612c', 'Thomas', 'Mathew', '5896748390', 'sam@gmail.com', 'Ernakulam', 'india', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525687_jriccitiello.jpg', '1', '1', 2),
(2, 'maneesh', 'd1446967f9408b6ee159863f068d192b', 'Manu', 'Rajan', '8694525836', 'manu@gmail.com', 'kollam', 'india', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525693_maximocavazzani.jpg', '1', '1', 2),
(3, 'sanu', 'ee714dc9fe3ff6a64b40fb7e0d9100e4', 'Sunny', 'Joseph', '5896748391', 'sanu@gmail.com', 'Mumbai', 'india', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525700_jriccitiello.jpg', '1', '1', 2),
(4, 'sinu', 'sinu', 'Abey', 'Mathew', '8089130286', 'Sinu@gmail.com', 'ChennaI', 'india', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460546006_maximocavazzani.jpg', '0', '1', 2),
(11, 'Shanu', '2f16740a4b98674c7f1bd151479dcdfa', 'baby', 'Mathew', '5896748390', 'shanu@gmail.com', 'Mumbai', 'India', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461136965_1460543956_jriccitiello.jpg', '1', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE IF NOT EXISTS `favourite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(500) NOT NULL,
  `category_status` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `business_id`, `user_id`, `category`, `category_status`, `created_date`) VALUES
(1, 158, 41, '1', '', '2016-04-13 08:01:06'),
(2, 164, 41, '1', '', '2016-04-13 08:04:11'),
(3, 162, 34, '4', '', '2016-04-18 04:24:49'),
(4, 162, 43, '4', '', '2016-04-20 06:03:29'),
(5, 3, 43, '2', '', '2016-04-20 06:30:16'),
(6, 161, 34, '3', '', '2016-04-20 06:55:16'),
(7, 4, 34, '2', '', '2016-04-20 06:55:52'),
(8, 159, 34, '2', '', '2016-04-20 06:58:39'),
(9, 1, 34, '1', '', '2016-04-20 07:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `rating` varchar(500) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `business_id`, `rating`, `comments`, `user_id`, `created_date`) VALUES
(1, 158, '0', 'Good', '41', '2016-04-13 08:00:55'),
(2, 159, '3', 'good', '42', '2016-04-15 07:23:22'),
(3, 10, '4', 'poor', '4', '2016-04-15 09:37:30'),
(4, 158, '3', 'Good', '4', '2016-04-15 09:41:07'),
(5, 173, '4', 'nice.......', '43', '2016-04-20 04:31:36'),
(6, 3, '0', 'nice...', '43', '2016-04-20 06:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `smtp_port` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `favicon`, `admin_email`, `smtp_username`, `smtp_host`, `smtp_password`, `smtp_port`) VALUES
(1, 'My Directory', 'http://mydirectory.co.in/my_admin/assets/uploads/logo/1460711575_mydr.png', 'http://mydirectory.co.in/my_admin/assets/uploads/favicons/1460711992_favicon.ico', 'no-reply@techware.co.in', 'no-reply@techware.in', 'mail@techware.co.in', 'Golden@reply', 'Golden@reply');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` text NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` int(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `image`, `phone_number`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `created_date`, `user_type`) VALUES
(1, 'immanu', 'Manu', 'immanu', 'immanu@gmail.com', 'immanu', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525627_jriccitiello.jpg', 2147483647, '', 'Ernakulam', 'kerala', 'india', 682021, '1', '2016-04-12 09:21:08', 2),
(2, 'Guna', 'Sekar', 'guna', 'guna@gmail.com', 'guna', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525635_maximocavazzani.jpg', 1256342617, '', 'Bengalore', 'Karnataka', 'india', 400050, '1', '2016-04-12 09:23:24', 2),
(3, 'Mansur', 'Khan', 'mansur', 'mansure@gmail.com', 'mansur', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525642_jriccitiello.jpg', 2147483647, '', 'Mumbai', 'Maharashtra', 'india', 682021, '0', '2016-04-12 09:25:01', 2),
(4, 'Jinu', 'Mohan', 'jinu', 'jinu@gmail.com', 'jinu', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461128771.jpg', 2147483647, 'nhmm', 'Chennai', 'Tamilnadu', 'india', 600028, '1', '2016-04-12 09:27:08', 2),
(5, 'jasir', 'mohammed', 'jasir', 'jasir@gmail.com', 'jasir', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460525666_jriccitiello.jpg', 2147483647, '', 'Noida', 'Delhi', 'india', 400064, '1', '2016-04-13 04:03:04', 2),
(34, 'Kiran', 'Mohan', 'Kiran', 'kiran@gmail.com', '123456', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1460543878_Chen_Head_Short.jpg', 2147483647, 'kakanad,ernakulam', 'Kozhicode', 'Kerala', 'India', 424234, '1', '2016-04-06 04:00:28', 2),
(42, 'Ragu', 'Ragunathan', 'ragu', 'ragu@gmail.com', '1234', 'http://mydirectory.co.in/my_admin/assets/uploads/img/1461136105_1460543956_jriccitiello.jpg', 2147483647, '', 'Kollam', 'Kerala', 'India', 682021, '1', '2016-04-13 10:39:16', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
