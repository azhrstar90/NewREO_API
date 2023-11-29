<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Client ID'         => $this->ClientsID,
            'Client Name'       => $this->ClientName,
            'client Type'       => $this->ClientType,
            'client Contact'    => $this->ClientContact,
            'Object Add'        => $this->created_at,
            'Object Update'     => $this->updated_at,

        ];
    }
}
