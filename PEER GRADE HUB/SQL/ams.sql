CREATE DATABASE IF NOT EXISTS `ams` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ams`;

-- Table structure for table `assi`
DROP TABLE IF EXISTS `assi`;
CREATE TABLE `assi` (
  `aid` BIGINT NOT NULL AUTO_INCREMENT,
  `year` INT(4) NOT NULL,
  `assignment` LONGTEXT NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `record` TEXT NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `assi`
LOCK TABLES `assi` WRITE;
INSERT INTO `assi` VALUES (6, 3, 'practical 5', 'PHP', ',5'),(7, 3, 'Practical 1', 'PHP', ',5'),(8, 3, 'Practical 10', 'PHP', ',5'),(9, 1, 'Hello ', 'CPP', ''), (10, 3, 'Hello ', 'aa', ',5');
UNLOCK TABLES;

-- Table structure for table `s_info`
DROP TABLE IF EXISTS `s_info`;
CREATE TABLE `s_info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `pass` VARCHAR(255) NOT NULL,
  `year` INT(4) NOT NULL,
  `dob` DATE NOT NULL,
  `eno` BIGINT NOT NULL,
  `mono` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `s_info`
LOCK TABLES `s_info` WRITE;
INSERT INTO `s_info` VALUES (5, 'Shinde Ashutosh', 'shindeashutosh534@gmail.com', '1811620079', 3, '2021-05-10', 1811620079, '7972082468'),(6, 'Yash', '123@gmail.com', '1811620071', 3, '2021-06-11', 1811620071, '7879959');
UNLOCK TABLES;

-- Table structure for table `subdetail`
DROP TABLE IF EXISTS `subdetail`;
CREATE TABLE `subdetail` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `aid` INT NOT NULL,
  `u_id` INT NOT NULL,
  `u_name` VARCHAR(100) NOT NULL,
  `time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm` VARCHAR(255) NOT NULL,
  `ext` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Dumping data for table `subdetail`
LOCK TABLES `subdetail` WRITE;
INSERT INTO `subdetail` VALUES (23, 6, 5, 'Shinde Ashutosh', '2021-05-12 11:58:09', 'Hello', 'pdf'), (24, 8, 5, 'Shinde Ashutosh', '2021-06-11 14:47:23', '', 'pdf'), (25, 7, 5, 'Shinde Ashutosh', '2024-05-21 16:52:36', 'Submitted', 'jpg'), (26, 10, 5, 'Shinde Ashutosh', '2024-05-21 16:57:56', 'Submitted', 'pdf');
UNLOCK TABLES;

-- Collecting marks to the table and show it to the student
CREATE TABLE marks (
  mark_id INT AUTO_INCREMENT PRIMARY KEY,
  u_id INT NOT NULL,
  aid INT NOT NULL,
  marks INT
);
