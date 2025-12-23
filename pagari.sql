SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `blood_sugar`;
CREATE TABLE `blood_sugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `blood_sugar` VALUES
(2,1,135,'2025-09-01','2025-12-23 11:22:01'),
(3,1,142,'2025-09-02','2025-12-23 11:22:01'),
(4,1,128,'2025-09-03','2025-12-23 11:22:01'),
(5,1,150,'2025-09-04','2025-12-23 11:22:01'),
(6,1,138,'2025-09-05','2025-12-23 11:22:01'),
(7,1,132,'2025-09-06','2025-12-23 11:22:01'),
(8,1,140,'2025-09-07','2025-12-23 11:22:01'),
(9,3,25,'2025-12-23','2025-12-23 13:29:08'),
(10,2,50,'2025-12-23','2025-12-23 13:46:22');

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `education` VALUES
(1,'Apa Itu Gula Darah?','Gula darah adalah kadar glukosa yang terdapat di dalam darah. Kadar ini sangat dipengaruhi oleh pola makan, aktivitas fisik, dan kondisi kesehatan seseorang. Menjaga gula darah tetap stabil sangat penting untuk mencegah komplikasi kesehatan jangka panjang.','2025-12-23 11:22:37'),
(2,'Tips Mengontrol Gula Darah','Beberapa cara sederhana yang dapat dilakukan antara lain: mengatur pola makan, menghindari gula berlebih, rutin berolahraga, dan memantau gula darah secara berkala. Konsistensi adalah kunci utama.','2025-12-23 11:22:37');

DROP TABLE IF EXISTS `food_diary`;
CREATE TABLE `food_diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `gula` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `gula` decimal(5,2) DEFAULT NULL,
  `protein` decimal(5,2) DEFAULT NULL,
  `serat` decimal(5,2) DEFAULT NULL,
  `karbo` decimal(5,2) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `foods` VALUES
(1,'Apel Merah',10.00,0.30,2.40,14.00,'rendah_gula'),
(2,'Pisang',12.00,1.10,2.60,23.00,'sedang'),
(3,'Oatmeal',5.00,11.00,8.00,66.00,'tinggi_serat'),
(4,'Nasi Putih',1.00,2.70,0.40,28.00,'tinggi_karbo'),
(5,'Telur Rebus',1.00,13.00,0.00,1.00,'tinggi_protein'),
(6,'Dada Ayam',0.00,31.00,0.00,0.00,'tinggi_protein'),
(7,'Brokoli Kukus',2.00,3.00,2.60,7.00,'rendah_karbo');

DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `aktivitas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_activity` VALUES
(1,2,'Input gula darah','2025-12-22 17:52:24'),
(2,1,'Login ke aplikasi','2025-12-20 11:22:17'),
(3,1,'Input gula darah','2025-12-21 11:22:17'),
(4,3,'Melihat nutrisi makanan','2025-12-21 11:22:17'),
(5,1,'Input gula darah','2025-12-22 11:22:17'),
(6,1,'Melihat zona edukasi','2025-12-22 11:22:17'),
(7,1,'Update pengaturan akun','2025-12-23 11:22:17');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` VALUES
(1,'admin','admin@gmail.com','admin'),
(2,'Test User','test@mail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(3,'Demo User','demo@pagari.test','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

SET FOREIGN_KEY_CHECKS = 1;
