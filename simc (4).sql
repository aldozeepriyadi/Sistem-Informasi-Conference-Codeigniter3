-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simc`
--

-- --------------------------------------------------------

--
-- Table structure for table `abstrak`
--

CREATE TABLE `abstrak` (
  `IdAbstrak` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `statusDistribusi` varchar(25) NOT NULL,
  `KataKunci` varchar(255) NOT NULL,
  `deadlineRevisi` datetime DEFAULT NULL,
  `submittedby` int(11) NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `reviewedby` int(11) DEFAULT NULL,
  `IdEvent` int(11) NOT NULL,
  `presenter` varchar(255) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abstrak`
--

INSERT INTO `abstrak` (`IdAbstrak`, `title`, `topic`, `statusDistribusi`, `KataKunci`, `deadlineRevisi`, `submittedby`, `modifiedby`, `reviewedby`, `IdEvent`, `presenter`, `createddate`) VALUES
(58, 'Teknologi Aplikasi Web', 'Digitalisasi, Web Application', 'Berhasil submit fullpaper', 'teknologi; web; app', '2023-02-02 23:59:00', 1, 1, 4, 6, 'Sonya Br Sinaga', '0000-00-00 00:00:00'),
(59, 'Teknologi terbarukan', 'Digitalisasi, Web Application', 'Selesai Review', 'c; d; e', '0000-00-00 00:00:00', 1, NULL, 4, 6, 'Sonya Br Sinaga', '2023-02-01 10:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `bobotnilai`
--

CREATE TABLE `bobotnilai` (
  `IdBobot` int(11) NOT NULL,
  `assessmentCriteria` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `statusBobot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobotnilai`
--

INSERT INTO `bobotnilai` (`IdBobot`, `assessmentCriteria`, `value`, `statusBobot`) VALUES
(1, 'Kerapihan Penulisan Karya', 10, 'Aktif'),
(2, 'Originalitas Ide', 10, 'Aktif'),
(4, 'Kesesuaian tema', 12, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detailabstrak`
--

CREATE TABLE `detailabstrak` (
  `IdDetailAbs` int(11) NOT NULL,
  `IdAbstrak` int(11) NOT NULL,
  `abstract` varchar(500) NOT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `modifieddate` datetime NOT NULL,
  `statusKarya` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailabstrak`
--

INSERT INTO `detailabstrak` (`IdDetailAbs`, `IdAbstrak`, `abstract`, `keterangan`, `modifieddate`, `statusKarya`) VALUES
(68, 58, '<p>Haloooooo semangat 3 <strong>SKS</strong></p>', NULL, '2023-01-31 08:11:05', NULL),
(69, 58, '<p>Haloooooo semangat 3 <strong>SKS</strong></p>', '<p>abcdef</p>', '2023-02-01 10:03:33', 'Revisi 1'),
(70, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 1</p>', NULL, '2023-02-01 10:07:57', 'Sudah Direvisi (1)'),
(71, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 1</p>', '<p>revisi lagi ya kedua</p>', '2023-02-01 10:12:53', 'Revisi 2'),
(72, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 1</p>', NULL, '2023-02-01 10:13:56', 'Sudah Direvisi (2)'),
(73, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 1</p>', '<p>revisi lagi ya ketiga</p>', '2023-02-01 10:18:02', 'Revisi 3'),
(75, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 3</p>', NULL, '2023-02-01 10:31:11', 'Sudah Direvisi (3)'),
(76, 58, '<p>Haloooooo semangat 3 <strong>SKS </strong>ini file baru rev 3</p>', '<p>Bagus</p>', '2023-02-01 10:36:44', 'Diterima'),
(77, 59, '<p>Halooo nyoba tolak ya</p>', NULL, '2023-02-01 10:38:08', NULL),
(78, 59, '<p>Halooo nyoba tolak ya</p>', '<p>mmmaf kmu jelek</p>', '2023-02-01 10:39:49', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `detailauthor`
--

CREATE TABLE `detailauthor` (
  `IdDetailAuthor` int(11) NOT NULL,
  `IdAbstrak` int(11) DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `jenisAuthor` varchar(20) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `namaUser` varchar(250) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `kategori` varchar(15) DEFAULT NULL,
  `lasteducation` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `instance` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailauthor`
--

INSERT INTO `detailauthor` (`IdDetailAuthor`, `IdAbstrak`, `IdUser`, `jenisAuthor`, `email`, `namaUser`, `phone`, `gender`, `kategori`, `lasteducation`, `address`, `instance`) VALUES
(94, 58, 1, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 58, 0, 'Author 2', 'rafa@gmail.com', 'Rafa Wahida', '08667845465', 'Perempuan', 'Mahasiswa', 'SMA', 'Tangerang', 'Politeknik Astra'),
(96, 58, 0, 'Author 3', 'fikri@gmail.com', 'Fikri Anggara', '08765786437', 'Laki-laki', 'Mahasiswa', 'SMA', 'Jakarta Timur', 'Politeknik Astra'),
(97, 59, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailfpp`
--

CREATE TABLE `detailfpp` (
  `IdDetailFpp` int(11) NOT NULL,
  `PresentationFile` varchar(500) NOT NULL,
  `FullpaperFile` varchar(500) NOT NULL,
  `VideoLink` varchar(500) DEFAULT NULL,
  `statusKaryaFpp` varchar(20) DEFAULT NULL,
  `modifieddateFpp` datetime NOT NULL,
  `keteranganFpp` varchar(500) DEFAULT NULL,
  `IdFullpaper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailfpp`
--

INSERT INTO `detailfpp` (`IdDetailFpp`, `PresentationFile`, `FullpaperFile`, `VideoLink`, `statusKaryaFpp`, `modifieddateFpp`, `keteranganFpp`, `IdFullpaper`) VALUES
(17, 'Presentation-1675229104-58-MTR_RPL_DELIVERABLES_PROJECT.pptx', 'Fullpaper-1675229104-58-PPT_CWMS_KEL03.pdf', '', NULL, '2023-02-01 12:25:04', NULL, 9),
(18, 'Presentation-1675229104-58-MTR_RPL_DELIVERABLES_PROJECT.pptx', 'Fullpaper-1675229104-58-PPT_CWMS_KEL03.pdf', '', 'Revisi 1', '2023-02-01 01:55:25', '<p>YG jelas dong</p>', 9),
(19, 'Presentation-1675234663-9-KEL01_MVC.pptx', 'Fullpaper-1675234663-9-Manajemen-jaringan.pdf', '', 'Sudah Direvisi (1)', '2023-02-01 01:57:43', '<p>YG jelas dong</p>', 9),
(20, 'Presentation-1675234663-9-KEL01_MVC.pptx', 'Fullpaper-1675234663-9-Manajemen-jaringan.pdf', '', 'Diterima', '2023-02-01 01:58:10', '<p>Yey Selamat Diterima</p>', 9);

-- --------------------------------------------------------

--
-- Table structure for table `detailscorefpp`
--

CREATE TABLE `detailscorefpp` (
  `IdDetailScore` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `IdBobot` int(11) NOT NULL,
  `IdFullpaper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `IdEvent` int(11) NOT NULL,
  `nameEvent` varchar(250) NOT NULL,
  `theme` varchar(250) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `tanggalAkhir` date NOT NULL,
  `tanggalAwal` date NOT NULL,
  `statusEvent` varchar(20) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`IdEvent`, `nameEvent`, `theme`, `topic`, `tanggalAkhir`, `tanggalAwal`, `statusEvent`, `biaya`, `kategori`) VALUES
(1, 'SNEMOO 2021', 'Efisiensi Energi untuk Peningkatan Daya Saing Industri Manufaktur & Otomotif Nasional', 'Digitalisasi', '2023-01-31', '2023-01-18', 'Tidak Aktif', '', ''),
(5, 'SNEMOO 2019', 'Vokasi bersama teknologi', 'Teknologi', '2023-01-25', '2023-01-23', 'Tidak Aktif', '150.000, 200.000', 'Dosen, Mahasiswa'),
(6, 'SNEMOO 2023', 'Digitalisasi bersama vokasi', 'Digitalisasi, Web Application', '2023-02-11', '2023-01-31', 'Aktif', '150.000, 200.000', 'Dosen, Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `fullpaper`
--

CREATE TABLE `fullpaper` (
  `IdFullpaper` int(11) NOT NULL,
  `statusDistribusiFpp` varchar(30) NOT NULL,
  `deadlineRevisiFpp` date DEFAULT NULL,
  `totalscore` int(11) DEFAULT NULL,
  `submittedby` int(11) NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `reviewedbyFpp` int(11) NOT NULL,
  `IdAbstract` int(11) NOT NULL,
  `kodepaper` varchar(255) DEFAULT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fullpaper`
--

INSERT INTO `fullpaper` (`IdFullpaper`, `statusDistribusiFpp`, `deadlineRevisiFpp`, `totalscore`, `submittedby`, `modifiedby`, `reviewedbyFpp`, `IdAbstract`, `kodepaper`, `createddate`) VALUES
(9, 'Selesai Review', '2023-02-01', NULL, 1, 1, 4, 58, 'SE23-001', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `IdNotif` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`IdNotif`, `message`, `status`, `IdUser`) VALUES
(34, 'asd', 'Aktif', 4),
(35, 'Maaf, abstrak Anda yang berjudul  Teknologi Aplikasi Web  harus  direvisi. Silakan lakukan revisi segera.', 'Aktif', 1),
(36, 'Maaf, abstrak Anda yang berjudul  Teknologi Aplikasi Web  harus  direvisi. Silakan lakukan revisi segera.', 'Aktif', 1),
(37, 'Maaf, abstrak Anda yang berjudul  Teknologi Aplikasi Web  harus  direvisi. Silakan lakukan revisi segera.', 'Aktif', 1),
(38, 'Selamat, abstrak Anda yang berjudul  Teknologi Aplikasi Web  diterima. Silakan lakukan pembayaran dan mengunggah fullpaper.', 'Aktif', 1),
(39, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi terbarukan', 'Aktif', 4),
(40, 'Maaf, abstrak Anda yang berjudul  Teknologi terbarukan  ditolak.', 'Aktif', 1),
(41, 'Maaf, pembayaran untuk abstrak Anda yang berjudul  Teknologi Aplikasi Web  ditolak. Silakan lakukan pembayaran ulang segera.', 'Aktif', 1),
(42, 'Maaf, pembayaran untuk abstrak Anda yang berjudul  Teknologi Aplikasi Web  ditolak. Silakan lakukan pembayaran ulang segera.', 'Aktif', 1),
(43, 'Maaf, pembayaran untuk abstrak Anda yang berjudul  Teknologi Aplikasi Web  ditolak. Silakan lakukan pembayaran ulang segera.', 'Aktif', 1),
(44, 'asdfg', 'Aktif', 4),
(45, 'asd', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `IdPayment` int(11) NOT NULL,
  `TotalPayment` int(11) NOT NULL,
  `proofOfPayment` varchar(500) NOT NULL,
  `nameSender` varchar(255) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `dateConfirmation` datetime NOT NULL,
  `kwitansi` varchar(255) NOT NULL,
  `statusPayment` varchar(20) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAbstract` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`IdPayment`, `TotalPayment`, `proofOfPayment`, `nameSender`, `accountNumber`, `dateConfirmation`, `kwitansi`, `statusPayment`, `IdUser`, `IdAbstract`, `reason`) VALUES
(7, 120000, 'Payment-1675225709-58-bukti.png', 'Noviani Putri', '009907534977', '2023-02-01 11:54:42', 'Kwitansi-1675227282-7-kwitansi-kosong-3.pdf', 'Diterima', 6, 58, 'ga valid');

-- --------------------------------------------------------

--
-- Table structure for table `prosidingbook`
--

CREATE TABLE `prosidingbook` (
  `IdProsiding` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ProsidingFile` varchar(255) NOT NULL,
  `IdEvent` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `ProsidingImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prosidingbook`
--

INSERT INTO `prosidingbook` (`IdProsiding`, `year`, `title`, `ProsidingFile`, `IdEvent`, `IdUser`, `ProsidingImg`) VALUES
(1, 2023, 'Efisiensi Energi untuk Peningkatan Daya Saing Industri Manufaktur & Otomotif Nasional', 'Prosiding-1674111907-Keamanan-Jaringan.pdf', 1, 5, 'Cover-1674111907-coverprosiding.png'),
(2, 2019, 'Prosidingku', 'Prosiding-1674702873-Surat-Kelompok-2.pdf', 1, 5, 'Cover-1674702873-OIP.jpg'),
(3, 2021, 'Halo', 'Prosiding-1674735326-PPT_KEL03.pdf', 1, 5, 'Cover-1674735326-coverprosiding.png'),
(4, 2020, 'Ini Judul', 'Prosiding-1674737720-Request-API-UPT-MI.pdf', 1, 5, 'Cover-1674737720-cvr1.jpg'),
(5, 2022, 'ini prosiding jg', 'Prosiding-1674737764-PPT_LPPM.pdf', 1, 5, 'Cover-1674737764-cvr2.jpg'),
(6, 2019, 'aasdfdsfdfdfs', 'Prosiding-1674737795-TUGAS-3-JARINGAN-KOMPUTER-(FUNGSI-DHCP)-MUHAMMAD-ARIF-175100040.pdf', 1, 5, 'Cover-1674737795-cvr3.jpg'),
(7, 2019, 'sasdffdfd', 'Prosiding-1674737812-Surat-Kelompok-2.pdf', 1, 5, 'Cover-1674737812-cvr4.jpg'),
(8, 2019, 'gfgddssds', 'Prosiding-1674737843-Manajemen-jaringan.pdf', 1, 5, 'Cover-1674737843-cvr5.jpg'),
(9, 2019, 'fgfgdd', 'Prosiding-1674737877-aaaaaaa.pdf', 1, 5, 'Cover-1674737877-cvr6.png'),
(10, 2022, 'gffdfd', 'Prosiding-1674737903-ProposalBisnis_KEL04.pdf', 1, 5, 'Cover-1674737903-cvr7.png');

-- --------------------------------------------------------

--
-- Table structure for table `subevent`
--

CREATE TABLE `subevent` (
  `IdSubEvent` int(11) NOT NULL,
  `ketegori` varchar(250) NOT NULL,
  `tanggalAwal` date NOT NULL,
  `tanggalAkhir` date NOT NULL,
  `IdEvent` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subevent`
--

INSERT INTO `subevent` (`IdSubEvent`, `ketegori`, `tanggalAwal`, `tanggalAkhir`, `IdEvent`, `status`) VALUES
(2, 'Pengumpulan Fullpaper', '2023-01-20', '2023-01-23', 1, NULL),
(3, 'Pengumpulan Abstrak', '2023-01-19', '2023-01-21', 1, NULL),
(4, 'Conference', '2023-01-20', '2023-01-26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `namaUser` varchar(250) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `password` varchar(8) NOT NULL,
  `kategori` varchar(15) DEFAULT NULL,
  `lasteducation` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `instance` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `IdEvent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `email`, `namaUser`, `role`, `password`, `kategori`, `lasteducation`, `address`, `instance`, `phone`, `gender`, `IdEvent`) VALUES
(1, 'novianiputri30@gmail.com', 'Noviani Putri Sugihartanti', 'Peserta', '123', 'Mahasiswa', 'SMA', 'Pekalongan', 'Politeknik Astra', '085786364379', 'Perempuan', NULL),
(3, 'simcpoltekastra@gmail.com', 'Super Admin', 'Super Admin', '123', 'Dosen', '', NULL, NULL, NULL, NULL, NULL),
(4, 'zefannyaputribrilliant@gmail.com', 'Roni Prasetyo', 'Reviewer', '123', 'Dosen', 'S2', 'Boyolali', 'Politeknik Astra', '089768975436', 'Laki-laki', 0),
(5, 'adityaar@gmail.com', 'Aditya Arya Pratama', 'Admin', '123', 'Dosen', 'S2', 'Bekasi', 'Politeknik Astra', '089768975436', 'Laki-laki', 6),
(6, 'simcpoltekastra@gmail.com', 'Finance', 'Finance', '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'adityaaryapratama13@gmail.com', 'Erwinda Yasytafiya', 'Peserta', 'erwin12', 'Mahasiswa', 'D3', 'Cimahi', 'Politeknik Astra', '085786364379', 'Perempuan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`) VALUES
(1, 'novianiputri30@gmail.com', 'nh15AoE/6ZrGKaLZXFKcJAcf2hL/ObVTV0Ce1hfqXTA=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstrak`
--
ALTER TABLE `abstrak`
  ADD PRIMARY KEY (`IdAbstrak`);

--
-- Indexes for table `bobotnilai`
--
ALTER TABLE `bobotnilai`
  ADD PRIMARY KEY (`IdBobot`);

--
-- Indexes for table `detailabstrak`
--
ALTER TABLE `detailabstrak`
  ADD PRIMARY KEY (`IdDetailAbs`);

--
-- Indexes for table `detailauthor`
--
ALTER TABLE `detailauthor`
  ADD PRIMARY KEY (`IdDetailAuthor`);

--
-- Indexes for table `detailfpp`
--
ALTER TABLE `detailfpp`
  ADD PRIMARY KEY (`IdDetailFpp`);

--
-- Indexes for table `detailscorefpp`
--
ALTER TABLE `detailscorefpp`
  ADD PRIMARY KEY (`IdDetailScore`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Indexes for table `fullpaper`
--
ALTER TABLE `fullpaper`
  ADD PRIMARY KEY (`IdFullpaper`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`IdNotif`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`IdPayment`);

--
-- Indexes for table `prosidingbook`
--
ALTER TABLE `prosidingbook`
  ADD PRIMARY KEY (`IdProsiding`);

--
-- Indexes for table `subevent`
--
ALTER TABLE `subevent`
  ADD PRIMARY KEY (`IdSubEvent`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abstrak`
--
ALTER TABLE `abstrak`
  MODIFY `IdAbstrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `bobotnilai`
--
ALTER TABLE `bobotnilai`
  MODIFY `IdBobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detailabstrak`
--
ALTER TABLE `detailabstrak`
  MODIFY `IdDetailAbs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `detailauthor`
--
ALTER TABLE `detailauthor`
  MODIFY `IdDetailAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `detailfpp`
--
ALTER TABLE `detailfpp`
  MODIFY `IdDetailFpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detailscorefpp`
--
ALTER TABLE `detailscorefpp`
  MODIFY `IdDetailScore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fullpaper`
--
ALTER TABLE `fullpaper`
  MODIFY `IdFullpaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `IdNotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `IdPayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prosidingbook`
--
ALTER TABLE `prosidingbook`
  MODIFY `IdProsiding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subevent`
--
ALTER TABLE `subevent`
  MODIFY `IdSubEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
