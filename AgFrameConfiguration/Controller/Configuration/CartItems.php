<?php

namespace ArtGalerie\AgFrameConfiguration\Controller\Configuration;

class CartItems extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $objectManager;
    protected $cartItems;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->objectManager = \Magento\Framework\App\ObjectManager::getInstance()
                                ->get('Magento\Framework\App\ResourceConnection');
        $this->cartItems = array();
        return parent::__construct($context);
    }

    public function execute()
    {
        //return $this->_pageFactory->create();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
        $cart_items = array();
        // retrieve quote items collection
        $itemsCollection = $cart->getQuote()->getItemsCollection();

        // get array of all items what can be display directly
        $itemsVisible = $cart->getQuote()->getAllVisibleItems();

        // retrieve quote items array
        $items = $cart->getQuote()->getAllItems();

        if($items) {
            foreach($items as $item):
               $this->getConfiguration($item->getProductId());
            endforeach;
        }   
        
        echo json_encode($this->cartItems);
        exit;

    }

    public function getConfiguration($product_id = 0) {
        $connection= $this->objectManager->getConnection();
        $product_id = intval($product_id);
        $user_id = $_SESSION['customer_id'];


        $themeTable = $this->objectManager->getTableName('ag_frame_configuration');

        $sql = "SELECT * FROM ".$themeTable." WHERE user_id = '".$user_id."' AND product_id = ".$product_id;
        $results = $connection->query($sql);
        foreach($results as $r) {
            $this->cartItems[$product_id] = $r;
        }

    }
}