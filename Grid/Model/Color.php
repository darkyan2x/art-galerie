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
 
use ArtGalerie\Grid\Api\Data\ColorInterface;
 
class Color extends \Magento\Framework\Model\AbstractModel implements ColorInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag_color';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag_color';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag_color';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Color');
    }
    /**
     * Get ColorId.
     *
     * @return int
     */
    public function getColorId()
    {
        return $this->getData(self::COLOR_ID);
    }
 
    /**
     * Set ColorId.
     */
    public function setColorId($colorId)
    {
        return $this->setData(self::COLOR_ID, $colorId);
    }
 
    /**
     * Get Color.
     *
     * @return varchar
     */
    public function getColor()
    {
        return $this->getData(self::COLOR);
    }
 
    /**
     * Set Color.
     */
    public function setColor($color)
    {
        return $this->setData(self::COLOR, $color);
    }
  
    /**
     * Get PublishDate.
     *
     * @return varchar
     */
    public function getPublishDate()
    {
        return $this->getData(self::PUBLISH_DATE);
    }
 
    /**
     * Set PublishDate.
     */
    public function setPublishDate($publishDate)
    {
        return $this->setData(self::PUBLISH_DATE, $publishDate);
    }
 
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }
 
    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
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
