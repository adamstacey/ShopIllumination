SET FOREIGN_KEY_CHECKS = 0;
RENAME TABLE brand TO brands;
RENAME TABLE brand_description TO brand_descriptions;
RENAME TABLE bug TO bugs;
RENAME TABLE contact TO contacts;
RENAME TABLE contact_address TO contact_addresses;
RENAME TABLE contact_address_type TO contact_address_types;
RENAME TABLE contact_email_address TO contact_email_addresses;
RENAME TABLE contact_email_address_type TO contact_email_address_types;
RENAME TABLE contact_number TO contact_numbers;
RENAME TABLE contact_number_type TO contact_number_types;
RENAME TABLE contact_title TO contact_titles;
RENAME TABLE contact_web_address TO contact_web_addresses;
RENAME TABLE contact_web_address_type TO contact_web_address_types;
RENAME TABLE crawl_error TO crawl_errors;
RENAME TABLE department TO departments;
RENAME TABLE department_description TO department_descriptions;
RENAME TABLE file TO files;
RENAME TABLE guarantee TO guarantees;
RENAME TABLE guarantee_length TO guarantee_lengths;
RENAME TABLE guarantee_type TO guarantee_types;
RENAME TABLE image TO images;
RENAME TABLE keyword_suggestion TO keyword_suggestions;
RENAME TABLE link TO links;
RENAME TABLE membership_card TO membership_cards;
RENAME TABLE message TO messages;
RENAME TABLE `order` TO orders;
RENAME TABLE order_discount TO order_discounts;
RENAME TABLE order_donation TO order_donations;
RENAME TABLE order_note TO order_notes;
RENAME TABLE order_product TO order_products;
RENAME TABLE product TO products;
RENAME TABLE product_description TO product_descriptions;
RENAME TABLE product_feature TO product_features;
RENAME TABLE product_feature_group TO product_feature_groups;
RENAME TABLE product_index TO product_indexs;
RENAME TABLE product_link TO product_links;
RENAME TABLE product_option TO product_options;
RENAME TABLE product_option_group TO product_option_groups;
RENAME TABLE product_price TO product_prices;
RENAME TABLE product_search TO product_searchs;
RENAME TABLE redirect TO redirects;
RENAME TABLE setting TO settings;
RENAME TABLE statistic TO statistics;
RENAME TABLE taxonomy TO taxonomies;
RENAME TABLE user TO users;
RENAME TABLE user_key TO user_keys;
RENAME TABLE video TO videos;
RENAME TABLE voucher_code TO voucher_codes;
ALTER TABLE brands ENGINE=InnoDB;
ALTER TABLE brand_descriptions ENGINE=InnoDB;
ALTER TABLE bugs ENGINE=InnoDB;
ALTER TABLE contacts ENGINE=InnoDB;
ALTER TABLE contact_addresses ENGINE=InnoDB;
ALTER TABLE contact_address_types ENGINE=InnoDB;
ALTER TABLE contact_email_addresses ENGINE=InnoDB;
ALTER TABLE contact_email_address_types ENGINE=InnoDB;
ALTER TABLE contact_numbers ENGINE=InnoDB;
ALTER TABLE contact_number_types ENGINE=InnoDB;
ALTER TABLE contact_titles ENGINE=InnoDB;
ALTER TABLE contact_web_addresses ENGINE=InnoDB;
ALTER TABLE contact_web_address_types ENGINE=InnoDB;
ALTER TABLE crawl_errors ENGINE=InnoDB;
ALTER TABLE departments ENGINE=InnoDB;
ALTER TABLE department_descriptions ENGINE=InnoDB;
ALTER TABLE files ENGINE=InnoDB;
ALTER TABLE guarantees ENGINE=InnoDB;
ALTER TABLE guarantee_lengths ENGINE=InnoDB;
ALTER TABLE guarantee_types ENGINE=InnoDB;
ALTER TABLE images ENGINE=InnoDB;
ALTER TABLE keyword_suggestions ENGINE=InnoDB;
ALTER TABLE links ENGINE=InnoDB;
ALTER TABLE membership_cards ENGINE=InnoDB;
ALTER TABLE messages ENGINE=InnoDB;
ALTER TABLE orders ENGINE=InnoDB;
ALTER TABLE order_discounts ENGINE=InnoDB;
ALTER TABLE order_donations ENGINE=InnoDB;
ALTER TABLE order_notes ENGINE=InnoDB;
ALTER TABLE order_products ENGINE=InnoDB;
ALTER TABLE products ENGINE=InnoDB;
ALTER TABLE product_descriptions ENGINE=InnoDB;
ALTER TABLE product_features ENGINE=InnoDB;
ALTER TABLE product_feature_groups ENGINE=InnoDB;
ALTER TABLE product_indexs ENGINE=InnoDB;
ALTER TABLE product_links ENGINE=InnoDB;
ALTER TABLE product_options ENGINE=InnoDB;
ALTER TABLE product_option_groups ENGINE=InnoDB;
ALTER TABLE product_prices ENGINE=InnoDB;
ALTER TABLE product_searchs ENGINE=InnoDB;
ALTER TABLE redirects ENGINE=InnoDB;
ALTER TABLE settings ENGINE=InnoDB;
ALTER TABLE statistics ENGINE=InnoDB;
ALTER TABLE taxonomies ENGINE=InnoDB;
ALTER TABLE users ENGINE=InnoDB;
ALTER TABLE user_keys ENGINE=InnoDB;
ALTER TABLE videos ENGINE=InnoDB;
ALTER TABLE voucher_codes ENGINE=InnoDB;
ALTER TABLE department_to_feature ENGINE=InnoDB;
ALTER TABLE brand_to_department ENGINE=InnoDB;
ALTER TABLE object_index ENGINE=InnoDB;
ALTER TABLE product_to_department ENGINE=InnoDB;
ALTER TABLE product_to_feature ENGINE=InnoDB;
ALTER TABLE product_to_option ENGINE=InnoDB;
ALTER TABLE routing ENGINE=InnoDB;
DROP TABLE brand_index;
DROP TABLE department_index;
DROP TABLE product_index_copy;
DROP TABLE product_index_copy2;
DROP TABLE keyword_suggestions;
DROP TABLE product_indexs;
DROP TABLE product_searchs;
ALTER TABLE object_index CHANGE rebuild rebuild TINYINT(1) NOT NULL;
ALTER TABLE voucher_codes CHANGE active active TINYINT(1) NOT NULL;
ALTER TABLE membership_cards CHANGE active active TINYINT(1) NOT NULL;
ALTER TABLE messages CHANGE printed printed TINYINT(1) NOT NULL, CHANGE viewed viewed TINYINT(1) NOT NULL, CHANGE actioned actioned TINYINT(1) NOT NULL;
ALTER TABLE guarantees CHANGE guarantee_type_id guarantee_type_id INT DEFAULT NULL, CHANGE guarantee_length_id guarantee_length_id INT DEFAULT NULL;
ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475668279F0 FOREIGN KEY (guarantee_type_id) REFERENCES guarantee_types (id);
ALTER TABLE guarantees ADD CONSTRAINT FK_935E0475E2EAD863 FOREIGN KEY (guarantee_length_id) REFERENCES guarantee_lengths (id);
CREATE INDEX IDX_935E0475668279F0 ON guarantees (guarantee_type_id);
CREATE INDEX IDX_935E0475E2EAD863 ON guarantees (guarantee_length_id);
ALTER TABLE crawl_errors CHANGE actioned actioned TINYINT(1) NOT NULL;
ALTER TABLE bugs CHANGE owner_contact_id owner_contact_id INT DEFAULT NULL;
ALTER TABLE bugs CHANGE assigned_to_contact_id assigned_to_contact_id INT DEFAULT NULL;
ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9B5CBBC0F FOREIGN KEY (owner_contact_id) REFERENCES contacts (id);
ALTER TABLE bugs ADD CONSTRAINT FK_1E197C97AA06E72 FOREIGN KEY (assigned_to_contact_id) REFERENCES contacts (id);
CREATE INDEX IDX_1E197C9B5CBBC0F ON bugs (owner_contact_id);
CREATE INDEX IDX_1E197C97AA06E72 ON bugs (assigned_to_contact_id);
ALTER TABLE brand_descriptions CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE logo_image_id logo_image_id INT DEFAULT NULL, CHANGE brand name VARCHAR(255) NOT NULL;
ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F90544F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id);
ALTER TABLE brand_descriptions ADD CONSTRAINT FK_4D8F9056D947EBB FOREIGN KEY (logo_image_id) REFERENCES images (id);
CREATE INDEX IDX_4D8F90544F5D008 ON brand_descriptions (brand_id);
CREATE UNIQUE INDEX UNIQ_4D8F9056D947EBB ON brand_descriptions (logo_image_id);
ALTER TABLE brand_to_department CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE department_id department_id INT DEFAULT NULL;
ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B579644F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id);
ALTER TABLE brand_to_department ADD CONSTRAINT FK_B88B5796AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id);
CREATE INDEX IDX_B88B579644F5D008 ON brand_to_department (brand_id);
CREATE INDEX IDX_B88B5796AE80F5DF ON brand_to_department (department_id);
ALTER TABLE brands CHANGE request_a_brochure request_a_brochure TINYINT(1) NOT NULL, CHANGE request_a_sample request_a_sample TINYINT(1) NOT NULL, CHANGE hide_prices hide_prices TINYINT(1) NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL;
DELETE op from order_products op
  left join products p on op.product_id=p.id
