-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 08. čen 2025, 17:54
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
(23, 2, 52, 'Komentář admina (upravený)', '2025-06-08 17:18:35'),
(24, 3, 52, 'Komentář admina', '2025-06-08 17:19:44');

-- --------------------------------------------------------

--
-- Struktura tabulky `blog_prispevky`
--

CREATE TABLE `blog_prispevky` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `blog_prispevky`
--

INSERT INTO `blog_prispevky` (`id`, `title`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
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
(47, 'admin4', NULL, NULL, 'ssss@tul.cz', '$2y$10$abc12345dummypasswordhashetcetcetc', 'admin', '2025-05-27 20:48:32'),
(50, 'admin7', NULL, NULL, 'admin7@urbantech.cz', '$2y$10$lJY6i9gFyHp05M.eR1VfQeuCLcSyiqv.HxX.0HP3ack4bl4dufJpq', 'user', '2025-06-02 16:08:44'),
(51, 'admin8', NULL, NULL, 'admin8@tul.cz', '$2y$10$9KhP8KIMPd7HswZlfYvNlOAYCGyRawJv7.EW0jw4U5R08GwYRRlf6', 'user', '2025-06-02 16:19:54'),
(52, 'admin9', NULL, NULL, 'admin9@tul.cz', '$2y$10$33OYLTHh7ChQDhXmPpdWmOAZZItHiBgbwx9k37gP..B1RlZvvWQY2', 'admin', '2025-06-02 16:21:15'),
(54, 'novyuser', NULL, NULL, 'novyuser@tul.cz', '$2y$10$1zvkKKaXaZbemFnzYp0eOu92yZX8eBvAbuRQNo.VHZ1HFU90UAiEe', 'user', '2025-06-03 15:38:49');

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
-- Vypisuji data pro tabulku `user_posts`
--

INSERT INTO `user_posts` (`id`, `user_id`, `title`, `content`, `image_path`, `created_at`) VALUES
(21, 52, 'Když město začne přemýšlet', 'Někdy si připadám, jako bychom žili v budoucnosti, o které jsme kdysi jen četli. Naše ulice reagují na pohyb, lavičky nabíjejí mobily ze slunce a senzor ví, že koš je plný dřív, než ho zahlédne popelář. Smart city nejsou jen buzzword – jsou to živé systémy, které propojují lidi, data a technologie. A nejlepší na tom? Vše to začíná malými nápady v komunitě. Těmi, co sedí večer u kávy a přemýšlí, jak z města udělat lepší místo k životu.', '../uploads/1749396676_paris-smart-city-2050-0.jpg', '2025-06-08 17:31:16'),
(22, 52, 'Ticho, které šetří elektřinu', 'Když se vypne světlo, které nikdo nepotřebuje. Když přestane běžet čerpadlo, protože déšť to zvládl za něj. Když si město dovolí být chvíli tiché, protože nemusí nic navíc. To je podle mě opravdová udržitelnost – ne zelená barva na papíře, ale tichá rozhodnutí, která se dějí automaticky, protože dáváme pozor.', '../uploads/1749397417_istockphoto-1255236199-612x612.jpg', '2025-06-08 17:43:37'),
(23, 54, 'Nepotřebujeme větší města. Potřebujeme chytřejší!', 'Zástavba roste, lidé přibývají. Ale odpovědí nemusí být další silnice a víc betonu. Možná stačí lépe řídit to, co už máme. Města se nemusí zvětšovat – můžou se zlepšovat. A když vidím, jak někde vznikne chytrá čtvrť, kde i popelnice ví, kdy má dost, říkám si: proč by to nemohlo být i u nás?', '../uploads/1749397657_o3tioqjw.png', '2025-06-08 17:47:37');

-- --------------------------------------------------------

--
-- Struktura tabulky `user_post_comments`
--

CREATE TABLE `user_post_comments` (
  `id` int(11) NOT NULL,
  `user_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `user_post_comments`
--

INSERT INTO `user_post_comments` (`id`, `user_post_id`, `user_id`, `content`, `created_at`) VALUES
(22, 22, 54, 'Komentář uživatele', '2025-06-08 17:44:45'),
(23, 21, 54, 'Komentář uživatele', '2025-06-08 17:45:13');

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
-- Indexy pro tabulku `blog_prispevky`
--
ALTER TABLE `blog_prispevky`
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
-- Indexy pro tabulku `user_post_comments`
--
ALTER TABLE `user_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post_id` (`user_post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pro tabulku `blog_prispevky`
--
ALTER TABLE `blog_prispevky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pro tabulku `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pro tabulku `user_post_comments`
--
ALTER TABLE `user_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_prispevky` (`id`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blog_users` (`id`);

--
-- Omezení pro tabulku `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `blog_users` (`id`);

--
-- Omezení pro tabulku `user_post_comments`
--
ALTER TABLE `user_post_comments`
  ADD CONSTRAINT `user_post_comments_ibfk_1` FOREIGN KEY (`user_post_id`) REFERENCES `user_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blog_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
