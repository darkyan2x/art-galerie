<?php

namespace ArtGalerie\AgPricecalculator\Controller\Index;

use ArtGalerie\AgPricecalculator\Helper\Calculations AS PriceCalculator;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder\CollectionFactory;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder\Collection;
use ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder;
use \Magento\Framework\ObjectManagerInterface;

class Index extends \Magento\Framework\App\Action\Action {
  protected $_pageFactory;
  protected $price;
  protected $pictureWidth;
  protected $pictureHeight;

  protected $motiffWidth;
  protected $motiffHeight;
  protected $passpartouWidth = 0;
  protected $rahmenwidth = 0;
  
  protected $totalBackplate;
  protected $passpartou;
  protected $surface;

  protected $klassenPrice = 0;

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

  public function getFrameWidth($frameType){
    if($frameType){
      //@todo get Width of the frame multiply by 2
      //query the frame and find its width
      $frame = $this->getFrame($frameType);
      foreach($frame as $f) {
        //return (float) $f['thickness'] * 2;

        $this->rahmenwidth = (float) $f['thickness'] * 2;

        $this->klassenPrice = (float) $f['klassen_price'];
        
      }

      
    } else {
      return 0;
    }
  }
  public function gerahmtes($gerahmtes, $dataArr, $totalArea){
    $totalPrice = 0;
    $passpartou = isset($dataArr['passepartou']) ? $dataArr['passepartou'] : '';
    $passpartou_total = 0;
    $surface = isset($dataArr['surface']) ? $dataArr['surface'] : '';
    $surfaceFinishing = isset($dataArr['surface_finishing']) ? $dataArr['surface_finishing'] : '';


    foreach($gerahmtes as $gerahmte) {
      //Backplate
      $backplate_material = (double) $gerahmte['m_backplate_material'];
      $backplate_work = (double) $gerahmte['m_backplate_work'];

      $totalBackplate = $totalArea * $backplate_material + $backplate_work;
      $this->totalBackplate = $totalBackplate;
       
       /* If user has selected passepartout calculate additional price */
      if($this->passpartouWidth == 7 && $passpartou != 'keinpassepartout') {
        $passpartou_total = ((double) $gerahmte['o_passepartout_material_7cm'] * $totalArea) + (double) $gerahmte['o_passepartout_work'];

      } else if($this->passpartouWidth == 10 && $passpartou != 'keinpassepartout') {
        $passpartou_total = ((double) $gerahmte['o_passepartout_material_10cm'] * $totalArea) + (double) $gerahmte['o_passepartout_work'];
      } 
      $this->passpartou = $passpartou_total;

      
      /* If user has selected surface calculate additional price */
      if($surface == 'uv' && $surfaceFinishing == 'Matt' || $surfaceFinishing == 'matt') {
               $matt = (double) $gerahmte['o_surface_uv_matte'];
               $matt *= $totalArea;
               $work = (double) $gerahmte['o_surface_uv_work'];
               $totalPrice += $matt+$work;
               $this->surface = $totalPrice;

      } else if($surface == 'uv' && $surfaceFinishing == 'Antireflex' || $surfaceFinishing == 'antireflex') {
               $antireflex = (double) $gerahmte['o_surface_uv_antireflex'];
               $antireflex *= $totalArea;
               $work = (double) $gerahmte['o_surface_uv_work'];
               $totalPrice+= $antireflex+$work;
               $this->surface = $totalPrice;
      } else if($surface == 'plexiglas' && $surfaceFinishing == 'Normal' || $surfaceFinishing == 'normal') {
               $normal = (double) $gerahmte['o_surface_plexi_normal'];
               $normal *= $totalArea;
               $work = (double) $gerahmte['o_surface_plexi_work'];
               $totalPrice+= $normal+$work;
               $this->surface = $totalPrice;
      } else if($surface == 'plexiglas' && $surfaceFinishing == 'Hochglanz' || $surfaceFinishing == 'hochglanz') {
               $glossy = (double) $gerahmte['o_surface_plexi_glossy'];
               $glossy *= $totalArea;
               $work = (double) $gerahmte['o_surface_plexi_work'];
               $totalPrice+= $glossy+$work;
               $this->surface = $totalPrice;
      } 


      $klassen = $this->klassenPrice;

      $finalprice = $totalBackplate + $totalPrice + $passpartou_total + $klassen;

      return round($finalprice, 2);
    }
  }

