-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `unitcode` varchar(255) NOT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `lec_emailF` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`unitcode`, `time_limit`, `lec_emailF`) VALUES
('SCO100', 45, 'njuguna@ku.ac.ke'),
('SCO102', 30, 'ojwang.dan@ku.ac.ke'),
('SCO105', 45, 'ojwang.dan@ku.ac.ke'),
('SCO109', 45, 'ojwang.dan@ku.ac.ke'),
('SCO200', 50, 'ojwang.dan@ku.ac.ke'),
('SCO204', 30, 'ojwang.dan@ku.ac.ke'),
('SCO209', 45, 'musa@ku.ac.ke'),
('SCO217', 45, 'ojwang.dan@ku.ac.ke'),
('SCO301', 35, 'ojwang.dan@ku.ac.ke'),
('SCO306', 34, 'ojwang.dan@ku.ac.ke'),
('SCO307', 56, 'ojwang.dan@ku.ac.ke'),
('SCO310', 48, 'ojwang.dan@ku.ac.ke'),
('SCO401', 45, 'njuguna@ku.ac.ke'),
('SCO402', 20, 'njuguna@ku.ac.ke'),
('SCO403', 78, 'njuguna@ku.ac.ke'),
('SCO404', 40, 'njuguna@ku.ac.ke'),
('SIT403', 55, 'njuguna@ku.ac.ke');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `PF_No` varchar(255) NOT NULL,
  `lec_fname` varchar(255) NOT NULL,
  `lec_lname` varchar(255) NOT NULL,
  `lec_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(50) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`PF_No`, `lec_fname`, `lec_lname`, `lec_email`, `password`, `school`, `dept`) VALUES
('1002', 'Duncan', 'Musa', 'musa@ku.ac.ke', '$2y$10$AD/nlljZG20Dd.CW7VfbJeFja41cpWbKuaLuw15KWdb8TPZ5kHb7K', 'School of Pure and Applied Sciences', 'CIT'),
('1001', 'Yvonne', 'Njeri', 'njuguna@ku.ac.ke', '$2y$10$nMb.AB0dzR96yg9xWfLNEOu6l.StEOcwsMZdMmidME2hCgpPWFvtu', 'School of Pure and Applied Sciences', 'CIT'),
('1003', 'Dan', 'Ojwang', 'ojwang.dan@ku.ac.ke', '$2y$10$VigO/5EsOURX8Ti.6dHu..rB.eWe0r8qkNLrsLKhqVEA5DqOaSUuy', 'School of Pure and Applied Sciences', 'CIT');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_code` int(10) NOT NULL,
  `unitcodeF` varchar(255) NOT NULL,
  `question` text DEFAULT NULL,
  `optionA` varchar(255) DEFAULT NULL,
  `optionB` varchar(255) DEFAULT NULL,
  `optionC` varchar(255) DEFAULT NULL,
  `optionD` varchar(255) DEFAULT NULL,
  `correct_option` varchar(255) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_code`, `unitcodeF`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correct_option`, `weight`) VALUES
