/*
 Navicat Premium Data Transfer

 Source Server         : MyKoneksi
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : db_task

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 03/04/2022 11:54:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_to_do
-- ----------------------------
DROP TABLE IF EXISTS `tb_to_do`;
CREATE TABLE `tb_to_do`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_td` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `details_td` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subject_td` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `priority_td` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deadline_td` date NOT NULL,
  `status_td` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_to_do
-- ----------------------------
INSERT INTO `tb_to_do` VALUES (1, 'ERD', 'Bikin ERD', 'Basis Data', 'High', '2022-03-28', 'Sudah');
INSERT INTO `tb_to_do` VALUES (6, 'TMD', 'Beresin TMD', 'Struktur Data', 'High', '2022-04-30', 'Belum');

SET FOREIGN_KEY_CHECKS = 1;
