CREATE SCHEMA IF NOT EXISTS `yiibook_ch23` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `yiibook_ch23` ;

-- -----------------------------------------------------
-- Table `yiibook_ch23`.`book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`book` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `price` INT UNSIGNED NOT NULL,
  `description` TEXT NULL,
  `author` VARCHAR(60) NOT NULL,
  `filename` VARCHAR(60) NOT NULL,
  `date_published` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

--
-- Dumping data for table `book`
--

INSERT INTO `book` VALUES (1,'The Yii Book',2000,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','yiibook.pdf','2024-12-31'),(2,'Effortless E-commerce with PHP and MySQL (2nd Edition)',4499,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','effortless-ecom-2nd.pdf','2013-11-30'),(3,'PHP and MySQL for Dynamic Web Sites: Visual QuickPro Guide (4th Edition)',40,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','php-mysql-4th.pdf','2012-08-16'),(4,'PHP for the Web: Visual QuickStart Guide (4th Edition)',2499,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','php-4th.pdf','2012-01-10'),(5,'Modern JavaScript: Develop and Design',4499,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','modern-javascript.pdf','2013-02-08'),(6,'Advanced PHP and Object-Oriented Programming: Visual QuickPro Guide (3rd Edition)',4499,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Larry Ullman','adv-php-3rd.pdf','2012-03-19');



-- -----------------------------------------------------
-- Table `yiibook_ch23`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`cart` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_session_id` CHAR(32) NOT NULL,
  `date_modified` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `customer_session_id_UNIQUE` (`customer_session_id` ASC)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `yiibook_ch23`.`cart_content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`cart_content` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` INT UNSIGNED NOT NULL,
  `book_id` INT UNSIGNED NOT NULL,
  `quantity` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_cart_idx` (`cart_id` ASC),
  CONSTRAINT `fk_cart_content`
    FOREIGN KEY (`cart_id`)
    REFERENCES `yiibook_ch23`.`cart` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  INDEX `fk_cart_books_idx` (`book_id` ASC),
  CONSTRAINT `fk_cart_books`
    FOREIGN KEY (`book_id`)
    REFERENCES `yiibook_ch23`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiibook_ch23`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`customer` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(80) NOT NULL,
  `pass` VARCHAR(255) NULL COMMENT '	',
  `get_emails` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `date_entered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiibook_ch23`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT UNSIGNED NOT NULL,
  `payment_id` payment_id INT UNSIGNED NOT NULL,
  `total` INT UNSIGNED NOT NULL,
  `date_entered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_users_idx` (`customer_id` ASC),
  INDEX `fk_orders_payments_idx` (`payment_id` ASC),
  CONSTRAINT `fk_orders_payments`
    FOREIGN KEY (`payment_id`)
    REFERENCES `yiibook_ch23`.`payment` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
  CONSTRAINT `fk_orders_users`
    FOREIGN KEY (`customer_id`)
    REFERENCES `yiibook_ch23`.`customer` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiibook_ch23`.`order_content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`order_content` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT UNSIGNED NOT NULL,
  `book_id` INT UNSIGNED NOT NULL,
  `quantity` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `price_per` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_content_order1_idx` (`order_id` ASC),
  INDEX `fk_order_content_book1_idx` (`book_id` ASC),
  CONSTRAINT `fk_order_content_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `yiibook_ch23`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_content_book1`
    FOREIGN KEY (`book_id`)
    REFERENCES `yiibook_ch23`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiibook_ch23`.`download`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`download` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT UNSIGNED NOT NULL,
  `book_id` SMALLINT UNSIGNED NOT NULL,
  `date_entered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_downloads_users1_idx` (`customer_id` ASC),
  INDEX `fk_downloads_books1_idx` (`book_id` ASC),
  CONSTRAINT `fk_downloads_users1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `yiibook_ch23`.`customer` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_downloads_books1`
    FOREIGN KEY (`book_id`)
    REFERENCES `yiibook_ch23`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiibook_ch23`.`password_token`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiibook_ch23`.`password_token` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT UNSIGNED NOT NULL,
  `token` CHAR(64) NOT NULL,
  `date_expires` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_password_tokens_users1_idx` (`customer_id` ASC),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC),
  CONSTRAINT `fk_password_tokens_users1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `yiibook_ch23`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


