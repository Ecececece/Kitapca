-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3307:3307
-- Üretim Zamanı: 18 Nis 2025, 18:24:41
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitapca`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitapadi` varchar(100) NOT NULL,
  `yayinadi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `fiyat` float NOT NULL,
  `fotograf` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitapadi`, `yayinadi`, `kategori`, `fiyat`, `fotograf`) VALUES
(1, 'Ajin 1 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'ajin-1.jpg'),
(2, 'Ajin 12 Cilt', 'Athica Yayınları', 'Çizgiroman', 210, 'ajin-12.jpg'),
(3, 'Ajin 13 Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'ajin-13.jpg'),
(4, 'Ajin 14 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 290, 'ajin-14.jpg'),
(5, 'Akira 1 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 190, 'akira-1.jpg'),
(6, 'Another 1 2 Donem Cilt', 'Athica Yayınları', 'Çizgiroman', 260, 'another-1-2-donem.jpg'),
(7, 'Banana Fish 5 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 250, 'banana-fish-5.jpg'),
(8, 'Banana Fish 6 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 140, 'banana-fish-6.jpg'),
(9, 'Banana_min', 'Kayıp Kıta', 'Çizgiroman', 230, 'banana_min.jpg'),
(10, 'Beastars3_min Cilt', 'Komik Şeyler', 'Çizgiroman', 250, 'beastars3_min.jpg'),
(11, 'Beastars4_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 130, 'beastars4_min.jpg'),
(12, 'Bleach 31 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'bleach-31.jpg'),
(13, 'Bleach 32 Cilt', 'Athica Yayınları', 'Çizgiroman', 130, 'bleach-32.jpg'),
(14, 'Bleach 41 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 140, 'bleach-41.jpg'),
(15, 'Bleach 42 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 120, 'bleach-42.jpg'),
(16, 'Blends3_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 150, 'blends3_min.webp'),
(17, 'Blends_min', 'Komik Şeyler', 'Çizgiroman', 190, 'blends_min.jpg'),
(18, 'Blue Period 4 Cilt', 'Komik Şeyler', 'Çizgiroman', 150, 'blue-period-4.jpg'),
(19, 'Blue Period 5 Cilt', 'Athica Yayınları', 'Çizgiroman', 290, 'blue-period-5.jpg'),
(20, 'Blue Period 6 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 160, 'blue-period-6.jpg'),
(21, 'Buna Gizem Deme 4 Cilt', 'Kayıp Kıta', 'Çizgiroman', 130, 'buna-gizem-deme-4.jpg'),
(22, 'Buna Gizem Deme 5 Cilt', 'Komik Şeyler', 'Çizgiroman', 230, 'buna-gizem-deme-5.jpg'),
(23, 'Bungou Stray Dogs 6 Cilt', 'Athica Yayınları', 'Çizgiroman', 290, 'bungou-stray-dogs-6.jpg'),
(24, 'Bungou Stray Dogs 7 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'bungou-stray-dogs-7.jpg'),
(25, 'Chainsaw Man 8 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 190, 'chainsaw-man-8.jpg'),
(26, 'Chainsaw Man 9 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 160, 'chainsaw-man-9.jpg'),
(27, 'Dandadan1 Cilt', 'Athica Yayınları', 'Çizgiroman', 210, 'dandadan1.jpg'),
(28, 'Db3 4 Cilt', 'Komik Şeyler', 'Çizgiroman', 120, 'db3-4.jpg'),
(29, 'Dead Dead Demons Dedede Destruction 1 Cilt', 'Komik Şeyler', 'Çizgiroman', 270, 'dead-dead-demons-dedede-destruction-1.jpg'),
(30, 'Dorohedoro 2 1741239222_min Cilt', 'Athica Yayınları', 'Çizgiroman', 300, 'dorohedoro-2-1741239222_min.jpg'),
(31, 'Dragon Ball 1 2 Cilt', 'Kayıp Kıta', 'Çizgiroman', 150, 'dragon-ball-1-2.jpg'),
(32, 'Dragon Ball 13 14 Cilt', 'Kayıp Kıta', 'Çizgiroman', 220, 'dragon-ball-13-14.jpg'),
(33, 'Dragon Ball 15 16 Cilt', 'Athica Yayınları', 'Çizgiroman', 210, 'dragon-ball-15-16.jpg'),
(34, 'Essiz Besizler 01 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 230, 'essiz-besizler-01.jpg'),
(35, 'Essiz Besizler 11 Cilt', 'Komik Şeyler', 'Çizgiroman', 190, 'essiz-besizler-11.jpg'),
(36, 'Ev Erkeginin Yolu 10 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 130, 'ev-erkeginin-yolu-10.jpg'),
(37, 'Ev Erkeginin Yolu 11 Cilt', 'Komik Şeyler', 'Çizgiroman', 130, 'ev-erkeginin-yolu-11.jpg'),
(38, 'Ev Erkeginin Yolu 12 Cilt', 'Athica Yayınları', 'Çizgiroman', 150, 'ev-erkeginin-yolu-12.jpg'),
(39, 'Ezilmis Render_min', 'Athica Yayınları', 'Çizgiroman', 280, 'ezilmis-render_min.jpg'),
(40, 'Fairy Tail 17 Cilt', 'Kayıp Kıta', 'Çizgiroman', 260, 'fairy-tail-17.jpg'),
(41, 'Fairy Tail 7 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 300, 'fairy-tail-7.jpg'),
(42, 'Fairy Tail 8_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 180, 'fairy-tail-8_min.jpg'),
(43, 'Fairy Tail 9 Cilt', 'Athica Yayınları', 'Çizgiroman', 150, 'fairy-tail-9.jpg'),
(44, 'Fire Force Alev Gucu 6 Cilt5c123127a0051fa76024955aca800fb6_min Cilt', 'Komik Şeyler', 'Çizgiroman', 180, 'fire-force-alev-gucu-6-cilt5c123127a0051fa76024955aca800fb6_min.jpg'),
(45, 'Frieren Cilt 2 Frieren Marmara Cizgi 1682 85 B_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'frieren-cilt-2-frieren-marmara-cizgi-1682-85-b_min.jpg'),
(46, 'Fuji3 Chemise_min Cilt', 'Athica Yayınları', 'Çizgiroman', 130, 'fuji3-chemise_min.jpg'),
(47, 'Genclik Yolculugu 1 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 150, 'genclik-yolculugu-1.jpg'),
(48, 'Genclik Yolculugu 2 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'genclik-yolculugu-2.jpg'),
(49, 'Genclik Yolculugu 3 Cilt', 'Komik Şeyler', 'Çizgiroman', 140, 'genclik-yolculugu-3.jpg'),
(50, 'Genclik Yolculugu 4 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'genclik-yolculugu-4.jpg'),
(51, 'Genclik Yolculugu 5 Cilt', 'Kayıp Kıta', 'Çizgiroman', 230, 'genclik-yolculugu-5.jpg'),
(52, 'Getattachmentthumbnail_min', 'Komik Şeyler', 'Çizgiroman', 180, 'getattachmentthumbnail_min.jpg'),
(53, 'Guzel Kokulu Cicekler Zarafetle Acar 4 Cizgi Roman Akilcelen Kitaplar Saka Mikami 15917069 13 B_min ', 'Kayıp Kıta', 'Çizgiroman', 190, 'guzel-kokulu-cicekler-zarafetle-acar-4-cizgi-roman-akilcelen-kitaplar-saka-mikami-15917069-13-b_min.jpg'),
(54, 'Haikyu 1 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 260, 'haikyu-1.jpg'),
(55, 'Haikyu 15 Cilt', 'Komik Şeyler', 'Çizgiroman', 250, 'haikyu-15.jpg'),
(56, 'Haikyu 16 Cilt', 'Komik Şeyler', 'Çizgiroman', 210, 'haikyu-16.jpg'),
(57, 'Haikyu 17 Cilt', 'Athica Yayınları', 'Çizgiroman', 280, 'haikyu-17.jpg'),
(58, 'Haikyu 5 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 230, 'haikyu-5.jpg'),
(59, 'Haikyu 6 Cilt', 'Athica Yayınları', 'Çizgiroman', 300, 'haikyu-6.jpg'),
(60, 'Haikyu 7 Cilt', 'Komik Şeyler', 'Çizgiroman', 170, 'haikyu-7.jpg'),
(61, 'Haikyuu 4 Somiz_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 240, 'haikyuu-4-somiz_min.jpg'),
(62, 'Horimiya Horisan Ile Miyamurakun 12 Cizgi Roman Akilcelen Kitaplar Hero 6531009 12 B_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 210, 'horimiya-horisan-ile-miyamurakun-12-cizgi-roman-akilcelen-kitaplar-hero-6531009-12-b_min.jpg'),
(63, 'Horimiya Horisan Ile Miyamurakun 13 Manga Akilcelen Kitaplar Hero 15895931 13 B_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 150, 'horimiya-horisan-ile-miyamurakun-13-manga-akilcelen-kitaplar-hero-15895931-13-b_min.jpg'),
(64, 'Hotarubi On 01_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 300, 'hotarubi-on-01_min.jpg'),
(65, 'Iblis Keser 13 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 250, 'iblis-keser-13.jpg'),
(66, 'Iblis Keser 15 Cilt', 'Komik Şeyler', 'Çizgiroman', 270, 'iblis-keser-15.jpg'),
(67, 'Iblis Keser 16 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'iblis-keser-16.jpg'),
(68, 'Image001_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 200, 'image001_min.jpg'),
(69, 'Iyi Geceler Punpun 6 Render_min Cilt', 'Athica Yayınları', 'Çizgiroman', 150, 'iyi-geceler-punpun-6-render_min.jpg'),
(70, 'Jujutsu 13 Cilt', 'Kayıp Kıta', 'Çizgiroman', 230, 'jujutsu-13.jpg'),
(71, 'Jujutsu Kaisen 10 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'jujutsu-kaisen-10.jpg'),
(72, 'Jujutsu Kaisen 11 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 290, 'jujutsu-kaisen-11.jpg'),
(73, 'Jujutsu Kaisen 12 Cilt', 'Kayıp Kıta', 'Çizgiroman', 240, 'jujutsu-kaisen-12.jpg'),
(74, 'Kadin Ve Kedisi_min', 'Athica Yayınları', 'Çizgiroman', 220, 'kadin-ve-kedisi_min.jpg'),
(75, 'Kahramanlik Akademim 1 Cilt', 'Athica Yayınları', 'Çizgiroman', 170, 'kahramanlik-akademim-1.jpg'),
(76, 'Kahramanlik Akademim 10 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 210, 'kahramanlik-akademim-10.jpg'),
(77, 'Kahramanlik Akademim 11 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 220, 'kahramanlik-akademim-11.jpg'),
(78, 'Kahramanlik Akademim 12 Cilt', 'Athica Yayınları', 'Çizgiroman', 160, 'kahramanlik-akademim-12.jpg'),
(79, 'Kahramanlik Akademim 25 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 170, 'kahramanlik-akademim-25.jpg'),
(80, 'Kahramanlik Akademim 26 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 240, 'kahramanlik-akademim-26.jpg'),
(81, 'Kahramanlik Akademim 27 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 170, 'kahramanlik-akademim-27.jpg'),
(82, 'Kahramanlik Akademim 4 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 280, 'kahramanlik-akademim-4.jpg'),
(83, 'Kahramanlik Akademim 5 Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'kahramanlik-akademim-5.jpg'),
(84, 'Kahramanlik Akademim 6 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 150, 'kahramanlik-akademim-6.jpg'),
(85, 'Kahramanlik Akademim 7 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 200, 'kahramanlik-akademim-7.jpg'),
(86, 'Kahramanlik Akademim 8 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 240, 'kahramanlik-akademim-8.jpg'),
(87, 'Kara Kahya 10 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'kara-kahya-10.jpg'),
(88, 'Kara Kahya 11 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 290, 'kara-kahya-11.jpg'),
(89, 'Kara Kahya 12 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 140, 'kara-kahya-12.jpg'),
(90, 'Kara Kahya 20 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'kara-kahya-20.jpg'),
(91, 'Kara Kahya 21 Render_min Cilt', 'Komik Şeyler', 'Çizgiroman', 130, 'kara-kahya-21-render_min.jpg'),
(92, 'Kara Kahya 8 Cilt', 'Athica Yayınları', 'Çizgiroman', 120, 'kara-kahya-8.jpg'),
(93, 'Kara Kahya 9 Cilt', 'Athica Yayınları', 'Çizgiroman', 190, 'kara-kahya-9.jpg'),
(94, 'Koklervekimlikler', 'Kayıp Kıta', 'Çizgiroman', 180, 'koklervekimlikler.jpg'),
(95, 'Kurokonun Basketbolu 14 Cilt', 'Athica Yayınları', 'Çizgiroman', 220, 'kurokonun-basketbolu-14.jpg'),
(96, 'Kurokonun Basketbolu 17 Render_min Cilt', 'Komik Şeyler', 'Çizgiroman', 210, 'kurokonun-basketbolu-17-render_min.jpg'),
(97, 'Kurokonun Basketbolu 18 Cilt', 'Kayıp Kıta', 'Çizgiroman', 160, 'kurokonun-basketbolu-18.jpg'),
(98, 'Kurokonun Basketbolu 8 Cilt', 'Kayıp Kıta', 'Çizgiroman', 300, 'kurokonun-basketbolu-8.jpg'),
(99, 'Kurokonun Basketi 7 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 240, 'kurokonun-basketi-7.jpg'),
(100, 'Kuzeykilici_min', 'Akılçelen Yayın', 'Çizgiroman', 190, 'kuzeykilici_min.jpg'),
(101, 'Lagoon 1_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'lagoon-1_min.jpg'),
(102, 'Logo', 'Athica Yayınları', 'Çizgiroman', 150, 'logo.svg'),
(103, 'Look Back', 'Athica Yayınları', 'Çizgiroman', 260, 'look-back.jpg'),
(104, 'Medalist Madalya Pesinde 2 Genel Akilcelen Kitaplar Tsurumaikada 5952183 12 B_min Cilt', 'Athica Yayınları', 'Çizgiroman', 130, 'medalist-madalya-pesinde-2-genel-akilcelen-kitaplar-tsurumaikada-5952183-12-b_min.jpg'),
(105, 'Moira Sarmali 229648 1_min Cilt', 'Komik Şeyler', 'Çizgiroman', 250, 'moira-sarmali-229648-1_min.jpg'),
(106, 'Monster Cilt 8 Monster Marmara Cizgi 1714 86 B_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 170, 'monster-cilt-8-monster-marmara-cizgi-1714-86-b_min.jpg'),
(107, 'Moriarty The Patriot Vatansever Moriarty 2 Genel Kurukafa Yayinevi Ryosuke Takeuchi 15895987 13 B_mi', 'Athica Yayınları', 'Çizgiroman', 250, 'moriarty-the-patriot-vatansever-moriarty-2-genel-kurukafa-yayinevi-ryosuke-takeuchi-15895987-13-b_min.jpg'),
(108, 'Nana Cilt 1 Nana Marmara Cizgi 1696 85 B_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 150, 'nana-cilt-1-nana-marmara-cizgi-1696-85-b_min.jpg'),
(109, 'Naruto 26 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 270, 'naruto-26.jpg'),
(110, 'Naruto 42 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'naruto-42.jpg'),
(111, 'Naruto 43 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 130, 'naruto-43.jpg'),
(112, 'Naruto 44 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 230, 'naruto-44.jpg'),
(113, 'Naruto 53 Cilt', 'Athica Yayınları', 'Çizgiroman', 140, 'naruto-53.jpg'),
(114, 'Naruto 54 Cilt', 'Komik Şeyler', 'Çizgiroman', 300, 'naruto-54.jpg'),
(115, 'Naruto 55 Cilt', 'Kayıp Kıta', 'Çizgiroman', 220, 'naruto-55.jpg'),
(116, 'Naruto1 Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'naruto1.jpg'),
(117, 'Naruto3 Cilt', 'Kayıp Kıta', 'Çizgiroman', 240, 'naruto3.jpg'),
(118, 'Nier 3 On 01_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'nier-3-on-01_min.jpg'),
(119, 'Noragami 10 On Cilt', 'Akılçelen Yayın', 'Çizgiroman', 250, 'noragami-10-on.jpg'),
(120, 'Noragami 12 Cilt', 'Kayıp Kıta', 'Çizgiroman', 170, 'noragami-12.jpg'),
(121, 'Noragami 13 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 210, 'noragami-13.jpg'),
(122, 'Noragami 14 Cilt', 'Kayıp Kıta', 'Çizgiroman', 140, 'noragami-14.jpg'),
(123, 'Noragami 21 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 280, 'noragami-21.jpg'),
(124, 'Noragami 22 Cilt', 'Kayıp Kıta', 'Çizgiroman', 210, 'noragami-22.jpg'),
(125, 'Noragami 23 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 270, 'noragami-23.jpg'),
(126, 'Noragami 3 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'noragami-3.jpg'),
(127, 'Oldboy', 'Gerekli Şeyler', 'Çizgiroman', 180, 'oldboy.jpg'),
(128, 'One Piece 42 Cilt', 'Athica Yayınları', 'Çizgiroman', 190, 'one-piece-42.jpg'),
(129, 'One Piece 43 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'one-piece-43.jpg'),
(130, 'One Piece 44 Cilt', 'Athica Yayınları', 'Çizgiroman', 260, 'one-piece-44.jpg'),
(131, 'One Piece 45 Cilt', 'Komik Şeyler', 'Çizgiroman', 280, 'one-piece-45.jpg'),
(132, 'One Piece 53 Cilt', 'Athica Yayınları', 'Çizgiroman', 270, 'one-piece-53.jpg'),
(133, 'One Piece 54 Cilt', 'Komik Şeyler', 'Çizgiroman', 180, 'one-piece-54.jpg'),
(134, 'Opucukyalani_min', 'Gerekli Şeyler', 'Çizgiroman', 190, 'opucukyalani_min.jpg'),
(135, 'Osi No Ko 4 Cilt', 'Athica Yayınları', 'Çizgiroman', 270, 'osi-no-ko-4.jpg'),
(136, 'Osi No Ko 5 Render_min Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'osi-no-ko-5-render_min.jpg'),
(137, 'Osi No Ko 5 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 200, 'osi-no-ko-5.jpg'),
(138, 'Oyuncak Bebek Sevgilim 6 Cilt', 'Athica Yayınları', 'Çizgiroman', 150, 'oyuncak-bebek-sevgilim-6.jpg'),
(139, 'Oyuncak Bebek Sevgilim 7 Cilt', 'Athica Yayınları', 'Çizgiroman', 170, 'oyuncak-bebek-sevgilim-7.jpg'),
(140, 'Parazit 3_min Cilt', 'Athica Yayınları', 'Çizgiroman', 280, 'parazit-3_min.jpg'),
(141, 'Parazit_min', 'Gerekli Şeyler', 'Çizgiroman', 270, 'parazit_min.jpg'),
(142, 'Pr_01_2953_min Cilt', 'Komik Şeyler', 'Çizgiroman', 190, 'pr_01_2953_min.jpg'),
(143, 'Pr_01_2954_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 250, 'pr_01_2954_min.jpg'),
(144, 'Pr_01_327_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 240, 'pr_01_327_min.jpg'),
(145, 'Pr_01_686_min Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'pr_01_686_min.jpg'),
(146, 'Pr_01_690_min Cilt', 'Kayıp Kıta', 'Çizgiroman', 120, 'pr_01_690_min.jpg'),
(147, 'Renksizuc_min', 'Akılçelen Yayın', 'Çizgiroman', 230, 'renksizuc_min.jpg'),
(148, 'Sahiringelini_min', 'Gerekli Şeyler', 'Çizgiroman', 140, 'sahiringelini_min.jpg'),
(149, 'Sakamoto Days Sakamoto Gunleri 1733b20062664de2a9ae4c392b84ee33d_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 300, 'sakamoto-days-sakamoto-gunleri-1733b20062664de2a9ae4c392b84ee33d_min.jpg'),
(150, 'Sakamoto Days Sakamoto Gunleri 2 Manga Kurukafa Yayinevi Yuto Suzuki 15895971 13 B_min Cilt', 'Komik Şeyler', 'Çizgiroman', 290, 'sakamoto-days-sakamoto-gunleri-2-manga-kurukafa-yayinevi-yuto-suzuki-15895971-13-b_min.jpg'),
(151, 'Seninle Bir Iklim 1 Cilt', 'Athica Yayınları', 'Çizgiroman', 260, 'seninle-bir-iklim-1.jpg'),
(152, 'Seraph Of The End 29 Kiyamet Melegi Cilt 29 Cizgi Roman Kurukafa Yayinevi Takaya Kagami 6531014 12 B', 'Kayıp Kıta', 'Çizgiroman', 240, 'seraph-of-the-end-29-kiyamet-melegi-cilt-29-cizgi-roman-kurukafa-yayinevi-takaya-kagami-6531014-12-b_min.jpg'),
(153, 'Sihirlikizsitesi_min', 'Gerekli Şeyler', 'Çizgiroman', 190, 'sihirlikizsitesi_min.jpg'),
(154, 'Slime Olarak Reenkarne Oldugum Zaman 6 Manga Akilcelen Kitaplar Fuse 15916990 13 B_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 160, 'slime-olarak-reenkarne-oldugum-zaman-6-manga-akilcelen-kitaplar-fuse-15916990-13-b_min.jpg'),
(155, 'Sonada', 'Komik Şeyler', 'Çizgiroman', 190, 'sonada.jpg'),
(156, 'Spy X 8 Cilt', 'Komik Şeyler', 'Çizgiroman', 230, 'spy-x-8.jpg'),
(157, 'Spy X Family 5 Cilt', 'Athica Yayınları', 'Çizgiroman', 210, 'spy-x-family-5.jpg'),
(158, 'Spy X Family 7 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 160, 'spy-x-family-7.jpg'),
(159, 'Suikast Sinifi 1 Cilt Cilt', 'Athica Yayınları', 'Çizgiroman', 300, 'suikast-sinifi-1-cilt.jpg'),
(160, 'Suikast Sinifi 16 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'suikast-sinifi-16.jpg'),
(161, 'Suikast Sinifi 17 Cilt', 'Komik Şeyler', 'Çizgiroman', 300, 'suikast-sinifi-17.jpg'),
(162, 'Suikast Sinifi 18 Kapak Render_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 240, 'suikast-sinifi-18-kapak-render_min.jpg'),
(163, 'Suikast Sinifi 19 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 190, 'suikast-sinifi-19.jpg'),
(164, 'Suikast Sinifi 20 Cilt', 'Kayıp Kıta', 'Çizgiroman', 180, 'suikast-sinifi-20.jpg'),
(165, 'Thumbnail Kara Kahya 19 Cilt', 'Kayıp Kıta', 'Çizgiroman', 270, 'thumbnail-kara-kahya-19.jpg'),
(166, 'Titana Saldiri 26 Cilt', 'Athica Yayınları', 'Çizgiroman', 280, 'titana-saldiri-26.jpg'),
(167, 'Titana Saldiri 27 Cilt', 'Kayıp Kıta', 'Çizgiroman', 120, 'titana-saldiri-27.jpg'),
(168, 'Titana Saldiri 28 Cilt', 'Kayıp Kıta', 'Çizgiroman', 170, 'titana-saldiri-28.jpg'),
(169, 'Tokyo Gu L 4 Cilt', 'Athica Yayınları', 'Çizgiroman', 250, 'tokyo-gu-l-4.jpg'),
(170, 'Tokyo Gul 2 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 190, 'tokyo-gul-2.jpg'),
(171, 'Tokyo Gul 5 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 210, 'tokyo-gul-5.jpg'),
(172, 'Tokyo Gul Re 10 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 300, 'tokyo-gul-re-10.jpg'),
(173, 'Tokyo Gul Re 11 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 190, 'tokyo-gul-re-11.jpg'),
(174, 'Tokyo Gul Re 12 Cilt', 'Komik Şeyler', 'Çizgiroman', 240, 'tokyo-gul-re-12.jpg'),
(175, 'Tokyo Gul Re 13 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 300, 'tokyo-gul-re-13.jpg'),
(176, 'Tokyo Gul Re 14 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 270, 'tokyo-gul-re-14.jpg'),
(177, 'Tokyo Gul Re 8 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 210, 'tokyo-gul-re-8.jpg'),
(178, 'Tokyo Gul Re 9 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 290, 'tokyo-gul-re-9.jpg'),
(179, 'Tokyo Revengers 10 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'tokyo-revengers-10.jpg'),
(180, 'Tokyo Revengers 11 Kkapak_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 140, 'tokyo-revengers-11-kkapak_min.jpg'),
(181, 'Tokyo Revengers 12 Cilt', 'Komik Şeyler', 'Çizgiroman', 120, 'tokyo-revengers-12.jpg'),
(182, 'Tomie 1 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 200, 'tomie-1.jpg'),
(183, 'Tomie 2 Cilt', 'Komik Şeyler', 'Çizgiroman', 150, 'tomie-2.jpg'),
(184, 'Tuvalet Hayaleti Hanako Kun 6 Cilt', 'Komik Şeyler', 'Çizgiroman', 200, 'tuvalet-hayaleti-hanako-kun-6.jpg'),
(185, 'Tuvalet Hayaleti Hanako Kun 7 Cilt', 'Athica Yayınları', 'Çizgiroman', 120, 'tuvalet-hayaleti-hanako-kun-7.jpg'),
(186, 'Tuvalet Hayaleti Hanako Kun 8 Render_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 280, 'tuvalet-hayaleti-hanako-kun-8-render_min.jpg'),
(187, 'Uzumaki 2 Cilt', 'Kayıp Kıta', 'Çizgiroman', 270, 'uzumaki-2.jpg'),
(188, 'Vadedilmis Yokyer 14 Cilt', 'Kayıp Kıta', 'Çizgiroman', 260, 'vadedilmis-yokyer-14.jpg'),
(189, 'Vadedilmis Yokyer 15 Cilt', 'Komik Şeyler', 'Çizgiroman', 140, 'vadedilmis-yokyer-15.jpg'),
(190, 'Vadedilmis Yokyer 16 Cilt', 'Komik Şeyler', 'Çizgiroman', 130, 'vadedilmis-yokyer-16.jpg'),
(191, 'Vadedilmis Yokyer 2 Cilt', 'Kayıp Kıta', 'Çizgiroman', 250, 'vadedilmis-yokyer-2.jpg'),
(192, 'Vadedilmis Yokyer 3 Cilt', 'Komik Şeyler', 'Çizgiroman', 290, 'vadedilmis-yokyer-3.jpg'),
(193, 'Wotakoi 1 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 220, 'wotakoi-1.jpg'),
(194, 'Wotakoi 2 Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'wotakoi-2.jpg'),
(195, 'Wotakoi 3 Cilt', 'Gerekli Şeyler', 'Çizgiroman', 130, 'wotakoi-3.jpg'),
(196, 'Wotakoi 4 Cilt', 'Kayıp Kıta', 'Çizgiroman', 190, 'wotakoi-4.jpg'),
(197, 'Yedi Olumcul Gunah 14 Cilt', 'Komik Şeyler', 'Çizgiroman', 280, 'yedi-olumcul-gunah-14.jpg'),
(198, 'Yedi Olumcul Gunah 15 Cilt', 'Komik Şeyler', 'Çizgiroman', 260, 'yedi-olumcul-gunah-15.jpg'),
(199, 'Yedi Olumcul Gunah 16 Cilt', 'Akılçelen Yayın', 'Çizgiroman', 130, 'yedi-olumcul-gunah-16.jpg'),
(200, 'Yedi Olumcul Gunah 17 Cilt', 'Komik Şeyler', 'Çizgiroman', 190, 'yedi-olumcul-gunah-17.jpg'),
(201, 'Yedi Olumcul Gunah Kapak 26_min Cilt', 'Akılçelen Yayın', 'Çizgiroman', 280, 'yedi-olumcul-gunah-kapak-26_min.jpg'),
(202, 'Yeni Baglantilara Yolculuk', 'Akılçelen Yayın', 'Çizgiroman', 130, 'yeni-baglantilara-yolculuk.jpg'),
(203, 'Yenigecit5_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 180, 'yenigecit5_min.webp'),
(204, 'Yenigecit_min', 'Athica Yayınları', 'Çizgiroman', 290, 'yenigecit_min.jpg'),
(205, 'Yine Ayni Ruyayi Gordum', 'Akılçelen Yayın', 'Çizgiroman', 210, 'yine-ayni-ruyayi-gordum.jpg'),
(206, 'Yumivekurumi_min', 'Gerekli Şeyler', 'Çizgiroman', 190, 'yumivekurumi_min.jpg'),
(207, 'Zuleyhanin Dunyasi 13634908 87 B_min Cilt', 'Gerekli Şeyler', 'Çizgiroman', 130, 'zuleyhanin-dunyasi-13634908-87-b_min.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
