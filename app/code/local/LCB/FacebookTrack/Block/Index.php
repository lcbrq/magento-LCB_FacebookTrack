<?php

/**
 * Basic Facebook pixel tracking module with OnePageCheckout support 
 *
 * @category   LCB
 * @package    LCB_FacebookTrack
 * @author     Silpion Tomasz Gregorczyk <tom@leftcurlybracket.com>
 */
class LCB_FacebookTrack_Block_Index extends Mage_Core_Block_Template {

    /**
     * Get ISO 639 language code
     * 
     * @return string
     */
    public function getLanguage()
    {
        return substr(Mage::app()->getLocale()->getLocaleCode(), 0, 2);
    }

    /**
     * Get tracking id
     * 
     * @return string
     */
    public function getId()
    {
        return Mage::getStoreConfig(
            'facebooktrack/general/id', Mage::app()->getStore()
        );
    }

}
