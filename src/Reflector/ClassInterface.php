<?php

namespace My\Reflector;

/**
 * wrap legacy classes to write clean
 * code for external processes
 *
 * PHP version 5
 *
 * @package    My
 * @author     Megan <megan.lkm@gmail.com>
 * @license    http://opensource.org/licenses/MIT
 * @link       devstuff.io
 */
interface ClassInterface
{
    public function setClassName($className = '');
    public function setParams($params = array());

    public function getClassName();
    public function getPropertyVal($prop = '');
    public function getProperties();

    public function load();
    public function callClassMethod($methodName = '', $args = array());
}
