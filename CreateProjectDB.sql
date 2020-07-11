# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: ProjectDB
# Generation Time: 2020-07-11 11:53:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ConsignmentStore
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ConsignmentStore`;

CREATE TABLE `ConsignmentStore` (
  `consignmentStoreID` int(10) NOT NULL AUTO_INCREMENT,
  `tenantID` varchar(50) NOT NULL,
  `ConsignmentStoreName` varchar(255) NOT NULL,
  PRIMARY KEY (`consignmentStoreID`),
  KEY `FKConsignmen625115` (`tenantID`),
  CONSTRAINT `FKConsignmen625115` FOREIGN KEY (`tenantID`) REFERENCES `Tenant` (`tenantID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ConsignmentStore` WRITE;
/*!40000 ALTER TABLE `ConsignmentStore` DISABLE KEYS */;

INSERT INTO `ConsignmentStore` (`consignmentStoreID`, `tenantID`, `ConsignmentStoreName`)
VALUES
	(1,'marcus888','Marucs ConsignmentStore'),
	(2,'admin','LWL Store'),
	(3,'admin','HKDI Store'),
	(4,'admin','Tsing Yi Store');

/*!40000 ALTER TABLE `ConsignmentStore` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ConsignmentStore_Shop
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ConsignmentStore_Shop`;

