/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : chl_address

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-14 18:19:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address_country_address
-- ----------------------------
DROP TABLE IF EXISTS `address_country_address`;
CREATE TABLE `address_country_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `pid` bigint(20) NOT NULL DEFAULT '0' COMMENT '上级id',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '地址名称',
  `path_line` varchar(400) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '层次路径线 1-23-4',
  `level` tinyint(1) NOT NULL DEFAULT '1' COMMENT '级别',
  `child_href` varchar(255) NOT NULL DEFAULT '' COMMENT '下级 地址链接',
  `en_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '拼音',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='国家地址 数据表';

-- ----------------------------
-- Table structure for address_sandbar
-- ----------------------------
DROP TABLE IF EXISTS `address_sandbar`;
CREATE TABLE `address_sandbar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 NOT NULL DEFAULT '' COMMENT '洲际名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='洲 地名';
