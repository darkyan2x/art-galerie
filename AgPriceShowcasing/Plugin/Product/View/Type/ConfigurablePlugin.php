<?php 

namespace ArtGalerie\AgPriceShowcasing\Plugin\Product\View\Type;

class ConfigurablePlugin
{
    protected $jsonEncoder;
    protected $jsonDecoder;

    public function __construct(
        \Magento\Framework\Json\DecoderInterface $jsonDecoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder
    ){
        $this->jsonEncoder = $jsonEncoder;
        $this->jsonDecoder = $jsonDecoder;
    }

    public function afterGetJsonConfig(\Magento\ConfigurableProduct\Block\Product\View\Type\Configurable $subject, $result)
    {
        $result = $this->jsonDecoder->decode($result);
        $currentProduct = $subject->getProduct();

        if ($currentProduct->getName()) {
            $result['productName'] = $currentProduct->getName();
        }
        if ($currentProduct->getDescription()) {
            $result['productDescription'] = $currentProduct->getDescription();
        }
        if ($currentProduct->getPrice()) {
            $result['productPrice'] = $currentProduct->getPrice();
        }

        foreach ($subject->getAllowProducts() as $product) {
            $result['names'][$product->getId()][] =
                [
                    'name' => $product->getData('name'),
                ];
            $result['descriptions'][$product->getId()][] =
                [
                    'description' => $product->getData('description'),
                ];
            $result['prices'][$product->getId()][] =
                [
                    'price' => $product->getData('price'),
                ];
        }
        return $this->jsonEncoder->encode($result);
    }
}