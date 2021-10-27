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
 
use ArtGalerie\Grid\Api\Data\KlassenInterface;
 
class Klassen extends \Magento\Framework\Model\AbstractModel implements KlassenInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ag__klassen';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'ag__klassen';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ag__klassen';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\ResourceModel\Klassen');
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
     * Get Price.
     *
     * @return int
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
