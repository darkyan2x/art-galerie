<?php
/**
 * Copyright © Emipro Technologies Pvt Ltd. All rights reserved.
 * @license http://shop.emiprotechnologies.com/license-agreement/
 */
namespace ArtGalerie\Frames\Model;

use Magento\Framework\Model\AbstractModel;
use ArtGalerie\Frames\Model\ResourceModel\Frames as FramesResourceModel;

class Frames extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(FramesResourceModel::class);
    }
}
