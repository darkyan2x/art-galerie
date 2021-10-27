<?php 
namespace ArtGalerie\AgPriceShowcasing\Plugin\Product\Type;

    class ConfigurablePlugin
    {
        public function afterGetUsedProductCollection(\Magento\ConfigurableProduct\Model\Product\Type\Configurable $subject, $result)
        {
            $result->addAttributeToSelect('name');
            $result->addAttributeToSelect('description');
            $result->addAttributeToSelect('price');
            return $result;
        }
    }