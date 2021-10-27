<?php
/**
 * ArtGalerie_Grid Status Options Model.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model;
use Magento\Framework\Data\OptionSourceInterface;
 
class FrameMateriale implements OptionSourceInterface
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
        
        $materiale = "SELECT * FROM `ag_materiale`";
        $results = $connection->fetchAll($materiale);

        $options = ['0' => __('No materiale')];
        $materiale_array = array();
        foreach ($results as $materiale) {
           $options[$materiale['materiale_id']] = __($materiale['materiale']);
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