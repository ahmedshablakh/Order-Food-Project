# Host: localhost  (Version 5.5.5-10.4.21-MariaDB)
# Date: 2022-05-13 01:16:14
# Generator: MySQL-Front 6.0  (Build 2.20)


DROP DATABASE IF EXISTS veri_tabani2022;
CREATE DATABASE veri_tabani2022;

#
# Structure for table "admin_tbl"
#

USE veri_tabani2022;
DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE `admin_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adi_soyadi` varchar(255) DEFAULT NULL,
  `kullanci_adi` varchar(20) NOT NULL DEFAULT '',
  `sifre` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "admin_tbl"
#
USE veri_tabani2022;
INSERT INTO `admin_tbl` VALUES (1,'AHMAD SHABLAKH','admin','1234'),(2,'ABDULLAH YILDIZ','abdullah','123456'),(3,'IBRAHIM ALI','ibrahim','123456789');

#
# Structure for table "personel_tbl"
#
USE veri_tabani2022;
DROP TABLE IF EXISTS `personel_tbl`;
CREATE TABLE `personel_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adi_soyadi` varchar(30) DEFAULT NULL,
  `kullanci_adi` varchar(10) NOT NULL DEFAULT '',
  `sifre` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "personel_tbl"
#
USE veri_tabani2022;
INSERT INTO `personel_tbl` VALUES (1,'MUHAMMED IDREIS','muhammed','98683747As'),(2,'MUSTAFA JILO','mustafa','1234');

#
# Structure for table "siparis_tbl"
#
USE veri_tabani2022;
DROP TABLE IF EXISTS `siparis_tbl`;
CREATE TABLE `siparis_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `yemek_adi` varchar(150) NOT NULL DEFAULT '',
  `birim_fiyat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `adet` int(10) NOT NULL DEFAULT 0,
  `toplam` decimal(10,2) NOT NULL DEFAULT 0.00,
  `siparis_tarihi` datetime DEFAULT NULL,
  `durum` varchar(50) NOT NULL DEFAULT '',
  `musteri_adi` varchar(150) NOT NULL DEFAULT '',
  `musteri_tel` varchar(20) DEFAULT NULL,
  `musteri_email` varchar(255) DEFAULT NULL,
  `musteri_adres` varchar(255) NOT NULL DEFAULT '',
  `notu` varchar(255) DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "siparis_tbl"
#
USE veri_tabani2022;
INSERT INTO `siparis_tbl` VALUES (1,'Extra Arab Doner',49.00,6,294.00,'2022-05-11 12:56:51','Teslim Ediledi','AHMAD SHABLAKH','05343541611','ahmadshablakh.swi@gmail.com','Mersin Akseniz UNI CD Apt No: 19/2 ','Mantarsiz'),(2,'Dilimler Savurma porsiyonu 200g',60.00,2,120.00,'2022-05-11 01:00:44','Teslim Ediledi','ALI KARAMAN','5558888888','alikah@gmail.com','Bah Mah. Yol Sokak.No:1','Yok'),(3,'Fish & Chips Porsiyonu',99.00,3,297.00,'2022-05-11 01:16:02','Teslim Ediledi','AHMAD SHABLAKH','05344671631','admin1@gmail.com','Mersin Akdeniz Kale Yolu No:1','Yok'),(4,'Zinger Sandvic',40.00,6,240.00,'2022-05-11 11:57:45','Teslimat Siparislerinde','Veli ALP','5558888888','alipve@gmail.com','Yeni Mah. 3.Sokak No:2','sadace marul+ kacar peyniri+ tavuk salami'),(5,'Double Burger',54.00,8,432.00,'2022-05-11 12:00:33','Iptal Edilen Siparisler','Murat KAHYA','5051112222','Murat823653@gmail.com','Bah Mah. Yol Sokak.No:1','Marulsuz'),(6,'Sebzeli Pizza Kucuk',39.00,5,195.00,'2022-05-11 12:02:54','Teslim Ediledi','Hasan TaÅŸ','3243334444','asatas@gmail.com','Eski Mah. 3.Sokak No:2','Yok'),(7,'Sosisli Pizza Kucuk',50.00,6,300.00,'2022-05-11 11:34:54','Teslim Ediledi','Necip Necip','3581112222','Necipkara@gmail.com','Mersin Akdeniz Kale Yolu No:1','Sebzeli Pizza '),(8,'Savurma Porsiyonu (3 kisilik)',115.00,3,345.00,'2022-05-11 11:36:57','Teslimat Siparislerinde','Ali TAÅžKINER','3243334444','taskin@gmail.com','Kaya Market No:5','Patates Bol olsun'),(9,'Double Burger',54.00,4,216.00,'2022-05-11 11:39:27','Daha Teslim Edilmedi','ZEKI ZENGÄ°N','5051111111','zeki@gmail.com','Zenginler Apt. No:1','3 Cedar peyniri  Olsun'),(10,'Savurma Porsiyon',35.00,4,140.00,'2022-05-11 11:41:52','Iptal Edilen Siparisler','AHMET KARAMANLI','3581112222','ahmetka@gmail.com','Bah Mah. Sokak. No:22','Tursusuz');

