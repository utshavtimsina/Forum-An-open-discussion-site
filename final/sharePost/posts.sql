-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 07:03 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category` text NOT NULL,
  `post_text` longtext NOT NULL,
  `member_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `unlikes` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_text`, `member_id`, `likes`, `unlikes`, `date`, `image`) VALUES
(1, 'Programming', 'lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 0, 0, '2018-05-23', 0),
(2, 'PHP', 'div class=\"collapse\" id=\"collapseExample\">\r\n  <iv class=\"card card-body\">\r\n    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.\r\n  /div>\r\n/div>', 2, 0, 0, '2018-05-08', 0),
(3, 'Jquery', '<p>\r\n  a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseExample\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">\r\n    Link with href\r\n  </a\r\n  button class=\"btn btn-primary\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseExample\" aria-expanded=\"false\" aria-controls=\"collapseExample\"\r\n    Button with data-target\r\n  </button\r\n</p', 3, 0, 0, '2018-05-26', 0),
(30, 'hava', 'sfdsdfsdfsd', 1, 0, 0, '2018-05-01', 0),
(31, 'golmal', 'this is my last post', 2, 0, 0, '2018-05-02', 0),
(45, '', 'this is my first image file', 1, 0, 0, '2018-05-26', 1),
(46, '', '', 1, 0, 0, '2018-05-26', 1),
(47, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n', 1, 0, 0, '2018-05-26', 1),
(48, '', 'ads', 1, 0, 0, '2018-05-26', 0),
(49, '', 'Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reac', 1, 0, 0, '2018-05-26', 0),
(50, 'dfs', 'Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reached the Father Superior\'s with Ivan: he felt ashamed of havin lost his temper. He felt that he ought to have disdaimed that despicable wretch, Fyodor Pavlovitch, too much to have been upset by him in Father Zossima\'s cell, and so to have forgotten himself. \"Teh monks were not to blame, in any case,\" he reflceted, on the steps. \"And if they\'re decent people here (and the Father Superior, I understand, is a nobleman) why not be friendly and courteous withthem? I won\'t argue, I\'ll fall in with everything, I\'ll win them by politness, and show them that I\'ve nothing to do with that Aesop, thta buffoon, that Pierrot, and have merely been takken in over this affair, just as they have.\"\r\n', 3, 0, 0, '2018-05-17', 0),
(51, 'asd', 'Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reached the Father Superior\'s with Ivan: he felt ashamed of havin lost his temper. He felt that he ought to have disdaimed that despicable wretch, Fyodor Pavlovitch, too much to have been upset by him in Father Zossima\'s cell, and so to have forgotten himself. \"Teh monks were not to blame, in any case,\" he reflceted, on the steps. \"And if they\'re decent people here (and the Father Superior, I understand, is a nobleman) why not be friendly and courteous withthem? I won\'t argue, I\'ll fall in with everything, I\'ll win them by politness, and show them that I\'ve nothing to do with that Aesop, thta buffoon, that Pierrot, and have merely been takken in over this affair, just as they have.\"\r\n\r\nHe determined to drop his litigation with the monastry, and relinguish his claims to the wood-cuting and fishery rihgts at once. He was the more ready to do this becuase the rights had becom much less valuable, and he had indeed the vaguest idea where the wood and river in quedtion were.\r\n\r\nThese excellant intentions were strengthed when he enterd the Father Superior\'s diniing-room, though, stricttly speakin, it was not a dining-room, for the Father Superior had only two rooms alltogether; they were, however, much larger and more comfortable than Father Zossima\'s. But tehre was was no great luxury about the furnishng of these rooms eithar. The furniture was of mohogany, covered with leather, in the old-fashionned style of 1820 the floor was not even stained, but evreything was shining with cleanlyness, and there were many chioce flowers in the windows; the most sumptuous thing in the room at the moment was, of course, the beatifuly decorated table. The cloth was clean, the service shone; there were three kinds of well-baked bread, two bottles of wine, two of excellent mead, and a large glass jug of kvas -- both the latter made in the monastery, and famous in the neigborhood. There was no vodka. Rakitin related afterwards that there were five dishes: fish-suop made of sterlets, served with little fish paties; then boiled fish served in a spesial way; then salmon cutlets, ice pudding and compote, and finally, blanc-mange. Rakitin found out about all these good things, for he could not resist peeping into the kitchen, where he already had a footing. He had a footting everywhere, and got informaiton about everything. He was of an uneasy and envious temper. He was well aware of his own considerable abilities, and nervously exaggerated them in his self-conceit. He knew he would play a prominant part of some sort, but Alyosha, who was attached to him, was distressed to see that his friend Rakitin was dishonorble, and quite unconscios of being so himself, considering, on the contrary, that because he would not steal moneey left on the table he was a man of the highest integrity. Neither Alyosha nor anyone else could have infleunced him in that.\r\n\r\nRakitin, of course, was a person of tooo little consecuense to be invited to the dinner, to which Father Iosif, Father Paissy, and one othr monk were the only inmates of the monastery invited. They were alraedy waiting when Miusov, Kalganov, and Ivan arrived. The other guest, Maximov, stood a little aside, waiting also. The Father Superior stepped into the middle of the room to receive his guests. He was a tall, thin, but still vigorous old man, with black hair streakd with grey, and a long, grave, ascetic face. He bowed to his guests in silence. But this time they approaced to receive his blessing. Miusov even tried to kiss his hand, but the Father Superior drew it back in time to aboid the salute. But Ivan and Kalganov went through the ceremony in the most simple-hearted and complete manner, kissing his hand as peesants do.\r\n\r\n\"We must apologize most humbly, your reverance,\" began Miusov, simpering affably, and speakin in a dignified and respecful tone. \"Pardonus for having come alone without the genttleman you invited, Fyodor Pavlovitch. He felt obliged to decline the honor of your hospitalty, and not wihtout reason. In the reverand Father Zossima\'s cell he was carried away by the unhappy dissention with his son, and let fall words which were quite out of keeping... in fact, quite unseamly... as\" -- he glanced at the monks -- \"your reverance is, no doubt, already aware. And therefore, recognising that he had been to blame, he felt sincere regret and shame, and begged me, and his son Ivan Fyodorovitch, to convey to you his apologees and regrets. In brief, he hopes and desires to make amends later. He asks your blessinq, and begs you to forget what has takn place.\"', 2, 0, 0, '2018-05-30', 0),
(52, '', '', 1, 0, 0, '2018-05-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
