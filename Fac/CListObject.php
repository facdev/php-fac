<?php
/**
 * CListObject class  - CListObject.php file
 *
 * @author     Dmitryi Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitryi Tyurin
 * @license The MIT License (MIT) Dmitryi Tyurin
 */


namespace Fac;

/**
 * CListObject class
 *
 * @package		Fac
 */
class CListObject implements \IteratorAggregate, \Countable {

    protected $_data   = array();
    private $_couunt = 0;

    function __construct(array $data = array()) {
        $this->_data   = $data;
        $this->_couunt = count($this->_data);
    }

    public function __get($param) {
        $arr = array();
        foreach ($this->_data as $object) {
            $arr[] = $object->$param;
        }
        return $arr;
    }

    public function __set($param, $value) {
        foreach ($this->_data as $object) {
            $object->$param = $value;
        }
    }

    public function addAt($object, $index = null) {
        if ($index === null) {
            array_push($this->_data, $object);
        }
        elseif ($index === 0) {
            array_unshift($this->_data, $object);
        } else {
            $arr = array();
            for ($i = 0; $i < $this->_couunt; $i++) {
                if ($i == $index) {
                    array_push($arr, $object);
                }
                array_push($arr, $this->_data[$i]);
            }
            $this->_data   = $arr;
        }
        $this->_couunt = count($this->_data);
    }

    /**
     * @return self
     */
    public function getUnique() {
        $arr = array();
        foreach ($this->_data as $object) {
            if (!in_array($object, $arr)) {
                array_push($arr, $object);
            }
        }
        return new self($arr);
    }

    public function getItemsAtAttr($param, $value) {
        $arr = array();
        foreach ($this->_data as $object) {
            if ($object->$param == $value) {
                array_push($arr, $object);
            }
        }
        return new self($arr);
    }

    public function removeAt($index = null) {
        if ($index === null) {
            $index         = $this->_couunt - 1;
        }
        unset($this->_data[$index]);
        $this->_data   = array_values($this->_data);
        $this->_couunt = count($this->_data);
    }

    public function first() {
        return $this->_data[0];
    }

    public function last() {
        return $this->_data[$this->_couunt - 1];
    }

    /**
     *
     * @param integer $index
     * @return stdObject
     */
    public function itemAt($index) {
        return $this->_data[$index];
    }

    public function count() {
        return $this->_couunt;
    }

    public function toArray() {
        return $this->_data;
    }

    public function getIterator() {
        return new \ArrayIterator($this->_data);
    }

}
