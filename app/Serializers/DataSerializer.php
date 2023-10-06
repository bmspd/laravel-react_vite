<?php
namespace App\Serializers;

use League\Fractal\Serializer\DataArraySerializer;

class DataSerializer extends DataArraySerializer
{

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function item($resourceKey, array $data):array
    {
        return $data;
    }

}