(1, 'SCO100', 'An electronic tool that allows information to be input, processed, and output is called _______________. ', 'Computer', 'Email', 'Harddisk', 'Processor', 'A', 1),
(1, 'SCO102', 'ksdafl asdjkflkjasdklf jdksfj kjsdflkj', 'ksdfjkjdk ksdjflakdjf j ', 'kkajflkioewqur', 'oiewu kejr j', 'kdfk akdjf kj', 'B', 3),
(1, 'SCO105', 'aksldfjakd asdlkfajklsdjf kajdflkj', 'sdlfak', 'kjalsdk', 'kalksdjl', 'akslkjskf', 'A', 3),
(1, 'SCO109', '1+1', '7', '6', '3', '2', 'D', 1),
(1, 'SCO200', 'Which one of the following is NOT a data type', 'Boolean', 'String', 'Integer', 'False', 'D', 3),
(1, 'SCO204', 'dfhkjd jjdhfkjh fjahfjkha', 'sdjfh', 'jhsdak', 'jkadj', 'jsadk', 'C', 3),
(1, 'SCO209', 'Which of the following is a special-purpose register of microprocessor?', 'Temporary register', 'Program counter', 'Accumulator', 'Instruction register', 'B', 3),
(1, 'SCO217', 'Which one of the following is not a function of the operating system', 'Scheduling', 'Memory Management', 'Process Management', 'cpu', 'D', 5),
(1, 'SCO301', 'sdfk asfjd kljfdsk jksdfjslk', 'kksdlk', 'kdsj ', 'kasdj dsjafk', 'kadsl adkaf', 'C', 3),
(1, 'SCO306', 'ksdjfk kafjlkdjfklj', 'lkdsjk ', 'akjlkkj jdkla', 'kdaslkfj', 'kjdskl', 'A', 3),
(1, 'SCO307', 'kafjsd sdfslkjkjsdkfjlj sdkfj kjf', 'kasdjf ', 'kdjsal', 'kasdj', 'kladjsfk', 'D', 5),
(1, 'SCO310', 'dskfjak adkj fjl fkljsdfkjsdfklj', 'kdjasklj ffdjlkdfjdfj kfj dfjkldf', 'dlkf jkljdflkjdfjk kdfj k', 'kslkja fjlkjdfklj f sdkj', 'ksdl f jlkfdjlkf jd f', 'C', 3),
(1, 'SCO401', 'klsdfjakj askjdflkasjdklajkjaksjfkajkj', 'kjaskjls', 'kajlskj', 'kjalksjk', 'kajslj', 'A', 2),
(1, 'SCO402', 'What does DRM stand for in the context of digital content distribution?', 'Digital Rights Management', ' Digital Resource Management', 'Data Retention Management', 'Direct Rights Monitoring', 'A', 3),
(1, 'SCO403', 'ajksdjl ksdfjkljsdfkljasdfklj sdfkjkljsd fkl', 'akfdkljf klajfkljdf kjasdklafjlk', 'kadsjakl ksdjlksdfjkldj k', 'dkjfakljfdj sdfkl fkajflkj', 'ksdjafklj fjkladfjalkf', 'A', 3),
(1, 'SCO404', 'Which one of the following is NOT a type of entrepreneurship?', 'Solepropreatiorship', 'Partnership', 'Limited Liability Company', 'Business', 'D', 2),
(1, 'SIT403', 'What is compression?', 'To convert one file to another', 'To reduce the size of data to save space', 'To minimize the time taken for a file to be downloaded', 'To compress something by pressing it very hard', 'B', 2),
(2, 'SCO100', '_____________ is a worldwide network of computers. ', 'Computer', 'Internet', 'LAN', 'Router', 'B', 2),
(2, 'SCO102', 'dskaja sdjkflkd askjldjfk', 'skdjl', 'klasd', 'kasdjlk klda', 'kadjl kjsldk', 'B', 3),
(2, 'SCO105', 'asdf sdkfajklj sdjfaklsjd ajjfkjaskl', 'kaslk asdkfajl', 'kajlkdj dkjakldj', 'kajsdkj akdjfkla', 'kajl dfaklqoier', 'B', 1),
(2, 'SCO109', '1+4(48/89)', '0.2239', '0.232324', '0.3', '0.245345', 'B', 5),
(2, 'SCO200', 'Which one of the following is a paradigm of Java', 'Abstraction', 'Objects', 'Programming', 'Modulation', 'A', 5),
(2, 'SCO204', 'ksdfj', 'kdsj', 'kslk', 'kdjal', 'kjsdl', 'B', 2),
(2, 'SCO209', 'What does a microprocessor understand after decoding opcode?', 'Length of the instruction and number of operations', 'Perform ALU operation', 'Go to memory', 'Length of the instruction and number of operations', 'D', 5),
(2, 'SCO306', 'sdfjklklsdjfkj kfjlakjsdklj sdjflkjl', 'ksdal dkjflkjdfkj', 'ksdjal dkfjlkasdj', 'kdjslj fkjflk', 'ksdjalk dsfjlkd', 'D', 5),
(2, 'SCO401', 'ksfajklj akdfjkajfdkajdkfj asdkfjaskjdfk k sakjfklsjkfj kj akj        ', 'asklfj asjdfkljadkfja', 'jalskdjfklaj kjasdklfjakj', 'sdkfakjfksdjfie', 'aksjdf fsjdkj', 'C', 3),
(2, 'SCO402', 'Which of the following is an example of a potential ethical issue related to artificial intelligence (AI)?', ' Increased efficiency in data analysis', 'Improved customer service through chatbots', ' Bias in algorithms leading to discriminatory outcomes', 'Enhanced cybersecurity measures', 'C', 3),
(2, 'SCO403', 'ajksdjl ksdfjkljsdfkljasdfklj sdfkjkljsd fkl', 'akfdkljf klajfkljdf kjasdklafjlk', 'kadsjakl ksdjlksdfjkldj k', 'dkjfakljfdj sdfkl fkajflkj', 'ksdjafklj fjkladfjalkf', 'A', 3),
(2, 'SCO404', 'Which one of the following is NOT a factor of production', 'Labour', 'Entrepreneurship', 'Land', 'Skill', 'D', 3),
(2, 'SIT403', 'What does Lossy Compression do to files?', 'Increases the file size and keeps the same quality', 'Eliminates no information at all', 'Decreases the file size and keeps the same quality', 'Eliminates unnecessary information in a file to reduce file size', 'D', 3),
(3, 'SCO100', 'Name the brain of the computer that does the calculation, moving, and processing of information. ', 'GPU', 'Harddisk', 'RAM', 'CPU', 'D', 2),
(3, 'SCO102', 'Which one of the following is NOT a data type', 'String', 'Boolean', 'Output', 'Integer', 'C', 5),
(3, 'SCO401', 'kasfldj asdkjfkajk skdjkajsdk jaskfjk', 'skdjalk', 'ksjklj', 'ksjakj', 'skajsd', 'B', 2),
(3, 'SCO402', 'What is the main purpose of GDPR (General Data Protection Regulation)?', 'To regulate the use of social media platforms', 'To standardize data protection laws across the European Union', ' To promote the use of data analytics in businesses', 'To restrict access to personal data for law enforcement agencies', 'B', 3),
(3, 'SCO403', 'kafdkjl kdfjakljsfk djklsdfj kljsdfklj', 'sdkf qk fjak', 'kjsdalkfjl', 'kak', 'aksdfjlk', 'C', 3),
(3, 'SCO404', 'What is the primary purpose of a business plan for an entrepreneur?', 'To attract investors and secure funding', ' To outline legal requirements for business operations', 'To create marketing strategies for product promotion', 'To establish employee benefit packages', 'A', 3),
(3, 'SIT403', 'What is Lossless Compression?', 'No information is lost but file size is increased', 'There is no loss in information at all after compression', 'Files which have the exact same data after compression', 'Compression that involves an algorithm', 'B', 3),
(4, 'SCO100', 'Part of a computer that allows a user to put information into the computer is called ______________. ', 'Output Device', 'Operating System', 'Input Device', 'RAM', 'C', 2),
(4, 'SCO402', 'What is a potential consequence of not adhering to copyright laws when using software or digital content?\r\n', 'Enhanced data security', ' Increased innovation', 'Legal penalties and fines', 'Improved collaboration', 'C', 2),
(4, 'SCO403', 'kafdkjl kdfjakljsfk djklsdfj kljsdfklj', 'sdkf qk fjak', 'kjsdalkfjl', 'kak', 'aksdfjlk', 'C', 3),
(4, 'SCO404', 'Which of the following is an example of a characteristic of a successful entrepreneur?', 'Fear of failure', 'Lack of adaptability', 'Persistence in the face of challenges', ' Aversion to networking', 'C', 2),
(5, 'SCO100', 'Name the computer part that is connected to all other aspects of a computer and allows them to communicate and work together.', 'Operating System', 'Mother Board', 'CPU', 'Hardisk', 'C', 2),
(5, 'SCO402', 'Which principle of the ACM Code of Ethics states that computing professionals should respect the privacy of others?', 'Utilize resources efficiently', 'Avoid harm to others', ' Respect intellectual property rights', 'Respect the privacy of others', 'C', 2),
(6, 'SCO100', 'The physical parts of a computer are termed as ______________.', 'Hardware', 'Software', 'Liveware', 'CPU', 'A', 2),
(6, 'SCO402', 'What ethical issue is associated with the development and deployment of autonomous vehicles?', 'Data privacy concerns', 'Environmental sustainability', 'Technological unemployment', ' Ethical decision-making in life-threatening situations', 'D', 3),
(7, 'SCO100', 'Parts of a computer that allow the user to see or hear information that comes out from the computer are called ____________________.', 'Output Device', 'Input Device', 'Hardware', 'Harddisk', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `reg_noF` varchar(255) NOT NULL,
  `unitcodeF` varchar(255) NOT NULL,
  `total_questions` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `wrong` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`reg_noF`, `unitcodeF`, `total_questions`, `correct`, `wrong`, `exam_time`, `marks`) VALUES
