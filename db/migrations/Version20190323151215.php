<?php

declare(strict_types=1);

namespace DB\App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190323151215 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Added users table to the database';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql("CREATE TABLE `users` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `user_name` VARCHAR(45) NULL,
            `password` VARCHAR(45) NULL,
            `first_name` VARCHAR(45) NULL,
            `last_name` VARCHAR(45) NULL,
            PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql("DROP TABLE `users`");
    }
}
