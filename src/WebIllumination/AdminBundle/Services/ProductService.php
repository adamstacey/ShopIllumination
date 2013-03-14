<?php

namespace WebIllumination\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;

class ProductService {

    protected $container;
    protected $singleItemTitle;
    protected $multipleItemsTitle;
    protected $singleItemDescription;
    protected $multipleItemsDescription;
    protected $singleItemClass;
    protected $multipleItemsClass;
    protected $singleItemPath;
    protected $multipleItemsPath;
    protected $singleItemModel;
    protected $multipleItemsModel;
    protected $listingSortOrder;
    protected $listingSort;
    protected $listingOrder;
    protected $listingMaxResults;

    public function __construct($container)
    {
        $this->container = $container;
        $this->singleItemTitle = 'Product';
        $this->multipleItemsTitle = 'Products';
        $this->singleItemDescription = 'product';
        $this->multipleItemsDescription = 'products';
        $this->singleItemClass = 'product';
        $this->multipleItemsClass = 'products';
        $this->singleItemPath = 'product';
        $this->multipleItemsPath = 'products';
        $this->singleItemModel = 'Product';
        $this->multipleItemsModel = 'Products';
        $this->listingSortOrder = 'product:ASC';
        $this->listingSort = 'product';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
        $this->membershipCardDiscount = 10;
    }

    // Initialise the admin order session
    public function initialiseAdminProductSession()
    {
        // Get the settings session
        $sessionSettings = $this->container->get('session')->get('settings');
        if (!isset($sessionSettings['admin']['products']))
        {
            // Setup the settings
            $settings = array();
            $settings['singleItemTitle'] = $this->singleItemTitle;
            $settings['multipleItemsTitle'] = $this->multipleItemsTitle;
            $settings['singleItemDescription'] = $this->singleItemDescription;
            $settings['multipleItemsDescription'] = $this->multipleItemsDescription;
            $settings['singleItemClass'] = $this->singleItemClass;
            $settings['multipleItemsClass'] = $this->multipleItemsClass;
            $settings['singleItemPath'] = $this->singleItemPath;
            $settings['multipleItemsPath'] = $this->multipleItemsPath;
            $settings['singleItemModel'] = $this->singleItemModel;
            $settings['multipleItemsModel'] = $this->multipleItemsModel;
            $settings['listingSortOrder'] = $this->listingSortOrder;
            $settings['listingSort'] = $this->listingSort;
            $settings['listingOrder'] = $this->listingOrder;
            $settings['listingMaxResults'] = $this->listingMaxResults;
        } else {
            $settings = $sessionSettings['admin']['products'];
        }

        // Get the filters session
        $sessionFilters = $this->container->get('session')->get('filters');
        if (!isset($sessionFilters['admin']['products']))
        {
            // Setup the filters
            $filters = array();
            $filters['status'] = '';
            $filters['availableForPurchase'] = '';
            $filters['hidePrice'] = '';
            $filters['showPriceOutOfHours'] = '';
            $filters['membershipCardDiscountAvailable'] = '';
            $filters['featureComparison'] = '';
            $filters['downloadable'] = '';
            $filters['specialOffer'] = '';
            $filters['recommended'] = '';
            $filters['accessory'] = '';
            $filters['new'] = '';
            $filters['productCode'] = '';
            $filters['name'] = '';
            $filters['description'] = '';
            $filters['costPriceFrom'] = 0;
            $filters['costPriceTo'] = 10000;
            $filters['recommendedRetailPriceFrom'] = 0;
            $filters['recommendedRetailPriceTo'] = 10000;
            $filters['listPriceFrom'] = 0;
            $filters['listPriceTo'] = 10000;
            $filters['discountFrom'] = 0;
            $filters['discountTo'] = 1000;
            $filters['brand'] = '';
            $filters['department'] = '';
        } else {
            $filters = $sessionFilters['admin']['products'];
        }

        // Update the session
        $sessionSettings['admin']['products'] = $settings;
        $sessionFilters['admin']['products'] = $filters;
        $this->container->get('session')->set('settings', $sessionSettings);
        $this->container->get('session')->set('filters', $sessionFilters);

        return true;
    }

    // Get product search
    public function getProductSearch($search, $locale = 'en', $currencyCode = 'GBP')
    {
        if (strlen($search) >= 3)
        {
            // Get the services
            $doctrineService = $this->container->get('doctrine');

            // Split the keywords
            $search = explode(' ', $search);

            // Get the entity manager
            $em = $doctrineService->getEntityManager();

            // Get the query builder
            $qb = $em->createQueryBuilder();

            // Build the query
            $qb->select('pi');
            $qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
            $qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
            foreach ($search as $keyword)
            {
                $qb->andWhere($qb->expr()->orx(
                    $qb->expr()->like('pi.searchWords', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.alternativeProductCodes', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.brand', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.departments', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.productOptions', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.product', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.header', $qb->expr()->literal('%'.$keyword.'%')),
                    $qb->expr()->like('pi.productCode', $qb->expr()->literal('%'.$keyword.'%'))
                ));
            }
            $qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
            $qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
            $qb->addOrderBy('pi.accessory', 'ASC');
            $qb->addOrderBy('pi.listPrice', 'ASC');
            $qb->setFirstResult(0);
            $qb->setMaxResults(90);

            $query = $qb->getQuery();

            $products = $query->getResult();
            return $products;
        }

        return false;
    }

    // Get special offers
    public function getSpecialOffers($locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('pi');
        $qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
        $qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
        $qb->andWhere($qb->expr()->lt('pi.listPrice', 'pi.recommendedRetailPrice'));
        $qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
        $qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
        $qb->addOrderBy('pi.listPrice', 'DESC');
        $qb->setFirstResult(0);
        $qb->setMaxResults(30);
        $query = $qb->getQuery();

        $products = $query->getResult();
        return $products;
    }

    // Get all products
    public function getAllProducts($locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('pi');
        $qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
        $qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
        $qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
        $qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
        $query = $qb->getQuery();

        // Get the products
        $products = $query->getResult();

        return $products;
    }

    // Sort the product features by feature
    static function sortProductFeaturesByFeature($a, $b)
    {
        return strcmp($a['productFeature'], $b['productFeature']);
    }

    // Sort the product features by product count
    static function sortProductFeaturesByProductCount($a, $b)
    {
        return $a['productCount']<$b['productCount'];
    }

    // Get products
    public function getProducts($locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Setup products
        $products = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findBy(array(), array('header' => 'ASC'));

        return $products;
    }

