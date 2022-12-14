

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles (id, display_name, created_at, updated_at, deleted_at) VALUES ('1','Administrator','','','');

INSERT INTO roles (id, display_name, created_at, updated_at, deleted_at) VALUES ('2','Employee','','','');


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `profile` varchar(191) DEFAULT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL DEFAULT '$2y$10$H6iMV6AdDJp4u3MyjgPIn.ZP5XJr8jUgdmVstQ1HkzzirukE7atW.',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, role_id, profile, fname, lname, address, contact, isApproved, username, password, remember_token, created_at, updated_at, deleted_at) VALUES ('1','1','','kevin felix','caluag','','','1','superadmin','$2y$10$kBa0r5Kg9c99BBxviiCn1OCII4/Zkc4fOzGm1a0/dRiXWA1hKnf0i','','','','');

INSERT INTO users (id, role_id, profile, fname, lname, address, contact, isApproved, username, password, remember_token, created_at, updated_at, deleted_at) VALUES ('5','2','','Employee','Employee','','','1','employee','$2y$10$H6iMV6AdDJp4u3MyjgPIn.ZP5XJr8jUgdmVstQ1HkzzirukE7atW.','','2022-12-14 18:30:54','2022-12-14 18:30:54','');

INSERT INTO users (id, role_id, profile, fname, lname, address, contact, isApproved, username, password, remember_token, created_at, updated_at, deleted_at) VALUES ('6','2','','sarah','mae','secret1','234234234','1','sarahtot','$2y$10$H6iMV6AdDJp4u3MyjgPIn.ZP5XJr8jUgdmVstQ1HkzzirukE7atW.','','2022-12-14 18:30:54','2022-12-14 18:30:54','');

INSERT INTO users (id, role_id, profile, fname, lname, address, contact, isApproved, username, password, remember_token, created_at, updated_at, deleted_at) VALUES ('7','2','','jodell','bulaclac','secret2','342342','1','jodelltot','$2y$10$H6iMV6AdDJp4u3MyjgPIn.ZP5XJr8jUgdmVstQ1HkzzirukE7atW.','','2022-12-14 18:30:54','2022-12-14 18:30:54','');

INSERT INTO users (id, role_id, profile, fname, lname, address, contact, isApproved, username, password, remember_token, created_at, updated_at, deleted_at) VALUES ('8','2','','jomari','mallare','secret3','234234','1','jomari20','$2y$10$H6iMV6AdDJp4u3MyjgPIn.ZP5XJr8jUgdmVstQ1HkzzirukE7atW.','','2022-12-14 18:30:54','2022-12-14 18:30:54','');


CREATE TABLE `temperatures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `temperature` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('1','37.20000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('2','37.20000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('3','45.80000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('4','45.80000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('5','45.80000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('6','37.20000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('7','20.30000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('8','37.20000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('9','50.20000000','0','','2022-12-14 18:29:24');

INSERT INTO temperatures (id, temperature, status, deleted_at, created_at) VALUES ('10','45.20000000','1','','2022-12-14 18:29:24');


CREATE TABLE `humidities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `humidity` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('1','60.50000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('2','60.50000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('3','45.52000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('4','45.52000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('5','45.52000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('6','60.50000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('7','25.50000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('8','60.50000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('9','55.20000000','0','','2022-12-14 18:29:24');

INSERT INTO humidities (id, humidity, status, deleted_at, created_at) VALUES ('10','65.80000000','1','','2022-12-14 18:29:24');


CREATE TABLE `carbondioxides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carbondioxideAmount` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('1','10000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('2','10000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('3','100.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('4','100.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('5','100.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('6','10000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('7','9000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('8','10000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('9','1000.20000000','0','','2022-12-14 18:29:24');

INSERT INTO carbondioxides (id, carbondioxideAmount, status, deleted_at, created_at) VALUES ('10','1300.20000000','1','','2022-12-14 18:29:24');


CREATE TABLE `lights` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lightsAmount` double(15,8) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('1','130.50000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('2','130.50000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('3','90.00000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('4','90.00000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('5','90.00000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('6','130.50000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('7','60.10000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('8','130.50000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('9','50.60000000','0','','2022-12-14 18:29:24');

INSERT INTO lights (id, lightsAmount, status, deleted_at, created_at) VALUES ('10','180.00000000','1','','2022-12-14 18:29:24');


CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sensor_id` int(11) NOT NULL,
  `notification_description` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(191) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('1','1','45 °C Temperature is to High','2022-12-14 18:29:24','0','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('2','1','30 °C Temperature is to High','2022-12-14 18:29:24','2','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('3','2','68% Humidity Is Too High','2022-12-14 18:29:24','0','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('4','2','30% Humidity Is Too Low','2022-12-14 18:29:24','2','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('5','3','200 lm Lights is to High','2022-12-14 18:29:24','0','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('6','3','150 lm Lights is to Low','2022-12-14 18:29:24','2','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('7','4','1000 ppm Carbon Dioxide is to High','2022-12-14 18:29:24','0','');

INSERT INTO notifications (id, sensor_id, notification_description, created_at, status, deleted_at) VALUES ('8','4','600 ppm Carbon Dioxide is to Low','2022-12-14 18:29:24','2','');


CREATE TABLE `sensorsconfigurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `configuration_name` varchar(191) NOT NULL,
  `mushroom_image` varchar(191) NOT NULL DEFAULT 'bg4.jpg',
  `description` varchar(191) NOT NULL,
  `configuration_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Preset Value For Sensors' CHECK (json_valid(`configuration_value`)),
  `isActive` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sensorsconfigurations (id, configuration_name, mushroom_image, description, configuration_value, isActive, created_at, updated_at, deleted_at) VALUES ('1','Oyster Mushroom','oysmush.webp','oyster mushroom, oyster fungus, or hiratake, is a common edible mushroom.','{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}','1','','','');

INSERT INTO sensorsconfigurations (id, configuration_name, mushroom_image, description, configuration_value, isActive, created_at, updated_at, deleted_at) VALUES ('2','Button Mushroom','btnmush.webp','White buttons feature the classic mushroom umami flavor that is slightly milder than other varieties of mushrooms.','{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}','0','','','');

INSERT INTO sensorsconfigurations (id, configuration_name, mushroom_image, description, configuration_value, isActive, created_at, updated_at, deleted_at) VALUES ('3','Cup Mushroom','btnmush.webp','Cup fungus refers to a wide group of fungi in the Pezizales order (phylum Ascomycota). These are typically identified by a disk- or cup-shaped structure','{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}','0','','','');
