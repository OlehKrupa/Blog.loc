/*
 Navicat MySQL Data Transfer

 Source Server         : Vagrant
 Source Server Type    : MySQL
 Source Server Version : 80031 (8.0.31-0ubuntu0.20.04.1)
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 80031 (8.0.31-0ubuntu0.20.04.1)
 File Encoding         : 65001

 Date: 04/12/2022 18:34:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_UNIQUE`(`id` ASC) USING BTREE,
  INDEX `fk_articles_category_idx`(`category_id` ASC) USING BTREE,
  INDEX `fk_articles_user1_idx`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk_articles_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_articles_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, 1, 2, 'Ігрова збірка', 'Берем сначала райзен, ведь с ним я так прекрасен, добавим-ка асроку чтоб было много проку, 2 плашки озу прислала Лиза Су. Ведро воды и КСАС туды, охапку дров и комп готов', '2022-12-04 16:26:41', 1);
INSERT INTO `articles` VALUES (2, 2, 2, 'Окорочки', 'Сьогодні я нажарив окорочків. Зараз вони остинуть і буду їсти. Ммммм, а пахне як!', '2022-12-04 16:33:31', 1);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_UNIQUE`(`id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Комп\'ютерна техніка');
INSERT INTO `category` VALUES (2, 'Кухня');
INSERT INTO `category` VALUES (3, 'Війна');
INSERT INTO `category` VALUES (4, 'Ремонт');
INSERT INTO `category` VALUES (5, 'Котики');
INSERT INTO `category` VALUES (6, 'Песики');
INSERT INTO `category` VALUES (7, 'Історії з життя');
INSERT INTO `category` VALUES (8, 'Паста');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_confirmed` tinyint NOT NULL DEFAULT 0,
  `role` enum('admin','user') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_UNIQUE`(`id` ASC) USING BTREE,
  UNIQUE INDEX `nickname_UNIQUE`(`nickname` ASC) USING BTREE,
  UNIQUE INDEX `email_UNIQUE`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'oleh_admin', 'krupao980@gmail.com', 1, 'admin', 'hash1', 'auth1', '2022-12-04 16:11:21');
INSERT INTO `user` VALUES (2, 'Zhabka228', 'zhaba228@gmail.com', 0, 'user', 'hash2', 'auth2', '2022-12-04 16:12:09');

SET FOREIGN_KEY_CHECKS = 1;
