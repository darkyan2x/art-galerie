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
 
use ArtGalerie\Grid\Api\Data\GerahmteBilderInterface;
 
class GerahmteBilder extends \Magento\Framework\Model\AbstractModel implements GerahmteBilderInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag__dyn_pricing_framed_picture';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag__dyn_pricing_framed_picture';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag__dyn_pricing_framed_picture';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\GerahmteBilder');
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
     * Get MinSize.
     *
     * @return int
     */
    public function getMinSize()
    {
        return $this->getData(self::MIN_SIZE);
    }
 
    /**
     * Set MinSize.
     */
    public function setMinSize($minSize)
    {
        return $this->setData(self::MIN_SIZE, $minSize);
    }  
    /**
     * Get MaxSize.
     *
     * @return int
     */
    public function getMaxSize()
    {
        return $this->getData(self::MAX_SIZE);
    }
 
    /**
     * Set MaxSize.
     */
    public function setMaxSize($maxSize)
    {
        return $this->setData(self::MAX_SIZE, $maxSize);
    }
    /**
     * Get BackplateMaterial.
     *
     * @return int
     */
    public function getMBackplateMaterial()
    {
        return $this->getData(self::M_BACKPLATE_MATERIAL);
    }
 
    /**
     * Set BackplateMaterial.
     */
    public function setMBackplateMaterial($mBackplateMaterial)
    {
        return $this->setData(self::M_BACKPLATE_MATERIAL, $mBackplateMaterial);
    }
    /**
     * Get BackplateWork.
     *
     * @return int
     */
    public function getBackplateWork()
    {
        return $this->getData(self::BACKPLATE_WORK);
    }
 
    /**
     * Set BackplateWork.
     */
    public function setBackplateWork($backplateWork)
    {
        return $this->setData(self::BACKPLATE_WORK, $backplateWork);
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
