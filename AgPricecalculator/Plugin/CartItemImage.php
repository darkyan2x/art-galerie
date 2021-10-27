<?php
namespace ArtGalerie\AgPricecalculator\Plugin;

class CartItemImage
{
    /**
     * Override cart image, if designer product
     *
     * @param \Magento\Checkout\Block\Cart\Item\Renderer $subject
     * @param \Magento\Catalog\Block\Product\Image $result
     * @see \Magento\Checkout\Block\Cart\Item\Renderer::getImage
     */
    public function afterGetImage(\Magento\Checkout\Block\Cart\Item\Renderer $subject, $result)
    {
    $item = $subject->getItem();

    $optionId = $this->options->getDesignerCodeOptionId($subject->getProduct());
    $designCode = $item->getOptionByCode('option_' . $optionId)->getValue();
    $design = $this->design->getByDesignCode($designCode);

    $previewImageUrl = $design->getData('preview_image_url');

    if(isset($_POST['configuration_image'])){
        $result->setImageUrl($_POST['configuration_image']);
    }

    return $result;

    }
}
?>