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
 
use ArtGalerie\Grid\Api\Data\KunstdruckInterface;
 
class Kunstdruck extends \Magento\Framework\Model\AbstractModel implements KunstdruckInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag__dyn_pricing_digitalprint_picture';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag__dyn_pricing_digitalprint_picture';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag__dyn_pricing_digitalprint_picture';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Kunstdruck');
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
     * Get Print Material.
     *
     * @return int
     */
    public function getPrintMaterial()
    {
        return $this->getData(self::PRINT_MATERIAL);
    }
 
    /**
     * Set Print Material.
     */
    public function setPrintMaterial($printMaterial)
    {
        return $this->setData(self::PRINT_MATERIAL, $printMaterial);
    }
     /**
     * Get Print Work.
     *
     * @return int
     */
    public function getPrintWork()
    {
        return $this->getData(self::PRINT_WORK);
    }
 
    /**
     * Set Print Work.
     */
    public function setPrintWork($printWork)
    {
        return $this->setData(self::PRINT_WORK, $printWork);
    }
    /**
     * Get Updated At.
     *
     * @return varchar
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
 
    /**
     * Set Updated At.
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
 
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
 
    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
