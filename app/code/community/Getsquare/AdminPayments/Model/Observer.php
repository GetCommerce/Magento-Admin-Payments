<?php
/**
 * @package     Getsquare_AdminPayments
 * @author      Getsquare magento@getsquare.co.uk
 * @copyright   2014 GetSquare
 */
class Getsquare_AdminPayments_Model_Observer
{
    /**
     * Enable Payement Methods as per the the
     * store config
     * 
     * @param  Varien_Event_Observer $observer
     * @return void
     */
    public function enablePayementMethods(Varien_Event_Observer $observer)
    {
        $methodInstance = $observer->getEvent();
        $paymentMethod = $methodInstance->getMethodInstance();
        $config = Mage::getStoreConfig('adminpayments/general/active', $paymentMethod->getStore());
        if (!$config) {
            return;
        }
        $result = $observer->getResult();
        $adminPayments = explode(',', $config);
        if (in_array($paymentMethod->getCode(), $adminPayments)
                && false == $result->isAvailable) {
                $result->isAvailable = true;
        }
    }
}