where p.id is null AND op.product_id != 0;
UPDATE order_products SET product_id=NULL WHERE product_id=0;
DELETE od from order_discounts od
  left join orders o on od.order_id=o.id
where o.id is null AND od.order_id != 0;
UPDATE order_donations SET order_id=NULL WHERE order_id=0;
DELETE od from order_donations od
  left join orders o on od.order_id=o.id
where o.id is null AND od.order_id != 0;
UPDATE order_donations SET order_id=NULL WHERE order_id=0;
DROP INDEX search_idx ON orders;
ALTER TABLE orders CHANGE labels_printed labels_printed TINYINT(1) NOT NULL, CHANGE send_review_request send_review_request TINYINT(1) NOT NULL, CHANGE review_requested review_requested TINYINT(1) NOT NULL, CHANGE membership_card_purchased membership_card_purchased TINYINT(1) NOT NULL, CHANGE order_printed order_printed TINYINT(1) NOT NULL, CHANGE delivery_note_printed delivery_note_printed TINYINT(1) NOT NULL, CHANGE actioned actioned TINYINT(1) NOT NULL, CHANGE fraud_check_customer_ordered fraud_check_customer_ordered TINYINT(1) NOT NULL, CHANGE fraud_check_address_match fraud_check_address_match TINYINT(1) NOT NULL, CHANGE fraud_check_name_used_on_different_order fraud_check_name_used_on_different_order TINYINT(1) NOT NULL, CHANGE fraud_check_post_zip_code_used_on_different_order fraud_check_post_zip_code_used_on_different_order TINYINT(1) NOT NULL, CHANGE fraud_check_telephone_used_on_different_order fraud_check_telephone_used_on_different_order TINYINT(1) NOT NULL;
ALTER TABLE links CHANGE default_image default_image TINYINT(1) NOT NULL;
ALTER TABLE order_products CHANGE order_id order_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL, ADD variant_id INT NULL AFTER product_id;
ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
CREATE INDEX IDX_716EF29AAE51FB5F ON order_donations (order_id);
ALTER TABLE order_discounts CHANGE order_id order_id INT DEFAULT NULL;
ALTER TABLE order_discounts ADD CONSTRAINT FK_40D079408D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
CREATE INDEX IDX_40D079408D9F6D38 ON order_discounts (order_id);
ALTER TABLE order_notes CHANGE order_id order_id INT DEFAULT NULL, CHANGE notified notified TINYINT(1) NOT NULL;
ALTER TABLE order_notes ADD CONSTRAINT FK_8285D2718D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
CREATE INDEX IDX_8285D2718D9F6D38 ON order_notes (order_id);
ALTER TABLE order_donations CHANGE order_id order_id INT DEFAULT NULL;
ALTER TABLE order_donations ADD CONSTRAINT FK_716EF29A8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
CREATE INDEX IDX_716EF29A8D9F6D38 ON order_donations (order_id);
ALTER TABLE departments CHANGE parent_id parent_id INT DEFAULT NULL, CHANGE hide_prices hide_prices TINYINT(1) NOT NULL, CHANGE show_prices_out_of_hours show_prices_out_of_hours TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL, CHANGE check_delivery_band check_delivery_band TINYINT(1) NOT NULL;
ALTER TABLE department_to_feature CHANGE default_product_feature_id product_feature_id INT DEFAULT NULL, CHANGE active active TINYINT(1) NOT NULL, CHANGE department_id department_id INT DEFAULT NULL, CHANGE product_feature_group_id product_feature_group_id INT DEFAULT NULL, CHANGE display_on_filter display_on_filter TINYINT(1) NOT NULL, CHANGE display_on_listing display_on_listing TINYINT(1) NOT NULL, CHANGE display_on_product display_on_product TINYINT(1) NOT NULL;
ALTER TABLE department_descriptions DROP search_words, CHANGE department_id department_id INT DEFAULT NULL;
DELETE df FROM department_to_feature df
  left join product_features f on df.product_feature_id=f.id
