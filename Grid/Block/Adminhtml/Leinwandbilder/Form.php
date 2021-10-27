<?php
/**
 * ArtGalerie_Grid Add New Row Form Admin Block.
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */
namespace ArtGalerie\Grid\Block\Adminhtml\Leinwandbilder\Edit;
 
 
/**
 * Adminhtml Add New License Form.
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
                ['legend' => __('Edit Leinwand Bilder'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add New Leinwand Bilder'), 'class' => 'fieldset-wide']
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
            'm_fg_material',
            'text',
            [
                'name' => 'm_fg_material',
                'label' => __('FG Material'),
                'id' => 'm_fg_material',
                'title' => __('FG Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_fg_work',
            'text',
            [
                'name' => 'm_fg_work',
                'label' => __('FG Work'),
                'id' => 'm_fg_work',
                'title' => __('FG Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_wg_material',
            'text',
            [
                'name' => 'm_wg_material',
                'label' => __('WG Material'),
                'id' => 'm_wg_material',
                'title' => __('WG Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'm_wg_work',
            'text',
            [
                'name' => 'm_wg_work',
                'label' => __('WG Work'),
                'id' => 'm_wg_work',
                'title' => __('WG Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'mo_stretcher_frame_x1_material',
            'text',
            [
                'name' => 'mo_stretcher_frame_x1_material',
                'label' => __('Stretcher Frame X1 Material'),
                'id' => 'mo_stretcher_frame_x1_material',
                'title' => __('Stretcher Frame X1 Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'mo_stretcher_frame_x2_material',
            'text',
            [
                'name' => 'mo_stretcher_frame_x2_material',
                'label' => __('Stretcher Frame X2 Material'),
                'id' => 'mo_stretcher_frame_x2_material',
                'title' => __('Stretcher Frame X2 Material'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'mo_stretcher_frame_work',
            'text',
            [
                'name' => 'mo_stretcher_frame_work',
                'label' => __('Stretcher Frame Work'),
                'id' => 'mo_stretcher_frame_work',
                'title' => __('Stretcher Frame Work'),
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