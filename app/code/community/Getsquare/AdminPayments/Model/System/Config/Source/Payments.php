<?php

class Getsquare_Adminpayments_Model_System_Config_Source_Payments
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $methods = Mage::helper('payment')->getStoreMethods();
        $internalMethods = array();
        foreach ($methods as $method) {
            if($method->canUseInternal()) {
                $internalMethods[] = array(
                    'value' => $method->getCode(),
                    'label' => $method->getTitle()
                );
            }
        }
        return $internalMethods;
    }

}