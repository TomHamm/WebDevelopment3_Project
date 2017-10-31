-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2017 at 13:42 PM
-- Server version: 5.6.27-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--
CREATE DATABASE IF NOT EXISTS `cars` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cars`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `AddCar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCar`(in CarReg varchar(50), 
in CarModel varchar(50),
in CarTransmition varchar(30),
in CarYear YEAR,
in CarColour varchar(45),
in CarNCT varchar(5),
in CarEngineSize decimal(5,2),
in CarPrice decimal(30,2))
BEGIN
INSERT INTO car (reg, model, transmition, theYear, colour, nct, engineSize, price) 
VALUES (CarReg, CarModel, CarTransmition, CarYear, CarColour, CarNCT,CarEngineSize, CarPrice);
END$$


DROP PROCEDURE IF EXISTS `AddVan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddVan`(in VanReg varchar(50), 
in VanModel varchar(50),
in VanTransmition varchar(30),
in VanYear YEAR,
in VanColour varchar(45),
in VanEngineSize decimal(5,2),
in VanPrice decimal(30,2))
BEGIN
INSERT INTO van (regVan, modelVan, transmitionVan, theYearVan, colourVan, engineSizeVan, priceVan) 
VALUES (VanReg, VanModel, VanTransmition, VanYear, VanColour, VanEngineSize, VanPrice);
END$$



DROP PROCEDURE IF EXISTS `AddUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddUser`(in name varchar(50),
in userEmail varchar(50),
in userPassword varchar(50),
in regDate datetime,
in typeUser varchar(15))
BEGIN
insert into users (username, email, password, registrationDate, userType)
VALUES (name, userEmail, userPassword, regDate, typeUser);
END$$



DROP PROCEDURE IF EXISTS `DeletCar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCar`(in CarId int)
BEGIN
delete from car where id=CarID;
END$$



DROP PROCEDURE IF EXISTS `DeletVan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteVan`(in VanId int)
BEGIN
delete from van where idVan=VanID;
END$$

DROP PROCEDURE IF EXISTS `DeletUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteUser`(in UserId int)
BEGIN
delete from users where id=UserID;
END$$



DROP PROCEDURE IF EXISTS `GetActivityReport`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetActivityReport`()
BEGIN
select * from reporttable;
END$$



DROP PROCEDURE IF EXISTS `GetAllCars`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllCars`()
begin
select * from car order by model;
end$$


DROP PROCEDURE IF EXISTS `GetAllVans`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllVans`()
begin
select * from van order by modelVan;
end$$



DROP PROCEDURE IF EXISTS `GetAllUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers`()
BEGIN
select * from users order by registrationDate;
END$$



DROP PROCEDURE IF EXISTS `GetCarById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCarById`(in Sid int)
BEGIN
SELECT * FROM car WHERE id = Sid;
END$$


DROP PROCEDURE IF EXISTS `GetVanById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetVanById`(in Sid int)
BEGIN
SELECT * FROM van WHERE idVan = Sid;
END$$

DROP PROCEDURE IF EXISTS `GetUserById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserById`(in Sid int)
BEGIN
SELECT * FROM users WHERE id = Sid;
END$$



DROP PROCEDURE IF EXISTS `GetCarByReg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCarByReg`(in CarReg varchar(50))
BEGIN
select * from car where upper(reg) like CONCAT('%',CarReg,'%') order by reg;
END$$



DROP PROCEDURE IF EXISTS `GetVanByReg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetVanByReg`(in VanReg varchar(50))
BEGIN
select * from van where upper(regVan) like CONCAT('%',VanReg,'%') order by regVan;
END$$



DROP PROCEDURE IF EXISTS `LoginUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LoginUser`(in nameUser varchar(50),
in userPassword varchar(50))
BEGIN
select * from users where username = nameUser and password = userPassword;
END$$



DROP PROCEDURE IF EXISTS `UpdateCar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCar`( in CarId int,
in CarReg varchar(50),
in CarModel varchar(50),
in CarTransmition varchar(30),
in CarYear YEAR,
in CarColour varchar(45),
in CarNCT varchar(5),
in CarEngineSize decimal(5,2),
in CarPrice decimal(30,2))
BEGIN
UPDATE car set reg=CarReg, model=CarModel, transmition=CarTransmition, theYear=CarYear, colour=CarColour, nct=CarNCT, engineSize=CarEngineSize, price=CarPrice WHERE id=CarID;
END$$




