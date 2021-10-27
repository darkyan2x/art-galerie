<?php
 
/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Controller\Adminhtml\Aludibondbilder;
 
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \ArtGalerie\Grid\Model\ColorFactory
     */
    var $colorFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \ArtGalerie\Grid\Model\ColorFactory $colorFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \ArtGalerie\Grid\Model\AluDibondBilderFactory $aludibondbilderFactory
    ) {
        parent::__construct($context);
        $this->aludibondbilderFactory = $aludibondbilderFactory;
    }
 
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/aludibondbilder/addnewaludibondbilder');
            return;
        }
        try {
            $rowData = $this->colorFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setColorId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Alu-Dibond bilder has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/aludibondbilder');
    }
 
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ArtGalerie_Grid::aludibondbilder/save');
    }
}