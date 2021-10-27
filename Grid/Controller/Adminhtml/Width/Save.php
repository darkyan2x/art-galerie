<?php
 
/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 ArtGalerie Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Controller\Adminhtml\Width;

use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \ArtGalerie\Grid\Model\LicenseFactory
     */
    var $widthFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \ArtGalerie\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \ArtGalerie\Grid\Model\WidthFactory $widthFactory
    ) {
        parent::__construct($context);
        $this->widthFactory = $widthFactory;
    }
 
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/width/addnewwidth');
            return;
        }
        try {
            $rowData = $this->widthFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setWidthId($data['id']);
            }

            $rowData->save();
            $this->messageManager->addSuccess(__('Width has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/width');
    }
 
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ArtGalerie_Grid::width/save');
    }
}