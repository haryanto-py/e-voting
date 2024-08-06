-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 12:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `calo_id` int(11) NOT NULL,
  `calo_nama` varchar(70) NOT NULL,
  `calo_visi` text NOT NULL,
  `calo_misi` text NOT NULL,
  `calo_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`calo_id`, `calo_nama`, `calo_visi`, `calo_misi`, `calo_gambar`) VALUES
(1, 'Feri Ilham\r\n', 'Menjadi pemimpin yang inspiratif dan membangun komunitas yang kuat\n', '1. Meningkatkan Kesejahteraan anggota, saya akan berusaha untuk memastikan bahwa setiap anggota angkatan merasa didukung dan dihargai <br>\n2. Mendorong Kolaborasi dan Solidaritas, saya akan bekerja keras untuk membangun ikatan yang kuat antara anggota angkatan. Saya akan mengorganisir acara acara sosial dan kegiatan kolaboratif untuk rasa solidaritas di antara kami, seperti kegiatan makrab, kumpulan angkatan rutin, dll<br>\n3. Menjaga komunikasi terbuka, Saya akan mendukung komunikasi terbuka antara semua anggota. Saya akan mendengarkan masukan, saran, dan masalah yang dihadapi anggota angkatan, dan berupaya mencari solusi yang memadai<br>\n', 'feri.jpg'),
(2, 'Gavel Rizky Atallah', 'Meningkatkan ketakwaan terhadap Tuhan Yang Maha Esa\nMenjadi pemimpin yang sebaik-baiknya dan Meningkatkan sikap solidaritas bagi angkatan teknik komputer 2023\n', '1. Merangkul semua teman tanpa membeda bedakan suku, ras, agama dan antargolongan <br>\n2. Menampung setiap saran, keluhan, dan bersikap terbuka kepada teman teman <br>\n3. Melaksanakan pertemuan angkatan sesuai program yang disetujui teman teman <br>\n4. Menjaga nama baik angkatan <br>\n', 'gavel.jpg'),
(3, 'R. Muhammad Nadzriel', 'Menjadikan mahasiswa tekkom 23 yang menjunjung solidaritas dan kekeluargaan\n', '1. Meningkatkan solidaritas dan kekeluargaan dengan membuat kegiatan di dalam maupun luar kampus <br>\n2. Menampung seluruh saran dan kritik yang membangun untuk kemajuan angkatan <br>', 'nad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `pese_id` int(11) NOT NULL,
  `pese_nim` varchar(8) NOT NULL,
  `pese_nama` varchar(70) NOT NULL,
  `pese_nomor` varchar(15) NOT NULL,
  `pese_email` varchar(70) NOT NULL,
  `pese_token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`pese_id`, `pese_nim`, `pese_nama`, `pese_nomor`, `pese_email`, `pese_token`) VALUES
