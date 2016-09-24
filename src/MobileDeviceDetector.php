<?php

namespace Sinergi\BrowserDetector;

class MobileDeviceDetector implements DetectorInterface
{
    /**
     * Determine the user's mobile device.
     *
     * @param MobileDevice $mobileDevice
     * @param UserAgent $userAgent
     * @return bool
     */
    public static function detect(MobileDevice $mobileDevice, UserAgent $userAgent)
    {
        $mobileDevice->setName($mobileDevice::UNKNOWN);

        return (
            self::checkIpod($mobileDevice, $userAgent) ||
            self::checkIpad($mobileDevice, $userAgent) ||
            self::checkIphone($mobileDevice, $userAgent) ||
            self::checkWindowsPhone($mobileDevice, $userAgent) ||
            self::checkWindowsPhone($mobileDevice, $userAgent) ||
            self::checkWindowsPhone($mobileDevice, $userAgent) ||
            self::checkWindowsPhone($mobileDevice, $userAgent)
        );
    }

    /**
     * Determine if the device is iPad.
     *
     * @param MobileDevice $mobileDevice
     * @param UserAgent $userAgent
     * @return bool
     */
    private static function checkIpad(MobileDevice $mobileDevice, UserAgent $userAgent)
    {
        if (stripos($userAgent->getUserAgentString(), 'ipad') !== false) {
            $mobileDevice->setName(MobileDevice::IPAD);
            return true;
        }

        return false;
    }

    /**
     * Determine if the device is iPhone.
     *
     * @param MobileDevice $mobileDevice
     * @param UserAgent $userAgent
     * @return bool
     */
    private static function checkIphone(MobileDevice $mobileDevice, UserAgent $userAgent)
    {
        if (stripos($userAgent->getUserAgentString(), 'iphone;') !== false) {
            $mobileDevice->setName(MobileDevice::IPHONE);
            return true;
        }

        return false;
    }

    /**
     * Determine if the device is Windows Phone.
     *
     * @param MobileDevice $mobileDevice
     * @param UserAgent $userAgent
     * @return bool
     */
    private static function checkWindowsPhone(MobileDevice $mobileDevice, UserAgent $userAgent)
    {
        if (stripos($userAgent->getUserAgentString(), 'Windows Phone') !== false) {
            $mobileDevice->setName($mobileDevice::WINDOWS_PHONE);
            return true;
        }
        return false;
    }
}
