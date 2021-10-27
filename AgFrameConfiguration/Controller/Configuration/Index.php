<?php

namespace ArtGalerie\AgFrameConfiguration\Controller\Configuration;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $objectManager;
    protected $created_at;
    protected $updated_at;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->objectManager = \Magento\Framework\App\ObjectManager::getInstance()
                                ->get('Magento\Framework\App\ResourceConnection');
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::__construct($context);
    }

    public function execute()
    {
        //return $this->_pageFactory->create();
        $data = array();
        
        if($_POST){
            $customer_id = $_POST['customer_id'];
            $product_id = intval($_POST['product_id']);
            $configuration_image = $_POST['configuration_image'];
            
            $results = $this->checkUserIfExist($customer_id, $product_id);
            if(!$results){
                $this->insertConfiguration($customer_id, $product_id, $configuration_image);
            } else {
                $this->updateConfiguration($customer_id, $product_id, $configuration_image);
            }
            exit;
        }
            
    }
    
    /* Check if configuration exist */
    public function checkUserIfExist($user_id = '', $product_id = 0, $configuration_image = '') {
        $connection= $this->objectManager->getConnection();
        $product_id = intval($product_id);

        $themeTable = $this->objectManager->getTableName('ag_frame_configuration');
        $sql = "SELECT * FROM ".$themeTable." WHERE user_id = '".$user_id."' AND product_id = ".$product_id;
        $results = $connection->query($sql);
        foreach($results as $r) {
            return $r;
        }


    }
    
    /* Insert frame configuration */
    public function insertConfiguration($user_id = '', $product_id = 0, $configuration_image = '') {
        $themeTable = $this->objectManager->getTableName('ag_frame_configuration');
        $connection= $this->objectManager->getConnection();
        $sql = "INSERT INTO " . $themeTable . "(product_id, configuration, user_id, created_at, updated_at) VALUES (".$product_id.", '".$configuration_image."','".$user_id."','".$this->created_at."','".$this->updated_at."')";
        $results = $connection->query($sql);
    }

    /* Update frame configuration */
    public function updateConfiguration($user_id = '', $product_id = 0, $configuration_image = '') {
        $themeTable = $this->objectManager->getTableName('ag_frame_configuration');
        $connection= $this->objectManager->getConnection();
        $sql = "UPDATE ".$themeTable." SET `configuration`='".$configuration_image."',`updated_at`='".$this->updated_at."' WHERE user_id = '".$user_id."' AND product_id = ".$product_id;
        $results = $connection->query($sql);
    }
}