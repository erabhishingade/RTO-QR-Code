-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2021 at 09:56 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tias_srm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(10) NOT NULL,
  `ad_uname` varchar(200) NOT NULL,
  `ad_email` varchar(200) NOT NULL,
  `ad_pass` varchar(200) NOT NULL,
  `ad_flag` bigint(10) NOT NULL,
  `ad_salt` longtext NOT NULL,
  `ad_pin` varchar(200) NOT NULL,
  `ad_time` varchar(200) NOT NULL,
  `ad_profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_uname`, `ad_email`, `ad_pass`, `ad_flag`, `ad_salt`, `ad_pin`, `ad_time`, `ad_profile`) VALUES
(1, 'RTO', 'admin@gmail.com', '$2y$10$zGRowqnCHMhAVq6OrFoRo.0Ln69jluBgtL0QYgDgiteVmYvJN51eq', 0, '56fb955cbdb4753348bffd7d672404ae633edba8e30128a5fbf6f8dc6164f30ac990e0a73c4c653a841345eb18e94d23a211e16a8b71973a08a9bd54cb5af478', '413003', '1516217998', '');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `d_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `adhar` varchar(200) NOT NULL,
  `license` varchar(200) NOT NULL,
  `RC` varchar(200) NOT NULL,
  `PUC` varchar(200) NOT NULL,
  `Insurance` varchar(200) NOT NULL,
  `doc_flag` smallint(5) NOT NULL,
  `d_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`d_id`, `u_id`, `adhar`, `license`, `RC`, `PUC`, `Insurance`, `doc_flag`, `d_time`) VALUES
