<?php

namespace Tbb\Data\Helper;



class Index
{

    public $productsHelper;
    public $customersHelper;
    public $categoriesHelper;

    public function __construct(
        \Tbb\Data\Helper\ProductsData $productsData,
        \Tbb\Data\Helper\CustomersData $customersData,
        \Tbb\Data\Helper\CategoriesData $categoriesData

    )
    {

        $this->productsHelper = $productsData;
        $this->customersHelper = $customersData;
        $this->categoriesHelper = $categoriesData;
    }

}