    // Get a product
    public function getProduct($id, $locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');
        $seoService = $this->container->get('web_illumination_admin.seo_service');

        /**
         * Get the entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Setup the product
        $product = array();

        // Get the product
        $productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
        $productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $id, 'locale' => $locale));
        if (!$productObject || !$productDescriptionObject)
        {
            return false;
        }
        $product['id'] = $productObject->getId();
        $product['productId'] = $productObject->getId();
        $product['productGroupId'] = $productObject->getProductGroupId();
        $product['availableForPurchase'] = $productObject->getAvailableForPurchase();
        $product['status'] = $productObject->getStatus();
        $product['product'] = $productDescriptionObject->getProduct();
        $product['prefix'] = $productDescriptionObject->getPrefix();
        $product['tagline'] = $productDescriptionObject->getTagline();
        $product['productCode'] = $productObject->getProductCode();
        $product['productGroupCode'] = $productObject->getProductGroupCode();
        $product['alternativeProductCodes'] = $productObject->getAlternativeProductCodes();
        $product['description'] = $productDescriptionObject->getDescription();
        $product['shortDescription'] = $productDescriptionObject->getShortDescription();
        $product['pageTitle'] = $productDescriptionObject->getPageTitle();
        $product['header'] = $productDescriptionObject->getHeader();
        $product['metaDescription'] = $productDescriptionObject->getMetaDescription();
        $product['metaKeywords'] = $productDescriptionObject->getMetaKeywords();
        $product['searchWords'] = $productDescriptionObject->getSearchWords();
        $product['deliveryBand'] = $productObject->getDeliveryBand();
        $product['inheritedDeliveryBand'] = $productObject->getInheritedDeliveryBand();
        $product['deliveryCost'] = $productObject->getDeliveryCost();
        $product['weight'] = $productObject->getWeight();
        $product['length'] = $productObject->getLength();
        $product['width'] = $productObject->getWidth();
        $product['height'] = $productObject->getHeight();
        $product['mpn'] = $productObject->getMpn();
        $product['ean'] = $productObject->getEan();
        $product['upc'] = $productObject->getUpc();
        $product['jan'] = $productObject->getJan();
        $product['isbn'] = $productObject->getIsbn();
        $product['featureComparison'] = $productObject->getFeatureComparison();
        $product['downloadable'] = $productObject->getDownloadable();
        $product['specialOffer'] = $productObject->getSpecialOffer();
        $product['recommended'] = $productObject->getRecommended();
        $product['accessory'] = $productObject->getAccessory();
        $product['new'] = $productObject->getNew();
        $product['hidePrice'] = $productObject->getHidePrice();
        $product['showPriceOutOfHours'] = $productObject->getShowPriceOutOfHours();
        $product['membershipCardDiscountAvailable'] = $productObject->getMembershipCardDiscountAvailable();
        $product['maximumMembershipCardDiscount'] = $productObject->getMaximumMembershipCardDiscount();
        $product['updatedAt'] = $productObject->getUpdatedAt();

        // Get the brand
        $brandObject = $em->getRepository('WebIlluminationAdminBundle:Brand')->find($productObject->getBrandId());
        $brandDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $productObject->getBrandId(), 'locale' => $locale));
        $brandRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $productObject->getBrandId(), 'locale' => 'en', 'objectType' => 'brand'));
        $product['brand'] = array();
        if ($brandObject && $brandDescriptionObject && $brandRoutingObject)
        {
            $product['brand']['id'] = $productObject->getBrandId();
            $product['brand']['brand'] = $brandDescriptionObject->getBrand();
            $product['brand']['routing'] = $brandRoutingObject->getUrl();
            $product['brand']['membershipCardDiscountAvailable'] = $brandObject->getMembershipCardDiscountAvailable();
            $product['brand']['maximumMembershipCardDiscount'] = $brandObject->getMaximumMembershipCardDiscount();

            // Get brand logo
            $brandLogoObject = $em->getRepository('WebIlluminationAdminBundle:Image')->find($brandDescriptionObject->getLogoImageId());
            if ($brandLogoObject)
            {
                $product['brand']['logoOriginalPath'] = $brandLogoObject->getOriginalPath();
                $product['brand']['logoThumbnailPath'] = $brandLogoObject->getThumbnailPath();
                $product['brand']['logoMediumPath'] = $brandLogoObject->getMediumPath();
                $product['brand']['logoLargePath'] = $brandLogoObject->getLargePath();
            }

            // Get the guarantees
            $guarantees = array();
            $guaranteeObjects = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $productObject->getBrandId(), 'objectType' => 'brand'), array('displayOrder' => 'ASC'));
            foreach ($guaranteeObjects as $guaranteeObject)
            {
                if ($guaranteeObject)
                {
                    $guaranteeLengthObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeLength')->find($guaranteeObject->getGuaranteeLengthId());
                    $guaranteeTypeObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeType')->find($guaranteeObject->getGuaranteeTypeId());
                    if ($guaranteeLengthObject && $guaranteeTypeObject)
                    {
                        $guarantee = array();
                        $guarantee['id'] = $guaranteeObject->getId();
                        $guarantee['displayOrder'] = $guaranteeObject->getDisplayOrder();
                        $guarantee['guaranteeLengthId'] = $guaranteeObject->getGuaranteeLengthId();
                        $guarantee['guaranteeLength'] = $guaranteeLengthObject->getGuaranteeLength();
                        $guarantee['guaranteeTitle'] = $guaranteeLengthObject->getGuaranteeTitle();
                        $guarantee['guaranteeTypeId'] = $guaranteeObject->getGuaranteeTypeId();
                        $guarantee['guaranteeType'] = $guaranteeTypeObject->getGuaranteeType();
                        $guarantees[$guaranteeObject->getId()] = $guarantee;
                    }
                }
            }
            $product['brand']['guarantees'] = $guarantees;

            // Check the hide price and show price out of hours status for the brand
            if ($brandObject->getHidePrices() > 0)
            {
                $product['hidePrice'] = 1;
            }
            if ($brandObject->getShowPricesOutOfHours() > 0)
            {
                $product['showPriceOutOfHours'] = 1;
            }
        }

        // Get the departments
        $departments = array();
        $productToDepartments = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('productId' => $id), array('displayOrder' => 'ASC'));
        $departmentCount = 0;
        foreach ($productToDepartments as $productToDepartmentObject)
        {
            if ($productToDepartmentObject)
            {
                $departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($productToDepartmentObject->getDepartmentId());
                $departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $productToDepartmentObject->getDepartmentId()));
                $departmentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $productToDepartmentObject->getDepartmentId(), 'locale' => 'en', 'objectType' => 'department'));
                if ($departmentObject && $departmentDescriptionObject && $departmentRoutingObject)
                {
                    $departmentCount++;
                    $department = array();
                    $department['id'] = $productToDepartmentObject->getDepartmentId();
                    $department['membershipCardDiscountAvailable'] = $departmentObject->getMembershipCardDiscountAvailable();
                    $department['maximumMembershipCardDiscount'] = $departmentObject->getMaximumMembershipCardDiscount();
                    $department['name'] = $departmentDescriptionObject->getName();
                    $department['pathIds'] = $departmentObject->getDepartmentPath();
                    $department['path'] = array();
                    $departmentPathCount = 0;
                    $departmentPathIds = explode('|', $department['pathIds']);
                    foreach ($departmentPathIds as $departmentPathId)
                    {
                        $departmentPathDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentPathId));
                        $departmentPathRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $departmentPathId, 'locale' => 'en', 'objectType' => 'department'));
                        if ($departmentPathDescriptionObject && $departmentPathRoutingObject)
                        {
                            $departmentPathCount++;
                            $departmentPath = array();
                            $departmentPath['name'] = $departmentPathDescriptionObject->getName();
                            $departmentPath['routing'] = $departmentPathRoutingObject->getUrl();
                            $department['path'][] = $departmentPath;
                            if ((sizeof($departmentPathIds) == $departmentPathCount) && ($departmentCount == 1))
                            {
                                $product['listingUrl'] = $departmentPath['routing'];
                            }
                        }
                    }
                    $departments[] = $department;

                    // Check the hide price and show price out of hours status for the brand
                    if ($departmentObject->getHidePrices() > 0)
                    {
                        $product['hidePrice'] = 1;
                    }
                    if ($departmentObject->getShowPricesOutOfHours() > 0)
                    {
                        $product['showPriceOutOfHours'] = 1;
                    }
                }
            }
        }
        $product['departments'] = $departments;

        // Get the prices
        $prices = array();
        $productPrices = $em->getRepository('WebIlluminationAdminBundle:ProductPrice')->findBy(array('productId' => $id, 'currencyCode' => $currencyCode), array('displayOrder' => 'ASC'));
        foreach ($productPrices as $productPriceObject)
        {
            $productPrice = array();
            $productPrice['costPrice'] = $productPriceObject->getCostPrice();
            $productPrice['costPriceExcludingVat'] = $productPriceObject->getCostPriceExcludingVat();
            $productPrice['recommendedRetailPrice'] = $productPriceObject->getRecommendedRetailPrice();
            $productPrice['recommendedRetailPriceExcludingVat'] = $productPriceObject->getRecommendedRetailPriceExcludingVat();
            $productPrice['listPrice'] = $productPriceObject->getListPrice();
            $productPrice['listPriceExcludingVat'] = $productPriceObject->getListPriceExcludingVat();
            $productPrice['profit'] = $productPriceObject->getProfit();
            $productPrice['profitExcludingVat'] = $productPriceObject->getProfitExcludingVat();
            $productPrice['profitPercentageClass'] = $productPriceObject->getProfitPercentageClass();
            $productPrice['markupPercentage'] = $productPriceObject->getMarkupPercentage();
            $productPrice['markupPercentageClass'] = $productPriceObject->getMarkupPercentageClass();
            $productPrice['discount'] = $productPriceObject->getDiscount();
            $productPrice['savings'] = $productPriceObject->getSavings();
            $productPrice['currencyCode'] = $productPriceObject->getCurrencyCode();

            // Calculate the membership card price
            $membershipCardDiscountAvailable = true;
            $bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
            if ($product['membershipCardDiscountAvailable'] > 0)
            {
                if ($product['maximumMembershipCardDiscount'] > 0)
                {
                    $bestMembershipCardDiscountAvailable = $product['maximumMembershipCardDiscount'];
                } else {
                    foreach ($product['departments'] as $department)
                    {
                        if ($department['membershipCardDiscountAvailable'] > 0)
                        {
                            if ($department['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                            {
                                $bestMembershipCardDiscountAvailable = $department['maximumMembershipCardDiscount'];
                            }
                        } else {
                            $membershipCardDiscountAvailable = false;
                            break;
                        }
                    }
                    if ($product['brand']['membershipCardDiscountAvailable'] > 0)
                    {
                        if ($product['brand']['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                        {
                            $bestMembershipCardDiscountAvailable = $product['brand']['maximumMembershipCardDiscount'];
                        }
                    } else {
                        $membershipCardDiscountAvailable = false;
                    }
                }
            } else {
                $membershipCardDiscountAvailable = false;
            }
            if ($membershipCardDiscountAvailable)
            {
                $productPrice['membershipCardPrice'] = $productPrice['recommendedRetailPrice'] - ($productPrice['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
            } else {
                $productPrice['membershipCardPrice'] = $productPrice['listPrice'];
            }
            $prices[] = $productPrice;
        }
        $product['prices'] = $prices;

        // Get the images
        $images = array();
        $imagesObject = $em->getRepository('WebIlluminationAdminBundle:Image')->findBy(array('objectId' => $id, 'objectType' => 'product', 'imageType' => 'product', 'locale' => $locale), array('displayOrder' => 'ASC'));
        foreach ($imagesObject as $imageObject)
        {
            $image = array();
            $image['originalPath'] = $imageObject->getOriginalPath();
            if (file_exists($this->getUploadRootDir().$image['originalPath']) && ($image['originalPath'] != ''))
            {
                list($image['originalWidth'], $image['originalHeight']) = getimagesize($this->getUploadRootDir().$image['originalPath']);
            }
            $image['thumbnailPath'] = $imageObject->getThumbnailPath();
            if (file_exists($this->getUploadRootDir().$image['thumbnailPath']) && ($image['thumbnailPath'] != ''))
            {
                list($image['thumbnailWidth'], $image['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$image['thumbnailPath']);
            }
            $image['mediumPath'] = $imageObject->getMediumPath();
            if (file_exists($this->getUploadRootDir().$image['mediumPath']) && ($image['mediumPath'] != ''))
            {
                list($image['mediumWidth'], $image['mediumHeight']) = getimagesize($this->getUploadRootDir().$image['mediumPath']);
            }
            $image['largePath'] = $imageObject->getLargePath();
            if (file_exists($this->getUploadRootDir().$image['largePath']) && ($image['largePath'] != ''))
            {
                list($image['largeWidth'], $image['largeHeight']) = getimagesize($this->getUploadRootDir().$image['largePath']);
            }
            $image['title'] = $imageObject->getTitle();
            $images[] = $image;
        }
        $product['images'] = $images;

        // Get the videos
        $videos = array();
        $videosObject = $em->getRepository('WebIlluminationAdminBundle:Video')->findBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => $locale), array('displayOrder' => 'ASC'));
        foreach ($videosObject as $videoObject)
        {
            $video = array();
            $video['title'] = $videoObject->getTitle();
            $video['description'] = $videoObject->getDescription();
            $video['alignment'] = $videoObject->getAlignment();
            $video['link'] = $videoObject->getLink();
            $video['path'] = $videoObject->getPath();
            $videos[] = $video;
        }
        $product['videos'] = $videos;

        // Get the related products
        $relatedProducts = array();
        $relatedProductsObject = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id, 'linkType' => 'related', 'active' => 1), array('displayOrder' => 'ASC'));
        foreach ($relatedProductsObject as $relatedProductObject)
        {
            $relatedProduct = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $relatedProductObject->getProductLinkId()));
            if ($relatedProductObject)
            {
                $relatedProducts[] = $relatedProduct;
            }
        }
        $product['relatedProducts'] = $relatedProducts;

        // Get the cheaper alternatives
        $cheaperAlternatives = array();
        $cheaperAlternativesObject = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id, 'linkType' => 'cheaper', 'active' => 1), array('displayOrder' => 'ASC'));
        foreach ($cheaperAlternativesObject as $cheaperAlternativeObject)
        {
            $cheaperAlternative = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $cheaperAlternativeObject->getProductLinkId()));
            if ($cheaperAlternative)
            {
                $cheaperAlternatives[] = $cheaperAlternative;
            }
        }
        $product['cheaperAlternatives'] = $cheaperAlternatives;

        // Get the options
        $productOptions = array();
        $productToOptionsObject = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->findBy(array('productId' => $id, 'active' => 1), array('displayOrder' => 'ASC'));
        foreach ($productToOptionsObject as $productToOptionObject)
        {
            $productOption = array();
            $productOptionGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductOptionGroup')->find($productToOptionObject->getProductOptionGroupId());
            $productOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductOption')->find($productToOptionObject->getProductOptionId());
            $productOption['id'] = $productToOptionObject->getId();
            $productOption['productOptionGroupId'] = $productOptionGroupObject->getId();
            $productOption['productOptionGroup'] = $productOptionGroupObject->getProductOptionGroup();
            $productOption['productOptionId'] = $productOptionObject->getId();
            $productOption['productOption'] = $productOptionObject->getProductOption();
            $productOption['price'] = $productToOptionObject->getPrice();
            $productOption['priceType'] = $productToOptionObject->getPriceType();
            $productOption['priceUse'] = $productToOptionObject->getPriceUse();
            $productOptions[$productOptionGroupObject->getProductOptionGroup()][] = $productOption;
        }
        $product['productOptions'] = $productOptions;

        // Get the features
        $productFeatures = array();
        $productToFeaturesObject = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findBy(array('productId' => $id, 'active' => 1), array('displayOrder' => 'ASC'));
        foreach ($productToFeaturesObject as $productToFeatureObject)
        {
            $productFeature = array();
            $productFeatureGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->find($productToFeatureObject->getProductFeatureGroupId());
            $productFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeature')->find($productToFeatureObject->getProductFeatureId());
            if ($productFeatureGroupObject && $productFeatureObject)
            {
                $productFeature['id'] = $productToFeatureObject->getId();
                $productFeature['productFeatureGroupId'] = $productFeatureGroupObject->getId();
                $productFeature['productFeatureGroup'] = $productFeatureGroupObject->getProductFeatureGroup();
                $productFeature['filter'] = $productFeatureGroupObject->getFilter();
                $productFeature['productFeatureId'] = $productFeatureObject->getId();
                $productFeature['productFeature'] = $productFeatureObject->getProductFeature();
                $productFeatures[$productFeatureGroupObject->getProductFeatureGroup()][] = $productFeature;
            }
        }
        $product['productFeatures'] = $productFeatures;

        // Get the routing
        $routingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => $locale));
        if (!$routingObject)
        {
            // Add routing
            $routingObject = new Routing();
            $routingObject->setObjectId($id);
            $routingObject->setObjectType('product');
            $routingObject->setLocale($locale);
            $routingObject->setUrl($seoService->createUrl($productDescriptionObject->getHeader()));
            $em->persist($routingObject);
            $em->flush();
        }
        $product['url'] = $routingObject->getUrl();

        // Get the guarantees
        $guarantees = array();
        $guaranteeObjects = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'product'), array('displayOrder' => 'ASC'));
        if (sizeof($guaranteeObjects) > 0)
        {
            foreach ($guaranteeObjects as $guaranteeObject)
            {
                if ($guaranteeObject)
                {
                    $guaranteeLengthObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeLength')->find($guaranteeObject->getGuaranteeLengthId());
                    $guaranteeTypeObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeType')->find($guaranteeObject->getGuaranteeTypeId());
                    if ($guaranteeLengthObject && $guaranteeTypeObject)
                    {
                        $guarantee = array();
                        $guarantee['id'] = $guaranteeObject->getId();
                        $guarantee['displayOrder'] = $guaranteeObject->getDisplayOrder();
                        $guarantee['guaranteeLengthId'] = $guaranteeObject->getGuaranteeLengthId();
                        $guarantee['guaranteeLength'] = $guaranteeLengthObject->getGuaranteeLength();
                        $guarantee['guaranteeTitle'] = $guaranteeLengthObject->getGuaranteeTitle();
                        $guarantee['guaranteeTypeId'] = $guaranteeObject->getGuaranteeTypeId();
                        $guarantee['guaranteeType'] = $guaranteeTypeObject->getGuaranteeType();
                        $guarantees[$guaranteeObject->getId()] = $guarantee;
                    }
                }
            }
        } else {
            $guarantees = $product['brand']['guarantees'];
        }
        $product['guarantees'] = $guarantees;

        // Check if the prices should be shown or not
        if (($product['hidePrice'] > 0) && ($product['showPriceOutOfHours'] > 0))
        {
            $currentDay = date("D");
            $currentTime = date("G");
            switch ($currentDay)
            {
                case 'Sat':
                case 'Sun':
                    $product['hidePrice'] = 0;
                    break;
                case 'Mon':
                case 'Tue':
                case 'Wed':
                case 'Thu':
                case 'Fri':
                    if (($currentTime < 7) || ($currentTime > 17))
                    {
                        $product['hidePrice'] = 0;
                    }
                    break;
            }
        }

        return $product;
    }

    public function getVariant($id, $locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');
        $seoService = $this->container->get('web_illumination_admin.seo_service');

        /**
         * Get the entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Setup the product
        $product = array();

        $query = $em->createQueryBuilder()
            ->select("v, p, vp, vd, b, bd, br, d, dd, dr")
            ->from("KAC\SiteBundle\Entity\Variant", "v")
            ->join("p", "p")
            ->join("v.prices", "vp")
            ->join("v.features", "vf")
            ->join("v.options", "vo")
            ->join("v.descriptions", "vd")
            ->join("v.brand", "b")
            ->join("v.description", "bd")
            ->join("v.routing", "br")
            ->join("p.departments", "d")
            ->join("d.description", "dd")
            ->join("d.routing", "dr")
            ->where("v.id = ?1")
            ->where("vd.locale = ?2")
            ->where("bd.locale = ?2")
            ->where("dd.locale = ?2")
            ->where("vd.locale = ?2")
            ->where("vp.prices = ?3")
            ->setParameter(1, $id)
            ->setParameter(1, $locale)
            ->setParameter(1, $currencyCode);

        /**
         * @var Product\Variant $variantObject
         * @var \KAC\SiteBundle\Entity\Product\Variant\Description $variantDescriptionObject
         */
        $variantObject = $query->getQuery()->execute();

        // Product Info
        if (!$variantObject || count($variantObject->getDescriptions()) > 0)
        {
            return false;
        }

        $variantDescriptionObjects = $variantObject->getDescriptions();
        $variantDescriptionObject = $variantDescriptionObjects[0];

//        $product['id'] = $variantObject->getId();
//        $product['productId'] = $variantObject->getId();
//        $product['productGroupId'] = $variantObject->getProduct()->getId();
//        $product['availableForPurchase'] = $variantObject->getProduct()->getAvailableForPurchase();
//        $product['status'] = $variantObject->getStatus();
//        $product['product'] = $variantDescriptionObject->getProduct();
//        $product['prefix'] = $variantDescriptionObject->getPrefix();
//        $product['tagline'] = $variantDescriptionObject->getTagline();
//        $product['productCode'] = $variantObject->getProductCode();
//        $product['productGroupCode'] = $variantObject->getProductCode();
//        $product['alternativeProductCodes'] = $variantObject->getAlternativeProductCodes();
//        $product['description'] = $variantDescriptionObject->getDescription();
//        $product['shortDescription'] = $variantDescriptionObject->getShortDescription();
//        $product['pageTitle'] = $variantDescriptionObject->getPageTitle();
//        $product['header'] = $variantDescriptionObject->getHeader();
//        $product['metaDescription'] = $variantDescriptionObject->getMetaDescription();
//        $product['metaKeywords'] = $variantDescriptionObject->getMetaKeywords();
//        $product['searchWords'] = $variantDescriptionObject->getSearchWords();
//        $product['deliveryBand'] = $variantObject->getProduct()->getDeliveryBand();
//        $product['inheritedDeliveryBand'] = $variantObject->getProduct()->getInheritedDeliveryBand();
//        $product['deliveryCost'] = $variantObject->getProduct()->getDeliveryCost();
//        $product['weight'] = $variantObject->getWeight();
//        $product['length'] = $variantObject->getLength();
//        $product['width'] = $variantObject->getWidth();
//        $product['height'] = $variantObject->getHeight();
//        $product['mpn'] = $variantObject->getMpn();
//        $product['ean'] = $variantObject->getEan();
//        $product['upc'] = $variantObject->getUpc();
//        $product['jan'] = $variantObject->getJan();
//        $product['isbn'] = $variantObject->getIsbn();
//        $product['featureComparison'] = $variantObject->getProduct()->getFeatureComparison();
//        $product['downloadable'] = $variantObject->getProduct()->getDownloadable();
//        $product['specialOffer'] = $variantObject->getProduct()->getSpecialOffer();
//        $product['recommended'] = $variantObject->getProduct()->getRecommended();
//        $product['accessory'] = $variantObject->getProduct()->getAccessory();
//        $product['new'] = $variantObject->getProduct()->getNew();
//        $product['hidePrice'] = $variantObject->getProduct()->getHidePrice();
//        $product['showPriceOutOfHours'] = $variantObject->getProduct()->getShowPriceOutOfHours();
//        $product['membershipCardDiscountAvailable'] = $variantObject->getProduct()->getMembershipCardDiscountAvailable();
//        $product['maximumMembershipCardDiscount'] = $variantObject->getProduct()->getMaximumMembershipCardDiscount();
//        $product['updatedAt'] = $variantObject->getUpdatedAt();

        $product['url'] = $variantObject->getProduct()->getRouting()->getUrl();

        // Brand
        $product['brand'] = array();

        /**
         * @var Brand $brandObject
         */
        $brandObject = $variantObject->getProduct()->getBrand();
        if(count($brandObject->getDescriptions()) > 0 && count($brandObject->getRoutings()) > 0)
        {
            $product['brand']['id'] = $brandObject->getId();
            $product['brand']['brand'] = $brandObject->getDescription()->getName();
            $product['brand']['routing'] = $brandObject->getRouting()->getUrl();
            $product['brand']['membershipCardDiscountAvailable'] = $brandObject->getMembershipCardDiscountAvailable();
            $product['brand']['maximumMembershipCardDiscount'] = $brandObject->getMaximumMembershipCardDiscount();

            // Get brand logo
            $brandLogoObject = $em->getRepository('WebIlluminationAdminBundle:Image')->find($brandObject->getDescription()->getLogoImage()->getId());
            if ($brandLogoObject)
            {
                $product['brand']['logoOriginalPath'] = $brandLogoObject->getOriginalPath();
                $product['brand']['logoThumbnailPath'] = $brandLogoObject->getThumbnailPath();
                $product['brand']['logoMediumPath'] = $brandLogoObject->getMediumPath();
                $product['brand']['logoLargePath'] = $brandLogoObject->getLargePath();
            }

            // Get the guarantees
            $guarantees = array();
            $product['brand']['guarantees'] = $guarantees;

            // Check the hide price and show price out of hours status for the brand
            if ($brandObject->getHidePrices() > 0)
            {
                $product['hidePrice'] = 1;
            }
            if ($brandObject->getShowPricesOutOfHours() > 0)
            {
                $product['showPriceOutOfHours'] = 1;
            }
        }

        // Department
        $departments = array();
        $departmentCount = 0;

        /**
         * @var ProductToDepartment $productToDepartmentObject
         * @var Department $departmentObject
         */
        foreach ($variantObject->getProduct()->getDepartments() as $productToDepartmentObject)
        {
            $departmentObject = $productToDepartmentObject->getDepartment();

            $departmentCount++;
            $department = array();
            $department['id'] = $departmentObject->getId();
            $department['membershipCardDiscountAvailable'] = $departmentObject->getMembershipCardDiscountAvailable();
            $department['maximumMembershipCardDiscount'] = $departmentObject->getMaximumMembershipCardDiscount();
            $department['name'] = $departmentObject->getName();
            $department['pathIds'] = $departmentObject->getDepartmentPath();
            $department['path'] = array();
            $departmentPathCount = 0;
            $departmentPathIds = explode('|', $department['pathIds']);
            foreach ($departmentPathIds as $departmentPathId)
            {
                $departmentPathDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentPathId));
                $departmentPathRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $departmentPathId, 'locale' => 'en', 'objectType' => 'department'));
                if ($departmentPathDescriptionObject && $departmentPathRoutingObject)
                {
                    $departmentPathCount++;
                    $departmentPath = array();
                    $departmentPath['name'] = $departmentPathDescriptionObject->getName();
                    $departmentPath['routing'] = $departmentPathRoutingObject->getUrl();
                    $department['path'][] = $departmentPath;
                    if ((sizeof($departmentPathIds) == $departmentPathCount) && ($departmentCount == 1))
                    {
                        $product['listingUrl'] = $departmentPath['routing'];
                    }
                }
            }
            $departments[] = $department;

            // Check the hide price and show price out of hours status for the brand
            if ($departmentObject->getHidePrices() > 0)
            {
                $product['hidePrice'] = 1;
            }
            if ($departmentObject->getShowPricesOutOfHours() > 0)
            {
                $product['showPriceOutOfHours'] = 1;
            }
        }
        $product['departments'] = $departments;

        // Prices
        $prices = array();
        /**
         * @var Product\Price $productPriceObject
         */
        foreach ($variantObject->getProduct()->getPrices() as $productPriceObject)
        {
            $productPrice = array();
            $productPrice['costPrice'] = $productPriceObject->getCostPrice();
            $productPrice['costPriceExcludingVat'] = $productPriceObject->getCostPriceExcludingVat();
            $productPrice['recommendedRetailPrice'] = $productPriceObject->getRecommendedRetailPrice();
            $productPrice['recommendedRetailPriceExcludingVat'] = $productPriceObject->getRecommendedRetailPriceExcludingVat();
            $productPrice['listPrice'] = $productPriceObject->getListPrice();
            $productPrice['listPriceExcludingVat'] = $productPriceObject->getListPriceExcludingVat();
            $productPrice['profit'] = $productPriceObject->getProfit();
            $productPrice['profitExcludingVat'] = $productPriceObject->getProfitExcludingVat();
            $productPrice['profitPercentageClass'] = $productPriceObject->getProfitPercentageClass();
            $productPrice['markupPercentage'] = $productPriceObject->getMarkupPercentage();
            $productPrice['markupPercentageClass'] = $productPriceObject->getMarkupPercentageClass();
            $productPrice['discount'] = $productPriceObject->getDiscount();
            $productPrice['savings'] = $productPriceObject->getSavings();
            $productPrice['currencyCode'] = $productPriceObject->getCurrencyCode();

            // Calculate the membership card price
            $membershipCardDiscountAvailable = true;
            $bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
            if ($product['membershipCardDiscountAvailable'] > 0)
            {
                if ($product['maximumMembershipCardDiscount'] > 0)
                {
                    $bestMembershipCardDiscountAvailable = $product['maximumMembershipCardDiscount'];
                } else {
                    foreach ($product['departments'] as $department)
                    {
                        if ($department['membershipCardDiscountAvailable'] > 0)
                        {
                            if ($department['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                            {
                                $bestMembershipCardDiscountAvailable = $department['maximumMembershipCardDiscount'];
                            }
                        } else {
                            $membershipCardDiscountAvailable = false;
                            break;
                        }
                    }
                    if ($product['brand']['membershipCardDiscountAvailable'] > 0)
                    {
                        if ($product['brand']['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                        {
                            $bestMembershipCardDiscountAvailable = $product['brand']['maximumMembershipCardDiscount'];
                        }
                    } else {
                        $membershipCardDiscountAvailable = false;
                    }
                }
            } else {
                $membershipCardDiscountAvailable = false;
            }
            if ($membershipCardDiscountAvailable)
            {
                $productPrice['membershipCardPrice'] = $productPrice['recommendedRetailPrice'] - ($productPrice['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
            } else {
                $productPrice['membershipCardPrice'] = $productPrice['listPrice'];
            }
            $prices[] = $productPrice;
        }
        $product['prices'] = $prices;

        // Images
        $images = array();
        $imagesObject = $em->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array('objectId' => $id, 'objectType' => 'product', 'imageType' => 'product', 'locale' => $locale), array('displayOrder' => 'ASC'));
        /**
         * @var Image $imageObject
         */
        foreach ($imagesObject as $imageObject)
        {
            $image = array();
            $image['originalPath'] = $imageObject->getOriginalPath();
            if (file_exists($this->getUploadRootDir().$image['originalPath']) && ($image['originalPath'] != ''))
            {
                list($image['originalWidth'], $image['originalHeight']) = getimagesize($this->getUploadRootDir().$image['originalPath']);
            }
            $image['thumbnailPath'] = $imageObject->getPublicPath();
            if (file_exists($this->getUploadRootDir().$image['thumbnailPath']) && ($image['thumbnailPath'] != ''))
            {
                list($image['thumbnailWidth'], $image['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$image['thumbnailPath']);
            }
            $image['mediumPath'] = $imageObject->getPublicPath();
            if (file_exists($this->getUploadRootDir().$image['mediumPath']) && ($image['mediumPath'] != ''))
            {
                list($image['mediumWidth'], $image['mediumHeight']) = getimagesize($this->getUploadRootDir().$image['mediumPath']);
            }
            $image['largePath'] = $imageObject->getPublicPath();
            if (file_exists($this->getUploadRootDir().$image['largePath']) && ($image['largePath'] != ''))
            {
                list($image['largeWidth'], $image['largeHeight']) = getimagesize($this->getUploadRootDir().$image['largePath']);
            }
            $image['title'] = $imageObject->getTitle();
            $images[] = $image;
        }
        $product['images'] = $images;

        // Videos
        $videos = array();
        $videosObject = $em->getRepository('KAC\SiteBundle\Entity\Video')->findBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => $locale), array('displayOrder' => 'ASC'));
        /**
         * @var Video $videoObject
         */
        foreach ($videosObject as $videoObject)
        {
            $video = array();
            $video['title'] = $videoObject->getTitle();
            $video['description'] = $videoObject->getDescription();
            $video['alignment'] = $videoObject->getAlignment();
            $video['link'] = $videoObject->getLink();
            $video['path'] = $videoObject->getPath();
            $videos[] = $video;
        }
        $product['videos'] = $videos;

        // Related products
        $relatedProducts = array();
        $relatedProductsObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('productId' => $id, 'linkType' => 'related', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $relatedProductObject
         */
        foreach ($relatedProductsObject as $relatedProductObject)
        {
            $relatedProduct = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findOneBy(array('productId' => $relatedProductObject->getLinkedProduct()->getId()));
            if ($relatedProductObject)
            {
                $relatedProducts[] = $relatedProduct;
            }
        }
        $product['relatedProducts'] = $relatedProducts;

        // Cheaper Alternatives
        $cheaperAlternatives = array();
        $cheaperAlternativesObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Lin')->findBy(array('productId' => $id, 'linkType' => 'cheaper', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $cheaperAlternativeObject
         */
        foreach ($cheaperAlternativesObject as $cheaperAlternativeObject)
        {
            $cheaperAlternative = $em->getRepository('KAC\SiteBundle\Entity\Product\Lin')->findOneBy(array('productId' => $cheaperAlternativeObject->getLinkedProduct()->getId()));
            if ($cheaperAlternative)
            {
                $cheaperAlternatives[] = $cheaperAlternative;
            }
        }
        $product['cheaperAlternatives'] = $cheaperAlternatives;

        // Features
        $productFeatures = array();
        /**
         * @var Product\VariantToFeature $productToFeatureObject
         */
        foreach ($variantObject->getFeatures() as $productToFeatureObject)
        {
            $productFeature = array();
            $productFeature['id'] = $productToFeatureObject->getId();
            $productFeature['productFeatureGroupId'] = $productToFeatureObject->getFeatureGroup()->getId();
            $productFeature['productFeatureGroup'] = $productToFeatureObject->getFeatureGroup()->getName();
            $productFeature['filter'] = $productToFeatureObject->getFeatureGroup()->getFilter();
            $productFeature['productFeatureId'] = $productToFeatureObject->getFeatureGroup()->getId();
            $productFeature['productFeature'] = $productToFeatureObject->getFeature()->getName();
            $productFeatures[$productToFeatureObject->getFeatureGroup()->getName()][] = $productFeature;
        }
        $product['productFeatures'] = $productFeatures;

        // Options
        $productOptions = array();
        /**
         * @var Product\VariantToOption $productToOptionObject
         */
        foreach ($variantObject->getOptions() as $productToOptionObject)
        {
            $productOption = array();
            $productOption['id'] = $productToOptionObject->getId();
            $productOption['productOptionGroupId'] = $productToOptionObject->getOptionGroup()->getId();
            $productOption['productOptionGroup'] = $productToOptionObject->getOptionGroup()->getName();
            $productOption['productOptionId'] = $productToOptionObject->getOptionGroup()->getId();
            $productOption['productOption'] = $productToOptionObject->getOption()->getName();
            $productOption['price'] = $productToOptionObject->getPrice();
            $productOption['priceType'] = $productToOptionObject->getPriceType();
            $productOption['priceUse'] = $productToOptionObject->getPriceUse();
            $productOptions[$productToOptionObject->getOptionGroup()->getName()][] = $productOption;
        }
        $product['productOptions'] = $productOptions;

        // Guarantees
        $guarantees = array();
        $product['guarantees'] = $guarantees;

        // Check if price is hidden
        if (($product['hidePrice'] > 0) && ($product['showPriceOutOfHours'] > 0))
        {
            $currentDay = date("D");
            $currentTime = date("G");
            switch ($currentDay)
            {
                case 'Sat':
                case 'Sun':
                    $product['hidePrice'] = 0;
                    break;
                case 'Mon':
                case 'Tue':
                case 'Wed':
                case 'Thu':
                case 'Fri':
                    if (($currentTime < 7) || ($currentTime > 17))
                    {
                        $product['hidePrice'] = 0;
                    }
                    break;
            }
        }

        return $product;
    }

    // Calculate price based on options
    public function getPrice($productId, $selectedOptions)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Setup array to collect price information
        $price = array();

        // Get the product
        $product = $this->getProduct($productId, 'en', 'GBP');
        $price['productCode'] = $product['productCode'];
        $price['listPrice'] = $product['prices'][0]['listPrice'];
        $price['recommendedRetailPrice'] = $product['prices'][0]['recommendedRetailPrice'];
        $price['savings'] = $product['prices'][0]['savings'];
        $price['discount'] = $product['prices'][0]['discount'];

        // Get selected options
        if ($selectedOptions)
        {
            // Get the entity manager
            $em = $doctrineService->getEntityManager();

            $selectedOptionIds = explode('|', $selectedOptions);
            foreach ($selectedOptionIds as $selectedOptionId)
            {
                $productToOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->find($selectedOptionId);
                $priceChange = $productToOptionObject->getPrice();
                $priceType = $productToOptionObject->getPriceType();
                $priceUse = $productToOptionObject->getPriceUse();
                if ($priceType == 'a')
                {
                    if ($priceUse == 'i')
                    {
                        $price['listPrice'] += $priceChange;
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] += $priceChange;
                        }
                    } elseif (($priceUse == 'd')) {
                        $price['listPrice'] -= $priceChange;
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] -= $priceChange;
                        }
                    }
                }
                if ($priceType == 'p')
                {
                    if ($priceUse == 'i')
                    {
                        $price['listPrice'] = $price['listPrice'] + ($price['listPrice'] * ($priceChange / 100));
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] = $price['recommendedRetailPrice'] + ($price['listPrice'] * ($priceChange / 100));
                        }
                    } elseif (($priceUse == 'd')) {
                        $price['listPrice'] = $price['listPrice'] - ($price['listPrice'] * ($priceChange / 100));
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] = $price['recommendedRetailPrice'] - ($price['listPrice'] * ($priceChange / 100));
                        }
                    }
                }
                if ($priceType == 'r')
                {
                    if ($priceUse == 'i')
                    {
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] += ($priceChange - $price['listPrice']);
                        }
                    } elseif (($priceUse == 'd')) {
                        if ($price['recommendedRetailPrice'] > 0)
                        {
                            $price['recommendedRetailPrice'] -= ($priceChange - $price['listPrice']);
                        }
                    }
                    $price['listPrice'] = $priceChange;
                }
                $price['savings'] = $price['recommendedRetailPrice'] - $price['listPrice'];
                if ($price['recommendedRetailPrice'] > 0)
                {
                    $price['discount'] = (1 - ($price['listPrice'] / $price['recommendedRetailPrice'])) * 100;
                } else {
                    $price['discount'] = 0;
                }
            }
        }

        // Calculate the membership card price
        $membershipCardDiscountAvailable = true;
        $bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
        if ($product['membershipCardDiscountAvailable'] > 0)
        {
            if ($product['maximumMembershipCardDiscount'] > 0)
            {
                $bestMembershipCardDiscountAvailable = $product['maximumMembershipCardDiscount'];
            } else {
                foreach ($product['departments'] as $department)
                {
                    if ($department['membershipCardDiscountAvailable'] > 0)
                    {
                        if ($department['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                        {
                            $bestMembershipCardDiscountAvailable = $department['maximumMembershipCardDiscount'];
                        }
                    } else {
                        $membershipCardDiscountAvailable = false;
                        break;
                    }
                }
                if ($product['brand']['membershipCardDiscountAvailable'] > 0)
                {
                    if ($product['brand']['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
                    {
                        $bestMembershipCardDiscountAvailable = $product['brand']['maximumMembershipCardDiscount'];
                    }
                } else {
                    $membershipCardDiscountAvailable = false;
                }
            }
        } else {
            $membershipCardDiscountAvailable = false;
        }
        if ($membershipCardDiscountAvailable)
        {
            if ($price['recommendedRetailPrice'] > 0)
            {
                $price['membershipCardPrice'] = $price['recommendedRetailPrice'] - ($price['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
            } else {
                $price['membershipCardPrice'] = $price['listPrice'];
            }
        } else {
            $price['membershipCardPrice'] = $price['listPrice'];
        }

        return $price;
    }

    // Delete a product
    public function deleteProduct($id)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Get the product
        $productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
        if (!$productObject)
        {
            error_log('Can\'t find the product!');
            return false;
        } else {
            $em->remove($productObject);
        }

        // Get the product escriptions
        $productDescriptions = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findBy(array('productId' => $id));
        if (!$productDescriptions)
        {
            error_log('Can\'t find the product description!');
            return false;
        } else {
            foreach ($productDescriptions as $productDescriptionObject)
            {
                if ($productDescriptionObject)
                {
                    $em->remove($productDescriptionObject);
                }
            }
        }

        // Get the product indexes
        $productIndexes = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findBy(array('productId' => $id));
        foreach ($productIndexes as $productIndexObject)
        {
            if ($productIndexObject)
            {
                $em->remove($productIndexObject);
            }
        }

        // Get the departments
        $productToDepartments = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('productId' => $id));
        foreach ($productToDepartments as $productToDepartmentObject)
        {
            if ($productToDepartmentObject)
            {
                $em->remove($productToDepartmentObject);
            }
        }

        // Get the prices
        $productPrices = $em->getRepository('WebIlluminationAdminBundle:ProductPrice')->findBy(array('productId' => $id));
        foreach ($productPrices as $productPriceObject)
        {
            if ($productPriceObject)
            {
                $em->remove($productPriceObject);
            }
        }

        // Get the images
        $images = $em->getRepository('WebIlluminationAdminBundle:Image')->findBy(array('objectId' => $id, 'objectType' => 'product', 'imageType' => 'product'));
        foreach ($images as $imageObject)
        {
            if ($imageObject)
            {
                $em->remove($imageObject);
            }
        }

        // Get the guarantees
        $guarantees = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'product'));
        foreach ($guarantees as $guaranteeObject)
        {
            if ($guaranteeObject)
            {
                $em->remove($guaranteeObject);
            }
        }

        // Get linked products
        $productLinks = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id));
        foreach ($productLinks as $productLinkObject)
        {
            if ($productLinkObject)
            {
                $em->remove($productLinkObject);
            }
        }

        // Get the options
        $productToOptions = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->findBy(array('productId' => $id));
        foreach ($productToOptions as $productToOptionObject)
        {
            if ($productToOptionObject)
            {
                $em->remove($productToOptionObject);
            }
        }

        // Get the features
        $productToFeatures = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findBy(array('productId' => $id));
        foreach ($productToFeatures as $productToFeatureObject)
        {
            if ($productToFeatureObject)
            {
                $em->remove($productToFeatureObject);
            }
        }

        // Get the routings
        $routings = $em->getRepository('WebIlluminationAdminBundle:Routing')->findBy(array('objectId' => $id, 'objectType' => 'product'));
        foreach ($routings as $routingObject)
        {
            if ($routingObject)
            {
                $em->remove($routingObject);
            }
        }

        // Get the redirects
        $redirects = $em->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'product'));
        foreach ($redirects as $redirectObject)
        {
            if ($routingObject)
            {
                $em->remove($redirectObject);
            }
        }

        // Flush the database
        $em->flush();

        return true;
    }

    // Get the filter being used
    public function getFilter($departmentId, $filter, $locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('pi');
        $qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
        $qb->where($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
        $qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
        $qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
        $query = $qb->getQuery();

        // Get the products
        $products = $query->getResult();

        // Get the brands
        $available = array();
        foreach ($products as $product)
        {
            if (isset($brands[$product->getBrandId()]))
            {
                $brands[$product->getBrandId()]['productCount']++;
            } else {
                $brand = array();
                $brand['id'] = $product->getBrandId();
                $brand['brand'] = $product->getBrand();
                $brand['productCount'] = 1;
                if (in_array($product->getBrandId(), $selectedBrands))
                {
                    $brand['selected'] = true;
                } else {
                    $brand['selected'] = false;
                }
                $brands[$product->getBrandId()] = $brand;
            }
        }

        return $brands;

    }

    // Update the product delivery bands
    public function updateProductDeliveryBand($id, $locale = 'en')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Get the inherited delivery band
        $inheritedDeliveryBand = 0;

        // Get the product objects
        $productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
        $productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $id));

        // Check to see if the delivery band has been set by the product
        if ($productObject && $productIndexObject)
        {
            if ($productObject->getDeliveryBand() > 0)
            {
                $inheritedDeliveryBand = $productObject->getDeliveryBand();
            } else {
                // Get the department ids
                if (strpos($productIndexObject->getDepartmentIds(), '^') !== false)
                {
                    $departmentIds = explode('^', $productIndexObject->getDepartmentIds());
                    $departmentIds = array_reverse(explode('|', substr(substr($departmentIds[0], 1), 0, -1)));
                } else {
                    $departmentIds = array_reverse(explode('|', substr(substr($productIndexObject->getDepartmentIds(), 1), 0, -1)));
                }

                // Check each of the departments
                foreach ($departmentIds as $departmentId)
                {
                    // Check the brand department for a delivery band
                    $brandToDepartmentObject = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->findOneBy(array('departmentId' => $departmentId, 'brandId' => $productIndexObject->getBrandId()));
                    if ($brandToDepartmentObject)
                    {
                        if ($brandToDepartmentObject->getDeliveryBand() > 0)
                        {
                            $inheritedDeliveryBand = $brandToDepartmentObject->getDeliveryBand();
                        }
                    }

                    // Check the department for a delivery band
                    if ($inheritedDeliveryBand < 1)
                    {
                        $departmentIndexObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentIndex')->findOneBy(array('departmentId' => $departmentId, 'locale' => $locale));
                        if ($departmentIndexObject)
                        {
                            if ($departmentIndexObject->getInheritedDeliveryBand() > 0)
                            {
                                $inheritedDeliveryBand = $departmentIndexObject->getInheritedDeliveryBand();
                            }
                        }
                    }

                    // Check if we need to keep checking
                    if ($inheritedDeliveryBand > 0)
                    {
                        break;
                    }
                }

                error_log('Delivery Band for '.$productIndexObject->getProductId().': '.$inheritedDeliveryBand);

                // Update the delivery band
                $productObject->setInheritedDeliveryBand($inheritedDeliveryBand);
                $em->persist($productObject);
                $em->flush();
                $productIndexObject->setInheritedDeliveryBand($inheritedDeliveryBand);
                $em->persist($productIndexObject);
                $em->flush();
            }
        }
    }

    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web';
    }
}