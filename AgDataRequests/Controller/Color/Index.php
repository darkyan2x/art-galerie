<?php

namespace ArtGalerie\AgDataRequests\Controller\Color;

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
        
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        /* Get color swatch */
        $attribute_swatch_color = "SELECT `eav_attribute`.*, `eav_attribute_option`.*, `eav_attribute_option_value`.* FROM `eav_attribute`,`eav_attribute_option`,`eav_attribute_option_value` WHERE `eav_attribute`.`attribute_id` = `eav_attribute_option`.`attribute_id` AND `eav_attribute`.`attribute_code` = 'color' AND `eav_attribute_option`.`option_id` = `eav_attribute_option_value`.`option_id` GROUP BY `eav_attribute_option_value`.`value`";
        $swatch_color_results = $connection->fetchAll($attribute_swatch_color);

        echo json_encode($swatch_color_results);
    }

}