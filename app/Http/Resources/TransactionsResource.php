<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Trans ID'     => $this->TransID,
            'Object Type'   => $this->TransType,
            'Object Add'    => $this->created_at,
            'Object Update' => $this->updated_at,
        ];
    }
}
