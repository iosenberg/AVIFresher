-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 08:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stevenson`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `Name` text NOT NULL,
  `Soy` int(11) NOT NULL,
  `Dairy` int(11) NOT NULL,
  `Wheat` int(11) NOT NULL,
  `Vegeterian` int(11) NOT NULL,
  `Vegan` int(11) NOT NULL,
  `Egg` int(11) NOT NULL,
  `Fish` int(11) NOT NULL,
  `Peanut` int(11) NOT NULL,
  `Sesame` int(11) NOT NULL,
  `Shellfish` int(11) NOT NULL,
  `Tree Nut` int(11) NOT NULL,
  `Gluten Sensitive` int(11) NOT NULL,
  `Halal` int(11) NOT NULL,
  `Kosher` int(11) NOT NULL,
  `Calories` int(11) NOT NULL,
  `Total Fat` int(11) NOT NULL,
  `Saturated Fat` int(11) NOT NULL,
  `Trans Fat` int(11) NOT NULL,
  `Cholesterol` int(11) NOT NULL,
  `Sodium` int(11) NOT NULL,
  `Total Carbohydrate` int(11) NOT NULL,
  `Dietary Fiber` int(11) NOT NULL,
  `Total Sugar` int(11) NOT NULL,
  `Added Sugar` int(11) NOT NULL,
  `Protein` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`Name`, `Soy`, `Dairy`, `Wheat`, `Vegeterian`, `Vegan`, `Egg`, `Fish`, `Peanut`, `Sesame`, `Shellfish`, `Tree Nut`, `Gluten Sensitive`, `Halal`, `Kosher`, `Calories`, `Total Fat`, `Saturated Fat`, `Trans Fat`, `Cholesterol`, `Sodium`, `Total Carbohydrate`, `Dietary Fiber`, `Total Sugar`, `Added Sugar`, `Protein`) VALUES
('Zucchini Fries', 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 167, 11, 2, 0, 52, 296, 13, 2, 1, 0, 7),
('MTO Omelet Bar', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 665, 51, 16, 0, 608, 1643, 7, 1, 3, 0, 40),
('Fresh Cheese Pizza 16 inch', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 397, 10, 4, 0, 16, 569, 57, 3, 2, 1, 18),
('Fresh Pepperoni Pizza 16inch', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 439, 14, 5, 0, 25, 775, 57, 3, 2, 1, 20),
('Fresh Spicy White Pizza 16 Inch', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 468, 17, 7, 0, 28, 756, 56, 3, 1, 1, 20),
('Tortellini Marinara', 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 715, 22, 11, 0, 84, 1809, 88, 7, 15, 0, 41),
('MTO Deli Bar*', 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 5159, 291, 78, 0, 846, 14559, 404, 27, 43, 16, 217),
('Chaat Salad', 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 521, 28, 3, 0, 10, 638, 61, 10, 24, 13, 9),
('Chickpea Hummus', 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 152, 7, 0, 0, 0, 763, 17, 3, 3, 0, 5),
('Citrus Spices Lentil Salad', 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 67, 4, 1, 0, 0, 594, 7, 2, 0, 0, 2),
('Grilled Warm Pita', 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 433, 33, 3, 0, 0, 392, 31, 2, 0, 0, 6),
('Roasted Tomato Hummus', 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 183, 10, 1, 0, 0, 793, 17, 4, 4, 1, 6),
('Sautéed Bok Choy', 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 84, 7, 1, 0, 0, 92, 5, 2, 2, 0, 2),
('Sweet Sour Tofu', 1, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 292, 12, 2, 0, 0, 313, 40, 4, 27, 23, 10),
('Vegetarian Stir Fried Rice Side', 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 259, 10, 2, 0, 21, 500, 36, 4, 3, 0, 6),
('Potato Leek Soup', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 153, 4, 1, 0, 6, 266, 25, 2, 6, 0, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
