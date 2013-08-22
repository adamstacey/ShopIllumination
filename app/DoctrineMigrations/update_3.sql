SET FOREIGN_KEY_CHECKS = 0;
ALTER TABLE  `order_products` DROP FOREIGN KEY  `FK_5242B8EB3B69A9AF` ,
ADD FOREIGN KEY (  `variant_id` ) REFERENCES  `kac`.`product_variants` (

    `id`
) ON DELETE SET NULL ON UPDATE RESTRICT ;

# 21/08/2013
UPDATE routing SET object_type = 'product_variant' WHERE object_type = 'product';
UPDATE redirects SET object_type = 'product_variant' WHERE object_type = 'product';

SET FOREIGN_KEY_CHECKS = 1;
