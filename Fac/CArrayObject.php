<?php
/**
 * CArrayObject class  - CArrayObject.php file
 *
 * @author     Dmitryi Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitryi Tyurin
 * @license The MIT License (MIT) Dmitryi Tyurin
 */

namespace Fac;

/**
 * CArrayObject class
 *
 * @package		Fac
 */
class CArrayObject implements \IteratorAggregate, \ArrayAccess, \Countable
{

    /**
     * @var array
     */
    protected $_data = array();

    /**
     */
    public function __construct($data = null)
    {

    }

    /**
     * Слить
     * @param array $data
     */
    public function merge($data)
    {
        if (is_array($data) || is_object($data)) {
            foreach ($data as $key => $value) {
                $this->_data[$key] = $value;
            }
        }
    }

    /**
     * Проверить существование значение
     * @param string $key
     * @return boolean
     */
    public function exist($key)
    {
        return (array_key_exists($key, $this->_data));
    }

    /**
     * Установить значение
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * Возвращает значение
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->_data[$key];
    }

    /**
     * Удалить значение
     * @param string $key
     */
    public function remove($key)
    {
        unset($this->_data[$key]);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __isset($name)
    {
        return $this->exist($name);
    }

    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    public function __unset($name)
    {
        $this->remove($name);
    }

    public function offsetExists($offset)
    {
        return $this->exist($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        return $this->remove($offset);
    }

    public function count()
    {
        return coun($this->_data);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->_data);
    }
}