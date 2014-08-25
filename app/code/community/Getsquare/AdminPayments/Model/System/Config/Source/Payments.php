<?php
/**
 * @package     Getsquare_AdminPayments
 * @author      Getsquare magento@getsquare.co.uk
 * @copyright   2014 GetSquare
 */
class Getsquare_AdminPayments_Model_System_Config_Source_Payments
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $methods = Mage::helper('payment')->getPaymentMethods();
        foreach ($methods as $methodCode => $methodData) {
            $methodInstance = Mage::getModel($methodData['model']);
            if(!$methodInstance) {
                continue;
            }
            if($methodInstance->canUseInternal()) {
                $internalMethods[] = array(
                    'value' => $methodInstance->getCode(),
                    'label' => $methodInstance->getTitle()
                );
            }
        }
        return $internalMethods;
    }

}