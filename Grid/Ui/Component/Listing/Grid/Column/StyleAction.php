<?php
/**
 * Copyright © Emipro Technologies Pvt Ltd. All rights reserved.
 * @license http://shop.emiprotechnologies.com/license-agreement/
 */

namespace ArtGalerie\Grid\Ui\Component\Listing\Grid\Column;

class StyleAction extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $urlBuilder;

    const URL_EDIT_PATH = 'grid/style/addnewstyle';

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['style_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT_PATH,
                                [
                                    'id' => $item['style_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
