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
 
use ArtGalerie\Grid\Api\Data\MaterialeInterface;
 
class Materiale extends \Magento\Framework\Model\AbstractModel implements MaterialeInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag_materiale';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag_materiale';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag_materiale';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Materiale');
    }
    /**
     * Get MaterialeId.
     *
     * @return int
     */
    public function getMaterialeId()
    {
        return $this->getData(self::MATERIALE_ID);
    }
 
    /**
     * Set MaterialeId.
     */
    public function setMaterialeId($materialeId)
    {
        return $this->setData(self::MATERIALE_ID, $materialeId);
    }
 
    /**
     * Get Materiale.
     *
     * @return varchar
     */
    public function getMateriale()
    {
        return $this->getData(self::MATERIALE);
    }
 
    /**
     * Set Materiale.
     */
    public function setMateriale($materiale)
    {
        return $this->setData(self::MATERIALE, $materiale);
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
