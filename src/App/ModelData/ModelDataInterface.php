<?php

namespace App\ModelData;

interface ModelDataInterface {
    /**
     * Returns this model data's mapping.
     * 
     * @return string[]
     */
    public function getMapping();

    /**
     * Sets a field within this model data.
     * 
     * @param string $fieldName
     * @param mixed $value
     */
    public function setField(string $fieldName, $value);

    /**
     * Gets the value of the specified field.
     * 
     * @param string $fieldName
     * 
     * @return mixed
     */
    public function getField(string $fieldName);
}