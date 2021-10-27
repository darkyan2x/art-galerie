<?php
 
/**
 * Grid Grid Collection.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model\ResourceModel\License;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'license_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\License', 'ArtGalerie\Grid\Model\ResourceModel\License');
    }
}