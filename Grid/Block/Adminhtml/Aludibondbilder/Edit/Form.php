<?php
/**
 * ArtGalerie_Grid Add New Row Form Admin Block.
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */
namespace ArtGalerie\Grid\Block\Adminhtml\Aludibondbilder\Edit;
 
 
/**
 * Adminhtml Add New Color Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
 
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \ArtGalerie\Grid\Model\Status $options,
        \ArtGalerie\Grid\Model\SizesArray $sizes,
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_sizes = $sizes;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form', 
                            'enctype' => 'multipart/form-data', 
                            'action' => $this->getData('action'), 
                            'method' => 'post'
                        ]
            ]
        );
 
        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Alu-Dibond Bilder'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __(''), 'class' => 'fieldset-wide']
            );
        }
 
        $fieldset->addField(
            'size_id',
            'select',
            [
                'name' => 'size_id',
                'label' => __('Size'),
                'id' => 'size_id',
                'title' => __('Size'),
                'values' => $this->_sizes->getOptionArray(),
                'class' => 'size',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_backplate_material',
            'text',
            [
                'name' => 'm_backplate_material',
                'label' => __('Backplate Material'),
                'id' => 'backplate_material',
                'title' => __('Backplate Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_backplate_work',
            'text',
            [
                'name' => 'm_backplate_work',
                'label' => __('Backplate Work'),
                'id' => 'backplate_work',
                'title' => __('Backplate Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_mounting_material',
            'text',
            [
                'name' => 'm_mounting_material',
                'label' => __('Mounting Material'),
                'id' => 'm_mounting_material',
                'title' => __('Mounting Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_mounting_work',
            'text',
            [
                'name' => 'm_mounting_work',
                'label' => __('Mounting Work'),
                'id' => 'm_mounting_work',
                'title' => __('Mounting Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
      
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }

    
}