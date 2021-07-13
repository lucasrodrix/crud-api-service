<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713140555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_cart (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, customer_id INTEGER NOT NULL, datetime DATETIME NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E8DAD179395C3F3 ON app_cart (customer_id)');
        $this->addSql('CREATE TABLE cart_product (cart_id INTEGER NOT NULL, product_id INTEGER NOT NULL, PRIMARY KEY(cart_id, product_id))');
        $this->addSql('CREATE INDEX IDX_2890CCAA1AD5CDBF ON cart_product (cart_id)');
        $this->addSql('CREATE INDEX IDX_2890CCAA4584665A ON cart_product (product_id)');
        $this->addSql('CREATE TABLE app_customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(100) NOT NULL, phone_number VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE app_product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code VARCHAR(100) NOT NULL, title VARCHAR(200) NOT NULL, price INTEGER NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE app_cart');
        $this->addSql('DROP TABLE cart_product');
        $this->addSql('DROP TABLE app_customer');
        $this->addSql('DROP TABLE app_product');
    }
}
