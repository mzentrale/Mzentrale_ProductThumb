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
 * Product Image Grid Renderer
 *
 * @category    Mzentrale
 * @package     Mzentrale_ProductThumb
 * @author      Francesco Marangi | mzentrale
 */
class Mzentrale_ProductThumb_Block_Adminhtml_Grid_Renderer_ProductImage extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    /**
     * Render product image using catalog image helper
     * 
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $value = '';
        $index = $this->getColumn()->getIndex();
        if ($row->getData($index) && 'no_selection' != $row->getData($index)) {
            try {
                $size = 65;
                if ($this->getColumn()->getWidth()) {
                    // On every column 4px padding are applied on both sides -
                    // the image is scaled accordingly
                    $size = $this->getColumn()->getWidth() - 10;
                }
                $name = $this->escapeHtml($row->getName());
                $src = Mage::helper('catalog/image')->init($row, $index)->resize($size);
                $value = sprintf('<img src="%s" alt="%s" width="%d" height="%d" />', $src, $name, $size, $size);
            } catch (Exception $e) {
                // An empty string will be returned...
            }
        }
        return $value;
    }
}
