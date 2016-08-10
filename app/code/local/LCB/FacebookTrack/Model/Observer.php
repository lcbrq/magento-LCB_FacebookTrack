<?php

/**
 * Basic Facebook pixel tracking module with OnePageCheckout support 
 *
 * @category   LCB
 * @package    LCB_FacebookTrack
 * @author     Silpion Tomasz Gregorczyk <tom@leftcurlybracket.com>
 */
class LCB_FacebookTrack_Model_Observer {

    public function addedProductToCart($observer)
    {

        $product = $observer->getEvent()->getQuoteItem()->getProduct();

        if (!$product->getId()) {
            return;
        }

        $queue = Mage::getModel('core/session')->getProductsAddedToCart();

        $queue[] = new Varien_Object(array(
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'final_price' => $product->getFinalPrice()
        ));

        Mage::getModel('core/session')->setProductsAddedToCart(
                $queue
        );
    }

}
