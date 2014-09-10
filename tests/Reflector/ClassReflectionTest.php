<?php

namespace My\Tests\Reflector;

use My\Reflector\ClassReflection as ClassReflection;
// use My\Tests\MyTestClass as MyTestClass;
use PHPUnit_Framework_TestCase;

class ClassReflectionTest extends PHPUnit_Framework_TestCase
{
    public function testIsInstantiable()
    {
        $this->assertInstanceOf('My\Reflector\ClassReflection', new ClassReflection);
        $this->assertInstanceOf('My\Reflector\ClassReflection', ClassReflection::newInstance());
    }

    public function testClassInit()
    {
        $cr = new ClassReflection('My\Tests\Reflector\Mocks\MyTestClass');
        $this->assertInstanceOf('My\Reflector\ClassReflection', $cr);

        $cr->classInit(array('myclassvar', array('param1', 'param2')));
        $this->assertInstanceOf('My\Tests\Reflector\Mocks\MyTestClass', $cr->getClassInstance());
    }

    // public function testGetters()
    // {
    //     $cr = new ClassReflection('My\Tests\Reflector\Mocks\MyTestClass');
    //     $cr->classInit(array('myclassvar', array('param1', 'param2')));

    //     $cr->setNewMethod('getClassName');
    //     $this->assertInstanceOf('ReflectionMethod', $cr->getReflectedMethod());
    //     $this->assertSame('myclassvar', );

    //     $this->assertSame(array('param1', 'param2'), $cr->getParams());
    // }

    // public function setClassName($className)
    // {
    //     // does the class exist?
    //     $this->className = $className;
    // }

    // public function callMethod($methodName, $params = array())
    // {
    //     $this->setNewMethod($methodName);
    //     $this->setMethodParams($this->getReflectedMethod($methodName), $params);
    //     $this->invoke($methodName);
    // }

    // public function setNewMethod($methodName)
    // {
    //     $this->methods[$methodName] = $this->reflectMethod($methodName);
    // }

    // protected function reflectClass()
    // {
    //     // catch error
    //     $this->reflection = new \ReflectionClass($this->className);
    //     return $this->reflection;
    // }

    // protected function reflectMethod($methodName)
    // {
    //     // does the method exist?
    //     return new \ReflectionMethod($this->className, $methodName);
    // }

    // public function getReflectedMethod($methodName)
    // {
    //     // if it exists..
    //     return $this->methods[$methodName];
    // }

    // // get method args
    // public function getMethodParams($methodName)
    // {
    //     // is it there?
    //     return (isset($this->methodParams[$methodName])) ? $this->methodParams[$methodName] : array();
    // }

    // // get reflected class
    // public function getClassReflection()
    // {
    //     // if this is an instanceof ReflectionClass
    //     return $this->reflection;
    // }

    // // get class
    // public function getClassInstance()
    // {
    //     // if this is an instanceof ReflectionClass
    //     return $this->classInstance;
    // }

    // // invoke method
    // public function invoke($methodName)
    // {
    //     // if (!$this->reflected->hasMethod($methodName)) {
    //     //     throw new \Exception("{$methodName} does not exist");
    //     // }

    //     $classInstance = $this->getClassInstance();
    //     $reflectedMethod = $this->getReflectedMethod($methodName);
    //     $methodArgs = $this->getMethodParams($methodName);
    //     return $reflectedMethod->invokeArgs($classInstance, $methodArgs);
    // }

    // public function setMethodParams(\ReflectionMethod $method, $userArgs = array())
    // {
    //     $methodParams = array();
    //     $methodSig = $method->getParameters();

    //     foreach ($methodSig as $key => $param) {
    //         $methodParams[$key] = $userArgs[$key];
    //         if ($param->isPassedByReference()) {
    //             $methodParams[$key] = &$userArgs[$key];
    //         }
    //     }

    //     $this->methodParams[$method->getName()] = $methodParams;
    // }
}