('0729/2020', 'SCO100', '7', '0', '7', '2024-03-18 11:58:44', '0'),
('0807/2020', 'SCO100', '7', '5', '2', '2024-03-18 03:39:39', '8'),
('0807/2020', 'SCO102', '3', '2', '1', '2024-03-18 03:40:10', '8'),
('0807/2020', 'SCO105', '2', '0', '2', '2024-03-18 03:40:51', '0'),
('0807/2020', 'SCO109', '2', '2', '0', '2024-03-18 03:41:24', '6'),
('0807/2020', 'SCO200', '2', '2', '0', '2024-03-18 03:41:56', '8'),
('0807/2020', 'SCO204', '2', '0', '2', '2024-03-18 03:42:10', '0'),
('0807/2020', 'SCO209', '2', '2', '0', '2024-03-18 04:00:58', '8'),
('0807/2020', 'SCO217', '1', '1', '0', '2024-03-18 03:42:35', '5'),
('0807/2020', 'SCO301', '1', '1', '0', '2024-03-18 03:43:46', '3'),
('0807/2020', 'SCO306', '2', '0', '2', '2024-03-18 03:43:00', '0'),
('0807/2020', 'SCO307', '1', '0', '1', '2024-03-18 03:43:56', '0'),
('0807/2020', 'SCO310', '1', '0', '1', '2024-03-18 03:43:11', '0'),
('0807/2020', 'SCO402', '6', '3', '3', '2024-03-14 19:41:05', '8'),
('0807/2020', 'SCO404', '4', '2', '2', '2024-03-15 14:25:31', '5'),
('12630/2020', 'SCO402', '6', '5', '1', '2024-03-12 07:18:14', '13'),
('12630/2020', 'SCO404', '4', '2', '2', '2024-03-12 14:47:16', '4'),
('13121/2020', 'SIT403', '3', '3', '0', '2024-03-12 13:30:46', '8');

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

