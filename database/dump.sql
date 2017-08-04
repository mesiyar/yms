-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: eddie
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('超级管理元','1',1501681128),('超级管理元','2',1501678919);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin-user/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin-user/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin-user/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin-user/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin-user/update',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/assignment/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/assignment/assign',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/assignment/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/assignment/revoke',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/assignment/view',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/default/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/default/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/update',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/menu/view',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/assign',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/remove',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/update',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/permission/view',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/assign',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/remove',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/update',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/role/view',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/assign',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/refresh',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/route/remove',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/create',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/update',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/rule/view',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/*',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/activate',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/change-password',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/index',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/login',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/logout',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/reset-password',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/signup',2,NULL,NULL,NULL,1501678834,1501678834),('/admin/user/view',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/*',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/*',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/db-explain',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/download-mail',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/index',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/toolbar',2,NULL,NULL,NULL,1501678834,1501678834),('/debug/default/view',2,NULL,NULL,NULL,1501678834,1501678834),('/department/*',2,NULL,NULL,NULL,1501678834,1501678834),('/department/create',2,NULL,NULL,NULL,1501678834,1501678834),('/department/delete',2,NULL,NULL,NULL,1501678834,1501678834),('/department/index',2,NULL,NULL,NULL,1501678834,1501678834),('/department/update',2,NULL,NULL,NULL,1501678834,1501678834),('/department/view',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/*',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/*',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/action',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/diff',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/index',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/preview',2,NULL,NULL,NULL,1501678834,1501678834),('/gii/default/view',2,NULL,NULL,NULL,1501678834,1501678834),('/site-config/*',2,NULL,NULL,NULL,1501753762,1501753762),('/site-config/update?id=1',2,NULL,NULL,NULL,1501753793,1501753793),('/site/*',2,NULL,NULL,NULL,1501678834,1501678834),('/site/error',2,NULL,NULL,NULL,1501678834,1501678834),('/site/forget',2,NULL,NULL,NULL,1501678834,1501678834),('/site/index',2,NULL,NULL,NULL,1501678834,1501678834),('/site/login',2,NULL,NULL,NULL,1501678834,1501678834),('/site/logout',2,NULL,NULL,NULL,1501678834,1501678834),('/site/setting',2,NULL,NULL,NULL,1501746106,1501746106),('超级管理元',1,NULL,NULL,NULL,1501678897,1501678897);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('超级管理元','/*'),('超级管理元','/admin-user/*'),('超级管理元','/admin-user/create'),('超级管理元','/admin-user/delete'),('超级管理元','/admin-user/index'),('超级管理元','/admin-user/update'),('超级管理元','/admin/*'),('超级管理元','/admin/assignment/*'),('超级管理元','/admin/assignment/assign'),('超级管理元','/admin/assignment/index'),('超级管理元','/admin/assignment/revoke'),('超级管理元','/admin/assignment/view'),('超级管理元','/admin/default/*'),('超级管理元','/admin/default/index'),('超级管理元','/admin/menu/*'),('超级管理元','/admin/menu/create'),('超级管理元','/admin/menu/delete'),('超级管理元','/admin/menu/index'),('超级管理元','/admin/menu/update'),('超级管理元','/admin/menu/view'),('超级管理元','/admin/permission/*'),('超级管理元','/admin/permission/assign'),('超级管理元','/admin/permission/create'),('超级管理元','/admin/permission/delete'),('超级管理元','/admin/permission/index'),('超级管理元','/admin/permission/remove'),('超级管理元','/admin/permission/update'),('超级管理元','/admin/permission/view'),('超级管理元','/admin/role/*'),('超级管理元','/admin/role/assign'),('超级管理元','/admin/role/create'),('超级管理元','/admin/role/delete'),('超级管理元','/admin/role/index'),('超级管理元','/admin/role/remove'),('超级管理元','/admin/role/update'),('超级管理元','/admin/role/view'),('超级管理元','/admin/route/*'),('超级管理元','/admin/route/assign'),('超级管理元','/admin/route/create'),('超级管理元','/admin/route/index'),('超级管理元','/admin/route/refresh'),('超级管理元','/admin/route/remove'),('超级管理元','/admin/rule/*'),('超级管理元','/admin/rule/create'),('超级管理元','/admin/rule/delete'),('超级管理元','/admin/rule/index'),('超级管理元','/admin/rule/update'),('超级管理元','/admin/rule/view'),('超级管理元','/admin/user/*'),('超级管理元','/admin/user/activate'),('超级管理元','/admin/user/change-password'),('超级管理元','/admin/user/delete'),('超级管理元','/admin/user/index'),('超级管理元','/admin/user/login'),('超级管理元','/admin/user/logout'),('超级管理元','/admin/user/request-password-reset'),('超级管理元','/admin/user/reset-password'),('超级管理元','/admin/user/signup'),('超级管理元','/admin/user/view'),('超级管理元','/debug/*'),('超级管理元','/debug/default/*'),('超级管理元','/debug/default/db-explain'),('超级管理元','/debug/default/download-mail'),('超级管理元','/debug/default/index'),('超级管理元','/debug/default/toolbar'),('超级管理元','/debug/default/view'),('超级管理元','/department/*'),('超级管理元','/department/create'),('超级管理元','/department/delete'),('超级管理元','/department/index'),('超级管理元','/department/update'),('超级管理元','/department/view'),('超级管理元','/gii/*'),('超级管理元','/gii/default/*'),('超级管理元','/gii/default/action'),('超级管理元','/gii/default/diff'),('超级管理元','/gii/default/index'),('超级管理元','/gii/default/preview'),('超级管理元','/gii/default/view'),('超级管理元','/site/*'),('超级管理元','/site/error'),('超级管理元','/site/forget'),('超级管理元','/site/index'),('超级管理元','/site/login'),('超级管理元','/site/logout'),('超级管理元','/site/setting');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(15) NOT NULL COMMENT '部门名称',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '上级id',
  `createTime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '创建时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态（0 弃用 1 启用）',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='部门表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'顶级部门',0,'2017-08-03 13:13:00',1),(2,'研发部',1,'2017-08-04 15:06:29',1),(3,'游戏前端',2,'2017-08-04 15:06:48',1),(4,'游戏后端',2,'2017-08-04 15:07:00',1),(5,'数据分析',2,'2017-08-04 15:07:14',1),(6,'PHP开发',2,'2017-08-04 15:07:42',1);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'开发',NULL,NULL,1000,'{\"icon\":\"connectdevelop\"}'),(2,'菜单',1,'/admin/menu/index',1,'{\"icon\":\"book\"}'),(3,'路由',1,'/admin/route/index',2,'{\"icon\":\"sitemap\"}'),(4,'角色',1,'/admin/assignment/index',3,'{\"icon\":\"user-o\"}'),(5,'分配',1,'/admin/assignment/index',4,'{\"icon\":\"key\"}'),(6,'权限',1,'/admin/permission/index',5,'{\"icon\":\"cutlery\"}'),(7,'网站配置',NULL,'/site-config/update?id=1',999,'{\"icon\":\"cog\"}'),(8,'部门管理',NULL,NULL,500,'{\"icon\":\"university \"}'),(9,'部门列表',8,'/department/index',501,'{\"icon\":\"list\"}');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1500433751),('m130524_201442_init',1500433753),('m140506_102106_rbac_init',1500434830),('m140602_111327_create_menu_table',1500435540),('m160312_050000_create_user',1500435540);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_config`
--

DROP TABLE IF EXISTS `site_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `pageSize` tinyint(2) NOT NULL,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_config`
--

LOCK TABLES `site_config` WRITE;
/*!40000 ALTER TABLE `site_config` DISABLE KEYS */;
INSERT INTO `site_config` VALUES (1,'其实都没有','logo.png','其实都没有','其实都没有',15,'skin-yellow');
/*!40000 ALTER TABLE `site_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `head` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png' COMMENT '头像',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'eddie','lXvSzsSTz3pmZkJdbmMYzRAUP1r2A8nz','$2y$13$at5T44ryev61kSCsMsD1N.XXAWOSxo8RBSxjCZOUCSyClxq86Y6M.',NULL,'123@123.com',10,1500435681,1501679512,'default.png'),(2,'luokai','XCgGIPnOr-213EMe98dx2irIl7Y_wL46','$2y$13$3pOle5bomUODreV/oo0mAuoj1jdL1IkSF1KE3E2yBptFMHJCzH6Su',NULL,'luokai@123.com',10,1501678787,1501678787,'default.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-04 17:57:33
