<?php

namespace TenQuality\Data\Traits;

/**
 * Holds all model functionality related to casting.
 *
 * @author Cami M <info@10quality.com>
 * @copyright 10 Quality <info@10quality.com>
 * @package TenQuality\Data\Model
 * @version 1.0.0
 */
trait CastTrait
{
    /**
     * Returns model as array.
     * @since 1.0.0
     *
     * @return array
     */
    public function __toArray()
    {
        $output = [];
        $value = null;
        foreach ($this->properties as $property) {
            $value = $this->$property;
            if ($value !== null)
                $output[$property] = $value;
        }
        return $output;
    }
    /**
     * Returns model as array.
     * @since 1.0.0
     *
     * @return array
     */
    public function toArray()
    {
        return $this->__toArray();
    }
    /**
     * Returns model as json string.
     * @since 1.0.0
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->__toArray());
    }
}