CREATE TABLE `selected` (
  `reg_noF` varchar(255) NOT NULL,
  `unitcodeF` varchar(255) NOT NULL,
  `q_code` int(10) NOT NULL,
  `selected` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selected`
--

INSERT INTO `selected` (`reg_noF`, `unitcodeF`, `q_code`, `selected`) VALUES
('0807/2020', 'SCO100', 6, 'Hardware'),
('0807/2020', 'SCO100', 7, 'Output Device'),
('0807/2020', 'SCO402', 6, 'Technological unemployment'),
('12630/2020', 'SCO402', 6, ' Ethical decision-making in life-threatening situations');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `reg_no` varchar(255) NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_lname` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`reg_no`, `student_fname`, `student_lname`, `student_email`, `password`, `school`, `dept`, `course`, `semester`) VALUES
('0729/2020', 'Dan', 'Araka', 'araka.eric@ku.ac.ke', '$2y$10$ncj.hCOfnX3vOCwgOSbhSeNtZV9YhOe74.X5xPhV4bV1fFP13YtWO', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('0801/2020', 'Martin', 'Kilona', 'martin@gmail.com', '$2y$10$o.Of4ywXhux5BbRzsaN1ZO.DPACJZQ6QjOj50bvc3uEoSZijdeQoO', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('0807/2020', 'Mary', 'Njuguna', '0807.2020@students.ku.ac.ke', '$2y$10$1LbwR9eoByu46XukKG/42uvvWO8W.llEluXYE9YSCgUmVQOCVA9ZC', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '4.2'),
('0840/2020', 'James', 'Opondo', '0840.2020@students.ku.ac.ke', '$2y$10$VKhU5BSSJk17uj.XYGrB1emvZkDET1YcQo7oSp38gfZ.Edb.sqW5.', 'School of Architecture', 'Planning', 'Bachelor of Science in Design and Planning', '4.2'),
('12343/2020', 'Evans', 'Nyamu', 'evans@gmail.com', '$2y$10$kkKW17jLccIdcFKwn3KdIOJaDYiFYuIYd.FNVVb1RjRC/4BAArGUK', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '1.1'),
('12630/2020', 'Cromwell', 'Samuel', '12630.2020@students.ku.ac.ke', '$2y$10$H7YDAOO7AccgBcLeoni1Zut33R3o/nMmK9TYUd6OybiVYWqQwLHcC', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '4.2'),
('12645/2020', 'Paul', 'Karanja', 'devkaranja01@gmail.com', '$2y$10$HWjiD1Fydh3qO80jw3/k5eYQrQ/kbEYOBikTHAo0Q21JfY7CD6io.', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('13121/2020', 'Luisa', 'Shikuku', '13121.2020@students.ku.ac.ke', '$2y$10$TdoY/TtMuZ.rl8/U5jstQub/Ed2fN5GrvdCPJzqn7izEORXd3Rzx6', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '4.2');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitcode` varchar(255) NOT NULL,
  `unit_title` varchar(255) DEFAULT NULL,
  `school` varchar(255) NOT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `offered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitcode`, `unit_title`, `school`, `dept`, `course`, `offered`) VALUES
('SCO100', 'Introduction to Computing', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('SCO102', 'Introduction to Programming', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('SCO104', 'Computer Architecture I', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.1'),
('SCO105', 'Data Communication Technologies', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.2'),
('SCO109', 'Linear Algebra', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '1.2'),
('SCO200', 'Java Programming II', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '2.1'),
('SCO204', 'Data Structures and Algorithms', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '2.1'),
('SCO209', 'Microprocessor and Assembly Language', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '2.2'),
('SCO217', 'Operating Systems', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '2.2'),
('SCO301', 'Compiler Construction', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '3.2'),
('SCO306', 'Programming Languages', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '3.1'),
('SCO307', 'Human Computer Interface', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '3.2'),
('SCO310', 'Component Programming', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science', '3.1'),
('SCO401', 'Network Management', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science ', '4.2'),
('SCO402', 'Legal and Ethical Issues', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science ', '4.1'),
('SCO403', 'Networked Applications', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science ', '4.2'),
('SCO404', 'Entrepreneurship', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in Computer Science ', '4.1'),
('SET100', 'Introduction to Physics', 'School of Engineering', 'Electrical', 'Bachelor of Science in Electrical and Electronics Engineering', '1.1'),
('SET101', 'Introduction to Engineering', 'School of Engineering', 'Electrical', 'Bachelor of Science in Electrical and Electronics Engineering', '1.1'),
('SIT401', 'Network Management', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '4.2'),
('SIT402', 'Legal and Ethical issues', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '4.1'),
('SIT403', 'Network Applications', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '4.2'),
('SIT408', 'Information Systems Management', 'School of Pure and Applied Sciences', 'CIT', 'Bachelor of Science in IT', '4.1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$10$nMb.AB0dzR96yg9xWfLNEOu6l.StEOcwsMZdMmidME2hCgpPWFvtu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`unitcode`),
  ADD KEY `exams_ibfk_1` (`lec_emailF`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lec_email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_code`,`unitcodeF`),
  ADD KEY `questions_ibfk_1` (`unitcodeF`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`reg_noF`,`unitcodeF`),
  ADD KEY `results_ibfk_2` (`unitcodeF`);

--
-- Indexes for table `selected`
--
ALTER TABLE `selected`
  ADD PRIMARY KEY (`reg_noF`,`unitcodeF`,`q_code`),
  ADD KEY `unitcodeF` (`unitcodeF`),
  ADD KEY `q_code` (`q_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`lec_emailF`) REFERENCES `lecturers` (`lec_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`unitcode`) REFERENCES `units` (`unitcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`unitcodeF`) REFERENCES `exams` (`unitcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`reg_noF`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`unitcodeF`) REFERENCES `exams` (`unitcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selected`
--
ALTER TABLE `selected`
  ADD CONSTRAINT `selected_ibfk_1` FOREIGN KEY (`reg_noF`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selected_ibfk_2` FOREIGN KEY (`unitcodeF`) REFERENCES `units` (`unitcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selected_ibfk_3` FOREIGN KEY (`q_code`) REFERENCES `questions` (`q_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
