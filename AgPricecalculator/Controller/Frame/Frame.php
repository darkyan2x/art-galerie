<?php

namespace ArtGalerie\AgPricecalculator\Controller\Frame;

class Frame extends \Magento\Framework\App\Action\Action {
	protected $_pageFactory;
	protected $price;
	protected $pictureWidth;
	protected $pictureHeight;

	public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
	) {
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute() {
        
        if($_GET['frame_id']){
        	$frame_id = $_GET['frame_id'];
        	$image_processor_url = 'http://ag.avidel.de/img/image_processor.php';
			$sofa_frame_url = 'http://ag.avidel.de/img/sofa-frame.php';
			$product_image = $_GET['product_image'];
		    $width = $_GET['width'];
		    $height = $_GET['height'];
		    if(isset($_GET['passepartout'])){
		    	$passepartout = $_GET['passepartout'];
		    } else {
		    	$passepartout = 0;
		    }
		    if(isset($_GET['droppelpassepartout'])){
		    	$droppelpassepartout = $_GET['droppelpassepartout'];
		    } else {
		    	$droppelpassepartout = 0;
		    }
		    $sofa_image = $_GET['sofa_image'];

        	$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 

	    	$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		    $connection = $resource->getConnection();
		    /* Get color swatch */
		    $frames = "SELECT * FROM `ag_frames` WHERE `frame_id` = '".$frame_id."'";
		    $frame_results = $connection->fetchAll($frames);

		    foreach($frame_results as $frame){
		    	$frame_edge = $frame['frame_edge'];
		    	$frame_image = $frame['frame_image'];
		    	$price = $frame['price'];
		    }

		    $frame = $image_processor_url.'?frame=http://ag.avidel.de/pub/media/'.$frame_edge.'&product_image='.$product_image.'&passepartout='.$passepartout.'&droppelpassepartout='.$droppelpassepartout;
		    $sofa_frame = $sofa_frame_url.'?frame=http://ag.avidel.de/pub/media/'.$frame_edge.'&sofa_image='.$sofa_image.'&width='.$width.'&height='.$height.'&passepartout='.$passepartout.'&droppelpassepartout='.$droppelpassepartout;

		    $data = array(
	           'frame' => $frame,
	           'sofa_frame' => $sofa_frame,
	           'price' => $price
			);
			
        }

        echo json_encode($data);
		
	}

}