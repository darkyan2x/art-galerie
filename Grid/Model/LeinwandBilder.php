<?php
 
/**
 * Grid Grid Model.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 ArtGalerie Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Model;
 
use ArtGalerie\Grid\Api\Data\LeinwandBilderInterface;
 
class LeinwandBilder extends \Magento\Framework\Model\AbstractModel implements LeinwandBilderInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag__dyn_pricing_canvas_picture';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag__dyn_pricing_canvas_picture';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag__dyn_pricing_canvas_picture';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\LeinwandBilder');
    }
    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }
 
    /**
     * Set Id.
     */
    public function setId($Id)
    {
        return $this->setData(self::ID, $Id);
    }
 
    /**
     * Get FG Material.
     *
     * @return varchar
     */
    public function getFgMaterial()
    {
        return $this->getData(self::FG_MATERIAL);
    }
 
    /**
     * Set FG Material.
     */
    public function setFgMaterial($updatedAt)
    {
        return $this->setData(self::FG_MATERIAL, $fgMaterial);
    }

}
