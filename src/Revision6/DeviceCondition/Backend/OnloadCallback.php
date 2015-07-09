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
     */
    public function appendContentPalettes()
    {
        $this->appendPalettes();
    }

    /**
     * Append all current module palettes with the device-condition field.
     */
    public function appendModulePalettes()
    {
        $this->appendPalettes();
    }

    /**
     * Append all current palettes with the device-condition field.
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function appendPalettes()
    {
        foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $palette => $config) {
            if ($palette != '__selector__') {
                $GLOBALS['TL_DCA']['tl_content']['palettes'][$palette] .= ';{device_condition_legend},device_condition';
            }
        }
    }
}
