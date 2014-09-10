<?php

namespace My\Tests\Reflector;

// use My\Reflector\AbstractClassLoader as AbstractClassLoader;
use PHPUnit_Framework_TestCase;

class AbstractClassLoaderTest extends PHPUnit_Framework_TestCase
{
    // protected $initTestClass = '\My\Reflector\MoodleClass';
    // protected $abstractTestClass = '\My\Reflector\AbstractClassLoader';

    public function testNothing()
    {
        $this->assertTrue(true);
    }

    // public function testClassInitFactory()
    // {
    //     $mockMethods = array('createInstance');
    //     $stub = $this->getMockForAbstractClass($this->abstractTestClass, array(), '', false, true, true, $mockMethods);

    //     $stub->expects($this->once())
    //         ->method('createInstance')
    //         ->will($this->returnValue(true));

    //     $stub->create();
    // }

    // public function testClassInit()
    // {
    //     $mockMethods = array('loadFile', 'isInstantiated', 'reflectClass', 'classInit');
    //     $stub = $this->getMockForAbstractClass($this->abstractTestClass, array(), '', false, true, true, $mockMethods);

    //     $stub->expects($this->once())
    //         ->method('isInstantiated')
    //         ->will($this->returnValue(true));

    //     $stub->expects($this->once())
    //         ->method('loadFile')
    //         ->will($this->returnValue(true));

    //     $stub->expects($this->once())
    //         ->method('reflectClass')
    //         ->will($this->returnValue(true));

    //     $stub->expects($this->once())
    //         ->method('classInit')
    //         ->will($this->returnValue(true));

    //     $stub->create();
    // }

    // public function testAbstractStub()
    // {
    //     $stub = $this->getMockForAbstractClass($this->initTestClass);
    //     $this->assertInstanceOf($this->initTestClass, $stub);

    //     return $stub;
    // }

    // *
    //  * this is an annotation...
    //  * depends testAbstractStub
     
    // // public function testReflectClass($stub)
    // // {
    // //     $method = $this->getPrivateMethod($this->initTestClass, 'reflectClass');
    // //     $method->invokeArgs($stub, array($this->initTestClass));
    // //     $this->assertInstanceOf('ReflectionClass', $stub->getReflected());

    // //     return $stub;
    // // }

    // /**
    //  * this is an annotation...
    //  * depends testReflectClass
    //  */
    // // public function testClassInitFromReflected($stub)
    // // {
    // //     $method = $this->getPrivateMethod($this->initTestClass, 'classInit');
    // //     $method->invokeArgs($stub, [$this->initTestClass]);
    // //     $this->assertInstanceOf($this->initTestClass, $stub->getObject());
    // // }

    // public function getPrivateMethod($className, $methodName)
    // {
    //     $reflector = new \ReflectionClass($className);
    //     $method = $reflector->getMethod($methodName);
    //     $method->setAccessible(true);

    //     return $method;
    // }
}
