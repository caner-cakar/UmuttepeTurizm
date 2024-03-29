-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 05:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umuttepe_turizm`
--

-- --------------------------------------------------------

--
-- Table structure for table `biletler`
--

CREATE TABLE `biletler` (
  `biletID` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `seferID` int(11) NOT NULL,
  `koltukID` int(11) NOT NULL,
  `odemeTarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biletler`
--

INSERT INTO `biletler` (`biletID`, `kullaniciID`, `seferID`, `koltukID`, `odemeTarih`) VALUES
(5, 3, 55, 7, '2024-03-29 14:28:08'),
(6, 3, 55, 10, '2024-03-29 14:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `koltuklar`
--

CREATE TABLE `koltuklar` (
  `koltukID` int(11) NOT NULL,
  `seferID` int(11) NOT NULL,
  `koltukNo` int(11) NOT NULL,
  `durumu` enum('rezerve','dolu') NOT NULL,
  `yolcuID` int(11) DEFAULT NULL,
  `biletID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koltuklar`
--

INSERT INTO `koltuklar` (`koltukID`, `seferID`, `koltukNo`, `durumu`, `yolcuID`, `biletID`) VALUES
(7, 55, 7, 'dolu', 3, 5),
(8, 55, 10, 'dolu', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullaniciID` int(11) NOT NULL,
  `tcKimlik` varchar(45) NOT NULL,
  `ad` varchar(45) NOT NULL,
  `soyad` varchar(45) NOT NULL,
  `dogumTarihi` date NOT NULL,
  `cinsiyet` enum('erkek','kadın') DEFAULT NULL,
  `cepTelefonu` varchar(15) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `bakiye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullaniciID`, `tcKimlik`, `ad`, `soyad`, `dogumTarihi`, `cinsiyet`, `cepTelefonu`, `mail`, `sifre`, `bakiye`) VALUES
