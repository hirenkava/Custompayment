<?php

namespace Hirenkava\Custompayment\Plugin;

class QuotePaymentPlugin
{
    /**
     * @param \Magento\Quote\Model\Quote\Payment $subject
     * @param array $data
     * @return array
     */
    public function beforeImportData(\Magento\Quote\Model\Quote\Payment $subject, array $data)
    {		
        if (array_key_exists('additional_data', $data)) {
			$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
$logger = new \Zend\Log\Logger();
$logger->addWriter($writer);
$logger->info(' here ');
//$logger->info(serialize($data['additional_data']));
			$subject->setAdditionalData(serialize($data['additional_data']));
           // $subject->setEvoucher($data['additional_data']['evoucher']);
			//$subject->setVoucherAmount($data['additional_data']['voucher_amount']);
        }
//$logger->info([$data]);
        return [$data];
    }
}