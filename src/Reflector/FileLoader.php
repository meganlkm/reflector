<?php

namespace My\Reflector;

/**
 * Load legacy classes files
 *
 * PHP version 5
 *
 * @category   Class File Loading
 * @package    My
 * @author     Megan <megan@devstuff.io>
 * @license    http://opensource.org/licenses/MIT
 * @link       devstuff.io
 */
class FileLoader
{
    public static function loadClassFile($className)
    {
        includeFile($className);
    }
}
