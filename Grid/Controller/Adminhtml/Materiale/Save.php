<?php
 
/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 ArtGalerie Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Controller\Adminhtml\Materiale;

use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \ArtGalerie\Grid\Model\LicenseFactory
     */
    var $materialeFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \ArtGalerie\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \ArtGalerie\Grid\Model\MaterialeFactory $materialeFactory
    ) {
        parent::__construct($context);
        $this->materialeFactory = $materialeFactory;
    }
 
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/materiale/addnewmateriale');
            return;
        }
        try {
            $rowData = $this->materialeFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setMaterialeId($data['id']);
            }

            $rowData->save();
            $this->messageManager->addSuccess(__('Materiale has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/materiale');
    }
 
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ArtGalerie_Grid::materiale/save');
    }
}