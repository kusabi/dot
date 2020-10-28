<?php

namespace Kusabi\Dot;

use ArrayAccess;
use ArrayIterator;
use Countable;
use Iterator;
use IteratorAggregate;
use JsonSerializable;

class Dot implements ArrayAccess, Countable, IteratorAggregate, JsonSerializable
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
     * @param array|static|Iterator $array
     */
    public function __construct($array = [])
    {
        $this->array = $this->parse($array);
    }

    /**
     * Create a new instance using a chain-able method
     *
     * @param array|static|Iterator $array
     *
     * @return static
     */
    public static function instance($array = [])
    {
        return new static($array);
    }

    /**
     * {@inheritDoc}
     *
     * @see Countable::count()
     */
    public function count()
    {
        return count($this->array);
    }

    /**
     * Remove an item from the array using dot notation
     *
     * @param string $key
     *
     * @return self
     */
    public function delete($key)
    {
        if (array_key_exists($key, $this->array)) {
            unset($this->array[$key]);
            return $this;
        }

        $array = &$this->array;
        $segments = explode('.', $key);
        $last = array_pop($segments);

        foreach ($segments as $segment) {
            if (!isset($array[$segment]) || !is_array($array[$segment])) {
                return $this;
            }

            $array = &$array[$segment];
        }

        unset($array[$last]);
        return $this;
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
     * @param array|static|Iterator $array
     *
     * @return self
     */
    public function setArray($array)
    {
        $this->array = $this->parse($array);
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return ArrayIterator
     *
     * @see IteratorAggregate::getIterator()
     *
     */
    public function getIterator()
    {
        return new ArrayIterator($this->array);
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
     * {@inheritDoc}
     *
     * @see ArrayAccess::offsetExists()
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    /**
     * {@inheritDoc}
     *
     * @see ArrayAccess::offsetGet()
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * {@inheritDoc}
     *
     * @see ArrayAccess::offsetSet()
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->array[] = $value;
            return;
        }
        $this->set($offset, $value);
    }

    /**
     * {@inheritDoc}
     *
     * @see ArrayAccess::offsetUnset()
     */
    public function offsetUnset($offset)
    {
        $this->delete($offset);
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

    /**
     * Parse an input to an array
     *
     * @param array $array
     *
     * @return array
     */
    protected function parse($array)
    {
        if ($array instanceof self) {
            return $array->getArray();
        }

        return (array) $array;
    }
}
