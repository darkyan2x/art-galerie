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
 
use ArtGalerie\Grid\Api\Data\StyleInterface;
 
class Style extends \Magento\Framework\Model\AbstractModel implements StyleInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag_style';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag_style';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag_style';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Style');
    }
    /**
     * Get StyleId.
     *
     * @return int
     */
    public function getStyleId()
    {
        return $this->getData(self::STYLE_ID);
    }
 
    /**
     * Set StyleId.
     */
    public function setStyleId($styleId)
    {
        return $this->setData(self::STYLE_ID, $styleId);
    }
 
    /**
     * Get Style.
     *
     * @return varchar
     */
    public function getStyle()
    {
        return $this->getData(self::STYLE);
    }
 
    /**
     * Set Style.
     */
    public function setStyle($style)
    {
        return $this->setData(self::STYLE, $style);
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
