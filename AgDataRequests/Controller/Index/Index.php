<?php

namespace ArtGalerie\AgDataRequests\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action {
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
		
	    $data = array(
           'test data' => 'test data'
		);
		
		echo json_encode($data);
	}

}