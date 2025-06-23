-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 03:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(17, 'R GAYATHRI', '8089176758', 'rgayathri1411@gmail.com', 'Gayathri@07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'category 1'),
(3, 'category 2'),
(5, 'category 3'),
(7, 'category 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_data` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_data`, `course_id`, `staff_id`) VALUES
(18, '\"Embark on a musical journey with our guitar playing class, where you\'ll learn essential techniques, chords, and melodies to master the art of playing the guitar.\"', 68, 9),
(19, 'A music theory class provides comprehensive knowledge and understanding of fundamental concepts such as harmony, rhythm, notation, and composition, enhancing students\' ability to analyze, compose, and appreciate music.', 67, 35),
(22, 'A vocal training class involves comprehensive instruction on vocal techniques, pitch control, breathing exercises, and performance skills to enhance and refine a student\'s singing abilities.', 80, 38),
(26, '\"Piano Mastery for Beginners\" is a comprehensive introductory course designed to equip novice learners with fundamental piano skills and techniques, laying the foundation for a journey towards becoming proficient in playing the piano.', 69, 35),
(28, '\"In our songwriting class, students explore the art and craft of composing music and lyrics, honing their creative expression and storytelling skills under expert guidance.\"', 70, 38),
(32, 'The Folk Music Appreciation class explores the rich cultural heritage of folk music, delving into its historical significance, diverse traditions, and artistic expressions.', 81, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classbooking`
--

CREATE TABLE `tbl_classbooking` (
  `classbooking_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `payment_date` varchar(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `booking_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_classbooking`
--

INSERT INTO `tbl_classbooking` (`classbooking_id`, `class_id`, `user_id`, `booking_status`, `payment_date`, `payment_status`, `booking_date`) VALUES
(117, 19, 62, 1, '2022-11-11', 1, ''),
(122, 22, 62, 1, '2023-11-11', 1, '2023-11-11'),
(123, 26, 62, 1, '', 0, '2023-11-13'),
(127, 18, 64, 1, '2023-11-16', 1, '2023-11-16'),
(128, 32, 64, 1, '2023-11-16', 1, '2023-11-16'),
(129, 19, 62, 1, '', 0, '2023-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `cmp_id` int(11) NOT NULL,
  `cmp_title` varchar(100) NOT NULL,
  `cmp_content` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `cmp_date` varchar(10) NOT NULL,
  `cmp_status` int(11) NOT NULL DEFAULT 0,
  `cmp_reply` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`cmp_id`, `cmp_title`, `cmp_content`, `staff_id`, `user_id`, `cmp_date`, `cmp_status`, `cmp_reply`) VALUES
(38, 'No audio', 'The videos have low audio', 35, 0, '2023-11-13', 0, ''),
(39, 'no clarity', 'videos are not clear', 0, 62, '2023-11-13', 1, 'will be solved soon'),
(40, 'scfz', 'sxczcz', 0, 62, '2023-11-15', 0, ''),
(41, 'Payment not Completed', ' User Ganga Gopi ,Booking completed not Paid yet', 38, 0, '2023-11-15', 1, 'Will be inform');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_rate` varchar(10) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `musictype_id` int(11) NOT NULL,
  `coursetype_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `course_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_rate`, `course_duration`, `musictype_id`, `coursetype_id`, `staff_id`, `course_photo`) VALUES
(67, 'Fundamentals Of Music Theory', '4000', 3, 23, 27, 35, 'musictheory.jpg'),
(68, 'Introduction To Guitar Playing', '3000', 2, 21, 27, 9, 'Guitar.jpg'),
(69, 'Piano Mastery for Beginners', '6500', 4, 16, 50, 35, 'Piano.jpg'),
(70, 'Song Writing And Composition', '4800', 2, 17, 48, 38, 'songwriting.jpg'),
(80, 'Vocal Performance Techniques', '7000', 4, 17, 49, 38, 'vocal.jpg'),
(81, 'Folk Music Appreciation', '2800', 1, 20, 52, 36, ''),
(82, 'Sitar Masterclasses', '8200', 5, 26, 51, 36, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursetype`
--

CREATE TABLE `tbl_coursetype` (
  `coursetype_id` int(11) NOT NULL,
  `coursetype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coursetype`
--

INSERT INTO `tbl_coursetype` (`coursetype_id`, `coursetype_name`) VALUES
(47, 'Beginner Courses'),
(48, ' Intermediate'),
(49, 'Advanced'),
(50, 'Specialized Courses'),
(51, 'Skill-Specific Courses'),
(52, 'Cultural Exploration Courses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(14, 'Thiruvananthapuram'),
(15, 'Kollam'),
(16, 'Pathanamthitta'),
(17, 'Alappuzha'),
(18, 'Idukki'),
(19, 'Ernakulam'),
(20, 'Kottayam'),
(21, 'Thrissur'),
(22, 'Malappuram'),
(23, 'Kozhikode'),
(24, 'Kannur'),
(25, 'Wayanad'),
(26, 'Kasargode'),
(27, 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `material_id` int(11) NOT NULL,
  `material_file` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`material_id`, `material_file`, `course_id`, `staff_id`, `material_name`) VALUES
(22, 'projectsynopsis.pdf', 68, 38, 'introduction');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(15, 'Pala', 547567, 8),
(17, 'vaikom ', 686609, 8),
(18, 'kulathupuzha', 567783, 5),
(20, 'Valamboor', 686669, 19),
(21, 'Ezhakarnad', 682308, 19),
(22, 'Velloor', 686609, 20),
(23, 'Aliyadu', 695607, 14),
(24, 'Attukkal', 695009, 14),
(25, 'Asramam', 691002, 15),
(26, 'Ashtamudi', 691602, 15),
(27, 'Aryankavu', 691316, 15),
(28, 'Aranmula', 689533, 16),
(29, 'Gavi', 685533, 16),
(30, 'Nellikkapara', 689691, 16),
(31, 'Pampa Triveni', 689662, 16),
(32, 'Chengannur', 689121, 17),
(33, 'Chennithala', 690105, 17),
(34, 'Mannar', 689622, 17),
(35, 'Admali', 685561, 18),
(36, 'Elappara', 685501, 18),
(37, 'Poopara', 685619, 18),
(38, 'Rajakumari', 685619, 18),
(39, 'Aluva', 683101, 19),
(40, 'Angamali', 683572, 19),
(41, 'Bhoothathankettu', 682308, 19),
(42, 'Edapaally', 682024, 19),
(43, 'Elanji', 686665, 19),
(44, 'Kochi', 682001, 19),
(45, 'Kolencheri', 682311, 19),
(46, 'Kothamangalam', 686691, 19),
(47, 'Mamalassery', 686663, 19),
(48, 'Muvattupuzha', 686661, 19),
(49, 'Nellimattam', 686693, 19),
(50, 'Pampakuda', 686667, 19),
(51, 'Poothotta', 682307, 19),
(52, 'Tripunithura', 682301, 19),
(53, 'Udayamperoor', 682307, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `review_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `user_name`, `user_review`, `course_id`, `user_rating`, `review_datetime`) VALUES
(4, 'Ganga', 'good', 67, 2, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_contact` varchar(10) NOT NULL,
  `staff_email` varchar(30) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `staff_musictype` varchar(20) NOT NULL,
  `staff_doj` varchar(10) NOT NULL,
  `staff_password` varchar(12) NOT NULL,
  `staff_confirmpswd` varchar(12) NOT NULL,
  `staff_photo` varchar(500) NOT NULL,
  `staff_proof` varchar(500) NOT NULL,
  `staff_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_contact`, `staff_email`, `staff_gender`, `staff_address`, `place_id`, `staff_musictype`, `staff_doj`, `staff_password`, `staff_confirmpswd`, `staff_photo`, `staff_proof`, `staff_status`) VALUES
(9, 'Aryan', '9544520478', 'aryan56@gmail.com', 'Male', 'fghhj', 18, '21', '12/04/2023', 'aryan', 'aryan', 'blossom-purple-flower-black-background-reflection-7r-1360x768.jpg', '', 1),
(35, 'Arsha Rajan', '9544520415', 'arsharajan02@gmail.com', 'Female', 'Mettakottil(H) N. Mazhuvannoor p.o Valamboor', 20, '14', '2023-10-20', 'Arsha@02', 'Arsha@02', '1306.jpg', 'blossom-purple-flower-black-background-reflection-7r-1360x768.jpg', 1),
(36, 'Giya', '9544520477', 'giyaksony12@gmil.com', 'Female', 'Karakattil (H)Pazhoor P.O piravom', 21, '14', '2023-10-26', 'Giya', 'Giya', 'teacher-8.jpg', '', 1),
(38, 'Krishnapriya', '9544520477', 'kpb08062004@gmail.com', 'Female', 'Madavannakkudy Thrikkariyoor P.O\nKothamangalam', 46, '16', '2023-11-06', 'Krishna@04', 'Krishna@04', 'teacher-4.jpg', 'image_6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(70) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'sub1', 1),
(3, 'sub2', 1),
(4, 'sub1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutorial`
--

CREATE TABLE `tbl_tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `tutorial_video` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tutorial`
--

INSERT INTO `tbl_tutorial` (`tutorial_id`, `tutorial_video`, `course_id`, `staff_id`) VALUES
(42, 'instrument.mp4', 80, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(14, 'Western Vocals'),
(15, 'Indian Vocals'),
(16, 'Carnatic Vocals'),
(17, 'Pop Music'),
(19, 'Electronic Music'),
(20, 'Folk Music'),
(21, 'Jazz Music'),
(22, 'Film Music'),
(23, 'Classical Music'),
(24, 'Rock Music'),
(26, 'Hindustani Music');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_doj` varchar(10) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  `user_confirmpswd` varchar(12) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_gender`, `user_address`, `place_id`, `user_photo`, `user_doj`, `user_proof`, `user_password`, `user_confirmpswd`, `user_status`) VALUES
(62, 'Ganga Gopi', '7907804453', 'gangagopi790780@gmail.com', 'Female', 'cherikkankuzhiyil (H)ezhakkarnad south p.o', 21, 'teacher-3.jpg', '2023-11-04', 'work-2.jpg', 'Ganga@03', 'Ganga@03', 1),
(64, 'Hari krishnan', '8089172341', 'harikrishnanc01@gmail.com', 'Male', ' Chollamvelil house maravanthuruth ,vaikom', 22, 'person_4.jpg', '2023-11-16', '', 'Hari@123', 'Hari@123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_classbooking`
--
ALTER TABLE `tbl_classbooking`
  ADD PRIMARY KEY (`classbooking_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_coursetype`
--
ALTER TABLE `tbl_coursetype`
  ADD PRIMARY KEY (`coursetype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_tutorial`
--
ALTER TABLE `tbl_tutorial`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_classbooking`
--
ALTER TABLE `tbl_classbooking`
  MODIFY `classbooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_coursetype`
--
ALTER TABLE `tbl_coursetype`
  MODIFY `coursetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tutorial`
--
ALTER TABLE `tbl_tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