#
# Structure for table "urunler_tbl"
#
USE veri_tabani2022;
DROP TABLE IF EXISTS `urunler_tbl`;
CREATE TABLE `urunler_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_adi` varchar(100) NOT NULL DEFAULT '',
  `fot_adi` varchar(255) NOT NULL DEFAULT '',
  `aktif` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "urunler_tbl"
#
USE veri_tabani2022;
INSERT INTO `urunler_tbl` VALUES (1,'Pizza','Food_Category_871.jpg','EVET'),(2,'Savurma','Food_Category_549.jpg','EVET'),(3,'Burger','Food_Category_945.jpg','EVET'),(4,' Sandvic','Food_Category_553.jpg','EVET'),(5,'Balik','Food_Category_998.jpg','EVET'),(12,'Tavuk','Food_Category_840.jpg','EVET');

#
# Structure for table "yemek_tbl"
#
USE veri_tabani2022;
DROP TABLE IF EXISTS `yemek_tbl`;
CREATE TABLE `yemek_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `yemek_adi` varchar(100) NOT NULL DEFAULT '',
  `yemek_ozellekler` text DEFAULT NULL,
  `birim_fiyat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fot_adi` varchar(255) NOT NULL DEFAULT '',
  `urun_id` int(11) NOT NULL DEFAULT 0,
  `aktif` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "yemek_tbl"
#
USE veri_tabani2022;
INSERT INTO `yemek_tbl` VALUES (1,'Extra Arab Doner','Sarimsak sosu + Patates + Tursu + 10 parca + peynir + mantar ',49.00,'Food-Name-1104.jpg',2,'EVET'),(2,'Savurma Porsiyonu (3 kisilik)','Patates + Tursu + Sarimsak sosu + 30 parca ',115.00,'Food-Name-3393.jpg',2,'EVET'),(3,'Sebzeli Pizza orta','Sebzeli Pizza',65.00,'Food-Name-6099.jpg',1,'EVET'),(4,'Sosisli Pizza Kucuk','Sosis + pizza sosu+ Kasar peyniri',50.00,'Food-Name-3710.jpg',1,'EVET'),(5,'Sebzeli Pizza Kucuk','Sebzeli Pizza',39.00,'Food-Name-8298.jpg',1,'EVET'),(6,'Zinger Porsiyonu','Bes adet  + zinger tavuk aci sosla beraber + Sebze + Kasar peyniri+ Tavuk salami + Patates kizatmasi + Tursu + Lavas',60.00,'Food-Name-9328.jpg',12,'EVET'),(7,'Tavuk Burger','Tavuk burger + cedar peyniri + tursu + domates + mayonez + marul + patates kizartmasi',35.00,'Food-Name-800.jpeg',3,'EVET'),(9,'Fish & Chips Porsiyonu','Dort adet balik fileto + Ozel sos + sebzeler + kabsa pilavÄ± + patates kizatmasÄi + Lavas',99.00,'Food-Name-2394.jpg',5,'EVET'),(10,'Double Burger','Iki adet et burger + domates +Tavuk burger + cedar peyniri + tursu + domates + mayonez + marul + patates kizartmasi',54.00,'Food_Category_344.jpg',3,'EVET'),(11,'Dilimler Savurma porsiyonu 200g','200g Savurma dilimler + Tursu + Patates + Lahana salatasi + Sarimsak sosu',60.00,'Food-Name-3059.jpg',2,'EVET'),(12,'Peynirli Patates Bombasi','Patates kizartmasi + Kacar Peyniri + Mayonez + Tursu + Ketsap',25.00,'Food-Name-1752.jpg',4,'EVET'),(13,'Zinger Sandvic','Iki adet + sosla beraber + marul+ kasar peyniri+ tavuk salami',40.00,'Food-Name-6115.jpg',12,'EVET'),(14,'Savurma Porsiyon','Patates + Tursu + Sarimsak sosu ',35.00,'Food-Name-7335.jpg',2,'EVET');
