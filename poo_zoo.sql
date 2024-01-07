CREATE TABLE `staff`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `age` INT NOT NULL,
    `gender` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `animal`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `weight` INT NOT NULL,
    `height` INT NOT NULL,
    `age` INT NOT NULL,
    `species` VARCHAR(255) NOT NULL,
    `id_enclosure` INT NOT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE
    `animal` ADD INDEX `animal_id_enclosure_index`(`id_enclosure`);
CREATE TABLE `zoo`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `max_enclosures` INT NOT NULL DEFAULT '10',
    `animals_count` INT NOT NULL,
    `id_staff` INT NOT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE
    `zoo` ADD INDEX `zoo_id_staff_index`(`id_staff`);
CREATE TABLE `enclosure`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `max_animals` INT NOT NULL DEFAULT '6',
    `cleanliness` VARCHAR(255) NOT NULL,
    `animals_count` INT NOT NULL,
    `id_zoo` INT NOT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE
    `enclosure` ADD INDEX `enclosure_id_zoo_index`(`id_zoo`);
ALTER TABLE
    `zoo` ADD CONSTRAINT `zoo_id_staff_foreign` FOREIGN KEY(`id_staff`) REFERENCES `staff`(`id`);
ALTER TABLE
    `enclosure` ADD CONSTRAINT `enclosure_id_zoo_foreign` FOREIGN KEY(`id_zoo`) REFERENCES `zoo`(`id`);
ALTER TABLE
    `animal` ADD CONSTRAINT `animal_id_enclosure_foreign` FOREIGN KEY(`id_enclosure`) REFERENCES `enclosure`(`id`);