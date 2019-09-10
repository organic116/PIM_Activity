/*
MySQL Backup
Database: dbactivities
Backup Time: 2018-11-28 16:12:00
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `dbactivities`.`tb_activities`;
DROP TABLE IF EXISTS `dbactivities`.`tb_activities_type`;
DROP TABLE IF EXISTS `dbactivities`.`tb_admin`;
DROP TABLE IF EXISTS `dbactivities`.`tb_course`;
DROP TABLE IF EXISTS `dbactivities`.`tb_faculty`;
DROP TABLE IF EXISTS `dbactivities`.`tb_genus`;
DROP TABLE IF EXISTS `dbactivities`.`tb_major`;
DROP TABLE IF EXISTS `dbactivities`.`tb_personal`;
DROP TABLE IF EXISTS `dbactivities`.`tb_report`;
DROP TABLE IF EXISTS `dbactivities`.`tb_user`;
CREATE TABLE `tb_activities` (
  `activities_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `activities_name` varchar(40) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `activities_detail` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `activities_year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `genus_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activities_startdate` date NOT NULL,
  `activities_starttime` time NOT NULL,
  `activities_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activities_enddate` date NOT NULL,
  `activities_endtime` time NOT NULL,
  `activities_addstart` date NOT NULL,
  `activities_valueuser` int(10) NOT NULL,
  `activities_hour` int(2) NOT NULL,
  `type_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`activities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_activities_type` (
  `type_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_admin` (
  `admin_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `admin_prefix` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `admin_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_course` (
  `course_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `course_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_faculty` (
  `faculty_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_genus` (
  `genus_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `genus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `genus_nameis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`genus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_major` (
  `major_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `major_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major_shortname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_personal` (
  `personal_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `personal_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `personal_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_prefix` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `personal_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `personal_departmeent` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `major_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_tel` int(10) NOT NULL,
  PRIMARY KEY (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_report` (
  `report_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `activities_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_user` (
  `user_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_prefix` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `major_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_ area` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_room` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` date NOT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_county` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `user_zipcode` int(5) NOT NULL,
  `user_tel` int(10) NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_club` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `user_qrcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_iduser` int(13) NOT NULL,
  `user_nameeng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastnameeng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_ image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
BEGIN;
LOCK TABLES `dbactivities`.`tb_activities` WRITE;
DELETE FROM `dbactivities`.`tb_activities`;
INSERT INTO `dbactivities`.`tb_activities` (`activities_id`,`activities_name`,`activities_detail`,`activities_year`,`genus_id`,`activities_startdate`,`activities_starttime`,`activities_admin`,`activities_enddate`,`activities_endtime`,`activities_addstart`,`activities_valueuser`,`activities_hour`,`type_id`) VALUES ('', '', '', '', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '0000-00-00', 0, 0, ''),('12', 'กีฬาสี', 'แกแปผแปแปผ', '2555', 'กิจกรรมบังคับ', '2018-11-17', '12:03:00', 'วัชรพล', '2018-11-16', '03:13:00', '2018-11-09', 19, 5, 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม'),('3', 'วันพ่อ', '', '1997', 'กิจกรรมอื่นๆ', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '0000-00-00', 1000, 0, 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม'),('35', '', '', '', 'กิจกรรมเลือก', '0000-00-00', '00:00:00', 'ก้อง', '0000-00-00', '00:00:00', '0000-00-00', 10, 100, 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม'),('50', '', '', '2557', 'กิจกรรมบังคับ', '0000-00-00', '00:00:00', '40', '0000-00-00', '00:00:00', '0000-00-00', 0, 2, 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม'),('7', '', '', '', 'กิจกรรมบังคับ', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '0000-00-00', 10, 0, 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_activities_type` WRITE;
DELETE FROM `dbactivities`.`tb_activities_type`;
INSERT INTO `dbactivities`.`tb_activities_type` (`type_id`,`type_name`) VALUES ('A1', 'กิจกรรมบังคับ'),('A2', 'กิจกรรมเลือก'),('A3', 'กิจกรรมอื่นๆ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_admin` WRITE;
DELETE FROM `dbactivities`.`tb_admin`;
INSERT INTO `dbactivities`.`tb_admin` (`admin_id`,`admin_prefix`,`admin_name`,`admin_lastname`,`admin_username`,`admin_password`,`admin_status`) VALUES ('1', '0', '1', '', 'วัชรพล', '1', '1');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_course` WRITE;
DELETE FROM `dbactivities`.`tb_course`;
INSERT INTO `dbactivities`.`tb_course` (`course_id`,`course_name`,`course_status`) VALUES ('20', 'ปกติ', '0'),('21', 'เทียบโอน', '0');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_faculty` WRITE;
DELETE FROM `dbactivities`.`tb_faculty`;
INSERT INTO `dbactivities`.`tb_faculty` (`faculty_id`,`faculty_name`,`faculty_status`) VALUES ('105', 'บริหารธุรกิจ', '0');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_genus` WRITE;
DELETE FROM `dbactivities`.`tb_genus`;
INSERT INTO `dbactivities`.`tb_genus` (`genus_id`,`genus_name`,`genus_nameis`) VALUES ('10', 'ปฐมนิเทศ', 'กิจกรรมบังคับ'),('11', 'กีฬาภายใน', 'กิจกรรมบังคับ'),('12', 'กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย', 'กิจกรรมบังคับ'),('13', 'กิจกรรมสถาปนามหาวิทยาลัย', 'กิจกรรมบังคับ'),('14', 'กิจกรรมตามประเพณีหรือพิธีกรรมทางศาสนา', 'กิจกรรมบังคับ'),('15', 'เทิดพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัว', 'กิจกรรมบังคับ'),('16', 'เทิดพระเกียรติสมเด็จพระนางเจ้าฯ พระบรมราชินีนาถ', 'กิจกรรมบังคับ'),('17', 'ปัจฉิมนิเทศ', 'กิจกรรมบังคับ'),('18', 'กลุ่มวิชาการและวิชาชีพ', 'กิจกรรมเลือก'),('19', 'กลุ่มกิจกรรมกีฬาและนันทนาการ', 'กิจกรรมเลือก'),('20', 'กลุ่มกิจกรรมบำเพ็ญประโยชน์ หรือรักษาสิ่งแวดล้อม', 'กิจกรรมเลือก'),('21', 'กลุ่มกิจกรรมเสริมสร้างคุณธรรม จริยธรรม', 'กิจกรรมเลือก'),('22', 'กลุ่มกิจกรรมอนุรักษ์ศิลปะวัฒนธรรม', 'กิจกรรมอื่นๆ'),('23', 'กิจกรรมสภานักศึกษา องค์การนักศึกษา ', 'กิจกรรมอื่นๆ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_major` WRITE;
DELETE FROM `dbactivities`.`tb_major`;
INSERT INTO `dbactivities`.`tb_major` (`major_id`,`faculty_id`,`major_name`,`major_shortname`,`major_status`,`course_id`) VALUES ('062', '105', 'บัญชีบัณฑิต', 'ป.บช', '0', '21'),('064', '105', 'บัญชีบัณฑิต', 'ป.บช', '0', '20'),('074', '105', 'การจัดการทั่วไป', 'ป.กจท', '0', '20'),('104', '105', 'การตลาด', 'ป.กต', '0', '21'),('164', '105', 'เทคโนโลยีสารสนเทศทางธุรกิจ-การพัฒนาซอฟต์แวร์', 'ป.สสท', '0', '20'),('194', '105', 'ภาษาจีน', 'ป.ภจ', '0', '20');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_personal` WRITE;
DELETE FROM `dbactivities`.`tb_personal`;
INSERT INTO `dbactivities`.`tb_personal` (`personal_id`,`personal_status`,`personal_username`,`personal_password`,`personal_prefix`,`personal_name`,`personal_lastname`,`personal_address`,`personal_departmeent`,`personal_position`,`major_id`,`personal_tel`) VALUES ('1541051641111', '0', '', '123456', '1', 'วิลาวลย์ ', 'วิเศษวัชร์ ', '', '', '', '', 0);
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_report` WRITE;
DELETE FROM `dbactivities`.`tb_report`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_user` WRITE;
DELETE FROM `dbactivities`.`tb_user`;
INSERT INTO `dbactivities`.`tb_user` (`user_id`,`user_password`,`user_prefix`,`user_name`,`user_lastname`,`major_id`,`faculty_id`,`user_ area`,`user_room`,`course_id`,`user_year`,`user_date`,`user_address`,`user_county`,`user_zipcode`,`user_tel`,`user_email`,`user_club`,`user_status`,`user_qrcode`,`user_iduser`,`user_nameeng`,`user_lastnameeng`,`user_ image`) VALUES ('3581051641101', '000000', '0', 'อรรถพล', 'วิจิตรเรืองนภา', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641102', '000000', '0', 'เกียงศักดิ์', 'สีรัตน์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641105', '000000', '0', 'ฐิติ', 'อร่ามรักษ์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641107', '000000', '1', 'ปวรปรัชญ์', 'แสงจันทร์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641108', '000000', '0', 'ชาคริต', 'สิงห์สนธิ', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641110', '000000', '0', 'วีรยุทธ', 'จิตรวีระนันรังษี', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641113', '000000', '0', 'สุรศักดิ์', 'เสริมสกุล', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641114', '000000', '0', 'ธนาเดช', 'สุริยะฟอง', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641117', '000000', '0', 'ณัฐพล', 'ศรีเจริญ', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641119', '000000', '0', 'วัชรพล', 'นาคคล้าย', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641121', '000000', '1', 'พันธุ์สินี', 'ธรรมวณิชย์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641124', '000000', '0', 'อิศรา', 'เขียวชะอุ่ม', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', '');
UNLOCK TABLES;
COMMIT;
