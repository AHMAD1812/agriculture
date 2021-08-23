-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 12:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reviewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `examproper`
--

CREATE TABLE `examproper` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `passing_rate` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `access_code` text NOT NULL,
  `test_desc` text NOT NULL,
  `category_exam` text NOT NULL,
  `date_time` datetime NOT NULL,
  `date_expired` datetime NOT NULL,
  `Semester` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examproper`
--

INSERT INTO `examproper` (`test_id`, `user_id`, `total_questions`, `passing_rate`, `time_limit`, `access_code`, `test_desc`, `category_exam`, `date_time`, `date_expired`, `Semester`) VALUES
(2, 55, 1, 100, 60, 'PEHOSM', 'Agriculture', 'Animal Science', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 25, 1, 75, 60, '4EW3IO', ' Agriculture', 'Animal Science', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `question_desc` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment_file` varchar(90) NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  `subject` varchar(90) NOT NULL,
  `Course` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question_desc`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `user_id`, `attachment_file`, `difficulty_id`, `subject`, `Course`) VALUES
(1, 'sad', 'a', 'b', 'c', 'd', 'a', 55, 'files/Chart.jpeg', 1, 'Animal Science', 'Agriculture'),
(2, 'd', 'a', 'b', 'c', 'd', 'd', 25, 'files/', 1, 'Animal Science', 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata_exams`
--

CREATE TABLE `studentdata_exams` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata_exams`
--

INSERT INTO `studentdata_exams` (`id`, `test_id`, `q_id`, `answer`, `status`, `student_id`, `access_code`) VALUES
(1, 94, 228, 'asd', 1, 53, 'GDUKAQ'),
(2, 94, 212, '21', 0, 53, 'GDUKAQ'),
(3, 94, 214, '2', 0, 53, 'GDUKAQ'),
(4, 94, 213, '3', 1, 53, 'GDUKAQ'),
(5, 97, 233, 'qw', 1, 53, 'CXXVYG'),
(6, 97, 234, '', 0, 53, 'CXXVYG'),
(7, 2, 1, 'c', 0, 55, 'PEHOSM'),
(8, 3, 2, 'd', 1, 55, '4EW3IO');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata_tests`
--

CREATE TABLE `studentdata_tests` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ID_PERTAKE` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata_tests`
--

INSERT INTO `studentdata_tests` (`id`, `test_id`, `q_id`, `answer`, `status`, `student_id`, `ID_PERTAKE`) VALUES
(1, 4, 1, 'a', 1, 55, '2MUYE3'),
(2, 4, 1, 'b', 0, 55, 'M65NM2'),
(3, 4, 1, 'c', 0, 55, 'ZVNHOZ'),
(4, 4, 1, 'c', 0, 55, 'OS75ZW'),
(5, 4, 1, 'a', 1, 55, 'D8KE6I'),
(6, 4, 1, '', 0, 55, 'M75Q1S'),
(7, 4, 1, 'a', 1, 55, 'M1S51I'),
(8, 4, 1, 'd', 0, 55, 'MA3JLT'),
(9, 4, 1, 'a', 1, 55, 'ESCLUB'),
(10, 4, 1, 'b', 0, 55, 'ZTSZG7'),
(11, 5, 2, 'a', 0, 55, '3VR5CG'),
(12, 5, 2, 'd', 1, 55, 'YA81JN'),
(13, 4, 1, 'a', 1, 55, 'R3PE36');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult_exams`
--

CREATE TABLE `studentresult_exams` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_taken` text NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult_exams`
--

INSERT INTO `studentresult_exams` (`id`, `student_id`, `test_id`, `score`, `percentage`, `remarks`, `date_taken`, `access_code`) VALUES
(1, 55, 2, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(2, 55, 4, 1, 100, 'PASSED', 'Jan, 23 2019', ''),
(3, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(4, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(5, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(6, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(7, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(8, 55, 4, 1, 100, 'PASSED', 'Jan, 23 2019', ''),
(9, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(10, 55, 4, 1, 100, 'PASSED', 'Jan, 23 2019', ''),
(11, 55, 3, 1, 100, 'PASSED', 'Jan, 23 2019', ''),
(12, 55, 4, 0, 0, 'FAILED', 'Jan, 23 2019', ''),
(13, 55, 4, 1, 100, 'PASSED', 'Jan, 23 2019', ''),
(14, 55, 4, 0, 0, 'FAILED', 'Jan, 24 2019', ''),
(15, 55, 5, 0, 0, 'FAILED', 'Jan, 24 2019', ''),
(16, 55, 5, 1, 100, 'PASSED', 'Jan, 24 2019', ''),
(17, 55, 4, 1, 100, 'PASSED', 'Jan, 24 2019', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult_test`
--

