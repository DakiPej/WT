-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 04:27 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carmagazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `id` int(11) NOT NULL,
  `id_vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pregledauta`
--

CREATE TABLE `pregledauta` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `pregledauta`
--

INSERT INTO `pregledauta` (`id`, `naslov`, `tekst`, `autor`, `slika`) VALUES
(1, ' Testirali smo nove Goodyear gume za zimu', 'Primjer vijesti za "Testirali smo nove Goodyear gume za zimu"', 'Daki', 'pictures/goodyear.jpg'),
(2, 'Unisitli smo Acura NSX', 'Primjer vijesti za "Unistili smo Acura NSX"', 'Daki', 'pictures/AcuraNSX.jpg'),
(3, 'Testirali smo novu Mazdu 3', 'Primjer vijesti za "Testirali smo novu Mazdu 3"', 'Daki', 'pictures/Mazda3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `grad` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_slovenian_ci NOT NULL,
  `uloga` varchar(10) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `lozinka`, `ime`, `prezime`, `grad`, `adresa`, `email`, `uloga`) VALUES
('Daki', '25d55ad283aa400af464c76d713c07ad', 'admin', 'admin', 'Sarajevo', 'Adresa', 'nesto@example.com', 'admin'),
('Lejla123', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Lejla', 'Nukic', 'grad', 'adresa', 'Lejla@example.com', 'user'),
('Macak', '00a1f187721c63501356bf791e69382c', 'Neven', 'Meseldzic', 'grad', 'adresa', 'email@example.com', 'user'),
('netko', '5cc32e366c87c4cb49e4309b75f57d64', 'netko', 'netko', 'grad', 'adresa', 'netko@example.com', 'user'),
('Pipi', '69ee947bf183128691ab444b40b892dd', 'Amar', 'Panjeta', 'Sarajevo', 'Adresa', 'email@example.com', 'user'),
('sbecirovic1', '00a1f187721c63501356bf791e69382c', 'Seila', 'Becirovic', 'Sarajevo', 'Pofalici', 'sbecirovic1@etf.unsa.ba', 'user'),
('Sura', '00a1f187721c63501356bf791e69382c', 'Amer', 'Surkovic', 'Sarajevo', 'Otoka', 'sura@gmail.com', 'user'),
('user', '5cc32e366c87c4cb49e4309b75f57d64', 'ime', 'prezime', 'grad', 'adresa', 'nesto@example.com', 'user'),
('user5', '00a1f187721c63501356bf791e69382c', 'ime1', 'prezime2', 'grad3', 'adresa4', 'email@example.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `tekst`, `autor`, `slika`) VALUES
(1, 'Novi BMW karavan', 'Primjer teksta vijesti ciji je naslov "Novi BMW karavan"', 'Daki', 'pictures/BMW5Estate.jpg'),
(2, 'Camaro u utrci za prijestoljem', 'Primjer teksta vijesti ciji je naslov "Camaro u utrci za prijestoljem"', 'Daki', 'pictures/Camaro.jpg'),
(3, 'Kako se Land Rover snalazi u pustinji?', 'Primjer teksta vijesti ciji je naslov "Kako se Land Rover snalazi u pustinji?"', 'Daki', 'pictures/LandRover.jpg'),
(4, 'Sta dobro dolazi iz UK?', 'Primjer teksta vijesti ciji je naslov "Sta to dobro dolazi iz UK"', 'Daki', 'pictures/Vanquish.jpg'),
(5, 'Prvi Huracan na Olx.ba', 'Primjer teksta vijesti ciji je naslov "Prvi Huracan na Olx.ba"', 'Daki', 'pictures/Huracan.jpg'),
(6, 'Slika govori tisucu rijeci', 'Primjer teksta vijesti ciji je naslov "Slika govori tisucu rijeci"', 'Daki', 'pictures/8c.jpg'),
(7, 'Novi BMW M4 karavan', 'Primjer teksta vijesti ciji je naslov "Novi BMW karavan"', 'Daki', 'pictures/BMW5Estate.jpg'),
(8, 'Camaro SS u utrci za prijestoljem', 'Primjer teksta vijesti ciji je naslov "Camaro u utrci za prijestoljem"', 'Daki', 'pictures/Camaro.jpg'),
(9, 'Kako se Land Rover Evoque snalazi u pustinji?', 'Primjer teksta vijesti ciji je naslov "Kako se Land Rover snalazi u pustinji?"', 'Daki', 'pictures/LandRover.jpg'),
(10, 'Vintage', 'Primjer teksta vijesti ciji je naslov "Sta to dobro dolazi iz UK"', 'Daki', 'pictures/Vanquish.jpg'),
(11, 'Prvi Aventador na Olx.ba', 'Primjer teksta vijesti ciji je naslov "Prvi Huracan na Olx.ba"', 'Daki', 'pictures/Huracan.jpg'),
(12, 'Alfa Romeo 8C', 'Primjer teksta vijesti ciji je naslov "Slika govori tisucu rijeci"', 'Daki', 'pictures/8c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vijest` (`id_vijest`),
  ADD KEY `id_autor` (`autor`);

--
-- Indexes for table `pregledauta`
--
ALTER TABLE `pregledauta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`),
  ADD KEY `autor_2` (`autor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pregledauta`
--
ALTER TABLE `pregledauta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`id_vijest`) REFERENCES `vijesti` (`id`),
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `user` (`username`);

--
-- Constraints for table `pregledauta`
--
ALTER TABLE `pregledauta`
  ADD CONSTRAINT `pregledauta_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `user` (`username`);

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `vijesti_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