where f.id is null AND df.product_feature_id != 0;
UPDATE department_to_feature SET product_feature_id=NULL WHERE product_feature_id=0;
DELETE df FROM department_to_feature df
  left join product_feature_groups fg on df.product_feature_group_id=fg.id
where fg.id is null AND df.product_feature_group_id != 0;
UPDATE department_to_feature SET product_feature_group_id=NULL WHERE product_feature_group_id=0;
DELETE d1 FROM departments d1
  left join departments d2 on d1.parent_id=d2.id
where d2.id is null AND d1.parent_id != 0;
UPDATE departments SET parent_id=NULL WHERE parent_id=0;
DROP INDEX search_idx ON departments;
ALTER TABLE departments ADD CONSTRAINT FK_16AEB8D4727ACA70 FOREIGN KEY (parent_id) REFERENCES departments (id) ON DELETE SET NULL;
CREATE INDEX IDX_16AEB8D4727ACA70 ON departments (parent_id);
DROP INDEX search_idx ON department_descriptions;
ALTER TABLE department_descriptions ADD CONSTRAINT FK_3213CC74AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id);
CREATE INDEX IDX_3213CC74AE80F5DF ON department_descriptions (department_id);
ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447FAE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id);
ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447F9351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id);
ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447FF383E752 FOREIGN KEY (product_feature_id) REFERENCES product_features (id);
CREATE INDEX IDX_346447FAE80F5DF ON department_to_feature (department_id);
CREATE INDEX IDX_346447F9351284 ON department_to_feature (product_feature_group_id);
CREATE INDEX IDX_346447FF383E752 ON department_to_feature (product_feature_id);
CREATE TABLE product_variant_descriptions (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, locale VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, prefix VARCHAR(255) DEFAULT NULL, tagline VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, short_description LONGTEXT NOT NULL, page_title VARCHAR(255) DEFAULT NULL, header VARCHAR(255) DEFAULT NULL, meta_description LONGTEXT DEFAULT NULL, meta_keywords LONGTEXT DEFAULT NULL, search_words LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_6F0B2FDC3B69A9AF (variant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE product_variants (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, status VARCHAR(1) NOT NULL, product_code VARCHAR(100) NOT NULL, alternative_product_codes LONGTEXT DEFAULT NULL, mpn VARCHAR(100) DEFAULT NULL, ean VARCHAR(14) DEFAULT NULL, upc VARCHAR(12) DEFAULT NULL, jan VARCHAR(13) DEFAULT NULL, isbn VARCHAR(13) DEFAULT NULL, weight NUMERIC(12, 2) DEFAULT NULL, length NUMERIC(12, 2) DEFAULT NULL, width NUMERIC(12, 2) DEFAULT NULL, height NUMERIC(12, 2) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_782839764584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
INSERT INTO product_variants (id, product_id, status, product_code, alternative_product_codes, mpn, ean, upc, jan, isbn, weight, length, width, height, created_at, updated_at) (SELECT id, id, status, product_code, alternative_product_codes, mpn, ean, upc, jan, isbn, weight, length, width, height, created_at, updated_at FROM products);
ALTER TABLE product_to_option CHANGE product_id variant_id INT DEFAULT NULL, ADD product_group_option_id INT DEFAULT NULL, DROP product_option_group_id, CHANGE active active TINYINT(1) NOT NULL, CHANGE product_option_id product_option_id INT DEFAULT NULL, CHANGE display_order display_order INT DEFAULT NULL;
ALTER TABLE products DROP product_group_id, DROP product_group_code, DROP mpn, DROP ean, DROP upc, DROP jan, DROP isbn, DROP weight, DROP length, DROP width, DROP height, CHANGE checked checked TINYINT(1) NOT NULL, CHANGE available_for_purchase available_for_purchase TINYINT(1) NOT NULL, CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE alternative_product_codes alternative_product_codes LONGTEXT DEFAULT NULL, CHANGE inherited_delivery_band inherited_delivery_band NUMERIC(12, 4) DEFAULT NULL, CHANGE hide_price hide_price TINYINT(1) NOT NULL, CHANGE show_price_out_of_hours show_price_out_of_hours TINYINT(1) NOT NULL, CHANGE feature_comparison feature_comparison TINYINT(1) NOT NULL, CHANGE downloadable downloadable TINYINT(1) NOT NULL, CHANGE special_offer special_offer TINYINT(1) NOT NULL, CHANGE recommended recommended TINYINT(1) NOT NULL, CHANGE accessory accessory TINYINT(1) NOT NULL, CHANGE new new TINYINT(1) NOT NULL, CHANGE sample_request sample_request TINYINT(1) NOT NULL, CHANGE membership_card_discount_available membership_card_discount_available TINYINT(1) NOT NULL, CHANGE maximum_membership_card_discount maximum_membership_card_discount NUMERIC(12, 4) DEFAULT NULL, CHANGE last_checked last_checked DATETIME DEFAULT NULL;
ALTER TABLE product_to_feature CHANGE product_id variant_id INT DEFAULT NULL, CHANGE active active TINYINT(1) NOT NULL, CHANGE product_feature_group_id product_feature_group_id INT DEFAULT NULL, CHANGE product_feature_id product_feature_id INT DEFAULT NULL, CHANGE display_order display_order INT DEFAULT NULL;
ALTER TABLE product_feature_groups CHANGE active active TINYINT(1) NOT NULL, CHANGE filter filter TINYINT(1) NOT NULL;
ALTER TABLE product_option_groups CHANGE active active TINYINT(1) NOT NULL;
ALTER TABLE product_prices CHANGE product_id variant_id INT DEFAULT NULL, CHANGE supplier_id supplier_id INT DEFAULT NULL, CHANGE display_order display_order INT DEFAULT NULL;
ALTER TABLE product_to_department CHANGE product_id product_id INT DEFAULT NULL, CHANGE department_id department_id INT DEFAULT NULL, CHANGE display_order display_order INT DEFAULT NULL;
ALTER TABLE product_descriptions CHANGE product_id product_id INT DEFAULT NULL, CHANGE prefix prefix VARCHAR(255) DEFAULT NULL, CHANGE tagline tagline VARCHAR(255) DEFAULT NULL, CHANGE page_title page_title VARCHAR(255) DEFAULT NULL, CHANGE header header VARCHAR(255) DEFAULT NULL, CHANGE meta_description meta_description LONGTEXT DEFAULT NULL, CHANGE meta_keywords meta_keywords LONGTEXT DEFAULT NULL, CHANGE search_words search_words LONGTEXT DEFAULT NULL, CHANGE product name VARCHAR(255) NOT NULL;
ALTER TABLE product_features CHANGE active active TINYINT(1) NOT NULL, CHANGE product_feature_group_id product_feature_group_id INT DEFAULT NULL, CHANGE filter filter TINYINT(1) NOT NULL;
ALTER TABLE product_options CHANGE active active TINYINT(1) NOT NULL, CHANGE product_option_group_id product_option_group_id INT DEFAULT NULL;
ALTER TABLE product_links CHANGE product_link_id linked_product_id INT DEFAULT NULL, CHANGE active active TINYINT(1) NOT NULL, CHANGE product_id product_id INT DEFAULT NULL;
DELETE pp FROM product_prices pp
  left join product_variants pv on pp.variant_id=pv.id
where pv.id is null AND pp.variant_id != 0;
UPDATE product_prices SET variant_id=NULL WHERE variant_id=0;
DELETE pl FROM product_links pl
  left join products p on pl.linked_product_id=p.id
where p.id is null AND pl.linked_product_id != 0;
UPDATE product_links SET linked_product_id=NULL WHERE linked_product_id=0;
DELETE pf FROM product_to_feature pf
  left join product_feature_groups fg on pf.product_feature_group_id=fg.id
where fg.id is null AND pf.product_feature_group_id != 0;
UPDATE product_to_feature SET product_feature_group_id=NULL WHERE product_feature_group_id=0;
DELETE pf FROM product_to_feature pf
  left join product_features f on pf.product_feature_id=f.id
where f.id is null AND pf.product_feature_id != 0;
UPDATE product_to_feature SET product_feature_id=NULL WHERE product_feature_id=0;
DELETE f FROM product_features f
  left join product_feature_groups fg on f.product_feature_group_id=fg.id
where fg.id is null AND f.product_feature_group_id != 0;
UPDATE product_features SET product_feature_group_id=NULL WHERE product_feature_group_id=0;
DELETE pd FROM product_to_department pd
  left join products p on pd.product_id=p.id
where p.id is null AND pd.product_id != 0;
UPDATE product_to_department SET product_id=NULL WHERE product_id=0;
DELETE pd FROM product_to_department pd
  left join departments d on pd.department_id=d.id
where d.id is null AND pd.department_id != 0;
UPDATE product_to_department SET department_id=NULL WHERE department_id=0;
ALTER TABLE product_variant_descriptions ADD CONSTRAINT FK_6F0B2FDC3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
ALTER TABLE product_variants ADD CONSTRAINT FK_782839764584665A FOREIGN KEY (product_id) REFERENCES products (id);
ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA03B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA055FC4413 FOREIGN KEY (product_group_option_id) REFERENCES product_option_groups (id);
ALTER TABLE product_to_option ADD CONSTRAINT FK_12F4BAA0C964ABE2 FOREIGN KEY (product_option_id) REFERENCES product_options (id);
CREATE INDEX IDX_12F4BAA03B69A9AF ON product_to_option (variant_id);
CREATE INDEX IDX_12F4BAA055FC4413 ON product_to_option (product_group_option_id);
CREATE INDEX IDX_12F4BAA0C964ABE2 ON product_to_option (product_option_id);
ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id);
ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B83B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
CREATE INDEX IDX_22817B89351284 ON product_to_feature (product_feature_group_id);
CREATE INDEX IDX_22817B8F383E752 ON product_to_feature (product_feature_id);
CREATE INDEX IDX_22817B83B69A9AF ON product_to_feature (variant_id);
ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B89351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id);
ALTER TABLE product_to_feature ADD CONSTRAINT FK_22817B8F383E752 FOREIGN KEY (product_feature_id) REFERENCES product_features (id);
ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
CREATE INDEX IDX_86B72CFD3B69A9AF ON product_prices (variant_id);
ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA444584665A FOREIGN KEY (product_id) REFERENCES products (id);
ALTER TABLE product_links ADD CONSTRAINT FK_70DEDA44D240BD1D FOREIGN KEY (linked_product_id) REFERENCES products (id);
CREATE INDEX IDX_70DEDA444584665A ON product_links (product_id);
CREATE INDEX IDX_70DEDA44D240BD1D ON product_links (linked_product_id);
ALTER TABLE product_options ADD CONSTRAINT FK_1ECE137ECA8AD7E FOREIGN KEY (product_option_group_id) REFERENCES product_option_groups (id);
CREATE INDEX IDX_1ECE137ECA8AD7E ON product_options (product_option_group_id);
ALTER TABLE product_features ADD CONSTRAINT FK_7470B6849351284 FOREIGN KEY (product_feature_group_id) REFERENCES product_feature_groups (id);
CREATE INDEX IDX_7470B6849351284 ON product_features (product_feature_group_id);
ALTER TABLE product_descriptions ADD CONSTRAINT FK_44CA8CDD4584665A FOREIGN KEY (product_id) REFERENCES products (id);
CREATE INDEX IDX_44CA8CDD4584665A ON product_descriptions (product_id);
ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F054584665A FOREIGN KEY (product_id) REFERENCES products (id);
ALTER TABLE product_to_department ADD CONSTRAINT FK_30C31F05AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id);
CREATE INDEX IDX_30C31F054584665A ON product_to_department (product_id);
CREATE INDEX IDX_30C31F05AE80F5DF ON product_to_department (department_id);
ALTER TABLE images ADD public_path VARCHAR(255) DEFAULT NULL AFTER original_path, DROP thumbnail_path, DROP medium_path, DROP large_path, CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE alignment alignment VARCHAR(10) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE link link VARCHAR(255) DEFAULT NULL, CHANGE object_type object_type VARCHAR(100) DEFAULT NULL, CHANGE image_type image_type VARCHAR(100) DEFAULT NULL, CHANGE object_id object_id INT DEFAULT NULL;
UPDATE images SET public_path = original_path;
ALTER TABLE users RENAME TO users_temp;
CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), INDEX IDX_1483A5E9E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE users ADD CONSTRAINT FK_1483A5E9E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);
ALTER TABLE users_temp CHANGE contact_id contact_id INT DEFAULT NULL;
UPDATE users_temp SET contact_id=NULL WHERE contact_id=0;
INSERT INTO users (id, contact_id, username, username_canonical, email, email_canonical, enabled, salt, password, roles, last_login, locked, expired, credentials_expired)
  SELECT id, contact_id, email_address, email_address, email_address, email_address, active, salt, password, 'a:0:{}', last_logged_in, false, false, false
  FROM users_temp;
