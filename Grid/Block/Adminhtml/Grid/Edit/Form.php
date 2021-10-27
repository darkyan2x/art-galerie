<?php
/**
 * ArtGalerie_Grid Add New Row Form Admin Block.
 * @category    ArtGalerie
 * @package     ArtGalerie_Grid
 * @author      ArtGalerie Software Private Limited
 *
 */
namespace ArtGalerie\Grid\Block\Adminhtml\Grid\Edit;
 
 
/**
 * Adminhtml Add New Row Form.
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
        \ArtGalerie\Grid\Model\Categories $categories,
        \ArtGalerie\Grid\Model\Highlight $highlight,
        \ArtGalerie\Grid\Model\FrameStyle $style,
        \ArtGalerie\Grid\Model\FrameColor $color,
        \ArtGalerie\Grid\Model\FrameMateriale $materiale,
        \ArtGalerie\Grid\Model\FrameKlassen $klassen,
        \ArtGalerie\Grid\Model\FrameType $frameType,
        \ArtGalerie\Grid\Model\CanvasAvailability $canvasAvailability,
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_categories = $categories;
        $this->_highlight = $highlight;
        $this->_frameType = $frameType;
        $this->_canvasAvailability = $canvasAvailability;
        $this->_style = $style;
        $this->_color = $color;
        $this->_materiale = $materiale;
        $this->_klassen = $klassen;
        $this->_wysiwygConfig = $wysiwygConfig;
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
        $id = $this->getRequest()->getParam('id');
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
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Frame'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('frame_id', 'hidden', ['name' => 'frame_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __(''), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'frame_name',
            'text',
            [
                'name' => 'frame_name',
                'label' => __('Frame Name'),
                'id' => 'frame_name',
                'title' => __('Frame Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
 
        $fieldset->addField(
            'material_type',
            'text',
            [
                'name' => 'material_type',
                'label' => __('Material Type'),
                'id' => 'material_type',
                'title' => __('Material Type'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
 
        $fieldset->addField(
            'thickness',
            'text',
            [
                'name' => 'thickness',
                'label' => __('Width (cm)'),
                'id' => 'thickness',
                'title' => __('Width (cm)'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'weight',
            'text',
            [
                'name' => 'weight',
                'label' => __('Weight'),
                'id' => 'Weight',
                'title' => __('Weight'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'frame_image',
            'image',
            [
                'name' => 'frame_image',
                'label' => __('Frame Image'),
                'title' => __('Frame Image'),
                'required'  => false,
            ]
        );

        $fieldset->addField(
            'frame_edge',
            'image',
            [
                'name' => 'frame_edge',
                'label' => __('Frame Edge'),
                'title' => __('Frame Edge'),
                'required'  => false,
            ]
        );

        $fieldset->addField(
            'price',
            'text',
            [
                'name' => 'price',
                'label' => __('Price'),
                'id' => 'price',
                'title' => __('Price'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
 
        $fieldset->addField(
            'publish_date',
            'date',
            [
                'name' => 'publish_date',
                'label' => __('Publish Date'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
            ]
        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        
        $fieldset->addField(
            'style_id',
            'select',
            [
                'name' => 'style_id',
                'label' => __('Frame Style'),
                'id' => 'style_id',
                'title' => __('Frame Style'),
                'values' => $this->_style->getOptionArray(),
                'class' => 'style',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'color_id',
            'select',
            [
                'name' => 'color_id',
                'label' => __('Frame Color'),
                'id' => 'color_id',
                'title' => __('Frame Color'),
                'values' => $this->_color->getOptionArray(),
                'class' => 'color',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'materiale_id',
            'select',
            [
                'name' => 'materiale_id',
                'label' => __('Materiale'),
                'id' => 'materiale_id',
                'title' => __('Materiale'),
                'values' => $this->_materiale->getOptionArray(),
                'class' => 'width',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'klassen_id',
            'select',
            [
                'name' => 'klassen_id',
                'label' => __('Klassen'),
                'id' => 'klassen_id',
                'title' => __('Klassen'),
                'values' => $this->_klassen->getOptionArray(),
                'class' => 'width',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'category_id',
            'select',
            [
                'name' => 'category_id',
                'label' => __('Category'),
                'id' => 'category_id',
                'title' => __('Category'),
                'values' => $this->_categories->getOptionArray(),
                'class' => 'category',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'description',
            'textarea',
            [
                'name' => 'description',
                'label' => __('Description'),
                'id' => 'description',
                'title' => __('Description'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'highlight',
            'select',
            [
                'name' => 'highlight',
                'label' => __('Highlight'),
                'id' => 'highlight',
                'title' => __('Highlight'),
                'values' => $this->_highlight->getOptionArray(),
                'class' => 'highlight',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'frame_type',
            'select',
            [
                'name' => 'frame_type',
                'label' => __('Frame Type'),
                'id' => 'frame_type',
                'title' => __('Frame Type'),
                'values' => $this->_frameType->getOptionArray(),
                'class' => 'frame_type',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'canvas_availability',
            'select',
            [
                'name' => 'canvas_availability',
                'label' => __('Canvas Availability'),
                'id' => 'canvas_availability',
                'title' => __('Canvas Availability'),
                'values' => $this->_canvasAvailability->getOptionArray(),
                'class' => 'canvas_availability',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'id',
            'text',
            [
                'title'    => __('ID'),
                'name'     => 'id',
                'required' => false,
                'class' => 'hidden'
            ]
        );
        $model->setData('id', $id);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }

    public function frame_image($value)
    {
        if (empty($value)){
            return '';
        }
        //$mediaUrl = "pub/media/frame-image/";
         $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
         $mediaUrl = $objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
         $width = 150;
        return "<img src='" . $mediaUrl .'frame-image/'. $value . "' />";
    }

    public function frame_edge($value)
    {
        if (empty($value)){
            return '';
        }
        //$mediaUrl = "pub/media/frame-image/";
         $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
         $mediaUrl = $objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
         $width = 150;
        return "<img src='" . $mediaUrl .'frame-edge/'. $value . "' />";
    }
}