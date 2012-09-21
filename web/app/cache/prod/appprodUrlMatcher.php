<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::indexAction',  '_route' => '_welcome',);
        }

        // data_google_products
        if ($pathinfo === '/data/google-products.xml') {
            if ($this->context->getScheme() !== 'http') {
                return $this->redirect($pathinfo, 'data_google_products', 'http');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\DataController::googleProductsAction',  '_route' => 'data_google_products',);
        }

        // data_sitemap
        if ($pathinfo === '/sitemap.xml') {
            if ($this->context->getScheme() !== 'http') {
                return $this->redirect($pathinfo, 'data_sitemap', 'http');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\DataController::xmlSitemapAction',  '_route' => 'data_sitemap',);
        }

        // content_cookie_policy
        if ($pathinfo === '/cookie-policy.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::cookiePolicyAction',  '_route' => 'content_cookie_policy',);
        }

        // content_the_shop
        if ($pathinfo === '/visit-the-kitchen-appliance-centre-showroom-in-nottingham.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::theShopAction',  '_route' => 'content_the_shop',);
        }

        // content_contact_us
        if ($pathinfo === '/contact-kitchen-appliance-centre.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'content_contact_us', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::contactUsAction',  '_route' => 'content_contact_us',);
        }

        // content_link_to_us
        if ($pathinfo === '/link-to-kitchen-appliance-centre.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'content_link_to_us', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::linkToUsAction',  '_route' => 'content_link_to_us',);
        }

        // content_how_to_find_us
        if ($pathinfo === '/how-to-find-kitchen-appliance-centre-in-nottingham.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'content_how_to_find_us', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::howToFindUsAction',  '_route' => 'content_how_to_find_us',);
        }

        // content_returns
        if ($pathinfo === '/returns-policy.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::returnsAction',  '_route' => 'content_returns',);
        }

        // content_useful_links
        if ($pathinfo === '/useful-links.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::usefulLinksAction',  '_route' => 'content_useful_links',);
        }

        // content_installation_guides
        if ($pathinfo === '/installation-guides.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::installationGuidesAction',  '_route' => 'content_installation_guides',);
        }

        // content_water_pressure_information
        if ($pathinfo === '/what-is-my-water-pressure.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::waterPressureInformationAction',  '_route' => 'content_water_pressure_information',);
        }

        // content_privacy_policy
        if ($pathinfo === '/privacy-policy.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privacyPolicyAction',  '_route' => 'content_privacy_policy',);
        }

        // content_terms_and_conditions
        if ($pathinfo === '/terms-and-conditions.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::termsAndConditionsAction',  '_route' => 'content_terms_and_conditions',);
        }

        // content_delivery
        if ($pathinfo === '/delivery.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::deliveryAction',  '_route' => 'content_delivery',);
        }

        // content_security
        if ($pathinfo === '/security.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'content_security', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::securityAction',  '_route' => 'content_security',);
        }

        // content_fraud_prevention
        if ($pathinfo === '/fraud-prevention.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::fraudPreventionAction',  '_route' => 'content_fraud_prevention',);
        }

        // content_privilege_card
        if ($pathinfo === '/ride-direct-privilege-discount-card.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privilegeCardAction',  '_route' => 'content_privilege_card',);
        }

        // content_privilege_card_redirect
        if ($pathinfo === '/ride-direct-privilege-card.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::privilegeCardAction',  '_route' => 'content_privilege_card_redirect',);
        }

        // content_gift_vouchers
        if ($pathinfo === '/kitchen-appliance-centre-gift-vouchers.html') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ContentController::giftVouchersAction',  '_route' => 'content_gift_vouchers',);
        }

        // products_test
        if ($pathinfo === '/products/test') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::testAction',  '_route' => 'products_test',);
        }

        // products_ajax_get_product_listing
        if ($pathinfo === '/products/ajaxGetProductListing') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingAction',  '_route' => 'products_ajax_get_product_listing',);
        }

        // products_ajax_get_product_listing_count
        if ($pathinfo === '/products/ajaxGetProductListingCount') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingCountAction',  '_route' => 'products_ajax_get_product_listing_count',);
        }

        // products_ajax_get_product_listing_pagination
        if ($pathinfo === '/products/ajaxGetProductListingPagination') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingPaginationAction',  '_route' => 'products_ajax_get_product_listing_pagination',);
        }

        // products_ajax_get_product_listing_brand_filter
        if ($pathinfo === '/products/ajaxGetProductListingBrandFilter') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingBrandFilterAction',  '_route' => 'products_ajax_get_product_listing_brand_filter',);
        }

        // products_ajax_get_product_listing_department_filter
        if ($pathinfo === '/products/ajaxGetProductListingDepartmentFilter') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingDepartmentFilterAction',  '_route' => 'products_ajax_get_product_listing_department_filter',);
        }

        // products_ajax_get_product_listing_feature_filter
        if ($pathinfo === '/products/ajaxGetProductListingFeatureFilter') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingFeatureFilterAction',  '_route' => 'products_ajax_get_product_listing_feature_filter',);
        }

        // products_ajax_get_product_listing_price_filter
        if ($pathinfo === '/products/ajaxGetProductListingPriceFilter') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductListingPriceFilterAction',  '_route' => 'products_ajax_get_product_listing_price_filter',);
        }

        // products_ajax_get_product_price
        if ($pathinfo === '/products/ajaxGetProductPrice') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductPriceAction',  '_route' => 'products_ajax_get_product_price',);
        }

        // products_ajax_get_product_search
        if ($pathinfo === '/products/ajaxGetProductSearch') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\ProductsController::ajaxGetProductSearchAction',  '_route' => 'products_ajax_get_product_search',);
        }

        // checkout_secure_checkout
        if ($pathinfo === '/secure-checkout.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'checkout_secure_checkout', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::indexAction',  '_route' => 'checkout_secure_checkout',);
        }

        // checkout_ajax_check_email_address
        if ($pathinfo === '/checkout/ajaxCheckEmailAddress') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxCheckEmailAddressAction',  '_route' => 'checkout_ajax_check_email_address',);
        }

        // checkout_ajax_create_user
        if ($pathinfo === '/checkout/ajaxCreateUser') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxCreateUserAction',  '_route' => 'checkout_ajax_create_user',);
        }

        // checkout_ajax_save_step_1
        if ($pathinfo === '/checkout/ajaxSaveStep1') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep1Action',  '_route' => 'checkout_ajax_save_step_1',);
        }

        // checkout_ajax_save_step_2
        if ($pathinfo === '/checkout/ajaxSaveStep2') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep2Action',  '_route' => 'checkout_ajax_save_step_2',);
        }

        // checkout_ajax_save_step_3
        if ($pathinfo === '/checkout/ajaxSaveStep3') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep3Action',  '_route' => 'checkout_ajax_save_step_3',);
        }

        // checkout_ajax_save_step_4
        if ($pathinfo === '/checkout/ajaxSaveStep4') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxSaveStep4Action',  '_route' => 'checkout_ajax_save_step_4',);
        }

        // checkout_ajax_get_order_information
        if ($pathinfo === '/checkout/ajaxGetOrderInformation') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxGetOrderInformationAction',  '_route' => 'checkout_ajax_get_order_information',);
        }

        // checkout_ajax_add_notes
        if ($pathinfo === '/checkout/ajaxAddNotes') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::ajaxAddNotesAction',  '_route' => 'checkout_ajax_add_notes',);
        }

        // checkout_order_placed
        if ($pathinfo === '/order-placed.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'checkout_order_placed', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::orderPlacedAction',  '_route' => 'checkout_order_placed',);
        }

        // checkout_order_failed
        if ($pathinfo === '/order-failed.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'checkout_order_failed', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\CheckoutController::orderFailedAction',  '_route' => 'checkout_order_failed',);
        }

        // basket_your_basket
        if ($pathinfo === '/your-basket.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'basket_your_basket', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::indexAction',  '_route' => 'basket_your_basket',);
        }

        // basket_ajax_get_basket_summary
        if ($pathinfo === '/basket/ajaxGetBasketSummary') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketSummaryAction',  '_route' => 'basket_ajax_get_basket_summary',);
        }

        // basket_ajax_get_basket_contents
        if ($pathinfo === '/basket/ajaxGetBasketContents') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketContentsAction',  '_route' => 'basket_ajax_get_basket_contents',);
        }

        // basket_ajax_get_basket_totals
        if ($pathinfo === '/basket/ajaxGetBasketTotals') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketTotalsAction',  '_route' => 'basket_ajax_get_basket_totals',);
        }

        // basket_ajax_get_membership_card_discount
        if ($pathinfo === '/basket/ajaxGetMembershipCardDiscount') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetMembershipCardDiscountAction',  '_route' => 'basket_ajax_get_membership_card_discount',);
        }

        // basket_ajax_get_basket_delivery_options
        if ($pathinfo === '/basket/ajaxGetBasketDeliveryOptions') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxGetBasketDeliveryOptionsAction',  '_route' => 'basket_ajax_get_basket_delivery_options',);
        }

        // basket_ajax_update_delivery_options
        if ($pathinfo === '/basket/ajaxUpdateDeliveryOptions') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxUpdateDeliveryOptionsAction',  '_route' => 'basket_ajax_update_delivery_options',);
        }

        // basket_ajax_add_to_basket
        if ($pathinfo === '/basket/ajaxAddToBasket') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxAddToBasketAction',  '_route' => 'basket_ajax_add_to_basket',);
        }

        // basket_ajax_update_basket_item
        if ($pathinfo === '/basket/ajaxUpdateBasketItem') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxUpdateBasketItemAction',  '_route' => 'basket_ajax_update_basket_item',);
        }

        // basket_ajax_delete_basket_item
        if ($pathinfo === '/basket/ajaxDeleteBasketItem') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteBasketItemAction',  '_route' => 'basket_ajax_delete_basket_item',);
        }

        // basket_ajax_clear_basket
        if ($pathinfo === '/basket/ajaxClearBasket') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxClearBasketAction',  '_route' => 'basket_ajax_clear_basket',);
        }

        // basket_ajax_add_membership_card_to_basket
        if ($pathinfo === '/basket/ajaxAddMembershipCardToBasket') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxAddMembershipCardToBasketAction',  '_route' => 'basket_ajax_add_membership_card_to_basket',);
        }

        // basket_ajax_delete_membership_card
        if ($pathinfo === '/basket/ajaxDeleteMembershipCard') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteMembershipCardAction',  '_route' => 'basket_ajax_delete_membership_card',);
        }

        // basket_ajax_redeem_membership_card_number
        if ($pathinfo === '/basket/ajaxRedeemMembershipCardNumber') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxRedeemMembershipCardNumberAction',  '_route' => 'basket_ajax_redeem_membership_card_number',);
        }

        // basket_ajax_redeem_voucher_code
        if ($pathinfo === '/basket/ajaxRedeemVoucherCode') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxRedeemVoucherCodeAction',  '_route' => 'basket_ajax_redeem_voucher_code',);
        }

        // basket_ajax_delete_membership_card_number
        if ($pathinfo === '/basket/ajaxDeleteMembershipCardNumber') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteMembershipCardNumberAction',  '_route' => 'basket_ajax_delete_membership_card_number',);
        }

        // basket_ajax_delete_voucher_code
        if ($pathinfo === '/basket/ajaxDeleteVoucherCode') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\BasketController::ajaxDeleteVoucherCodeAction',  '_route' => 'basket_ajax_delete_voucher_code',);
        }

        // security_login
        if ($pathinfo === '/secure-login.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'security_login', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::loginAction',  '_route' => 'security_login',);
        }

        // security_ajax_login
        if ($pathinfo === '/security/ajaxLogin') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::ajaxLoginAction',  '_route' => 'security_ajax_login',);
        }

        // security_ajax_forgotten_your_password
        if ($pathinfo === '/security/ajaxForgottenYourPassword') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::ajaxForgottenYourPasswordAction',  '_route' => 'security_ajax_forgotten_your_password',);
        }

        // security_reset_password
        if (0 === strpos($pathinfo, '/security/resetPassword') && preg_match('#^/security/resetPassword/(?P<userKey>[^/]+?)$#s', $pathinfo, $matches)) {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'security_reset_password', 'https');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::resetPasswordAction',)), array('_route' => 'security_reset_password'));
        }

        // security_logout
        if ($pathinfo === '/securely-logout.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'security_logout', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'security_logout',);
        }

        // users_register
        if ($pathinfo === '/register.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'users_register', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::registerAction',  '_route' => 'users_register',);
        }

        // users_ajax_check_email_address
        if ($pathinfo === '/users/ajaxCheckEmailAddress') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxCheckEmailAddressAction',  '_route' => 'users_ajax_check_email_address',);
        }

        // users_ajax_create_user
        if ($pathinfo === '/users/ajaxCreateUser') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxCreateUserAction',  '_route' => 'users_ajax_create_user',);
        }

        // users_user
        if ($pathinfo === '/my-account.html') {
            if ($this->context->getScheme() !== 'https') {
                return $this->redirect($pathinfo, 'users_user', 'https');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::userAction',  '_route' => 'users_user',);
        }

        // users_ajax_save_user
        if ($pathinfo === '/users/ajaxSaveUser') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxSaveUserAction',  '_route' => 'users_ajax_save_user',);
        }

        // users_ajax_save_contact_addresses
        if ($pathinfo === '/users/ajaxSaveContactAddresses') {
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\UsersController::ajaxSaveContactAddressesAction',  '_route' => 'users_ajax_save_contact_addresses',);
        }

        // shop_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'shop_homepage');
            }
            return array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::indexAction',  '_route' => 'shop_homepage',);
        }

        // department
        if (preg_match('#^/(?P<url>[^/\\.]+?)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',)), array('_route' => 'department'));
        }

        // department_all
        if (0 === strpos($pathinfo, '/all') && preg_match('#^/all/(?P<url>[^/\\.]+?)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',  'all' => true,)), array('_route' => 'department_all'));
        }

        // department_with_brand
        if (preg_match('#^/(?P<brand>[^/]+?)/(?P<url>[^/\\.]+?)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',)), array('_route' => 'department_with_brand'));
        }

        // department_with_brand_all
        if (0 === strpos($pathinfo, '/all') && preg_match('#^/all/(?P<brand>[^/]+?)/(?P<url>[^/\\.]+?)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',  'all' => true,)), array('_route' => 'department_with_brand_all'));
        }

        // page_request
        if (preg_match('#^/(?P<url>[^/\\.]+?)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\ShopBundle\\Controller\\SystemController::pageRequestAction',)), array('_route' => 'page_request'));
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::indexAction',  '_route' => 'homepage',);
        }

        // camera
        if ($pathinfo === '/camera') {
            if ($this->context->getScheme() !== 'http') {
                return $this->redirect($pathinfo, 'camera', 'http');
            }
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\AdminController::cameraAction',  '_route' => 'camera',);
        }

        // admin_security
        if (rtrim($pathinfo, '/') === '/admin/security') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'admin_security');
            }
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::indexAction',  '_route' => 'admin_security',);
        }

        // admin_security_login
        if ($pathinfo === '/admin/security/login') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'admin_security_login',);
        }

        // admin_security_logout
        if ($pathinfo === '/admin/security/logout') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'admin_security_logout',);
        }

        // system_ajax_upload_file
        if ($pathinfo === '/admin/system/ajaxUploadFile') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUploadFileAction',  '_route' => 'system_ajax_upload_file',);
        }

        // system_ajax_get_images
        if ($pathinfo === '/admin/system/ajaxGetImages') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetImagesAction',  '_route' => 'system_ajax_get_images',);
        }

        // system_ajax_add_image
        if ($pathinfo === '/admin/system/ajaxAddImage') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddImageAction',  '_route' => 'system_ajax_add_image',);
        }

        // system_ajax_update_image
        if ($pathinfo === '/admin/system/ajaxUpdateImage') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateImageAction',  '_route' => 'system_ajax_update_image',);
        }

        // system_ajax_delete_image
        if ($pathinfo === '/admin/system/ajaxDeleteImage') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteImageAction',  '_route' => 'system_ajax_delete_image',);
        }

        // system_ajax_get_files
        if ($pathinfo === '/admin/system/ajaxGetFiles') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetFilesAction',  '_route' => 'system_ajax_get_files',);
        }

        // system_ajax_add_file
        if ($pathinfo === '/admin/system/ajaxAddFile') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddFileAction',  '_route' => 'system_ajax_add_file',);
        }

        // system_ajax_update_file
        if ($pathinfo === '/admin/system/ajaxUpdateFile') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateFileAction',  '_route' => 'system_ajax_update_file',);
        }

        // system_ajax_delete_file
        if ($pathinfo === '/admin/system/ajaxDeleteFile') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteFileAction',  '_route' => 'system_ajax_delete_file',);
        }

        // system_ajax_get_redirects
        if ($pathinfo === '/admin/system/ajaxGetRedirects') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetRedirectsAction',  '_route' => 'system_ajax_get_redirects',);
        }

        // system_ajax_add_redirect
        if ($pathinfo === '/admin/system/ajaxAddRedirect') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddRedirectAction',  '_route' => 'system_ajax_add_redirect',);
        }

        // system_ajax_update_redirect
        if ($pathinfo === '/admin/system/ajaxUpdateRedirect') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateRedirectAction',  '_route' => 'system_ajax_update_redirect',);
        }

        // system_ajax_delete_redirect
        if ($pathinfo === '/admin/system/ajaxDeleteRedirect') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteRedirectAction',  '_route' => 'system_ajax_delete_redirect',);
        }

        // system_ajax_get_guarantees
        if ($pathinfo === '/admin/system/ajaxGetGuarantees') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetGuaranteesAction',  '_route' => 'system_ajax_get_guarantees',);
        }

        // system_ajax_add_guarantee
        if ($pathinfo === '/admin/system/ajaxAddGuarantee') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddGuaranteeAction',  '_route' => 'system_ajax_add_guarantee',);
        }

        // system_ajax_update_guarantee
        if ($pathinfo === '/admin/system/ajaxUpdateGuarantee') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateGuaranteeAction',  '_route' => 'system_ajax_update_guarantee',);
        }

        // system_ajax_delete_guarantee
        if ($pathinfo === '/admin/system/ajaxDeleteGuarantee') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteGuaranteeAction',  '_route' => 'system_ajax_delete_guarantee',);
        }

        // system_ajax_get_contacts
        if ($pathinfo === '/admin/system/ajaxGetContacts') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactsAction',  '_route' => 'system_ajax_get_contacts',);
        }

        // system_ajax_add_contact
        if ($pathinfo === '/admin/system/ajaxAddContact') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactAction',  '_route' => 'system_ajax_add_contact',);
        }

        // system_ajax_update_contact
        if ($pathinfo === '/admin/system/ajaxUpdateContact') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactAction',  '_route' => 'system_ajax_update_contact',);
        }

        // system_ajax_delete_contact
        if ($pathinfo === '/admin/system/ajaxDeleteContact') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactAction',  '_route' => 'system_ajax_delete_contact',);
        }

        // system_ajax_get_contact_numbers
        if ($pathinfo === '/admin/system/ajaxGetContactNumbers') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactNumbersAction',  '_route' => 'system_ajax_get_contact_numbers',);
        }

        // system_ajax_add_contact_number
        if ($pathinfo === '/admin/system/ajaxAddContactNumber') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactNumberAction',  '_route' => 'system_ajax_add_contact_number',);
        }

        // system_ajax_update_contact_number
        if ($pathinfo === '/admin/system/ajaxUpdateContactNumber') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactNumberAction',  '_route' => 'system_ajax_update_contact_number',);
        }

        // system_ajax_delete_contact_number
        if ($pathinfo === '/admin/system/ajaxDeleteContactNumber') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactNumberAction',  '_route' => 'system_ajax_delete_contact_number',);
        }

        // system_ajax_get_contact_addresses
        if ($pathinfo === '/admin/system/ajaxGetContactAddresses') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactAddressesAction',  '_route' => 'system_ajax_get_contact_addresses',);
        }

        // system_ajax_add_contact_address
        if ($pathinfo === '/admin/system/ajaxAddContactAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactAddressAction',  '_route' => 'system_ajax_add_contact_address',);
        }

        // system_ajax_update_contact_address
        if ($pathinfo === '/admin/system/ajaxUpdateContactAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactAddressAction',  '_route' => 'system_ajax_update_contact_address',);
        }

        // system_ajax_delete_contact_address
        if ($pathinfo === '/admin/system/ajaxDeleteContactAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactAddressAction',  '_route' => 'system_ajax_delete_contact_address',);
        }

        // system_ajax_get_contact_web_addresses
        if ($pathinfo === '/admin/system/ajaxGetContactWebAddresses') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactWebAddressesAction',  '_route' => 'system_ajax_get_contact_web_addresses',);
        }

        // system_ajax_add_contact_web_address
        if ($pathinfo === '/admin/system/ajaxAddContactWebAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactWebAddressAction',  '_route' => 'system_ajax_add_contact_web_address',);
        }

        // system_ajax_update_contact_web_address
        if ($pathinfo === '/admin/system/ajaxUpdateContactWebAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactWebAddressAction',  '_route' => 'system_ajax_update_contact_web_address',);
        }

        // system_ajax_delete_contact_web_address
        if ($pathinfo === '/admin/system/ajaxDeleteContactWebAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactWebAddressAction',  '_route' => 'system_ajax_delete_contact_web_address',);
        }

        // system_ajax_get_contact_email_addresses
        if ($pathinfo === '/admin/system/ajaxGetContactEmailAddresses') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxGetContactEmailAddressesAction',  '_route' => 'system_ajax_get_contact_email_addresses',);
        }

        // system_ajax_add_contact_email_address
        if ($pathinfo === '/admin/system/ajaxAddContactEmailAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxAddContactEmailAddressAction',  '_route' => 'system_ajax_add_contact_email_address',);
        }

        // system_ajax_update_contact_email_address
        if ($pathinfo === '/admin/system/ajaxUpdateContactEmailAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxUpdateContactEmailAddressAction',  '_route' => 'system_ajax_update_contact_email_address',);
        }

        // system_ajax_delete_contact_email_address
        if ($pathinfo === '/admin/system/ajaxDeleteContactEmailAddress') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\SystemController::ajaxDeleteContactEmailAddressAction',  '_route' => 'system_ajax_delete_contact_email_address',);
        }

        // orders
        if ($pathinfo === '/admin/orders') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::indexAction',  '_route' => 'orders',);
        }

        // orders_ajax_get_listing
        if ($pathinfo === '/admin/orders/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingAction',  '_route' => 'orders_ajax_get_listing',);
        }

        // orders_ajax_get_listing_count
        if ($pathinfo === '/admin/orders/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingCountAction',  '_route' => 'orders_ajax_get_listing_count',);
        }

        // orders_ajax_get_listing_pagination
        if ($pathinfo === '/admin/orders/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetListingPaginationAction',  '_route' => 'orders_ajax_get_listing_pagination',);
        }

        // orders_ajax_get_order_information
        if ($pathinfo === '/admin/orders/ajaxGetOrderInformation') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetOrderInformationAction',  '_route' => 'orders_ajax_get_order_information',);
        }

        // orders_ajax_get_customer_notes
        if ($pathinfo === '/admin/orders/ajaxGetCustomerNotes') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetCustomerNotesAction',  '_route' => 'orders_ajax_get_customer_notes',);
        }

        // orders_ajax_get_staff_notes
        if ($pathinfo === '/admin/orders/ajaxGetStaffNotes') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxGetStaffNotesAction',  '_route' => 'orders_ajax_get_staff_notes',);
        }

        // orders_ajax_add_customer_note
        if ($pathinfo === '/admin/orders/ajaxAddCustomerNote') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxAddCustomerNoteAction',  '_route' => 'orders_ajax_add_customer_note',);
        }

        // orders_ajax_add_staff_note
        if ($pathinfo === '/admin/orders/ajaxAddStaffNote') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxAddStaffNoteAction',  '_route' => 'orders_ajax_add_staff_note',);
        }

        // orders_ajax_delete_note
        if ($pathinfo === '/admin/orders/ajaxDeleteNote') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxDeleteNoteAction',  '_route' => 'orders_ajax_delete_note',);
        }

        // orders_ajax_delete_order
        if ($pathinfo === '/admin/orders/ajaxDeleteOrder') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxDeleteOrderAction',  '_route' => 'orders_ajax_delete_order',);
        }

        // orders_ajax_update_order_status
        if ($pathinfo === '/admin/orders/ajaxUpdateOrderStatus') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxUpdateOrderStatusAction',  '_route' => 'orders_ajax_update_order_status',);
        }

        // orders_ajax_update_print_flags
        if ($pathinfo === '/admin/orders/ajaxUpdatePrintFlags') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxUpdatePrintFlagsAction',  '_route' => 'orders_ajax_update_print_flags',);
        }

        // orders_regenerate_all_order_documents
        if ($pathinfo === '/admin/orders/regenerateAllOrderDocuments') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::regenerateAllOrderDocumentsAction',  '_route' => 'orders_regenerate_all_order_documents',);
        }

        // orders_ajax_send_invoice
        if ($pathinfo === '/admin/orders/ajaxSendInvoice') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxSendInvoiceAction',  '_route' => 'orders_ajax_send_invoice',);
        }

        // orders_ajax_bulk_print_invoices
        if ($pathinfo === '/admin/orders/ajaxBulkPrintInvoices') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintInvoicesAction',  '_route' => 'orders_ajax_bulk_print_invoices',);
        }

        // orders_ajax_bulk_print_delivery_notes
        if ($pathinfo === '/admin/orders/ajaxBulkPrintDeliveryNotes') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintDeliveryNotesAction',  '_route' => 'orders_ajax_bulk_print_delivery_notes',);
        }

        // orders_ajax_bulk_print_invoices_and_delivery_notes
        if ($pathinfo === '/admin/orders/ajaxBulkPrintInvoicesAndDeliveryNotes') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::ajaxBulkPrintInvoicesAndDeliveryNotesAction',  '_route' => 'orders_ajax_bulk_print_invoices_and_delivery_notes',);
        }

        // orders_view_delivery_note
        if (0 === strpos($pathinfo, '/admin/orders/viewDeliveryNote') && preg_match('#^/admin/orders/viewDeliveryNote(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewDeliveryNoteAction',  'id' => 0,)), array('_route' => 'orders_view_delivery_note'));
        }

        // orders_view_delivery_notes
        if (0 === strpos($pathinfo, '/admin/orders/viewDeliveryNotes') && preg_match('#^/admin/orders/viewDeliveryNotes(?:/(?P<ids>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewDeliveryNotesAction',  'ids' => 0,)), array('_route' => 'orders_view_delivery_notes'));
        }

        // orders_view_invoice
        if (0 === strpos($pathinfo, '/admin/orders/viewInvoice') && preg_match('#^/admin/orders/viewInvoice(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoiceAction',  'id' => 0,)), array('_route' => 'orders_view_invoice'));
        }

        // orders_view_invoices
        if (0 === strpos($pathinfo, '/admin/orders/viewInvoices') && preg_match('#^/admin/orders/viewInvoices(?:/(?P<ids>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoicesAction',  'ids' => 0,)), array('_route' => 'orders_view_invoices'));
        }

        // orders_view_invoice_and_delivery_note
        if (0 === strpos($pathinfo, '/admin/orders/viewInvoiceAndDeliveryNote') && preg_match('#^/admin/orders/viewInvoiceAndDeliveryNote(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoiceAndDeliveryNoteAction',  'id' => 0,)), array('_route' => 'orders_view_invoice_and_delivery_note'));
        }

        // orders_view_invoices_and_delivery_notes
        if (0 === strpos($pathinfo, '/admin/orders/viewInvoicesAndDeliveryNotes') && preg_match('#^/admin/orders/viewInvoicesAndDeliveryNotes(?:/(?P<ids>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewInvoicesAndDeliveryNotesAction',  'ids' => 0,)), array('_route' => 'orders_view_invoices_and_delivery_notes'));
        }

        // orders_view_copy_invoice
        if (0 === strpos($pathinfo, '/admin/orders/viewCopyInvoice') && preg_match('#^/admin/orders/viewCopyInvoice(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::viewCopyInvoiceAction',  'id' => 0,)), array('_route' => 'orders_view_copy_invoice'));
        }

        // orders_edit
        if (0 === strpos($pathinfo, '/admin/orders/edit') && preg_match('#^/admin/orders/edit(?:/(?P<id>[^/]+?)(?:/(?P<current_tab>[^/]+?))?)?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::editAction',  'id' => 0,  'current_tab' => 'general',)), array('_route' => 'orders_edit'));
        }

        // orders_delete
        if (0 === strpos($pathinfo, '/admin/orders/delete') && preg_match('#^/admin/orders/delete(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\OrdersController::deleteAction',  'id' => 0,)), array('_route' => 'orders_delete'));
        }

        // admin_voucher_codes
        if ($pathinfo === '/admin/voucherCodes') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::indexAction',  '_route' => 'admin_voucher_codes',);
        }

        // admin_voucher_codes_ajax_get_listing
        if ($pathinfo === '/admin/voucherCodes/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingAction',  '_route' => 'admin_voucher_codes_ajax_get_listing',);
        }

        // admin_voucher_codes_ajax_get_listing_count
        if ($pathinfo === '/admin/voucherCodes/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingCountAction',  '_route' => 'admin_voucher_codes_ajax_get_listing_count',);
        }

        // admin_voucher_codes_ajax_get_listing_pagination
        if ($pathinfo === '/admin/voucherCodes/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetListingPaginationAction',  '_route' => 'admin_voucher_codes_ajax_get_listing_pagination',);
        }

        // admin_voucher_codes_ajax_add_voucher_code
        if ($pathinfo === '/admin/voucherCodes/ajaxAddVoucherCode') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddVoucherCodeAction',  '_route' => 'admin_voucher_codes_ajax_add_voucher_code',);
        }

        // admin_voucher_codes_ajax_save_voucher_code
        if ($pathinfo === '/admin/voucherCodes/ajaxSaveVoucherCode') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxSaveVoucherCodeAction',  '_route' => 'admin_voucher_codes_ajax_save_voucher_code',);
        }

        // admin_voucher_codes_ajax_save_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxSaveDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxSaveDiscountAction',  '_route' => 'admin_voucher_codes_ajax_save_discount',);
        }

        // admin_voucher_codes_ajax_get_brand_discounts
        if ($pathinfo === '/admin/voucherCodes/ajaxGetBrandDiscounts') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetBrandDiscountsAction',  '_route' => 'admin_voucher_codes_ajax_get_brand_discounts',);
        }

        // admin_voucher_codes_ajax_add_brand_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxAddBrandDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddBrandDiscountAction',  '_route' => 'admin_voucher_codes_ajax_add_brand_discount',);
        }

        // admin_voucher_codes_ajax_delete_brand_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxDeleteBrandDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteBrandDiscountAction',  '_route' => 'admin_voucher_codes_ajax_delete_brand_discount',);
        }

        // admin_voucher_codes_ajax_get_department_discounts
        if ($pathinfo === '/admin/voucherCodes/ajaxGetDepartmentDiscounts') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetDepartmentDiscountsAction',  '_route' => 'admin_voucher_codes_ajax_get_department_discounts',);
        }

        // admin_voucher_codes_ajax_add_department_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxAddDepartmentDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddDepartmentDiscountAction',  '_route' => 'admin_voucher_codes_ajax_add_department_discount',);
        }

        // admin_voucher_codes_ajax_delete_department_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxDeleteDepartmentDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteDepartmentDiscountAction',  '_route' => 'admin_voucher_codes_ajax_delete_department_discount',);
        }

        // admin_voucher_codes_ajax_get_product_discounts
        if ($pathinfo === '/admin/voucherCodes/ajaxGetProductDiscounts') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxGetProductDiscountsAction',  '_route' => 'admin_voucher_codes_ajax_get_product_discounts',);
        }

        // admin_voucher_codes_ajax_add_product_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxAddProductDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxAddProductDiscountAction',  '_route' => 'admin_voucher_codes_ajax_add_product_discount',);
        }

        // admin_voucher_codes_ajax_delete_product_discount
        if ($pathinfo === '/admin/voucherCodes/ajaxDeleteProductDiscount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxDeleteProductDiscountAction',  '_route' => 'admin_voucher_codes_ajax_delete_product_discount',);
        }

        // admin_voucher_codes_ajax_update_voucher_code
        if ($pathinfo === '/admin/voucherCodes/ajaxUpdateVoucherCode') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::ajaxUpdateVoucherCodeAction',  '_route' => 'admin_voucher_codes_ajax_update_voucher_code',);
        }

        // admin_voucher_codes_delete
        if (0 === strpos($pathinfo, '/admin/voucherCodes/delete') && preg_match('#^/admin/voucherCodes/delete(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\VoucherCodesController::deleteAction',  'id' => 0,)), array('_route' => 'admin_voucher_codes_delete'));
        }

        // admin_membership_cards
        if ($pathinfo === '/admin/membershipCards') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::indexAction',  '_route' => 'admin_membership_cards',);
        }

        // admin_membership_cards_ajax_get_listing
        if ($pathinfo === '/admin/membershipCards/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingAction',  '_route' => 'admin_membership_cards_ajax_get_listing',);
        }

        // admin_membership_cards_ajax_get_listing_count
        if ($pathinfo === '/admin/membershipCards/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingCountAction',  '_route' => 'admin_membership_cards_ajax_get_listing_count',);
        }

        // admin_membership_cards_ajax_get_listing_pagination
        if ($pathinfo === '/admin/membershipCards/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetListingPaginationAction',  '_route' => 'admin_membership_cards_ajax_get_listing_pagination',);
        }

        // admin_membership_cards_ajax_add_membership_card
        if ($pathinfo === '/admin/membershipCards/ajaxAddMembershipCard') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxAddMembershipCardAction',  '_route' => 'admin_membership_cards_ajax_add_membership_card',);
        }

        // admin_membership_cards_ajax_delete_membership_card
        if ($pathinfo === '/admin/membershipCards/ajaxDeleteMembershipCard') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxDeleteMembershipCardAction',  '_route' => 'admin_membership_cards_ajax_delete_membership_card',);
        }

        // admin_membership_cards_ajax_save_membership_card
        if ($pathinfo === '/admin/membershipCards/ajaxSaveMembershipCard') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxSaveMembershipCardAction',  '_route' => 'admin_membership_cards_ajax_save_membership_card',);
        }

        // admin_membership_cards_ajax_save_user
        if ($pathinfo === '/admin/membershipCards/ajaxSaveUser') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxSaveUserAction',  '_route' => 'admin_membership_cards_ajax_save_user',);
        }

        // admin_membership_cards_ajax_release_user
        if ($pathinfo === '/admin/membershipCards/ajaxReleaseUser') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxReleaseUserAction',  '_route' => 'admin_membership_cards_ajax_release_user',);
        }

        // admin_membership_cards_ajax_get_customer
        if ($pathinfo === '/admin/membershipCards/ajaxGetCustomer') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\MembershipCardsController::ajaxGetCustomerAction',  '_route' => 'admin_membership_cards_ajax_get_customer',);
        }

        // admin_practice_day_registrations
        if ($pathinfo === '/admin/practiceDayRegistrations') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::indexAction',  '_route' => 'admin_practice_day_registrations',);
        }

        // admin_practice_day_registrations_ajax_get_listing
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingAction',  '_route' => 'admin_practice_day_registrations_ajax_get_listing',);
        }

        // admin_practice_day_registrations_ajax_get_listing_count
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingCountAction',  '_route' => 'admin_practice_day_registrations_ajax_get_listing_count',);
        }

        // admin_practice_day_registrations_ajax_get_listing_pagination
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxGetListingPaginationAction',  '_route' => 'admin_practice_day_registrations_ajax_get_listing_pagination',);
        }

        // admin_practice_day_registrations_ajax_add_practice_day_registration
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxAddPracticeDayRegistration') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxAddPracticeDayRegistrationAction',  '_route' => 'admin_practice_day_registrations_ajax_add_practice_day_registration',);
        }

        // admin_practice_day_registrations_ajax_delete_practice_day_registration
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxDeletePracticeDayRegistration') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxDeletePracticeDayRegistrationAction',  '_route' => 'admin_practice_day_registrations_ajax_delete_practice_day_registration',);
        }

        // admin_practice_day_registrations_ajax_save_practice_day_registration
        if ($pathinfo === '/admin/practiceDayRegistrations/ajaxSavePracticeDayRegistration') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::ajaxSavePracticeDayRegistrationAction',  '_route' => 'admin_practice_day_registrations_ajax_save_practice_day_registration',);
        }

        // admin_practice_day_registrations_test
        if ($pathinfo === '/admin/practiceDayRegistrations/test') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\PracticeDayRegistrationsController::testAction',  '_route' => 'admin_practice_day_registrations_test',);
        }

        // admin_product_options
        if ($pathinfo === '/admin/productOptions') {
            return array (  '_controller' => 'WebIlluminationAdminBundle:ProductOptions:index',  '_route' => 'admin_product_options',);
        }

        // admin_product_features
        if ($pathinfo === '/admin/productFeatures') {
            return array (  '_controller' => 'WebIlluminationAdminBundle:ProductFeatures:index',  '_route' => 'admin_product_features',);
        }

        // admin_links
        if ($pathinfo === '/admin/links') {
            return array (  '_controller' => 'WebIlluminationAdminBundle:Links:index',  '_route' => 'admin_links',);
        }

        // admin_brands
        if ($pathinfo === '/admin/brands') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::indexAction',  '_route' => 'admin_brands',);
        }

        // admin_brands_add
        if ($pathinfo === '/admin/brands/add') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::addAction',  '_route' => 'admin_brands_add',);
        }

        // admin_brands_update
        if (0 === strpos($pathinfo, '/admin/brands/update') && preg_match('#^/admin/brands/update(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::updateAction',  'id' => 0,)), array('_route' => 'admin_brands_update'));
        }

        // admin_brands_delete
        if (0 === strpos($pathinfo, '/admin/brands/delete') && preg_match('#^/admin/brands/delete(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::deleteAction',  'id' => 0,)), array('_route' => 'admin_brands_delete'));
        }

        // admin_brands_ajax_delete
        if ($pathinfo === '/admin/brands/ajaxDelete') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxDeleteAction',  '_route' => 'admin_brands_ajax_delete',);
        }

        // admin_brands_ajax_get_listing
        if ($pathinfo === '/admin/brands/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingAction',  '_route' => 'admin_brands_ajax_get_listing',);
        }

        // admin_brands_ajax_get_listing_count
        if ($pathinfo === '/admin/brands/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingCountAction',  '_route' => 'admin_brands_ajax_get_listing_count',);
        }

        // admin_brands_ajax_get_listing_pagination
        if ($pathinfo === '/admin/brands/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetListingPaginationAction',  '_route' => 'admin_brands_ajax_get_listing_pagination',);
        }

        // admin_brands_ajax_update
        if ($pathinfo === '/admin/brands/ajaxUpdate') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateAction',  '_route' => 'admin_brands_ajax_update',);
        }

        // admin_brands_ajax_update_general_section
        if ($pathinfo === '/admin/brands/ajaxUpdateGeneralSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateGeneralSectionAction',  '_route' => 'admin_brands_ajax_update_general_section',);
        }

        // admin_brands_ajax_delete_logo_image
        if ($pathinfo === '/admin/brands/ajaxDeleteLogoImage') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxDeleteLogoImageAction',  '_route' => 'admin_brands_ajax_delete_logo_image',);
        }

        // admin_brands_ajax_update_description_section
        if ($pathinfo === '/admin/brands/ajaxUpdateDescriptionSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateDescriptionSectionAction',  '_route' => 'admin_brands_ajax_update_description_section',);
        }

        // admin_brands_ajax_get_description
        if ($pathinfo === '/admin/brands/ajaxGetDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetDescriptionAction',  '_route' => 'admin_brands_ajax_get_description',);
        }

        // admin_brands_ajax_get_short_description
        if ($pathinfo === '/admin/brands/ajaxGetShortDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxGetShortDescriptionAction',  '_route' => 'admin_brands_ajax_get_short_description',);
        }

        // admin_brands_ajax_update_price_settings_section
        if ($pathinfo === '/admin/brands/ajaxUpdatePriceSettingsSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdatePriceSettingsSectionAction',  '_route' => 'admin_brands_ajax_update_price_settings_section',);
        }

        // admin_brands_ajax_update_seo_section
        if ($pathinfo === '/admin/brands/ajaxUpdateSeoSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxUpdateSeoSectionAction',  '_route' => 'admin_brands_ajax_update_seo_section',);
        }

        // admin_brands_ajax_reset_seo
        if ($pathinfo === '/admin/brands/ajaxResetSeo') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\BrandsController::ajaxResetSeoAction',  '_route' => 'admin_brands_ajax_reset_seo',);
        }

        // admin_departments
        if ($pathinfo === '/admin/departments') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::indexAction',  '_route' => 'admin_departments',);
        }

        // admin_departments_add
        if ($pathinfo === '/admin/departments/add') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::addAction',  '_route' => 'admin_departments_add',);
        }

        // admin_departments_update
        if (0 === strpos($pathinfo, '/admin/departments/update') && preg_match('#^/admin/departments/update(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::updateAction',  'id' => 0,)), array('_route' => 'admin_departments_update'));
        }

        // admin_departments_delete
        if (0 === strpos($pathinfo, '/admin/departments/delete') && preg_match('#^/admin/departments/delete(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::deleteAction',  'id' => 0,)), array('_route' => 'admin_departments_delete'));
        }

        // admin_departments_ajax_delete
        if ($pathinfo === '/admin/departments/ajaxDelete') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxDeleteAction',  '_route' => 'admin_departments_ajax_delete',);
        }

        // admin_departments_ajax_get_listing
        if ($pathinfo === '/admin/departments/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingAction',  '_route' => 'admin_departments_ajax_get_listing',);
        }

        // admin_departments_ajax_get_listing_count
        if ($pathinfo === '/admin/departments/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingCountAction',  '_route' => 'admin_departments_ajax_get_listing_count',);
        }

        // admin_departments_ajax_get_listing_pagination
        if ($pathinfo === '/admin/departments/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetListingPaginationAction',  '_route' => 'admin_departments_ajax_get_listing_pagination',);
        }

        // admin_departments_ajax_update
        if ($pathinfo === '/admin/departments/ajaxUpdate') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateAction',  '_route' => 'admin_departments_ajax_update',);
        }

        // admin_departments_ajax_update_general_section
        if ($pathinfo === '/admin/departments/ajaxUpdateGeneralSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateGeneralSectionAction',  '_route' => 'admin_departments_ajax_update_general_section',);
        }

        // admin_departments_ajax_update_description_section
        if ($pathinfo === '/admin/departments/ajaxUpdateDescriptionSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateDescriptionSectionAction',  '_route' => 'admin_departments_ajax_update_description_section',);
        }

        // admin_departments_ajax_get_description
        if ($pathinfo === '/admin/departments/ajaxGetDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetDescriptionAction',  '_route' => 'admin_departments_ajax_get_description',);
        }

        // admin_departments_ajax_get_short_description
        if ($pathinfo === '/admin/departments/ajaxGetShortDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxGetShortDescriptionAction',  '_route' => 'admin_departments_ajax_get_short_description',);
        }

        // admin_departments_ajax_update_price_settings_section
        if ($pathinfo === '/admin/departments/ajaxUpdatePriceSettingsSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdatePriceSettingsSectionAction',  '_route' => 'admin_departments_ajax_update_price_settings_section',);
        }

        // admin_departments_ajax_update_seo_section
        if ($pathinfo === '/admin/departments/ajaxUpdateSeoSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxUpdateSeoSectionAction',  '_route' => 'admin_departments_ajax_update_seo_section',);
        }

        // admin_departments_ajax_reset_seo
        if ($pathinfo === '/admin/departments/ajaxResetSeo') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DepartmentsController::ajaxResetSeoAction',  '_route' => 'admin_departments_ajax_reset_seo',);
        }

        // admin_products
        if ($pathinfo === '/admin/products') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::indexAction',  '_route' => 'admin_products',);
        }

        // admin_rebuild_product_headers
        if ($pathinfo === '/admin/products/rebuildProductHeaders') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::rebuildProductHeadersAction',  '_route' => 'admin_rebuild_product_headers',);
        }

        // admin_products_add
        if ($pathinfo === '/admin/products/add') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::addAction',  '_route' => 'admin_products_add',);
        }

        // admin_products_update
        if (0 === strpos($pathinfo, '/admin/products/update') && preg_match('#^/admin/products/update(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::updateAction',  'id' => 0,)), array('_route' => 'admin_products_update'));
        }

        // admin_products_delete
        if (0 === strpos($pathinfo, '/admin/products/delete') && preg_match('#^/admin/products/delete(?:/(?P<id>[^/]+?))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::deleteAction',  'id' => 0,)), array('_route' => 'admin_products_delete'));
        }

        // admin_products_ajax_delete
        if ($pathinfo === '/admin/products/ajaxDelete') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteAction',  '_route' => 'admin_products_ajax_delete',);
        }

        // admin_products_ajax_get_listing
        if ($pathinfo === '/admin/products/ajaxGetListing') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingAction',  '_route' => 'admin_products_ajax_get_listing',);
        }

        // admin_products_ajax_get_listing_count
        if ($pathinfo === '/admin/products/ajaxGetListingCount') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingCountAction',  '_route' => 'admin_products_ajax_get_listing_count',);
        }

        // admin_products_ajax_get_listing_pagination
        if ($pathinfo === '/admin/products/ajaxGetListingPagination') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetListingPaginationAction',  '_route' => 'admin_products_ajax_get_listing_pagination',);
        }

        // admin_products_ajax_update
        if ($pathinfo === '/admin/products/ajaxUpdate') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateAction',  '_route' => 'admin_products_ajax_update',);
        }

        // admin_products_ajax_update_general_section
        if ($pathinfo === '/admin/products/ajaxUpdateGeneralSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateGeneralSectionAction',  '_route' => 'admin_products_ajax_update_general_section',);
        }

        // admin_products_ajax_update_description_section
        if ($pathinfo === '/admin/products/ajaxUpdateDescriptionSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateDescriptionSectionAction',  '_route' => 'admin_products_ajax_update_description_section',);
        }

        // admin_products_ajax_get_description
        if ($pathinfo === '/admin/products/ajaxGetDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetDescriptionAction',  '_route' => 'admin_products_ajax_get_description',);
        }

        // admin_products_ajax_get_short_description
        if ($pathinfo === '/admin/products/ajaxGetShortDescription') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetShortDescriptionAction',  '_route' => 'admin_products_ajax_get_short_description',);
        }

        // admin_products_ajax_get_prices
        if ($pathinfo === '/admin/products/ajaxGetPrices') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetPricesAction',  '_route' => 'admin_products_ajax_get_prices',);
        }

        // admin_products_ajax_add_price
        if ($pathinfo === '/admin/products/ajaxAddPrice') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddPriceAction',  '_route' => 'admin_products_ajax_add_price',);
        }

        // admin_products_ajax_update_price
        if ($pathinfo === '/admin/products/ajaxUpdatePrice') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePriceAction',  '_route' => 'admin_products_ajax_update_price',);
        }

        // admin_products_ajax_delete_price
        if ($pathinfo === '/admin/products/ajaxDeletePrice') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeletePriceAction',  '_route' => 'admin_products_ajax_delete_price',);
        }

        // admin_products_ajax_update_price_settings_section
        if ($pathinfo === '/admin/products/ajaxUpdatePriceSettingsSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePriceSettingsSectionAction',  '_route' => 'admin_products_ajax_update_price_settings_section',);
        }

        // admin_products_ajax_get_options
        if ($pathinfo === '/admin/products/ajaxGetOptions') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetOptionsAction',  '_route' => 'admin_products_ajax_get_options',);
        }

        // admin_products_ajax_add_option_group
        if ($pathinfo === '/admin/products/ajaxAddOptionGroup') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddOptionGroupAction',  '_route' => 'admin_products_ajax_add_option_group',);
        }

        // admin_products_ajax_delete_option_group
        if ($pathinfo === '/admin/products/ajaxDeleteOptionGroup') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteOptionGroupAction',  '_route' => 'admin_products_ajax_delete_option_group',);
        }

        // admin_products_ajax_add_option
        if ($pathinfo === '/admin/products/ajaxAddOption') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddOptionAction',  '_route' => 'admin_products_ajax_add_option',);
        }

        // admin_products_ajax_update_option
        if ($pathinfo === '/admin/products/ajaxUpdateOption') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateOptionAction',  '_route' => 'admin_products_ajax_update_option',);
        }

        // admin_products_ajax_delete_option
        if ($pathinfo === '/admin/products/ajaxDeleteOption') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteOptionAction',  '_route' => 'admin_products_ajax_delete_option',);
        }

        // admin_products_ajax_get_features
        if ($pathinfo === '/admin/products/ajaxGetFeatures') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetFeaturesAction',  '_route' => 'admin_products_ajax_get_features',);
        }

        // admin_products_ajax_add_feature_group
        if ($pathinfo === '/admin/products/ajaxAddFeatureGroup') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddFeatureGroupAction',  '_route' => 'admin_products_ajax_add_feature_group',);
        }

        // admin_products_ajax_delete_feature_group
        if ($pathinfo === '/admin/products/ajaxDeleteFeatureGroup') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteFeatureGroupAction',  '_route' => 'admin_products_ajax_delete_feature_group',);
        }

        // admin_products_ajax_add_feature
        if ($pathinfo === '/admin/products/ajaxAddFeature') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddFeatureAction',  '_route' => 'admin_products_ajax_add_feature',);
        }

        // admin_products_ajax_update_feature
        if ($pathinfo === '/admin/products/ajaxUpdateFeature') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateFeatureAction',  '_route' => 'admin_products_ajax_update_feature',);
        }

        // admin_products_ajax_delete_feature
        if ($pathinfo === '/admin/products/ajaxDeleteFeature') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteFeatureAction',  '_route' => 'admin_products_ajax_delete_feature',);
        }

        // admin_products_ajax_get_related_products
        if ($pathinfo === '/admin/products/ajaxGetRelatedProducts') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetRelatedProductsAction',  '_route' => 'admin_products_ajax_get_related_products',);
        }

        // admin_products_ajax_add_related_product
        if ($pathinfo === '/admin/products/ajaxAddRelatedProduct') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddRelatedProductAction',  '_route' => 'admin_products_ajax_add_related_product',);
        }

        // admin_products_ajax_update_related_product
        if ($pathinfo === '/admin/products/ajaxUpdateRelatedProduct') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateRelatedProductAction',  '_route' => 'admin_products_ajax_update_related_product',);
        }

        // admin_products_ajax_delete_related_product
        if ($pathinfo === '/admin/products/ajaxDeleteRelatedProduct') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteRelatedProductAction',  '_route' => 'admin_products_ajax_delete_related_product',);
        }

        // admin_products_ajax_get_cheaper_alternatives
        if ($pathinfo === '/admin/products/ajaxGetCheaperAlternatives') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxGetCheaperAlternativesAction',  '_route' => 'admin_products_ajax_get_cheaper_alternatives',);
        }

        // admin_products_ajax_add_cheaper_alternative
        if ($pathinfo === '/admin/products/ajaxAddCheaperAlternative') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxAddCheaperAlternativeAction',  '_route' => 'admin_products_ajax_add_cheaper_alternative',);
        }

        // admin_products_ajax_update_cheaper_alternative
        if ($pathinfo === '/admin/products/ajaxUpdateCheaperAlternative') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateCheaperAlternativeAction',  '_route' => 'admin_products_ajax_update_cheaper_alternative',);
        }

        // admin_products_ajax_delete_cheaper_alternative
        if ($pathinfo === '/admin/products/ajaxDeleteCheaperAlternative') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxDeleteCheaperAlternativeAction',  '_route' => 'admin_products_ajax_delete_cheaper_alternative',);
        }

        // admin_products_ajax_update_unique_product_identifiers_section
        if ($pathinfo === '/admin/products/ajaxUpdateUniqueProductIdentifiersSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateUniqueProductIdentifiersSectionAction',  '_route' => 'admin_products_ajax_update_unique_product_identifiers_section',);
        }

        // admin_products_ajax_update_package_dimensions_section
        if ($pathinfo === '/admin/products/ajaxUpdatePackageDimensionsSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdatePackageDimensionsSectionAction',  '_route' => 'admin_products_ajax_update_package_dimensions_section',);
        }

        // admin_products_ajax_update_seo_section
        if ($pathinfo === '/admin/products/ajaxUpdateSeoSection') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxUpdateSeoSectionAction',  '_route' => 'admin_products_ajax_update_seo_section',);
        }

        // admin_products_ajax_reset_seo
        if ($pathinfo === '/admin/products/ajaxResetSeo') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxResetSeoAction',  '_route' => 'admin_products_ajax_reset_seo',);
        }

        // admin_products_ajax_rebuild_product
        if ($pathinfo === '/admin/products/ajaxRebuildProduct') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\ProductsController::ajaxRebuildProductAction',  '_route' => 'admin_products_ajax_rebuild_product',);
        }

        // data
        if ($pathinfo === '/admin/data') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::legacyImportAction',  '_route' => 'data',);
        }

        // data_legacy_import
        if ($pathinfo === '/admin/data/legacyImport') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::legacyImportAction',  '_route' => 'data_legacy_import',);
        }

        // data_ajax_load_legacy_import_data
        if ($pathinfo === '/admin/data/ajaxLoadLegacyImportData') {
            return array (  '_controller' => 'WebIllumination\\AdminBundle\\Controller\\DataController::ajaxLoadLegacyImportDataAction',  '_route' => 'data_ajax_load_legacy_import_data',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
