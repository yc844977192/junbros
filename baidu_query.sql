/*
Navicat MySQL Data Transfer

Source Server         : ubuntu_s0
Source Server Version : 80024
Source Host           : 192.168.1.2:3306
Source Database       : baidu_api

Target Server Type    : MYSQL
Target Server Version : 80024
File Encoding         : 65001

Date: 2023-11-08 13:03:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for baidu_query
-- ----------------------------
DROP TABLE IF EXISTS `baidu_query`;
CREATE TABLE `baidu_query` (
  `query_id` int NOT NULL AUTO_INCREMENT,
  `query_word` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '推荐词字面',
  `query_pv` int DEFAULT NULL COMMENT '月均搜索量',
  `query_select` int DEFAULT '2' COMMENT '1-已查 2-未查',
  PRIMARY KEY (`query_id`,`query_word`) USING BTREE,
  UNIQUE KEY `query_word` (`query_word`) USING BTREE,
  KEY `word` (`query_word`) USING BTREE COMMENT '关键字索引',
  KEY `id` (`query_id`) USING BTREE COMMENT '主键索引',
  KEY `query_pv` (`query_pv`) USING BTREE COMMENT '搜索量索引',
  KEY `query_select` (`query_select`) USING BTREE COMMENT '搜索条件索引'
) ENGINE=MyISAM AUTO_INCREMENT=320717763 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
