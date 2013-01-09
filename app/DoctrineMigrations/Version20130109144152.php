<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130109144152 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE keyword_suggestions (id INT AUTO_INCREMENT NOT NULL, keyword_phrase VARCHAR(255) NOT NULL, data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE product_searches (id INT AUTO_INCREMENT NOT NULL, search_phrase VARCHAR(255) NOT NULL, product_data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE departments ADD deleted_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE products ADD deleted_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE contacts ADD deleted_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE orders ADD deleted_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE product_variants ADD deleted_at DATETIME DEFAULT NULL");
        $this->addSql("ALTER TABLE brands ADD deleted_at DATETIME DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE keyword_suggestions");
        $this->addSql("DROP TABLE product_searches");
        $this->addSql("ALTER TABLE brands DROP deleted_at");
        $this->addSql("ALTER TABLE contacts DROP deleted_at");
        $this->addSql("ALTER TABLE departments DROP deleted_at");
        $this->addSql("ALTER TABLE orders DROP deleted_at");
        $this->addSql("ALTER TABLE product_variants DROP deleted_at");
        $this->addSql("ALTER TABLE products DROP deleted_at");
    }
}
