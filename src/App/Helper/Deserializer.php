<?php

namespace App\Helper;

use App\ModelData\ModelDataInterface;

class Deserializer {
    /**
     * Deserializes associative arrays into model data objects.
     * 
     * @param ModelDataInterface $modelData
     * @param array $data
     * 
     * @return ModelDataInterface
     */
    public function deserialize(ModelDataInterface $modelData, array $data) {
        $mapping = $modelData->getMapping();

        foreach($mapping as $field){
            $modelData->setField($field, $data[$field]);
        }

        return $modelData;
    }
}