<?php
/**
 * Session class  - Session.php file
 *
 * @author     Dmitriy Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitriy Tyurin
 * @license The MIT License (MIT) Dmitriy Tyurin
 */

namespace Fac;

/**
 * Session class
 *
 * @method mixed cache_expire
 * @method mixed cache_limiter
 * @method mixed commit
 * @method mixed decode
 * @method mixed destroy
 * @method mixed encode
 * @method mixed get_cookie_params
 * @method mixed id
 * @method mixed is_registered
 * @method mixed module_name
 * @method mixed name
 * @method mixed regenerate_id
 * @method mixed register_shutdown
 * @method mixed register
 * @method mixed save_path
 * @method mixed set_cookie_params
 * @method mixed set_save_handler
 * @method mixed start
 * @method mixed status
 * @method mixed unregister
 * @method mixed unset
 * @method mixed write_​lose
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