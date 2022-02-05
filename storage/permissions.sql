-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2021 at 07:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenders`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `routes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `routes`, `group`, `created_at`, `updated_at`) VALUES
(1, 'عرض المحافظات', 'admin', 'governorates.index', 'المحافظات', NULL, NULL),
(2, 'اضافة محافظة', 'admin', 'governorates.create,governorates.store', 'المحافظات', NULL, NULL),
(3, 'تعديل المحافظة', 'admin', 'governorates.edit,governorates.update', 'المحافظات', NULL, NULL),
(4, 'حذف المحافظة', 'admin', 'governorates.destroy', 'المحافظات', NULL, NULL),
(5, 'تفعيل المحافظات', 'admin', 'governorate.toggleBoolean', 'المحافظات', NULL, NULL),
(6, 'عرض المدن', 'admin', 'cities.index', 'المدن', NULL, NULL),
(7, 'اضافة مدينة', 'admin', 'cities.create,cities.store', 'المدن', NULL, NULL),
(8, 'تعديل مدينة', 'admin', 'cities.edit,cities.update', 'المدن', NULL, NULL),
(9, 'حذف مدينة', 'admin', 'cities.destroy', 'المدن', NULL, NULL),
(10, 'تفعيل مدينة', 'admin', 'city.toggleBoolean', 'المدن', NULL, NULL),
(11, 'عرض الاعدادات', 'admin', 'setting.index', 'الاعدادات', NULL, NULL),
(12, 'اضافة اعدادات', 'admin', 'setting.create,setting.store', 'الاعدادات', NULL, NULL),
(13, 'تعديل اعدادات', 'admin', 'setting.edit,setting.update', 'الاعدادات', NULL, NULL),
(14, 'حذف اعدادات', 'admin', 'setting.destroy', 'الاعدادات', NULL, NULL),
(16, 'عرض المستخدمين', 'admin', 'users.index', 'المستخدمين', NULL, NULL),
(17, 'اضافة مستخدم', 'admin', 'users.create,users.store', 'المستخدمين', NULL, NULL),
(18, 'تعديل مستخدم', 'admin', 'users.edit,users.update', 'المستخدمين', NULL, NULL),
(19, 'حذف مستخدم', 'admin', 'users.destroy', 'المستخدمين', NULL, NULL),
(20, 'عرض الرتب', 'admin', 'roles.index', 'الرتب', NULL, NULL),
(21, 'اضافة رتبة', 'admin', 'roles.create,roles.store', 'الرتب', NULL, NULL),
(22, 'تعديل رتبة', 'admin', 'roles.edit,roles.update', 'الرتب', NULL, NULL),
(23, 'حذف رتبة', 'admin', 'roles.destroy', 'الرتب', NULL, NULL),
(24, 'عرض العملاء', 'admin', 'clients.index', 'العملاء', NULL, NULL),
(25, 'اضافة عميل', 'admin', 'clients.create,clients.store', 'العملاء', NULL, NULL),
(26, 'تعديل عميل', 'admin', 'clients.edit,clients.update', 'العملاء', NULL, NULL),
(27, 'حذف عميل', 'admin', 'clients.destroy', 'العملاء', NULL, NULL),
(28, 'تفعيل عميل', 'admin', 'client.toggleBoolean', 'العملاء', NULL, NULL),
(29, 'عرض الانشطة الرئيسية', 'admin', 'categories.index', 'الانشطة الرئيسية', NULL, NULL),
(30, 'اضافة نشاط رئيسي', 'admin', 'categories.create,categories.store', 'الانشطة الرئيسية', NULL, NULL),
(31, 'تعديل نشاط رئيسي ', 'admin', 'categories.edit,categories.update', 'الانشطة الرئيسية', NULL, NULL),
(32, 'حذف نشاط رئيسي', 'admin', 'categories.destroy', 'الانشطة الرئيسية', NULL, NULL),
(33, 'تفعيل نشاط رئيسي', 'admin', 'category.toggleBoolean', 'الانشطة الرئيسية', NULL, NULL),
(34, 'عرض الانشطة الفرعية', 'admin', 'sub-categories.index', 'الانشطة الفرعية', NULL, NULL),
(35, 'اضافة نشاط فرعي', 'admin', 'sub-categories.create,sub-categories.store', 'الانشطة الفرعية', NULL, NULL),
(36, 'تعديل نشاط فرعي ', 'admin', 'sub-categories.edit,sub-categories.update', 'الانشطة الفرعية', NULL, NULL),
(37, 'حذف نشاط فرعي', 'admin', 'sub-categories.destroy', 'الانشطة الفرعية', NULL, NULL),
(38, 'تفعيل نشاط فرعي', 'admin', 'sub-category.toggleBoolean', 'الانشطة الفرعية', NULL, NULL),
(39, 'عرض القاب العملاء', 'admin', 'titles.index', 'القاب العملاء', NULL, NULL),
(40, 'اضافة لقب عميل', 'admin', 'titles.create,titles.store', 'القاب العملاء', NULL, NULL),
(41, 'تعديل لقب عميل ', 'admin', 'titles.edit,titles.update', 'القاب العملاء', NULL, NULL),
(42, 'حذف لقب عميل', 'admin', 'titles.destroy', 'القاب العملاء', NULL, NULL),
(43, 'عرض الجرائد', 'admin', 'newspapers.index', 'الجرائد ', NULL, NULL),
(44, 'اضافة جريدة', 'admin', 'newspapers.create,newspapers.store', 'الجرائد', NULL, NULL),
(45, 'تعديل جريدة ', 'admin', 'newspapers.edit,newspapers.update', 'الجرائد', NULL, NULL),
(46, 'حذف الجريدة', 'admin', 'newspapers.destroy', 'الجرائد', NULL, NULL),
(47, 'تفعيل الجريدة', 'admin', 'newspapers.toggleBoolean', 'الجرائد', NULL, NULL),
(48, 'عرض الجهة المعلنة', 'admin', 'advertisers.index', 'الجهات المعلنة', NULL, NULL),
(49, 'اضافة جهة معلنة', 'admin', 'advertisers.create,advertisers.store', 'الجهات المعلنة', NULL, NULL),
(50, 'تعديل جهة معلنة ', 'admin', 'advertisers.edit,advertisers.update', 'الجهات المعلنة', NULL, NULL),
(51, 'حذف جهة معلنة', 'admin', 'advertisers.destroy', 'الجهات المعلنة', NULL, NULL),
(52, 'عرض الفروع', 'admin', 'advertisers.branches.index', 'الفروع', NULL, NULL),
(53, 'اضافة فرع', 'admin', 'advertisers.branches.create,advertisers.branches.store', 'الفروع', NULL, NULL),
(54, 'تعديل فرع ', 'admin', 'advertisers.branches.edit,advertisers.branches.update', 'الفروع', NULL, NULL),
(55, 'حذف فرع', 'admin', 'advertisers.branches.destroy', 'الفروع', NULL, NULL),
(56, 'عرض الادارات', 'admin', 'advertisers.branches.departments.index', 'الادارات', NULL, NULL),
(57, 'اضافة ادارة', 'admin', 'advertisers.branches.departments.create,advertisers.branches.departments.store', 'الادارات', NULL, NULL),
(58, 'تعديل ادارة ', 'admin', 'advertisers.branches.departments.edit,advertisers.branches.departments.update', 'الادارات', NULL, NULL),
(59, 'حذف اداراة', 'admin', 'advertisers.branches.departments.destroy', 'الادارات', NULL, NULL),
(60, 'عرض المناقصات', 'admin', 'tenders.index', 'المناقصات', NULL, NULL),
(64, 'اضافة مناقصة', 'admin', 'tenders.create,tenders.store', 'المناقصات', NULL, NULL),
(65, 'تعديل مناقصة ', 'admin', 'tenders.edit,tenders.update', 'المناقصات', NULL, NULL),
(66, 'حذف مناقصة', 'admin', 'tenders.destroy', 'المناقصات', NULL, NULL),
(67, 'تفعيل مناقصة', 'admin', 'tenders.toggleBoolean', 'المناقصات', NULL, NULL),
(68, 'نسخ مناقصة', 'admin', 'copy.tender', 'المناقصات', NULL, NULL),
(69, 'عرض السجلات', 'admin', 'logs.index', 'السجلات', NULL, NULL),
(70, 'عرض العملات', 'admin', 'coins.index', 'العملات', NULL, NULL),
(71, 'اضافة عملة', 'admin', 'coins.create,coins.store', 'العملات', NULL, NULL),
(72, 'تعديل عملة', 'admin', 'coins.update,coins.edit', 'العملات', NULL, NULL),
(73, 'حذف عملة', 'admin', 'coins.destroy', 'العملات', NULL, NULL),
(76, 'عرض المعارض', 'admin', 'conference.index', 'المعارض والمؤتمرات', NULL, NULL),
(77, 'اضافة المعارض', 'admin', 'conference.create,conference.store', 'المعارض والمؤتمرات', NULL, NULL),
(78, 'تعديل المعرض', 'admin', 'conference.update,conference.edit', 'المعارض والمؤتمرات', NULL, NULL),
(79, 'حذف المعرض', 'admin', 'conference.destroy', 'المعارض والمؤتمرات', NULL, NULL),
(80, 'انشطة المناقصات', 'admin', 'categories.index', 'الانشطة الرئيسية', NULL, NULL),
(81, 'خطط الاشتراكات', 'admin', 'packages.index', 'خطط الاشتراكات', NULL, NULL),
(82, 'تعديل خطط الاشتراكات', 'admin', 'packages.edit,packages.update', 'تعديل خطط الاشتراكات', NULL, NULL),
(83, 'النسخ الاحتياطي', 'admin', 'backup.index', 'النسخ الاحتياطي', NULL, NULL);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
