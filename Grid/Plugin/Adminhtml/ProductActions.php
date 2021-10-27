<?php

namespace ArtGalerie\Grid\Plugin\Adminhtml;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\Url;
class ProductActions {
    protected $urlBuilder;
    protected $context;
    public function __construct(
    ContextInterface $context, Url $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->context = $context;
    }
    public function afterPrepareDataSource($productActions, $result) {
            if (isset($result['data']['items'])) {
                $storeId = $this->context->getFilterParam('store_id');
                 foreach ($result['data']['items'] as &$item) {
                $item[$productActions->getData('name')]['preview'] = [
                    'href' => $this->urlBuilder->getUrl('catalog/product/view', ['id' => $item['entity_id'], '_nosid' => true]),
                    'target' => '_blank',
                    'label' => __('ُPreview'),
                ];
                }
            }   
        return $result;
    }
}