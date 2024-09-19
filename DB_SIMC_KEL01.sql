-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 09:35 AM
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
(103, 'Teknologi Aplikasi Web', 'Efisiensi Energi dan Renewable Energy', 'Proses Review', 'Teknologi; Web; App', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 09:59:26'),
(104, 'Teknologi Terbarukan', 'Efisiensi Energi dan Renewable Energy', 'Selesai Review', 'Renewable; Pembaruan; Teknologi', NULL, 1, NULL, 13, 24, 'Sonya Br Sinaga', '2023-02-08 10:03:34'),
(105, 'Teknologi Pangan', 'Efisiensi Energi dan Renewable Energy', 'Proses Review', 'Teknologi; Pangan; Ketahanan Pangan', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:04:28'),
(106, 'Teknologi Seni Rupa', 'Efisiensi Energi dan Renewable Energy', 'Berhasil submit fullpaper', 'Teknologi; Seni; Museum', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:05:17'),
(107, 'Teknologi IoT', 'Efisiensi Energi dan Renewable Energy', 'Perlu kodepaper', 'Teknologi; IoT; Robot', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:06:52'),
(108, 'Banyak Variasi Tulisan', 'Efisiensi Energi dan Renewable Energy', 'Berhasil submit fullpaper', 'Tulisan; Keberagaman; App', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:08:20'),
(109, 'Lorem Ipsum ', 'Efisiensi Energi dan Renewable Energy', 'Berhasil submit fullpaper', 'Lorem; Ipsum; Simply', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:09:38'),
(110, 'Teknologi Web Design', 'Efisiensi Energi dan Renewable Energy', 'Selesai Review', 'Teknologi; Web; Design', '2023-02-09 01:40:00', 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:10:09'),
(111, 'Contrary to popular belief', 'Efisiensi Energi dan Renewable Energy', 'Selesai Review', 'Contrary; popular; belief', '2023-02-09 22:27:00', 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:19:21'),
(112, 'Sometimes on purpose', 'Efisiensi Energi dan Renewable Energy', 'Selesai Review', 'Sometimes; On; Purpose', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-08 10:20:07'),
(113, 'Teknologi Robotic', 'Efisiensi Energi dan Renewable Energy', 'Selesai Review', 'Robotik; Teknologi; Drone', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-09 08:39:42'),
(115, 'Teknologi terbarukan 2', 'Efisiensi Energi dan Renewable Energy', 'Berhasil submit fullpaper', 'teknologi; web; app', NULL, 17, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-09 01:52:02'),
(116, 'Otomatic ', 'Efisiensi Energi dan Renewable Energy', 'Berhasil submit fullpaper', 'Automatic; Warehouse; Vehicle', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-09 03:03:39'),
(117, 'Teknologi terbarukan bngt', 'Efisiensi Energi dan Renewable Energy', 'Proses Review', 'c,d,e', NULL, 1, NULL, 4, 24, 'Sonya Br Sinaga', '2023-02-16 11:38:57'),
(118, 'AAAAAAAAAAAAAAAAAAAAAAAAAAA', 'Efisiensi Energi dan Renewable Energy', 'Berhasil Dikumpulkan', 'AAAAAAAAAAAAAAAA', NULL, 1, NULL, NULL, 24, 'Sonya Br Sinaga', '2023-02-17 05:10:25'),
(119, 'asdsf', 'Efisiensi Energi dan Renewable Energy', 'Perlu kodepaper', 'asff', NULL, 1, NULL, 4, 24, 'asfdfda', '2023-02-19 05:33:48'),
(120, 'qweqweqweqweqwe', 'Efisiensi Energi dan Renewable Energy', 'Perlu kodepaper', 'c; d; e', NULL, 1, NULL, 4, 24, 'aaaaaaaaaaaaaaaaaqweqweqweqwe', '2023-02-19 06:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `detailabstrak`
--

CREATE TABLE `detailabstrak` (
  `IdDetailAbs` int(11) NOT NULL,
  `IdAbstrak` int(11) NOT NULL,
  `abstract` text NOT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `modifieddate` datetime NOT NULL,
  `statusKarya` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailabstrak`
--

INSERT INTO `detailabstrak` (`IdDetailAbs`, `IdAbstrak`, `abstract`, `keterangan`, `modifieddate`, `statusKarya`) VALUES
(146, 103, '<p><strong>Lorem Ipsum </strong>adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi <strong>Lorem Ipsum</strong>.</p>\r\n<p>&nbsp;</p>', NULL, '2023-02-08 09:59:26', NULL),
(147, 104, '<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', NULL, '2023-02-08 10:03:34', NULL),
(148, 105, '<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>', NULL, '2023-02-08 10:04:28', NULL),
(149, 106, '<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', NULL, '2023-02-08 10:05:17', NULL),
(150, 107, '<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', NULL, '2023-02-08 10:06:52', NULL),
(151, 108, '<p>Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yang sebenarnya di internet. Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin, yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk akal. Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan, unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.</p>', NULL, '2023-02-08 10:08:20', NULL),
(152, 109, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2023-02-08 10:09:38', NULL),
(153, 110, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.</p>', NULL, '2023-02-08 10:10:09', NULL),
(154, 111, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.</p>', NULL, '2023-02-08 10:19:21', NULL),
(155, 112, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, '2023-02-08 10:20:07', NULL),
(156, 104, '<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', '<p>Kurang Kompleks</p>', '2023-02-08 10:25:28', 'Ditolak'),
(157, 112, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>Kurang relate dengan topik</p>', '2023-02-08 10:26:12', 'Ditolak'),
(158, 111, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.</p>', '<p>Ini catatan revisi pertama</p>', '2023-02-08 10:27:21', 'Revisi 1'),
(159, 110, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.</p>', '<p>Ini catatan revisi pertama</p>', '2023-02-08 10:27:55', 'Revisi 1'),
(160, 109, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>Bagus Banget</p>', '2023-02-08 10:28:23', 'Diterima'),
(161, 108, '<p>Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yang sebenarnya di internet. Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin, yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk akal. Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan, unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.</p>', '<p>Bagus Banget</p>', '2023-02-08 10:28:45', 'Diterima'),
(162, 107, '<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', '<p>Bagus</p>', '2023-02-08 10:29:20', 'Diterima'),
(163, 106, '<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', '<p>Good</p>', '2023-02-08 10:29:40', 'Diterima'),
(164, 113, '<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>\r\n<p>&nbsp;</p>', NULL, '2023-02-09 08:39:42', NULL),
(167, 115, '<p>asdf</p>', NULL, '2023-02-09 01:52:02', NULL),
(168, 116, '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>&nbsp;</p>', NULL, '2023-02-09 03:03:39', NULL),
(169, 116, '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p><p>&nbsp;</p>', '<p>Bagus</p>', '2023-02-09 03:05:09', 'Diterima'),
(170, 113, '<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p><p>&nbsp;</p>', '<p>GOOD</p>', '2023-02-16 10:34:57', 'Diterima'),
(171, 117, '<p>gh</p>', NULL, '2023-02-16 11:38:57', NULL),
(172, 119, '<p>asdf</p>', '<p>bagus ok</p>', '2023-02-16 11:44:13', 'Diterima'),
(173, 118, '<p>AAAAAAAAAAAAAAA</p>', NULL, '2023-02-17 05:10:25', NULL),
(174, 119, '', NULL, '2023-02-19 05:33:48', NULL),
(175, 119, '', '<p>dfdsfds</p>', '2023-02-19 06:04:06', 'Diterima'),
(176, 120, '<p>qweqweqweqweqweqweqeqwe</p>', NULL, '2023-02-19 06:10:31', NULL),
(177, 120, '<p>qweqweqweqweqweqweqeqwe</p>', '<p>OK BAGUS</p>', '2023-02-19 06:11:23', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `detailauthor`
--

CREATE TABLE `detailauthor` (
  `IdDetailAuthor` int(11) NOT NULL,
  `IdAbstrak` int(11) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
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
(129, 103, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 104, 0, 'Author 1', 'katon@gmail.com', 'Katon Hayu Nugroho', '086789876545', 'Laki-laki', 'Mahasiswa', 'SMA', 'Boyolali', 'Politeknik Astra'),
(131, 105, 5, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 106, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 107, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 108, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 109, 0, 'Author 1', 'katon@gmail.com', 'Katon Hayu Nugroho', '089764837625', 'Laki-laki', 'Mahasiswa', 'SMA', 'Boyolali', 'Politeknik Astra'),
(136, 110, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 111, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 112, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 113, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 115, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 116, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 117, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 118, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 119, NULL, 'Author 1', '', '', '', '', '', '', '', ''),
(146, 120, 7, 'Author 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(45, 'Presentation-1675880294-109-ppt1.ppt', 'Fullpaper-1675880294-109-fpp1.pdf', 'https://youtu.be/xQIEQfYWbT0', NULL, '2023-02-09 01:18:14', NULL, 19),
(46, 'Presentation-1675880734-106-ppt2.pptx', 'Fullpaper-1675880734-106-fpp2.pdf', 'https://youtu.be/xQIEQfYWbT0', NULL, '2023-02-09 01:25:34', NULL, 20),
(47, 'Presentation-1675880294-109-ppt1.ppt', 'Fullpaper-1675880294-109-fpp1.pdf', 'https://youtu.be/xQIEQfYWbT0', 'Diterima', '2023-02-09 01:26:21', '<p>Bagus</p>', 19),
(48, 'Presentation-1675880734-106-ppt2.pptx', 'Fullpaper-1675880734-106-fpp2.pdf', 'https://youtu.be/xQIEQfYWbT0', 'Revisi 1', '2023-02-09 01:26:53', '<p>HALO</p>', 20),
(51, 'Presentation-1675930096-116-ppt17.pptx', 'Fullpaper-1675930096-116-fpp11.pdf', '', NULL, '2023-02-09 03:08:16', NULL, 22),
(52, 'Presentation-1675930096-116-ppt17.pptx', 'Fullpaper-1675930096-116-fpp11.pdf', '', 'Diterima', '2023-02-09 03:08:51', '<p>Bagus</p>', 22),
(53, 'Presentation-1676585988-115-ppt6.pptx', 'Fullpaper-1676585988-115-fpp4.pdf', 'https://youtu.be/xQIEQfYWbT0', NULL, '2023-02-17 05:19:48', NULL, 23),
(54, 'Presentation-1676585988-115-ppt6.pptx', 'Fullpaper-1676585988-115-fpp4.pdf', 'https://youtu.be/xQIEQfYWbT0', 'Diterima', '2023-02-17 05:20:41', '<p>gS</p>', 23),
(55, 'Presentation-1676684500-108-ppt2.pptx', 'Fullpaper-1676684500-108-fpp3.pdf', 'https://youtu.be/xQIEQfYWbT0', NULL, '2023-02-18 08:41:40', NULL, 24);

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
  `kategori` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`IdEvent`, `nameEvent`, `theme`, `topic`, `tanggalAkhir`, `tanggalAwal`, `statusEvent`, `biaya`, `kategori`, `poster`) VALUES
(14, 'SNEEMO 2013', 'Membangun Ekosistem Industri Kreatif Informatika, Teknologi, dan Humaniora yang berkelanjutan dan Berbasis Budaya Nasional', 'Computational', '2013-02-21', '2013-02-07', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675751779-SNEEMO_2013-2013.jpg'),
(15, 'SNEEMO 2014', 'Teknologi Digital dan Media Sosial untuk Pengembangan Riset Inovatif', 'Intelligent System and Application', '2014-03-07', '2014-02-21', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675751864-SNEEMO_2014-2014.jpeg'),
(16, 'SNEEMO 2015', 'Inovasi sistem informasi sebagai elemen dalam meningkatkan daya saing riset dan teknologi', 'Instrumentational And Robotic', '2015-02-14', '2015-02-07', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675751939-SNEEMO_2015-2015.jpeg'),
(17, 'SNEEMO 2016', 'Digital Education Enterpreneurship', 'Sistem Pendukung Keputusan', '2016-02-28', '2016-02-21', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752007-SNEEMO_2016-2016.jpg'),
(18, 'SNEEMO 2017', 'Peran Penting Teknologi Informasi dan Komunikasi di Era Tekonologi Industri 4.0', 'Business Intelligent', '2017-03-14', '2017-03-07', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752072-SNEEMO_2017-2017.jpg'),
(19, 'SNEEMO 2018', 'Era Baru Society 5.0 Siapkah Kita?', 'Network And Security', '2018-03-28', '2018-03-21', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752148-SNEEMO_2018-2018.jpg'),
(20, 'SNEEMOO 2012', 'Metaverse As a Future of Virtual World Technology', 'Virtual Reality and Augmented Reality', '2012-04-11', '2012-04-04', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752205-SNEEMOO_2017-2017.jpg'),
(21, 'SNEEMO 2018', 'Strategi Bisnis Pada Pasar Internasional Di Era Society 5.0', 'Intelligence System And Application', '2018-04-25', '2018-04-18', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752296-SNEEMO_2018-2018.jpg'),
(22, 'SNEEMO 2019', 'Revolusi Industri 4.0 dan Aplikasinya', 'Kecerdasan Buatan dan Implementasinya', '2019-05-08', '2019-05-01', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752387-SNEEMO_2019-2019.jpeg'),
(23, 'SNEEMO 2020', 'Tantangan dan Peluang Digitalisasi Industri dan Penyelarasan Strategi Pendidikan Vokasi', 'Artificial Intelligence & Aplikasinya', '2020-05-22', '2020-05-15', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752473-SNEEMO_2020-2020.jpg'),
(24, 'SNEEMO 2022', 'Memperkuat Riset Terapan Yang Kolaboratif Dalam Menjawab Tantangan Pembangunan Indsutri Yang Berkelanjutan', 'Efisiensi Energi dan Renewable Energy', '2023-02-27', '2023-02-07', 'Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1675752561-SNEEMO_2022-2022.jpg'),
(27, 'SNEEMO 2024', 'DSFSF', 'DFSFFS', '2023-02-18', '2023-02-16', 'Tidak Aktif', '150.000, 300.000', 'Dosen, Mahasiswa', 'Poster-1676563838-SNEEMO_2024-2020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fullpaper`
--

CREATE TABLE `fullpaper` (
  `IdFullpaper` int(11) NOT NULL,
  `statusDistribusiFpp` varchar(30) NOT NULL,
  `deadlineRevisiFpp` datetime DEFAULT NULL,
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

INSERT INTO `fullpaper` (`IdFullpaper`, `statusDistribusiFpp`, `deadlineRevisiFpp`, `submittedby`, `modifiedby`, `reviewedbyFpp`, `IdAbstract`, `kodepaper`, `createddate`) VALUES
(19, 'Selesai Review', NULL, 1, NULL, 4, 109, 'SE22-001', '2023-02-08 10:47:37'),
(20, 'Selesai Review', '2023-02-10 01:26:00', 1, NULL, 4, 106, 'SE23-002', '2023-02-09 01:24:56'),
(22, 'Selesai Review', NULL, 1, NULL, 4, 116, 'SE23-033', '2023-02-09 03:07:42'),
(23, 'Selesai Review', NULL, 17, NULL, 4, 115, 'SE23-035', '2023-02-17 05:18:06'),
(24, 'Proses Review', NULL, 1, NULL, 4, 108, 'SE23-034', '2023-02-18 08:41:02'),
(25, 'Belum mengumpulkan', NULL, 1, NULL, 4, 113, 'SE22-001', '2023-02-18 09:12:43');

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
(105, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Web Design', 'Aktif', 7),
(106, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Aplikasi Web', 'Tidak Aktif', 4),
(107, 'Maaf, abstrak Anda yang berjudul  Teknologi Aplikasi Web  harus  direvisi. Silakan lakukan revisi segera.', 'Tidak Aktif', 1),
(108, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi terbarukan', 'Tidak Aktif', 4),
(109, 'Maaf, abstrak Anda yang berjudul  Teknologi terbarukan  harus  direvisi. Silakan lakukan revisi segera.', 'Tidak Aktif', 1),
(110, 'Maaf, abstrak Anda yang berjudul  Teknologi terbarukan banget  harus  direvisi. Silakan lakukan revisi segera.', 'Tidak Aktif', 1),
(111, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Aplikasi Web', 'Tidak Aktif', 4),
(112, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Terbarukan', 'Aktif', 13),
(113, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Pangan', 'Tidak Aktif', 4),
(114, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Seni Rupa', 'Tidak Aktif', 4),
(115, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi IoT', 'Tidak Aktif', 4),
(116, 'Terdapat abstrak baru yang harus Anda review, dengan judul Banyak Variasi Tulisan', 'Tidak Aktif', 4),
(117, 'Terdapat abstrak baru yang harus Anda review, dengan judul Lorem Ipsum ', 'Tidak Aktif', 4),
(118, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Web Design', 'Tidak Aktif', 4),
(119, 'Terdapat abstrak baru yang harus Anda review, dengan judul Contrary to popular belief', 'Tidak Aktif', 4),
(120, 'Terdapat abstrak baru yang harus Anda review, dengan judul Sometimes on purpose', 'Tidak Aktif', 4),
(121, 'Maaf, abstrak Anda yang berjudul  Teknologi Terbarukan  ditolak.', 'Tidak Aktif', 1),
(122, 'Maaf, abstrak Anda yang berjudul  Sometimes on purpose  ditolak.', 'Tidak Aktif', 1),
(123, 'Maaf, abstrak Anda yang berjudul  Contrary to popular belief  harus  direvisi. Silakan lakukan revisi segera.', 'Tidak Aktif', 1),
(124, 'Maaf, abstrak Anda yang berjudul  Teknologi Web Design  harus  direvisi. Silakan lakukan revisi segera.', 'Tidak Aktif', 1),
(125, 'Selamat, abstrak Anda yang berjudul  Lorem Ipsum  diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(126, 'Selamat, abstrak Anda yang berjudul  Banyak Variasi Tulisan diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(127, 'Selamat, abstrak Anda yang berjudul  Teknologi IoT diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(128, 'Selamat, abstrak Anda yang berjudul  Teknologi Seni Rupa diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(129, 'Maaf, pembayaran untuk abstrak Anda yang berjudul  Teknologi IoT  ditolak. Silakan lakukan pembayaran ulang segera.', 'Tidak Aktif', 1),
(130, 'Maaf, pembayaran untuk abstrak Anda yang berjudul  Teknologi IoT  ditolak. Silakan lakukan pembayaran ulang segera.', 'Tidak Aktif', 1),
(131, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi Robotic', 'Tidak Aktif', 4),
(132, 'Anda terpilih menjadi reviewer', 'Aktif', 13),
(133, 'Terdapat abstrak baru yang harus Anda review, dengan judul Automatic Guided Vehicle', 'Tidak Aktif', 4),
(134, 'Selamat, abstrak Anda yang berjudul  Automatic Guided Vehicle diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(135, 'Anda terpilih menjadi reviewer', 'Aktif', 13),
(136, 'Terdapat abstrak baru yang harus Anda review, dengan judul Otomatic ', 'Aktif', 4),
(137, 'Selamat, abstrak Anda yang berjudul  Otomatic  diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(138, 'Selamat, abstrak Anda yang berjudul  Teknologi Robotic diterima. Silakan lakukan pembayaran.', 'Tidak Aktif', 1),
(139, 'Anda terpilih menjadi reviewer', 'Aktif', 13),
(140, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi terbarukan 2', 'Aktif', 4),
(141, 'Selamat, abstrak Anda yang berjudul  Teknologi terbarukan 2 diterima. Silakan lakukan pembayaran.', 'Aktif', 17),
(142, 'Terdapat abstrak baru yang harus Anda review, dengan judul Teknologi terbarukan bngt', 'Aktif', 4),
(143, 'Terdapat abstrak baru yang harus Anda review, dengan judul asdsf', 'Aktif', 4),
(144, 'Selamat, abstrak Anda yang berjudul  asdsf diterima. Silakan lakukan pembayaran.', 'Aktif', 1),
(145, 'Terdapat abstrak baru yang harus Anda review, dengan judul qweqweqweqweqwe', 'Aktif', 4),
(146, 'Selamat, abstrak Anda yang berjudul  qweqweqweqweqwe diterima. Silakan lakukan pembayaran.', 'Aktif', 1);

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
  `IdUser` int(11) DEFAULT NULL,
  `IdAbstract` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`IdPayment`, `TotalPayment`, `proofOfPayment`, `nameSender`, `accountNumber`, `dateConfirmation`, `kwitansi`, `statusPayment`, `IdUser`, `IdAbstract`, `reason`) VALUES
(20, 150000, 'Payment-1675870441-106-bukti1.png', 'Noviani Putri', '013-009907685678', '2023-02-08 10:34:56', 'Kwitansi-1675870496-20-kwi.pdf', 'Diterima', 6, 106, NULL),
(21, 150000, '', 'Noviani Putri', '013-0087654782', '2023-02-09 01:17:23', '', 'Ditolak', 6, 107, 'Kuranggg valid'),
(23, 150000, 'Payment-1675929988-116-bukti15.jpg', 'Noviani Putri Sugihartanti', '002-1234567', '2023-02-09 03:07:03', 'Kwitansi-1675930023-23-kwi14.pdf', 'Diterima', 6, 116, NULL),
(24, 150000, 'Payment-1675931524-108-bukti8.jpg', 'Noviani Putri Sugihartanti', '016-12345', '2023-02-18 08:38:48', 'Kwitansi-1676684328-24-kwi.pdf', 'Diterima', 6, 108, NULL),
(25, 120000, 'Payment-1676519722-113-bukti1.png', 'Noviani Putri', '013-009905434789', '2023-02-18 09:12:00', 'Kwitansi-1676686320-25-kwi3.pdf', 'Diterima', 6, 113, NULL),
(26, 150000, 'Payment-1676585696-115-bukti1.png', 'Noviani Putri', '014-08976543123', '2023-02-17 05:16:44', 'Kwitansi-1676585804-26-kwi2.pdf', 'Diterima', 6, 115, NULL),
(27, 120000, 'Payment-1676821815-120-bukti1.png', 'Noviani Putri', '013-123434343', '2023-02-19 10:59:52', 'Kwitansi-1676822392-27-kwi4.pdf', 'Diterima', 6, 120, NULL);

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
(12, 2013, 'Membangun Ekosistem Industri Kreatif Informatika, Teknologi Berbasis Budaya Nasional', 'Prosiding-1675753781-pros1.pdf', 14, 5, 'Cover-1675753781-cvr1.jpg'),
(13, 2014, 'Teknologi Digital dan Media Sosial untuk Pengembangan Riset Inovatif yang berkelanjutan', 'Prosiding-1675753809-pros2.pdf', 15, 5, 'Cover-1675753809-cvr2.jpg'),
(14, 2015, 'Inovasi sistem informasi sebagai elemen dalam meningkatkan daya saing riset dan teknologi', 'Prosiding-1675753836-pros3.pdf', 16, 5, 'Cover-1675753836-cvr3.jpg'),
(15, 2016, 'Pembangunan Berkelanjutan Menuju Pencapaian SDGs di Era Tekonologi Industri 4.0', 'Prosiding-1675753878-pros4.pdf', 17, 5, 'Cover-1675753878-cvr4.jpg'),
(16, 2017, 'Peran Penting Teknologi Informasi & Komunikasi di Era Tekonologi Industri 4.0', 'Prosiding-1675753930-pros5.pdf', 18, 5, 'Cover-1675753930-cvr5.jpg'),
(17, 2018, 'Kreatifitas Pustakawan pada Era Digital dalam Menyediakan Sumber Informasi bagi Generasi Digital Native', 'Prosiding-1675753963-pros6.pdf', 19, 5, 'Cover-1675753963-cvr6.png'),
(18, 2019, 'Peran Teknologi Informasi dalam Pengelolaan Sumber Daya Alam Indonesia', 'Prosiding-1675753992-pros7.pdf', 22, 5, 'Cover-1675753992-cvr7.png'),
(19, 2020, 'Tantangan dan Peluang Digitalisasi Industri dan Penyelarasan Strategi Pendidikan Vokasi', 'Prosiding-1675754026-pros8.pdf', 23, 5, 'Cover-1675754026-cvr8.png'),
(20, 2012, 'Peran Digitalisasi Informasi dan Rekayasa Embedded System dalam Peningkatan Teknologi Industri', 'Prosiding-1675754061-pros9.pdf', 20, 5, 'Cover-1675754061-cvr9.jpg'),
(25, 2023, 'Digitalisasi IoT', 'Prosiding-1676821300-pros2.pdf', 24, 5, 'Cover-1676821300-cvr1.jpg');

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
(9, 'Registrasi Seminar', '2023-02-07', '2023-02-09', 24, NULL),
(10, 'Batas Pengumpulan Abstrak', '2023-02-09', '2023-02-09', 24, NULL),
(11, 'Pengumuman Abstrak', '2023-02-10', '2023-02-10', 24, NULL),
(12, 'Pembayaran Terakhir', '2023-02-11', '2023-02-11', 24, NULL),
(13, 'Pelaksanaan Seminar', '2023-02-21', '2023-02-23', 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `namaUser` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
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
(5, 'adityaar@gmail.com', 'Aditya Arya Pratama', 'Admin', '123', 'Dosen', 'S2', 'Bekasi', 'Politeknik Astra', '089768975436', 'Laki-laki', 24),
(6, 'simcpoltekastra@gmail.com', 'Finance', 'Finance', '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'adityaaryapratama13@gmail.com', 'Erwinda Yasytafiya', 'Reviewer', 'erwin12', 'Dosen', 'D3', 'Cimahi', 'Politeknik Astra', '085786364379', 'Perempuan', 0),
(13, 'agistaranti@gmail.com', 'Ranti Agista Putri', 'Peserta', 'ran12345', 'Dosen', 'SMA', 'Jawa Timur', 'Politeknik Astra', '085786364379', 'Perempuan', NULL),
(17, 'axel@gmail.com', 'Axel Fabianto', 'Peserta', 'axe12345', 'Mahasiswa', 'SMA', 'Bekasi', 'Politeknik Astra', '085789695437', 'Laki-laki', NULL),
(19, 'sonyasinaga071003@gmail.com', 'Sonya Br Sinaga', 'Peserta', 'son12345', 'Dosen', 'SMA', 'Duri', 'Politeknik Astra', '085786365439', NULL, NULL);

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
(10, 'zefannyaputribrilliant@gmail.com', 'i/einPhdPvCY67EuzTK47LZc/K0pamx1RMmy22WGKPo='),
(11, 'zefannyaputribrilliant@gmail.com', 'MuNWTyILvHyYunHLeeeHwb3QyF7mG2bq4YEtyEU3qqY='),
(12, 'zefannyaputribrilliant@gmail.com', 'jRWlcDd7sbBF1aJ3d1IKZMgRgE2883379Ch9oD39hZk='),
(13, 'zefannyaputribrilliant@gmail.com', '3qHCCv4ggLPrkypvqp+RdJuLPukdOITez1l4mGzsnlo='),
(14, 'zefannyaputribrilliant@gmail.com', 'oAeBLH1QxVkiT/bM+T6ySpzCyW73cpd6ce45UyoaVIc='),
(15, 'zefannyaputribrilliant@gmail.com', 'TPkVTnMXQBMkH51GZZCjosIfnBjmxazstlD4E5SkE74=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstrak`
--
ALTER TABLE `abstrak`
  ADD PRIMARY KEY (`IdAbstrak`),
  ADD KEY `FK_IDEVENT` (`IdEvent`),
  ADD KEY `FK_SBBY` (`submittedby`),
  ADD KEY `FK_RVWBY` (`reviewedby`),
  ADD KEY `FK_MDFBY` (`modifiedby`);

--
-- Indexes for table `detailabstrak`
--
ALTER TABLE `detailabstrak`
  ADD PRIMARY KEY (`IdDetailAbs`),
  ADD KEY `FK_IDABSD` (`IdAbstrak`);

--
-- Indexes for table `detailauthor`
--
ALTER TABLE `detailauthor`
  ADD PRIMARY KEY (`IdDetailAuthor`);

--
-- Indexes for table `detailfpp`
--
ALTER TABLE `detailfpp`
  ADD PRIMARY KEY (`IdDetailFpp`),
  ADD KEY `FK_IDFPP` (`IdFullpaper`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Indexes for table `fullpaper`
--
ALTER TABLE `fullpaper`
  ADD PRIMARY KEY (`IdFullpaper`),
  ADD KEY `FK_IDABST` (`IdAbstract`),
  ADD KEY `FK_SB` (`submittedby`),
  ADD KEY `FK_RB` (`reviewedbyFpp`),
  ADD KEY `FK_MB` (`modifiedby`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`IdNotif`),
  ADD KEY `FK_USRNTF` (`IdUser`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`IdPayment`),
  ADD KEY `FK_IDABS` (`IdAbstract`),
  ADD KEY `FK_IDUSR` (`IdUser`);

--
-- Indexes for table `prosidingbook`
--
ALTER TABLE `prosidingbook`
  ADD PRIMARY KEY (`IdProsiding`),
  ADD KEY `FK_EVPROS` (`IdEvent`),
  ADD KEY `FK_IDPROS` (`IdUser`);

--
-- Indexes for table `subevent`
--
ALTER TABLE `subevent`
  ADD PRIMARY KEY (`IdSubEvent`),
  ADD KEY `FK_EVNTSUB` (`IdEvent`);

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
  MODIFY `IdAbstrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `detailabstrak`
--
ALTER TABLE `detailabstrak`
  MODIFY `IdDetailAbs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `detailauthor`
--
ALTER TABLE `detailauthor`
  MODIFY `IdDetailAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `detailfpp`
--
ALTER TABLE `detailfpp`
  MODIFY `IdDetailFpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fullpaper`
--
ALTER TABLE `fullpaper`
  MODIFY `IdFullpaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `IdNotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `IdPayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `prosidingbook`
--
ALTER TABLE `prosidingbook`
  MODIFY `IdProsiding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subevent`
--
ALTER TABLE `subevent`
  MODIFY `IdSubEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abstrak`
--
ALTER TABLE `abstrak`
  ADD CONSTRAINT `FK_IDEVENT` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`IdEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MDFBY` FOREIGN KEY (`modifiedby`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RVWBY` FOREIGN KEY (`reviewedby`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SBBY` FOREIGN KEY (`submittedby`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailabstrak`
--
ALTER TABLE `detailabstrak`
  ADD CONSTRAINT `FK_IDABSD` FOREIGN KEY (`IdAbstrak`) REFERENCES `abstrak` (`IdAbstrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailfpp`
--
ALTER TABLE `detailfpp`
  ADD CONSTRAINT `FK_IDFPP` FOREIGN KEY (`IdFullpaper`) REFERENCES `fullpaper` (`IdFullpaper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fullpaper`
--
ALTER TABLE `fullpaper`
  ADD CONSTRAINT `FK_IDABST` FOREIGN KEY (`IdAbstract`) REFERENCES `abstrak` (`IdAbstrak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MB` FOREIGN KEY (`modifiedby`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RB` FOREIGN KEY (`reviewedbyFpp`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SB` FOREIGN KEY (`submittedby`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `FK_USRNTF` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_IDABS` FOREIGN KEY (`IdAbstract`) REFERENCES `abstrak` (`IdAbstrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prosidingbook`
--
ALTER TABLE `prosidingbook`
  ADD CONSTRAINT `FK_EVPROS` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`IdEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IDPROS` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subevent`
--
ALTER TABLE `subevent`
  ADD CONSTRAINT `FK_EVNTSUB` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`IdEvent`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
