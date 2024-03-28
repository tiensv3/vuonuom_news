-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2024 lúc 03:48 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vuonuom_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `token`, `code`, `created_at`, `updated_at`) VALUES
(1, 'sostien0409@gmail.com', 'b752e76141fdabe92d77024ddece3dc7', NULL, NULL, '2024-03-25 08:46:48', '2024-03-13 07:44:11'),
(2, 'khoinghieptravinh@gmail.com', '7f81628e28deeab43627b360fea3e3f3', NULL, NULL, '2024-03-28 14:48:27', '2024-03-28 14:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `img`, `status`, `created_at`) VALUES
(5, '../uploads/banner_20240325134323_WEB TT&VU-01.png', 1, '2024-03-25 06:43:23'),
(6, '../uploads/banner_20240325134327_WEB TT&VU-02.png', 1, '2024-03-25 06:43:27'),
(7, '../uploads/banner_20240325134331_WEB TT&VU-03.png', 1, '2024-03-25 06:43:31'),
(8, '../uploads/banner_20240325134335_WEB TT&VU-04.png', 1, '2024-03-25 06:43:35'),
(9, '../uploads/banner_20240325134341_WEB TT&VU-05.png', 1, '2024-03-25 06:43:41'),
(10, '../uploads/banner_20240325134345_WEB TT&VU-06.png', 1, '2024-03-25 06:43:45'),
(11, '../uploads/banner_20240325134349_WEB TT&VU-07.png', 1, '2024-03-25 06:43:49'),
(12, '../uploads/banner_20240325134353_WEB TT&VU-08.png', 1, '2024-03-25 06:43:53'),
(13, '../uploads/banner_20240325134358_WEB TT&VU-09.png', 1, '2024-03-25 06:43:58'),
(14, '../uploads/banner_20240325134402_WEB TT&VU-10.png', 1, '2024-03-25 06:44:02'),
(15, '../uploads/banner_20240325134410_WEB TT&VU-11.png', 1, '2024-03-25 06:44:10'),
(16, '../uploads/banner_20240325134417_WEB TT&VU-12.png', 1, '2024-03-25 06:44:17'),
(17, '../uploads/banner_20240325134421_WEB TT&VU-13.png', 1, '2024-03-25 06:44:21'),
(18, '../uploads/banner_20240325134426_WEB TT&VU-14.png', 1, '2024-03-25 06:44:26'),
(19, '../uploads/banner_20240325134436_WEB TT&VU-15.png', 1, '2024-03-25 06:44:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `basicservices`
--

CREATE TABLE `basicservices` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `basicservices`
--

INSERT INTO `basicservices` (`id`, `name`, `unit`, `status`, `price`, `des`) VALUES
(1, 'Thuê văn phòng Vườn ươm', 0, 1, 2500000, 'a'),
(2, 'Thuê văn phòng ảo', 1, 1, 500000, 'b'),
(3, 'Đào tạo và tổ chức sự kiện', 0, 1, NULL, 'c'),
(4, 'Đăng ký và thiết kế Website', 2, 1, 2279000, 'd'),
(5, 'Đăng ký và thiết kế Website', 3, 1, 3479000, 'e'),
(6, 'Đăng ký và thiết kế Website', 4, 1, 4579000, 'f');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'HỌC VIỆN KHỞI NGHIỆP', 1),
(3, 'HUẤN LUYỆN DOANH NGHIỆP', 1),
(4, 'TIN HOẠT ĐỘNG', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contentmarketings`
--

CREATE TABLE `contentmarketings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contentmarketings`
--

INSERT INTO `contentmarketings` (`id`, `name`, `unit`, `price`, `status`, `des`) VALUES
(1, '10 ảnh thiết kế & bài Content', 0, 2000000, 1, ''),
(2, '15 ảnh thiết kế & bài Content', 1, 2690000, 1, ''),
(3, '20 ảnh thiết kế & bài Content', 2, 3190000, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `designservices`
--

CREATE TABLE `designservices` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `designservices`
--

INSERT INTO `designservices` (`id`, `name`, `unit`, `status`, `price`, `des`) VALUES
(1, 'Thiết kế bộ nhận dạng thương hiệu cho doanh nghiệp', 0, 1, 2000000, ''),
(2, 'Thiết kế bộ nhận dạng thương hiệu cho doanh nghiệp', 1, 1, 4000000, ''),
(3, 'Thiết kế bộ nhận dạng thương hiệu cho doanh nghiệp', 2, 1, 5500000, ''),
(4, 'Thiết kế ấn phẩm truyền thông', 0, 1, 1000000, ''),
(6, 'Thiết kế ấn phẩm truyền thông', 1, 1, 2000000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `des` longtext NOT NULL,
  `slug` text NOT NULL,
  `url` text DEFAULT NULL,
  `img` text NOT NULL,
  `content` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `statusHot` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `name`, `des`, `slug`, `url`, `img`, `content`, `status`, `statusHot`, `created_at`) VALUES
(10, 'HỘI ĐỒNG CỐ VẤN KHỞI NGHIỆP TỈNH TRÀ VINH TUYỂN THÀNH VIÊN', 'Hãy cùng nhau tham gia để tạo dựng nên một cộng đồng Khởi nghiệp san sẻ, gắn kết và xây dựng cho Quê hương Trà Vinh ngày càng phát triển', 'hoi-dong-co-van-khoi-nghiep-tinh-tra-vinh-tuyen-thanh-vien', 'https://zalo.me/g/sbuaag812', '1711508971_425497511_430679062621115_2215310786382934312_n.jpg', '<p><span style=\"font-size:14px\"><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Với sứ m&ecirc;̣nh x&acirc;y dựng một cộng đồng khởi nghiệp mạnh mẽ, ph&aacute;t triển bền vững, l&agrave; nguồn động vi&ecirc;n, hỗ trợ v&agrave; nguồn lực qu&yacute; b&aacute;u cho thế hệ trẻ khởi nghiệp của tỉnh Trà Vinh. Để thực hiện mục ti&ecirc;u n&agrave;y, Hội đồng Cố vấn Khởi nghiệp tỉnh Tr&agrave; Vinh (TSAC) mời gọi c&aacute;c bạn gia nhập vào H&ocirc;̣i Đ&ocirc;̀ng, nơi m&agrave; sự đ&ocirc;̉i mới - s&aacute;ng tạo, ki&ecirc;́n thức, kinh nghiệm, trải nghi&ecirc;̣m sẽ được c&ocirc;̣ng hưởng và tạo n&ecirc;n m&ocirc;̣t c&ocirc;̣ng đ&ocirc;̀ng phát tri&ecirc;̉n kh&ocirc;ng ngừng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Lí do n&ecirc;n tham gia:</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Cơ hội chia sẻ những kinh nghiệm của mình cho th&ecirc;́ h&ecirc;̣ trẻ</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Mở rộng mạng lưới quan hệ v&agrave; kết nối</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Nơi để giao lưu v&agrave; học hỏi từ thành vi&ecirc;n trong H&ocirc;̣i đ&ocirc;̀ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Cơ h&ocirc;̣i giảng dạy tại Khoa chuy&ecirc;n m&ocirc;n ở TVU</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Giảm học phí khi tham gia chương trình đào tạo:</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Giảm 10% cho chương trình Nghi&ecirc;n cứu sinh (Ti&ecirc;́n sĩ)</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Giảm 15% cho chương trình Cao học (Thạc sĩ)</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Giảm 20% Cho Đại học li&ecirc;n th&ocirc;ng, vừa học vừa làm, từ xa, văn bằng 2</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Giảm 50% học phí cho lớp B&ocirc;̀i dưỡng Nghi&ecirc;̣p vụ sư phạm trong cơ sở giáo dục đại học của Vi&ecirc;̣n Phát tri&ecirc;̉n Ngu&ocirc;̀n lực (RDI)</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"⛔\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t44/1.5/16/26d4.png\" style=\"height:16px; width:16px\" /> Đi&ecirc;̀u ki&ecirc;̣n tham gia:</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Phải l&agrave; doanh nghiệp hoạt động hiệu quả</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Sẵn s&agrave;ng chia sẻ kiến thức, kinh nghiệm</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Khuy&ecirc;́n khích tham gia các hoạt đ&ocirc;̣ng của TSAC</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" /> Thời gian đăng ký tham gia từ ngày th&ocirc;ng báo đ&ecirc;́n h&ecirc;́t ngày 18/02/2024</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> H&atilde;y c&ugrave;ng nhau tham gia đ&ecirc;̉ tạo dựng n&ecirc;n m&ocirc;̣t c&ocirc;̣ng đ&ocirc;̀ng Khởi nghi&ecirc;̣p san sẻ, gắn kết v&agrave; x&acirc;y dựng cho Qu&ecirc; hương Trà Vinh ngày càng ph&aacute;t triển!</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ngu&ocirc;̀n ảnh: L&ecirc;̃ k&ecirc;́t nạp thành vi&ecirc;n TSAC năm 2023</span></p>\r\n\r\n<p><img alt=\"Lễ kết nạp thành viên TSAC năm 2023\" src=\"https://scontent.fhan3-4.fna.fbcdn.net/v/t39.30808-6/425497511_430679062621115_2215310786382934312_n.jpg?stp=dst-jpg_p960x960&amp;_nc_cat=106&amp;ccb=1-7&amp;_nc_sid=5f2048&amp;_nc_ohc=6DF132duTR4AX9WA68Y&amp;_nc_ht=scontent.fhan3-4.fna&amp;oh=00_AfAdJzP9peqiBVWRXv-21Eqns6gVVXNgqGqKxGMi1BjyRw&amp;oe=6608E6E8\" style=\"height:960px; width:1440px\" /></p>\r\n\r\n<p style=\"text-align:center\">Ảnh: L&ecirc;̃ k&ecirc;́t nạp thành vi&ecirc;n TSAC năm 2023</p>\r\n', 1, 1, '2024-03-27 04:50:26'),
(11, 'KICK OFF 2024 - SỰ KHỞI ĐẦU NGUỒN NĂNG LƯỢNG MỚI', 'Chào đón năm mới bằng sự kiện đặc biệt mang tên “KICK OFF 2024”', 'kick-off-2024-su-khoi-dau-nguon-nang-luong-moi', 'https://zalo.me/g/zvjinb259121', '1711509682_Screenshot 2024-03-27 101702.png', '<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Ch&agrave;o đ&oacute;n năm mới bằng sự kiện đặc biệt mang t&ecirc;n &ldquo;KICK OFF 2024&rdquo; đ&acirc;y l&agrave; một dấu mốc quan trọng đ&aacute;nh dấu sự khởi đầu đầy năng lượng của trong lĩnh vực hỗ trợ khởi nghiệp. Tại đ&acirc;y, ch&uacute;ng ta sẽ c&ugrave;ng nhau tổng kết, đ&aacute;nh gi&aacute; kết quả v&agrave; th&agrave;nh tựu của c&ocirc;ng t&aacute;c hỗ trợ khởi nghiệp trong năm 2023, kịp thời khen thưởng c&aacute;c c&aacute; nh&acirc;n hướng dẫn dự &aacute;n khởi nghiệp, c&aacute;c c&aacute; nh&acirc;n, nh&oacute;m t&aacute;c giả đạt th&agrave;nh t&iacute;ch cao trong hoạt động khởi nghiệp. Đồng thời, đề ra chương tr&igrave;nh c&ocirc;ng t&aacute;c hỗ trợ khởi nghiệp năm 2024 sẽ hứa hẹn một năm mới đầy triển vọng cho cộng đồng khởi nghiệp Trường Đại học Trà Vinh nói ri&ecirc;ng và của Tỉnh Trà Vinh nói chung.</p>\r\n\r\n<p>Đặt bi&ecirc;̣t tại sự ki&ecirc;̣n KICK OFF 2024 sẽ di&ecirc;̃n ra L&ecirc;̃ K&ecirc;́t nạp thành vi&ecirc;n mới của H&ocirc;̣i đ&ocirc;̀ng C&ocirc;́ v&acirc;́n Khởi nghi&ecirc;̣p tỉnh Trà Vinh.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1f/1.5/16/1f680.png\" style=\"height:16px; width:16px\" /> Th&ocirc;ng tin tham dự sự ki&ecirc;̣n với thời gian, địa điểm cụ thể như sau:</p>\r\n\r\n<p><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" /> Thời gian: 13 giờ 30 ph&uacute;t ng&agrave;y 24/02/2024 (Thứ 7).</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Địa điểm: Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh &ndash; Khu I, Trường Đại học Tr&agrave; Vinh.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> Hẹn gặp bạn tại sự ki&ecirc;̣n KICK OFF 2024 !!!</p>\r\n', 1, 1, '2024-03-27 06:51:17'),
(12, 'QUẢN TRỊ DOANH NGHIỆP THEO TIÊU CHUẨN ISO 9001:2015', 'đăng ký ngay để trở thành một doanh nghiệp vượt trội và đạt chuẩn quốc tế với hệ thống quản lý chất lượng theo tiêu chuẩn ISO 9001:2015', 'quan-tri-doanh-nghiep-theo-tieu-chuan-iso-90012015', 'https://zalo.me/g/njxcck130', '1711512372_431945002_449424154079939_8034110986330852206_n.jpg', '<p><img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> AI C&Oacute; THỂ THAM GIA CHƯƠNG TR&Igrave;NH &quot;N&Acirc;NG CAO CHẤT LƯỢNG QUẢN TRỊ DOANH NGHIỆP&rdquo; <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Chương tr&igrave;nh được tổ chức nhằm th&uacute;c đẩy chất lượng quản trị doanh nghiệp, tạo ra sự đột ph&aacute; trong từng lĩnh vực của c&aacute;c doanh nghiệp, đồng thời n&acirc;ng cao sự chuy&ecirc;n nghiệp v&agrave; cải thiện chất lượng quản trị doanh nghiệp.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t25/1.5/16/1f4dd.png\" style=\"height:16px; width:16px\" /> Đối tượng c&oacute; thể tham gia chương tr&igrave;nh n&agrave;y l&agrave;:</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> C&aacute;c doanh nghiệp, tổ chức kinh doanh vừa v&agrave; nhỏ;</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> C&aacute;c m&ocirc; h&igrave;nh hợp t&aacute;c x&atilde;</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> C&aacute;c hộ kinh doanh;</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> C&aacute;c &yacute; tưởng, dự &aacute;n khởi nghiệp.</p>\r\n\r\n<p><img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> KHI THAM GIA CHƯƠNG TR&Igrave;NH &ldquo;N&Acirc;NG CAO CHẤT LƯỢNG QUẢN TRỊ DOANH NGHIỆP&rdquo; BẠN SẼ ĐẠT ĐƯỢC NHỮNG G&Igrave; <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /> <img alt=\"❓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td3/1.5/16/2753.png\" style=\"height:16px; width:16px\" /></p>\r\n\r\n<p>--------------------</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Chương tr&igrave;nh n&agrave;y kh&ocirc;ng chỉ l&agrave; một nơi truyền cảm hứng v&agrave; đổi mới, m&agrave; c&ograve;n l&agrave; một cơ hội để bạn ph&aacute;t triển kỹ năng quản l&yacute; v&agrave; x&acirc;y dựng mối quan hệ trong cộng đồng doanh nghiệp. Đồng thời, tại đ&acirc;y sẽ đem lại lợi &iacute;ch bổ sung l&agrave;m tăng cao chất lượng v&agrave; hiệu suất hoạt động của doanh nghiệp. C&ugrave;ng đ&oacute;n nhận th&aacute;ch thức v&agrave; sẵn l&ograve;ng tiến xa hơn trong sự nghiệp của bạn!</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> <img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> <img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> Khi tham gia chương tr&igrave;nh bạn sẽ được chia sẻ về c&aacute;c nội dung:</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> 10 lợi &iacute;ch khi doanh nghiệp &aacute;p dụng ISO 9001;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> 07 nguy&ecirc;n tắc quản l&yacute; chất lượng;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> Phương ph&aacute;p x&acirc;y dựng kế hoạch hiệu quả;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> Th&ocirc;ng tin c&aacute;c văn bản bắt buộc trong trong ISO 9001:2015.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t25/1.5/16/1f4dd.png\" style=\"height:16px; width:16px\" /> H&atilde;y đăng k&yacute; ngay để trở th&agrave;nh một doanh nghiệp vượt trội v&agrave; đạt chuẩn quốc tế với hệ thống quản l&yacute; chất lượng theo ti&ecirc;u chuẩn ISO 9001:2015.</p>\r\n\r\n<p><img alt=\"Có thể là hình ảnh về 1 người và văn bản cho biết \'BCĐ THỰC HIỆN TÌNH TRA INH RAVINH CIE QAS NOCOHINA INCUBATOR XÂY DỰNG DOANH NGHIỆP QUẢN TRỊ DOANH NGHIỆP THEO TIÊU CHUẨN ISO 9001:2015 Ãng: Trân Quang Hà Thành viên sáng lập Công ty QAS Đông Dương, Chuyên gia đánh của chức chứng nhận GCERTI Indochina. THÁNG 30 2024 ĐÃNG KÝ VƯỜN ƯƠM DN TỈNH TRÀ VINH KHU TRƯỜNG ĐẠI HỌC TRÀ VINH\'\" src=\"https://scontent.fsgn5-9.fna.fbcdn.net/v/t39.30808-6/434187783_457856509903370_9076720018315623562_n.jpg?_nc_cat=105&amp;ccb=1-7&amp;_nc_sid=5f2048&amp;_nc_ohc=TQASMqa2TwQAX9a6AkX&amp;_nc_ht=scontent.fsgn5-9.fna&amp;oh=00_AfAJnaCQtyMWnhipCaPe8Bdjmmn9mEY0ZuDjbuhwgDXH0w&amp;oe=6609A02D\" style=\"height:1440px; width:1440px\" /></p>\r\n', 1, 1, '2024-03-27 06:52:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fanpageservices`
--

CREATE TABLE `fanpageservices` (
  `id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `des` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fanpageservices`
--

INSERT INTO `fanpageservices` (`id`, `unit`, `price`, `des`, `status`) VALUES
(1, 0, 2200000, '<ol>\n	<li>Thiết kế ảnh b&igrave;a</li>\n	<li>Thiết kế avatar</li>\n	<li>Tối ưu fanpage chuẩn SEO</li>\n	<li>B&agrave;i viết quảng c&aacute;o</li>\n	<li>Thiết kế ảnh đăng</li>\n</ol>\n\n<ul>\n	<li>100 Like Fanpage</li>\n	<li>08 B&agrave;i Content</li>\n	<li>08 ảnh thiết kế</li>\n	<li>100 Like/b&agrave;i viết</li>\n	<li>05 B&igrave;nh luận/b&agrave;i</li>\n</ul>\n', 1),
(2, 1, 3390000, '<ol>\r\n	<li>Thiết kế ảnh b&igrave;a</li>\r\n	<li>Thiết kế avatar</li>\r\n	<li>Tối ưu fanpage chuẩn SEO</li>\r\n	<li>B&agrave;i viết quảng c&aacute;o</li>\r\n	<li>Thiết kế ảnh đăng</li>\r\n	<li>X&acirc;y dựng Video</li>\r\n	<li>Chiến dịch quảng c&aacute;o</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>200 Like Fanpage</li>\r\n	<li>12 B&agrave;i Content</li>\r\n	<li>12 ảnh thiết kế</li>\r\n	<li>01 Video dưới 60s</li>\r\n	<li>150 Like/b&agrave;i viết</li>\r\n	<li>08 B&igrave;nh luận/b&agrave;i</li>\r\n	<li>01 chiến dịch quảng c&aacute;o</li>\r\n</ul>\r\n', 1),
(3, 2, 3990000, '<ol>\r\n	<li>Thiết kế ảnh b&igrave;a</li>\r\n	<li>Thiết kế avatar</li>\r\n	<li>Tối ưu SEO chuy&ecirc;n s&acirc;u</li>\r\n	<li>B&agrave;i viết quảng c&aacute;o chuẩn SEO</li>\r\n	<li>Thiết kế ảnh đăng</li>\r\n	<li>Chiến dịch quảng c&aacute;o chuy&ecirc;n s&acirc;u</li>\r\n	<li>X&acirc;y dựng Video chuy&ecirc;n s&acirc;u</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>500 Like Fanpage</li>\r\n	<li>20&nbsp;B&agrave;i Content</li>\r\n	<li>20&nbsp;ảnh thiết kế</li>\r\n	<li>01 Video chuy&ecirc;n s&acirc;u&nbsp;dưới 60s</li>\r\n	<li>200&nbsp;Like/b&agrave;i viết</li>\r\n	<li>12 B&igrave;nh luận/b&agrave;i</li>\r\n	<li>02&nbsp;chiến dịch quảng c&aacute;o</li>\r\n</ul>\r\n', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `content` longtext NOT NULL,
  `img` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `statusHot` int(11) NOT NULL,
  `des` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `categoryid`, `title`, `slug`, `content`, `img`, `status`, `statusHot`, `des`, `created_at`) VALUES
(4, 4, 'Tổng kết hoạt động khởi nghiệp đổi mới sáng tạo năm 2023', 'tong-ket-hoat-dong-khoi-nghiep-doi-moi-sang-tao-nam-2023', '<h2><span style=\"font-size:16px\">Chiều ng&agrave;y 24/02, Trường Đại học Tr&agrave; Vinh (ĐHTV) tổ chức tổng kết c&aacute;c hoạt động hỗ trợ khởi nghiệp đổi mới s&aacute;ng tạo năm 2023, triển khai nhiệm vụ năm 2024 (Kick off 2024).</span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182518IMG_8530.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Đại biểu dự hội nghị.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tham dự hội nghị c&oacute; đại diện l&atilde;nh đạo c&oacute; c&aacute;c đồng ch&iacute;: Nguyễn Ho&agrave;ng Đệ, Ph&oacute; Gi&aacute;m đốc Sở Kế hoạch v&agrave; Đầu tư, Ph&oacute; Trưởng ban Chỉ đạo thực hiện Đề &aacute;n hỗ trợ khởi nghiệp tỉnh Tr&agrave; Vinh; Phạm Phước Tr&atilde;i, Ph&oacute; Gi&aacute;m đốc Sở C&ocirc;ng thương; Th&aacute;i Phước Lộc, Chủ tịch Li&ecirc;n minh Hợp t&aacute;c x&atilde; (HTX) tỉnh; PGS.TS Diệp Thanh T&ugrave;ng, Ph&oacute; Hiệu trưởng Trường ĐHTV v&agrave; c&aacute;c đơn vị trực thuộc; đại diện c&aacute;c c&ocirc;ng ty, doanh nghiệp, chuy&ecirc;n gia thuộc Hội đồng cố vấn khởi nghiệp tỉnh Tr&agrave; Vinh, c&aacute;c HTX, c&acirc;u lạc bộ, sinh vi&ecirc;n c&oacute; th&agrave;nh t&iacute;ch trong hoạt động khởi nghiệp của trường tham dự.</p>\r\n\r\n<p>Thạc sĩ Nguyễn Văn Vũ An, Gi&aacute;m đốc Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh (Vườn ươm), Gi&aacute;m đốc Trung t&acirc;m Đổi mới S&aacute;ng tạo v&agrave; Khởi nghiệp, Trường ĐHTV chủ tọa hội nghị.</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182605IMG_8605.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>B&agrave; Huỳnh Hồng Mai, Ph&oacute; gi&aacute;m đốc Trung t&acirc;m s&aacute;ng tạo - ươm tạo Trường Đại học Nguyễn Tất Th&agrave;nh đ&aacute;nh gi&aacute; cao hiệu quả hoạt động năm 2023 của Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Năm 2023, Vườn ươm đẩy mạnh c&aacute;c hoạt động truyền th&ocirc;ng, tổ chức gần 30 sự kiện truyền th&ocirc;ng đến với gần 265.000 bạn trẻ trong khu cực đồng bằng s&ocirc;ng Cửu Long v&agrave; hơn 1.000 lượt doanh nghiệp, HTX, hộ kinh doanh tr&ecirc;n địa b&agrave;n tỉnh; đ&agrave;o tạo, tập huấn cho 20 cố vấn khởi nghiệp v&agrave; gần 400 lượt doanh nghiệp, HTX, hộ kinh doanh, dự &aacute;n khởi nghiệp. Học tập kinh nghiệm m&ocirc; h&igrave;nh Vườn ươm doanh nghiệp trong v&agrave; ngo&agrave;i nước, nhằm x&acirc;y dựng định hướng ph&aacute;t triển Vườn ươm ph&ugrave; hợp trong thời gian tới. Đồng thời, ch&uacute; trọng v&agrave; ph&aacute;t triển hệ sinh th&aacute;i của Vườn ươm, hỗ trợ đối tượng ươm tạo khởi nghiệp, ch&uacute; trọng ph&aacute;t triển c&aacute;c dịch vụ c&oacute; thu, tạo điều kiện gi&uacute;p Vườn ươm từng bước ph&aacute;t triển bền vững.</p>\r\n\r\n<p>B&ecirc;n cạnh, Trung t&acirc;m Đổi mới S&aacute;ng tạo v&agrave; Khởi nghiệp tổ chức hoạt động truyền cảm hứng tinh thần khởi nghiệp cho hơn 330.000 lượt bạn trẻ (tr&ecirc;n 48.000 lượt sinh vi&ecirc;n Trường ĐHTV), gi&uacute;p bạn trẻ định hướng tốt hơn về khởi nghiệp. Đ&agrave;o tạo 60 c&aacute;n bộ nguồn đ&agrave;o tạo về khởi nghiệp đổi mới s&aacute;ng tạo, hơn 4.100 lượt sinh vi&ecirc;n về kiến thức v&agrave; kỹ năng khởi nghiệp đổi mới s&aacute;ng tạo, xuất bản 02 quyển s&aacute;ch chuy&ecirc;n khảo phục vụ cho c&ocirc;ng t&aacute;c đ&agrave;o tạo&hellip; g&oacute;p phần n&acirc;ng vị thế, uy t&iacute;n của Trường ĐHTV về phong tr&agrave;o khởi nghiệp đổi mới s&aacute;ng tạo.</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182825IMG_8668.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>PGS.TS Diệp Thanh T&ugrave;ng trao giấy khen Thạc sĩ Nguyễn Văn Vũ An c&oacute; th&agrave;nh t&iacute;ch xuất sắc trong phong tr&agrave;o khởi nghiệp năm 2023.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>L&atilde;nh đạo c&aacute;c sở, ng&agrave;nh đ&aacute;nh gi&aacute; cao hoạt động của Vườn ươm trong năm 2023. Đồng thời, đại biểu trao đổi, chia sẻ mong muốn tiếp tục được hợp t&aacute;c, kết nối với Vườn ươm, thực hiện kết nối, khởi nghiệp, th&agrave;nh lập HTX, hỗ trợ x&acirc;y dựng sản phẩm OCOP, chuyển đổi số trong n&ocirc;ng nghiệp, sản xuất xanh, hội thảo chuyển giao c&ocirc;ng nghệ, tham gia s&agrave;n thương mại điện tử&hellip;</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182715IMG_8652.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>PGS.TS Diệp Thanh T&ugrave;ng&nbsp;v&agrave; &ocirc;ng</em>&nbsp;<em>Nguyễn Văn To&agrave;n Cơ (Tổng Gi&aacute;m đốc C&ocirc;ng ty Cổ phần giải ph&aacute;p c&ocirc;ng nghệ FeLix) k&yacute; kết ghi nhớ hợp t&aacute;c.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với khẩu hiệu &ldquo;Hỗ trợ to&agrave;n diện, đổi mới s&aacute;ng tạo, kết nối, hiệu quả&rdquo;, năm 2024 Vườn ươm đề ra c&aacute;c chỉ ti&ecirc;u:&nbsp;<strong>(1)</strong>&nbsp;Truyền th&ocirc;ng c&aacute;c hoạt động, sự kiện Vườn ươm đến &iacute;t nhất 1.000 lượt doanh nghiệp, HTX, hộ kinh doanh tr&ecirc;n địa b&agrave;n tỉnh;&nbsp;<strong>(2)&nbsp;</strong>Đ&agrave;o tạo, tập huấn cho 20 cố vấn khởi nghiệp v&agrave; gần 400 lượt doanh nghiệp, HTX, hộ kinh doanh, dự &aacute;n khởi nghiệp tr&ecirc;n địa b&agrave;n tỉnh;&nbsp;<strong>(3)</strong>&nbsp;Phối hợp bi&ecirc;n soạn v&agrave; xuất bản &iacute;t nhất 01 quyển s&aacute;ch chuy&ecirc;n khảo phục vụ c&ocirc;ng t&aacute;c đ&agrave;o tạo, ươm tạo cho đối tượng huấn luyện, ươm tạo của Vườn ươm;&nbsp;<strong>(4)</strong>&nbsp;Tổ chức đ&agrave;o tạo chuy&ecirc;n s&acirc;u &ldquo;Học viện khởi nghiệp&rdquo; thu h&uacute;t &iacute;t nhất 20 doanh nghiệp/HTX/dự &aacute;n khởi nghiệp đăng k&yacute; tham gia;&nbsp;<strong>(5)</strong>&nbsp;T&igrave;m kiếm v&agrave; tham mưu Trường k&yacute; kết thỏa thuận hợp t&aacute;c với &iacute;t nhất 10 đơn vị, tổ chức ươm tạo, th&uacute;c đẩy khởi nghiệp trong v&agrave; ngo&agrave;i nước để h&igrave;nh th&agrave;nh n&ecirc;n hệ sinh th&aacute;i hỗ trợ đối tượng ươm tạo khởi nghiệp.</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182633IMG_8633.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Thạc sĩ Nguyễn Văn Vũ An trao quyết định kết nạp th&agrave;nh vi&ecirc;n Hội đồng Cố vấn khởi nghiệp tỉnh Tr&agrave; Vinh.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dịp n&agrave;y, Vườn ươm ra mắt C&ocirc;ng ty TNHH một th&agrave;nh vi&ecirc;n GoSef thuộc HTX sinh vi&ecirc;n Trường ĐHTV; Hội đồng Cố vấn khởi nghiệp tỉnh Tr&agrave; Vinh trao quyết định kết nạp th&ecirc;m 09 th&agrave;nh vi&ecirc;n mới; Trường ĐHTV v&agrave; đối t&aacute;c k&yacute; kết hợp t&aacute;c trong c&aacute;c hoạt động hỗ trợ khởi nghiệp đổi mới s&aacute;ng tạo.</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182841IMG_8666.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Đồng ch&iacute; Th&aacute;i Phước Lộc, Chủ tịch Li&ecirc;n minh HTX tỉnh trao giấy khen cho HTX sinh vi&ecirc;n Trường ĐHTV.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Li&ecirc;n minh HTX tỉnh khen thưởng HTX sinh vi&ecirc;n Trường ĐHTV c&oacute; th&agrave;nh t&iacute;ch xuất sắc trong phong tr&agrave;o x&acirc;y dựng HTX năm 2023. Trường ĐHTV khen thưởng 06 c&aacute; nh&acirc;n gi&aacute;o vi&ecirc;n, giảng vi&ecirc;n, 04 c&aacute; nh&acirc;n thuộc C&acirc;u lạc bộ khởi nghiệp, 08 nh&oacute;m t&aacute;c giả l&agrave; học sinh c&oacute; th&agrave;nh t&iacute;ch xuất sắc trong phong tr&agrave;o khởi nghiệp năm 2023.</p>\r\n\r\n<p><img src=\"https://cdn.baotravinh.vn/uploads/images/2024/02/24/182651IMG_8657.JPG\" style=\"margin-left:140px; margin-right:140px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>PGS.TS Diệp Thanh T&ugrave;ng ph&aacute;t biểu chỉ đạo tại hội nghị.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PGS.TS Diệp Thanh T&ugrave;ng nhận định: kết quả đạt được trong năm 2023 khẳng định sự nỗ lực của Vườn ươm v&agrave; sự hỗ trợ, đồng h&agrave;nh từ c&aacute;c cơ quan, tổ chức, c&aacute; nh&acirc;n c&oacute; li&ecirc;n quan. Hy vọng thời gian tới, Trường ĐHTV v&agrave; Vườn ươm tiếp tục nhận được sự quan t&acirc;m, hỗ trợ của c&aacute;c c&aacute; nh&acirc;n, cơ quan, đơn vị, tiếp tục n&acirc;ng cao tinh thần đổi mới, s&aacute;ng tạo, đ&aacute;p ứng kịp thời nhu cầu n&acirc;ng cao năng lực, giải quyết những kh&oacute; khăn của doanh nghiệp, HTX tr&ecirc;n địa b&agrave;n tỉnh. Hướng cộng đồng doanh nghiệp Tr&agrave; Vinh đến sự đổi mới v&agrave; ph&aacute;t triển bền vững.</p>\r\n\r\n<p>Nguồn: B&aacute;o Tr&agrave; Vinh</p>\r\n', '1711510073_Screenshot 2024-03-27 101702.png', 1, 1, ' Chiều ngày 24/02, Trường Đại học Trà Vinh (ĐHTV) tổ chức tổng kết các hoạt động hỗ trợ khởi nghiệp đổi mới sáng tạo năm 2023, triển khai nhiệm vụ năm 2024 (Kick off 2024)', '2024-03-27 03:45:27'),
(5, 4, 'Một năm đầy ắp dấu ấn tại Vườn ươm doanh nghiệp tỉnh Trà Vinh', 'mot-nam-day-ap-dau-an-tai-vuon-uom-doanh-nghiep-tinh-tra-vinh', '<p>C&ugrave;ng nh&igrave;n lại h&agrave;nh tr&igrave;nh một năm qua, Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh đ&atilde; ghi dấu những th&agrave;nh tựu đ&aacute;ng tự h&agrave;o, khẳng định vai tr&ograve; quan trọng trong việc hỗ trợ c&aacute;c &yacute; tưởng, dự &aacute;n khởi nghiệp v&agrave; đồng h&agrave;nh c&ugrave;ng c&aacute;c họp t&aacute;c x&atilde;, hộ kinh doanh, doanh nghiệp tr&ecirc;n địa b&agrave;n tỉnh Tr&agrave; Vinh.</p>\r\n\r\n<p>Với sự nỗ lực của đội ngũ c&aacute;n bộ, nh&acirc;n vi&ecirc;n v&agrave; sự đồng h&agrave;nh của c&aacute;c chuy&ecirc;n gia, đối t&aacute;c, Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh đ&atilde;:</p>\r\n\r\n<p>X&acirc;y dựng c&aacute;c k&ecirc;nh truyền th&ocirc;ng, đồng thời tổ chức gần 30 sự kiện truyền th&ocirc;ng đến với gần 265.000 bạn trẻ trong khu cực Đồng bằng S&ocirc;ng Cửu Long, đến hơn 1.000 lượt doanh nghiệp, hợp t&aacute;c x&atilde;, hộ kinh doanh tr&ecirc;n địa b&agrave;n tỉnh.</p>\r\n\r\n<p>Đ&agrave;o tạo, tập huấn cho 20 cố vấn khởi nghiệp v&agrave; gần 400 lượt doanh nghiệp, hợp t&aacute;c x&atilde;, hộ kinh doanh, dự &aacute;n khởi nghiệp, g&oacute;p phần giải quyết vấn đề của c&aacute;c dự &aacute;n, doanh nghiệp khởi nghiệp, n&acirc;ng cao năng lực cho đối tượng được ươm tạo, đẩy nhanh sự tương t&aacute;c giữa doanh nghiệp v&agrave; thị trường, bắt buộc c&aacute;c doanh nghiệp phải th&iacute;ch nghi nhanh ch&oacute;ng trong một thời gian giới hạn.</p>\r\n\r\n<p>Ch&uacute; trọng v&agrave; ph&aacute;t triển rộng r&atilde;i hệ sinh th&aacute;i của Vườn ươm chẳng những trong khu vực m&agrave; c&ograve;n ph&aacute;t triển ra to&agrave;n quốc để h&igrave;nh th&agrave;nh n&ecirc;n hệ sinh th&aacute;i hỗ trợ đối tượng ươm tạo khởi nghiệp trong điều kiện thuận lợi nhất.</p>\r\n\r\n<p>Bước sang năm mới 2024, Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh tiếp tục sẽ l&agrave; đơn vị đồng h&agrave;nh c&ugrave;ng c&aacute;c &yacute; tưởng, dự &aacute;n, doanh nghiệp khởi nghiệp, hợp t&aacute;c x&atilde;, hộ kinh doanh, nỗ lực hỗ trợ v&agrave; tạo điều kiện để c&aacute;c đối t&aacute;c ph&aacute;t triển bền vững.</p>\r\n', '1711511006_Screenshot 2024-03-27 104259.png', 1, 1, 'Cùng nhìn lại hành trình một năm qua, Vườn ươm doanh nghiệp tỉnh Trà Vinh đã ghi dấu ấn gì', '2024-03-27 06:55:54'),
(6, 1, 'BÁN HÀNG ĐỈNH CAO TRÊN SÀN THƯƠNG MẠI ĐIỆN TỬ VÀ AFFILIATE', 'ban-hang-dinh-cao-tren-san-thuong-mai-dien-tu-va-affiliate', '<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Sức h&uacute;t v&agrave; vai tr&ograve; của thương mại điện tử v&agrave; Affiliate trong nền kinh tế số hiện nay cực k&igrave; quan trọng. S&agrave;n thương mại điện tử v&agrave; Affiliate kh&ocirc;ng chỉ l&agrave; những từ ngữ c&ocirc;ng nghiệp, m&agrave; l&agrave; những mảnh gh&eacute;p quan trọng trong bức tranh chuyển đổi kinh doanh hiện đại.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Nhằm gi&uacute;p c&aacute;c doanh nghiệp, hợp t&aacute;c x&atilde;, c&aacute;c dự &aacute;n khởi nghiệp,.. c&oacute; cơ hội để ph&aacute;t triển kỹ năng b&aacute;n h&agrave;ng của m&igrave;nh v&agrave; tận dụng tối đa tiềm năng của s&agrave;n thương mại điện tử cũng như tiếp thị li&ecirc;n kết, Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh tổ chức chương tr&igrave;nh &quot;Kỹ năng b&aacute;n h&agrave;ng tr&ecirc;n S&agrave;n thương mại điện tử v&agrave; b&aacute;n h&agrave;ng đỉnh cao với Affiliate&quot; để mở c&aacute;nh cửa mới trong lĩnh vực b&aacute;n h&agrave;ng trực tuyến.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Th&ocirc;ng tin về chuy&ecirc;n gia:</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> &Ocirc;NG: NGUYỄN VĂN TO&Agrave;N CƠ - Chủ tịch HĐQT, Tổng gi&aacute;m đốc &ndash; C&ocirc;ng ty Cổ phần Giải ph&aacute;p C&ocirc;ng nghệ Felix (Felix B2B)</p>\r\n\r\n<p><img alt=\"Có thể là hình ảnh về 1 người và văn bản cho biết \'BCĐ THỰC HIỆN ĐỀÁN HTKN TỈNH TRÀ VINH VINH BUSINESS INCUBATOR ELIX uality THÃNG TIN CHUYÊN GIA CHƯƠNG TRÌNH KỸ NĂNG BÁN HÀNG TRÊN SÀN THƯƠNG MẠI ĐIỆN TỬ VÀ BÁN HÀNG ĐỈNH CAO VỚI AFFILIATE VƯỜN ƯƠM DN TỈNH TRÀ VINH TRƯỜNG ĐẠI HỌC TRÀ VINH THÁNG 02 2024 Đăng ký ngay Ông Nguyễn Văn Toàn Cơ Chủ tịch HĐQT, Tống giám đố»c Công ty Cổ phần Giải pháp Công nghệ Felix (Felix B2B)\'\" src=\"https://scontent.fhan3-3.fna.fbcdn.net/v/t39.30808-6/430869777_443966871292334_7700695501322591744_n.jpg?_nc_cat=111&amp;ccb=1-7&amp;_nc_sid=5f2048&amp;_nc_ohc=UaYHjKJlYlAAX-Hfdyg&amp;_nc_ht=scontent.fhan3-3.fna&amp;oh=00_AfBS3pMzSjr3POfx-PRAIlaEEzPbIX1gPUOQbQD-9krIPQ&amp;oe=660879F3\" style=\"height:810px; width:1440px\" /></p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Th&ocirc;ng tin về chương tr&igrave;nh:</p>\r\n\r\n<p><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" /> Thời gian: 7h30 ng&agrave;y 02.3.2024</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Địa điểm: Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te6/1.5/16/1f500.png\" style=\"height:16px; width:16px\" /> Đăng k&yacute; tham dự qua <a href=\"https://zalo.me/g/norquw678\" rel=\"nofollow noreferrer\" tabindex=\"0\" target=\"_blank\">https://zalo.me/g/norquw678</a></p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t99/1.5/16/1f4a5.png\" style=\"height:16px; width:16px\" /> Tham gia ngay để bắt đầu h&agrave;nh tr&igrave;nh mới của thế giới b&aacute;n h&agrave;ng trực tuyến!</p>\r\n', '1711511425_428706585_443073888048299_3609273793975348536_n.jpg', 1, 1, 'Tham gia ngay để bắt đầu hành trình mới của thế giới bán hàng trực tuyến', '2024-03-27 06:56:46'),
(7, 1, 'Thông tin về chuyên gia của chương trình ', 'thong-tin-ve-chuyen-gia-cua-chuong-trinh-ban-hang-dinh-cao-tren-san-thuong-mai-dien-tu-va-affiliate', '<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Nguyễn Văn To&agrave;n Cơ - Chủ tịch HĐQT, Tổng gi&aacute;m đốc &ndash; C&ocirc;ng ty Cổ phần Giải ph&aacute;p C&ocirc;ng nghệ Felix (Felix B2B), &ocirc;ng l&agrave; một chuy&ecirc;n gia uy t&iacute;n trong lĩnh vực bảo hiểm nh&acirc;n thọ tại Việt Nam, với hơn 20 năm kinh nghiệm v&agrave; th&agrave;nh t&iacute;ch ấn tượng tại Dai-ichi Life Việt Nam. &Ocirc;ng đ&atilde; đồng h&agrave;nh c&ugrave;ng hơn 10.000 gia đ&igrave;nh tại Việt Nam, mang lại thu nhập v&agrave; cơ hội sở hữu nh&agrave; ở v&agrave; &ocirc; t&ocirc; c&aacute; nh&acirc;n.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Năm 2019, &ocirc;ng quyết định s&aacute;ng lập Felix, c&ocirc;ng ty hoạt động tr&ecirc;n nền tảng c&ocirc;ng nghệ thương mại điện tử trực tuyến tập trung v&agrave;o việc hỗ trợ doanh nghiệp ph&aacute;t triển tr&ecirc;n lĩnh vực b&aacute;n h&agrave;ng trực tuyến. Tại Felix, &ocirc;ng v&agrave; đội ngũ đ&atilde; ph&aacute;t triển nhiều dịch vụ v&agrave; sản phẩm ti&ecirc;n tiến, gi&uacute;p doanh nghiệp chuyển đổi số vược qua c&aacute;c th&aacute;ch thức của thị trường kinh doanh ở Việt Nam.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t50/1.5/16/1f48c.png\" style=\"height:16px; width:16px\" /> Trong buổi chương tr&igrave;nh, &ocirc;ng sẽ tr&igrave;nh b&agrave;y về kỹ năng b&aacute;n h&agrave;ng tr&ecirc;n s&agrave;n thương mại điện tử v&agrave; c&aacute;ch tận dụng hiệu quả tiềm năng của tiếp thị li&ecirc;n kết.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t99/1.5/16/1f4a5.png\" style=\"height:16px; width:16px\" /> Hẹn gặp Qu&yacute; vị v&agrave; c&aacute;c bạn tại chương tr&igrave;nh! See You!</p>\r\n\r\n<p><img alt=\"Có thể là hình ảnh về 1 người và văn bản cho biết \'BCĐ THỰC HIỆN ĐỀÁN HTKN TỈNH TRÀ VINH VINH BUSINESS INCUBATOR ELIX uality THÃNG TIN CHUYÊN GIA CHƯƠNG TRÌNH KỸ NĂNG BÁN HÀNG TRÊN SÀN THƯƠNG MẠI ĐIỆN TỬ VÀ BÁN HÀNG ĐỈNH CAO VỚI AFFILIATE VƯỜN ƯƠM DN TỈNH TRÀ VINH TRƯỜNG ĐẠI HỌC TRÀ VINH THÁNG 02 2024 Đăng ký ngay Ông Nguyễn Văn Toàn Cơ Chủ tịch HĐQT, Tống giám đố»c Công ty Cổ phần Giải pháp Công nghệ Felix (Felix B2B)\'\" src=\"https://scontent.fhan3-3.fna.fbcdn.net/v/t39.30808-6/430869777_443966871292334_7700695501322591744_n.jpg?_nc_cat=111&amp;ccb=1-7&amp;_nc_sid=5f2048&amp;_nc_ohc=UaYHjKJlYlAAX-Hfdyg&amp;_nc_ht=scontent.fhan3-3.fna&amp;oh=00_AfBS3pMzSjr3POfx-PRAIlaEEzPbIX1gPUOQbQD-9krIPQ&amp;oe=660879F3\" /></p>\r\n', '1711511723_430869777_443966871292334_7700695501322591744_n.jpg', 1, 0, 'BÁN HÀNG ĐỈNH CAO TRÊN SÀN THƯƠNG MẠI ĐIỆN TỬ VÀ AFFILIATE', '2024-03-27 06:57:26'),
(8, 4, 'Ý NGHĨA CỦA QUÀ TẶNG DOANH NGHIỆP', 'y-nghia-cua-qua-tang-doanh-nghiep', '<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> Bộ qu&agrave; tặng doanh nghiệp kh&ocirc;ng chỉ l&agrave; một m&oacute;n qu&agrave; vật chất, m&agrave; c&ograve;n l&agrave; c&ocirc;ng cụ hữu &iacute;ch mang lại nhiều lợi &iacute;ch quan trọng cho mọi doanh nghiệp.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Thay lời tri &acirc;n</p>\r\n\r\n<p>&Yacute; nghĩa đầu ti&ecirc;n phải điểm qua của qu&agrave; tặng doanh nghiệp đ&oacute; ch&iacute;nh l&agrave; thay lời tri &acirc;n ch&acirc;n th&agrave;nh nhất gửi đến c&aacute;c đối t&aacute;c, kh&aacute;ch h&agrave;ng, nh&acirc;n vi&ecirc;n của m&igrave;nh. Đ&oacute; l&agrave; những c&aacute; nh&acirc;n, tổ chức đ&atilde; g&oacute;p phần l&agrave;m n&ecirc;n th&agrave;nh c&ocirc;ng của doanh nghiệp v&agrave; sẽ c&ugrave;ng nhau hợp t&aacute;c l&acirc;u d&agrave;i trong tương lai.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Khẳng định gi&aacute; trị thương hiệu</p>\r\n\r\n<p>Song song đ&oacute;, chiến lược tặng qu&agrave; doanh nghiệp cũng mang đến những gi&aacute; trị về thương hiệu. Qu&agrave; tặng được đầu tư kỹ về h&igrave;nh thức b&ecirc;n ngo&agrave;i lẫn chất lượng b&ecirc;n trong, c&oacute; in logo thương hiệu v&agrave; th&ocirc;ng điệp sẽ tạo n&ecirc;n phong c&aacute;ch ri&ecirc;ng biệt cho doanh nghiệp đ&oacute;.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Thể hiện đẳng cấp</p>\r\n\r\n<p>Việc chọn qu&agrave; tặng doanh nghiệp phải ph&ugrave; hợp với nhu cầu, đối tượng nhận v&agrave; thời điểm. Những sản phẩm được đầu tư kỹ, c&oacute; thiết kế sang trọng v&agrave; chỉnh chu sẽ thể hiện được đẳng cấp ri&ecirc;ng.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Gắn k&ecirc;́t m&ocirc;́i quan h&ecirc;̣</p>\r\n\r\n<p>Để sự hợp t&aacute;c ng&agrave;y c&agrave;ng bền l&acirc;u, c&aacute;c mối quan hệ l&agrave;m ăn trở n&ecirc;n tốt đẹp hơn th&igrave; lu&ocirc;n cần c&oacute; những &ldquo;chất x&uacute;c t&aacute;c&rdquo;. Trong đ&oacute;, &ldquo;chất&rdquo; kh&ocirc;ng thể thiếu đ&oacute; ch&iacute;nh l&agrave; qu&agrave; tặng. Việc tặng qu&agrave; c&oacute; thể l&agrave; h&agrave;nh động nhỏ, nhưng cũng đủ thể hiện được tấm l&ograve;ng doanh nghiệp.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Quảng bá thương hi&ecirc;̣u</p>\r\n\r\n<p>Những m&oacute;n qu&agrave; tặng doanh nghiệp đơn giản như: &aacute;o mưa, mũ bảo hiểm, lịch treo tường,&hellip; c&oacute; in logo thương hiệu ch&iacute;nh l&agrave; một c&ocirc;ng cụ truyền th&ocirc;ng hiệu quả. Ch&uacute;ng được sử dụng thường xuy&ecirc;n, mỗi lần nh&igrave;n v&agrave;o đ&oacute; l&agrave; người nhận sẽ v&ocirc; t&igrave;nh ghi nhớ về thương hiệu doanh nghiệp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t99/1.5/16/1f4a5.png\" style=\"height:16px; width:16px\" /> Với những lợi &iacute;ch n&agrave;y, bộ qu&agrave; tặng doanh nghiệp kh&ocirc;ng chỉ l&agrave; một chiến lược quảng b&aacute; m&agrave; c&ograve;n l&agrave; một c&ocirc;ng cụ quan trọng để x&acirc;y dựng v&agrave; duy tr&igrave; mối quan hệ t&iacute;ch cực trong thế giới kinh doanh ng&agrave;y nay.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> Quý vị doanh nghi&ecirc;̣p x&acirc;y dựng B&ocirc;̣ quà tặng doanh nghi&ecirc;̣p vui lòng li&ecirc;n h&ecirc;̣ qua s&ocirc;́ đi&ecirc;̣n thoại: 0974 7676 01 - Mr. Khoa</p>\r\n\r\n<p><img src=\"http://localhost/admin/uploads/1711511822_430925122_446239781065043_2782927700656446584_n.jpg\" style=\"height:810px; width:1440px\" /></p>\r\n', '1711511822_430925122_446239781065043_2782927700656446584_n.jpg', 1, 0, 'Bộ quà tặng doanh nghiệp không chỉ là một món quà vật chất, mà còn là công cụ hữu ích mang lại nhiều lợi ích quan trọng cho mọi doanh nghiệp.', '2024-03-27 06:57:55'),
(9, 1, 'TIẾT LỘ CHƯƠNG TRÌNH ', 'tiet-lo-chuong-trinh-gen-z-startup-bootcamp', '<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Nhằm tạo s&acirc;n chơi cho c&aacute;c học sinh THPT tr&ecirc;n địa b&agrave;n tỉnh Tr&agrave; Vinh nh&acirc;n dịp kỷ niệm 93 năm Ng&agrave;y th&agrave;nh lập Đo&agrave;n TNCS Hồ Ch&iacute; Minh, Trường Đại học Tr&agrave; Vinh tr&acirc;n trọng giới thiệu chương tr&igrave;nh đ&agrave;o tạo đặc biệt v&ecirc;̀ kiến thức, kỹ năng khởi nghiệp t&acirc;̣p trung gọi tắt là &quot;Gen Z Startup Bootcamp&quot; tại Hội trại thanh ni&ecirc;n do Đo&agrave;n trường Đại học Tr&agrave; Vinh tổ chức.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Với quy m&ocirc; hơn 5.500 sinh vi&ecirc;n, học sinh tham gia sự kiện, chương tr&igrave;nh kh&ocirc;ng chỉ tạo ra một s&acirc;n chơi s&ocirc;i động cho c&aacute;c học sinh m&agrave; c&ograve;n đặt ra những cơ hội học tập v&agrave; những trải nghiệm n&acirc;ng cao kỹ năng khởi nghiệp bằng vi&ecirc;̣c tự nh&igrave;n nhận, ph&acirc;n t&iacute;ch v&agrave; đ&aacute;nh gi&aacute; bản th&acirc;n qua c&aacute;c b&agrave;i tập thực tế, từ đ&oacute; r&uacute;t ra những b&agrave;i học qu&yacute; gi&aacute; về kinh doanh v&agrave; quản l&yacute;.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1.5/16/1f340.png\" style=\"height:16px; width:16px\" /> Trường Đại học Tr&agrave; Vinh h&acirc;n hạnh mời Qu&yacute; trường THPT tham gia v&agrave;o h&agrave;nh tr&igrave;nh học tập v&agrave; trải nghiệm khởi nghiệp đầy th&uacute; vị mang t&ecirc;n &quot;Gen Z Startup Bootcamp&quot; với th&ocirc;ng tin cụ th&ecirc;̉ như sau:</p>\r\n\r\n<p><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" /> Thời gian: Từ 7g30 đến 20g30, ng&agrave;y 23/3/2024 (thứ 7).</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Từ 7g30 &ndash; 10g30 | Đ&agrave;o tạo tập trung qua b&agrave;i tập trải nghiệm &ldquo;M&ocirc; phỏng sản xuất kinh doanh &aacute;o sơ mi xuất khẩu&rdquo;.</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Từ 13g00 - 17g30 | Bán hàng thực t&ecirc;́ tại Hội trại thanh ni&ecirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"▶\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc7/1.5/16/25b6.png\" style=\"height:16px; width:16px\" /> Từ 17g30 - 20g30 | T&ocirc;̉ng k&ecirc;́t và Trao giải.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1f/1.5/16/1f6a9.png\" style=\"height:16px; width:16px\" /> Địa điểm: Khu 1, Trường Đại học Tr&agrave; Vinh.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Lưu ý:</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Mỗi trường THPT cử từ 01 đến 02 đội tham gia chương tr&igrave;nh. Mỗi đội từ 5 đến 10 học sinh v&agrave; 01 gi&aacute;o vi&ecirc;n tham gia l&agrave;m cố vấn.</p>\r\n\r\n<p><img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" /> Kinh ph&iacute;: C&aacute;c trường tự t&uacute;c kinh ph&iacute; đi lại, BTC hỗ trợ cơm trưa, cơm chiều. Đặc biệt, c&aacute;c trường tham gia c&oacute; cơ hội nhận thưởng (nếu đạt giải) v&agrave; lợi nhuận từ việc b&aacute;n h&agrave;ng tại Hội trại.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta6/1.5/16/1f4de.png\" style=\"height:16px; width:16px\" /> Qu&yacute; trường vui l&ograve;ng phản hồi việc tham gia qua email hoặc qua SĐT b&ecirc;n dưới đến hết ng&agrave;y 18/3/2024.</p>\r\n\r\n<p><img src=\"http://localhost/admin/uploads/1711511927_430948604_447971340891887_439647799529242517_n.jpg\" style=\"height:810px; width:1440px\" /></p>\r\n', '1711511927_430948604_447971340891887_439647799529242517_n.jpg', 1, 1, 'Nhằm tạo sân chơi cho các học sinh THPT trên địa bàn tỉnh Trà Vinh nhân dịp kỷ niệm 93 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh', '2024-03-27 06:58:24'),
(10, 3, 'NÂNG CAO CHẤT LƯỢNG QUẢN TRỊ DOANH NGHIỆP', 'nang-cao-chat-luong-quan-tri-doanh-nghiep', '<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f31f.png\" style=\"height:16px; width:16px\" /> Bạn muốn đẩy mạnh chất lượng quản trị doanh nghiệp v&agrave; tạo ra sự kh&aacute;c biệt trong ng&agrave;nh của m&igrave;nh?</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f31f.png\" style=\"height:16px; width:16px\" /> Bạn muốn tăng cường sự chuy&ecirc;n nghiệp v&agrave; n&acirc;ng cao chất lượng quản trị doanh nghiệp của m&igrave;nh?</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1.5/16/1f514.png\" style=\"height:16px; width:16px\" /> H&atilde;y đăng k&yacute; tham gia ngay chương tr&igrave;nh huấn luyện x&acirc;y dựng doanh nghiệp với chủ đề &quot;Quản trị doanh nghiệp theo ti&ecirc;u chuẩn ISO 9001:2015&quot; do Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh tổ chức.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" /> Đối tượng tham gia chương tr&igrave;nh: Doanh nghiệp/hợp t&aacute;c x&atilde;/hộ kinh doanh/&yacute; tưởng/dự &aacute;n khởi nghiệp.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1a/1.5/16/1f50d.png\" style=\"height:16px; width:16px\" /> Tại sao bạn n&ecirc;n tham gia chương tr&igrave;nh n&agrave;y???</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> <img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> <img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1.5/16/1f513.png\" style=\"height:16px; width:16px\" /> Qu&yacute; doanh nghiệp/hợp t&aacute;c x&atilde;/hộ kinh doanh/&yacute; tưởng/dự &aacute;n khởi nghiệp sẽ được Diễn giả chia sẻ về:</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> 10 lợi &iacute;ch khi doanh nghiệp &aacute;p dụng ISO 9001;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> 07 nguy&ecirc;n tắc quản l&yacute; chất lượng;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> Phương ph&aacute;p x&acirc;y dựng kế hoạch hiệu quả;</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1.5/16/1f511.png\" style=\"height:16px; width:16px\" /> Th&ocirc;ng tin c&aacute;c văn bản bắt buộc trong trong ISO 9001:2015.</p>\r\n\r\n<p><img alt=\"????️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2/1.5/16/1f199.png\" style=\"height:16px; width:16px\" /> Diễn giả chia sẻ tại chương tr&igrave;nh: &Ocirc;ng Trần Quang H&agrave; - Th&agrave;nh vi&ecirc;n s&aacute;ng lập C&ocirc;ng ty QAS Đ&ocirc;ng Dương; Chuy&ecirc;n gia đ&aacute;nh gi&aacute; của tổ chức chứng nhận GCERTI Indochina.</p>\r\n\r\n<p><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" /> Thời gian diễn ra chương tr&igrave;nh: V&agrave;o l&uacute;c 7g30 ng&agrave;y 30/3/2024 (Thứ 7).</p>\r\n\r\n<p>/-li Địa điểm diễn ra chương tr&igrave;nh: Vườn ươm doanh nghiệp tỉnh Tr&agrave; Vinh, T&ograve;a nh&agrave; D5, Trường Đại học Tr&agrave; Vinh (Số 126, Nguyễn Thiện Th&agrave;nh, K4, P5, Tp. Tr&agrave; Vinh).</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" style=\"height:16px; width:16px\" /> Học ph&iacute; tham gia Chương tr&igrave;nh: 1.000.000đ/học vi&ecirc;n.</p>\r\n\r\n<p><img alt=\"????\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t19/1.5/16/1f4e9.png\" style=\"height:16px; width:16px\" /> Trường Đại học Tr&agrave; Vinh hỗ trợ 100% học ph&iacute; cho 30 học vi&ecirc;n đăng k&yacute; đầu ti&ecirc;n, th&acirc;n mời qu&yacute; doanh nghiệp/hợp t&aacute;c x&atilde;/hộ kinh doanh/dự &aacute;n khởi nghiệp nhanh tay đăng k&yacute; để kh&ocirc;ng bỏ lỡ cơ hội n&agrave;y qua nh&oacute;m Zalo b&ecirc;n dưới phần b&igrave;nh luận.</p>\r\n\r\n<p><img alt=\"✍\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t69/1.5/16/270d.png\" style=\"height:16px; width:16px\" /> H&atilde;y đăng k&yacute; ngay để trở th&agrave;nh một doanh nghiệp vượt trội v&agrave; đạt chuẩn quốc tế với hệ thống quản l&yacute; chất lượng theo ti&ecirc;u chuẩn ISO 9001:2015.</p>\r\n\r\n<p><img src=\"http://localhost/admin/uploads/1711512146_431808718_449421347413553_8623621650341597110_n.jpg\" style=\"height:811px; width:1440px\" /></p>\r\n', '1711512146_431808718_449421347413553_8623621650341597110_n.jpg', 1, 0, 'Bạn muốn đẩy mạnh chất lượng quản trị doanh nghiệp và tạo ra sự khác biệt trong ngành của mình? Bạn muốn tăng cường sự chuyên nghiệp và nâng cao chất lượng quản trị doanh nghiệp của mình?', '2024-03-27 06:59:25'),
(11, 1, 'HỘI TRẠI THANH NIÊN 2024 CÓ GÌ?', 'hoi-trai-thanh-nien-2024-co-gi', '<p>▶ &nbsp;Có Gen Z cắm trại với chương trình &quot;GEN Z STARTUP BOOTCAMP&quot; - Gian h&agrave;ng của học sinh c&aacute;c Trường THPT và đặc bi&ecirc;̣t với nơi hội tụ hơn 100 m&oacute;n ăn đặc sắc qu&ecirc; hương tại H&ocirc;̣i trại Thanh ni&ecirc;n năm 2024 ❗&nbsp;<br />\r\n----------------------------------------<br />\r\n????Tham gia Hội trại Thanh ni&ecirc;n TVU năm 2024 để kh&aacute;m ph&aacute; h&agrave;nh tr&igrave;nh ẩm thực đặc sắc tại gian h&agrave;ng của học sinh c&aacute;c trường THPT! Tại đ&acirc;y, bạn sẽ trải nghiệm những hương vị độc đ&aacute;o, mỗi m&oacute;n ăn l&agrave; một chuyến đi kh&aacute;m ph&aacute;, một cảm x&uacute;c mới v&agrave; kỷ niệm đ&aacute;ng nhớ. Đến với gian h&agrave;ng của c&aacute;c bạn học sinh, bạn sẽ được thưởng thức những m&oacute;n ăn đậm chất thanh ni&ecirc;n, nơi niềm đam m&ecirc; v&agrave; sự chăm s&oacute;c v&agrave;o từng chi tiết được thể hiện r&otilde; n&eacute;t.<br />\r\n???? C&aacute;c m&oacute;n ăn tại đ&acirc;y v&ocirc; c&ugrave;ng đa dạng với c&aacute;c m&oacute;n: gỏi cuốn, b&aacute;nh m&igrave; chả c&aacute;, b&uacute;n thịt x&agrave;o, nước m&iacute;a, hột vịt lộn, bắp x&agrave;o, chuối chi&ecirc;n,&hellip; v&agrave; c&ograve;n nhiều m&oacute;n ăn đang chờ bạn đến tận hưởng.<br />\r\n⏰ Gian hàng bắt đầu v&agrave;o l&uacute;c 13h00, ng&agrave;y 23 th&aacute;ng 3 năm 2024.<br />\r\n???? Địa điểm: tại khu I, Trường Đại học Tr&agrave; Vinh (trước giảng đường D5).<br />\r\n???? &nbsp;GEN Z STARTUP BOOTCAMP - &quot;Th&uacute;c đẩy ước mơ thế hệ Gen Z: Khơi dậy - Đổi mới - Ph&aacute;t triển!&quot;</p>\r\n\r\n<p><img src=\"http://localhost/admin/uploads/1711512519_432788412_455516276804060_3051472225481811540_n.jpg\" style=\"height:1207px; width:1440px\" /></p>\r\n', '1711512519_432788412_455516276804060_3051472225481811540_n.jpg', 1, 0, ' GEN Z STARTUP BOOTCAMP - \"Thúc đẩy ước mơ thế hệ Gen Z: Khơi dậy - Đổi mới - Phát triển!', '2024-03-27 06:59:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `img`, `status`) VALUES
(2, '../upload/partner_20240313103713_apple1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `position` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `des` longtext NOT NULL,
  `experience` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `signuppackages`
--

CREATE TABLE `signuppackages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bsid` int(11) DEFAULT NULL,
  `cmid` int(11) DEFAULT NULL,
  `dsid` int(11) DEFAULT NULL,
  `fsid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `basicservices`
--
ALTER TABLE `basicservices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contentmarketings`
--
ALTER TABLE `contentmarketings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `designservices`
--
ALTER TABLE `designservices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fanpageservices`
--
ALTER TABLE `fanpageservices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `signuppackages`
--
ALTER TABLE `signuppackages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bsid` (`bsid`),
  ADD KEY `cmid` (`cmid`),
  ADD KEY `dsid` (`dsid`),
  ADD KEY `fsid` (`fsid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `basicservices`
--
ALTER TABLE `basicservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contentmarketings`
--
ALTER TABLE `contentmarketings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `designservices`
--
ALTER TABLE `designservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `fanpageservices`
--
ALTER TABLE `fanpageservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `signuppackages`
--
ALTER TABLE `signuppackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `signuppackages`
--
ALTER TABLE `signuppackages`
  ADD CONSTRAINT `signuppackages_ibfk_1` FOREIGN KEY (`bsid`) REFERENCES `basicservices` (`id`),
  ADD CONSTRAINT `signuppackages_ibfk_2` FOREIGN KEY (`cmid`) REFERENCES `contentmarketings` (`id`),
  ADD CONSTRAINT `signuppackages_ibfk_3` FOREIGN KEY (`dsid`) REFERENCES `designservices` (`id`),
  ADD CONSTRAINT `signuppackages_ibfk_4` FOREIGN KEY (`fsid`) REFERENCES `fanpageservices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
