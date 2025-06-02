-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 02. čen 2025, 18:41
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_projekt_lt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(1, 2, 39, 'n', '2025-05-26 23:17:50'),
(2, 2, 39, 'xd', '2025-05-26 23:19:45');

-- --------------------------------------------------------

--
-- Struktura tabulky `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Co je to Smart City?', NULL, '2022-12-31 23:00:00', NULL, 0),
(2, 'Technologie chytrých měst', NULL, '2023-03-11 23:00:00', NULL, 0),
(3, 'Životní prostředí', NULL, '2023-04-22 22:00:00', NULL, 0),
(4, 'Projekty chytrých měst po celém světě', NULL, '2023-06-01 22:00:00', NULL, 0),
(5, 'The Line', NULL, '2023-08-23 22:00:00', NULL, 0),
(7, 'Nový post', 'post post', '2025-05-26 13:25:32', NULL, 36),
(8, 'druhy', 'dva dva', '2025-05-26 13:27:52', NULL, 36),
(9, 'treti', 'ddd', '2025-05-26 13:29:27', NULL, 37);

-- --------------------------------------------------------

--
-- Struktura tabulky `blog_users`
--

CREATE TABLE `blog_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `blog_users`
--

INSERT INTO `blog_users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
(35, 'admin', 'admin', 'admin', 'admin@tul.cz', 'hashed_password', 'admin', '2025-05-25 17:11:53'),
(37, 'domin.kov', NULL, NULL, 'dov.dd@tul.cz', '$2y$10$8beLgYkceWFZ7n.z.InNr..JIhWB5jZfPSRNDkAClUY6Pa9OGTthW', 'user', '2025-05-26 13:29:07'),
(39, 'jan.noc', NULL, NULL, 'ddd@tul.cz', '$2y$10$/itCKAESY3kBgFXN0BaGMe/ciRVxzZ1QpcPghUekYjZiJMGiAPP7e', 'user', '2025-05-26 20:28:49'),
(40, 'novy', NULL, NULL, 'n@tul.cz', '$2y$10$2v2jQdrkX0VDCVznKROJF.ZqiZsgG4fMr7UX6PHUYlGI85bVZcKAO', 'user', '2025-05-26 21:57:16'),
(42, 'jana.nova', NULL, NULL, 'nov@tul.cz', '$2y$10$xRKferdF3/QcJb4XYajGgOOPcP/CdrBndDQ2.WYUBngg8gnawBQ7u', 'user', '2025-05-27 15:34:06'),
(43, 'uzivatel2', NULL, NULL, 'dva@tul.cz', '$2y$10$G93vE4r2eEWx.XiN2Mo3J.Fq5qjl7M8jUckORt59XqUTQwN5Mk7ZS', 'user', '2025-05-27 16:10:59'),
(44, 'admin2', NULL, NULL, 'admin@urbantech.cz', '$2y$10$ZY7hAQoMnhOMBRa4KNNEweplQZlIdq2mTCoMxM0FZqY8tr.xDGJ02', 'admin', '2025-05-27 16:36:59'),
(45, 'admin3', NULL, NULL, '', 'fff...DDD8', 'admin', '2025-05-27 20:45:48'),
(47, 'admin4', NULL, NULL, 'ssss@tul.cz', '$2y$10$abc12345dummypasswordhashetcetcetc', 'admin', '2025-05-27 20:48:32'),
(48, 'admin.', NULL, NULL, 'admin.@tul.cz', '$2y$10$xrHjm0g2R9gF/GYblYuyiOUVCh/HZ8Jz20cv5yT.cwKB/FjeMRYUi', 'user', '2025-05-27 20:56:09'),
(49, '.admin', NULL, NULL, 'admin@urbantechh.cz', '$2y$10$m.N3j/l4l3bYyMICm63.tutpQdK2JR4apddehe3Pvwez8PnsTfruy', 'admin', '2025-05-27 20:57:52'),
(50, 'admin7', NULL, NULL, 'admin7@urbantech.cz', '$2y$10$lJY6i9gFyHp05M.eR1VfQeuCLcSyiqv.HxX.0HP3ack4bl4dufJpq', 'user', '2025-06-02 16:08:44'),
(51, 'admin8', NULL, NULL, 'admin8@tul.cz', '$2y$10$9KhP8KIMPd7HswZlfYvNlOAYCGyRawJv7.EW0jw4U5R08GwYRRlf6', 'user', '2025-06-02 16:19:54'),
(52, 'admin9', NULL, NULL, 'admin9@tul.cz', '$2y$10$33OYLTHh7ChQDhXmPpdWmOAZZItHiBgbwx9k37gP..B1RlZvvWQY2', 'admin', '2025-06-02 16:21:15');

-- --------------------------------------------------------

--
-- Struktura tabulky `user_posts`
--

CREATE TABLE `user_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pro tabulku `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexy pro tabulku `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pro tabulku `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blog_users` (`id`);

--
-- Omezení pro tabulku `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `blog_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
