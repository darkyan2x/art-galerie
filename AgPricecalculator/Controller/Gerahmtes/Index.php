<?php

namespace ArtGalerie\AgPricecalculator\Controller\Gerahmtes;

use ArtGalerie\AgPricecalculator\Helper\Calculations AS PriceCalculator;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder\CollectionFactory;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder\Collection;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder;
use \Magento\Framework\ObjectManagerInterface;

class Index extends \Magento\Framework\App\Action\Action {
  protected $_pageFactory;

  protected $priceCalculatorHelper;
  protected $gerahmteBilder;
  protected $resourceGerahmteBilder;
  protected $gerahmteBilderCollection;
  protected $ObjectManagerInterface;

  protected $gerahmtebilderFactory;
    

  public function __construct(
       \Magento\Framework\App\Action\Context $context,
       PriceCalculator $priceCalculatorHelper,
       CollectionFactory $gerahmteBilder,
       Collection $gerahmteBilderCollection,
       GerahmteBilder $resourceGerahmteBilder,
       ObjectManagerInterface $ObjectManagerInterface,
       \Magento\Framework\View\Result\PageFactory $pageFactory
  ) {
    parent::__construct($context);

    $this->_pageFactory = $pageFactory;
    $this->priceCalculatorHelper = $priceCalculatorHelper;
    $this->gerahmteBilder = $gerahmteBilder;
    $this->resourceGerahmteBilder = $resourceGerahmteBilder;
    $this->gerahmteBilderCollection = $gerahmteBilderCollection;
    $this->ObjectManagerInterface = $ObjectManagerInterface;

    return parent::__construct($context);
  }

  public function execute() {
    if($_GET) {
      $size = isset($_GET['size']) ? $_GET['size'] : 0;
      
      $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
      $connection = $resource->getConnection();
      
      $gerahmtes = "SELECT * FROM ag__dyn_pricing_framed_picture WHERE min_size <= $size && max_size >= $size";
      $results = $connection->fetchAll($gerahmtes);
      
      echo '<pre>';
      foreach($results as $r) {
        print_r($r);
      }
      echo '</pre>';
    }
    
  }

}