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

        $cr->classInit(array('myclassvar', array('param1', array('param2'))));
        $this->assertInstanceOf('My\Tests\Reflector\Mocks\MyTestClass', $cr->getClassInstance());
    }

    public function testReflectedGetters()
    {
        $cr = new ClassReflection('My\Tests\Reflector\Mocks\MyTestClass');
        $cr->classInit(array('myclassvar', array('param1', 'param2')));

        $cr->setNewMethod('getStrParam1');
        $this->assertInstanceOf('ReflectionMethod', $cr->getReflectedMethod('getStrParam1'));
        $this->assertSame('myclassvar', $cr->invoke('getStrParam1'));

        $this->assertSame(array('param1', 'param2'), $cr->callMethod('getArrParam2'));
    }

    public function testWrapperGetter()
    {
        $cr = new ClassReflection('My\Tests\Reflector\Mocks\MyTestClass');
        $cr->classInit(array('myclassvar', array('param1', 'param2')));

        $this->assertSame('My\Tests\Reflector\Mocks\MyTestClass', $cr->getClassName());
    }
}
