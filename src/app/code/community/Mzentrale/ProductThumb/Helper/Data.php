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
 * Product Thumbnail Helper Class
 *
 * @category    Mzentrale
 * @package     Mzentrale_ProductThumb
 * @author      Francesco Marangi | mzentrale
 */
class Mzentrale_ProductThumb_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_DISPLAY_THUMBS = 'admin/mzprodthumb/display_thumbs';
    const XML_PATH_IMAGE_SIZE = 'admin/mzprodthumb/image_size';
    const XML_PATH_IMAGE_TYPE = 'admin/mzprodthumb/image_type';


    /**
     * Display thumbs in product grid?
     * 
     * @return boolean
     */
    public function displayThumbs()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_DISPLAY_THUMBS);
    }

    /**
     * Get thumbnail size
     * 
     * Column width is calculated accordingly
     * 
     * @return int
     */
    public function getImageSize()
    {
        $size = (int) Mage::getStoreConfig(self::XML_PATH_IMAGE_SIZE);
        if ($size <= 0) {
            $size = 65; // Default image size, see config.xml
        }
        return $size;
    }

    /**
     * Get image type to be displayed
     * 
     * @return string
     */
    public function getImageType()
    {
        return Mage::getStoreConfig(self::XML_PATH_IMAGE_TYPE);
    }

    /**
     * Get product thumb column setup information
     * 
     * This information could have been supplied directly in the layout XML,
     * but was moved to the module helper to avoid redundancy and allow
     * for better flexibility.
     * 
     * @return array
     */
    public function getColumnData()
    {
        return array(
            'header' => Mage::helper('catalog')->__('Image'),
            'align' => 'center',
            'index' => $this->getImageType(),
            'width' => $this->getImageSize() + 10, // Column width includes padding
            'renderer' => 'mzprodthumb/adminhtml_grid_renderer_productImage'
        );
    }
}
