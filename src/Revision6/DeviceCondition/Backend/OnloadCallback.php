<?php

/**
 * The Contao Device Condition extension allows you to display content elements based on device type.
 *
 * PHP version 5
 *
 * @package    DeviceCondition
 * @author     Christopher Boelter <c.boelter@revision6.de>
 * @copyright  revision6 GmbH
 * @license    LGPL.
 * @filesource
 */

namespace Revision6\DeviceCondition\Backend;

use Contao\Input;

/**
 * Class OnloadCallback to handle the palette appending.
 *
 * @package Revision6\DeviceCondition\OnloadCallback
 */
class OnloadCallback
{
    /**
     * Append all current article palettes with the device-condition field.
     *
     * @return void
     */
    public function appendArticlePalettes()
    {
        $this->appendPalettes('tl_article');
    }

    /**
     * Append all current content palettes with the device-condition field.
     *
     * @return void
     */
    public function appendContentPalettes()
    {
        $this->appendPalettes('tl_content');
    }

    /**
     * Append all current module palettes with the device-condition field.
     *
     * @return void
     */
    public function appendModulePalettes()
    {
        $this->appendPalettes('tl_module');
    }

    /**
     * Append all current palettes with the device-condition field.
     *
     * @param string $table The current table.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function appendPalettes($table)
    {
        if (!is_array($GLOBALS['TL_DCA'][$table]['palettes'])
            || (!Input::get('do') == 'article'
                || !Input::get('do') == 'postmanager'
                || Input::get('task') == 'indexmanager')
        ) {
            return;
        }

        foreach (array_keys($GLOBALS['TL_DCA'][$table]['palettes']) as $palette) {
            if ($palette != '__selector__') {
                $GLOBALS['TL_DCA'][$table]['palettes'][$palette] .= ';{device_condition_legend},device_condition';
            }
        }
    }
}
