<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hirenkava\Custompayment\Block\Info;

class Custompayment extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_template = 'Hirenkava_Custompayment::info/custompayment.phtml';

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('Hirenkava_Custompayment::info/pdf/custompayment.phtml');
        return $this->toHtml();
    }
}
