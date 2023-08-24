-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-06-11 17:36
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sample`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comment_free`
--

CREATE TABLE `comment_free` (
  `num` int(11) NOT NULL,
  `post_num` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_id` char(15) DEFAULT NULL,
  `post_name` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `comment_free`
--

INSERT INTO `comment_free` (`num`, `post_num`, `content`, `post_id`, `post_name`) VALUES
(93, 34, 'test', 'test2', '테스트2'),
(96, 34, 'test\r\n', 'test2', '테스트2'),
(97, 34, 'test', 'test2', '테스트2'),
(98, 34, 'test test test test test', 'test2', '테스트2'),
(99, 34, '111', 'test1', '테스트용1'),
(100, 34, '222', 'test1', '테스트용1'),
(101, 34, '333', 'test1', '테스트용1'),
(102, 34, '444', 'test1', '테스트용1'),
(103, 34, '555', 'test1', '테스트용1'),
(104, 34, '666', 'test1', '테스트용1'),
(105, 34, '777', 'test1', '테스트용1'),
(106, 34, '888', 'test1', '테스트용1');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comment_free`
--
ALTER TABLE `comment_free`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment_free`
--
ALTER TABLE `comment_free`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
