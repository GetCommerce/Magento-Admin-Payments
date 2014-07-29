<?php
/**
 * @package     Getsquare_Adminpayments
 * @author      Getsquare info@getsquare.co.uk
 * @copyright   2014 GetSquare
 */
class Getsquare_Adminpayments_Model_Observer
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
        $config = Mage::getStoreConfig('adminpayments/general/active');
        if (!$config) {
            return;
        }
        $methodInstance = $observer->getEvent();
        $paymentMethod = $methodInstance->getMethodInstance();
        $result = $observer->getResult();
        $adminPayments = explode(',', $config);
        if (in_array($paymentMethod->getCode(), $adminPayments)
                && false == $result->isAvailable) {
                $result->isAvailable = true;
        }
    }
}