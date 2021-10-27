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
 
use ArtGalerie\Grid\Api\Data\GridInterface;
 
class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag_frames';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag_frames';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag_frames';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Grid');
    }
    /**
     * Get FrameId.
     *
     * @return int
     */
    public function getFrameId()
    {
        return $this->getData(self::FRAME_ID);
    }
 
    /**
     * Set FrameId.
     */
    public function setFrameId($frameId)
    {
        return $this->setData(self::FRAME_ID, $frameId);
    }

    /**
     * Get FrameName.
     *
     * @return varchar
     */
    public function getFrameName()
    {
        return $this->getData(self::FRAME_NAME);
    }
 
    /**
     * Set FrameName.
     */
    public function setFrameName($frameName)
    {
        return $this->setData(self::FRAME_NAME, $frameName);
    }
 
    /**
     * Get MaterialType.
     *
     * @return varchar
     */
    public function getMaterialType()
    {
        return $this->getData(self::MATERIAL_TYPE);
    }
 
    /**
     * Set MaterialType.
     */
    public function setMaterialType($material_type)
    {
        return $this->setData(self::MATERIAL_TYPE, $material_type);
    }
 
    /**
     * Get getThickness.
     *
     * @return varchar
     */
    public function getThickness()
    {
        return $this->getData(self::THICKNESS);
    }
 
    /**
     * Set Thickness.
     */
    public function setThickness($thickness)
    {
        return $this->setData(self::THICKNESS, $thickness);
    }

    /**
     * Get getWeight.
     *
     * @return varchar
     */
    public function getWeight()
    {
        return $this->getData(self::WEIGHT);
    }
 
    /**
     * Set Weight.
     */
    public function setWeight($weight)
    {
        return $this->setData(self::WEIGHT, $weight);
    }

      /**
     * Get getFrameImage.
     *
     * @return varchar
     */
    public function getFrameImage()
    {
        return $this->getData(self::FRAME_IMAGE);
    }
 
    /**
     * Set Content.
     */
    public function setFrameImage($frame_image)
    {
        return $this->setData(self::FRAME_IMAGE, $frame_image);
    }

    /**
     * Get getFrameEdge.
     *
     * @return varchar
     */
    public function getFrameEdge()
    {
        return $this->getData(self::FRAME_EDGE);
    }
 
    /**
     * Set Content.
     */
    public function setFrameEdge($frame_edge)
    {
        return $this->setData(self::FRAME_EDGE, $frame_edge);
    }

     /**
     * Get getPrice.
     *
     * @return varchar
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }
 
    /**
     * Set Price.
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
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
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }
 
    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
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

    /**
     * Get Style ID.
     *
     * @return int
     */
    public function getStyleId()
    {
        return $this->getData(self::STYLE_ID);
    }
 
    /**
     * Set Style ID.
     */
    public function setStyleId($styleId)
    {
        return $this->setData(self::STYLE_ID, $styleId);
    }

    /**
     * Get Color ID.
     *
     * @return int
     */
    public function getColorId()
    {
        return $this->getData(self::COLOR_ID);
    }
 
    /**
     * Set Color ID.
     */
    public function setColorId($colorId)
    {
        return $this->setData(self::COLOR_ID, $colorId);
    }

    /**
     * Get Width.
     *
     * @return int
     */
    public function getWidthId()
    {
        return $this->getData(self::WIDTH_ID);
    }
 
    /**
     * Set Width.
     */
    public function setWidthId($widthId)
    {
        return $this->setData(self::WIDTH_ID, $widthId);
    }

    /**
     * Get Category ID.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }
 
    /**
     * Set Category ID.
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(self::CATEGORY_ID, $categoryId);
    }

    /**
     * Get Description.
     *
     * @return int
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }
 
    /**
     * Set Description.
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get Highlight.
     *
     * @return varchar
     */
    public function getHighlight()
    {
        return $this->getData(self::HIGHLIGHT);
    }
 
    /**
     * Set Highlight.
     */
    public function setHighlight($highlight)
    {
        return $this->setData(self::HIGHLIGHT, $highlight);
    }
}
