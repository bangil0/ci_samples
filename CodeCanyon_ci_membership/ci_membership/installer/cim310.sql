-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Machine: localhost:3306
-- Genereertijd: 09 mrt 2016 om 21:58
-- Serverversie: 5.6.26-cll-lve
-- PHP-versie: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `brunomat_cim3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `oauth_providers`
--

CREATE TABLE IF NOT EXISTS `oauth_providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `client_id` text NOT NULL,
  `client_secret` text NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `permission_description` varchar(255) NOT NULL,
  `permission_system` tinyint(1) NOT NULL DEFAULT '0',
  `permission_order` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Gegevens worden uitgevoerd voor tabel `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_description`, `permission_system`, `permission_order`) VALUES
(1, 'View members', 1, 0),
(3, 'View settings', 1, 21),
(4, 'Add member', 1, 1),
(5, 'Edit member', 1, 3),
(6, 'Delete members', 1, 4),
(7, 'OAuth2 providers', 1, 10),
(8, 'Dashboard', 1, 20),
(9, 'Ban/unban members', 1, 6),
(10, 'Activate/deactivate members', 1, 5),
(11, 'Save settings', 1, 22),
(12, 'Clear sessions', 1, 25),
(13, 'Manage roles', 1, 7),
(14, 'Backup and export', 1, 30),
(15, 'Email member', 1, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recover_password`
--

CREATE TABLE IF NOT EXISTS `recover_password` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `token` char(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  `role_selectable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`, `role_selectable`) VALUES
(1, 'Administrator', 'CAN NOT BE EDITED OR DELETED - All system permissions are active by default.', 1),
(2, 'Super Moderator', 'They can do everything except for settings and backups.', 1),
(3, 'Moderator', 'They have access to members but can''t delete them.', 1),
(4, 'Member', 'CAN NOT BE DELETED - is useful in case you want to give permissions to default members.', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `role_id` int(11) unsigned NOT NULL,
  `permission_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `fk_role_permission_permission_id_idx` (`permission_id`),
  KEY `fk_role_permission_role_id_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 3),
(1, 4),
(2, 4),
(3, 4),
(1, 5),
(2, 5),
(3, 5),
(1, 6),
(2, 6),
(1, 7),
(2, 7),
(1, 8),
(2, 8),
(3, 8),
(1, 9),
(2, 9),
(3, 9),
(1, 10),
(2, 10),
(3, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 13),
(1, 14),
(1, 15),
(2, 15);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `login_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `register_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `members_per_page` smallint(6) NOT NULL DEFAULT '12',
  `admin_email` varchar(255) NOT NULL,
  `home_page` varchar(50) NOT NULL,
  `previous_url_after_login` tinyint(1) NOT NULL DEFAULT '0',
  `active_theme` varchar(40) NOT NULL DEFAULT 'bootstrap3',
  `adminpanel_theme` varchar(40) NOT NULL DEFAULT 'adminpanel',
  `login_attempts` smallint(6) NOT NULL DEFAULT '3',
  `max_login_attempts` smallint(6) NOT NULL DEFAULT '30',
  `email_protocol` tinyint(4) NOT NULL DEFAULT '1',
  `sendmail_path` varchar(100) NOT NULL DEFAULT '/usr/sbin/sendmail',
  `smtp_host` varchar(255) NOT NULL DEFAULT 'ssl://smtp.googlemail.com',
  `smtp_port` smallint(6) NOT NULL DEFAULT '465',
  `smtp_user` mediumblob NOT NULL,
  `smtp_pass` mediumblob NOT NULL,
  `site_title` varchar(60) NOT NULL DEFAULT 'CI_Membership',
  `cookie_expires` int(11) NOT NULL DEFAULT '259200',
  `password_link_expires` int(11) NOT NULL DEFAULT '1800',
  `activation_link_expires` int(11) NOT NULL DEFAULT '43200',
  `disable_all` tinyint(1) NOT NULL DEFAULT '0',
  `site_disabled_text` text NOT NULL,
  `remember_me_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `recaptchav2_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `recaptchav2_site_key` char(40) NOT NULL,
  `recaptchav2_secret` char(40) NOT NULL,
  `oauth2_enabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `settings`
--

INSERT INTO `settings` (`id`, `login_enabled`, `register_enabled`, `members_per_page`, `admin_email`, `home_page`, `previous_url_after_login`, `active_theme`, `adminpanel_theme`, `login_attempts`, `max_login_attempts`, `email_protocol`, `sendmail_path`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `site_title`, `cookie_expires`, `password_link_expires`, `activation_link_expires`, `disable_all`, `site_disabled_text`, `remember_me_enabled`, `recaptchav2_enabled`, `recaptchav2_site_key`, `recaptchav2_secret`, `oauth2_enabled`) VALUES
(1, 1, 1, 12, 'admin@example.com', 'Profile', 0, 'bootstrap3', 'adminpanel', 5, 30, 1, '/usr/sbin/sendmail', 'ssl://smtp.googlemail.com', 465, '', '', 'CI Membership', 259200, 1800, 43200, 0, 'This website is momentarily offline.', 0, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` char(128) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_registered` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `nonce` char(32) DEFAULT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempts` tinyint(4) NOT NULL DEFAULT '0',
  `cookie_part` varchar(32) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'members_generic.png',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_user_role_user_id_idx` (`user_id`),
  KEY `fk_user_role_role_id_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
