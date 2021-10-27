<?php

namespace ArtGalerie\AgDataRequests\Controller\Categories;

class Tree extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $block = $resultPage->getLayout()
                ->createBlock('Magento\Theme\Block\Html\Topmenu')
                ->setTemplate('ArtGalerie_AgDataRequests::index.phtml')
                ->toHtml();
        echo $block;
    }
}