(3, '12345678910', 'Deneme', 'Deneme', '2006-03-23', NULL, NULL, 'yazlab16@gmail.com', '$2y$10$m.0mhBQ7d4CjScMt8hJMs.GTTSaKmy97xT4FpZZBlERhsJ1UwDBWu', 340),
(4, '12345678911', 'deneme', 'deneme', '2006-03-15', NULL, NULL, 'deneme@gmail.com', '$2y$10$zgI6Fzft14zMveSD2CR8neJBL8Vavxkfo8/BDu3yyEPGdKSc1HsUu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `odemeler`
--

CREATE TABLE `odemeler` (
  `odemeID` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `biletID` int(11) NOT NULL,
  `odemeTarih` datetime NOT NULL,
  `odemeMiktar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odemeler`
--

INSERT INTO `odemeler` (`odemeID`, `kullaniciID`, `biletID`, `odemeTarih`, `odemeMiktar`) VALUES
(5, 3, 5, '2024-03-29 14:28:08', 100.00),
(6, 3, 6, '2024-03-29 14:28:08', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `seferler`
--

CREATE TABLE `seferler` (
  `seferID` int(11) NOT NULL,
  `kalkisSehir` int(11) NOT NULL,
  `varisSehir` int(11) NOT NULL,
  `cikisZamani` date NOT NULL,
  `cikisSaati` time NOT NULL,
  `varisZamani` date NOT NULL,
  `varisSaati` time NOT NULL,
  `yolculukSuresi` int(11) NOT NULL,
  `otobusAdi` varchar(45) NOT NULL,
  `koltukTipi` enum('tek','cift','tekcift') NOT NULL,
  `ucret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seferler`
--

INSERT INTO `seferler` (`seferID`, `kalkisSehir`, `varisSehir`, `cikisZamani`, `cikisSaati`, `varisZamani`, `varisSaati`, `yolculukSuresi`, `otobusAdi`, `koltukTipi`, `ucret`) VALUES
(1, 1, 2, '2024-03-28', '00:00:00', '2024-03-28', '08:00:00', 8, 'Istanbul-Ankara Express', 'tekcift', 400),
(2, 1, 2, '2024-03-25', '00:00:00', '2024-03-25', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(3, 1, 2, '2024-03-25', '08:00:00', '2024-03-25', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(4, 1, 2, '2024-03-25', '16:00:00', '2024-03-25', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(5, 1, 4, '2024-04-06', '08:00:00', '2024-04-06', '16:00:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(6, 1, 4, '2024-04-06', '16:00:00', '2024-04-06', '00:00:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(7, 1, 4, '2024-04-06', '00:00:00', '2024-04-06', '07:59:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(8, 1, 2, '2024-03-28', '08:00:00', '2024-03-28', '16:00:00', 8, 'Istanbul-Ankara Express', 'tekcift', 400),
(9, 1, 2, '2024-03-28', '16:00:00', '2024-03-28', '23:59:00', 8, 'Istanbul-Ankara Express', 'tekcift', 400),
(10, 1, 3, '2024-03-25', '08:00:00', '2024-03-25', '16:00:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(11, 1, 3, '2024-03-25', '16:00:00', '2024-03-25', '00:00:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(12, 1, 3, '2024-03-25', '00:00:00', '2024-03-25', '07:59:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(13, 1, 3, '2024-04-05', '08:00:00', '2024-04-05', '16:00:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(14, 1, 3, '2024-04-05', '16:00:00', '2024-04-05', '00:00:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(15, 1, 3, '2024-04-05', '00:00:00', '2024-04-05', '07:59:00', 7, 'İstanbul-İzmir Express', 'tekcift', 450),
(16, 1, 2, '2024-03-29', '00:00:00', '2024-03-29', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(17, 1, 2, '2024-03-29', '08:00:00', '2024-03-29', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(18, 1, 2, '2024-03-29', '16:00:00', '2024-03-29', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(19, 1, 2, '2024-04-04', '00:00:00', '2024-04-04', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(20, 1, 2, '2024-04-04', '08:00:00', '2024-04-04', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(21, 1, 2, '2024-04-04', '16:00:00', '2024-04-04', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(22, 1, 2, '2024-04-05', '00:00:00', '2024-04-05', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(23, 1, 2, '2024-04-05', '08:00:00', '2024-04-05', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(24, 1, 2, '2024-04-05', '16:00:00', '2024-04-05', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(25, 1, 2, '2024-04-06', '00:00:00', '2024-04-06', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(26, 1, 2, '2024-04-06', '08:00:00', '2024-04-06', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(27, 1, 2, '2024-04-06', '16:00:00', '2024-04-06', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(28, 1, 2, '2024-03-27', '00:00:00', '2024-03-27', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(29, 1, 2, '2024-03-27', '08:00:00', '2024-03-27', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(30, 1, 2, '2024-03-27', '16:00:00', '2024-03-27', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(31, 2, 1, '2024-03-28', '08:00:00', '2024-03-28', '16:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(32, 2, 1, '2024-03-28', '16:00:00', '2024-03-28', '00:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(33, 2, 1, '2024-03-28', '00:00:00', '2024-03-28', '07:59:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(34, 4, 3, '2024-03-30', '08:00:00', '2024-03-30', '16:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(35, 4, 3, '2024-03-30', '16:00:00', '2024-03-30', '00:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(36, 4, 3, '2024-03-30', '00:00:00', '2024-03-30', '07:59:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(37, 2, 1, '2024-04-05', '08:00:00', '2024-04-05', '16:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(38, 2, 1, '2024-04-05', '16:00:00', '2024-04-05', '00:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(39, 2, 1, '2024-04-05', '00:00:00', '2024-04-05', '07:59:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(40, 4, 3, '2024-04-02', '08:00:00', '2024-04-02', '16:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(41, 4, 3, '2024-04-02', '16:00:00', '2024-04-02', '00:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(42, 4, 3, '2024-04-02', '00:00:00', '2024-04-02', '07:59:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(43, 3, 4, '2024-03-29', '08:00:00', '2024-03-29', '16:00:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(44, 3, 4, '2024-03-29', '16:00:00', '2024-03-29', '00:00:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(45, 3, 4, '2024-03-29', '00:00:00', '2024-03-29', '07:59:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(46, 4, 3, '2024-04-18', '08:00:00', '2024-04-18', '16:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(47, 4, 3, '2024-04-18', '16:00:00', '2024-04-18', '00:00:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(48, 4, 3, '2024-04-18', '00:00:00', '2024-04-18', '07:59:00', 7, 'Kocaeli-İzmir Express', 'tekcift', 550),
(49, 3, 4, '2024-04-10', '08:00:00', '2024-04-10', '16:00:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(50, 3, 4, '2024-04-10', '16:00:00', '2024-04-10', '00:00:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(51, 3, 4, '2024-04-10', '00:00:00', '2024-04-10', '07:59:00', 7, 'İzmir-Kocaeli Express', 'tekcift', 550),
(52, 2, 1, '2024-03-29', '08:00:00', '2024-03-29', '16:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(53, 2, 1, '2024-03-29', '16:00:00', '2024-03-29', '00:00:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(54, 2, 1, '2024-03-29', '00:00:00', '2024-03-29', '07:59:00', 6, 'Ankara-İstanbul Express', 'tekcift', 375),
(55, 1, 2, '2024-03-30', '00:00:00', '2024-03-30', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(56, 1, 2, '2024-03-30', '08:00:00', '2024-03-30', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(57, 1, 2, '2024-03-30', '16:00:00', '2024-03-30', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(58, 1, 4, '2024-04-05', '08:00:00', '2024-04-05', '16:00:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(59, 1, 4, '2024-04-05', '16:00:00', '2024-04-05', '00:00:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(60, 1, 4, '2024-04-05', '00:00:00', '2024-04-05', '07:59:00', 1, 'İstanbul-Kocaeli Express', 'tekcift', 200),
(61, 1, 2, '2024-04-03', '00:00:00', '2024-04-03', '08:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(62, 1, 2, '2024-04-03', '08:00:00', '2024-04-03', '16:00:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400),
(63, 1, 2, '2024-04-03', '16:00:00', '2024-04-03', '23:59:00', 8, 'İstanbul-Ankara Express', 'tekcift', 400);

-- --------------------------------------------------------

--
-- Table structure for table `sehirler`
--

CREATE TABLE `sehirler` (
  `sehirID` int(11) NOT NULL,
  `sehirAD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sehirler`
--

INSERT INTO `sehirler` (`sehirID`, `sehirAD`) VALUES
(1, 'İstanbul'),
(2, 'Ankara'),
(3, 'İzmir'),
(4, 'Kocaeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`biletID`),
  ADD KEY `biletSeferIDKey_idx` (`seferID`),
  ADD KEY `biletKullaniciIDKey_idx` (`kullaniciID`);

--
-- Indexes for table `koltuklar`
--
ALTER TABLE `koltuklar`
  ADD PRIMARY KEY (`koltukID`),
  ADD KEY `koltukSeferIDKey_idx` (`seferID`),
  ADD KEY `yolcuIDKey_idx` (`yolcuID`),
  ADD KEY `koltukBiletID` (`biletID`);

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullaniciID`,`tcKimlik`);

--
-- Indexes for table `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`odemeID`),
  ADD KEY `odemeKullaniciID_idx` (`kullaniciID`),
  ADD KEY `biletIDKey_idx` (`biletID`);

--
-- Indexes for table `seferler`
--
ALTER TABLE `seferler`
  ADD PRIMARY KEY (`seferID`),
  ADD KEY `kalkisSehirKey_idx` (`kalkisSehir`),
  ADD KEY `varisSehirKey_idx` (`varisSehir`);

--
-- Indexes for table `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`sehirID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biletler`
--
ALTER TABLE `biletler`
  MODIFY `biletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `koltuklar`
--
ALTER TABLE `koltuklar`
  MODIFY `koltukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullaniciID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `odemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seferler`
--
ALTER TABLE `seferler`
  MODIFY `seferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biletler`
--
ALTER TABLE `biletler`
  ADD CONSTRAINT `biletKullaniciIDKey` FOREIGN KEY (`kullaniciID`) REFERENCES `kullanicilar` (`kullaniciID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biletSeferIDKey` FOREIGN KEY (`seferID`) REFERENCES `seferler` (`seferID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koltuklar`
--
ALTER TABLE `koltuklar`
  ADD CONSTRAINT `koltukBiletID` FOREIGN KEY (`biletID`) REFERENCES `biletler` (`biletID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koltukSeferIDKey` FOREIGN KEY (`seferID`) REFERENCES `seferler` (`seferID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yolcuIDKey` FOREIGN KEY (`yolcuID`) REFERENCES `kullanicilar` (`kullaniciID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odemeler`
--
ALTER TABLE `odemeler`
  ADD CONSTRAINT `biletIDKey` FOREIGN KEY (`biletID`) REFERENCES `biletler` (`biletID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `odemeKullaniciID` FOREIGN KEY (`kullaniciID`) REFERENCES `kullanicilar` (`kullaniciID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seferler`
--
ALTER TABLE `seferler`
  ADD CONSTRAINT `kalkisSehirKey` FOREIGN KEY (`kalkisSehir`) REFERENCES `sehirler` (`sehirID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `varisSehirKey` FOREIGN KEY (`varisSehir`) REFERENCES `sehirler` (`sehirID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
