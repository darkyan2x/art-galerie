<?php 
namespace ArtGalerie\AgShipping\Block;

class AllShippingMethods extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Shipping\Model\Config\Source\Allmethods $shippingAllmethods,
        array $data = []
    ) {
        $this->shippingAllmethods = $shippingAllmethods;
        parent::__construct($context, $data);
    }
 
    /**
     * All Shipping Method in Magento 2 System
     *
     * @return Array
     */
    public function getAllShippingMethods()
    {
        return $this->shippingAllmethods->toOptionArray();
    }
}