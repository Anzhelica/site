-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 07 2017 г., 19:01
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `user_db`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddUser`(IN `name` VARCHAR(40), IN `surname` VARCHAR(40), IN `email` TEXT, IN `comment` TEXT, IN `avatar` LONGBLOB)
proc:BEGIN
 
  -- error code:
  -- 0 - no error
  -- 1 - not created user
  	
    INSERT INTO `user`
		(`name`,
		`surname`, 
		`email`, 
		`comment`, 
		`avatar`
		)
    VALUES
		(name,
		surname,
		email,
		comment,
		avatar
		);
		
    SET @user_id = (SELECT id FROM `user` WHERE `user`.name = name LIMIT 1);
    
    IF (@user_id IS NOT NULL) THEN
	  
      SELECT 0 AS error;  -- error code 0 = no error
      
    ELSE  
      SELECT 1 AS error;  -- error code 2 = not created user
    END IF;
    
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` text NOT NULL,
  `comment` text,
  `avatar` longblob NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
