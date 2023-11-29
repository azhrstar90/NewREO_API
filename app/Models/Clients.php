<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Clients extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'ClientName',
        'ClientType',
        'ClientContact',
    ];

    protected $table = 'clients';

    protected $primaryKey = 'ClientsID';


    // DATABASE RELATIONSHIP BETWEEN CLIENTS AND TRANSACTION
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'clients__transactions', 'ClientTR_ID', 'TransCL_ID');
    }
}