  public function leinwandbild($leinwandbild, $dataArr, $totalArea, $type){
    $material = 'm_'.$type.'_material';
    $work = 'm_'.$type.'_work';

    $totalPrice = 0;
    if($dataArr['keilrahmen'] != 'Bitte auswählen'){
      $keilrahmen = $dataArr['keilrahmen'];
    } else {
      $keilrahmen = '';
    }
    

    switch($keilrahmen) {
       case 'leiste-1-fach': $keilrahmen = 'mo_stretcher_frame_x1_material';
        break;
       case 'leiste-2-fach': $keilrahmen = 'mo_stretcher_frame_x2_material';
        break;
       default: 
        break;
    }
    
    foreach($leinwandbild as $leinwand) {
      $material = (double) $leinwand[$material];
      $work = (double) $leinwand[$work];

      $totalPrice = ($totalArea * $material) + $work;
      
      if($keilrahmen) {
        $frameWork = (double) $leinwand['mo_stretcher_frame_work'];
        $keilrahmen = (double) $leinwand[$keilrahmen];
        
        $totalPrice+= ($totalArea * $keilrahmen) + $frameWork;

      } 

      return round($totalPrice, 2);
    }
  }

  public function aludibondbild($aludibondbild, $dataArr, $totalArea){
    $m_backplate_material = 'm_backplate_material';
    $m_backplate_work = 'm_backplate_work';
    $m_mounting_material = 'm_mounting_material';
    $m_mounting_work = 'm_mounting_work';
    $totalPrice = 0;
    $backplate = 0;
    $mounting = 0;

    foreach($aludibondbild as $dibondbild) {
      $m_backplate_material = (double) $dibondbild[$m_backplate_material];
      $m_backplate_work = (double) $dibondbild[$m_backplate_work];
      $m_mounting_material = (double) $dibondbild[$m_mounting_material];
      $m_mounting_work = (double) $dibondbild[$m_mounting_work];

      $backplate = ($totalArea * $m_backplate_material) + $m_backplate_work;
      $mounting = ($totalArea * $m_mounting_material) + $m_mounting_work;

      $totalPrice = $backplate + $mounting;

      return round($totalPrice, 2);
    }
  }

  public function acrylglasbild($acrylglasbild, $dataArr, $totalArea){
    $m_backplate_material = 'm_backplate_material';
    $m_backplate_work = 'm_backplate_work';
    $m_mounting_material = 'm_mounting_material';
    $m_mounting_work = 'm_mounting_work';
    $totalPrice = 0;
    $backplate = 0;
    $mounting = 0;

    foreach($acrylglasbild as $acrylglas) {
      $m_backplate_material = (double) $acrylglas[$m_backplate_material];
      $m_backplate_work = (double) $acrylglas[$m_backplate_work];
      $m_mounting_material = (double) $acrylglas[$m_mounting_material];
      $m_mounting_work = (double) $acrylglas[$m_mounting_work];

      $backplate = ($totalArea * $m_backplate_material) + $m_backplate_work;
      $mounting = ($totalArea * $m_mounting_material) + $m_mounting_work;

      $totalPrice = $backplate + $mounting;

      return round($totalPrice, 2);
    }
  }

  public function kunstdruck($kunstdruck, $dataArr, $totalArea){
    $material = 'm_print_material';
    $work = 'm_print_material';
    $totalPrice = 0;

    foreach($kunstdruck as $k) {
      $material = (double) $k[$material];
      $work = (double) $k[$work];

      $totalPrice = ($totalArea * $material) + $work;

      return round($totalPrice, 2);
    }
  }

