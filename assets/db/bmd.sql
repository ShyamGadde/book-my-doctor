-- Create users table
CREATE TABLE `bookmydoctor`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `fullname` VARCHAR(255) NOT NULL , `phone` VARCHAR(20) NOT NULL , `dob` DATE NOT NULL , `gender` ENUM('Male','Female','Other') NOT NULL , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE `idx_email` (`email`)) ENGINE = InnoDB;

-- Create doctors table
CREATE TABLE `bookmydoctor`.`doctors` (`id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `fullname` VARCHAR(255) NOT NULL , `phone` VARCHAR(20) NOT NULL , `dob` DATE NOT NULL , `gender` ENUM('Male','Female','Other') NOT NULL , `specialization` VARCHAR(255) NOT NULL , `degree` VARCHAR(255) NOT NULL , `experience` INT NOT NULL , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE `idx_email` (`email`)) ENGINE = InnoDB;

-- Create appointments table
CREATE TABLE `bookmydoctor`.`appointments` (`id` INT NOT NULL AUTO_INCREMENT , `doctor_id` INT NOT NULL , `user_id` INT NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), INDEX `idx_doctor_id_date` (`doctor_id`, `date`)) ENGINE = InnoDB;

-- Create indexes
ALTER TABLE `bookmydoctor`.`appointments` ADD INDEX `idx_user_id_date` (`user_id`, `date`);
