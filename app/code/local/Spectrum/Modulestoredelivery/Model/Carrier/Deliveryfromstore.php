<?php  
    class Spectrum_Modulestoredelivery_Model_Carrier_Deliveryfromstore     
		extends Mage_Shipping_Model_Carrier_Abstract
		implements Mage_Shipping_Model_Carrier_Interface
	{  
        protected $_code = 'deliveryfromstore';  
      
        /** 
        * Collect rates for this shipping method based on information in $request 
        * 
        * @param Mage_Shipping_Model_Rate_Request $data 
        * @return Mage_Shipping_Model_Rate_Result 
        */  
        public function collectRates(Mage_Shipping_Model_Rate_Request $request){  
            $result = Mage::getModel('shipping/rate_result');  
            $method = Mage::getModel('shipping/rate_result_method');  
            $method->setCarrier($this->_code);  
            $method->setCarrierTitle($this->getConfigData('title'));
            $method->setMethod($this->_code);  
            $method->setMethodTitle($this->getConfigData('name'));
		    $method->setPrice('10.00');
			$method->setCost('10.00');
            $result->append($method);  
            return $result;  
        }  

		/**
		 * Get allowed shipping methods
		 *
		 * @return array
		 */
		public function getAllowedMethods()
		{
			return array($this->_code=>$this->getConfigData('name'));
		}
    }  
