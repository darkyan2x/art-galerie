<?php

namespace ArtGalerie\AgPricecalculator\Controller\Frame;

class FrameDetails extends \Magento\Framework\App\Action\Action {
	protected $_pageFactory;

	public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
	) {
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute() {
        
        if($_POST){
        	$frame_id = intval($_POST['frame_id']);
            $data = array();
        	$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 

	    	$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		    $connection = $resource->getConnection();
		   
		    $frames = "SELECT * FROM `ag_frames` WHERE `frame_id` = '".$frame_id."'";
		    $frame_results = $connection->fetchAll($frames);
            
            $frame_style = "SELECT * FROM `ag_style`";
		    $frame_style_results = $connection->fetchAll($frame_style);

			foreach($frame_results as $frame){
				$data['frame'] = $frame;
			}

			foreach($frame_style_results as $style){
                $data['frame_style'] = $style;
			}

			echo json_encode($data);
        }
        
		
	}

}