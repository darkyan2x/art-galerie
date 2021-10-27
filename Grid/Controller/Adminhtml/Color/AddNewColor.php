<?php
/**
 * ArtGalerie Grid List Controller.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 ArtGalerie Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Controller\Adminhtml\Color;
 
use Magento\Framework\Controller\ResultFactory;
 
class AddNewColor extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;
 
    /**
     * @var \ArtGalerie\Grid\Model\ColorFactory
     */
    private $colorFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \ArtGalerie\Grid\Model\colorFactory $colorFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \ArtGalerie\Grid\Model\ColorFactory $colorFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->colorFactory = $colorFactory;
    }
 
    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->colorFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
           $rowData = $rowData->load($rowId);
           $rowTitle = $rowData->getColor();
           if (!$rowData->getColorId()) {
               $this->messageManager->addError(__('row data no longer exist.'));
               $this->_redirect('grid/color');
               return;
           }
       }
 
       $this->coreRegistry->register('row_data', $rowData);
       $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       $title = $rowId ? __('').$rowTitle : __('Add New Color');
       $resultPage->getConfig()->getTitle()->prepend($title);
       return $resultPage;
    }
 
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ArtGalerie_Grid::color');
    }
}