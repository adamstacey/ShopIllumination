<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121227142734 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE departments ADD CONSTRAINT FK_16AEB8D4727ACA70 FOREIGN KEY (parent_id) REFERENCES departments (id) ON DELETE SET NULL");
        $this->addSql("ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F90544F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F9056D947EBB FOREIGN KEY (logo_image_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B579644F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B5796AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("DROP INDEX product_option_group_id ON product_to_option");
        $this->addSql("ALTER TABLE product_to_option DROP product_option_group_id");
        $this->addSql("ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA04584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA0C964ABE2 FOREIGN KEY (product_option_id) REFERENCES product_options (id)");
        $this->addSql("ALTER TABLE products CHANGE inherited_delivery_band inherited_delivery_band NUMERIC(12, 4) DEFAULT NULL, CHANGE maximum_membership_card_discount maximum_membership_card_discount NUMERIC(12, 4) DEFAULT NULL");
        $this->addSql("ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE contacts ADD CONSTRAINT FK_3340157390BA1B2A FOREIGN KEY (contact_title_id) REFERENCES contact_titles (id)");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D503E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D5035D408FBE FOREIGN KEY (contact_email_address_type_id) REFERENCES contact_email_address_types (id)");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF745E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF7451E44B9BB FOREIGN KEY (contact_web_address_type_id) REFERENCES contact_web_address_types (id)");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78C12336C6 FOREIGN KEY (contact_number_type_id) REFERENCES contact_number_types (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D5BE4435 FOREIGN KEY (contact_address_type_id) REFERENCES contact_address_types (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D1D8E2517 FOREIGN KEY (contactTitle_id) REFERENCES contact_titles (id)");
        $this->addSql("DROP INDEX IDX_22817B84584665A ON product_to_feature");
        $this->addSql("ALTER TABLE product_to_feature DROP product_feature_id, CHANGE product_feature_group_id product_feature_group_id INT DEFAULT NULL, CHANGE product_id variant_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B83B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id)");
        $this->addSql("ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B89351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id)");
        $this->addSql("CREATE INDEX IDX_22817B83B69A9AF ON product_to_feature (variant_id)");
        $this->addSql("CREATE INDEX IDX_22817B89351284 ON product_to_feature (product_feature_group_id)");
        $this->addSql("ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9B5CBBC0F FOREIGN KEY (owner_contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9E315F242 FOREIGN KEY (assinged_to_contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475668279F0 FOREIGN KEY (guarantee_type_id) REFERENCES guarantee_types (id)");
        $this->addSql("ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475E2EAD863 FOREIGN KEY (guarantee_length_id) REFERENCES guarantee_lengths (id)");
        $this->addSql("ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD4584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA444584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA44D240BD1D FOREIGN KEY (linked_product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_variants DROP INDEX UNIQ_782839764584665A, ADD INDEX IDX_782839764584665A (product_id)");
        $this->addSql("ALTER TABLE product_variants ADD CONSTRAINT FK_782839764584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_options ADD CONSTRAINT FK_1ECE137ECA8AD7E FOREIGN KEY (product_option_group_id) REFERENCES product_option_groups (id)");
        $this->addSql("ALTER TABLE product_features ADD CONSTRAINT FK_7470B6849351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id)");
        $this->addSql("ALTER TABLE product_descriptions DROP INDEX UNIQ_44CA8CDD4584665A, ADD INDEX IDX_44CA8CDD4584665A (product_id)");
        $this->addSql("ALTER TABLE product_descriptions ADD CONSTRAINT FK_44CA8CDD4584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_descriptions ADD CONSTRAINT FK_44CA8CDD3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id)");
        $this->addSql("ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB4584665A FOREIGN KEY (product_id) REFERENCES order_products (id)");
        $this->addSql("ALTER TABLE order_discounts ADD CONSTRAINT FK_40D079408D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE order_notes ADD CONSTRAINT FK_8285D2718D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE order_donations ADD CONSTRAINT FK_716EF29AAE51FB5F FOREIGN KEY (orderId_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F054584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F05AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE department_descriptions DROP search_words");
        $this->addSql("ALTER TABLE department_descriptions ADD CONSTRAINT FK_3213CC74AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447FAE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447F9351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id)");
        $this->addSql("ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447F93C6E9BE FOREIGN KEY (default_product_feature_id) REFERENCES product_features (id)");
        $this->addSql("CREATE INDEX IDX_346447F9351284 ON department_to_feature (product_feature_group_id)");
        $this->addSql("CREATE INDEX IDX_346447F93C6E9BE ON department_to_feature (default_product_feature_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE brand_descriptions DROP FOREIGN KEY FK_4D8F90544F5D008");
        $this->addSql("ALTER TABLE brand_descriptions DROP FOREIGN KEY FK_4D8F9056D947EBB");
        $this->addSql("ALTER TABLE brand_to_department DROP FOREIGN KEY FK_B88B579644F5D008");
        $this->addSql("ALTER TABLE brand_to_department DROP FOREIGN KEY FK_B88B5796AE80F5DF");
        $this->addSql("ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9B5CBBC0F");
        $this->addSql("ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9E315F242");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566DE7A1254A");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D5BE4435");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D1D8E2517");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D503E7A1254A");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D5035D408FBE");
        $this->addSql("ALTER TABLE contact_numbers DROP FOREIGN KEY FK_EDB1EB78E7A1254A");
        $this->addSql("ALTER TABLE contact_numbers DROP FOREIGN KEY FK_EDB1EB78C12336C6");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF745E7A1254A");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF7451E44B9BB");
        $this->addSql("ALTER TABLE contacts DROP FOREIGN KEY FK_3340157390BA1B2A");
        $this->addSql("ALTER TABLE department_descriptions DROP FOREIGN KEY FK_3213CC74AE80F5DF");
        $this->addSql("ALTER TABLE department_descriptions ADD search_words LONGTEXT NOT NULL");
        $this->addSql("ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447FAE80F5DF");
        $this->addSql("ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447F9351284");
        $this->addSql("ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447F93C6E9BE");
        $this->addSql("DROP INDEX IDX_346447F9351284 ON department_to_feature");
        $this->addSql("DROP INDEX IDX_346447F93C6E9BE ON department_to_feature");
        $this->addSql("ALTER TABLE departments DROP FOREIGN KEY FK_16AEB8D4727ACA70");
        $this->addSql("ALTER TABLE guarantees DROP FOREIGN KEY FK_935E0475668279F0");
        $this->addSql("ALTER TABLE guarantees DROP FOREIGN KEY FK_935E0475E2EAD863");
        $this->addSql("ALTER TABLE order_discounts DROP FOREIGN KEY FK_40D079408D9F6D38");
        $this->addSql("ALTER TABLE order_donations DROP FOREIGN KEY FK_716EF29AAE51FB5F");
        $this->addSql("ALTER TABLE order_notes DROP FOREIGN KEY FK_8285D2718D9F6D38");
        $this->addSql("ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB8D9F6D38");
        $this->addSql("ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB4584665A");
        $this->addSql("ALTER TABLE product_descriptions DROP INDEX IDX_44CA8CDD4584665A, ADD UNIQUE INDEX UNIQ_44CA8CDD4584665A (product_id)");
        $this->addSql("ALTER TABLE product_descriptions DROP FOREIGN KEY FK_44CA8CDD4584665A");
        $this->addSql("ALTER TABLE product_descriptions DROP FOREIGN KEY FK_44CA8CDD3B69A9AF");
        $this->addSql("ALTER TABLE product_features DROP FOREIGN KEY FK_7470B6849351284");
        $this->addSql("ALTER TABLE product_links DROP FOREIGN KEY FK_70DEDA444584665A");
        $this->addSql("ALTER TABLE product_links DROP FOREIGN KEY FK_70DEDA44D240BD1D");
        $this->addSql("ALTER TABLE product_options DROP FOREIGN KEY FK_1ECE137ECA8AD7E");
        $this->addSql("ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD4584665A");
        $this->addSql("ALTER TABLE product_to_department DROP FOREIGN KEY FK_30C31F054584665A");
        $this->addSql("ALTER TABLE product_to_department DROP FOREIGN KEY FK_30C31F05AE80F5DF");
        $this->addSql("ALTER TABLE product_to_feature DROP FOREIGN KEY FK_22817B83B69A9AF");
        $this->addSql("ALTER TABLE product_to_feature DROP FOREIGN KEY FK_22817B89351284");
        $this->addSql("DROP INDEX IDX_22817B83B69A9AF ON product_to_feature");
        $this->addSql("DROP INDEX IDX_22817B89351284 ON product_to_feature");
        $this->addSql("ALTER TABLE product_to_feature ADD product_feature_id INT NOT NULL, CHANGE product_feature_group_id product_feature_group_id INT NOT NULL, CHANGE variant_id product_id INT DEFAULT NULL");
        $this->addSql("CREATE INDEX IDX_22817B84584665A ON product_to_feature (product_id)");
        $this->addSql("ALTER TABLE product_to_option DROP FOREIGN KEY FK_12F4BAA04584665A");
        $this->addSql("ALTER TABLE product_to_option DROP FOREIGN KEY FK_12F4BAA0C964ABE2");
        $this->addSql("ALTER TABLE product_to_option ADD product_option_group_id INT NOT NULL");
        $this->addSql("CREATE INDEX product_option_group_id ON product_to_option (product_option_group_id)");
        $this->addSql("ALTER TABLE product_variants DROP INDEX IDX_782839764584665A, ADD UNIQUE INDEX UNIQ_782839764584665A (product_id)");
        $this->addSql("ALTER TABLE product_variants DROP FOREIGN KEY FK_782839764584665A");
        $this->addSql("ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A44F5D008");
        $this->addSql("ALTER TABLE products CHANGE maximum_membership_card_discount maximum_membership_card_discount NUMERIC(12, 4) NOT NULL, CHANGE inherited_delivery_band inherited_delivery_band NUMERIC(12, 4) NOT NULL");
    }
}
