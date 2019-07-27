<?php

namespace Tbb\Data\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Booking action
     *
     * @return void
     */
    protected $_pageFactory;


    public function execute()
    {

        $this->_view->loadLayout();
        $this->_view->renderLayout();

    }
}