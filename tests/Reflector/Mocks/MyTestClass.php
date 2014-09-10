<?php

namespace My\Tests\Reflector\Mocks;

class MyTestClass
{
    protected $className;
    protected $params;

    public function __construct($className = '', $params = array())
    {
        $this->setClassName($className);
        $this->setParams($params);
    }

    public static function newInstance($className = '', $params = array())
    {
        return new self($className, $params);
    }

    public function setClassName($className = '')
    {
        $this->className = $className;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function setParams($params = array())
    {
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }
}
