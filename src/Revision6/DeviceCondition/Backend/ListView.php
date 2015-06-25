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

namespace Revision6\DeviceCondition\Backend;

use Contao\Controller;
use Contao\Image;

/**
 * Class ListView to handle the image display in the list views.
 *
 * @package Revision6\DeviceCondition\Backend
 */
class ListView
{
    /**
     * Generate the icons by the given conditions.
     *
     * @param array $row The current record.
     *
     * @return string
     */
    public function generateDeviceConditionConfiguration($row)
    {
        $conditions    = deserialize($row['device_condition']);
        $allConditions = array('desktop', 'tablet', 'mobile');
        $return        = '';

        Controller::loadLanguageFile('default');

        if (!$conditions) {

            foreach ($allConditions as $condition) {
                $return .= Image::getHtml(
                    '/system/modules/z_device-condition/assets/icons/' . $condition . '.png',
                    $this->getTranslationForCondition($condition)
                );
            }
        } else {

            foreach ($allConditions as $condition) {
                if (in_array($condition, $conditions)) {
                    $return .= Image::getHtml(
                        '/system/modules/z_device-condition/assets/icons/' . $condition . '.png',
                        $this->getTranslationForCondition($condition)
                    );
                } else {
                    $return .= Image::getHtml(
                        '/system/modules/z_device-condition/assets/icons/disabled/' . $condition . '.png',
                        $this->getTranslationForCondition($condition)
                    );
                }
            }
        }

        return $return;
    }

    /**
     * Tget the translation for the given condition.
     *
     * @param string $condition The given condition.
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    private function getTranslationForCondition($condition)
    {
        return $GLOBALS['TL_LANG']['device_condition'][$condition];
    }
}
