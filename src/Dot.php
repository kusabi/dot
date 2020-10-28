<?php

namespace Kusabi\Dot;

use JsonSerializable;

class Dot implements JsonSerializable
{
    /**
     * The underlying array
     *
     * @var array
     */
    protected $array;

    /**
     * Dot constructor.
     *
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * Create a new instance using a chain-able method
     *
     * @param array $array
     *
     * @return static
     */
    public static function instance(array $array = [])
    {
        return new static($array);
    }

    /**
     * Check if the array contains the key using dot notation
     *
     * @param string $key
     *
     * @return bool
     */
    public function exists($key)
    {
        $array = $this->array;
        foreach (explode('.', $key) as $k) {
            if (!is_array($array) || !array_key_exists($k, $array)) {
                return false;
            }
            $array = $array[$k];
        }
        return true;
    }

    /**
     * Get an entry from the array using dot notation.
     *
     * Returns the default parameter if not found
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $array = $this->array;
        foreach (explode('.', $key) as $k) {
            if (!is_array($array) || !array_key_exists($k, $array)) {
                return $default;
            }
            $array = $array[$k];
        }
        return $array;
    }

    /**
     * Get the array
     *
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Set the array
     *
     * @param array $array
     *
     * @return self
     */
    public function setArray($array)
    {
        $this->array = $array;
        return $this;
    }

    /**
     * Check if the array contains the key and it has a value using dot notation
     *
     * The check for a value compares the value to false.
     *
     * The optional parameter determines if this is a soft or hard check.
     *
     * @param string $key
     * @param bool $strict
     *
     * @return bool
     */
    public function has($key, $strict = false)
    {
        $value = $this->get($key, false);
        return $strict === true ? $value !== false : $value != false;
    }

    /**
     * {@inheritDoc}
     *
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->array;
    }

    /**
     * Set an entry of the array using dot notation.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return self
     */
    public function set($key, $value)
    {
        $array = &$this->array;
        foreach (explode('.', $key) as $k) {
            if (!isset($array[$k]) || !is_array($array[$k])) {
                $array[$k] = [];
            }
            $array = &$array[$k];
        }
        $array = $value;
        return $this;
    }
}
