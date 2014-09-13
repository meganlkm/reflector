<?php

namespace My\Reflector;

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
class ReflectionCollection
{
    protected $reflections = array();

    // new class
    public function newClass($className)
    {
        // is this class already set?
        // is it a valid class? does it exist?
        $this->reflections[$className]['ReflectionClass'] = new \ReflectionClass($className);
    }

    // new method
    public function newMethod($className, $methodName)
    {
        // has className been reflected yet? is it set?
        // $reflectedClass = $this->getClass($className);
        $this->reflections[$className]['methods'][$methodName] = new \ReflectionMethod($className, $methodName);
    }

    // class init -- newInstanceArgs
    public function initClass($className, $params = array())
    {
        $reflectedClass = $this->getReflectionClass($className);
        $this->newMethod($className, '__construct');
        $classArgs = (count($params) > 0) ? $this->getMethodParams($className, '__construct', $params) : array();
        $this->reflections[$className]['ClassInstance'] = $reflectedClass->newInstanceArgs((array) $classArgs);
    }

    // get class
    public function getReflectionClass($className)
    {
        // if this is an instanceof ReflectionClass
        return $this->reflections[$className]['ReflectionClass'];
    }

    // get class
    public function getClassInstance($className)
    {
        // if this is an instanceof ReflectionClass
        return $this->reflections[$className]['ClassInstance'];
    }

    // get method
    public function getMethod($className, $methodName)
    {
        // is it there?
        return $this->reflections[$className]['methods'][$methodName];
    }

    // invoke method
    public function invokeMethod($className, $methodName, $params = array())
    {
        // if (!$this->reflected->hasMethod($methodName)) {
        //     throw new \Exception("{$methodName} does not exist");
        // }

        $classInstance = $this->getClassInstance($className);
        $reflectionMethod = $this->getMethod($className, $methodName);
        $args = (count($params) > 0) ? $this->getMethodParams($className, $methodName, $params) : array();
        return $reflectionMethod->invokeArgs($classInstance, $args);
    }

    // get method parameters
    public function getMethodParams($className, $methodName, $userArgs = array())
    {
        $method = $this->getMethod($className, $methodName);

        $params = $method->getParameters();
        $reArgs = array();

        foreach ($params as $key => $param) {
            $reArgs[$key] = $userArgs[$key];
            if ($param->isPassedByReference()) {
                $reArgs[$key] = &$userArgs[$key];
            }
        }
        return $reArgs;
    }
}
