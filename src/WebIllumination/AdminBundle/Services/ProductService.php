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

    // Get special offers
    public function getSpecialOffers($locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select("p")
            ->from("KAC\SiteBundle\Entity\Product", "p")
            ->join("p.descriptions", "pd")
            ->join("p.variants", "v")
            ->join("v.prices", "vp")
            ->where($qb->expr()->eq('p.status', $qb->expr()->literal('a')))
            ->andWhere($qb->expr()->lt('vp.listPrice', 'vp.recommendedRetailPrice'))
            ->andWhere($qb->expr()->eq('pd.locale', $qb->expr()->literal($locale)))
            ->andWhere($qb->expr()->eq('vp.currencyCode', $qb->expr()->literal($currencyCode)))
            ->addOrderBy('vp.listPrice', 'DESC')
            ->setFirstResult(0)
            ->setMaxResults(30);
        $query = $qb->getQuery();

        $products = $query->getResult();
        return $products;
    }

    // Get all products
    public function getAllProducts($locale = 'en', $currencyCode = 'GBP')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select("p")
            ->from("KAC\SiteBundle\Entity\Product", "p")
            ->join("p.descriptions", "pd")
            ->join("p.variants", "v")
            ->join("v.prices", "vp")
            ->where($qb->expr()->eq('p.status', $qb->expr()->literal('a')))
            ->andWhere($qb->expr()->eq('pd.locale', $qb->expr()->literal($locale)))
            ->andWhere($qb->expr()->eq('vp.currencyCode', $qb->expr()->literal($currencyCode)))
            ->setFirstResult(0)
            ->setMaxResults(30);
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

        /**
         * Get entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select("p")
            ->from("KAC\SiteBundle\Entity\Product", "p")
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
            ->addOrderBy('pd.header', 'ASC');
        $query = $qb->getQuery();

        $products = $query->getResult();
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

        $query = $em->createQueryBuilder()
            ->select("p, pd, v, vp, vd, b, bd, br, ptd, d, dd, dr")
            ->from("KAC\SiteBundle\Entity\Product", "p")
            ->leftJoin("p.variants", "v")
            ->leftJoin("p.descriptions", "pd")
            ->leftJoin("v.prices", "vp")
            ->leftJoin("v.features", "vf")
            ->leftJoin("v.options", "vo")
            ->leftJoin("v.descriptions", "vd")
            ->leftJoin("p.brand", "b")
            ->leftJoin("b.descriptions", "bd")
            ->leftJoin("b.routings", "br")
            ->leftJoin("p.departments", "ptd")
            ->join("ptd.department", "d")
            ->leftJoin("d.descriptions", "dd")
            ->leftJoin("d.routings", "dr")
            ->where("p.id = ?1")
            ->setParameter(1, $id);

        /**
         * @var Product $productObject
         * @var \KAC\SiteBundle\Entity\Product\Description $productDescriptionObject
         */
        $productObjects = $query->getQuery()->execute();

        // Product Info
        if (!$productObjects || count($productObjects) < 0 || count($productObjects[0]->getDescriptions()) < 0)
        {
            return false;
        }

        $productObject = $productObjects[0];

        $productDescriptionObjects = $productObject->getDescriptions();
        $productDescriptionObject = $productDescriptionObjects[0];

        $product['id'] = $productObject->getId();
        $product['productId'] = $productObject->getId();
        $product['productGroupId'] = $productObject->getId();
        $product['availableForPurchase'] = $productObject->getAvailableForPurchase();
        $product['status'] = $productObject->getStatus();
        $product['product'] = $productDescriptionObject->getName();
        $product['prefix'] = $productDescriptionObject->getPrefix();
        $product['tagline'] = $productDescriptionObject->getTagline();
        $product['productCode'] = $productObject->getProductCode();
        $product['productGroupCode'] = $productObject->getProductCode();
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

        $product['url'] = $productObject->getRouting()->getUrl();

        // Brand
        $product['brand'] = array();

        /**
         * @var Brand $brandObject
         */
        $brandObject = $productObject->getBrand();
        if(count($brandObject->getDescriptions()) > 0 && count($brandObject->getRoutings()) > 0)
        {
            $product['brand']['id'] = $brandObject->getId();
            $product['brand']['brand'] = $brandObject->getDescription()->getName();
            $product['brand']['routing'] = $brandObject->getRouting()->getUrl();
            $product['brand']['membershipCardDiscountAvailable'] = $brandObject->getMembershipCardDiscountAvailable();
            $product['brand']['maximumMembershipCardDiscount'] = $brandObject->getMaximumMembershipCardDiscount();

            // Get brand logo
            $brandLogoObject = $em->getRepository('KAC\SiteBundle\Entity\Image')->find($brandObject->getDescription()->getLogoImage()->getId());
            if ($brandLogoObject)
            {
                $product['brand']['logoOriginalPath'] = $brandLogoObject->getPublicPath();
                $product['brand']['logoThumbnailPath'] = $brandLogoObject->getPublicPath();
                $product['brand']['logoMediumPath'] = $brandLogoObject->getPublicPath();
                $product['brand']['logoLargePath'] = $brandLogoObject->getPublicPath();
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
        foreach ($productObject->getDepartments() as $productToDepartmentObject)
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
                $departmentPathDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Department\Description')->findOneBy(array('department' => $departmentPathId));
                $departmentPathRoutingObject = $em->getRepository('KAC\SiteBundle\Entity\Department\Routing')->findOneBy(array('objectId' => $departmentPathId, 'locale' => 'en', ));
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
        $relatedProductsObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('product' => $id, 'linkType' => 'related', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $relatedProductObject
         */
        foreach ($relatedProductsObject as $relatedProductObject)
        {
            $relatedProduct = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findOneBy(array('product' => $relatedProductObject->getLinkedProduct()->getId()));
            if ($relatedProductObject)
            {
                $relatedProducts[] = $relatedProduct;
            }
        }
        $product['relatedProducts'] = $relatedProducts;

        // Cheaper Alternatives
        $cheaperAlternatives = array();
        $cheaperAlternativesObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('product' => $id, 'linkType' => 'cheaper', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $cheaperAlternativeObject
         */
        foreach ($cheaperAlternativesObject as $cheaperAlternativeObject)
        {
            $cheaperAlternative = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findOneBy(array('product' => $cheaperAlternativeObject->getLinkedProduct()->getId()));
            if ($cheaperAlternative)
            {
                $cheaperAlternatives[] = $cheaperAlternative;
            }
        }
        $product['cheaperAlternatives'] = $cheaperAlternatives;

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
        $variant = array();

        $query = $em->createQueryBuilder()
            ->select("v, p, vp, vf, vo, vd, d, pd, pr")
            ->from("KAC\SiteBundle\Entity\Product\Variant", "v")
            ->join("v.product", "p")
            ->leftJoin("v.prices", "vp")
            ->leftJoin("v.features", "vf")
            ->leftJoin("v.options", "vo")
            ->leftJoin("v.descriptions", "vd")
            ->leftJoin("p.descriptions", "pd")
            ->leftJoin("p.routings", "pr")
            ->leftJoin("p.departments", "d")
            ->where("v.id = ?1")
            ->setParameter(1, $id);

        /**
         * @var Product\Variant $variantObject
         * @var \KAC\SiteBundle\Entity\Product\Variant\Description $productDescriptionObject
         */
        $variantObjects = $query->getQuery()->execute();

        // Product Info
        if (!$variantObjects || count($variantObjects) < 0)
        {
            return false;
        }

        $variantObject = $variantObjects[0];

        if($variantObject->getDescription() === null) {
            if($variantObject->getProduct()->getDescription() === null) {
                return false;
            } else {
                $variantDescriptionObject = $variantObject->getProduct()->getDescription();
            }
        } else {
            $variantDescriptionObject = $variantObject->getDescription();
        }

        $product = $this->getProduct($variantObject->getProduct()->getId());

        $variant['id'] = $variantObject->getId();
        $variant['productId'] = $variantObject->getProduct()->getId();
        $variant['productGroupId'] = $variantObject->getProduct()->getId();
        $variant['availableForPurchase'] = $variantObject->getProduct()->getAvailableForPurchase();
        $variant['status'] = $variantObject->getStatus();
        $variant['product'] = $variantDescriptionObject->getName();
        $variant['prefix'] = $variantDescriptionObject->getPrefix();
        $variant['tagline'] = $variantDescriptionObject->getTagline();
        $variant['productCode'] = $variantObject->getProductCode();
        $variant['productGroupCode'] = $variantObject->getProductCode();
        $variant['alternativeProductCodes'] = $variantObject->getAlternativeProductCodes();
        $variant['description'] = $variantDescriptionObject->getDescription();
        $variant['shortDescription'] = $variantDescriptionObject->getShortDescription();
        $variant['pageTitle'] = $variantDescriptionObject->getPageTitle();
        $variant['header'] = $variantDescriptionObject->getHeader();
        $variant['metaDescription'] = $variantDescriptionObject->getMetaDescription();
        $variant['metaKeywords'] = $variantDescriptionObject->getMetaKeywords();
        $variant['searchWords'] = $variantDescriptionObject->getSearchWords();
        $variant['deliveryBand'] = $variantObject->getProduct()->getDeliveryBand();
        $variant['inheritedDeliveryBand'] = $variantObject->getProduct()->getInheritedDeliveryBand();
        $variant['deliveryCost'] = $variantObject->getProduct()->getDeliveryCost();
        $variant['weight'] = $variantObject->getWeight();
        $variant['length'] = $variantObject->getLength();
        $variant['width'] = $variantObject->getWidth();
        $variant['height'] = $variantObject->getHeight();
        $variant['mpn'] = $variantObject->getMpn();
        $variant['ean'] = $variantObject->getEan();
        $variant['upc'] = $variantObject->getUpc();
        $variant['jan'] = $variantObject->getJan();
        $variant['isbn'] = $variantObject->getIsbn();
        $variant['featureComparison'] = $variantObject->getProduct()->getFeatureComparison();
        $variant['downloadable'] = $variantObject->getProduct()->getDownloadable();
        $variant['specialOffer'] = $variantObject->getProduct()->getSpecialOffer();
        $variant['recommended'] = $variantObject->getProduct()->getRecommended();
        $variant['accessory'] = $variantObject->getProduct()->getAccessory();
        $variant['new'] = $variantObject->getProduct()->getNew();
        $variant['hidePrice'] = $variantObject->getProduct()->getHidePrice();
        $variant['showPriceOutOfHours'] = $variantObject->getProduct()->getShowPriceOutOfHours();
        $variant['membershipCardDiscountAvailable'] = $variantObject->getProduct()->getMembershipCardDiscountAvailable();
        $variant['maximumMembershipCardDiscount'] = $variantObject->getProduct()->getMaximumMembershipCardDiscount();
        $variant['updatedAt'] = $variantObject->getUpdatedAt();

        $variant['url'] = $variantObject->getProduct()->getRouting()->getUrl();

        // Prices
        $prices = array();
        /**
         * @var Product\Price $variantPriceObject
         */
        foreach ($variantObject->getPrices() as $variantPriceObject)
        {
            $variantPrice = array();
            $variantPrice['costPrice'] = $variantPriceObject->getCostPrice();
            $variantPrice['costPriceExcludingVat'] = $variantPriceObject->getCostPriceExcludingVat();
            $variantPrice['recommendedRetailPrice'] = $variantPriceObject->getRecommendedRetailPrice();
            $variantPrice['recommendedRetailPriceExcludingVat'] = $variantPriceObject->getRecommendedRetailPriceExcludingVat();
            $variantPrice['listPrice'] = $variantPriceObject->getListPrice();
            $variantPrice['listPriceExcludingVat'] = $variantPriceObject->getListPriceExcludingVat();
            $variantPrice['profit'] = $variantPriceObject->getProfit();
            $variantPrice['profitExcludingVat'] = $variantPriceObject->getProfitExcludingVat();
            $variantPrice['profitPercentageClass'] = $variantPriceObject->getProfitPercentageClass();
            $variantPrice['markupPercentage'] = $variantPriceObject->getMarkupPercentage();
            $variantPrice['markupPercentageClass'] = $variantPriceObject->getMarkupPercentageClass();
            $variantPrice['discount'] = $variantPriceObject->getDiscount();
            $variantPrice['savings'] = $variantPriceObject->getSavings();
            $variantPrice['currencyCode'] = $variantPriceObject->getCurrencyCode();

            // Calculate the membership card price
            $membershipCardDiscountAvailable = true;
            $bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
            if ($variant['membershipCardDiscountAvailable'] > 0)
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
                $variantPrice['membershipCardPrice'] = $variantPrice['recommendedRetailPrice'] - ($variantPrice['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
            } else {
                $variantPrice['membershipCardPrice'] = $variantPrice['listPrice'];
            }
            $prices[] = $variantPrice;
        }
        $variant['prices'] = $prices;

        // Images
        $images = array();
        $imagesObject = $em->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array('objectId' => $id, 'objectType' => 'variant', 'imageType' => 'variant', 'locale' => $locale), array('displayOrder' => 'ASC'));
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
        $variant['images'] = $images;

        // Videos
        $videos = array();
        $videosObject = $em->getRepository('KAC\SiteBundle\Entity\Video')->findBy(array('objectId' => $id, 'objectType' => 'variant', 'locale' => $locale), array('displayOrder' => 'ASC'));
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
        $variant['videos'] = $videos;

        // Related products
        $relatedProducts = array();
        $relatedProductsObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('product' => $id, 'linkType' => 'related', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $relatedProductObject
         */
        foreach ($relatedProductsObject as $relatedProductObject)
        {
            $relatedProduct = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findOneBy(array('product' => $relatedProductObject->getLinkedProduct()->getId()));
            if ($relatedProductObject)
            {
                $relatedProducts[] = $relatedProduct;
            }
        }
        $variant['relatedProducts'] = $relatedProducts;

        // Cheaper Alternatives
        $cheaperAlternatives = array();
        $cheaperAlternativesObject = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('product' => $id, 'linkType' => 'cheaper', 'active' => 1), array('displayOrder' => 'ASC'));
        /**
         * @var Product\Link $cheaperAlternativeObject
         */
        foreach ($cheaperAlternativesObject as $cheaperAlternativeObject)
        {
            $cheaperAlternative = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findOneBy(array('product' => $cheaperAlternativeObject->getLinkedProduct()->getId()));
            if ($cheaperAlternative)
            {
                $cheaperAlternatives[] = $cheaperAlternative;
            }
        }
        $variant['cheaperAlternatives'] = $cheaperAlternatives;

        // Features
        $variantFeatures = array();
        /**
         * @var Product\VariantToFeature $variantToFeatureObject
         */
        foreach ($variantObject->getFeatures() as $variantToFeatureObject)
        {
            $variantFeature = array();
            $variantFeature['id'] = $variantToFeatureObject->getId();
            $variantFeature['productFeatureGroupId'] = $variantToFeatureObject->getFeatureGroup()->getId();
            $variantFeature['productFeatureGroup'] = $variantToFeatureObject->getFeatureGroup()->getName();
            $variantFeature['filter'] = $variantToFeatureObject->getFeatureGroup()->getFilter();
            $variantFeature['productFeatureId'] = $variantToFeatureObject->getFeatureGroup()->getId();
            $variantFeature['productFeature'] = $variantToFeatureObject->getFeature()->getName();
            $variantFeatures[$variantToFeatureObject->getFeatureGroup()->getName()][] = $variantFeature;
        }
        $variant['productFeatures'] = $variantFeatures;

        // Options
        $variantOptions = array();
        /**
         * @var Product\VariantToOption $variantToOptionObject
         */
        foreach ($variantObject->getOptions() as $variantToOptionObject)
        {
            $variantOption = array();
            $variantOption['id'] = $variantToOptionObject->getId();
            $variantOption['productOptionGroupId'] = $variantToOptionObject->getOptionGroup()->getId();
            $variantOption['productOptionGroup'] = $variantToOptionObject->getOptionGroup()->getName();
            $variantOption['productOptionId'] = $variantToOptionObject->getOptionGroup()->getId();
            $variantOption['productOption'] = $variantToOptionObject->getOption()->getName();
            $variantOption['price'] = $variantToOptionObject->getPrice();
            $variantOption['priceType'] = $variantToOptionObject->getPriceType();
            $variantOption['priceUse'] = $variantToOptionObject->getPriceUse();
            $variantOptions[$variantToOptionObject->getOptionGroup()->getName()][] = $variantOption;
        }
        $variant['productOptions'] = $variantOptions;

        // Guarantees
        $guarantees = array();
        $variant['guarantees'] = $guarantees;

        // Check if price is hidden
        if (($variant['hidePrice'] > 0) && ($variant['showPriceOutOfHours'] > 0))
        {
            $currentDay = date("D");
            $currentTime = date("G");
            switch ($currentDay)
            {
                case 'Sat':
                case 'Sun':
                    $variant['hidePrice'] = 0;
                    break;
                case 'Mon':
                case 'Tue':
                case 'Wed':
                case 'Thu':
                case 'Fri':
                    if (($currentTime < 7) || ($currentTime > 17))
                    {
                        $variant['hidePrice'] = 0;
                    }
                    break;
            }
        }

        return $variant;
    }

    // Calculate price based on options
    public function getPrice($variantId, $selectedOptions)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get the entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Setup array to collect price information
        $price = array();

        // Get the product
        $product = $this->getVariant($variantId, 'en', 'GBP');
        $price['productCode'] = $product['productCode'];
        $price['listPrice'] = $product['prices'][0]['listPrice'];
        $price['recommendedRetailPrice'] = $product['prices'][0]['recommendedRetailPrice'];
        $price['savings'] = $product['prices'][0]['savings'];
        $price['discount'] = $product['prices'][0]['discount'];

        // Get selected options
        if ($selectedOptions)
        {
            $selectedOptionIds = explode('|', $selectedOptions);
            foreach ($selectedOptionIds as $selectedOptionId)
            {
                $productToOptionObject = $em->getRepository('KAC\SiteBundle\Entity\Product\VariantToOption')->find($selectedOptionId);
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

    // Update the product delivery bands
    public function updateProductDeliveryBand($id, $locale = 'en')
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get the entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        // Get the inherited delivery band
        $inheritedDeliveryBand = 0;

        /**
         * Get the product objects
         * @var $productObject Product
         */
        $productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);

        // Check to see if the delivery band has been set by the product
        if ($productObject)
        {
            if ($productObject->getDeliveryBand() > 0)
            {
                $inheritedDeliveryBand = $productObject->getDeliveryBand();
            } else {
                /**
                 * Check each of the departments
                 * @var $department Department
                 */
                foreach ($productObject->getDepartments() as $department)
                {
                    // Check the brand department for a delivery band
                    $brandToDepartmentObject = $em->getRepository('KAC\SiteBundle\Entity\BrandToDepartment')->findOneBy(array('department' => $department->getId(), 'brand' => $productObject->getBrand()->getId()));

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
                        $departmentIndexObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->findOneBy(array('id' =>  $department->getId(), 'locale' => $locale));
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
            }

            error_log('Delivery Band for '.$productObject->getId().': '.$inheritedDeliveryBand);

            // Update the delivery band
            $productObject->setInheritedDeliveryBand($inheritedDeliveryBand);
            $em->persist($productObject);
            $em->flush();
        }
    }

    public function getProductListingCount()
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        $query = $em->createQueryBuilder()
            ->select('COUNT(p)')
            ->from('KAC\SiteBundle\Entity\Product', 'p')
            ->getQuery();

        return $query->getSingleScalarResult();
    }

    public function deleteProduct($id)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        /**
         * Get entity manager
         * @var EntityManager $em
         */
        $em = $doctrineService->getManager();

        $productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);

        if(!$productObject)
        {
            return false;
        }

        // Remove any links to this product
        $links = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('linkedProduct' => $productObject->getId()));
        foreach ($links as $link)
        {
            $em->remove($link);
        }

        $em->remove($productObject);
        $em->flush();

        return true;
    }

    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web';
    }
}