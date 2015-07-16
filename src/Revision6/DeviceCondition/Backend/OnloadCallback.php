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

/**
 * Class OnloadCallback to handle the palette appending.
 *
 * @package Revision6\DeviceCondition\OnloadCallback
 */
class OnloadCallback
{
    /**
     * Append all current content palettes with the device-condition field.
     *
     * @return void
     */
    public function appendContentPalettes()
    {
        $this->appendPalettes();
    }

    /**
     * Append all current module palettes with the device-condition field.
     *
     * @return void
     */
    public function appendModulePalettes()
    {
        $this->appendPalettes();
    }

    /**
     * Append all current palettes with the device-condition field.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function appendPalettes()
    {
        if (!is_array($GLOBALS['TL_DCA']['tl_content']['palettes'])) {
            return;
        }

        foreach (array_keys($GLOBALS['TL_DCA']['tl_content']['palettes']) as $palette) {
            if ($palette != '__selector__') {
                $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] .= ';{device_condition_legend},device_condition';
            }
        }
    }
}
