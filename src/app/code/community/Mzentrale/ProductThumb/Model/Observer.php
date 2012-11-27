<?php

/*
 * The MIT License
 *
 * Copyright (c) 2012 mzentrale | eCommerce - eBusiness
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Product Thumb Event Observer
 * 
 * @category    Mzentrale
 * @package     Mzentrale_ProductThumb
 * @author      Francesco Marangi | mzentrale
 */
class Mzentrale_ProductThumb_Model_Observer
{

    /**
     * Add image attribute to product collection
     * 
     * Listens to:
     * - catalog_product_collection_load_before
     * 
     * @param Varien_Event_Observer $observer
     * @return Mzentrale_ProductThumb_Block_Observer
     */
    public function productCollectionLoadBefore(Varien_Event_Observer $observer)
    {
        if (!Mage::helper('mzprodthumb')->displayThumbs()) {
            return $this;
        }

        $collection = $observer->getEvent()->getCollection();
        if (!$collection) {
            return $this;
        }

        $handles = Mage::app()->getLayout()->getUpdate()->getHandles();
        foreach ($handles as $handle) {
            if (in_array($handle, $this->getUpdateHandles())) {
                $imageType = Mage::helper('mzprodthumb')->getImageType();
                $collection->addAttributeToSelect($imageType);
                return $this;
            }
        }

        return $this;
    }

    /**
     * Get update handles the thumbnail column is displayed on
     * 
     * Since we are displaying the product thumbnails only during two
     * specific requests - namely in product grids - there is no need
     * to update the product collection on every request. Therefore,
     * we provide a list of update handles where we need this extra
     * field. Both update handles are used in the layout XML to add
     * the extra column (see config file).
     * 
     * @return array
     */
    public function getUpdateHandles()
    {
        return array(
            'adminhtml_catalog_product_index',
            'adminhtml_catalog_product_grid'
        );
    }
}
