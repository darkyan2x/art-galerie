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
 
use ArtGalerie\Grid\Api\Data\SizeInterface;
 
class Size extends \Magento\Framework\Model\AbstractModel implements SizeInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag__sizes';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag__sizes';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag__sizes';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Size');
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
     * Get Name.
     *
     * @return int
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }
 
    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
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
     * Get Max Size.
     *
     * @return varchar
     */
    public function getMaxSize()
    {
        return $this->getData(self::MAX_SIZE);
    }
 
    /**
     * Set Max Size.
     */
    public function setMaxSize($maxSize)
    {
        return $this->setData(self::MAX_SIZE, $maxSize);
    }
 
    /**
     * Get Timestamps.
     *
     * @return varchar
     */
    public function getTimestamps()
    {
        return $this->getData(self::TIMESTAMPS);
    }
 
    /**
     * Set Timestamps.
     */
    public function setTimestamps($timestamps)
    {
        return $this->setData(self::TIMESTAMPS, $timestamps);
    }
}
