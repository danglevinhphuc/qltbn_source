-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 03:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `idborrow` int(20) NOT NULL,
  `username` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `idproject` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idthietbi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaymuon` date NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`idborrow`, `username`, `idproject`, `idthietbi`, `ngaymuon`, `soluong`) VALUES
(4, '123', 'B1400720', 'DI1234', '2017-04-18', 0),
(6, '123', 'B1400718', 'DI1222', '2017-04-18', 0),
(7, '123', 'KPJ', 'DI1222', '2017-04-18', 0),
(8, '123', 'B1400720', 'DI1222', '2017-04-18', 0),
(9, '123', 'B1400720', 'DI1222', '2017-04-18', 0),
(10, 'ABCD', 'B1400720', 'DI123', '2017-04-18', 0),
(11, '0923167654', 'KPJ', 'DI122345', '2017-04-20', 0),
(12, '123', 'B1400720', 'DI1234', '2017-04-22', 0),
(13, '123', 'KPJ', 'DI12', '2017-04-22', 0),
(14, '123', 'KPJ', 'DI123', '2017-04-22', 0),
(15, '123', 'DI1496A1', 'DI122345', '2017-04-22', 0),
(16, '123', 'DI1496A1', 'DI1222', '2017-04-22', 0),
(17, 'abcd', 'B1400720', 'DI1222', '2017-04-23', 0),
(18, 'abcd', 'B1400720', 'DI123', '2017-04-25', 1),
(19, 'b1400718', 'DI1496A1', 'DI123', '2017-04-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `idthietbi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenthietbi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idnsx` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `soluongdamuon` int(10) NOT NULL,
  `soluongconlai` int(10) NOT NULL,
  `mota` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`idthietbi`, `tenthietbi`, `idnsx`, `tinhtrang`, `soluongdamuon`, `soluongconlai`, `mota`, `hinhanh`) VALUES
('DI12', 'USB vi mach', 'IT0147', 'rat tot', 0, 1000, 'DAY LA THIET BI NHUNG 12345', 'cong-usb.jpg'),
('DI1222', 'MAIN', 'B1400', 'rat tot', 0, 100, 'DAY LA THIET BI NHUNG 12345456', 'TS-7250-V2.jpg'),
('DI122345', 'RAM 3G', 'IT0147', 'tốt', 0, 999, 'Không có gì mô tả', 'TS-7250-V2-4.jpg'),
('DI12234544', 'sadasqw', 'IT0147', 'tot', 0, 123123, 'zxczzxcxzc', 'TS-7250-V2-2.jpg'),
('DI123', 'CHIP', 'IT0147', 'rat tot', 1, 9, 'DAY LA THIET BI NHUNG', 'bo-mach.jpg'),
('DI1234', 'Bo mach', 'B1400', 'rat tot', 0, 100, 'DAY LA THIET BI NHUNG 123', 'chip-1-nhan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` int(11) NOT NULL,
  `username` varchar(36) NOT NULL,
  `quyenthietbi` int(1) NOT NULL,
  `quyenduan` int(11) NOT NULL,
  `quyennguoidung` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `username`, `quyenthietbi`, `quyenduan`, `quyennguoidung`) VALUES