CREATE TABLE `studentresult_test` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_taken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult_test`
--

INSERT INTO `studentresult_test` (`id`, `student_id`, `test_id`, `score`, `percentage`, `remarks`, `date_taken`) VALUES
(11, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018'),
(12, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018'),
(13, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivities`
--

CREATE TABLE `tblactivities` (
  `ActivityID` int(11) NOT NULL,
  `Title` varchar(90) NOT NULL,
  `Description` varchar(90) NOT NULL,
  `Course` varchar(90) NOT NULL,
  `Subject` varchar(90) NOT NULL,
  `Image1` varchar(90) NOT NULL,
  `Image2` varchar(90) NOT NULL,
  `Image3` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblactivities`
--

INSERT INTO `tblactivities` (`ActivityID`, `Title`, `Description`, `Course`, `Subject`, `Image1`, `Image2`, `Image3`) VALUES
(3, 'sad', 'asd', 'Agriculture', 'Agricultural Extension and Communication', 'files/cutomer.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `CourseID` int(11) NOT NULL,
  `Course` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseID`, `Course`) VALUES
(6, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `tblexamquestion`
--

CREATE TABLE `tblexamquestion` (
  `eq_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexamquestion`
--

INSERT INTO `tblexamquestion` (`eq_id`, `q_id`, `access_code`) VALUES
(2, 1, 'PEHOSM'),
(3, 2, '4EW3IO');

-- --------------------------------------------------------

--
-- Table structure for table `tblprequestion`
--

CREATE TABLE `tblprequestion` (
  `pq_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprequestion`
--

INSERT INTO `tblprequestion` (`pq_id`, `q_id`, `test_id`) VALUES
(2, 1, 4),
(3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `SubjectID` int(11) NOT NULL,
  `Subject` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`SubjectID`, `Subject`) VALUES
(1, 'Animal Science'),
(2, 'Crop Science'),
(3, 'Soil Science'),
(4, 'Agricultural Economics and Marketing'),
(5, 'Agricultural Extension and Communication'),
(6, 'CRO Protection');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `passing_rate` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `test_desc` text NOT NULL,
  `test_subject` text NOT NULL,
  `access_code` text NOT NULL,
  `Semester` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `user_id`, `difficulty_id`, `total_questions`, `passing_rate`, `time_limit`, `test_desc`, `test_subject`, `access_code`, `Semester`) VALUES
(4, 55, 1, 1, 100, 5, 'Agriculture', 'Animal Science', '', ''),
(5, 25, 1, 1, 100, 5, 'Agriculture', 'Animal Science', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL,
  `course` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usertype_id`, `fname`, `mname`, `lname`, `username`, `password`, `user_type`, `course`, `year`) VALUES
(25, 1, 'admin', 'admin', 'admin', 'admin', 'admin', 'Admin', '', ''),
(55, 3, 'jan', 'a', 'jan', 'jan', 'jan', 'Student', 'Agriculture', '1ST SEMESTER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examproper`
--
ALTER TABLE `examproper`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `studentdata_exams`
--
ALTER TABLE `studentdata_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdata_tests`
--
ALTER TABLE `studentdata_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentresult_exams`
--
ALTER TABLE `studentresult_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentresult_test`
--
ALTER TABLE `studentresult_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivities`
--
ALTER TABLE `tblactivities`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `tblexamquestion`
--
ALTER TABLE `tblexamquestion`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `tblprequestion`
--
ALTER TABLE `tblprequestion`
  ADD PRIMARY KEY (`pq_id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examproper`
--
ALTER TABLE `examproper`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentdata_exams`
--
ALTER TABLE `studentdata_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentdata_tests`
--
ALTER TABLE `studentdata_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentresult_exams`
--
ALTER TABLE `studentresult_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studentresult_test`
--
ALTER TABLE `studentresult_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblactivities`
--
ALTER TABLE `tblactivities`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblexamquestion`
--
ALTER TABLE `tblexamquestion`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblprequestion`
--
ALTER TABLE `tblprequestion`
  MODIFY `pq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
