<?php

class Getsquare_Adminpayments_Model_Observer
{
    public function check(Varien_Event_Observer $observer)
    {
        $methodInstance = $observer->getEvent();
        $paymentMethod = $methodInstance->getMethodInstance();
        $result = $observer->getResult();
        $config = Mage::getStoreConfig('adminpayments/general/active');
        $adminPayments = explode(',',$config);
        if (in_array($paymentMethod->getCode(), $adminPayments)
                && false == $result->isAvailable) {
                $result->isAvailable = true;
        }
    }
}