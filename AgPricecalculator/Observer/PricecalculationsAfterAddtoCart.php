<?php
namespace ArtGalerie\AgPricecalculator\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
 
class PricecalculationsAfterAddtoCart implements ObserverInterface
{
     
      public function execute(\Magento\Framework\Event\Observer $observer) 
      { 
            $price = $_POST['new_product_price'];
            if(isset($price)){
                  /* Code here */
                  $quote_item = $observer->getEvent()->getQuoteItem();
                  $price = $price; //set your price here
                  $quote_item->setCustomPrice($price);
                  $quote_item->setOriginalCustomPrice($price);
                  $quote_item->getProduct()->setIsSuperMode(true);
            }
      }
}