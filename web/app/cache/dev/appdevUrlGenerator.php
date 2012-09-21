<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_assetic_27960c7' => true,
       '_assetic_27960c7_0' => true,
       '_assetic_59b89b2' => true,
       '_assetic_59b89b2_0' => true,
       '_assetic_ed9f77b' => true,
       '_assetic_ed9f77b_0' => true,
       '_assetic_3b07914' => true,
       '_assetic_3b07914_0' => true,
       '_assetic_3b07914_1' => true,
       '_assetic_3b07914_2' => true,
       '_assetic_3b07914_3' => true,
       '_assetic_3b07914_4' => true,
       '_assetic_3b07914_5' => true,
       '_assetic_3b07914_6' => true,
       '_assetic_3b07914_7' => true,
       '_assetic_1f33139' => true,
       '_assetic_1f33139_0' => true,
       '_assetic_536f917' => true,
       '_assetic_536f917_0' => true,
       '_assetic_b9a87fc' => true,
       '_assetic_b9a87fc_0' => true,
       '_assetic_ef4418d' => true,
       '_assetic_ef4418d_0' => true,
       '_assetic_3414868' => true,
       '_assetic_3414868_0' => true,
       '_assetic_4f130ae' => true,
       '_assetic_4f130ae_0' => true,
       '_assetic_4f130ae_1' => true,
       '_assetic_4f130ae_2' => true,
       '_assetic_4f130ae_3' => true,
       '_assetic_4f130ae_4' => true,
       '_assetic_4f130ae_5' => true,
       '_assetic_4f130ae_6' => true,
       '_assetic_4f130ae_7' => true,
       '_assetic_4f130ae_8' => true,
       '_assetic_af8c3c1' => true,
       '_assetic_af8c3c1_0' => true,
       '_assetic_d7efcb0' => true,
       '_assetic_d7efcb0_0' => true,
       '_assetic_9ea80d5' => true,
       '_assetic_9ea80d5_0' => true,
       '_assetic_9ea80d5_1' => true,
       '_assetic_9ea80d5_2' => true,
       '_assetic_9ea80d5_3' => true,
       '_assetic_9ea80d5_4' => true,
       '_assetic_9ea80d5_5' => true,
       '_assetic_9ea80d5_6' => true,
       '_assetic_9ea80d5_7' => true,
       '_assetic_c2f445b' => true,
       '_assetic_c2f445b_0' => true,
       '_assetic_5c1358b' => true,
       '_assetic_5c1358b_0' => true,
       '_assetic_03fd00a' => true,
       '_assetic_03fd00a_0' => true,
       '_assetic_fd87c9d' => true,
       '_assetic_fd87c9d_0' => true,
       '_assetic_2726b65' => true,
       '_assetic_2726b65_0' => true,
       '_assetic_e42e45f' => true,
       '_assetic_e42e45f_0' => true,
       '_assetic_e42e45f_1' => true,
       '_assetic_e42e45f_2' => true,
       '_assetic_e42e45f_3' => true,
       '_assetic_e42e45f_4' => true,
       '_assetic_e42e45f_5' => true,
       '_assetic_e42e45f_6' => true,
       '_assetic_e42e45f_7' => true,
       '_assetic_f6b7c6e' => true,
       '_assetic_f6b7c6e_0' => true,
       '_assetic_5a0363a' => true,
       '_assetic_5a0363a_0' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       '_welcome' => true,
       'data_google_products' => true,
       'data_sitemap' => true,
       'content_cookie_policy' => true,
       'content_the_shop' => true,
       'content_contact_us' => true,
       'content_link_to_us' => true,
       'content_how_to_find_us' => true,
       'content_returns' => true,
       'content_useful_links' => true,
       'content_installation_guides' => true,
       'content_water_pressure_information' => true,
       'content_privacy_policy' => true,
       'content_terms_and_conditions' => true,
       'content_delivery' => true,
       'content_security' => true,
       'content_fraud_prevention' => true,
       'content_privilege_card' => true,
       'content_privilege_card_redirect' => true,
       'content_gift_vouchers' => true,
       'products_test' => true,
       'products_ajax_get_product_listing' => true,
       'products_ajax_get_product_listing_count' => true,
       'products_ajax_get_product_listing_pagination' => true,
       'products_ajax_get_product_listing_brand_filter' => true,
       'products_ajax_get_product_listing_department_filter' => true,
       'products_ajax_get_product_listing_feature_filter' => true,
       'products_ajax_get_product_listing_price_filter' => true,
       'products_ajax_get_product_price' => true,
       'products_ajax_get_product_search' => true,
       'checkout_secure_checkout' => true,
       'checkout_ajax_check_email_address' => true,
       'checkout_ajax_create_user' => true,
       'checkout_ajax_save_step_1' => true,
       'checkout_ajax_save_step_2' => true,
       'checkout_ajax_save_step_3' => true,
       'checkout_ajax_save_step_4' => true,
       'checkout_ajax_get_order_information' => true,
       'checkout_ajax_add_notes' => true,
       'checkout_order_placed' => true,
       'checkout_order_failed' => true,
       'basket_your_basket' => true,
       'basket_ajax_get_basket_summary' => true,
       'basket_ajax_get_basket_contents' => true,
       'basket_ajax_get_basket_totals' => true,
       'basket_ajax_get_membership_card_discount' => true,
       'basket_ajax_get_basket_delivery_options' => true,
       'basket_ajax_update_delivery_options' => true,
       'basket_ajax_add_to_basket' => true,
       'basket_ajax_update_basket_item' => true,
       'basket_ajax_delete_basket_item' => true,
       'basket_ajax_clear_basket' => true,
       'basket_ajax_add_membership_card_to_basket' => true,
       'basket_ajax_delete_membership_card' => true,
       'basket_ajax_redeem_membership_card_number' => true,
       'basket_ajax_redeem_voucher_code' => true,
       'basket_ajax_delete_membership_card_number' => true,
       'basket_ajax_delete_voucher_code' => true,
       'security_login' => true,
       'security_ajax_login' => true,
       'security_ajax_forgotten_your_password' => true,
       'security_reset_password' => true,
       'security_logout' => true,
       'users_register' => true,
       'users_ajax_check_email_address' => true,
       'users_ajax_create_user' => true,
       'users_user' => true,
       'users_ajax_save_user' => true,
       'users_ajax_save_contact_addresses' => true,
       'shop_homepage' => true,
       'department' => true,
       'department_all' => true,
       'department_with_brand' => true,
       'department_with_brand_all' => true,
       'page_request' => true,
       'homepage' => true,
       'camera' => true,
       'admin_security' => true,
       'admin_security_login' => true,
       'admin_security_logout' => true,
       'system_ajax_upload_file' => true,
       'system_ajax_get_images' => true,
       'system_ajax_add_image' => true,
       'system_ajax_update_image' => true,
       'system_ajax_delete_image' => true,
       'system_ajax_get_files' => true,
       'system_ajax_add_file' => true,
       'system_ajax_update_file' => true,
       'system_ajax_delete_file' => true,
       'system_ajax_get_redirects' => true,
       'system_ajax_add_redirect' => true,
       'system_ajax_update_redirect' => true,
       'system_ajax_delete_redirect' => true,
       'system_ajax_get_guarantees' => true,
       'system_ajax_add_guarantee' => true,
       'system_ajax_update_guarantee' => true,
       'system_ajax_delete_guarantee' => true,
       'system_ajax_get_contacts' => true,
       'system_ajax_add_contact' => true,
       'system_ajax_update_contact' => true,
       'system_ajax_delete_contact' => true,
       'system_ajax_get_contact_numbers' => true,
       'system_ajax_add_contact_number' => true,
       'system_ajax_update_contact_number' => true,
       'system_ajax_delete_contact_number' => true,
       'system_ajax_get_contact_addresses' => true,
       'system_ajax_add_contact_address' => true,
       'system_ajax_update_contact_address' => true,
       'system_ajax_delete_contact_address' => true,
       'system_ajax_get_contact_web_addresses' => true,
       'system_ajax_add_contact_web_address' => true,
       'system_ajax_update_contact_web_address' => true,
       'system_ajax_delete_contact_web_address' => true,
       'system_ajax_get_contact_email_addresses' => true,
       'system_ajax_add_contact_email_address' => true,
       'system_ajax_update_contact_email_address' => true,
       'system_ajax_delete_contact_email_address' => true,
       'orders' => true,
       'orders_ajax_get_listing' => true,
       'orders_ajax_get_listing_count' => true,
       'orders_ajax_get_listing_pagination' => true,
       'orders_ajax_get_order_information' => true,
       'orders_ajax_get_customer_notes' => true,
       'orders_ajax_get_staff_notes' => true,
       'orders_ajax_add_customer_note' => true,
       'orders_ajax_add_staff_note' => true,
       'orders_ajax_delete_note' => true,
       'orders_ajax_delete_order' => true,
       'orders_ajax_update_order_status' => true,
       'orders_ajax_update_print_flags' => true,
       'orders_regenerate_all_order_documents' => true,
       'orders_ajax_send_invoice' => true,
       'orders_ajax_bulk_print_invoices' => true,
       'orders_ajax_bulk_print_delivery_notes' => true,
       'orders_ajax_bulk_print_invoices_and_delivery_notes' => true,
       'orders_view_delivery_note' => true,
       'orders_view_delivery_notes' => true,
       'orders_view_invoice' => true,
       'orders_view_invoices' => true,
       'orders_view_invoice_and_delivery_note' => true,
       'orders_view_invoices_and_delivery_notes' => true,
       'orders_view_copy_invoice' => true,
       'orders_edit' => true,
       'orders_delete' => true,
       'admin_voucher_codes' => true,
       'admin_voucher_codes_ajax_get_listing' => true,
       'admin_voucher_codes_ajax_get_listing_count' => true,
       'admin_voucher_codes_ajax_get_listing_pagination' => true,
       'admin_voucher_codes_ajax_add_voucher_code' => true,
       'admin_voucher_codes_ajax_save_voucher_code' => true,
       'admin_voucher_codes_ajax_save_discount' => true,
       'admin_voucher_codes_ajax_get_brand_discounts' => true,
       'admin_voucher_codes_ajax_add_brand_discount' => true,
       'admin_voucher_codes_ajax_delete_brand_discount' => true,
       'admin_voucher_codes_ajax_get_department_discounts' => true,
       'admin_voucher_codes_ajax_add_department_discount' => true,
       'admin_voucher_codes_ajax_delete_department_discount' => true,
       'admin_voucher_codes_ajax_get_product_discounts' => true,
       'admin_voucher_codes_ajax_add_product_discount' => true,
       'admin_voucher_codes_ajax_delete_product_discount' => true,
       'admin_voucher_codes_ajax_update_voucher_code' => true,
       'admin_voucher_codes_delete' => true,
       'admin_membership_cards' => true,
       'admin_membership_cards_ajax_get_listing' => true,
       'admin_membership_cards_ajax_get_listing_count' => true,
       'admin_membership_cards_ajax_get_listing_pagination' => true,
       'admin_membership_cards_ajax_add_membership_card' => true,
       'admin_membership_cards_ajax_delete_membership_card' => true,
       'admin_membership_cards_ajax_save_membership_card' => true,
       'admin_membership_cards_ajax_save_user' => true,
       'admin_membership_cards_ajax_release_user' => true,
       'admin_membership_cards_ajax_get_customer' => true,
       'admin_practice_day_registrations' => true,
       'admin_practice_day_registrations_ajax_get_listing' => true,
       'admin_practice_day_registrations_ajax_get_listing_count' => true,
       'admin_practice_day_registrations_ajax_get_listing_pagination' => true,
       'admin_practice_day_registrations_ajax_add_practice_day_registration' => true,
       'admin_practice_day_registrations_ajax_delete_practice_day_registration' => true,
       'admin_practice_day_registrations_ajax_save_practice_day_registration' => true,
       'admin_practice_day_registrations_test' => true,
       'admin_product_options' => true,
       'admin_product_features' => true,
       'admin_links' => true,
       'admin_brands' => true,
       'admin_brands_add' => true,
       'admin_brands_update' => true,
       'admin_brands_delete' => true,
       'admin_brands_ajax_delete' => true,
       'admin_brands_ajax_get_listing' => true,
       'admin_brands_ajax_get_listing_count' => true,
       'admin_brands_ajax_get_listing_pagination' => true,
       'admin_brands_ajax_update' => true,
       'admin_brands_ajax_update_general_section' => true,
       'admin_brands_ajax_delete_logo_image' => true,
       'admin_brands_ajax_update_description_section' => true,
       'admin_brands_ajax_get_description' => true,
       'admin_brands_ajax_get_short_description' => true,
       'admin_brands_ajax_update_price_settings_section' => true,
       'admin_brands_ajax_update_seo_section' => true,
       'admin_brands_ajax_reset_seo' => true,
       'admin_departments' => true,
       'admin_departments_add' => true,
       'admin_departments_update' => true,
       'admin_departments_delete' => true,
       'admin_departments_ajax_delete' => true,
       'admin_departments_ajax_get_listing' => true,
       'admin_departments_ajax_get_listing_count' => true,
       'admin_departments_ajax_get_listing_pagination' => true,
       'admin_departments_ajax_update' => true,
       'admin_departments_ajax_update_general_section' => true,
       'admin_departments_ajax_update_description_section' => true,
       'admin_departments_ajax_get_description' => true,
       'admin_departments_ajax_get_short_description' => true,
       'admin_departments_ajax_update_price_settings_section' => true,
       'admin_departments_ajax_update_seo_section' => true,
       'admin_departments_ajax_reset_seo' => true,
       'admin_products' => true,
       'admin_rebuild_product_headers' => true,
       'admin_products_add' => true,
       'admin_products_update' => true,
       'admin_products_delete' => true,
       'admin_products_ajax_delete' => true,
       'admin_products_ajax_get_listing' => true,
       'admin_products_ajax_get_listing_count' => true,
       'admin_products_ajax_get_listing_pagination' => true,
       'admin_products_ajax_update' => true,
       'admin_products_ajax_update_general_section' => true,
       'admin_products_ajax_update_description_section' => true,
       'admin_products_ajax_get_description' => true,
       'admin_products_ajax_get_short_description' => true,
       'admin_products_ajax_get_prices' => true,
       'admin_products_ajax_add_price' => true,
       'admin_products_ajax_update_price' => true,
       'admin_products_ajax_delete_price' => true,
       'admin_products_ajax_update_price_settings_section' => true,
       'admin_products_ajax_get_options' => true,
       'admin_products_ajax_add_option_group' => true,
       'admin_products_ajax_delete_option_group' => true,
       'admin_products_ajax_add_option' => true,
       'admin_products_ajax_update_option' => true,
       'admin_products_ajax_delete_option' => true,
       'admin_products_ajax_get_features' => true,
       'admin_products_ajax_add_feature_group' => true,
       'admin_products_ajax_delete_feature_group' => true,
       'admin_products_ajax_add_feature' => true,
       'admin_products_ajax_update_feature' => true,
       'admin_products_ajax_delete_feature' => true,
       'admin_products_ajax_get_related_products' => true,
       'admin_products_ajax_add_related_product' => true,
       'admin_products_ajax_update_related_product' => true,
       'admin_products_ajax_delete_related_product' => true,
       'admin_products_ajax_get_cheaper_alternatives' => true,
       'admin_products_ajax_add_cheaper_alternative' => true,
       'admin_products_ajax_update_cheaper_alternative' => true,
       'admin_products_ajax_delete_cheaper_alternative' => true,
       'admin_products_ajax_update_unique_product_identifiers_section' => true,
       'admin_products_ajax_update_package_dimensions_section' => true,
       'admin_products_ajax_update_seo_section' => true,
       'admin_products_ajax_reset_seo' => true,
       'admin_products_ajax_rebuild_product' => true,
       'data' => true,
       'data_legacy_import' => true,
       'data_ajax_load_legacy_import_data' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_assetic_27960c7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '27960c7',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/tinymce.js',  ),));
    }

    private function get_assetic_27960c7_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '27960c7',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/tinymce_jquery.tinymce_1.js',  ),));
    }

    private function get_assetic_59b89b2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '59b89b2',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/file-upload.js',  ),));
    }

    private function get_assetic_59b89b2_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '59b89b2',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/file-upload_file-upload_1.js',  ),));
    }

    private function get_assetic_ed9f77bRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'ed9f77b',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/data-table.js',  ),));
    }

    private function get_assetic_ed9f77b_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'ed9f77b',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/data-table_data-table_1.js',  ),));
    }

    private function get_assetic_3b07914RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed.css',  ),));
    }

    private function get_assetic_3b07914_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_reset_1.css',  ),));
    }

    private function get_assetic_3b07914_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 1,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_grid_2.css',  ),));
    }

    private function get_assetic_3b07914_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 2,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_slider-navigation_3.css',  ),));
    }

    private function get_assetic_3b07914_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 3,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_ui_4.css',  ),));
    }

    private function get_assetic_3b07914_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 4,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_portlet_5.css',  ),));
    }

    private function get_assetic_3b07914_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 5,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_uniform_6.css',  ),));
    }

    private function get_assetic_3b07914_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 6,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_form_7.css',  ),));
    }

    private function get_assetic_3b07914_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '3b07914',  'pos' => 7,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/compressed_styles_8.css',  ),));
    }

    private function get_assetic_1f33139RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1f33139',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/ie.css',  ),));
    }

    private function get_assetic_1f33139_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1f33139',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/ie_ie_1.css',  ),));
    }

    private function get_assetic_536f917RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '536f917',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie9.css',  ),));
    }

    private function get_assetic_536f917_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '536f917',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie9_ie9_1.css',  ),));
    }

    private function get_assetic_b9a87fcRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b9a87fc',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie8.css',  ),));
    }

    private function get_assetic_b9a87fc_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b9a87fc',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie8_ie8_1.css',  ),));
    }

    private function get_assetic_ef4418dRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'ef4418d',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie7.css',  ),));
    }

    private function get_assetic_ef4418d_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'ef4418d',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie7_ie7_1.css',  ),));
    }

    private function get_assetic_3414868RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 3414868,  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/html5.js',  ),));
    }

    private function get_assetic_3414868_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 3414868,  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/html5_html5_1.js',  ),));
    }

    private function get_assetic_4f130aeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed.js',  ),));
    }

    private function get_assetic_4f130ae_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_jquery_1.js',  ),));
    }

    private function get_assetic_4f130ae_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 1,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_ui_2.js',  ),));
    }

    private function get_assetic_4f130ae_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 2,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_tools_3.js',  ),));
    }

    private function get_assetic_4f130ae_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 3,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_overlay_4.js',  ),));
    }

    private function get_assetic_4f130ae_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 4,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_uniform_5.js',  ),));
    }

    private function get_assetic_4f130ae_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 5,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_isotope_6.js',  ),));
    }

    private function get_assetic_4f130ae_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 6,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_superfish_7.js',  ),));
    }

    private function get_assetic_4f130ae_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 7,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_supersubs_8.js',  ),));
    }

    private function get_assetic_4f130ae_8RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '4f130ae',  'pos' => 8,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/compressed_global_9.js',  ),));
    }

    private function get_assetic_af8c3c1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'af8c3c1',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/selectivizr.js',  ),));
    }

    private function get_assetic_af8c3c1_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'af8c3c1',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/selectivizr_selectivizr_1.js',  ),));
    }

    private function get_assetic_d7efcb0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'd7efcb0',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/ie.js',  ),));
    }

    private function get_assetic_d7efcb0_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'd7efcb0',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/ie_ie_1.js',  ),));
    }

    private function get_assetic_9ea80d5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed.css',  ),));
    }

    private function get_assetic_9ea80d5_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_reset_1.css',  ),));
    }

    private function get_assetic_9ea80d5_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 1,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_grid_2.css',  ),));
    }

    private function get_assetic_9ea80d5_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 2,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_ui_3.css',  ),));
    }

    private function get_assetic_9ea80d5_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 3,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_portlet_4.css',  ),));
    }

    private function get_assetic_9ea80d5_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 4,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_uniform_5.css',  ),));
    }

    private function get_assetic_9ea80d5_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 5,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_slider_6.css',  ),));
    }

    private function get_assetic_9ea80d5_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 6,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_form_7.css',  ),));
    }

    private function get_assetic_9ea80d5_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '9ea80d5',  'pos' => 7,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-compressed_styles_8.css',  ),));
    }

    private function get_assetic_c2f445bRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c2f445b',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/ie.css',  ),));
    }

    private function get_assetic_c2f445b_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c2f445b',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/ie_ie_1.css',  ),));
    }

    private function get_assetic_5c1358bRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '5c1358b',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie9.css',  ),));
    }

    private function get_assetic_5c1358b_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '5c1358b',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie9_ie9_1.css',  ),));
    }

    private function get_assetic_03fd00aRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '03fd00a',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie8.css',  ),));
    }

    private function get_assetic_03fd00a_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '03fd00a',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie8_ie8_1.css',  ),));
    }

    private function get_assetic_fd87c9dRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'fd87c9d',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie7.css',  ),));
    }

    private function get_assetic_fd87c9d_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'fd87c9d',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/shop-ie7_ie7_1.css',  ),));
    }

    private function get_assetic_2726b65RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '2726b65',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-html5.js',  ),));
    }

    private function get_assetic_2726b65_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '2726b65',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-html5_html5_1.js',  ),));
    }

    private function get_assetic_e42e45fRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed.js',  ),));
    }

    private function get_assetic_e42e45f_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_jquery_1.js',  ),));
    }

    private function get_assetic_e42e45f_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 1,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_ui_2.js',  ),));
    }

    private function get_assetic_e42e45f_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 2,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_tools_3.js',  ),));
    }

    private function get_assetic_e42e45f_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 3,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_overlay_4.js',  ),));
    }

    private function get_assetic_e42e45f_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 4,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_uniform_5.js',  ),));
    }

    private function get_assetic_e42e45f_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 5,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_slider_6.js',  ),));
    }

    private function get_assetic_e42e45f_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 6,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_cookies_7.js',  ),));
    }

    private function get_assetic_e42e45f_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e42e45f',  'pos' => 7,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-compressed_global_8.js',  ),));
    }

    private function get_assetic_f6b7c6eRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f6b7c6e',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-selectivizr.js',  ),));
    }

    private function get_assetic_f6b7c6e_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f6b7c6e',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-selectivizr_selectivizr_1.js',  ),));
    }

    private function get_assetic_5a0363aRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '5a0363a',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-ie.js',  ),));
    }

    private function get_assetic_5a0363a_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '5a0363a',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/shop-ie_ie_1.js',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getdata_google_productsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\DataController::googleProductsAction',), array (  '_scheme' => 'http',), array (  0 =>   array (    0 => 'text',    1 => '/data/google-products.xml',  ),));
    }

    private function getdata_sitemapRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\DataController::xmlSitemapAction',), array (  '_scheme' => 'http',), array (  0 =>   array (    0 => 'text',    1 => '/sitemap.xml',  ),));
    }

    private function getcontent_cookie_policyRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::cookiePolicyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/cookie-policy.html',  ),));
    }

    private function getcontent_the_shopRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::theShopAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/visit-the-kitchen-appliance-centre-showroom-in-nottingham.html',  ),));
    }

    private function getcontent_contact_usRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::contactUsAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/contact-kitchen-appliance-centre.html',  ),));
    }

    private function getcontent_link_to_usRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::linkToUsAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/link-to-kitchen-appliance-centre.html',  ),));
    }

    private function getcontent_how_to_find_usRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::howToFindUsAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/how-to-find-kitchen-appliance-centre-in-nottingham.html',  ),));
    }

    private function getcontent_returnsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::returnsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/returns-policy.html',  ),));
    }

    private function getcontent_useful_linksRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::usefulLinksAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/useful-links.html',  ),));
    }

    private function getcontent_installation_guidesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::installationGuidesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/installation-guides.html',  ),));
    }

    private function getcontent_water_pressure_informationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::waterPressureInformationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/what-is-my-water-pressure.html',  ),));
    }

    private function getcontent_privacy_policyRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privacyPolicyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/privacy-policy.html',  ),));
    }

    private function getcontent_terms_and_conditionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::termsAndConditionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/terms-and-conditions.html',  ),));
    }

    private function getcontent_deliveryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::deliveryAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delivery.html',  ),));
    }

    private function getcontent_securityRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::securityAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/security.html',  ),));
    }

    private function getcontent_fraud_preventionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::fraudPreventionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/fraud-prevention.html',  ),));
    }

    private function getcontent_privilege_cardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privilegeCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ride-direct-privilege-discount-card.html',  ),));
    }

    private function getcontent_privilege_card_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privilegeCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ride-direct-privilege-card.html',  ),));
    }

    private function getcontent_gift_vouchersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::giftVouchersAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/kitchen-appliance-centre-gift-vouchers.html',  ),));
    }

    private function getproducts_testRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::testAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/test',  ),));
    }

    private function getproducts_ajax_get_product_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListing',  ),));
    }

    private function getproducts_ajax_get_product_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingCount',  ),));
    }

    private function getproducts_ajax_get_product_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingPagination',  ),));
    }

    private function getproducts_ajax_get_product_listing_brand_filterRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingBrandFilterAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingBrandFilter',  ),));
    }

    private function getproducts_ajax_get_product_listing_department_filterRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingDepartmentFilterAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingDepartmentFilter',  ),));
    }

    private function getproducts_ajax_get_product_listing_feature_filterRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingFeatureFilterAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingFeatureFilter',  ),));
    }

    private function getproducts_ajax_get_product_listing_price_filterRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingPriceFilterAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductListingPriceFilter',  ),));
    }

    private function getproducts_ajax_get_product_priceRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductPriceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductPrice',  ),));
    }

    private function getproducts_ajax_get_product_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductSearchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/products/ajaxGetProductSearch',  ),));
    }

    private function getcheckout_secure_checkoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::indexAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/secure-checkout.html',  ),));
    }

    private function getcheckout_ajax_check_email_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxCheckEmailAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxCheckEmailAddress',  ),));
    }

    private function getcheckout_ajax_create_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxCreateUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxCreateUser',  ),));
    }

    private function getcheckout_ajax_save_step_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep1Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxSaveStep1',  ),));
    }

    private function getcheckout_ajax_save_step_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep2Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxSaveStep2',  ),));
    }

    private function getcheckout_ajax_save_step_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep3Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxSaveStep3',  ),));
    }

    private function getcheckout_ajax_save_step_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep4Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxSaveStep4',  ),));
    }

    private function getcheckout_ajax_get_order_informationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxGetOrderInformationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxGetOrderInformation',  ),));
    }

    private function getcheckout_ajax_add_notesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxAddNotesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/checkout/ajaxAddNotes',  ),));
    }

    private function getcheckout_order_placedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::orderPlacedAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/order-placed.html',  ),));
    }

    private function getcheckout_order_failedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::orderFailedAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/order-failed.html',  ),));
    }

    private function getbasket_your_basketRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::indexAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/your-basket.html',  ),));
    }

    private function getbasket_ajax_get_basket_summaryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketSummaryAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxGetBasketSummary',  ),));
    }

    private function getbasket_ajax_get_basket_contentsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketContentsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxGetBasketContents',  ),));
    }

    private function getbasket_ajax_get_basket_totalsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketTotalsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxGetBasketTotals',  ),));
    }

    private function getbasket_ajax_get_membership_card_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetMembershipCardDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxGetMembershipCardDiscount',  ),));
    }

    private function getbasket_ajax_get_basket_delivery_optionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketDeliveryOptionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxGetBasketDeliveryOptions',  ),));
    }

    private function getbasket_ajax_update_delivery_optionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxUpdateDeliveryOptionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxUpdateDeliveryOptions',  ),));
    }

    private function getbasket_ajax_add_to_basketRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxAddToBasketAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxAddToBasket',  ),));
    }

    private function getbasket_ajax_update_basket_itemRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxUpdateBasketItemAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxUpdateBasketItem',  ),));
    }

    private function getbasket_ajax_delete_basket_itemRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteBasketItemAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxDeleteBasketItem',  ),));
    }

    private function getbasket_ajax_clear_basketRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxClearBasketAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxClearBasket',  ),));
    }

    private function getbasket_ajax_add_membership_card_to_basketRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxAddMembershipCardToBasketAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxAddMembershipCardToBasket',  ),));
    }

    private function getbasket_ajax_delete_membership_cardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteMembershipCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxDeleteMembershipCard',  ),));
    }

    private function getbasket_ajax_redeem_membership_card_numberRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxRedeemMembershipCardNumberAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxRedeemMembershipCardNumber',  ),));
    }

    private function getbasket_ajax_redeem_voucher_codeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxRedeemVoucherCodeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxRedeemVoucherCode',  ),));
    }

    private function getbasket_ajax_delete_membership_card_numberRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteMembershipCardNumberAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxDeleteMembershipCardNumber',  ),));
    }

    private function getbasket_ajax_delete_voucher_codeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteVoucherCodeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/basket/ajaxDeleteVoucherCode',  ),));
    }

    private function getsecurity_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::loginAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/secure-login.html',  ),));
    }

    private function getsecurity_ajax_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::ajaxLoginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/security/ajaxLogin',  ),));
    }

    private function getsecurity_ajax_forgotten_your_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::ajaxForgottenYourPasswordAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/security/ajaxForgottenYourPassword',  ),));
    }

    private function getsecurity_reset_passwordRouteInfo()
    {
        return array(array (  0 => 'userKey',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::resetPasswordAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'userKey',  ),  1 =>   array (    0 => 'text',    1 => '/security/resetPassword',  ),));
    }

    private function getsecurity_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::logoutAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/securely-logout.html',  ),));
    }

    private function getusers_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::registerAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/register.html',  ),));
    }

    private function getusers_ajax_check_email_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxCheckEmailAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/users/ajaxCheckEmailAddress',  ),));
    }

    private function getusers_ajax_create_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxCreateUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/users/ajaxCreateUser',  ),));
    }

    private function getusers_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::userAction',), array (  '_scheme' => 'https',), array (  0 =>   array (    0 => 'text',    1 => '/my-account.html',  ),));
    }

    private function getusers_ajax_save_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxSaveUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/users/ajaxSaveUser',  ),));
    }

    private function getusers_ajax_save_contact_addressesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxSaveContactAddressesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/users/ajaxSaveContactAddresses',  ),));
    }

    private function getshop_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getdepartmentRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.html',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'url',  ),));
    }

    private function getdepartment_allRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',  'all' => true,), array (), array (  0 =>   array (    0 => 'text',    1 => '.html',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'url',  ),  2 =>   array (    0 => 'text',    1 => '/all',  ),));
    }

    private function getdepartment_with_brandRouteInfo()
    {
        return array(array (  0 => 'brand',  1 => 'url',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.html',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'url',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'brand',  ),));
    }

    private function getdepartment_with_brand_allRouteInfo()
    {
        return array(array (  0 => 'brand',  1 => 'url',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',  'all' => true,), array (), array (  0 =>   array (    0 => 'text',    1 => '.html',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'url',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'brand',  ),  3 =>   array (    0 => 'text',    1 => '/all',  ),));
    }

    private function getpage_requestRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.html',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'url',  ),));
    }

    private function gethomepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getcameraRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\AdminController::cameraAction',), array (  '_scheme' => 'http',), array (  0 =>   array (    0 => 'text',    1 => '/camera',  ),));
    }

    private function getadmin_securityRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/security/',  ),));
    }

    private function getadmin_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/security/login',  ),));
    }

    private function getadmin_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/security/logout',  ),));
    }

    private function getsystem_ajax_upload_fileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUploadFileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUploadFile',  ),));
    }

    private function getsystem_ajax_get_imagesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetImagesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetImages',  ),));
    }

    private function getsystem_ajax_add_imageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddImageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddImage',  ),));
    }

    private function getsystem_ajax_update_imageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateImageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateImage',  ),));
    }

    private function getsystem_ajax_delete_imageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteImageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteImage',  ),));
    }

    private function getsystem_ajax_get_filesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetFilesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetFiles',  ),));
    }

    private function getsystem_ajax_add_fileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddFileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddFile',  ),));
    }

    private function getsystem_ajax_update_fileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateFileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateFile',  ),));
    }

    private function getsystem_ajax_delete_fileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteFileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteFile',  ),));
    }

    private function getsystem_ajax_get_redirectsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetRedirectsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetRedirects',  ),));
    }

    private function getsystem_ajax_add_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddRedirectAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddRedirect',  ),));
    }

    private function getsystem_ajax_update_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateRedirectAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateRedirect',  ),));
    }

    private function getsystem_ajax_delete_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteRedirectAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteRedirect',  ),));
    }

    private function getsystem_ajax_get_guaranteesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetGuaranteesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetGuarantees',  ),));
    }

    private function getsystem_ajax_add_guaranteeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddGuaranteeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddGuarantee',  ),));
    }

    private function getsystem_ajax_update_guaranteeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateGuaranteeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateGuarantee',  ),));
    }

    private function getsystem_ajax_delete_guaranteeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteGuaranteeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteGuarantee',  ),));
    }

    private function getsystem_ajax_get_contactsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetContacts',  ),));
    }

    private function getsystem_ajax_add_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddContact',  ),));
    }

    private function getsystem_ajax_update_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateContact',  ),));
    }

    private function getsystem_ajax_delete_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteContact',  ),));
    }

    private function getsystem_ajax_get_contact_numbersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactNumbersAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetContactNumbers',  ),));
    }

    private function getsystem_ajax_add_contact_numberRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactNumberAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddContactNumber',  ),));
    }

    private function getsystem_ajax_update_contact_numberRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactNumberAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateContactNumber',  ),));
    }

    private function getsystem_ajax_delete_contact_numberRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactNumberAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteContactNumber',  ),));
    }

    private function getsystem_ajax_get_contact_addressesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactAddressesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetContactAddresses',  ),));
    }

    private function getsystem_ajax_add_contact_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddContactAddress',  ),));
    }

    private function getsystem_ajax_update_contact_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateContactAddress',  ),));
    }

    private function getsystem_ajax_delete_contact_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteContactAddress',  ),));
    }

    private function getsystem_ajax_get_contact_web_addressesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactWebAddressesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetContactWebAddresses',  ),));
    }

    private function getsystem_ajax_add_contact_web_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactWebAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddContactWebAddress',  ),));
    }

    private function getsystem_ajax_update_contact_web_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactWebAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateContactWebAddress',  ),));
    }

    private function getsystem_ajax_delete_contact_web_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactWebAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteContactWebAddress',  ),));
    }

    private function getsystem_ajax_get_contact_email_addressesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactEmailAddressesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxGetContactEmailAddresses',  ),));
    }

    private function getsystem_ajax_add_contact_email_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactEmailAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxAddContactEmailAddress',  ),));
    }

    private function getsystem_ajax_update_contact_email_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactEmailAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxUpdateContactEmailAddress',  ),));
    }

    private function getsystem_ajax_delete_contact_email_addressRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactEmailAddressAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/system/ajaxDeleteContactEmailAddress',  ),));
    }

    private function getordersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders',  ),));
    }

    private function getorders_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetListing',  ),));
    }

    private function getorders_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetListingCount',  ),));
    }

    private function getorders_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetListingPagination',  ),));
    }

    private function getorders_ajax_get_order_informationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetOrderInformationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetOrderInformation',  ),));
    }

    private function getorders_ajax_get_customer_notesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetCustomerNotesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetCustomerNotes',  ),));
    }

    private function getorders_ajax_get_staff_notesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetStaffNotesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxGetStaffNotes',  ),));
    }

    private function getorders_ajax_add_customer_noteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxAddCustomerNoteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxAddCustomerNote',  ),));
    }

    private function getorders_ajax_add_staff_noteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxAddStaffNoteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxAddStaffNote',  ),));
    }

    private function getorders_ajax_delete_noteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxDeleteNoteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxDeleteNote',  ),));
    }

    private function getorders_ajax_delete_orderRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxDeleteOrderAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxDeleteOrder',  ),));
    }

    private function getorders_ajax_update_order_statusRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxUpdateOrderStatusAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxUpdateOrderStatus',  ),));
    }

    private function getorders_ajax_update_print_flagsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxUpdatePrintFlagsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxUpdatePrintFlags',  ),));
    }

    private function getorders_regenerate_all_order_documentsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::regenerateAllOrderDocumentsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/regenerateAllOrderDocuments',  ),));
    }

    private function getorders_ajax_send_invoiceRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxSendInvoiceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxSendInvoice',  ),));
    }

    private function getorders_ajax_bulk_print_invoicesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintInvoicesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxBulkPrintInvoices',  ),));
    }

    private function getorders_ajax_bulk_print_delivery_notesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintDeliveryNotesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxBulkPrintDeliveryNotes',  ),));
    }

    private function getorders_ajax_bulk_print_invoices_and_delivery_notesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintInvoicesAndDeliveryNotesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/orders/ajaxBulkPrintInvoicesAndDeliveryNotes',  ),));
    }

    private function getorders_view_delivery_noteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewDeliveryNoteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewDeliveryNote',  ),));
    }

    private function getorders_view_delivery_notesRouteInfo()
    {
        return array(array (  0 => 'ids',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewDeliveryNotesAction',  'ids' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ids',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewDeliveryNotes',  ),));
    }

    private function getorders_view_invoiceRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoiceAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewInvoice',  ),));
    }

    private function getorders_view_invoicesRouteInfo()
    {
        return array(array (  0 => 'ids',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoicesAction',  'ids' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ids',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewInvoices',  ),));
    }

    private function getorders_view_invoice_and_delivery_noteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoiceAndDeliveryNoteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewInvoiceAndDeliveryNote',  ),));
    }

    private function getorders_view_invoices_and_delivery_notesRouteInfo()
    {
        return array(array (  0 => 'ids',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoicesAndDeliveryNotesAction',  'ids' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ids',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewInvoicesAndDeliveryNotes',  ),));
    }

    private function getorders_view_copy_invoiceRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewCopyInvoiceAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/viewCopyInvoice',  ),));
    }

    private function getorders_editRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'current_tab',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::editAction',  'id' => 0,  'current_tab' => 'general',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'current_tab',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/orders/edit',  ),));
    }

    private function getorders_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::deleteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/orders/delete',  ),));
    }

    private function getadmin_voucher_codesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetListing',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetListingCount',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetListingPagination',  ),));
    }

    private function getadmin_voucher_codes_ajax_add_voucher_codeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddVoucherCodeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxAddVoucherCode',  ),));
    }

    private function getadmin_voucher_codes_ajax_save_voucher_codeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxSaveVoucherCodeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxSaveVoucherCode',  ),));
    }

    private function getadmin_voucher_codes_ajax_save_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxSaveDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxSaveDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_brand_discountsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetBrandDiscountsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetBrandDiscounts',  ),));
    }

    private function getadmin_voucher_codes_ajax_add_brand_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddBrandDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxAddBrandDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_delete_brand_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteBrandDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxDeleteBrandDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_department_discountsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetDepartmentDiscountsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetDepartmentDiscounts',  ),));
    }

    private function getadmin_voucher_codes_ajax_add_department_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddDepartmentDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxAddDepartmentDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_delete_department_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteDepartmentDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxDeleteDepartmentDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_get_product_discountsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetProductDiscountsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxGetProductDiscounts',  ),));
    }

    private function getadmin_voucher_codes_ajax_add_product_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddProductDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxAddProductDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_delete_product_discountRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteProductDiscountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxDeleteProductDiscount',  ),));
    }

    private function getadmin_voucher_codes_ajax_update_voucher_codeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxUpdateVoucherCodeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/ajaxUpdateVoucherCode',  ),));
    }

    private function getadmin_voucher_codes_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::deleteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/voucherCodes/delete',  ),));
    }

    private function getadmin_membership_cardsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards',  ),));
    }

    private function getadmin_membership_cards_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxGetListing',  ),));
    }

    private function getadmin_membership_cards_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxGetListingCount',  ),));
    }

    private function getadmin_membership_cards_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxGetListingPagination',  ),));
    }

    private function getadmin_membership_cards_ajax_add_membership_cardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxAddMembershipCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxAddMembershipCard',  ),));
    }

    private function getadmin_membership_cards_ajax_delete_membership_cardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxDeleteMembershipCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxDeleteMembershipCard',  ),));
    }

    private function getadmin_membership_cards_ajax_save_membership_cardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxSaveMembershipCardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxSaveMembershipCard',  ),));
    }

    private function getadmin_membership_cards_ajax_save_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxSaveUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxSaveUser',  ),));
    }

    private function getadmin_membership_cards_ajax_release_userRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxReleaseUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxReleaseUser',  ),));
    }

    private function getadmin_membership_cards_ajax_get_customerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetCustomerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/membershipCards/ajaxGetCustomer',  ),));
    }

    private function getadmin_practice_day_registrationsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxGetListing',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxGetListingCount',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxGetListingPagination',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_add_practice_day_registrationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxAddPracticeDayRegistrationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxAddPracticeDayRegistration',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_delete_practice_day_registrationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxDeletePracticeDayRegistrationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxDeletePracticeDayRegistration',  ),));
    }

    private function getadmin_practice_day_registrations_ajax_save_practice_day_registrationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxSavePracticeDayRegistrationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/ajaxSavePracticeDayRegistration',  ),));
    }

    private function getadmin_practice_day_registrations_testRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::testAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/practiceDayRegistrations/test',  ),));
    }

    private function getadmin_product_optionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIlluminationAdminBundle:ProductOptions:index',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/productOptions',  ),));
    }

    private function getadmin_product_featuresRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIlluminationAdminBundle:ProductFeatures:index',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/productFeatures',  ),));
    }

    private function getadmin_linksRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIlluminationAdminBundle:Links:index',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/links',  ),));
    }

    private function getadmin_brandsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands',  ),));
    }

    private function getadmin_brands_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/add',  ),));
    }

    private function getadmin_brands_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::updateAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/brands/update',  ),));
    }

    private function getadmin_brands_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::deleteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/brands/delete',  ),));
    }

    private function getadmin_brands_ajax_deleteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxDelete',  ),));
    }

    private function getadmin_brands_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxGetListing',  ),));
    }

    private function getadmin_brands_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxGetListingCount',  ),));
    }

    private function getadmin_brands_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxGetListingPagination',  ),));
    }

    private function getadmin_brands_ajax_updateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxUpdate',  ),));
    }

    private function getadmin_brands_ajax_update_general_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateGeneralSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxUpdateGeneralSection',  ),));
    }

    private function getadmin_brands_ajax_delete_logo_imageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxDeleteLogoImageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxDeleteLogoImage',  ),));
    }

    private function getadmin_brands_ajax_update_description_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateDescriptionSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxUpdateDescriptionSection',  ),));
    }

    private function getadmin_brands_ajax_get_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxGetDescription',  ),));
    }

    private function getadmin_brands_ajax_get_short_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetShortDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxGetShortDescription',  ),));
    }

    private function getadmin_brands_ajax_update_price_settings_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdatePriceSettingsSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxUpdatePriceSettingsSection',  ),));
    }

    private function getadmin_brands_ajax_update_seo_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateSeoSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxUpdateSeoSection',  ),));
    }

    private function getadmin_brands_ajax_reset_seoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxResetSeoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/brands/ajaxResetSeo',  ),));
    }

    private function getadmin_departmentsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments',  ),));
    }

    private function getadmin_departments_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/add',  ),));
    }

    private function getadmin_departments_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::updateAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/departments/update',  ),));
    }

    private function getadmin_departments_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::deleteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/departments/delete',  ),));
    }

    private function getadmin_departments_ajax_deleteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxDelete',  ),));
    }

    private function getadmin_departments_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxGetListing',  ),));
    }

    private function getadmin_departments_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxGetListingCount',  ),));
    }

    private function getadmin_departments_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxGetListingPagination',  ),));
    }

    private function getadmin_departments_ajax_updateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxUpdate',  ),));
    }

    private function getadmin_departments_ajax_update_general_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateGeneralSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxUpdateGeneralSection',  ),));
    }

    private function getadmin_departments_ajax_update_description_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateDescriptionSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxUpdateDescriptionSection',  ),));
    }

    private function getadmin_departments_ajax_get_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxGetDescription',  ),));
    }

    private function getadmin_departments_ajax_get_short_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetShortDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxGetShortDescription',  ),));
    }

    private function getadmin_departments_ajax_update_price_settings_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdatePriceSettingsSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxUpdatePriceSettingsSection',  ),));
    }

    private function getadmin_departments_ajax_update_seo_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateSeoSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxUpdateSeoSection',  ),));
    }

    private function getadmin_departments_ajax_reset_seoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxResetSeoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/departments/ajaxResetSeo',  ),));
    }

    private function getadmin_productsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products',  ),));
    }

    private function getadmin_rebuild_product_headersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::rebuildProductHeadersAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/rebuildProductHeaders',  ),));
    }

    private function getadmin_products_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/add',  ),));
    }

    private function getadmin_products_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::updateAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/products/update',  ),));
    }

    private function getadmin_products_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::deleteAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/products/delete',  ),));
    }

    private function getadmin_products_ajax_deleteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDelete',  ),));
    }

    private function getadmin_products_ajax_get_listingRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetListing',  ),));
    }

    private function getadmin_products_ajax_get_listing_countRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingCountAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetListingCount',  ),));
    }

    private function getadmin_products_ajax_get_listing_paginationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingPaginationAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetListingPagination',  ),));
    }

    private function getadmin_products_ajax_updateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdate',  ),));
    }

    private function getadmin_products_ajax_update_general_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateGeneralSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateGeneralSection',  ),));
    }

    private function getadmin_products_ajax_update_description_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateDescriptionSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateDescriptionSection',  ),));
    }

    private function getadmin_products_ajax_get_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetDescription',  ),));
    }

    private function getadmin_products_ajax_get_short_descriptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetShortDescriptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetShortDescription',  ),));
    }

    private function getadmin_products_ajax_get_pricesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetPricesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetPrices',  ),));
    }

    private function getadmin_products_ajax_add_priceRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddPriceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddPrice',  ),));
    }

    private function getadmin_products_ajax_update_priceRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePriceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdatePrice',  ),));
    }

    private function getadmin_products_ajax_delete_priceRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeletePriceAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeletePrice',  ),));
    }

    private function getadmin_products_ajax_update_price_settings_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePriceSettingsSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdatePriceSettingsSection',  ),));
    }

    private function getadmin_products_ajax_get_optionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetOptionsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetOptions',  ),));
    }

    private function getadmin_products_ajax_add_option_groupRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddOptionGroupAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddOptionGroup',  ),));
    }

    private function getadmin_products_ajax_delete_option_groupRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteOptionGroupAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteOptionGroup',  ),));
    }

    private function getadmin_products_ajax_add_optionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddOptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddOption',  ),));
    }

    private function getadmin_products_ajax_update_optionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateOptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateOption',  ),));
    }

    private function getadmin_products_ajax_delete_optionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteOptionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteOption',  ),));
    }

    private function getadmin_products_ajax_get_featuresRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetFeaturesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetFeatures',  ),));
    }

    private function getadmin_products_ajax_add_feature_groupRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddFeatureGroupAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddFeatureGroup',  ),));
    }

    private function getadmin_products_ajax_delete_feature_groupRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteFeatureGroupAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteFeatureGroup',  ),));
    }

    private function getadmin_products_ajax_add_featureRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddFeatureAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddFeature',  ),));
    }

    private function getadmin_products_ajax_update_featureRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateFeatureAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateFeature',  ),));
    }

    private function getadmin_products_ajax_delete_featureRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteFeatureAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteFeature',  ),));
    }

    private function getadmin_products_ajax_get_related_productsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetRelatedProductsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetRelatedProducts',  ),));
    }

    private function getadmin_products_ajax_add_related_productRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddRelatedProductAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddRelatedProduct',  ),));
    }

    private function getadmin_products_ajax_update_related_productRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateRelatedProductAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateRelatedProduct',  ),));
    }

    private function getadmin_products_ajax_delete_related_productRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteRelatedProductAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteRelatedProduct',  ),));
    }

    private function getadmin_products_ajax_get_cheaper_alternativesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetCheaperAlternativesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxGetCheaperAlternatives',  ),));
    }

    private function getadmin_products_ajax_add_cheaper_alternativeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddCheaperAlternativeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxAddCheaperAlternative',  ),));
    }

    private function getadmin_products_ajax_update_cheaper_alternativeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateCheaperAlternativeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateCheaperAlternative',  ),));
    }

    private function getadmin_products_ajax_delete_cheaper_alternativeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteCheaperAlternativeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxDeleteCheaperAlternative',  ),));
    }

    private function getadmin_products_ajax_update_unique_product_identifiers_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateUniqueProductIdentifiersSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateUniqueProductIdentifiersSection',  ),));
    }

    private function getadmin_products_ajax_update_package_dimensions_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePackageDimensionsSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdatePackageDimensionsSection',  ),));
    }

    private function getadmin_products_ajax_update_seo_sectionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateSeoSectionAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxUpdateSeoSection',  ),));
    }

    private function getadmin_products_ajax_reset_seoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxResetSeoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxResetSeo',  ),));
    }

    private function getadmin_products_ajax_rebuild_productRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxRebuildProductAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/products/ajaxRebuildProduct',  ),));
    }

    private function getdataRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::legacyImportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/data',  ),));
    }

    private function getdata_legacy_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::legacyImportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/data/legacyImport',  ),));
    }

    private function getdata_ajax_load_legacy_import_dataRouteInfo()
    {
        return array(array (), array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::ajaxLoadLegacyImportDataAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/data/ajaxLoadLegacyImportData',  ),));
    }
}
