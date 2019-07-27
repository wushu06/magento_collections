<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 27/07/19
 * Time: 14:37
 */

namespace Tbb\Data\Helper;

class CategoriesData
{

    protected $_categoryFactory;

    public function __construct(

        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryFactory

    )
    {
        $this->_categoryFactory = $categoryFactory;

    }


    /*
     * customer collection
     */
    public function getCategoryCollection() {
        $collection = $this->_categoryFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->setPageSize(3);
        return $collection;
    }


}