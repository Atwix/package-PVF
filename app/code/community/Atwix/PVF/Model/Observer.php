<?php

class Atwix_PVF_Model_Observer
{
    public function addPVFButton($observer)
    {
        $_block = $observer->getBlock();
        $_type = $_block->getType();
        if ($_type == 'adminhtml/catalog_product_edit') {
            $_deleteButton = $_block->getChild('delete_button');
            $_block->setChild('product_view_button',
                $_block->getLayout()->createBlock('atwix_pvf/adminhtml_widget_button')
            );
            $_deleteButton->setBeforeHtml($_block->getChild('product_view_button')->toHtml());
        }
    }
}