(5, '2304673', 'Rhyno Fairuz Melin', '8801807394', 'rhynofm@upi.edu', 'ks7vq'),
(6, '2305223', 'Ammar Wijaksono Saputra', '82116478232', 'ammarsaputra77@upi.edu', 'ivbov'),
(7, '2304945', 'Haikal Putra Gustiansyah', '89656004907', 'haikal.putra.gustiansyah@upi.edu', 'lw7xc'),
(8, '2303715', 'Aigha Soraya Akmal', '82289212989', 'aighasorayaakmal21@upi.edu', '5rsie'),
(9, '2311515', 'Andreas Parlin Roberto Sihombing', '89520545552', 'andreassihombing1745@upi.edu', 'skdxp'),
(10, '2307027', 'Muhammad Nasyih Ulwan', '89604129300', 'nasyihulwan@upi.edu', 'lj089'),
(11, '2301810', 'Raras Noviana Putri', '85776916417', 'rarasputri55@upi.edu', '06mgf'),
(12, '2300222', 'Rifki Rochiman', '85871217027', 'rifkirochiman22@upi.edu', 'it2lr'),
(13, '2308821', 'Salman Al Ansory', '87822827172', 'salmanal@upi.edu', 'zlsd8'),
(14, '2304443', 'Rd. Tatimmussa\'adah', '89656605740', 'timitati@upi.edu', 'cr50r'),
(15, '2311863', 'Fakhril Ramdhan Mahmoeddin', '85559424657', 'fakhrilramdhan2004@upi.edu', '81voc'),
(16, '2310159', 'Andika Dwi Januar', '895385769517', 'andikadj240105@upi.edu', 'wnxfa'),
(17, '2309220', 'Muhamad Davin Akbar Firdaus', '81779217006', 'muhamaddavin52@upi.edu', 'rkfyu'),
(18, '2305755', 'Muhammad Gading Alfarizi', '87881404663', 'gadingalfarizi23@upi.edu', 'eqgj8'),
(19, '2304653', 'Nabila Aulia Lailita', '81214612833', 'nabila.aul@upi.edu', '1ppd2'),
(20, '2305991', 'Crist Evan Lamhot Turnip', '81313975003', 'cristevanlamhotturnip@upi.edu', 'ht605'),
(21, '2305943', 'Chandra Supriatna', '895369720499', 'chandsupriatna@upi.edu', 'rlwk0'),
(22, '2300926', 'Alya Putri Ardani', '82279351020', 'putriardanialya@upi.edu', '3ms13'),
(23, '2305256', 'Darrell Hammam Luthfiadi', '81218756908', 'darrellhluthfiadi@upi.edu', 'wqnk4'),
(24, '2309248', 'Duha Naufal Zacky', '85922118501', 'duhazacky@upi.edu', 'tjwas'),
(25, '2308944', 'Mufti Malik Falhadi', '89508711366', 'muftimalikfalhadi@upi.edu', 'kfbsv'),
(26, '2301186', 'Putri Varizza Aulia', '87783914553', 'varizzaputri@upi.edu', '58ox6'),
(27, '2304255', 'Mohammad Gavin Danova', '89637370907', 'gavindanova@upi.edu', '5y7xk'),
(28, '2309188', 'Sulthan Ariq Haikal', '81282082903', 'sulthanariqhaikal123@upi.edu', 'in85a'),
(29, '2306853', 'Nur Adi Supriyantomo', '0858-9435-8661', 'adinuradiyy@upi.edu', 'jc25d'),
(30, '2304434', 'Muhamad Fattan Al Farisi', '81991383702', 'muhfattan24@upi.edu', 'jlvav'),
(31, '2301425', 'Subhan Alief Putra Firdaus', '81222299573', 'subhanaliefpf95@upi.edu', 'g9z20'),
(32, '2300785', 'Raden Farhan Rizki Septrian', '8996900586', 'rfarhanrs04@upi.edu', 'm3v17'),
(33, '2309497', 'Raihan Fajar Ramdani', '85724035600', 'raihanframdani12@upi.edu', 'rgrbp'),
(34, '2311840', 'Annida Khoirul Adilah', '85788972682', 'nidakhra.03@upi.edu', '5uwy6'),
(35, '2310341', 'Mohammad Ihsan Nurdin', '83101180205', 'ihsannurdin2112@upi.edu', '23ah7'),
(36, '2311531', 'Nana sukmana', '8813013392', 'nanasukmana72@upi.edu', 'n53fj'),
(37, '2311885', 'Sabililllah Hadian', '81283105862', 'sabilillah210@upi.edu', 'wd89x'),
(38, '2312273', 'Zihan Adin Fisabilillah', '85773859045', 'zihanadin25@upi.edu', '53yr9'),
(39, '2306144', 'Muhammad Daffa Adika Utama', '81386414411', 'muhammad.daffa1006@upi.edu', 'm7xnw'),
(40, '2311408', 'Feri Ilham', '87843074669', 'veryfied8@upi.edu', 'tl67q'),
(41, '2306988', 'MUHAMMAD ZAKI FADILAH', '89687835576', 'zakifadilah000@upi.edu', 'gjshw'),
(42, '2308645', 'Jauza Yazid Aziz', '89662447827', 'jauzayazid.04@upi.edu', '4956n'),
(43, '2303710', 'SEPHIA SEPTIANI', '81222177060', 'sephiaseptiani4@upi.edu', 'mbxg7'),
(44, '2301340', 'Ayunda Cinta Dinanti', '88802034064', 'ayundacnta@upi.edu', '9glei'),
(45, '2311173', 'Salman Sahid Sabiq', '87742281477', 'sahidsabiq17@upi.edu', 'pmax2'),
(46, '2311479', 'Faishal Ramdani', '81228223756', 'faishalramdani693@upi.edu', 'cz26q'),
(47, '2301212', 'Nabilla Velia Khoirunnisa', '89636653932', 'nabillavelia@upi.edu', 'vwd6g'),
(48, '2308941', 'Jasmine Nur Syamsina', '895389557562', 'Javierexmachina1@upi.edu', '3fzxh'),
(49, '2308475', 'Cahaya Tresna Afra Syaefu', '82118953039', 'cahayatrs128@upi.edu', '32lcv'),
(50, '2300207', 'Azkia Shafanaura Zieandie', '85695180904', 'azkiashfnr@upi.edu', 'sz289'),
(51, '2307316', 'Meisya Siti Rachail', '88218296230', 'meisyasiti.rachail@upi.edu', '6ggjr'),
(52, '2312210', 'Afrizal Habib Al Huda', '81221967457', 'afrizal.habib.alhuda@upi.edu', 'bra1q'),
(53, '2300740', 'Nadhifah nurul safira', '82143542736', 'nadhifahnurul29@upi.edu', 'ssudy'),
(54, '2309421', 'Falih Athofa Ramzar', '87775456634', 'falihar34@upi.edu', 'pi9oq'),
(55, '2310119', 'Adlan Hanif Abdillah', '89646700383', 'adlanhanz2@upi.edu', '8yod2'),
(56, '2309085', 'Muhammad Ilham Iskandar', '82121463916', 'muhammadilhamiskandar1@upi.edu', 'igm45'),
(57, '2312366', 'Syafitra Diwang', '88218163451', 'diwangwww06@upi.edu', '841y4'),
(58, '2310337', 'arcadhia muhamad bintang', '85871781082', 'bintangdut04@upi.edu', 'hjnv2'),
(59, '2304460', 'Putra Indika Malik Hakim', '87721603941', 'dikamatrial76@upi.edu', 'iddd6'),
(60, '2301966', 'Andika Adnan Tamami', '83100508007', 'andikaadnan16@upi.edu', 'sj8pu'),
(61, '2311703', 'Ahmad Zaki Rizqullah', '81220842580', 'ahmadzakirzqllh@upi.edu', 'gi26l'),
(62, '2306277', 'Vania Afiya Riannisa', '81320632163', 'vaniaafiyar@gmail.com', 'jprci'),
(63, '2310085', 'Asyifa Nursyaelani', '83843482327', 'cipaasyifa04@upi.edu', '3mulx'),
(64, '2310514', 'Nazla Nabila Amara Pratama', '82126154131', 'nzlnabila16@upi.edu', 'usrsf'),
(65, '2310876', 'Rifqi Muhammad Dzakwan', '81363219643', 'rifqi.mdz14@upi.edu', 't3gtc'),
(66, '2301991', 'Ikrom Bahari', '83120156505', 'ikrombahari19@upi.edu', '7lk8f'),
(67, '2304683', 'Safrilia Alvi Kartika', '81215144898', 'safrilialvi@upi.edu', '4q6j4'),
(68, '2312418', 'Dwi Cahyo Mulyo Nugroho', '81318266746', 'dwicahyomn@upi.edu', '32ii8'),
(69, '2301558', 'Fawwaz Zulfa Hadaya', '81818487418', 'fawwazzulfah@upi.edu', '3ldyl'),
(70, '2300811', 'Muhamad Hata', '8587617253', 'muhamadhata@upi.edu', 'b70dc'),
(71, '2301854', 'Sirilus Daniel Agung Syawang', '85325476237', 'sirilusdaniel@upi.edu', '767uz'),
(72, '2307573', 'Zil Sala Zafira', '82216442079', 'zilsalaz09@upi.edu', 'b9kpc'),
(73, '2310779', 'Arnold Kogoya', '81393907709', 'arnoldkogoya092@gmail.com', 'mkvyb'),
(74, '2307206', 'Ahmad Rafli Ramadhan', '85798656910', 'ahmadrafliramadhan911@upi.edu', 'bn23p'),
(75, '2310030', 'Siti Hajar Lutfiah', '87836667902', 'sitihajar77@upi.edu', 'frv2s'),
(76, '2300479', 'Anindya Nurshadrina Ramadhani', '0896 5247 7241', 'anindyanursha@upi.edu', '9ql8c'),
(77, '2310422', 'Muhammad Fadlan Akbarkusumah', '0888 0186 2181', 'fadlan.akbarkusumah@upi.edu', 'eim7p'),
(78, '2303964', 'Rizqi Tsalats Fauzan', '81413448835', 'rizqitsalatsfauzan@upi.edu', 'bybnx'),
(79, '2304873', 'Deswita Diandra', '81808928200', 'deswitadndr@upi.edu', 'toebo'),
(80, '2301747', 'R. Muhammad Nadzriel Nuryaddin Harjasutisna', '81218515251', 'nadzriel.nuryadin17@upi.edu', 'eullh'),
(81, '2300853', 'Randika Aryasatya Adipermana', '88218270809', 'randikapermana05@upi.edu', 'dl3uw'),
(82, '2311794', 'Rahmat Pratama', '81276809829', 'Rahmatama2461@upi.edu', 'vif0l'),
(83, '2304849', 'Fadli Nur Bahani', '8159730105', 'fadlinurb254@upi.edu', 'y0nxc'),
(84, '2308979', 'Akbar Dwi Herlambang', '82112350263', 'akbar.dwi01@upi.edu', '1uras'),
(85, '2309459', 'Luqman Muhammad Fadhlul Nul Hakim', '882007411338', 'luqmanmfnh@upi.edu', 'ep1xv'),
(86, '2309082', 'Annisa Humaira Putri', '88806349317', 'annisahumairap17@upi.edu', '2h87c'),
(87, '2308012', 'Larasati Azzahra Arief', '89503336434', 'larasatiazzhr@upi.edu', 'fu918'),
(88, '2306893', 'Cindy Maulani', '82318328965', 'cindymaulani15@upi.edu', 'p102k'),
(89, '2304265', 'Muhammad Rifki Fauzaan Setiadi', '87708967966', 'muhammadrifki07@upi.edu', 'd6b8i'),
(90, '2301262', 'Fajar Ramdani', '89663956716', 'framdani220@upi.edu', 'ssfeh'),
(91, '2309379', 'Gavel Rizky Atallah', '8998475581', 'gavelrzky@upi.edu', 'ao233'),
(92, '2300894', 'Muhammad Haidar Kholid', '85703883484', 'haidarkholid@upi.edu', '7dpz4'),
(93, '2301440', 'Nayla Salsabila', '88218068031', 'naylasalsabila37@upi.edu', '7aqp6'),
(94, '2304613', 'Arya Wibawa Atmanegara', '87882166935', 'aryawkwk.1502@upi.edu', '6tyky'),
(95, '2306855', 'Fathan Muhammad Faishal', '85798258274', 'fathanmuhammadf04@upi.edu', 'z9ffm'),
(96, '2307098', 'Muhammad Azzura Al Karazi', '81386059513', 'akmazzura@upi.edu', 'ihy7v');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pilih`
--

CREATE TABLE `peserta_pilih` (
  `pepi_id` int(11) NOT NULL,
  `pepi_pese_nim` varchar(8) NOT NULL,
  `pepi_calo_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_pilih`
--

INSERT INTO `peserta_pilih` (`pepi_id`, `pepi_pese_nim`, `pepi_calo_id`) VALUES
(100, '2304673', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`calo_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`pese_id`);

--
-- Indexes for table `peserta_pilih`
--
ALTER TABLE `peserta_pilih`
  ADD PRIMARY KEY (`pepi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `calo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `pese_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `peserta_pilih`
--
ALTER TABLE `peserta_pilih`
  MODIFY `pepi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
