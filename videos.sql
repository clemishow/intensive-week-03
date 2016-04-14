-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  saulnierfam.mysql.db
-- Généré le :  Jeu 14 Avril 2016 à 22:19
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `saulnierfam`
--

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL,
  `movie_id` varchar(64) NOT NULL,
  `url` varchar(120) NOT NULL,
  `song` varchar(120) NOT NULL,
  `artist` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `movie_id`, `url`, `song`, `artist`) VALUES
(32, '22', 'zcQmM0HjMH8', 'Theme Principal', 'Klaus Badelt'),
(35, '102382', 'VSDLx9E968k', 'Gone, Gone, Gone', 'Phillip Phillips'),
(36, '102899', '39-Tbf_w98I', 'Borombon', 'Camilo Azuquita'),
(37, '24428', 'D3ZNtOcY_1A', 'Live to Rise', 'Soundgarden'),
(38, '209112', 'S176AKQhcCk', 'Is She With You ?', 'Hans Zimmer, Junkie XL'),
(39, '206647', '8jzDnsjYv9A', 'Writing''s On The Wall', 'Sam Smith'),
(40, '37724', 'DeumyOzKqgI', 'Skyfall', 'AdÃ¨le'),
(41, '19913', 'fczPlmz-Vug', 'Us', 'Regina Spektor'),
(42, '140607', 'ueqKtype7Kk', 'March of the Resistance', 'J.J. Abrams'),
(43, '49051', 'zE9NlOg6M3s', 'Concerning Hobbits', 'Howard Shore'),
(44, '671', 'a7z8HGXVR80', 'Prologue', 'John Wiliams'),
(45, '64690', 'MV_3Dpw-BRY', 'Nightcall', 'Kavinsky & Lovefoxxx'),
(46, '93456', 'Q-GLuydiMe4', 'Happy', 'Pharrell Williams'),
(47, '18785', 'Qkuu0Lwb5EM', 'Who Let the Dogs Ou', 'Baha Men'),
(48, '101299', 'DaVA6sgOpws', 'Everybody Wants To Rule The World', 'Lorde'),
(49, '9029', '0CGVgAYJyjk', 'Grace Kelly', 'Mika'),
(51, '68724', 'TzzrzGyKo6g', 'Ghosst', 'Lorn'),
(52, '109445', 'L0MK7qz13bU', 'Let It Go', 'Idina Menzel'),
(53, '58595', 'r0EVEXX9kpk', 'Breath of Life', 'Florence + The Machine'),
(54, '157336', 'QPuC7q-GYOc', 'No Time For Caution', 'Hans Zimmer'),
(55, '22', 'UvnMQ9Z5K3g', 'Will and Elizabeth', 'Klaus Badelt'),
(56, '8424', 'kFzViYkZAz4', 'La vie en rose', 'Edith Piaf'),
(57, '349158', 'tP5KRjHtxWM', 'Acadeca', 'Daniel Ingram'),
(58, '120467', 'MB52I3rBWAY', 'Concerto for Lute and Plucked Strings I Moderato', 'Alexandre Desplat'),
(59, '15588', 'hj-6z8QklYE', 'Speed Date Car', 'Ludovic Bource'),
(60, '27205', '5WOcU7J9F3E', 'Time', 'Hans Zimmer'),
(61, '281957', 'jTQQAOewm40', 'Hawk Punished', 'Ryuichi Sakamoto, Alva Noto'),
(62, '585', '_WRKbu5j0O0', 'Main theme', 'Randy Newman'),
(63, '8966', 'oMVwEmFsvuA', 'The Lion Fell In Love With the Lamb', 'Carter Burwell'),
(64, '14160', 'sjAWAUc_33k', 'Married Life', 'Michael Giacchino'),
(65, '15152', 'iEiUMMOra0w', 'Repaired', 'Ludovic Bource'),
(66, '289143', 'dUpfYsQleqU', 'Julith vs Kerubim', 'Guillaume HouzÃ©'),
(67, '597', 'FHG2oizTlpY', 'My heart will go on', 'CÃ©line Dion'),
(68, '85', '-bTpp8PQSog', 'Theme principal', 'John Williams'),
(69, '1366', 'btPJPFnesV4', 'Eye of the tiger', 'Survivor'),
(70, '744', 'S4z_qG6ZgQc', 'Lead Me On', 'Teena Marie'),
(71, '72105', 'veHpPG-Wcy8', 'Everybody Needs a Best Friend', 'Norah Jones'),
(72, '808', 'kdrgtWBy7c4', 'All Star', 'Smash Mouth'),
(73, '57214', 'dNej0Nonlw0', 'We Want Some Pussy', '2 live Crew'),
(74, '680', 'XzGr4s4vgIY', 'Jungle Boogie', 'Kool & the gang'),
(75, '20526', 'F4eccPBFEjE', 'Derezzed', 'Daft Punk'),
(76, '18947', 'G9DRLnVsKHU', 'All Day And All The Night', 'The Kinks'),
(77, '6023', 'tvmCSYQVssU', 'Love You ''till The End', 'The Pogues'),
(78, '74643', 'TAzQjB6I8KY', 'Peppy ans George', 'Ludovic Bource'),
(79, '74643', 'fiBEWkzF8QU', 'George Valentin', 'Ludovic Bource'),
(80, '51876', '-fZ_8zKESPA', 'Versus', 'Cicada'),
(81, '10229', 'iOTcr9wKC-o', 'I Dare You to Move', 'Switchfoot'),
(82, '5915', 'pRUGvArWXLk', 'Society', 'Eddie Vedder'),
(83, '312221', 'mKeqZ_AcL_A', 'Last Breath', 'Future'),
(84, '508', 'WQQ3mkwlnXk', 'The Trouble With Love Is', 'Kelly Clarkson'),
(85, '194', 'H2-1u8xvk54', 'Comptine d''Un Autre Ã‰tÃ©', 'Yann Tiersen'),
(86, '21861', 'o4LY4aboOJs', 'Little Sister', 'Jean Philippe Verdin'),
(87, '240832', 'D_en0rZ_hrU', 'Sister Rust', 'Damon Albarn'),
(88, '953', 'rhhlodvXvwI', 'Hawaii Five-O', 'The Ventures'),
(89, '293660', '8f_d8XvyHaE', 'Shop', 'Salt-N-Pepa'),
(90, '550', 'kgNF7_EWEZo', 'Who Is Tyler Durden', 'Dust Brothers'),
(91, '4951', '2ouGtW_5d6A', 'I Want You To Want Me', 'Letters to Cleo'),
(92, '862', 'McooXVFA1BM', 'Youâ€™ve Got a Friend in Me', 'Randy Newman'),
(93, '13', 'uGPG_Y-_BZI', 'Rebel Rouser', 'Duane Eddy'),
(94, '251516', 'dQaNdnkypbw', 'True Survivor', 'David Hasselhoff'),
(95, '411', 'f_sMuo8Lujg', 'The Battle Song', 'Harry Gregson-Williams'),
(96, '274479', 'tBBys5TLxCI', 'Walking in the rain', 'The Ronettes'),
(97, '152601', 'KhK82a4nZMk', 'Milk & Honey', 'Arcade Fire'),
(98, '152601', 'hgOg4NGCYR8', 'Off You', 'The Breeders'),
(100, '14429', 'Q4VK9_CfOLQ', 'Crazy', 'Britney Spears'),
(101, '2105', '6sjVX_S_e68', 'New Girl', 'Third Eye Blind'),
(102, '76493', '_MgLWD4cCY', 'The Next Episode', 'Admiral General Aladeen, Aiwa & Mr. Tibbz'),
(103, '496', 'ayqBsvzWgXc', 'Born to Be Wild', 'Steppenwolf'),
(104, '76341', 'UIyRXvHmXxo', 'Junkie XL', 'Tom Holkenborg'),
(105, '210577', 'p4wSJMorYK8', 'What Have We Done To Each Other', 'Trent Reznor'),
(106, '222935', 'nkqVm5aiC28', 'All Of The Stars', 'Ed Sheeran'),
(107, '222935', 'lAwYodrBr2Q', 'Wait', 'M83'),
(108, '35690', '6m63fCUJjj4', 'I Hope You Find It', 'Miley Cyrus'),
(109, '77877', 'jFg_8u87zT0', 'You Found Me', 'The Fray'),
(110, '8976', 'MyjTrwOMSO4', 'Semi-Charmed Life', 'Third Eye Blind'),
(111, '14836', 'XnIUVHtLC08', 'End Credits', 'Bruno Coulais & The Children''s Choir Of Nice'),
(112, '352275', 'mrMLMV6E4CM', 'Cry Little Sister', 'Gerard McMann'),
(113, '128', '-JeAW2Y_AeY', 'The Journey to the West', 'Joe Hisaishi'),
(114, '954', 'XAYhNHhxN0A', 'Main Theme', 'Adam Clayton & Larry Mullen'),
(115, '11970', 'MuivsaOvHhs', 'De Zero en Heros', 'Alan Menken'),
(116, '204082', 'tuR0aCQALDE', 'I Got Mine', 'The black keys'),
(117, '241848', 'P5EjdvwUPj4', 'Haunted When the Minutes Drag', 'Love and Rockets'),
(118, '265177', 'Umo0uWbR-xI', 'On Ne Change Pas', 'CÃ©line Dion'),
(119, '9471', '0lPQZni7I18', 'Independent Women', 'Destiny''s Child'),
(120, '9767', 'pSsqWHtg7Ig', 'I Can See Clearly', 'Johnny Nash'),
(121, '44833', 'cPDOTcxmol8', 'First Transmission', 'Steve Jablonsky'),
(122, '2899', 'sAwUJSfPXBM', 'Les Pirates', 'Philippe Chany'),
(123, '228426', '0-LuF-hPcTw', 'Last Night, Good Night', 'Pharrell Williams'),
(124, '157350', 'drkhv11ljEs', 'Tris', 'Junkie XL'),
(125, '52449', '9OKtuaWkmA0', 'Teacher Teacher', 'Rockpile'),
(126, '2179', 'fA4mVS0u_uo', 'Master Exploder', 'Tenacious D'),
(127, '44214', '9nk8RJxZQEs', 'Vitaliy Zavadskyy', 'Clint Mansell'),
(128, '11036', 'kwaXnnYfJA8', 'This Is I promise you', 'N''Sync'),
(129, '192', '7Ysc-Rh0DIQ', 'Main Theme', 'James Horner'),
(130, '539', 'DDtJUSYoLDE', 'Main Theme', 'Alfred Hitchcock'),
(131, '49530', 'xTKgwB5HxuI', 'In Time Main Theme', 'Craig Armstrong'),
(132, '2300', 'J9FImc2LOr8', 'Main Theme', 'Quad City DJ''s'),
(133, '10515', 'HhL8za8cm7o', 'Laputa', 'Joe Hisaishi'),
(134, '75656', 'tBsRvthVhdw', 'Entertainment', 'Phoenix');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
