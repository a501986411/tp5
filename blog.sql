/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-12 17:37:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `name` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '菜单连接地址',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1:启用,2:停用',
  `path` varchar(20) NOT NULL DEFAULT '' COMMENT '上级所有节点路径如（1-3-4）',
  `is_update_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否支持启用或者停用操作1：支持，0：不支持',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='菜单数据表';

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '系统设置', '', '0', '1', '', '0');
INSERT INTO `admin_menu` VALUES ('2', '1', '菜单管理', '/MenuManage/index', '1', '1', '1', '0');
INSERT INTO `admin_menu` VALUES ('3', '0', '文章管理', '', '0', '1', '', '1');
INSERT INTO `admin_menu` VALUES ('4', '3', '类型管理', '', '0', '1', '3', '1');
INSERT INTO `admin_menu` VALUES ('5', '1', '权限管理', '/auth/index', '2', '2', '1', '0');
INSERT INTO `admin_menu` VALUES ('6', '3', '标签管理', '/tag/index', '2', '2', '3', '1');
INSERT INTO `admin_menu` VALUES ('7', '3', '作者管理', '/author/index', '3', '2', '3', '1');
INSERT INTO `admin_menu` VALUES ('8', '0', '评论管理', '', '3', '2', '', '1');

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password_hash` varchar(255) NOT NULL DEFAULT '' COMMENT '密码hash加密字符串',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用1：启用，0：停用',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '最后一次登录IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理后台用户基础信息表';

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'chenhailong', '$2y$10$jEF0sQSPOwQtQFJDh05Hg.w8soTr0HxsujfLOCghMpzjeVJ24Au66', '1', '0', '');
