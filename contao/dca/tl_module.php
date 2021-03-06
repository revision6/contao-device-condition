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

// Palettes
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] =
    array('Revision6\DeviceCondition\Backend\OnloadCallback', 'appendModulePalettes');

// Operations
$GLOBALS['TL_DCA']['tl_module']['list']['operations']['device_condition']['button_callback'] =
    array('Revision6\DeviceCondition\Backend\ListView', 'generateDeviceConditionConfiguration');

// Fields
$GLOBALS['TL_DCA']['tl_module']['fields']['device_condition'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['device_condition'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'options'   => array('desktop', 'mobile'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['device_condition'],
    'eval'      => array(
        'tl_class' => 'w50 clr',
        'multiple' => true,
    ),
    'sql'       => "blob NOT NULL",
);