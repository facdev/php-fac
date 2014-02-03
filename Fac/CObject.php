<?php
/**
 * CObject class  - CObject.php file
 *
 * @author     Dmitryi Tyurin <fobia3d@gmail.com>
 * @copyright  Copyright (c) 2014 Dmitryi Tyurin
 * @license The MIT License (MIT) Dmitryi Tyurin
 */

namespace Fac;

/**
 * CObject class
 *
 * @package		Fac
 */
class CObject {

    function __construct($data = null) {
        if ($data !== null) {
            $this->merge($data);
        }
    }

    public function merge($obj) {
        foreach ($obj as $k => $v) {
            $this->$k = $v;
        }
    }

    public function mergeRecursive($obj) {
        foreach ($obj as $k => $v) {
            if (is_array($v) || is_object($v)) {
                if (!is_object($this->$k)) {
                    $this->$k = new self();
                }
                $this->$k->mergeRecursive($v);
            } else {
                $this->$k = $v;
            }
        }
    }

}

