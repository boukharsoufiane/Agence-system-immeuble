-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2023 at 10:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `superficie` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `type_annonce` varchar(50) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_modification` date NOT NULL,
  `ville` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `id_client`, `titre`, `description`, `adresse`, `superficie`, `categorie`, `type_annonce`, `prix`, `date_publication`, `date_modification`, `ville`) VALUES
(20, 1, 'Appartement de luxe', 'Appartement est sur tren bon etat', 'complexe fadallah ahlan', 200, 'Buy', 'Appartement', '980000.00', '2023-02-23 17:41:00', '2023-02-23', 'Tangier'),
(24, 2, 'Terrain a vendre', 'Terrain maison de l\'avenir', 'ksar sghir route 13', 400, 'Buy', 'Land', '350000.00', '2023-02-24 01:30:25', '2023-02-24', 'Tangier'),
(25, 1, 'Villa', 'Grand villa de luxe', 'Avenue hirakki villa slimani', 400, 'Buy', 'Villa', '3500000.00', '2023-02-24 11:00:00', '2023-02-24', 'Marrakesh'),
(26, 3, 'Bureau', 'Bureau pour les agences de location auto', 'El derb soltan route 10', 50, 'Rent', 'Bureau', '2500.00', '2023-02-25 10:42:23', '2023-02-25', 'Casablanca'),
(27, 4, 'Maison de 3 étage', 'Maison trés grande', 'Playa a en face de café panorama', 145, 'Buy', 'House', '2200000.00', '2023-02-25 06:11:05', '2023-02-25', 'Tangier'),
(28, 2, 'Appartement equipé', 'Appartement en face de la mer', 'Playa route 7', 160, 'Buy', 'Appartement', '2800000.00', '2023-02-25 20:46:29', '2023-02-25', 'Tangier');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(350) NOT NULL,
  `validPassword` varchar(350) NOT NULL,
  `cni` varchar(12) NOT NULL,
  `question` varchar(50) NOT NULL,
  `image_profile` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `first_name`, `last_name`, `phone`, `email`, `password`, `validPassword`, `cni`, `question`, `image_profile`) VALUES
(1, 'Abdelouahed', 'Boukhar', '0697059355', 'boukharabdelouahed@gmail.com', '$2y$10$mTCLP/dX8CYLM.8GS0v.huKJRmibJkXnqId52bYUwqNUBWLVC3BUK', '$2y$10$mmkFGo30PmTSjW0vaYvjxeQvbgUnt75sziOPdLr9VnuOsy07GPVsC', 'kb12345', 'soufiane', 'assets/img/sans.webp'),
(2, 'Karim', 'boukhar', '0654758654', 'karim@gmail.com', '$2y$10$hRWZy8NORWl8o0ERAhw.UuzPASsaDZbx8RgurThKsS1JP2sMTsfU2', '$2y$10$iaXWMTtcs3iGfGx2A0Hc9u6W097hG63rJlAHUtdpQoFnRktcGxNPm', 'kb10341', 'soufiane', 'assets/img/sans.webp'),
(3, 'Yacine', 'boukhar', '0620121412', 'yacine@gmail.com', '$2y$10$FqI/c/xaRZNO1fQEQK9IcO4kPfySilF6seqeAP9FYAOiE1lC6JND6', '$2y$10$/iSnZPI8.1uh22U6c0yF4.LootDy0pHpjVlM7dC9skwHVYMSjEKUu', 'kb123056', 'soufiane', 'assets/img/sans.webp'),
(4, 'Ahmed', 'Salmani', '0785475846', 'ahmed@gmail.com', '$2y$10$tD4aXZXU9vHDehFNdeU3MeIfwlF42Nc2KJjiRwP0kErXvKZaqNIbC', '$2y$10$RcNnix9uDiqtBMZtWXvQqehSJxeOYCAJkKs78SIOg0s/sn7Mx5ZH.', 'kb123456', 'soufiane', 'assets/img/sans.webp');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `image_main` varchar(350) NOT NULL,
  `image_secondaire` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `id_annonce`, `image_main`, `image_secondaire`) VALUES
(20, 20, 'assets/img/barnes-lyon-appartement-lyon-6eme.png', ''),
(21, 24, 'assets/img/WhatsApp-Image-2022-12-01-at-12.45.51-1024x766.jpeg', ''),
(22, 25, 'assets/img/depositphotos_29246729-stock-photo-modern-villa-by-night.jpg', 'assets/img/depositphotos_46797131-stock-photo-modern-villa.jpg'),
(23, 25, '', 'assets/img/depositphotos_97554836-stock-photo-luxurious-villa-with-pool.jpg'),
(24, 24, '', 'assets/img/terrain-a-vendre-ferme-marrakech-exterieur-route-fes.jpg'),
(25, 20, '', 'assets/img/177_00-2022-10-28-0224.jpg\r\n'),
(26, 26, 'assets/img/office-gb567c8f9b_640.jpg', ''),
(27, 27, 'assets/img/luks-koltuk-takimi-mardin.jpg', ''),
(28, 27, '', 'assets/img/Salon-moderne-de-luxe-Hasnae.com-deco-9.jpg'),
(29, 27, '', 'assets/img/pexels-max-vakhtbovych-6782577-1200x797.jpg'),
(30, 20, '', 'assets/img/b1j5_rokga_01_p_1024x768.webp'),
(31, 28, 'assets/img/xl-dff0427f-45ea-4d84-94bd-048a459f8024.jpg', ''),
(32, 28, '', 'assets/img/g3_0.png'),
(33, 28, '', 'assets/img/AdobeStock_81570725.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `idx_id_bien` (`id_annonce`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `idx_id_prop` (`id_client`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_annonce` (`id_annonce`),
  ADD KEY `idx_id_bien` (`id_image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
