<?php

class MageProfis_CustomerNotice_Block_Notice extends Mage_Core_Block_Template
{

    protected $_notices = null;
    protected $_current_notices = null;
    protected $_mapping = null;

    /**
     * Get all static Blocks with the "notice" prefix
     * @return Object
     */
    protected function getNotices()
    {
        if (is_null($this->_notices))
        {
            $collection = Mage::getModel('cms/block')->getCollection()
                    ->addFieldToFilter('identifier', array('like' => 'notice%'))
                    ->addFieldToFilter('is_active', 1)
                    ->addOrder('update_time');
            $this->_notices = $collection;
        }
        return $this->_notices;
    }
    
    protected function getNoticeContent($notice)
    {
        $content = $notice->getContent();
        $filterModel = Mage::getModel('cms/template_filter');
        
        return $filterModel->filter($content);
    }
    
    /**
     * Get All CMS-Blocks with the mathing prefix for the current view
     * @return array
     */
    protected function getCurrentViewNotices()
    {
        if (is_null($this->_current_notices))
        {
            $current = array();
            $prefix = $this->getPrefixByActionName();

            foreach ($this->getNotices() as $notice)
            {
                $identifier = explode('_', $notice->getIdentifier());
                $identifier = $identifier[0];
                if ($identifier == 'notice')
                {
                    $current[] = $notice;
                } else if ($prefix == $identifier)
                {
                    $current[] = $notice;
                }
            }
            $this->_current_notices = $current;
        }

        return $this->_current_notices;
    }

    /**
     * Get Block Prefix by current action name.
     * @return boolean | String
     */
    protected function getPrefixByActionName()
    {
        $action = Mage::app()->getFrontController()->getAction()->getFullActionName();
        $mapping = $this->getMapping();
        if (isset($mapping[$action]))
        {
            return $mapping[$action];
        }
        return false;
    }

    /**
     * get array with Mapping of Handles and Prefixes from store config
     * @return boolean || array
     */
    protected function getMapping()
    {
        if (is_null($this->_mapping))
        {
            $setting = Mage::getStoreConfig('customernotice/general/mapping');
            $mapping = array();
            if ($setting)
            {
                $setting = unserialize($setting);
                if (is_array($setting))
                {
                    $i = 0;
                    foreach ($setting as $entry)
                    {
                        $mapping[$entry['action_name']] = $entry['prefix'];
                        $i++;
                    }
                    $this->_mapping = $mapping;
                } else
                {
                    return false;
                }
            }
        }
        return $this->_mapping;
    }

    /**
     * Only Render Block if there are Notices 
     * @return boolean | Object
     */
    protected function _toHtml()
    {
        if (count($this->getCurrentViewNotices()) > 0)
        {
            return parent::_toHtml();
        }
        return false;
    }

}
