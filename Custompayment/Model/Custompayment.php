<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hirenkava\Custompayment\Model;

/**
 * Class Custompayment
 *
 * @method \Magento\Quote\Api\Data\PaymentMethodExtensionInterface getExtensionAttributes()
 */
class Custompayment extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_CUSTOMPAYMENT_CODE = 'custompayment';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_CUSTOMPAYMENT_CODE;

    /**
     * @var string
     */
    protected $_formBlockType = 'Hirenkava\Custompayment\Block\Form\Custompayment';

    /**
     * @var string
     */
    protected $_infoBlockType = 'Hirenkava\Custompayment\Block\Info\Custompayment';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Assign data to info model instance
     *
     * @param \Magento\Framework\DataObject|mixed $data
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function assignData(\Magento\Framework\DataObject $data)
    {
		$additionalData = $data->getData('additional_data');
		if(isset($additionalData) && !empty($additionalData)) {
			$this->getInfoInstance()->setEvoucher($additionalData['evoucher']);
			$this->getInfoInstance()->setVoucherAmount($additionalData['voucher_amount']);
		}
        return $this;
    }
}
