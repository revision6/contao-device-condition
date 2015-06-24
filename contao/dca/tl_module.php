<?php

/**
 * The Contao Device Condition extension allows you to display content elements based on device type.
 *
 * PHP version 5
 *
 * @package    DeviceCondition
 * @author     Christopher Boelter <c.boelter@revision6.de>
 * @copyright  Revision6 UG
 * @license    LGPL.
 * @filesource
 */

// Palettes
foreach ($GLOBALS['TL_DCA']['tl_module']['palettes'] as $palette => $config) {
    if ($palette != '__selector__') {
        $GLOBALS['TL_DCA']['tl_module']['palettes'][$palette] .= ';{device_condition_legend},device_condition';
    }
}

// Fields
$GLOBALS['TL_DCA']['tl_module']['fields']['device_condition'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['device_condition'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'options'   => array('desktop', 'tablet', 'mobile'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['device_condition'],
    'eval'      => array(
        'tl_class' => 'w50 clr',
        'multiple' => true,
    ),
    'sql'       => "blob NOT NULL",
);