DROP PROCEDURE IF EXISTS `UpdateVan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateVan`( in VanId int,
in VanReg varchar(50),
in VanModel varchar(50),
in VanTransmition varchar(30),
in VanYear YEAR,
in VanColour varchar(45),
in VanEngineSize decimal(5,2),
in VanPrice decimal(30,2))
BEGIN
UPDATE van set regVan=VanReg, modelVan=VanModel, transmitionVan=VanTransmition, theYearVan=VanYear, colourVan=VanColour,engineSizeVan=VanEngineSize, priceVan=VanPrice WHERE idVan=VanID;
END$$





DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reporttable`
--

DROP TABLE IF EXISTS `reporttable`;
CREATE TABLE IF NOT EXISTS `reporttable` (
  `action` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `userType` varchar(15) DEFAULT NULL,
  `car_reg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reporttable`
--

INSERT INTO `reporttable` (`action`, `id`, `username`, `date`, `userType`, `car_reg`) VALUES
('Added User', 1, 'TomAdmin', '2017-09-17 13:24:08', 'admin', NULL),
('Added User', 2, 'TomBasic', '2017-09-17 13:25:09', 'basic', NULL),
('Added Car', 3, NULL, '2017-09-25 21:23:27', NULL, '06-OY-20045'),
('Updated Car', 4, NULL, '2017-09-25 21:25:32', NULL, '10-D-2256'),
('Deleted Car', 5, NULL, '2017-09-25 21:27:06', NULL, '09-D-3367');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL,
  `reg` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `transmition` varchar(50) DEFAULT NULL,
  `theYear` year(4) DEFAULT NULL,
  `colour` varchar(45) DEFAULT NULL,
  `nct` varchar(45) DEFAULT NULL,
  `engineSize` decimal(5,2) DEFAULT NULL,
  `price` decimal(30,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;


--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `reg`, `model`, `transmition`, `theYear`, `colour`, `nct`, `engineSize`, `price`) VALUES
(1, '06-OY-20045', 'Focus', 'Manual', 2006, 'Blue', 'Yes', 1.4, 2300.00),
(2, '03-D-2056', 'Fiesta', 'Manual', 2003, 'Silver', 'Yes', 1.2, 2000.00),
(3, '10-OY-1101', 'Kuga', 'Manual', 2010, 'Black', 'Yes', 1.0, 8500.00),
(4, '09-WH-1201', 'Focus', 'Automatic', 2009, 'Black', 'Yes', 1.6, 10000.00),
(5, '07-D-81138', 'S-Max', 'Manual', 2007, 'Red', 'Yes', 2.0, 5000.00),
(6, '07-D-59642', 'Mondeo', 'Manual', 2007, 'Silver', 'Yes', 1.8, 5300.00),
(7, '07-D-1236', 'Galaxy', 'Manual', 2007, 'Silver', 'Yes', 1.9, 5250.00),
(8, '10-D-2256', 'Focus', 'Manual', 2010, 'Silver', 'Yes', 1.6, 9300.00),
(9, '02-WH-1564', 'Ka', 'Automatic', 2002, 'Black', 'Yes', 1.0, 1100.00),
(10, '03-LK-8133', 'Focus', 'Manual', 2003, 'Black', 'Yes', 1.4, 1500.00),
(11, '06-OY-20803', 'S-Max', 'Manual', 2006, 'Green', 'Yes', 1.9, 2100.00),
(12, '09-WH-9642', 'Mondeo', 'Manual', 2009, 'Blue', 'Yes', 2.0, 7300.00),
(13, '06-D-7736', 'Focus', 'Manual', 2006, 'Blue', 'Yes', 1.4, 2300.00);


--
-- Table structure for table `van`
--

DROP TABLE IF EXISTS `van`;
CREATE TABLE IF NOT EXISTS `van` (
  `idVan` int(11) NOT NULL,
  `regVan` varchar(50) DEFAULT NULL,
  `modelVan` varchar(50) DEFAULT NULL,
  `transmitionVan` varchar(50) DEFAULT NULL,
  `theYearVan` year(4) DEFAULT NULL,
  `colourVan` varchar(45) DEFAULT NULL,
  `engineSizeVan` decimal(5,2) DEFAULT NULL,
  `priceVan` decimal(30,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;


--
-- Dumping data for table `van`
--

INSERT INTO `van` (`idVan`, `regVan`, `modelVan`, `transmitionVan`, `theYearVan`, `colourVan`, `engineSizeVan`, `priceVan`) VALUES
(1, '04-CN-2708', 'Focus Van', 'Manual', 2004, 'Black', 2.5, 950.00),
(2, '161-D-5972', 'Fiesta Van', 'Manual', 2016, 'White', 3.0, 9700.00),
(3, '07-OY-10045', 'Focus Van', 'Manual', 2007, 'Silver', 2.0, 1850.00),
(4, '131-OY-2701', 'Ranger', 'Manual', 2013, 'Silver', 2.8, 7000.00),
(5, '07-OY-10045', 'Transit', 'Manual', 2007, 'Silver', 2.0, 1850.00),
(6, '132-D-973', 'Transit Sport', 'Manual', 2007, 'Silver', 2.0, 8850.00),
(7, '141-WH-37101', 'Transit Courier', 'Manual', 2007, 'White', 3.0, 10000.00),
(8, '142-SO-2441', 'Transit Connect', 'Manual', 2007, 'White', 2.0, 12850.00),
(9, '171-D-3351', 'Focus Van', 'Manual', 2007, 'White', 2.0, 19500.00),
(10, '08-D-66439', 'Transit Custom', 'Manual', 2008, 'White', 2.2, 5650.00);





--
-- Triggers `car`
--
DROP TRIGGER IF EXISTS `AfterAddCar`;
DELIMITER $$
CREATE TRIGGER `AfterAddCar` AFTER INSERT ON `car`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Added Car',
        date = NOW(),
        car_reg = NEW.reg;
END
$$
DELIMITER ;


DROP TRIGGER IF EXISTS `AfterDeleteCar`;
DELIMITER $$
CREATE TRIGGER `AfterDeleteCar` AFTER DELETE ON `car`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Deleted car',
        date = NOW(),
        car_reg = OLD.reg;
END
$$
DELIMITER ;


DROP TRIGGER IF EXISTS `AfterUpdateCar`;
DELIMITER $$
CREATE TRIGGER `AfterUpdateCar` AFTER UPDATE ON `car`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Updated car',
        date = NOW(),
        car_reg = NEW.reg;
END
$$
DELIMITER ;




--
-- Triggers `van`
--
DROP TRIGGER IF EXISTS `AfterAddVan`;
DELIMITER $$
CREATE TRIGGER `AfterAddVan` AFTER INSERT ON `van`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Added Van',
        date = NOW(),
        car_reg = NEW.regVan;
END
$$
DELIMITER ;


DROP TRIGGER IF EXISTS `AfterDeleteVan`;
DELIMITER $$
CREATE TRIGGER `AfterDeleteVan` AFTER DELETE ON `van`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Deleted van',
        date = NOW(),
        car_reg = OLD.regVan;
END
$$
DELIMITER ;



DROP TRIGGER IF EXISTS `AfterUpdateVan`;
DELIMITER $$
CREATE TRIGGER `AfterUpdateVan` AFTER UPDATE ON `van`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Updated van',
        date = NOW(),
        car_reg = NEW.regVan;
END
$$
DELIMITER ;




-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registrationDate` datetime NOT NULL,
  `userType` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registrationDate`, `userType`) VALUES
(1, 'Admin', 'admin@mail.com', '0000', '2017-10-17 13:24:08', 'admin'),
(2, 'Basic', 'admin@mail.com', '0000', '2017-10-17 13:25:19', 'basic'),
(3, 'CarAdmin', 'basic@mail.com', '0000', '2017-10-17 13:27:33', 'CarAdmin'),
(4, 'VanAdmin', 'basic@mail.com', '0000', '2017-10-17 13:27:33', 'VanAdmin');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `BeforeAddUser`;
DELIMITER $$
CREATE TRIGGER `BeforeAddUser` BEFORE INSERT ON `users`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'Added User',
        username = NEW.username,
        date = NEW.registrationDate,
        userType = NEW.userType;
END
$$
DELIMITER ;


DROP TRIGGER IF EXISTS `AfterDeleteUser`;
DELIMITER $$
CREATE TRIGGER `AfterDeleteUser` AFTER DELETE ON `users`
 FOR EACH ROW BEGIN
    INSERT INTO reporttable
    SET action = 'User Removed',
		username = OLD.username,
        date = NOW(),
        userType = OLD.userType;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reporttable`
--
ALTER TABLE `reporttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `van`
--
ALTER TABLE `van`
  ADD PRIMARY KEY (`idVan`);


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reporttable`
--
ALTER TABLE `reporttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
  
--
-- AUTO_INCREMENT for table `van`
--
ALTER TABLE `van`
  MODIFY `idVan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



