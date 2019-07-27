<?php

namespace Tbb\Data\Block;


class Data extends \Magento\Framework\View\Element\Template
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


    public $helper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\ResourceConnection $connection,


        \Tbb\Form\Helper\Index $helper,


        array $data = []
    )
    {
        parent::__construct($context, $data);


        $this->_storeManager = $storeManager;
        $this->connection = $connection;


        $this->helper = $helper;
    }



    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder

        return $this->_storeManager->getStore()->getBaseUrl().'/booking';
        // here controller_name is index, action is booking
    }

    public function getProductCollectionRaw(){
        $resource = $this->connection;
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('catalog_product_entity_varchar'); //gives table name with prefix

//Select Data from table
        $sql = "select * from catalog_product_entity_varchar left join eav_attribute on
                eav_attribute.attribute_id = catalog_product_entity_varchar.attribute_id
                WHERE  catalog_product_entity_varchar.entity_id=12
                LIMIT 5
              ";
       // $sql = "Select * FROM " . $tableName;
        $result = $connection->fetchAll($sql); // gives associated array, table fields as key in array.
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }



     public function productsData($request, $data = '')
    {
        switch ($request) {
            case "all":
                return $this->helper->productsHelper->getProductCollection();
                break;
            case "id":
                return $this->helper->productsHelper->getProductCollectionById($data);
                break;
            case "sku":
                return $this->helper->productsHelper->getProductCollectionBySku($data);
                break;
            case "name":
                return $this->helper->productsHelper->getProductCollectionByName($data);
                break;
            case "price":
                return $this->helper->productsHelper->getProductCollectionByPrice($data,  'gt');
                break;
            default:
                return 'No matching request!';
        }


    }


    public function customersData($request, $data = '')
    {
        switch ($request) {
            case "all":
                return $this->helper->customersHelper->getCustomerCollection();
                break;
            case "name":
                return $this->helper->customersHelper->getFilteredCustomerCollection($data);
                break;
            default:
                return 'No matching request!';
        }


    }

    public function categoriesData($request, $data = '')
    {
        switch ($request) {
            case "all":
                return $this->helper->categoriesHelper->getCategoryCollection();
                break;
            default:
                return 'No matching request!';
        }


    }



}