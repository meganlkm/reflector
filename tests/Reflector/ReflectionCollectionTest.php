<?php

namespace Tests\My\Reflector;

use My\Reflector\ReflectionCollection as ReflectionCollection;
use PHPUnit_Framework_TestCase;

class ReflectionCollectionTest extends PHPUnit_Framework_TestCase
{
    public function testIsInstantiable()
    {
        $this->assertInstanceOf('My\Reflector\ReflectionCollection', new ReflectionCollection);
    }

    public function testNewClass()
    {
        $className = 'ReflectionFunction';
        $args = ['substr'];

        $rc = new ReflectionCollection;
        $rc->newClass($className);
        $this->assertInstanceOf('ReflectionClass', $rc->getReflectionClass($className));

        $rc->initClass($className, $args);
        $this->assertInstanceOf($className, $rc->getClassInstance($className));
    }

    public function testNewMethod()
    {
        $className = 'ReflectionFunction';
        $classArgs = ['substr'];
        $methodName = '__toString';

        $rc = new ReflectionCollection;
        $rc->newClass($className);
        $rc->initClass($className, $classArgs);
        $rc->newMethod($className, $methodName);
        $this->assertInstanceOf('ReflectionMethod', $rc->getMethod($className, $methodName));
        $this->assertInternalType('string', $rc->invokeMethod($className, $methodName));
    }

    // test many classes and methods
    // test methods with many args
}