  public function calcPriceTotal($totalArea, $pictureType, $dataArr){
    //@todo find values, do calculations based on picture type
    //query the data to where it belongs on the table
    //return the final price
    switch($pictureType){
      case 'Leinwandbild':
            /* Get leinwandbild by total area */
            $leinwandbild = $this->getLeinwandbild($totalArea);
            
            if(strpos($dataArr['sku'], 'FG') !== false){
              $type = 'fg';
              return $this->leinwandbild($leinwandbild, $dataArr, $totalArea,$type);
            } else if(strpos($dataArr['sku'], 'WG') !== false) {
              $type = 'wg';
              return $this->leinwandbild($leinwandbild, $dataArr, $totalArea,$type);
            } 
            
        break;
      case 'Gerahmtes Bild':  
            /* Get gerahmtes by total area */
            $gerahmtes = $this->getGerahmtes($totalArea);

        return $this->gerahmtes($gerahmtes, $dataArr, $totalArea);
                              
        break;
      case 'Alu-Dibondbild':
            /* Get aludibondbild by total area */
            $aludibondbild = $this->getAluDibondbild($totalArea);

            return $this->aludibondbild($aludibondbild, $dataArr, $totalArea);
        break;
      case 'Acrylglasbild':
            /* Get acrylglasbild by total area */
            $acrylglasbild = $this->getAcrylglasbild($totalArea);

            return $this->acrylglasbild($acrylglasbild, $dataArr, $totalArea);
        break;
      case 'Kunstdruck':
            /* Get kunstdruck by total area */
            $kunstdruck = $this->getKunstdruck($totalArea);

            return $this->kunstdruck($kunstdruck, $dataArr, $totalArea);
        break;
      default: 
        break;
    }
  }
  public function getpasspartouWidth(){
    return (double) $this->passpartouWidth * 2;
  }
  public function getWidthArea($axis){
    $passpartouWidth = $this->getpasspartouWidth();
    $width = $this->motiffWidth;
    $height = $this->motiffHeight;

    $ratio = $width / $height;
    
    /* Adjust height and width if height is less than 30cm */
    if($height < 30 || $width < 30) {
      $this->motiffHeight*=$ratio;
      $this->motiffWidth*=$ratio;
    }
    

    if($axis == 'x'){

      return (double) $this->motiffWidth + $passpartouWidth + (double) $this->rahmenwidth;
    } else {
      
      return (double) $this->motiffHeight + $passpartouWidth+ (double) $this->rahmenwidth;
    }
  }
  public function getTotalArea($data){
    #$medium = $data['medium'] ? $data['medium'] : '';
    $frame = isset($data['frame']) ? $data['frame'] : '';
    //get motiff size
    $this->motiffWidth = isset($data['motiff_width']) ? (double) $data['motiff_width'] : 0;
    $this->motiffHeight = isset($data['motiff_height']) ? (double) $data['motiff_height'] : 0;
    $passepartou = isset($data['passepartou']) ? $data['passepartou'] : 'keinpassepartout';
    if($passepartou != 'keinpassepartout' && $passepartou != '') {
      $this->passpartouWidth = isset($data['passepartou_width']) ? (double) $data['passepartou_width'] : 0;
    } 
    
    if(isset($frame) && $frame != ''){
      $this->getFrameWidth($data['frame']);
    }

    //toital area of X
    $xTotalArea = round((float) $this->getWidthArea('x') / 100, 2);


    //total area of y
    $yTotalArea = round((float) $this->getWidthArea('y') / 100,2);
 
    $totalArea = round($xTotalArea * $yTotalArea, 2);
  
    
    //convert cm to square meters thats why we divide by 100
    return $totalArea;
  }
  
