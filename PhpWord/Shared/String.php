<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Shared;

/**
 * Common string functions
 */
class String //Tercer cambio Aqui
{
    /**
     * Control characters array
     *
     * @var string[]
     */
    private static $controlCharacters = array();

    /**
     * Convert from OpenXML escaped control character to PHP control character
     *
     * @param string $value Value to unescape
     * @return string
     */
    public static function controlCharacterOOXML2PHP($value = '')
    {
        if (empty(self::$controlCharacters)) {
            self::buildControlCharacters();
        }

        return str_replace(array_keys(self::$controlCharacters), array_values(self::$controlCharacters), $value);
    }

    /**
     * Convert from PHP control character to OpenXML escaped control character
     *
     * @param string $value Value to escape
     * @return string
     */
    public static function controlCharacterPHP2OOXML($value = '')
    {
        if (empty(self::$controlCharacters)) {
            self::buildControlCharacters();
        }

        return str_replace(array_values(self::$controlCharacters), array_keys(self::$controlCharacters), $value);
    }

    /**
     * Check if a string contains UTF-8 data
     *
     * @param string $value
     * @return boolean
     */
    public static function isUTF8($value = '')
    {
        return $value === '' || preg_match('/^./su', $value) === 1;
    }

    /**
     * Return UTF8 encoded value
     *
     * @param string $value
     * @return string
     */
    public static function toUTF8($value = '')
    {
        if (!is_null($value) && !self::isUTF8($value)) {
            $value = utf8_encode($value);
        }

        return $value;
    }

    /**
     * Returns unicode from UTF8 text
     *
     * The function is splitted to reduce cyclomatic complexity
     *
     * @param string $text UTF8 text
     * @return string Unicode text
     * @since 0.11.0
     */
    public static function toUnicode($text)
    {
        return self::unicodeToEntities(self::utf8ToUnicode($text));
    }

    /**
     * Returns unicode array from UTF8 text
     *
     * @param string $text UTF8 text
     * @return array
     * @since 0.11.0
     * @link http://www.randomchaos.com/documents/?source=php_and_unicode
     */
    private static function utf8ToUnicode($text)
    {
        $unicode = array();
        $values = array();
        $lookingFor = 1;

        // Gets unicode for each character
        for ($i = 0; $i < strlen($text); $i++) {
            $thisValue = ord($text[$i]);
            if ($thisValue < 128) {
                $unicode[] = $thisValue;
            } else {
                if (count($values) == 0) {
                    $lookingFor = $thisValue < 224 ? 2 : 3;
                }
                $values[] = $thisValue;
                if (count($values) == $lookingFor) {
                    if ($lookingFor == 3) {
                        $number = (($values[0] % 16) * 4096) + (($values[1] % 64) * 64) + ($values[2] % 64);
                    } else {
                        $number = (($values[0] % 32) * 64) + ($values[1] % 64);
                    }
                    $unicode[] = $number;
                    $values = array();
                    $lookingFor = 1;
                }
            }
        }

        return $unicode;
    }

    /**
     * Returns entites from unicode array
     *
     * @param array $unicode
     * @return string
     * @since 0.11.0
     * @link http://www.randomchaos.com/documents/?source=php_and_unicode
     */
    private static function unicodeToEntities($unicode)
    {
        $entities = '';

        foreach ($unicode as $value) {
            if ($value != 65279) {
                $entities .= $value > 127 ? '\uc0{\u' . $value . '}' : chr($value);
            }
        }

        return $entities;
    }

    /**
     * Return name without underscore for < 0.10.0 variable name compatibility
     *
     * @param string $value
     * @return string
     */
    public static function removeUnderscorePrefix($value)
    {
        if (!is_null($value)) {
            if (substr($value, 0, 1) == '_') {
                $value = substr($value, 1);
            }
        }

        return $value;
    }

    /**
     * Build control characters array.
     *
     * @return void
     */
    private static function buildControlCharacters()
    {
        for ($i = 0; $i <= 19; ++$i) {
            if ($i != 9 && $i != 10 && $i != 13) {
                $find = '_x' . sprintf('%04s', strtoupper(dechex($i))) . '_';
                $replace = chr($i);
                self::$controlCharacters[$find] = $replace;
            }
        }
    }
}
