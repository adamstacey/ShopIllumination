<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130214135140 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE keyword_suggestions (id INT AUTO_INCREMENT NOT NULL, keyword_phrase VARCHAR(255) NOT NULL, data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE product_searches (id INT AUTO_INCREMENT NOT NULL, search_phrase VARCHAR(255) NOT NULL, product_data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE images ADD public_path VARCHAR(255) DEFAULT NULL, DROP thumbnail_path, DROP medium_path, DROP large_path, CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE alignment alignment VARCHAR(10) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE link link VARCHAR(255) DEFAULT NULL, CHANGE object_type object_type VARCHAR(100) DEFAULT NULL, CHANGE image_type image_type VARCHAR(100) DEFAULT NULL, CHANGE object_id object_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE products CHANGE product_code product_code VARCHAR(100) DEFAULT NULL");
        $this->addSql("ALTER TABLE contacts ADD user_id INT DEFAULT NULL, DROP object_id, CHANGE contact_title_id contact_title_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contacts ADD CONSTRAINT FK_33401573A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)");
        $this->addSql("ALTER TABLE contacts ADD CONSTRAINT FK_3340157390BA1B2A FOREIGN KEY (contact_title_id) REFERENCES contact_titles (id)");
        $this->addSql("CREATE INDEX IDX_33401573A76ED395 ON contacts (user_id)");
        $this->addSql("CREATE INDEX IDX_3340157390BA1B2A ON contacts (contact_title_id)");
        $this->addSql("ALTER TABLE contact_email_addresses CHANGE contact_email_address_type_id contact_email_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D503E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D5035D408FBE FOREIGN KEY (contact_email_address_type_id) REFERENCES contact_email_address_types (id)");
        $this->addSql("CREATE INDEX IDX_FBD6D503E7A1254A ON contact_email_addresses (contact_id)");
        $this->addSql("CREATE INDEX IDX_FBD6D5035D408FBE ON contact_email_addresses (contact_email_address_type_id)");
        $this->addSql("ALTER TABLE contact_web_addresses CHANGE contact_web_address_type_id contact_web_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF745E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF7451E44B9BB FOREIGN KEY (contact_web_address_type_id) REFERENCES contact_web_address_types (id)");
        $this->addSql("CREATE INDEX IDX_90FEF745E7A1254A ON contact_web_addresses (contact_id)");
        $this->addSql("CREATE INDEX IDX_90FEF7451E44B9BB ON contact_web_addresses (contact_web_address_type_id)");
        $this->addSql("ALTER TABLE contact_numbers CHANGE contact_number_type_id contact_number_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78C12336C6 FOREIGN KEY (contact_number_type_id) REFERENCES contact_number_types (id)");
        $this->addSql("CREATE INDEX IDX_EDB1EB78E7A1254A ON contact_numbers (contact_id)");
        $this->addSql("CREATE INDEX IDX_EDB1EB78C12336C6 ON contact_numbers (contact_number_type_id)");
        $this->addSql("ALTER TABLE contact_addresses CHANGE contact_address_type_id contact_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL, CHANGE contact_title_id contact_title_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D5BE4435 FOREIGN KEY (contact_address_type_id) REFERENCES contact_address_types (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D90BA1B2A FOREIGN KEY (contact_title_id) REFERENCES contact_titles (id)");
        $this->addSql("CREATE INDEX IDX_13B566DE7A1254A ON contact_addresses (contact_id)");
        $this->addSql("CREATE INDEX IDX_13B566D5BE4435 ON contact_addresses (contact_address_type_id)");
        $this->addSql("CREATE INDEX IDX_13B566D90BA1B2A ON contact_addresses (contact_title_id)");
        $this->addSql("ALTER TABLE orders DROP royal_mail_import_line");
        $this->addSql("ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB8D9F6D38");
        $this->addSql("DROP INDEX FK_5242B8EB8D9F6D38 ON order_products");
        $this->addSql("ALTER TABLE order_products CHANGE order_id order_id INT NOT NULL, CHANGE product_id product_id INT NOT NULL");
        $this->addSql("ALTER TABLE department_descriptions DROP description_template");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE keyword_suggestions");
        $this->addSql("DROP TABLE product_searches");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566DE7A1254A");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D5BE4435");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D90BA1B2A");
        $this->addSql("DROP INDEX IDX_13B566DE7A1254A ON contact_addresses");
        $this->addSql("DROP INDEX IDX_13B566D5BE4435 ON contact_addresses");
        $this->addSql("DROP INDEX IDX_13B566D90BA1B2A ON contact_addresses");
        $this->addSql("ALTER TABLE contact_addresses CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_address_type_id contact_address_type_id INT NOT NULL, CHANGE contact_title_id contact_title_id INT NOT NULL");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D503E7A1254A");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D5035D408FBE");
        $this->addSql("DROP INDEX IDX_FBD6D503E7A1254A ON contact_email_addresses");
        $this->addSql("DROP INDEX IDX_FBD6D5035D408FBE ON contact_email_addresses");
        $this->addSql("ALTER TABLE contact_email_addresses CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_email_address_type_id contact_email_address_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contact_numbers DROP FOREIGN KEY FK_EDB1EB78E7A1254A");
        $this->addSql("ALTER TABLE contact_numbers DROP FOREIGN KEY FK_EDB1EB78C12336C6");
        $this->addSql("DROP INDEX IDX_EDB1EB78E7A1254A ON contact_numbers");
        $this->addSql("DROP INDEX IDX_EDB1EB78C12336C6 ON contact_numbers");
        $this->addSql("ALTER TABLE contact_numbers CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_number_type_id contact_number_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF745E7A1254A");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF7451E44B9BB");
        $this->addSql("DROP INDEX IDX_90FEF745E7A1254A ON contact_web_addresses");
        $this->addSql("DROP INDEX IDX_90FEF7451E44B9BB ON contact_web_addresses");
        $this->addSql("ALTER TABLE contact_web_addresses CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_web_address_type_id contact_web_address_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contacts DROP FOREIGN KEY FK_33401573A76ED395");
        $this->addSql("ALTER TABLE contacts DROP FOREIGN KEY FK_3340157390BA1B2A");
        $this->addSql("DROP INDEX IDX_33401573A76ED395 ON contacts");
        $this->addSql("DROP INDEX IDX_3340157390BA1B2A ON contacts");
        $this->addSql("ALTER TABLE contacts ADD object_id INT NOT NULL, DROP user_id, CHANGE contact_title_id contact_title_id INT NOT NULL");
        $this->addSql("ALTER TABLE department_descriptions ADD description_template LONGTEXT NOT NULL");
        $this->addSql("ALTER TABLE images CHANGE object_id object_id INT NOT NULL, CHANGE object_type object_type VARCHAR(100) NOT NULL, CHANGE image_type image_type VARCHAR(100) NOT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE alignment alignment VARCHAR(10) NOT NULL, CHANGE link link VARCHAR(255) NOT NULL, CHANGE public_path large_path VARCHAR(255) DEFAULT NULL");
        $this->addSql("ALTER TABLE order_products CHANGE order_id order_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("CREATE INDEX FK_5242B8EB8D9F6D38 ON order_products (order_id)");
        $this->addSql("ALTER TABLE orders ADD royal_mail_import_line INT NOT NULL");
        $this->addSql("ALTER TABLE products CHANGE product_code product_code VARCHAR(100) NOT NULL");
    }
}