(2, 'ABCD', 1, 1, NULL),
(3, '123', 0, 0, NULL),
(4, 'phucdang123', 0, 1, NULL),
(5, 'admin', 2, 2, 2),
(6, '0923167654', 1, 1, 1),
(7, 'B1400718', 0, 0, 1),
(8, '1234', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `idproject` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenproject` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `nguoiphutrach` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ngaybatdau` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `tenproject`, `nguoiphutrach`, `ngaybatdau`) VALUES
('B1400718', 'WEB DEV', 'DANG LE VINH PHUC123', '2017-04-18'),
('B1400720', 'IOT', 'TRAN HUU PHUOC', '2017-04-18'),
('DI1496A1', 'WEB CLASS COVER', 'PHÚC', '2017-04-20'),
('KPJ', 'KPJ', 'Không có người phụ trách', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `idnsx` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tennsx` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachinsx` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mabuudien` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotknganhang` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`idnsx`, `tennsx`, `diachinsx`, `quocgia`, `mabuudien`, `sotknganhang`, `sdt`, `email`) VALUES
('B1400', 'DEL04', 'YOKOHAMA', 'japan', 'qwerty', 'qwery', 2147483647, 'b1400718@gmail.com'),
('BCD', 'asdas', 'weqqw', 'qeqwe', 'DI1496A1', 'DI1469A1', 2147483647, 'phucdang@gmail.com'),
('IT0147', 'Intel', 'New York', 'America', NULL, NULL, 651465651, 'intel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvientrongduan`
--

CREATE TABLE `thanhvientrongduan` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `idproject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thanhvientrongduan`
--

INSERT INTO `thanhvientrongduan` (`id`, `username`, `idproject`) VALUES
(22, '0923167654', 'B1400720'),
(23, '1234', 'B1400720'),
(25, '123', 'B1400720'),
(26, '123', 'DI1496A1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `donvi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trinhdo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `ho`, `ten`, `ngaysinh`, `diachi`, `sdt`, `email`, `donvi`, `trinhdo`) VALUES
('0923167654', '0923167564', 'Phúc', 'Đặng', '2017-04-22', 'chauthanh Hau giang', 923167564, 'phucdangb1400718@gmail.com', 'DI1496A1', 'Học sinh'),
('123', '123', '123', '123', '2017-01-05', '123', 1234567892, '1231@gansds.com', '123', 'thacsi'),
('1234', '1234', '1234', '1234', '2017-12-30', '1234', 1234, '123433324@gmail.com', '1234', 'Học sinh'),
('ABCD', 'ABCD', 'ABCD', 'ABCD', '2017-04-30', 'ABCD', 2147483647, 'abcd@gmail.com', 'ABCD', 'tiensi'),
('admin', 'admin', 'Trần', 'Văn Hoàng', '1980-01-01', 'Đại học Cần Thơ', 1234567890, 'tvhoang@cit.ctu.edu.vn', 'Khoa CNTT&TT', 'Thạc sĩ'),
('B1400718', 'B1400718', 'B1400718', 'B1400718', '2017-04-29', 'B1400718', 1400718, 'B1400718@gmail.com', 'B1400718', 'Giáo sư'),
('phucdang123', '123', '123', '123', '2017-04-20', '123', 1234567890, '123424@gmail.com', '123', 'phogiaosu'),
('prCB123456', 'prCB123456', 'Trương', 'Minh Thái', '1980-01-01', 'Đại học Cần Thơ', 1658475845, 'tmthai@cit.ctu.edu.vn', 'Khoa CNTT&TT', 'Tiến sĩ'),
('svB1400718', '123456789', 'Đặng', 'Lê Vĩnh Phúc', '1996-01-01', 'Đại học Cần Thơ1', 1254785654, 'phucb1400718@student.ctu.edu.vn', 'Khoa CNTT&TT', 'Sinh viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`idborrow`),
  ADD KEY `fk_thuocproject` (`idproject`),
  ADD KEY `fk_muontb` (`idthietbi`),
  ADD KEY `fk_nguoimuon` (`username`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`idthietbi`),
  ADD KEY `fk_thuocnsx` (`idnsx`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`idnsx`);

--
-- Indexes for table `thanhvientrongduan`
--
ALTER TABLE `thanhvientrongduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `idborrow` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `thanhvientrongduan`
--
ALTER TABLE `thanhvientrongduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `fk_muontb` FOREIGN KEY (`idthietbi`) REFERENCES `devices` (`idthietbi`),
  ADD CONSTRAINT `fk_nguoimuon` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `fk_thuocproject` FOREIGN KEY (`idproject`) REFERENCES `project` (`idproject`);

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `fk_thuocnsx` FOREIGN KEY (`idnsx`) REFERENCES `provider` (`idnsx`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
