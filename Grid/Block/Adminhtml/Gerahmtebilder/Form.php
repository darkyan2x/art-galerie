<?php
/**
 * ArtGalerie_Grid Add New Row Form Admin Block.
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */
namespace ArtGalerie\Grid\Block\Adminhtml\GerahmteBilder\Edit;
 
 
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
                ['legend' => __('Edit Gerahmte Bilder'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add New Gerahmte Bilder'), 'class' => 'fieldset-wide']
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
            'o_surface_uv_matte',
            'text',
            [
                'name' => 'o_surface_uv_matte',
                'label' => __('Surface UV Matte'),
                'id' => 'surface_uv_matte',
                'title' => __('Surface UV Matte'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_surface_uv_antireflex',
            'text',
            [
                'name' => 'o_surface_uv_antireflex',
                'label' => __('Surface UV Anti Reflex'),
                'id' => 'surface_uv_antireflex',
                'title' => __('Surface UV Anti Reflex'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_surface_uv_work',
            'text',
            [
                'name' => 'o_surface_uv_work',
                'label' => __('Surface UV Work'),
                'id' => 'surface_uv_work',
                'title' => __('Surface UV Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_surface_plexi_normal',
            'text',
            [
                'name' => 'o_surface_plexi_normal',
                'label' => __('Surface Plexi Normal'),
                'id' => 'surface_plexi_normal',
                'title' => __('Surface Plexi Normal'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_surface_plexi_glossy',
            'text',
            [
                'name' => 'o_surface_plexi_glossy',
                'label' => __('Surface Plexi Glossy'),
                'id' => 'surface_plexi_glossy',
                'title' => __('Surface Plexi Glossy'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_surface_plexi_work',
            'text',
            [
                'name' => 'o_surface_plexi_work',
                'label' => __('Surface Plexi Work'),
                'id' => 'surface_plexi_work',
                'title' => __('Surface Plexi Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_passepartout_material_7cm',
            'text',
            [
                'name' => 'o_passepartout_material_7cm',
                'label' => __('Passepartout Material 7cm'),
                'id' => 'passepartout_material_7cm',
                'title' => __('Passepartout Material 7cm'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_passepartout_material_10cm',
            'text',
            [
                'name' => 'o_passepartout_material_10cm',
                'label' => __('Passepartout Material 10cm'),
                'id' => 'passepartout_material_10cm',
                'title' => __('Passepartout Material 10cm'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'o_passepartout_work',
            'text',
            [
                'name' => 'o_passepartout_work',
                'label' => __('Passepartout Work'),
                'id' => 'passepartout_work',
                'title' => __('Passepartout Work'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'updated_at',
            'text',
            [
                'title'    => __('Updated At'),
                'name'     => 'updated_at',
                'required' => false,
                'class' => 'hidden',
                'value' => '<?php echo date("Y-m-d H:i:s") ?>',
            ]
        );
        $fieldset->addField(
            'created_at',
            'text',
            [
                'title'    => __('Created At'),
                'name'     => 'created_at',
                'required' => false,
                'class' => 'hidden',
                'value' => '<?php echo date("Y-m-d H:i:s") ?>',
            ]
        );
      
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
}