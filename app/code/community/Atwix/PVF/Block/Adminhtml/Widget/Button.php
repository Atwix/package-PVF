<?php

class Atwix_PVF_Block_Adminhtml_Widget_Button extends Mage_Adminhtml_Block_Widget_Button
{
    /**
     * @var Mage_Catalog_Model_Product Product instance
     */
    private $_product;

    /**
     * Block construct, setting data for button, getting current product
     */
    protected function _construct()
    {
        $this->_product = Mage::registry('current_product');
        parent::_construct();
        $this->setData(array(
            'label'    => Mage::helper('catalog')->__('View Product Page'),
            'onclick'  => 'window.open(\'' . Mage::getModel('core/url')->getUrl() . $this->_product->getUrlPath() . '\')',
            'disabled' => !$this->_isVisible(),
            'title'    => (!$this->_isVisible()) ?
                Mage::helper('catalog')->__('Product is not visible on frontend') :
                Mage::helper('catalog')->__('View Product Page')
        ));
    }

    /**
     * Checking product visibility
     *
     * @return bool
     */
    private function _isVisible()
    {
        return $this->_product->isVisibleInCatalog() && $this->_product->isVisibleInSiteVisibility();
    }
}
