<?php

namespace themes\bookwell\classes\base;

/**
 * Class Base
 * @package themes\bookwell\classes\base
 */
class Base
{
    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get_' . ucwords($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

}