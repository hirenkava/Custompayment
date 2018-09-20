<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hirenkava\Custompayment\Api\Data;

/**
 * Interface PaymentInterface
 * @api
 */
interface PaymentInterface extends \Magento\Quote\Api\Data\PaymentInterface
{
    /**#@+
     * Constants defined for keys of array, makes typos less likely
     */
    const KEY_E_VOUCHER = 'evoucher';

    const KEY_VOUCHER_NUMBER = 'voucher_amount';

    /**#@-*/

    /**
     * Get eVoucher
     *
     * @return string|null
     */
    public function getEvoucher();

    /**
     * Set eVoucher
     *
     * @param string $eVoucher
     * @return $this
     */
    public function setEvoucher($eVoucher);

    /**
     * Get payment method code
     *
     * @return string
     */
    public function getVoucherAmount();

    /**
     * Set voucherAmount
     *
     * @param string $voucherAmount
     * @return $this
     */
    public function setVoucherAmount($voucherAmount);
}
