CREATE TABLE `users` (
     `id` BIGINT(19) NOT NULL AUTO_INCREMENT,
     `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
     `email` VARCHAR(250) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
     `info` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
     PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB;

INSERT INTO users(username,email,info) VALUES ('admin','admin@mvc',' default admin');
INSERT INTO users(username,email,info) VALUES ('otus','otus@mvc',' default simple user');
