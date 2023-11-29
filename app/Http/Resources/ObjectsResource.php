<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Object ID'     => $this->ObjectID,
            'Object Name'   => $this->ObjectName,
            'Object Price'  => $this->ObjectPrice,
            'Object Type'   => $this->objectType,
            'Object Add'    => $this->created_at,
            'Object Update' => $this->updated_at,
        ];
    }
}
