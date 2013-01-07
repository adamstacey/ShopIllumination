<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121216120027 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE brand_indexes");
        $this->addSql("DROP TABLE department_indexes");
        $this->addSql("DROP TABLE product_indexes");
        $this->addSql("ALTER TABLE object_indexes CHANGE rebuild rebuild TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE voucher_codes CHANGE active active TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE membership_cards CHANGE active active TINYINT(1) NOT NULL");
        $this->addSql("DROP INDEX search_idx ON departments");
        $this->addSql("ALTER TABLE departments CHANGE parent_id parent_id INT DEFAULT NULL, CHANGE hide_prices hide_prices TINYINT(1) NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL, CHANGE check_delivery_band check_delivery_band TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE departments ADD CONSTRAINT FK_16AEB8D4727ACA70 FOREIGN KEY (parent_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE brand_descriptions DROP INDEX FK_4D8F9056D947EBB, ADD UNIQUE INDEX UNIQ_4D8F9056D947EBB (logo_image_id)");
        $this->addSql("ALTER TABLE brand_descriptions CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE logo_image_id logo_image_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F90544F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F9056D947EBB FOREIGN KEY (logo_image_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE brand_to_department CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE department_id department_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B579644F5D008 FOREIGN KEY (brand_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B5796AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("CREATE INDEX IDX_B88B579644F5D008 ON brand_to_department (brand_id)");
        $this->addSql("CREATE INDEX IDX_B88B5796AE80F5DF ON brand_to_department (department_id)");
        $this->addSql("ALTER TABLE product_to_option DROP product_option_group_id, CHANGE product_id product_id INT DEFAULT NULL, CHANGE product_option_id product_option_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA04584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA0C964ABE2 FOREIGN KEY (product_option_id) REFERENCES product_options (id)");
        $this->addSql("CREATE INDEX IDX_12F4BAA04584665A ON product_to_option (product_id)");
        $this->addSql("CREATE INDEX IDX_12F4BAA0C964ABE2 ON product_to_option (product_option_id)");
        $this->addSql("ALTER TABLE products CHANGE checked checked TINYINT(1) NOT NULL, CHANGE available_for_purchase available_for_purchase TINYINT(1) NOT NULL, CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE hide_price hide_price TINYINT(1) NOT NULL, CHANGE show_price_out_of_hours show_price_out_of_hours TINYINT(1) NOT NULL, CHANGE feature_comparison feature_comparison TINYINT(1) NOT NULL, CHANGE downloadable downloadable TINYINT(1) NOT NULL, CHANGE special_offer special_offer TINYINT(1) NOT NULL, CHANGE recommended recommended TINYINT(1) NOT NULL, CHANGE accessory accessory TINYINT(1) NOT NULL, CHANGE new new TINYINT(1) NOT NULL, CHANGE sample_request sample_request TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)");
        $this->addSql("ALTER TABLE contacts CHANGE contact_title_id contact_title_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contacts ADD CONSTRAINT FK_3340157390BA1B2A FOREIGN KEY (contact_title_id) REFERENCES contact_titles (id)");
        $this->addSql("ALTER TABLE users CHANGE active active TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE contact_email_addresses CHANGE contact_email_address_type_id contact_email_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D503E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D5035D408FBE FOREIGN KEY (contact_email_address_type_id) REFERENCES contact_email_address_types (id)");
        $this->addSql("ALTER TABLE contact_web_addresses CHANGE contact_web_address_type_id contact_web_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF745E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF7451E44B9BB FOREIGN KEY (contact_web_address_type_id) REFERENCES contact_web_address_types (id)");
        $this->addSql("ALTER TABLE contact_numbers CHANGE contact_number_type_id contact_number_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78C12336C6 FOREIGN KEY (contact_number_type_id) REFERENCES contact_number_types (id)");
        $this->addSql("DROP INDEX FK_13B566D1D8E2517 ON contact_addresses");
        $this->addSql("ALTER TABLE contact_addresses ADD contactTitle_id INT DEFAULT NULL, DROP contact_title_id, CHANGE contact_address_type_id contact_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D5BE4435 FOREIGN KEY (contact_address_type_id) REFERENCES contact_address_types (id)");
        $this->addSql("ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566D1D8E2517 FOREIGN KEY (contactTitle_id) REFERENCES contact_titles (id)");
        $this->addSql("CREATE INDEX IDX_13B566D1D8E2517 ON contact_addresses (contactTitle_id)");
        $this->addSql("ALTER TABLE messages CHANGE printed printed TINYINT(1) NOT NULL, CHANGE viewed viewed TINYINT(1) NOT NULL, CHANGE actioned actioned TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE product_to_feature DROP product_feature_group_id, CHANGE product_id product_id INT DEFAULT NULL, CHANGE product_feature_id product_feature_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B84584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B8F383E752 FOREIGN KEY (product_feature_id) REFERENCES product_features (id)");
        $this->addSql("CREATE INDEX IDX_22817B84584665A ON product_to_feature (product_id)");
        $this->addSql("CREATE INDEX IDX_22817B8F383E752 ON product_to_feature (product_feature_id)");
        $this->addSql("ALTER TABLE crawl_errors CHANGE actioned actioned TINYINT(1) NOT NULL");
        $this->addSql("DROP INDEX FK_1E197C9B575D939 ON bugs");
        $this->addSql("ALTER TABLE bugs ADD assinged_to_contact_id INT DEFAULT NULL, DROP assigned_to_contact_id, CHANGE owner_contact_id owner_contact_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9B5CBBC0F FOREIGN KEY (owner_contact_id) REFERENCES contacts (id)");
        $this->addSql("ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9E315F242 FOREIGN KEY (assinged_to_contact_id) REFERENCES contacts (id)");
        $this->addSql("CREATE INDEX IDX_1E197C9E315F242 ON bugs (assinged_to_contact_id)");
        $this->addSql("DROP INDEX search_idx ON orders");
        $this->addSql("ALTER TABLE orders CHANGE labels_printed labels_printed TINYINT(1) NOT NULL, CHANGE send_review_request send_review_request TINYINT(1) NOT NULL, CHANGE review_requested review_requested TINYINT(1) NOT NULL, CHANGE membership_card_purchased membership_card_purchased TINYINT(1) NOT NULL, CHANGE order_printed order_printed TINYINT(1) NOT NULL, CHANGE delivery_note_printed delivery_note_printed TINYINT(1) NOT NULL, CHANGE actioned actioned TINYINT(1) NOT NULL, CHANGE fraud_check_customer_ordered fraud_check_customer_ordered TINYINT(1) NOT NULL, CHANGE fraud_check_address_match fraud_check_address_match TINYINT(1) NOT NULL, CHANGE fraud_check_name_used_on_different_order fraud_check_name_used_on_different_order TINYINT(1) NOT NULL, CHANGE fraud_check_post_zip_code_used_on_different_order fraud_check_post_zip_code_used_on_different_order TINYINT(1) NOT NULL, CHANGE fraud_check_telephone_used_on_different_order fraud_check_telephone_used_on_different_order TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE guarantees DROP display_order, CHANGE guarantee_type_id guarantee_type_id INT DEFAULT NULL, CHANGE guarantee_length_id guarantee_length_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475668279F0 FOREIGN KEY (guarantee_type_id) REFERENCES guarantee_types (id)");
        $this->addSql("ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475E2EAD863 FOREIGN KEY (guarantee_length_id) REFERENCES guarantee_lengths (id)");
        $this->addSql("ALTER TABLE product_feature_groups CHANGE active active TINYINT(1) NOT NULL, CHANGE filter filter TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE product_option_groups CHANGE active active TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE product_prices CHANGE product_id product_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD4584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_links CHANGE active active TINYINT(1) NOT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE linked_product_id linked_product_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA444584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA44D240BD1D FOREIGN KEY (linked_product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_searches ADD updated_at DATETIME NOT NULL");
        $this->addSql("ALTER TABLE product_options CHANGE active active TINYINT(1) NOT NULL, CHANGE product_option_group_id product_option_group_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_options ADD CONSTRAINT FK_1ECE137ECA8AD7E FOREIGN KEY (product_option_group_id) REFERENCES product_option_groups (id)");
        $this->addSql("ALTER TABLE product_features CHANGE active active TINYINT(1) NOT NULL, CHANGE product_feature_group_id product_feature_group_id INT DEFAULT NULL, CHANGE filter filter TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE product_features ADD CONSTRAINT FK_7470B6849351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id)");
        $this->addSql("ALTER TABLE product_descriptions CHANGE product_id product_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_descriptions ADD CONSTRAINT FK_44CA8CDD4584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE links CHANGE default_image default_image TINYINT(1) NOT NULL");
        $this->addSql("DROP INDEX FK_716EF29AAE51FB5F ON order_donations");
        $this->addSql("ALTER TABLE order_donations ADD orderId_id INT DEFAULT NULL, DROP order_id");
        $this->addSql("ALTER TABLE order_donations ADD CONSTRAINT FK_716EF29AAE51FB5F FOREIGN KEY (orderId_id) REFERENCES orders (id)");
        $this->addSql("CREATE INDEX IDX_716EF29AAE51FB5F ON order_donations (orderId_id)");
        $this->addSql("ALTER TABLE order_discounts CHANGE order_id order_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE order_discounts ADD CONSTRAINT FK_40D079408D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE order_notes CHANGE order_id order_id INT DEFAULT NULL, CHANGE notified notified TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE order_notes ADD CONSTRAINT FK_8285D2718D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("DROP INDEX FK_5242B8EB6E48E3E9 ON order_products");
        $this->addSql("ALTER TABLE order_products ADD productId_id INT DEFAULT NULL, DROP product_id, CHANGE order_id order_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)");
        $this->addSql("ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB6E48E3E9 FOREIGN KEY (productId_id) REFERENCES orders (id)");
        $this->addSql("CREATE INDEX IDX_5242B8EB6E48E3E9 ON order_products (productId_id)");
        $this->addSql("ALTER TABLE brands CHANGE request_a_brochure request_a_brochure TINYINT(1) NOT NULL, CHANGE request_a_sample request_a_sample TINYINT(1) NOT NULL, CHANGE hide_prices hide_prices TINYINT(1) NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL");
        $this->addSql("ALTER TABLE product_to_department CHANGE product_id product_id INT DEFAULT NULL, CHANGE department_id department_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F054584665A FOREIGN KEY (product_id) REFERENCES products (id)");
        $this->addSql("ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F05AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("CREATE INDEX IDX_30C31F054584665A ON product_to_department (product_id)");
        $this->addSql("CREATE INDEX IDX_30C31F05AE80F5DF ON product_to_department (department_id)");
        $this->addSql("DROP INDEX search_idx ON department_descriptions");
        $this->addSql("ALTER TABLE department_descriptions DROP search_words, CHANGE department_id department_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE department_descriptions ADD CONSTRAINT FK_3213CC74AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE department_to_feature ADD product_feature_id INT DEFAULT NULL, DROP product_feature_group_id, DROP default_product_feature_id, CHANGE department_id department_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447FAE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id)");
        $this->addSql("ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447FF383E752 FOREIGN KEY (product_feature_id) REFERENCES product_features (id)");
        $this->addSql("CREATE INDEX IDX_346447FAE80F5DF ON department_to_feature (department_id)");
        $this->addSql("CREATE INDEX IDX_346447FF383E752 ON department_to_feature (product_feature_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE contact_numbers DROP FOREIGN KEY FK_EDB1EB78C12336C6");
        $this->addSql("CREATE TABLE brand_indexes (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, status VARCHAR(1) NOT NULL, request_a_brochure INT NOT NULL, brochure_web_address VARCHAR(255) NOT NULL, request_a_sample INT NOT NULL, sample_web_address VARCHAR(255) NOT NULL, hide_prices INT NOT NULL, show_prices_out_of_hours INT NOT NULL, membership_card_discount_available INT NOT NULL, maximum_membership_card_discount NUMERIC(12, 4) NOT NULL, logo_image_id INT NOT NULL, locale VARCHAR(2) NOT NULL, brand VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, about LONGTEXT NOT NULL, history LONGTEXT NOT NULL, more_information LONGTEXT NOT NULL, page_title VARCHAR(255) NOT NULL, header VARCHAR(255) NOT NULL, meta_description LONGTEXT NOT NULL, search_words LONGTEXT NOT NULL, url LONGTEXT NOT NULL, product_count INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, meta_keywords LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE contact_number_type (id INT AUTO_INCREMENT NOT NULL, contact_number_type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, display_order INT NOT NULL, locale VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE department_indexes (id INT AUTO_INCREMENT NOT NULL, department_id INT NOT NULL, parent_id INT NOT NULL, status VARCHAR(1) NOT NULL, department_path LONGTEXT NOT NULL, hide_prices INT NOT NULL, show_prices_out_of_hours INT NOT NULL, membership_card_discount_available INT NOT NULL, maximum_membership_card_discount NUMERIC(12, 4) NOT NULL, delivery_band NUMERIC(12, 4) NOT NULL, check_delivery_band INT NOT NULL, inherited_delivery_band NUMERIC(12, 4) NOT NULL, display_order INT NOT NULL, locale VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, google_department LONGTEXT NOT NULL, ebay_department LONGTEXT NOT NULL, amazon_department LONGTEXT NOT NULL, description LONGTEXT NOT NULL, menu_title VARCHAR(255) NOT NULL, page_title VARCHAR(255) NOT NULL, page_title_template LONGTEXT NOT NULL, header VARCHAR(255) NOT NULL, meta_description LONGTEXT NOT NULL, meta_description_template LONGTEXT NOT NULL, meta_keywords LONGTEXT NOT NULL, search_words LONGTEXT NOT NULL, department_count INT NOT NULL, departmentIds LONGTEXT NOT NULL, departments LONGTEXT NOT NULL, product_count INT NOT NULL, direct_product_count INT NOT NULL, url LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, delivery_band_notes LONGTEXT NOT NULL, header_template LONGTEXT NOT NULL, INDEX search_idx (id, department_id, parent_id, status, display_order, locale, created_at, updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE product_indexes (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, product_group_id INT NOT NULL, status VARCHAR(1) NOT NULL, checked INT NOT NULL, available_for_purchase INT NOT NULL, product VARCHAR(255) NOT NULL, prefix VARCHAR(255) NOT NULL, tagline VARCHAR(255) NOT NULL, header VARCHAR(255) NOT NULL, page_title VARCHAR(255) NOT NULL, product_code VARCHAR(100) NOT NULL, product_group_code VARCHAR(100) NOT NULL, alternative_product_codes LONGTEXT NOT NULL, short_description LONGTEXT NOT NULL, description LONGTEXT NOT NULL, search_words LONGTEXT NOT NULL, special_offer INT NOT NULL, recommended INT NOT NULL, accessory INT NOT NULL, new INT NOT NULL, membership_card_discount_available INT NOT NULL, maximum_membership_card_discount NUMERIC(12, 4) NOT NULL, delivery_band NUMERIC(12, 4) NOT NULL, inherited_delivery_band NUMERIC(12, 4) NOT NULL, delivery_cost NUMERIC(12, 4) NOT NULL, weight NUMERIC(12, 4) NOT NULL, brand_id INT NOT NULL, brand VARCHAR(255) NOT NULL, brand_logo_thumbnail_path LONGTEXT NOT NULL, brand_url LONGTEXT NOT NULL, department_ids LONGTEXT NOT NULL, departments LONGTEXT NOT NULL, department_paths LONGTEXT NOT NULL, google_department LONGTEXT NOT NULL, ebay_department LONGTEXT NOT NULL, amazon_department LONGTEXT NOT NULL, product_options LONGTEXT NOT NULL, product_features LONGTEXT NOT NULL, additional_product_colours_count INT NOT NULL, additional_products_count INT NOT NULL, original_path LONGTEXT DEFAULT NULL, thumbnail_path LONGTEXT DEFAULT NULL, medium_path LONGTEXT DEFAULT NULL, large_path LONGTEXT DEFAULT NULL, cost_price NUMERIC(12, 4) NOT NULL, recommended_retail_price NUMERIC(12, 4) NOT NULL, list_price NUMERIC(12, 4) NOT NULL, membership_card_price NUMERIC(12, 4) NOT NULL, discount NUMERIC(12, 4) NOT NULL, savings NUMERIC(12, 4) NOT NULL, hide_price INT NOT NULL, show_price_out_of_hours INT NOT NULL, cheaper_alternative_price NUMERIC(12, 4) NOT NULL, cheaper_alternative_url LONGTEXT NOT NULL, currency_code VARCHAR(3) NOT NULL, url LONGTEXT NOT NULL, locale VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, guarantees LONGTEXT NOT NULL, INDEX search_idx (status, available_for_purchase, hide_price, show_price_out_of_hours, page_title, list_price, brand_id, locale, currency_code, product_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE contact_number_types");
        $this->addSql("ALTER TABLE brand_descriptions DROP INDEX UNIQ_4D8F9056D947EBB, ADD INDEX FK_4D8F9056D947EBB (logo_image_id)");
        $this->addSql("ALTER TABLE brand_descriptions DROP FOREIGN KEY FK_4D8F90544F5D008");
        $this->addSql("ALTER TABLE brand_descriptions DROP FOREIGN KEY FK_4D8F9056D947EBB");
        $this->addSql("ALTER TABLE brand_descriptions CHANGE brand_id brand_id INT NOT NULL, CHANGE logo_image_id logo_image_id INT NOT NULL");
        $this->addSql("ALTER TABLE brand_to_department DROP FOREIGN KEY FK_B88B579644F5D008");
        $this->addSql("ALTER TABLE brand_to_department DROP FOREIGN KEY FK_B88B5796AE80F5DF");
        $this->addSql("DROP INDEX IDX_B88B579644F5D008 ON brand_to_department");
        $this->addSql("DROP INDEX IDX_B88B5796AE80F5DF ON brand_to_department");
        $this->addSql("ALTER TABLE brand_to_department CHANGE brand_id brand_id INT NOT NULL, CHANGE department_id department_id INT NOT NULL");
        $this->addSql("ALTER TABLE brands CHANGE request_a_brochure request_a_brochure INT NOT NULL, CHANGE request_a_sample request_a_sample INT NOT NULL, CHANGE hide_prices hide_prices INT NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours INT NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available INT NOT NULL");
        $this->addSql("ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9B5CBBC0F");
        $this->addSql("ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9E315F242");
        $this->addSql("DROP INDEX IDX_1E197C9E315F242 ON bugs");
        $this->addSql("ALTER TABLE bugs ADD assigned_to_contact_id INT NOT NULL, DROP assinged_to_contact_id, CHANGE owner_contact_id owner_contact_id INT NOT NULL");
        $this->addSql("CREATE INDEX FK_1E197C9B575D939 ON bugs (assigned_to_contact_id)");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566DE7A1254A");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D5BE4435");
        $this->addSql("ALTER TABLE contact_addresses DROP FOREIGN KEY FK_13B566D1D8E2517");
        $this->addSql("DROP INDEX IDX_13B566D1D8E2517 ON contact_addresses");
        $this->addSql("ALTER TABLE contact_addresses ADD contact_title_id INT NOT NULL, DROP contactTitle_id, CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_address_type_id contact_address_type_id INT NOT NULL");
        $this->addSql("CREATE INDEX FK_13B566D1D8E2517 ON contact_addresses (contact_title_id)");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D503E7A1254A");
        $this->addSql("ALTER TABLE contact_email_addresses DROP FOREIGN KEY FK_FBD6D5035D408FBE");
        $this->addSql("ALTER TABLE contact_email_addresses CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_email_address_type_id contact_email_address_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contact_numbers CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_number_type_id contact_number_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF745E7A1254A");
        $this->addSql("ALTER TABLE contact_web_addresses DROP FOREIGN KEY FK_90FEF7451E44B9BB");
        $this->addSql("ALTER TABLE contact_web_addresses CHANGE contact_id contact_id INT NOT NULL, CHANGE contact_web_address_type_id contact_web_address_type_id INT NOT NULL");
        $this->addSql("ALTER TABLE contacts DROP FOREIGN KEY FK_3340157390BA1B2A");
        $this->addSql("ALTER TABLE contacts CHANGE contact_title_id contact_title_id INT NOT NULL");
        $this->addSql("ALTER TABLE crawl_errors CHANGE actioned actioned INT NOT NULL");
        $this->addSql("ALTER TABLE department_descriptions DROP FOREIGN KEY FK_3213CC74AE80F5DF");
        $this->addSql("ALTER TABLE department_descriptions ADD search_words LONGTEXT NOT NULL, CHANGE department_id department_id INT NOT NULL");
        $this->addSql("CREATE INDEX search_idx ON department_descriptions (id, department_id, locale, name, created_at, updated_at)");
        $this->addSql("ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447FAE80F5DF");
        $this->addSql("ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447FF383E752");
        $this->addSql("DROP INDEX IDX_346447FAE80F5DF ON department_to_feature");
        $this->addSql("DROP INDEX IDX_346447FF383E752 ON department_to_feature");
        $this->addSql("ALTER TABLE department_to_feature ADD product_feature_group_id INT NOT NULL, ADD default_product_feature_id INT NOT NULL, DROP product_feature_id, CHANGE department_id department_id INT NOT NULL");
        $this->addSql("ALTER TABLE departments DROP FOREIGN KEY FK_16AEB8D4727ACA70");
        $this->addSql("ALTER TABLE departments CHANGE parent_id parent_id INT NOT NULL, CHANGE hide_prices hide_prices INT NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours INT NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available INT NOT NULL, CHANGE check_delivery_band check_delivery_band INT NOT NULL");
        $this->addSql("CREATE INDEX search_idx ON departments (id, parent_id, status, hide_prices, show_prices_out_of_hours, membership_card_discount_available, maximum_membership_card_discount, delivery_band, inherited_delivery_band, check_delivery_band, display_order, created_at, updated_at)");
        $this->addSql("ALTER TABLE guarantees DROP FOREIGN KEY FK_935E0475668279F0");
        $this->addSql("ALTER TABLE guarantees DROP FOREIGN KEY FK_935E0475E2EAD863");
        $this->addSql("ALTER TABLE guarantees ADD display_order INT NOT NULL, CHANGE guarantee_type_id guarantee_type_id INT NOT NULL, CHANGE guarantee_length_id guarantee_length_id INT NOT NULL");
        $this->addSql("ALTER TABLE links CHANGE default_image default_image INT NOT NULL");
        $this->addSql("ALTER TABLE membership_cards CHANGE active active INT NOT NULL");
        $this->addSql("ALTER TABLE messages CHANGE printed printed INT NOT NULL, CHANGE viewed viewed INT NOT NULL, CHANGE actioned actioned INT NOT NULL");
        $this->addSql("ALTER TABLE object_indexes CHANGE rebuild rebuild INT NOT NULL");
        $this->addSql("ALTER TABLE order_discounts DROP FOREIGN KEY FK_40D079408D9F6D38");
        $this->addSql("ALTER TABLE order_discounts CHANGE order_id order_id INT NOT NULL");
        $this->addSql("ALTER TABLE order_donations DROP FOREIGN KEY FK_716EF29AAE51FB5F");
        $this->addSql("DROP INDEX IDX_716EF29AAE51FB5F ON order_donations");
        $this->addSql("ALTER TABLE order_donations ADD order_id INT NOT NULL, DROP orderId_id");
        $this->addSql("CREATE INDEX FK_716EF29AAE51FB5F ON order_donations (order_id)");
        $this->addSql("ALTER TABLE order_notes DROP FOREIGN KEY FK_8285D2718D9F6D38");
        $this->addSql("ALTER TABLE order_notes CHANGE order_id order_id INT NOT NULL, CHANGE notified notified INT NOT NULL");
        $this->addSql("ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB8D9F6D38");
        $this->addSql("ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB6E48E3E9");
        $this->addSql("DROP INDEX IDX_5242B8EB6E48E3E9 ON order_products");
        $this->addSql("ALTER TABLE order_products ADD product_id INT NOT NULL, DROP productId_id, CHANGE order_id order_id INT NOT NULL");
        $this->addSql("CREATE INDEX FK_5242B8EB6E48E3E9 ON order_products (product_id)");
        $this->addSql("ALTER TABLE orders CHANGE labels_printed labels_printed INT NOT NULL, CHANGE send_review_request send_review_request INT NOT NULL, CHANGE review_requested review_requested INT NOT NULL, CHANGE membership_card_purchased membership_card_purchased INT NOT NULL, CHANGE order_printed order_printed INT NOT NULL, CHANGE delivery_note_printed delivery_note_printed INT NOT NULL, CHANGE actioned actioned INT NOT NULL, CHANGE fraud_check_customer_ordered fraud_check_customer_ordered INT NOT NULL, CHANGE fraud_check_address_match fraud_check_address_match INT NOT NULL, CHANGE fraud_check_name_used_on_different_order fraud_check_name_used_on_different_order INT NOT NULL, CHANGE fraud_check_post_zip_code_used_on_different_order fraud_check_post_zip_code_used_on_different_order INT NOT NULL, CHANGE fraud_check_telephone_used_on_different_order fraud_check_telephone_used_on_different_order INT NOT NULL");
        $this->addSql("CREATE INDEX search_idx ON orders (id, status, total, created_at, updated_at)");
        $this->addSql("ALTER TABLE product_descriptions DROP FOREIGN KEY FK_44CA8CDD4584665A");
        $this->addSql("ALTER TABLE product_descriptions CHANGE product_id product_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_feature_groups CHANGE active active INT NOT NULL, CHANGE filter filter INT NOT NULL");
        $this->addSql("ALTER TABLE product_features DROP FOREIGN KEY FK_7470B6849351284");
        $this->addSql("ALTER TABLE product_features CHANGE product_feature_group_id product_feature_group_id INT NOT NULL, CHANGE active active INT NOT NULL, CHANGE filter filter INT NOT NULL");
        $this->addSql("ALTER TABLE product_links DROP FOREIGN KEY FK_70DEDA444584665A");
        $this->addSql("ALTER TABLE product_links DROP FOREIGN KEY FK_70DEDA44D240BD1D");
        $this->addSql("ALTER TABLE product_links CHANGE product_id product_id INT NOT NULL, CHANGE linked_product_id linked_product_id INT NOT NULL, CHANGE active active INT NOT NULL");
        $this->addSql("ALTER TABLE product_option_groups CHANGE active active INT NOT NULL");
        $this->addSql("ALTER TABLE product_options DROP FOREIGN KEY FK_1ECE137ECA8AD7E");
        $this->addSql("ALTER TABLE product_options CHANGE product_option_group_id product_option_group_id INT NOT NULL, CHANGE active active INT NOT NULL");
        $this->addSql("ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD4584665A");
        $this->addSql("ALTER TABLE product_prices CHANGE product_id product_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_searches DROP updated_at");
        $this->addSql("ALTER TABLE product_to_department DROP FOREIGN KEY FK_30C31F054584665A");
        $this->addSql("ALTER TABLE product_to_department DROP FOREIGN KEY FK_30C31F05AE80F5DF");
        $this->addSql("DROP INDEX IDX_30C31F054584665A ON product_to_department");
        $this->addSql("DROP INDEX IDX_30C31F05AE80F5DF ON product_to_department");
        $this->addSql("ALTER TABLE product_to_department CHANGE product_id product_id INT NOT NULL, CHANGE department_id department_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_to_feature DROP FOREIGN KEY FK_22817B84584665A");
        $this->addSql("ALTER TABLE product_to_feature DROP FOREIGN KEY FK_22817B8F383E752");
        $this->addSql("DROP INDEX IDX_22817B84584665A ON product_to_feature");
        $this->addSql("DROP INDEX IDX_22817B8F383E752 ON product_to_feature");
        $this->addSql("ALTER TABLE product_to_feature ADD product_feature_group_id INT NOT NULL, CHANGE product_id product_id INT NOT NULL, CHANGE product_feature_id product_feature_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_to_option DROP FOREIGN KEY FK_12F4BAA04584665A");
        $this->addSql("ALTER TABLE product_to_option DROP FOREIGN KEY FK_12F4BAA0C964ABE2");
        $this->addSql("DROP INDEX IDX_12F4BAA04584665A ON product_to_option");
        $this->addSql("DROP INDEX IDX_12F4BAA0C964ABE2 ON product_to_option");
        $this->addSql("ALTER TABLE product_to_option ADD product_option_group_id INT NOT NULL, CHANGE product_id product_id INT NOT NULL, CHANGE product_option_id product_option_id INT NOT NULL");
        $this->addSql("ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A44F5D008");
        $this->addSql("ALTER TABLE products CHANGE brand_id brand_id INT NOT NULL, CHANGE checked checked INT NOT NULL, CHANGE available_for_purchase available_for_purchase INT NOT NULL, CHANGE feature_comparison feature_comparison INT NOT NULL, CHANGE downloadable downloadable INT NOT NULL, CHANGE special_offer special_offer INT NOT NULL, CHANGE recommended recommended INT NOT NULL, CHANGE accessory accessory INT NOT NULL, CHANGE new new INT NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available INT NOT NULL, CHANGE sample_request sample_request INT NOT NULL, CHANGE hide_price hide_price INT NOT NULL, CHANGE show_price_out_of_hours show_price_out_of_hours INT NOT NULL");
        $this->addSql("ALTER TABLE users CHANGE active active INT NOT NULL");
        $this->addSql("ALTER TABLE voucher_codes CHANGE active active INT NOT NULL");
    }
}
