<?php
/**
 * Copyright © Emipro Technologies Pvt Ltd. All rights reserved.
 * @license http://shop.emiprotechnologies.com/license-agreement/
 */

namespace ArtGalerie\Frames\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Frames extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('ag_frames', 'frame_id');
    }
}
