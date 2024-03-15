-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 05:57 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct275_project`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `countbook` (IN `nameIDC` INT)   BEGIN
SELECT COUNT(bookId) as soluong FROM book WHERE nameId = nameIDC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `nameId` int(11) DEFAULT NULL,
  `bookState` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`bookId`, `nameId`, `bookState`) VALUES
(1, 1, 'free'),
(2, 1, 'free'),
(3, 1, 'free'),
(4, 1, 'free'),
(5, 1, 'free'),
(6, 6, 'free'),
(7, 7, 'free'),
(8, 8, 'free'),
(9, 9, 'free'),
(10, 10, 'free'),
(11, 11, 'free'),
(12, 12, 'free'),
(13, 13, 'free'),
(14, 14, 'free'),
(15, 15, 'free'),
(16, 16, 'free'),
(17, 17, 'free'),
(18, 18, 'free'),
(19, 19, 'free'),
(20, 20, 'free'),
(21, 21, 'free'),
(22, 22, 'free'),
(23, 23, 'free'),
(24, 24, 'free'),
(25, 25, 'free'),
(26, 26, 'free'),
(27, 27, 'free'),
(28, 28, 'free'),
(29, 29, 'free'),
(30, 30, 'free'),
(31, 31, 'free'),
(32, 32, 'free'),
(33, 33, 'free'),
(34, 34, 'free'),
(35, 35, 'free'),
(36, 36, 'free'),
(37, 37, 'free'),
(38, 38, 'free'),
(39, 39, 'free'),
(40, 40, 'free'),
(41, 41, 'free'),
(42, 42, 'free'),
(43, 43, 'free'),
(44, 44, 'free'),
(45, 45, 'free'),
(46, 46, 'free'),
(47, 47, 'free'),
(48, 48, 'free'),
(49, 49, 'free'),
(50, 50, 'free'),
(51, 51, 'free'),
(52, 52, 'free'),
(53, 53, 'free'),
(54, 54, 'free'),
(55, 55, 'free'),
(56, 56, 'free'),
(57, 57, 'free'),
(58, 58, 'free'),
(59, 59, 'free'),
(60, 60, 'free'),
(61, 61, 'free'),
(62, 62, 'free'),
(63, 63, 'free'),
(64, 64, 'free'),
(65, 65, 'free'),
(66, 66, 'free'),
(67, 67, 'free'),
(68, 68, 'free'),
(69, 69, 'free'),
(70, 70, 'free'),
(71, 71, 'free'),
(72, 72, 'free'),
(73, 73, 'free'),
(74, 74, 'free'),
(75, 75, 'free'),
(76, 76, 'free'),
(77, 77, 'free'),
(78, 78, 'free'),
(79, 79, 'free'),
(80, 80, 'free'),
(81, 81, 'free'),
(82, 82, 'free'),
(83, 83, 'free'),
(84, 84, 'free'),
(85, 85, 'free'),
(86, 86, 'free'),
(87, 87, 'free'),
(88, 88, 'free'),
(89, 89, 'free'),
(90, 90, 'free'),
(91, 91, 'free'),
(92, 92, 'free'),
(93, 93, 'free'),
(94, 94, 'free'),
(95, 95, 'free'),
(96, 96, 'free'),
(97, 97, 'free'),
(98, 98, 'free'),
(99, 99, 'free'),
(100, 100, 'free');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookname`
--