CREATE TABLE `ConsignmentStore_Shop` (
  `consignmentStoreID` int(10) NOT NULL,
  `shopID` int(6) NOT NULL,
  PRIMARY KEY (`consignmentStoreID`,`shopID`),
  KEY `FKConsignmen537135` (`consignmentStoreID`),
  KEY `FKConsignmen824630` (`shopID`),
  CONSTRAINT `FKConsignmen537135` FOREIGN KEY (`consignmentStoreID`) REFERENCES `ConsignmentStore` (`consignmentStoreID`),
  CONSTRAINT `FKConsignmen824630` FOREIGN KEY (`shopID`) REFERENCES `Shop` (`shopID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ConsignmentStore_Shop` WRITE;
/*!40000 ALTER TABLE `ConsignmentStore_Shop` DISABLE KEYS */;

INSERT INTO `ConsignmentStore_Shop` (`consignmentStoreID`, `shopID`)
VALUES
	(1,1),
	(1,2),
	(2,1),
	(2,3);

/*!40000 ALTER TABLE `ConsignmentStore_Shop` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
  `customerEmail` varchar(50) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneNumber` varchar(8) NOT NULL,
  PRIMARY KEY (`customerEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;

INSERT INTO `Customer` (`customerEmail`, `firstName`, `lastName`, `password`, `phoneNumber`)
VALUES
	('alanpo@vtc.edu.hk','Alan','Po','alanpoisawesome','12345678'),
	('robert@fingerprint.com.hk','Apple','Li','\'\"','91746899'),
	('taiMan@gmail.com','Tai Man','Chan','marcus123','52839183');

/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Goods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Goods`;

CREATE TABLE `Goods` (
  `goodsNumber` int(10) NOT NULL AUTO_INCREMENT,
  `consignmentStoreID` int(10) NOT NULL,
  `goodsName` varchar(255) NOT NULL,
  `stockPrice` decimal(10,1) NOT NULL,
  `remainingStock` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL COMMENT 'The goods should include 2 stock status:  \n1. “Available”: Show only the available goods.  \n2. “Unavailable”: The goods has been discontinued or not already for sell.  ',
  PRIMARY KEY (`goodsNumber`),
  KEY `FKGoods866951` (`consignmentStoreID`),
  CONSTRAINT `FKGoods866951` FOREIGN KEY (`consignmentStoreID`) REFERENCES `ConsignmentStore` (`consignmentStoreID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Goods` WRITE;
/*!40000 ALTER TABLE `Goods` DISABLE KEYS */;

INSERT INTO `Goods` (`goodsNumber`, `consignmentStoreID`, `goodsName`, `stockPrice`, `remainingStock`, `status`)
VALUES
	(1,1,'Bracelet',100.2,8,1),
	(2,1,'Anklet',200.0,10,1),
	(3,1,'Noodle',30.0,150,1),
	(4,1,'Figure',9.0,1,0),
	(5,2,'X\'mas Cards',81.0,40,1),
	(6,2,'Lemon Tea',10.1,488,1),
	(7,1,'Cups',70.0,4,1),
	(15,1,'Beer',8.4,17,1),
	(16,2,'\' or 1 = 1',3.0,100,1),
	(17,4,'Unavailable goods',800.0,50,0),
	(20,2,'Envelope',1.5,984,1);

/*!40000 ALTER TABLE `Goods` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table OrderItem
# ------------------------------------------------------------

DROP TABLE IF EXISTS `OrderItem`;

CREATE TABLE `OrderItem` (
  `orderID` int(10) NOT NULL,
  `goodsNumber` int(10) NOT NULL,
  `quantity` int(7) NOT NULL,
  `sellingPrice` decimal(10,1) NOT NULL,
  KEY `FKOrderItem915607` (`orderID`),
  KEY `FKOrderItem82428` (`goodsNumber`),
  CONSTRAINT `FKOrderItem82428` FOREIGN KEY (`goodsNumber`) REFERENCES `Goods` (`goodsNumber`),
  CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `Orders` (`orderID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `OrderItem` WRITE;
/*!40000 ALTER TABLE `OrderItem` DISABLE KEYS */;

INSERT INTO `OrderItem` (`orderID`, `goodsNumber`, `quantity`, `sellingPrice`)
VALUES
	(1,1,3,99.5),
	(1,2,1,200.0),
	(2,1,1,99.5),
	(9,15,1,30.0),
	(22,5,1,81.0),
	(22,6,2,83.0),
	(25,5,5,81.0),
	(25,6,2,83.0),
	(25,16,1,3.0);

/*!40000 ALTER TABLE `OrderItem` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `Orders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `customerEmail` varchar(50) NOT NULL,
  `consignmentStoreID` int(10) NOT NULL,
  `shopID` int(6) NOT NULL,
  `orderDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT 'The orders should include 3 statuses:  \n1.     “Delivery”: The parts are delivering to shop  \n2.     “Awaiting”: Goods are ready for pick up  \n3.     “Completed”: The goods has been picked up from customer  ',
  `totalPrice` decimal(10,1) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `FKOrders837071` (`customerEmail`),
  KEY `FKOrders959018` (`consignmentStoreID`,`shopID`),
  CONSTRAINT `FKOrders959018` FOREIGN KEY (`consignmentStoreID`, `shopID`) REFERENCES `ConsignmentStore_Shop` (`consignmentStoreID`, `shopID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerEmail`) REFERENCES `Customer` (`customerEmail`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;

INSERT INTO `Orders` (`orderID`, `customerEmail`, `consignmentStoreID`, `shopID`, `orderDateTime`, `status`, `totalPrice`)
VALUES
	(1,'taiMan@gmail.com',1,1,'2020-05-14 07:34:29',3,498.5),
	(2,'taiMan@gmail.com',1,2,'2020-06-22 08:25:13',2,99.5),
	(9,'robert@fingerprint.com.hk',1,1,'2020-07-11 10:59:34',2,160.2),
	(22,'robert@fingerprint.com.hk',2,1,'2020-07-11 12:32:51',3,247.0),
	(25,'taiMan@gmail.com',2,1,'2020-07-11 16:17:34',1,574.0);

/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Shop
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Shop`;

CREATE TABLE `Shop` (
  `shopID` int(6) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `shopName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shopID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Shop` WRITE;
/*!40000 ALTER TABLE `Shop` DISABLE KEYS */;

INSERT INTO `Shop` (`shopID`, `address`, `shopName`)
VALUES
	(1,'No. 18, 1 / F, Trendy Zone, 580A Nathan Road, Mong Kok','Mong Kok'),
	(2,'No. 1047, 10/F, Nan Fung Centre, 264-298 Castle Peak Road, Tsuen Wan','Tsuen Wan'),
	(3,'3 King Ling Road, Tiu Keng Leng, Tseung Kwan O','HKDI');

/*!40000 ALTER TABLE `Shop` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Tenant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tenant`;

CREATE TABLE `Tenant` (
  `tenantID` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`tenantID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Tenant` WRITE;
/*!40000 ALTER TABLE `Tenant` DISABLE KEYS */;

INSERT INTO `Tenant` (`tenantID`, `name`, `password`)
VALUES
	('admin','Administrator','demo'),
	('marcus888','Marcus','it888');

/*!40000 ALTER TABLE `Tenant` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
