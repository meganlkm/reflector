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
 * @author     Megan <megan.lkm@gmail.com>
 * @license    http://opensource.org/licenses/MIT
 * @link       devstuff.io
 */
abstract class AbstractClassLoader extends AbstractClassFactory
{
    protected $reflected;
    protected $iObject;

    public function __construct()
    {
        $this->reflected = false;
        $this->iObject = false;
    }

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

    protected function reflectClass($className)
    {
        $this->reflected = new \ReflectionClass($className);
    }

    protected function classInit($args)
    {
        // $this->iObject = $this->reflected->newInstance($args);
        $this->iObject = $this->reflected->newInstanceArgs($args);
    }

    protected function loadFile($className)
    {
        FileLoader::loadClassFile($className);

        if (!class_exists($className)) {
            $this->throwGenericException("Class {$className} does not exist");
            return false;
        }
        return true;
    }

    public function getReflected()
    {
        return $this->reflected;
    }

    public function getObject()
    {
        return $this->iObject;
    }

    public function isInstantiated()
    {
        return (is_object($this->reflected) && is_object($this->iObject));
    }

    private function throwGenericException($msg)
    {
        throw new \Exception($msg);
    }
}
