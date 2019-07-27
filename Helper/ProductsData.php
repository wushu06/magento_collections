<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 27/07/19
 * Time: 14:37
 */

namespace Tbb\Data\Helper;

class ProductsData
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public $_storeManager;
    protected $connection;

    protected $_productCollectionFactory;

    protected $_customer;
    protected $_customerFactory;

    public function __construct(

        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory

    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;

    }


    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        /*$collection
            ->setPageSize(5) // only get 10 products
            ->setCurPage(1)  // first page (means limit 0,10)
            ->load();*/
        return $collection;

    }
    public function getProductCollectionById($id)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('entity_id', array('eq'=>$id));

        return $collection;

    }
    public function getProductCollectionBySku($sku)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('sku', array('like' => '%'.$sku.'%'));
        return $collection;

    }
    public function getProductCollectionByPrice($price, $method = 'gt')
    {
        // methods : 'gteq', 'lt', 'lteq'
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('price', array($method => $price));
        $collection->setPageSize(3);
        return $collection;

    }
    public function getProductCollectionByName($name)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter(
            [
                ['attribute' => 'name', 'like' => '%'.$name.'%'],
            ]);
        $collection->setPageSize(3);

        return $collection;

    }

}