(1, 1, '1619204184aspl.pdf', '1619204192aspl.pdf', '1619204199aspl.pdf', '1619204206aspl.pdf', '1619204212aspl.pdf', 0, 0),
(2, 2, '1619208234sample.pdf', '1619208249sample.pdf', '1619208265sample.pdf', '1619208284sample.pdf', '1619208299sample.pdf', 0, 0),
(3, 3, '16213499221619208249sample.pdf', '16213499481619208299sample.pdf', '16213499601619208265sample.pdf', '16213499681619208234sample.pdf', '16213499781619208249sample.pdf', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fin_id` int(10) NOT NULL,
  `fin_head` varchar(100) NOT NULL,
  `fin_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fin_id`, `fin_head`, `fin_amt`) VALUES
(1, 'license absence', 300),
(2, 'puc absence', 200),
(3, 'insurence expiry', 500);

-- --------------------------------------------------------

--
-- Table structure for table `fineli`
--

CREATE TABLE `fineli` (
  `fl_id` int(10) NOT NULL,
  `fin_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `fldt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fineli`
--

INSERT INTO `fineli` (`fl_id`, `fin_id`, `u_id`, `fldt`) VALUES
(1, 1, 1, '1619204496'),
(2, 1, 2, '1619208527'),
(3, 3, 2, '1619208533'),
(4, 2, 2, '1619208537'),
(5, 1, 3, '1621497361');

-- --------------------------------------------------------

--
-- Table structure for table `qc`
--

CREATE TABLE `qc` (
  `qc_id` int(10) NOT NULL,
  `qc_code` varchar(200) NOT NULL,
  `qc_name` varchar(200) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `qc_flag` smallint(10) NOT NULL,
  `qc_pass` text NOT NULL,
  `qc_dt` varchar(200) NOT NULL,
  `qc_salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`qc_id`, `qc_code`, `qc_name`, `e_mail`, `address`, `contact`, `ad_id`, `qc_flag`, `qc_pass`, `qc_dt`, `qc_salt`) VALUES
(1, '6789', 'qc', 'qc@gmail.com', 'solapur', 123987654, 1, 1, '$2y$10$zGRowqnCHMhAVq6OrFoRo.0Ln69jluBgtL0QYgDgiteVmYvJN51eq', '1520118000', 'eb7593e98ea820d571ad9cb2e34453d199bf235f2d648567d75d4c2dc881a6fe2daf1ed9d9b5d1031f9bf02178976e09e19cc84d28f773b23f850866ae9edd6b');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `qr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `qrlink` text NOT NULL,
  `qr_date` varchar(200) NOT NULL,
  `qr_flag` smallint(5) NOT NULL,
  `outh` text NOT NULL,
  `svid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`qr_id`, `u_id`, `ad_id`, `qrlink`, `qr_date`, `qr_flag`, `outh`, `svid`) VALUES
(1, 1, 1, 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.nbplsolapur.com/tiasfine/qc/index.php?YmZlY2ZiMTgwMjZhYzgyNWZjZWEwMGU1NGE4NGQ1MTgtMQ==&choe=UTF-8', '1619136000', 1, 'YmZlY2ZiMTgwMjZhYzgyNWZjZWEwMGU1NGE4NGQ1MTgtMQ==', 0),
(2, 2, 1, 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.nbplsolapur.com/tiasfine/qc/index.php?Y2M0YmY3NzAzYjYzMGVmNDJkMWMzY2QzNGQyMDU5ZjQtMg==&choe=UTF-8', '1619136000', 1, 'Y2M0YmY3NzAzYjYzMGVmNDJkMWMzY2QzNGQyMDU5ZjQtMg==', 0),
(3, 3, 1, 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.nbplsolapur.com/tiasfine/qc/index.php?NmJlZjhmMzdkNzhiMmFmYmU4NmY5MzhiOTI2OWUwN2YtMw==&choe=UTF-8', '1621468800', 1, 'NmJlZjhmMzdkNzhiMmFmYmU4NmY5MzhiOTI2OWUwN2YtMw==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sc_vehicle`
--

CREATE TABLE `sc_vehicle` (
  `sc_vehiid` int(10) NOT NULL,
  `u_id` int(11) NOT NULL,
  `v_type` varchar(200) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_no` varchar(200) NOT NULL,
  `chesseno` varchar(200) NOT NULL,
  `license` varchar(200) NOT NULL,
  `rc` varchar(200) NOT NULL,
  `puc` varchar(200) NOT NULL,
  `insurance` varchar(200) NOT NULL,
  `scv_flag` smallint(5) NOT NULL,
  `approve_flag` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_vehicle`
--

INSERT INTO `sc_vehicle` (`sc_vehiid`, `u_id`, `v_type`, `v_name`, `v_no`, `chesseno`, `license`, `rc`, `puc`, `insurance`, `scv_flag`, `approve_flag`) VALUES
(1, 2, '3', 'SSS', 'SSSSF33E4', 'SSREEE', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `trans_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `sold_date` varchar(200) NOT NULL,
  `vehicle_no` varchar(200) NOT NULL,
  `se_uid` int(10) NOT NULL,
  `adharno` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pass` varchar(200) NOT NULL,
  `u_contact` bigint(15) NOT NULL,
  `u_adharno` bigint(15) NOT NULL,
  `u_address` varchar(200) NOT NULL,
  `u_pin` int(10) NOT NULL,
  `licenseno` varchar(200) NOT NULL,
  `u_flag` smallint(5) NOT NULL,
  `d_flag` smallint(5) NOT NULL,
  `u_time` varchar(200) NOT NULL,
  `u_salt` text NOT NULL,
  `profile` varchar(200) NOT NULL,
  `QRlink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `ad_id`, `u_name`, `u_email`, `u_pass`, `u_contact`, `u_adharno`, `u_address`, `u_pin`, `licenseno`, `u_flag`, `d_flag`, `u_time`, `u_salt`, `profile`, `QRlink`) VALUES
(1, 1, 'Rajesh katare', 'rajesh@gmail.com', '$2y$10$hnxOMHxD4s7YR3Ef93waNeuonuteRYo0OP2gqZveKstUtIYRsjuYK', 8007026979, 987654321112, 'navi peth solapur', 413003, 'MH43545AD322', 3, 3, '1619204050', 'cb22e70170d14d0a2e5f8706d4bbdad8ffe8ff89963be6e09c46680e7f1f6517f67417ebc0c5f9bb16f923a215d37e79f831c6c18fde9a5d21cc2e47d1408f89', '', ''),
(2, 1, 'rohan', 'r@gmail.com', '$2y$10$ShI0O1L/DdcqR06YWR/AIOaJ0a5Ge.xI.60/iy0McDuac8yLs368K', 5656565656, 736637788899, 'pune', 413003, '47778349999999', 4, 3, '1619207817', '30ca4d76a771d4d6a4781bc115417f4bc370c62c9df28a683832168a325665e917d65a204081f82c2ee511bdfa873804c4e0671f2db8d42f3df35737052e7e5e', '', ''),
(3, 1, 'Pooja Shanku', 'poojashanku2@gmail.com', '$2y$10$z3mLF1I2RhNJ.tG5gMJCFutR6Gka38yGuP3SlXWpuAOyPuQFOHdiK', 8308974272, 786986869332, 'Solapur', 413003, '20180008451', 3, 3, '1621349801', '9ac81842118358479f639f02a9edf5b2b876d67dcdadac90bb1cf5dda16312cb2a0e1fbe041c832e403bc34c5dd6332d6cd17829355d3b65e55b8800869dd630', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `v_type` varchar(200) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_no` varchar(200) NOT NULL,
  `chesseno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `u_id`, `v_type`, `v_name`, `v_no`, `chesseno`) VALUES
(1, 1, '2', 'Honda', 'MH13AZ8094', '2346456754345345'),
(2, 2, '2', 'honda', 'mh13 5679', '7890-309876'),
(3, 3, '2', 'Activa 5G', '8385', '5278945623358');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fin_id`);

--
-- Indexes for table `fineli`
--
ALTER TABLE `fineli`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `qc`
--
ALTER TABLE `qc`
  ADD PRIMARY KEY (`qc_id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `sc_vehicle`
--
ALTER TABLE `sc_vehicle`
  ADD PRIMARY KEY (`sc_vehiid`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fineli`
--
ALTER TABLE `fineli`
  MODIFY `fl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `qc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sc_vehicle`
--
ALTER TABLE `sc_vehicle`
  MODIFY `sc_vehiid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
