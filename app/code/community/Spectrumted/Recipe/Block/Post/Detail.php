<?php

/**
 * Spectrumted (Neo Industries Pty Ltd)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to Neo Industries Pty LTD Non-Distributable Software Modification License (NDSML)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.spectrumted.com/legal/licenses/NDSM.html
 * If the license is not included with the package or for any other reason, 
 * you did not receive your licence please send an email to 
 * license@spectrumted.com so we can send you a copy immediately.
 *
 * This software comes with no warrenty of any kind. By Using this software, the user agrees to hold 
 * Neo Industries Pty Ltd harmless of any damage it may cause.
 *
 * @category    modules
 * @module      Spectrumted_Recipe
 * @copyright   Copyright (c) 2011 Neo Industries Pty Ltd (http://www.spectrumted.com)
 * @license     http://www.spectrumted.com/  Non-Distributable Software Modification License(NDSML 1.0)
 */
class Spectrumted_Recipe_Block_Post_Detail
extends Mage_Core_Block_Template 
implements Mage_Widget_Block_Interface
{	
    function _construct(){
        $this->setTemplate('spectrumted/recipe/post/detail.phtml');
        //$this->addData(array(
        //    'cache_lifetime' => 1500,
        //    'cache_tags' => array(Spectrumted_Recipe_Model_Post::CACHE_TAG, Spectrumted_Recipe_Model_Category::CACHE_TAG),
        //));
    }
    //public function getCacheKeyInfo()
    //{
    //    $cacheKeyInfo = array(
    //            'BLOCK_TPL',
    //            Mage::app()->getStore()->getCode(),
    //            $this->getTemplateFile(),
    //            'template' => $this->getTemplate()
    //        );
    //     if ($this->getPostId()) {
    //        $cacheKeyInfo[] = $this->getPostId();
    //     }
    //     $cacheKeyInfo[] = Mage::getSingleton('customer/session')->getCustomerGroupId();
    //     return $cacheKeyInfo;
    //}  

    function getPost(){
        if (Mage::registry('current_post') == NULL){
            if ($this->getPostId() != NULL){
                Mage::register('current_post', Mage::getModel('spectrumted_recipe/post')->load($this->getPostId()));
            }
        }
        return Mage::registry('current_post');
    }
    

}