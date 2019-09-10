/*
MySQL Backup
Database: dbactivities
Backup Time: 2018-11-26 07:13:44
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
  `activities_no` int(2) NOT NULL,
  `activities_name` varchar(40) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `activities_detail` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `activities_year` int(4) NOT NULL,
  `genus_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activities_data` date NOT NULL,
  `activities_time` time(6) NOT NULL,
  `activities_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activities_register` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `activities_user` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`activities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `tb_activities_type` (
  `type_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `type_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
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
  `personal_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
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
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_activities_type` WRITE;
DELETE FROM `dbactivities`.`tb_activities_type`;
INSERT INTO `dbactivities`.`tb_activities_type` (`type_id`,`type_name`) VALUES ('', ''),('A0', 'กิจกรรมเลื'),('AR', 'กิจกรรมบัง');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `dbactivities`.`tb_admin` WRITE;
DELETE FROM `dbactivities`.`tb_admin`;
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
INSERT INTO `dbactivities`.`tb_user` (`user_id`,`user_password`,`user_prefix`,`user_name`,`user_lastname`,`major_id`,`faculty_id`,`user_ area`,`user_room`,`course_id`,`user_year`,`user_date`,`user_address`,`user_county`,`user_zipcode`,`user_tel`,`user_email`,`user_club`,`user_status`,`user_qrcode`,`user_iduser`,`user_nameeng`,`user_lastnameeng`,`user_ image`) VALUES ('3581051641101', '000000', '0', 'อรรถพล', 'วิจิตรเรืองนภา', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641102', '000000', '0', 'เกียงศักดิ์', 'สีรัตน์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641105', '000000', '0', 'ฐิติ', 'อร่ามรักษ์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', ''),('3581051641107', '000000', '0', 'ปวรปรัชญ์', 'แสงจันทร์', '164', '105', 'บพิตรพิมุข', '1', '20', '2558', '0000-00-00', '', '', 0, 0, '', '', '0', '', 0, '', '', '');
UNLOCK TABLES;
COMMIT;