CREATE TABLE `bookname` (
  `nameId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `typeId` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publishingCompany` varchar(50) DEFAULT NULL,
  `shortIntro` varchar(200) DEFAULT NULL,
  `shortContent` varchar(3000) DEFAULT NULL,
  `coverImg` varchar(50) DEFAULT NULL,
  `dateUpdate` date NOT NULL DEFAULT current_timestamp(),
  `cost` int(20) NOT NULL DEFAULT 20000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookname`
--

INSERT INTO `bookname` (`nameId`, `name`, `typeId`, `author`, `publishingCompany`, `shortIntro`, `shortContent`, `coverImg`, `dateUpdate`, `cost`) VALUES
(1, 'voluptate', 1, 'Dameon Lockman', 'Kuhn, Stiedemann and King', 'Ipsum qui eos consequatur porro repudiandae sequi quo. Itaque quidem maxime nam et sed quo iusto. Omnis ex animi nihil similique est deserunt optio.', 'Non et minima quam et. Dolorem ut et ex quaerat. Sint dolore ut officia sunt sequi. Quia dolor suscipit sint labore.', 'img/defavatar.webp', '2023-11-14', 20000),
(2, 'placeat', 2, 'Dameon Lockman', 'Harber, Mills and Hackett', 'In voluptas assumenda quibusdam eos delectus omnis. Ipsum omnis et non id quo omnis beatae. Aliquam iste magni quo nulla voluptatem. Ea animi eius facilis assumenda eveniet qui.', 'Ab quis libero qui vel ut consequatur. Recusandae aut sed consectetur. Et laboriosam qui voluptatem et et eum. Laborum nesciunt consequuntur fugit velit qui nam laudantium.', 'img/defavatar.webp', '2023-11-14', 20000),
(3, 'rem', 3, 'Dameon Lockman', 'Raynor, Ritchie and Carter', 'Molestiae excepturi velit asperiores quos asperiores corporis possimus est. Natus ut animi aspernatur dolor. Non et animi sed repellat voluptas accusamus.', 'Iure sint excepturi maxime id voluptatem soluta. Nostrum facilis eaque odio assumenda consequuntur. Autem dolores iste alias vel est inventore.', 'img/defavatar.webp', '2023-11-14', 20000),
(4, 'molestiae', 4, 'Dameon Lockman', 'Prosacco-Lueilwitz', 'Dolore blanditiis ut dolorem quia placeat repellendus quas. Dolores molestiae debitis fuga enim et. Dolor in et vel aut.', 'Dignissimos sit vel in rerum iusto. Omnis illo architecto vitae laborum consequatur.', 'img/defavatar.webp', '2023-11-14', 20000),
(5, 'quia', 5, 'Dameon Lockman', 'Pollich-Pouros', 'Sint qui veritatis commodi et et ut error. Consequuntur reiciendis distinctio incidunt. Quidem cupiditate dolorem aut. Voluptatem sequi cum velit voluptatibus tempora et cumque.', 'Sunt explicabo ipsum ut. Molestiae porro nesciunt non cupiditate ea. Eum quis rem et odio labore.', 'img/defavatar.webp', '2023-11-14', 20000),
(6, 'omnis', 6, 'Dameon Lockman', 'Wolf PLC', 'Error facere officia nobis. Veritatis eum ipsa cum hic. Qui eos quia dolorem tempora voluptatibus ea. Impedit maxime neque blanditiis cupiditate omnis sunt.', 'Ipsam rerum sint non rem nesciunt. Qui accusantium quia ut tempora et et. Accusamus repellendus earum voluptatum ducimus animi blanditiis sed voluptas. Nihil blanditiis consequuntur eligendi amet iusto sequi.', 'img/defavatar.webp', '2023-11-14', 20000),
(7, 'et', 7, 'Prof. Orville Feeney I', 'Braun, Upton and Davis', 'Rerum eveniet omnis quia ad. Officiis perferendis est quia tenetur nostrum ipsam iusto. Voluptates perspiciatis aut animi aut distinctio.', 'Quo quia ducimus veniam eum ipsum natus. Enim facere ut at dolore. Autem enim aut aperiam ducimus culpa quod inventore est.', 'img/defavatar.webp', '2023-11-14', 20000),
(8, 'reiciendis', 8, 'Ms. Abbie Yost', 'Padberg Inc', 'Veniam voluptas rem consequatur voluptatibus praesentium. Aut hic occaecati explicabo tempora. Vitae veniam voluptatum ratione recusandae eius qui rem. Et ea deserunt quia quis.', 'Aut at nihil pariatur rerum. Laboriosam unde qui voluptates et recusandae quia dolorum. Qui minima iusto impedit delectus quos. Sed dolores dignissimos temporibus.', 'img/defavatar.webp', '2023-11-14', 20000),
(9, 'aut', 9, 'Mckenna Cummerata II', 'Johns and Sons', 'Aut nulla a aut. Dignissimos eos enim quod ea blanditiis fugit. Et reprehenderit a quis.\nNon in saepe aut vitae. Occaecati voluptates autem omnis ut rerum.', 'Reiciendis at est deleniti voluptates possimus id tempora. Quia unde quasi rem eos. Ut laudantium sit accusamus aliquid ratione sit placeat. Et alias quia architecto illum officiis tempore commodi.', 'img/defavatar.webp', '2023-11-14', 20000),
(10, 'facilis', 10, 'Miss Verona Langworth', 'Feest-Miller', 'Enim eveniet sed et magni. Aspernatur qui rerum neque est aut error in. Sit aliquam quos tempora exercitationem nesciunt fugit qui. Soluta vero voluptatem iure.', 'Repudiandae sed et voluptate sapiente error earum repellendus iste. Corporis optio est corporis unde a. Rerum assumenda ut sit. Doloribus provident voluptate voluptates doloremque reprehenderit sed voluptate praesentium.', 'img/defavatar.webp', '2023-11-14', 20000),
(11, 'illo', 11, 'Prof. Reece Weimann III', 'Kunze-Braun', 'Non quaerat modi harum ut sapiente id dolorem. Consequuntur quibusdam dolore aut perspiciatis id cumque. Perferendis aut qui molestiae aut.', 'Tempora doloremque ullam eaque omnis est. Blanditiis nesciunt ullam esse expedita ratione quae. Ut esse sunt ipsam eum. Non porro vero sequi fugiat iusto.', 'img/defavatar.webp', '2023-11-14', 20000),
(12, 'nobis', 11, 'Holly Waelchi II', 'Grimes Group', 'Dolor quis dolore delectus iusto quo eum ex quis. Beatae non ut consequuntur qui totam ipsam eaque. Voluptatibus in quos voluptas minus.', 'Voluptates odio cum eligendi consequatur deleniti in. Eum itaque optio repellat iste. Alias reiciendis hic odit eos et incidunt. Culpa voluptas voluptas ex excepturi culpa.', 'img/defavatar.webp', '2023-11-14', 20000),
(13, 'facere', 11, 'Russel Sanford', 'Labadie LLC', 'Tenetur magni qui voluptate dignissimos doloremque autem dolorem. Mollitia quia vero voluptatem debitis qui dolorum qui. Enim recusandae inventore quia officiis optio officiis.', 'Praesentium qui iusto sunt accusamus vero laborum ut. Provident qui minus est. Est commodi necessitatibus mollitia consequatur.', 'img/defavatar.webp', '2023-11-14', 20000),
(14, 'et', 11, 'Daron Parisian I', 'Boyle-Emmerich', 'Dolore libero tenetur tempore sit. In aperiam distinctio dolor sunt. Dolores soluta blanditiis occaecati aut minus ut officia molestiae.', 'Molestias corporis at tempore quaerat sequi. Quaerat facilis cupiditate perspiciatis omnis voluptas. Cumque ex animi eaque beatae. Unde in explicabo et voluptatem. Voluptas veritatis totam debitis odio.', 'img/defavatar.webp', '2023-11-14', 20000),
(15, 'temporibus', 11, 'Charlene Grimes Sr.', 'Heidenreich, Price and Hickle', 'Aut sit reprehenderit et rerum voluptatem. Sequi eius dolorum aut laudantium. Molestias quasi vitae quo quaerat ut labore quos. Necessitatibus culpa quidem id dolorem voluptas consequatur.', 'Rerum sunt tenetur voluptates eaque ut reiciendis qui. Nihil blanditiis necessitatibus rerum ipsa autem rerum. Ut qui ipsa vero aut occaecati voluptas rerum.', 'img/defavatar.webp', '2023-11-14', 20000),
(16, 'eum', 6, 'Dr. Lou VonRueden', 'Willms PLC', 'Blanditiis exercitationem molestias quaerat et. Quia eaque assumenda excepturi et ratione. Aut deserunt omnis cupiditate sed sunt. Aut sed doloremque natus.', 'Magni voluptatem voluptatem omnis incidunt facilis consectetur. Vel hic nulla iste officia ex error. Exercitationem ex perspiciatis eos ducimus. Quaerat voluptate esse facilis possimus et quis.', 'img/defavatar.webp', '2023-11-14', 20000),
(17, 'ut', 7, 'Ms. Libbie Hane IV', 'Cassin-Bins', 'Omnis voluptatem voluptas sed illo voluptas eligendi. Voluptatem dolorem est quam et veniam. Ullam et et et est.', 'Illum sit voluptas tempore atque rerum. Sint dolorem veniam distinctio est id. Quo in adipisci est.', 'img/defavatar.webp', '2023-11-14', 20000),
(18, 'quis', 8, 'Pierce Kulas', 'Hickle, OConner and King', 'Et maxime officiis incidunt. Autem nulla nam laudantium aut natus. Beatae sit natus qui dolores id. Veniam est aut dolore nihil velit fugiat.', 'Voluptatem voluptatum voluptate ut nemo unde. Corporis rerum quasi amet beatae quia accusantium sapiente. Reprehenderit reprehenderit fugit doloribus quia.', 'img/defavatar.webp', '2023-11-14', 20000),
(19, 'veniam', 9, 'Cortney Reilly', 'Fay-Kemmer', 'Doloremque odio et eveniet nobis ut. Dolor et cumque nam minima reiciendis. Dolore magni delectus quos harum odio ipsam distinctio. Voluptatem culpa voluptatem qui nisi corporis debitis.', 'Totam doloribus libero nesciunt. Consequuntur pariatur autem eaque tempore. Et cumque sit accusantium inventore. Rerum nam sapiente fugit sed iste aut.', 'img/defavatar.webp', '2023-11-14', 20000),
(20, 'vitae', 10, 'Jimmie Leffler', 'Bartell Ltd', 'Amet fugit animi molestiae aut accusamus officiis ab sunt. Labore nam explicabo alias reprehenderit sed.', 'Accusantium repudiandae sunt harum iusto voluptas labore. Porro a qui doloribus harum iure voluptatem quia. Et illo qui quis incidunt vel deserunt. Eum quas optio nulla sunt molestiae.', 'img/defavatar.webp', '2023-11-14', 20000),
(21, 'voluptatum', 1, 'Demarcus Mueller', 'Lesch-Nienow', 'Qui quam totam repudiandae quia nulla ut. In quia quia rerum deleniti vel. Tenetur quia ipsam omnis doloremque officiis. Temporibus temporibus dicta doloribus.', 'Consequatur sit tempora enim quos ea quo ducimus. Culpa voluptatem ut magni veritatis non distinctio et. Non consequatur provident consequuntur repellendus magni est necessitatibus dolorem.', 'img/defavatar.webp', '2023-11-14', 20000),
(22, 'enim', 2, 'Aniyah Kemmer DDS', 'Skiles-Powlowski', 'Odio nostrum consequatur nesciunt neque. Voluptate architecto rerum velit neque eum. Ut illo et sunt debitis.', 'Esse modi modi quasi aut ut sint voluptatibus. Et veniam ut laudantium ex dolor qui libero eos. Fugiat exercitationem tempore ea. Voluptatem qui excepturi est explicabo cumque.', 'img/defavatar.webp', '2023-11-14', 20000),
(23, 'eos', 3, 'Gunner Nolan', 'Howell-Thompson', 'Consequuntur quo cumque tempore veritatis. Velit nihil laboriosam adipisci magni enim. Distinctio modi rem doloribus delectus tempora nemo ullam. Impedit officia quia veritatis cumque.', 'Est aut ea aut ea sed sed deserunt. Sequi et libero enim architecto ea minus voluptatem a. Delectus impedit quaerat rem beatae quia.', 'img/defavatar.webp', '2023-11-14', 20000),
(24, 'inventore', 4, 'Prof. Faustino Altenwerth', 'Parker-Kovacek', 'Est et consequatur non ducimus quia distinctio. Consequuntur et ipsum aspernatur natus. Harum ex voluptatum veritatis impedit tempora perferendis. Omnis voluptate alias voluptate aut deleniti ex ut.', 'Dolore quibusdam quidem hic optio id eius. Praesentium inventore doloremque qui omnis. Error unde vitae alias commodi quod laudantium. Est quis qui dolor.', 'img/defavatar.webp', '2023-11-14', 20000),
(25, 'architecto', 5, 'Zora Waelchi', 'Bradtke, Mueller and Hamill', 'Cum unde illo voluptatem aspernatur sed. Quisquam qui dolorem et qui est unde earum. Porro ipsum nisi labore est libero. Et nisi qui possimus blanditiis.', 'Et est aut assumenda exercitationem voluptates dolores ipsum. Aut cupiditate vero est quia nam. Cupiditate dolores fugit quo voluptates sed.', 'img/defavatar.webp', '2023-11-14', 20000),
(26, 'et', 6, 'Alycia Schulist Sr.', 'Schuppe-Stracke', 'Maiores impedit molestiae id assumenda quia repellat. Ex ea fugit sit facere sed fuga. Eius et occaecati et laudantium veritatis.', 'Accusamus harum incidunt impedit consequatur temporibus officia eveniet. Aliquam possimus officia alias corporis quae voluptas. Nisi quas architecto assumenda. Sit perspiciatis odit ut mollitia. Veritatis eos molestias atque ducimus a autem harum commodi.', 'img/defavatar.webp', '2023-11-14', 20000),
(27, 'reprehenderit', 7, 'Caroline Boyle', 'Schumm LLC', 'Cupiditate dicta eos minima provident fugit voluptatibus eos. Corporis adipisci voluptas optio quasi. Inventore ut fugit ut tempora itaque hic.', 'Laudantium cum ipsa facere veritatis sunt perspiciatis. Pariatur ipsam et mollitia atque iure et voluptas quia. Et omnis sint recusandae recusandae eos nostrum.', 'img/defavatar.webp', '2023-11-14', 20000),
(28, 'rerum', 8, 'Penelope Pagac PhD', 'Olson-VonRueden', 'Et sequi mollitia rem voluptas sunt. Aut quas voluptas illum excepturi quia voluptas dolorem aut. Occaecati et rerum adipisci laborum dolorum.', 'Dolores facilis qui omnis porro. Cumque maxime aspernatur quam. Sed modi iste libero ea. Voluptas culpa temporibus eveniet minus aut.', 'img/defavatar.webp', '2023-11-14', 20000),
(29, 'assumenda', 9, 'Mrs. Dakota Murray', 'Feil, Dibbert and Thompson', 'Reprehenderit a aliquid animi enim eveniet minus. Rerum vitae beatae fuga quia et voluptas id sit. Eum molestiae distinctio laboriosam. A veritatis suscipit dolorem eaque quisquam.', 'Fuga adipisci nemo nobis maxime veritatis qui et. Animi ipsum earum numquam voluptatibus et expedita reprehenderit omnis.', 'img/defavatar.webp', '2023-11-14', 20000),
(30, 'architecto', 10, 'Ms. Magdalena Bechtelar', 'Schumm, Bosco and Effertz', 'Voluptates omnis qui hic cumque minima voluptatum alias. Et aperiam saepe aut praesentium id. Qui est aut voluptatem aperiam dolore labore aspernatur quia. Earum voluptates cumque porro quam.', 'Nesciunt ducimus ut expedita iure corporis ab. Animi officiis voluptas neque sit aut. Debitis doloribus distinctio voluptas. Placeat temporibus placeat vitae est ducimus.', 'img/defavatar.webp', '2023-11-14', 20000),
(31, 'et', 1, 'Miss Mercedes Sawayn', 'Flatley and Sons', 'Sed praesentium officiis possimus recusandae error. Alias sapiente sed dignissimos non. Quod ea consectetur ut accusantium sed atque. Et quod earum est et non minus.', 'Quibusdam ut delectus excepturi. Ducimus est nihil repellendus quia. Corrupti quia dignissimos ipsum dolorum.', 'img/defavatar.webp', '2023-11-14', 20000),
(32, 'vero', 2, 'Victoria Homenick', 'Brown Ltd', 'Odit eos mollitia hic unde porro impedit laborum. Recusandae libero est et blanditiis placeat. Aut qui odit nulla autem magni.', 'Quae magni quia error temporibus. Molestiae aut commodi id est labore.', 'img/defavatar.webp', '2023-11-14', 20000),
(33, 'accusantium', 3, 'Kayleigh Schulist', 'Wilkinson Group', 'Atque nihil qui eum laudantium perspiciatis nam sit. Impedit adipisci repellendus illo ipsum aliquam. Magni aut ipsam voluptas quidem rerum qui provident. Et ut illum velit et reiciendis porro.', 'Consequatur omnis natus omnis consequatur eaque repellendus. Qui nulla sit autem laudantium. Optio quam ut libero explicabo.', 'img/defavatar.webp', '2023-11-14', 20000),
(34, 'libero', 4, 'Giovanna Russel', 'Bauch LLC', 'Quia quia soluta nam consequatur. Nihil eos voluptatem sed odio et. Quia qui et nisi ipsam. Dolor officiis ipsa non voluptatem velit eveniet fugiat.', 'Ut ipsam alias delectus minus consequatur pariatur voluptatem. Quidem sint consequatur aut aut excepturi. Excepturi iste et ut aut perspiciatis amet dolor.', 'img/defavatar.webp', '2023-11-14', 20000),
(35, 'ea', 5, 'Miss Dejah Block II', 'Johnston PLC', 'Iusto quo ea mollitia ratione pariatur. Maxime sit sunt illum molestiae quia aut libero. Earum aut molestiae tenetur eum autem aut est. Sunt non id soluta.', 'Excepturi corrupti sed sed. Placeat explicabo est mollitia blanditiis tempora est et saepe. Quos facilis dolores placeat nesciunt.', 'img/defavatar.webp', '2023-11-14', 20000),
(36, 'debitis', 6, 'Dr. Joesph Mann', 'Reichel and Sons', 'Illum et officiis beatae enim laborum. Unde eaque enim possimus occaecati labore. Sunt consequatur maiores qui ex.', 'Ipsam qui facere ut quisquam qui et. Placeat alias provident veritatis. Perferendis odio praesentium quia earum qui nam aspernatur. Ut porro aspernatur et distinctio.', 'img/defavatar.webp', '2023-11-14', 20000),
(37, 'assumenda', 7, 'Karley Bartell MD', 'Kris Inc', 'Ducimus est nihil explicabo. Laudantium deleniti delectus soluta voluptatem facere suscipit minus praesentium.', 'Assumenda ipsa qui eos non veritatis quaerat. Voluptatibus consequatur dolorem consequuntur vel explicabo dolores in. Dolorum qui dolorem autem in est ut. Rerum vel inventore earum.', 'img/defavatar.webp', '2023-11-14', 20000),
(38, 'voluptatem', 8, 'Annette Reinger', 'Jaskolski, Cummings and Pouros', 'Ea voluptas omnis et placeat dolor in assumenda. Dolores et sint velit nihil. In fugiat ut culpa voluptatum neque voluptatibus consequatur.', 'Omnis quidem et pariatur. Omnis ut qui quaerat repellendus. Omnis asperiores earum cupiditate facere placeat sequi animi sequi. Vel velit provident doloremque minus.', 'img/defavatar.webp', '2023-11-14', 20000),
(39, 'maxime', 9, 'Favian Maggio', 'Treutel Group', 'Aut iure cum ullam vel voluptas quia qui aut. Modi nulla dolor nisi optio eos architecto. Eum et quo fuga nihil facilis eum.', 'Voluptas dicta atque cum quos iusto minus. Distinctio atque a quod culpa. Alias harum ea aut cupiditate accusantium. Et iure asperiores qui assumenda omnis in id.', 'img/defavatar.webp', '2023-11-14', 20000),
(40, 'quae', 10, 'Colin Murphy', 'Hessel-Kub', 'Esse est non vel qui culpa laborum. Ut aspernatur et tenetur accusamus. Non possimus facilis sunt esse vel amet.', 'Animi placeat dolorem et veniam voluptatibus id minus. Cum sunt laboriosam similique numquam dicta molestias. Porro explicabo qui accusantium error dolores saepe dolores. Autem aut quibusdam illum nemo ad.', 'img/defavatar.webp', '2023-11-14', 20000),
(41, 'nesciunt', 1, 'Prof. Leda Little V', 'Gibson LLC', 'Nostrum exercitationem quis temporibus et. Eveniet voluptatem et autem voluptas sapiente quia. Assumenda voluptatem quo doloribus ad.', 'Quis non dolore dolore. Sit totam aut voluptas est. Eos est odio soluta eligendi porro. Voluptatem voluptatibus aliquam rerum nostrum consequatur delectus. Beatae tempore saepe est laborum molestiae est.', 'img/defavatar.webp', '2023-11-14', 20000),
(42, 'hic', 2, 'Arely Schneider', 'Gerlach Ltd', 'Sit nam esse placeat. Veniam expedita nihil qui aut qui a. Qui autem sequi atque ex dolor qui ea.', 'Laudantium dolor repellendus enim molestias rerum accusantium. Sed nostrum harum laborum quia eum voluptatibus repudiandae. Quis provident quaerat nulla aliquam ut est. Nam perspiciatis enim ut mollitia facere assumenda eveniet.', 'img/defavatar.webp', '2023-11-14', 20000),
(43, 'cupiditate', 3, 'Alva Beer', 'Ferry, Bartell and Sanford', 'Quo perspiciatis blanditiis facere ullam. Voluptas consequatur dolor sint ut voluptatem. Ea consequuntur alias in provident debitis saepe et. Molestias perspiciatis quas qui dolores sunt molestias.', 'Sapiente quia qui consequatur eum velit cum. Doloribus nostrum voluptas velit sit earum magni voluptatem. Beatae cumque illo velit mollitia. Molestiae autem quia dolores ex.', 'img/defavatar.webp', '2023-11-14', 20000),
(44, 'consequatur', 4, 'Sigrid Ward MD', 'Farrell Ltd', 'Eius necessitatibus quia ut in commodi aut. Alias et molestiae ex eligendi odio illo. Officia necessitatibus rem numquam dolor quia iure est corporis.', 'Consequatur quos nulla minima ea quae vel. Omnis optio aut velit impedit expedita exercitationem. A eum rerum rerum reiciendis deserunt aut et. Quo et consequuntur officia autem quia amet.', 'img/defavatar.webp', '2023-11-14', 20000),
(45, 'fuga', 5, 'Reilly Zemlak', 'Lang-Wyman', 'Possimus omnis qui ut et exercitationem quis recusandae. Quibusdam hic magni et dolore. Perspiciatis id voluptatem voluptatibus omnis debitis. Vel id nam voluptas autem sed.', 'Provident repellendus harum ut. Dolor qui optio ut et sunt veritatis sequi.', 'img/defavatar.webp', '2023-11-14', 20000),
(46, 'dolorem', 6, 'Krystina Blanda', 'Kshlerin, Ondricka and Prohaska', 'Odit autem est enim fugiat in. Cupiditate perferendis maiores nihil voluptas voluptate ipsum provident.', 'Quia delectus recusandae minima consequatur. Aut quis molestias doloribus sed. Sint esse ducimus et consequatur est ut.', 'img/defavatar.webp', '2023-11-14', 20000),
(47, 'molestias', 7, 'Zola Zieme', 'Carter-Dooley', 'Iusto dolor corporis modi perferendis. Ea enim quo commodi similique explicabo. Laudantium nobis voluptas et sit quia quae vero sed.', 'Quia vitae et modi quis sunt commodi. Molestiae nisi ut vel quo magnam laborum est animi. In est et est qui sit aut. Eligendi repellendus ut reiciendis corporis illo tempora. Numquam vel veniam ab aut quia aut eligendi.', 'img/defavatar.webp', '2023-11-14', 20000),
(48, 'et', 8, 'Juwan Nicolas', 'Stroman-Jerde', 'Ut corporis eius dignissimos et. Molestiae ab dicta consequuntur vel alias. Impedit sed similique magnam corrupti. Assumenda est ullam quia quibusdam harum ullam nulla dolorem.', 'Et totam saepe quia doloribus. Alias quaerat soluta nihil quisquam iure. Doloribus nesciunt blanditiis eum ut. Qui eius magnam veritatis aut alias delectus reiciendis reiciendis.', 'img/defavatar.webp', '2023-11-14', 20000),
(49, 'cum', 9, 'Christy Tromp', 'Klein-Cummerata', 'Quod ullam labore est nihil quo. Iure laborum sint consequatur quod. Dolor doloribus aliquid non voluptatibus in dolor aut.', 'Pariatur voluptatem sed et vero. Saepe accusantium facere et assumenda. Maiores consectetur et et at libero corporis.', 'img/defavatar.webp', '2023-11-14', 20000),
(50, 'officiis', 10, 'Bill Heaney', 'Turcotte, Keeling and Hyatt', 'Quia distinctio molestiae et impedit autem. Labore quia totam nam architecto quia quis at. Deserunt est sequi ut iure quae eum voluptatibus quia.', 'Eos et optio voluptate nostrum. Ullam voluptatem enim necessitatibus maiores. Dolor tempora sint officiis suscipit recusandae. Quo autem quos ipsa sint est ipsa ea. Voluptatem provident numquam eligendi nihil labore non aut.', 'img/defavatar.webp', '2023-11-14', 20000),
(51, 'soluta', 1, 'Darrell Kassulke', 'Terry Group', 'Voluptatum excepturi dicta nihil vero deleniti atque modi. Voluptatem pariatur sunt et quidem perferendis iure magnam. Ea voluptatem nesciunt ratione dolores sunt porro consectetur.', 'Veniam omnis perspiciatis mollitia vel sunt et voluptate earum. Ea qui omnis exercitationem. Nostrum dolor distinctio et animi quae repellendus quo aut. Voluptatem exercitationem qui et perspiciatis totam corporis et.', 'img/defavatar.webp', '2023-11-14', 20000),
(52, 'eius', 2, 'Sonia Jast', 'Kertzmann-Bradtke', 'Soluta voluptatem consequuntur dolore qui unde dicta non. Id sit voluptatem eum voluptatem voluptatem omnis. In architecto voluptas nemo harum et sed aut.', 'Totam unde sed voluptates rerum omnis dolor. Voluptatum veniam suscipit quis. Alias distinctio porro exercitationem magni inventore nulla. At enim cumque officia incidunt reprehenderit explicabo tempore maxime.', 'img/defavatar.webp', '2023-11-14', 20000),
(53, 'neque', 3, 'Mr. Makenna Greenfelder', 'Schuster-Lubowitz', 'Non deserunt maiores eligendi architecto minima. Sunt iste aut sint porro. Reiciendis velit atque asperiores non.', 'Possimus odit sequi quia voluptatum quia quo. Fuga maxime voluptate occaecati earum error. Enim repellat aut dolorum accusantium voluptas sit atque repudiandae. Quae iusto iure consequuntur ut soluta repudiandae est aut.', 'img/defavatar.webp', '2023-11-14', 20000),
(54, 'ipsum', 4, 'Marcus Davis', 'Considine, Shields and Ledner', 'Aut hic sit magnam consequatur ducimus. Officiis laudantium vel sit delectus.', 'Asperiores ullam quae ut totam. Ullam eum nesciunt quo rem ipsum. Aliquam nam reprehenderit culpa. Vel eius voluptates aut qui ratione.', 'img/defavatar.webp', '2023-11-14', 20000),
(55, 'repudiandae', 5, 'Javon Deckow', 'Nitzsche Group', 'Cumque reiciendis omnis qui et dolorem nisi omnis. Qui rem aut voluptas vel voluptas quidem. Fugit laboriosam eum quidem architecto aut quibusdam adipisci. Quis voluptatem atque totam atque aut qui.', 'Soluta sapiente asperiores exercitationem. Corporis praesentium est quasi voluptate voluptatum laborum. Recusandae vero et ipsa.', 'img/defavatar.webp', '2023-11-14', 20000),
(56, 'ut', 6, 'Mr. Austen Nienow', 'Mills and Sons', 'Nisi explicabo dolorum ut odio voluptatem voluptas dolore. Exercitationem id quisquam esse. Facere veniam nulla voluptas corporis.', 'Eum commodi enim aut. Iste dicta beatae mollitia ex voluptates quo vel. Ipsam repellat inventore vitae repudiandae ut dolore ut nihil. Animi qui in nisi.', 'img/defavatar.webp', '2023-11-14', 20000),
(57, 'explicabo', 7, 'Tressa Gottlieb', 'Okuneva-Tillman', 'Enim occaecati inventore et ex. Cumque minus non cum et ut corrupti deserunt. Saepe aut eveniet a ex in ea harum.', 'Assumenda non alias hic aspernatur in. Corrupti consequatur sint earum veniam similique qui voluptates. Magni magni pariatur voluptatibus nobis voluptas aut. Ullam libero in neque ut quia dolores temporibus.', 'img/defavatar.webp', '2023-11-14', 20000),
(58, 'rerum', 8, 'Jace Greenholt', 'Haag PLC', 'Quasi sequi tempora magni totam cum soluta suscipit. Ex quo iste autem esse dolores veniam. Expedita sint modi reiciendis maiores. Ut est quo eum quidem doloremque eos.', 'Et non omnis velit dolorum voluptate quae ut qui. Ducimus quos ratione possimus repudiandae. At voluptas et iure aut voluptas.', 'img/defavatar.webp', '2023-11-14', 20000),
(59, 'dicta', 9, 'Christa Lowe', 'Casper, Stoltenberg and Kilback', 'Expedita consequatur nesciunt non aut voluptatum. Iste deleniti dolore in sunt possimus nihil magni.', 'Vel sunt laudantium repellendus. Molestias rerum quia ratione ipsum asperiores esse. Vero est impedit et et nemo.', 'img/defavatar.webp', '2023-11-14', 20000),
(60, 'accusantium', 10, 'Darron Olson III', 'Hackett, Nader and Kautzer', 'Impedit in sint modi ipsam. Tempora eum non saepe quidem non consequatur dolorem. Deleniti distinctio aut cumque dolorem facilis libero. Quisquam dolorum dolor quidem placeat atque doloribus.', 'Quia magnam quis nam officiis ducimus hic dignissimos. Modi et esse et neque. Quibusdam est velit aliquam ratione eos molestiae eum aspernatur.', 'img/defavatar.webp', '2023-11-14', 20000),
(61, 'odio', 1, 'Ms. Kailee Rogahn MD', 'Nader, Beier and Torphy', 'Eligendi atque quia aliquam quae eaque rerum quasi. Odit est itaque voluptatibus quaerat unde.', 'Quisquam itaque eius consequatur enim velit quae. Est dolor odio nostrum sint atque. Doloremque quidem maiores minima perspiciatis. Ad perspiciatis reiciendis quis sint repellendus.', 'img/defavatar.webp', '2023-11-14', 20000),
(62, 'nemo', 2, 'Maegan Wilkinson', 'Gorczany LLC', 'Tempore maxime molestias assumenda vero nesciunt et accusamus. Qui tenetur culpa dolorem et delectus. Excepturi dolore delectus molestiae ab facilis fugit. A perferendis dicta aut minima delectus.', 'Distinctio maxime rerum repellendus possimus fugit. Excepturi dicta alias eos est.', 'img/defavatar.webp', '2023-11-14', 20000),
(63, 'omnis', 3, 'Magali Hills', 'Stamm PLC', 'Minima excepturi sed consequatur. Placeat voluptates voluptate non error qui.', 'Quia beatae culpa suscipit occaecati qui. Quis natus libero consequatur asperiores voluptas. Harum saepe et voluptatibus id.', 'img/defavatar.webp', '2023-11-14', 20000),
(64, 'aut', 4, 'Savanna Grady', 'Kirlin-Jerde', 'Quod ab quae non dicta pariatur voluptatem possimus. Et voluptatem atque amet velit dignissimos excepturi. Reiciendis velit non placeat et sed repellendus.', 'Hic delectus vitae nihil nobis quae labore. Sapiente commodi consequatur dicta molestiae tempore accusamus ut.', 'img/defavatar.webp', '2023-11-14', 20000),
(65, 'earum', 5, 'Ms. Modesta Morissette', 'Krajcik Inc', 'Velit optio eius magni nobis qui. Ut accusantium et sit magni et quia beatae. Perspiciatis porro est architecto aliquid sit rem. Dolorem sapiente laboriosam et labore.', 'Possimus neque aliquid incidunt sit non. Dolores ad natus quo est earum doloribus. Quibusdam magnam beatae dolorem omnis rem qui. Cum rerum fuga aut voluptate sed qui et.', 'img/defavatar.webp', '2023-11-14', 20000),
(66, 'cumque', 6, 'Pinkie Kling', 'Runolfsdottir-Leannon', 'Occaecati saepe fugiat et laudantium. Fuga doloribus et est non ipsam sapiente ducimus suscipit. In inventore rerum commodi vel.', 'Et quo voluptas dignissimos excepturi dignissimos ad aut. Sed commodi sunt expedita architecto nihil eos quo repudiandae. Voluptas excepturi labore expedita sit dicta et eaque.', 'img/defavatar.webp', '2023-11-14', 20000),
(67, 'quaerat', 7, 'Hilbert Stroman', 'OHara-Roob', 'Error officiis at dolor maxime qui voluptatem officia. Fuga autem vel voluptatem ex sed rerum.', 'Quo est in ipsa rerum aut. Et deleniti sed reprehenderit maiores quasi temporibus. Et libero assumenda ullam nobis necessitatibus quasi consequuntur.', 'img/defavatar.webp', '2023-11-14', 20000),
(68, 'distinctio', 8, 'Mrs. Kariane Ledner', 'Hickle-Hane', 'Et iste eveniet harum cupiditate ad aut velit. Inventore laboriosam harum rerum optio. Dolorum quo et eum natus.', 'Voluptatem non blanditiis earum sequi qui rerum voluptas. Quibusdam dolor saepe soluta labore in. Assumenda dolor at fuga qui deleniti et quia. Amet nam aut sunt magni enim eveniet enim.', 'img/defavatar.webp', '2023-11-14', 20000),
(69, 'eveniet', 9, 'Prof. Nicola Prohaska Jr.', 'Ryan-Hills', 'Sed omnis non laboriosam et eos voluptates. Est repellat porro velit repellendus consectetur. Asperiores autem rerum vitae et.', 'Ad veritatis doloribus consequatur tenetur fuga voluptatem quo. Mollitia et et nobis deserunt earum.', 'img/defavatar.webp', '2023-11-14', 20000),
(70, 'quidem', 10, 'Prof. Zora Hayes', 'Marquardt PLC', 'Dolorem eos quod aut ratione iste facere rerum. Et dolorum porro error molestias reprehenderit ipsa voluptas rerum. Quod tempore eos ex sequi. Repudiandae est fugit optio voluptatem vero.', 'Amet voluptates quam doloribus nostrum animi voluptatem molestiae. Quis soluta distinctio natus aliquid facilis incidunt labore necessitatibus. Illo et ducimus est nihil eum autem minus. Molestias ut doloremque vel alias.', 'img/defavatar.webp', '2023-11-14', 20000),
(71, 'voluptatem', 1, 'Talia Sawayn', 'Bashirian, Hudson and Fadel', 'Qui magni est et molestias aut. Laboriosam sed rerum nemo perferendis non. Qui veniam inventore sapiente cupiditate id iste in repellat.', 'Voluptatibus ea quidem consequatur necessitatibus. Ab neque qui consequuntur rem. Commodi rerum non molestias hic.', 'img/defavatar.webp', '2023-11-14', 20000),
(72, 'amet', 2, 'Mrs. Mayra Davis Jr.', 'Grady, Reichel and Padberg', 'Reprehenderit excepturi ullam non aperiam voluptatibus eligendi perferendis dolorum. Neque suscipit ipsa dignissimos illo aut nihil quis.', 'Repudiandae id aut aliquid quisquam neque recusandae. Repudiandae exercitationem tempore recusandae itaque voluptatibus ad. Maxime eius eveniet at aliquid aut quia. Doloremque maxime aperiam debitis quis ut et aperiam.', 'img/defavatar.webp', '2023-11-14', 20000),
(73, 'culpa', 3, 'Destinee Tillman', 'Bernier-Funk', 'Voluptatem error enim illum. Et cumque sed laboriosam enim amet id aspernatur. Ab beatae qui ex ratione. Explicabo beatae tempore dignissimos molestiae qui ad quia.', 'Doloribus debitis non rerum maxime. Et recusandae quibusdam reprehenderit porro rerum. Voluptatem distinctio explicabo quia consectetur vitae ut dolores. Ea vero itaque qui iste temporibus omnis.', 'img/defavatar.webp', '2023-11-14', 20000),
(74, 'suscipit', 4, 'Dedrick Koepp', 'Breitenberg-Jones', 'Quaerat laudantium non eos eligendi cum. Quaerat et qui ipsum voluptatibus qui est.', 'Provident non repellendus est ratione. Quaerat facilis fugiat doloribus quis cupiditate quasi. Enim enim velit inventore fuga molestiae.', 'img/defavatar.webp', '2023-11-14', 20000),
(75, 'id', 5, 'Evans Moore', 'Stark, Block and Walker', 'Distinctio impedit cumque deserunt. Molestiae aut quis quod possimus quas pariatur. Vero consectetur non distinctio dolorum pariatur qui.', 'Voluptas praesentium quasi iste culpa non nesciunt. Aut provident a consequatur exercitationem quisquam dolore deleniti. Eligendi expedita blanditiis aut voluptates mollitia maxime sunt.', 'img/defavatar.webp', '2023-11-14', 20000),
(76, 'doloremque', 6, 'Avis Fadel', 'Zieme Inc', 'Asperiores ab doloribus omnis veniam impedit quo necessitatibus. Rerum vero commodi eveniet consequatur natus ut quia. Optio nostrum id et praesentium consequuntur soluta libero vero.', 'Odit ea quia inventore. Deleniti aspernatur ducimus minima iure. Architecto expedita voluptatem in sit corporis ullam. Sed autem excepturi corrupti eos qui saepe eligendi.', 'img/defavatar.webp', '2023-11-14', 20000),
(77, 'voluptas', 7, 'Danial Mertz', 'Wilderman-Collins', 'Tempore iure sapiente commodi vero animi. Maxime ut alias est reprehenderit hic.', 'Et aut est iste quibusdam. Cumque inventore officia omnis ea distinctio doloribus dolorum officia. Quo libero possimus qui. Impedit illum animi sed at a.', 'img/defavatar.webp', '2023-11-14', 20000),
(78, 'rerum', 8, 'Everette Rodriguez', 'Macejkovic-Schuppe', 'Corporis eaque reiciendis consequuntur nulla. Non ullam mollitia voluptate modi alias aut.', 'Qui fuga possimus labore sed. A animi odio impedit blanditiis maxime ea numquam. Assumenda sed ut nemo optio possimus consectetur. Optio quod est placeat nulla maiores nihil sit. Mollitia est dignissimos et sint non sit voluptas.', 'img/defavatar.webp', '2023-11-14', 20000),
(79, 'totam', 9, 'Prof. Leonard Kon MD', 'Leuschke, Romaguera and Koch', 'Neque nam ipsa sunt dolorem distinctio exercitationem non. Inventore omnis est consequatur neque sed et. Non sequi fugiat corporis eos numquam nobis.', 'Deleniti doloribus exercitationem error tempora. Voluptatem atque dolorum aperiam ab. Aspernatur architecto qui molestiae veniam voluptas est minima. Pariatur suscipit est illum.', 'img/defavatar.webp', '2023-11-14', 20000),
(80, 'sequi', 10, 'Francisca Muller', 'Hickle-Bernier', 'Sed vel dolores vel voluptatem autem. Ut aut culpa veniam consequuntur corporis molestias. Possimus in voluptatibus autem temporibus.', 'Labore reiciendis doloribus consequatur enim fuga. Commodi velit impedit impedit dolor similique eaque. Deserunt rerum rerum qui sunt non ullam quisquam. In cum aut qui officiis sit. Est ullam voluptas unde dolor velit.', 'img/defavatar.webp', '2023-11-14', 20000),
(81, 'officiis', 1, 'Douglas Kautzer', 'Brakus-Goodwin', 'Quos ea aliquam id dignissimos. Placeat odio corporis porro. Qui eum voluptatum repellendus adipisci autem. Atque magni laborum laborum quam.', 'Incidunt error porro occaecati occaecati enim sit voluptates pariatur. Voluptas quisquam ipsa qui non voluptate repellendus culpa nisi. Earum maiores praesentium voluptas odio enim.', 'img/defavatar.webp', '2023-11-14', 20000),
(82, 'iure', 2, 'Ms. Ellie Rempel I', 'Veum Inc', 'Dolores neque aut aut aut minus quo. Voluptas impedit odio laudantium velit. Soluta enim adipisci eos repellendus qui facilis quis.', 'Quibusdam ipsam dolor dolorem optio et. Est fugit libero dolorem occaecati. Quos explicabo qui fuga quo. Natus dolorem non ad sit laudantium laboriosam. Magnam odit ea quos rerum.', 'img/defavatar.webp', '2023-11-14', 20000),
(83, 'deserunt', 3, 'Mrs. Lesly Renner', 'Koepp Inc', 'Quam inventore dignissimos doloremque impedit quae. Qui quia vero expedita aut. Et libero et error enim et doloribus.', 'Ea accusantium est dolorem est assumenda. Ad magnam vel nam. Rem eos et quidem omnis dolore.', 'img/defavatar.webp', '2023-11-14', 20000),
(84, 'et', 4, 'Johnson Herzog', 'Marvin-Schuppe', 'Non quia sed laboriosam accusantium libero dolor cum. Nemo et voluptas distinctio reiciendis nemo. Aut vel ut possimus expedita.', 'Nihil corrupti reiciendis non excepturi aperiam et. Amet qui sed dolore sunt eos dolores aut. Voluptatibus illo neque optio porro et delectus voluptatem.', 'img/defavatar.webp', '2023-11-14', 20000),
(85, 'minus', 5, 'Holden Nienow', 'Nienow PLC', 'Ullam id repellat quos. Autem repellendus vero et. Molestiae libero quaerat rerum ea eum omnis.', 'Aut quae quis voluptas necessitatibus ratione provident ab nisi. Eaque distinctio consequuntur omnis architecto. Ex et ex ea tempore amet aut dolore.', 'img/defavatar.webp', '2023-11-14', 20000),
(86, 'molestiae', 6, 'Dr. Clair Gaylord Jr.', 'Ratke-Stracke', 'Dolorem qui explicabo maiores atque voluptatem molestias soluta. Et quae quod rerum est asperiores aut. Et iusto voluptatem sunt aut.', 'Eum minima quidem pariatur. Quo porro aut commodi a. Magnam aut minus sit ea id occaecati reprehenderit.', 'img/defavatar.webp', '2023-11-14', 20000),
(87, 'inventore', 7, 'Tyson Klocko', 'Morar, Daugherty and Sanford', 'Quos et ipsam quod molestiae laboriosam. Ad corporis nesciunt ut. Et temporibus nihil laborum neque et consequatur. Ut id reiciendis aliquid vitae.', 'Placeat dignissimos quia iure minus et. Fugiat hic magnam quos sequi consequatur eos.', 'img/defavatar.webp', '2023-11-14', 20000),
(88, 'ipsa', 8, 'Peggie Oberbrunner V', 'Swaniawski, Skiles and Connelly', 'Deleniti exercitationem eaque voluptatibus molestiae assumenda alias ex. Vel saepe fuga nobis amet. Temporibus consequatur voluptatem nulla voluptates asperiores cumque.', 'Corrupti expedita maiores officia voluptatem omnis non officiis. Praesentium nesciunt repellendus eaque assumenda a perferendis qui sit. Eaque repellendus soluta aut. Neque eos repudiandae harum eos ipsam itaque.', 'img/defavatar.webp', '2023-11-14', 20000),
(89, 'facere', 9, 'Johann Anderson', 'Romaguera-Kunze', 'Sit rerum aut nesciunt quo distinctio inventore. Similique tempora sequi fugit cum harum. Explicabo enim similique adipisci laboriosam. Explicabo sed dolorum fuga sunt aspernatur.', 'Animi sit nihil et praesentium possimus porro rem. Consequatur est eaque sed dolorem unde impedit in in. Dolore voluptas ea et nihil sint.', 'img/defavatar.webp', '2023-11-14', 20000),
(90, 'qui', 10, 'Mrs. Rowena Roberts', 'Friesen PLC', 'Quae quisquam excepturi dignissimos optio qui. Quam explicabo ipsa sit sit. Sit rerum natus hic voluptates veritatis. Ut neque sit cum.', 'Laudantium eaque sed excepturi ut dicta est qui veniam. Odio dolores autem et consequatur voluptas aperiam et autem. Qui est ratione reprehenderit sed consequatur qui tenetur. Odio ut alias et quia officiis qui neque.', 'img/defavatar.webp', '2023-11-14', 20000),
(91, 'harum', 1, 'Ashly Schulist', 'Greenfelder Inc', 'Sed quod dolor modi rem corporis dolore quae eum. Et enim quisquam magnam quaerat eos atque. Qui soluta beatae dicta aut nihil. Harum voluptatem assumenda non ipsa nulla porro eligendi doloremque.', 'Nam accusantium dolor maiores reprehenderit. Atque repellendus optio aut velit sint impedit et. Non laboriosam enim quis sed est qui.', 'img/defavatar.webp', '2023-11-14', 20000),
(92, 'error', 2, 'Ms. Myrna Kuvalis', 'Bruen PLC', 'Tenetur rerum aperiam possimus est quis. Deleniti omnis omnis minima voluptas numquam. Culpa quod repellendus tempora quis non in.', 'Omnis vel velit et voluptatem et consequuntur expedita neque. Et architecto dignissimos exercitationem facere fugit aut qui. Temporibus repellat accusantium deserunt corrupti animi. Maiores et aut sit provident aut. Modi alias ad voluptatum alias dolores mollitia consequatur veniam.', 'img/defavatar.webp', '2023-11-14', 20000),
(93, 'numquam', 3, 'Alice Gutkowski', 'Will, Erdman and Bayer', 'Id suscipit est voluptatem totam. Esse facilis quo omnis illo animi. Nihil voluptas modi voluptatem explicabo. Non quia rem facere maiores.', 'Perferendis accusantium blanditiis rerum velit amet illum. Et sed sint ut. Voluptatibus aut dolorem reprehenderit doloribus autem debitis.', 'img/defavatar.webp', '2023-11-14', 20000),
(94, 'repudiandae', 4, 'Alvera Quitzon', 'Cartwright and Sons', 'Aperiam nulla tempora ut debitis quos molestiae minima. Omnis voluptate reprehenderit nihil vel tempora sit.', 'Et reprehenderit saepe possimus non animi omnis debitis. Laboriosam nihil nesciunt sit. Consectetur est voluptas doloribus et eos. Autem accusamus beatae exercitationem ut dolore a quidem et.', 'img/defavatar.webp', '2023-11-14', 20000),
(95, 'consequatur', 5, 'Savannah Lebsack', 'Flatley, Dickinson and Kohler', 'Est sint quia praesentium quaerat incidunt. Ut tenetur quia culpa dolorum voluptatem autem. Delectus vitae aut suscipit maiores.', 'Consequuntur aut quis velit vero aut eaque. Doloribus ullam neque nulla eos hic porro. Perferendis et eveniet quam nulla occaecati. Sit quis consequuntur occaecati deserunt ea ut dignissimos.', 'img/defavatar.webp', '2023-11-14', 20000),
(96, 'porro', 6, 'Remington Rau', 'Roberts-Feest', 'Incidunt provident non et consequatur natus natus. Qui neque commodi quas cupiditate soluta aliquam. Voluptates placeat consequatur consequuntur. Cupiditate et quia id facilis.', 'Est aperiam sunt accusamus sequi aliquid ullam vel. Blanditiis doloremque quia quasi non architecto voluptas nam. Voluptatem eos blanditiis aut in itaque non et sit. Aliquam quia voluptas sit debitis. Voluptatem omnis voluptas voluptatem.', 'img/defavatar.webp', '2023-11-14', 20000),
(97, 'amet', 7, 'Karen Rowe', 'West and Sons', 'Similique qui aperiam officiis ut est. Debitis architecto earum similique. Ut ea iure voluptas excepturi voluptas pariatur.', 'Corrupti ipsam vel non eaque. Cum dolorem quos voluptatem enim quidem. Quia praesentium et et.', 'img/defavatar.webp', '2023-11-14', 20000),
(98, 'molestiae', 8, 'Prof. Antoinette McLaughlin MD', 'Gerhold-Larkin', 'Sit aspernatur accusamus aspernatur qui tempora consectetur ut. Assumenda laudantium quia autem culpa ab. Veritatis earum iure et eos et voluptatibus autem consequatur.', 'Veritatis exercitationem tempora enim vel et rerum explicabo. Exercitationem corrupti tenetur odit a in vero nulla. Dolorum asperiores aliquid optio cupiditate. Est voluptatem aut rerum rerum excepturi est minus.', 'img/defavatar.webp', '2023-11-14', 20000),
(99, 'omnis', 9, 'Jorge Pouros V', 'Leffler-Greenfelder', 'Omnis perferendis quisquam consequatur ipsa provident. Excepturi sunt sapiente sequi eveniet a et id quis. Autem sequi sed est magni quia omnis voluptatem. Qui sint et excepturi expedita sed.', 'Quia cupiditate esse suscipit voluptatem ad minus voluptas. Architecto sint et et neque repellat. Eos vitae enim aliquam voluptatem consequuntur fugit adipisci ut. Est voluptates laudantium natus quos sit laboriosam.', 'img/defavatar.webp', '2023-11-14', 20000),
(100, 'calslsl', 10, 'Theresa Kozey', 'Brekke-Simonis', 'Nemo maiores sit nihil tempora ea. Facere consequatur debitis aperiam iure aliquid. Facere officia qui reprehenderit est adipisci. Est aut aspernatur et iusto et incidunt ad.', 'Iste debitis et velit reprehenderit suscipit expedita at at. Recusandae occaecati error explicabo voluptatibus. Voluptatibus facere in inventore sunt ipsum voluptatem. Inventore ipsam veniam est atque totam omnis voluptates.', 'img/', '2023-11-14', 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booktype`
--

CREATE TABLE `booktype` (
  `typeId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `decription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booktype`
--

INSERT INTO `booktype` (`typeId`, `name`, `decription`) VALUES
(1, 'modi', 'Qui ad dolorem et et vero qui. Voluptate ipsum est'),
(2, 'consequuntur', 'Quae architecto fugiat omnis molestiae sed ab plac'),
(3, 'qui', 'Enim culpa veniam maiores excepturi nihil explicab'),
(4, 'nostrum', 'Id odit impedit eius dicta occaecati ducimus quia.'),
(5, 'et', 'Quo earum deleniti sit fugiat ut voluptas. Assumen'),
(6, 'illo', 'Laborum voluptas aut culpa aut reiciendis aut itaq'),
(7, 'velit', 'Vitae et et optio quidem hic porro distinctio. Nul'),
(8, 'aut', 'Distinctio enim natus perspiciatis at. Blanditiis '),
(9, 'magni', 'Optio dolor et non non quo. Labore reiciendis impe'),
(10, 'accusamus', 'Enim tempore aut quasi minus nulla aperiam. Quia m'),
(11, 'Sach Giao Khoa', 'Sách giáo khoa là sách cung cấp kiến thức, được bi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `borrowcard`
--

CREATE TABLE `borrowcard` (
  `cardId` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `borrowDate` date DEFAULT NULL,
  `deadLine` date DEFAULT NULL,
  `form` varchar(50) DEFAULT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'inprogress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `borrowcard`
--

INSERT INTO `borrowcard` (`cardId`, `bookId`, `userId`, `borrowDate`, `deadLine`, `form`, `state`) VALUES
(101, 1, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(102, 2, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(103, 3, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(104, 6, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(105, 7, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(106, 4, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(107, 5, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(108, 8, 21, '2023-11-24', '2023-11-30', 'FT-d41d8cd98f00b204e9800998ecf8427e', 'released'),
(109, 9, 21, '2023-11-24', '2023-11-24', 'CREATE 24-11-23 09:01:57', 'released');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullName` varchar(50) NOT NULL DEFAULT 'Tên Của Bạn',
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL DEFAULT 'Việt Nam',
  `intro` varchar(3000) DEFAULT NULL,
  `avatar` varchar(300) DEFAULT '/img/AnhMacDinh.jpg',
  `balance` int(11) DEFAULT 0,
  `payInfo` varchar(200) DEFAULT NULL,
  `userName` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userId`, `password`, `fullName`, `phone`, `address`, `intro`, `avatar`, `balance`, `payInfo`, `userName`, `role`) VALUES
(1, '1', 'Mrs. Hellen Franecki Sr.', '890.232.36', '41804 VonRueden Gateway\nKassulkehaven, DC 69098', 'Culpa quia esse eius voluptate doloremque nihil magnam. Incidunt quia veritatis quo sed nihil. Consequatur doloremque non quod quia quo harum. Consectetur accusamus et explicabo odio culpa iste.', '/img/defavatar.webp', 1, 'MasterCard', 'test1', 'customer'),
(2, '1', 'Mrs. Meda Medhurst IV', '827.678.36', '8182 Jacky Curve\nSimonisborough, ME 61703-6900', 'Omnis debitis dolores quisquam perspiciatis repellendus. Expedita suscipit ut qui maiores expedita dicta in facere. Autem culpa deleniti et occaecati nihil et odio.', '/img/defavatar.webp', 0, 'MasterCard', 'test2', 'customer'),
(3, '1', 'Dr. Ahmad Shields III', '133-144-43', '09633 Cassin Skyway\nLake Sim, OH 14057-8676', 'Debitis qui dolorum id maxime perferendis reiciendis ea. Quas delectus sed amet laborum rerum magnam praesentium. Ea sequi fugit et quasi autem inventore. Molestiae ea architecto necessitatibus tempora ut omnis.', '/img/defavatar.webp', 1161, 'Visa', 'test3', 'customer'),
(4, '1', 'Stella Ebert', '153-787-96', '153 Green Bridge\nEichmannside, LA 44558-7356', 'Eos consectetur eum impedit officia facere reprehenderit. Optio modi non expedita. Doloremque nam velit deleniti.', '/img/defavatar.webp', 0, 'Visa', 'test4', 'customer'),
(5, '1', 'Ozella Gerlach', '651.213.63', '935 Boyd Ranch Apt. 117\nKulasville, NV 25800', 'Ut enim nisi animi temporibus aut ipsum. Odio esse tempora magni iure pariatur voluptate veritatis est. Et ratione modi eaque praesentium voluptatem repellendus dolorum. Aut magni porro rem provident voluptatum.', '/img/defavatar.webp', 62, 'MasterCard', 'test5', 'customer'),
(6, '1', 'Mathias Gleason', '513.220.82', '6122 Collier Mission Apt. 991\nSouth Elbert, PA 24842-9391', 'Omnis sint quia et culpa asperiores necessitatibus ipsam. Eos voluptas accusamus velit id iusto facere rerum. Ipsam eius ullam optio eius voluptas itaque illo. Mollitia velit sapiente ex dolor provident.', '/img/defavatar.webp', 281327747, 'Visa', 'test6', 'customer'),
(7, '1', 'Keshawn Little', '537-420-98', '9915 Douglas Vista\nNew Deonmouth, WI 47410', 'Dignissimos laudantium praesentium reprehenderit dolores sed. Sequi optio alias reprehenderit tempora rerum tempore. Voluptas sit rerum est hic. Molestias nulla sit aut quia molestiae non soluta sit.', '/img/defavatar.webp', 535, 'Discover Card', 'test7', 'customer'),
(8, '1', 'Ms. Bulah Fritsch DDS', '103.601.47', '3928 Ruecker Lights\nLake Heleneland, VA 13520', 'Officiis sapiente non iusto necessitatibus. Esse cum deserunt aut quia culpa vel quo. In qui aliquid aut sunt officia molestias sit.', '/img/defavatar.webp', 816874, 'American Express', 'test8', 'customer'),
(9, '1', 'Prof. Beth Harvey DVM', '1-412-636-', '304 Lebsack Camp Suite 397\nCarolinachester, ID 68540', 'Officia error odio qui corrupti. Saepe odit porro doloribus. Vero ullam dolorem consequuntur magni aspernatur voluptates. Dicta voluptatem enim quia vel voluptatem rerum similique.', '/img/defavatar.webp', 0, 'Visa', 'test9', 'customer'),
(10, '1', 'Juwan Bayer', '1-087-376-', '8020 Stokes Road Suite 456\nPort Sam, AR 71301-5676', 'Id animi rerum consequuntur sit vero dolores voluptatum. Facilis eveniet quo saepe. Vero earum necessitatibus itaque eos.', '/img/defavatar.webp', 7, 'Visa', 'test10', 'customer'),
(11, '1', 'Avery Ortiz', '1-226-771-', '63527 Cecelia Port Apt. 554\nCummingsville, WA 01109', 'Voluptatum ratione fuga corporis et aliquid. Ea magnam non ab optio. Reprehenderit eos voluptatem maiores inventore architecto id. Nisi modi ex neque velit qui quae aspernatur. Omnis veritatis ut rerum voluptas eos aut.', '/img/defavatar.webp', 92262881, 'MasterCard', 'test11', 'customer'),
(12, '1', 'Lucienne Lubowitz', '1-460-402-', '0315 Micheal Drive\nWest Elroymouth, NM 91322-0667', 'Ut asperiores error et deserunt dolorum quos quasi. Sit similique ducimus voluptas voluptates amet distinctio distinctio. Cupiditate doloribus aut eum sequi. Omnis eum aliquam velit minus esse minima ut.', '/img/defavatar.webp', 2401385, 'MasterCard', 'test12', 'customer'),
(13, '1', 'Durward Abbott', '792-799-74', '81119 Ole Harbor\nReymundochester, NE 44918', 'Provident sit velit non nobis ut. Quas autem facilis delectus deserunt. Consequatur id omnis tempore repellendus.', '/img/defavatar.webp', 5, 'MasterCard', 'test13', 'customer'),
(14, '1', 'Ms. Retta Bashirian V', '626-345-61', '08827 Collier Center Suite 676\nPfannerstillland, WV 23365-4001', 'Similique odio in et qui. Labore enim ut reprehenderit ut qui quis placeat aut. Unde distinctio aut aut aliquam et excepturi facere.', '/img/defavatar.webp', 35, 'MasterCard', 'test14', 'customer'),
(15, '1', 'Armani Gulgowski', '959.324.45', '4980 Kayleigh Ford Apt. 930\nPansyview, IA 73273-9086', 'Cum et facere perspiciatis culpa temporibus. Ipsam consequatur et deserunt iste sed hic a. Ab ut ullam aut quae omnis. Quia fugiat ipsa quasi unde est quia cum accusantium.', '/img/defavatar.webp', 2, 'MasterCard', 'test15', 'customer'),
(16, '1', 'Clay Moen Jr.', '084-891-30', '7634 Wuckert Forges\nWilliamsonhaven, ID 11361', 'Animi cupiditate voluptas illum in excepturi. Qui porro aspernatur cumque quas ut voluptas. Impedit ex architecto autem aspernatur excepturi quisquam. Placeat et error qui consequatur.', '/img/defavatar.webp', 0, 'MasterCard', 'test16', 'customer'),
(17, '1', 'Mrs. Jordane Conroy Jr.', '1-791-894-', '46989 Diego Wall\nWintheisertown, VA 60102', 'Rem quia officiis porro pariatur illum occaecati. Animi commodi qui a magni expedita. Soluta et nobis aut quo qui voluptatem explicabo. Et rem consectetur consequatur earum.', '/img/defavatar.webp', 0, 'MasterCard', 'test17', 'customer'),
(18, '1', 'Lennie Buckridge DDS', '1-147-661-', '4640 Collins Valleys\nPort Etha, SC 73957', 'Mollitia ipsum voluptates repellat ullam reprehenderit. Minima consequatur totam autem repellendus earum in. Et aliquam expedita consectetur aliquam. Necessitatibus inventore tempore rerum ipsa.', '/img/defavatar.webp', 537653, 'Visa', 'test18', 'customer'),
(19, '1', 'Mr. Lucious Hodkiewicz', '1-567-115-', '9227 Simonis Stravenue\nRutherfordmouth, WV 92841', 'Quo maiores accusantium dicta aut modi aut. Qui debitis non et et eligendi. Reiciendis dolorum dolor sit quis.', '/img/defavatar.webp', 0, 'Visa', 'test19', 'customer'),
(20, '1', 'Prof. Madison Gaylord', '(185)900-9', '00811 Helmer Forks Apt. 588\nClintmouth, CA 78599', 'Natus vel autem eum quo sunt nostrum et. Dolores sit sit quasi aliquam aut libero. Quam ratione atque saepe voluptas ut.', '/img/defavatar.webp', 3703, 'Visa', 'test20', 'customer'),
(21, '1234567', 'Phạm Hửu T', '0312345243', 'Bình Dương, Vĩnh Long', 'đổi tiếp luôn', '/img/5-tren-giay-729x1024.jpg', 1700000, 'Vietcombank', 'tri123', 'admin'),
(27, '12345678', 'Tên Của Bạn', '0312345678', 'Việt Nam', NULL, '/img/AnhMacDinh.jpg', 0, NULL, 'thunghiemdangky1', 'customer');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `nameId` (`nameId`);

--
-- Chỉ mục cho bảng `bookname`
--
ALTER TABLE `bookname`
  ADD PRIMARY KEY (`nameId`),
  ADD KEY `typeId` (`typeId`);

--
-- Chỉ mục cho bảng `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`typeId`);

--
-- Chỉ mục cho bảng `borrowcard`
--
ALTER TABLE `borrowcard`
  ADD PRIMARY KEY (`cardId`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `bookname`
--
ALTER TABLE `bookname`
  MODIFY `nameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `booktype`
--
ALTER TABLE `booktype`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `borrowcard`
--
ALTER TABLE `borrowcard`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`nameId`) REFERENCES `bookname` (`nameId`);

--
-- Các ràng buộc cho bảng `bookname`
--
ALTER TABLE `bookname`
  ADD CONSTRAINT `bookname_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `booktype` (`typeId`);

--
-- Các ràng buộc cho bảng `borrowcard`
--
ALTER TABLE `borrowcard`
  ADD CONSTRAINT `borrowcard_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `borrowcard_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
