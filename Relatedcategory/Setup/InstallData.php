<?php
/**
 * Related Categories
 * Copyright (C) 2017  
 * 
 * This file is part of Pcnametag/Relatedcategory.
 * 
 * Pcnametag/Relatedcategory is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Pcnametag\Relatedcategory\Setup;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'associate_category_1',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Associate category1',
                'input' => 'select',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => null,
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => '',
                'system' => 1,
                'group' => 'General',
                'source' => 'Pcnametag\Relatedcategory\Model\Attribute\Source\Relatedcategory',
                'frontend' => 'Pcnametag\Relatedcategory\Model\Attribute\Frontend\Relatedcategory',
                'backend' => 'Pcnametag\Relatedcategory\Model\Attribute\Backend\Relatedcategory'
               // 'option' => array('values' => array("cat1","cat2","cat3"))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'associate_category_2',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Associate Category2',
                'input' => 'select',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => true,
                'default' => null,
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => '',
                'system' => 1,
                'group' => 'General',
                'source' => 'Pcnametag\Relatedcategory\Model\Attribute\Source\Relatedcategory',
                'frontend' => 'Pcnametag\Relatedcategory\Model\Attribute\Frontend\Relatedcategory',
                'backend' => 'Pcnametag\Relatedcategory\Model\Attribute\Backend\Relatedcategory'
                //'option' => array('values' => array("cat3","cat4","cat5"))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'associate_category_3',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Associate category 3',
                'input' => 'select',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => true,
                'default' => null,
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => '',
                'system' => 1,
                'group' => 'General',
                'source' => 'Pcnametag\Relatedcategory\Model\Attribute\Source\Relatedcategory',
                'frontend' => 'Pcnametag\Relatedcategory\Model\Attribute\Frontend\Relatedcategory',
                'backend' => 'Pcnametag\Relatedcategory\Model\Attribute\Backend\Relatedcategory'
                //'option' => array('values' => array("cat 4","cat5","cat6"))
            ]
        );
    }
}
