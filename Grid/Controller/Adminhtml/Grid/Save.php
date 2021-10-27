<?php
 
/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  ArtGalerie
 * @package   ArtGalerie_Grid
 * @author    ArtGalerie
 * @copyright Copyright (c) 2010-2017 ArtGalerie Software Private Limited (http://ag.avidel.de/)
 * @license   http://ag.avidel.de/license.html
 */
namespace ArtGalerie\Grid\Controller\Adminhtml\Grid;

use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \ArtGalerie\Grid\Model\GridFactory
     */
    var $gridFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \ArtGalerie\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \ArtGalerie\Grid\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }
 
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
            if(isset($data['frame_image']) && isset($data['frame_edge'])){
                $data['frame_image'] = $data['frame_image']['value'];
                $data['frame_edge'] = $data['frame_edge']['value'];
            }
            $rowData->setData($data);
            if ($data['id'] != '') {
                $rowData->setFrameId($data['id']);
            } else {
                $rowData->setEntityId($data['id']);
            }

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

            $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
            $mediaPath  =   $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
            $media  =  $mediaPath ;

            
            $file_name = rand().$_FILES['frame_image']['name'];
            $file_size =$_FILES['frame_image']['size'];
            $file_tmp =$_FILES['frame_image']['tmp_name'];
            $file_type=$_FILES['frame_image']['type'];
            if(move_uploaded_file($file_tmp,$media.$file_name)){
                $rowData->setFrameImage($file_name);
            }

            $frame_edge = rand().$_FILES['frame_edge']['name'];
            $frame_edge_size =$_FILES['frame_edge']['size'];
            $frame_edge_tmp =$_FILES['frame_edge']['tmp_name'];
            $frame_edge_type=$_FILES['frame_edge']['type'];
            if(move_uploaded_file($frame_edge_tmp,$media.$frame_edge)){
                $rowData->setFrameEdge($frame_edge);
            }

            $rowData->save();
            $this->messageManager->addSuccess(__('Frame has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }
 
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ArtGalerie_Grid::save');
    }
}