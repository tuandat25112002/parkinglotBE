/*
 Navicat Premium Data Transfer

 Source Server         : Laragon
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : parking_lot

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 07/12/2023 15:08:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for examples
-- ----------------------------
DROP TABLE IF EXISTS `examples`;
CREATE TABLE `examples`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `examples_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of examples
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (26, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (27, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (28, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (29, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (30, '2023_10_12_000000_create_examples_table', 1);
INSERT INTO `migrations` VALUES (31, '2023_12_02_084739_create_categories_table', 2);
INSERT INTO `migrations` VALUES (32, '2023_12_05_133044_create_prohibiteds_table', 2);

-- ----------------------------
-- Table structure for parking
-- ----------------------------
DROP TABLE IF EXISTS `parking`;
CREATE TABLE `parking`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `lat` float(17, 15) NULL DEFAULT NULL,
  `long` float(100, 15) NULL DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `slot` int NULL DEFAULT NULL,
  `max` int NULL DEFAULT NULL,
  `search_number` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parking
-- ----------------------------
INSERT INTO `parking` VALUES (2, 'Trạm Bệnh Viện Đà Nẵng', 'Số 124 Đường Hải Phòng - Phường Thạch Thang - Quận Hải Châu - TP Đà Nẵng', NULL, 16.072092056274414, 108.215286254882810, '[\"https:\\/\\/nld.mediacdn.vn\\/2019\\/7\\/6\\/6-7-bai-giu-xe-chat-chemanh-3-15623843597221490538198.jpg\"]', 20, 100, 10);
INSERT INTO `parking` VALUES (3, 'Trạm Đại Học Ngoại Ngữ Cơ Sở 2 Số 41 Đường Lê Duẩn', 'Số 41 Đường Lê Duẩn - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.071197509765625, 108.219383239746100, '[\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcT3eJNk4mAuARrFzKAeyibuuV-9PuPhjNYwvA&usqp=CAU\"]', 20, 100, 15);
INSERT INTO `parking` VALUES (4, ' Trạm  Chợ Cồn Đường Hùng Vương', 'Đối Diện 84 Hùng Vương - Phường Hải Châu 2 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.067302703857422, 108.214500427246100, '[\"https:\\/\\/static.ttbc-hcm.gov.vn\\/w815\\/images\\/upload\\/01022023\\/bai_do_xe_b749247a.jpg\"]', 0, 100, 20);
INSERT INTO `parking` VALUES (5, 'Trạm Công Viên Đường Hùng Vương', 'Công Viên Hùng Vương - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.068572998046875, 108.221786499023440, '[\"https:\\/\\/tapchigiaothong.qltns.mediacdn.vn\\/tapchigiaothong.vn\\/files\\/content\\/2022\\/05\\/06\\/img_20220506_191432-1914.jpg\"]', 20, 100, 25);
INSERT INTO `parking` VALUES (6, 'Trạm Số 156 Đường Trần Phú', 'Số 156 Đường Trần Phú - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.067037582397460, 108.223655700683600, '[\"https:\\/\\/baodanang.vn\\/dataimages\\/201412\\/original\\/images1092395_anh_7.JPG\"]', 70, 100, 30);
INSERT INTO `parking` VALUES (7, ' Trạm  Đài Truyền Hình VTV8 Đường Bạch Đằng', 'Đối Diện 258 Bạch Đằng - Phường Phước Ninh - Quận Hải Châu - TP Đà Nẵng', NULL, 16.061986923217773, 108.224166870117190, '[\"https:\\/\\/aozoom.com.vn\\/uploads\\/news\\/10-07-2023\\/0bd2dfe25c0a8a46ce0ba83860fed8fb5c57e506.jpg\"]', 90, 100, 35);
INSERT INTO `parking` VALUES (8, 'Trạm Số 02 Lê Đình Dương', 'Đối Diện Số 02 Lê Đình Dương - Phường Phước Ninh - Quận Hải Châu - TP Đà Nẵng', NULL, 16.061353683471680, 108.222785949707030, '[\"https:\\/\\/poipic3.coccoc.com\\/1000x750\\/poi\\/previews\\/20171228\\/20692-1100b6ef7a4386d08ab610117065b788.jpg\"]', 100, 100, 40);
INSERT INTO `parking` VALUES (9, 'Trạm Công Viên Apec Đường Bạch Đằng', 'Nút Giao Đường Bạch Đằng Binh Minh 4 - Phường Hòa Thuận Đông - Quận Hải Châu - TP Đà Nẵng', NULL, 16.057739257812500, 108.223762512207030, '[\"https:\\/\\/nld.mediacdn.vn\\/2018\\/9\\/30\\/bai-giu-xe-le-lai-3-153829458114492263423.jpg\"]', 0, 100, 45);
INSERT INTO `parking` VALUES (11, 'Trạm Số 71 Đường Duy Tân', 'Số 69-71 Đường Duy Tân - Phường Hòa Thuận Tây - Quận Hải Châu - TP Đà Nẵng', NULL, 16.049654006958008, 108.210289001464840, '[\"https:\\/\\/poipic.coccoc.com\\/1000x750\\/poi\\/previews\\/20180329\\/22678-c8f753015659f72424095e6067bbb9bb.jpg\"]', 20, 100, 50);
INSERT INTO `parking` VALUES (12, ' Trạm  UBND Phường Hòa Thuận Tây Đường Nguyễn Trác', 'Đối Diện 66 Đường Nguyễn Trác - Phường Hòa Thuận Tây - Quận Hải Châu - TP Đà Nẵng', NULL, 15.981941223144531, 108.248565673828120, '[\"https:\\/\\/static.chotot.com\\/storage\\/chotot-kinhnghiem\\/c2c\\/2019\\/11\\/bai-giu-xe-o-to-1.jpg\"]', 50, 100, 60);
INSERT INTO `parking` VALUES (13, 'Trạm Nút Giao Đường Tiểu La Đường Lê Thanh Nghị', 'Đối Diện Số 2 Lê Thanh Nghị - Phường Hòa Cường Bắc - Quận Hải Châu - TP Đà Nẵng', NULL, 15.981941223144531, 108.217056274414060, '[\"https:\\/\\/vcdn1-vnexpress.vnecdn.net\\/2020\\/09\\/19\\/nut-giao-thong-TP-HCM13-1600509278.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=I11-hzPTkKlJ_o2d_iBdog\"]', 20, 100, 70);
INSERT INTO `parking` VALUES (14, 'Trạm Quảng Trường 2/9 Đường 2/9', 'Quảng Trường 2/9 - Phường Hòa Cường Bắc - Quận Hải Châu - TP Đà Nẵng', NULL, 16.040578842163086, 108.222434997558600, '[\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcT3eJNk4mAuARrFzKAeyibuuV-9PuPhjNYwvA&usqp=CAU\"]', 70, 100, 10);
INSERT INTO `parking` VALUES (16, 'Trạm 16 THPT Nguyễn Hiền Đường Phan Đăng Lưu', 'Số 61 Đường Phan Đăng Lưu - PHường Hòa Cường Bắc - QUận Hải Châu - TP Đà Nẵng', NULL, 16.036823272705078, 108.219001770019530, '[\"https:\\/\\/file4.batdongsan.com.vn\\/resize\\/745x510\\/2023\\/04\\/27\\/20230427094618-75e2_wm.jpg\"]', 0, 100, 15);
INSERT INTO `parking` VALUES (17, 'Trạm Nút Giao Đường 2/9 Đường Phan Đăng Lưu', 'Đối Diện Số 452 Đường 2/9 - Phường Hòa Cường Bắc - Quận Hải Châu - TP Đà Nẵng', NULL, 16.036376953125000, 108.224006652832030, '[\"https:\\/\\/static.ttbc-hcm.gov.vn\\/w815\\/images\\/upload\\/01022023\\/bai_do_xe_b749247a.jpg\"]', 100, 100, 20);
INSERT INTO `parking` VALUES (18, 'Trạm Siêu Thị Lotte Mart Đường Vũ Duy Thanh', 'Đường Vũ Duy Thanh - Phường Hòa Cường Bắc - Quận Hải Châu - TP Đà Nẵng', NULL, 16.034551620483400, 108.228866577148440, '[\"https:\\/\\/www.binhduong.gov.vn\\/DataOld\\/guestthumb745x326_20130923155749510_.jpg\"]', 20, 100, 25);
INSERT INTO `parking` VALUES (19, 'Trạm Nút Giao Ông Ích Khiêm Đường Quang Trung', 'Đối Diện 206 Quang Trung - Phường Thanh Bình - Quận Hải Châu - TP Đà Nẵng', NULL, 16.073369979858400, 108.213134765625000, '[\"https:\\/\\/quangcaongoaitroi.com\\/wp-content\\/uploads\\/2020\\/04\\/man-hinh-led-nut-giao-le-duan-ong-ich-khiem-7.jpg\"]', 20, 100, 30);
INSERT INTO `parking` VALUES (20, 'Trạm Vườn Dạo Đường Nguyễn Văn Linh', 'Đối Diện Số 43 Đường Nguyễn Văn Linh - Phường Bình HIên - Quận Hải Châu - TP Đà Nẵng', NULL, 16.061092376708984, 108.220924377441400, '[\"https:\\/\\/epass-vdtc.com.vn\\/wp-content\\/uploads\\/2021\\/11\\/tram-thu-phu-nguyen-van-linh-thu-phi-thu-cong.jpg\"]', 0, 100, 35);
INSERT INTO `parking` VALUES (21, 'Trạm Chợ Hàn Bạch Đằng', 'Đối Diện 116 Đường Bạch Đằng - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.068334579467773, 108.225059509277340, '[\"https:\\/\\/docs.portal.danang.gov.vn\\/images\\/image\\/212-0812_1593161993336.jpg\"]', 20, 100, 40);
INSERT INTO `parking` VALUES (22, ' Trạm Bảo Tàng Đà Nẵng Đường Bạch Đằng', 'Đối Diện Số 40 Đường Bạch Đằng - Phường Thạch Thang - Quận Hải Châu - TP Đà Nẵng', NULL, 16.076105117797850, 108.224220275878900, '[\"https:\\/\\/global-uploads.webflow.com\\/60af8c708c6f35480d067652\\/618e1d92e1ba562de0022174_dai-hoc-da-nang.png\"]', 70, 100, 45);
INSERT INTO `parking` VALUES (23, ' Trạm Cầu Sông Hàn Đường Bạch Đằng', 'Đối Diện Số 68 Đường Bạch Đằng - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.071279525756836, 108.225173950195310, '[\"https:\\/\\/dacsanlamqua.com\\/wp-content\\/uploads\\/2017\\/01\\/Anh-cho-con.jpg\"]', 90, 100, 50);
INSERT INTO `parking` VALUES (24, 'Trạm Trường Tiểu Học Lý Tự Trọng Đường Lý Tự Trọng', 'Đối Diện Số 12 Đường Lý Tự Trọng - Phường Thạch Thang - Quận Hải Châu - TP Đà Năng', NULL, 16.077405929565430, 108.221405029296880, '[\"https:\\/\\/lh5.googleusercontent.com\\/p\\/AF1QipPYMqc-LLF7J5JhspyPAFimTP9IRvkGOoUlUd2t\"]', 20, 100, 60);
INSERT INTO `parking` VALUES (25, ' Trạm Trung Tâm Hành Chính Đà Nẵng Đường Trần Phú', 'Số 24 Đường Trần Phú - Phường Thạch Thang - Quận Hải Châu - TP Đà Nẵng', NULL, 16.075792312622070, 108.223419189453120, '[\"https:\\/\\/baodanang.vn\\/dataimages\\/201412\\/original\\/images1092395_anh_7.JPG\"]', 20, 100, 70);
INSERT INTO `parking` VALUES (26, 'Trạm Bảo Tàng Mỹ Thuật Đường Lê Duẩn', 'Số 78 Đường Lê Duẩn - Phường Hải Châu 1 - Quận Hải Châu - TP Đà Nẵng', NULL, 16.071098327636720, 108.217643737792970, '[\"https:\\/\\/quangcaongoaitroi.com\\/wp-content\\/uploads\\/2020\\/04\\/man-hinh-led-quang-cao-nut-giao-cau-rong-nguyen-van-linh-10.jpg\"]', 0, 100, 10);
INSERT INTO `parking` VALUES (27, 'Trạm Cảng Sông Hàn Đường Như Nguyệt', 'Điểm Giao Đống Đa Như Nguyệt - Phường Thạch Thang - Quận Hải Châu - TP Đà Nẵng', NULL, 16.082201004028320, 108.223747253417970, '[\"https:\\/\\/poipic3.coccoc.com\\/1000x750\\/poi\\/previews\\/20171228\\/20692-1100b6ef7a4386d08ab610117065b788.jpg\"]', 20, 100, 15);
INSERT INTO `parking` VALUES (28, ' Trạm Số 340 Phan Châu Chinh', 'Số 340 Phan Châu Chinh - Phường Bình Thuận - Quận Hải Châu - TP Đà Nẵng', NULL, 16.055820465087890, 108.218658447265620, '[\"https:\\/\\/sudospaces.com\\/eurowindow\\/2022\\/11\\/anh-1-cv-apec.jpg\"]', 70, 100, 20);
INSERT INTO `parking` VALUES (29, 'Trạm Số 395B Đường Trưng Nữ Vương', 'Số 395B Đường Trưng Nữ Vương - Phường Hòa Thuận Đông - Quận Hải Châu - TP Đà Nẵng', NULL, 16.049146652221680, 108.213996887207030, '[\"https:\\/\\/poipic.coccoc.com\\/1000x750\\/poi\\/previews\\/20180329\\/22678-c8f753015659f72424095e6067bbb9bb.jpg\"]', 90, 100, 25);
INSERT INTO `parking` VALUES (30, 'Trạm Bệnh Viện Y C17 Đường Nguyễn Hữu Thọ', 'Số 2 Đường Nguyễn Hữu Thọ - Phường Hòa Thuận Nam - Quận Hải Châu - TP Đà Nẵng', NULL, 16.054576873779297, 108.208465576171880, '[\"https:\\/\\/poipic6.coccoc.com\\/1000x750\\/poi\\/previews\\/20180829\\/25931-56d5692e7072d4112cba0def6d6f9e13.jpg\"]', 20, 100, 30);
INSERT INTO `parking` VALUES (31, 'Trạm  Khu Đô Thị Đa Phước Đường Nguyễn Tất Thành', 'Đối Diện 225 Nguyễn Tất Thành - Phường Thanh Bình - Quận Hải Châu - TP Đà Nẵng', NULL, 16.080894470214844, 108.211204528808600, '[\"https:\\/\\/vcdn1-vnexpress.vnecdn.net\\/2020\\/09\\/19\\/nut-giao-thong-TP-HCM13-1600509278.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=I11-hzPTkKlJ_o2d_iBdog\"]', 20, 100, 35);
INSERT INTO `parking` VALUES (32, 'Trạm  Nút Giao Đường Nguyễn Tất Thành Đường 3/2', 'Nút Giao Đường Nguyễn Tất Thành Đường 3/2 - Phường Thuận Phước - Quận Hải Châu - TP Đà Nẵng', NULL, 16.087629318237305, 108.215484619140620, '[\"https:\\/\\/poipic3.coccoc.com\\/1000x750\\/poi\\/previews\\/20170213\\/14531-e697c724cf8bc9a0b59b71ebf479827a.jpg\"]', 50, 100, 40);
INSERT INTO `parking` VALUES (33, 'Trạm UBND Phường Xuân Hà Đường Trần Cao Vân', 'Số 495 Đường Trần Cao Vân - Phường Xuân Hà - Quận Thanh Khê - TP Đà Nẵng', NULL, 16.071243286132812, 108.192375183105470, '[\"https:\\/\\/file4.batdongsan.com.vn\\/resize\\/745x510\\/2023\\/04\\/27\\/20230427094618-75e2_wm.jpg\"]', 20, 100, 45);
INSERT INTO `parking` VALUES (34, 'Trạm Công Viên 29/3 Đường Điện Biên Phủ', 'Đối Diện Số 46 Đường Điện Biên Phủ - Phường Chính Gián - Quận Thanh Khê - TP Đà Nẵng', NULL, 16.065919876098633, 108.205184936523440, '[\"https:\\/\\/vcdn-vnexpress.vnecdn.net\\/2023\\/08\\/28\\/thuphikhongdung505916588106816-6828-9347-1693204464.jpg\"]', 70, 100, 50);
INSERT INTO `parking` VALUES (35, 'Trạm Công Viên 29/3 Đường Nguyễn Tri Phương', 'Đối Diện 14 Nguyễn Tri Phương - Phường Chính Gián - Quận Thanh Khê - TP Đà Nẵng', NULL, 16.064699172973633, 108.203132629394530, '[\"https:\\/\\/www.binhduong.gov.vn\\/DataOld\\/guestthumb745x326_20130923155749510_.jpg\"]', 90, 100, 60);
INSERT INTO `parking` VALUES (36, 'Trạm Hồ Thạc Gián Đường Hàm Nghi', 'Hồ Thạc Gián Đường Hàm Nghi - Phường Thạc Gián - Quận Thanh Khê - TP Đà Nẵng', NULL, 16.063545227050780, 108.210502624511720, '[\"https:\\/\\/quangcaongoaitroi.com\\/wp-content\\/uploads\\/2020\\/04\\/man-hinh-led-nut-giao-le-duan-ong-ich-khiem-7.jpg\"]', 20, 100, 70);
INSERT INTO `parking` VALUES (37, 'Trạm Hồ Vĩnh Trung Đường Hàm Nghi', 'Đối Diện Số 72 Đường Hàm Nghi - Phường Thạc Gián - Quận Thanh Khê - TP Đà Năng', NULL, 16.062717437744140, 108.210823059082030, '[\"https:\\/\\/epass-vdtc.com.vn\\/wp-content\\/uploads\\/2021\\/11\\/tram-thu-phu-nguyen-van-linh-thu-phi-thu-cong.jpg\"]', 20, 100, 10);
INSERT INTO `parking` VALUES (38, ' Trạm  Nút Giao Đường Trần Thánh Tông Đường Vân Đồn', 'KDC An Hòa - Phường Nại Hiên Đông - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.088960647583008, 108.232917785644530, '[\"https:\\/\\/docs.portal.danang.gov.vn\\/images\\/image\\/212-0812_1593161993336.jpg\"]', 50, 100, 15);
INSERT INTO `parking` VALUES (39, 'Trạm  Chung Cư Vicoland Đường Vân Đồn', 'Lô 1 Tổ 23 KCC B1 Đường Vân Đồn - Phường Nại Hiên Đông - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.088460922241210, 108.230316162109380, '[\"https:\\/\\/global-uploads.webflow.com\\/60af8c708c6f35480d067652\\/618e1d92e1ba562de0022174_dai-hoc-da-nang.png\"]', 20, 100, 20);
INSERT INTO `parking` VALUES (40, 'Trạm Số 193 Đường Trần Hưng Đạo\n', 'Đối Diện Số 193 Đường Trần Hưng Đạo - Phường An Hải Bắc - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.077962875366210, 108.228813171386720, '[\"https:\\/\\/dacsanlamqua.com\\/wp-content\\/uploads\\/2017\\/01\\/Anh-cho-con.jpg\"]', 70, 100, 25);
INSERT INTO `parking` VALUES (41, 'Trạm Cầu Sông Hàn Đường Trần Hưng Đạo', 'Đối Diện 339B Trần Hưng Đạo - Phường An Hải Bắc - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.072044372558594, 108.228805541992190, '[\"https:\\/\\/lh5.googleusercontent.com\\/p\\/AF1QipPYMqc-LLF7J5JhspyPAFimTP9IRvkGOoUlUd2t\"]', 90, 100, 30);
INSERT INTO `parking` VALUES (42, 'Trạm  Cầu Rồng Đường Trần Hưng Đạo', 'Số 521 Trần Hưng Đạo - Phường An Hải Trung - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.060394287109375, 108.230484008789060, '[\"https:\\/\\/baodanang.vn\\/dataimages\\/201412\\/original\\/images1092395_anh_7.JPG\"]', 20, 100, 35);
INSERT INTO `parking` VALUES (43, 'Trạm Nút Giao Đường Phạm Văn Đồng Đường Lê Văn Quý', 'Đối Diện Số 31 Lê Văn Quý - Phường An Hải Bắc - Quận Sơn Trà - TP Đà Năng', NULL, 16.070688247680664, 108.238258361816400, '[\"https:\\/\\/quangcaongoaitroi.com\\/wp-content\\/uploads\\/2020\\/04\\/man-hinh-led-quang-cao-nut-giao-cau-rong-nguyen-van-linh-10.jpg\"]', 20, 100, 40);
INSERT INTO `parking` VALUES (44, 'Trạm  Nút Giao Đường Hồ Nghinh Đường Hà Chương', 'Số 258 Đường Hồ Nghinh - Phường Phước Mỹ - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.065521240234375, 108.243194580078120, '[\"https:\\/\\/poipic3.coccoc.com\\/1000x750\\/poi\\/previews\\/20171228\\/20692-1100b6ef7a4386d08ab610117065b788.jpg\"]', 50, 100, 45);
INSERT INTO `parking` VALUES (45, 'Trạm  Cầu Sông Hàn Đường Trần Hưng Đạo', 'Đối Diện Số 325 Đường Trần Hưng Đạo - Phường An Hải Bắc - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.073610305786133, 108.228805541992190, '[\"https:\\/\\/sudospaces.com\\/eurowindow\\/2022\\/11\\/anh-1-cv-apec.jpg\"]', 20, 100, 50);
INSERT INTO `parking` VALUES (46, 'Trạm Siêu Thị Vincom Đường Ngô Quyền', 'Đối Diện Số 751 Đường Ngô Quyền - Phường An Hải Bắc - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.070413589477540, 108.231231689453120, '[\"https:\\/\\/poipic.coccoc.com\\/1000x750\\/poi\\/previews\\/20180329\\/22678-c8f753015659f72424095e6067bbb9bb.jpg\"]', 70, 100, 60);
INSERT INTO `parking` VALUES (47, 'Trạm THPT Chuyên Lê Quý Đôn Đường Vũ Văn Dũng', 'Số 1 Vũ Văn Dũng - Phường An Hải Tây - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.056858062744140, 108.233444213867190, '[\"https:\\/\\/poipic6.coccoc.com\\/1000x750\\/poi\\/previews\\/20180829\\/25931-56d5692e7072d4112cba0def6d6f9e13.jpg\"]', 90, 100, 70);
INSERT INTO `parking` VALUES (48, 'Trạm Cầu Rồng Đường Võ Văn Kiệt', 'Ngã 3 Đường Võ Văn KIệt Giao Đường Đông Giang - Phường An Hải Trung - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.061143875122070, 108.232719421386720, '[\"https:\\/\\/vcdn1-vnexpress.vnecdn.net\\/2020\\/09\\/19\\/nut-giao-thong-TP-HCM13-1600509278.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=I11-hzPTkKlJ_o2d_iBdog\"]', 100, 100, 10);
INSERT INTO `parking` VALUES (49, 'Trạm  Công Viên Đường Hồ Nghinh', 'Đối Diện Số 71 Đường Hồ Nghinh - Phường Phước Mỹ - Quận Sơn Trà - TP Đà Năng', NULL, 16.076160430908203, 108.242752075195310, '[\"https:\\/\\/poipic3.coccoc.com\\/1000x750\\/poi\\/previews\\/20170213\\/14531-e697c724cf8bc9a0b59b71ebf479827a.jpg\"]', 20, 100, 15);
INSERT INTO `parking` VALUES (50, 'Trạm  Nút Giao Đường Võ Văn Kiệt Đường Võ Nguyên Giáp', 'Nút Giao Đường Võ Văn Kiệt Đường Võ Nguyên Giáp - Phường Phước Mỹ - Quận Sơn Trà', NULL, 16.064390182495117, 108.245857238769530, '[\"https:\\/\\/file4.batdongsan.com.vn\\/resize\\/745x510\\/2023\\/04\\/27\\/20230427094618-75e2_wm.jpg\"]', 20, 100, 20);
INSERT INTO `parking` VALUES (51, 'Trạm  Công Viên Biển Đông Đường Võ Nguyên Giáp', 'Đối Diện 192 Võ Nguyên Giáp - Phường Phước Mỹ - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.071956634521484, 108.245437622070310, '[\"https:\\/\\/vcdn-vnexpress.vnecdn.net\\/2023\\/08\\/28\\/thuphikhongdung505916588106816-6828-9347-1693204464.jpg\"]', 20, 100, 25);
INSERT INTO `parking` VALUES (52, 'Trạm  Nút Giao Đường Võ Nguyên Giáp Đường Nguyễn Văn Thoại', 'Đối Diện 260 Võ Nguyên Giáp - Phường Phước Mỹ - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.056934356689453, 108.247085571289060, '[\"https:\\/\\/www.binhduong.gov.vn\\/DataOld\\/guestthumb745x326_20130923155749510_.jpg\"]', 50, 100, 30);
INSERT INTO `parking` VALUES (53, 'Trạm Cầu Nguyễn Văn Trỗi Đường Trần Hưng Đạo', 'Số 388 Trần Hưng Đạo - Phường An Hải Tây - Quận Sơn Trà - TP Đà Nẵng', NULL, 16.051521301269530, 108.233093261718750, '[\"https:\\/\\/quangcaongoaitroi.com\\/wp-content\\/uploads\\/2020\\/04\\/man-hinh-led-nut-giao-le-duan-ong-ich-khiem-7.jpg\"]', 20, 100, 35);
INSERT INTO `parking` VALUES (56, 'Trạm  Nút Giao Đường Mai Thúc Lân Đường Đỗ Bá', 'Đối Diện 45 Mai Thúc Lân - Phường An Thượng - Quận Ngũ Hành Sơn - TP Đà Nẵng', NULL, 16.050388336181640, 108.242767333984380, '[\"https:\\/\\/epass-vdtc.com.vn\\/wp-content\\/uploads\\/2021\\/11\\/tram-thu-phu-nguyen-van-linh-thu-phi-thu-cong.jpg\"]', 20, 100, 40);
INSERT INTO `parking` VALUES (57, 'Trạm Trường CĐ Văn Hóa Nghệ Thuật Đường Lê Quang Đạo', 'Số 130 Đường Lê Quang Đạo - Phường Bắc Mỹ An - Quận Ngũ Hành Sơn - TP Đà Nẵng', NULL, 16.047374725341797, 108.246368408203120, '[\"https:\\/\\/docs.portal.danang.gov.vn\\/images\\/image\\/212-0812_1593161993336.jpg\"]', 50, 100, 45);
INSERT INTO `parking` VALUES (58, 'Trạm Trung Tâm VHTT Mỹ An Đường Phan Hành Sơn', 'Đối Diện Số 04 Đường Phan Hành Sơn - Phường Mỹ An - Quận Ngũ Hành Sơn - TP Đà Nẵng', NULL, 16.044519424438477, 108.238861083984380, '[\"https:\\/\\/global-uploads.webflow.com\\/60af8c708c6f35480d067652\\/618e1d92e1ba562de0022174_dai-hoc-da-nang.png\"]', 20, 100, 50);
INSERT INTO `parking` VALUES (59, 'Trạm Trường Đại Học Ngoại Ngữ Đường Lương Như Hộc', 'Số 131 Đường Lương Như Hộc - Phường Khuê Trung - Quận Cẩm Lệ - TP Đà Nẵng', NULL, 15.978286743164062, 108.260177612304690, '[\"https:\\/\\/dacsanlamqua.com\\/wp-content\\/uploads\\/2017\\/01\\/Anh-cho-con.jpg\"]', 70, 100, 60);
INSERT INTO `parking` VALUES (60, 'Trạm Công Viên Thanh Niên Đường Xuân Thủy', 'Đối Diện Số 148 Đường Xuân Thủy - Phường Khuê Trung - Quận Cẩm Lệ - TP Đà Nẵng', NULL, 16.026807785034180, 108.214561462402340, '[\"https:\\/\\/lh5.googleusercontent.com\\/p\\/AF1QipPYMqc-LLF7J5JhspyPAFimTP9IRvkGOoUlUd2t\"]', 90, 100, 70);
INSERT INTO `parking` VALUES (61, 'Trạm Nút Giao Đường Xuân Thủy Đường CMT8', 'Số 99 Đường Xuân Thủy - Phường Khuê Trung - Quận Cẩm Lệ - TP Đà Nẵng', NULL, 16.023960113525390, 108.216293334960940, '[\"https:\\/\\/baodanang.vn\\/dataimages\\/201412\\/original\\/images1092395_anh_7.JPG\"]', 20, 100, 10);
INSERT INTO `parking` VALUES (62, 'Trạm Văn Phòng TNGo Đà Nẵng', 'Big C, Đường Hùng Vương, Thanh Khê District, Đà Nẵng, Da Nang 50207, Vietnam', NULL, 16.066743850708008, 108.213439941406250, '[\"https:\\/\\/res.cloudinary.com\\/dcugpagjy\\/image\\/upload\\/v1701891396\\/parkings\\/parking-1701891391.jpg\"]', 100, 100, 15);
INSERT INTO `parking` VALUES (63, 'Trường Đại Học CNTT & TT Việt - Hàn', '470 Trần Đại Nghĩa', NULL, 15.975030899047852, 108.253601074218750, '[\"https:\\/\\/tahico.info\\/wp-content\\/uploads\\/2020\\/06\\/kinh-nghiem-mo-bai-giu-xe-o-to-5.jpg\"]', 80, 100, 20);
INSERT INTO `parking` VALUES (73, 'Trường Đại Học Công Nghệ Thông Tin Và Truyền Thông Việt - Hàn', 'Trường Cao đẳng Du lịch Đà Nẵng, Đường Trà Khê 7, Ngũ Hành Sơn District, Đà Nẵng, Vietnam', '<p><strong>M&ocirc; h&igrave;nh b&atilde;i đỗ xe tự động dạng</strong>&nbsp;xếp h&igrave;nh hay c&ograve;n gọi l&agrave;&nbsp;<strong>puzzle parking</strong>. Đ&acirc;y l&agrave; mẫu&nbsp;<strong>b&atilde;i đỗ xe theo kiểu b&aacute;n tự động</strong>&nbsp;c&oacute; thiết kế đơn giản, do đ&oacute; qu&aacute; tr&igrave;nh lắp đặt diễn ra nhanh ch&oacute;ng. Sử dụng hệ thống&nbsp;<strong>b&atilde;i đỗ xe tự động</strong>&nbsp;theo kiểu xếp h&igrave;nh bạn c&oacute; thể lắp đặt số tầng, số block kh&aacute;c nhau t&ugrave;y v&agrave;o số lượng xe cần thiết hay địa h&igrave;nh của c&aacute;c vị tr&iacute; cần lắp đặt.</p>\r\n\r\n<p>Chẳng hạn như b&atilde;i đỗ xe c&oacute; lượng nh&acirc;n vi&ecirc;n, kh&aacute;ch h&agrave;ng &iacute;t di chuyển bạn c&oacute; thể chọn kiểu 2 tầng. Ngược lại, nếu t&ograve;a nh&agrave; văn ph&ograve;ng c&oacute; lượng người ra v&agrave;o lớn v&agrave; thường xuy&ecirc;n, bạn c&oacute; thể số block v&agrave; chọn từ 3 tầng trở l&ecirc;n. Trường hợp muốn gia tăng th&ecirc;m sức chứa chỉ cần lắp đặt th&ecirc;m c&aacute;c block gh&eacute;p với c&aacute;c block đ&atilde; lắp đặt trước đ&oacute;.</p>\r\n\r\n<p><img alt=\"Hệ thống đỗ xe tự động Đà Nẵng\" src=\"https://bilparking.com.vn/sites/default/files/thu-vien/Baiviet/Bai-do-xe-thong-minh-Da-Nang.jpg\" style=\"height:381px; width:600px\" title=\"Hệ thống đỗ xe tự động Đà Nẵng\" /><br />\r\n<em>Hệ thống đỗ xe tự động xếp h&igrave;nh quy m&ocirc; lớn - Đ&agrave; Nẵng</em></p>\r\n\r\n<p>C&aacute;c tầng hầm chung cư c&oacute; chiều cao hạn&nbsp;sử dụng c&aacute;c hệ thống c&oacute; thiết kế 2-3 tầng, c&ograve;n đối với c&aacute;c khu vực tr&ecirc;n mặt đất kh&ocirc;ng hạn chế chiều cao c&oacute; thể x&acirc;y dựng đến 5-6 tầng để tận dụng tối đa kh&ocirc;ng gian để xe.</p>\r\n\r\n<p><img alt=\"Bãi đỗ xe tự động xếp hình tầng hầm\" src=\"https://bilparking.com.vn/sites/default/files/thu-vien/Baiviet/Bai-do-xe-thong-minh-xep-hinh-tang-ham.jpg\" style=\"height:450px; width:600px\" title=\"Bãi đỗ xe tự động xếp hình tầng hầm\" /><br />\r\n<em>Hệ thống b&atilde;i đỗ xe tự động dạng xếp h&igrave;nh cho tầng hầm t&ograve;a nh&agrave;</em></p>\r\n\r\n<p>Ưu điểm của&nbsp;<strong>b&atilde;i đỗ xe tự động</strong>&nbsp;kiểu xếp h&igrave;nh n&agrave;y ch&iacute;nh l&agrave; khai th&aacute;c rất&nbsp;hiệu quả kh&ocirc;ng gian, thời gian lấy xe nhanh (trung b&igrave;nh từ 2-3 ph&uacute;t/lượt),&nbsp;thao t&aacute;c rất đơn giản. C&ugrave;ng với đ&oacute; l&agrave; sự an to&agrave;n v&agrave; chi ph&iacute; lắp đặt&nbsp;kh&aacute;&nbsp;tiết kiệm.</p>\r\n\r\n<p>Hiện nay,&nbsp;<strong>hệ thống&nbsp;đỗ xe tự động</strong>&nbsp;n&agrave;y đang rất được ưa chuộng v&agrave; trở th&agrave;nh lựa chọn tin cậy được c&aacute;c chủ đầu tư của&nbsp;c&aacute;c dự &aacute;n chung cư, kh&aacute;ch sạn, t&ograve;a nh&agrave; văn ph&ograve;ng...</p>', 15.977089881896973, 108.257453918457030, '[\"https:\\/\\/res.cloudinary.com\\/dcugpagjy\\/image\\/upload\\/v1701852937\\/parkings\\/parking-1701852934.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcugpagjy\\/image\\/upload\\/v1701852940\\/parkings\\/parking-1701852938.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcugpagjy\\/image\\/upload\\/v1701879759\\/parkings\\/parking-1701879752.jpg\"]', 80, 80, 25);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for prohibiteds
-- ----------------------------
DROP TABLE IF EXISTS `prohibiteds`;
CREATE TABLE `prohibiteds`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_longitude` double(10, 6) NOT NULL,
  `start_Latitude` double(10, 6) NOT NULL,
  `end_longitude` double(10, 6) NOT NULL,
  `end_Latitude` double(10, 6) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prohibiteds
-- ----------------------------
INSERT INTO `prohibiteds` VALUES (1, 'Phạm Nhữ Tăng', 108.188000, 16.065200, 108.188000, 16.065600, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (2, 'Trần Hưng Đạo', 108.230000, 16.064100, 108.232000, 16.056800, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (3, 'Trần Khát Chân (Cổ Mân 7-Chu Huy Mân)', 108.242000, 16.089800, 108.241000, 16.088900, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (4, 'Cổ Mân 7', 108.242000, 16.089800, 108.241000, 16.090200, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (5, 'Dương Văn An (Chu Huy Mân - Cô Mân 7)', 108.240000, 16.089600, 108.241000, 16.090200, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (6, 'Trần Quý Cáp', 108.223000, 16.081600, 108.223000, 16.081600, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (7, 'Đống Đa', 108.223000, 16.082600, 108.223000, 16.082700, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (8, 'Đống Đa', 108.222000, 16.082600, 108.220000, 16.082300, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (9, 'Đức Lợi 3', 108.223000, 16.084100, 108.222000, 16.083800, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (10, 'Như Nguyệt', 108.223000, 16.084100, 108.224000, 16.081500, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (11, 'Bạch Đằng ()', 108.223000, 16.081700, 108.223000, 16.082500, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (12, 'Lê Đại Hành', 108.194000, 16.020200, 108.208000, 16.024300, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (13, 'Cách mạng tháng 8', 108.196000, 16.014000, 108.221000, 16.026000, NULL, NULL);
INSERT INTO `prohibiteds` VALUES (14, '2 tháng 9', 108.221000, 16.026200, 108.223000, 16.041600, NULL, NULL);

-- ----------------------------
-- Table structure for row_parking
-- ----------------------------
DROP TABLE IF EXISTS `row_parking`;
CREATE TABLE `row_parking`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `Route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `start_longitude` float NULL DEFAULT NULL,
  `start_Latitude` float NULL DEFAULT NULL,
  `end_longitude` float NULL DEFAULT NULL,
  `end_Latitude` float NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of row_parking
-- ----------------------------
INSERT INTO `row_parking` VALUES (1, 'Phạm Nhữ Tăng', 108.188, 16.0652, 108.188, 16.0656);
INSERT INTO `row_parking` VALUES (2, 'Trần Hưng Đạo', 108.23, 16.0641, 108.232, 16.0568);
INSERT INTO `row_parking` VALUES (3, 'Trần Khát Chân (Cổ Mân 7-Chu Huy Mân)', 108.242, 16.0898, 108.241, 16.0889);
INSERT INTO `row_parking` VALUES (4, 'Cổ Mân 7', 108.242, 16.0898, 108.241, 16.0902);
INSERT INTO `row_parking` VALUES (5, 'Dương Văn An (Chu Huy Mân - Cô Mân 7)', 108.24, 16.0896, 108.241, 16.0902);
INSERT INTO `row_parking` VALUES (6, 'Trần Quý Cáp', 108.223, 16.0816, 108.223, 16.0816);
INSERT INTO `row_parking` VALUES (7, 'Đống Đa', 108.223, 16.0826, 108.223, 16.0827);
INSERT INTO `row_parking` VALUES (8, 'Đống Đa', 108.222, 16.0826, 108.22, 16.0823);
INSERT INTO `row_parking` VALUES (9, 'Đức Lợi 3', 108.223, 16.0841, 108.222, 16.0838);
INSERT INTO `row_parking` VALUES (10, 'Như Nguyệt', 108.223, 16.0841, 108.224, 16.0815);
INSERT INTO `row_parking` VALUES (11, 'Bạch Đằng ()', 108.223, 16.0817, 108.223, 16.0825);
INSERT INTO `row_parking` VALUES (12, 'Lê Đại Hành', 108.194, 16.0202, 108.208, 16.0243);
INSERT INTO `row_parking` VALUES (13, 'Cách mạng tháng 8', 108.196, 16.014, 108.221, 16.026);
INSERT INTO `row_parking` VALUES (14, '2 tháng 9', 108.221, 16.0262, 108.223, 16.0416);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` int NOT NULL DEFAULT 2,
  `active` int NOT NULL DEFAULT 0,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 202 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mrs. Lottie Wilderman MD', 'anderson.eveline@example.org', '(234) 451-4826', NULL, 2, 1, NULL, '$2y$10$8AQvtj0lpDKnKFBxZDa7d.Q.1Imf03Zr8MhT943IqltWdjmKhB3sO', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (2, 'Prof. Jesus Tillman', 'rolando22@example.net', '341-492-2223', NULL, 2, 1, NULL, '$2y$10$4HLapmc9.vtVaslwCyWfju7ScrWMoOf2QMilihNtp3HwR6NlUDsmm', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (3, 'Prof. Molly Huels', 'erolfson@example.com', '779.318.2966', NULL, 2, 1, NULL, '$2y$10$9sXZ1gbPfsWvL4Swj1UAL.7jVfe1CwuB6iH2P6rrzsFr/A0ctklhW', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (4, 'Kendra Gulgowski', 'megane.abernathy@example.net', '+1.817.892.2526', NULL, 2, 1, NULL, '$2y$10$eTqh0yj4UBcTXZxixd.01.UTMYVVVtOfiBCc.jhGxr/74LC0pN0NG', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (5, 'Dr. Dylan Johns', 'pat36@example.net', '+15516810814', NULL, 2, 1, NULL, '$2y$10$FHyT8lHWqj3teGl9zo.wfODLbt0tIrLLaPsOfN18g/h8OSEP/evOi', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (6, 'Blaze Feest I', 'mallie.gulgowski@example.org', '+16518149107', NULL, 2, 1, NULL, '$2y$10$Ug4NZlwoR045uZyEAw37y.iVHqfLuZc7I29S4JNE35aFlzeDximFS', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (7, 'Mr. Fritz Bogan', 'ncremin@example.net', '+1-432-945-2880', NULL, 2, 1, NULL, '$2y$10$MoCdCdZ6WyJhnOc156Y4W.ThHvKYxc8J0vtPSTy28gAd9lrO0QGZy', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (8, 'Laurine Waelchi PhD', 'caleigh.denesik@example.com', '+1-254-553-4481', NULL, 2, 1, NULL, '$2y$10$BnJsYCkk6DqM8.CuHJLbO.Fw2VKBYdbz6L09JfWkt19uCZTk8sI3.', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (9, 'Ms. Lorine Johnston', 'abe.grady@example.org', '(341) 474-3384', NULL, 2, 1, NULL, '$2y$10$XCjUfQvKi2Kjg1Hbi69iGeIQujKAFIZ9NSyESruygDvzbfSH3Xu1q', NULL, '2023-12-06 20:12:09', '2023-12-06 20:12:09');
INSERT INTO `users` VALUES (10, 'Prof. Stephon Treutel', 'emely.wuckert@example.net', '+1-561-225-8078', NULL, 2, 1, NULL, '$2y$10$UqpBEYnDLzLufH.pit9Xru1hTjUQsuUDuKFiJ5u8SJxckwJ8boGhe', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (11, 'Mr. Van Murray', 'flavio.brown@example.org', '1-629-335-3826', NULL, 2, 1, NULL, '$2y$10$1MhJTZ8wvrqm0p8lcfsoEer86.CqTEUbrhQ7Uh7LhDOIubAkp1bMq', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (12, 'Ashton O\'Hara', 'chadd.schimmel@example.com', '(830) 614-1306', NULL, 2, 1, NULL, '$2y$10$MRsr3b8FRCQOIbOY40fsjesLa22Pe.qJ1il7PtSXc6qJEBqnTPC9O', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (13, 'Mr. Roel Kris II', 'mercedes.howe@example.org', '+19412320833', NULL, 2, 1, NULL, '$2y$10$dhc880WtnLeQrLalsZ0xUuOfCAlg.MB/92xZ5.tD/jU5AfnX8o1RK', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (14, 'Dr. Janick Emmerich', 'klittel@example.net', '207-497-4869', NULL, 2, 1, NULL, '$2y$10$i0fzQJzbgZXkLUYWgf1fk.tsFyxyCS.ANBZwhyarSKPGWlfuLLlZ6', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (15, 'Blair Yost', 'zelda.douglas@example.org', '937.781.6472', NULL, 2, 1, NULL, '$2y$10$7CsEnOJ4fzEj41uMZLY0teM47qeu1ALfniENaLN/HU/Ig8Pqsxbfm', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (16, 'Mr. Cesar Paucek MD', 'balistreri.cara@example.com', '+1-628-457-4234', NULL, 2, 1, NULL, '$2y$10$F9SlgNdpPOUuEJBADJLRfebv6OhH.WTh8kbVP0IGCGO.D1WrMQks6', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (17, 'Eduardo Harber Jr.', 'roma98@example.org', '(475) 875-8576', NULL, 2, 1, NULL, '$2y$10$QUoS7.e9QCqSnpWoBUAa/ed3kpjs59qBTnT2VybqZFNtKD7LeqytS', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (18, 'Loraine Carroll', 'nschowalter@example.com', '+19046721708', NULL, 2, 1, NULL, '$2y$10$kPcxvjLDsKdBiYEnpPltheXVq7JeQUZVZXfeGgU4qR2C5zyDkf9g2', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (19, 'Lurline Stiedemann V', 'myrtle52@example.com', '+1.303.377.1930', NULL, 2, 1, NULL, '$2y$10$nG9Nn.PQTzd5UAWrCXYoneZvmMDivGNfhdxsq/kR9UDEzqQKQlS6K', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (20, 'Willa Runolfsson', 'johnson.frida@example.com', '602.364.6228', NULL, 2, 1, NULL, '$2y$10$KzOvbeW87AkWkDVvojbmUeYsdHCX5l75gaU5vbofhgz83NE1F14ru', NULL, '2023-12-06 20:12:10', '2023-12-06 20:12:10');
INSERT INTO `users` VALUES (21, 'Miss Carley Hills', 'oroob@example.net', '760.637.3567', NULL, 2, 1, NULL, '$2y$10$VIi3k4oM6oOMZzoO8Sj1Hua4tMM/hHf8niIz9zlbLNLP1erlvJe4S', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (22, 'Harley Medhurst', 'gosinski@example.net', '+17869659005', NULL, 2, 1, NULL, '$2y$10$qE20zjVMK6EEznDPlbHi6eSTiDXMaaA/eAqUv.dfSiGv.o2kzpa7W', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (23, 'Miss Sally Medhurst DDS', 'lacy29@example.org', '+1 (701) 304-8754', NULL, 2, 1, NULL, '$2y$10$En08CnSZV7UapJ/7eKqydexgiGpfrjVHLy.fXzeG7SJX/GEleju3C', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (24, 'Demario O\'Conner', 'brody.streich@example.net', '+1-423-531-4506', NULL, 2, 1, NULL, '$2y$10$hNcC3G1fslTBqjv7QixiT.//1LGN/.PIlVslvq/mZK0nbfBxYFwuK', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (25, 'Mr. Mohammed Renner DDS', 'lyric38@example.com', '1-629-231-9126', NULL, 2, 1, NULL, '$2y$10$9p/L5V76H.JmCRnWLSJk.O3dKsTAy3cdb1qkDicxdSvPtXSNYSCTi', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (26, 'Helmer Lindgren', 'ktorphy@example.net', '1-321-247-6822', NULL, 2, 1, NULL, '$2y$10$F.ulsS8Pfj/SySOhutsVuucTw2W2mXerSKb0VKL/v6GDVkSLZmJLe', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (27, 'Alba D\'Amore I', 'taryn66@example.com', '323-958-1758', NULL, 2, 1, NULL, '$2y$10$vu308uDRVuKcOsKWzxffWefzUgn4VQZJxYAj2mgSf6TEHBB4lDPFW', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (28, 'Prof. Ruthe Hudson', 'amira82@example.net', '615-710-3413', NULL, 2, 1, NULL, '$2y$10$AL2wHca8gRO3Z9PTojW/.OXE.xqHOclCFRApwKmVavyMNeoCkl5si', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (29, 'Mr. Lawson Hammes PhD', 'hazel85@example.net', '+1-743-649-8141', NULL, 2, 1, NULL, '$2y$10$u.1DRspflLL6Qs6LYw63R.lWYhx4GaWOb8W84ZJxJNHd1VVQVaV76', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (30, 'Missouri Watsica', 'schoen.harvey@example.org', '364.296.7658', NULL, 2, 1, NULL, '$2y$10$9uy5b5o.QF7/39s.aKcf2O0wDWvrnZSbYT.MAxpXgesWiYIVV5t7q', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (31, 'Cesar Sporer', 'eturner@example.org', '808-856-3772', NULL, 2, 1, NULL, '$2y$10$ooZPbnSUZFvzsu9gZbwBKuV1EMpGms9jNweepINSS/wu/CyOCoz.K', NULL, '2023-12-06 20:12:11', '2023-12-06 20:12:11');
INSERT INTO `users` VALUES (32, 'Dr. Maxine Gulgowski', 'clement.mclaughlin@example.net', '(689) 754-8973', NULL, 2, 1, NULL, '$2y$10$Zjz.V3xO4LF.g5CR8xLPcuXNOJFEpU/cBApxSMP/Myt9DC8Hk5cl.', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (33, 'Virginie Greenfelder', 'fpagac@example.com', '1-281-962-4863', NULL, 2, 1, NULL, '$2y$10$ws/FpdTm4oLex0PkYu4Z9OWeW2fgg35hdFhKz3Hu70oT72KE1p4qi', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (34, 'Wilburn Collins', 'uleffler@example.org', '1-551-654-0612', NULL, 2, 1, NULL, '$2y$10$IAOwJ.TuxDiUckJRUcoz8eNHDX0nPXYLw.dKT5V8dLb/hnuRBer/u', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (35, 'Kyla Bernhard', 'koss.edd@example.net', '+1-380-983-5982', NULL, 2, 1, NULL, '$2y$10$pkv8dzGmTJueCsCTYI2Gx.AwpSXQjikpSoyzqRBkCdbBPt2NiRfzO', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (36, 'Kody Toy DDS', 'uglover@example.com', '1-551-668-4732', NULL, 2, 1, NULL, '$2y$10$bLnt1B3Zm5hmCC0lr5NiAeMQ3BwcVFFP4Sm2yr1FQfXlFWF9lCw7a', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (37, 'Pearline Schamberger DVM', 'lavada32@example.org', '478.220.9150', NULL, 2, 1, NULL, '$2y$10$yV3ZWS9GUjBykWrplDsBX.lAzi4hIxko.qMNb.I229omamwKpKsq.', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (38, 'Justina Willms', 'veichmann@example.com', '1-864-895-9805', NULL, 2, 1, NULL, '$2y$10$xSMnpJMYkHRgtkHKFOoZMeq9e6gZx6sEvwerJ/Town6lSI8XFjKZu', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (39, 'Marvin Rice', 'crystal75@example.net', '+1-845-761-1834', NULL, 2, 1, NULL, '$2y$10$15XCIH6ID9gEiIplSDK4iO/hhoHpWTCpKtuXBjQ5eHsmzNk1UHy5i', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (40, 'Mr. Larue Maggio', 'eino.ondricka@example.org', '+1.315.585.2451', NULL, 2, 1, NULL, '$2y$10$9zgavuOmVBctVN7Oktaq6uvf25ySXM71s3BcRnp4dSq7FYExr9f9G', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (41, 'Mr. Lawson Heaney', 'amurphy@example.org', '+1-561-696-0162', NULL, 2, 1, NULL, '$2y$10$iX5djNXuRy2OYIBl7wCMruj5/JQ3hyPjXQYGmtB9T0DejmVLF3JDW', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (42, 'Joaquin Crooks', 'mann.stephania@example.net', '+1-651-844-4414', NULL, 2, 1, NULL, '$2y$10$ODYUNLIxyLH9rUEtwuMtQOcnrHow6kzgWdvTanxl1vQfDvNrJxYgi', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (43, 'Rosina Lowe', 'hoeger.cleora@example.net', '+1 (551) 569-8144', NULL, 2, 1, NULL, '$2y$10$o14xCA4yUcwVr8w1WDivLu/MSg5pDy3JxMxCNcuSi6EWv8BTASMu2', NULL, '2023-12-06 20:12:12', '2023-12-06 20:12:12');
INSERT INTO `users` VALUES (44, 'Catalina Kuphal', 'georgianna56@example.com', '1-337-246-3035', NULL, 2, 1, NULL, '$2y$10$0BfQe5ZfiqrL.KUWdMLmQeJeTILbudx6SdaYB0KibqWEF3vm9vuSu', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (45, 'Prof. Jairo Braun Sr.', 'ziemann.julian@example.net', '+1 (463) 727-8051', NULL, 2, 1, NULL, '$2y$10$soWNmRiaW4U4sMo3PLoJxu7sZPqgTjGEIEZO6mmGbFfOEgU8yrmKG', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (46, 'Clarissa McGlynn', 'daisy.buckridge@example.com', '502-237-4380', NULL, 2, 1, NULL, '$2y$10$SEr43hsBOOczRvmxyHU8uedQ0RrIopB0hnF25J.vDmq/tkvvQ4hdi', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (47, 'Jarod Kozey', 'donnie.tremblay@example.net', '585.412.5749', NULL, 2, 1, NULL, '$2y$10$YyQMTnPwYPw4q6MSfuu7rer9yfDasoNLwf2AVbGK3oKCnlE7PZm9a', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (48, 'Prof. Lee Kuhn IV', 'bruen.tierra@example.com', '1-940-491-7179', NULL, 2, 1, NULL, '$2y$10$CfhmCzKbELwKQX/PEiwN/eGdDDzTEX9b4Fx0J2rT0.nN3mf/56TyC', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (49, 'Prof. Aron Bechtelar IV', 'jsanford@example.com', '+1.701.421.3533', NULL, 2, 1, NULL, '$2y$10$ssTh35lbobKCxpne0rNFAusKKOYwoIx/gn0H.kAmOq9yChd6FFkK6', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (50, 'Jaden Feeney', 'kacie.fahey@example.net', '726-860-7522', NULL, 2, 1, NULL, '$2y$10$HSQ7hXfIg/XNMccLM7P6vu254Ridh0/tfOWZAEn.5Shf.hbnYcNzi', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (51, 'Dr. Tyrell Keeling', 'liliana.feeney@example.net', '+1 (848) 238-2655', NULL, 2, 1, NULL, '$2y$10$eSe6m.aX54UD0spCYmBhjO2pNHscRJITaAitiEuAfhz.S/E9esTzS', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (52, 'Ms. Caitlyn Hirthe', 'mzulauf@example.org', '+1-910-933-1127', NULL, 2, 1, NULL, '$2y$10$TBjXlv68x0BU/kFYJ0yKY.dmdIy4vEI9O6QgskZowuQy/99i0Qobi', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (53, 'Mr. Jules Jacobi III', 'hegmann.heloise@example.net', '413-995-9387', NULL, 2, 1, NULL, '$2y$10$.1MQ2SzkE5n5ApODeD3HN.FmAWouSk3jCjfdgbCCdxX/ZN/tu.uIu', NULL, '2023-12-06 20:12:13', '2023-12-06 20:12:13');
INSERT INTO `users` VALUES (54, 'Dr. Sheldon Gibson', 'niko55@example.com', '+1 (386) 788-5862', NULL, 2, 1, NULL, '$2y$10$gYpeb4RhS6qgj.Oaejf8f.R0ULcXDeJaQJsyme7mdF0BCd3DEgi0e', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (55, 'Watson Kunde III', 'cayla28@example.com', '571-331-0128', NULL, 2, 1, NULL, '$2y$10$xCDghos3S3B4aamOvdEHROcylh5i0eRIFC8dIwni12tOE9KblyScy', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (56, 'Shemar Schmitt', 'amparo59@example.org', '541-424-1527', NULL, 2, 1, NULL, '$2y$10$4ghX9C/GRahjT27QgHsvv.izd0NhYDyo6YFsj.eaIbT.RF5Euw0d.', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (57, 'Lavinia McKenzie Sr.', 'edythe36@example.org', '718.313.3879', NULL, 2, 1, NULL, '$2y$10$mzUgTfiaPgE8mIZvEPKYCuD2J78w6s//UK4k8ziqj32fFt1stUH6a', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (58, 'Mr. Buster Schaefer', 'gmaggio@example.org', '+1 (551) 391-7185', NULL, 2, 1, NULL, '$2y$10$m5phxHzraVEDEaFsN0FuI.AFlO1MVgmNmcVn5YklYI/7B6Vn6nLg.', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (59, 'Vergie Bosco', 'nitzsche.christa@example.org', '1-985-518-3844', NULL, 2, 1, NULL, '$2y$10$wTpo93xZ0aPtNsIu..Wy2upnzW1yI0xGBpAdEBp0IceUI20mnR8Xm', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (60, 'Daniela Lakin', 'osinski.aric@example.net', '(253) 926-6960', NULL, 2, 1, NULL, '$2y$10$M2n9VoLhCixdQiXW72DNUuQuHf777JOPHLECU49kTt4H2Xt9qZsuC', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (61, 'Dr. Cassandra Welch', 'zgleason@example.com', '+1-319-731-1940', NULL, 2, 1, NULL, '$2y$10$GoDz6k8j8QmjnAxhTuZXO.LItcQF4le0ef23aIX1fh2bVR1boH6wG', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (62, 'Breana Kiehn', 'usenger@example.org', '+1.435.502.7615', NULL, 2, 1, NULL, '$2y$10$.Ca6wnfWD79WwdWj17UVTe7sZJfabkfh3e5OcLppChu6jugF1S6rW', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (63, 'Barbara Franecki', 'kgreenholt@example.net', '(641) 690-7478', NULL, 2, 1, NULL, '$2y$10$U9cFPQPaOqeRaotxryNpG.bknQFz0mX6SbBi9GXoCpSkda1YFX0Fu', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (64, 'Ms. Otilia O\'Connell', 'liana58@example.com', '1-585-498-8180', NULL, 2, 1, NULL, '$2y$10$O7P6zanthz4G65dEDiFou.iDPTKa7pVqZdqZ5AQHDacJoTnFONvh2', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (65, 'Ines Abshire I', 'schuppe.lambert@example.net', '313.418.9558', NULL, 2, 1, NULL, '$2y$10$omVPkg58H2xUnH.CFWmId.j2rNAddCW8JyopZJmq1paJ2ZPyCV4c2', NULL, '2023-12-06 20:12:14', '2023-12-06 20:12:14');
INSERT INTO `users` VALUES (66, 'Stefanie Marvin', 'bgusikowski@example.org', '+1-601-202-8740', NULL, 2, 1, NULL, '$2y$10$a6F.whR6XsSp2lRCTBB8nusUHQwV.iX29kMgMCWRbr9jWNQCOmTiS', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (67, 'Ebony Lynch', 'wuckert.jo@example.net', '1-575-538-3329', NULL, 2, 1, NULL, '$2y$10$.qx6D5ohk0P/ra7Su01OH.RtlqvDaxLUv/penV05Pl2DG44WO/TLu', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (68, 'Dr. Maritza Kulas', 'torp.dariana@example.com', '205-734-4122', NULL, 2, 1, NULL, '$2y$10$w8kNwOXPj0kwGeGQ2HFnWePq2EBIH6jcURkwcPzlNXgABxkQyEgOK', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (69, 'Sabina Morar', 'bkuvalis@example.com', '757.308.2240', NULL, 2, 1, NULL, '$2y$10$jd8EOucaUTrjLs7/exARwu.sEtALgVvp8eLFWJtijf7Qyg1237IAq', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (70, 'Mrs. Imelda Shields', 'wolf.bart@example.net', '651.254.3766', NULL, 2, 1, NULL, '$2y$10$TgH9aYwFjTpYIBvK7bc8oOBvALjhu8fsg2yxakG5rXQQ09Ah3o2bu', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (71, 'Kenneth Mosciski', 'czemlak@example.net', '+1 (785) 428-6656', NULL, 2, 1, NULL, '$2y$10$x7K0UEBev5W5wbE5ZWHAFu1Lrsvkbeh160QKyOa7vbjdfepe4ixw6', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (72, 'Mr. Leonel Lehner PhD', 'lwilderman@example.org', '(270) 735-1334', NULL, 2, 1, NULL, '$2y$10$G8ITX4KSo07YyCFjlkSx.etsCqK7Y4V1rwSn/JwmCAT9BDHjYgpDe', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (73, 'Euna Pfeffer', 'wisozk.dovie@example.net', '678-569-9261', NULL, 2, 1, NULL, '$2y$10$fOu0bO1IBO43DxNuRYFDqeZjRsA1o7tX7TW2jjq.zTInfBy6rjjXu', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (74, 'Alec Quitzon', 'jhuels@example.org', '1-313-721-4381', NULL, 2, 1, NULL, '$2y$10$bSfpb7dprhFSzR1pdxL5eezXSucR31o/c1rHKzHNDNnNI.aNMqW..', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (75, 'Pearline Langworth', 'hahn.obie@example.net', '856.358.6263', NULL, 2, 1, NULL, '$2y$10$8hjL/ksOaMsQ8p3cYB4n4ODs2TYXOPJ/36r.KKQp7sr1t.qE7nwwK', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (76, 'Shanie Connelly', 'fhoeger@example.org', '(413) 387-5947', NULL, 2, 1, NULL, '$2y$10$ClD4pOjbNc6DlT/kk.4gze6TO4mUYPyR1ZfV5rnEMXU8kofX8NyYS', NULL, '2023-12-06 20:12:15', '2023-12-06 20:12:15');
INSERT INTO `users` VALUES (77, 'Angie Bartoletti', 'qzieme@example.com', '(605) 565-9445', NULL, 2, 1, NULL, '$2y$10$RmLnQuKUCi6fTJL3IpDv8.dqlP0UwbPUPFnwfrYz.niWEP2wGgEOC', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (78, 'Vivianne Prosacco', 'gorczany.elton@example.net', '+1.972.869.6794', NULL, 2, 1, NULL, '$2y$10$peVxc5BlFarJLepV3SA.qexjCErWW/y.eomxBmiaomWIK3YZDOvJ.', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (79, 'Dr. Modesta Will DDS', 'trudie15@example.net', '442-512-1886', NULL, 2, 1, NULL, '$2y$10$kpbi32vrSlRuo4kkyaHaluvHmLbpxlT.tUgX3Dzi2U8o.zqzlQ6wK', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (80, 'Odessa Stracke', 'lizzie.goyette@example.com', '920.419.9497', NULL, 2, 1, NULL, '$2y$10$t8n9XH0BKQM9OZhns6WJl.L8bSV6DAoWyazUhZH86FCTSDSKUyH1u', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (81, 'Natasha Gleichner Sr.', 'emerson92@example.net', '+18436702814', NULL, 2, 1, NULL, '$2y$10$Qpr2APPZPNh3S8fGmZxFN.NzY1odn19myyF6hCJPH42B0QCiWvwri', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (82, 'Dr. Wilma Bergnaum', 'kunze.daija@example.net', '1-352-298-6323', NULL, 2, 1, NULL, '$2y$10$/YVhTsHoOl7qtdidKAX68..lERXCSr8EQS.YnXdGAJzNVyEGWryR6', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (83, 'Bernadette Roberts DVM', 'ffeil@example.org', '1-262-793-9126', NULL, 2, 1, NULL, '$2y$10$FEy7hN3P5iEe9EzVsfz77O1PfLGf2jgVjw.RW.VNKTJdJ5VpCajRO', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (84, 'Hildegard Walter', 'alana19@example.net', '+1 (828) 957-6167', NULL, 2, 1, NULL, '$2y$10$uTYzC6w/PsMZJCXdetyUjeln.MCk6uvKddyOunQsNfcJAgPk60aZa', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (85, 'Michael Schinner', 'ilene58@example.net', '+1-559-869-6262', NULL, 2, 1, NULL, '$2y$10$5oc6zdazfLKB1btAW7DgLu9.PObZplWrU2aOHTvvLI2bDEwCRXaEy', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (86, 'Braden Zemlak', 'elisa95@example.net', '+17184868864', NULL, 2, 1, NULL, '$2y$10$TfRyZ/ueeV2yBAacmRT6g.XSzGMNPUOJa5b1wzWM.pGcXHM.s8.TS', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (87, 'Myron Wisozk', 'vking@example.org', '940.255.6062', NULL, 2, 1, NULL, '$2y$10$QHGlq//6GWdIu188SPoG/uD590D5s1oJ35fJWYk5Vf9GDLiCmbNUK', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (88, 'Dr. Brock Treutel IV', 'amir95@example.com', '+1.971.304.6393', NULL, 2, 1, NULL, '$2y$10$fMMVnPIyn/Vb6ggVT8TUFezdAL0GfRStRzOGDRT6z1k9/ucopyok6', NULL, '2023-12-06 20:12:16', '2023-12-06 20:12:16');
INSERT INTO `users` VALUES (89, 'Blair Weissnat', 'carmstrong@example.net', '480-303-4589', NULL, 2, 1, NULL, '$2y$10$oWDuAdVXHDmdeIha98v0HOLHYfEeQs7oZOlE8nuimgFUZWHjKCIju', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (90, 'Mr. Reyes McClure DDS', 'patsy92@example.com', '+1-331-903-3967', NULL, 2, 1, NULL, '$2y$10$BGnOWsE1lW9ajHUWL22GWuXFz4wF/EiEY/XtALZFsrDVkJgZSIuc6', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (91, 'Marley Willms', 'herzog.candelario@example.org', '+1-254-891-6336', NULL, 2, 1, NULL, '$2y$10$EvYwvlWUq1/pVy.BWY7hTu/dqe/F3sZnyE.VyqMU70CXG2ttdnXj2', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (92, 'Saige Hammes', 'stracke.aniyah@example.net', '+1-908-563-2468', NULL, 2, 1, NULL, '$2y$10$mCK5kX1x2akZeLQeB7bTJ.NpOINPwvmKLJNqbHP4WE4cmUVSo8e9C', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (93, 'Devin Tromp', 'georgette21@example.com', '1-530-932-7522', NULL, 2, 1, NULL, '$2y$10$Iqeh99iNKIX/zNMh6iJ0r.v3f60tSLdwGbLpqwRo46gmY0JSql9Qi', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (94, 'Mitchell Corwin', 'jovany96@example.com', '+1-959-846-8217', NULL, 2, 1, NULL, '$2y$10$cf.CYKMMhWnYWSAgXE6eFO4eRtg/gW8rFqmUtGOuUtK5M12oxs4Cq', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (95, 'Prof. Turner Morissette PhD', 'easter05@example.net', '443-546-8093', NULL, 2, 1, NULL, '$2y$10$11jvQcyEdoUzt.nvTrOwr.3UYxbHWWcIg.7DJiqNkyypWpqXRt6Pa', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (96, 'Luisa Kuphal', 'francis.little@example.com', '772.251.0053', NULL, 2, 1, NULL, '$2y$10$ykF7UyRWX9cdS7gkByDai.N00t/NRc2Gog5cco3zvYAvU74QWkB2a', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (97, 'Shyann Lockman', 'lisa07@example.net', '769-856-6389', NULL, 2, 1, NULL, '$2y$10$OV.jGKFKuUVHhAXWQVbXiun8pgAYKKUNqoVg3ZjOkJ2eycaUJgNFu', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (98, 'Wilmer Armstrong', 'brant.jones@example.net', '781-270-1607', NULL, 2, 1, NULL, '$2y$10$ZI4LYbg1D2xOaTnlBVStYeUNVx7uK8C0nGNPoCuwc1RdTR0HyFVdC', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (99, 'Bobby Skiles IV', 'godfrey.metz@example.org', '1-279-716-4125', NULL, 2, 1, NULL, '$2y$10$sFexNwjwdO5FlQJ1PMgEq.eEGiLO3oc1cc8L1NWe88DIs76U6rgN.', NULL, '2023-12-06 20:12:17', '2023-12-06 20:12:17');
INSERT INTO `users` VALUES (100, 'Bianka Block', 'bartell.tobin@example.com', '+1.850.415.2775', NULL, 2, 1, NULL, '$2y$10$o/dtPJcbFi0YDHqh9OICP.KuxSGOXdCHnHssGts99TEHe0Mr3hWIu', NULL, '2023-12-06 20:12:18', '2023-12-06 20:12:18');
INSERT INTO `users` VALUES (101, 'Dương Tuấn Đạt', 'caole25112002@gmail.com', '0964114749', NULL, 0, 0, NULL, '$2y$10$newcoEqiSVbUxifZEcjt.OUtuUV8l5Hbag6EQlOAY.c8p7ML1dRVu', NULL, '2023-12-06 20:14:06', '2023-12-06 20:14:06');
INSERT INTO `users` VALUES (102, 'Miss Theodora Murazik', 'dorris.bogisich@example.org', '+1 (518) 885-3481', NULL, 2, 1, NULL, '$2y$10$QUpyGfnhL3HvSiP1bMc4qONk33e4LNVO3Mw0PMU77w4sbA8JfnVkO', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (103, 'Prof. Gianni Wunsch III', 'nigel.lowe@example.com', '+1.938.365.5912', NULL, 2, 1, NULL, '$2y$10$5XbupTv66Ux4dUi4YpmWoevHEQrhataL1ItHYCX5x8d6iKlmT8fZS', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (104, 'Brittany Schultz', 'francisca87@example.org', '+14259917099', NULL, 2, 1, NULL, '$2y$10$1Aq2TkaRhIJHifWcM.yoleu5knNMvjM6I56rTeQfNfUQbxhuibFpC', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (105, 'Prof. Donavon Larkin', 'connie87@example.com', '925.506.5529', NULL, 2, 1, NULL, '$2y$10$z14SbwnxH.wihXfGSvasuuj5AxmDjk0C2Jj8DwgDecg2pUV4cmdp2', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (106, 'Elton McDermott', 'bartoletti.kailey@example.org', '+1 (272) 597-9321', NULL, 2, 1, NULL, '$2y$10$YSNsOjwl9S2.2ZA..5mET.OnYCeqdv8v1c90.b/aAYotNaI5iyI82', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (107, 'Prof. Shane Lang', 'fkerluke@example.net', '+1-347-575-9753', NULL, 2, 1, NULL, '$2y$10$sQNUNvBq.SUXwUBMgnBHA.Bv9vuSQeuQu4DrPIpC0Et.y6fE3/wvu', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (108, 'Palma Hegmann', 'edenesik@example.org', '+17264506059', NULL, 2, 1, NULL, '$2y$10$JjtoF7Lo8RI0plSfCAWtFOi6R7nsfR9YSYqx8Y.R5C7FMjOBf5XiW', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (109, 'Camille Weissnat DVM', 'abshire.lilyan@example.org', '1-660-773-4429', NULL, 2, 1, NULL, '$2y$10$Z8gpToy0wm.4lxaMCPNMK.INtrsKloxmDab80MuzZUXIMaSokXC6.', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (110, 'Frankie Heaney', 'wdicki@example.com', '1-828-804-8933', NULL, 2, 1, NULL, '$2y$10$IQ2uJpgpjHOfImUC1.SEKedIK1Ht.vlOalmWlelIMIR7tgXSZFAtW', NULL, '2023-12-06 20:14:41', '2023-12-06 20:14:41');
INSERT INTO `users` VALUES (111, 'Idell Walsh', 'pfannerstill.janie@example.org', '+1-520-393-0965', NULL, 2, 1, NULL, '$2y$10$dLSaAPQ3X0jgvTZ6YC7CQevXZTEUQxTe7rAOYwaz/tKEqlaKPAy4O', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (112, 'Carson Nikolaus', 'moen.asia@example.net', '+1-551-908-1163', NULL, 2, 1, NULL, '$2y$10$7lHQf1MvyNQSy9tD.8HgaeVNl9sxW9BbEZ8ELrTVn8lfIUG8Gssam', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (113, 'Trevor Kirlin', 'dolly66@example.org', '763.533.2065', NULL, 2, 1, NULL, '$2y$10$lJgTrxutHvgZ0gkY85bKaeFhWClIyFIVxFk5c8rizCuxcGpeEB3TO', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (114, 'Ms. Margot Schaefer', 'zora.gerlach@example.com', '(615) 522-1357', NULL, 2, 1, NULL, '$2y$10$m5OihmpnvPv.05aMcGmiNOg32RIWgVPBGSttm/xfi47Y2PiUSHrWS', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (115, 'Jewel Shanahan', 'hartmann.bridgette@example.org', '303-841-3770', NULL, 2, 1, NULL, '$2y$10$7zWF9wRjwAVZ7hwhltUFtO/vJMGUZt69iJpDMc3v0e9QAMTOvC/BC', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (116, 'Wilhelmine Hartmann', 'mertz.priscilla@example.org', '352-545-3126', NULL, 2, 1, NULL, '$2y$10$9ChNlhnUwcuQJoAerpw0GOl3VhMH.7YRe4eScfo3PO/nOIAQ.XkE.', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (117, 'Mrs. Opal Schulist', 'kirk.rodriguez@example.net', '(938) 526-5092', NULL, 2, 1, NULL, '$2y$10$h/rb8hyV5s.UVGjWicr0huqqHKC7TocmGLimEObx3/Y1rBakkRx3i', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (118, 'Dr. Bud Trantow PhD', 'daugherty.ciara@example.net', '629-530-4152', NULL, 2, 1, NULL, '$2y$10$I6eQ7queWwEIoz2YpBBHwu52I7mX0Ncg/V0mRB5TFx/PuYlVUM2Me', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (119, 'Narciso Turcotte', 'bernita.ortiz@example.net', '(458) 615-7470', NULL, 2, 1, NULL, '$2y$10$E88SPS6eihQp9QvpXDf6i.b6b6/8ZCHl1xf3scUlPTnqkOnYSlLXu', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (120, 'Drew Wunsch', 'wava38@example.net', '(661) 459-2453', NULL, 2, 1, NULL, '$2y$10$mL9SPWnyKd4.2wsNK3pjxeQODmEqieI.oU96YqqDxqfv4kPQjojHa', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (121, 'Miss Guadalupe Fadel', 'bartholome22@example.org', '+1.947.857.7115', NULL, 2, 1, NULL, '$2y$10$LalwtcNUzrRrNKasNzVC8e472HPKPr.SNfX6RkOWhzhndV89CyHau', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (122, 'Jacinthe Mueller', 'borer.delphine@example.org', '682-878-0868', NULL, 2, 1, NULL, '$2y$10$.IQ6n071BAsvyaArT6bQuO.emgluZG5s8chuNOy0erclDPbt3RzaK', NULL, '2023-12-06 20:14:42', '2023-12-06 20:14:42');
INSERT INTO `users` VALUES (123, 'Melba Pacocha', 'collins.stephon@example.com', '+1-832-319-3739', NULL, 2, 1, NULL, '$2y$10$RyuedKbN8B/qhovLLeM/vOcHCcPzso2etrwtevn.YdMk6oW6SBPi.', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (124, 'Dr. Alexandrea O\'Connell', 'nya17@example.com', '+1-385-605-5317', NULL, 2, 1, NULL, '$2y$10$qg84wRM8W1DUCcL2kovdMOGL0InTZtHopLLIzbhxMaWIo8B4mvq/i', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (125, 'Braulio Dickens', 'vkulas@example.org', '252-591-2824', NULL, 2, 1, NULL, '$2y$10$Nhw9fnA1x4/0rA4Z9NkWNOmU7OhkUHjz.NADfif9b6K1cpiXyN3Vm', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (126, 'Bennie Simonis', 'rosendo22@example.net', '+1-928-254-9794', NULL, 2, 1, NULL, '$2y$10$oktF/hd26aW05AlebhSiheQYLNU4TyM693xGu7dxW5OIw9jsYGgha', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (127, 'Miss Astrid Ullrich', 'warmstrong@example.com', '+14758845399', NULL, 2, 1, NULL, '$2y$10$bkciYFXrIB8GtG6ni9aoCOae0jz/IQy.WYiMCiIav9MkSvy2/QPY6', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (128, 'Otis Morar PhD', 'winston.zulauf@example.org', '425-237-2879', NULL, 2, 1, NULL, '$2y$10$ZRSmTBn857Ab8.jg5AwEoe.N0UwQpiHo2aTe2KioXSsRM9.GIQEc2', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (129, 'Edgardo Schamberger DDS', 'gussie.goyette@example.net', '(248) 401-6600', NULL, 2, 1, NULL, '$2y$10$d/jE61OcDJyj6FC2FBWBR.dZPyw1X2yddLuNoiOVPocwIpSkXzmOe', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (130, 'Augustus Schaden', 'vshields@example.com', '1-609-860-7362', NULL, 2, 1, NULL, '$2y$10$cvmYHk97LxNGUbYTG3kwj.qs5lfQQBvAu1u/0JgcDmPKq0Y2YHzpi', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (131, 'Kayli Goodwin', 'asia61@example.net', '+1-516-297-5934', NULL, 2, 1, NULL, '$2y$10$YyN1GTWqyVQ.hKZmxifiSeT4V65yq.DAXjBc/d65WipYRVAlwfAM2', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (132, 'Henriette Bauch', 'lehner.dave@example.org', '+1 (657) 830-1029', NULL, 2, 1, NULL, '$2y$10$s8eIghzUb3nBPejG5HQaUuwyh74JIeZo0By5pLVsTErHQGfGCLRrq', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (133, 'Jeffry Anderson V', 'craig.spinka@example.net', '667-806-2025', NULL, 2, 1, NULL, '$2y$10$skbRXZuiAZTvi7IVhcnMmOV1.h7EtlYIlHo.suvRcHlQZ3973Ineq', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (134, 'Alisha Deckow', 'ureynolds@example.net', '+16287754659', NULL, 2, 1, NULL, '$2y$10$uoSBJZwsy8bpNWYNvmUfYuf0B.raP.ELJ/c9fvk.AXaR2rP71vjbS', NULL, '2023-12-06 20:14:43', '2023-12-06 20:14:43');
INSERT INTO `users` VALUES (135, 'Prof. Jamey Lesch Jr.', 'torphy.emmalee@example.org', '(480) 747-0267', NULL, 2, 1, NULL, '$2y$10$.u7iHno1S6lDYxOi8MHRt.hfgcOIdwgfYKx8yes8qsQlYm1eUsUwC', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (136, 'Brennan Leffler', 'patience.kohler@example.org', '1-470-869-2254', NULL, 2, 1, NULL, '$2y$10$oiFWh6yqLbp4PQpE9pT7J.ioe0xFmxWGgKplLmciKomfcP/fB.yVe', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (137, 'Oliver Champlin', 'stark.dovie@example.org', '559-698-1199', NULL, 2, 1, NULL, '$2y$10$n4LcIyBW3pFtmzXdOIHiTucaSR0yP.INuwFmNa/BMQ06c8MGgcGO2', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (138, 'Ocie Leannon', 'isabel52@example.net', '(804) 787-3298', NULL, 2, 1, NULL, '$2y$10$CNIzO4dbGK0ae253.ukIhOzrNX6y2N8awn3eGnWqpyPgIQzraJnhO', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (139, 'Thad Larkin', 'kautzer.price@example.com', '540.579.5076', NULL, 2, 1, NULL, '$2y$10$pBd1sXc.cYuuZRyD2JY9i.jENpB7tZBKDqEw9qJcYgGFzjQI8inOm', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (140, 'Luna Hand V', 'ghodkiewicz@example.net', '234.967.2361', NULL, 2, 1, NULL, '$2y$10$W7YZkxIM.j/PY3du4miJNONvpVTFUINPgHFawOASfIHJyt1PwFo0y', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (141, 'Kariane Hammes', 'dandre.kreiger@example.net', '+1-419-266-1163', NULL, 2, 1, NULL, '$2y$10$MKSaHwFhmvHYgRCPsXbEqOWb.o42ku18TT0f1YAJjj4BXmX88AtCK', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (142, 'Ms. Katharina Klein I', 'elody.williamson@example.net', '713.952.1458', NULL, 2, 1, NULL, '$2y$10$xYvzcfyga3dGkEdqUPA7muwcpWD/Y1eJ3pYJ/GgtmyCkIZNj0aFz6', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (143, 'Akeem Prosacco', 'kristoffer88@example.com', '+1.512.999.5161', NULL, 2, 1, NULL, '$2y$10$2pRvXERD.fBBlDSE/cqg4eFYk1RKu/1swxSI970oeX1PTdsZjDjt2', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (144, 'Prof. Davonte Gottlieb', 'stanley.jakubowski@example.com', '1-332-763-7006', NULL, 2, 1, NULL, '$2y$10$FNJNdhIfU82Hcet6ONZABOxyLIt51roF2VuM1cGY3/MB4gYGEMHWu', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (145, 'Boyd Daniel', 'bartoletti.emmalee@example.org', '+1-415-567-7271', NULL, 2, 1, NULL, '$2y$10$7j9RjTtjsnrzTrSWcY9r7OiwT7/jGt2SZY0X2KHECr8td2D7LHyQa', NULL, '2023-12-06 20:14:44', '2023-12-06 20:14:44');
INSERT INTO `users` VALUES (146, 'Megane Conn', 'jules.fadel@example.org', '+1.283.375.9111', NULL, 2, 1, NULL, '$2y$10$/GtlOiIckYIRt6R2Bqj6I.j5mjpjeozNG9OBU2g6kaU06aJQjGM8u', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (147, 'Bill Johnson', 'daphnee18@example.com', '1-828-959-2261', NULL, 2, 1, NULL, '$2y$10$af6vpzl2pQp9FXyO4Q3aweRUwcaZ.pkr/t04Xw5H2hx0FlBnNqJtO', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (148, 'Emerson Buckridge', 'sally21@example.net', '737.417.8357', NULL, 2, 1, NULL, '$2y$10$9XCHm6kQhMZahnNI8rMg/OqVnfir3tj/t4A1/438F/971xdT1875G', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (149, 'Candelario Ward', 'ftoy@example.net', '434-457-3500', NULL, 2, 1, NULL, '$2y$10$Mz.qmoDbmkVOHm390BEFwuwDzMUbxs7B4m/U5/Wozmyo75NHLJUdG', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (150, 'Julie Kshlerin Sr.', 'cblock@example.org', '+1-551-240-4004', NULL, 2, 1, NULL, '$2y$10$k9iLV1GFQ6eLfSgGWAhWYugmMcq.Z8o1LkQ7yCd81Xo8z2yhwJduC', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (151, 'Prof. Giuseppe Price DVM', 'barrows.nicole@example.net', '626-620-5765', NULL, 2, 1, NULL, '$2y$10$YCb1luuEELQLl6dMpaXq/.4Rel/VQmEneDU37lp0E0AiO1x3vGFJW', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (152, 'Dr. Cyril Mertz', 'mariam16@example.org', '(364) 242-4968', NULL, 2, 1, NULL, '$2y$10$faL1lb4xxmHYBZTWmDh7teMwsdfSv91nMe3SCH5nIc0m5DthunEFq', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (153, 'Elissa Jones III', 'lindgren.kaleb@example.net', '913-658-8133', NULL, 2, 1, NULL, '$2y$10$ASCwY8NGT59QR1ku.M/CHOidHX0vD0y3K/.JvaBLib87XLkaYphaK', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (154, 'Jayme Bechtelar', 'ronaldo11@example.com', '(630) 294-6352', NULL, 2, 1, NULL, '$2y$10$NRfQ6VrXZM9t4tqCmX8TXOLKqTw.GX7lfuCeq1Z3NIZUTdyMjjOsq', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (155, 'Kyleigh Gutmann', 'jjakubowski@example.net', '+1.602.839.8121', NULL, 2, 1, NULL, '$2y$10$t/3sf2dySscwtKXenM2k.e3/30Y.7s.IVdPkk170V5oC0BzVxMKVW', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (156, 'Ladarius Halvorson', 'xhessel@example.net', '1-828-757-4194', NULL, 2, 1, NULL, '$2y$10$JSm/sKmYHwNmXd/qb3GXqeuwf2iAoM3t/58UVsOaCu9/y572N6F76', NULL, '2023-12-06 20:14:45', '2023-12-06 20:14:45');
INSERT INTO `users` VALUES (157, 'Forrest Larson', 'bashirian.katelin@example.com', '+13868328134', NULL, 2, 1, NULL, '$2y$10$EBw2hTYPejluwiatjoOI/eyjM.z00RveStmTN20.wvCTizu9Xywcu', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (158, 'Donnell Jast V', 'geffertz@example.org', '+1-351-557-3641', NULL, 2, 1, NULL, '$2y$10$olnkUYUfgVdMFZtOihDcQOqgP1MXJOCfHEVrTQCEzTJ/tZUEOEatW', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (159, 'Andres Dickinson II', 'muller.ronaldo@example.net', '(321) 823-5849', NULL, 2, 1, NULL, '$2y$10$85PRAeE0w7P2/qs9zRmBC./adpxUmh1IdUtLJskXBvMGPlIWxgh8u', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (160, 'Grace Runolfsdottir', 'krajcik.wilhelmine@example.net', '(617) 361-1924', NULL, 2, 1, NULL, '$2y$10$.4Ih.1APflqLcqyNYoi87.I9Gh4/YmZtjTCenMeoEFihYTzTBsX5q', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (161, 'Prof. Roxanne Bednar', 'shanahan.addison@example.com', '+18289402307', NULL, 2, 1, NULL, '$2y$10$xBN00Zo/vgiqrKkntpwr4OQFclPCGQ/DKHnVAl4z7iwE3Jh1dNJcm', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (162, 'Keaton Hessel', 'little.reymundo@example.org', '689.657.4893', NULL, 2, 1, NULL, '$2y$10$x9ObnMxstYsLnzdgIFsZP.iHLC/QEm/0Ul3/qKa/eCmDLcuMF.w3W', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (163, 'Trey Breitenberg', 'earl.renner@example.org', '234.500.1781', NULL, 2, 1, NULL, '$2y$10$c2wkzDaLdFl8vrOKhyjk4.np5jwavfQ6JKgsD8PWNusyg6qHPk18y', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (164, 'Queen Schultz', 'bernhard.sterling@example.org', '830-223-3543', NULL, 2, 1, NULL, '$2y$10$I2.M8Ex//6B4x92wK3eX6.dJLiphB4GXn/x2MN3D1gyk9Qf0/8kq6', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (165, 'Israel McClure', 'xkassulke@example.org', '775.704.8232', NULL, 2, 1, NULL, '$2y$10$jqhPhimUdQD/7VY98H.EFOAWfG5mXqRm2J6ZvBFAfo8kUwRC0/09q', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (166, 'Dr. Alena Harber PhD', 'wbernhard@example.org', '937-345-0249', NULL, 2, 1, NULL, '$2y$10$3hwrRKGWI7djbyLeraDPbOyixQK8FYJpg6cFrRaPB4agy1msiE90K', NULL, '2023-12-06 20:14:46', '2023-12-06 20:14:46');
INSERT INTO `users` VALUES (167, 'Erik Huel II', 'fcummerata@example.org', '1-402-896-7995', NULL, 2, 1, NULL, '$2y$10$0dlroR7K0oK9xKrcOJujZuAgYZixdXFNIk3YzUXhC7MJIoYD40CDy', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (168, 'Mr. Prince Breitenberg', 'lilliana68@example.org', '(341) 878-4748', NULL, 2, 1, NULL, '$2y$10$YYH0cTO8/B8Jn4P0Lf8AlOjK00yfcVx.KIh2RxYwnNSXexShKkx.q', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (169, 'D\'angelo Lindgren', 'kling.ellen@example.org', '1-517-303-8647', NULL, 2, 1, NULL, '$2y$10$hV41C7XU6LeIP4UtSHCKguPtMYVxP1mGHpp2Kyfy/5bHpxhdSf3vq', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (170, 'Prof. Brendan Ledner', 'brendon88@example.com', '+19896656271', NULL, 2, 1, NULL, '$2y$10$3PVTUtitoMoVZyY4uq20YOXycDmaE/PP.DtpYL8THGj1NQsvo15my', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (171, 'Adriana Maggio', 'smith.kian@example.org', '+1-678-429-3592', NULL, 2, 1, NULL, '$2y$10$WMZBIJ1bYasGcO5gVhwlMu5MptR33Neb9kycv8vWvAAWpjY1ZviZe', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (172, 'Carolina Gottlieb DVM', 'jacinto93@example.com', '+1-351-945-3594', NULL, 2, 1, NULL, '$2y$10$p1j5DodX78wjRRsAtqtzsu.bNj9CYbR3Hix3uvkryXmdbxRjUThuW', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (173, 'Ettie Nikolaus', 'dmedhurst@example.org', '1-854-725-1465', NULL, 2, 1, NULL, '$2y$10$MFxDVmv/uHi.yyyv1flsautfjgfl1vzxp1qNygdatvORLhntxas5a', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (174, 'Gilbert Stehr IV', 'kari88@example.com', '+1 (551) 433-2324', NULL, 2, 1, NULL, '$2y$10$twZ4f6/mcvDBNLyGZpx9/e2r8x6rzdo5RZTz3e6AAnxehHuixrqIa', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (175, 'Dr. Tito Yost', 'rodriguez.kevon@example.org', '+1-334-268-8207', NULL, 2, 1, NULL, '$2y$10$O88aqRALMVs/59cJmNKkde.bPcBJkxFy9axzfROIEnTw09AeQ5kzK', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (176, 'Prof. Monique McGlynn PhD', 'brooks47@example.com', '220.538.3565', NULL, 2, 1, NULL, '$2y$10$D2lEw.Cgjc/1EY6fsXk19uWqizsm64mxzewmuhOexOkiNYtvEXhb.', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (177, 'Prof. Elizabeth Rowe', 'emmitt10@example.com', '+1.603.602.1837', NULL, 2, 1, NULL, '$2y$10$WzipZeD0FJXyz8hEyUqUNOfJTJcX6.6VObhAHXo8zDoqSHDnHlHWW', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (178, 'Sophia Schoen', 'ufunk@example.org', '+1 (772) 899-5390', NULL, 2, 1, NULL, '$2y$10$nOr.Pmdngqxc/KTOMBiMcuhTo7mZXD0ik01zx7AL4FfraJFz3rHGK', NULL, '2023-12-06 20:14:47', '2023-12-06 20:14:47');
INSERT INTO `users` VALUES (179, 'Ms. Missouri Watsica I', 'damion.schinner@example.com', '+1-567-350-3938', NULL, 2, 1, NULL, '$2y$10$rsjK2NJTDGfWmSoHpOw0vuAii2h6.nIVKlnnVHQnq2pKpbXLD.IoG', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (180, 'Jacques Dickinson', 'arnoldo87@example.net', '+1-779-776-1291', NULL, 2, 1, NULL, '$2y$10$XkLH5arh0u8Exodwh94O1OgIIXXItGxtA8O0VAuJao8rNSpCFnxPa', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (181, 'Alvis Murazik', 'thiel.rubie@example.org', '+1.458.500.2858', NULL, 2, 1, NULL, '$2y$10$TVQbsU1jnt2UaFbgYHVodunpCEDPF1OBwGeBdEhMyxfUzqmOeGqQm', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (182, 'Prof. Alf Barrows V', 'mann.eunice@example.net', '386-992-3843', NULL, 2, 1, NULL, '$2y$10$uvqLdqcqjs5C4UetIz/DyuJ21rZ6kjRzDHEPzGh1hgfUhwWDzzGhC', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (183, 'Kelsie Kulas', 'veum.louvenia@example.com', '1-856-617-2604', NULL, 2, 1, NULL, '$2y$10$Lzv3Q2SNKZemXXq.1bZvi.oU0F8E1UCHpktCzdBGGmnBqMGE7DX0O', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (184, 'Jaida Tremblay MD', 'qstroman@example.com', '1-424-388-7399', NULL, 2, 1, NULL, '$2y$10$0Xz5Jn5hs.vEjZ02OTOFqejbe7fGgqKzOufpzj9q4dfiKRsSF82BO', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (185, 'Deron Anderson', 'baylee.toy@example.com', '281.645.2209', NULL, 2, 1, NULL, '$2y$10$azEO1SmyTsxs46BPHlO.9uzD0kVgKilY6g0jibRgviWmGap1ZMNke', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (186, 'Mr. Candelario Nikolaus PhD', 'nigel20@example.net', '973-254-8446', NULL, 2, 1, NULL, '$2y$10$89iBNJNjKI2EQ.H47XMveOUpJE7EBIJkT6ldQerGSmbLB5TPV2sVa', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (187, 'Prof. Dorothea Beatty III', 'deckow.cordell@example.com', '+1-737-786-1463', NULL, 2, 1, NULL, '$2y$10$OlxW3Ts7SQExoLEELBYcV./xvcNb3Rk1Mw.ii5XvySPdbHIXs8qom', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (188, 'Francisco O\'Keefe', 'connelly.abel@example.net', '(417) 807-7912', NULL, 2, 1, NULL, '$2y$10$9fSqGAfMWBZ4TlcUCNl9iuR6zkkR0Cb9e9i37LZJdXk9JdJLxmIdW', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (189, 'Adeline Berge', 'ythiel@example.org', '+18505999776', NULL, 2, 1, NULL, '$2y$10$6MYaMcXstKu3ePSmg7Qs2OivTHUEb343dKgKCmmCLRbKmGYylIiF6', NULL, '2023-12-06 20:14:48', '2023-12-06 20:14:48');
INSERT INTO `users` VALUES (190, 'Dr. Dedric Feest', 'brooklyn93@example.net', '(574) 416-5036', NULL, 2, 1, NULL, '$2y$10$AjF5M9D2arrW8CT1Mb2OEuWdOr0jtf1TlDnlz7pAeW/YG4UQstoXO', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (191, 'Prof. Yessenia Murphy', 'lura.morissette@example.net', '816-607-3308', NULL, 2, 1, NULL, '$2y$10$2wxv80YiEKRUVG4v9Dsyo.JRe9ZCoGMi.OpyVplCtXYtH8JMxKIqe', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (192, 'Kaylie Dare II', 'brook18@example.org', '+19418697002', NULL, 2, 1, NULL, '$2y$10$KdqZBMHluQ0zSG.kpN1IV.7TtjIN3pXfHQvZE1jetPyW5UV2dEtXS', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (193, 'Jabari Eichmann II', 'moises.wisoky@example.net', '(818) 319-1516', NULL, 2, 1, NULL, '$2y$10$EFph1OmCvv0uCo7apMpwYOXiboPKYBQ11Y21M.j2QKfklnNpXStE.', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (194, 'Floy Kautzer MD', 'lois95@example.org', '272.826.5085', NULL, 2, 1, NULL, '$2y$10$evHTzZZ8NKZ7TqU7Qnco.OERegkwAyDglYsrm3MY2FqzTeG6byqYy', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (195, 'Randi Donnelly', 'agoodwin@example.org', '240-672-0498', NULL, 2, 1, NULL, '$2y$10$zYlWuiftDkPA4yQwukZpEuGGCp2hAoQmMrqQjtdZBlal8ps3KoQBm', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (196, 'Shad Leffler', 'thodkiewicz@example.org', '279.500.2681', NULL, 2, 1, NULL, '$2y$10$uF.NOWApk5yg247c8u7touXe08bxq23zFIvhgrVvV4S1n0yTWDUfi', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (197, 'Jorge Abbott', 'annamarie44@example.net', '727-428-4830', NULL, 2, 1, NULL, '$2y$10$9Vw65D.AtZIFb8p8QsoKKeByLaaNunGmdCOORp2PVWdpBN0CUkY6W', NULL, '2023-12-06 20:14:49', '2023-12-06 20:14:49');
INSERT INTO `users` VALUES (198, 'Ike Schmeler', 'dorian.swaniawski@example.net', '+1-484-586-7903', NULL, 2, 1, NULL, '$2y$10$PWOp//mBTzP63Gif4TvboO6Z43nqH6l7GHoDyb0Uy9Q2m3NfhJAv2', NULL, '2023-12-06 20:14:50', '2023-12-06 20:14:50');
INSERT INTO `users` VALUES (199, 'Ms. Verlie Blick Sr.', 'chickle@example.net', '432-653-4004', NULL, 2, 1, NULL, '$2y$10$yQV8HY/EmeatG5VBlNSnruF1yvCxpNQ.b064ArVwd7nQOtqXX0QhC', NULL, '2023-12-06 20:14:50', '2023-12-06 20:14:50');
INSERT INTO `users` VALUES (200, 'Prof. Paula Boehm', 'strosin.peggie@example.net', '1-862-699-6390', NULL, 2, 1, NULL, '$2y$10$NYVlZOvCQZOwJa5VXPQnsOEsjqM01RXBb6FM7znI0pRxywGtVg/ZC', NULL, '2023-12-06 20:14:50', '2023-12-06 20:14:50');
INSERT INTO `users` VALUES (201, 'Antwon Hauck', 'ymoore@example.net', '+15205399638', NULL, 2, 1, NULL, '$2y$10$ILrApWfDYHFlM4vRxZ1KgOXDKxm.ZE68r87476LfimocDElUzG2ii', NULL, '2023-12-06 20:14:50', '2023-12-06 20:14:50');

SET FOREIGN_KEY_CHECKS = 1;
