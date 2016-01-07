<?php

class MageProfis_CustomerNotice_Block_Config_Mapping extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{

    public function _prepareToRender()
    {
        $this->addColumn('action_name', array(
            'label' => Mage::helper('customernotice')->__('Actionname'),
            'style' => 'width:200px'
        ));
        $this->addColumn('prefix', array(
            'label' => Mage::helper('customernotice')->__('CMS-Block-Prefix'),
            'style' => 'width:200px'
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('customernotice')->__('Add');
    }

}
