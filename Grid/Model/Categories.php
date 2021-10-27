<?php
/**
 * ArtGalerie_Grid Status Options Model.
 * @category    ArtGalerie
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Model;
use Magento\Framework\Data\OptionSourceInterface;
 
class Categories implements OptionSourceInterface
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        // get current store’s categories 
        $categoryHelper = $objectManager->get('\Magento\Catalog\Helper\Category');
        $categories = $categoryHelper->getStoreCategories();

        $options = ['0' => __('No category')];
        $category_array = array();
        foreach ($categories as $category) {
           $options[$category->getId()] = __($category->getName());
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