CREATE TABLE IF NOT EXISTS favorites
(
    `id` INT(11) AUTO_INCREMENT NOT NULL,
    `post_id` INT(11),
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY `post_id`(`post_id`) REFERENCES `posts`(`id`)
);
