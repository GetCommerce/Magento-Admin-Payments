<?php
/**
 * @package     Getsquare_Adminpayments
 * @author      Getsquare magento@getsquare.co.uk
 * @copyright   2014 GetSquare
 */
class Getsquare_Adminpayments_Model_System_Config_Source_Payments
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $methods = Mage::helper('payment')->getPaymentMethods();
        $internalMethods = array();
        foreach ($methods as $methodCode => $methodData) {
            if(!isset($methodData['model'])) {
                continue;
            }
            $methodInstance = Mage::getModel($methodData['model']);
            if(!$methodInstance) {
                continue;
            }
            if($methodInstance->canUseInternal()) {
                if($methodInstance->getTitle()) {
                    $label = $methodInstance->getTitle();
                } else {
                    $label = $methodInstance->getCode();
                }
                $internalMethods[] = array(
                    'value' => $methodInstance->getCode(),
                    'label' => $label
                );
            }
        }
        return $internalMethods;
    }

}