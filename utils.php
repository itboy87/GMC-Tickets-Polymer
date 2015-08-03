<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 8:09 AM
 */

namespace Utils {
    class ValidateValues
    {
        public static function get($values)
        {
            if (IsSetBulk::Get($values)) {
                if (!IsEmptyBulk::Get($values)) {
                    return true;
                }
            }

            return false;
        }
    }

    class IsSetBulk
    {

        public static function Get($values)
        {
            foreach ($values as $value) {
                if (!isset($_GET[$value])) {
                    return false;
                }
            }
            return true;
        }

        public static function Post($values)
        {

            foreach ($values as $value) {
                if (!isset($_POST[$value])) {
                    return false;
                }

            }

            return true;
        }
        public static function Request($values)
        {

            foreach ($values as $value) {
                if (!isset($_REQUEST[$value])) {
                    return false;
                }

            }

            return true;
        }

    }

    class IsEmptyBulk
    {
        public static function Get($values)
        {

            foreach ($values as $value) {
                if (empty($_GET[$value])) {
                    return true;
                }
            }

            return false;
        }

        public static function Post($values)
        {

            foreach ($values as $value) {
                if (empty($_POST[$value])) {
                    return true;
                }
            }

            return false;
        }
        public static function Request($values)
        {

            foreach ($values as $value) {
                if (empty($_REQUEST[$value])) {
                    return true;
                }
            }

            return false;
        }

    }
}