SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `{{ cookiecutter.project_slug }}` DEFAULT CHARACTER SET utf8 ;
USE `{{ cookiecutter.project_slug }}` ;

CREATE TABLE IF NOT EXISTS `{{ cookiecutter.project_slug }}`.`user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE INDEX `user_UNIQUE` (`username` ASC))
ENGINE = InnoDB;

INSERT INTO `{{ cookiecutter.project_slug }}`.`user` (`username`, `email`, `password`) VALUES
("admin", "admin@gmail.com", "888888"),
("supervisor", "supervisor@gmail.com", "888888");

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
