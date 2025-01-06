-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 09:53 AM
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
-- Database: `es`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseha`
--

CREATE TABLE `courseha` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `term` int(10) NOT NULL,
  `course_code` int(15) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `unit` int(20) NOT NULL,
  `prerequisite` varchar(255) NOT NULL,
  `co_requisite` varchar(255) NOT NULL,
  `optional` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `selected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `term`, `course_code`, `course_name`, `unit`, `prerequisite`, `co_requisite`, `optional`, `type`, `pass`, `selected`) VALUES
(17, 1, 310060, ' مبانی كامپيوتر و برنامه سازی', 3, 'ندارد', 'كارگاه مبانی كامپيوتر و برنامه نويسی', 'خیر', 'اصلی', 1, 0),
(18, 1, 100271, 'زبان فارسی', 3, 'ندارد', 'ندارد', 'خیر', 'عمومی', 0, 0),
(19, 1, 100291, 'زبان خارجه عمومی', 3, 'ندارد', 'ندارد', 'خیر', 'عمومی', 0, 0),
(20, 1, 100500, 'ریاضی عمومی 1', 3, 'ندارد', 'ندارد', 'خیر', 'پايه', 0, 0),
(21, 1, 100505, 'فیزیک 1', 3, 'ندارد', 'ندارد', 'خیر', 'پايه', 0, 0),
(22, 1, 310090, 'کارگاه مبانی کامپیوتر و برنامه نویسی', 1, 'ندارد', 'مبانی كامپيوتر و برنامه سازی', 'خیر', 'اصلی', 0, 0),
(23, 1, 310009, 'كارگاه عمومی', 1, 'ندارد', 'ندارد', 'خیر', 'پايه', 0, 0),
(24, 2, 310012, ' برنامه سازی پيشرفته', 3, 'مبانی كامپيوتر و برنامه سازی', 'كارگاه برنامه نویسی پيشرفته', 'خیر', 'اصلی', 0, 0),
(25, 2, 310092, 'كارگاه برنامه نويسی پيشرفته', 1, 'ندارد', ' برنامه سازی پيشرفته', 'خیر', 'اصلی', 0, 0),
(26, 2, 310063, ' رياضيات گسسته', 3, 'رياضی عمومی 1، مبانی كامپيوتر و برنامه سازی', 'ندارد', 'خیر', 'اصلی', 0, 0),
(27, 2, 100501, 'رياضی عمومی 2', 3, 'رياضی عمومی 1', 'ندارد', 'خیر', 'پايه', 0, 0),
(28, 2, 100507, 'فیزیک 2', 3, 'ریاضی عمومی 1', 'ندارد', 'خیر', 'پايه', 0, 0),
(29, 2, 920001, 'تربیت بدنی', 1, 'ندارد', 'ندارد', 'خیر', 'عمومی', 0, 0),
(31, 3, 310019, 'مدارهای منطقی', 3, 'ندارد', 'رياضیات گسسته، آز مدار منطقی', 'خیر', 'اصلی', 0, 1),
(32, 3, 310093, 'مدارهای الکتریکی و الکترونیکی', 3, 'فیزیک 2', 'معادلات دیفرانسیل، آز مدارهای الکتریکی و الکترونیکی', 'خیر', 'اصلی', 0, 0),
(33, 3, 310094, 'آز مدارهای الکتریکی و الکترونیکی', 1, 'ندارد', 'مدارهای الکتریکی و الکترونیکی', 'خیر', 'اصلی', 0, 0),
(34, 3, 310015, 'ساختمان داده ها و الگوریتم ها', 3, 'ریاضیات گسسته، برنامه سازی پیشرفته', 'ندارد', 'خیر', 'اصلی', 0, 0),
(35, 3, 100502, 'معادلات دیفرانسیل', 3, 'ریاضی عمومی 1', 'ندارد', 'خیر', 'پایه ', 0, 0),
(36, 3, 100514, 'آز فیزیک 2', 1, 'فیزیک 2', 'ندارد', 'خیر', 'پایه', 0, 0),
(37, 3, 310016, 'زبان تخصصی', 2, 'زبان خارجه عمومی', 'ندارد', 'خیر', 'اصلی', 0, 0),
(38, 3, 920002, 'تربيت بدنی 2', 1, 'تربیت بدنی 1', 'ندارد', 'خیر', 'عمومی', 0, 0),
(39, 4, 100504, 'آمار و احتمالات مهندسی', 3, 'ریاضی عمومی 2', 'ندارد', 'خیر', 'پايه', 0, 0),
(40, 4, 310023, 'معماری کامپیوتر', 3, 'مدارهای منطقی', 'ندارد', 'خیر', 'اصلی', 0, 0),
(41, 4, 310026, 'نظریه زبان ها و ماشین ها ', 3, 'ساختمان داده ها و الگوریتم ها', 'ندارد', 'خیر', 'اصلی', 0, 0),
(42, 4, 310095, 'جبر خطی کاربردی', 3, 'ریاضی عمومی 2', 'ندارد', 'خیر', 'اصلی', 0, 0),
(43, 4, 310022, 'طراحی الگوریتم', 3, 'ساختمان داده ها و الگوریتم ها، ریاضیات گسسته', 'آمار و احتمالات مهندسی', 'خیر', 'تخصصی', 0, 0),
(44, 4, 310020, 'آز مدار منطقی', 1, 'مدارهای منطقی', 'ندارد', 'خیر', 'اصلی', 0, 0),
(45, 5, 310025, 'سیستم های عامل', 3, 'معماری کامپیوتر', 'آز سیستم عامل', 'خیر', 'اصلی', 0, 0),
(46, 5, 310059, 'آز سیستم عامل', 1, 'ندارد', 'سیستم های عامل', 'خیر', 'اصلی', 0, 0),
(47, 5, 310058, 'مهندسی نرم افزار1', 3, 'برنامه سازی پیشرفته', 'ندارد', 'خیر', 'اصلی', 0, 0),
(48, 5, 310116, 'سیستم های تصمیم یار', 3, 'ساختمان داده ها و الگوریتم ها', 'ندارد', 'بله', 'اختیاری', 0, 0),
(49, 5, 310061, 'اصول طراحی پایگاه داده', 3, 'ساختمان داده ها و الگوریتم ها', 'ندارد', 'بله', 'اختیاری', 0, 0),
(50, 5, 310024, 'آز معماری', 1, 'معماری کامپیوتر، آز مدار منطقی', 'ندارد', 'خیر', 'اصلی', 0, 0),
(51, 5, 310037, 'سیگنال ها و سیستم ها', 3, 'معادلات دیفرانسیل', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(52, 6, 310065, 'ریزپردازنده و زبان اسمبلی', 3, 'معماری کامپیوتر', 'آز ریز', 'خیر', 'اصلی', 0, 0),
(53, 6, 310088, 'روش پژوهش و ارائه', 3, 'زبان تخصصی', '', 'خیر', 'اصلی', 0, 0),
(54, 6, 310041, 'آز شبکه', 3, 'ندارد', 'شبکه های کامپیوتری', 'خیر', 'اصلی', 0, 0),
(55, 6, 310097, 'مبانی هوش محاسباتی', 3, 'طراحی الگوریتم', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(56, 6, 310039, 'انتقال داده ها', 3, 'سیستم های عامل', 'شبکه های کامپیوتری', 'خیر', 'تخصصی', 0, 0),
(57, 6, 310032, 'شبکه های کامپیوتری', 3, 'آمار و احتمالات مهندسی، معماری کامپیوتر', 'سیستم های عامل، آز شبکه', 'خیر', 'اصلی', 0, 0),
(58, 6, 310099, 'مبانی و کاربردهای هوش مصنوعی', 3, 'ساختمان داده ها و الگوریتم ها', 'جبر خطی کاربردی', 'خیر', 'تخصصی', 0, 0),
(59, 6, 310072, 'کارآموزی', 1, 'روش پژوهش و ارائه', 'ندارد', 'خیر ', 'اصلی', 0, 0),
(60, 7, 310102, 'مبانی امنیت اطلاعات', 3, 'شبکه های کامپیوتری', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(61, 7, 310101, ' مباني رايانش ابري', 3, 'شبکه های کامپیوتری، سیستم های عامل', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(62, 7, 310096, 'آز ریز', 1, '', 'ریزپردازنده و زبان اسمبلی', 'خیر', 'اصلی', 0, 0),
(63, 7, 310119, 'مقدمه ای بر بیوانفورماتیک', 3, 'مبانی هوش محاسباتی ، طراحی الگوريتم', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(64, 7, 310055, 'سیستم های خبره', 3, 'مبانی و کاربردهای هوش مصنوعی', 'ندارد', 'بله', 'اختیاری', 0, 0),
(65, 7, 310118, 'پردازش تصویر', 3, 'سیگنال ها و سیستم ها', 'ندارد', 'بله', 'اختیاری', 0, 0),
(66, 7, 310083, 'مباحث ویژه 1', 3, 'شبکه های کامپیوتری', 'ندارد', 'بله', 'اختیاری', 0, 0),
(67, 8, 310100, 'مبانی اینترنت اشیا', 3, 'ریزپردازنده و زبان اسمبلی، شبکه های کامپیوتری', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(68, 8, 310104, 'داده کاوی', 3, 'مباني هوش محاسباتي', 'ندارد', 'خیر', 'تخصصی', 0, 0),
(69, 8, 310042, ' پروژه', 3, 'روش پژوهش و ارائه', 'ندارد', 'خیر', 'اصلی', 0, 0),
(70, 8, 100409, 'كارآفرينی', 2, 'ندارد', 'ندارد', 'بله', '', 0, 0),
(71, 8, 310110, ' تعامل انسان و ماشين', 3, 'مهندسی نرم افزار1', 'ندارد', 'بله', 'اختیاری', 0, 0),
(72, 8, 310084, 'مباحث ویژه2', 3, 'مباحث ویژه1', 'ندارد', 'بله', 'اختیاری', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_prerequisites`
--

CREATE TABLE `course_prerequisites` (
  `course_id` int(11) NOT NULL,
  `prerequisite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `term` int(11) NOT NULL,
  `total_avg` float NOT NULL,
  `living_conditions` varchar(100) NOT NULL,
  `academic_conditions` varchar(100) NOT NULL,
  `career_goal` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `last_name`, `student_id`, `term`, `total_avg`, `living_conditions`, `academic_conditions`, `career_goal`, `password`) VALUES
(8, 'leshv', 'cdfj', 'sxgbn', 0, 57745, 'عالی', 'معدل ممتاز', 'هوش مصنوعی', '6545'),
(25, 'رانم', 'سیبلا', 'سیبا', 0, 40, 'مریض جسمی', 'مشروط', 'یادگیری ماشین', 'طسیزبا'),
(27, 'سیده', 'امیری', '991238575', 4, 15, 'عالی', 'معدل ممتاز', 'هوش مصنوعی', '123'),
(28, 'uhvo', 'ufhbjlk', 'uvhbijno', 4, 12, 'مریض جسمی', 'مشروط', 'یادگیری عمیق', '4653'),
(31, 'dsfh', 'asdfg', 'asdf', 3, 12, 'عالی', 'معدل ممتاز', 'هوش مصنوعی', '98632'),
(32, 'uhjhv', 'dxfjk', '543', 5, 14, 'ناراحتی روحی', 'معمولی', 'برنامه نویسی بک', '986132'),
(33, 'بیتا ', 'امیری', '991235085', 5, 15.3, 'عالی', 'معمولی', 'هوش مصنوعی', '123');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ethics_rating` int(11) DEFAULT NULL,
  `grading_methodology` varchar(255) DEFAULT NULL,
  `teaching_style` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `last_name`, `ethics_rating`, `grading_methodology`, `teaching_style`) VALUES
(1, 'فصیح فر', 10, '10', '10'),
(2, 'مسعودی فر', 10, '10', '10'),
(3, 'ملک زاده', 8, '2', '10'),
(4, 'ثباتی', 9, '4', '4'),
(5, 'نعمت الهی', 10, '7', '6'),
(6, 'طاهری', 10, '6', '0'),
(7, 'نجفی', 10, '10', '9'),
(9, 'حجازی', 10, '6', '10'),
(10, 'قزی', 7, '4', '2'),
(11, 'خداشناس', 10, '8', '9'),
(12, 'الله پور فدافن', 10, '10', '8'),
(13, 'نصرآبادی ', 10, '10', '10'),
(14, 'کریمی', 8, '8', '8'),
(15, 'میرزایی ', 8, '8', '8'),
(16, 'شعبانی ', 7, '8', '3'),
(17, 'استاجی علی اصغر', 7, '2', '6'),
(18, 'توکلی محمودآبادی', 7, '6', '9'),
(19, 'جعفرزاده مرتضی  ', 7, '5', '2'),
(20, 'مرتضائی زهرا  ', 4, '4', '2'),
(21, 'کمالی مقدم محمد', 9, '5', '8'),
(22, 'رفیعی امین ', 9, '8', '7'),
(23, 'استیری احسان 	', 6, '5', '5'),
(24, 'باعدی جواد ', 4, '1', '4'),
(25, 'توکلیان معظم ', 9, '4', '1'),
(26, 'اله داغی حسن ', 7, '4', '3'),
(27, 'حاجی پور احمد ', 6, '5', '2'),
(28, 'کرابی مریم ', 10, '8', '9'),
(29, 'رجایی مجید', 4, '5', '9'),
(30, 'خیرآبادی مرضیه ', 2, '0', '0'),
(32, 'طزری محمد ', 1, '2', '3'),
(33, 'صادق زاده', 10, '10', '4');

-- --------------------------------------------------------

--
-- Table structure for table `professor_course`
--

CREATE TABLE `professor_course` (
  `professor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor_course`
--

INSERT INTO `professor_course` (`professor_id`, `course_id`) VALUES
(1, 34),
(1, 43),
(1, 47),
(1, 49),
(1, 53),
(1, 55),
(1, 58),
(1, 59),
(1, 64),
(1, 71),
(2, 31),
(2, 43),
(2, 55),
(2, 59),
(2, 65),
(2, 66),
(2, 68),
(3, 40),
(3, 45),
(3, 52),
(3, 56),
(3, 57),
(3, 60),
(3, 67),
(33, 60);

-- --------------------------------------------------------

--
-- Table structure for table `remaining_courses`
--

CREATE TABLE `remaining_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `rule_name` varchar(255) NOT NULL,
  `rule_condition` text NOT NULL,
  `rule_action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `rule_name`, `rule_condition`, `rule_action`) VALUES
(1, 'بررسی پیش نیاز', 'NOT EXISTS (SELECT 1 FROM courses WHERE id = prerequisite AND pass = 1)', 'echo \"پیش‌نیاز این درس پاس نشده است.\";'),
(2, 'بررسی پیش نیاز', 'NOT EXISTS (SELECT 1 FROM courses WHERE id = prerequisite AND pass = 1)', 'echo \"پیش‌نیاز این درس پاس نشده است.\";'),
(3, 'هم نیاز', 'NOT EXISTS (SELECT 1 FROM courses WHERE id = co_requisite AND selected = 1)', 'echo \"درس هم‌نیاز انتخاب نشده است.\";'),
(4, 'ظرفیت واحد: دانشجو نمی‌تواند بیش از 20 واحد انتخاب کند.', '(SELECT SUM(unit) FROM courses WHERE selected = 1) > 20', 'echo \"حداکثر ظرفیت واحدها پر شده است.\";'),
(5, 'ظرفیت واحد: دانشجو نمی‌تواند بیش از 20 واحد انتخاب کند.', '(SELECT SUM(unit) FROM courses WHERE selected = 1) > 20', 'echo \"حداکثر ظرفیت واحدها پر شده است.\";'),
(6, 'درس‌های اجباری در ترم جاری: دانشجو باید دروس اجباری ترم جاری را انتخاب کند.', 'type = \'اجباری\' AND term = CURRENT_TERM AND selected = 0', 'echo \"دروس اجباری ترم جاری باید انتخاب شوند.\";'),
(7, 'هم نیاز', 'NOT EXISTS (SELECT 1 FROM courses WHERE id = co_requisite AND selected = 1)', 'echo \"درس هم‌نیاز انتخاب نشده است.\";'),
(8, 'درس‌های اجباری در ترم جاری: دانشجو باید دروس اجباری ترم جاری را انتخاب کند.', 'type = \'اجباری\' AND term = CURRENT_TERM AND selected = 0', 'echo \"دروس اجباری ترم جاری باید انتخاب شوند.\";'),
(9, 'هم نیاز', 'NOT EXISTS (SELECT 1 FROM courses WHERE id = co_requisite AND selected = 1)', 'echo \"درس هم‌نیاز انتخاب نشده است.\";'),
(10, 'درس‌های اختیاری: دانشجو باید حداقل یک درس اختیاری انتخاب کند.', 'type = \'اختیاری\' AND selected = 0', 'echo \"باید حداقل یک درس اختیاری انتخاب شود.\";'),
(11, 'درس‌های اختیاری: دانشجو باید حداقل یک درس اختیاری انتخاب کند.', 'type = \'اختیاری\' AND selected = 0', 'echo \"باید حداقل یک درس اختیاری انتخاب شود.\";'),
(12, 'بررسی وضعیت پاس شدن: اگر دانشجو درسی را قبلاً پاس کرده باشد، نباید دوباره انتخاب شود.', 'pass = 1 AND selected = 1', 'echo \"این درس قبلاً پاس شده است.\";'),
(13, 'بررسی تعداد مجاز دروس انتخابی: دانشجو نمی‌تواند بیش از 10 درس در یک ترم انتخاب کند.', '(SELECT COUNT(*) FROM courses WHERE selected = 1) > 10', 'echo \"حداکثر تعداد دروس انتخابی پر شده است.\";'),
(14, 'بررسی وضعیت پاس شدن: اگر دانشجو درسی را قبلاً پاس کرده باشد، نباید دوباره انتخاب شود.', 'pass = 1 AND selected = 1', 'echo \"این درس قبلاً پاس شده است.\";'),
(15, 'بررسی تعداد مجاز دروس انتخابی: دانشجو نمی‌تواند بیش از 10 درس در یک ترم انتخاب کند.', '(SELECT COUNT(*) FROM courses WHERE selected = 1) > 10', 'echo \"حداکثر تعداد دروس انتخابی پر شده است.\";'),
(16, 'بررسی سقف معدل: اگر معدل دانشجو کمتر از 12 باشد، حداکثر می‌تواند 14 واحد انتخاب کند.', '(SELECT AVG(grade) FROM grades WHERE student_id = CURRENT_STUDENT_ID) < 12', '  echo \"با توجه به معدل، حداکثر 14 واحد مجاز است.\";'),
(17, 'بررسی سقف معدل: اگر معدل دانشجو کمتر از 12 باشد، حداکثر می‌تواند 14 واحد انتخاب کند.', '(SELECT AVG(grade) FROM grades WHERE student_id = CURRENT_STUDENT_ID) < 12', '  echo \"با توجه به معدل، حداکثر 14 واحد مجاز است.\";');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `rule_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sql_statement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `rule_name`, `description`, `sql_statement`) VALUES
(1, 'پیش‌نیاز مبانی کامپیوتر و برنامه‌نویسی', 'بررسی می‌شود که آیا دانشجو پیش‌نیاز درس مبانی کامپیوتر و برنامه‌نویسی را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"مبانی کامپیوتر و برنامه‌نویسی\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_id = c.prerequisite\r\n              AND sc.grade >= 10\r\n        );'),
(2, 'هم‌نیاز مبانی کامپیوتر و برنامه‌نویسی با کارگاه مبانی کامپیوتر', 'دانشجو باید کارگاه مبانی کامپیوتر را به‌عنوان هم‌نیاز مبانی کامپیوتر و برنامه‌نویسی اخذ کند.', 'SELECT \r\n        c1.course_name AS Main_Course, \r\n        c2.course_name AS Co_Requisite \r\n     FROM \r\n        courses c1\r\n     JOIN \r\n        courses c2 ON c1.co_requisite = c2.id\r\n     WHERE \r\n        c1.course_name = \"مبانی کامپیوتر و برنامه‌نویسی\"\r\n        AND c2.course_name = \"کارگاه مبانی کامپیوتر\";'),
(3, 'پیش‌نیاز ریاضی عمومی', 'بررسی می‌شود که آیا دانشجو پیش‌نیاز درس ریاضی عمومی را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"ریاضی عمومی\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_id = c.prerequisite\r\n              AND sc.grade >= 10\r\n        );'),
(4, 'هم‌نیاز کارگاه عمومی برق', 'بررسی می‌شود که آیا کارگاه عمومی برق دارای هم‌نیاز است یا خیر.', 'SELECT \r\n        c.course_name AS Workshop, \r\n        c.co_requisite AS Co_Requisite \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"کارگاه عمومی برق\"\r\n        AND c.co_requisite IS NOT NULL;'),
(5, 'پیش‌نیاز زبان فارسی', 'بررسی می‌شود که آیا زبان فارسی پیش‌نیاز دارد یا خیر.', 'SELECT \r\n        c.course_name AS Course, \r\n        c.prerequisite AS Prerequisite \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"زبان فارسی\"\r\n        AND c.prerequisite IS NOT NULL;'),
(6, 'محدودیت زبان انگلیسی', 'بررسی می‌شود که آیا محدودیتی برای انتخاب زبان انگلیسی وجود دارد.', 'SELECT \r\n        c.course_name AS Course, \r\n        c.optional AS Optional_Status \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"زبان انگلیسی\";'),
(7, 'پیش‌نیاز برنامه‌نویسی پیشرفته', 'بررسی می‌شود که آیا دانشجو مبانی کامپیوتر و برنامه‌نویسی را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"برنامه‌نویسی پیشرفته\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_id = c.prerequisite\r\n              AND sc.grade >= 10\r\n        );'),
(8, 'پیش‌نیاز برنامه‌نویسی پیشرفته با برنامه‌سازی', 'بررسی می‌شود که آیا دانشجو برنامه‌سازی را قبلاً پاس کرده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"برنامه‌نویسی پیشرفته\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"برنامه‌سازی\"\r\n              AND sc.grade >= 10\r\n        );'),
(9, 'هم‌نیاز کارگاه برنامه‌سازی پیشرفته', 'بررسی می‌شود که آیا دانشجو کارگاه برنامه‌سازی پیشرفته را هم‌زمان با برنامه‌نویسی پیشرفته انتخاب کرده است.', 'SELECT \r\n        c1.course_name AS Main_Course, \r\n        c2.course_name AS Co_Requisite \r\n     FROM \r\n        courses c1\r\n     JOIN \r\n        courses c2 ON c1.co_requisite = c2.id\r\n     WHERE \r\n        c1.course_name = \"برنامه‌نویسی پیشرفته\"\r\n        AND c2.course_name = \"کارگاه برنامه‌سازی پیشرفته\";'),
(10, 'رفع افتادگی در مبانی برنامه‌سازی برای برنامه‌نویسی پیشرفته', 'بررسی می‌شود که آیا دانشجو مبانی کامپیوتر و برنامه‌نویسی را دو بار افتاده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"برنامه‌نویسی پیشرفته\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"مبانی کامپیوتر و برنامه‌نویسی\"\r\n              AND sc.fail_count < 2\r\n        );'),
(11, 'پیش‌نیاز ریاضیات گسسته', 'بررسی می‌شود که آیا دانشجو مبانی کامپیوتر و برنامه‌سازی را قبلاً پاس کرده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"ریاضیات گسسته\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"مبانی کامپیوتر و برنامه‌سازی\"\r\n              AND sc.grade >= 10\r\n        );'),
(12, 'پیش‌نیاز ریاضیات 2', 'بررسی می‌شود که آیا دانشجو ریاضیات 1 را قبلاً پاس کرده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"ریاضیات 2\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"ریاضیات 1\"\r\n              AND sc.grade >= 10\r\n        );'),
(13, 'رفع افتادگی ریاضی 1 برای انتخاب ریاضی 2', 'بررسی می‌شود که آیا دانشجو ریاضی 1 را دو بار افتاده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"ریاضیات 2\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"ریاضی 1\"\r\n              AND sc.fail_count < 2\r\n        );'),
(14, 'پیش‌نیاز فیزیک 2', 'بررسی می‌شود که آیا دانشجو فیزیک 1 را قبلاً پاس کرده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"فیزیک 2\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"فیزیک 1\"\r\n              AND sc.grade >= 10\r\n        );'),
(15, 'پیش‌نیاز تربیت بدنی 2', 'بررسی می‌شود که آیا دانشجو درس تربیت بدنی 1 را قبلاً پاس کرده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"تربیت بدنی 2\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"تربیت بدنی 1\"\r\n              AND sc.grade >= 10\r\n        );'),
(16, 'انتخاب درس دانش خانواده و جمعیت', 'بررسی می‌شود که آیا دانشجو نیاز به گذراندن درس معارف (دانش خانواده و جمعیت) دارد.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"دانش خانواده و جمعیت\";'),
(17, 'پیش‌نیاز مدار منطقی', 'بررسی می‌شود که آیا دانشجو آزمایشگاه مدار منطقی را هم‌نیاز با مدار منطقی انتخاب کرده است.', 'SELECT \r\n        c1.course_name AS Main_Course, \r\n        c2.course_name AS Co_Requisite \r\n     FROM \r\n        courses c1\r\n     JOIN \r\n        courses c2 ON c1.co_requisite = c2.id\r\n     WHERE \r\n        c1.course_name = \"مدار منطقی\"\r\n        AND c2.course_name = \"آزمایشگاه مدار منطقی\";'),
(18, 'پیش‌نیاز معماری کامپیوتر', 'بررسی می‌شود که آیا دانشجو درس مدار منطقی را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"معماری کامپیوتر\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"مدار منطقی\"\r\n              AND sc.grade >= 10\r\n        );'),
(19, 'رفع افتادگی مبانی کامپیوتر برای طراحی الگوریتم‌ها', 'بررسی می‌شود که آیا دانشجو مبانی کامپیوتر و برنامه‌نویسی را دو بار افتاده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"طراحی الگوریتم‌ها\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"مبانی کامپیوتر و برنامه‌نویسی\"\r\n              AND sc.fail_count < 2\r\n        );'),
(20, 'هم‌نیاز سیستم‌عامل با آزمایشگاه سیستم‌عامل', 'بررسی می‌شود که آیا دانشجو درس سیستم‌عامل و آزمایشگاه آن را هم‌زمان اخذ کرده است.', 'SELECT \r\n        c1.course_name AS Main_Course, \r\n        c2.course_name AS Co_Requisite \r\n     FROM \r\n        courses c1\r\n     JOIN \r\n        courses c2 ON c1.co_requisite = c2.id\r\n     WHERE \r\n        c1.course_name = \"سیستم‌عامل\"\r\n        AND c2.course_name = \"آزمایشگاه سیستم‌عامل\";'),
(21, 'پیش‌نیاز شبکه‌های کامپیوتری', 'بررسی می‌شود که آیا دانشجو معماری کامپیوتر را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"شبکه‌های کامپیوتری\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"معماری کامپیوتر\"\r\n              AND sc.grade >= 10\r\n        );'),
(22, 'پیش‌نیاز امنیت شبکه', 'بررسی می‌شود که آیا دانشجو شبکه‌های کامپیوتری را گذرانده است.', 'SELECT \r\n        c.course_name AS Required_Course \r\n     FROM \r\n        courses c \r\n     WHERE \r\n        c.course_name = \"امنیت شبکه\"\r\n        AND NOT EXISTS (\r\n            SELECT 1 \r\n            FROM student_courses sc\r\n            WHERE sc.student_id = @student_id\r\n              AND sc.course_name = \"شبکه‌های کامپیوتری\"\r\n              AND sc.grade >= 10\r\n        );'),
(23, 'Computer Fundamentals and Programming', 'اگر دانشجو بخواهد مبانی کامپیوتر و برنامه سازی را بردارد، آنگاه هیچ پیشنیازی ندارد و میتواند با کارگاه مبانی کامپیوتر و برنامه نویسی همنیاز بردارد.', 'SELECT 1 AS can_take_course, 1 AS can_co_take_workshop WHERE course_name = \"مبانی کامپیوتر و برنامه سازی\"'),
(24, 'Computer Workshop', 'اگر دانشجو بخواهد کارگاه مبانی کامپیوتر و برنامه نویسی را بردارد، آنگاه می تواند مبانی کامپیوتر و برنامه نویسی را همنیاز بردارد.', 'SELECT 1 AS can_take_course, 1 AS can_co_take_workshop WHERE course_name = \"کارگاه مبانی کامپیوتر و برنامه نویسی\"'),
(25, 'General Mathematics 1', 'اگر دانشجو بخواهد ریاضی عمومی 1 را بردارد، آنگاه هیچ پیشنیازی ندارد.', 'SELECT 1 AS can_take_course WHERE course_name = \"ریاضی عمومی 1\"'),
(26, 'General Workshop or Electric Workshop', 'اگر دانشجو بخواهد کارگاه عمومی را بردارد، آنگاه هیچ پیشنیازی ندارد.', 'SELECT 1 AS can_take_course WHERE course_name IN (\"کارگاه عمومی\")'),
(27, 'Physics 1', 'اگر دانشجو بخواهد فیزیک 1 را بردارد، آنگاه هیچ پیشنیازی ندارد.', 'SELECT 1 AS can_take_course WHERE course_name = \"فیزیک 1\"'),
(28, 'Persian Language', 'اگر دانشجو بخواهد زبان فارسی را بردارد، آنگاه هیچ پیشنیازی ندارد.', 'SELECT 1 AS can_take_course WHERE course_name = \"زبان فارسی\"'),
(29, 'English Language', 'اگر دانشجو بخواهد زبان انگلیسی را بردارد، آنگاه هیچ پیش نیازی ندارد.', 'SELECT 1 AS can_take_course WHERE course_name = \"زبان خارجه عمومی\"');

-- --------------------------------------------------------

--
-- Table structure for table `selected_courses`
--

CREATE TABLE `selected_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseha`
--
ALTER TABLE `courseha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_prerequisites`
--
ALTER TABLE `course_prerequisites`
  ADD PRIMARY KEY (`course_id`,`prerequisite_id`),
  ADD KEY `prerequisite_id` (`prerequisite_id`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_course`
--
ALTER TABLE `professor_course`
  ADD PRIMARY KEY (`professor_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `remaining_courses`
--
ALTER TABLE `remaining_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_courses`
--
ALTER TABLE `selected_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseha`
--
ALTER TABLE `courseha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `remaining_courses`
--
ALTER TABLE `remaining_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `selected_courses`
--
ALTER TABLE `selected_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_prerequisites`
--
ALTER TABLE `course_prerequisites`
  ADD CONSTRAINT `course_prerequisites_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_prerequisites_ibfk_2` FOREIGN KEY (`prerequisite_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD CONSTRAINT `course_registration_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `professor_course`
--
ALTER TABLE `professor_course`
  ADD CONSTRAINT `professor_course_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professor_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `remaining_courses`
--
ALTER TABLE `remaining_courses`
  ADD CONSTRAINT `remaining_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `remaining_courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `crud` (`id`);

--
-- Constraints for table `selected_courses`
--
ALTER TABLE `selected_courses`
  ADD CONSTRAINT `selected_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `selected_courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `crud` (`id`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `crud` (`id`),
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
