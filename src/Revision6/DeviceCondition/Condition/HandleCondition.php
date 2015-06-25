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

namespace Revision6\DeviceCondition\Condition;

/**
 * Class HandleCondition to handle the given conditions.
 *
 * @package Revision6\DeviceCondition
 */
class HandleCondition
{

    /**
     * Apply the conditions to the given element.
     *
     * @param object $element   The given element instance.
     * @param bool   $isVisible The current visibility state.
     *
     * @return bool
     */
    public function applyDeviceCondition($element, $isVisible)
    {
        if (!$isVisible) {
            return $isVisible;
        }

        $conditions = deserialize($element->device_condition);

        if ($conditions) {

            $isVisible = false;

            $mobileDetect = $this->getMobileDetectionService();
            foreach ($conditions as $condition) {
                $this->handleDeviceCondition($mobileDetect, $condition);
            }
        }

        return $isVisible;
    }

    /**
     * Handle the given condition.
     *
     * @param object $mobileDetect The current mobile detect instance.
     * @param string $condition    The current condition string.
     *
     * @return bool
     */
    private function handleDeviceCondition($mobileDetect, $condition)
    {
        if ($condition == 'desktop') {
            if (!$mobileDetect->isTablet() && !$mobileDetect->isMobile()) {
                return true;
            }
        }

        if ($condition == 'tablet') {
            if ($mobileDetect->isTablet()) {
                return true;
            }
        }

        if ($condition == 'mobile') {
            if ($mobileDetect->isMobile()) {
                return true;
            }
        }
    }

    /**
     * Get the mobile detection service instance.
     *
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    private function getMobileDetectionService()
    {
        return $GLOBALS['container']['mobile-detect'];
    }
}
