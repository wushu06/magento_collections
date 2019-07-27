<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 27/07/19
 * Time: 14:37
 */

namespace Tbb\Data\Helper;

class CustomersData
{

    protected $_customerFactory;

    public function __construct(

        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory

    )
    {
        $this->_customerFactory = $customerFactory;

    }


    /*
     * customer collection
     */
    public function getCustomerCollection() {
        $collection = $this->_customerFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->setPageSize(3);
        return $collection;
    }

    public function getFilteredCustomerCollection($name) {
        $collection = $this->_customerFactory->create();
        $collection->addAttributeToSelect("*");
        $collection->addAttributeToFilter("firstname", array("eq" => $name));
        return $collection;

    }

}