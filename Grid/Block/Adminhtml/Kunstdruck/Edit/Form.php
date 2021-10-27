<?php
/**
 * ArtGalerie_Grid Add New Row Form Admin Block.
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */
namespace ArtGalerie\Grid\Block\Adminhtml\Kunstdruck\Edit;
 
 
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
                ['legend' => __('Edit Kunstdruck'), 'class' => 'fieldset-wide']
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
            'm_print_material',
            'text',
            [
                'name' => 'm_print_material',
                'label' => __('Print Material'),
                'id' => 'm_print_material',
                'title' => __('Print Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_print_work',
            'text',
            [
                'name' => 'm_print_work',
                'label' => __('Print Work'),
                'id' => 'm_print_work',
                'title' => __('Print Work'),
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