<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Pcnametag\Relatedcategory\Model\Attribute\Source;

class Relatedcategory extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
   /* public function getAllOptions()
    {
		$_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        if (!$this->_options) {
			$categoryFactory = $_objectManager->create('Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
			$categories = $categoryFactory->create()                              
				->addAttributeToSelect('*');
				$arr = '[';
			foreach ($categories as $categorycollection){
				
				$cat_name= $categorycollection->getName();
				$cat_id= $categorycollection->getId();
				$arr .= "['label' =>$cat_name, 'value' => $cat_id],";
			}
			$arr = ']';
          //  $this->_options = $arr;
        }
        return $this->_options;
    }*/
    
     public function toArray()
    {
		$_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        if (!$this->_options) {
			$categoryFactory = $_objectManager->create('Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
			$categories = $categoryFactory->create()                              
				->addAttributeToSelect('*');
				$arr_cat = array();
			foreach ($categories as $categorycollection){
				$cat_name= $categorycollection->getName();
				$cat_id= $categorycollection->getId();
				$arr_cat[$cat_id] = $cat_name;
			}
			/*$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test6.log');
			$logger = new \Zend\Log\Logger();
			$logger->addWriter($writer);
			$logger->info($arr_cat);*/
			return $arr_cat;
			}
	}

    final public function toOptionArray()
    {
        $arr = $this->toArray();
        $ret = [];
        foreach ($arr as $key => $value) {
            $ret[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $ret;
    }

    /**
     * @return array
     */
    public function getAllOptions()
    {
        return $this->toOptionArray();
    }
}
