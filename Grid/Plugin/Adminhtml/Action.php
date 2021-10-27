<?php
namespace ArtGalerie\Grid\Plugin\Adminhtml;
 
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\Url;

class Action {
    /** Url path */
    const ROW_EDIT_URL = 'grid/grid/addrow';

    protected $urlBuilder;
    protected $context;

    /**
     * @var string
     */
    private $_editUrl;

    public function __construct(
    ContextInterface $context, Url $urlBuilder, $editUrl = self::ROW_EDIT_URL
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->context = $context;
        $this->_editUrl = $editUrl;
    }
    public function afterPrepareDataSource($action, $result) {
            if (isset($result['data']['items'])) {
                $storeId = $this->context->getFilterParam('store_id');
                 foreach ($result['data']['items'] as &$item) {
                $item[$action->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl($this->_editUrl, ['id' => $item['frame_id'], '_nosid' => true]),
                    'label' => __('Edit'),
                ];
                }
            }   
        return $result;
    }
}