  /* Get gerahmtes */
  public function getGerahmtes($totalArea) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $gerahmtes = "SELECT ag__dyn_pricing_framed_picture.*, ag__sizes.* FROM ag__dyn_pricing_framed_picture, ag__sizes WHERE ag__dyn_pricing_framed_picture.size_id = ag__sizes.id && min_size <= $totalArea && max_size >= $totalArea";
    $results = $connection->fetchAll($gerahmtes);

    return $results;
  }
  
  /* Get frame */
  public function getFrame($frameType) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();
    (int) $frameType;

    $frames = "SELECT ag_frames.*, ag__klassen.price as 'klassen_price' FROM ag_frames, ag__klassen WHERE frame_id = $frameType AND ag_frames.klassen_id = ag__klassen.id";
    $results = $connection->fetchAll($frames);

    return $results;

  }

  /* Get klassen */
  public function getKlassen($klassen = 0) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $klassen = "SELECT * FROM ag__klassen.* WHERE id = $klassen";
    $results = $connection->fetchAll($klassen);

    foreach($results as $klassen) {
       return $klassen['price'];
    }

  }

  /* Get leinwandbild */
  public function getLeinwandbild($totalArea) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $leinwandbild = "SELECT ag__dyn_pricing_canvas_picture.*, ag__sizes.* FROM ag__dyn_pricing_canvas_picture, ag__sizes WHERE ag__sizes.id = ag__dyn_pricing_canvas_picture.size_id && min_size <= $totalArea && max_size >= $totalArea";
    $results = $connection->fetchAll($leinwandbild);

    return $results;
  }

  /* Get aludibondbild */
  public function getAluDibondbild($totalArea) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $aludibondbild = "SELECT ag__dyn_pricing_aludibond_picture.*, ag__sizes.* FROM ag__dyn_pricing_aludibond_picture, ag__sizes WHERE ag__sizes.id = ag__dyn_pricing_aludibond_picture.size_id && min_size <= $totalArea && max_size >= $totalArea";
    $results = $connection->fetchAll($aludibondbild);

    return $results;
  }

  /* Get acrylglasbild */
  public function getAcrylglasbild($totalArea) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $acrylglasbild = "SELECT ag__dyn_pricing_acrylicglass_picture.*, ag__sizes.* FROM ag__dyn_pricing_acrylicglass_picture, ag__sizes WHERE ag__sizes.id = ag__dyn_pricing_acrylicglass_picture.size_id && min_size <= $totalArea && max_size >= $totalArea";
    $results = $connection->fetchAll($acrylglasbild);

    return $results;
  }

  /* Get kunstdruck */
  public function getKunstdruck($totalArea) {
    $resource = $this->ObjectManagerInterface->get('Magento\Framework\App\ResourceConnection');
    $connection = $resource->getConnection();

    $kunstdruck = "SELECT ag__dyn_pricing_digitalprint_picture.*, ag__sizes.* FROM ag__dyn_pricing_digitalprint_picture, ag__sizes WHERE ag__sizes.id = ag__dyn_pricing_digitalprint_picture.size_id && min_size <= $totalArea && max_size >= $totalArea";
    $results = $connection->fetchAll($kunstdruck);

    return $results;
  }

  public function execute() {
         
        if($_GET){
          $picture_type = isset($_GET['picture_type']) ? $_GET['picture_type'] : '';
          $dataArr = $_GET;
          $totalArea = $this->getTotalArea($dataArr);
          $finalPrice = $this->calcPriceTotal($totalArea, $picture_type, $dataArr);

          $finalPrice = str_replace('.', ',', $finalPrice);
          $data = array(
            'price' => $finalPrice,
            'backplate' => $this->totalBackplate,
            'passpartou' => $this->passpartou,
            'total_area' => $totalArea,
            'surface' => $this->surface,
            'klassen' => $this->klassenPrice
          );
          echo json_encode($data);
          exit;
          
        }  
  }

}