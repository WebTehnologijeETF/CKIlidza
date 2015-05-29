-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 07:40 AM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baza_wt_projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tekst` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL,
  `novosti` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novosti` (`novosti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `tekst`, `autor`, `email`, `datum`, `novosti`) VALUES
(9, 'svaka vam cast! samo tako dalje nastavite!', 'nicky', 'niicky@gmail.com', '2015-05-28 13:40:57', 2),
(13, 'pobjedit cemo vas!', 'anonimac', '', '2015-05-28 13:47:48', 4),
(19, 'najbolji smo!!!!', 'no1', '', '2015-05-28 14:07:03', 2),
(20, 'necete!', 'xx', 'kadric.admir.23@gmai', '2015-05-28 15:45:29', 4),
(21, 'hocemo!', 'najbolji', '', '2015-05-28 15:47:52', 4),
(22, 'hahahahaha', 'xx', '', '2015-05-28 15:48:35', 4),
(23, 'dosta vas!', 'sumeja', 'sbotulja1@etf.unsa.b', '2015-05-29 02:04:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'sumka', 'sum123');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL,
  `tekst` varchar(3000) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `naslov`, `autor`, `datum`, `tekst`, `slika`) VALUES
(2, 'SVEČANA AKADEMIJA CKO ILIDŽA', 'Aldina Tucaković', '2015-05-29 02:39:18', 'Crveni križ općine Ilidža, 12.05.2015. godine u sklopu obilježavanja Sedmice Crvenog križa i Crvenog polumjeseca organizovao je Svečanu akademiju na kojoj su dodjeljene zahvalnice istaknutim donatorima za pomoć i podršku tokom prošlogodišnjih poplava koje su zadesile našu zemlju.\r\nNa Akademiji su prisustvovali i predstavnici strukture Crvenog križa:\r\n- gospodin Branko Leko, glavni tajnik DCK BiH\r\n- gospodin Namik Hodžić, generalni sekretar CKFBiH\r\n- prof.dr. Ajnija Omanić, predsjednica CKKS\r\n- gospođa Eneida Višo, sekretar CKKS\r\n- gospođa Mira Boras, pomoćnica načelnika Općine Ilidža za Službu Civilne zaštite, te službenici Općine Ilidža, predstavnici MZ i članovi predsjedništva i skupštine CKO Ilidža i Mladi CKO Ilidža.\r\nPrisutnima se prezentovao u uvodnom dijelu film "Priča o jednoj ideji" kako bi se na pravi način prikazalo gostima kako je Crveni križ nastao i koja je glavna misija. Prezentovan je i video " CKO Ilidža u odgovoru na katastrofu", te se prisutnima obratio Predsjednik CKO Ilidža, dr.Šemsudin Hadrović, gospodin Namik Hodžić, generalni sekretar CKFBiH i gospodin Branko Leko, glavni tajnik DCK BiH koji su pohvalili rad organizacije, organizovanost i predanost Mladih i poželjeli sreću ekipi na predstojećem Evropskom takmičenju.\r\nZahvalnice je uručila Senada Brkić-Šegalo, sekretar CKO Ilidža.\r\nIstaknuti donatori kojima su uručene zahvalnice:\r\n1. CARAT PLUS d.o.o\r\n2. Crveni Križ Centar Sarajevo\r\n3. Konzum d.o.o.\r\n4. Podravka d.o.o.\r\n5. Zdravko Čolić\r\n6. Zvečevo komerc d.o.o.\r\n7. Marbo d.o.o.\r\n8. Orbico d.o.o.\r\n9. Zemljoradnička zadruga „Sarajevsko polje“ Ilidža\r\n10. Butmir d.o.o.\r\n11. Avdić 3A\r\n12. Credimex d.o.o. \r\n13. Bingo d.o.o.\r\n14. Amko komerc\r\n15. Grand Centar Ilidža\r\n16. Selver Zećirović i YU caffe Ilidža\r\n17. Enida Gljiva – Gagić\r\n18. Crveni Križ Kiseljak\r\n19. Konjic karton d.o.o.\r\n20. IPSA institut\r\n21. Bioenergy d.o.o. \r\n22. Ciklo centar – Hajrudin Klipo\r\n23. SBO – Salon bankarske opreme\r\n24. A2B express BiH\r\n25. Divico d.o.o. \r\n26. Caffe Ba Ba Luu\r\n27. Selma Turković\r\n28. Mirza Hasibović\r\n29. Sarajkić Mersad\r\n30. Senka Čimpo\r\n31. Safet i Samra Mrzić\r\n32. Ena i Edin Hatibović\r\n33. Šuvalija Dževad\r\n34. Alma Trnovac\r\n35. Odred izviđača Igman 92 (Scout group Igman 92)\r\n36. Gorska služba spašavanja Ilidža\r\n37. Moto klub Bratstvo vukova Hadžići\r\n38. Vision trek team\r\n39. Crveni križ Federacije BiH\r\n40. Općina Ilidža\r\n41. Civilna zaštita Općine Ilidža\r\n42. Mladi Crvenog križa Ilidža', '"slike/akademija.jpg"'),
(3, 'SEDMICA CRVENOG KRIŽA', 'Aldijana Jašarević', '2015-05-29 02:39:30', 'Svim uposlenicima, volonterima, članovima i onima koji poštuju rad Crvenog križa, sretan 08.maj - Svjetski dan Crvenog križa i Crvenog polumjeseca.\r\nNa današnji dan trebamo se sjetiti osnivača Međunarodnog pokreta i dobitnika Nobelove nagrade za mir, Henry Dunanta, a čije univerzalne principe i humanitarnu misiju baštinimo i u Bosni i Hercegovini od 1912.godine ( već 103 godinu).\r\nTrebamo biti ponosni što smo pripadnici najmasovnije humanitarne organizacije na planeti koja na temelju svojih univerzalnih vrijednosti svakodnevno pruža pomoć i podršku ljudima u raznim nedaćama.Ni minimalna i nedovoljna podrška organa vlasti neće nas obeshrabriti u izvršavanju humanitarnih zadataka naspram građana naše domovine, posebno onih u oblasti promocije zdravlja, socijalne zaštite, zdravstvenog i humanitarnog odgoja i obrazovanja, traženja nestalih osoba i odgovora na prirodne i druge nesreće. \r\n', '"slike/znak.jpg"'),
(4, 'OPĆINSKO TAKMIČENJE IZ PRUŽANJA PP', 'Jasmin Nikšić', '2015-05-29 02:39:40', 'XX Općinsko takmičenje iz pružanja prve pomoći CKO Ilidža za učenike osnovnih i srednjih škola, održat će se 28.03.2015.godine u prostorijama i okruženju osnovne škole El-Manar na Ilidži sa početkom u 11 sati.', '"slike/takmicenje.png"');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`novosti`) REFERENCES `novosti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
