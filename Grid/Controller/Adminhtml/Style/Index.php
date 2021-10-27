<?php
/**
 * ArtGalerie Grid Controller
 *
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */

namespace ArtGalerie\Grid\Controller\Adminhtml\Style;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ArtGalerie_Grid::style');
        $resultPage->getConfig()->getTitle()->prepend(__('Style'));
 
        return $resultPage;
    }


}