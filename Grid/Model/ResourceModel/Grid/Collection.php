<?php
 
/**
 * Grid Grid Collection.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model\ResourceModel\Grid;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'frame_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\Grid', 'ArtGalerie\Grid\Model\ResourceModel\Grid');
    }
}