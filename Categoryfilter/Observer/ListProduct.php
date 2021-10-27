<?php

namespace ArtGalerie\Categoryfilter\Observer;

use Magento\Catalog\Block\Product\ListProduct as AGProductList;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;

class ListProduct implements ObserverInterface
{
    

    public function execute(\Magento\Framework\Event\Observer $observer){
        // Observer execution code...
        /*$ids = [12623];
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);*/
        $myEventData = $observer->getData('collection');
        echo "stinsssssg";
        //exit();
        //$request->getPostValue();
        //$myEventData->dispatch($);

        //return $myEventData;

    }

}