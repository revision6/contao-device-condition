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

// Hooks
$GLOBALS['TL_HOOKS']['isVisibleElement'][] =
    array('Revision6\DeviceCondition\Condition\HandleCondition', 'applyDeviceCondition');