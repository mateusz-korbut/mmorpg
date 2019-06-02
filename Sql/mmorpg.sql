CREATE DATABASE mmorpg;

USE mmorpg;

--
-- TABLES CREATE
--

CREATE TABLE `characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `health_points` tinyint(4) NOT NULL DEFAULT '100',
  `coins` mediumint(9) NOT NULL DEFAULT '100',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `daily_stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `registered` int(11) NOT NULL,
  `logged_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `character_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `strength_bonus` tinyint(4) NOT NULL,
  `agility_bonus` tinyint(4) NOT NULL,
  `intelligence_bonus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `race` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `strength` tinyint(4) NOT NULL,
  `agility` tinyint(4) NOT NULL,
  `intelligence` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `statuses` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- INSERT
--

INSERT INTO `race` (`id`, `name`, `strength`, `agility`, `intelligence`) VALUES
(1, 'Human', 4, 2, 6),
(2, 'Elf', 2, 4, 6),
(3, 'Dwarf', 6, 2, 4),
(4, 'Orc', 8, 2, 2);

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'active'),
(2, 'blocked');

INSERT INTO `users` (`id`, `role_id`, `status_id`, `name`, `password`) VALUES
(1, 1, 1, 'admin', '$2y$10$KZkYxSehkO1U1B3K5A0LneoIqKUOALfdkgsbBvSkIQVW/D1GDlrcS');

--
-- INDEX
--

ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `race_id` (`race_id`),
  ADD KEY `creator` (`creator_id`);

ALTER TABLE `daily_stats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data` (`date`);

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `character_id` (`character_id`) USING BTREE;

ALTER TABLE `race`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT
--

ALTER TABLE `characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

ALTER TABLE `daily_stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `race`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `statuses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- CONSTRAINT
--

ALTER TABLE `characters`
  ADD CONSTRAINT `creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `race` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`);

ALTER TABLE `items`
  ADD CONSTRAINT `characterInv` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`);

ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

COMMIT;
