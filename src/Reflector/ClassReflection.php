<?php

namespace My\Reflector;

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
class ClassReflection
{
    protected $className;
    protected $reflection;
    protected $classInstance;
    protected $methods = array();
    protected $methodParams = array();

    public function __construct($className = '')
    {
        $this->setClassName($className);
    }

    public static function newInstance($className = '')
    {
        return new self($className);
    }

    public function classInit($constructParams = array())
    {
        $reflectedClass = $this->reflectClass();
        $this->setNewMethod('__construct', $constructParams);
        $this->classInstance = $reflectedClass->newInstanceArgs($this->getMethodParams('__construct'));
    }

    public function setClassName($className)
    {
        // does the class exist?
        $this->className = $className;
    }

    public function callMethod($methodName, $params = array())
    {
        $this->setNewMethod($methodName);
        $this->setMethodParams($this->getReflectedMethod($methodName), $params);
        return $this->invoke($methodName);
    }

    public function setNewMethod($methodName)
    {
        $this->methods[$methodName] = $this->reflectMethod($methodName);
        // set defaults
        $this->setMethodParams($this->getReflectedMethod($methodName), array());
    }

    protected function reflectClass()
    {
        // catch error
        $this->reflection = new \ReflectionClass($this->className);
        return $this->reflection;
    }

    protected function reflectMethod($methodName)
    {
        // does the method exist?
        return new \ReflectionMethod($this->className, $methodName);
    }

    public function getReflectedMethod($methodName)
    {
        return (isset($this->methods[$methodName])) ? $this->methods[$methodName] : null;
    }

    // get method args
    public function getMethodParams($methodName)
    {
        // is it there?
        return (isset($this->methodParams[$methodName])) ? $this->methodParams[$methodName] : array();
    }

    // get reflected class
    public function getClassReflection()
    {
        // if this is an instanceof ReflectionClass
        return $this->reflection;
    }

    // get class
    public function getClassInstance()
    {
        // if this is an instanceof ReflectionClass
        return $this->classInstance;
    }

    // invoke method
    public function invoke($methodName)
    {
        // if (!$this->reflected->hasMethod($methodName)) {
        //     throw new \Exception("{$methodName} does not exist");
        // }

        $classInstance = $this->getClassInstance();
        $reflectedMethod = $this->getReflectedMethod($methodName);
        $methodArgs = $this->getMethodParams($methodName);
        return $reflectedMethod->invokeArgs($classInstance, $methodArgs);
    }

    public function setMethodParams(\ReflectionMethod $method, $userArgs = array())
    {
        $methodParams = array();
        $methodSig = $method->getParameters();

        foreach ($methodSig as $key => $param) {
            $methodParams[$key] = null;
            if (isset($methodParams[$key])) {
                $methodParams[$key] = $userArgs[$key];
                if ($param->isPassedByReference()) {
                    $methodParams[$key] = &$userArgs[$key];
                }
            }
        }

        $this->methodParams[$method->getName()] = $methodParams;
    }
}
