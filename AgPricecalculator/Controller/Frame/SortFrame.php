<?php

namespace ArtGalerie\AgPricecalculator\Controller\Frame;

class SortFrame extends \Magento\Framework\App\Action\Action {
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
        	if(isset($_POST['frame_style'])){
        		$style_id = intval($_POST['frame_style']);
        		$sort = "WHERE `style_id` = ".$style_id;
        	}
        	if(isset($_POST['frame_color'])){
        		$color_id = intval($_POST['frame_color']);
                $sort = "WHERE `color_id` = ".$color_id;
        	}
        	if(isset($_POST['frame_width'])){
        		$width_id = intval($_POST['frame_width']);
                $sort = "WHERE `width_id` = ".$width_id;
        	}
            if(isset($_POST['material_type'])){
                $material_type = intval($_POST['material_type']);
                $sort = "WHERE `frame_id` = ".$material_type;
            }
        	if(isset($_POST['frame_sort'])) {
        		if($_POST['frame_sort'] == 'alphabetically'){
        			$sort = "ORDER BY `frame_name` ASC";
        		} else if($_POST['frame_sort'] == 'frame width'){
        			$sort = "ORDER BY `width_id` ASC";
        		} else {
        			$sort = "ORDER BY `frame_id` ASC";
        		}
        	}
        	
        	$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 

	    	$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		    $connection = $resource->getConnection();
		    $frames = "SELECT * FROM `ag_frames` ".$sort;
		    $frame_results = $connection->fetchAll($frames);
            
            if($frame_results){
            	echo json_encode($frame_results);
            } else {
            	$data = array(
                   'no_results' => 'No results'
            	);
            	echo json_encode($data);
            }
			
        }
        
		
	}


}