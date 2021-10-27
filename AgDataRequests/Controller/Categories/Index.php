<?php

namespace ArtGalerie\AgDataRequests\Controller\Categories;

class Index extends \Magento\Framework\App\Action\Action {
    protected $_pageFactory;

    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute() {
        
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        // get current store’s categories 
        $categoryHelper = $objectManager->get('\Magento\Catalog\Helper\Category');
        $categories = $categoryHelper->getStoreCategories();
        $data = array();

        foreach($categories as $category){
            $data[$category->getId()] = $category->getName();
        }

        echo json_encode($data);
    }

}