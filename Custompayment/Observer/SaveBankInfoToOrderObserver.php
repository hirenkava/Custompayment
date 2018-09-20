<?php
namespace Hirenkava\Custompayment\Observer;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Hirenkava\Custompayment\Model\Custompayment;
class SaveBankInfoToOrderObserver implements ObserverInterface {
    protected $_inputParamsResolver;
    protected $_quoteRepository;
    protected $logger;
    protected $_state;
    public function __construct(\Magento\Quote\Model\QuoteRepository $quoteRepository, \Psr\Log\LoggerInterface $logger,\Magento\Framework\App\State $state) {
        
        $this->_quoteRepository = $quoteRepository;
        $this->logger = $logger;
        $this->_state = $state;
    }
    public function execute(EventObserver $observer) 
	{ 
	$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
	$logger = new \Zend\Log\Logger();
	$logger->addWriter($writer);
		$payment = $observer->getEvent()->getPayment();
		$logger->info($payment->getMethod());
        if ($payment->getMethod() === Custompayment::PAYMENT_METHOD_CUSTOMPAYMENT_CODE) {
			$additionalData = $payment->getAdditionalData();
			

$logger->info('---'.$additionalData['voucher_amount']);
			if(!is_null($additionalData) && isset($additionalData['evoucher'])) {
				$payment->setData(
					'evoucher',
					$additionalData['evoucher']
				);
				$payment->setData(
					'voucher_amount',
					$additionalData['voucher_amount']
				);
				$payment->setAdditionalData('');
			}
		}
       
    }
}