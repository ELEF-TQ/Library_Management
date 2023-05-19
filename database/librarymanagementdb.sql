-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 10:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `librarymanagementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `emprunts`
--

CREATE TABLE IF NOT EXISTS `emprunts` (
  `Numero` int(10) NOT NULL AUTO_INCREMENT,
  `DateEmprunt` datetime NOT NULL,
  `Numero_usager` int(10) NOT NULL,
  `Numero_livre` int(10) NOT NULL,
  PRIMARY KEY (`Numero`),
  UNIQUE KEY `fk_emprunt_livre` (`Numero_livre`),
  KEY `fk_emprunt_usager` (`Numero_usager`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `emprunts`
--

INSERT INTO `emprunts` (`Numero`, `DateEmprunt`, `Numero_usager`, `Numero_livre`) VALUES
(16, '2023-05-19 22:05:19', 15, 26),
(17, '2023-05-19 22:05:26', 9, 35);

-- --------------------------------------------------------

--
-- Table structure for table `emprunts_history`
--

CREATE TABLE IF NOT EXISTS `emprunts_history` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `DateEmprunt` datetime NOT NULL,
  `DateRetour` datetime NOT NULL,
  `Numero_usager` int(10) NOT NULL,
  `Numero_livre` int(10) NOT NULL,
  PRIMARY KEY (`Numero`),
  UNIQUE KEY `fk_numero_usager` (`Numero_usager`),
  UNIQUE KEY `fk_numero_livre` (`Numero_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `emprunts_history`
--

INSERT INTO `emprunts_history` (`Numero`, `DateEmprunt`, `DateRetour`, `Numero_usager`, `Numero_livre`) VALUES
(36, '2023-05-19 22:05:36', '2023-05-19 22:05:39', 12, 33);

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `Numero_livre` int(10) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(40) NOT NULL,
  `Auteur` varchar(40) NOT NULL,
  `Maison` varchar(40) NOT NULL,
  `Pages` int(5) NOT NULL,
  `Exemplaires` int(5) NOT NULL,
  PRIMARY KEY (`Numero_livre`),
  UNIQUE KEY `unique_Numero_livre` (`Numero_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`Numero_livre`, `Titre`, `Auteur`, `Maison`, `Pages`, `Exemplaires`) VALUES
(25, 'Pride and Prejudice', 'Jane Austen', 'T. Egerton, Whitehall', 279, 598),
(26, 'The Catcher in the Rye', 'J.D. Salinger', 'Little, Brown and Company', 224, 395),
(27, 'The Lord of the Rings', 'J.R.R. Tolkien', 'George Allen & Unwin', 1178, 1199),
(28, 'To the Lighthouse', 'Virginia Woolf', 'Hogarth Press', 209, 349),
(29, 'Moby-Dick', 'Herman Melville', 'Harper & Brothers', 585, 799),
(30, 'The Odyssey', 'Homer', 'Various ancient Greek publishers', 416, 697),
(31, 'The Hobbit', 'J.R.R. Tolkien', 'George Allen & Unwin', 310, 998),
(33, 'The Alchemist', 'Paulo Coelho', 'HarperCollins', 197, 796),
(34, 'The Chronicles of Narnia', 'C.S. Lewis', 'Geoffrey Bles', 767, 1198),
(35, 'The Da Vinci Code', 'Dan Brown', 'Doubleday', 689, 946),
(36, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'Norstedts Förlag', 590, 700),
(37, 'Gone with the Wind', 'Margaret Mitchell', 'Macmillan Publishers', 1037, 1099),
(38, 'The Shining', 'Stephen King', 'Doubleday', 447, 600),
(39, 'The Adventures of Huckleberry Finn', 'Mark Twain', 'Chatto & Windus', 366, 547),
(40, 'The Hunger Games', 'Suzanne Collins', 'Scholastic Corporation', 374, 898),
(41, 'The Picture of Dorian Gray', 'Oscar Wilde', 'Ward, Lock and Company', 254, 449),
(42, 'Brave New World', 'Aldous Huxley', 'Chatto & Windus', 311, 648);

-- --------------------------------------------------------

--
-- Table structure for table `usager`
--

CREATE TABLE IF NOT EXISTS `usager` (
  `Numero_usager` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Statut` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`Numero_usager`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `usager`
--

INSERT INTO `usager` (`Numero_usager`, `Nom`, `Prenom`, `Adresse`, `Statut`, `Email`) VALUES
(8, 'Williams', 'Michael', '789 Oak St', 'Enseignant', 'michael.williams@example.com'),
(9, 'Jones', 'Sophia', '321 Maple Ave', 'Etudiant', 'sophia.jones@example.com'),
(10, 'Brown', 'Daniel', '654 Pine St', 'Etudiant', 'daniel.brown@example.com'),
(11, 'Davis', 'Olivia', '987 Cedar CN', 'Enseignant', 'olivia.davis@example.com'),
(12, 'Miller', 'Ethan', '135 Walnut Dr', 'Etudiant', 'ethan.miller@example.com'),
(13, 'Wilson', 'Ava', '468 Birch Rd', 'Etudiant', 'ava.wilson@example.com'),
(14, 'Taylor', 'Matthew', '791 Spruce St', 'Enseignant', 'matthew.taylor@example.com'),
(15, 'Anderson', 'Emma', '246 Oakwood Ave', 'Etudiant', 'emma.anderson@example.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `fk_emprunt_livre` FOREIGN KEY (`Numero_livre`) REFERENCES `livres` (`Numero_livre`),
  ADD CONSTRAINT `fk_emprunt_usager` FOREIGN KEY (`Numero_usager`) REFERENCES `usager` (`Numero_usager`);

--
-- Constraints for table `emprunts_history`
--
ALTER TABLE `emprunts_history`
  ADD CONSTRAINT `emprunts_history_ibfk_2` FOREIGN KEY (`Numero_livre`) REFERENCES `livres` (`Numero_livre`),
  ADD CONSTRAINT `emprunts_history_ibfk_1` FOREIGN KEY (`Numero_usager`) REFERENCES `usager` (`Numero_usager`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
