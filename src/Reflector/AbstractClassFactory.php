<?php

namespace My\Reflector;

abstract class AbstractClassFactory
{
    public function create($className = '', $args = array())
    {
        $this->createInstance($className, $args);
    }

    abstract protected function createInstance($className, $args);
}
