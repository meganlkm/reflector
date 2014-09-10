<?php

namespace My\Tests\Reflector\Mocks;

class MyTestClass
{
    protected $strParam1;
    protected $arrParam2;

    public function __construct($strParam1 = '', $arrParam2 = array())
    {
        $this->setStrParam1($strParam1);
        $this->setArrParam2($arrParam2);
    }

    public static function newInstance($strParam1 = '', $arrParam2 = array())
    {
        return new self($strParam1, $arrParam2);
    }

    public function setStrParam1($strParam1 = '')
    {
        $this->strParam1 = $strParam1;
    }

    public function getStrParam1()
    {
        return $this->strParam1;
    }

    public function setArrParam2($arrParam2 = array())
    {
        $this->arrParam2 = $arrParam2;
    }

    public function getArrParam2()
    {
        return $this->arrParam2;
    }
}