DROP TABLE users_temp;
DROP TABLE user_keys;
ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9E7A1254A;
DROP INDEX IDX_1483A5E9E7A1254A ON users;
ALTER TABLE users DROP contact_id;
ALTER TABLE departments ADD deleted_at DATETIME DEFAULT NULL;
ALTER TABLE products ADD deleted_at DATETIME DEFAULT NULL;
ALTER TABLE contacts ADD deleted_at DATETIME DEFAULT NULL;
ALTER TABLE orders ADD deleted_at DATETIME DEFAULT NULL;
ALTER TABLE product_variants ADD deleted_at DATETIME DEFAULT NULL;
ALTER TABLE brands ADD deleted_at DATETIME DEFAULT NULL;
TRUNCATE bugs;
TRUNCATE contact_addresses;
TRUNCATE contact_email_addresses;
TRUNCATE contact_numbers;
TRUNCATE contact_web_addresses;
TRUNCATE contacts;
TRUNCATE users;
INSERT INTO users SET id = 1, username = 'me@adamstacey.co.uk', username_canonical = 'me@adamstacey.co.uk', email = 'me@adamstacey.co.uk', email_canonical = 'me@adamstacey.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 2, username = 'shaun476@gmail.com', username_canonical = 'shaun476@gmail.com', email = 'shaun476@gmail.com', email_canonical = 'shaun476@gmail.com', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 3, username = 'daniel@danielcannon.co.uk', username_canonical = 'daniel@danielcannon.co.uk', email = 'daniel@danielcannon.co.uk', email_canonical = 'daniel@danielcannon.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 4, username = 'arran@kitchenappliancecentre.co.uk', username_canonical = 'arran@kitchenappliancecentre.co.uk', email = 'arran@kitchenappliancecentre.co.uk', email_canonical = 'arran@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 5, username = 'sales@kitchenappliancecentre.co.uk', username_canonical = 'sales@kitchenappliancecentre.co.uk', email = 'sales@kitchenappliancecentre.co.uk', email_canonical = 'sales@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 6, username = 'rob@kitchenappliancecentre.co.uk', username_canonical = 'rob@kitchenappliancecentre.co.uk', email = 'rob@kitchenappliancecentre.co.uk', email_canonical = 'rob@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 7, username = 'sarahpotts@kitchenappliancecentre.co.uk', username_canonical = 'sarahpotts@kitchenappliancecentre.co.uk', email = 'sarahpotts@kitchenappliancecentre.co.uk', email_canonical = 'sarahpotts@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 8, username = 'customerservice@kitchenappliancecentre.co.uk', username_canonical = 'customerservice@kitchenappliancecentre.co.uk', email = 'customerservice@kitchenappliancecentre.co.uk', email_canonical = 'customerservice@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 9, username = 'delivery@kitchenappliancecentre.co.uk', username_canonical = 'delivery@kitchenappliancecentre.co.uk', email = 'delivery@kitchenappliancecentre.co.uk', email_canonical = 'delivery@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 10, username = 'deliveries@kitchenappliancecentre.co.uk', username_canonical = 'deliveries@kitchenappliancecentre.co.uk', email = 'deliveries@kitchenappliancecentre.co.uk', email_canonical = 'deliveries@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
INSERT INTO users SET id = 11, username = 'support@kitchenappliancecentre.co.uk', username_canonical = 'support@kitchenappliancecentre.co.uk', email = 'support@kitchenappliancecentre.co.uk', email_canonical = 'support@kitchenappliancecentre.co.uk', enabled = 1, salt = 'pm48rom2xmo4sg8wosck84ssoko0kc0', password = 'QNr/Lmk29CAtg2eyBk3vTOrmpmwnipSItvnJG6IFRO6TKHHK1pZXqSoF1usWfzTk7bdhIvFzGlWshNaQhSi1dQ==', last_login = '2013-03-04 07:07:28', locked = 0, expired = 0, roles = 'a:1:{i:0;s:10:"ROLE_ADMIN";}', credentials_expired = 0;
CREATE TABLE departments_tmp (id INT NOT NULL, parent_id INT DEFAULT NULL, status VARCHAR(1) NOT NULL, department_path LONGTEXT NOT NULL, hide_prices TINYINT(1) NOT NULL, show_prices_out_of_hours TINYINT(1) NOT NULL, membership_card_discount_available TINYINT(1) NOT NULL, maximum_membership_card_discount NUMERIC(12, 4) NOT NULL, delivery_band NUMERIC(12, 4) NOT NULL, inherited_delivery_band NUMERIC(12, 4) NOT NULL, check_delivery_band TINYINT(1) NOT NULL, display_order INT NOT NULL, lft INT NOT NULL, lvl INT NOT NULL, rgt INT NOT NULL, root INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_C7AFC1E2727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE keyword_suggestions (id INT AUTO_INCREMENT NOT NULL, keyword_phrase VARCHAR(255) NOT NULL, data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE product_searches (id INT AUTO_INCREMENT NOT NULL, search_phrase VARCHAR(255) NOT NULL, product_data LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE product_variant_to_feature (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, feature_group_id INT DEFAULT NULL, feature_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, display_order INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9118317A3B69A9AF (variant_id), INDEX IDX_9118317A87B97678 (feature_group_id), INDEX IDX_9118317A60E4B879 (feature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE product_variant_to_option (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, option_group_id INT DEFAULT NULL, option_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, price NUMERIC(12, 4) NOT NULL, price_type VARCHAR(1) NOT NULL, price_use VARCHAR(1) NOT NULL, display_order INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2B2DE52D3B69A9AF (variant_id), INDEX IDX_2B2DE52DDE23A8E3 (option_group_id), INDEX IDX_2B2DE52DA7C41D6F (option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE departments_tmp ADD CONSTRAINT FK_C7AFC1E2727ACA70 FOREIGN KEY (parent_id) REFERENCES departments_tmp (id) ON DELETE SET NULL;
ALTER TABLE product_variant_to_feature ADD CONSTRAINT FK_9118317A3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
ALTER TABLE product_variant_to_feature ADD CONSTRAINT FK_9118317A60E4B879 FOREIGN KEY (feature_group_id) REFERENCES product_feature_groups (id);
ALTER TABLE product_variant_to_feature ADD CONSTRAINT FK_9118317A60E4B889 FOREIGN KEY (feature_id) REFERENCES product_features (id);
ALTER TABLE product_variant_to_option ADD CONSTRAINT FK_2B2DE52D3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
ALTER TABLE product_variant_to_option ADD CONSTRAINT FK_2B2DE52DDE23A8E3 FOREIGN KEY (option_group_id) REFERENCES product_option_groups (id);
ALTER TABLE product_variant_to_option ADD CONSTRAINT FK_2B2DE52DA7C41D6F FOREIGN KEY (option_id) REFERENCES product_options (id);
INSERT INTO product_variant_to_feature (id, variant_id, feature_group_id, feature_id, active, display_order, created_at, updated_at) SELECT id, variant_id, product_feature_group_id	, product_feature_id, active, display_order, created_at, updated_at FROM product_to_feature;
DROP TABLE product_to_feature;
ALTER TABLE routing CHANGE object_type object_type VARCHAR(255) NOT NULL;
CREATE INDEX IDX_A5F8B9FA232D562B ON routing (object_id);
ALTER TABLE contact_addresses ADD type_id INT DEFAULT NULL, ADD title_id INT DEFAULT NULL, DROP contact_address_type_id, DROP contact_title_id, CHANGE contact_id contact_id INT DEFAULT NULL;
ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);
ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DC54C8C93 FOREIGN KEY (type_id) REFERENCES contact_address_types (id);
ALTER TABLE contact_addresses ADD CONSTRAINT FK_13B566DA9F87BD FOREIGN KEY (title_id) REFERENCES contact_titles (id);
CREATE INDEX IDX_13B566DE7A1254A ON contact_addresses (contact_id);
CREATE INDEX IDX_13B566DC54C8C93 ON contact_addresses (type_id);
CREATE INDEX IDX_13B566DA9F87BD ON contact_addresses (title_id);
ALTER TABLE contact_address_types CHANGE contact_address_type name VARCHAR(255) NOT NULL;
ALTER TABLE contact_email_addresses CHANGE contact_email_address_type_id contact_email_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL;
ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D503E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);
ALTER TABLE contact_email_addresses ADD CONSTRAINT FK_FBD6D5035D408FBE FOREIGN KEY (contact_email_address_type_id) REFERENCES contact_email_address_types (id);
CREATE INDEX IDX_FBD6D503E7A1254A ON contact_email_addresses (contact_id);
CREATE INDEX IDX_FBD6D5035D408FBE ON contact_email_addresses (contact_email_address_type_id);
ALTER TABLE contact_email_address_types CHANGE contact_email_address_type name VARCHAR(255) NOT NULL;
ALTER TABLE contact_numbers CHANGE contact_number_type_id contact_number_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL;
ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);
ALTER TABLE contact_numbers ADD CONSTRAINT FK_EDB1EB78C12336C6 FOREIGN KEY (contact_number_type_id) REFERENCES contact_number_types (id);
CREATE INDEX IDX_EDB1EB78E7A1254A ON contact_numbers (contact_id);
CREATE INDEX IDX_EDB1EB78C12336C6 ON contact_numbers (contact_number_type_id);
ALTER TABLE contact_number_types CHANGE contact_number_type name VARCHAR(255) NOT NULL;
ALTER TABLE contact_titles CHANGE contact_title name VARCHAR(255) NOT NULL;
ALTER TABLE contact_web_addresses CHANGE contact_web_address_type_id contact_web_address_type_id INT DEFAULT NULL, CHANGE contact_id contact_id INT DEFAULT NULL;
ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF745E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);
ALTER TABLE contact_web_addresses ADD CONSTRAINT FK_90FEF7451E44B9BB FOREIGN KEY (contact_web_address_type_id) REFERENCES contact_web_address_types (id);
CREATE INDEX IDX_90FEF745E7A1254A ON contact_web_addresses (contact_id);
CREATE INDEX IDX_90FEF7451E44B9BB ON contact_web_addresses (contact_web_address_type_id);
ALTER TABLE contact_web_address_types CHANGE contact_web_address_type name VARCHAR(255) NOT NULL;
ALTER TABLE contacts ADD user_id INT DEFAULT NULL, ADD title_id INT DEFAULT NULL, DROP object_id, DROP contact_title_id;
ALTER TABLE contacts ADD CONSTRAINT FK_33401573A76ED395 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE contacts ADD CONSTRAINT FK_33401573A9F87BD FOREIGN KEY (title_id) REFERENCES contact_titles (id);
CREATE INDEX IDX_33401573A76ED395 ON contacts (user_id);
CREATE INDEX IDX_33401573A9F87BD ON contacts (title_id);
ALTER TABLE department_descriptions DROP description_template;
ALTER TABLE departments ADD template VARCHAR(255) NOT NULL, ADD lft INT NOT NULL, ADD lvl INT NOT NULL, ADD rgt INT NOT NULL, ADD root INT DEFAULT NULL;
ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447F9351284;
ALTER TABLE department_to_feature DROP FOREIGN KEY FK_346447FF383E752;
DROP INDEX IDX_346447F9351284 ON department_to_feature;
DROP INDEX IDX_346447FF383E752 ON department_to_feature;
ALTER TABLE department_to_feature CHANGE product_feature_group_id feature_group_id INT DEFAULT NULL, CHANGE product_feature_id feature_id INT DEFAULT NULL;
ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447F87B97678 FOREIGN KEY (feature_group_id) REFERENCES product_feature_groups (id);
ALTER TABLE department_to_feature ADD CONSTRAINT FK_346447F60E4B879 FOREIGN KEY (feature_id) REFERENCES product_features (id);
CREATE INDEX IDX_346447F87B97678 ON department_to_feature (feature_group_id);
CREATE INDEX IDX_346447F60E4B879 ON department_to_feature (feature_id);
ALTER TABLE order_products CHANGE product name VARCHAR(255) NOT NULL, CHANGE short_description description VARCHAR(255) NOT NULL;
UPDATE order_products SET variant_id = NULL where variant_id = 0;
ALTER TABLE orders DROP royal_mail_import_line;
ALTER TABLE product_features DROP FOREIGN KEY FK_7470B6849351284;
DROP INDEX IDX_7470B6849351284 ON product_features;
ALTER TABLE product_features CHANGE product_feature_group_id feature_group_id INT DEFAULT NULL, CHANGE product_feature name VARCHAR(255) NOT NULL;
ALTER TABLE product_features ADD CONSTRAINT FK_7470B68487B97678 FOREIGN KEY (feature_group_id) REFERENCES product_feature_groups (id);
CREATE INDEX IDX_7470B68487B97678 ON product_features (feature_group_id);
ALTER TABLE product_feature_groups CHANGE product_feature_group name VARCHAR(255) NOT NULL;
ALTER TABLE product_options DROP FOREIGN KEY FK_1ECE137ECA8AD7E;
DROP INDEX IDX_1ECE137ECA8AD7E ON product_options;
ALTER TABLE product_options CHANGE product_option_group_id option_group_id INT DEFAULT NULL, CHANGE product_option name VARCHAR(255) NOT NULL;
ALTER TABLE product_options ADD CONSTRAINT FK_1ECE137DE23A8E3 FOREIGN KEY (option_group_id) REFERENCES product_option_groups (id);
CREATE INDEX IDX_1ECE137DE23A8E3 ON product_options (option_group_id);
ALTER TABLE product_option_groups CHANGE product_option_group name VARCHAR(255) NOT NULL;
ALTER TABLE products ADD template VARCHAR(255) NOT NULL, CHANGE product_code product_code VARCHAR(100) DEFAULT NULL;
ALTER TABLE department_descriptions CHANGE description description LONGTEXT DEFAULT NULL, CHANGE menu_title menu_title VARCHAR(255) DEFAULT NULL, CHANGE page_title page_title VARCHAR(255) DEFAULT NULL, CHANGE page_title_template page_title_template LONGTEXT DEFAULT NULL, CHANGE delivery_band_notes delivery_band_notes LONGTEXT DEFAULT NULL, CHANGE header header VARCHAR(255) DEFAULT NULL, CHANGE header_template header_template LONGTEXT DEFAULT NULL, CHANGE meta_description meta_description LONGTEXT DEFAULT NULL, CHANGE meta_description_template meta_description_template LONGTEXT DEFAULT NULL, CHANGE meta_keywords meta_keywords LONGTEXT DEFAULT NULL, CHANGE google_department google_department LONGTEXT DEFAULT NULL, CHANGE ebay_department ebay_department LONGTEXT DEFAULT NULL, CHANGE amazon_department amazon_department LONGTEXT DEFAULT NULL;
ALTER TABLE department_descriptions DROP delivery_band_notes;
ALTER TABLE departments DROP check_delivery_band;
ALTER TABLE departments_tmp DROP check_delivery_band;
ALTER TABLE routing CHANGE url url VARCHAR(255) NOT NULL;
CREATE UNIQUE INDEX UNIQ_A5F8B9FAF47645AE ON routing (url);
ALTER TABLE department_descriptions CHANGE google_department google_department LONGTEXT NOT NULL;
ALTER TABLE routing CHANGE object_id object_id INT DEFAULT NULL;
ALTER TABLE files CHANGE locale locale VARCHAR(5) NOT NULL;
ALTER TABLE images CHANGE locale locale VARCHAR(5) NOT NULL;
ALTER TABLE order_products DROP name;
ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB4584665A FOREIGN KEY (product_id) REFERENCES products (id);
ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB3B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
CREATE INDEX IDX_5242B8EB4584665A ON order_products (product_id);
CREATE INDEX IDX_5242B8EB3B69A9AF ON order_products (variant_id);
DELETE FROM departments WHERE (id = 1205) OR (id = 1207) OR (id = 1208) OR (id = 1210) OR (id = 1211) OR (id = 1212) OR (id = 1213) OR (id = 1216);
ALTER TABLE product_descriptions DROP name, DROP search_words, CHANGE short_description brand_description LONGTEXT NOT NULL;
ALTER TABLE product_variant_descriptions DROP name, DROP search_words, CHANGE short_description brand_description LONGTEXT NOT NULL;
ALTER TABLE product_descriptions CHANGE prefix extra_keywords VARCHAR(255) DEFAULT NULL, CHANGE tagline key_message VARCHAR(255) DEFAULT NULL;
ALTER TABLE product_variant_descriptions CHANGE prefix extra_keywords VARCHAR(255) DEFAULT NULL, CHANGE tagline key_message VARCHAR(255) DEFAULT NULL;
ALTER TABLE product_variants ADD delivery_band NUMERIC(12, 4) NOT NULL;
ALTER TABLE product_variant_descriptions ADD override TINYINT(1) NOT NULL;
ALTER TABLE product_descriptions CHANGE locale locale VARCHAR(5) NOT NULL;
ALTER TABLE product_variant_descriptions CHANGE locale locale VARCHAR(5) NOT NULL;
ALTER TABLE product_variant_descriptions CHANGE description description LONGTEXT DEFAULT NULL, CHANGE brand_description brand_description LONGTEXT DEFAULT NULL;
ALTER TABLE routing CHANGE locale locale VARCHAR(5) NOT NULL;
ALTER TABLE product_variants ADD display_order INT DEFAULT NULL;
ALTER TABLE product_descriptions ADD override TINYINT(1) NOT NULL, DROP extra_keywords, DROP key_message, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE brand_description brand_description LONGTEXT DEFAULT NULL;
ALTER TABLE product_prices ADD hide_price TINYINT(1) NOT NULL, ADD show_price_out_of_hours TINYINT(1) NOT NULL;
ALTER TABLE product_variants ADD delivery_cost NUMERIC(12, 4) NOT NULL;
ALTER TABLE products DROP checked, DROP product_code, DROP alternative_product_codes, DROP delivery_band, DROP inherited_delivery_band, DROP delivery_cost, DROP hide_price, DROP show_price_out_of_hours, DROP membership_card_discount_available, DROP maximum_membership_card_discount, DROP last_checked;
ALTER TABLE departments DROP maximum_membership_card_discount, CHANGE membership_card_discount_available list_product_variants TINYINT(1) NOT NULL;
ALTER TABLE brands DROP membership_card_discount_available, DROP maximum_membership_card_discount;
ALTER TABLE departments_tmp DROP membership_card_discount_available, DROP maximum_membership_card_discount;
CREATE TABLE documents (id INT AUTO_INCREMENT NOT NULL, object_type VARCHAR(100) DEFAULT NULL, object_id INT DEFAULT NULL, document_type VARCHAR(100) DEFAULT NULL, locale VARCHAR(5) NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, file_extension VARCHAR(20) NOT NULL, file_size VARCHAR(20) NOT NULL, path VARCHAR(255) DEFAULT NULL, display_order INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE images ADD file_extension VARCHAR(20) NOT NULL, ADD file_size VARCHAR(20) NOT NULL;
ALTER TABLE documents CHANGE file_extension file_extension VARCHAR(20) DEFAULT NULL, CHANGE file_size file_size VARCHAR(20) DEFAULT NULL;
ALTER TABLE images CHANGE file_extension file_extension VARCHAR(20) DEFAULT NULL, CHANGE file_size file_size VARCHAR(20) DEFAULT NULL;
ALTER TABLE documents CHANGE file_size file_size INT DEFAULT NULL;
ALTER TABLE images DROP file_size;
ALTER TABLE images ADD file_size INT DEFAULT NULL;
DROP TABLE files;
ALTER TABLE documents DROP object_type;
ALTER TABLE documents ADD object_type VARCHAR(255) NOT NULL;
CREATE INDEX IDX_A2B07288232D562B ON documents (object_id);
ALTER TABLE images DROP object_type;
ALTER TABLE images ADD object_type VARCHAR(255) NOT NULL;
CREATE INDEX IDX_E01FBE6A232D562B ON images (object_id);
DROP TABLE departments_tmp;
DROP TABLE IF EXISTS descriptions_;
CREATE TABLE descriptions_ LIKE department_descriptions;
INSERT INTO descriptions_ SELECT * FROM `department_descriptions`;
UPDATE department_descriptions SET google_department = '0';
ALTER TABLE  `department_descriptions` CHANGE  `google_department`  `google_department` INT NOT NULL;

ALTER TABLE  `taxonomies` DEFAULT CHARACTER SET utf32 COLLATE utf32_unicode_ci;
ALTER TABLE  `taxonomies` CHANGE  `name`  `name` LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

UPDATE department_descriptions t1
  INNER JOIN descriptions_ t2
    ON t1.id = t2.id
  INNER JOIN taxonomies t3
    ON t2.google_department = t3.name
SET t1.google_department = t3.id;
DROP TABLE IF EXISTS descriptions_;
ALTER TABLE department_descriptions CHANGE google_department googleDepartment_id INT DEFAULT NULL;
ALTER TABLE department_descriptions ADD CONSTRAINT FK_3213CC7486EE50E2 FOREIGN KEY (googleDepartment_id) REFERENCES taxonomies (id);
CREATE INDEX IDX_3213CC7486EE50E2 ON department_descriptions (googleDepartment_id);
ALTER TABLE routing ADD secondary_id INT DEFAULT NULL;
CREATE INDEX IDX_A5F8B9FAC59D180C ON routing (secondary_id);
INSERT INTO `routing` (`object_id`, `object_type`, `locale`, `url`, `created_at`, `updated_at`, `secondary_id`) VALUES
(7, 'brand_with_department', 'en', 'brand/cda/kitchen-built-in-microwave-ovens', '2013-06-13 00:00:00', '2013-06-13 00:00:00', 11);
ALTER TABLE redirects ADD secondary_id INT NOT NULL;
UPDATE images i SET object_type = 'brand' WHERE (SELECT bd.id FROM brand_descriptions bd WHERE i.id = bd.logo_image_id) > 0;
UPDATE `images` SET `object_type`='product' WHERE image_type='product';
ALTER TABLE orders DROP membership_card_purchased, DROP membership_card_number;
UPDATE order_products SET variant_id = product_id WHERE variant_id IS NULL;
DELETE FROM `routing` WHERE object_type =  'department' AND 0 = ( SELECT COUNT( * ) FROM departments d  WHERE object_id = d.id );
ALTER TABLE product_links ADD category VARCHAR(255) DEFAULT NULL;
CREATE TABLE product_variant_links (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, linked_product_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, link_type VARCHAR(255) NOT NULL, category VARCHAR(255) DEFAULT NULL, display_order INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8BE522B73B69A9AF (variant_id), INDEX IDX_8BE522B7D240BD1D (linked_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE product_variant_links ADD CONSTRAINT FK_8BE522B73B69A9AF FOREIGN KEY (variant_id) REFERENCES product_variants (id);
ALTER TABLE product_variant_links ADD CONSTRAINT FK_8BE522B7D240BD1D FOREIGN KEY (linked_product_id) REFERENCES products (id);
ALTER TABLE routing ADD key0 VARCHAR(255) DEFAULT NULL, ADD value0 VARCHAR(255) DEFAULT NULL;
ALTER TABLE brands ADD template VARCHAR(255) NOT NULL;
DROP TABLE product_to_option;
UPDATE brands SET template='standard';
UPDATE brands SET template='maia' WHERE id = 15;
ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB4584665A;
ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB4584665A FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE SET NULL;
CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, object_type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE product_variants ADD type_id INT DEFAULT NULL;
ALTER TABLE product_variants ADD CONSTRAINT FK_78283976C54C8C93 FOREIGN KEY (type_id) REFERENCES types (id);
CREATE INDEX IDX_78283976C54C8C93 ON product_variants (type_id);
INSERT INTO `types` (`id`, `name`, `object_type`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'variant', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Worktops', 'variant', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Breakfast Bars', 'variant', '2013-07-12 00:00:00', '2013-07-12 00:00:00'),
(4, 'Island Worktops', 'variant', '2013-07-12 00:00:00', '2013-07-12 00:00:00'),
(5, 'Sink Modules', 'variant', '2013-07-12 00:00:00', '2013-07-12 00:00:00'),
(6, 'Edging', 'variant', '2013-07-12 00:00:00', '2013-07-12 00:00:00'),
(7, 'Finishing Touch', 'variant', '2013-07-12 00:00:00', '2013-07-12 00:00:00');
ALTER TABLE orders ADD royal_mail_import_line INT DEFAULT 0;
UPDATE order_products SET product_id = NULL, variant_id = NULL WHERE (SELECT COUNT(*) FROM products WHERE id = product_id) <= 0 OR (SELECT COUNT(*) FROM product_variants WHERE id = variant_id) <= 0;
ALTER TABLE  `order_products` DROP FOREIGN KEY  `FK_5242B8EB4584665A` ;
ALTER TABLE  `order_products` ADD CONSTRAINT  `FK_5242B8EB4584665A` FOREIGN KEY (  `product_id` ) REFERENCES  `kacstaging`.`products` (
  `id`
) ON DELETE SET NULL ON UPDATE SET NULL ;
ALTER TABLE  `order_products` DROP FOREIGN KEY  `FK_5242B8EB3B69A9AF` ;
ALTER TABLE  `order_products` ADD CONSTRAINT  `FK_5242B8EB3B69A9AF` FOREIGN KEY (  `variant_id` ) REFERENCES  `kacstaging`.`product_variants` (
  `id`
) ON DELETE SET NULL ON UPDATE SET NULL ;
ALTER TABLE  `product_links` DROP FOREIGN KEY  `FK_70DEDA444584665A` ;

ALTER TABLE  `product_links` ADD CONSTRAINT  `FK_70DEDA444584665A` FOREIGN KEY (  `product_id` ) REFERENCES  `kacstaging`.`products` (
  `id`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

ALTER TABLE  `product_links` DROP FOREIGN KEY  `FK_70DEDA44D240BD1D` ;

ALTER TABLE  `product_links` ADD CONSTRAINT  `FK_70DEDA44D240BD1D` FOREIGN KEY (  `linked_product_id` ) REFERENCES  `kacstaging`.`products` (
  `id`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

SET FOREIGN_KEY_CHECKS = 1;