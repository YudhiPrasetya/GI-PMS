/*
 Navicat Premium Dump SQL

 Source Server         : DATABASEGIJOMBOR
 Source Server Type    : MySQL
 Source Server Version : 80031 (8.0.31)
 Source Host           : 192.168.10.81:3306
 Source Schema         : productionreport

 Target Server Type    : MySQL
 Target Server Version : 80031 (8.0.31)
 File Encoding         : 65001

 Date: 22/04/2025 10:35:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for abseenteism
-- ----------------------------
DROP TABLE IF EXISTS `abseenteism`;
CREATE TABLE `abseenteism`  (
  `id_abs` int NOT NULL AUTO_INCREMENT,
  `line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ontime` int NULL DEFAULT NULL,
  `late` int NULL DEFAULT NULL,
  `persentage` decimal(10, 2) NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_abs`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 636 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for absenteeism_everyday
-- ----------------------------
DROP TABLE IF EXISTS `absenteeism_everyday`;
CREATE TABLE `absenteeism_everyday`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NULL DEFAULT NULL,
  `total_all` int NULL DEFAULT NULL,
  `attended` int NULL DEFAULT NULL,
  `paid_leave` int NULL DEFAULT NULL,
  `absent` int NULL DEFAULT NULL,
  `percentage` float NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10842 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for agv
-- ----------------------------
DROP TABLE IF EXISTS `agv`;
CREATE TABLE `agv`  (
  `id_input_sewing` int NOT NULL,
  `lineID` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `created_time` time NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(4, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(23) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `to_packing` bit(1) NULL DEFAULT NULL,
  `packed_date` date NULL DEFAULT NULL,
  `outputed` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gerbong` int NULL DEFAULT NULL,
  `flag` int NULL DEFAULT NULL,
  `update` timestamp NULL DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `rfid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_input_sewing`(`id_input_sewing` ASC) USING BTREE,
  UNIQUE INDEX `idx_inputsewing_barcode`(`kode_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_input_sewing2`(`orc` ASC, `kode_barcode` ASC) USING BTREE,
  INDEX `fk_input`(`tgl` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2299801 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for agv_addon
-- ----------------------------
DROP TABLE IF EXISTS `agv_addon`;
CREATE TABLE `agv_addon`  (
  `id_input_sewing` int NOT NULL,
  `lineID` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(4, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `to_packing` bit(1) NULL DEFAULT NULL,
  `packed_date` date NULL DEFAULT NULL,
  `outputed` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gerbong` int NULL DEFAULT NULL,
  `flag` int NULL DEFAULT NULL,
  `update` timestamp NULL DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `rfid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_input_sewing`(`id_input_sewing` ASC) USING BTREE,
  UNIQUE INDEX `idx_inputsewing_barcode`(`kode_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_input_sewing2`(`orc` ASC, `kode_barcode` ASC) USING BTREE,
  INDEX `fk_input`(`tgl` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1533937 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for astmanager
-- ----------------------------
DROP TABLE IF EXISTS `astmanager`;
CREATE TABLE `astmanager`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_mgr` int NULL DEFAULT NULL,
  `nik` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for cutting
-- ----------------------------
DROP TABLE IF EXISTS `cutting`;
CREATE TABLE `cutting`  (
  `id_cutting` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `boxes` int NULL DEFAULT NULL,
  `prepare_on` date NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  `onProgress` tinyint(1) NULL DEFAULT 0,
  `spk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting`) USING BTREE,
  UNIQUE INDEX `id_cutting_idx`(`id_cutting` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 124207 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for cutting_addon
-- ----------------------------
DROP TABLE IF EXISTS `cutting_addon`;
CREATE TABLE `cutting_addon`  (
  `id_cutting` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `boxes` int NULL DEFAULT NULL,
  `prepare_on` date NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  `onProgress` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_cutting`) USING BTREE,
  UNIQUE INDEX `id_cutting_idx`(`id_cutting` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78951 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for cutting_detail
-- ----------------------------
DROP TABLE IF EXISTS `cutting_detail`;
CREATE TABLE `cutting_detail`  (
  `id_cutting_detail` int NOT NULL AUTO_INCREMENT,
  `id_cutting` int NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grup_size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `cutting_sam` decimal(4, 3) NULL DEFAULT NULL,
  `sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cutting_date` date NULL DEFAULT NULL,
  `outermold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `panty_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `printed_date` date NULL DEFAULT NULL,
  `packed` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `juwita_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `skp_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting_detail`) USING BTREE,
  UNIQUE INDEX `fk_cutting_2`(`kode_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_cutting4`(`skp_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_cutting5`(`juwita_barcode` ASC) USING BTREE,
  INDEX `fk_cutting`(`id_cutting` ASC) USING BTREE,
  INDEX `fk_cutting3`(`cutting_sam` ASC) USING BTREE,
  INDEX `fk_moldx`(`outermold_barcode` ASC) USING BTREE,
  INDEX `fx_moldx1`(`midmold_barcode` ASC) USING BTREE,
  INDEX `fx_mold2`(`linningmold_barcode` ASC) USING BTREE,
  CONSTRAINT `fk_cutting` FOREIGN KEY (`id_cutting`) REFERENCES `cutting` (`id_cutting`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2699062 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for cutting_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `cutting_detail_addon`;
CREATE TABLE `cutting_detail_addon`  (
  `id_cutting_detail` int NOT NULL AUTO_INCREMENT,
  `id_cutting` int NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grup_size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `cutting_sam` decimal(4, 3) NULL DEFAULT NULL,
  `sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cutting_date` date NULL DEFAULT NULL,
  `outermold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `panty_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `printed_date` date NULL DEFAULT NULL,
  `packed` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting_detail`) USING BTREE,
  UNIQUE INDEX `fk_cutting_2`(`kode_barcode` ASC) USING BTREE,
  INDEX `fk_cutting`(`id_cutting` ASC) USING BTREE,
  INDEX `fk_cutting3`(`cutting_sam` ASC) USING BTREE,
  CONSTRAINT `cutting_detail_addon_ibfk_1` FOREIGN KEY (`id_cutting`) REFERENCES `cutting_addon` (`id_cutting`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1784100 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for cutting_detail_skp_juwita
-- ----------------------------
DROP TABLE IF EXISTS `cutting_detail_skp_juwita`;
CREATE TABLE `cutting_detail_skp_juwita`  (
  `id_cutting_detail_skp_juwita` int NOT NULL AUTO_INCREMENT,
  `id_cutting_detail` int NULL DEFAULT NULL,
  `skp_barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `juwita_barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_cutting_detail_skp_juwita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for data_remarks
-- ----------------------------
DROP TABLE IF EXISTS `data_remarks`;
CREATE TABLE `data_remarks`  (
  `id_remarks` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `name_remarks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_remarks`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for defect_rate
-- ----------------------------
DROP TABLE IF EXISTS `defect_rate`;
CREATE TABLE `defect_rate`  (
  `id_defect` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `idx_no_garment` smallint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_defect`) USING BTREE,
  UNIQUE INDEX `fk_defect`(`id_defect` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 513 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for details_qc
-- ----------------------------
DROP TABLE IF EXISTS `details_qc`;
CREATE TABLE `details_qc`  (
  `details_qc_id` int NOT NULL AUTO_INCREMENT,
  `qc_id` int NULL DEFAULT NULL,
  `S19` time(6) NULL DEFAULT NULL,
  `S40` time(6) NULL DEFAULT NULL,
  `S41` time(6) NULL DEFAULT NULL,
  `S38` time(6) NULL DEFAULT NULL,
  `S02` time(6) NULL DEFAULT NULL,
  `S51` time(6) NULL DEFAULT NULL,
  `S52` time(6) NULL DEFAULT NULL,
  `S17` time(6) NULL DEFAULT NULL,
  `S42` time(6) NULL DEFAULT NULL,
  `S03` time(6) NULL DEFAULT NULL,
  `S04` time(6) NULL DEFAULT NULL,
  PRIMARY KEY (`details_qc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_call_mechanic
-- ----------------------------
DROP TABLE IF EXISTS `dt_call_mechanic`;
CREATE TABLE `dt_call_mechanic`  (
  `id_call_mechanic` int NOT NULL AUTO_INCREMENT,
  `url` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `floor` int NOT NULL,
  PRIMARY KEY (`id_call_mechanic`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_defect
-- ----------------------------
DROP TABLE IF EXISTS `dt_defect`;
CREATE TABLE `dt_defect`  (
  `DCode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Defect` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Category` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DCode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_defect2
-- ----------------------------
DROP TABLE IF EXISTS `dt_defect2`;
CREATE TABLE `dt_defect2`  (
  `id_df` int NOT NULL AUTO_INCREMENT,
  `DCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Defect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_df`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_defect_detail
-- ----------------------------
DROP TABLE IF EXISTS `dt_defect_detail`;
CREATE TABLE `dt_defect_detail`  (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_defect` int NULL DEFAULT NULL,
  `no_bundle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `defect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `datetime` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`) USING BTREE,
  INDEX `fx_defect_rate`(`id_defect` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_defect_rate_detail
-- ----------------------------
DROP TABLE IF EXISTS `dt_defect_rate_detail`;
CREATE TABLE `dt_defect_rate_detail`  (
  `id_defect_detail` int NOT NULL AUTO_INCREMENT,
  `id_defect` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `defect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `defect_datetime` datetime NULL DEFAULT NULL,
  `pass_datetime` datetime NULL DEFAULT NULL,
  `barcode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_garment` smallint NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_defect_detail`) USING BTREE,
  INDEX `fk_defect_rate`(`id_defect` ASC) USING BTREE,
  CONSTRAINT `fk_defect_rate` FOREIGN KEY (`id_defect`) REFERENCES `defect_rate` (`id_defect`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1748 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_deffect_rate
-- ----------------------------
DROP TABLE IF EXISTS `dt_deffect_rate`;
CREATE TABLE `dt_deffect_rate`  (
  `id_deffect` int NOT NULL AUTO_INCREMENT,
  `id_line` int NOT NULL,
  `line` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deffect` int NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_deffect`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_departmen
-- ----------------------------
DROP TABLE IF EXISTS `dt_departmen`;
CREATE TABLE `dt_departmen`  (
  `id_departmen` int NOT NULL AUTO_INCREMENT,
  `departmen_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_departmen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_holidays
-- ----------------------------
DROP TABLE IF EXISTS `dt_holidays`;
CREATE TABLE `dt_holidays`  (
  `id_holidays` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `keterangan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_holidays`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_learning_curve
-- ----------------------------
DROP TABLE IF EXISTS `dt_learning_curve`;
CREATE TABLE `dt_learning_curve`  (
  `id_learning_curve` int NOT NULL AUTO_INCREMENT,
  `type_learning_curve` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `day` int NULL DEFAULT NULL,
  `value_learning_curve` int NOT NULL,
  PRIMARY KEY (`id_learning_curve`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_long_thread
-- ----------------------------
DROP TABLE IF EXISTS `dt_long_thread`;
CREATE TABLE `dt_long_thread`  (
  `id_lt` int NOT NULL AUTO_INCREMENT,
  `name_line` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_lt`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_messages
-- ----------------------------
DROP TABLE IF EXISTS `dt_messages`;
CREATE TABLE `dt_messages`  (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `message` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `allocation_message` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'General',
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'admin',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action_delete` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_message`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_order_planning
-- ----------------------------
DROP TABLE IF EXISTS `dt_order_planning`;
CREATE TABLE `dt_order_planning`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  UNIQUE INDEX `fk_order`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1536 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_planning
-- ----------------------------
DROP TABLE IF EXISTS `dt_planning`;
CREATE TABLE `dt_planning`  (
  `id_order` int NULL DEFAULT NULL,
  `id_dt_planning` int NULL DEFAULT 1,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_sewing` int NULL DEFAULT 0,
  `man_power` int NULL DEFAULT 32,
  `learning_curve` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'D',
  `startDate_sewing` datetime NULL DEFAULT NULL,
  `endDate_sewing` datetime NULL DEFAULT NULL,
  `color_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'admin',
  INDEX `idx_dt_planning_id_order`(`id_order` ASC) USING BTREE,
  INDEX `idx_dt_planning_id_dt_planning_style_line_allocation1`(`id_dt_planning` ASC, `style` ASC, `line_allocation1` ASC, `orc` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_planning_details
-- ----------------------------
DROP TABLE IF EXISTS `dt_planning_details`;
CREATE TABLE `dt_planning_details`  (
  `id_dt_planning_details` int NOT NULL AUTO_INCREMENT,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_sewing` int NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'admin',
  PRIMARY KEY (`id_dt_planning_details`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1512 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_role_user
-- ----------------------------
DROP TABLE IF EXISTS `dt_role_user`;
CREATE TABLE `dt_role_user`  (
  `id_role_user` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `name_role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_role_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_screen
-- ----------------------------
DROP TABLE IF EXISTS `dt_screen`;
CREATE TABLE `dt_screen`  (
  `id_screen` int NOT NULL AUTO_INCREMENT,
  `id_departmen` int NOT NULL,
  `id_line` int NULL DEFAULT 0,
  `floor_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `screen_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_screen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 233 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_screen_line
-- ----------------------------
DROP TABLE IF EXISTS `dt_screen_line`;
CREATE TABLE `dt_screen_line`  (
  `id_screen_line` int NOT NULL AUTO_INCREMENT,
  `line_shift_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_shift_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_screen_line`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_videos
-- ----------------------------
DROP TABLE IF EXISTS `dt_videos`;
CREATE TABLE `dt_videos`  (
  `id_videos` int NOT NULL AUTO_INCREMENT,
  `videos_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `duration` int NOT NULL,
  `time` time NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_videos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for dt_zona_screan
-- ----------------------------
DROP TABLE IF EXISTS `dt_zona_screan`;
CREATE TABLE `dt_zona_screan`  (
  `id_z` int NOT NULL AUTO_INCREMENT,
  `screan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `zona` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_z`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for g_area
-- ----------------------------
DROP TABLE IF EXISTS `g_area`;
CREATE TABLE `g_area`  (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `floor_name` int NOT NULL,
  `id_departmen` int NOT NULL,
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id_area`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for g_screen
-- ----------------------------
DROP TABLE IF EXISTS `g_screen`;
CREATE TABLE `g_screen`  (
  `id_screen` int NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_screen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for g_users
-- ----------------------------
DROP TABLE IF EXISTS `g_users`;
CREATE TABLE `g_users`  (
  `U_ID` int NOT NULL AUTO_INCREMENT,
  `GROUP_ID` int NULL DEFAULT NULL,
  `USERNAME` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PASSWORD` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CREATED_BY` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'admin',
  `CREATED_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`U_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 142 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for gpr_agv
-- ----------------------------
DROP TABLE IF EXISTS `gpr_agv`;
CREATE TABLE `gpr_agv`  (
  `id_input_sewing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `rfid` tinyint(3) UNSIGNED ZEROFILL NULL DEFAULT NULL COMMENT 'terkecil= TERDEKAT',
  `LineID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `qty_pcs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `gerbong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `flag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `insert` timestamp(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `update` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete` datetime NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '',
  INDEX `id`(`id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15110 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for gpr_cis
-- ----------------------------
DROP TABLE IF EXISTS `gpr_cis`;
CREATE TABLE `gpr_cis`  (
  `id` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for gpr_log
-- ----------------------------
DROP TABLE IF EXISTS `gpr_log`;
CREATE TABLE `gpr_log`  (
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `eror` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `sesion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `suces` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `mesage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `c_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `id_input_sewing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `rfid` tinyint(3) UNSIGNED ZEROFILL NULL DEFAULT NULL COMMENT 'terkecil= TERDEKAT',
  `LineID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `qty_pcs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `gerbong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `flag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `id` int(10) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `insert` timestamp(3) NULL DEFAULT NULL,
  `update` datetime NULL DEFAULT NULL,
  `delete` datetime NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `id_2` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '[NEW INDEX]',
  `ins_2` timestamp(3) NULL DEFAULT CURRENT_TIMESTAMP(3),
  INDEX `id`(`id` ASC) USING BTREE,
  INDEX `id_2`(`id_2` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19693 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for gpr_usr
-- ----------------------------
DROP TABLE IF EXISTS `gpr_usr`;
CREATE TABLE `gpr_usr`  (
  `lvl_gur` tinyint UNSIGNED NULL DEFAULT NULL,
  `nma_gur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `psw_gur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `idx_gur` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '[INDEX]',
  `ins_gur` timestamp(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `upd_gur` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `del_gur` datetime NULL DEFAULT NULL,
  `nte_gur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  UNIQUE INDEX `UNIK`(`nma_gur` ASC) USING BTREE,
  INDEX `INDEX`(`idx_gur` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for head_sewing
-- ----------------------------
DROP TABLE IF EXISTS `head_sewing`;
CREATE TABLE `head_sewing`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_astmgr` int NULL DEFAULT NULL,
  `nik` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama_head` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `fk_head`(`id` ASC) USING BTREE,
  INDEX `fk_head2`(`nama_head` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for ieteam
-- ----------------------------
DROP TABLE IF EXISTS `ieteam`;
CREATE TABLE `ieteam`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_astmgr` int NULL DEFAULT NULL,
  `id_head` int NULL DEFAULT NULL,
  `nik` int NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_cutting
-- ----------------------------
DROP TABLE IF EXISTS `input_cutting`;
CREATE TABLE `input_cutting`  (
  `id_input_cutting` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_planning` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `created_time` time NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `spk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_cutting`) USING BTREE,
  UNIQUE INDEX `fk_input_cutting3`(`kode_barcode` ASC) USING BTREE,
  INDEX `fk_input_cutting2`(`tgl` ASC) USING BTREE,
  INDEX `fk_input_cutting`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2214263 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_cutting_addon
-- ----------------------------
DROP TABLE IF EXISTS `input_cutting_addon`;
CREATE TABLE `input_cutting_addon`  (
  `id_input_cutting` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_planning` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_cutting`) USING BTREE,
  UNIQUE INDEX `fk_input_cutting3`(`kode_barcode` ASC) USING BTREE,
  INDEX `fk_input_cutting2`(`tgl` ASC) USING BTREE,
  INDEX `fk_input_cutting`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1443576 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_juwita
-- ----------------------------
DROP TABLE IF EXISTS `input_juwita`;
CREATE TABLE `input_juwita`  (
  `id_input_juwita` int NOT NULL AUTO_INCREMENT,
  `id_cutting_detail` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_juwita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for input_molding
-- ----------------------------
DROP TABLE IF EXISTS `input_molding`;
CREATE TABLE `input_molding`  (
  `id_input_molding` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_molding`) USING BTREE,
  INDEX `fk_input_molding`(`orc` ASC, `style` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1320736 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_molding_addon
-- ----------------------------
DROP TABLE IF EXISTS `input_molding_addon`;
CREATE TABLE `input_molding_addon`  (
  `id_input_molding` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_molding`) USING BTREE,
  INDEX `fk_input_molding`(`orc` ASC, `style` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 764985 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_molding_detail
-- ----------------------------
DROP TABLE IF EXISTS `input_molding_detail`;
CREATE TABLE `input_molding_detail`  (
  `id_input_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_input_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `outermold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `mildmold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `linningmold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `outermold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `totalmold_sam` decimal(6, 3) GENERATED ALWAYS AS (((`outermold_sam` + `mildmold_sam`) + `linningmold_sam`)) VIRTUAL NULL,
  PRIMARY KEY (`id_input_molding_detail`) USING BTREE,
  UNIQUE INDEX `fk_input_mold`(`id_input_molding` ASC) USING BTREE,
  UNIQUE INDEX `idx_outermold_barcode`(`outermold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `idx_midmold_barcode`(`midmold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `idx_linningmold_barcode`(`linningmold_barcode` ASC) USING BTREE,
  CONSTRAINT `fk_input_mold` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1304619 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_molding_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `input_molding_detail_addon`;
CREATE TABLE `input_molding_detail_addon`  (
  `id_input_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_input_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `outermold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `mildmold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `linningmold_sam` decimal(4, 3) NOT NULL DEFAULT 0.000,
  `outermold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `totalmold_sam` decimal(6, 3) GENERATED ALWAYS AS (((`outermold_sam` + `mildmold_sam`) + `linningmold_sam`)) VIRTUAL NULL,
  PRIMARY KEY (`id_input_molding_detail`) USING BTREE,
  UNIQUE INDEX `fk_input_mold`(`id_input_molding` ASC) USING BTREE,
  UNIQUE INDEX `idx_outermold_barcode`(`outermold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `idx_midmold_barcode`(`midmold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `idx_linningmold_barcode`(`linningmold_barcode` ASC) USING BTREE,
  CONSTRAINT `input_molding_detail_addon_ibfk_1` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding_addon` (`id_input_molding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 749104 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_packing
-- ----------------------------
DROP TABLE IF EXISTS `input_packing`;
CREATE TABLE `input_packing`  (
  `id_input_packing` int NOT NULL AUTO_INCREMENT,
  `kode_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `actual_qty` smallint NULL DEFAULT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_packing`) USING BTREE,
  UNIQUE INDEX `idx_kode_barcode`(`kode_barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2227300 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for input_packing_addon
-- ----------------------------
DROP TABLE IF EXISTS `input_packing_addon`;
CREATE TABLE `input_packing_addon`  (
  `id_input_packing` int NOT NULL AUTO_INCREMENT,
  `kode_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `actual_qty` smallint NULL DEFAULT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_packing`) USING BTREE,
  UNIQUE INDEX `idx_kode_barcode`(`kode_barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1517331 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for input_padprint
-- ----------------------------
DROP TABLE IF EXISTS `input_padprint`;
CREATE TABLE `input_padprint`  (
  `id_input_padprint` int NOT NULL AUTO_INCREMENT,
  `worktype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_machine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ink_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_padprint`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8675 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_recut_cutting
-- ----------------------------
DROP TABLE IF EXISTS `input_recut_cutting`;
CREATE TABLE `input_recut_cutting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_recut_sewing_main` int NULL DEFAULT NULL,
  `input_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6643 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for input_sewing
-- ----------------------------
DROP TABLE IF EXISTS `input_sewing`;
CREATE TABLE `input_sewing`  (
  `id_input_sewing` int NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `created_time` time NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(4, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(23) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `to_packing` bit(1) NULL DEFAULT NULL,
  `packed_date` date NULL DEFAULT NULL,
  `outputed` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_input_sewing`) USING BTREE,
  UNIQUE INDEX `id_input_sewing`(`id_input_sewing` ASC) USING BTREE,
  UNIQUE INDEX `idx_inputsewing_barcode`(`kode_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_input_sewing2`(`orc` ASC, `kode_barcode` ASC) USING BTREE,
  INDEX `fk_input`(`tgl` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2197188 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_sewing_addon
-- ----------------------------
DROP TABLE IF EXISTS `input_sewing_addon`;
CREATE TABLE `input_sewing_addon`  (
  `id_input_sewing` int NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(4, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `to_packing` bit(1) NULL DEFAULT NULL,
  `packed_date` date NULL DEFAULT NULL,
  `outputed` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_input_sewing`) USING BTREE,
  UNIQUE INDEX `id_input_sewing`(`id_input_sewing` ASC) USING BTREE,
  UNIQUE INDEX `idx_inputsewing_barcode`(`kode_barcode` ASC) USING BTREE,
  UNIQUE INDEX `fk_input_sewing2`(`orc` ASC, `kode_barcode` ASC) USING BTREE,
  INDEX `fk_input`(`tgl` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1429910 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_skp
-- ----------------------------
DROP TABLE IF EXISTS `input_skp`;
CREATE TABLE `input_skp`  (
  `id_input_skp` int NOT NULL AUTO_INCREMENT,
  `id_cutting_detail` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `skp_barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_skp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for input_strap
-- ----------------------------
DROP TABLE IF EXISTS `input_strap`;
CREATE TABLE `input_strap`  (
  `id_input_strap` int NOT NULL AUTO_INCREMENT,
  `worktype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_machine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `strap_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `garment_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_strap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6233 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for input_strap_size
-- ----------------------------
DROP TABLE IF EXISTS `input_strap_size`;
CREATE TABLE `input_strap_size`  (
  `id_input_strap` int NOT NULL AUTO_INCREMENT,
  `worktype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `strap_size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_input_strap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6280 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for kapasitas_karton
-- ----------------------------
DROP TABLE IF EXISTS `kapasitas_karton`;
CREATE TABLE `kapasitas_karton`  (
  `id_packing_karton` int NOT NULL AUTO_INCREMENT,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kapasitas_karton` smallint NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT 1,
  PRIMARY KEY (`id_packing_karton`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36312 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for line
-- ----------------------------
DROP TABLE IF EXISTS `line`;
CREATE TABLE `line`  (
  `id_line` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shift` smallint NULL DEFAULT NULL,
  `operators` int NULL DEFAULT NULL,
  `head` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idFactory` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_spv` int NULL DEFAULT NULL,
  `floor` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Zone` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `location` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_line`) USING BTREE,
  INDEX `fk_spv`(`id_spv` ASC) USING BTREE,
  INDEX `fk_line`(`name` ASC) USING BTREE,
  CONSTRAINT `line_ibfk_1` FOREIGN KEY (`id_spv`) REFERENCES `spv` (`id_spv`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for line2
-- ----------------------------
DROP TABLE IF EXISTS `line2`;
CREATE TABLE `line2`  (
  `id_line` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_of_line` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shift` smallint NULL DEFAULT NULL,
  `operators` int NULL DEFAULT NULL,
  `head` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_spv` int NULL DEFAULT NULL,
  `floor` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Zone` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `location` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rfid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_line`) USING BTREE,
  INDEX `fk_spv`(`id_spv` ASC) USING BTREE,
  CONSTRAINT `line2_ibfk_1` FOREIGN KEY (`id_spv`) REFERENCES `spv` (`id_spv`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 108 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for linningmold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `linningmold_input_molding`;
CREATE TABLE `linningmold_input_molding`  (
  `id_lining_input_molding` int NOT NULL AUTO_INCREMENT,
  `id_input_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_lining_input_molding`) USING BTREE,
  INDEX `fk_input_molding_linning`(`id_input_molding` ASC) USING BTREE,
  CONSTRAINT `fk_input_molding_linning` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for linningmold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `linningmold_output_molding`;
CREATE TABLE `linningmold_output_molding`  (
  `id_linning_output_molding` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_linning_output_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding` ASC) USING BTREE,
  CONSTRAINT `fk_output_mold_3` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for m_defect
-- ----------------------------
DROP TABLE IF EXISTS `m_defect`;
CREATE TABLE `m_defect`  (
  `DCode` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Defect` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Category` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DCode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for machine_breakdown
-- ----------------------------
DROP TABLE IF EXISTS `machine_breakdown`;
CREATE TABLE `machine_breakdown`  (
  `id_machine_breakdown` int NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NULL DEFAULT NULL,
  `barcode_machine` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_brand` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_sn` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_sympton` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sympton` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_waiting` time NULL DEFAULT NULL,
  `end_waiting` time NULL DEFAULT NULL,
  `date_start_waiting` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end_waiting` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_machine_breakdown`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51403 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for machine_breakdown_waiting_repairing
-- ----------------------------
DROP TABLE IF EXISTS `machine_breakdown_waiting_repairing`;
CREATE TABLE `machine_breakdown_waiting_repairing`  (
  `id_machine_breakdown` int NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `barcode_machine` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_brand` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `machine_sn` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_sympton` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sympton` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_waiting` time NULL DEFAULT NULL,
  `end_waiting` time NULL DEFAULT NULL,
  PRIMARY KEY (`id_machine_breakdown`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 760 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for machine_settled
-- ----------------------------
DROP TABLE IF EXISTS `machine_settled`;
CREATE TABLE `machine_settled`  (
  `id_machine_sttled` int NOT NULL AUTO_INCREMENT,
  `id_mekanik_repairing` int NULL DEFAULT NULL,
  `id_machine_breakdown` int NULL DEFAULT NULL,
  `id_mekanik_member` int NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `spv_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  `barcode_machine` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_machine_sttled`) USING BTREE,
  INDEX `fk_mechanic_breakdown`(`id_machine_breakdown` ASC) USING BTREE,
  INDEX `fk_mekanik_member`(`id_mekanik_member` ASC) USING BTREE,
  CONSTRAINT `machine_settled_ibfk_1` FOREIGN KEY (`id_machine_breakdown`) REFERENCES `machine_breakdown` (`id_machine_breakdown`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `machine_settled_ibfk_2` FOREIGN KEY (`id_mekanik_member`) REFERENCES `mekanik_member` (`id_mekanik_member`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 53970 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for machine_settlement
-- ----------------------------
DROP TABLE IF EXISTS `machine_settlement`;
CREATE TABLE `machine_settlement`  (
  `id_settlement` int NOT NULL AUTO_INCREMENT,
  `id_machine_breakdown` int NULL DEFAULT NULL,
  `id_mekanik_repairing` int NULL DEFAULT NULL,
  `settlement_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_settlement`) USING BTREE,
  INDEX `fk_machinebreakdown`(`id_machine_breakdown` ASC) USING BTREE,
  CONSTRAINT `fk_machinebreakdown` FOREIGN KEY (`id_machine_breakdown`) REFERENCES `machine_breakdown` (`id_machine_breakdown`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for masalah_mesin
-- ----------------------------
DROP TABLE IF EXISTS `masalah_mesin`;
CREATE TABLE `masalah_mesin`  (
  `id_masalah_mesin` smallint NOT NULL AUTO_INCREMENT,
  `masalah_mesin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `symptom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_masalah_mesin`) USING BTREE,
  UNIQUE INDEX `barcode_idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_color
-- ----------------------------
DROP TABLE IF EXISTS `master_color`;
CREATE TABLE `master_color`  (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `group_color` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_color`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_cutting_part
-- ----------------------------
DROP TABLE IF EXISTS `master_cutting_part`;
CREATE TABLE `master_cutting_part`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `part_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `part_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_defect_recut
-- ----------------------------
DROP TABLE IF EXISTS `master_defect_recut`;
CREATE TABLE `master_defect_recut`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `defect_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `defect_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `condition_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `condition_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `category_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `category_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `quality_type_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `quality_code_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_factory
-- ----------------------------
DROP TABLE IF EXISTS `master_factory`;
CREATE TABLE `master_factory`  (
  `idFactory` int NOT NULL AUTO_INCREMENT,
  `Factory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idFactory`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_ink_color
-- ----------------------------
DROP TABLE IF EXISTS `master_ink_color`;
CREATE TABLE `master_ink_color`  (
  `id_master_ink_color` int NOT NULL AUTO_INCREMENT,
  `ink_color` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_ink_color`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_item
-- ----------------------------
DROP TABLE IF EXISTS `master_item`;
CREATE TABLE `master_item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `item_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_item_part
-- ----------------------------
DROP TABLE IF EXISTS `master_item_part`;
CREATE TABLE `master_item_part`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_master_item` int NULL DEFAULT NULL,
  `code` int NULL DEFAULT NULL,
  `part_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_kegel
-- ----------------------------
DROP TABLE IF EXISTS `master_kegel`;
CREATE TABLE `master_kegel`  (
  `id_master_kegel` int NOT NULL AUTO_INCREMENT,
  `id_kegel_type` int NULL DEFAULT NULL,
  `diameter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shape` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_kegel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_kegel_type
-- ----------------------------
DROP TABLE IF EXISTS `master_kegel_type`;
CREATE TABLE `master_kegel_type`  (
  `id_kegel_type` int NOT NULL AUTO_INCREMENT,
  `kegel_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegel_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_mesin_molding
-- ----------------------------
DROP TABLE IF EXISTS `master_mesin_molding`;
CREATE TABLE `master_mesin_molding`  (
  `id_mesin_molding` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mesin_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 103 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_order_detail_icon
-- ----------------------------
DROP TABLE IF EXISTS `master_order_detail_icon`;
CREATE TABLE `master_order_detail_icon`  (
  `id_master_order_detail_icon` int NOT NULL AUTO_INCREMENT,
  `id_master_order_icon_main` int NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `quantity` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_order_detail_icon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_order_icon_main
-- ----------------------------
DROP TABLE IF EXISTS `master_order_icon_main`;
CREATE TABLE `master_order_icon_main`  (
  `id_master_order_icon_main` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc_date` date NULL DEFAULT NULL,
  `shippment_date` date NULL DEFAULT NULL,
  `customer_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `po_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `consignee_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `consignee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `site_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `currencies_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `quantity_ordered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `uom_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fob_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `cmt_price` float NULL DEFAULT NULL,
  `note2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `sales_order_id` int NULL DEFAULT NULL,
  `patner_id` int NULL DEFAULT NULL,
  `receiver_patner_id` int NULL DEFAULT NULL,
  `site_patner_id` int NULL DEFAULT NULL,
  `orc_type_id` int NULL DEFAULT NULL,
  `currencies_id` int NULL DEFAULT NULL,
  `item_base_id` int NULL DEFAULT NULL,
  `item_id` int NULL DEFAULT NULL,
  `item_size_id` int NULL DEFAULT NULL,
  `item_cup_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_order_icon_main`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_order_packing_details
-- ----------------------------
DROP TABLE IF EXISTS `master_order_packing_details`;
CREATE TABLE `master_order_packing_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_master_order_packing_main` int NULL DEFAULT NULL,
  `id_master_size` int NULL DEFAULT NULL,
  `carton_capacity` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2297 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_order_packing_main
-- ----------------------------
DROP TABLE IF EXISTS `master_order_packing_main`;
CREATE TABLE `master_order_packing_main`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_date` datetime NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `com` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `base_orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty_order` int NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 292 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_product
-- ----------------------------
DROP TABLE IF EXISTS `master_product`;
CREATE TABLE `master_product`  (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_product`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_quote
-- ----------------------------
DROP TABLE IF EXISTS `master_quote`;
CREATE TABLE `master_quote`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_date` datetime NULL DEFAULT NULL,
  `quote` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `active` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 185 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_role
-- ----------------------------
DROP TABLE IF EXISTS `master_role`;
CREATE TABLE `master_role`  (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_sam
-- ----------------------------
DROP TABLE IF EXISTS `master_sam`;
CREATE TABLE `master_sam`  (
  `id_master_sam` int NOT NULL AUTO_INCREMENT,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grup_size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sam_cutting` decimal(4, 3) NULL DEFAULT NULL,
  `linning_sam` decimal(4, 3) NULL DEFAULT NULL,
  `mid_sam` decimal(4, 3) NULL DEFAULT NULL,
  `outer_sam` decimal(4, 3) NULL DEFAULT NULL,
  `total_mold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `center_panel_sam` decimal(4, 3) NULL DEFAULT NULL,
  `back_wings_sam` decimal(4, 3) NULL DEFAULT NULL,
  `cups_sam` decimal(4, 3) NULL DEFAULT NULL,
  `assembly_sam` decimal(5, 3) NULL DEFAULT NULL,
  `total_sewing_sam` decimal(5, 3) NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  `style_master` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT 1,
  PRIMARY KEY (`id_master_sam`) USING BTREE,
  INDEX `idx_mastersam_style`(`style` ASC) USING BTREE,
  INDEX `idx_mastersam_color`(`color` ASC) USING BTREE,
  INDEX `idx_mastersam_groupsize`(`grup_size` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13306 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_sam_new
-- ----------------------------
DROP TABLE IF EXISTS `master_sam_new`;
CREATE TABLE `master_sam_new`  (
  `id_master_sam` int NOT NULL AUTO_INCREMENT,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sam` decimal(10, 2) NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `deleted` datetime NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_sam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 699 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_size
-- ----------------------------
DROP TABLE IF EXISTS `master_size`;
CREATE TABLE `master_size`  (
  `id_mastersize` int NOT NULL AUTO_INCREMENT,
  `group` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mastersize`) USING BTREE,
  INDEX `idx_mastersize_size`(`size` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 432 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for master_strap_size
-- ----------------------------
DROP TABLE IF EXISTS `master_strap_size`;
CREATE TABLE `master_strap_size`  (
  `id_master_strap_size` int NOT NULL AUTO_INCREMENT,
  `size` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_master_strap_size`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for mekanik_member
-- ----------------------------
DROP TABLE IF EXISTS `mekanik_member`;
CREATE TABLE `mekanik_member`  (
  `id_mekanik_member` int NOT NULL AUTO_INCREMENT,
  `NIK` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Inisial` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Bagian` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Shift` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isMachineBreakdown` tinyint(1) NULL DEFAULT 0,
  `isQuickChange` tinyint(1) NULL DEFAULT 0,
  `isMaintenance` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_mekanik_member`) USING BTREE,
  UNIQUE INDEX `barcode_idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for mekanik_repairing
-- ----------------------------
DROP TABLE IF EXISTS `mekanik_repairing`;
CREATE TABLE `mekanik_repairing`  (
  `id_mekanik_repairing` int NOT NULL AUTO_INCREMENT,
  `id_machine_breakdown` int NULL DEFAULT NULL,
  `id_mekanik_member` int NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `start_repairing` time NULL DEFAULT NULL,
  `end_repairing` time NULL DEFAULT NULL,
  `barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_start_repairing` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end_repairing` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mekanik_repairing`) USING BTREE,
  INDEX `fk_mechanic_breakdown`(`id_machine_breakdown` ASC) USING BTREE,
  INDEX `fk_mekanik_member`(`id_mekanik_member` ASC) USING BTREE,
  CONSTRAINT `fk_mechanic_breakdown` FOREIGN KEY (`id_machine_breakdown`) REFERENCES `machine_breakdown` (`id_machine_breakdown`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_mekanik_member` FOREIGN KEY (`id_mekanik_member`) REFERENCES `mekanik_member` (`id_mekanik_member`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 47849 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for mekanik_shift
-- ----------------------------
DROP TABLE IF EXISTS `mekanik_shift`;
CREATE TABLE `mekanik_shift`  (
  `id` int NOT NULL,
  `Shift` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_time` time NULL DEFAULT NULL,
  `end_time` time NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for midmold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `midmold_input_molding`;
CREATE TABLE `midmold_input_molding`  (
  `id_mid_input_molding` int NOT NULL AUTO_INCREMENT,
  `id_input_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int UNSIGNED NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mid_input_molding`) USING BTREE,
  INDEX `fk_input_molding_mid`(`id_input_molding` ASC) USING BTREE,
  CONSTRAINT `fk_input_molding_mid` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for midmold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `midmold_output_molding`;
CREATE TABLE `midmold_output_molding`  (
  `id_mid_output_molding` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mid_output_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding` ASC) USING BTREE,
  CONSTRAINT `fk_output_mold_2` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for mixed_packing_list
-- ----------------------------
DROP TABLE IF EXISTS `mixed_packing_list`;
CREATE TABLE `mixed_packing_list`  (
  `id_mixed` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `box_start` int NULL DEFAULT NULL,
  `box_end` int NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_pcs` int NULL DEFAULT NULL,
  `pcs_box` int NULL DEFAULT NULL,
  `jmlh_karton` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_mixed`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 462 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for mixed_packing_list_barcode
-- ----------------------------
DROP TABLE IF EXISTS `mixed_packing_list_barcode`;
CREATE TABLE `mixed_packing_list_barcode`  (
  `id_barcode` int NOT NULL AUTO_INCREMENT,
  `id_mixed` int NULL DEFAULT NULL,
  `box_number` int NULL DEFAULT NULL,
  `barcode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barcode`) USING BTREE,
  INDEX `id_mixed`(`id_mixed` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100000455 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mixed_size_list
-- ----------------------------
DROP TABLE IF EXISTS `mixed_size_list`;
CREATE TABLE `mixed_size_list`  (
  `id_size_detail` int NOT NULL AUTO_INCREMENT,
  `id_mixed` int NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_size_detail`) USING BTREE,
  INDEX `id_mixed_size_list`(`id_mixed` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1457 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for molding_member
-- ----------------------------
DROP TABLE IF EXISTS `molding_member`;
CREATE TABLE `molding_member`  (
  `id_molding_member` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shift` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_molding_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 188 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for operator_talapad
-- ----------------------------
DROP TABLE IF EXISTS `operator_talapad`;
CREATE TABLE `operator_talapad`  (
  `id_operator_talapad` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_operator_talapad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `tgl` datetime NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT 1,
  PRIMARY KEY (`id_order`) USING BTREE,
  UNIQUE INDEX `fk_order`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20877 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for order1
-- ----------------------------
DROP TABLE IF EXISTS `order1`;
CREATE TABLE `order1`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  UNIQUE INDEX `fk_order`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1397 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for order_addon
-- ----------------------------
DROP TABLE IF EXISTS `order_addon`;
CREATE TABLE `order_addon`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `tgl` datetime NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Jenis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `id_order_detail` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`) USING BTREE,
  INDEX `fk_order`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for order_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `order_detail_addon`;
CREATE TABLE `order_detail_addon`  (
  `id_order_detail` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 182 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order_planning_dev
-- ----------------------------
DROP TABLE IF EXISTS `order_planning_dev`;
CREATE TABLE `order_planning_dev`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style_sam` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `comm` smallint NULL DEFAULT NULL,
  `buyer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `so` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  `to_cutting` bit(1) NULL DEFAULT NULL,
  `tgl_to_cutting` date NULL DEFAULT NULL,
  `exported_date` date NULL DEFAULT NULL,
  `exported_qty` int NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `line_allocation1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_allocation3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_order`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1424 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for outermold_input_molding
-- ----------------------------
DROP TABLE IF EXISTS `outermold_input_molding`;
CREATE TABLE `outermold_input_molding`  (
  `id_outer_input_molding` int NOT NULL AUTO_INCREMENT,
  `id_input_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `kode_barcode` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_outer_input_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_input_molding` ASC) USING BTREE,
  CONSTRAINT `fk_input_molding_outer` FOREIGN KEY (`id_input_molding`) REFERENCES `input_molding` (`id_input_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for outermold_output_molding
-- ----------------------------
DROP TABLE IF EXISTS `outermold_output_molding`;
CREATE TABLE `outermold_output_molding`  (
  `id_outer_input_molding` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_pcs` int NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_outer_input_molding`) USING BTREE,
  INDEX `fk_input_molding_outer`(`id_output_molding` ASC) USING BTREE,
  CONSTRAINT `fk_output_mold_1` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_cutting
-- ----------------------------
DROP TABLE IF EXISTS `output_cutting`;
CREATE TABLE `output_cutting`  (
  `id_output_cutting` int NOT NULL AUTO_INCREMENT,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `id_cutting` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_cutting`) USING BTREE,
  INDEX `fk_cutting_output`(`id_cutting` ASC) USING BTREE,
  CONSTRAINT `fk_cutting_output` FOREIGN KEY (`id_cutting`) REFERENCES `cutting` (`id_cutting`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_cutting_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_cutting_detail`;
CREATE TABLE `output_cutting_detail`  (
  `id_output_cutting_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_cutting` int NULL DEFAULT NULL,
  `id_cutting_detail` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_cutting_detail`) USING BTREE,
  INDEX `fk_output_cutting`(`id_output_cutting` ASC) USING BTREE,
  INDEX `fk_cutting_detail`(`id_cutting_detail` ASC) USING BTREE,
  CONSTRAINT `fk_cutting_detail` FOREIGN KEY (`id_cutting_detail`) REFERENCES `cutting_detail` (`id_cutting_detail`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_output_cutting` FOREIGN KEY (`id_output_cutting`) REFERENCES `output_cutting` (`id_output_cutting`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_juwita
-- ----------------------------
DROP TABLE IF EXISTS `output_juwita`;
CREATE TABLE `output_juwita`  (
  `id_output_juwita` int NOT NULL AUTO_INCREMENT,
  `id_input_juwita` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_juwita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for output_mixed_packing_list
-- ----------------------------
DROP TABLE IF EXISTS `output_mixed_packing_list`;
CREATE TABLE `output_mixed_packing_list`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_date` datetime NULL DEFAULT NULL,
  `barcode` int NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `box_number` int NULL DEFAULT NULL,
  `id_mixed` int NULL DEFAULT NULL,
  `id_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for output_molding
-- ----------------------------
DROP TABLE IF EXISTS `output_molding`;
CREATE TABLE `output_molding`  (
  `id_output_molding` int NOT NULL AUTO_INCREMENT,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_mesin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding`) USING BTREE,
  INDEX `fk_output_mold`(`orc` ASC, `style` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1362647 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_molding_2023
-- ----------------------------
DROP TABLE IF EXISTS `output_molding_2023`;
CREATE TABLE `output_molding_2023`  (
  `id_output_molding` int NOT NULL AUTO_INCREMENT,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_mesin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding`) USING BTREE,
  INDEX `fk_output_mold`(`orc` ASC, `style` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1235167 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_molding_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_molding_addon`;
CREATE TABLE `output_molding_addon`  (
  `id_output_molding` int NOT NULL AUTO_INCREMENT,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_mesin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` datetime NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding`) USING BTREE,
  INDEX `fk_output_mold`(`orc` ASC, `style` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 821880 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_molding_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_molding_detail`;
CREATE TABLE `output_molding_detail`  (
  `id_output_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_outermold` int NULL DEFAULT NULL,
  `outermold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `outermold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_midmold` int NULL DEFAULT NULL,
  `midmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `midmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_linningmold` int NULL DEFAULT NULL,
  `linningmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `linningmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `outermold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding_detail`) USING BTREE,
  UNIQUE INDEX `fk_output_molding`(`id_output_molding` ASC) USING BTREE,
  UNIQUE INDEX `midmold_barcode_idx`(`midmold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `linningmold_barcode_idx`(`linningmold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `outermold_barcode_idx`(`outermold_barcode` ASC) USING BTREE,
  CONSTRAINT `fk_output_molding` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding` (`id_output_molding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1346360 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_molding_detail_2023
-- ----------------------------
DROP TABLE IF EXISTS `output_molding_detail_2023`;
CREATE TABLE `output_molding_detail_2023`  (
  `id_output_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_outermold` int NULL DEFAULT NULL,
  `outermold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `outermold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_midmold` int NULL DEFAULT NULL,
  `midmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `midmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_linningmold` int NULL DEFAULT NULL,
  `linningmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `linningmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `outermold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1219322 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_molding_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_molding_detail_addon`;
CREATE TABLE `output_molding_detail_addon`  (
  `id_output_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_molding` int NULL DEFAULT NULL,
  `no_bundle` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_outermold` int NULL DEFAULT NULL,
  `outermold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `outermold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_midmold` int NULL DEFAULT NULL,
  `midmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `midmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `qty_linningmold` int NULL DEFAULT NULL,
  `linningmold_sam` decimal(4, 3) NULL DEFAULT NULL,
  `linningmold_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `outermold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `midmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `linningmold_barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_molding_detail`) USING BTREE,
  UNIQUE INDEX `fk_output_molding`(`id_output_molding` ASC) USING BTREE,
  UNIQUE INDEX `outermold_barcode_idx`(`outermold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `midmold_barcode_idx`(`midmold_barcode` ASC) USING BTREE,
  UNIQUE INDEX `linningmold_barcode_idx`(`linningmold_barcode` ASC) USING BTREE,
  CONSTRAINT `output_molding_detail_addon_ibfk_1` FOREIGN KEY (`id_output_molding`) REFERENCES `output_molding_addon` (`id_output_molding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 806918 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_packing
-- ----------------------------
DROP TABLE IF EXISTS `output_packing`;
CREATE TABLE `output_packing`  (
  `id_output_packing` int NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orc` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `boxes` smallint NULL DEFAULT NULL,
  `total_actual_boxes` smallint NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing`) USING BTREE,
  UNIQUE INDEX `orc_idx`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6027 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for output_packing_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_addon`;
CREATE TABLE `output_packing_addon`  (
  `id_output_packing` int NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orc` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `boxes` smallint NULL DEFAULT NULL,
  `total_actual_boxes` smallint NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing`) USING BTREE,
  UNIQUE INDEX `orc_idx`(`orc` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5453 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for output_packing_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_detail`;
CREATE TABLE `output_packing_detail`  (
  `id_output_packing_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_packing` int NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_box` smallint NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `box_capacity` smallint NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  `packing_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_operator` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing_detail`) USING BTREE,
  INDEX `fk_output_packing1`(`id_output_packing` ASC) USING BTREE,
  CONSTRAINT `fk_output_packing1` FOREIGN KEY (`id_output_packing`) REFERENCES `output_packing` (`id_output_packing`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 778443 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_packing_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_detail_addon`;
CREATE TABLE `output_packing_detail_addon`  (
  `id_output_packing_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_packing` int NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_box` smallint NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `box_capacity` smallint NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  `packing_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_operator` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing_detail`) USING BTREE,
  INDEX `fk_output_packing1`(`id_output_packing` ASC) USING BTREE,
  CONSTRAINT `output_packing_detail_addon_ibfk_1` FOREIGN KEY (`id_output_packing`) REFERENCES `output_packing_addon` (`id_output_packing`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 711091 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_packing_detail_old
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_detail_old`;
CREATE TABLE `output_packing_detail_old`  (
  `id_output_packing_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_packing` int NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `actual_qty` smallint NULL DEFAULT NULL,
  `box_capacity` smallint NULL DEFAULT NULL,
  `actual_boxes` smallint NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  `packing_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing_detail`) USING BTREE,
  INDEX `fk_output_packing`(`id_output_packing` ASC) USING BTREE,
  CONSTRAINT `fk_output_packing` FOREIGN KEY (`id_output_packing`) REFERENCES `output_packing_old` (`id_output_packing`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12793 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_packing_detail_vf
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_detail_vf`;
CREATE TABLE `output_packing_detail_vf`  (
  `id_output_packing_detail_vf` int NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `po` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_box` smallint NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `packing_sam` decimal(4, 3) NULL DEFAULT NULL,
  `packing_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_operator` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing_detail_vf`) USING BTREE,
  UNIQUE INDEX `barcode_idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23890 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_packing_old
-- ----------------------------
DROP TABLE IF EXISTS `output_packing_old`;
CREATE TABLE `output_packing_old`  (
  `id_output_packing` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `orc` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `boxes` smallint NULL DEFAULT NULL,
  `total_actual_boxes` smallint NULL DEFAULT NULL,
  `total_qty` int NULL DEFAULT NULL,
  `total_actual_qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_packing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1308 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_padprint
-- ----------------------------
DROP TABLE IF EXISTS `output_padprint`;
CREATE TABLE `output_padprint`  (
  `id_output_padprint` int NOT NULL AUTO_INCREMENT,
  `operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_machine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ink_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `received_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_padprint`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6874 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_recut_cutting
-- ----------------------------
DROP TABLE IF EXISTS `output_recut_cutting`;
CREATE TABLE `output_recut_cutting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_recut_sewing_main` int NULL DEFAULT NULL,
  `output_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6587 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for output_sewing
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing`;
CREATE TABLE `output_sewing`  (
  `id_output_sewing` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel_op` int NULL DEFAULT NULL,
  `back_wings_op` int NULL DEFAULT NULL,
  `cups_op` int NULL DEFAULT NULL,
  `assembly_op` int NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `actual_qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing`) USING BTREE,
  UNIQUE INDEX `fk_sewing`(`id_output_sewing` ASC) USING BTREE,
  INDEX `fk_sewing2`(`line` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68113 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_sewing_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_addon`;
CREATE TABLE `output_sewing_addon`  (
  `id_output_sewing` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `line` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel_op` int NULL DEFAULT NULL,
  `back_wings_op` int NULL DEFAULT NULL,
  `cups_op` int NULL DEFAULT NULL,
  `assembly_op` int NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `actual_qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing`) USING BTREE,
  UNIQUE INDEX `fk_sewing`(`id_output_sewing` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49607 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_sewing_detail
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_detail`;
CREATE TABLE `output_sewing_detail`  (
  `id_output_sewing_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_sewing` int NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel` time NULL DEFAULT NULL,
  `tgl_cp` date NULL DEFAULT NULL,
  `back_wings` time NULL DEFAULT NULL,
  `tgl_bw` date NULL DEFAULT NULL,
  `cups` time NULL DEFAULT NULL,
  `tgl_cu` date NULL DEFAULT NULL,
  `assembly` time NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_ass` date NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `center_panel_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `back_wings_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `cups_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `assembly_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_packing_inputed` date NULL DEFAULT NULL,
  `reject` smallint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing_detail`) USING BTREE,
  INDEX `fk_output_sewing`(`id_output_sewing` ASC, `orc` ASC) USING BTREE,
  INDEX `fk_ot_sewing_2`(`tgl_ass` ASC) USING BTREE,
  CONSTRAINT `fk_output_sewing` FOREIGN KEY (`id_output_sewing`) REFERENCES `output_sewing` (`id_output_sewing`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2065778 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_sewing_detail_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_detail_addon`;
CREATE TABLE `output_sewing_detail_addon`  (
  `id_output_sewing_detail` int NOT NULL AUTO_INCREMENT,
  `id_output_sewing` int NULL DEFAULT NULL,
  `orc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_bundle` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `center_panel` time NULL DEFAULT NULL,
  `tgl_cp` date NULL DEFAULT NULL,
  `back_wings` time NULL DEFAULT NULL,
  `tgl_bw` date NULL DEFAULT NULL,
  `cups` time NULL DEFAULT NULL,
  `tgl_cu` date NULL DEFAULT NULL,
  `assembly` time NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_ass` date NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `center_panel_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `back_wings_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `cups_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `assembly_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  `kode_barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_packing_inputed` date NULL DEFAULT NULL,
  `reject` smallint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing_detail`) USING BTREE,
  INDEX `fk_output_sewing`(`id_output_sewing` ASC, `orc` ASC) USING BTREE,
  CONSTRAINT `output_sewing_detail_addon_ibfk_1` FOREIGN KEY (`id_output_sewing`) REFERENCES `output_sewing_addon` (`id_output_sewing`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1224110 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_sewing_detail_log
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_detail_log`;
CREATE TABLE `output_sewing_detail_log`  (
  `id_output_sewing_log` int NOT NULL AUTO_INCREMENT,
  `id_output_sewing_detail` int NULL DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `qty` int NULL DEFAULT NULL,
  `assembly_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing_log`, `tgl`) USING BTREE,
  INDEX `fk_output_sewing_detail`(`id_output_sewing_detail` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2566750 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_sewing_detail_log_addon
-- ----------------------------
DROP TABLE IF EXISTS `output_sewing_detail_log_addon`;
CREATE TABLE `output_sewing_detail_log_addon`  (
  `id_output_sewing_log` int NOT NULL AUTO_INCREMENT,
  `id_output_sewing_detail` int NULL DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `qty` int NULL DEFAULT NULL,
  `assembly_sam_result` decimal(6, 3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_sewing_log`, `tgl`) USING BTREE,
  INDEX `fk_output_sewing_detail`(`id_output_sewing_detail` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1596398 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_skp
-- ----------------------------
DROP TABLE IF EXISTS `output_skp`;
CREATE TABLE `output_skp`  (
  `id_output_skp` int NOT NULL AUTO_INCREMENT,
  `id_input_skp` int NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_skp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for output_strap
-- ----------------------------
DROP TABLE IF EXISTS `output_strap`;
CREATE TABLE `output_strap`  (
  `id_output_strap` int NOT NULL AUTO_INCREMENT,
  `operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_machine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `strap_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `garment_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `received_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_strap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4870 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for output_strap_size
-- ----------------------------
DROP TABLE IF EXISTS `output_strap_size`;
CREATE TABLE `output_strap_size`  (
  `id_output_strap` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `strap_size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `received_by` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_output_strap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4888 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for packing_barcode
-- ----------------------------
DROP TABLE IF EXISTS `packing_barcode`;
CREATE TABLE `packing_barcode`  (
  `id_packing_list_barcode` bigint NOT NULL AUTO_INCREMENT,
  `id_packing_list` int NULL DEFAULT NULL,
  `no_box` int NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_packing_list_barcode`) USING BTREE,
  INDEX `fk_packing_list`(`id_packing_list` ASC) USING BTREE,
  CONSTRAINT `fk_packing_list` FOREIGN KEY (`id_packing_list`) REFERENCES `packing_list` (`id_packing_list`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13149 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for packing_barcode_copy1
-- ----------------------------
DROP TABLE IF EXISTS `packing_barcode_copy1`;
CREATE TABLE `packing_barcode_copy1`  (
  `id_packing_list_barcode` bigint NOT NULL AUTO_INCREMENT,
  `id_packing_list` int NULL DEFAULT NULL,
  `no_box` int NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_packing_list_barcode`) USING BTREE,
  INDEX `fk_packing_list`(`id_packing_list` ASC) USING BTREE,
  CONSTRAINT `packing_barcode_copy1_ibfk_1` FOREIGN KEY (`id_packing_list`) REFERENCES `packing_list` (`id_packing_list`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13149 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for packing_list
-- ----------------------------
DROP TABLE IF EXISTS `packing_list`;
CREATE TABLE `packing_list`  (
  `id_packing_list` int NOT NULL AUTO_INCREMENT,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orc` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `box_capacity` smallint NULL DEFAULT NULL,
  `total_box` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id_packing_list`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for packing_member
-- ----------------------------
DROP TABLE IF EXISTS `packing_member`;
CREATE TABLE `packing_member`  (
  `id_packing_member` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jnskelamin` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_ktp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `zona_kerja` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_packing_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for packing_member_new
-- ----------------------------
DROP TABLE IF EXISTS `packing_member_new`;
CREATE TABLE `packing_member_new`  (
  `id_packing_member` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shift` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT 1,
  PRIMARY KEY (`id_packing_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 210 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for packing_output_responsibilities
-- ----------------------------
DROP TABLE IF EXISTS `packing_output_responsibilities`;
CREATE TABLE `packing_output_responsibilities`  (
  `id_packing_output_responsibilites` int NOT NULL AUTO_INCREMENT,
  `id_input_packing` int NULL DEFAULT NULL,
  `id_packing_member` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_packing_output_responsibilites`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 416985 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for packing_preparation_line
-- ----------------------------
DROP TABLE IF EXISTS `packing_preparation_line`;
CREATE TABLE `packing_preparation_line`  (
  `id_line` int NOT NULL AUTO_INCREMENT,
  `id_zone` int NULL DEFAULT NULL,
  `line` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `max_box_capacity` int NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_line`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for packing_preparation_zone
-- ----------------------------
DROP TABLE IF EXISTS `packing_preparation_zone`;
CREATE TABLE `packing_preparation_zone`  (
  `id_zone` int NOT NULL AUTO_INCREMENT,
  `zone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT 1,
  PRIMARY KEY (`id_zone`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for plan_molding
-- ----------------------------
DROP TABLE IF EXISTS `plan_molding`;
CREATE TABLE `plan_molding`  (
  `id_plan_molding` int NOT NULL AUTO_INCREMENT,
  `id_molding_member` int NULL DEFAULT NULL,
  `id_mesin_molding` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `demands` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_plan_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for plan_molding_detail
-- ----------------------------
DROP TABLE IF EXISTS `plan_molding_detail`;
CREATE TABLE `plan_molding_detail`  (
  `id_plan_molding_detail` int NOT NULL AUTO_INCREMENT,
  `id_plan_molding` int NULL DEFAULT NULL,
  `component` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kegel` int NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_plan_molding_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for planning
-- ----------------------------
DROP TABLE IF EXISTS `planning`;
CREATE TABLE `planning`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  `qty_line` int NULL DEFAULT NULL,
  `target_output_per_day` int NULL DEFAULT NULL,
  `eta_mat_date` date NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 599 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qc_endline_defect
-- ----------------------------
DROP TABLE IF EXISTS `qc_endline_defect`;
CREATE TABLE `qc_endline_defect`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_date` datetime NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_defect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty_defect` int NULL DEFAULT NULL,
  `line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3621 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qc_header
-- ----------------------------
DROP TABLE IF EXISTS `qc_header`;
CREATE TABLE `qc_header`  (
  `qc_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`qc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for qc_member
-- ----------------------------
DROP TABLE IF EXISTS `qc_member`;
CREATE TABLE `qc_member`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qc_users
-- ----------------------------
DROP TABLE IF EXISTS `qc_users`;
CREATE TABLE `qc_users`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for received_recut_sewing
-- ----------------------------
DROP TABLE IF EXISTS `received_recut_sewing`;
CREATE TABLE `received_recut_sewing`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_recut_sewing_main` int NULL DEFAULT NULL,
  `date_received` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6614 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for record_edit_manpower_sewing
-- ----------------------------
DROP TABLE IF EXISTS `record_edit_manpower_sewing`;
CREATE TABLE `record_edit_manpower_sewing`  (
  `id_record_edit_manpower_sewing` int NOT NULL AUTO_INCREMENT,
  `id_user_sda` int NULL DEFAULT NULL,
  `id_output_sewing` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_record_edit_manpower_sewing`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for recut_sewing_details
-- ----------------------------
DROP TABLE IF EXISTS `recut_sewing_details`;
CREATE TABLE `recut_sewing_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_recut_sewing_main` int NULL DEFAULT NULL,
  `sequence_number` int NULL DEFAULT NULL,
  `id_master_item_part` int NULL DEFAULT NULL,
  `other_item_part_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_master_defect_recut` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `other_defect_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11207 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for recut_sewing_main
-- ----------------------------
DROP TABLE IF EXISTS `recut_sewing_main`;
CREATE TABLE `recut_sewing_main`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_date` datetime NULL DEFAULT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_bundle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_master_item` int NULL DEFAULT NULL,
  `id_line` int NULL DEFAULT NULL,
  `status_process` int NULL DEFAULT NULL,
  `reject` int NULL DEFAULT NULL,
  `reject_date` datetime NULL DEFAULT NULL,
  `reject_remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6699 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rt_production_report
-- ----------------------------
DROP TABLE IF EXISTS `rt_production_report`;
CREATE TABLE `rt_production_report`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `plan_export` date NULL DEFAULT NULL,
  `order_qty` int NULL DEFAULT NULL,
  `in_cutting_today` int NULL DEFAULT NULL,
  `in_cutting` int NULL DEFAULT NULL,
  `out_cutting_today` int NULL DEFAULT NULL,
  `out_cutting` int NULL DEFAULT NULL,
  `wip_cutting` int NULL DEFAULT NULL,
  `balance_cutting` int NULL DEFAULT NULL,
  `in_sewing_today` int NULL DEFAULT NULL,
  `in_sewing` int NULL DEFAULT NULL,
  `out_sewing_today` int NULL DEFAULT NULL,
  `out_sewing` int NULL DEFAULT NULL,
  `wip_sewing` int NULL DEFAULT NULL,
  `balance_sewing` int NULL DEFAULT NULL,
  `in_packing_today` int NULL DEFAULT NULL,
  `in_packing` int NULL DEFAULT NULL,
  `out_packing_today` int NULL DEFAULT NULL,
  `out_packing` int NULL DEFAULT NULL,
  `wip_packing` int NULL DEFAULT NULL,
  `balance_packing` int NULL DEFAULT NULL,
  `in_fg_today` int NULL DEFAULT NULL,
  `in_fg` int NULL DEFAULT NULL,
  `out_fg_today` int NULL DEFAULT NULL,
  `out_fg` int NULL DEFAULT NULL,
  `wip_fg` int NULL DEFAULT NULL,
  `balance_fg` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `date_updated` datetime NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `buyer` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `po` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `etd` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 512 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sewing_head
-- ----------------------------
DROP TABLE IF EXISTS `sewing_head`;
CREATE TABLE `sewing_head`  (
  `id_head` int NOT NULL AUTO_INCREMENT,
  `id_ast_mgr` int NULL DEFAULT NULL,
  `head_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_head`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for shift_molding
-- ----------------------------
DROP TABLE IF EXISTS `shift_molding`;
CREATE TABLE `shift_molding`  (
  `id_shift_molding` int NOT NULL AUTO_INCREMENT,
  `day` smallint NULL DEFAULT NULL,
  `shift` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start` time NULL DEFAULT NULL,
  `end` time NULL DEFAULT NULL,
  PRIMARY KEY (`id_shift_molding`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for solid_packing_barcode
-- ----------------------------
DROP TABLE IF EXISTS `solid_packing_barcode`;
CREATE TABLE `solid_packing_barcode`  (
  `id_packing_list_barcode` int NOT NULL AUTO_INCREMENT,
  `id_packing_list` int NULL DEFAULT NULL,
  `no_box` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_packing_list_barcode`) USING BTREE,
  INDEX `fk_solid_packing_list1`(`id_packing_list` ASC) USING BTREE,
  CONSTRAINT `fk_solid_packing_list1` FOREIGN KEY (`id_packing_list`) REFERENCES `solid_packing_list` (`id_packing_list`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1815311 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for solid_packing_list
-- ----------------------------
DROP TABLE IF EXISTS `solid_packing_list`;
CREATE TABLE `solid_packing_list`  (
  `id_packing_list` int NOT NULL AUTO_INCREMENT,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `po` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` smallint NULL DEFAULT NULL,
  `box_capacity` smallint NULL DEFAULT NULL,
  `total_box` smallint NULL DEFAULT NULL,
  `id_factory` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_packing_list`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76647 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for solid_packing_list_vf
-- ----------------------------
DROP TABLE IF EXISTS `solid_packing_list_vf`;
CREATE TABLE `solid_packing_list_vf`  (
  `id_solid_packing_list_vf` int NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `po` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `carton_no` int NULL DEFAULT NULL,
  `qty_box` int NULL DEFAULT NULL,
  `barcode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_solid_packing_list_vf`) USING BTREE,
  UNIQUE INDEX `idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45654 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for spk
-- ----------------------------
DROP TABLE IF EXISTS `spk`;
CREATE TABLE `spk`  (
  `id_spk` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `spk` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `line` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `size` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `prepare_on` date NULL DEFAULT NULL,
  `status` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_spk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for spv
-- ----------------------------
DROP TABLE IF EXISTS `spv`;
CREATE TABLE `spv`  (
  `id_spv` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shift` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_spv`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 157 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for strap_qty_size
-- ----------------------------
DROP TABLE IF EXISTS `strap_qty_size`;
CREATE TABLE `strap_qty_size`  (
  `id_qty_starp` int NOT NULL AUTO_INCREMENT,
  `orc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_cutting` int NULL DEFAULT NULL,
  `id_strap_size` int NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime(6) NULL DEFAULT NULL,
  `delete` tinyint(1) NULL DEFAULT NULL,
  `date_delete` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_qty_starp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for strap_size_qty
-- ----------------------------
DROP TABLE IF EXISTS `strap_size_qty`;
CREATE TABLE `strap_size_qty`  (
  `id_strap_size_qty` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `id_strap_size` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT NULL,
  `date_deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_strap_size_qty`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2680 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for style_for_sam
-- ----------------------------
DROP TABLE IF EXISTS `style_for_sam`;
CREATE TABLE `style_for_sam`  (
  `id_style_sam` int NOT NULL AUTO_INCREMENT,
  `style` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_style_sam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for summary_output_sam_efficiency
-- ----------------------------
DROP TABLE IF EXISTS `summary_output_sam_efficiency`;
CREATE TABLE `summary_output_sam_efficiency`  (
  `style` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `line` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `assembly_op` double NULL DEFAULT NULL,
  `tgl_waiting` date NULL DEFAULT NULL,
  `qty` double NULL DEFAULT NULL,
  `tgl_sam_created` date NULL DEFAULT NULL,
  `sam` double NULL DEFAULT NULL,
  `sum_target_per_day` double NULL DEFAULT NULL,
  `difference_ass_sam_days` double NULL DEFAULT NULL,
  `target_output_formula` double NULL DEFAULT NULL,
  `target_output_per_day` double NULL DEFAULT NULL,
  `target_output_result` double NULL DEFAULT NULL,
  `efficiency` double NULL DEFAULT NULL,
  `insert_date` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for transfer_area
-- ----------------------------
DROP TABLE IF EXISTS `transfer_area`;
CREATE TABLE `transfer_area`  (
  `id_transfer_area` int NOT NULL AUTO_INCREMENT,
  `tgl_in` timestamp NULL DEFAULT NULL,
  `tgl_out` timestamp NULL DEFAULT NULL,
  `po` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `carton_no` int NULL DEFAULT NULL,
  `qty_box` int NULL DEFAULT NULL,
  `barcode` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barcode_operator` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lokasi` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_transfer_area`) USING BTREE,
  UNIQUE INDEX `idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1487152 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for transfer_area_pcs
-- ----------------------------
DROP TABLE IF EXISTS `transfer_area_pcs`;
CREATE TABLE `transfer_area_pcs`  (
  `id_transfer_area` int NOT NULL AUTO_INCREMENT,
  `tgl_in` timestamp NULL DEFAULT NULL,
  `tgl_out` timestamp NULL DEFAULT NULL,
  `po` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `style` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `carton_no` int NULL DEFAULT NULL,
  `qty_box` int NULL DEFAULT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lokasi` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_transfer_area`) USING BTREE,
  UNIQUE INDEX `idx`(`barcode` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for url_production_planning
-- ----------------------------
DROP TABLE IF EXISTS `url_production_planning`;
CREATE TABLE `url_production_planning`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  `role` tinyint NULL DEFAULT NULL,
  `idFactory` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 152 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for user_mekanik
-- ----------------------------
DROP TABLE IF EXISTS `user_mekanik`;
CREATE TABLE `user_mekanik`  (
  `id_user_mekanik` int NOT NULL AUTO_INCREMENT,
  `id_mekanik_member` int NULL DEFAULT NULL,
  `nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` smallint NULL DEFAULT NULL,
  `token` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_mekanik`) USING BTREE,
  INDEX `fk_mekanik_member_user`(`id_mekanik_member` ASC) USING BTREE,
  CONSTRAINT `fk_mekanik_member_user` FOREIGN KEY (`id_mekanik_member`) REFERENCES `mekanik_member` (`id_mekanik_member`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for user_report
-- ----------------------------
DROP TABLE IF EXISTS `user_report`;
CREATE TABLE `user_report`  (
  `U_ID` int NOT NULL AUTO_INCREMENT,
  `GROUP_ID` int NOT NULL,
  `USERNAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`U_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_talapad
-- ----------------------------
DROP TABLE IF EXISTS `user_talapad`;
CREATE TABLE `user_talapad`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for users_qc
-- ----------------------------
DROP TABLE IF EXISTS `users_qc`;
CREATE TABLE `users_qc`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `line` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `active` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- View structure for v_breackdown_machine
-- ----------------------------
DROP VIEW IF EXISTS `v_breackdown_machine`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_breackdown_machine` AS select monthname(`machine_breakdown`.`date_start_waiting`) AS `bulan`,`mekanik_member`.`id_mekanik_member` AS `id_mekanik_member`,`user_mekanik`.`id_user_mekanik` AS `id_user_mekanik`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,cast(`machine_breakdown`.`date_start_waiting` as date) AS `tgl_waiting`,`machine_breakdown`.`date_start_waiting` AS `date_start_waiting`,`machine_breakdown`.`date_end_waiting` AS `date_end_waiting`,cast(`machine_settled`.`date` as time) AS `end_repairing`,cast(`machine_breakdown`.`date_start_waiting` as time) AS `start_waiting`,cast(`mekanik_repairing`.`date_start_repairing` as time) AS `start_repairing`,timediff(`mekanik_repairing`.`date_start_repairing`,`machine_breakdown`.`date_start_waiting`) AS `respon_duration`,timediff(`machine_settled`.`date`,`machine_breakdown`.`date_end_waiting`) AS `repair_duration`,`machine_settled`.`status` AS `status`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_settled`.`catatan` AS `catatan`,`machine_settled`.`line` AS `line`,`line`.`floor` AS `floor`,(to_days(cast(`machine_breakdown`.`date_end_waiting` as date)) - to_days(cast(`machine_breakdown`.`date_start_waiting` as date))) AS `date_waiting`,(to_days(cast(`machine_settled`.`date` as date)) - to_days(cast(`machine_breakdown`.`date_end_waiting` as date))) AS `date_repairing`,`machine_breakdown`.`barcode_machine` AS `barcode_machine` from (((((`mekanik_member` join `user_mekanik` on((`user_mekanik`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `machine_settled` on((`machine_settled`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `machine_breakdown` on((`machine_settled`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`))) left join `line` on((`line`.`name` = `machine_settled`.`line`))) join `mekanik_repairing` on(((`mekanik_repairing`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`) and (`mekanik_repairing`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`)))) where (((to_days(cast(`machine_breakdown`.`date_end_waiting` as date)) - to_days(cast(`machine_breakdown`.`date_start_waiting` as date))) = 0) and ((to_days(cast(`machine_settled`.`date` as date)) - to_days(cast(`machine_breakdown`.`date_end_waiting` as date))) = 0) and (timediff(`machine_settled`.`date`,`machine_breakdown`.`date_end_waiting`) >= '00:01:00')) order by cast(`machine_breakdown`.`date_start_waiting` as date) desc;

-- ----------------------------
-- View structure for v_input_sewing_hourly
-- ----------------------------
DROP VIEW IF EXISTS `v_input_sewing_hourly`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_input_sewing_hourly` AS select `input_sewing`.`line` AS `line`,`input_sewing`.`tgl` AS `tgl`,(((`input_sewing`.`center_panel_sam` + `input_sewing`.`back_wings_sam`) + `input_sewing`.`cups_sam`) + `input_sewing`.`assembly_sam`) AS `SAM` from `input_sewing` order by `input_sewing`.`tgl` desc;

-- ----------------------------
-- View structure for v_molding_orc
-- ----------------------------
DROP VIEW IF EXISTS `v_molding_orc`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_molding_orc` AS select dayname(`output_molding`.`tgl`) AS `day`,date_format(`output_molding`.`tgl`,'%Y-%m-%d') AS `tgl`,`output_molding`.`shift` AS `shift`,`order`.`buyer` AS `buyer`,`output_molding`.`orc` AS `orc`,`output_molding`.`style` AS `style`,`output_molding`.`color` AS `color`,`order`.`qty` AS `qty`,`output_molding_detail`.`size` AS `size`,`order`.`line_allocation1` AS `line_allocation1`,sum(`output_molding_detail`.`qty_outermold`) AS `qty_outermold`,sum(`output_molding_detail`.`qty_midmold`) AS `qty_midmold`,sum(`output_molding_detail`.`qty_linningmold`) AS `qty_linning`,(case when ((sum(`output_molding_detail`.`qty_linningmold`) is null) and (sum(`output_molding_detail`.`qty_midmold`) is null)) then sum(`output_molding_detail`.`qty_outermold`) when ((sum(`output_molding_detail`.`qty_midmold`) is null) and (sum(`output_molding_detail`.`qty_outermold`) is null)) then sum(`output_molding_detail`.`qty_linningmold`) when ((sum(`output_molding_detail`.`qty_outermold`) is null) and (sum(`output_molding_detail`.`qty_linningmold`) is null)) then sum(`output_molding_detail`.`qty_midmold`) when (sum(`output_molding_detail`.`qty_linningmold`) is null) then least(sum(`output_molding_detail`.`qty_midmold`),sum(`output_molding_detail`.`qty_outermold`)) when (sum(`output_molding_detail`.`qty_midmold`) is null) then least(sum(`output_molding_detail`.`qty_linningmold`),sum(`output_molding_detail`.`qty_outermold`)) when (sum(`output_molding_detail`.`qty_outermold`) is null) then least(sum(`output_molding_detail`.`qty_linningmold`),sum(`output_molding_detail`.`qty_midmold`)) end) AS `qty_mold`,`order`.`etd` AS `etd`,`order`.`plan_export` AS `plan_export`,sum(`output_molding_detail`.`outermold_sam_result`) AS `outer_result`,sum(`output_molding_detail`.`midmold_sam_result`) AS `midmold_result`,sum(`output_molding_detail`.`linningmold_sam_result`) AS `linning_result` from ((`output_molding` join `output_molding_detail` on((`output_molding_detail`.`id_output_molding` = `output_molding`.`id_output_molding`))) left join `order` on((`order`.`orc` = `output_molding`.`orc`))) group by date_format(`output_molding`.`tgl`,'%Y-%m-%d'),`output_molding`.`orc`,`output_molding_detail`.`size`,`output_molding`.`shift`;

-- ----------------------------
-- View structure for v_orc_sewing
-- ----------------------------
DROP VIEW IF EXISTS `v_orc_sewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_orc_sewing` AS select `output_sewing`.`line` AS `line`,`output_sewing_detail`.`orc` AS `orc`,sum(`output_sewing_detail`.`qty`) AS `out_sewing`,sum(if((`output_sewing_detail`.`assembly` = '00:00:00'),0,`output_sewing_detail`.`qty`)) AS `qty_sewing`,`output_sewing_detail`.`tgl_ass` AS `tgl_ass`,`input_sewing`.`size` AS `size`,`data_remarks`.`tanggal` AS `tanggal`,`data_remarks`.`name_remarks` AS `name_remarks`,`data_remarks`.`line` AS `line_in` from (((`output_sewing` join `output_sewing_detail` on((`output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing`))) left join `input_sewing` on((`input_sewing`.`kode_barcode` = `output_sewing_detail`.`kode_barcode`))) left join `data_remarks` on(((`data_remarks`.`line` = `output_sewing`.`line`) and (`data_remarks`.`tanggal` = `output_sewing_detail`.`tgl_ass`)))) group by `output_sewing_detail`.`tgl_ass`,`output_sewing`.`line`,`output_sewing_detail`.`orc`,`input_sewing`.`size`;

-- ----------------------------
-- View structure for v_output_sewing_hourly
-- ----------------------------
DROP VIEW IF EXISTS `v_output_sewing_hourly`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_output_sewing_hourly` AS select `osew`.`line` AS `line`,`osew`.`tgl` AS `tgl`,`osew`.`assembly_op` AS `OP` from `output_sewing` `osew` group by `osew`.`line`,`osew`.`tgl` order by `osew`.`tgl` desc;

-- ----------------------------
-- View structure for v_output_sewing_hourly2
-- ----------------------------
DROP VIEW IF EXISTS `v_output_sewing_hourly2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_output_sewing_hourly2` AS select `osew`.`line` AS `line`,`osew`.`tgl` AS `tgl`,`osew`.`assembly_op` AS `assembly_op` from `output_sewing` `osew` group by `osew`.`line`,`osew`.`tgl` order by `osew`.`tgl` desc;

-- ----------------------------
-- View structure for v_output_sewing_hourly_OLD
-- ----------------------------
DROP VIEW IF EXISTS `v_output_sewing_hourly_OLD`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_output_sewing_hourly_OLD` AS select `osew`.`line` AS `line`,`osew`.`tgl` AS `tgl`,sum((((`osew`.`center_panel_op` + `osew`.`back_wings_op`) + `osew`.`cups_op`) + `osew`.`assembly_op`)) AS `OP` from `output_sewing` `osew` group by `osew`.`line`,`osew`.`tgl` order by `osew`.`tgl` desc;

-- ----------------------------
-- View structure for v_plan
-- ----------------------------
DROP VIEW IF EXISTS `v_plan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_plan` AS select `order`.`line_allocation1` AS `line_allocation1`,`order`.`orc` AS `orc`,`order`.`style` AS `style`,`order`.`buyer` AS `buyer`,`order`.`etd` AS `etd`,`order`.`qty` AS `qty`,coalesce(sum(`output_sewing_detail`.`qty`),0) AS `qty_sewing`,(`order`.`qty` - coalesce(sum(`output_sewing_detail`.`qty`),0)) AS `BAL_SEW`,`v_sam`.`SAM` AS `SAM`,`order`.`exported_date` AS `exported_date` from ((`order` left join `output_sewing_detail` on((`order`.`orc` = `output_sewing_detail`.`orc`))) join `v_sam` on((`order`.`style` = `v_sam`.`style`))) where (`order`.`exported_date` is null) group by `order`.`line_allocation1`,`order`.`orc` order by `order`.`etd`;

-- ----------------------------
-- View structure for v_plan_dev
-- ----------------------------
DROP VIEW IF EXISTS `v_plan_dev`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_plan_dev` AS select `order_planning_dev`.`line_allocation1` AS `line_allocation1`,`order_planning_dev`.`orc` AS `orc`,`order_planning_dev`.`id_order` AS `id_order`,`order_planning_dev`.`style` AS `style`,`order_planning_dev`.`buyer` AS `buyer`,`order_planning_dev`.`etd` AS `etd`,`order_planning_dev`.`qty` AS `qty`,`order_planning_dev`.`color_code` AS `color_code`,coalesce(sum(`output_sewing_detail`.`qty`),0) AS `qty_sewing`,(`order_planning_dev`.`qty` - coalesce(sum(`output_sewing_detail`.`qty`),0)) AS `BAL_SEW`,`v_sam`.`SAM` AS `SAM`,`order_planning_dev`.`exported_date` AS `exported_date` from ((`order_planning_dev` left join `output_sewing_detail` on((`order_planning_dev`.`orc` = `output_sewing_detail`.`orc`))) join `v_sam` on((`order_planning_dev`.`style` = `v_sam`.`style`))) where (`order_planning_dev`.`exported_date` is null) group by `order_planning_dev`.`orc`;

-- ----------------------------
-- View structure for v_sam
-- ----------------------------
DROP VIEW IF EXISTS `v_sam`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_sam` AS select `master_sam`.`style` AS `style`,round(avg(`master_sam`.`total_sewing_sam`),2) AS `SAM` from `master_sam` group by `master_sam`.`style`;

-- ----------------------------
-- View structure for viewWipCuttingOrc
-- ----------------------------
DROP VIEW IF EXISTS `viewWipCuttingOrc`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewWipCuttingOrc` AS select `input_cutting`.`orc` AS `orc`,`input_cutting`.`style` AS `style`,`input_cutting`.`color` AS `color`,`input_cutting`.`size` AS `size`,`input_cutting`.`tgl` AS `tgl`,`order`.`qty` AS `order`,`order`.`etd` AS `etd`,`order`.`exported_date` AS `exported_date`,`order`.`buyer` AS `buyer`,`order`.`status` AS `status`,if((`order`.`exported_date` is null),(`order`.`qty` - sum(`input_cutting`.`qty_pcs`)),0) AS `balance_order_ex`,sum(`input_cutting`.`qty_pcs`) AS `in_cutting`,sum(`input_sewing`.`qty_pcs`) AS `in_sewing`,if((`order`.`exported_date` is null),(sum(`input_cutting`.`qty_pcs`) - coalesce(sum(`input_sewing`.`qty_pcs`),0)),0) AS `balance_cutting_ex`,`order`.`plan_export` AS `plan_export`,`order`.`so` AS `so` from ((`input_cutting` left join `order` on((`order`.`orc` = `input_cutting`.`orc`))) left join `input_sewing` on((`input_sewing`.`kode_barcode` = `input_cutting`.`kode_barcode`))) where (`order`.`status` = 'On Progress') group by `input_cutting`.`orc`;

-- ----------------------------
-- View structure for view_molding_shift
-- ----------------------------
DROP VIEW IF EXISTS `view_molding_shift`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_molding_shift` AS select `v_molding_orc`.`tgl` AS `tgl`,`v_molding_orc`.`shift` AS `shift`,sum(`v_molding_orc`.`qty_outermold`) AS `qty_outermold`,sum(`v_molding_orc`.`qty_midmold`) AS `qty_midmold`,sum(`v_molding_orc`.`qty_linning`) AS `qty_linning` from `v_molding_orc` where (`v_molding_orc`.`shift` <> 'A PHP Error') group by `v_molding_orc`.`tgl`,`v_molding_orc`.`shift`;

-- ----------------------------
-- View structure for viewcutting
-- ----------------------------
DROP VIEW IF EXISTS `viewcutting`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcutting` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`comm` AS `comm`,`cutting`.`qty` AS `qty`,`cutting_detail`.`id_cutting_detail` AS `id_cutting_detail`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`qty_pcs` AS `qty_pcs`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`kode_barcode` AS `kode_barcode`,`cutting_detail`.`outermold_barcode` AS `outermold_barcode`,`cutting_detail`.`midmold_barcode` AS `midmold_barcode`,`cutting_detail`.`linningmold_barcode` AS `linningmold_barcode`,`cutting_detail`.`skp_barcode` AS `skp_barcode` from (`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`)));

-- ----------------------------
-- View structure for viewcutting_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewcutting_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcutting_addon` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`comm` AS `comm`,`cutting`.`qty` AS `qty`,`cutting_detail`.`id_cutting_detail` AS `id_cutting_detail`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`qty_pcs` AS `qty_pcs`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`kode_barcode` AS `kode_barcode`,`cutting_detail`.`outermold_barcode` AS `outermold_barcode`,`cutting_detail`.`midmold_barcode` AS `midmold_barcode`,`cutting_detail`.`linningmold_barcode` AS `linningmold_barcode` from (`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`)));

-- ----------------------------
-- View structure for viewcuttingdone
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingdone`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingdone` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`buyer` AS `buyer`,`cutting`.`comm` AS `comm`,`cutting`.`so` AS `so`,`cutting`.`qty` AS `qty`,`cutting`.`boxes` AS `boxes`,`cutting`.`prepare_on` AS `prepare_on`,`cutting_detail`.`id_cutting_detail` AS `id_cutting_detail`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`qty` AS `qty_detail`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`kode_barcode` AS `kode_barcode`,`cutting_detail`.`cutting_date` AS `cutting_date`,`cutting_detail`.`printed_date` AS `printed_date`,`cutting_detail`.`qty_pcs` AS `qty_pcs`,`cutting_detail`.`packed` AS `packed`,`cutting_detail`.`panty_barcode` AS `panty_barcode`,`cutting_detail`.`juwita_barcode` AS `juwita_barcode`,`cutting_detail`.`skp_barcode` AS `skp_barcode`,`cutting`.`spk` AS `spk` from (`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`)));

-- ----------------------------
-- View structure for viewcuttingdone_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingdone_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingdone_addon` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`buyer` AS `buyer`,`cutting`.`comm` AS `comm`,`cutting`.`so` AS `so`,`cutting`.`qty` AS `qty`,`cutting`.`boxes` AS `boxes`,`cutting`.`prepare_on` AS `prepare_on`,`cutting_detail`.`id_cutting_detail` AS `id_cutting_detail`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`qty` AS `qty_detail`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`kode_barcode` AS `kode_barcode`,`cutting_detail`.`cutting_date` AS `cutting_date`,`cutting_detail`.`printed_date` AS `printed_date`,`cutting_detail`.`qty_pcs` AS `qty_pcs`,`cutting_detail`.`packed` AS `packed`,`cutting_detail`.`panty_barcode` AS `panty_barcode`,`order`.`Jenis` AS `jenis`,`master_product`.`product_code` AS `product_code` from (((`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`))) join `order` on((`order`.`orc` = `cutting`.`orc`))) join `master_product` on((`order`.`Jenis` = `master_product`.`product_name`)));

-- ----------------------------
-- View structure for viewcuttingwithmold
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingwithmold`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingwithmold` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`buyer` AS `buyer`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`outermold_barcode` AS `outermold_barcode`,`cutting_detail`.`midmold_barcode` AS `midmold_barcode`,`cutting_detail`.`linningmold_barcode` AS `linningmold_barcode`,`cutting_detail`.`qty_pcs` AS `qty_pcs` from (`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`))) where ((`cutting_detail`.`outermold_barcode` <> '') or (`cutting_detail`.`midmold_barcode` <> '') or (`cutting_detail`.`linningmold_barcode` <> ''));

-- ----------------------------
-- View structure for viewcuttingwithmold_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewcuttingwithmold_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewcuttingwithmold_addon` AS select `cutting`.`id_cutting` AS `id_cutting`,`cutting`.`orc` AS `orc`,`cutting`.`style` AS `style`,`cutting`.`color` AS `color`,`cutting`.`buyer` AS `buyer`,`cutting_detail`.`size` AS `size`,`cutting_detail`.`no_bundle` AS `no_bundle`,`cutting_detail`.`outermold_barcode` AS `outermold_barcode`,`cutting_detail`.`midmold_barcode` AS `midmold_barcode`,`cutting_detail`.`linningmold_barcode` AS `linningmold_barcode`,`cutting_detail`.`qty_pcs` AS `qty_pcs` from (`cutting` join `cutting_detail` on((`cutting_detail`.`id_cutting` = `cutting`.`id_cutting`))) where ((`cutting_detail`.`outermold_barcode` <> '') or (`cutting_detail`.`midmold_barcode` <> '') or (`cutting_detail`.`linningmold_barcode` <> ''));

-- ----------------------------
-- View structure for viewdefectdetail
-- ----------------------------
DROP VIEW IF EXISTS `viewdefectdetail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewdefectdetail` AS select `dt_defect_rate_detail`.`id_defect_detail` AS `Id`,`defect_rate`.`line` AS `Line`,week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) AS `Weeks`,`dt_defect_rate_detail`.`barcode` AS `Barcode`,coalesce(`dt_defect_rate_detail`.`no_garment`,'Sub Total') AS `No_Garment`,count(distinct `dt_defect_rate_detail`.`no_garment`) AS `garment_reject`,`dt_defect2`.`DCode` AS `Defect_Kode`,`dt_defect2`.`Defect` AS `Defect_Desc` from ((`defect_rate` join `dt_defect_rate_detail` on((`defect_rate`.`id_defect` = `dt_defect_rate_detail`.`id_defect`))) join `dt_defect2` on((`dt_defect2`.`DCode` = `dt_defect_rate_detail`.`defect`))) group by `dt_defect_rate_detail`.`barcode`,`dt_defect_rate_detail`.`no_garment` with rollup;

-- ----------------------------
-- View structure for viewdefectsperline
-- ----------------------------
DROP VIEW IF EXISTS `viewdefectsperline`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewdefectsperline` AS select week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) AS `Weeks`,`defect_rate`.`line` AS `Line`,`dt_defect2`.`DCode` AS `Defect_Code`,`dt_defect2`.`Defect` AS `Defect_Category`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 2) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `SENIN_DEFECT`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 3) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `SELASA_DEFECT`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 4) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `RABU_DEFECT`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 5) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `KAMIS_DEFECT`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 6) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `JUMAT_DEFECT`,if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 7) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) AS `SABTU_DEFECT`,(((((if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 2) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0) + if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 3) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0)) + if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 4) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0)) + if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 5) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0)) + if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 6) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0)) + if(((dayofweek(cast(`dt_defect_rate_detail`.`defect_datetime` as date)) = 7) and (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)),count(`dt_defect_rate_detail`.`defect`),0)) AS `TOTAL_DEFECT` from ((`dt_defect2` left join `dt_defect_rate_detail` on((0 <> `dt_defect_rate_detail`.`defect`))) left join `defect_rate` on((`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`))) group by week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0),`defect_rate`.`line`,`dt_defect_rate_detail`.`defect`,cast(`dt_defect_rate_detail`.`defect_datetime` as date),`dt_defect2`.`DCode`;

-- ----------------------------
-- View structure for viewgarmentsreject
-- ----------------------------
DROP VIEW IF EXISTS `viewgarmentsreject`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewgarmentsreject` AS select week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) AS `WEEKS`,`defect_rate`.`line` AS `Line`,`defect_rate`.`orc` AS `ORC`,`defect_rate`.`style` AS `STYLE`,`defect_rate`.`color` AS `COLOR`,`defect_rate`.`idx_no_garment` AS `CHECKS`,(select count(distinct `dt_defect_rate_detail`.`no_garment`) from `dt_defect_rate_detail` where (`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`)) AS `REJECTS` from (`defect_rate` join `dt_defect_rate_detail` on((`defect_rate`.`id_defect` = `dt_defect_rate_detail`.`id_defect`))) group by `defect_rate`.`id_defect`,week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) order by `defect_rate`.`line`;

-- ----------------------------
-- View structure for viewinputmolding1
-- ----------------------------
DROP VIEW IF EXISTS `viewinputmolding1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewinputmolding1` AS select `input_molding`.`id_input_molding` AS `id_input_molding`,`input_molding`.`tgl` AS `tgl`,`input_molding`.`orc` AS `orc`,`input_molding`.`style` AS `style`,`input_molding`.`color` AS `color`,`input_molding_detail`.`size` AS `size`,`input_molding_detail`.`group_size` AS `group_size`,`input_molding_detail`.`no_bundle` AS `no_bundle`,`input_molding_detail`.`qty_pcs` AS `qty_pcs`,`input_molding_detail`.`outermold_barcode` AS `outer`,`input_molding_detail`.`midmold_barcode` AS `mid`,`input_molding_detail`.`linningmold_barcode` AS `linning`,`input_molding_detail`.`outermold_sam` AS `outermold_sam`,`input_molding_detail`.`mildmold_sam` AS `mildmold_sam`,`input_molding_detail`.`linningmold_sam` AS `linningmold_sam` from ((`input_molding` join `input_molding_detail` on((`input_molding_detail`.`id_input_molding` = `input_molding`.`id_input_molding`))) join `order` on((`order`.`orc` = `input_molding`.`orc`))) where (`order`.`id_factory` = 1);

-- ----------------------------
-- View structure for viewinputmolding1_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewinputmolding1_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewinputmolding1_addon` AS select `input_molding`.`id_input_molding` AS `id_input_molding`,`input_molding`.`tgl` AS `tgl`,`input_molding`.`orc` AS `orc`,`input_molding`.`style` AS `style`,`input_molding`.`color` AS `color`,`input_molding_detail`.`size` AS `size`,`input_molding_detail`.`group_size` AS `group_size`,`input_molding_detail`.`no_bundle` AS `no_bundle`,`input_molding_detail`.`qty_pcs` AS `qty_pcs`,`input_molding_detail`.`outermold_barcode` AS `outer`,`input_molding_detail`.`midmold_barcode` AS `mid`,`input_molding_detail`.`linningmold_barcode` AS `linning`,`input_molding_detail`.`outermold_sam` AS `outermold_sam`,`input_molding_detail`.`mildmold_sam` AS `mildmold_sam`,`input_molding_detail`.`linningmold_sam` AS `linningmold_sam` from (`input_molding` join `input_molding_detail` on((`input_molding_detail`.`id_input_molding` = `input_molding`.`id_input_molding`)));

-- ----------------------------
-- View structure for viewinputmolding2
-- ----------------------------
DROP VIEW IF EXISTS `viewinputmolding2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewinputmolding2` AS select `input_molding`.`id_input_molding` AS `id_input_molding`,`input_molding`.`tgl` AS `tgl`,`input_molding`.`orc` AS `orc`,`input_molding`.`style` AS `style`,`input_molding`.`color` AS `color`,`input_molding_detail`.`size` AS `size`,`input_molding_detail`.`group_size` AS `group_size`,`input_molding_detail`.`no_bundle` AS `no_bundle`,`input_molding_detail`.`qty_pcs` AS `qty_pcs`,`input_molding_detail`.`outermold_barcode` AS `outer`,`input_molding_detail`.`midmold_barcode` AS `mid`,`input_molding_detail`.`linningmold_barcode` AS `linning`,`input_molding_detail`.`outermold_sam` AS `outermold_sam`,`input_molding_detail`.`mildmold_sam` AS `mildmold_sam`,`input_molding_detail`.`linningmold_sam` AS `linningmold_sam` from ((`input_molding` join `input_molding_detail` on((`input_molding_detail`.`id_input_molding` = `input_molding`.`id_input_molding`))) join `order` on((`order`.`orc` = `input_molding`.`orc`))) where (`order`.`id_factory` = 2);

-- ----------------------------
-- View structure for viewlongthreaddefect
-- ----------------------------
DROP VIEW IF EXISTS `viewlongthreaddefect`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewlongthreaddefect` AS select week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) AS `WEEKS`,`defect_rate`.`line` AS `Line`,`defect_rate`.`tgl` AS `Tgl`,`defect_rate`.`idx_no_garment` AS `Checks`,count(`dt_defect_rate_detail`.`defect`) AS `COUNT_DEFECTS` from (`defect_rate` join `dt_defect_rate_detail` on((`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`))) where (`dt_defect_rate_detail`.`defect` = 'S19') group by `defect_rate`.`line`,`defect_rate`.`no_bundle`;

-- ----------------------------
-- View structure for viewmachinerepairing
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinerepairing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinerepairing` AS select `user_mekanik`.`id_user_mekanik` AS `id_user_mekanik`,`mekanik_member`.`id_mekanik_member` AS `id_mekanik_member`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,`mekanik_repairing`.`tgl` AS `tgl`,`mekanik_repairing`.`status` AS `status`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton` from (((`mekanik_member` join `user_mekanik` on((`user_mekanik`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `mekanik_repairing` on((`mekanik_repairing`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `machine_breakdown` on((`mekanik_repairing`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`))) where (`mekanik_repairing`.`status` is not null);

-- ----------------------------
-- View structure for viewmachinesbreakdown
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinesbreakdown`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinesbreakdown` AS select `machine_breakdown`.`tgl` AS `tgl_breakdown`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_breakdown`.`status` AS `status`,`machine_breakdown`.`start_waiting` AS `start_waiting`,`machine_breakdown`.`end_waiting` AS `end_waiting`,`line`.`shift` AS `shift`,`line`.`floor` AS `floor`,`line`.`name` AS `name`,`mekanik_repairing`.`id_mekanik_repairing` AS `id_mekanik_repairing`,`mekanik_repairing`.`id_mekanik_member` AS `id_mekanik_member`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,`mekanik_member`.`Inisial` AS `mekanik_inisial`,`machine_breakdown`.`id_machine_breakdown` AS `id_machine_breakdown`,`machine_breakdown`.`line` AS `line`,`machine_breakdown`.`barcode_machine` AS `barcode_machine` from (((`machine_breakdown` left join `mekanik_repairing` on((`mekanik_repairing`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`))) left join `mekanik_member` on((`mekanik_repairing`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) left join `line` on((`machine_breakdown`.`line` = `line`.`name`)));

-- ----------------------------
-- View structure for viewmachinesbreakdown1
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinesbreakdown1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinesbreakdown1` AS select `machine_breakdown`.`id_machine_breakdown` AS `id_machine_breakdown`,`line`.`name` AS `line`,`machine_breakdown`.`tgl` AS `tgl_breakdown`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_breakdown`.`status` AS `status`,`machine_breakdown`.`date_start_waiting` AS `date_start_waiting`,`machine_breakdown`.`date_end_waiting` AS `date_end_waiting`,`line`.`floor` AS `floor` from (`line` join `machine_breakdown` on((`machine_breakdown`.`line` = `line`.`name`)));

-- ----------------------------
-- View structure for viewmachinesbreakdownx
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinesbreakdownx`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinesbreakdownx` AS select `machine_breakdown`.`tgl` AS `tgl`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_breakdown`.`status` AS `status`,`machine_breakdown`.`start_waiting` AS `start_waiting`,`machine_breakdown`.`end_waiting` AS `end_waiting`,`line`.`shift` AS `shift`,`line`.`floor` AS `floor`,`line`.`name` AS `name`,`mekanik_repairing`.`id_mekanik_repairing` AS `id_mekanik_repairing`,`mekanik_repairing`.`id_mekanik_member` AS `id_mekanik_member`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,`mekanik_member`.`Inisial` AS `Inisial`,`machine_breakdown`.`id_machine_breakdown` AS `id_machine_breakdown`,`machine_breakdown`.`line` AS `line` from (((`machine_breakdown` join `line` on((`machine_breakdown`.`line` = `line`.`name`))) left join `mekanik_repairing` on((`mekanik_repairing`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`))) left join `mekanik_member` on((`mekanik_repairing`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`)));

-- ----------------------------
-- View structure for viewmachinesettled
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinesettled`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinesettled` AS select `mekanik_member`.`id_mekanik_member` AS `id_mekanik_member`,`user_mekanik`.`id_user_mekanik` AS `id_user_mekanik`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,`machine_breakdown`.`date_end_waiting` AS `start_repairing`,`machine_settled`.`date` AS `date`,`machine_settled`.`status` AS `status`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_settled`.`catatan` AS `catatan` from (((`mekanik_member` join `user_mekanik` on((`user_mekanik`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `machine_settled` on((`machine_settled`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`))) join `machine_breakdown` on((`machine_settled`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`)));

-- ----------------------------
-- View structure for viewmachinesettlement
-- ----------------------------
DROP VIEW IF EXISTS `viewmachinesettlement`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewmachinesettlement` AS select `machine_settlement`.`id_settlement` AS `id_settlement`,`machine_breakdown`.`machine_type` AS `machine_type`,`machine_breakdown`.`machine_brand` AS `machine_brand`,`machine_breakdown`.`type` AS `type`,`machine_breakdown`.`machine_sn` AS `machine_sn`,`machine_breakdown`.`sympton` AS `sympton`,`machine_settlement`.`settlement_date` AS `settlement_date` from (`machine_breakdown` join `machine_settlement` on((`machine_settlement`.`id_machine_breakdown` = `machine_breakdown`.`id_machine_breakdown`)));

-- ----------------------------
-- View structure for vieworder
-- ----------------------------
DROP VIEW IF EXISTS `vieworder`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vieworder` AS select `order`.`id_order` AS `id_order`,`order`.`style` AS `style`,`order`.`orc` AS `orc`,`order`.`buyer` AS `buyer`,`order`.`so` AS `so`,`order`.`color` AS `color`,`order`.`qty` AS `qty`,`order`.`etd` AS `etd`,`order_detail`.`size` AS `size`,`order_detail`.`qty` AS `qty_size` from (`order` join `order_detail` on((`order_detail`.`id_order` = `order`.`id_order`)));

-- ----------------------------
-- View structure for viewoutputmolding
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputmolding`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputmolding` AS select `output_molding`.`id_output_molding` AS `id_output_molding`,`output_molding`.`shift` AS `shift`,`output_molding`.`no_mesin` AS `no_mesin`,cast(`output_molding`.`tgl` as date) AS `tgl`,`output_molding`.`orc` AS `orc`,`output_molding`.`style` AS `style`,`output_molding`.`color` AS `color`,`outermold_output_molding`.`no_bundle` AS `no_bundle_outer`,`outermold_output_molding`.`size` AS `size_outer`,`outermold_output_molding`.`qty_pcs` AS `qty_outer`,`midmold_output_molding`.`no_bundle` AS `no_bundle_mid`,`midmold_output_molding`.`size` AS `size_mid`,`midmold_output_molding`.`qty_pcs` AS `qty_mid`,`linningmold_output_molding`.`no_bundle` AS `no_bundle_linning`,`linningmold_output_molding`.`size` AS `size_linning`,`linningmold_output_molding`.`qty_pcs` AS `qty_linning` from (((`output_molding` left join `outermold_output_molding` on((`outermold_output_molding`.`id_output_molding` = `output_molding`.`id_output_molding`))) left join `midmold_output_molding` on((`midmold_output_molding`.`id_output_molding` = `output_molding`.`id_output_molding`))) left join `linningmold_output_molding` on((`linningmold_output_molding`.`id_output_molding` = `output_molding`.`id_output_molding`))) where (cast(`output_molding`.`tgl` as date) = curdate());

-- ----------------------------
-- View structure for viewoutputmolding1
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputmolding1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputmolding1` AS select `output_molding`.`id_output_molding` AS `id_output_molding`,`output_molding`.`shift` AS `shift`,`output_molding`.`no_mesin` AS `no_mesin`,`output_molding`.`tgl` AS `tgl`,cast(`output_molding`.`tgl` as date) AS `tanggal`,`output_molding`.`orc` AS `orc`,`output_molding`.`style` AS `style`,`output_molding`.`color` AS `color`,`output_molding_detail`.`size` AS `size`,`output_molding_detail`.`no_bundle` AS `no_bundle`,`output_molding_detail`.`outermold_sam_result` AS `outermold_sam_result`,`output_molding_detail`.`midmold_sam_result` AS `midmold_sam_result`,`output_molding_detail`.`linningmold_sam_result` AS `linningmold_sam_result` from (`output_molding` left join `output_molding_detail` on((`output_molding_detail`.`id_output_molding` = `output_molding`.`id_output_molding`))) where (cast(`output_molding`.`tgl` as date) = curdate());

-- ----------------------------
-- View structure for viewoutputmolding1_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputmolding1_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputmolding1_addon` AS select `output_molding`.`id_output_molding` AS `id_output_molding`,`output_molding`.`shift` AS `shift`,`output_molding`.`no_mesin` AS `no_mesin`,`output_molding`.`tgl` AS `tgl`,cast(`output_molding`.`tgl` as date) AS `tanggal`,`output_molding`.`orc` AS `orc`,`output_molding`.`style` AS `style`,`output_molding`.`color` AS `color`,`output_molding_detail`.`size` AS `size`,`output_molding_detail`.`no_bundle` AS `no_bundle`,`output_molding_detail`.`outermold_sam_result` AS `outermold_sam_result`,`output_molding_detail`.`midmold_sam_result` AS `midmold_sam_result`,`output_molding_detail`.`linningmold_sam_result` AS `linningmold_sam_result` from (`output_molding` left join `output_molding_detail` on((`output_molding_detail`.`id_output_molding` = `output_molding`.`id_output_molding`))) where (cast(`output_molding`.`tgl` as date) = curdate());

-- ----------------------------
-- View structure for viewoutputsewing
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputsewing`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputsewing` AS select `output_sewing_detail`.`id_output_sewing_detail` AS `id_output_sewing_detail`,`output_sewing`.`line` AS `line`,`output_sewing`.`tgl` AS `tgl`,`output_sewing_detail`.`orc` AS `orc`,`output_sewing_detail`.`no_bundle` AS `no_bundle`,`output_sewing_detail`.`center_panel` AS `center_panel`,`output_sewing_detail`.`back_wings` AS `back_wings`,`output_sewing_detail`.`cups` AS `cups`,`output_sewing_detail`.`assembly` AS `assembly`,`output_sewing_detail`.`size` AS `size`,`output_sewing_detail`.`qty` AS `qty`,`output_sewing_detail`.`kode_barcode` AS `kode_barcode`,`output_sewing_detail`.`tgl_ass` AS `tgl_ass` from (`output_sewing_detail` join `output_sewing` on((`output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing`)));

-- ----------------------------
-- View structure for viewoutputsewing_addon
-- ----------------------------
DROP VIEW IF EXISTS `viewoutputsewing_addon`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewoutputsewing_addon` AS select `output_sewing_detail`.`id_output_sewing_detail` AS `id_output_sewing_detail`,`output_sewing`.`line` AS `line`,`output_sewing`.`tgl` AS `tgl`,`output_sewing_detail`.`orc` AS `orc`,`output_sewing_detail`.`no_bundle` AS `no_bundle`,`output_sewing_detail`.`center_panel` AS `center_panel`,`output_sewing_detail`.`back_wings` AS `back_wings`,`output_sewing_detail`.`cups` AS `cups`,`output_sewing_detail`.`assembly` AS `assembly`,`output_sewing_detail`.`size` AS `size`,`output_sewing_detail`.`qty` AS `qty`,`output_sewing_detail`.`kode_barcode` AS `kode_barcode`,`output_sewing_detail`.`tgl_ass` AS `tgl_ass` from (`output_sewing_detail` join `output_sewing` on((`output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing`)));

-- ----------------------------
-- View structure for viewpackingbarcode
-- ----------------------------
DROP VIEW IF EXISTS `viewpackingbarcode`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewpackingbarcode` AS select `solid_packing_list`.`id_packing_list` AS `id_packing_list`,`solid_packing_list`.`orc` AS `orc`,`solid_packing_list`.`color` AS `color`,`solid_packing_list`.`style` AS `style`,`solid_packing_list`.`size` AS `size`,`solid_packing_barcode`.`no_box` AS `no_box`,`solid_packing_barcode`.`qty` AS `pcs`,`solid_packing_barcode`.`barcode` AS `barcode`,`solid_packing_list`.`qty` AS `qty`,`solid_packing_list`.`box_capacity` AS `box_capacity`,`solid_packing_list`.`total_box` AS `total_box`,`solid_packing_barcode`.`id_packing_list_barcode` AS `id_packing_list_barcode` from (`solid_packing_list` join `solid_packing_barcode` on((`solid_packing_barcode`.`id_packing_list` = `solid_packing_list`.`id_packing_list`)));

-- ----------------------------
-- View structure for viewsewingdone
-- ----------------------------
DROP VIEW IF EXISTS `viewsewingdone`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewsewingdone` AS select `output_sewing_detail`.`orc` AS `orc`,`order`.`style` AS `style`,`order`.`color` AS `color`,`output_sewing_detail`.`no_bundle` AS `no_bundle`,`output_sewing_detail`.`size` AS `size`,sum(`output_sewing_detail`.`qty`) AS `qty`,`output_sewing_detail`.`kode_barcode` AS `kode_barcode` from (`output_sewing_detail` left join `order` on((`output_sewing_detail`.`orc` = `order`.`orc`))) group by `output_sewing_detail`.`kode_barcode`;

-- ----------------------------
-- View structure for viewsoildefect
-- ----------------------------
DROP VIEW IF EXISTS `viewsoildefect`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewsoildefect` AS select week(cast(`dt_defect_rate_detail`.`defect_datetime` as date),0) AS `WEEKS`,`defect_rate`.`line` AS `Line`,`defect_rate`.`tgl` AS `Tgl`,`defect_rate`.`idx_no_garment` AS `Checks`,count(`dt_defect_rate_detail`.`defect`) AS `COUNT_DEFECTS` from (`defect_rate` join `dt_defect_rate_detail` on((`dt_defect_rate_detail`.`id_defect` = `defect_rate`.`id_defect`))) where (`dt_defect_rate_detail`.`defect` = 'S40') group by `defect_rate`.`line`,`defect_rate`.`no_bundle`;

-- ----------------------------
-- View structure for viewusermekanik
-- ----------------------------
DROP VIEW IF EXISTS `viewusermekanik`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `viewusermekanik` AS select `user_mekanik`.`id_user_mekanik` AS `id_user_mekanik`,`mekanik_member`.`NIK` AS `NIK`,`mekanik_member`.`Nama` AS `Nama`,`mekanik_member`.`Inisial` AS `Inisial`,`mekanik_member`.`Bagian` AS `Bagian`,`mekanik_member`.`Shift` AS `Shift` from (`user_mekanik` join `mekanik_member` on((`user_mekanik`.`id_mekanik_member` = `mekanik_member`.`id_mekanik_member`)));

-- ----------------------------
-- View structure for wip
-- ----------------------------
DROP VIEW IF EXISTS `wip`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `wip` AS select `input_sewing`.`tgl` AS `tgl`,`line`.`name` AS `name`,`line`.`rfid` AS `rfid`,`input_sewing`.`orc` AS `orc`,`input_sewing`.`style` AS `style`,`input_sewing`.`color` AS `color`,`input_sewing`.`size` AS `size`,sum(`input_sewing`.`qty_pcs`) AS `qty` from (`line` join `input_sewing` on((`line`.`name` = `input_sewing`.`line`))) group by `input_sewing`.`tgl`,`line`.`name`,`input_sewing`.`orc`,`input_sewing`.`size`;

-- ----------------------------
-- Function structure for balanceToswing
-- ----------------------------
DROP FUNCTION IF EXISTS `balanceToswing`;
delimiter ;;
CREATE FUNCTION `balanceToswing`(orderQty DECIMAL(60), sewingQty DECIMAL(60))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE balanceToswing DECIMAL(60);
        SET balanceToswing = ( orderQty - sewingQty );
	RETURN (balanceToswing);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for durationLine
-- ----------------------------
DROP FUNCTION IF EXISTS `durationLine`;
delimiter ;;
CREATE FUNCTION `durationLine`(day VARCHAR(40), timeAssembly TIME, shift INT)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriode DECIMAL(20);
		IF (day = 'Friday') THEN
		 
		-- START SHIFT 1
				IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 1) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 1) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 1) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 1) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 1) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 1) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 1) THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 1) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 1) THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 1) THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '18:45:00'AND shift = 1) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '18:45:00' AND timeAssembly <= '19:45:00' AND shift = 1) THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '19:45:00' AND timeAssembly <= '20:45:00' AND shift = 1) THEN
					SET timePeriode = 13;	
				ELSEIF ( timeAssembly >= '20:45:00' AND timeAssembly <= '22:30:00' AND shift = 1) THEN
					SET timePeriode = 14;
					-- end SHIFT 2
				-- START SHIFT 2
				ELSEIF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 2) THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 2) THEN
					SET timePeriode = 13;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 2) THEN
					SET timePeriode = 12;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 2) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '11:45:00'AND shift = 2) THEN
					SET timePeriode = 10;	
				ELSEIF ( timeAssembly >= '11:45:00' AND timeAssembly <= '13:00:00' AND shift = 2) THEN
					SET timePeriode = 9;	
				ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 2) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00' AND shift = 2) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:00:00'AND shift = 2) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '17:00:00' AND timeAssembly <= '18:30:00' AND shift = 2) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00'AND shift = 2) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00' AND shift = 2) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '20:30:00' AND timeAssembly <= '21:30:00' AND shift = 2) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00' AND shift = 2) THEN
					SET timePeriode = 7;
				END IF;
				-- end SHIFT 2
		
		ELSEIF (day != 'Saturday') THEN -- weekDay Working Hours
		 
			-- START SHIFT 1
				IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 1) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 1) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 1) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 1) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 1) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 1) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 1) THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 1) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 1) THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 1) THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '18:45:00'AND shift = 1) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '18:45:00' AND timeAssembly <= '19:45:00' AND shift = 1) THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '19:45:00' AND timeAssembly <= '20:45:00' AND shift = 1) THEN
					SET timePeriode = 13;	
				ELSEIF ( timeAssembly >= '20:45:00' AND timeAssembly <= '22:30:00' AND shift = 1) THEN
					SET timePeriode = 14;
				
				ELSEIF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 2) THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 2) THEN
					SET timePeriode = 13;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 2) THEN
					SET timePeriode = 12;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 2) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 2) THEN
					SET timePeriode = 10;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 2) THEN
					SET timePeriode = 9;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 2) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 2) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 2) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 2) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '19:15:00'AND shift = 2) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '19:15:00' AND timeAssembly <= '20:15:00' AND shift = 2) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '20:15:00' AND timeAssembly <= '21:15:00' AND shift = 2) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '21:15:00' AND timeAssembly <= '22:15:00' AND shift = 2) THEN
					SET timePeriode = 7;
				END IF;
		-- END SHIFT 2
		ELSE 
		-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 1) THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '08:59:59'AND shift = 1) THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 1) THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 1) THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00' AND shift = 1) THEN
        SET timePeriode = 5;
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00' AND shift = 1) THEN
				SET timePeriode = 6;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 1) THEN
        SET timePeriode = 7;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00' AND shift = 1) THEN
        SET timePeriode = 8;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00'AND shift = 1) THEN
        SET timePeriode = 9;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00'AND shift = 1) THEN
        SET timePeriode = 10;	
			-- END SHIFT 1
			-- START SHIFT 2
		
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00' AND shift = 2) THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 2) THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00' AND shift = 2) THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00'AND shift = 2) THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00'AND shift = 2) THEN
        SET timePeriode = 5;
			ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00' AND shift = 2) THEN
				SET timePeriode = 6;
			ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00' AND shift = 2) THEN
        SET timePeriode = 7;
			ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00' AND shift = 2) THEN
        SET timePeriode = 8;
			ELSEIF ( timeAssembly >= '20:00:00' AND timeAssembly <= '21:30:00'AND shift = 2) THEN
        SET timePeriode = 9;
			ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00'AND shift = 2) THEN
        SET timePeriode = 10;	
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for mixed
-- ----------------------------
DROP PROCEDURE IF EXISTS `mixed`;
delimiter ;;
CREATE PROCEDURE `mixed`(po VARCHAR(40))
  DETERMINISTIC
BEGIN
	SET @po= po;
	SET @SQL = NULL;
SELECT
	GROUP_CONCAT( DISTINCT CONCAT( 'MAX(IF (mixed_size_list.size = ''', size, ''', mixed_size_list.qty, NULL)) AS ''', size,'''' ) ) INTO @SQL 
FROM
	mixed_size_list
	INNER JOIN mixed_packing_list ON mixed_packing_list.id_mixed  = mixed_size_list.id_mixed
  WHERE mixed_packing_list.po COLLATE utf8mb4_general_ci = @po
	;

SET @SQL = CONCAT( 'SELECT mixed_packing_list.id_mixed, 
	mixed_packing_list.po, 
	mixed_packing_list.style,
	mixed_packing_list.box_start, 
	mixed_packing_list.box_end,  
	mixed_packing_list.jmlh_karton,
	mixed_packing_list.color,
	mixed_packing_list.type, ', @SQL, ' 
	FROM mixed_packing_list
	LEFT JOIN mixed_size_list  
	ON mixed_packing_list.id_mixed = mixed_size_list.id_mixed
	WHERE mixed_packing_list.po = "',@po,'"
GROUP BY mixed_packing_list.id_mixed' );
PREPARE stmt 
FROM
	@SQL;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @sql = NULL;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for mixed_details
-- ----------------------------
DROP PROCEDURE IF EXISTS `mixed_details`;
delimiter ;;
CREATE PROCEDURE `mixed_details`(po VARCHAR(40))
  DETERMINISTIC
BEGIN
	SET @po= po;
	SET @SQL = NULL;
SELECT
	GROUP_CONCAT( DISTINCT CONCAT( 'MAX(IF (mixed_size_list.size = ''', size, ''', mixed_size_list.qty * mixed_packing_list.jmlh_karton, NULL)) AS ''', size,'''' ) ) INTO @SQL 
FROM
	mixed_size_list
	INNER JOIN mixed_packing_list ON mixed_packing_list.id_mixed  = mixed_size_list.id_mixed
  WHERE mixed_packing_list.po COLLATE utf8mb4_general_ci = @po
	;

SET @SQL = CONCAT( 'SELECT mixed_packing_list.type, ', @SQL, ' 
	FROM mixed_packing_list
	LEFT JOIN mixed_size_list  
	ON mixed_packing_list.id_mixed = mixed_size_list.id_mixed
	WHERE mixed_packing_list.po = "',@po,'"
GROUP BY mixed_packing_list.type' );
PREPARE stmt 
FROM
	@SQL;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @sql = NULL;
END
;;
delimiter ;

-- ----------------------------
-- Function structure for newDurationLine
-- ----------------------------
DROP FUNCTION IF EXISTS `newDurationLine`;
delimiter ;;
CREATE FUNCTION `newDurationLine`(day VARCHAR(40), timeAssembly TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriode DECIMAL(20);
		IF (day = 'Friday') THEN
		 
		-- START SHIFT 1 HARI JUMAT
				IF ( timeAssembly >= '07:20:00' AND timeAssembly <= '08:30:00' ) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '08:30:00' AND timeAssembly <= '09:30:00' ) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '09:30:00' AND timeAssembly <= '10:30:00' ) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '10:30:00' AND timeAssembly <= '12:30:00' ) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00') THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:30:00' ) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '14:30:00' AND timeAssembly <= '15:30:00' ) THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '15:30:00' AND timeAssembly <= '16:30:00' ) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '16:30:00' AND timeAssembly <= '17:30:00') THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00' ) THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00') THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00' ) THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '20:30:00' AND timeAssembly <= '21:30:00' ) THEN
					SET timePeriode = 13;	
				ELSEIF ( timeAssembly >= '22:30:00' AND timeAssembly <= '23:30:00' ) THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00' ) THEN
					SET timePeriode = 15;
				ELSEIF ( timeAssembly >= '22:30:00' AND timeAssembly <= '23:30:00' ) THEN
					SET timePeriode = 16;
					-- end SHIFT 1
				-- START SHIFT 2
				ELSEIF ( timeAssembly >= '07:30:00' AND timeAssembly <= '08:30:00') THEN
					SET timePeriode = 16;
				ELSEIF ( timeAssembly >= '08:30:00' AND timeAssembly <= '09:30:00') THEN
					SET timePeriode = 15;
				ELSEIF ( timeAssembly >= '09:30:00' AND timeAssembly <= '10:30:00') THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '10:30:00' AND timeAssembly <= '11:30:00') THEN
					SET timePeriode = 13;
				ELSEIF ( timeAssembly >= '11:30:00' AND timeAssembly <= '12:30:00') THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00') THEN
					SET timePeriode = 11;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:00:00') THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '14:30:00' AND timeAssembly <= '15:30:00') THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '15:30:00' AND timeAssembly <= '16:30:00') THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '16:30:00' AND timeAssembly <= '17:30:00') THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00') THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00') THEN
					SET timePeriode = 4;	
				ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00') THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '20:30:00' AND timeAssembly <= '21:30:00') THEN
					SET timePeriode = 6;
				ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00') THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '22:30:00' AND timeAssembly <= '23:30:00') THEN
					SET timePeriode = 8;
				END IF;
				-- end SHIFT 2
		-- START WEEKDAY SELAIN HARI JUMAT
		ELSE 
		-- START SHIFT 1
			IF ( timeAssembly >= '07:20:00' AND timeAssembly <= '08:30:00' ) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '08:30:00' AND timeAssembly <= '09:30:00' ) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '09:30:00' AND timeAssembly <= '10:30:00' ) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '10:30:00' AND timeAssembly <= '12:15:00' ) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '12:15:00' AND timeAssembly <= '13:15:00') THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '13:15:00' AND timeAssembly <= '14:15:00' ) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '14:15:00' AND timeAssembly <= '15:15:00' ) THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '15:15:00' AND timeAssembly <= '16:15:00' ) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '16:15:00' AND timeAssembly <= '17:15:00') THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '17:15:00' AND timeAssembly <= '18:15:00' ) THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '18:15:00' AND timeAssembly <= '19:15:00') THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '19:15:00' AND timeAssembly <= '20:15:00' ) THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '20:15:00' AND timeAssembly <= '21:15:00' ) THEN
					SET timePeriode = 13;	
				ELSEIF ( timeAssembly >= '21:15:00' AND timeAssembly <= '22:15:00' ) THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '22:15:00' AND timeAssembly <= '23:15:00' ) THEN
					SET timePeriode = 15;
				ELSEIF ( timeAssembly >= '23:15:00' AND timeAssembly <= '23:15:00' ) THEN
					SET timePeriode = 16;
			-- END SHIFT 1
			-- START SHIFT 2
		
			ELSEIF ( timeAssembly >= '07:20:00' AND timeAssembly <= '08:30:00') THEN
					SET timePeriode = 16;
				ELSEIF ( timeAssembly >= '08:30:00' AND timeAssembly <= '09:30:00') THEN
					SET timePeriode = 15;
				ELSEIF ( timeAssembly >= '09:30:00' AND timeAssembly <= '10:30:00') THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '10:30:00' AND timeAssembly <= '11:30:00') THEN
					SET timePeriode = 13;
				ELSEIF ( timeAssembly >= '11:30:00' AND timeAssembly <= '12:30:00') THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00') THEN
					SET timePeriode = 11;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:00:00') THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '14:30:00' AND timeAssembly <= '15:30:00') THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '15:30:00' AND timeAssembly <= '16:30:00') THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '16:30:00' AND timeAssembly <= '17:30:00') THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00') THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00') THEN
					SET timePeriode = 4;	
				ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00') THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '20:30:00' AND timeAssembly <= '21:30:00') THEN
					SET timePeriode = 6;
				ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00') THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '22:30:00' AND timeAssembly <= '23:30:00') THEN
					SET timePeriode = 8;
				END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for refresh_medan
-- ----------------------------
DROP PROCEDURE IF EXISTS `refresh_medan`;
delimiter ;;
CREATE PROCEDURE `refresh_medan`()
BEGIN
	SET GLOBAL sql_mode = ( SELECT REPLACE ( @@sql_mode, 'ONLY_FULL_GROUP_BY', '' ) );

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_outputsewing_perjam1
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_outputsewing_perjam1`;
delimiter ;;
CREATE PROCEDURE `sp_outputsewing_perjam1`(IN tgl DATE)
BEGIN
select `output_sewing`.`id_output_sewing` AS `id_output_sewing`,
	ifnull(`output_sewing`.`line`,'T O T A L') AS `line`,
	`output_sewing`.`style` AS `style`,
	`output_sewing_detail`.
	`tgl_ass` AS `tgl_ass`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('07:00:00' as time) and `output_sewing_detail`.`assembly` <= cast('08:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `1st`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('08:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('09:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `2nd`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('09:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('10:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `3rd`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('10:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('11:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `4th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('11:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('12:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `5th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('12:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('13:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `6th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('13:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('14:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `7th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('14:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('15:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `8th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('15:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('16:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `9th`,
	sum(if(`output_sewing_detail`.`assembly` >= cast('16:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('17:00:00' as time),`output_sewing_detail`.`qty`,0)) AS `10th`,	
(
		sum(if(`output_sewing_detail`.`assembly` >= cast('07:00:00' as time) and `output_sewing_detail`.`assembly` <= cast('08:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('08:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('09:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('09:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('10:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('10:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('11:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('11:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('12:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('12:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('13:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('13:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('14:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('14:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('15:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('15:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('16:00:00' as time),`output_sewing_detail`.`qty`,0))+
		sum(if(`output_sewing_detail`.`assembly` >= cast('16:01:00' as time) and `output_sewing_detail`.`assembly` <= cast('17:00:00' as time),`output_sewing_detail`.`qty`,0))		
	) AS total_output
	from (`output_sewing_detail` join `output_sewing` on(`output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing`))
	WHERE `output_sewing_detail`.`tgl_ass` = tgl 
	group by `output_sewing`.`line` with rollup;

END
;;
delimiter ;

-- ----------------------------
-- Function structure for target
-- ----------------------------
DROP FUNCTION IF EXISTS `target`;
delimiter ;;
CREATE FUNCTION `target`(tglPeriode DECIMAL(40) , OP DECIMAL (40), SAM DECIMAL(40))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE target DECIMAL(40);
		
		IF(tglPeriode = 1) THEN
			SET target = ROUND( ((1*60)*OP)/SAM );
		ELSEIF (tglPeriode = 2) THEN
			SET target = ROUND( ((2*60)*OP)/SAM );
		ELSEIF (tglPeriode = 3) THEN
			SET target = ROUND( ((3*60)*OP)/SAM );
		ELSEIF (tglPeriode = 4) THEN
			SET target = ROUND(  ((4*60)*OP)/SAM );
		ELSEIF (tglPeriode = 5) THEN
			SET target = ROUND( ((5*60)*OP)/SAM );
		ELSEIF (tglPeriode = 6) THEN
			SET target = ROUND(((6*60)*OP)/SAM );
		ELSEIF (tglPeriode = 7) THEN
			SET target = ROUND( (((7*60)*OP)/SAM) );
		END IF;
	RETURN (target);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetEffLineHours
-- ----------------------------
DROP FUNCTION IF EXISTS `targetEffLineHours`;
delimiter ;;
CREATE FUNCTION `targetEffLineHours`(tglPeriode DECIMAL(40), OP DECIMAL (40), SAM FLOAT(7,4), outputSewing DECIMAL(40))
 RETURNS float(7,2)
  DETERMINISTIC
BEGIN
    DECLARE targetEffLineHours FLOAT(7,2);

		IF(tglPeriode = 5) THEN
			SET targetEffLineHours =  ((outputSewing*SAM)/ (1*60*OP))*100 ;
		
		ELSE 
			SET targetEffLineHours =  ((outputSewing*SAM)/ (1*60*OP))*100 ;
		END IF;
	RETURN (targetEffLineHours);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetEffLineSewing
-- ----------------------------
DROP FUNCTION IF EXISTS `targetEffLineSewing`;
delimiter ;;
CREATE FUNCTION `targetEffLineSewing`(tglPeriode DECIMAL(40), OP DECIMAL (40), SAM FLOAT(7,4), outputSewing DECIMAL(40))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE targetEffLineSewing DECIMAL(40);

		IF(tglPeriode = 5) THEN
			SET targetEffLineSewing = ROUND( ((outputSewing*SAM)/ (5*60*OP))*100 );
		
		ELSE 
			SET targetEffLineSewing = ROUND( ((outputSewing*SAM)/ (8*60*OP))*100 );
		END IF;
	RETURN (targetEffLineSewing);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetLineSewingHours
-- ----------------------------
DROP FUNCTION IF EXISTS `targetLineSewingHours`;
delimiter ;;
CREATE FUNCTION `targetLineSewingHours`(tglPeriode DECIMAL(40), OP DECIMAL (40), SAM FLOAT(7,4))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE targetLineSewingHours DECIMAL(40);

		IF(tglPeriode = 5) THEN
			SET targetLineSewingHours = ROUND( ((1*60)*OP)/SAM );
		
		ELSE 
			SET targetLineSewingHours = ROUND( ((1*60)*OP)/SAM);
		END IF;
	RETURN (targetLineSewingHours);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetLiveLineSewing
-- ----------------------------
DROP FUNCTION IF EXISTS `targetLiveLineSewing`;
delimiter ;;
CREATE FUNCTION `targetLiveLineSewing`(tglPeriode DECIMAL(40), OP DECIMAL (40), SAM FLOAT(7,4))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE targetLiveLineSewing DECIMAL(40);

		IF(tglPeriode = 5) THEN
			SET targetLiveLineSewing = ROUND( ((5*60)*OP)/SAM );
		
		ELSE 
			SET targetLiveLineSewing = ROUND( ((8*60)*OP)/SAM);
		END IF;
	RETURN (targetLiveLineSewing);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetMolding
-- ----------------------------
DROP FUNCTION IF EXISTS `targetMolding`;
delimiter ;;
CREATE FUNCTION `targetMolding`(tglPeriodeMolding DECIMAL(40) , SAM DECIMAL(40))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE targetMolding DECIMAL(40);
		
		IF(tglPeriodeMolding = 1) THEN
			SET targetMolding = ROUND( (1*60)/SAM );
		ELSEIF (tglPeriodeMolding = 2) THEN
			SET targetMolding = ROUND( (2*60)/SAM );
		ELSEIF (tglPeriodeMolding = 3) THEN
			SET targetMolding = ROUND( (3*60)/SAM );
		ELSEIF (tglPeriodeMolding = 4) THEN
			SET targetMolding = ROUND( (4*60)/SAM );
		ELSEIF (tglPeriodeMolding = 5) THEN
			SET targetMolding = ROUND( (5*60)/SAM );
		ELSEIF (tglPeriodeMolding = 6) THEN
			SET targetMolding = ROUND( (6*60)/SAM );
		ELSEIF (tglPeriodeMolding = 7) THEN
			SET targetMolding = ROUND( ((7*60)/SAM) );
		END IF;
	RETURN (targetMolding);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for targetPlanning
-- ----------------------------
DROP FUNCTION IF EXISTS `targetPlanning`;
delimiter ;;
CREATE FUNCTION `targetPlanning`(manPower DECIMAL(40), SAM FLOAT(40))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE targetPlanning FLOAT(40);
	DECLARE  workingHour DECIMAL(40) ;
	    SET workingHour = 480;	
        SET targetPlanning = ( workingHour*manPower ) / SAM;
	RETURN (targetPlanning);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeDuration
-- ----------------------------
DROP FUNCTION IF EXISTS `timeDuration`;
delimiter ;;
CREATE FUNCTION `timeDuration`(day VARCHAR(40), timeAssembly TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriode DECIMAL(20);
		
		IF day != 'Saturday' THEN -- weekDay Working Hours
			-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00') THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00') THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00') THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00') THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00') THEN
        SET timePeriode = 5;	
			ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00') THEN
        SET timePeriode = 6;	
			ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00') THEN
        SET timePeriode = 7;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00') THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00') THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00') THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '18:45:00') THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '18:45:00' AND timeAssembly <= '19:45:00') THEN
        SET timePeriode = 5;	
			ELSEIF ( timeAssembly >= '19:45:00' AND timeAssembly <= '20:45:00') THEN
        SET timePeriode = 6;	
			ELSEIF ( timeAssembly >= '20:45:00' AND timeAssembly <= '22:30:00') THEN
        SET timePeriode = 7;
			END IF;
		-- END SHIFT 2
		ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00') THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '08:59:59') THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00') THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00') THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00') THEN
        SET timePeriode = 5;	
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00') THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00') THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00') THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00') THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00') THEN
        SET timePeriode = 5;	
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeDurationMolding
-- ----------------------------
DROP FUNCTION IF EXISTS `timeDurationMolding`;
delimiter ;;
CREATE FUNCTION `timeDurationMolding`(day VARCHAR(40), timeMolding TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriodeMolding DECIMAL(20);
		
		IF day != 'Saturday' THEN -- weekDay Working Hours
			-- START SHIFT 1
			IF ( timeMolding >= '07:00:00' AND timeMolding <= '09:00:00') THEN
				SET timePeriodeMolding = 1;
			ELSEIF ( timeMolding >= '09:00:00' AND timeMolding <= '10:00:00') THEN
        SET timePeriodeMolding = 2;
			ELSEIF ( timeMolding >= '10:00:00' AND timeMolding <= '11:00:00') THEN
        SET timePeriodeMolding = 3;
			ELSEIF ( timeMolding >= '11:00:00' AND timeMolding <= '12:30:00') THEN
        SET timePeriodeMolding = 4;
			ELSEIF ( timeMolding >= '12:30:00' AND timeMolding <= '13:30:00') THEN
        SET timePeriodeMolding = 5;	
			ELSEIF ( timeMolding >= '13:30:00' AND timeMolding <= '14:30:00') THEN
        SET timePeriodeMolding = 6;	
			ELSEIF ( timeMolding >= '14:30:00' AND timeMolding <= '15:30:00') THEN
        SET timePeriodeMolding = 7;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeMolding >= '15:30:00' AND timeMolding <= '16:30:00') THEN
				SET timePeriodeMolding = 1;
			ELSEIF ( timeMolding >= '16:30:00' AND timeMolding <= '17:30:00') THEN
        SET timePeriodeMolding = 2;
			ELSEIF ( timeMolding >= '17:30:00' AND timeMolding <= '18:30:00') THEN
        SET timePeriodeMolding = 3;
			ELSEIF ( timeMolding >= '18:30:00' AND timeMolding <= '19:30:00') THEN
        SET timePeriodeMolding = 4;
			ELSEIF ( timeMolding >= '19:30:00' AND timeMolding <= '20:30:00') THEN
        SET timePeriodeMolding = 5;	
			ELSEIF ( timeMolding >= '20:30:00' AND timeMolding <= '21:30:00') THEN
        SET timePeriodeMolding = 6;	
			ELSEIF ( timeMolding >= '21:30:00' AND timeMolding <= '22:30:00') THEN
        SET timePeriodeMolding = 7;
			
			
		-- END SHIFT 2
		-- START SHIFT 3
		ELSEIF ( timeMolding >= '22:30:00' AND timeMolding <= '23:59:59') THEN
				SET timePeriodeMolding = 1;
		ELSEIF ( timeMolding >= '00:00:00' AND timeMolding <= '00:45:59') THEN
				SET timePeriodeMolding = 1;
		ELSEIF ( timeMolding >= '00:46:00' AND timeMolding <= '01:45:59') THEN
				SET timePeriodeMolding = 2;
		ELSEIF ( timeMolding >= '01:46:00' AND timeMolding <= '02:45:59') THEN
				SET timePeriodeMolding = 3;
		ELSEIF ( timeMolding >= '02:46:00' AND timeMolding <= '03:45:59') THEN
				SET timePeriodeMolding = 4;
		ELSEIF ( timeMolding >= '03:46:00' AND timeMolding <= '04:45:59') THEN
				SET timePeriodeMolding = 5;
		ELSEIF ( timeMolding >= '04:46:00' And timeMolding <= '05:45:59') THEN
				SET timePeriodeMolding = 6;
		ELSEIF ( timeMolding >= '05:46:00' AND timeMolding <= '07:00:00') THEN
				SET timePeriodeMolding = 7;
			END IF;
		-- END SHIFT 3
		ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeMolding >= '07:00:00' AND timeMolding <= '09:00:00') THEN
				SET timePeriodeMolding = 1;
			ELSEIF ( timeMolding >= '09:00:00' AND timeMolding <= '10:00:00') THEN
        SET timePeriodeMolding = 2;
			ELSEIF ( timeMolding >= '10:00:00' AND timeMolding <= '11:00:00') THEN
        SET timePeriodeMolding = 3;
			ELSEIF ( timeMolding >= '11:00:00' AND timeMolding <= '12:00:00') THEN
        SET timePeriodeMolding = 4;
			ELSEIF ( timeMolding >= '12:00:00' AND timeMolding <= '13:00:00') THEN
        SET timePeriodeMolding = 5;	
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeMolding >= '13:00:00' AND timeMolding <= '14:00:00') THEN
				SET timePeriodeMolding = 1;
			ELSEIF ( timeMolding >= '14:00:00' AND timeMolding <= '15:00:00') THEN
        SET timePeriodeMolding = 2;
			ELSEIF ( timeMolding >= '15:00:00' AND timeMolding <= '16:00:00') THEN
        SET timePeriodeMolding = 3;
			ELSEIF ( timeMolding >= '16:00:00' AND timeMolding <= '17:00:00') THEN
        SET timePeriodeMolding = 4;
			ELSEIF ( timeMolding >= '17:00:00' AND timeMolding <= '18:00:00') THEN
        SET timePeriodeMolding = 5;
			-- END SHIFT 2
			ELSEIF ( timeMolding >= '18:00:00' AND timeMolding <= '19:00:00') THEN
				SET timePeriodeMolding = 1;
			ELSEIF ( timeMolding >= '19:00:00' AND timeMolding <= '20:00:00') THEN
				SET timePeriodeMolding = 2;
			ELSEIF ( timeMolding >= '20:00:00' AND timeMolding <= '21:00:00') THEN 
				SET timePeriodeMolding = 3;
			ELSEIF ( timeMolding >= '21:00:00' AND timeMolding <= '22:00:00') THEN
				SET timePeriodeMolding = 4;
			ELSEIF ( timeMolding >= '22:00:00' AND timeMolding <= '23:00:00') THEN
				SET timePeriodeMolding = 5;
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriodeMolding);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeDurationShift
-- ----------------------------
DROP FUNCTION IF EXISTS `timeDurationShift`;
delimiter ;;
CREATE FUNCTION `timeDurationShift`(day VARCHAR(40), timeAssembly TIME, shift INT)
 RETURNS varchar(20) CHARSET latin1
  DETERMINISTIC
BEGIN
    DECLARE timePeriode VARCHAR(20);
		
		IF (day != 'Saturday') THEN -- weekDay Working Hours
		 
			-- START SHIFT 1
				IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 2) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 2) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 2) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 2) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 2) THEN
					SET timePeriode = 'OT';	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 2) THEN
					SET timePeriode = 'OT';	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 2) THEN
					SET timePeriode = 'OT';
			-- END SHIFT 2
			-- START SHIFT! 11
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 1) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 1) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 1) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '18:45:00'AND shift = 1) THEN
					SET timePeriode = 'OT';
				ELSEIF ( timeAssembly >= '18:45:00' AND timeAssembly <= '19:45:00' AND shift = 1) THEN
					SET timePeriode = 'OT';	
				ELSEIF ( timeAssembly >= '19:45:00' AND timeAssembly <= '20:45:00' AND shift = 1) THEN
					SET timePeriode = 'OT';	
				ELSEIF ( timeAssembly >= '20:45:00' AND timeAssembly <= '22:30:00' AND shift = 1) THEN
					SET timePeriode = 'OT';
				END IF;
		-- END SHIFT 2
		ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 2) THEN
				SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '08:59:59'AND shift = 2) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 2) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 2) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00' AND shift = 2) THEN
        SET timePeriode = 'OT';	
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00' AND shift = 1) THEN
				SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 1) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00' AND shift = 1) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00'AND shift = 1) THEN
        SET timePeriode = 'OT';
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00'AND shift = 1) THEN
        SET timePeriode = 'OT';	
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeDurationShift2
-- ----------------------------
DROP FUNCTION IF EXISTS `timeDurationShift2`;
delimiter ;;
CREATE FUNCTION `timeDurationShift2`(day VARCHAR(40), timeAssembly TIME, shift INT)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriode DECIMAL(20);
		
		IF (day != 'Saturday') THEN -- weekDay Working Hours
		 
			-- START SHIFT 1
				IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 1) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 1) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 1) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 1) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 1) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 1) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 1) THEN
					SET timePeriode = 7;
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 1) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 1) THEN
					SET timePeriode = 9;
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 1) THEN
					SET timePeriode = 10;
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '18:45:00'AND shift = 1) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '18:45:00' AND timeAssembly <= '19:45:00' AND shift = 1) THEN
					SET timePeriode = 12;	
				ELSEIF ( timeAssembly >= '19:45:00' AND timeAssembly <= '20:45:00' AND shift = 1) THEN
					SET timePeriode = 13;	
				ELSEIF ( timeAssembly >= '20:45:00' AND timeAssembly <= '22:30:00' AND shift = 1) THEN
					SET timePeriode = 14;
				
				ELSEIF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 2) THEN
					SET timePeriode = 14;
				ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00' AND shift = 2) THEN
					SET timePeriode = 13;
				ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 2) THEN
					SET timePeriode = 12;
				ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 2) THEN
					SET timePeriode = 11;
				ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:30:00'AND shift = 2) THEN
					SET timePeriode = 10;	
				ELSEIF ( timeAssembly >= '12:30:00' AND timeAssembly <= '13:30:00' AND shift = 2) THEN
					SET timePeriode = 9;	
				ELSEIF ( timeAssembly >= '13:30:00' AND timeAssembly <= '14:45:00' AND shift = 2) THEN
					SET timePeriode = 8;
				ELSEIF ( timeAssembly >= '14:45:00' AND timeAssembly <= '15:45:00' AND shift = 2) THEN
					SET timePeriode = 1;
				ELSEIF ( timeAssembly >= '15:45:00' AND timeAssembly <= '16:45:00'AND shift = 2) THEN
					SET timePeriode = 2;
				ELSEIF ( timeAssembly >= '16:45:00' AND timeAssembly <= '17:45:00' AND shift = 2) THEN
					SET timePeriode = 3;
				ELSEIF ( timeAssembly >= '17:45:00' AND timeAssembly <= '19:15:00'AND shift = 2) THEN
					SET timePeriode = 4;
				ELSEIF ( timeAssembly >= '19:15:00' AND timeAssembly <= '20:15:00' AND shift = 2) THEN
					SET timePeriode = 5;	
				ELSEIF ( timeAssembly >= '20:15:00' AND timeAssembly <= '21:15:00' AND shift = 2) THEN
					SET timePeriode = 6;	
				ELSEIF ( timeAssembly >= '21:15:00' AND timeAssembly <= '22:15:00' AND shift = 2) THEN
					SET timePeriode = 7;
				END IF;
		-- END SHIFT 2
		ELSE 
		-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00' AND shift = 1) THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '08:59:59'AND shift = 1) THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00' AND shift = 1) THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00' AND shift = 1) THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00' AND shift = 1) THEN
        SET timePeriode = 5;
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00' AND shift = 1) THEN
				SET timePeriode = 6;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 1) THEN
        SET timePeriode = 7;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00' AND shift = 1) THEN
        SET timePeriode = 8;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00'AND shift = 1) THEN
        SET timePeriode = 9;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00'AND shift = 1) THEN
        SET timePeriode = 10;	
			-- END SHIFT 1
			-- START SHIFT 2
		
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00' AND shift = 2) THEN
				SET timePeriode = 1;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00' AND shift = 2) THEN
        SET timePeriode = 2;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00' AND shift = 2) THEN
        SET timePeriode = 3;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00'AND shift = 2) THEN
        SET timePeriode = 4;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00'AND shift = 2) THEN
        SET timePeriode = 5;
			ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00' AND shift = 2) THEN
				SET timePeriode = 6;
			ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00' AND shift = 2) THEN
        SET timePeriode = 7;
			ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00' AND shift = 2) THEN
        SET timePeriode = 8;
			ELSEIF ( timeAssembly >= '20:00:00' AND timeAssembly <= '21:30:00'AND shift = 2) THEN
        SET timePeriode = 9;
			ELSEIF ( timeAssembly >= '21:30:00' AND timeAssembly <= '22:30:00'AND shift = 2) THEN
        SET timePeriode = 10;	
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeMolding
-- ----------------------------
DROP FUNCTION IF EXISTS `timeMolding`;
delimiter ;;
CREATE FUNCTION `timeMolding`(day VARCHAR(40), timeshift TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriodeMolding DECIMAL(20);
		
		IF day != 'Saturday' THEN -- weekDay Working Hours
			-- START SHIFT 1
			IF ( timeshift >= '08:00:00' AND timeshift <= '15:30:00') THEN
				SET timePeriodeMolding = 1;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeshift >= '15:31:00' AND timeshift <= '22:30:00') THEN
				SET timePeriodeMolding = 2;
		-- END SHIFT 2
		-- START SHIFT 3
			ELSEIF ( timeshift >= '22:31:00' AND timeshift <= '08:00:00') THEN
				SET timePeriodeMolding = 3;
			END IF;
		-- END SHIFT 3
			ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeshift >= '08:00:00' AND timeshift <= '13:00:00') THEN
				SET timePeriodeMolding = 1;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeshift >= '13:01:00' AND timeshift <= '18:00:00') THEN
				SET timePeriodeMolding = 2;
			-- END SHIFT 2
			-- START SHIFT 3
			ELSEIF ( timeshift >= '18:01:00' AND timeshift <= '23:00:00') THEN
				SET timePeriodeMolding = 3;
			-- END SHIFT 3
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriodeMolding);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeShiftMolding
-- ----------------------------
DROP FUNCTION IF EXISTS `timeShiftMolding`;
delimiter ;;
CREATE FUNCTION `timeShiftMolding`(day VARCHAR(40), timeshift TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriodeMolding DECIMAL(20);
		
		IF day != 'Saturday' THEN -- weekDay Working Hours
			-- START SHIFT 1
			IF ( timeshift >= '07:30:00' AND timeshift <= '15:30:00') THEN
				SET timePeriodeMolding = 1;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeshift >= '15:31:00' AND timeshift <= '22:30:00') THEN
				SET timePeriodeMolding = 2;
					
		-- END SHIFT 2
		-- START SHIFT 3
			ELSEIF (  timeshift >= '22:31:00' AND timeshift <= '23:59:59') THEN
				SET timePeriodeMolding = 3;
			ELSEIF (  timeshift >= '00:00:00' AND timeshift <= '07:31:00') THEN
				SET timePeriodeMolding = 3;
				END IF;
		
			
		-- END SHIFT 3
			ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeshift >= '07:30:00' AND timeshift <= '15:30:00') THEN
				SET timePeriodeMolding = 1;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF (  timeshift >= '15:31:00' AND timeshift <= '22:30:00') THEN
				SET timePeriodeMolding = 2;
			-- END SHIFT 2
			-- START SHIFT 3
			ELSEIF (  timeshift >= '22:31:00' AND timeshift <= '23:59:59') THEN
				SET timePeriodeMolding = 3;
			ELSEIF (  timeshift >= '00:00:00' AND timeshift <= '07:31:00') THEN
				SET timePeriodeMolding = 3;
			-- END SHIFT 3
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriodeMolding);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for timeToday
-- ----------------------------
DROP FUNCTION IF EXISTS `timeToday`;
delimiter ;;
CREATE FUNCTION `timeToday`(day VARCHAR(40), timeAssembly TIME)
 RETURNS decimal(20,0)
  DETERMINISTIC
BEGIN
    DECLARE timePeriode DECIMAL(20);
		
		IF day != 'Saturday' THEN -- weekDay Working Hours
			-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00') THEN
				SET timePeriode = 60;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '09:00:00') THEN
        SET timePeriode = 120;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00') THEN
        SET timePeriode = 180;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00') THEN
        SET timePeriode = 240;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00') THEN
        SET timePeriode = 300;	
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00') THEN
        SET timePeriode = 360;	
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:30:00') THEN
        SET timePeriode = 420;
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeAssembly >= '14:30:00' AND timeAssembly <= '15:30:00') THEN
				SET timePeriode = 60;
			ELSEIF ( timeAssembly >= '15:30:00' AND timeAssembly <= '16:30:00') THEN
        SET timePeriode = 120;
			ELSEIF ( timeAssembly >= '16:30:00' AND timeAssembly <= '17:30:00') THEN
        SET timePeriode = 180;
			ELSEIF ( timeAssembly >= '17:30:00' AND timeAssembly <= '18:30:00') THEN
        SET timePeriode = 240;
			ELSEIF ( timeAssembly >= '18:30:00' AND timeAssembly <= '19:30:00') THEN
        SET timePeriode = 300;	
			ELSEIF ( timeAssembly >= '19:30:00' AND timeAssembly <= '20:30:00') THEN
        SET timePeriode = 360;	
			ELSEIF ( timeAssembly >= '20:30:00' AND timeAssembly <= '22:15:00') THEN
        SET timePeriode = 420;
			END IF;
		-- END SHIFT 2
		ELSE -- weekEnd Working Hours
		-- START SHIFT 1
			IF ( timeAssembly >= '07:00:00' AND timeAssembly <= '08:00:00') THEN
				SET timePeriode = 60;
			ELSEIF ( timeAssembly >= '08:00:00' AND timeAssembly <= '08:59:59') THEN
        SET timePeriode = 120;
			ELSEIF ( timeAssembly >= '09:00:00' AND timeAssembly <= '10:00:00') THEN
        SET timePeriode = 180;
			ELSEIF ( timeAssembly >= '10:00:00' AND timeAssembly <= '11:00:00') THEN
        SET timePeriode = 240;
			ELSEIF ( timeAssembly >= '11:00:00' AND timeAssembly <= '12:00:00') THEN
        SET timePeriode = 300;	
			-- END SHIFT 1
			-- START SHIFT 2
			ELSEIF ( timeAssembly >= '12:00:00' AND timeAssembly <= '13:00:00') THEN
				SET timePeriode = 60;
			ELSEIF ( timeAssembly >= '13:00:00' AND timeAssembly <= '14:00:00') THEN
        SET timePeriode = 120;
			ELSEIF ( timeAssembly >= '14:00:00' AND timeAssembly <= '15:00:00') THEN
        SET timePeriode = 180;
			ELSEIF ( timeAssembly >= '15:00:00' AND timeAssembly <= '16:00:00') THEN
        SET timePeriode = 240;
			ELSEIF ( timeAssembly >= '16:00:00' AND timeAssembly <= '17:30:00') THEN
        SET timePeriode = 300;	
			END IF;
		END IF;
	-- Return the time Periode
	RETURN (timePeriode);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for workDayNeeded
-- ----------------------------
DROP FUNCTION IF EXISTS `workDayNeeded`;
delimiter ;;
CREATE FUNCTION `workDayNeeded`(balanceToSwing DECIMAL(60), target DECIMAL(60))
 RETURNS decimal(40,0)
  DETERMINISTIC
BEGIN
    DECLARE workDayNeeded DECIMAL(60);
        SET workDayNeeded = ( balanceToSwing / target );
	RETURN (round(workDayNeeded ,0));
END
;;
delimiter ;

-- ----------------------------
-- Event structure for InsertAbseenteism
-- ----------------------------
DROP EVENT IF EXISTS `InsertAbseenteism`;
delimiter ;;
CREATE EVENT `InsertAbseenteism`
ON SCHEDULE
EVERY '1' DAY STARTS '2024-01-26 09:10:00'
DO BEGIN
		
		INSERT INTO productionreport.abseenteism ( line, ontime, late,persentage, date_created )
		
SELECT
	tab1.Line, 
	COUNT(tab1.Line) AS qt, 
	COALESCE(tab2.abs,0) AS abs, 
	(
	COALESCE(tab2.abs,0) / COUNT( tab1.Line ))* 100 AS persen, 
	CURRENT_TIMESTAMP
FROM
	(
		SELECT
			me.NIK AS Nik, 
			me.`NAME` AS Nama, 
			SUBSTR( mw.Workgroup, 14 ) AS Line, 
			TIME( al.enroll ) AS Absen
		FROM
			HRS_1.mstWorkgroup AS mw,
			HRS_1.mstEmp AS me
			LEFT JOIN
			HRS_1.attandenceLog AS al
			ON 
				me.NIK = al.NIK AND
				DATE( al.enroll ) =  CURRENT_DATE,
			productionreport.line AS ln
		WHERE
			mw.idWG = me.idWG AND
			me.activeEmp = '1' AND
			SUBSTR( mw.Workgroup, 14 ) = ln.`NAME` AND
			mw.Workgroup NOT LIKE '%TRAINING%'
		GROUP BY
			Nik
		ORDER BY
			Absen ASC
	) AS tab1
	LEFT JOIN
	(
		SELECT
			tb2.Line, 
			COUNT(tb2.Line) AS abs
		FROM
			(
				SELECT
					me.NIK AS Nik, 
					me.`NAME` AS Nama, 
					SUBSTR( mw.Workgroup, 14 ) AS Line, 
					TIME( al.enroll ) AS Absen, 
					paidl.paidLeave
				FROM
					HRS_1.mstWorkgroup AS mw,
					HRS_1.mstEmp AS me
					LEFT JOIN
					HRS_1.attandenceLog AS al
					ON 
						me.NIK = al.NIK AND
						DATE( al.enroll ) = CURRENT_DATE
					LEFT JOIN
					(
						SELECT
							m.paidLeave, 
							t.dateStart, 
							t.dateEnd, 
							t.NIK
						FROM
							transaksiLeavePaid AS t
							LEFT JOIN
							mstPaidLeave AS m
							ON 
								t.idPaidLeave = m.idPaidLeave
						WHERE
							CURRENT_DATE BETWEEN t.dateStart AND t.dateEnd
					) AS paidl
					ON 
						me.NIK = paidl.NIK,
					productionreport.line AS ln
				WHERE
					mw.idWG = me.idWG AND
					me.activeEmp = '1' AND
					SUBSTR( mw.Workgroup, 14 ) = ln.`NAME` AND
					TIME( al.enroll ) IS NULL AND
					mw.Workgroup NOT LIKE '%TRAINING%' AND
					paidl.paidLeave IS NULL
				GROUP BY
					Nik
				ORDER BY
					Absen ASC
			) AS tb2
		GROUP BY
			tb2.Line
	) AS tab2
	ON 
		tab1.Line = tab2.Line
GROUP BY
	tab1.Line;
 
	
END
;;
delimiter ;

-- ----------------------------
-- Event structure for InsertFreeOperatorsEveryday
-- ----------------------------
DROP EVENT IF EXISTS `InsertFreeOperatorsEveryday`;
delimiter ;;
CREATE EVENT `InsertFreeOperatorsEveryday`
ON SCHEDULE
EVERY '1' DAY STARTS '2023-12-19 06:00:00'
DO BEGIN
		
		INSERT INTO layout.free_operators ( EmpID, Id_Opbd, Employee_Name, NIK, Workgroup, Date_Created )
		
SELECT
	mstEmp.empID,
	operationBreakdownDetail.id,
	mstEmp.NAME,
	mstEmp.NIK,
CASE
		
		WHEN mstEmp.idDiv = 19 THEN
		'UTILITY' ELSE
	CASE
			
			WHEN mstEmp.wg LIKE 'I WORKGROUP' THEN
			'NO WORKGROUP' 
			WHEN mstEmp.wg LIKE '' THEN
			'CHECK HRIS' ELSE mstEmp.wg 
		END 
		END AS line_name,
	CURRENT_TIMESTAMP 
	FROM
		(
		SELECT
			t1.NIK,
			t1.NAME,
			t1.empID,
			t1.idDiv,
			SUBSTR( t2.Workgroup, 14 ) AS wg 
		FROM
			HRS_1.mstEmp t1
			LEFT JOIN HRS_1.mstWorkgroup t2 ON t1.idWG = t2.idWG 
		WHERE
			t1.activeEmp = 1 
			AND t1.idDiv = 1 
			OR t1.idDiv = 19 
			AND t1.staffStatus = 'O' 
		) mstEmp
		LEFT JOIN (
		SELECT
			t1.line,
			t1.style,
			t1.tgl_ass,
			MAX( t1.assembly ) max_scan 
		FROM
			(
			SELECT
				t1.id_output_sewing,
				t1.id_output_sewing_detail,
				t2.line,
				t2.style,
				t1.orc,
				t1.no_bundle,
				t1.qty,
				t1.tgl_ass,
				t1.assembly 
			FROM
				`output_sewing_detail` t1
				JOIN output_sewing t2 ON t2.id_output_sewing = t1.id_output_sewing 
			WHERE
				t1.tgl_ass = CURRENT_DATE - 1 
			ORDER BY
				t2.line ASC,
				t1.assembly DESC 
			) t1 
		GROUP BY
			t1.line 
		) outputSewingYesterday ON outputSewingYesterday.line = mstEmp.wg
		LEFT JOIN (
		SELECT
			t_operator.id,
			t_operator.id_employee,
			t_operator.op_code,
			t_operator.op_name,
			t_opb.style,
			t_operator.id_opbd,
			SUBSTR( t_wg.Workgroup, 14 ) AS Wg 
		FROM
			layout.master_opt_layout AS t_operator
			LEFT JOIN layout.operation_breakdown AS t_opb ON t_opb.id = t_operator.id_opb
			LEFT JOIN layout.master_line AS t_line_layout ON t_line_layout.id = t_opb.id_line
			LEFT JOIN HRS_1.mstWorkgroup AS t_wg ON t_wg.idWG = t_line_layout.line_name 
		WHERE
			t_opb.style IS NOT NULL 
			AND t_wg.idWG != 142 
			AND t_opb.style NOT LIKE 'Select Style:' 
			OR t_opb.style NOT LIKE '%coba%' 
		GROUP BY
			t_wg.Workgroup,
			t_opb.style,
			t_operator.op_code,
			t_operator.id_employee 
		ORDER BY
			t_opb.style,
			t_wg.Workgroup ASC,
			t_opb.date_created DESC 
		) operationBreakdownDetail ON operationBreakdownDetail.Wg = outputSewingYesterday.line 
		AND operationBreakdownDetail.style = outputSewingYesterday.style 
		AND operationBreakdownDetail.id_employee = mstEmp.empID
		LEFT JOIN ( SELECT t1.NIK, t1.enroll FROM HRS_1.attandenceLog t1 WHERE DATE ( t1.enroll ) = CURRENT_DATE ) attendanceLog ON attendanceLog.NIK = mstEmp.NIK
		LEFT JOIN ( SELECT t1.EmpID FROM layout.`free_operators` t1 WHERE DATE ( t1.Date_Created ) = CURRENT_DATE ) t_free ON t_free.EmpID = mstEmp.empID
		LEFT JOIN ( SELECT t1.EmpID_Sub, t1.Name_Sub, t1.Id_Master_Opt FROM layout.subtitusi t1 WHERE DATE ( t1.Date_Created ) = CURRENT_DATE ) t_subs ON t_subs.Id_Master_Opt = operationBreakdownDetail.id 
		WHERE
		operationBreakdownDetail.op_code IS NULL 
	GROUP BY
		mstEmp.NIK 
	ORDER BY
	mstEmp.wg,
	mstEmp.NAME ASC; 
	
END
;;
delimiter ;

-- ----------------------------
-- Event structure for InsertRTProductionSummary
-- ----------------------------
DROP EVENT IF EXISTS `InsertRTProductionSummary`;
delimiter ;;
CREATE EVENT `InsertRTProductionSummary`
ON SCHEDULE
EVERY '2' MINUTE STARTS '2024-12-02 11:46:11'
DO BEGIN
	IF
		CURRENT_TIME BETWEEN '07:30:00' 
		AND '19:30:00' THEN
			START TRANSACTION;
		TRUNCATE rt_production_report;
		INSERT INTO rt_production_report (
			orc,
			plan_export,
			style,
			color,
			buyer,
			etd,
			po,
			id_factory,
			order_qty,
			in_cutting_today,
			in_cutting,
			out_cutting_today,
			out_cutting,
			wip_cutting,
			balance_cutting,
			in_sewing_today,
			in_sewing,
			out_sewing_today,
			out_sewing,
			wip_sewing,
			balance_sewing,
			in_packing_today,
			in_packing,
			out_packing_today,
			out_packing,
			wip_packing,
			balance_packing,
			in_fg_today,
			in_fg,
			out_fg_today,
			out_fg,
			wip_fg,
			balance_fg,
			date_created,
			date_updated 
		) SELECT
		tb_out_packing.orc,
		tb_out_packing.plan_export,
		tb_out_packing.style,
		tb_out_packing.color,
		tb_out_packing.buyer,
		tb_out_packing.etd,
		tb_out_packing.so,
		tb_out_packing.id_factory,
		tb_out_packing.order_qty,
		tb_out_packing.in_cutting_today,
		tb_out_packing.in_cutting,
		tb_out_packing.out_cutting_today,
		tb_out_packing.out_cutting,
		tb_out_packing.wip_cutting,
		tb_out_packing.balance_cutting,
		tb_out_packing.in_sewing_today,
		tb_out_packing.in_sewing,
		tb_out_packing.out_sewing_today,
		tb_out_packing.out_sewing,
		tb_out_packing.wip_sewing,
		tb_out_packing.balance_sewing,
		SUM(
		IFNULL( IF ( DATE ( input_packing.tgl ) = CURRENT_DATE, input_packing.qty, 0 ), 0 )) AS in_packing_today,
		SUM(
		IFNULL( input_packing.qty, 0 )) in_packing,
		tb_out_packing.out_packing_today,
		tb_out_packing.out_packing,
		(tb_out_packing.out_sewing - SUM( IFNULL( input_packing.qty, 0 )) ) AS wip_packing,
		( SUM(IFNULL( input_packing.qty, 0 )) - tb_out_packing.order_qty ) balance_packing,
		IFNULL( tb_finish_good.fg_in_today, 0 ) fg_in_today,
		IFNULL( tb_finish_good.fg_in, 0 ) fg_in,
		IFNULL( tb_finish_good.fg_out_today, 0 ) fg_out_today,
		IFNULL( tb_finish_good.fg_out, 0 ) fg_out,
		IFNULL(( tb_finish_good.fg_in - tb_finish_good.fg_out ), 0 ) wip_fg,
		( IFNULL( tb_finish_good.fg_out, 0 )- tb_out_packing.order_qty ) balance_fg,
		CURRENT_TIMESTAMP AS date_created,
		CURRENT_TIMESTAMP AS date_modified 
		FROM
			(
			SELECT
				tb_sewing.orc,
				tb_sewing.plan_export,
				tb_sewing.style,
				tb_sewing.color,
				tb_sewing.buyer,
				tb_sewing.etd,
				tb_sewing.so,
				tb_sewing.id_factory,
				tb_sewing.order_qty,
				tb_sewing.in_cutting_today,
				tb_sewing.in_cutting,
				tb_sewing.out_cutting_today,
				tb_sewing.out_cutting,
				tb_sewing.wip_cutting,
				tb_sewing.balance_cutting,
				tb_sewing.in_sewing,
				tb_sewing.in_sewing_today,
				tb_sewing.out_sewing_today,
				tb_sewing.out_sewing,
				tb_sewing.wip_sewing,
				tb_sewing.balance_sewing,
				SUM(
				IFNULL( IF ( DATE ( output_packing_detail.tgl ) = CURRENT_DATE, output_packing_detail.qty, 0 ), 0 )) AS out_packing_today,
				SUM(
				IFNULL( output_packing_detail.qty, 0 )) AS out_packing 
			FROM
				(
				SELECT
					tb_cutting.orc,
					tb_cutting.plan_export,
					tb_cutting.style,
					tb_cutting.color,
					tb_cutting.buyer,
					tb_cutting.etd,
					tb_cutting.so,
					tb_cutting.id_factory,
					tb_cutting.order_qty,
					tb_cutting.in_cutting_today,
					tb_cutting.in_cutting,
					tb_cutting.out_cutting_today,
					tb_cutting.out_cutting,
					tb_cutting.wip_cutting,
					tb_cutting.balance_cutting,
					tb_cutting.in_sewing,
					tb_cutting.in_sewing_today,
					SUM(
					IFNULL( IF ( output_sewing_detail.tgl_ass = CURRENT_DATE, output_sewing_detail.qty, 0 ), 0 )) AS out_sewing_today,
					SUM(
					IFNULL( output_sewing_detail.qty, 0 )) AS out_sewing,
					IFNULL( tb_cutting.in_sewing - SUM( IFNULL( output_sewing_detail.qty, 0 )), 0 ) AS wip_sewing,
					IFNULL ( SUM( IFNULL( output_sewing_detail.qty, 0 )) - tb_cutting.order_qty, 0 ) AS balance_sewing,
					output_packing.id_output_packing 
				FROM
					(
					SELECT
						`order`.orc,
						`order`.plan_export,
						`order`.style,
						`order`.color,
						`order`.buyer,
						`order`.etd,
						`order`.so,
						`order`.id_factory,
						`order`.qty AS order_qty,
						SUM(
						IFNULL( IF ( input_cutting.tgl = CURRENT_DATE, input_cutting.qty_pcs, 0 ), 0 )) AS in_cutting_today,
						SUM(
						IFNULL( input_cutting.qty_pcs, 0 )) AS in_cutting,
						SUM(
						IFNULL( IF ( input_sewing.tgl = CURRENT_DATE, input_sewing.qty_pcs, 0 ), 0 )) AS out_cutting_today,
						SUM(
						IFNULL( input_sewing.qty_pcs, 0 )) AS out_cutting,
						(
							SUM(
								IFNULL( input_cutting.qty_pcs, 0 )) - SUM(
							IFNULL( input_sewing.qty_pcs, 0 ))) AS wip_cutting,
						( SUM( IFNULL( input_sewing.qty_pcs, 0 )) - `order`.qty ) AS balance_cutting,
						SUM(
						IFNULL( IF ( input_sewing.tgl = CURRENT_DATE, input_sewing.qty_pcs, 0 ), 0 )) AS in_sewing_today,
						SUM(
						IFNULL( input_sewing.qty_pcs, 0 )) AS in_sewing
					FROM
						`order`
						LEFT JOIN input_cutting ON `order`.orc = input_cutting.orc
						LEFT JOIN input_sewing ON `order`.orc = input_sewing.orc 
						AND input_cutting.kode_barcode = input_sewing.kode_barcode 
					WHERE
						`order`.plan_export > CURRENT_DATE 
					GROUP BY
						`order`.id_order,
						input_cutting.orc 
					ORDER BY
						`order`.plan_export ASC 
					) AS tb_cutting
					LEFT JOIN output_sewing_detail ON output_sewing_detail.orc = tb_cutting.orc
					LEFT JOIN output_packing ON output_packing.orc = tb_cutting.orc 
				GROUP BY
					tb_cutting.orc 
				) AS tb_sewing
				LEFT JOIN output_packing_detail ON output_packing_detail.id_output_packing = tb_sewing.id_output_packing 
			GROUP BY
				tb_sewing.orc 
			ORDER BY
				tb_sewing.id_output_packing DESC 
			) tb_out_packing
			LEFT JOIN input_packing ON input_packing.orc = tb_out_packing.orc
			LEFT JOIN (
			SELECT DISTINCT
				transfer_area.orc,
				SUM(
				IF
				( DATE ( transfer_area.tgl_in ) = CURRENT_DATE, transfer_area.qty_box, 0 )) AS fg_in_today,
				SUM(
				IF
				( transfer_area.tgl_in IS NOT NULL, transfer_area.qty_box, 0 )) AS fg_in,
				SUM(
				IF
				( DATE ( transfer_area.tgl_out ) = CURRENT_DATE, transfer_area.qty_box, 0 )) AS fg_out_today,
				SUM(
				IF
				( transfer_area.tgl_out IS NOT NULL, transfer_area.qty_box, 0 )) AS fg_out 
			FROM
				transfer_area
				JOIN `order` ON `order`.orc = transfer_area.orc 
				AND `order`.plan_export > CURRENT_DATE 
			GROUP BY
				transfer_area.orc 
			) tb_finish_good ON tb_finish_good.orc = tb_out_packing.orc 
		GROUP BY
			tb_out_packing.orc,
			input_packing.orc 
		ORDER BY
			tb_out_packing.plan_export;
		COMMIT;
		
	END IF;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table cutting
-- ----------------------------
DROP TRIGGER IF EXISTS `update_order`;
delimiter ;;
CREATE TRIGGER `update_order` AFTER INSERT ON `cutting` FOR EACH ROW update `order` set to_cutting = 1, tgl_to_cutting = CURRENT_DATE
where orc = NEW.orc
;
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table cutting_addon
-- ----------------------------
DROP TRIGGER IF EXISTS `update_order_copy1`;
delimiter ;;
CREATE TRIGGER `update_order_copy1` AFTER INSERT ON `cutting_addon` FOR EACH ROW update `order` set to_cutting = 1, tgl_to_cutting = CURRENT_DATE
where orc = NEW.orc
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table dt_defect_detail
-- ----------------------------
DROP TRIGGER IF EXISTS `update`;
delimiter ;;
CREATE TRIGGER `update` AFTER INSERT ON `dt_defect_detail` FOR EACH ROW BEGIN
	update `input_sewing` set outputed = "Yes" where input_sewing.`orc` = new.orc AND input_sewing.`no_bundle` = new.no_bundle;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table machine_breakdown
-- ----------------------------
DROP TRIGGER IF EXISTS `mb_gomekanik_ai`;
delimiter ;;
CREATE TRIGGER `mb_gomekanik_ai` AFTER INSERT ON `machine_breakdown` FOR EACH ROW BEGIN
	INSERT IGNORE INTO gomekanik.machine_breakdown(id_machine_breakdown, line, tgl, barcode_machine, machine_brand, machine_type, type, machine_sn, barcode_sympton, sympton, status, start_waiting, end_waiting, date_start_waiting, date_end_waiting) VALUE(NEW.id_machine_breakdown, NEW.line, NEW.tgl, NEW.barcode_machine, NEW.machine_brand, NEW.machine_type, NEW.type, NEW.machine_sn, NEW.barcode_sympton, NEW.sympton, NEW.status, NEW.start_waiting, NEW.end_waiting, NEW.date_start_waiting, NEW.date_end_waiting);
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table machine_settled
-- ----------------------------
DROP TRIGGER IF EXISTS `update_machine_breakdown_copy1`;
delimiter ;;
CREATE TRIGGER `update_machine_breakdown_copy1` AFTER INSERT ON `machine_settled` FOR EACH ROW BEGIN
UPDATE machine_breakdown SET `status`='Settled', date_end_waiting = CONCAT(tgl, " ", end_waiting) WHERE id_machine_breakdown = NEW.id_machine_breakdown;

UPDATE mekanik_repairing SET `status`='Finish', end_repairing = CURRENT_TIME, date_end_repairing = CURRENT_TIMESTAMP 
WHERE id_mekanik_repairing = NEW.id_mekanik_repairing;

INSERT IGNORE INTO gomekanik.machine_settled(id_machine_sttled, id_mekanik_repairing, id_machine_breakdown, id_mekanik_member, line, spv_name, status, date, barcode_machine, catatan) VALUE (NEW.id_machine_sttled, NEW.id_mekanik_repairing, NEW.id_machine_breakdown, NEW.id_mekanik_member, NEW.line, NEW.spv_name, NEW.status, NEW.date, NEW.barcode_machine, NEW.catatan);

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table machine_settled
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_ms_gomekanik_ad`;
delimiter ;;
CREATE TRIGGER `delete_ms_gomekanik_ad` AFTER DELETE ON `machine_settled` FOR EACH ROW BEGIN
	DELETE FROM gomekanik.machine_settled WHERE id_machine_sttled = OLD.id_machine_sttled;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table machine_settlement
-- ----------------------------
DROP TRIGGER IF EXISTS `update_machinebreakdown_settlement`;
delimiter ;;
CREATE TRIGGER `update_machinebreakdown_settlement` AFTER INSERT ON `machine_settlement` FOR EACH ROW BEGIN
UPDATE machine_breakdown SET `status`='Delayed' WHERE id_machine_breakdown = NEW.id_machine_breakdown;
UPDATE mekanik_repairing SET end_repairing = CURRENT_TIME WHERE id_mekanik_repairing = NEW.id_mekanik_repairing;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table mekanik_repairing
-- ----------------------------
DROP TRIGGER IF EXISTS `update_machine_breakdown`;
delimiter ;;
CREATE TRIGGER `update_machine_breakdown` AFTER INSERT ON `mekanik_repairing` FOR EACH ROW BEGIN
UPDATE machine_breakdown SET `status`='Repairing...', end_waiting = CURRENT_TIME, date_end_waiting = CURRENT_TIMESTAMP 
WHERE id_machine_breakdown = NEW.id_machine_breakdown;

INSERT IGNORE INTO gomekanik.mekanik_repairing(id_mekanik_repairing, id_machine_breakdown,id_mekanik_member, line, tgl, start_repairing, end_repairing, barcode, date_start_repairing, date_end_repairing, status) VALUE(NEW.id_mekanik_repairing, NEW.id_machine_breakdown,NEW.id_mekanik_member, NEW.line, NEW.tgl, NEW.start_repairing, NEW.end_repairing, NEW.barcode, NEW.date_start_repairing, NEW.date_end_repairing, NEW.status);
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table output_packing
-- ----------------------------
DROP TRIGGER IF EXISTS `update_OutputSewingDetail1`;
delimiter ;;
CREATE TRIGGER `update_OutputSewingDetail1` AFTER INSERT ON `output_packing` FOR EACH ROW UPDATE output_sewing_detail set first_packing_inputed = CURRENT_DATE() WHERE orc = NEW.orc
;
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table output_packing_addon
-- ----------------------------
DROP TRIGGER IF EXISTS `update_OutputSewingDetail1_copy1`;
delimiter ;;
CREATE TRIGGER `update_OutputSewingDetail1_copy1` AFTER INSERT ON `output_packing_addon` FOR EACH ROW UPDATE output_sewing_detail set first_packing_inputed = CURRENT_DATE() WHERE orc = NEW.orc
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table output_packing_old
-- ----------------------------
DROP TRIGGER IF EXISTS `update_OutputSewingDetail`;
delimiter ;;
CREATE TRIGGER `update_OutputSewingDetail` AFTER INSERT ON `output_packing_old` FOR EACH ROW UPDATE output_sewing_detail set first_packing_inputed = CURRENT_DATE() WHERE orc = NEW.orc
;
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table output_sewing_detail
-- ----------------------------
DROP TRIGGER IF EXISTS `update_input_sewing_ai`;
delimiter ;;
CREATE TRIGGER `update_input_sewing_ai` AFTER INSERT ON `output_sewing_detail` FOR EACH ROW BEGIN
	update `input_sewing` set outputed = "Yes" where input_sewing.`orc` = new.ORC AND input_sewing.`no_bundle` = new.no_bundle;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table output_sewing_detail_addon
-- ----------------------------
DROP TRIGGER IF EXISTS `update_input_sewing_ai_copy1`;
delimiter ;;
CREATE TRIGGER `update_input_sewing_ai_copy1` AFTER INSERT ON `output_sewing_detail_addon` FOR EACH ROW BEGIN
	update `input_sewing` set outputed = "Yes" where input_sewing.`orc` = new.ORC AND input_sewing.`no_bundle` = new.no_bundle;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table packing_list
-- ----------------------------
DROP TRIGGER IF EXISTS `packing_barcode_insert`;
delimiter ;;
CREATE TRIGGER `packing_barcode_insert` AFTER INSERT ON `packing_list` FOR EACH ROW BEGIN
	DECLARE x int;
	DECLARE kode VARCHAR(25);
	if(new.total_box > 0) then
		set x = 1;
		while x <= new.total_box do
			set kode = concat(new.orc, "-", new.size, "-", convert(x, char));
			insert into packing_barcode(id_packing_list, no_box, barcode)
			values(new.id_packing_list,x,kode);
			
			set x=x+1;
		end while;
	end if;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
