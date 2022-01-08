SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE banking_system;

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Arvind', 'sharma@gmail.com', 50000),
(2, 'Jaspreet', 'singh@gmail.com', 30000),
(3, 'Veer', 'shah@gmail.com', 40000),
(4, 'Paritosh', 'chopra@gmail.com', 50000),
(5, 'Rishabh', 'kapoor@gmail.com', 40000),
(6, 'Kabir', 'singh@gmail.com', 30000),
(7, 'Deepika', 'patil@gmail.com', 50000),
(8, 'piyush', 'chawla@gmail.com', 40000),
(9, 'Nikhlesh', 'sharma@gmail.com', 30000),
(10, 'Piyush', 'bhatia@gmail.com', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

