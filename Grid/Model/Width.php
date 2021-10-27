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
 
use ArtGalerie\Grid\Api\Data\WidthInterface;
 
class Width extends \Magento\Framework\Model\AbstractModel implements WidthInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag_width';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag_width';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag_width';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Width');
    }
    /**
     * Get WidthId.
     *
     * @return int
     */
    public function getWidthId()
    {
        return $this->getData(self::WIDTH_ID);
    }
 
    /**
     * Set WidthId.
     */
    public function setWidthId($widthId)
    {
        return $this->setData(self::WIDTH_ID, $widthId);
    }
 
    /**
     * Get Width.
     *
     * @return varchar
     */
    public function getWidth()
    {
        return $this->getData(self::WIDTH);
    }
 
    /**
     * Set Width.
     */
    public function setWidth($width)
    {
        return $this->setData(self::WIDTH, $width);
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
