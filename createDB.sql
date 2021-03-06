-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema eCommerce
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `eCommerce` ;

-- -----------------------------------------------------
-- Schema eCommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eCommerce` DEFAULT CHARACTER SET utf8 ;
USE `eCommerce` ;

-- -----------------------------------------------------
-- Table `eCommerce`.`admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`admins` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`addresses` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`addresses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `address1` VARCHAR(255) NULL,
  `address2` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  `state` VARCHAR(255) NULL,
  `zip` VARCHAR(255) NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`users` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `address_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_addresses1_idx` (`address_id` ASC),
  CONSTRAINT `fk_users_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `eCommerce`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`categories` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`products` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `price` VARCHAR(45) NULL,
  `img` VARCHAR(255) NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`category_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `eCommerce`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`orders` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NULL,
  `stripe_id` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `eCommerce`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`order_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`order_details` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`order_details` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  INDEX `fk_order_details_orders1_idx` (`order_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_order_details_products1_idx` (`product_id` ASC),
  CONSTRAINT `fk_order_details_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `eCommerce`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_details_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `eCommerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`billing_addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`billing_addresses` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`billing_addresses` (
  `address_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  INDEX `fk_billing_addresses_addresses1_idx` (`address_id` ASC),
  INDEX `fk_billing_addresses_orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_billing_addresses_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `eCommerce`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_billing_addresses_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `eCommerce`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eCommerce`.`shipping_addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eCommerce`.`shipping_addresses` ;

CREATE TABLE IF NOT EXISTS `eCommerce`.`shipping_addresses` (
  `address_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  INDEX `fk_shipping_addresses_addresses1_idx` (`address_id` ASC),
  INDEX `fk_shipping_addresses_orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_shipping_addresses_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `eCommerce`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shipping_addresses_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `eCommerce`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
