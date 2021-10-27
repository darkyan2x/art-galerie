<?php
/**
 * ArtGalerie_Grid Status Options Model.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model;
use Magento\Framework\Data\OptionSourceInterface;
 
class FrameKlassen implements OptionSourceInterface
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        
        $klassen = "SELECT * FROM `ag__klassen`";
        $results = $connection->fetchAll($klassen);

        $options = ['0' => __('No klassen')];
        $klassen_array = array();
        foreach ($results as $klassen) {
           $options[$klassen['id']] = __($klassen['name']);
        }
       
        return $options;
    }
 
    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }
 
    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }
 
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}