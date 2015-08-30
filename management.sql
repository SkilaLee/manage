/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : management

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-08-30 18:02:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `power` int(11) NOT NULL COMMENT '1为最高级-校长的权力,2为科研人员的权力,3为教师的权力,4为校工的...',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '校长', '1');
INSERT INTO `role` VALUES ('2', '科研人员', '2');
INSERT INTO `role` VALUES ('3', '教师', '3');
INSERT INTO `role` VALUES ('4', '校工', '4');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_num` varchar(255) NOT NULL COMMENT '用户工号--和学生的学号差不多,用作登录账号',
  `user_name` varchar(255) NOT NULL,
  `user_psw` varchar(255) NOT NULL COMMENT '密码--身份证后六位---(登录后可以自己改)',
  `salt` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '211777', '李泽月', 'fef7efeec181db9c16bf9ada4fd7bf90', '767365', '1');
INSERT INTO `user` VALUES ('2', '1000000', '猴子', 'b1c2db0a57f8482d7ad1e3d49de897ed', '767365', '2');
INSERT INTO `user` VALUES ('3', '1000001', '逗逼', '3f45c5627886c6d045268ea7560b1bc8', '767365', '4');
INSERT INTO `user` VALUES ('4', '1000002', '老虎', 'b32f2e5fc81e5978a5161eb36c61edb1', '767365', '3');
INSERT INTO `user` VALUES ('5', '1000005', '狐狸', 'efb32cbfee32dab02ffdc611ba3b08ca', '767365', '3');
INSERT INTO `user` VALUES ('21', '10086', '妹纸', 'd767712115f5929a1d2f2dc21570917d', '767365', '2');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_num` varchar(255) NOT NULL,
  `user_id_num` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '211777', '146127');
INSERT INTO `user_info` VALUES ('2', '1000000', '000000');
INSERT INTO `user_info` VALUES ('3', '1000001', '111111');
INSERT INTO `user_info` VALUES ('4', '1000002', '222222');
INSERT INTO `user_info` VALUES ('5', '1000005', '333333');
INSERT INTO `user_info` VALUES ('21', '121211', '1112121');
INSERT INTO `user_info` VALUES ('22', '121211', '1112121');
INSERT INTO `user_info` VALUES ('23', '10086', '999999');
