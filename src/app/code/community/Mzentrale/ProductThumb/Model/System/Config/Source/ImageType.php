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
 * ImageType System Config Source Model
 *
 * @category    Mzentrale
 * @package     Mzentrale_ProductThumb
 * @author      Francesco Marangi | mzentrale
 */
class Mzentrale_ProductThumb_Model_System_Config_Source_ImageType
{

    /**
     * Get available image types
     * 
     * @return array
     */
    public function toOptionArray()
    {
        $options = array();
        foreach (Mage::getModel('catalog/product')->getMediaAttributes() as $key => $value) {
            $options[] = array(
                'label' => $value->getFrontendLabel(),
                'value' => $key
            );
        }
        return $options;
    }
}
