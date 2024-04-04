-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'test', 'tester@mail.com', 'hello world', '2024-04-04 04:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `username` varchar(255) NOT NULL,
  `gk` int(11) NOT NULL,
  `books` int(11) NOT NULL,
  `film` int(11) NOT NULL,
  `comp` int(11) NOT NULL,
  `sports` int(11) NOT NULL,
  `geo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`username`, `gk`, `books`, `film`, `comp`, `sports`, `geo`) VALUES
('joshtheboss', 120, 70, 60, 50, 100, 90),
('test', 100, 100, 127, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`cat_id`, `cat_name`, `description`) VALUES
(9, 'General Knowledge', 'General Knowledge serves as the cornerstone of our understanding of the world around us. From historical events that shaped civilizations to scientific discoveries that revolutionized our understanding of the universe, a broad knowledge base enriches our lives and fosters curiosity. Whether pondering trivia tidbits or delving into deep insights, embracing General Knowledge opens doors to endless possibilities and lifelong learning.'),
(10, 'Books', 'Books serve as portals to worlds unknown, inviting readers on adventures of the mind and spirit. From timeless classics that have stood the test of time to contemporary works that challenge conventions, literature offers a boundless realm of exploration and insight. Whether escaping into fantastical realms or delving into the depths of human experience, books ignite imaginations and inspire endless possibilities.'),
(11, 'Film', 'The world of film is a captivating tapestry woven with stories that stir the soul and ignite the imagination. From the golden age of Hollywood classics to the cutting-edge special effects of modern blockbusters, cinema has the power to transport us to new worlds and evoke a myriad of emotions. Whether indulging in timeless masterpieces or exploring the latest releases, film enthusiasts find themselves enchanted by the magic of storytelling on the silver screen.'),
(18, 'Computers', 'In the ever-evolving realm of Computer Science, innovation is the cornerstone. From breakthroughs in artificial intelligence to advancements in cybersecurity, the field continually pushes boundaries. Whether delving into algorithms, exploring the intricacies of programming languages, or unraveling the mysteries of quantum computing, Computer Science offers a landscape ripe with possibilities and challenges.'),
(21, 'Sports', 'Sports are more than mere competitions; they are the embodiment of human spirit, perseverance, and camaraderie. From the roar of the crowd in a packed stadium to the thrill of victory on the field, sports captivate hearts and minds around the globe. Whether cheering for beloved teams or engaging in friendly competitions, the world of sports offers a vibrant tapestry of athleticism, passion, and community.'),
(22, 'Geography', 'Geography unveils the intricate tapestry of our planet, from towering mountain ranges to vast oceans and bustling cities. Exploring the diverse landscapes and cultures across continents, geography invites us on a journey of discovery and understanding. Whether marveling at natural wonders or studying the intricate web of human settlements, geography enriches our appreciation of the world we inhabit.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `email`) VALUES
('joshtheboss', 'Pass@123', 'Joshua', 'Ferreira', 'joshua@gmail.com'),
('test', '1', 'tester', 'testing', 'test@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
