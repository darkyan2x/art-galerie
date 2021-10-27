<?php

namespace ArtGalerie\AgPricecalculator\Controller\CartItems;

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
		$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 

		// retrieve quote items collection
		$itemsCollection = $cart->getQuote()->getItemsCollection();

		// get array of all items what can be display directly
		$itemsVisible = $cart->getQuote()->getAllVisibleItems();

		// retrieve quote items array
		$items = $cart->getQuote()->getAllItems();
        $data = array();
		foreach($items as $item) {
			$_product = $objectManager->get('Magento\Catalog\Model\Product')->load($item->getProductId());
            echo $_product->getData('blatt_breite').'<br/>';
            echo $_product->getData('blatt_hoehe').'<br/>';
	    //  echo 'ID: '.$item->getProductId().'<br />';
	    //   echo 'Name: '.$item->getName().'<br />';
	    //    echo 'Sku: '.$item->getSku().'<br />';
	    //    echo 'Quantity: '.$item->getQty().'<br />';
	    //   echo 'Price: '.$item->getPrice().'<br />';
	    // echo "<br />";            
	  }
		
	}

}