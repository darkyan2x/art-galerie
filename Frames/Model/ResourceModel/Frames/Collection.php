<?php
/**
 * Copyright © Emipro Technologies Pvt Ltd. All rights reserved.
 * @license http://shop.emiprotechnologies.com/license-agreement/
 */

namespace ArtGalerie\Frames\Model\ResourceModel\Frames;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use ArtGalerie\Frames\Model\Frames as FramesModel;
use ArtGalerie\Frames\Model\ResourceModel\Frames as FramesResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            FramesModel::class,
            FramesResourceModel::class
        );
    }
}
