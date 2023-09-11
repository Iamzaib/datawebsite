-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: sdb-p.hosting.stackcp.net
-- Generation Time: Aug 07, 2023 at 01:25 PM
-- Server version: 10.4.26-MariaDB-log
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickyourdata-31393846c4`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'post category', 'post-category', '2021-12-20 08:25:59', '2021-12-20 08:25:59', NULL),
(2, 'test category', 'test-category', '2021-12-27 08:14:41', '2021-12-27 08:14:41', NULL),
(3, 'Marketing', 'marketing', '2021-12-27 14:34:44', '2021-12-27 14:34:44', NULL),
(4, 'Data', 'data', '2021-12-27 14:34:58', '2021-12-27 14:34:58', NULL),
(5, 'Sales Prospecting', 'sales-prospecting', '2021-12-27 14:35:12', '2021-12-27 14:35:12', NULL),
(6, 'Email Marketing', 'email-marketing', '2021-12-27 14:35:24', '2021-12-27 14:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_blog_post`
--

CREATE TABLE `blog_category_blog_post` (
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_blog_post`
--

INSERT INTO `blog_category_blog_post` (`blog_post_id`, `blog_category_id`) VALUES
(2, 1),
(3, 3),
(3, 4),
(3, 6),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `page_text`, `excerpt`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'New Post', '<figure class=\"image\"><img src=\"http://127.0.0.1:8000/storage/4/38191.jpg\"><figcaption>test blog post</figcaption></figure>', 'test blog post', NULL, NULL, NULL, NULL, 1, '2021-12-20 08:28:28', '2021-12-20 08:29:43', '2021-12-20 08:29:43'),
(2, 'New Post', '<figure class=\"image\"><img src=\"http://127.0.0.1:8000/storage/4/38191.jpg\"><figcaption>test blog post</figcaption></figure>', 'This month we\'re launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe', 'new-post', 'meta for this post', 'meta for this post desc', 'keyword, 2nd keyword, 3rd keyword', 1, '2021-12-20 08:29:35', '2021-12-23 13:53:03', NULL),
(3, 'NEW FEATURE LAUNCHES ON BOOKYOURDATA', '<p>This month we\'re launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>', 'This month we\'re launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...', 'new-feature-launches-on-bookyourdata', 'meta for this post new', 'meta descri', 'key3,key2,key1', 1, '2021-12-26 12:02:35', '2021-12-26 12:02:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_blog_tag`
--

CREATE TABLE `blog_post_blog_tag` (
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `blog_tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_blog_tag`
--

INSERT INTO `blog_post_blog_tag` (`blog_post_id`, `blog_tag_id`) VALUES
(2, 1),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Post tag', 'post-tags', '2021-12-20 08:24:11', '2021-12-20 08:24:11', NULL),
(2, 'test', 'test', '2021-12-27 08:49:28', '2021-12-27 08:49:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `state_id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Rawalpindi', '1', 160, '2021-11-30 08:39:17', '2021-11-30 08:39:17'),
(2, 'Karachi', '2', 160, '2021-12-23 06:36:21', '2021-12-23 06:36:21'),
(3, 'Peshawar', '3', 160, '2021-12-23 06:37:31', '2021-12-23 06:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserved_at` datetime DEFAULT NULL,
  `purchased_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `reserved_by_id` int(10) UNSIGNED DEFAULT NULL,
  `purchased_by_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revenue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_details`, `company_type`, `founded`, `employees`, `revenue`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EnterprisersForge', 'tech Company', 'private', '2020', '5', '10000', '2021-12-02 12:37:33', '2021-12-02 12:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE `content_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_categories`
--

INSERT INTO `content_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About-us', 'about-us', '2021-12-06 13:43:30', '2021-12-06 13:43:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_category_content_page`
--

CREATE TABLE `content_category_content_page` (
  `content_page_id` bigint(20) UNSIGNED NOT NULL,
  `content_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_category_content_page`
--

INSERT INTO `content_category_content_page` (`content_page_id`, `content_category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `title`, `page_text`, `excerpt`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Pick your data', '<p>Test</p>', 'test', '', '2021-12-06 13:44:05', '2021-12-06 13:44:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_page_content_tag`
--

CREATE TABLE `content_page_content_tag` (
  `content_page_id` bigint(20) UNSIGNED NOT NULL,
  `content_tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_page_content_tag`
--

INSERT INTO `content_page_content_tag` (`content_page_id`, `content_tag_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_tags`
--

CREATE TABLE `content_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_tags`
--

INSERT INTO `content_tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About', 'about', '2021-12-06 13:42:56', '2021-12-06 13:42:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Afghanistan', 'af', NULL, NULL, NULL),
(2, 'Albania', 'al', NULL, NULL, NULL),
(3, 'Algeria', 'dz', NULL, NULL, NULL),
(4, 'American Samoa', 'as', NULL, NULL, NULL),
(5, 'Andorra', 'ad', NULL, NULL, NULL),
(6, 'Angola', 'ao', NULL, NULL, NULL),
(7, 'Anguilla', 'ai', NULL, NULL, NULL),
(8, 'Antarctica', 'aq', NULL, NULL, NULL),
(9, 'Antigua and Barbuda', 'ag', NULL, NULL, NULL),
(10, 'Argentina', 'ar', NULL, NULL, NULL),
(11, 'Armenia', 'am', NULL, NULL, NULL),
(12, 'Aruba', 'aw', NULL, NULL, NULL),
(13, 'Australia', 'au', NULL, NULL, NULL),
(14, 'Austria', 'at', NULL, NULL, NULL),
(15, 'Azerbaijan', 'az', NULL, NULL, NULL),
(16, 'Bahamas', 'bs', NULL, NULL, NULL),
(17, 'Bahrain', 'bh', NULL, NULL, NULL),
(18, 'Bangladesh', 'bd', NULL, NULL, NULL),
(19, 'Barbados', 'bb', NULL, NULL, NULL),
(20, 'Belarus', 'by', NULL, NULL, NULL),
(21, 'Belgium', 'be', NULL, NULL, NULL),
(22, 'Belize', 'bz', NULL, NULL, NULL),
(23, 'Benin', 'bj', NULL, NULL, NULL),
(24, 'Bermuda', 'bm', NULL, NULL, NULL),
(25, 'Bhutan', 'bt', NULL, NULL, NULL),
(26, 'Bolivia', 'bo', NULL, NULL, NULL),
(27, 'Bosnia and Herzegovina', 'ba', NULL, NULL, NULL),
(28, 'Botswana', 'bw', NULL, NULL, NULL),
(29, 'Brazil', 'br', NULL, NULL, NULL),
(30, 'British Indian Ocean Territory', 'io', NULL, NULL, NULL),
(31, 'British Virgin Islands', 'vg', NULL, NULL, NULL),
(32, 'Brunei', 'bn', NULL, NULL, NULL),
(33, 'Bulgaria', 'bg', NULL, NULL, NULL),
(34, 'Burkina Faso', 'bf', NULL, NULL, NULL),
(35, 'Burundi', 'bi', NULL, NULL, NULL),
(36, 'Cambodia', 'kh', NULL, NULL, NULL),
(37, 'Cameroon', 'cm', NULL, NULL, NULL),
(38, 'Canada', 'ca', NULL, NULL, NULL),
(39, 'Cape Verde', 'cv', NULL, NULL, NULL),
(40, 'Cayman Islands', 'ky', NULL, NULL, NULL),
(41, 'Central African Republic', 'cf', NULL, NULL, NULL),
(42, 'Chad', 'td', NULL, NULL, NULL),
(43, 'Chile', 'cl', NULL, NULL, NULL),
(44, 'China', 'cn', NULL, NULL, NULL),
(45, 'Christmas Island', 'cx', NULL, NULL, NULL),
(46, 'Cocos Islands', 'cc', NULL, NULL, NULL),
(47, 'Colombia', 'co', NULL, NULL, NULL),
(48, 'Comoros', 'km', NULL, NULL, NULL),
(49, 'Cook Islands', 'ck', NULL, NULL, NULL),
(50, 'Costa Rica', 'cr', NULL, NULL, NULL),
(51, 'Croatia', 'hr', NULL, NULL, NULL),
(52, 'Cuba', 'cu', NULL, NULL, NULL),
(53, 'Curacao', 'cw', NULL, NULL, NULL),
(54, 'Cyprus', 'cy', NULL, NULL, NULL),
(55, 'Czech Republic', 'cz', NULL, NULL, NULL),
(56, 'Democratic Republic of the Congo', 'cd', NULL, NULL, NULL),
(57, 'Denmark', 'dk', NULL, NULL, NULL),
(58, 'Djibouti', 'dj', NULL, NULL, NULL),
(59, 'Dominica', 'dm', NULL, NULL, NULL),
(60, 'Dominican Republic', 'do', NULL, NULL, NULL),
(61, 'East Timor', 'tl', NULL, NULL, NULL),
(62, 'Ecuador', 'ec', NULL, NULL, NULL),
(63, 'Egypt', 'eg', NULL, NULL, NULL),
(64, 'El Salvador', 'sv', NULL, NULL, NULL),
(65, 'Equatorial Guinea', 'gq', NULL, NULL, NULL),
(66, 'Eritrea', 'er', NULL, NULL, NULL),
(67, 'Estonia', 'ee', NULL, NULL, NULL),
(68, 'Ethiopia', 'et', NULL, NULL, NULL),
(69, 'Falkland Islands', 'fk', NULL, NULL, NULL),
(70, 'Faroe Islands', 'fo', NULL, NULL, NULL),
(71, 'Fiji', 'fj', NULL, NULL, NULL),
(72, 'Finland', 'fi', NULL, NULL, NULL),
(73, 'France', 'fr', NULL, NULL, NULL),
(74, 'French Polynesia', 'pf', NULL, NULL, NULL),
(75, 'Gabon', 'ga', NULL, NULL, NULL),
(76, 'Gambia', 'gm', NULL, NULL, NULL),
(77, 'Georgia', 'ge', NULL, NULL, NULL),
(78, 'Germany', 'de', NULL, NULL, NULL),
(79, 'Ghana', 'gh', NULL, NULL, NULL),
(80, 'Gibraltar', 'gi', NULL, NULL, NULL),
(81, 'Greece', 'gr', NULL, NULL, NULL),
(82, 'Greenland', 'gl', NULL, NULL, NULL),
(83, 'Grenada', 'gd', NULL, NULL, NULL),
(84, 'Guam', 'gu', NULL, NULL, NULL),
(85, 'Guatemala', 'gt', NULL, NULL, NULL),
(86, 'Guernsey', 'gg', NULL, NULL, NULL),
(87, 'Guinea', 'gn', NULL, NULL, NULL),
(88, 'Guinea-Bissau', 'gw', NULL, NULL, NULL),
(89, 'Guyana', 'gy', NULL, NULL, NULL),
(90, 'Haiti', 'ht', NULL, NULL, NULL),
(91, 'Honduras', 'hn', NULL, NULL, NULL),
(92, 'Hong Kong', 'hk', NULL, NULL, NULL),
(93, 'Hungary', 'hu', NULL, NULL, NULL),
(94, 'Iceland', 'is', NULL, NULL, NULL),
(95, 'India', 'in', NULL, NULL, NULL),
(96, 'Indonesia', 'id', NULL, NULL, NULL),
(97, 'Iran', 'ir', NULL, NULL, NULL),
(98, 'Iraq', 'iq', NULL, NULL, NULL),
(99, 'Ireland', 'ie', NULL, NULL, NULL),
(100, 'Isle of Man', 'im', NULL, NULL, NULL),
(101, 'Israel', 'il', NULL, NULL, NULL),
(102, 'Italy', 'it', NULL, NULL, NULL),
(103, 'Ivory Coast', 'ci', NULL, NULL, NULL),
(104, 'Jamaica', 'jm', NULL, NULL, NULL),
(105, 'Japan', 'jp', NULL, NULL, NULL),
(106, 'Jersey', 'je', NULL, NULL, NULL),
(107, 'Jordan', 'jo', NULL, NULL, NULL),
(108, 'Kazakhstan', 'kz', NULL, NULL, NULL),
(109, 'Kenya', 'ke', NULL, NULL, NULL),
(110, 'Kiribati', 'ki', NULL, NULL, NULL),
(111, 'Kosovo', 'xk', NULL, NULL, NULL),
(112, 'Kuwait', 'kw', NULL, NULL, NULL),
(113, 'Kyrgyzstan', 'kg', NULL, NULL, NULL),
(114, 'Laos', 'la', NULL, NULL, NULL),
(115, 'Latvia', 'lv', NULL, NULL, NULL),
(116, 'Lebanon', 'lb', NULL, NULL, NULL),
(117, 'Lesotho', 'ls', NULL, NULL, NULL),
(118, 'Liberia', 'lr', NULL, NULL, NULL),
(119, 'Libya', 'ly', NULL, NULL, NULL),
(120, 'Liechtenstein', 'li', NULL, NULL, NULL),
(121, 'Lithuania', 'lt', NULL, NULL, NULL),
(122, 'Luxembourg', 'lu', NULL, NULL, NULL),
(123, 'Macau', 'mo', NULL, NULL, NULL),
(124, 'Macedonia', 'mk', NULL, NULL, NULL),
(125, 'Madagascar', 'mg', NULL, NULL, NULL),
(126, 'Malawi', 'mw', NULL, NULL, NULL),
(127, 'Malaysia', 'my', NULL, NULL, NULL),
(128, 'Maldives', 'mv', NULL, NULL, NULL),
(129, 'Mali', 'ml', NULL, NULL, NULL),
(130, 'Malta', 'mt', NULL, NULL, NULL),
(131, 'Marshall Islands', 'mh', NULL, NULL, NULL),
(132, 'Mauritania', 'mr', NULL, NULL, NULL),
(133, 'Mauritius', 'mu', NULL, NULL, NULL),
(134, 'Mayotte', 'yt', NULL, NULL, NULL),
(135, 'Mexico', 'mx', NULL, NULL, NULL),
(136, 'Micronesia', 'fm', NULL, NULL, NULL),
(137, 'Moldova', 'md', NULL, NULL, NULL),
(138, 'Monaco', 'mc', NULL, NULL, NULL),
(139, 'Mongolia', 'mn', NULL, NULL, NULL),
(140, 'Montenegro', 'me', NULL, NULL, NULL),
(141, 'Montserrat', 'ms', NULL, NULL, NULL),
(142, 'Morocco', 'ma', NULL, NULL, NULL),
(143, 'Mozambique', 'mz', NULL, NULL, NULL),
(144, 'Myanmar', 'mm', NULL, NULL, NULL),
(145, 'Namibia', 'na', NULL, NULL, NULL),
(146, 'Nauru', 'nr', NULL, NULL, NULL),
(147, 'Nepal', 'np', NULL, NULL, NULL),
(148, 'Netherlands', 'nl', NULL, NULL, NULL),
(149, 'Netherlands Antilles', 'an', NULL, NULL, NULL),
(150, 'New Caledonia', 'nc', NULL, NULL, NULL),
(151, 'New Zealand', 'nz', NULL, NULL, NULL),
(152, 'Nicaragua', 'ni', NULL, NULL, NULL),
(153, 'Niger', 'ne', NULL, NULL, NULL),
(154, 'Nigeria', 'ng', NULL, NULL, NULL),
(155, 'Niue', 'nu', NULL, NULL, NULL),
(156, 'North Korea', 'kp', NULL, NULL, NULL),
(157, 'Northern Mariana Islands', 'mp', NULL, NULL, NULL),
(158, 'Norway', 'no', NULL, NULL, NULL),
(159, 'Oman', 'om', NULL, NULL, NULL),
(160, 'Pakistan', 'pk', NULL, NULL, NULL),
(161, 'Palau', 'pw', NULL, NULL, NULL),
(162, 'Palestine', 'ps', NULL, NULL, NULL),
(163, 'Panama', 'pa', NULL, NULL, NULL),
(164, 'Papua New Guinea', 'pg', NULL, NULL, NULL),
(165, 'Paraguay', 'py', NULL, NULL, NULL),
(166, 'Peru', 'pe', NULL, NULL, NULL),
(167, 'Philippines', 'ph', NULL, NULL, NULL),
(168, 'Pitcairn', 'pn', NULL, NULL, NULL),
(169, 'Poland', 'pl', NULL, NULL, NULL),
(170, 'Portugal', 'pt', NULL, NULL, NULL),
(171, 'Puerto Rico', 'pr', NULL, NULL, NULL),
(172, 'Qatar', 'qa', NULL, NULL, NULL),
(173, 'Republic of the Congo', 'cg', NULL, NULL, NULL),
(174, 'Reunion', 're', NULL, NULL, NULL),
(175, 'Romania', 'ro', NULL, NULL, NULL),
(176, 'Russia', 'ru', NULL, NULL, NULL),
(177, 'Rwanda', 'rw', NULL, NULL, NULL),
(178, 'Saint Barthelemy', 'bl', NULL, NULL, NULL),
(179, 'Saint Helena', 'sh', NULL, NULL, NULL),
(180, 'Saint Kitts and Nevis', 'kn', NULL, NULL, NULL),
(181, 'Saint Lucia', 'lc', NULL, NULL, NULL),
(182, 'Saint Martin', 'mf', NULL, NULL, NULL),
(183, 'Saint Pierre and Miquelon', 'pm', NULL, NULL, NULL),
(184, 'Saint Vincent and the Grenadines', 'vc', NULL, NULL, NULL),
(185, 'Samoa', 'ws', NULL, NULL, NULL),
(186, 'San Marino', 'sm', NULL, NULL, NULL),
(187, 'Sao Tome and Principe', 'st', NULL, NULL, NULL),
(188, 'Saudi Arabia', 'sa', NULL, NULL, NULL),
(189, 'Senegal', 'sn', NULL, NULL, NULL),
(190, 'Serbia', 'rs', NULL, NULL, NULL),
(191, 'Seychelles', 'sc', NULL, NULL, NULL),
(192, 'Sierra Leone', 'sl', NULL, NULL, NULL),
(193, 'Singapore', 'sg', NULL, NULL, NULL),
(194, 'Sint Maarten', 'sx', NULL, NULL, NULL),
(195, 'Slovakia', 'sk', NULL, NULL, NULL),
(196, 'Slovenia', 'si', NULL, NULL, NULL),
(197, 'Solomon Islands', 'sb', NULL, NULL, NULL),
(198, 'Somalia', 'so', NULL, NULL, NULL),
(199, 'South Africa', 'za', NULL, NULL, NULL),
(200, 'South Korea', 'kr', NULL, NULL, NULL),
(201, 'South Sudan', 'ss', NULL, NULL, NULL),
(202, 'Spain', 'es', NULL, NULL, NULL),
(203, 'Sri Lanka', 'lk', NULL, NULL, NULL),
(204, 'Sudan', 'sd', NULL, NULL, NULL),
(205, 'Suriname', 'sr', NULL, NULL, NULL),
(206, 'Svalbard and Jan Mayen', 'sj', NULL, NULL, NULL),
(207, 'Swaziland', 'sz', NULL, NULL, NULL),
(208, 'Sweden', 'se', NULL, NULL, NULL),
(209, 'Switzerland', 'ch', NULL, NULL, NULL),
(210, 'Syria', 'sy', NULL, NULL, NULL),
(211, 'Taiwan', 'tw', NULL, NULL, NULL),
(212, 'Tajikistan', 'tj', NULL, NULL, NULL),
(213, 'Tanzania', 'tz', NULL, NULL, NULL),
(214, 'Thailand', 'th', NULL, NULL, NULL),
(215, 'Togo', 'tg', NULL, NULL, NULL),
(216, 'Tokelau', 'tk', NULL, NULL, NULL),
(217, 'Tonga', 'to', NULL, NULL, NULL),
(218, 'Trinidad and Tobago', 'tt', NULL, NULL, NULL),
(219, 'Tunisia', 'tn', NULL, NULL, NULL),
(220, 'Turkey', 'tr', NULL, NULL, NULL),
(221, 'Turkmenistan', 'tm', NULL, NULL, NULL),
(222, 'Turks and Caicos Islands', 'tc', NULL, NULL, NULL),
(223, 'Tuvalu', 'tv', NULL, NULL, NULL),
(224, 'U.S. Virgin Islands', 'vi', NULL, NULL, NULL),
(225, 'Uganda', 'ug', NULL, NULL, NULL),
(226, 'Ukraine', 'ua', NULL, NULL, NULL),
(227, 'United Arab Emirates', 'ae', NULL, NULL, NULL),
(228, 'United Kingdom', 'gb', NULL, NULL, NULL),
(229, 'United States', 'us', NULL, NULL, NULL),
(230, 'Uruguay', 'uy', NULL, NULL, NULL),
(231, 'Uzbekistan', 'uz', NULL, NULL, NULL),
(232, 'Vanuatu', 'vu', NULL, NULL, NULL),
(233, 'Vatican', 'va', NULL, NULL, NULL),
(234, 'Venezuela', 've', NULL, NULL, NULL),
(235, 'Vietnam', 'vn', NULL, NULL, NULL),
(236, 'Wallis and Futuna', 'wf', NULL, NULL, NULL),
(237, 'Western Sahara', 'eh', NULL, NULL, NULL),
(238, 'Yemen', 'ye', NULL, NULL, NULL),
(239, 'Zambia', 'zm', NULL, NULL, NULL),
(240, 'Zimbabwe', 'zw', NULL, '2021-11-29 13:26:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_id` int(11) DEFAULT NULL,
  `job_level_id` int(11) DEFAULT NULL,
  `industries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `record_type`, `email_contact`, `phone`, `contact_name`, `company_name_id`, `job_level_id`, `industries`, `country_id`, `state_id`, `city_id`, `county`, `zip_code`, `area_code`, `website`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'business', 'test@email.com', '03123456789', 'Ali', 1, 2, 'Web', 160, 1, 1, NULL, '46000', NULL, 'www.web.com', 0.10, '2021-12-02 16:32:20', '2021-12-02 16:32:20', NULL),
(2, 'business', 'ab@ab.com', '0123456789', 'dev', 1, 2, 'Web', 160, 3, 3, NULL, '46000', NULL, 'www.web.net', 0.10, '2021-12-23 06:35:56', '2021-12-23 06:56:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails_to_lists`
--

CREATE TABLE `emails_to_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails_to_lists`
--

INSERT INTO `emails_to_lists` (`id`, `list_id`, `email_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2021-12-23 07:27:33', '2021-12-23 07:27:33'),
(3, 2, 2, '2021-12-23 07:33:05', '2021-12-23 07:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_positions`
--

CREATE TABLE `job_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_positions`
--

INSERT INTO `job_positions` (`id`, `job_title`, `created_at`, `updated_at`) VALUES
(1, 'CEO', '2021-12-02 12:42:25', '2021-12-02 12:42:25'),
(2, 'COO', '2021-12-02 12:42:32', '2021-12-02 12:42:32'),
(3, 'Project Co-ordinator', '2021-12-02 16:27:41', '2021-12-02 16:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_category_id` int(11) NOT NULL DEFAULT 0,
  `list_maker_id` int(11) NOT NULL,
  `guest_list` int(11) NOT NULL DEFAULT 0,
  `total_emails_in_list` int(11) DEFAULT NULL,
  `list_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list_title`, `list_details`, `list_category_id`, `list_maker_id`, `guest_list`, `total_emails_in_list`, `list_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new list', '<p>list html details</p><figure class=\"image image-style-side\"><img src=\"http://127.0.0.1:8000/storage/6/laravel.png\"></figure>', 1, 1, 0, 1, 100.00, '2021-12-23 07:06:24', '2021-12-23 09:18:37', NULL),
(2, 'My List', '<p>eggrgrgsdfgf</p>', 2, 1, 0, 1, 50.00, '2021-12-23 07:33:04', '2021-12-23 07:33:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listscategory`
--

CREATE TABLE `listscategory` (
  `id` int(11) NOT NULL,
  `listCategory_title` text DEFAULT NULL,
  `listCategory_details` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listscategory`
--

INSERT INTO `listscategory` (`id`, `listCategory_title`, `listCategory_details`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Job Level', NULL, 'job-level', '2022-01-11 11:56:16', '2022-01-11 11:56:16', NULL),
(2, 'Job Titles', NULL, 'job-titles', '2022-01-13 02:51:48', '2022-01-13 02:51:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lists_filters`
--

CREATE TABLE `lists_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_id` int(11) NOT NULL,
  `filter_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists_filters`
--

INSERT INTO `lists_filters` (`id`, `list_id`, `filter_title`, `filter_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'record_type', 'business', '2021-12-23 07:06:24', '2021-12-23 07:06:24'),
(2, 1, 'company_name_id', '1', '2021-12-23 07:06:24', '2021-12-23 07:06:24'),
(3, 1, 'job_level_id', '2', '2021-12-23 07:06:24', '2021-12-23 07:06:24'),
(4, 1, 'country_id', '160', '2021-12-23 07:06:24', '2021-12-23 07:06:24'),
(5, 2, 'record_type', 'business', '2021-12-23 07:33:05', '2021-12-23 07:33:05'),
(6, 2, 'company_name_id', '1', '2021-12-23 07:33:05', '2021-12-23 07:33:05'),
(7, 2, 'country_id', '160', '2021-12-23 07:33:05', '2021-12-23 07:33:05'),
(8, 2, 'state_id', '3', '2021-12-23 07:33:05', '2021-12-23 07:33:05'),
(9, 2, 'city_id', '3', '2021-12-23 07:33:05', '2021-12-23 07:33:05'),
(10, 1, 'state_id', '3', '2021-12-23 09:18:37', '2021-12-23 09:18:37'),
(11, 1, 'city_id', '3', '2021-12-23 09:18:37', '2021-12-23 09:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Lists', 0, 'ee1e71ff-fa5b-4051-a8ff-ed1f33c055df', 'ck-media', '512x512bb', '512x512bb.jpg', 'image/jpeg', 'public', 'public', 26334, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 1, '2021-12-02 16:29:27', '2021-12-02 16:29:29'),
(2, 'App\\Models\\ContentPage', 1, '83299ede-9977-48fe-8d6e-a97fa8b2f865', 'featured_image', '61ae59f2b421d_mastercard-logo2', '61ae59f2b421d_mastercard-logo2.png', 'image/png', 'public', 'public', 30671, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 2, '2021-12-06 13:44:06', '2021-12-06 13:44:08'),
(3, 'App\\Models\\BlogPost', 0, '8e3332c5-ee47-4847-adef-92fbb23f69e5', 'ck-media', 'pexels-sevenstorm-juhaszimrus-443383', 'pexels-sevenstorm-juhaszimrus-443383.jpg', 'image/jpeg', 'public', 'public', 3076412, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 3, '2021-12-20 08:04:47', '2021-12-20 08:04:52'),
(4, 'App\\Models\\BlogPost', 2, 'c3d62888-75a0-4adb-9f65-a1fb967a4043', 'ck-media', '38191', '38191.jpg', 'image/jpeg', 'public', 'public', 1176229, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 4, '2021-12-20 08:27:21', '2021-12-20 08:29:36'),
(5, 'App\\Models\\BlogPost', 2, '25b30926-7d7d-4e96-a3a6-23ac15ceed86', 'featured_image', '61c084f3a5eb1_OMB-GATE-CS-800', '61c084f3a5eb1_OMB-GATE-CS-800.png', 'image/png', 'public', 'public', 180963, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 5, '2021-12-20 08:29:35', '2021-12-20 08:29:36'),
(6, 'App\\Models\\Lists', 0, 'defce132-3c86-432f-9929-00b6fb1e618b', 'ck-media', 'laravel', 'laravel.png', 'image/png', 'public', 'public', 22730, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 6, '2021-12-23 06:58:07', '2021-12-23 06:58:09'),
(7, 'App\\Models\\BlogPost', 3, 'a4ffb5bc-334a-4625-b294-91ccff21d838', 'featured_image', '61c89fbe03e46_Web-Development', '61c89fbe03e46_Web-Development.jpg', 'image/jpeg', 'public', 'public', 384465, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 7, '2021-12-26 12:02:35', '2021-12-26 12:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `menu_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_11_12_000001_create_media_table', 1),
(8, '2020_11_12_000002_create_permissions_table', 1),
(9, '2020_11_12_000003_create_roles_table', 1),
(10, '2020_11_12_000004_create_users_table', 1),
(11, '2020_11_12_000005_create_coupons_table', 1),
(12, '2020_11_12_000006_create_codes_table', 1),
(13, '2020_11_12_000007_create_purchases_table', 1),
(14, '2020_11_12_000008_create_permission_role_pivot_table', 1),
(15, '2020_11_12_000009_create_role_user_pivot_table', 1),
(16, '2020_11_12_000010_add_relationship_fields_to_codes_table', 1),
(17, '2020_11_12_000011_add_relationship_fields_to_purchases_table', 1),
(18, '2020_11_13_125334_create_customer_columns', 1),
(19, '2020_11_13_125408_create_subscriptions_table', 1),
(20, '2020_11_13_125440_create_subscription_items_table', 1),
(21, '2021_11_18_120601_create_emails_table', 1),
(22, '2021_11_18_120622_create_emails_to_lists_table', 1),
(23, '2021_11_18_120633_create_lists_table', 1),
(24, '2021_11_18_120818_create_companies_table', 1),
(25, '2021_11_18_120848_create_job_positions_table', 1),
(26, '2021_11_18_120913_create_countries_table', 1),
(27, '2021_11_18_120927_create_states_table', 1),
(28, '2021_11_18_120954_create_cities_table', 1),
(29, '2021_11_18_122100_create_lists_filters_table', 1),
(30, '2021_11_23_185708_create_pages_table', 1),
(31, '2021_11_23_185830_create_menu_table', 1),
(32, '2021_12_03_000002_create_faq_categories_table', 2),
(33, '2021_12_03_000003_create_content_tags_table', 2),
(34, '2021_12_03_000004_create_content_categories_table', 2),
(35, '2021_12_03_000012_create_faq_questions_table', 2),
(36, '2021_12_03_000016_create_content_pages_table', 2),
(37, '2021_12_03_000017_create_content_category_content_page_pivot_table', 2),
(38, '2021_12_03_000019_create_content_page_content_tag_pivot_table', 2),
(39, '2021_12_03_000025_add_relationship_fields_to_faq_questions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'coupon_create', NULL, NULL, NULL),
(18, 'coupon_edit', NULL, NULL, NULL),
(19, 'coupon_show', NULL, NULL, NULL),
(20, 'coupon_delete', NULL, NULL, NULL),
(21, 'coupon_access', NULL, NULL, NULL),
(22, 'code_create', NULL, NULL, NULL),
(23, 'code_edit', NULL, NULL, NULL),
(24, 'code_show', NULL, NULL, NULL),
(25, 'code_delete', NULL, NULL, NULL),
(26, 'purchase_create', NULL, NULL, NULL),
(27, 'purchase_edit', NULL, NULL, NULL),
(28, 'purchase_show', NULL, NULL, NULL),
(29, 'purchase_delete', NULL, NULL, NULL),
(30, 'purchase_access', NULL, NULL, NULL),
(31, 'profile_password_edit', NULL, NULL, NULL),
(32, 'email_list_create', '2021-11-29 12:43:53', '2021-11-29 12:43:53', NULL),
(33, 'email_list_edit', '2021-11-29 12:44:01', '2021-11-29 12:44:01', NULL),
(34, 'email_list_show', '2021-11-29 12:44:08', '2021-11-29 12:44:08', NULL),
(35, 'email_list_delete', '2021-11-29 12:44:20', '2021-11-29 12:44:20', NULL),
(36, 'email_list_access', '2021-11-29 12:44:28', '2021-11-29 12:44:28', NULL),
(37, 'country_create', '2021-11-29 13:25:02', '2021-11-29 13:25:02', NULL),
(38, 'country_edit', '2021-11-29 13:25:10', '2021-11-29 13:25:10', NULL),
(39, 'country_show', '2021-11-29 13:25:25', '2021-11-29 13:25:25', NULL),
(40, 'country_delete', '2021-11-29 13:25:33', '2021-11-29 13:25:33', NULL),
(41, 'country_access', '2021-11-29 13:25:41', '2021-11-29 13:25:41', NULL),
(42, 'state_create', '2021-11-29 16:35:01', '2021-11-29 16:35:01', NULL),
(43, 'state_edit', '2021-11-29 16:35:10', '2021-11-29 16:35:10', NULL),
(44, 'state_show', '2021-11-29 16:35:18', '2021-11-29 16:35:18', NULL),
(45, 'state_delete', '2021-11-29 16:35:26', '2021-11-29 16:35:26', NULL),
(46, 'state_access', '2021-11-29 16:35:33', '2021-11-29 16:35:33', NULL),
(47, 'city_create', '2021-11-30 08:17:15', '2021-11-30 08:17:15', NULL),
(48, 'city_edit', '2021-11-30 08:17:27', '2021-11-30 08:17:27', NULL),
(49, 'city_show', '2021-11-30 08:17:34', '2021-11-30 08:17:34', NULL),
(50, 'city_delete', '2021-11-30 08:17:41', '2021-11-30 08:17:41', NULL),
(51, 'city_access', '2021-11-30 08:17:48', '2021-11-30 08:17:48', NULL),
(52, 'company_create', NULL, NULL, NULL),
(53, 'company_edit', NULL, NULL, NULL),
(54, 'company_show', NULL, NULL, NULL),
(55, 'company_delete', NULL, NULL, NULL),
(56, 'company_access', NULL, NULL, NULL),
(57, 'job_position_create', NULL, NULL, NULL),
(58, 'job_position_edit', NULL, NULL, NULL),
(59, 'job_position_show', NULL, NULL, NULL),
(60, 'job_position_delete', NULL, NULL, NULL),
(61, 'job_position_access', NULL, NULL, NULL),
(62, 'email_create', NULL, NULL, NULL),
(63, 'email_edit', NULL, NULL, NULL),
(64, 'email_show', NULL, NULL, NULL),
(65, 'email_delete', NULL, NULL, NULL),
(66, 'email_access', NULL, NULL, NULL),
(67, 'content_management_access', NULL, NULL, NULL),
(68, 'content_category_create', NULL, NULL, NULL),
(69, 'content_category_edit', NULL, NULL, NULL),
(70, 'content_category_show', NULL, NULL, NULL),
(71, 'content_category_delete', NULL, NULL, NULL),
(72, 'content_category_access', NULL, NULL, NULL),
(73, 'content_tag_create', NULL, NULL, NULL),
(74, 'content_tag_edit', NULL, NULL, NULL),
(75, 'content_tag_show', NULL, NULL, NULL),
(76, 'content_tag_delete', NULL, NULL, NULL),
(77, 'content_tag_access', NULL, NULL, NULL),
(78, 'content_page_create', NULL, NULL, NULL),
(79, 'content_page_edit', NULL, NULL, NULL),
(80, 'content_page_show', NULL, NULL, NULL),
(81, 'content_page_delete', NULL, NULL, NULL),
(82, 'content_page_access', NULL, NULL, NULL),
(83, 'faq_management_access', NULL, NULL, NULL),
(84, 'faq_category_create', NULL, NULL, NULL),
(85, 'faq_category_edit', NULL, NULL, NULL),
(86, 'faq_category_show', NULL, NULL, NULL),
(87, 'faq_category_delete', NULL, NULL, NULL),
(88, 'faq_category_access', NULL, NULL, NULL),
(89, 'faq_question_create', NULL, NULL, NULL),
(90, 'faq_question_edit', NULL, NULL, NULL),
(91, 'faq_question_show', NULL, NULL, NULL),
(92, 'faq_question_delete', NULL, NULL, NULL),
(93, 'faq_question_access', NULL, NULL, NULL),
(94, 'blog_post_access', NULL, NULL, NULL),
(95, 'blog_post_delete', NULL, NULL, NULL),
(96, 'blog_post_show', NULL, NULL, NULL),
(97, 'blog_post_edit', NULL, NULL, NULL),
(98, 'blog_post_create', NULL, NULL, NULL),
(99, 'blog_tag_access', NULL, NULL, NULL),
(100, 'blog_tag_delete', NULL, NULL, NULL),
(101, 'blog_tag_show', NULL, NULL, NULL),
(102, 'blog_tag_edit', NULL, NULL, NULL),
(103, 'blog_tag_create', NULL, NULL, NULL),
(104, 'blog_category_access', NULL, NULL, NULL),
(105, 'blog_category_delete', NULL, NULL, NULL),
(106, 'blog_category_show', NULL, NULL, NULL),
(107, 'blog_category_edit', NULL, NULL, NULL),
(108, 'blog_category_create', NULL, NULL, NULL),
(109, 'blog_management_access', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(2, 19),
(2, 21),
(2, 28),
(2, 30),
(2, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Punjab', 160, '2021-11-29 16:45:00', '2021-11-29 16:45:00'),
(2, 'Sindh', 160, NULL, NULL),
(3, 'KPK', 160, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$7G3I/GneU8ew0h6RgGc0euE8QNufkPEY4VQw1Mt6LwzDkZIH0pfhG', 'GKhIhHjAPG9PhEvniUH3yLaUA8cKg8HL4P0EpppsrxTtp9GAqJnL2Aib1Q3b', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'user', 'user@user.com', NULL, '$2y$10$hqMpZbAjDAGzeoCMuYQswenXYS7CDc4j50F2HxNpRx4eny2Ef1u1S', NULL, '2021-12-29 10:59:45', '2021-12-29 10:59:45', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_blog_post`
--
ALTER TABLE `blog_category_blog_post`
  ADD KEY `blog_post_id_fk_5489209` (`blog_post_id`),
  ADD KEY `blog_category_id_fk_5489209` (`blog_category_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_blog_tag`
--
ALTER TABLE `blog_post_blog_tag`
  ADD KEY `blog_post_id_fk_5489210` (`blog_post_id`),
  ADD KEY `blog_tag_id_fk_5489210` (`blog_tag_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_fk_2578365` (`coupon_id`),
  ADD KEY `reserved_by_fk_2578368` (`reserved_by_id`),
  ADD KEY `purchased_by_fk_2578370` (`purchased_by_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_categories`
--
ALTER TABLE `content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_category_content_page`
--
ALTER TABLE `content_category_content_page`
  ADD KEY `content_page_id_fk_5489209` (`content_page_id`),
  ADD KEY `content_category_id_fk_5489209` (`content_category_id`);

--
-- Indexes for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_page_content_tag`
--
ALTER TABLE `content_page_content_tag`
  ADD KEY `content_page_id_fk_5489210` (`content_page_id`),
  ADD KEY `content_tag_id_fk_5489210` (`content_tag_id`);

--
-- Indexes for table `content_tags`
--
ALTER TABLE `content_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails_to_lists`
--
ALTER TABLE `emails_to_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_5489223` (`category_id`);

--
-- Indexes for table `job_positions`
--
ALTER TABLE `job_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listscategory`
--
ALTER TABLE `listscategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists_filters`
--
ALTER TABLE `lists_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_2578342` (`role_id`),
  ADD KEY `permission_id_fk_2578342` (`permission_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2578384` (`user_id`),
  ADD KEY `code_fk_2578385` (`code_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_2578351` (`user_id`),
  ADD KEY `role_id_fk_2578351` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_categories`
--
ALTER TABLE `content_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_tags`
--
ALTER TABLE `content_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails_to_lists`
--
ALTER TABLE `emails_to_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_positions`
--
ALTER TABLE `job_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listscategory`
--
ALTER TABLE `listscategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lists_filters`
--
ALTER TABLE `lists_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_category_blog_post`
--
ALTER TABLE `blog_category_blog_post`
  ADD CONSTRAINT `blog_category_id_fk_5489209` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_post_id_fk_5489209` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_post_blog_tag`
--
ALTER TABLE `blog_post_blog_tag`
  ADD CONSTRAINT `blog_post_id_fk_5489210` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tag_id_fk_5489210` FOREIGN KEY (`blog_tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `coupon_fk_2578365` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `purchased_by_fk_2578370` FOREIGN KEY (`purchased_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserved_by_fk_2578368` FOREIGN KEY (`reserved_by_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `content_category_content_page`
--
ALTER TABLE `content_category_content_page`
  ADD CONSTRAINT `content_category_id_fk_5489209` FOREIGN KEY (`content_category_id`) REFERENCES `content_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_page_id_fk_5489209` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_page_content_tag`
--
ALTER TABLE `content_page_content_tag`
  ADD CONSTRAINT `content_page_id_fk_5489210` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_tag_id_fk_5489210` FOREIGN KEY (`content_tag_id`) REFERENCES `content_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `category_fk_5489223` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_2578342` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_2578342` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `code_fk_2578385` FOREIGN KEY (`code_id`) REFERENCES `codes` (`id`),
  ADD CONSTRAINT `user_fk_2578384` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_2578351` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_2578351` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
