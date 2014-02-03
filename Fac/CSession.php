<?php
/**
 * Session class  - Session.php file
 *
 * @author     Dmitryi Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitryi Tyurin
 * @license The MIT License (MIT) Dmitryi Tyurin
 */

namespace Fac;

/**
 * Session class
 *
 * @method mixed ​cache_​expire
 * @method mixed ​cache_​limiter
 * @method mixed ​commit
 * @method mixed ​decode
 * @method mixed ​destroy
 * @method mixed ​encode
 * @method mixed ​get_​cookie_​params
 * @method mixed ​id
 * @method mixed ​is_​registered
 * @method mixed ​module_​name
 * @method mixed ​name
 * @method mixed ​regenerate_​id
 * @method mixed ​register_​shutdown
 * @method mixed ​register
 * @method mixed ​save_​path
 * @method mixed ​set_​cookie_​params
 * @method mixed ​set_​save_​handler
 * @method mixed ​start
 * @method mixed ​status
 * @method mixed ​unregister
 * @method mixed ​unset
 * @method mixed ​write_​close
 *
 * @package		Fac
 */
class CSession implements \Countable, \IteratorAggregate
{

    public function __call($name, $arguments)
    {
        $callback = "session_" . $name;
        return call_user_func_array($callback, $arguments);
    }

    public function toArray()
    {
        return $_SESSION;
    }

    /**
     * Returns an iterator over all items.
     * @internal
     * @return \RecursiveArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($_SESSION);
    }

    /**
     * Returns items count.
     *
     * @return int
     */
    public function count()
    {
        return count((array) $_SESSION);
    }

}
