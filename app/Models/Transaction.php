<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients;
use App\Models\Objects;

class Transaction extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'TransType'
    ];

    protected $table = 'transactions';

    protected $primaryKey = 'TransID';

    public function trans_with_Objects()
    {
        return $this->belongsToMany(Objects::class, 'objects__transactions', 'TransOB_ID', 'ObjectTR_ID');
    }

    // Relationship with clients
    public function trans_with_clients()
    {
        return $this->belongsToMany(clients::class, 'clients__transactions', 'TransCL_ID', 'ClientTR_ID');
    }
}
