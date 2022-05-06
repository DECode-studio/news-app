-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2022 pada 09.33
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_news`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_article`
--

CREATE TABLE `tbl_article` (
  `article_id` varchar(255) NOT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `article_author` varchar(255) DEFAULT NULL,
  `article_time` timestamp(6) NULL DEFAULT NULL,
  `article_body` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` varchar(255) NOT NULL,
  `comment_body` varchar(255) DEFAULT NULL,
  `comment_time` timestamp(6) NULL DEFAULT NULL,
  `article_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_curiculum`
--

CREATE TABLE `tbl_curiculum` (
  `curiculum_id` varchar(255) NOT NULL,
  `curiculum_name` varchar(255) DEFAULT NULL,
  `curiculum_sks` int(255) DEFAULT NULL,
  `lecture_id` varchar(255) DEFAULT NULL,
  `lecture_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` varchar(255) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_time` timestamp(6) NULL DEFAULT NULL,
  `event_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_images`
--

CREATE TABLE `tbl_images` (
  `image_id` varchar(255) NOT NULL,
  `image_file` longblob DEFAULT NULL,
  `data_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lecture`
--

CREATE TABLE `tbl_lecture` (
  `lecture_id` varchar(255) NOT NULL,
  `lecture_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `article_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_category` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_category`, `user_password`) VALUES
('N91qRm2it3hlLPNhvoYT0aIKfzx1', 'The Tormentor', 'tormentor@gmail.com', 'admin', 'kuplay123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indeks untuk tabel `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indeks untuk tabel `tbl_curiculum`
--
ALTER TABLE `tbl_curiculum`
  ADD PRIMARY KEY (`curiculum_id`);

--
-- Indeks untuk tabel `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indeks untuk tabel `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indeks untuk tabel `tbl_lecture`
--
ALTER TABLE `tbl_lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indeks untuk tabel `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
