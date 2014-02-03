<?php
/**
 * CDataObject class  - CDataObject.php file
 *
 * @author     Dmitryi Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitryi Tyurin
 * @license The MIT License (MIT) Dmitryi Tyurin
 */

namespace Fac;

/**
 * CDataObject class
 *
 * @package		Fac
 */
class CDataObject extends CObject implements \IteratorAggregate, \Countable {
    /**
     * @var array
     */
    protected $_data = array();

    public function __construct($data = null) {
        parent::__construct();
        if ($data !== null) {
            foreach ($data as $k => $v) {
                $this->_data[$k] = $v;
            }
        }
    }

    public function __get($name) {
        return $this->_data[$name];
    }

    public function __isset($name) {
        return (array_key_exists($name, $this->_data));
    }

    public function __set($name, $value) {
        $this->_data[$name] = $value;
    }

    public function __unset($name) {
        unset($this->_data[$name]);
    }

    public function count() {
        return coun($this->_data);
    }

    public function getIterator() {
        return new \ArrayIterator($this->_data);
    }

    public function toArray() {
        $arr = array();
        foreach($this as $key=>$value) {
            $arr[$key] = $value;
        }
        return $arr;
    }

}