-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 05:30 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_table`
--

CREATE TABLE `answer_table` (
  `reply_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_table`
--

INSERT INTO `answer_table` (`reply_id`, `question_id`, `member_id`, `reply_text`, `image`, `upvote`, `downvote`, `date`) VALUES
(138, 84, 1, 'Love it or hate it, many people have strong opinions on modern art. To some, itâ€™s a way of expressing ideas in original and thought-provoking ways; to others, itâ€™s not really â€œartâ€... itâ€™s more of an excuse to make money from arranging ordinary objects on a table and naming the installation â€œlife.\r\n\r\nModern art seems to be somewhat â€œcoolâ€ nowadays, with galleries popping up in cities all over the world. Iâ€™ve been to a number of modern art museums on family holidays, thereâ€™s something I quite enjoy about looking at the weird sculptures. Admittedly, maybe I just like it because I want to like it, but sometimes the exhibits are actually really cool. Iâ€™m not saying that I think particularly hard about the abstract meanings behind the bedazzled skull or shark suspended in a glass box (yep, it was a Damien Hirst exhibition), but theyâ€™re still arguably more interesting to look at than medieval paintings.\r\n\r\nMaybe itâ€™s the fact that modern art stirs some kind of feeling within you that makes it worthwhile and important. Modern art does raise the interesting question: what constitutes art? Some say poetry, ballet, music... others say any kind of self-expression. Others would automatically think of the classical painters: Michelangelo, Da Vinci and Raphael. Whatever your definition, I guess itâ€™s just good that people are going to galleries and coming out with strong opinions in a world where itâ€™s so easy to waste your day on the Internet. It helps when the gallery or museum is free though, thatâ€™s for sure.', '', 0, 0, '2018-05-28'),
(137, 84, 1, 'Sometimes modern and contemporary art can seem meaningless and laughable. But, let\'s suppose it is. Let\'s suppose an individual artwork is ugly, or baffling to you, the viewer. Much of it is. But looking at it from an economic viewpoint, there is a huge amount of money changing hands in the artworld. The Venice Bienalle is on at the moment - it\'s like the Eurovision song contest for art. Many countries have a pavilion in the Venice public gardens, and each display one artist or a group of artists from their countries. If the country wins the Grand Jury prize for its display, it means lots of publicity for the artists and the country itself. Those artists will probably sell the work in the display, and go on to sell many more because they have been given the award. And artists often have assistants - Phillida Barlow, who represented Great Britain this year had six or seven assistants to work on her show for several months prior to it going up - that\'s quite a lot of people being employed just in her studio, then the gallery who represents her has its own staff, the PR company that represents the gallery has its staff too - the art world employs many people. Quite apart from that, art itself can be ugly, but it can also be wonderful, and speak to you in ways that no TV program, film, or other experience can. Modern art is definitely not pointless.', '', 0, 0, '2018-05-28'),
(139, 85, 1, 'In my view it is ethically questionable to lure Syrian immigrants by prospects of ample social benefits and possible promising career for extra skilled individuals to the West from their cultural, religious and linguistic context. We might patch up some labour shortages by highly qualified staff but the majority will most likely face great difficulties finding their way in the highly specialized and sophisticated economies in the EU. Instead, we should support the neighboring countries that already bear the brunt of millions of Syrian refugees. A common sense assumption says that the further get and the longer stay refugees from their home country the less likely they will return home. Evidently all those skilled and also less skilled people will be needed in the reconstruction of Syria once the conflict is over. Therefore we should not, in part selfishly, invite them to the EU precisely for the sake of Syria\'s future. In addition we should publicly encourage in every possible forum the rich Gulf states to contribute their share, i.e. to accept temporarily Syrian refugees in their territories where there are practically no cultural, linguistic or religious barriers and to provide funds for improving the situation of refugees already present in Lebanon, Jordan and Turkey.', '', 0, 0, '2018-05-28'),
(143, 86, 1, 'Climate has never been constant. So why do we think human activities are responsible for the change occurring now? In recorded history, climates have been both significantly warmer and colder than the present. Biological evidence indicates greater variation within biological time, for example tree stumps deep underwater on the eastern coast of the U.S. presumably from the last ice age and forests under glaciers now receding presumably from some previously hotter time. People with fervent beliefs on either side can not explain their conclusions. Without resorting to authority, what is the convincing evidence?', '', 0, 0, '2018-05-28'),
(144, 86, 1, 'This is change in climate:', '180 14 Climate Change and the BIble.jpg', 0, 0, '2018-05-28'),
(145, 86, 1, 'good job', '', 0, 0, '2018-05-28'),
(146, 85, 4, 'written by sushil.', '', 0, 0, '2018-05-28'),
(147, 85, 4, '', 'nature1.jpg', 0, 0, '2018-05-28'),
(148, 90, 1, 'awesome bro!', '', 0, 0, '2018-05-28'),
(149, 90, 5, 'awesome', '', 0, 0, '2018-05-28'),
(150, 91, 5, 'ok', '1_WhDjw8GiV5o0flBXM4LXEw.png', 0, 0, '2018-05-28'),
(151, 91, 1, 'good job', '', 0, 0, '2018-05-28'),
(152, 90, 8, 'i am lungi.', '', 0, 0, '2018-05-28'),
(153, 91, 8, '', '5b0c1f55c60d5_Nature-HD-Photo.jpg', 0, 0, '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category`, `status`) VALUES
(1, 'Education', 1),
(2, 'Science', 1),
(3, 'Politics', 1),
(4, 'Technology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `ID` int(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `Subject` text,
  `FileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`ID`, `Type`, `Faculty`, `Semester`, `Subject`, `FileName`) VALUES
(30, 'Notes', 'BE Computer', 'First', 'English', '15_Control Unit.ppt'),
(31, 'Notes', 'BE Computer', 'First', 'English', '16_Micro-Programmed Control.ppt'),
(32, 'Notes', 'BCA', 'First', 'Technical', 'Chapter6-Memory-System (1).pdf'),
(33, 'Notes', 'BCA', 'First', 'Technical', 'Chapter7-Input-Output-Organization.pdf'),
(34, 'Notes', 'BIT', 'First', 'English', 'Final-Jumpinng Car.pptx'),
(35, 'Notes', 'BIT', 'First', 'English', 'forum.pptx'),
(36, 'Notes', 'BE Computer', 'First', 'English', 'pipelining_chapter_9_kcc .pptx'),
(37, 'Notes', 'BE Computer', 'First', 'English', 'Poposal first page(forum).docx'),
(38, 'Notes', 'BE Civil', 'First', 'Chemistry', 'KANTIPUR-CITY-COLLEGE-The-Jumping-Car (2).docx'),
(39, 'Notes', 'BE Civil', 'First', 'Chemistry', 'KANTIPUR-CITY-COLLEGE-The-Jumping-Car (3).docx'),
(40, 'Notes', 'BBA', 'First', 'Business', 'Final-Jumpinng Car.pptx'),
(41, 'Notes', 'BBA', 'First', 'Business', 'forum.pptx'),
(42, 'Notes', 'BIT', 'First', 'Fundamentals', 'received_2028836050710359.jpeg'),
(43, 'Notes', 'BBA', 'First', 'English', 'assignment.docx'),
(44, 'Notes', 'BBA', 'First', 'Business', 'Ch_8_kcc.pptx'),
(45, 'Question', 'BE Computer', 'Fourth', '', 'received_2028836027377028.jpeg'),
(46, 'Notes', 'BE Computer', 'First', 'Physics', 'received_2028836027377028.jpeg'),
(49, 'Notes', 'BCA', 'First', 'Computer', 'received_2028836150710349.jpeg'),
(50, 'Notes', 'BE Computer', 'First', 'Workshop', 'received_2028836050710359.jpeg'),
(51, 'Notes', 'BE Computer', 'First', 'Physics', 'received_2028836027377028.jpeg'),
(52, 'Notes', 'BE Computer', 'First', 'English', 'received_2028836120710352.jpeg'),
(53, 'Notes', 'BE Computer', 'First', 'Engineering', 'received_2028836120710352.jpeg'),
(54, 'Question', 'BE Computer', 'First', 'null', 'received_2028836064043691.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `member_id` int(11) DEFAULT NULL,
  `following` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`member_id`, `following`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_table`
--

CREATE TABLE `member_table` (
  `member_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_table`
--

INSERT INTO `member_table` (`member_id`, `username`, `email`, `password`, `profile_pic`) VALUES
(1, 'Ashok Kunwar', 'ashok@gmail.com', '1bf21e24160c9767396dfcd6bc67e3fa', 'ashok.jpg'),
(2, 'Ashish Bista', 'ashish@gmail.com', '5b9346b4faac9d7646e0486e69fc3335', 'bista.jpg'),
(3, 'Utshav Timsina', 'utsav@gmail.com', '', 'utshav.jpg'),
(4, 'Sushil Thapa', 'thapasushil6@gmail.com', '41edd4833f5892a500f53f7ae6761aed', 'sushil.jpg'),
(5, 'anmol kc', 'anmol@yahoo.com', 'ab586f796d68475349ad19e5c86f553b', 'profile_icon.jpg'),
(8, 'lungi', 'lungi@jlg.com', '2eb8637dd821b4f345e998693c700954', 'profile_icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `question_id` int(11) NOT NULL,
  `question_category` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`question_id`, `question_category`, `question_text`, `member_id`, `upvote`, `downvote`, `date`) VALUES
(86, 2, 'What is the science behind beliefs and disbeliefs in \"climate change?\"', 1, 0, 0, '2018-05-28'),
(85, 3, 'Is it ethical to refuse accepting Syria war immigrants?', 1, 0, 0, '2018-05-28'),
(84, 1, 'Is modern art pointless?', 1, 0, 0, '2018-05-28'),
(91, 1, 'This has been posted by Anmol?', 5, 0, 0, '2018-05-28'),
(90, 4, '\"There is no Internet connection\" why?', 4, 0, 0, '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `Faculty` text NOT NULL,
  `Semester` text NOT NULL,
  `Subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `Faculty`, `Semester`, `Subject`) VALUES
(1, 'BE Computer', 'First', 'Engineering MAth-I'),
(2, 'BE Computer', 'First', 'Physics'),
(3, 'BE Computer', 'First', 'Engineering Drawing'),
(4, 'BE Computer', 'First', 'English'),
(5, 'BE Computer', 'First', 'C Programming'),
(6, 'BE Computer', 'First', 'Workshop'),
(7, 'BIT', 'First', 'MAthematics-I'),
(8, 'BIT', 'First', 'Fundamentals of IT'),
(9, 'BIT', 'First', 'English'),
(10, 'BIT', 'First', 'Basic Electrical System & Circuit'),
(11, 'BIT', 'First', 'POM'),
(12, 'BIT', 'First', 'Computer Programming-I'),
(13, 'BIT', 'First', 'Project-I'),
(14, 'BCA', 'First', 'Mathematics-I'),
(15, 'BCA', 'First', 'Technical English'),
(16, 'BCA', 'First', 'COmputer Syatem Concepts'),
(17, 'BCA', 'First', 'C Programming'),
(18, 'BCA', 'First', 'Computer Project-I'),
(19, 'BCA', 'First', 'Modern Business Practices'),
(20, 'BE Civil', 'First', 'Construction Material'),
(21, 'BE Civil', 'First', 'Applied Mechanics-I(Statics)'),
(22, 'BE Civil', 'First', 'Mathematics-I'),
(23, 'BE Civil', 'First', 'Computer Concept and Programming'),
(24, 'BE Civil', 'First', 'Chemistry'),
(25, 'BE Civil', 'First', 'Workshop Technology'),
(26, 'BE Civil', 'First', 'Engineering Drawing-I'),
(27, 'BBA', 'First', 'Business Mathematics'),
(28, 'BBA', 'First', 'English'),
(29, 'BBA', 'First', 'Business Economics'),
(30, 'BBA', 'First', 'Financial Accounting'),
(31, 'BBA', 'First', 'POM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_table`
--
ALTER TABLE `answer_table`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_table`
--
ALTER TABLE `answer_table`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `member_table`
--
ALTER TABLE `member_table`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
