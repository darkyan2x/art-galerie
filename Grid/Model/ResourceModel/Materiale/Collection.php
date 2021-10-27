<?php
 
/**
 * Grid Grid Collection.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model\ResourceModel\Materiale;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'materiale_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('ArtGalerie\Grid\Model\Materiale', 'ArtGalerie\Grid\Model\ResourceModel\Materiale');
    }
}