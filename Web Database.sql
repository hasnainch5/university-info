use hasnain_waleed_uni_scrape;
CREATE TABLE `bookmarked_universities_data` (
  `uni_id` varchar(50) NOT NULL,
  `username_id` varchar(12) NOT NULL,
  `id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username_idx` (`username_id`),
  KEY `university_id_idx` (`uni_id`),
  CONSTRAINT `university_id` FOREIGN KEY (`uni_id`) REFERENCES `uni_data` (`uni_id`),
  CONSTRAINT `username` FOREIGN KEY (`username_id`) REFERENCES `users_data` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `creatorinformation` (
  `emailAddress` varchar(45) NOT NULL,
  `firstName` varchar(10) DEFAULT NULL,
  `lastName` varchar(10) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `imagePath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `feedback` (
  `feedback` varchar(500) NOT NULL,
  `uni_id_` varchar(50) DEFAULT NULL,
  `username_id_` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`feedback`),
  KEY `username_idx` (`username_id_`),
  KEY `uni_idd_idx` (`uni_id_`),
  CONSTRAINT `uni_idd` FOREIGN KEY (`uni_id_`) REFERENCES `uni_data` (`uni_id`),
  CONSTRAINT `username_` FOREIGN KEY (`username_id_`) REFERENCES `users_data` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `postgraduate` (
  `id` varchar(50) NOT NULL,
  `uni_id` varchar(50) DEFAULT NULL,
  `name_course` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `un_id_idx` (`uni_id`),
  CONSTRAINT `un_id` FOREIGN KEY (`uni_id`) REFERENCES `uni_data` (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `undergraduate` (
  `id` varchar(50) NOT NULL,
  `uni_id` varchar(50) DEFAULT NULL,
  `name_course` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id_idx` (`uni_id`),
  CONSTRAINT `u_id` FOREIGN KEY (`uni_id`) REFERENCES `uni_data` (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `uni_data` (
  `uni_id` varchar(50) NOT NULL,
  `uni_name` varchar(50) NOT NULL,
  `ranking` varchar(10) DEFAULT NULL,
  `image_link` varchar(300) DEFAULT NULL,
  `sector` varchar(30) DEFAULT NULL,
  `researchOutput` varchar(30) DEFAULT NULL,
  `student_currently_enrolled` varchar(30) DEFAULT NULL,
  `scholarship_availability` varchar(10) DEFAULT NULL,
  `faculty_count` varchar(50) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
CREATE TABLE `users_data` (
  `user_id` varchar(12) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



