<?php

namespace Pcnametag\Relatedcategory\Block\Product\View;

use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Related extends \Magento\Framework\View\Element\Template
{
	/**
     * @var Product
     */
    protected $_product = null;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;
    protected $_categoryFactory; 
    protected $_storeConfig;
    
   public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\ProductRepository $productRepository,
          \Magento\Catalog\Model\CategoryFactory $categoryFactory,
             array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->_categoryFactory = $categoryFactory;
		

        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }
	public function getProduct()
    {
        if (!$this->_product) {
            $this->_product = $this->_coreRegistry->registry('product');
        }
        return $this->_product;
    }
    
    public function getAttribute(array $excludeAttr = [])
    {
        $data = [];
        $product = $this->getProduct();
        //$attributes = $product->getAttributes();
       
        
      //echo  $product->getData('orders_lt');
        
        $associate_category = array();
        $category_collect = array();
		$associate_category[] = $product->getData('associate_category_1');
		$associate_category[] = $product->getData('associate_category_2');
		$associate_category[] = $product->getData('associate_category_3');

        foreach ($associate_category as $category_prod) {
			if($category_prod==1 || $category_prod==2 || empty($category_prod))
				continue;
			$category = $this->_categoryFactory->create()->load($category_prod);
		    $category_collect[$category_prod]['categoryName'] = $category->getName();
		    $category_collect[$category_prod]['categoryURL'] = $category->getUrl();
		    $category_collect[$category_prod]['categoryDescription'] = $category->getDescription();
		    $category_collect[$category_prod]['categoryShortDescription'] = $category->getShortDescription();
			$category_collect[$category_prod]['categoryImageUrl'] = $category->getImageUrl();
		}
		return $category_collect;
	}
      
   public function getPlaceholderImage(){
    //return $this->_storeConfig->getValue('catalog/placeholder/image_placeholder'); // Base Image
   // $this->_storeConfig->getValue('catalog/placeholder/small_image_placeholder'); // Small Image
   // $this->_storeConfig->getValue('catalog/placeholder/swatch_image_placeholder'); // Swatch Image
   return  $this->_storeConfig->getValue('catalog/placeholder/thumbnail_placeholder'); // Thumbnail Image
	}
}
