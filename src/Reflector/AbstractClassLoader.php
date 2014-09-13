<?php

/**
 * TODO
 *     add functionality to specify file path/name
 */

namespace My\Reflector;

use My\Reflector\AbstractClassFactory as AbstractClassFactory;
use My\Reflector\FileLoader as FileLoader;

/**
 * Load legacy classes into custom packages
 *
 * PHP version 5
 *
 * @category   Class Loading
 * @package    My
 * @author     Megan <megan@devstuff.io>
 * @license    http://opensource.org/licenses/MIT
 * @link       devstuff.io
 */
abstract class AbstractClassLoader extends AbstractClassFactory
{
    protected function createInstance($className = '', $args = array())
    {
        $this->loadFile($className);
        $this->reflectClass($className);
        $this->classInit($args);

        if ($this->isInstantiated()) {
            return true;
        }

        $this->throwGenericException("Unable to instantiate class: [{$className}]");
        return false;
    }

    protected function loadFile($className)
    {
        FileLoader::loadClassFile($className);

        if (!class_exists($className)) {
            throw new \Exception("Class {$className} does not exist");
        }
        return true;
    }
}
