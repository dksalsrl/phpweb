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
-- 테이블 구조 `board_free`
--

CREATE TABLE `board_free` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(15) NOT NULL,
  `subject` text DEFAULT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board_free`
--

INSERT INTO `board_free` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`) VALUES
(23, 'test1', '테스트용1', '의견나눔 테스트용1', '테스트\r\n\r\n테스트\r\n\r\n테스트\r\n\r\n테스트\r\n\r\n테스트\r\n\r\n테스트', '2023-06-11 (17:13)', 3, '', '', ''),
(24, 'test1', '테스트용1', '의견나눔 테스트용2', '2', '2023-06-11 (17:14)', 3, '', '', ''),
(25, 'test1', '테스트용1', '의견나눔 테스트용3', '3', '2023-06-11 (17:14)', 3, '', '', ''),
(26, 'test1', '테스트용1', '의견나눔 테스트용4', '의견나눔 테스트용4', '2023-06-11 (17:14)', 1, '', '', ''),
(27, 'test1', '테스트용1', '의견나눔 테스트용5', '55', '2023-06-11 (17:14)', 1, '', '', ''),
(28, 'test1', '테스트용1', '의견나눔 테스트6 (수정 테스트)', '66(수정테스트완료)\r\n', '2023-06-11 (17:14)', 13, '', '', ''),
(29, 'test2', '테스트2', '의견나눔 테스트7', '의견나눔 테스트7', '2023-06-11 (17:15)', 0, '', '', ''),
(30, 'test2', '테스트2', '의견나눔 테스트8', '8', '2023-06-11 (17:15)', 0, '', '', ''),
(31, 'test2', '테스트2', '의견나눔 테스트9', '의견나눔 테스트', '2023-06-11 (17:15)', 0, '', '', ''),
(32, 'test2', '테스트2', '의견나눔 테스트10', '10', '2023-06-11 (17:15)', 0, '', '', ''),
(33, 'test2', '테스트2', '의견나눔 파일 테스트', 'test', '2023-06-11 (17:15)', 1, 'test.txt', 'text/plain', '2023_06_11_17_15_39.txt'),
(34, 'test2', '테스트2', '의견나눔 댓글 테스트', 'test', '2023-06-11 (17:15)', 41, '', '', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board_free`
--
ALTER TABLE `board_free`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board_free`
--
ALTER TABLE `board_free`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
